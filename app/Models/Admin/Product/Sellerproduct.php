<?php

namespace App\Models\Admin\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sellerproduct extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $fillable = [
        'barcode', 'name', 'cat_id', 'brand_id', 'packing', 'minimum_purch_qty', 
        'tag_id', 'capture_image', 'gallery_id', 'video_link', 'color_id', 'attribute_id',
        'parent_id', 'price', 'discount', 'flat_discount', 'percentage_discount', 'enternal_link', 
        'description', 'meta_tittle', 'meta_description', 'meta_image', 'user_id', 'free_shipping', 
        'shipping_flatrate', 'shipping_costrate', 'shipping_productmultiply', 
        'cashondelivery', 'shippingdays', 'vat', 'vat_rate', 'vat_percent', 'vat_percent'
    ];
}
