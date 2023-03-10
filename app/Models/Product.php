<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table='products';

    protected $fillable=[
        'name',
        'description',
        'image',
        'storeName',
        'storeId',
        'price',
        'discountPrice',
        'trending',
        'status',
        // 'flag',
    ];
    public function store(){
        return $this->belongsTo(Store::class, 'storeId', 'id');
    }
}
