<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Skill;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    public function index()
    {
        return view('candidates.create');
    }
    public function create()
    {
        $skills = Skill::all();
        dd($skills);
        return view('candidates.create', compact('skills'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'experience_level' => 'required|string',
            'job_type' => 'required|string',
            'location' => 'required|string',
            'salary' => 'required|numeric|min:1|max:100',
            'skills' => 'required|array',
            'skills.*' => 'exists:skills,id',
        ]);
        $job = [
            'experience_level' => $validatedData['experience_level'],
            'job_type' => $validatedData['job_type'],
            'location' => $validatedData['location'],
            'salary' => $validatedData['salary'],
            'skills' => Skill::whereIn('id', $validatedData['skills'])->pluck('name')->toArray(),
        ];

        return redirect()->back()->with('job', (object) $job);
    }
}
