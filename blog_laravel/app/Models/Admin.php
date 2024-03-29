<?php

namespace App\Models;
//use Session;
use App\Http\Controllers\Session;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $guard = 'admin';
  
    protected $fillable = [
        'name', 
        'email', 
        'password',
         'image',
    ];

    protected $hidden = [
        'password',
    ];
}