<?php

namespace Domain\Team\Requests;

use App\Http\Requests\Request;

/**
 * Class CreateTeamRequest
 * @package Domain\Team\Requests
 */
class CreateTeamRequest extends Request
{
    public function rules(): array
    {
        return [
            'alias' => 'bail|required|unique:teams|max:64',
            'city' => 'required|string|max:512',
            'name' => 'required|max:512',
            'title' => 'required|string|max:512',
            'description' => 'string|max:512',
            'text' => 'string|nullable',
            'gallery_id' => 'integer|exists:galleries,id|nullable',
            'image' => 'image'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Поле «Название» обязательно для заполнения',
            'title.required' => 'Поле «Title» обязательно для заполнения',
            'alias.required' => 'Поле «Alias» обязательно для заполнения',
            'alias.unique' => 'Значение поля «Alias» уже присутствует в базе данных',
        ];
    }
}
