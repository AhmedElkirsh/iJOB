<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobSearchController extends Controller
{
    public function index()
    {
        // Load all jobs with their associated skills
        $jobs = Job::with('skills')->get();
        return view('job-search', compact('jobs'));
    }

    public function search(Request $request)
    {
        $query = Job::query();

        if ($request->has('position_title') && $request->position_title) {
            $query->where('position_title', 'like', '%' . $request->position_title . '%');
        }

        if ($request->has('employment_type') && $request->employment_type) {
            $query->where('employment_type', $request->employment_type);
        }

        if ($request->has('experience_level') && $request->experience_level) {
            $query->where('experience_level', $request->experience_level);
        }

        if ($request->has('industry') && $request->industry) {
            $query->where('industry', 'like', '%' . $request->industry . '%');
        }

        if ($request->has('location') && $request->location) {
            $query->where('location', 'like', '%' . $request->location . '%');
        }

        if ($request->has('latest') && $request->input('latest') === '1') {
            $query->orderBy('created_at', 'desc');
        }

        $jobs = $query->where('job_status', 'open')->with('skills')->paginate(10);

        return view('job-search', ['jobs' => $jobs]);
    }

    public function getJobDetails($id)
    {
        $selectedJob = Job::with('skills')->find($id);

        if (!$selectedJob) {
            return redirect()->back()->with('error', 'Job not found');
        }

        $jobs = Job::with('skills')->get(); // Fetch all jobs for listing

        return view('job-search', [
            'jobs' => $jobs,
            'selectedJob' => $selectedJob // Pass the selected job to the view
        ]);
    }

    public function apply(Request $request, Job $job)
    {
        return redirect()->back()->with('success', 'Application submitted successfully.');
    }
}
