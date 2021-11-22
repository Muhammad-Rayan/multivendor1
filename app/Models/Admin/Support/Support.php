<?php

namespace App\Models\Admin\Support;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Support\HasManyRelation;
use App\Models\User;
use App\Models\Admin\Support\Item;

class Support extends Model
{
    use HasFactory;
    use HasManyRelation;


    protected $table = 'support';
    protected $fillable = [
        'customer_id', 'date', 'ticket_no', 'subject', 'description', 'image', 
        'status', 'reply_date'
    ];

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id', 'id');
    }

    public function items() {
        return $this->hasMany(Item::class, 'support_id', 'id');
    }
}
