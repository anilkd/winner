<?php

namespace App\Providers;

use App\Winner;
use DateTime;
use DateInterval;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('phone', function($attribute, $value, $parameters, $validator) {
            return preg_match('%^(?:(?:\(?(?:00|\+)([1-9]\d\d|[1-9]\d?)\)?)?[\-\.\ \\\/]?)?((?:\(?\d{1,}\)?[\-\.\ \\\/]?){0,})(?:[\-\.\ \\\/]?(?:#|ext\.?|extension|x)[\-\.\ \\\/]?(\d+))?$%i', $value) && strlen($value) >= 10;
        });
        Validator::extend('winner', function($attribute, $value, $parameters, $validator) {
            $winner=Winner::where('phone_no', $value)
                ->whereDate('gift_issued_date', '>=', Carbon::today()->subDays(90)->toDateString())
                ->orderBy('gift_issued_date', 'desc')
                ->first();
            return is_null($winner);
        });
        Validator::replacer('phone', function($message, $attribute, $rule, $parameters) {
            return str_replace(':attribute',$attribute, ':attribute is invalid phone number');
        });
        Validator::replacer('winner', function($message, $attribute, $rule, $parameters) {
            return str_replace(':phone_num',Input::get($attribute), 'Winner with phone number :phone_num has won in the last 90 days ');
        });
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
