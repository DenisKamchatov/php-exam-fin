<?php

namespace App\Http\Controllers;

use App\Queue\MyQueue;
use Illuminate\Http\Request;
use App\Models\Thing;
use App\Models\ThingDescription;
use App\Models\User;

class ThingDescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $things = ThingDescription::all();
        return response()->json([
            'things' => $things
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $td = new ThingDescription();
        $td->description = request('description');
        $td->thing_id = request('thingId');

        $thing = Thing::find($td->thing_id);
        $thing->description()->associate($td);

        $result = $thing->save();

        if ($result) {
            MyQueue::dispatch($thing);
        }

        return response()->json([
            'thing' => $thing
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $things = ThingDescription::findOrFail($id);
        return response()->json([
            'things' => $things
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $thing = ThingDescription::findOrFail($id);
        return response()->json([
            'thing' => $thing,
        ]);
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
        $td = ThingDescription::findOrFail($id);
        $td->description = request('description');
        $td->thing_id = request('thingId');

        $thing = Thing::find($td->thing_id);
        $thing->description()->associate($td);

        $thing->save();

        return response()->json([
            'thing' => $thing
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $td = ThingDescription::findOrFail($id);
        $result = ($td->delete());
        $response = [
            'result' => $result
        ];

        return response($response);
    }
}
