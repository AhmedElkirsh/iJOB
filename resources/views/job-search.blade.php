<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Job Search</title>
    @vite('resources/css/app.css')
    <!-- Include Flowbite CSS -->
    <link href="https://unpkg.com/flowbite@latest/dist/flowbite.min.css" rel="stylesheet">
</head>
<body>
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        {{-- @livewire('navigation-menu') --}}
        
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-4">Job Search</h1>
        <form action="{{ route('job.search') }}" method="POST">
            @csrf
            <div class="flex flex-wrap gap-2 items-center">
                <input type="text" name="position_title" placeholder="Position Title" class="px-3 py-2 border rounded">
                <select name="employment_type" class="px-3 py-2 border rounded">
                    <option value="">Select Employment Type</option>
                    <option value="full-time">Full-Time</option>
                    <option value="part-time">Part-Time</option>
                    <option value="contract">Contract</option>
                    <option value="freelance">Freelance</option>
                    <option value="internship">Internship</option>
                </select>
                <select name="experience_level" class="px-3 py-2 border rounded">
                    <option value="">Select Experience Level</option>
                    <option value="Junior">Junior</option>
                    <option value="Senior">Senior</option>
                    <option value="Expert">Expert</option>
                </select>
                <input type="text" name="industry" placeholder="Industry" class="px-3 py-2 border rounded">
                <input type="text" name="location" placeholder="Location" class="px-3 py-2 border rounded">
                
                <!-- Dropdown menu using <details> and <summary> -->
                <details class="relative">
                    <summary class="px-4 py-2 text-white bg-blue-700 rounded cursor-pointer hover:bg-blue-800">
                        Jobs
                    </summary>
                    <div class="dropdown-content bg-white divide-y divide-gray-100 rounded-lg shadow w-44 mt-1">
                        <ul class="py-2 text-sm text-gray-700">
                            <li>
                                <button type="submit" name="latest" value="0" class="block px-4 py-2 hover:bg-gray-100 w-full text-left">
                                    All Jobs
                                </button>
                            </li>
                            <li>
                                <button type="submit" name="latest" value="1" class="block px-4 py-2 hover:bg-gray-100 w-full text-left">
                                    Latest Jobs
                                </button>
                            </li>
                        </ul>
                    </div>
                </details>
                
                <button type="submit" class="px-4 py-2 text-white bg-green-700 rounded hover:bg-green-800">
                    Search
                </button>
            </div>
        </form>
    </div>

    <div class="p-6 bg-white mx-auto w-1/2 border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        @forelse ($jobs as $job)
            <div class="mb-4">
                <a href="#" class="block">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $job->position_title }}</h5>
                </a>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $job->job_description }}</p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><span class="text-brown-600">Employment Type: </span>{{ $job->employment_type }}</p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><span class="text-brown-600">Experience Level: </span>{{ $job->experience_level }}</p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><span class="text-brown-600">Job Location: </span>{{ $job->location }}</p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><span class="text-brown-600">Job Salary: </span>{{ $job->salary }}</p>

                <!-- Display skills -->
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><span class="text-brown-600">Required Skills: </span>
                    @foreach($job->skills as $skill)
                        <span class="inline-block bg-gray-200 text-gray-800 text-sm px-2 py-1 rounded">{{ $skill->name }}</span>
                    @endforeach
                </p>

                <!-- Button to open the modal -->
                <div class="flex justify-end">
                    <button data-modal-target="popup-modal-{{ $job->id }}" data-modal-toggle="popup-modal-{{ $job->id }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Details for the Job
                    </button>
                </div>
            </div>
            <!-- Separator -->
            <hr class="my-4 border-gray-200">
        @empty
            <p>No jobs found matching your criteria.</p>
        @endforelse
    </div>
    <!-- Modals for each job -->
    @foreach($jobs as $job)
    <div id="popup-modal-{{ $job->id }}" tabindex="-1" aria-hidden="true" class="fixed top-0 right-0 left-0 z-50 w-full h-full overflow-y-auto overflow-x-hidden bg-gray-200 bg-opacity-10 hidden">
        <div class="relative p-4 w-full max-w-md max-h-full mx-auto my-6 bg-white dark:bg-gray-700">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Apply for Job
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal-{{ $job->id }}">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-6">
                    <h5 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $job->position_title }}</h5>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $job->job_description }}</p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><span style="color: brown">Employment Type: </span>{{ $job->employment_type }}</p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><span style="color: brown">Experience Level: </span>{{ $job->experience_level }}</p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><span style="color: brown">Job Location: </span>{{ $job->location }}</p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><span style="color: brown">Job Salary: </span>{{ $job->salary }}</p>

                    <!-- Display skills in the modal -->
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><span style="color: brown">Required Skills: </span>
                        @foreach($job->skills as $skill)
                            <span class="inline-block bg-gray-200 text-gray-800 text-sm px-2 py-1 rounded">{{ $skill->name }}</span>
                        @endforeach
                    </p>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-4 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <form action="{{ route('job.apply', $job->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        Apply
                        </button>
                    </form>
                    <button data-modal-hide="popup-modal-{{ $job->id }}" type="button" class="text-gray-500 bg-white hover:bg-gray-100 hover:text-gray-900 dark:bg-gray-700 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white rounded-lg text-sm font-medium px-5 py-2.5 text-center">
                        No, cancel
                    </button>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <!-- Toast Notification -->
    @if (session('success'))
    <div id="toast-simple" class="fixed top-4 left-1/2 transform -translate-x-1/2 flex items-center p-4 space-x-4 w-full max-w-xs text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
        <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-blue-500 bg-blue-100 rounded-lg dark:bg-blue-800 dark:text-blue-200">
            <svg class="w-5 h-5" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M16.707 4.707a1 1 0 00-1.414-1.414L7 11.586 4.707 9.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l9-9z" clip-rule="evenodd" />
            </svg>
        </div>
        <div class="text-sm font-normal">{{ session('success') }}</div>
        <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:bg-gray-800 dark:hover:bg-gray-700" aria-label="Close" onclick="this.parentElement.remove();">
            <span class="sr-only">Close</span>
            <svg class="w-3.5 h-3.5" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v3H6a1 1 0 000 2h3v3a1 1 0 002 0v-3h3a1 1 0 000-2h-3V6z" clip-rule="evenodd" />
            </svg>
        </button>
    </div>
    @endif

    <!-- Include Flowbite JS -->
    <script src="https://unpkg.com/flowbite@latest/dist/flowbite.min.js"></script>
</body>
</html>
