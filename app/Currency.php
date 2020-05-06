<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Currency extends Model
{
    protected $fillable = ['name'];

    // 
    public static function getToRateValue($from_rate,$to_rate)
    {
        $rate_value = 0;

        if(!empty($from_rate) && !empty($to_rate)) {
            $rate_value = Currency::where('from_rate_id',$from_rate)->where('to_rate_id',$to_rate)->first();
           // dd($rate_value);
        }

        return $rate_value;
    }
}
