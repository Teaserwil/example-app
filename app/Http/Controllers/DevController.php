<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\Request;
use DB;

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
}
