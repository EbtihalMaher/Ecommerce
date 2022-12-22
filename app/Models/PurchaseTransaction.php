<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseTransaction extends Model
{
    use HasFactory;
    protected $table = 'purchase_transactions';
    protected $fillable = [
    	'productId',
    	'price'
    ];


      public function product()
    {
        return $this->belongsTo(Product::class ,'productId','id' );
    }
}
