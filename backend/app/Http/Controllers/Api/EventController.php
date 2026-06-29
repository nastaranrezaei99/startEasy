<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::get();

        return response()->json($events);
    }

    public function store(Request $request)
    {
        $event = new Event();

        $event->title = $request->input('title');
        $event->date = $request->input('date');
        $event->time = $request->input('time');
        $event->location = $request->input('location');
        $event->participants = 0;

        $event->save();

        return response()->json($event);
        
    }
    public function join($id)
{
        $event = Event::find($id);

        $event->participants++;

        $event->save();

        return response()->json($event);
}
}