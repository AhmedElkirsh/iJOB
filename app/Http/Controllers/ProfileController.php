<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\PortfolioProject;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function showProfile()
    {
        $candidate = Candidate::with('skills')->where('user_id', Auth::id())->firstOrFail();
        $user = Auth::user();
        return view('candidate-profile', compact('candidate', 'user'));
    }
    public function edit()
    {
        $candidate = Candidate::where('user_id', Auth::id())->firstOrFail();
        return view('profile-edit', compact('candidate'));
    }

    public function update(Request $request)
    {
        $candidate = Candidate::where('user_id', Auth::id())->firstOrFail();

        // Validate the request
        $validated = $request->validate([
            'position' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'skills' => 'nullable|array',
            'skills.*' => 'nullable|string|max:255',
        ]);

        $candidate->position = $validated['position'] ?? $candidate->position;
        $candidate->bio = $validated['bio'] ?? $candidate->bio;
        $candidate->location = $validated['location'] ?? $candidate->location;
        $candidate->save();

        if ($request->has('skills')) {
            $skills = $request->input('skills');

            // Detach existing skills
            $candidate->skills()->detach();

            // Add new skills
            foreach ($skills as $skillName) {
                if (!empty($skillName)) {
                    $skill = Skill::firstOrCreate(['skill' => $skillName]);
                    $candidate->skills()->attach($skill->id);
                }
            }
        }

        return redirect()->route('profile.show')->with('success', 'Profile updated successfully!');
    }
}
