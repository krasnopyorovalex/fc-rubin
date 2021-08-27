<?php

namespace App\Domain\Game\Queries;

use App\Game;

/**
 * Class GetGameByAliasQuery
 * @package App\Domain\Game\Queries
 */
class GetGameByAliasQuery
{
    /**
     * @var string
     */
    private $alias;

    /**
     * GetGameByAliasQuery constructor.
     * @param string $alias
     */
    public function __construct(string $alias)
    {
        $this->alias = $alias;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        return Game::where('alias', $this->alias)->with(['images'])->firstOrFail();
    }
}
