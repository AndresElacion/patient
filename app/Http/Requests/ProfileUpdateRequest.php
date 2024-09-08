<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['string', 'max:255'],
            'email' => ['string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'contactNumber' => ['string', 'max:255'],
            'age' => ['integer', 'max:255'],
            'dateOfBirth' => ['date', 'max:255'],
            'gender' => ['string', 'max:255'],
            'address' => ['string', 'max:255'],
        ];
    }
}
