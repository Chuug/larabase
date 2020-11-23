<?php

namespace App\Models;

use DateTime;
use App\Models\Article;
use App\Http\Helpers\Helpers;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    public function article()
    {
        return $this->hasMany(Article::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = [
        'example'
    ];

    public function getIsAdminAttribute() {
        return $this->attributes['role'] == env('ROLE_ADMIN', 3);
    }

    public function getIsBloggerAttribute() {
        return $this->attributes['role'] >= 2;
    }

    public function getConnectedAttribute() {
        return Helpers::formatDate($this->attributes['connected_at']);
    }

    public function getExampleAttribute() {
        return 'Hello example';
    }
}
