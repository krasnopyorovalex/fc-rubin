<?php

namespace App\Domain\Team\Commands;

use App\Domain\Image\Commands\UploadImageCommand;
use App\Http\Requests\Request;
use App\Team;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class CreateTeamCommand
 * @package App\Domain\Team\Commands
 */
class CreateTeamCommand
{
    use DispatchesJobs;

    private $request;

    /**
     * CreateTeamCommand constructor.
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
        $team = new Team();
        $team->fill($this->request->validated());
        $team->save();

        if ($this->request->has('image')) {
            return $this->dispatch(new UploadImageCommand($this->request, $team->id, Team::class));
        }

        return true;
    }

}