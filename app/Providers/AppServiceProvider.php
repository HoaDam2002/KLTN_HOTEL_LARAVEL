<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Validator;

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
        Validator::extend('alpha_spaces', function ($attribute, $value) {
            // Kiểm tra xem giá trị có chứa chữ cái và dấu cách không
            return preg_match('/^[\pL\s]+$/u', $value);
        });

        // Thêm thông báo lỗi cho quy tắc validation
        Validator::replacer('alpha_spaces', function ($message, $attribute, $rule, $parameters) {
            return str_replace(':attribute', $attribute, ':attribute must format to String.');
        });
        Paginator::useBootstrapFive();
        Paginator::useBootstrapFour();
    }
}
