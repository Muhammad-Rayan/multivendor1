<?php

namespace App\Models\Admin\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Support\HasManyRelation;

class Tags extends Model
{
    use HasFactory;
    use HasManyRelation;
    protected $table = 'tag';
    protected $fillable = [
        'name','product_id'
    ];
}
