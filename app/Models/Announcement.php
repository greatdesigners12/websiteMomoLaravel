<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Announcement extends Model
<<<<<<< HEAD
{

=======
{   
    
    public function Promo()
    {
        return $this->belongsTo(Promo::class, 'promo_id');
    }

    protected $table = "announcements";
    protected $fillable=[
        "content",
        "promo_id",
        "status", 
        "admin_id"
    ];
>>>>>>> origin/database
    use HasFactory;
}
