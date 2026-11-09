<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\View\Components\Search;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use phpDocumentor\Reflection\Location;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::where('event_status', 'active')
            ->orderBy('date', 'desc')
            ->get();


        return view('events.index')->with('events', $events);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request): RedirectResponse
    // {

    //     // $validatedData = $request->validate([
    //     //     'eventTitle' => 'required|string|max:255',
    //     //     'eventDescription' => 'required|string|max:255',
    //     //     'date' =>  'required|string|max:255',
    //     //     'location' =>  'required|string|max:255',
    //     //     'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    //     //     'pdf' => 'nullable|file|mimes:pdf|max:10000',

    //     // ]);
    //     // // Use function

    //     // $path = $request->file('avatar')->store('avatar', 'public');

    //     // // Add path to validated data
    //     // $validatedData['avatar'] = $path;
    //     // Events::create($validatedData);
    //     // return redirect()->route('events.index');
    //     $validatedData = $request->validate([
    //         'eventTitle' => 'required|string|max:255',
    //         'eventDescription' => 'required|string',
    //         'date' => 'required|date|after:today',
    //         'start_time' => 'required|date_format:H:i',
    //         'end_time' => 'required|date_format:H:i|after:start_time',
    //         // 'date' => 'required|string|max:255',

    //         // 'date' => [

    //         //     'required',

    //         //     'date',

    //         //     'after:today',

    //         //     Rule::unique('events_listings', 'date'),
    //         // ],
    //         // 'start_time' => 'required|date_format:H:i',
    //         // 'end_time' => 'required|date_format:H:i|after:start_time',

    //         'location' => 'required|string|max:255',

    //         'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

    //         'pdf' => 'nullable|file|mimes:pdf|max:10000',

    //     ]);


    //     // Store Image
    //     if ($request->hasFile('image')) {

    //         $imagePath = $request
    //             ->file('image')
    //             ->store('events/images', 'public');

    //         $validatedData['image'] = $imagePath;
    //     }

    //     // Store PDF
    //     if ($request->hasFile('pdf')) {

    //         $pdfPath = $request
    //             ->file('pdf')
    //             ->store('events/pdfs', 'public');

    //         $validatedData['pdf'] = $pdfPath;
    //     }

    //     // Save to database
    //     Event::create($validatedData);

    //     return redirect()->route('events.index');
    // }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'eventTitle' => 'required|string|max:255',
            'eventDescription' => 'required|string',

            'date' => [
                'required',
                'date',
                'after:today',
            ],

            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',

            'location' => 'required|string|max:255',
            // Accept multiple image formats
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif,webp,bmp|max:20480',
            'pdf' => 'nullable|file|mimes:pdf|max:10000',
        ]);

        // CHECK IF THE SAME DATE + START TIME + END TIME ALREADY EXISTS
        $exists = Event::where('date', $validatedData['date'])
            ->where(function ($query) use ($validatedData) {
                $query->where('start_time', '<', $validatedData['end_time'])
                    ->where('end_time', '>', $validatedData['start_time']);
            })
            ->exists();

        if ($exists) {
            return back()
                ->withErrors([
                    'start_time' => 'The selected time overlaps with another event on this date.',
                ])
                ->withInput();
        }

        // Upload image
        if ($request->hasFile('image')) {
            $validatedData['image'] = $request->file('image')->store('events/images', 'public');
        }

        // Upload PDF
        if ($request->hasFile('pdf')) {
            $validatedData['pdf'] = $request->file('pdf')->store('events/pdfs', 'public');
        }

        Event::create($validatedData);

        return redirect()->route('events.index')
            ->with('success', 'Event created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        return view('events.show')->with('event', $event);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        return view('events.edit')->with('event', $event);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        $validatedData = $request->validate([
            'eventTitle' => 'required|string|max:255',
            'eventDescription' => 'required|string',

            'date' => 'required|string|max:255',

            // 'date' => [

            //     'required',

            //     'date',

            //     'after:today',

            //     Rule::unique('events_listings', 'date'),
            // ],
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',

            'location' => 'required|string|max:255',

            // Accept multiple image formats
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif,webp,bmp|max:20480',

            'pdf' => 'nullable|file|mimes:pdf|max:10000',
        ]);

        // Image Upload
        if ($request->hasFile('image')) {

            $imagePath = $request
                ->file('image')
                ->store('events/images', 'public');

            $validatedData['image'] = $imagePath;
        }

        // PDF Upload
        if ($request->hasFile('pdf')) {

            $pdfPath = $request
                ->file('pdf')
                ->store('events/pdfs', 'public');

            $validatedData['pdf'] = $pdfPath;
        }

        // Update
        $event->update($validatedData);

        return redirect()
            ->route('events.index')
            ->with('success', 'Event updated successfully.');
    }
        // $validatedData = $request->validate([
        //     'eventTitle' => 'required|string|max:255',
        //     'eventDescription' => 'required|string|max:255',
        //     'date' => 'required|string|max:255',
        //     'location' => 'required|string|max:255',
        //     'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        //     'pdf' => 'nullable|file|mimes:pdf|max:10000',
        // ]);

        // // Store Image
        // if ($request->hasFile('image')) {

        //     $imagePath = $request
        //         ->file('image')
        //         ->store('events/images', 'public');

        //     $validatedData['image'] = $imagePath;
        // }

        // // Store PDF
        // if ($request->hasFile('pdf')) {

        //     $pdfPath = $request
        //         ->file('pdf')
        //         ->store('events/pdfs', 'public');

        //     $validatedData['pdf'] = $pdfPath;
        // }


        // //Submit to the database
        // $event->update($validatedData);

        // return redirect()->route('events.index')->with('success', 'Job updated successfully.');







    /**
     * Remove the specified resource from storage.
     */
    //@desc delete a job listing
    //@route DELETE /jobs/{$id}
    public function destroy($id)
    {
        $event = Event::findOrFail($id);

        $event->update([
            'event_status' => 'archived',
        ]);
        //check if the request came from the dashboard
        if (request()->query('from') == 'dashboard') {

            return redirect::route('dashboard')->with('success', 'Event deleted successfully.');
        }


        return redirect::route('events.index')->with('success', 'Event deleted successfully.');
    }

    public function destroyArchiveEvents($id)
    {
        $event = Event::findOrFail($id);

        // Delete associated files if necessary
        if ($event->image && file_exists(public_path($event->image))) {
            unlink(public_path($event->image));
        }

        if ($event->pdf && file_exists(public_path($event->pdf))) {
            unlink(public_path($event->pdf));
        }

        $event->delete();

        return redirect()->back()->with('success', 'Archived event deleted successfully!');
    }
}
