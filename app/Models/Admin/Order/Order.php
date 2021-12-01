<?php

namespace App\Models\Admin\Order;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Support\HasManyRelation;
use App\Models\User;
use App\Models\Admin\Order\Item;

class Order extends Model
{
    use HasFactory;
    use HasManyRelation;


    protected $table = 'orders';
    protected $fillable = [
        'order_number', 'number_of_product', 'customer_id', 'amount', 'delivery_status', 'payment_status', 
        'refund_status', 'order_date', 'payment_method', 'subtotal', 'tax', 'shipping','item_id','created_at'
    ];

    public function items() {
        return $this->hasMany(Item::class, 'order_id', 'id');
    }
    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id', 'id');
    }
}
