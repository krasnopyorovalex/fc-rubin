<?php

namespace App\Domain\Team\Queries;

use App\Team;

/**
 * Class GetTeamByIdQuery
 * @package App\Domain\Team\Queries
 */
class GetTeamByIdQuery
{
    /**
     * @var int
     */
    private $id;

    /**
     * GetTeamByIdQuery constructor.
     * @param int $id
     */
    public function __construct(int $id)
    {
        $this->id = $id;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        return Team::with(['image'])->findOrFail($this->id);
    }
}