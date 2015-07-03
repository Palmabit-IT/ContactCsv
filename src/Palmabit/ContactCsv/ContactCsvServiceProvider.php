<?php namespace Palmabit\ContactCsv;

use Illuminate\Support\ServiceProvider;

class ContactCsvServiceProvider extends ServiceProvider
{


	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	protected $basePath = '/package/Palmabit/ContactCsv/';

	/**
	 * @override
	 */
	public function boot()
	{
		$this->publishConfig();
	}

	protected function publishConfig()
	{
		$this->publishes([
			__DIR__ . '/config/config.php' => config_path($this->getBasePath() . 'config.php'),
			__DIR__ . '/config/fields.php' => config_path($this->getBasePath() . 'fields.php'),
			__DIR__ . '/data/data.csv'     => base_path('/data/data.csv')
		]);
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->mergeConfigFrom(__DIR__ . '/config/fields.php', 'ContactCsv::fields');
		$this->mergeConfigFrom(__DIR__ . '/config/config.php', 'ContactCsv::config');
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

	/**
	 * @return string
	 */
	public function getBasePath()
	{
		return $this->basePath;
	}

}
