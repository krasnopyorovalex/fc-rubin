<?php

namespace App\Domain\GameImage\Commands;

use App\GameImage;
use App\Services\UploadImagesService;

/**
 * Class CreateGameImageCommand
 * @package App\Domain\GameImage\Commands
 */
class CreateGameImageCommand
{

    private $uploadImage;

    /**
     * CreateGameImageCommand constructor.
     * @param UploadImagesService $uploadImage
     */
    public function __construct(UploadImagesService $uploadImage)
    {
        $this->uploadImage = $uploadImage;
    }

    /**
     * @return bool
     */
    public function handle(): bool
    {
        $gameImage = new GameImage();
        $gameImage->basename = $this->uploadImage->getImageHashName();
        $gameImage->ext = $this->uploadImage->getExt();
        $gameImage->game_id = $this->uploadImage->getEntityId();

        return $gameImage->save();
    }

}
