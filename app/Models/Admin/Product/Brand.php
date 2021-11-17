<?php

namespace App\Models\Admin\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $table = 'product_brand';
    protected $fillable = [
        'name','active','deleted','image'
    ];
    
    protected $appends = [ 'text' ];
    public function getTextAttribute()
    {
        return $this->attributes['name'];
    }
}
