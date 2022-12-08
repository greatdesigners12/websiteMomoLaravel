<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $brands;
    protected $table = "products";
    protected $fillable = ["name", "category_id", "company_id", "price", "stock", "image_product", "description"];
    public $timestamps = false;
    public function Kategori()
    {
        return $this->belongsTo(Kategori::class, 'category_id');
    }
    public function Brand()
    {
        return $this->belongsTo(Brand::class, 'company_id');
    }
    use HasFactory;

    
}
