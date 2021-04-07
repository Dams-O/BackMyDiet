<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class WordOfTheDay extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'calcul:deux';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'calcul de 2 * 2';

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
        return 2 * 2;
    }
}
