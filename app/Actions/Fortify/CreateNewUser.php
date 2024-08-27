<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\Candidate;
use App\Models\Employer;
use App\Models\Industry;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\DB;


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
        ])->validate();
        // Create the User
        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'user_type' => $input['user_type']
        ]);
        // Based on user type, create either a Candidate or an Employer
        if ($input['user_type'] === 'candidate') {
            Validator::make($input, [
                'industries.*' => ['required', 'exists:industries,id'], // Ensure each industry ID exists in the industries table
                'desired_position' => ['required', 'string', 'max:255'],
            ])->validate();

            $candidate = Candidate::create([
                'user_id' => $user->id,
                'position' => $input['desired_position'],
            ]);

            // Add industries to the registered candidate manually!!!!
            for ($i = 0; $i < count($input['industries']); $i++) {
                DB::table('candidate_industry')->insert([
                    'candidate_id' => $candidate->user_id,
                    'industry_id' => $input['industries'][$i],
                ]);
            }
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
