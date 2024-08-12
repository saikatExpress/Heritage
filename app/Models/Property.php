<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'location',
        'price',
        'bedrooms',
        'bathrooms',
        'size',
        'owner_id',
        'image',
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function bids()
    {
        return $this->hasMany(Bid::class, 'property_id');
    }

    public function testimonials()
    {
        return $this->hasMany(Testimonial::class, 'property_id');
    }
}
