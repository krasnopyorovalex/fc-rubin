<?php

namespace App\Domain\GameImage\Commands;

use App\Domain\GameImage\Queries\GetGameImageByIdQuery;
use App\Http\Requests\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class UpdateGameImageCommand
 * @package App\Domain\GameImage\Commands
 */
class UpdateGameImageCommand
{

    use DispatchesJobs;

    private $request;
    private $id;

    /**
     * UpdateGalleryImageCommand constructor.
     * @param int $id
     * @param Request $request
     */
    public function __construct(int $id, Request $request)
    {
        $this->id = $id;
        $this->request = $request;
    }

    /**
     * @return bool
     */
    public function handle(): bool
    {
        $image = $this->dispatch(new GetGameImageByIdQuery($this->id));

        return $image->update($this->request->validated());
    }

}
