<?php

namespace App\Domain\Game\Queries;

use App\Game;

/**
 * Class GetGameByIdQuery
 * @package App\Domain\Game\Queries
 */
class GetGameByIdQuery
{
    /**
     * @var int
     */
    private $id;

    /**
     * GetGameByIdQuery constructor.
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
        return Game::with(['image'])->findOrFail($this->id);
    }
}
