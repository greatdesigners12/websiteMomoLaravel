<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInformation extends Model
{
    protected $table = "user_informations";
    protected $fillable = ["full_name", "gender", "city_id",  "province_id", "address", "postal_code", "birth_date", "user_id", "token", "is_phone_verified", "is_email_verified"];
    public $timestamps = false;
    use HasFactory;
}
