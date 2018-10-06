<?php

namespace LBC\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use LBC\User;

class Start extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'LBC:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Initialize the project';

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
        if (!is_dir(resource_path('views/auth'))) {
            Artisan::call('make:auth');
        }

        Artisan::call('migrate:refresh');

        if (0 === User::count()) {
            Artisan::call('db:seed');
            $this->fileMode(storage_path());
            $this->fileMode(base_path('bootstrap'));
        }
    }

    private function fileMode($pathname)
    {
        $iterator = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($pathname));

        foreach($iterator as $item) {
            chmod($item, 0777);
        }
    }
}
