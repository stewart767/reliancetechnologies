<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Any visitor can submit inquiries
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'company' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:50'],
            'service' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:5000'],
            'website_title' => ['nullable', 'string'], // Honeypot spam protection field (must remain empty)
        ];
    }

    /**
     * Custom validation messages.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Your full name is required.',
            'company.required' => 'Your company or organization name is required.',
            'email.required' => 'We need your email address to reply.',
            'email.email' => 'Please provide a valid email format.',
            'phone.required' => 'A telephone contact number is required.',
            'service.required' => 'Please select the service required.',
            'message.required' => 'Please describe your tech requirements or questions.',
        ];
    }
}
