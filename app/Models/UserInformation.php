<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInformation extends Model
{
    protected $table = "user_informations";
    protected $fillable = ["nama_lengkap", "gender", "kota", "kecamatan", "provinsi", "alamat", "kode_pos", "tanggal_lahir", "user_id", "token", "is_phone_verified", "is_email_verified"];
    public $timestamps = false;
    use HasFactory;
}
