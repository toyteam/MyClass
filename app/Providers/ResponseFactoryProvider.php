<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Illuminate\Support\Str;

class ResponseFactoryProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('Illuminate\Contracts\Routing\ResponseFactory', function ($app) {
                return new MyCustomResponseFactoryExtendedFromResponseFactory($app['Illuminate\Contracts\View\Factory'], $app['redirect']);
        });
    }
}

// To avoid laravel bugs "The filename fallback must only contain ASCII characters."
class MyCustomResponseFactoryExtendedFromResponseFactory extends \Illuminate\Routing\ResponseFactory
{
    public function download($file, $name = null, array $headers = array(), $disposition = 'attachment')
    {

        $response = new BinaryFileResponse($file, 200, $headers, true);

        if (is_null($name))
            {
                    $name = basename($file);
            }

        return $response->setContentDisposition($disposition, $name, Str::ascii($name));
    }
}