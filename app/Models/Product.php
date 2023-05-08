<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static find(int $id)
 * @method static orderBy(string $string, string $string1)
 */
class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'category',
        'image',
        'price',
    ];
}
