<?php

namespace App\Models\Admin\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute_items extends Model
{
    use HasFactory;
    protected $table = 'attribute_items';
    protected $fillable = [
        'value','attribute_id'
    ];

    protected $appends = [ 'text' ];
    public function getTextAttribute()
    {
        return $this->attributes['value'];
    }
}
