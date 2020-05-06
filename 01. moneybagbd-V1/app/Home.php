<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Home extends Model
{
    protected $fillable = ['moto_title', 'moto_details', 'about_us', 'address', 'support_email', 'support_phone'];
}
