<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class ReferralWithdraw extends Model
{
    protected $fillable = ['user_id', 'withdraw', 'payment_method', 'account_no'];
}
