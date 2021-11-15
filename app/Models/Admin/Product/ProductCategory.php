<?php

namespace App\Models\Admin\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;
    protected $table = 'product_category';
    protected $fillable = [
        'name','active','deleted','type','meta_title','meta_description','image'
    ];

    protected $appends = [ 'text' ];
    public function getTextAttribute()
    {
        return $this->attributes['name'];
    }
}
