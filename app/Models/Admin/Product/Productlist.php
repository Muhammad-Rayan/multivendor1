<?php

namespace App\Models\Admin\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Support\HasManyRelation;
use App\Models\Admin\Product\Tags;
use App\Models\Admin\Product\ProductCategory;
use App\Models\Admin\Product\Brand;
use App\Models\Admin\Product\Color;
use App\Models\Admin\Product\Attribute;
use App\Models\Admin\Product\AttributeItems;
use App\Models\Admin\Product\GalleryImage;
use App\Models\User;

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
        'qty','vat_type','active','deleted','low_qty_alert','short_description'
    ];

    public function tags()
    {
        return $this->hasMany(Tags::class, 'product_id', 'id');
    }
    public function gallery()
    {
        return $this->hasMany(GalleryImage::class, 'product_id', 'id');
    }
    public function items() {
        return $this->hasMany(static::class, 'parent_id');
    }
    public function cat()
    {
        return $this->belongsTo(ProductCategory::class, 'cat_id', 'id');
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }
    public function color()
    {
        return $this->belongsTo(Color::class, 'color_id', 'id');
    }
    public function attribute()
    {
        return $this->belongsTo(Attribute::class, 'color_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function attribute_items()
    {
        return $this->belongsTo(AttributeItems::class, 'attribute_items_id', 'id');
    }
}
