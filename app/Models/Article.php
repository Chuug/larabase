<?php

namespace App\Models;

use App\Models\User;
use App\Models\Comment;
use App\Http\Helpers\Helpers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    public function getCreatedAttribute()
    {
        return Helpers::formatDate($this->attributes['created_at']);
    }

}
