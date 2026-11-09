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

class HomeController extends Controller
{


    public function index(): View
    {
        $events = Event::where('event_status', 'active')
            ->orderBy('date', 'desc')
            ->get();

        return view('pages.index')->with('events', $events);
    }

    // public function show(Event $event): View
    // {
    //     $events = Event::where('event_status', 'active');
    //     return view('pages.show', compact('event'));
    // }
    public function show($id)
    {
        $event = Event::findOrFail($id);

        return view('pages.show', compact('event'));
    }

    public function about(): View
    {


        return view('pages.about');
    }
    public function services(): View
    {


        return view('pages.services');
    }
    public function contact(): View
    {


        return view('pages.contact');
    }
}
