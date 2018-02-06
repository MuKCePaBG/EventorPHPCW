<?php

namespace App\Http\Controllers;

use App\Event;
use App\Http\Requests\EventRequest;
use App\Organizator;
use App\Sporttype;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::with('sportstypes','organizators')->paginate(5);
        return view('events.index',compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $organizators = Organizator::all()->pluck('name','id');
        $organizators = array('0' => 'Select Organizator') + $organizators->all();

        $sportstypes = Sporttype::all()->pluck('name','id');
        $sportstypes = array('0' => 'Select Sportstype') + $sportstypes->all();
        return view('events.create',compact('organizators','sportstypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventRequest $request)
    {
        $event = new Event([
            'name' => $request->get('name'),
            'date' => $request->get('date'),
            'duration' => $request->get('duration'),
            'organizator_id' =>$request->get('organizator_id'),
            'sportstype_id' =>$request->get('sportstype_id')
        ]);
        $event->save();
        return redirect('events')->with('message','Saved item !');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::find($id);
        $event->delete();
        return redirect('events')->with('message','Deleted!');
    }
}
