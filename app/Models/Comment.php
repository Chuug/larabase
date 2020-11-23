<?php

namespace App\Models;

use App\Models\User;
use App\Http\Helpers\Helpers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getCreatedAttribute()
    {
        return Helpers::formatDate($this->attributes['created_at']);
    }

    public static function booted()
    {
        static::addGlobalScope('created_at', function(Builder $builder){
            $builder->orderBy('created_at','DESC');
        });
    }

    public function scopeOfOrder($query, $type)
    {
        return $query->orderBy('created_at',$type);
    }
}
