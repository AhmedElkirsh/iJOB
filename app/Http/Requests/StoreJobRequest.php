<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreJobRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            request()->validate([
                'position_title'=>'required | string',
                'employment_type'=>'required',
                'experience_level'=>'required',
                'industry'=>'required',
                'job_description'=>'required | string',
                'location'=>'required',
                'job_status'=>'required',
                'salary'=>'required|integer|min:0',
                'responsibilities' => 'required|array',
                'responsibilities.*' => 'string|max:255',
                'qualification'=>'string | required'
            ],[
                'position_title.required'=>'Title is required',
                'position_title.string'=>'Title must be text',
                'employment_type.required'=>'Employement type is required',
                'experience_level.required'=>'experience level is required',
                'industry.required'=>'industry is required',
                'job_description.required'=>'job description is required',
                'job_description.string'=>'job description must be text',
                'location.required'=>'location is required',
                'job_status.required'=>'job status is required',
                'salary.integer'=>'job salary must be number',
                'salary.min:0'=>'Invalid value',
                'responsibilities.array'=>'This field must be array',
                'responsibilities.required'=>'This field is required',
                'qualification.string'=>'This field must be text',
                'qualification.required'=>'This field is required'
            ])
        ];
    }
}
