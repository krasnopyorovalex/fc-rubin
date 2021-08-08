<?php

namespace App\Domain\GameImage\Commands;

use App\Domain\GameImage\Queries\GetGameImageByIdQuery;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Storage;

/**
 * Class DeleteGameImageCommand
 * @package App\Domain\GameImage\Commands
 */
class DeleteGameImageCommand
{

    use DispatchesJobs;

    private $id;

    /**
     * DeleteGalleryImageCommand constructor.
     * @param int $id
     */
    public function __construct(int $id)
    {
        $this->id = $id;
    }

    /**
     * Execute the job.
     *
     * @return bool
     */
    public function handle(): bool
    {
        $image = $this->dispatch(new GetGameImageByIdQuery($this->id));

        Storage::delete([
            'public/games/' . $image->game_id . '/' . $image->basename . '.' . $image->ext,
            'public/games/' . $image->game_id . '/' . $image->basename . '_thumb.' . $image->ext
        ]);

        return $image->delete();
    }

}
