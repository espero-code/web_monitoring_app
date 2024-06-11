<?php

namespace App\Console\Commands;

use App\Http\Controllers\ModuleStatusController;
use Illuminate\Console\Command;

class GenerateModuleStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:modulestatus';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate module status and notify users';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $controller = new ModuleStatusController();
        $controller->generateModuleStatus();
        $this->info('Module statuses generated successfully.');
    }
}
