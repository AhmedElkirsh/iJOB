<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreApplicationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Adjust as needed
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'marital_status' => 'required',
            'military_status' => 'required',
            'organization' => 'required|string|max:255',
            'grade' => 'required|string|max:50',
            'educationDescription' => 'nullable|string',
            'education_start_date' => 'required|date',
            'education_end_date' => 'required|date|after_or_equal:education_start_date',
            'company_name' => 'required|string|max:255',
            'job_title' => 'required|string|max:255',
            'jobDescription' => 'nullable|string',
            'job_start_date' => 'required|date',
            'job_end_date' => 'required|date|after_or_equal:job_start_date',
            'project_title' => 'required|string|max:255',
            'projectDescription' => 'nullable|string',
            'project_url' => 'nullable|url',
            'project_start_date' => 'required|date',
            'project_end_date' => 'required|date|after_or_equal:project_start_date',
        ];
    }

    /**
     * Get the custom validation messages for the request.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'full_name.required' => 'Name is required',
            'full_name.string' => 'Name must be a string',
            'email.required' => 'Email is required',
            'email.email' => 'Email must be a valid email address',
            'phone.required' => 'Phone number is required',
            'phone.string' => 'Phone number must be a string',
            'phone.max' => 'Phone number may not be greater than 20 characters',
            'address.required' => 'Address is required',
            'address.string' => 'Address must be a string',
            'address.max' => 'Address may not be greater than 255 characters',
            'marital_status.required' => 'Marital status is required',
            'military_status.required' => 'Military status is required',
            'organization.required' => 'Organization is required',
            'organization.string' => 'Organization must be a string',
            'organization.max' => 'Organization may not be greater than 255 characters',
            'grade.required' => 'Grade is required',
            'grade.string' => 'Grade must be a string',
            'grade.max' => 'Grade may not be greater than 50 characters',
            'educationDescription.string' => 'Education description must be a string',
            'education_start_date.required' => 'Education start date is required',
            'education_start_date.date' => 'Education start date must be a valid date',
            'education_end_date.required' => 'Education end date is required',
            'education_end_date.date' => 'Education end date must be a valid date',
            'education_end_date.after_or_equal' => 'Education end date must be after or equal to the start date',
            'company_name.required' => 'Company name is required',
            'company_name.string' => 'Company name must be a string',
            'company_name.max' => 'Company name may not be greater than 255 characters',
            'job_title.required' => 'Job title is required',
            'job_title.string' => 'Job title must be a string',
            'job_title.max' => 'Job title may not be greater than 255 characters',
            'jobDescription.string' => 'Job description must be a string',
            'job_start_date.required' => 'Job start date is required',
            'job_start_date.date' => 'Job start date must be a valid date',
            'job_end_date.required' => 'Job end date is required',
            'job_end_date.date' => 'Job end date must be a valid date',
            'job_end_date.after_or_equal' => 'Job end date must be after or equal to the start date',
            'project_title.required' => 'Project title is required',
            'project_title.string' => 'Project title must be a string',
            'project_title.max' => 'Project title may not be greater than 255 characters',
            'projectDescription.string' => 'Project description must be a string',
            'project_url.url' => 'Project URL must be a valid URL',
            'project_start_date.required' => 'Project start date is required',
            'project_start_date.date' => 'Project start date must be a valid date',
            'project_end_date.required' => 'Project end date is required',
            'project_end_date.date' => 'Project end date must be a valid date',
            'project_end_date.after_or_equal' => 'Project end date must be after or equal to the start date',
            'skills.required'=>'this field is required'
        ];
    }
}
