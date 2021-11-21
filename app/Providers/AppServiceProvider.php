<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\Contact;
use App\Models\Page;
use Darryldecode\Cart\CartServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use TCG\Voyager\Http\Controllers\ContentTypes\Image;
use TCG\Voyager\Http\Controllers\ContentTypes\MultipleImage;
use TCG\Voyager\Http\Controllers\Controller;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;
use TCG\Voyager\Http\Controllers\VoyagerController;
use TCG\Voyager\Http\Controllers\VoyagerSettingsController;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(CartServiceProvider::class);
        $this->app->bind(VoyagerBaseController::class, \App\Http\Controllers\Voyager\VoyagerBaseController::class);
        $this->app->bind(VoyagerController::class, \App\Http\Controllers\Voyager\VoyagerController::class);
        $this->app->bind(Controller::class, \App\Http\Controllers\Voyager\Controller::class);
        $this->app->bind(VoyagerSettingsController::class, \App\Http\Controllers\Voyager\VoyagerSettingsController::class);
        $this->app->bind(Image::class, \App\Http\Controllers\Voyager\ContentTypes\Image::class);
        $this->app->bind(MultipleImage::class, \App\Http\Controllers\Voyager\ContentTypes\MultipleImage::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        view()->composer('*', function ($view) {
            $view->with('locale', session()->get('locale'));
            $view->with('fallbackLocale', config('voyager.multilingual.default'));
        });
        view()->composer(['partials.header','partials.footer','pages.contacts','pages.home', 'pages.corporate'], function ($view)
        {
            $locale = session()->get('locale');
            $fallbackLocale = config('voyager.multilingual.default');

            $graph = Contact::with('translations')->where('type','graph')->where('is_main',true)->where('status',true)->orderBy('sort_id')->first();
            $graph = $graph->translate($locale,$fallbackLocale);
            $view->with('graph',$graph);

            $phones = Contact::where('type','phone')->where('is_main',true)->where('status',true)->orderBy('sort_id')->get();
            $view->with('phones',$phones);

            $email = Contact::where('type','email')->where('is_main',true)->where('status',true)->orderBy('sort_id')->first();
            $view->with('email',$email);

            $address = Contact::with('translations')->where('type','address')->where('is_main',true)->where('status',true)->orderBy('sort_id')->first();
            $address = $address->translate($locale,$fallbackLocale);
            $view->with('address',$address);

            $socials = Contact::where('type','social')->where('is_main',true)->where('status',true)->orderBy('sort_id')->get();
            $view->with('socials',$socials);

            $pages = Page::withTranslation($locale)->whereNotIn('type',['home'])->where('status',Page::STATUS_ACTIVE)->get();
            $pages = $pages->translate($locale,$fallbackLocale);
            $pages = $pages->groupBy('type');
            $view->with('pages',$pages);
        });
        view()->composer(['partials.footer'], function ($view)
        {
            $locale = session()->get('locale');
            $fallbackLocale = config('voyager.multilingual.default');

            $news = Article::with('translations')
                ->select('id','slug','title','status','sort_id')
                ->where('status',true)
                ->orderBy('sort_id')
                ->limit(6)
                ->get()->translate($locale,$fallbackLocale);
            $view->with('news',$news);
        });
        view()->composer(['partials.header'], function ($view)
        {
            $view->with('cartCount', \Cart::getTotalQuantity());
        });

    }
}
