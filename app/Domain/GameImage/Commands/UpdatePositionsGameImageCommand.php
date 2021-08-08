<?php

namespace App\Domain\GameImage\Commands;

use App\Domain\GameImage\Queries\GetGameImageByIdQuery;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;

/**
 * Class UpdatePositionsGameImageCommand
 * @package App\Domain\GameImage\Commands
 */
class UpdatePositionsGameImageCommand
{

    use DispatchesJobs;

    private $request;

    /**
     * UpdatePositionsGameImageCommand constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function handle(): void
    {
        $data = $this->request->post()['data'];

        if( is_array($data)) {
            foreach ($data as $position => $imageId) {
                $image = $this->dispatch(new GetGameImageByIdQuery($imageId));
                $image->pos = $position;
                $image->update();
            }
        }
    }
}
