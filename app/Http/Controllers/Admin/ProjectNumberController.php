<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\ProjectNumber;
use Illuminate\Http\Request;

class ProjectNumberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projectNumbers = ProjectNumber::all();
        return view('admin.project-number-mgt.project-number', compact('projectNumbers'));
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
        // dd($request->all());
        $this->validate($request, [
            'project_number' => 'required',
        ]);

        ProjectNumber::create([
            'project_number' => $request->project_number,
        ]);

        return back()
            ->with('success', 'Project Number created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\ProjectNumber  $projectNumber
     * @return \Illuminate\Http\Response
     */
    public function show(ProjectNumber $projectNumber)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\ProjectNumber  $projectNumber
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectNumber $projectNumber)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\ProjectNumber  $projectNumber
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProjectNumber $projectNumber)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\ProjectNumber  $projectNumber
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectNumber $projectNumber)
    {
        //
    }
}