<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Justification;
use Illuminate\Http\Request;

class JustificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $justifications = Justification::all();
        return view('admin.justification-mgt.justifications', compact('justifications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'justification' => 'required',
        ]);

        Justification::create([
            'justification' => $request->justification,
        ]);

        return back()
            ->with('success', 'Justification created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Justification  $justification
     * @return \Illuminate\Http\Response
     */
    public function show(Justification $justification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Justification  $justification
     * @return \Illuminate\Http\Response
     */
    public function edit(Justification $justification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Justification  $justification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Justification $justification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Justification  $justification
     * @return \Illuminate\Http\Response
     */
    public function destroy(Justification $justification)
    {
        //
    }
}