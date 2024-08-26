<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeApplicationRequest;
use App\Models\Application;
use App\Models\ResumeEducation;
use App\Models\ResumeExperience;
use App\Models\ResumeProjects;
use App\Models\Skill;
use Illuminate\Http\Request;

class applicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function create()
    {
        $skills=Skill::all();
        return view('applications.create',compact('skills'));
    }
    public function store(StoreApplicationRequest $request,Application $application)
    {
        // dd($request);
        $applicantData = [
            'full_name' => $request['full_name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'address' => $request['address'],
            'marital_status' => $request['marital_status'],
            'military_status' => $request['military_status'],
        ];
        $educationData = [
            'organization'=>$request['organization'],
            'grade'=>$request['grade'],
            'description'=>$request['educationDescription'],
            'start_date'=>$request['education_start_date'],
            'end_date'=>$request['education_end_date'],
        ];
        $experienceData=[
            'company_name'=>$request['company_name'],
            'job_title'=>$request['job_title'],
            'description'=>$request['jobDescription'],
            'start_date'=>$request['education_start_date'],
            'end_date'=>$request['education_end_date'],
        ];
        $projectData=[
            'project_title'=>$request['project_title'],
            'description'=>$request['projectDescription'],
            'project_url'=>$request['project_url'],
            'start_date'=>$request['project_start_date'],
            'end_date'=>$request['project_end_date'],
        ];
        Application::create($applicantData);
        ResumeEducation::create($educationData);
        ResumeExperience::create($experienceData);
        ResumeProjects::create($projectData);
        // return redirect('jobs.index')->with('success', 'Job created successfully!');

        $skills_ids = $request['skills_ids'];
        $skills_ids = $request->input('skills_ids');
        $skills_array = explode(',', $skills_ids);
        // dd($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
