<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class Admin extends Model implements Authenticatable
{
    use AuthenticatableTrait, HasFactory;

    protected $table = 'admins';  

    protected $fillable = [
        'user_name',  
        'password',  
    ];

    protected $guarded = [
        'id_admin', 
    ];

    public $timestamps = true;
}

