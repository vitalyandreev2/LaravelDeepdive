<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderformController extends Controller
{
    public function index()
    {
        return view('orderform');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'max:12'],
            'email' => ['required', 'email', 'max:255'],
            'info' => ['required'],
        ]);

        return response()->json(
            $request->only('name', 'phone', 'email', 'info'), 201
        );
    }
}
