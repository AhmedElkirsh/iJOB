<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use App\Models\Application;
use Illuminate\Http\Request;

use App\Http\Requests\StoreEmployerRequest;
use App\Http\Requests\UpdateEmployerRequest;

class EmployerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Employer $employer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employer $employer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployerRequest $request, Employer $employer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employer $employer)
    {
        //
    }

    public function showApplications(Request $request, $user_id)
    {
       
        $employer = Employer::find($user_id);

        if (!$employer) {
            return redirect()->back()->with('error', 'Employer not found.');
        }

        
        $jobs = $employer->jobs;

       
        $selectedJobId = $request->input('job_id');

        
        $applications = [];

        if ($selectedJobId) {
            
            $selectedJob = $jobs->find($selectedJobId);

            if ($selectedJob) {
                
                $applications = $selectedJob->applications;
            }
        }


        return view('employer.applications', [
            'jobs' => $jobs,
            'employer' => $employer,
            'applications' => $applications,
            'selectedJobId' => $selectedJobId,
        ]);
    }
    
}
