<!-- resources/views/jobs/details.blade.php -->
@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-12 px-4">
    <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
        <thead class="bg-gray-800 text-white">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Position Title</th>
                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Employment Type</th>
                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Experience Level</th>
                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Industry</th>
                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Job Description</th>
                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Location</th>
                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Job Status</th>
                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Salary</th>
                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Action</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            <tr>
                <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $job->position_title }}</td>
                <td class="px-6 py-4 text-sm text-gray-500">{{ $job->employment_type }}</td>
                <td class="px-6 py-4 text-sm text-gray-500">{{ $job->experience_level }}</td>
                <td class="px-6 py-4 text-sm text-gray-500">{{ $job->industry }}</td>
                <td class="px-6 py-4 text-sm text-gray-500">{{ $job->job_description }}</td>
                <td class="px-6 py-4 text-sm text-gray-500">{{ $job->location }}</td>
                <td class="px-6 py-4 text-sm text-gray-500">{{ $job->job_status }}</td>
                <td class="px-6 py-4 text-sm text-gray-500">{{ $job->salary }}</td>
                <td class="px-6 py-4 text-sm font-medium">
                    <a href="/jobs" class="inline-flex items-center px-4 py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600">
                        Back
                    </a>
                </td>
            </tr>
        </tbody>
    </table>
    <div id="social-links" class="mt-6">
        {!! $shareButtons !!}
    </div>
</div>
@endsection
