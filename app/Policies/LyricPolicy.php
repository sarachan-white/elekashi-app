<?php

namespace App\Policies;

use App\Models\Lyric;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class LyricPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Lyric $lyric): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Lyric $lyric): bool
    {
        return $user->id == $lyric->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Lyric $lyric): bool
    {
        //作成者は削除可能
        if ($user->id == $lyric->user_id) {
            return true;
        }
        //管理署は削除可能
        foreach ($user->roles as $role) {
            if ($role->name == 'admin') {
                return true;
            }
        }
        //その他は削除不可
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Lyric $lyric): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Lyric $lyric): bool
    {
        //
    }
}
