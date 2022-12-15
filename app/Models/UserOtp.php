<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserOtp extends Model
{
    protected $table = "users_otp";
    protected $fillable = ["user_id", "kode_otp", "token", "date_otp_created"];
    public $timestamps = false;
    use HasFactory;
}
