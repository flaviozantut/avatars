<?php namespace Flaviozantut\Avatars;

use Illuminate\Support\ServiceProvider;

class AvatarsServiceProvider extends ServiceProvider {

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
		$this->package('flaviozantut/avatars');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{


		$this->app['config']->package('flaviozantut/avatars', __DIR__.'/../../config');

		$this->app->singleton('avatars', function($app)
		{
		    return new Avatars($this->app['config']->get('avatars::clientid'), $this->app['config']->get('avatars::secretkey'));
		});
		$this->registerCommands();

		include __DIR__.'/routes.php';
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
	 * Register the artisan commands.
	 *
	 * @return void
	 */
	private function registerCommands()
	{
		$this->app['command.avatars.client_id'] = $this->app->share(function($app)
		{
			return new AvatarsClientIdCommand($app);
		});
		$this->app['command.avatars.secret_key'] = $this->app->share(function($app)
		{
			return new AvatarsSecretKeyCommand($app);
		});

		$this->commands(
			'command.avatars.secret_key',
			'command.avatars.client_id'
		);
	}

}