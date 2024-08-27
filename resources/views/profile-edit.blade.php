<div class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
    <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Edit Profile</h2>
    <form action="{{ route('profile.update') }}" method="POST">
        @csrf
        @method('PUT')
        
        <!-- Position -->
        <div class="mb-4">
            <label for="position" class="block text-sm font-medium text-gray-700">Position</label>
            <input type="text" id="position" name="position" value="{{ old('position', $candidate->position) }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
        </div>

        <!-- Bio -->
        <div class="mb-4">
            <label for="bio" class="block text-sm font-medium text-gray-700">Bio</label>
            <textarea id="bio" name="bio" rows="4" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">{{ old('bio', $candidate->bio) }}</textarea>
        </div>

        <!-- Location -->
        <div class="mb-4">
            <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
            <input type="text" id="location" name="location" value="{{ old('location', $candidate->location) }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
        </div>

        <!-- Skills -->
        <div class="mb-4">
            <label for="skills" class="block text-sm font-medium text-gray-700">Skills</label>
            <div>
                @foreach($candidate->skills as $skill)
                    <div class="flex items-center mb-2">
                        <input type="text" name="skills[]" value="{{ old('skills[]', $skill->skill) }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>
                @endforeach
                <div class="flex items-center mb-2">
                    <input type="text" name="skills[]" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Add a new skill">
                </div>
            </div>
        </div>

        <div class="flex items-center justify-end">
            <button type="submit" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-500 border border-transparent rounded-lg shadow-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Update Profile
            </button>
        </div>
    </form>
</div>
