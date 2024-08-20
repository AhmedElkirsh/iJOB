<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use Illuminate\Http\Request;
use Smalot\PdfParser\Parser;

class ResumeController extends Controller
{
    public function upload(Request $request)
{
    // Validate the uploaded resume
    $request->validate([
        'resume' => 'required|mimes:pdf|max:2048',
    ]);

    // Parse the uploaded PDF
    $pdfParser = new \Smalot\PdfParser\Parser();
    $pdf = $pdfParser->parseFile($request->file('resume'));
    $text = $pdf->getText();

    // Save extracted text to a temporary file for passing to Python script
    $tempFile = storage_path('app/temp_resume.txt');
    file_put_contents($tempFile, $text);

    // Debugging command and file paths
    $pythonScriptPath = base_path('python/extract_resume_info.py');
    $command = "python " . escapeshellarg($pythonScriptPath) . " " . escapeshellarg($tempFile);
    error_log("Executing command: " . $command);

    // Execute Python script and capture both output and errors
    $output = shell_exec($command . " 2>&1");

    // Debug: Dump raw output to verify if it's coming correctly
    error_log("Python script output: " . $output);

    // Parse the output from Python (this will be a dictionary of details)
    $details = json_decode($output, true);

    // Check for JSON errors
    if (json_last_error() !== JSON_ERROR_NONE) {
        return back()->with('error', 'Failed to decode JSON from Python script. Error: ' . json_last_error_msg());
    }

    // Check if details are null or invalid
    if (!$details || !is_array($details)) {
        return back()->with('error', 'Failed to extract resume details.');
    }

    // Store the parsed details in the database
    $resume = new Resume();
    $resume->file_path = $request->file('resume')->store('resumes', 'public');
    $resume->name = $details['name'];
    $resume->email = $details['email'];
    $resume->phone = $details['phone'];
    $resume->education = implode(', ', $details['education']);
    $resume->experience = implode(', ', $details['experience']);
    $resume->skills = implode(', ', $details['skills']);
    $resume->save();

    return back()->with('success', 'Resume uploaded and details parsed successfully.');
}


    public function index()
    {
        $resumes = Resume::all();
        return view('resumes.index', compact('resumes'));
    }

    public function show($id)
{
    // Fetch the resume by ID
    $resume = Resume::findOrFail($id);

    // Return the Blade view with the resume data
    return view('resumes.show', compact('resume'));
}
}
