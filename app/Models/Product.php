<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $brands;
    protected $table = "products";
    protected $fillable = ["name", "category_id", "brand_id", "price", "stock", "image_product", "description"];
    public $timestamps = false;
    public function Category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function Brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function favourite_products(){
        return $this->hasOne(FavouriteProduct::class);
    }
    use HasFactory;

    
}
