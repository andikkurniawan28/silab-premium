<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnalysisStoreRequest extends FormRequest
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
            "value"         => "required",
            "indicator_id"  => "required",
            "sample_id"     => "required",
            "user_id"       => "required",
        ];
    }
}
