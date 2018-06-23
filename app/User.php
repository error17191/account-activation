<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'activation_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'activation_token'
    ];

    public function scopeByActivationColumns($query, $columns)
    {
        return $query->where('email', $columns['email'])
            ->whereNotNull('activation_token')
            ->where('activation_token', $columns['token']);
    }

    public function scopeByEmail($query, $email)
    {
        return $query->where('email', $email);
    }
}
