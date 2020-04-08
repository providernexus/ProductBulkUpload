<?php

namespace ProductBulkUpload\Providers;
use Illuminate\Support\ServiceProvider;

class ProductBulkUploadServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // load base service providers
        $this->app->register('App\Providers\ComposerServiceProvider');

        // load the routes
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        
        // load the views
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'productbulkupload');
    }

    public function register()
    {
        
    }
}