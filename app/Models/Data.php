<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    use HasFactory;

    protected $table = 'data';


    protected $fillable = [
        'name',
        'price',
        'bedrooms',
        'bathrooms',
        'storeys',
        'garages'
    ];

    protected $casts = [
        'name' => 'string',
        'price' => 'integer',
        'bedrooms' => 'integer',
        'bathrooms' => 'integer',
        'storeys' => 'integer',
        'garages' => 'integer'
    ];
}
