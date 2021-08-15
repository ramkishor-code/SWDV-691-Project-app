<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\db;

class routine_check extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'routine_check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'this command will be scheduled to run every min in order to check all the logics and fill
    pending bill bucket';

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
     * @return int
     */
    public function handle()
    {

        
        return 0;
    }
}
