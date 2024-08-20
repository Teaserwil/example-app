<?php

namespace App\Http\Controllers;

use App\Http\Requests\Project\ProjectStoreRequest;
use App\Http\Requests\Project\ProjectUpdateRequest;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ProjectController extends Controller
{

    /**
     * Список проектов
     *
     * GET /projects
     */
    public function index(Request $request)
    {
        Gate::authorize('viewAll', Project::class);
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
        Gate::authorize('view', $project);

        return view('pages.projects.show', $project);
    }

    /**
     * Форма создания проекта
     *
     * GET /projects/create
     */
    public function create(Request $request)
    {
        Gate::authorize('create', Project::class);
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
        Gate::authorize('create', Project::class);
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
        Gate::authorize('update', $project);
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
        Gate::authorize('update', $project);
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
        Gate::authorize('delete', $project);
        $project->delete();

        return back();
    }

}
