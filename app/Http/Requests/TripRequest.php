<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TripRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required'],
            'place' => ['required'],
            'description' => ['required'],
            'short_description' => ['required'],
            'date' => ['required'],
            'time' => ['required'],
            'frequency' => ['nullable'],
            'tongue' => ['required'],
            'cost' => ['required'],
            'video' => ['required'],
            'photos' => ['required'],
            'max_seats' => ['required'],
            'min_seats' => ['required'],
            'available_places' => ['nullable'],
            'closing_date' => ['required'],
        ];
    }
}
