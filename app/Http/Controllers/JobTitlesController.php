<?php

namespace App\Http\Controllers;

use App\JobTitle;
use Illuminate\Http\Request;

class JobTitlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $job_titles = JobTitle::all();

        return view('/job_titles.index', ['job_titles' => $job_titles]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // display form to create new job title
        return view('/job_titles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // first validate
        $attributes = request()->validate([
            'job_title_name'    =>  ['required', 'min:5', 'max:255']
        ]);

        JobTitle::create($attributes);

        return redirect('/job_titles')->with('message', 'Job Title "' . request('job_title_name') . '" Successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\JobTitle  $jobTitle
     * @return \Illuminate\Http\Response
     */
    public function show(JobTitle $jobTitle)
    {
        // currently integrated with index due to small amount of data
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\JobTitle  $jobTitle
     * @return \Illuminate\Http\Response
     */
    public function edit(JobTitle $jobTitle)
    {
        // currently integrated with index due to small amount of data
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\JobTitle  $jobTitle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JobTitle $jobTitle)
    {
        // first validate
        $attributes = request()->validate([
            'job_title_name'    =>  ['required', 'min:5', 'max:255']
        ]);

        $jobTitle->update($attributes);

        return redirect('/job_titles')->with('message', 'Job Title "' . $jobTitle->job_title_name . '" Successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\JobTitle  $jobTitle
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobTitle $jobTitle)
    {
        //
        JobTitle::destroy($jobTitle->job_title_id);

        return redirect('/job_titles')->with('message', 'Job Title "' . $jobTitle->job_title_name . '" Successfully deleted');
    }
}
