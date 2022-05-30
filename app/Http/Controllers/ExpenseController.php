<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Group;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        Expense::create([
            'amount' => $request->amount,
            'description' => $request->description,
            'date' => Carbon::parse($request->date)->format('Y-m-d'),
            'group_id' => $request->groupId,
            'user_id' => auth()->user()->id
        ]);

        return Redirect::route(
            'groups.show',
            [
                'date' => $request->date,
                'group' => $request->groupId
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Expense $expense, Request $request)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Expense $expense)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expense $expense)
    {
        $expense->update([
            'amount' => $request->amount,
            'description' => $request->description,
        ]);
        return Redirect::route(
            'groups.show',
            [
                'date' => $request->date,
                'group' => $request->groupId
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Expense $expense)
    {
        $expense->delete();
        return Redirect::route(
            'groups.show',
            [
                'date' => $request->date,
                'group' => $request->groupId
            ]
        );
    }
}
