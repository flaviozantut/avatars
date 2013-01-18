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
		$this->registerCommands();
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
		$this->app['command.avatars.register'] = $this->app->share(function($app)
		{
			return new AvatarsRegisterCommand($app);
		});

		$this->commands(
			'command.avatars.secret_key',
			'command.avatars.client_id',
			'command.avatars.register'
		);
	}

}