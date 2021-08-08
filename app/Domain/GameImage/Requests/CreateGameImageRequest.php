<?php

namespace Domain\GameImage\Requests;

use App\Http\Requests\Request;

/**
 * Class CreateGameImageRequest
 * @package Domain\GameImage\Requests
 */
class CreateGameImageRequest extends Request
{
    public function rules()
    {
        return [
            'upload' => 'image',
            'gameId' => 'integer'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'upload.image' => 'Разрешено загружать только изображения',
            'gameId.integer' => 'Поле «id игры» должно быть целым числом'
        ];
    }
}
