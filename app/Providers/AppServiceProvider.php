<?php

namespace App\Providers;

use App\Models\BlogCategory;
use App\Models\SellerBlog;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;

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
        Schema::defaultStringLength(191);


        View::share([
            'articles' => SellerBlog::query()
                ->with('category', 'tags')
                ->latest()
                ->take(4)
                ->get(),
            'categories' => BlogCategory::query()
                ->orderBy('id', 'DESC')
                ->get()
        ]);
    }
}
