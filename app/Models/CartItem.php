<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CartItem extends Model
{
    public function cart() :BelongsTo 
    {
        return $this->BelongsTo(Cart::class);
    }
    public function product() :BelongsTo 
    {
        return $this->BelongsTo(Product::class);
    }
    
    protected $fillable = [
        'cart_id',
        'product_id',
        'quantity',
        'price',
    ];

    use HasFactory;
}
