<?php

namespace App\Http\ViewComposers;

use App\Domain\Catalog\Queries\GetAllCatalogsQuery;
use App\Domain\Info\Queries\GetAllInfosQuery;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class NewsComposer
 * @package App\Http\ViewComposers
 */
class NewsComposer
{
    use DispatchesJobs;

    private static $news;

    /**
     * @param View $view
     */
    public function compose(View $view)
    {
        if (! self::$news) {
            self::$news = $this->dispatch(new GetAllInfosQuery(true, 6));
        }

        $view->with('news', self::$news);
    }
}
