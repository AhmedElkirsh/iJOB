<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use App\Models\Application;
use App\Models\Job;
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
        $status = $request->input('status');
    
        $applicationsQuery = $selectedJobId ? Job::find($selectedJobId)->applications() : Application::query();
    
        if ($status) {
            $applicationsQuery->where('status', $status);
        }
    
        $applications = $applicationsQuery->get();
    
        return view('employer.applications', [
            'jobs' => $jobs,
            'employer' => $employer,
            'applications' => $applications,
            'selectedJobId' => $selectedJobId,
            'status' => $status,
        ]);
    }
    


    public function showApplicationsByStatus(Request $request, $user_id)
    {
        $employer = Employer::find($user_id);
    
        if (!$employer) {
            return redirect()->back()->with('error', 'Employer not found.');
        }
    
        $jobs = $employer->jobs;
    
        $selectedJobId = $request->input('job_id');
        $status = $request->input('status');
    
        $selectedJob = $selectedJobId ? $jobs->find($selectedJobId) : null;
        $applications = [];
    
       
        if ($selectedJob) {
            $applications = $selectedJob->applications()->where('status', $status)->get();
        } else {
            return redirect()->back()->with('error', 'Selected job not found.');
        }

        
    
        return view('employer.applications_by_status', [
            'jobs' => $jobs,
            'employer' => $employer,
            'applications' => $applications,
            'selectedJob' => $selectedJob,
            'status' => $status,
        ]);
    }
    
    
    


    public function acceptApplication(Application $application)
    {
        $application->status = 'active';
        $application->save();

        return redirect()->back()->with('status', 'Application accepted.');
    }

    public function rejectApplication(Application $application)
    {
        $application->status = 'contacted';
        $application->save();

        return redirect()->back()->with('status', 'Application rejected.');
    }

    public function viewApplication(Application $application)
    {
        $application->status = 'reviewed';
        $application->save();

        return redirect()->back()->with('status', 'Application reviewed.');
    }
    
}
