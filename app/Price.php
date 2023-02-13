<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Price extends Model
{
    // use SoftDeletes;

    protected $fillable = ['id', 'name', 'category', 'products', 'first_specs', 'second_specs', 'third_specs'];
}
