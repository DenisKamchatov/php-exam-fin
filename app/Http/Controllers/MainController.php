<?php

namespace App\Http\Controllers;

use App\Models\Thing;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $things = Thing::all();
        return view('pages.main-page', [
            'things' => $things
        ]);
    }
}
