<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        //Хардкодим список проектов
        for ($i = 1; $i <= 12; $i++) {
            $listProjects[] = [
                'id' => $i,
                'name' => 'Project ' . fake()->domainName(),
                'owner_id' => fake()->randomNumber(),
                'is_active' => fake()->boolean(),
                'created_at' => fake()->time(),
                'updated_at' => fake()->time(),
                'deadline_date' => fake()->dateTimeThisYear("+120 days")->format('d/m/Y'),
                'assignee_id' => fake()->randomNumber(),
            ];
        }

        return view('pages.projects.index', ['listProjects' => $listProjects]);
    }

    public function show(Request $request)
    {
        $project = [
            'id' => fake()->randomNumber(),
            'name' => 'Project ' . fake()->domainName(),
            'owner_id' => fake()->randomNumber(),
            'is_active' => fake()->boolean(),
            'created_at' => fake()->time(),
            'updated_at' => fake()->time(),
            'deadline_date' => fake()->dateTimeThisYear("+120 days")->format('d/m/Y'),
            'assignee_id' => fake()->randomNumber(),
        ];

        return view('pages.projects.show', $project);
    }

    public function create(Request $request)
    {
        //В дальнейшем запрос можно усложнить и добавить выборку ролей или групп
        $users = DB::select('select * from users');

        return view('pages.projects.create', ['users' => $users]);
    }

    public function store(Request $request)
    {
        return 'Сохраняем новый проект';
    }

    public function edit(Request $request)
    {
        $project = [
            'id' => fake()->randomNumber(),
            'name' => 'Project ' . fake()->domainName(),
            'owner_id' => 1,//Ставим айди 1 так как у нас только админ в базе
            'is_active' => fake()->boolean(),
            'created_at' => fake()->time(),
            'updated_at' => fake()->time(),
            'deadline_date' => fake()->dateTimeThisYear("+120 days")->format('d/m/Y'),
            'assignee_id' => 1,
        ];

        $users = DB::select('select * from users');

        return view('pages.projects.edit', ['project' => $project, 'users' => $users]);
    }

    public function destroy(Request $request)
    {
        return 'Удалить проект';
    }

}
