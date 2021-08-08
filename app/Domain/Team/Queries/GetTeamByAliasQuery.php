<?php

namespace App\Domain\Team\Queries;

use App\Team;

/**
 * Class GetTeamByAliasQuery
 * @package App\Domain\Team\Queries
 */
class GetTeamByAliasQuery
{
    /**
     * @var string
     */
    private $alias;

    /**
     * GetTeamByAliasQuery constructor.
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
        return Team::where('alias', $this->alias)->firstOrFail();
    }
}