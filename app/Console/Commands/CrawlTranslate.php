<?php

namespace App\Console\Commands;

use App\Services\CategoriesService;
use App\Services\UtilitiesService;
use Helpers\TranslateHelper;
use Illuminate\Console\Command;

class CrawlTranslate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'translate:crawl';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Translate after crawler';

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
        $trHelper = new TranslateHelper();
        $trHelper->translate(['id','name','address','memo'], UtilitiesService::class);
        $trHelper->translate(['id','name'], CategoriesService::class);
    }
}
