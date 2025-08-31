<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'status_id',
        'note',
        'total_price',
        'delivery_time',
    ];

    // العلاقة مع المستخدم
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // العلاقة مع حالة الطلب
    public function status()
    {
        return $this->belongsTo(OrderStatus::class, 'status_id');
    }

    // العلاقة مع عناصر الطلب (Order Items)
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
