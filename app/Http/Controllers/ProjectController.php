<?php

namespace App\Http\Controllers;

use App\Http\Requests\Project\ProjectStoreRequest;
use App\Http\Requests\Project\ProjectUpdateRequest;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

    /**
     * Список проектов
     *
     * GET /projects
     */
    public function index(Request $request)
    {
        $listProjects = Project::all();

        return view('pages.projects.index', ['listProjects' => $listProjects]);
    }

    /**
     * Показать один проект
     *
     * GET /projects/{project}
     */
    public function show(Project $project)
    {
        return view('pages.projects.show', $project);
    }

    /**
     * Форма создания проекта
     *
     * GET /projects/create
     */
    public function create(Request $request)
    {
        $users = User::pluck('id', 'username');

        return view('pages.projects.create', ['users' => $users]);
    }

    /**
     * Сохранить новый проект
     *
     * POST /projects
     */
    public function store(ProjectStoreRequest $request)
    {
        $project = Project::create($request->validated());

        return redirect()->route('projects.show', ['project' => $project]);
    }

    /**
     * Форма редактирования проекта
     *
     * GET /projects/{project}/edit
     */
    public function edit(Project $project)
    {
        $users = User::pluck('id', 'username');

        return view('pages.projects.edit', ['project' => $project, 'users' => $users]);
    }

    /**
     * Сохранение изменений в проекте
     *
     * PUT /projects/{project}
     */
    public function update(ProjectUpdateRequest $request, Project $project)
    {
        $project->update($request->validated());

        return redirect()->route('projects.show', ['project' => $project]);
    }

    /**
     * Удаление проекта
     *
     * DELETE /projects/{project}
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return back();
    }

}
