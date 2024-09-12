<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    public function user() :BelongsTo 
    {
        return $this->belongsTo(User::class);
    }
    public function orderItem() :HasMany 
    {
        return $this->HasMany(OrderItem::class);
    }
    protected $fillable = [
        'order_code',
        'user_id',
        'total_amount',
        'status',
        'status_order_customer',
    ];
    use HasFactory;
}
