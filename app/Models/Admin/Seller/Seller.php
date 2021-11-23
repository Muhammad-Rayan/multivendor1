<?php

namespace App\Models\Admin\Seller;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory;
    protected $table = 'user_information';
    protected $fillable = [
        'user_id', 'first_name', 'last_name', 'address', 'country_id', 'city_id', 
        'postal_code', 'phone', 'email', 'shopname', 'shopaddress', 'seller_approved', 'deleted' 
    ];

}
