<?php namespace Flaviozantut\Avatars;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;

class AvatarsSecretKeyCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'avatars:secret_key';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Configure your http://avatars.oi OAuth access token.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function fire()
    {
        $configFile =  __DIR__.'/../config/config.php';
        file_put_contents($configFile, preg_replace("/secretkey\'\ \=\>\ \'". app()['config']->get('avatars::secretkey') . "/", "secretkey' => '" . $this->argument('YOUROAUTHACCESSTOKEN'), file_get_contents($configFile)));
        $this->info('http://avatars.oi OAuth access token updated.');
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return array(
            array('YOUROAUTHACCESSTOKEN', InputArgument::REQUIRED, 'Your http://avatars.oi OAuth access token.'),
        );
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return array();
    }

}
