<?php namespace Flaviozantut\Avatars;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;

class AvatarsClientIdCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'avatars:client_id';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Configure your http://avatars.oi client ID.';

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
        file_put_contents($configFile, preg_replace("/clientid\'\ \=\>\ \'" . app()['config']->get('avatars::clientid') . "/", "clientid' => '" . $this->argument('YOURAPPSCLIENTID'), file_get_contents($configFile)));
        $this->info('http://avatars.oi client ID updated.');
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return array(
            array('YOURAPPSCLIENTID', InputArgument::REQUIRED, 'Your http://avatars.oi client ID.'),
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
