<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sites;
use App\Http\Requests\Sites\EditRequest;
use App\Http\Requests\Sites\CreateRequest;

class SitesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.sites.index', ['sitesList' => Sites::paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sites.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EditRequest $request)
    {
        $sites = Sites::create($request->validated());
        if($sites) {
            return redirect()->route('admin.sites.index')->with('success', __('messages.admin.sites.create.success'));
        }
        return back()->with('error', __('messages.admin.sites.create.fail'));
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
    public function edit(Sites $site)
    {
        return view('admin.sites.edit', [
            'site' => $site
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateRequest $request, Sites $site)
    {
        $status = $site->fill($request->validated())->save();
        if($status) {
            return redirect()->route('admin.sites.index')->with('success', __('messages.admin.sites.update.success'));
        }
        return back()->with('error', __('messages.admin.sites.update.fail'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sites $site)
    {
        try {
            $site->delete();
            return response()->json(['status' => 'ok']);
        } catch (\Exception $e) {
            \Log::error("News wasn't delete");
            return response()->json(['status' => 'error'], 400);
        }
    }
}
