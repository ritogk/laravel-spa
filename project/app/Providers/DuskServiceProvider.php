<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Dusk\Browser;
class DuskServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @property object $pause
     * @property object $driver
     * @return void
     */
    public function register()
    {
      // duskにマクロ登録
      Browser::macro('switchToLastTab', function() {
        // ウインドウがロードされるまで待つ
        $this->pause(1000);
        $handles = $this->driver->getWindowHandles();
        $this->driver->switchTo()->window(end($handles));
        return $this;
      });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
