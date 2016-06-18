<?php

namespace BovinApp\Http\Controllers;

use Illuminate\Http\Request;

use BovinApp\Http\Requests;
use BovinApp\EventModel;

class CalendarEventController extends Controller
{
    public function Calendar()
    {      	
    	
    	$events=EventModel::all();//dd($events);

    	
  

		$eloquentEvent = EventModel::first();  //EventModel implements MaddHatter\LaravelFullcalendar\Event

		$calendar = \Calendar::addEvents($events)
		 //add an array with addEvents
		    ->addEvent($eloquentEvent, [ //set custom color fo this event
		        'color' => '#FFFFFF',
		    ])->setOptions([ //set fullcalendar options
		        'firstDay' => 0
		    ]);

		    //dd($calendar);

		return view('calendar.calendar', compact('calendar'));
	}
}
