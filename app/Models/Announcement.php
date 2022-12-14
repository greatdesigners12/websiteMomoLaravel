<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Announcement extends Model

{   
    public function Promo()
    {
        return $this->belongsTo(Promo::class, 'promo_id');
    }

    protected $table = "announcements";
    protected $fillable=[
        "content",
        "status", 
    
    ];

    use HasFactory;
}
