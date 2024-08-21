<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

class DevController extends Controller
{
    public function index(Request $request, string $action = null)
    {
        if ($action === null) {
            $result = '<p>Available actions:</p><ul>';
            foreach (array_diff(get_class_methods($this), get_class_methods(Controller::class)) as $method) {
                if ($method !== 'index') {
                    $result .= '<li><a href="/dev/' . $method . '">' . $method . '</a></li>';
                }
            }

            return $result . '</ul>';
        }

        if (method_exists($this, $action)) {
            return $this->{$action}($request);
        }

        return null;
    }

    public function getDummyConfig()
    {
        return config('dummyjson');
    }

    /*
     * Создаем 5 случайных проектов
     */
    public static function addProject()
    {
        for ($i = 1; $i <= 5; $i++) {
            Project::query()->create([
                'name' => 'Project ' . fake()->domainName(),
                'owner_id' => User::query()->inRandomOrder()->first()->id,
                'is_active' => fake()->boolean(),
                'deadline_date' => fake()->dateTimeThisYear("+120 days"),
                'assignee_id' => User::query()->inRandomOrder()->first()->id,
            ]);
        }

        return '5 projects added';
    }

    /*
     * Получаем все проекты админов и присоединяем нужные поля от юзера к выборке
     */
    public static function getAdminProjects()
    {
        $projects = DB::table('projects')
            ->join('users', function (JoinClause $join) {
                $join->on('projects.owner_id', '=', 'users.id')
                    ->where('users.role', '=', 'admin');
            })
            ->select('projects.*', 'users.id as user_id', 'users.username', 'users.email')
            ->get();

        return $projects;
    }

    /*
     * Получаем проекты с истекшим дедлайном сортировка по дате дедлайна ASC
     */
    public static function getExpired()
    {
        $projects = DB::table('projects')
            ->where('deadline_date', '<', now())
            ->orderBy('deadline_date', 'asc')
            ->get();

        return $projects;
    }

    /*
     * Обновить данные рандомного проекта
     */
    public static function updateRandom()
    {
        $pogect = Project::query()->inRandomOrder()->first()->update([
            'name' => 'New Project ' . fake()->domainName(),
            'owner_id' => User::query()->inRandomOrder()->first()->id,
            'is_active' => fake()->boolean(),
            'deadline_date' => fake()->dateTimeThisYear("+120 days"),
            'assignee_id' => User::query()->inRandomOrder()->first()->id,
        ]);

        return $pogect;
    }

    /*
     * Получает три последних проекта; если текущий пользователь авторизован,
     * то те, которые принадлежат текущему пользователю;
     * если не авторизован — то кому-угодно.
     */
    public static function getMyLatestThree()
    {
        if (Auth::check()) {
            $projects = DB::table('projects')
                ->where('owner_id', '=', Auth::user()->id)
                ->limit(3)
                ->orderBy('created_at', 'desc')
                ->get();
        } else {
            $projects = DB::table('projects')
                ->limit(3)
                ->orderBy('created_at', 'desc')
                ->get();
        }

        return $projects;
    }

    /*
     * Получает список пользователей (их username) и кол-во проектов у каждого.
     */
    public static function usersProjects()
    {
        $users = DB::table('projects')
            ->rightJoin('users', function (JoinClause $join) {
                $join->on('projects.owner_id', '=', 'users.id');
            })
            ->select(DB::raw('username, username'), DB::raw('count(*) as projects_count, owner_id'))
            ->groupBy('username', 'owner_id')
            ->get();

        return $users;
    }

    /*
     * Получает кол-во проектов с истекшим дедлайном.
     */
    public static function getExpiredProjectsCount()
    {
        $projects = DB::table('projects')
            ->where('deadline_date', '<', now())
            ->orderBy('deadline_date', 'asc')
            ->count();

        return $projects;
    }

}
