<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    use HasFactory;

    protected $table = "promo";
    public function User()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
    
    protected $fillable =[
        "code",
        "percentage",
        "max_discount",
        "status",
        "updated_at",
        "created_at"
    ];
}
