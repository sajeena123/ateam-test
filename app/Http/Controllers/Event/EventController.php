<?php
namespace App\Http\Controllers\Event;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {

        $today = Carbon::now()->format('Y-m-d');
        $upcomingEvents = Event::where('end_date', '>', $today)
            ->orderBy('start_date', 'desc')
            ->get();
        $pastEvents = Event::where('end_date', '<', $today)
            ->orderBy('start_date', 'desc')
            ->get();
        return view('events.events-list')
            ->with('upcomingEvents', $upcomingEvents)
            ->with('pastEvents', $pastEvents);
    }
    public function view(Event $event)
    {

       $attendees =$event->event_invites;


        return view('events.event-view')->with('event', $event)->with('attendees', $attendees);
    }
    public function add()
    {
        return view('events.event-add');
    }
    public function save(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'start_date' => 'required',
            'end_date' => 'required|after:start_date',
        ]);
        Event::create([
            'title' => $request->input('title'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'user_id' => $request->user()->id
        ]);
        return redirect()->intended('events');
    }
}
