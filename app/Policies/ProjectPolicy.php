<?php

namespace App\Policies;

use App\Models\Project;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ProjectPolicy
{
    /**
     * Кто может просматривать все проекты
     */
    public function viewAll(User $authUser): bool
    {
        return true;
    }

    /**
     * Кто может просматривать конкретный проект
     */
    public function view(User $authUser): bool
    {
        return true;
    }

    /**
     * Кто может создавать проекты
     */
    public function create(User $authUser): bool
    {
        return true;
    }

    /**
     * Кто может редактировать проекты
     */
    public function update(User $authUser, Project $project): bool
    {
        return ($authUser->role === 'admin' or $authUser->id === $project->owner_id);
    }

    /**
     * Кто может удалять проекты
     */
    public function delete(User $authUser, Project $project): bool
    {
        return ($authUser->role === 'admin' or $authUser->id === $project->owner_id);
    }

}
