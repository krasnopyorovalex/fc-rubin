<?php

namespace App\Domain\Game\Commands;

use App\Domain\Image\Commands\DeleteImageCommand;
use App\Domain\Game\Queries\GetGameByIdQuery;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Storage;

/**
 * Class DeleteGameCommand
 * @package App\Domain\Game\Commands
 */
class DeleteGameCommand
{

    use DispatchesJobs;

    /**
     * @var int
     */
    private $id;

    /**
     * DeleteGameCommand constructor.
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
        $Game = $this->dispatch(new GetGameByIdQuery($this->id));

        if($Game->image) {
            $this->dispatch(new DeleteImageCommand($Game->image));
        }

        Storage::deleteDirectory('public/Game/' . $this->id);

        return $Game->delete();
    }

}
