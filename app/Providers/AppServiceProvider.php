<?php

namespace App\Providers;

use App\DataTable\CustomerDataTable;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(
            CustomerController::class,
            fn($app) => new CustomerController($app->make(CustomerDataTable::class))
        );
        if (DB::Connection() instanceof \Illuminate\Database\SQLiteConnection) {
            DB::connection()->getPdo()
                ->sqliteCreateFunction('REGEXP', function ($pattern, $value) {
                    mb_regex_encoding('UTF-8');
                    return (false !== mb_ereg($pattern, $value)) ? 1 : 0;
                });

            DB::connection()->getPdo()->sqliteCreateFunction('NOT REGEXP', function ($pattern, $value) {
                mb_regex_encoding('UTF-8');
                return (false !== mb_ereg($pattern, $value)) ? 0 : 1;
            });
        }
    }
}
