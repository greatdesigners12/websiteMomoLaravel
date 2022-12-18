<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionGroup extends Model
{
    protected $fillable = ["invoice", "total_price", "date_transaction", "user_id", "shipping_price", "status", "snap_token", "no_resi", "updated_at"];
    public function relation(){
        return $this->hasMany(TransactionRelation::class, 'transaction_group_id');
    }
    use HasFactory;
}
