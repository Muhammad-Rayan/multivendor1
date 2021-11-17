<?php

namespace App\Models\Admin\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'tag';
    protected $fillable = [
        'name','product_id'
    ];
}
