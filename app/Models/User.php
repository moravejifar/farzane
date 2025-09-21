<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{

    use HasFactory;
 /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'lastname',
        'role',
        'email',
        'password',
        'bio',
        'gender',
        'news',
        'user_image',
        'policy',

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
    public function getRoleFarsi() {
            if( $this->role=='user') return 'کاربر عادی';
            if( $this->role=='manager') return 'مدیر';
            if( $this->role=='operator') return 'اپراتور';
            if( $this->role=='customer') return 'مهمان';


    }
    public function getCreatedAtJalali()
    {
       return verta($this->created_at)->format('Y/m/d');
    }
}
