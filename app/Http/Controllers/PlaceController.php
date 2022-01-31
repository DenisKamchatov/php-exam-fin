<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Place;
use App\Models\User;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $places = Place::all();
        return response()->json([
            'places' => $places
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
        $place = new Place();

        $place->name = request('name');
        $place->description = request('description');
        $place->repair = request('repair');
        $place->work = request('work');
        $place->save();

        return response()->json([
            'place' => $place
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
        $place = Place::findOrFail($id);
        return response()->json([
            'place' => $place
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
        $place = Place::findOrFail($id);
        return response()->json([
            'place' => $place,
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
        $place = Place::findOrFail($id);
        $place->name = request('name');
        $place->description = request('description');
        $place->repair = request('repair');
        $place->work = request('work');
        $place->save();

        return response()->json([
            'thing' => $place
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
        $place = Place::findOrFail($id);
        $result = ($place->delete());
        $response = [
            'result' => $result
        ];

        return response($response);
    }
}
