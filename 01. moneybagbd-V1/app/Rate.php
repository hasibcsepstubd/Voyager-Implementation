<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Rate extends Model
{
    protected $fillable = ['curency_name', 'reserved', 'image', 'buy', 'sell'];
}
