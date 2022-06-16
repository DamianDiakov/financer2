<?php

namespace App\Http\Controllers;

use App\Models\Recurrence;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class RecurrenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        Recurrence::create([
            'group_id' => $request->group_id,
            'user_id' => auth()->user()->id,
            'period' => $request->period,
            'period_value' => $request->period_value,
            'expense_amount' => $request->amount,
            'expense_description' => $request->description,
            'active_to' => Carbon::now()->addYear(),
            'last_updated' => Carbon::now(),
            'active' => 1,
        ]);
        return Redirect::back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Recurrence  $recurrence
     * @return \Illuminate\Http\Response
     */
    public function show(Recurrence $recurrence)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Recurrence  $recurrence
     * @return \Illuminate\Http\Response
     */
    public function edit(Recurrence $recurrence)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Recurrence  $recurrence
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recurrence $recurrence)
    {
        // dd($request->all());
        $recurrence->update([
            'expense_amount' => $request->amount,
            'expense_description' => $request->description,
            'period' => $request->period,
            'period_value' => $request->period_value,
        ]);
        return Redirect::back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recurrence  $recurrence
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recurrence $recurrence)
    {
        //
    }
}
