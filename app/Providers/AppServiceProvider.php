<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\Setting;
use App\Models\Page;
use App\Models\PaymentMethod;
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
        Paginator::useBootstrap();
        $setting = Setting::findOrFail(1);
        View::share('setting', $setting);

        $pages = Page::get();
        View::share('pages', $pages);
        $payment_methods = PaymentMethod::where('status', 1)->get();
        View::share('payment_methods', $payment_methods);

        \Blade::directive('convert', function ($money) {
            return "<?php echo number_format($money, 2); ?>";
        });
    }
}
