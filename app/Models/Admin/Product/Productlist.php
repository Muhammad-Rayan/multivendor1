<?php

namespace App\Models\Admin\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Support\HasManyRelation;
use App\Models\Admin\Product\Tags;


class Productlist extends Model
{
    use HasFactory;
    use HasManyRelation;


    protected $table = 'product';
    protected $fillable = [
        'barcode', 'name', 'cat_id', 'brand_id', 'packing', 'minimum_purch_qty', 
        'tag_id', 'capture_image', 'gallery_id', 'video_link', 'color_id', 'attribute_id',
        'parent_id', 'price', 'discount', 'flat_discount', 'percentage_discount', 'enternal_link', 
        'description', 'meta_tittle', 'meta_description', 'meta_image', 'user_id', 'free_shipping', 
        'shipping_flatrate', 'shipping_costrate', 'shipping_productmultiply', 
        'cashondelivery', 'shippingdays', 'vat', 'vat_rate', 'vat_percent', 'vat_percent','slug','featured','refund',
        'qty','vat_type','active','deleted','low_qty_alert'
    ];

    public function tags()
    {
        return $this->hasMany(Tags::class, 'product_id', 'id');
    }
}
