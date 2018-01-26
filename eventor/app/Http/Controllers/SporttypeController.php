<?php

namespace App\Http\Controllers;

use App\Http\Requests\SporttypeRequest;
use App\Sporttype;

class SporttypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sportstype = Sporttype::paginate(5);
        return view('sporttypes.index')->with('sportstype',$sportstype);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sporttypes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SporttypeRequest $request)
    {
        $sportstype = new Sporttype([
            'name' => $request->get('name'),
            'description' => $request->get('description')
        ]);
        $sportstype->save();
        return redirect('sporttypes')->with('message','Saved item !');
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
        $sportstype = Sporttype::find($id);
        return view('sporttypes.edit', compact('sportstype','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SporttypeRequest $request, $id)
    {
        $sportstype = Sporttype::find($id);
        $sportstype->name = $request->get('name');
        $sportstype->description = $request->get('description');
        $sportstype->save();
        return redirect('sporttypes')->with('message', 'Successfully updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sportstype = Sporttype::find($id);
        $sportstype->delete();
        return redirect('sporttypes')->with('message','Deleted!');
    }
}
