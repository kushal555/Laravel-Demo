<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Deploy extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'deploy {--env= : Provide the env for your application}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make your code without cache and ready webpack';

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
     * @return mixed
     */
    public function handle()
    {
        $env = $this->option('env')?: 'dev';
        $bar = $this->output->createProgressBar(6);
        $bar->start();

        $this->info('Clearing the cache');
        $this->call('cache:clear');
        $bar->advance();

        $this->info('Clearing the view');
        $this->call('view:clear');
        $bar->advance();

        $this->info('Route the view');
        $this->call('route:clear');
        $bar->advance();

        $this->info('Going to run the migration');
        $this->call('migrate');
        $bar->advance();

        $this->info('Going to run the composer dump-autoload');
        exec('composer dump-autoload');
        $bar->advance();

        $this->info('Going to run the npm command');
        exec('npm run '.$env);
        $bar->advance();


        $bar->finish();
    }
}
