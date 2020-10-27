<?php

namespace App\Models;

use DateTime;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

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

    public function getConnectedAttribute() {
        $date = new DateTime($this->attributes['connected_at']);
        return $date->format('d/m/Y à H:i:s');
    }

    public function getExampleAttribute() {
        return 'Hello example';
    }
}
