@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto py-12 px-4">
        <h1 class="text-3xl font-bold text-center mb-6">Edit Job</h1>
        <form class="bg-white shadow-md rounded-lg p-8" action="/jobs/{{$job->id}}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-6">
                <label for="positionTitle" class="block text-gray-700 text-sm font-bold mb-2">Position Title</label>
                <input type="text" class="form-input w-full border rounded-lg p-2" id="positionTitle" placeholder="Position Title" name="position_title" value="{{$job->position_title}}">
                @error('position_title')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2">Employment Type</label>
                <div class="space-y-2">
                    <label class="inline-flex items-center">
                        <input type="radio" name="employment_type" value="fullTime" class="form-radio text-indigo-600" {{$job->employment_type == 'fullTime' ? 'checked' : ''}}>
                        <span class="ml-2">Full Time</span>
                    </label>
                    <label class="inline-flex items-center">
                        <input type="radio" name="employment_type" value="partTime" class="form-radio text-indigo-600" {{$job->employment_type == 'partTime' ? 'checked' : ''}}>
                        <span class="ml-2">Part-Time</span>
                    </label>
                    <label class="inline-flex items-center">
                        <input type="radio" name="employment_type" value="contract" class="form-radio text-indigo-600" {{$job->employment_type == 'contract' ? 'checked' : ''}}>
                        <span class="ml-2">Contract</span>
                    </label>
                    <label class="inline-flex items-center">
                        <input type="radio" name="employment_type" value="freelance" class="form-radio text-indigo-600" {{$job->employment_type == 'freelance' ? 'checked' : ''}}>
                        <span class="ml-2">Freelance</span>
                    </label>
                    <label class="inline-flex items-center">
                        <input type="radio" name="employment_type" value="internship" class="form-radio text-indigo-600" {{$job->employment_type == 'internship' ? 'checked' : ''}}>
                        <span class="ml-2">Internship</span>
                    </label>
                </div>
                @error('employment_type')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2">Experience Level</label>
                <div class="space-y-2">
                    <label class="inline-flex items-center">
                        <input type="radio" name="experience_level" value="junior" class="form-radio text-indigo-600" {{$job->experience_level == 'junior' ? 'checked' : ''}}>
                        <span class="ml-2">Junior</span>
                    </label>
                    <label class="inline-flex items-center">
                        <input type="radio" name="experience_level" value="senior" class="form-radio text-indigo-600" {{$job->experience_level == 'senior' ? 'checked' : ''}}>
                        <span class="ml-2">Senior</span>
                    </label>
                    <label class="inline-flex items-center">
                        <input type="radio" name="experience_level" value="expert" class="form-radio text-indigo-600" {{$job->experience_level == 'expert' ? 'checked' : ''}}>
                        <span class="ml-2">Expert</span>
                    </label>
                </div>
                @error('experience_level')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="industry" class="block text-gray-700 text-sm font-bold mb-2">Industry</label>
                <input type="text" class="form-input w-full border rounded-lg p-2" id="industry" placeholder="Industry" name="industry" value="{{$job->industry}}">
                @error('industry')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Job Description</label>
                <input type="text" class="form-input w-full border rounded-lg p-2" id="description" placeholder="Job Description" name="job_description" value="{{$job->job_description}}">
                @error('job_description')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            {{-- <div class="mb-6">
                <label for="responsibilities" class="block text-gray-700 text-sm font-bold mb-2">Responsibilities</label>
                <input type="text" class="form-input w-full border rounded-lg p-2" id="responsibilities" placeholder="Responsibilities" name="responsibility">
                @error('responsibility')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="qualifications" class="block text-gray-700 text-sm font-bold mb-2">Qualifications</label>
                <input type="text" class="form-input w-full border rounded-lg p-2" id="qualifications" placeholder="Qualifications" name="qualification">
                @error('qualification')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div> --}}

            <div class="mb-6">
                <label for="location" class="block text-gray-700 text-sm font-bold mb-2">Location</label>
                <input type="text" class="form-input w-full border rounded-lg p-2" id="location" placeholder="Location" name="location" value="{{$job->location}}">
                @error('location')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2">Job Status</label>
                <div class="space-y-2">
                    <label class="inline-flex items-center">
                        <input type="radio" name="job_status" value="notApproved" class="form-radio text-indigo-600" {{$job->job_status == 'notApproved' ? 'checked' : ''}}>
                        <span class="ml-2">Not Approved</span>
                    </label>
                    <label class="inline-flex items-center">
                        <input type="radio" name="job_status" value="open" class="form-radio text-indigo-600" {{$job->job_status == 'open' ? 'checked' : ''}}>
                        <span class="ml-2">Open</span>
                    </label>
                    <label class="inline-flex items-center">
                        <input type="radio" name="job_status" value="closed" class="form-radio text-indigo-600" {{$job->job_status == 'closed' ? 'checked' : ''}}>
                        <span class="ml-2">Closed</span>
                    </label>
                </div>
                @error('job_status')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="salary" class="block text-gray-700 text-sm font-bold mb-2">Salary</label>
                <input type="number" class="form-input w-full border rounded-lg p-2" id="salary" placeholder="Salary" name="salary" value="{{$job->salary}}">
                @error('salary')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <button type="submit" class="w-full bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-lg">Update Job</button>
        </form>
    </div>
@endsection
