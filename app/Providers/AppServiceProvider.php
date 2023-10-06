<?php

namespace DentalCalculator\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       Schema::defaultStringLength(191);
	//URL::forceScheme('https');
	//\URL::forceSchema('https');
	//if($this->app->environment('production')) {
	  //  URL::forceScheme('https');
//	}
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
