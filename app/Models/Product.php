<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'table_products';

    protected $fillable = [
        'id',
        'name',
        'description',
        'code',
        'price',
        'image',
    ];
}
