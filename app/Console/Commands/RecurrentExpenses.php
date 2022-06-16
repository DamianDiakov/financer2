<?php

namespace App\Console\Commands;

use App\Models\Expense;
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
        $recurrence_ids = [];
        $data = [];

        foreach ($recurrences as $row) {
            $recurrence_date = date('Y-m-d', strtotime("+{$row->period_value} {$row->period}", strtotime($row->last_updated)));

            if ($recurrence_date > $current_date) continue;

            $recurrence_ids[] =  $row->id;
            $data[] = [
                'amount' => $row->expense_amount,
                'description' => $row->expense_description,
                'date' => $current_date,
                'group_id' => $row->group_id,
                'user_id' => $row->user_id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }
        if (empty($data) && empty($recurrence_ids)) return;
        Expense::insert($data);
        DB::table('recurrences')->whereIn('id', $recurrence_ids)->update(['last_updated' => $current_date]);
    }
}
