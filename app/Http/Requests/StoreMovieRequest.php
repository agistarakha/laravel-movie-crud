<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMovieRequest extends FormRequest
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
            //
            "title" => "required|max:255",
            "synopsis" => "required",
            "genres" => "required|array|min:1",
            "cover" => "required|image",
            "release_date" => "required",
            "director_id" => "required"
        ];
    }
}
