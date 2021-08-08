<?php

namespace App\Domain\Game\Commands;

use App\Domain\Image\Commands\DeleteImageCommand;
use App\Domain\Image\Commands\UploadImageCommand;
use App\Domain\Game\Queries\GetGameByIdQuery;
use App\Events\RedirectDetected;
use App\Http\Requests\Request;
use App\Game;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class UpdateGameCommand
 * @package App\Domain\Game\Commands
 */
class UpdateGameCommand
{

    use DispatchesJobs;

    private $request;
    private $id;

    /**
     * UpdateGameCommand constructor.
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
        $Game = $this->dispatch(new GetGameByIdQuery($this->id));
        $urlNew = $this->request->post('alias');

        if ($Game->getOriginal('alias') != $urlNew) {
            event(new RedirectDetected($Game->getOriginal('alias'), $urlNew));
        }

        if ($this->request->has('image')) {
            if ($Game->image) {
                $this->dispatch(new DeleteImageCommand($Game->image));
            }
            $this->dispatch(new UploadImageCommand($this->request, $Game->id, Game::class));
        }

        return $Game->update($this->request->all());
    }

}
