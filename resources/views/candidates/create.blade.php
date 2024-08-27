<x-app-layout>
    <!-- Sidebar -->
    <aside id="default-sidebar" class="fixed top-0 left-0 z-40 w-80 h-screen transition-transform -translate-x-full sm:translate-x-0 h-full" aria-label="Sidebar" style="width:16rem">
        <div class="h-full px-5 py-5 overflow-y-auto bg-gray-50 dark:bg-gray-800">
            <form id="job-form" method="POST" action="{{ route('candidate.store') }}">
                @csrf
                <li>
                    <a href="#" class="flex flex-col p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <span class="mb-2">Experience Level</span>
                        <div class="flex items-center mb-4">
                            <input id="default-radio-1" type="radio" value="entry" name="experience_level" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="default-radio-1" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Entry Level</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="default-radio-2" type="radio" value="intermediate" name="experience_level" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="default-radio-2" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Intermediate Level</label>
                        </div>
                        <div class="flex items-center">
                            <input id="default-radio-3" type="radio" value="advanced" name="experience_level" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="default-radio-3" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Advanced Level</label>
                        </div>
                    </a>
                </li>
                <!-- Job Type -->
                <li>
                    <a href="#" class="flex flex-col p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <span class="mb-2">Job Type</span>
                        <div class="flex items-center mb-4">
                            <input id="default-radio-4" type="radio" value="remote" name="job_type" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="default-radio-4" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Remote</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="default-radio-5" type="radio" value="on-site" name="job_type" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="default-radio-5" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">On-site</label>
                        </div>
                        <div class="flex items-center">
                            <input id="default-radio-6" type="radio" value="hybrid" name="job_type" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="default-radio-6" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Hybrid</label>
                        </div>
                    </a>
                </li>
                <!-- Location -->
                <li>
                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <div>
                            <label for="location" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Location</label>
                            <input type="text" id="location" name="location" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-60 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Location" required />
                        </div>
                    </div>
                </li>
                <!-- Salary -->
                <li>
                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <div>
                            <label for="salary" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Salary</label>
                            <input type="number" min="1" max="100" id="salary" name="salary" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Salary" required style="width:11rem"/>
                        </div>
                    </div>
                </li>
                <!-- Skills -->
                <li>
                    <label for="skills" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Skills</label>
                    <select name="skills[]" id="skills" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-60 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" multiple required>
                        @foreach($skills as $skill)
                            <option value="{{ $skill->id }}">{{ $skill->name }}</option>
                        @endforeach
                    </select>
                </li>
                <!-- Submit Button -->
                <li>
                    <button type="submit" class="inline-flex items-center p-2 mt-2 text-sm text-gray-500 rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">Submit</button>
                </li>
            </form>
        </div>
    </aside>

    <!-- Job Details Display -->
    <div id="job-details" class="p-6 mt-10">
        @if (session('job'))
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Job Listing</h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">Details of the job listing.</p>
                </div>
                <div class="border-t border-gray-200">
                    <dl>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Experience Level</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ session('job')->experience_level }}</dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Job Type</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ session('job')->job_type }}</dd>
                        </div>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Location</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ session('job')->location }}</dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Salary</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ session('job')->salary }}</dd>
                        </div>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Skills</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                <ul>
                                    @foreach(session('job')->skills as $skill)
                                        <li>{{ $skill }}</li>
                                    @endforeach
                                </ul>
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>
        @endif
    </div>
</x-app-layout>
