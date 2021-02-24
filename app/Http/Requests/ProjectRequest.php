<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
            'name' => ['required'],
            'city_id' => ['required', 'exists:cities'],
            'company_id' => ['required', 'exists:companies'],
            'user_id' => ['required', 'exists:users,id'],
            'execution_date' => ['required', 'date_format:Y-m-d'],//, 'after_or_equal:today'
        ];
    }

    /*public function validated()
    {
        dd($this->user());

        return $this->validator->validated();
    }*/
}
