<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProjectStoreRequest extends FormRequest
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
    public function rules() :array
    {
        return [
            "title" => "min:5|max:30",
            // "description" => "required|min:10|max:255",
            // "slug" => "min:10|required",
            // "image" => "url:http|required|min:10",
        ];
    }

    public function messages() : array
    {
        return [
            "title.required" => "il titolo deve essere inserito obbligatoriamente",
            "title.max" => "il titolo non puo' avere piu' di 30 caratteri",
            "description.required" => "la descrizione deve essere inserito obbligatoriamente",
            "description.min" => "la descrizione deve avere almeno 10 caratteri",
            "description.max" => "la descrizione non puo' avere piu' di 255 caratteri",
            "slug.required" => "la slug deve essere inserita obbligatoriamente",
            "slug.min" => "la slug deve avere almeno 10 caratteri",
            "image.required" => "l'immagine deve essere inserita obbligatoriamente",
            "image.url" => "l'immagine deve avere un http iniziale nel url",
        ];
    }
}
