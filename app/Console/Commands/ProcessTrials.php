<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\RegistrationTrial;
use Illuminate\Support\Facades\Log;

class ProcessTrials extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'process:trials';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Process trials and charge post trial payments.';

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
        RegistrationTrial::processActiveTrials();
    }
}
