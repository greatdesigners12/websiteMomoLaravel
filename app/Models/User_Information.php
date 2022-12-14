<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_Information extends Model
{
    protected $fillable =[
        "full_name",
        "password",
        "role",
        'last_login'
    ];
    protected $table = "user_informations";
    use HasFactory;
}
