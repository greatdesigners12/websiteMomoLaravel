<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionRelation extends Model
{
    protected $table = "transaction_group_relation";
    protected $fillable = ["transaction_group_id", "transaction_product_id"];

    public function transaction_group(){
        return $this->belongsTo(TransactionGroup::class, "transaction_group_id");
    }

    public function transaction_product(){
        return $this->belongsTo(TransactionProduct::class, "transaction_product_id");

    }
    public $timestamps = false;
    use HasFactory;
}
