<?php

namespace App\Http\Controllers\dtable;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Event;
use Redirect,Response;

class AjaxCrudEventController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return view('dtable.custom_filter');
    }

    public function get_custom_event(){
        $eventQuery = Event::with('creator');

       $start_date = (!empty($_GET["start_date"])) ? ($_GET["start_date"]) : ('');
        $end_date = (!empty($_GET["end_date"])) ? ($_GET["end_date"]) : ('');

        if($start_date && $end_date){

         $start_date = date('Y-m-d', strtotime($start_date));
         $end_date = date('Y-m-d', strtotime($end_date));

         $eventQuery->whereRaw("date(events.start_date) >= '" . $start_date . "' AND date(events.end_date) <= '" . $end_date . "'")
         ->orwhereRaw("date(events.start_date) <= '" . $start_date . "' AND date(events.end_date) >= '" . $end_date . "'");


        }

        $events = $eventQuery->select('*');

        return datatables()->of($events)
        ->addColumn('creator', function($events) {
            return $events->creator->first_name;
        })
            ->make(true);

    }
    public function get_statistics()
    {

    }

}
