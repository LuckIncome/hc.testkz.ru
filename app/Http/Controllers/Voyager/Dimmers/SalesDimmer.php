<?php


namespace App\Http\Controllers\Voyager\Dimmers;


use App\Models\Sale;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Widgets\BaseDimmer;

class SalesDimmer extends BaseDimmer
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
        $count = Sale::where('status',true)->count();
        $string = 'акции';

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-gift',
            'title'  => "{$count} {$string}",
            'text'   => "Всего {$count} опубликованных {$string} на сайте",
            'button' => [
                'text' => "Все акции",
                'link' => route('voyager.sales.index'),
            ],
            'image' => voyager_asset('images/widget-backgrounds/02.jpg'),
        ]));
    }

    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {
        return Auth::user()->can('browse', app(Sale::class));
    }

}
