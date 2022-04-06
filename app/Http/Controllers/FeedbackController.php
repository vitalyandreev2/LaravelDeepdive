<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FeedbackController extends Controller
{

    public function index()
    {
        return view('feedback');
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
            'name' => ['required', 'string']
        ]);

        // save and send

        return redirect()->route('feedback')
            ->with('success', 'Ваше сообщение успешно отправлено');
    }
}
