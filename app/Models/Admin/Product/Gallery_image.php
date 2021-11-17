<?php

namespace App\Models\Admin\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery_image extends Model
{
    use HasFactory;
    protected $table = 'gallery_image';
    protected $fillable = [
        'image','product_id'
    ];
}
