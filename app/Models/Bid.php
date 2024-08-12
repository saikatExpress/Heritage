<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    use HasFactory;

    protected $fillable = [
        'property_id',
        'bidder_id',
        'bid_amount',
    ];

    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id');
    }

    public function bidder()
    {
        return $this->belongsTo(User::class, 'bidder_id');
    }
}
