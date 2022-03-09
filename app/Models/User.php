<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
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

    /* Relationship Permission */
    public function permissions()
    {
        return $this->belongsToMany('App\Models\Permission', 'user_permission', 'user_id', 'permission_id');
    }

    public function hasPermission($name)
    {
        if ($this->permissions()->where('name', $name)->first()) {
            return true;
        }

        return false;
    }

    /* Relationship UserVerify */
    public function userVerify()
    {
        return $this->hasOne('App\Models\UserVerify');
    }

    /* Relationship Subscribe */
    public function subscribe()
    {
        return $this->hasOne('App\Models\Subscribe');
    }

    /* Relationship AddressBook */
    public function addressBooks()
    {
        return $this->hasMany('App\Models\AddressBook');
    }

    /* Relationship Order */
    public function orders()
    {
        return $this->hasMany('App\Models\Order')->orderBy('id', 'desc');
    }
}
