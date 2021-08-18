<?php

namespace App\Http\Controllers;

use App\Domain\Game\Queries\GetGameByAliasQuery;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

/**
 * Class GalleryController
 * @package App\Http\Controllers
 */
class GalleryController extends Controller
{
    /**
     * @param string $alias
     * @return Application|Factory|View
     */
    public function show(string $alias)
    {
        $gallery = $this->dispatch(new GetGameByAliasQuery($alias));

        return view('galleries.index', [
            'gallery' => $gallery
        ]);
    }
}
