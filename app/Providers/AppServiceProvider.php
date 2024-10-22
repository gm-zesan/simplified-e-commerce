<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->composer('website.*', function ($view) {
            $categories = Category::withCount('products')->get();
            $subcategories = Subcategory::withCount('products')->get();
            $view->with('categories', $categories)->with('subcategories', $subcategories);
        });
    }
}
