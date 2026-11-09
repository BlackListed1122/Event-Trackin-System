<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Event;

class RecentlyEventsController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(): View
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


        return view('recentlyEvents.index', compact('events', 'totalEvents', 'thisMonthEvents', 'upcomingEvents', 'activeEvents', 'archivedEvents'));
    }

    public function totalEvents(): View
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
        return view('recentlyEvents.showTotalEvents', compact('events', 'totalEvents', 'thisMonthEvents', 'upcomingEvents', 'activeEvents', 'archivedEvents'));
    }
    public function thisMonthEvents(): View
    {
        $events = Event::where('event_status', 'active')
            ->whereMonth('date', now()->month)
            ->whereYear('date', now()->year)
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
        return view('recentlyEvents.showThisMonthEvents', compact('events', 'totalEvents', 'thisMonthEvents', 'upcomingEvents', 'activeEvents', 'archivedEvents'));
    }

    public function upcomingEvents(): View
    {
        $events = Event::where('event_status', 'active')
            ->whereDate('date', '>', now())
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
        return view('recentlyEvents.showUpcomingEvents', compact('events', 'totalEvents', 'thisMonthEvents', 'upcomingEvents', 'activeEvents', 'archivedEvents'));
    }
    public function archivedEvents(): View
    {
        $events = Event::where('event_status', 'archived')
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
        return view('recentlyEvents.showArchivedEvents', compact('events', 'totalEvents', 'thisMonthEvents', 'upcomingEvents', 'activeEvents', 'archivedEvents'));
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
    public function search(Request $request)
    {
        $search = $request->search;

        $events = Event::where('eventTitle', 'like', "%{$search}%")
            ->orWhere('eventDescription', 'like', "%{$search}%")
            ->orWhere('location', 'like', "%{$search}%")
            ->orWhere('date', 'like', "%{$search}%")
            ->orWhere('start_time', 'like', "%{$search}%")
            ->orWhere('end_time', 'like', "%{$search}%")
            ->orWhere('id', 'like', "%{$search}%")
            ->orderBy('date')
            ->get();

        return view('recentlyEvents.index', compact('events', 'search'));
    }
}
