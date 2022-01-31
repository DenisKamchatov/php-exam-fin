<?php

namespace App\Http\Controllers;

use App\Queue\MyQueue;
use Illuminate\Http\Request;
use App\Models\Thing;
use App\Models\ThingDescription;
use App\Models\User;

class ThingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $things = Thing::all();
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
        $thing = new Thing();
        $thing->name = request('name');
        $thing->description = request('description');
        $thing->wrnt = request('wrnt');
        $thing->master = request('master');

        $master = User::find($thing->master);

        $thing->master()->associate($master);
        $result = $thing->save();

        $td = new ThingDescription();
        $td->description = $thing->description;
        $td->thing_id = $thing->id;

        $td->save();

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
        $things = Thing::findOrFail($id);
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
        $thing = Thing::findOrFail($id);
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
        $thing = Thing::findOrFail($id);

        $currentDescription = $thing->description;

        $thing->name = request('name');
        $thing->description = request('description');
        $thing->wrnt = request('wrnt');
        $thing->master = request('master');

        $master = User::find($thing->master);

        $thing->master()->associate($master);
        $thing->save();

        $thing->master = $master;

        if ($currentDescription != $thing->description) {
            $td = new ThingDescription();
            $td->thing_id = $thing->id;
            $td->description = $thing->description;
            $td->save();
        }

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
        $thing = Thing::findOrFail($id);
        $result = ($thing->delete());
        $response = [
            'result' => $result
        ];

        return response($response);
    }

    public function give(Request $request)
    {
        $thingId = request('thingId');
        $userId = request('userId');

        $thing = Thing::findOrFail($thingId);
        $thing->master = $userId;
        $master = User::find($thing->master);
        $thing->master()->associate($master);
        $thing->save();

        $response = [
            'thing' => $thing
        ];

        return response($response);
    }

    public function description(Request $request, $id)
    {
        $td = ThingDescription::where('thing_id', '=', $id)->get();

        $response = [
            'descriptions' => $td
        ];

        return response($response);
    }
}
