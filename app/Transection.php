<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Transection extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User')->select(['id', 'name']);
    }
}
