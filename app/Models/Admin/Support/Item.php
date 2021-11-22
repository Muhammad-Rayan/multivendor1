<?php

namespace App\Models\Admin\Support;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Support\HasManyRelation;



class Item extends Model
{
    use HasFactory;
    use HasManyRelation;


    protected $table = 'support_items';
    protected $fillable = [
        'support_id', 'description', 'image','customer_id'
    ];

    
}
