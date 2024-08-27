<?php

namespace App\Http\Controllers;

use App\Models\PortfolioProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PortifolioController extends Controller
{
    public function index()
    {
        $portfolios = PortfolioProject::where('candidate_id', Auth::id())->get();
        return view('portifolio', compact('portfolios'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file' => 'required|mimes:jpg,jpeg,png,mp4|max:20480', // Adjust the max size as needed
        ]);

        $path = $request->file('file')->store('portfolios', 'public');

        PortfolioProject::create([
            'candidate_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            'file_path' => $path,
            'file_type' => $request->file('file')->getMimeType(),
        ]);

        return redirect()->route('portfolio.index')->with('success', 'Project uploaded successfully.');
    }
}
