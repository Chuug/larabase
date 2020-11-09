<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Article;
use Illuminate\Auth\Access\HandlesAuthorization;

class BlogPolicy
{
    use HandlesAuthorization;

    public function index(User $user)
    {
        return $user->isBlogger;
    }
    
    public function create(User $user)
    {
        return $user->isBlogger;
    }

    public function store(User $user)
    {
        return $user->isBlogger;
    }

    public function edit(User $user, Article $article)
    {
        return $user->id === $article->user_id;
    }

    public function update(User $user, Article $article)
    {
        return $user->id === $article->user_id;
    }

    public function destroy(User $user, Article $article)
    {
        return $user->id === $article->user_id;
    }
}
