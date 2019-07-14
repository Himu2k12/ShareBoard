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
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role()
    {
        return $this->hasOne('App\Role','user_id','id');
//        return $this->hasOne('App\Role');
    }

    public function userRole($role)

    {
        if (sizeof($role) == 1) {
            if($this->role()->where('name', $role)->first()) {
                return true;
            }
            return false;

        } elseif (sizeof($role) == 2 ) {
            if($this->role()->where('name', $role[0])->first() || $this->role()->where('name', $role[1])->first()){
                return true;
            }
            return false;

        }elseif (sizeof($role) == 3 ) {

            if($this->role()->where('name', $role[0])->first() || $this->role()->where('name', $role[1])->first() || $this->role()->where('name', $role[2])->first()){
                return true;
            }
            return false;

        } elseif (sizeof($role) == 4 ) {

            if($this->role()->where('name', $role[0])->first() || $this->role()->where('name', $role[1])->first() || $this->role()->where('name', $role[2])->first()||$this->role()->where('name', $role[3])->first()){
                return true;
            }
            return false;

        }else {
            return false;
        }
        return false;
    }
}
