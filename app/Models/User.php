<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use GoldSpecDigital\LaravelEloquentUUID\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];
    
    protected $hidden = [
        'password',
        'remember_token',
    ];
   
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setData($user, $request)
    {
        $user->name = $request['name'];
        $user->active = $request['active'];
        $user->email = $request['email'];
        $user->phone = $request['phone'];
        $user->password = $request['password'] ? Hash::make($request['password']) : $user->password;
        $user->name = $request['name'];
    }

    public function hasfiles(): HasOne
    {
        return $this->hasOne(UsersHasFiles::class,'users_id');
    }
}
