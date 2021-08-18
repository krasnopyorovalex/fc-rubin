<div class="well well__ins2 bg-light projects__in-main">
    <div class="container">
        <div class="h2 text-primary text-center">Последние новости</div>
        <div class="row">
            @foreach($news as $item)
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="box2" itemscope itemtype="http://schema.org/ImageObject">
                        @if($item->image)
                        <a class="thumb" href="{{ $item->url }}">
                            <img src="{{ $item->image->path }}" alt="{{ $item->image->alt }}" title="{{ $item->image->title }}" itemprop="contentUrl">
                            <span class="thumb_overlay"></span>
                        </a>
                        @endif

                        <div class="box2_cnt">
                            <h5 class="strong">
                                <a href="{{ $item->url }}" itemprop="name">{{ $item->name }}</a>
                            </h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="button-wrap">
            <a class="btn2 btn2__color_mod" href="{{ route('page.show', ['alias' => 'news']) }}">Все новости</a>
        </div>
    </div>
</div>
