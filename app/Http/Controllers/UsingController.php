<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Place;
use App\Models\Using;

class UsingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usages = Using::All();
        return response()->json([
            'usages' => $usages
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
        $usage = new Using();

        $usage->thing_id = request('thingId');
        $usage->place_id = request('placeId');
        $usage->user_id = request('userId');
        $usage->amount = request('amount');
        $usage->save();

        return response()->json([
            'usage' => $usage
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
        $usages = Using::findOrFail($id);
        return response()->json([
            'usages' => $usages
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
        $usage = Using::findOrFail($id);
        return response()->json([
            'usage' => $usage,
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
        $usage = Using::findOrFail($id);
        $usage->thing_id = request('thingId');
        $usage->place_id = request('placeId');
        $usage->user_id = request('userId');
        $usage->amount = request('amount');
        $usage->save();

        return response()->json([
            'usage' => $usage
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
        $usage = Using::findOrFail($id);
        $result = ($usage->delete());
        $response = [
            'result' => $result
        ];

        return response($response);
    }
}
