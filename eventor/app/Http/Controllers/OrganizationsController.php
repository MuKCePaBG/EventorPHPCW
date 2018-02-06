<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrganizationsRequest;
use App\Organizator;


class OrganizationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $organizations = Organizator::paginate(5);
        return view('organizations.index')->with('organizations',$organizations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('organizations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrganizationsRequest $request)
    {
        $organizator = new Organizator([
            'name' => $request->get('name'),
            'mission' => $request->get('mission'),
            'founder' => $request->get('founder')
        ]);
        $organizator->save();
        return redirect('organizations')->with('message','Saved item !');
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
        $organizator = Organizator::find($id);
        return view('organizations.edit', compact('organizator','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OrganizationsRequest $request, $id)
    {
        $organizator = Organizator::find($id);
        $organizator->name = $request->get('name');
        $organizator->mission = $request->get('mission');
        $organizator->founder = $request->get('founder');
        $organizator->save();
        return redirect('organizations')->with('message', 'Successfully updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $organizator = Organizator::find($id);
        $organizator->delete();
        return redirect('organizations')->with('message','Deleted!');
    }
}
