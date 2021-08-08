<?php

namespace App\Domain\Game\Commands;

use App\Domain\Image\Commands\UploadImageCommand;
use App\Http\Requests\Request;
use App\Game;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class CreateGameCommand
 * @package App\Domain\Game\Commands
 */
class CreateGameCommand
{
    use DispatchesJobs;

    private $request;

    /**
     * CreateGameCommand constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @return bool
     */
    public function handle(): bool
    {
        $game = new Game();
        $game->fill($this->request->validated());
        $game->save();

        if ($this->request->has('image')) {
            return $this->dispatch(new UploadImageCommand($this->request, $game->id, Game::class));
        }

        return true;
    }

}
