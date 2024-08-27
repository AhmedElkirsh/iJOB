<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeApplicationRequest;
use App\Models\Application;
use App\Models\Resume;
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
        $candidateId = auth()->id();
        $jobId = 40;

        // dd($request);
        $applicantData = [
            'full_name' => $request['full_name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'address' => $request['address'],
            'marital_status' => $request['marital_status'],
            'military_status' => $request['military_status'],
            'job_id' => $jobId,
            'candidate_id' => $request['candidate_id'], // Set the candidate ID here
            'candidate'=>3
        ];
        Application::create($applicantData);
        $resumeData = [
            'application_id' => $application->id,
            'full_name' => $request->input('full_name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'marital_status' => $request->input('marital_status'),
            'military_status' => $request->input('military_status'),
        ];

        Resume::create($resumeData);

        // Store education data
        $educationData = [
            'application_id' => $application->id,
            'organization' => $request->input('organization'),
            'grade' => $request->input('grade'),
            'description' => $request->input('educationDescription'),
            'start_date' => $request->input('education_start_date'),
            'end_date' => $request->input('education_end_date'),
        ];
        ResumeEducation::create($educationData);

        // Store experience data
        $experienceData = [
            'application_id' => $application->id,
            'company_name' => $request->input('company_name'),
            'job_title' => $request->input('job_title'),
            'description' => $request->input('jobDescription'),
            'start_date' => $request->input('job_start_date'),
            'end_date' => $request->input('job_end_date'),
        ];
        ResumeExperience::create($experienceData);

        // Store projects data
        $projectData = [
            'application_id' => $application->id,
            'project_title' => $request->input('project_title'),
            'description' => $request->input('projectDescription'),
            'project_url' => $request->input('project_url'),
            'start_date' => $request->input('project_start_date'),
            'end_date' => $request->input('project_end_date'),
        ];
        ResumeProjects::create($projectData);

        // Attach skills to the application
        $skillsIds = $request->input('skills_ids');
        if ($skillsIds) {
            $skillsArray = explode(',', $skillsIds);
            $application->skills()->sync($skillsArray);
        }

        return redirect()->route('applications.index')->with('success', 'Application created successfully!');


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
