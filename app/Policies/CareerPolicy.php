<?php

namespace App\Policies;

use App\Models\Career;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CareerPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(?User $user): bool
    {
        return true;
    }

    public function viewAnyEmployer(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(?User $user, Career $career): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->employer !== null;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Career $career): bool | Response
    {
        if ($user->employer->id !== $career->employer_id) {
            return false;
        }

        if ($career->careerApplications()->count() > 0) {
            return Response::deny('You already have an application for this job.');
        }
        return true;
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Career $career): bool
    {
        //
        return $user->employer->user_id === $user->id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Career $career): bool
    {
        return $user->employer->user_id === $user->id;


        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Career $career): bool
    {
        //
        return $user->employer->user_id === $user->id;
    }

    public function apply(User $user, Career $career): bool
    {
        return !$career->hasUserApplied($user);
    }
}
