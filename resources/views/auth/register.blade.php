<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form id="registrationForm" method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="user_type">User Type:</x-label>
                <div class="flex items-center">
                    <input type="radio" id="candidate" name="user_type" value="candidate" required>
                    <label for="candidate" class="ml-2">Candidate</label>
                    <input type="radio" id="employer" name="user_type" value="employer" required class="ml-2">
                    <label for="employer" class="ml-2">Employer</label>
                </div>
            </div>

            <!-- Candidate Fields -->
            <div id="candidateFields" class="mt-4">
                <x-label for="desired_position">Desired Position:</x-label>
                <x-input id="desired_position" class="block mt-1 w-full" type="text" name="desired_position" />

                <div class="mt-4">
                    <x-label for="industry">Industry:</x-label>
                    <x-input id="industry" class="block mt-1 w-full" type="text" name="industry" />
                </div>
            </div>

            <!-- Employer Fields -->
            <div id="employerFields" class="mt-4">
                <div>
                    <x-label for="company_name">Company Name:</x-label>
                    <x-input id="company_name" class="block mt-1 w-full" type="text" name="company_name" />
                </div>

                <div class="mt-4">
                    <x-label for="employer_type">Employer Type:</x-label>
                    <select id="employer_type" class="block mt-1 w-full" name="employer_type">
                        <option value="company">Company</option>
                        <option value="individual">Individual</option>
                        <option value="non-profit">Non-Profit</option>
                    </select>
                </div>

                <div class="mt-4">
                    <x-label for="location">Location:</x-label>
                    <x-input id="location" class="block mt-1 w-full" type="text" name="location" />
                </div>

                <div class="mt-4">
                    <x-label for="website_url">Website URL:</x-label>
                    <x-input id="website_url" class="block mt-1 w-full" type="url" name="website_url" />
                </div>

                <div class="mt-4">
                    <x-label for="bio">Bio:</x-label>
                    <textarea id="bio" class="block mt-1 w-full" name="bio"></textarea>
                </div>
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
            <div class="mt-4">
                <x-label for="terms">
                    <div class="flex items-center">
                        <x-checkbox name="terms" id="terms" required />

                        <div class="ms-2">
                            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                            ]) !!}
                        </div>
                    </div>
                </x-label>
            </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ms-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const userTypeRadioButtons = document.querySelectorAll('input[name="user_type"]');
        const candidateFields = document.getElementById('candidateFields');
        const employerFields = document.getElementById('employerFields');

        // Function to update field visibility based on user type
        const updateFieldVisibility = () => {
            const selectedUserType = document.querySelector('input[name="user_type"]:checked')?.value;
            if (selectedUserType === 'candidate') {
                if (!candidateFields.parentNode) {
                    document.getElementById('registrationForm').insertBefore(candidateFields, document.querySelector('.flex.items-center.mt-4'));
                }
                if (employerFields.parentNode) {
                    employerFields.parentNode.removeChild(employerFields);
                }
            } else if (selectedUserType === 'employer') {
                if (!employerFields.parentNode) {
                    document.getElementById('registrationForm').insertBefore(employerFields, document.querySelector('.flex.items-center.mt-4'));
                }
                if (candidateFields.parentNode) {
                    candidateFields.parentNode.removeChild(candidateFields);
                }
            }
        };

        // Initialize visibility based on the pre-selected user type
        updateFieldVisibility();

        // Update visibility when radio button selection changes
        userTypeRadioButtons.forEach(button => {
            button.addEventListener('change', updateFieldVisibility);
        });
    });
</script>