<div class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
    <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Profile</h2>
    
    <!-- Success message -->
    @if(session('success'))
        <div class="mb-4 text-green-500">
            {{ session('success') }}
        </div>
    @endif

    <p class="mb-2 font-bold text-gray-900 dark:text-white text-center" style="font-size: 50px">{{ $user->name }}</p>
    <h3 class="mb-2 text-3xl font-bold text-gray-900 dark:text-white">{{ $candidate->location }} - {{ now()->format('g:i a') }} local time</h3>
    <div class="items-center justify-center space-y-4 sm:flex sm:space-y-0 sm:space-x-4 rtl:space-x-reverse text-white text-2xl">
        <!-- Other content here -->
    </div>

    <!-- Display candidate details -->
    <ul class="grid w-full gap-6 md:grid-cols-2">
        <li>
            <label class="inline-flex justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                <div class="block">
                    <div class="w-full text-lg font-semibold">{{ $candidate->position }}
                        <span class="text-gray-400"style="position:relative; left:400px">${{ number_format($candidate->rate_salary, 2) }}</span>
                    </div>
                </div>
            </label>
        </li>
        <li>
            <div class="w-full mx-5">{{ $candidate->bio }}</div>
            <div class="w-full mx-5">{{ $candidate->education_level }}</div>
            <div class="w-full mx-5">{{ $candidate->experience_level }}</div>
        </li>
    </ul>

    <!-- Display skills -->
    <div class="mb-4">
        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Skills</h3>
        <ul>
            @foreach($candidate->skills as $skill)
                <li>{{ $skill->skill }}</li>
            @endforeach
        </ul>
    </div>
</div>
<div class="mt-6">
    <a href="{{ route('profile.edit') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-500 border border-transparent rounded-lg shadow-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
        Edit Profile
    </a>
</div>