<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
{
   use HandlesAuthorization;

   public function store(User $user) 
   {
      return Auth::check();
   }

   public function edit(User $user, Comment $comment)
   {
      return $user->id === $comment->user_id;
   }

   public function update(User $user, Comment $comment)
   {
      return $user->id === $comment->user_id;
   }
   
   public function destroy(User $user, Comment $comment)
   {
      return $user->id === $comment->user_id || $user->role >= 2;
   }
}