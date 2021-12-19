<?php

namespace App\Models\Admin\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Admin\Product\AttributeItems;
use Illuminate\Database\Eloquent\Model;
use App\Support\HasManyRelation;

class Attribute extends Model
{
    use HasFactory;
    use HasManyRelation;
    
    protected $table = 'attribute';
    protected $fillable = [
        'name'
    ];

    public function attribute_items()
    {
        return $this->hasMany(AttributeItems::class, 'attribute_id', 'id');
    }
    
    protected $appends = [ 'text' ];
    public function getTextAttribute()
    {
        return $this->attributes['name'];
    }
}
