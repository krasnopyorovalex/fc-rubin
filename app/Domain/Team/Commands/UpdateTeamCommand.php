<?php

namespace App\Domain\Team\Commands;

use App\Domain\Image\Commands\DeleteImageCommand;
use App\Domain\Image\Commands\UploadImageCommand;
use App\Domain\Team\Queries\GetTeamByIdQuery;
use App\Events\RedirectDetected;
use App\Http\Requests\Request;
use App\Team;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class UpdateTeamCommand
 * @package App\Domain\Team\Commands
 */
class UpdateTeamCommand
{

    use DispatchesJobs;

    private $request;
    private $id;

    /**
     * UpdateTeamCommand constructor.
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
        $team = $this->dispatch(new GetTeamByIdQuery($this->id));
        $urlNew = $this->request->post('alias');

        if ($team->getOriginal('alias') != $urlNew) {
            event(new RedirectDetected($team->getOriginal('alias'), $urlNew));
        }

        if ($this->request->has('image')) {
            if ($team->image) {
                $this->dispatch(new DeleteImageCommand($team->image));
            }
            $this->dispatch(new UploadImageCommand($this->request, $team->id, Team::class));
        }

        return $team->update($this->request->validated());
    }

}