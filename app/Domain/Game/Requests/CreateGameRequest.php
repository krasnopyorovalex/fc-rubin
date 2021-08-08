<?php

namespace Domain\Game\Requests;

use App\Http\Requests\Request;

/**
 * Class CreateGameRequest
 * @package Domain\Game\Requests
 */
class CreateGameRequest extends Request
{
    public function rules(): array
    {
        return [
            'alias' => 'bail|required|unique:games|max:64',
            'team_first_id' => 'integer|exists:teams,id|nullable',
            'team_second_id' => 'integer|exists:teams,id|nullable',
            'name' => 'required|max:512',
            'title' => 'required|string|max:512',
            'description' => 'string|max:512',
            'text' => 'string|nullable',
            'preview' => 'string|nullable',
            'image' => 'image',
            'started_at' => 'date_format:Y-m-d|nullable',
            'started_time_at' => 'date_format:H:i:s|nullable',
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
