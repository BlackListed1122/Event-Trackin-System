<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\View\View;


class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)

    {
        $events = Event::where('event_status', 'active')
            ->orderBy('date', 'desc')
            ->get();
        $totalEvents = Event::where('event_status', 'active')
            ->count();
        $thisMonthEvents = Event::where('event_status', 'active')
            ->whereMonth('date', now()->month)
            ->whereYear('date', now()->year)
            ->count();
        $upcomingEvents = Event::where('event_status', 'active')
            ->whereDate('date', '>', now())
            ->count();

        $activeEvents = Event::where('event_status', 'active')->count();

        $archivedEvents = Event::where('event_status', 'archived')->count();

        $search = $request->search;

        $events = Event::where('event_status', 'active')
            ->when($search, function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('eventTitle', 'ILIKE', "%{$search}%")
                        ->orWhere('eventDescription', 'ILIKE', "%{$search}%")
                        ->orWhere('location', 'ILIKE', "%{$search}%")
                        ->orWhere('date', 'ILIKE', "%{$search}%")
                        ->orWhere('start_time', 'ILIKE', "%{$search}%")
                        ->orWhere('end_time', 'ILIKE', "%{$search}%")
                        ->orWhere('id', 'LIKE', "%{$search}%");
                });
            })
            ->orderBy('date', 'desc')
            ->get();

        return view('dashboard.index', compact('events', 'search', 'totalEvents', 'thisMonthEvents', 'upcomingEvents', 'activeEvents', 'archivedEvents'));

        // return view('dashboard.index')->with('events', $events);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
