<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    protected $fillable = [
        'user_id',
        'client_name',
        'amount',
        'status',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
