<?php

namespace App\Http\Controllers;

use App\Domain\Gallery\Queries\GetGalleryByIdQuery;
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
     * @param int $id
     * @return Application|Factory|View
     */
    public function show(int $id)
    {
        $gallery = $this->dispatch(new GetGalleryByIdQuery($id));

        return view('galleries.index', [
            'gallery' => $gallery
        ]);
    }
}
