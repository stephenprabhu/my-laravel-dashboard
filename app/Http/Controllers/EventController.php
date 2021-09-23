<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
        public function create(Request $request){
           $event=new Event();
           $event->name=$request->name;
           if($request->allDay==null){
               $event->allDay=false;
           }else{
               $event->allDay=true;
           }
           $event->recurring='0';    //change once recurring is set up
            $event->type=$this->eventType($request->eventType);
           $event->startDate=$request->startDate;
           $event->startTime=$request->startTime;
           $event->endDate=$request->endDate;
           $event->endTime=$request->endTime;
           $event->reminderDate=$request->reminderDate;
           $event->reminderTime=$request->reminderTime;
           $event->location=$request->location;
           $event->description=$request->description;
           $event->save();
           return back();
        }

        protected function eventType($eventNum){
            switch ($eventNum){
                case 0: return "default";
                case 1: return "birthday";
                case 2:return "movie";
                case 3: return "other";
            }
        }
        public function show(){
            return Event::orderBy('startDate','DESC')->get();
        }
        public function show_page(){
            return view('events.events');
        }
}
