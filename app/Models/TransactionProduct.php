<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionProduct extends Model
{
    protected $table = "transactions_products";
    protected $fillable = ["price", "name", "quantity", "imageProduct"];
    public $timestamps = false;
    use HasFactory;
}
