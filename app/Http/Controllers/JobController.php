<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Models\Qualification;
use App\Models\responsibility;
class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Job $job)
    {
        $jobs=$job->all();
        return view('jobs.index',compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJobRequest $request)
    {
        $validatedData = $request->validated();
        $jobData = [
            'position_title' => $validatedData['position_title'],
            'employment_type' => $validatedData['employment_type'],
            'experience_level' => $validatedData['experience_level'],
            'industry' => $validatedData['industry'],
            'job_description' => $validatedData['job_description'],
            'location' => $validatedData['location'],
            'job_status' => $validatedData['job_status'],
            'salary' => $validatedData['salary'],
        ];
        $responsibilityData = $validatedData['responsibility'];
        $qualificationData = $validatedData['qualification'];
        Job::create($jobData);
        responsibility::create($responsibilityData);
        Qualification::created($qualificationData);
        return redirect('jobs.index')->with('success', 'Job created successfully!');
        // dd($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job) // Only pass the Job model
    {
        return view('jobs.show', compact('job'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        return view('jobs.edit',compact('job'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJobRequest $request)
    {
        $validatedData = $request->validated();
        $jobData = [
            'position_title' => $validatedData['position_title'],
            'employment_type' => $validatedData['employment_type'],
            'experience_level' => $validatedData['experience_level'],
            'industry' => $validatedData['industry'],
            'job_description' => $validatedData['job_description'],
            'location' => $validatedData['location'],
            'job_status' => $validatedData['job_status'],
            'salary' => $validatedData['salary'],
        ];
        $responsibilityData = $validatedData['responsibility'];
        $qualificationData = $validatedData['qualification'];
        Job::update($jobData);
        responsibility::update($responsibilityData);
        Qualification::update($qualificationData);
        return redirect ('jobs.index')->with('success','updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job,responsibility $responsibility,Qualification $qualification)
    {
        $job->delete();
        $responsibility->delete();
        $qualification->delete();
        return redirect ('jobs.index')->with('success','Deleted successfully!');
    }
}
