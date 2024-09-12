<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'price',
        'image',
        'quantity',
        'description',
        'category_id',
    ];

    public function category() :BelongsTo 
    {
        return $this->belongsTo(Category::class);
    }
    public function cartItem() :HasMany 
    {
        return $this->HasMany(cartItem::class);
    }
    public function orderItem() :HasMany 
    {
        return $this->HasMany(orderItem::class);
    }
}
