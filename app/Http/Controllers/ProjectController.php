<?php

namespace App\Http\Controllers;

use App\Models\UserProject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{

    public function index(Request $request)
    {
        $listProjects = UserProject::all();

        return view('pages.projects.index', ['listProjects' => $listProjects]);
    }

    public function show(UserProject $project)
    {
        return view('pages.projects.show', $project);
    }

    public function create(Request $request)
    {
        //В дальнейшем запрос можно усложнить и добавить выборку ролей или групп
        $users = User::all();

        return view('pages.projects.create', ['users' => $users]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:200'],
            'owner_id' => ['required', 'string'],
            'is_active' => ['required', 'string'],
            'deadline_date' => ['required', 'string', 'date_format:d.m.Y'],
            'assignee_id' => ['required', 'string'],
        ]);

        $project = UserProject::query()->create([
            'name' => $validated['name'],
            'owner_id' => $validated['owner_id'],
            'is_active' => $validated['is_active'],
            'deadline_date' => $validated['deadline_date'],
            'assignee_id' => $validated['assignee_id'],
        ]);

        session([
            'alert' => [
                'title' => '',
                'message' => 'Проект ' . $validated['name'] . ' сохранен!',
                'type' => 'success',
            ],
        ]);

        return redirect()->route('projects.show', ['project' => $project, 'access' => 'yes']);
    }

    public function edit(UserProject $project)
    {
        $users = User::all();

        return view('pages.projects.edit', ['project' => $project, 'users' => $users]);
    }

    public function update(Request $request, UserProject $project)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:200'],
            'owner_id' => ['required', 'string'],
            'is_active' => ['required', 'string'],
            'deadline_date' => ['required', 'string', 'date_format:d.m.Y'],
            'assignee_id' => ['required', 'string'],
        ]);

        $project->update($validated);

        session([
            'alert' => [
                'title' => '',
                'message' => 'Проект ' . $validated['name'] . ' изменен!',
                'type' => 'success',
            ],
        ]);

        return redirect()->route('projects.show', ['project' => $project, 'access' => 'yes']);
    }

    public function destroy(UserProject $project)
    {
        $project->delete();
        session([
            'alert' => [
                'title' => '',
                'message' => 'Проект ' . $project['name'] . ' удален!',
                'type' => 'warning',
            ],
        ]);

        return back();
    }

}
