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
        'price',
        'location',
        'city',
        'neighborhood',
        'bedrooms',
        'bathrooms',
        'area',
        'type',
        'status',
        'furnished',
        'year_built',
        'amenities',
        'image',
        'broker_name',
        'broker_phone',
        'broker_email',
    ];

    protected $casts = [
        'furnished' => 'boolean',
        'amenities' => 'array',
        'price' => 'float',
        'area' => 'float',
        'bedrooms' => 'integer',
        'bathrooms' => 'integer',
        'year_built' => 'integer',
    ];

    public function getImageUrlAttribute()
    {
        if (str_starts_with($this->image, 'http')) {
            return $this->image;
        }
        return asset('storage/' . $this->image);
    }
} 