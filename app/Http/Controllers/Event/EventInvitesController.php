<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use App\Models\Event_invites;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEvent_invitesRequest;
use App\Http\Requests\UpdateEvent_invitesRequest;
use Illuminate\Support\Str;

class EventInvitesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {
        //
        $request->validate(
            [
                'email' => 'required',
                'event_id' => 'required'
            ],
        );
        do {
            $token = Str::random(10);
        } while (Event_invites::where('token', $token)->first());
        $event_id = $request->input('event_id');
        Event_invites::create([
            'email' => $request->input('email'),
            'event_id' => $event_id,
            'token' => $token
        ]);
        return redirect()->route('event-view', ['event' => $event_id]);
    }
    /**
     * Delete a record.
     *
     * @param  \App\Http\Requests
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $event = Event_invites::find($id);
        $event->delete();
        return response()->json(['status' => true, 'message' => "Attendee deleted successfully."]);
    }
    public function deleteMultiple(Request $request)
    {
        $ids = $request->ids;
        Event_invites::whereIn('id', explode(",", $ids))->delete();
        return response()->json(['status' => true, 'message' => "Attendees deleted successfully."]);
    }
    /**
     * Invite the user to an event
     *
     * @param  \App\Models\Event_invites  $event_invites
     * @return \Illuminate\Http\Response
     */
    public function invite()
    {
        return view('events.events-invite');
    }
}
