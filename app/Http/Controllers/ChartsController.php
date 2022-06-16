<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use stdClass;

class ChartsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Group $group)
    {

        $this->prepare_piechart_data($group->id);
        return Inertia::render('Group/Charts', [
            'group' => $group,
            'bar' => $this->prepare_barchart_data($group->id),
            'pie' => $this->prepare_piechart_data($group->id)
        ]);
    }

    /**
     * Prepares the Bar Chart data for the frontend
     *
     * @param [integer] $id
     * @return array
     */
    function prepare_barchart_data($id): array
    {
        $bar_chart = DB::table('expenses')
            ->selectRaw('SUM(amount) AS amount, MONTH(DATE) AS month')
            ->where('group_id', $id)
            ->whereRaw('YEAR(DATE) = ?', [Carbon::now()->year])
            ->groupByRaw('MONTH(expenses.DATE)')
            ->get();

        $data = array_fill(0, 11, 0);
        foreach ($bar_chart as $row) {
            $data[$row->month - 1] = $row->amount;
        }

        return $data;
    }

    /**
     * Prepares the Bar Chart data for the frontend
     *
     * @param [integer] $id
     * @return object
     */
    function prepare_piechart_data($id): object
    {
        $pie_chart = DB::table('expenses')
            ->selectRaw('COUNT(expenses.id) AS contributions,user_id, users.name as name')
            ->join('users', 'users.id', '=', 'expenses.user_id')
            ->where('group_id', $id)
            ->whereRaw('YEAR(DATE) = ?', [Carbon::now()->year])
            ->orderByRaw('contributions DESC')
            ->groupBy('user_id')
            ->get();

        $colors = ["#41B883", "#B52525", "#00D8FF", "#DD1B16", 'C1DE33', 'DAD2D0'];
        $data = new stdClass;
        $data->datasets = [new stdClass];
        $data->datasets[0]->backgroundColor = $colors;

        $last = 0;
        foreach ($pie_chart as $row) {

            if ($last < 4) {
                $last++;
                $data->labels[] = $row->name;
                $data->datasets[0]->data[] = $row->contributions;
            } else {
                $data->labels[$last] = 'Other';
                $data->datasets[0]->data[$last] += $row->contributions;
            }
        }
        return $data;
    }

    /**
     * object
     * {
     *      label: Array
     *      datasets:
     *      {
     *          backgroundColor: ["#41B883", "#E46651", "#00D8FF", "#DD1B16"],
     *          data: [40, 20, 80, 10], 
     *      }
     * }
     */
}
