<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        \Illuminate\Support\Facades\Schema::defaultStringLength(191);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        try {
            Schema::hasTable('site_settings');
            $web_config = DB::table('site_settings')->pluck('value','key');
            config(['web_config'=>$web_config]);
        }catch(\Exception $e) {

        }
    }
}
