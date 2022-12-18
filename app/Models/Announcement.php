<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Announcement extends Model
{   
    

    protected $table = "announcements";
    protected $fillable=[
        "content",

        "status", 
    ];
    use HasFactory;
}
