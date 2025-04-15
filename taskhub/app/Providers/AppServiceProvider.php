<?php

namespace App\Providers;

use App\Repositories\TaskRepositoryEloquent;
use App\Repositories\TaskRepositoryInterface;
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
        $this->app->bind(TaskRepositoryInterface::class, TaskRepositoryEloquent::class);
    }
}
