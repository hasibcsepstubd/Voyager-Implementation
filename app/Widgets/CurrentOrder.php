<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;

class CurrentOrder extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $count = \App\Transection::where('status', 'Processing')->count();
        $string = 'Pending Order';

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-credit-cards',
            'title'  => "{$count} {$string}",
            'text'   => __('voyager.dimmer.post_text', ['count' => $count, 'string' => Str::lower($string)]),
            'button' => [
                'text' => 'View All',
                'link' => route('voyager.transections.index'),
            ],
            'image' => asset('asset/images/admin/transection.jpg'),
        ]));
    }
}
