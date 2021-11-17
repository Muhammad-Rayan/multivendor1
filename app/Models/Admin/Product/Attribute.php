<?php

namespace App\Models\Admin\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;
    protected $table = 'attribute';
    protected $fillable = [
        'name'
    ];

    protected $appends = [ 'text' ];
    public function getTextAttribute()
    {
        return $this->attributes['name'];
    }
}
