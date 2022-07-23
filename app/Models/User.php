<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Role;
use App\Models\Photo;
use Carbon\Carbon;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'is_active',
        'photo_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function role()
    {
       return $this->belongsTo('App\Models\Role');
    }


    public function photo()
    {
        return $this->belongsTo('App\Models\Photo');
    }


    public function setPasswordAttribute($password)
    {
        if (!empty($password)) {
            
         $this-> attributes['password'] = bcrypt($password);

        }
    }

    public function isAdmin()
    {

        if ($this->role->name == "administrator" &&  $this->is_active ==1) {
            return true;
        }

        return false;

    }



}
