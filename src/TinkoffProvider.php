<?php namespace professionalweb\payment;

use Illuminate\Support\ServiceProvider;
use professionalweb\payment\contracts\PayService;
use professionalweb\payment\drivers\tinkoff\TinkoffDriver;


/**
 * PayOnline payment provider
 * @package professionalweb\payment
 */
class TinkoffProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Bind two classes
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(PayService::class, function ($app) {
            return new TinkoffDriver(config('tinkoff'));
        });
        $this->app->singleton(TinkoffDriver::class, function ($app) {
            return new TinkoffDriver(config('tinkoff'));
        });
        $this->app->singleton('\professionalweb\payment\Tinkoff', function ($app) {
            return new TinkoffDriver(config('tinkoff'));
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [PayService::class, TinkoffDriver::class, '\professionalweb\payment\Tinkoff'];
    }
}