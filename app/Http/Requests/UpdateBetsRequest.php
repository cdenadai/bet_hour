<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBetsRequest extends FormRequest
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
        $betId = $this->route('bet')->id;
        return [
            'user' => 'required|string|unique:bets,user,'.$betId,
            'hour' => ['required', 'regex:/^\d{2}:\d{2}$/'],
        ];
    }
}
