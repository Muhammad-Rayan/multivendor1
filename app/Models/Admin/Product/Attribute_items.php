<?php

namespace App\Models\Admin\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute_items extends Model
{
    use HasFactory;
    protected $table = 'attribute_items';
    protected $fillable = [
        'name','attribute_id'
    ];
}
