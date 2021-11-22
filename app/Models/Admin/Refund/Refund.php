<?php

namespace App\Models\Admin\Refund;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Support\HasManyRelation;
use App\Models\User;
use App\Models\Admin\Order\Order;
use App\Models\Admin\Product\Productlist;

class Refund extends Model
{
    use HasFactory;
    use HasManyRelation;


    protected $table = 'refund';
    protected $fillable = [
        'product_id', 'order_number', 'subject', 'desscription', 'image', 'status', 
        'customer_id'
    ];

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id', 'id');
    }
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_number', 'id');
    }
    public function product()
    {
        return $this->belongsTo(Productlist::class, 'product_id', 'id');
    }
}
