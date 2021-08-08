<?php

namespace App\Http\Controllers\Admin;

use App\Domain\Game\Queries\GetGameByIdQuery;
use App\Domain\GameImage\Commands\CreateGameImageCommand;
use App\Domain\GameImage\Commands\DeleteGameImageCommand;
use App\Domain\GameImage\Commands\UpdateGameImageCommand;
use App\Domain\GameImage\Commands\UpdatePositionsGameImageCommand;
use App\Domain\GameImage\Queries\GetGameImageByIdQuery;
use Domain\GameImage\Requests\CreateGameImageRequest;
use Domain\GameImage\Requests\UpdateGameImageRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\UploadImagesService;

/**
 * Class GameImageController
 * @package App\Http\Controllers\Admin
 */
class GameImageController extends Controller
{
    /**
     * @var UploadImagesService
     */
    private $uploadGalleryImagesService;

    /**
     * GalleryImageController constructor.
     * @param UploadImagesService $uploadGalleryImagesService
     */
    public function __construct(UploadImagesService $uploadGalleryImagesService)
    {
        $this->uploadGalleryImagesService = $uploadGalleryImagesService;
    }

    /**
     * @param int $game
     * @return array
     * @throws \Throwable
     */
    public function index(int $game): array
    {
        $game = $this->dispatch(new GetGameByIdQuery($game));

        return [
            'images' => view('admin.games._images_box', [
                'game' => $game
            ])->render()
        ];
    }

    /**
     * @param CreateGameImageRequest $request
     * @param $game
     * @return array
     */
    public function store(CreateGameImageRequest $request, $game): array
    {
        $this->uploadGalleryImagesService->setHeightThumb(370);
        $this->uploadGalleryImagesService->setWidthThumb(370);

        $image = $this->uploadGalleryImagesService->upload($request, 'game', $game);
        $this->dispatch(new CreateGameImageCommand($image));

        return [
            'message' => 'Данные сохранены успешно'
        ];
    }

    /**
     * @param $id
     * @return string
     * @throws \Throwable
     */
    public function edit($id): string
    {
        $image = $this->dispatch(new GetGameImageByIdQuery($id));

        return view('admin.games._image_popup', [
            'image' => $image
        ])->render();
    }

    /**
     * @param $id
     * @param UpdateGameImageRequest $request
     * @return array
     * @throws \Throwable
     */
    public function update($id, UpdateGameImageRequest $request): array
    {
        $this->dispatch(new UpdateGameImageCommand($id, $request));
        $image = $this->dispatch(new GetGameImageByIdQuery($id));

        return [
            'images' => view('admin.games._images_box', [
                'game' => $image->game
            ])->render(),
            'message' => 'Данные сохранены успешно'
        ];
    }

    /**
     * @param $id
     * @return array
     */
    public function destroy($id): array
    {
        $this->dispatch(new DeleteGameImageCommand($id));

        return [
            'message' => 'Изображение удалено успешно'
        ];
    }

    /**
     * @param Request $request
     * @return array
     */
    public function updatePositions(Request $request): array
    {
        $this->dispatch(new UpdatePositionsGameImageCommand($request));

        return [
            'message' => 'Порядок изображений сохранён успешно'
        ];
    }
}
