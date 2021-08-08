<?php

namespace App\Http\Controllers;

use App\Domain\Project\Queries\GetProjectByAliasQuery;

/**
 * Class GameController
 * @package App\Http\Controllers
 */
class ProjectController extends Controller
{
    /**
     * @param string $alias
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(string $alias)
    {
        $project = $this->dispatch(new GetProjectByAliasQuery($alias));

        return view('project.index', [
            'project' => $project
        ]);
    }
}
