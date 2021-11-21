<?php

namespace App\Models\Admin\Order;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Support\HasManyRelation;
use App\Models\Admin\Product\Productlist;



class Item extends Model
{
    use HasFactory;
    use HasManyRelation;


    protected $table = 'orders_item';
    protected $fillable = [
        'product_id', 'order_id', 'price','qty','total'
    ];

    public function product()
    {
        return $this->belongsTo(Productlist::class, 'product_id', 'id');
    }
    
}
