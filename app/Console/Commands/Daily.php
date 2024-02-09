<?php

namespace App\Console\Commands;

use App\Http\Controllers\InvoiceController;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;


class Daily extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:daily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {



        app()->call(function () {
            $con = new InvoiceController();
            $con->import();
        });

        Log::info("Daily wurde durchgeführt");
    }
}
