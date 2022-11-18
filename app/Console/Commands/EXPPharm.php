<?php

namespace App\Console\Commands;

use App\Models\pharmacy;
use Illuminate\Console\Command;

class EXPPharm extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pharm:expire';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $pharmcy = pharmacy::where('expire',0)->get();

        foreach($pharmcy as $pharmcy)
        {
         $pharmcy->update(['expire'=>1]);
        }
    }
}
