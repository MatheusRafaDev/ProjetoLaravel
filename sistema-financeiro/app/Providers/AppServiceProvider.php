<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{

    public function register()
    {
        //
    }


    public function boot()
{
    Blade::directive('money', function ($amount) {
        return "<?php echo 'R$ ' . number_format($amount, 2, ',', '.'); ?>";
    });
}
}
