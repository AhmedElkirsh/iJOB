<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\Candidate;
use App\Models\Employer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;
    
    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        // Validate common fields
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
            'user_type' => ['required', 'in:candidate,employer'],
        ])->validate();

        // Create the User
        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
        
        // Based on user type, create either a Candidate or an Employer
        if ($input['user_type'] === 'candidate') {
            Validator::make($input, [
                'industry' => ['required', 'string', 'max:255'],
                'desired_position' => ['required', 'string', 'max:255'],
            ])->validate();

            Candidate::create([
                'user_id' => $user->id,
                'industry' => $input['industry'],
                'position' => $input['desired_position'],
            ]);
        } elseif ($input['user_type'] === 'employer') {
            Validator::make($input, [
                'company_name' => ['required', 'string', 'max:255'],
                'employer_type' => ['required', 'in:company,individual,non-profit'],
                'location' => ['required', 'string', 'max:255'],
                'website_url' => ['nullable', 'url', 'max:255'],
                'bio' => ['nullable', 'string'],
            ])->validate();

            Employer::create([
                'user_id' => $user->id,
                'name' => $input['company_name'],
                'employer_type' => $input['employer_type'],
                'location' => $input['location'],
                'website_url' => $input['website_url'] ?? null,
                'bio' => $input['bio'] ?? null,
            ]);
        }

        return $user;
    }
}
