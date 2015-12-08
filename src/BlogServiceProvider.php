<?php

namespace Efusionsoft\Blog;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;

class BlogServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        if (! $this->app->routesAreCached()) {
			$this->setupRoutes($this->app->router);
		}

		 $this->loadViewsFrom(__DIR__.'/views', 'blog');

    }
	
	/**
	 * Define the routes for the application.
	 *
	 * @param  \Illuminate\Routing\Router  $router
	 * @return void
	 */
	public function setupRoutes(Router $router)
	{
		$router->group(['namespace' => 'Efusionsoft\Blog\Http\Controllers'], function($router)
		{
			require __DIR__.'/Http/routes.php';
		});
	}

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        
    }
}
