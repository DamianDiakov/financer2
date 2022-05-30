<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class RecurrentExpenses extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reccurence:daily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Insert the recurrent expeness into the expenses table';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $recurrences = DB::table('recurrences')->get();
        $current_date = date('Y-m-d', time());

        foreach ($recurrences as $row) {
            $recurrence_date = date('Y-m-d', strtotime("-{$row->period_value} {$row->period}", strtotime($row->last_updated)));
            if ($current_date > $recurrence_date) continue;
        }
    }
}
