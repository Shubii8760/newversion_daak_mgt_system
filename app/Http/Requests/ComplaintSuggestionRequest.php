<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComplaintSuggestionRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [

            'name' => 'required',
            'email' => 'required|unique:complaints_suggestions,email',
            'phone'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'message'=>'required|max:255',
            'type'=>'required|in:complaint,suggestion',
            'file'=>'required',
            // 'otp'=>'required'



        ];
    }
}
