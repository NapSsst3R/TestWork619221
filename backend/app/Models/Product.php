<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'description',
        'price'
    ];


}
