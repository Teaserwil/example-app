<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        return 'Выводим список проектов';
    }

    public function show(Project $project)
    {
        return 'Выводим один проект';
    }

    public function store(Request $request)
    {
        return 'Создаем новый проект';
    }

    public function edit(Project $project)
    {
        return 'Редактировать проект';
    }

    public function destroy(Project $project)
    {
        return 'Удалить проект';
    }

}
