<?php

namespace App\Models;

use Faker\Extension\CountryExtension;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;
    protected $fillable= [
        'name',
        'country',
        'city',
        'zone',
        'zipcode'
    ];
}
