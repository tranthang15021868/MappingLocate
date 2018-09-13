<?php

namespace App\Console\Commands;

use Helpers\VendingMachineHelper;
use Illuminate\Console\Command;

class CrawlVendingMachine extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crawl:vd_machine';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $helper = new VendingMachineHelper();
        $helper->crawl();
    }
}
