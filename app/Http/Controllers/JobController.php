<?php

namespace App\Http\Controllers;
use App\Models\RequiredSkill;
use App\Notifications\NewJobPosted;
use App\Models\User;
use App\Models\Job;
use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Models\Qualification;
use App\Models\responsibility;
use Request;
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
        // dd($request);
        // Create the job
        $job = Job::create([
            'position_title' => $request['position_title'],
            'employment_type' => $request['employment_type'],
            'experience_level' => $request['experience_level'],
            'industry' => $request['industry'],
            'job_description' => $request['job_description'],
            'location' => $request['location'],
            'job_status' => $request['job_status'],
            'salary' => $request['salary'],
            'employer_id' => $request['employer_id'],
        ]);

        // if ($job) {
        //     // Create responsibilities
        //     if (!empty($request['responsibilities'])) {
        //         foreach ($request['responsibilities'] as $responsibility) {
        //             Responsibility::create([
        //                 'job_id' => $job->id,
        //                 'responsibility' => $responsibility,
        //             ]);
        //         }
        //     }
        // } else {
        //     return redirect()->back()->with('error', 'Failed to create job.');
        // }
        notify()->success('Laravel Notify is awesome!');

        return redirect()->route('jobs.index')->with('success', 'Job created successfully!');
    }

        //*******************************************************************88 */
        // // $validatedData = $request->validated();
        // // dd($request);
        // $jobData = [
        //     'position_title' => $request['position_title'],
        //     'employment_type' => $request['employment_type'],
        //     'experience_level' => $request['experience_level'],
        //     'industry' => $request['industry'],
        //     'job_description' => $request['job_description'],
        //     'location' => $request['location'],
        //     'job_status' => $request['job_status'],
        //     'salary' => $request['salary'],
        //     'employer_id'=>$request['employer_id']
        // ];
        // $job=Job::create($jobData);
        // // dd($job->id);
        // // $responsibilityData=[
        // //     'job_id'=>$job->id,
        // //     'responsibility'=>$request['responsibilities']
        // // ];
        //         // Responsibility::create([
        //         //     'job_id' => $job->id,
        //         //     'responsibility' => $request['responsibility'],
        //         // ]);
        // // dd($responsibilityData);

        // if (!empty($validatedData['responsibilities'])) {
        //     foreach ($request['responsibilities'] as $responsibility) {
        //         Responsibility::create([
        //             'job_id' => $job->id,
        //             'responsibility' => $responsibility,
        //         ]);
        //     }
        // }
        // $qualificationData=[
        //     'qualification'=>$request['qualification']
        // ];
        // Qualification::create($qualificationData);
        // $qualificationData = $request['qualification'];
        // $job=responsibility::create($responsibilityData);
        // $job=Qualification::create($qualificationData);
        // send notification to users about last posted jobs

        // return redirect()->route('jobs.index')->with('success', 'Job created successfully!');
        // $skills_ids = $request['skills_ids'];
        // $skills_ids = $request->input('skills_ids');
        // $skills_array = explode(',', $skills_ids);
        // dd();


    /**
     * Display the specified resource.
     */
    public function show(Job $job) // Only pass the Job model
    {
        //sharing job post via social media
        if (!$job) {
            abort(404, 'Job not found');
        }
        $shareButtons=\Share::page(
            url('/jobs/' . $job->id),
            'here is text'
        )->facebook()
        ->telegram()
        ->linkedin()
        ->whatsapp()
        ->twitter();
        return view('jobs.show', compact('job','shareButtons'));
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
    public function update(UpdateJobRequest $request,Job $job)
    {
        dd($request);
        $jobData = [
            'position_title' => $request['position_title'],
            'employment_type' => $request['employment_type'],
            'experience_level' => $request['experience_level'],
            'industry' => $request['industry'],
            'job_description' => $request['job_description'],
            'location' => $request['location'],
            'job_status' => $request['job_status'],
            'salary' => $request['salary'],
        ];
        // $responsibilityData = $request['responsibility'];
        // $qualificationData = $request['qualification'];
        $job->update($jobData);
        // responsibility::update($responsibilityData);
        // Qualification::update($qualificationData);
        return redirect()->route('jobs.index')->with('success', 'Job updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job,responsibility $responsibility,Qualification $qualification)
    {
        $job->delete();
        $responsibility->delete();
        $qualification->delete();
        // foreach (user::all() as $user) {
        //     $user->notify(new NewJobPosted($jobb));
        // }
        return redirect()->route('jobs.index')->with('success', 'Job deleted successfully!');
    }
}
