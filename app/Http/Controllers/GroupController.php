<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Redirect;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Group/Index', [
            'groups' => Auth::user()->groups,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Group/Create');
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
        $group = Group::create([
            'owner' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description
        ]);

        Auth::user()->groups()->attach($group);

        return Redirect::route('groups.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group, Request $request)
    {
        // dd($request->date);
        $date = $request->date ?? Carbon::now()->format('d-m-Y');

        return Inertia::render('Group/Show', [
            'group' => $group,
            'expenses' => $group->expenses
                ->where('date', Carbon::parse($date)->format('Y-m-d')),
            'current_date' => $date
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
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
    public function update(Request $request, Group $group)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        //
    }

    /**
     * Display the settings menu
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function settings(Group $group)
    {
        return Inertia::render('Group/Settings', [
            'group' => $group
        ]);
    }

    /**
     * Display the recurrence menu
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function recurrence(Request $request, Group $group)
    {
        // dd($request->all());
        return Inertia::render('Group/Recurrence', [
            'group' => $group,
            'recurrences' => function () use ($group, $request) {
                if ($request->search) {
                    $search = $request->search;
                    return $group->recurrences->filter(function ($item) use ($search) {
                        return stripos($item['expense_description'], $search) !== false;
                    });
                }
                return $group->recurrences;
            },
        ]);
    }


    public function members(Request $request, Group $group)
    {
        // dd('In development :) ');
        return Inertia::render('Group/Members', ['group' => $group,]);
    }
}
