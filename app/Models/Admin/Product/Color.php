<?php

namespace App\Models\Admin\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;
    protected $table = 'color';
    protected $fillable = [
        'name','code'
    ];

    protected $appends = [ 'text' ];
    public function getTextAttribute()
    {
        return $this->attributes['name'];
    }
}
