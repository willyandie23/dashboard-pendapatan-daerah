<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppLogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return view('logs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('logs.show', [
            'id' => $id
        ]);
    }

}
