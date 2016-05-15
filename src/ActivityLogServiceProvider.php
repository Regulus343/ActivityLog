<?php namespace Regulus\ActivityLog;

use Illuminate\Support\ServiceProvider;

class ActivityLogServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->publishes([
			__DIR__.'/config/log.php' => config_path('log.php'),
			__DIR__.'/lang'           => resource_path('lang/vendor/activity-log'),
		]);

		$this->publishes([
			__DIR__.'/migrations' => database_path('migrations'),
		], 'migrations');

		$this->loadTranslationsFrom(__DIR__.'/lang', 'activity-log');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return [];
	}

}