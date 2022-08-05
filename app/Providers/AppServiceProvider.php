<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\ApilogController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Repositories\Role\RoleInterface;
use App\Repositories\Role\RoleEloquentRepository;
use App\Repositories\Person\PersonInterface;
use App\Repositories\Person\PersonRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(RoleInterface::class, RoleEloquentRepository::class);
        // $this->app->singleton('ApilogController', function ($app) {
        //     return new ApilogController();
        // });
        $this->app->bind(PersonInterface::class, PersonRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    // public function boot()
    // {
    //     DB::listen(function($query) {
    //         Log::info(
    //             $query->sql,
    //             $query->bindings,
    //             $query->time
    //         );
    //     });
    // }
}
