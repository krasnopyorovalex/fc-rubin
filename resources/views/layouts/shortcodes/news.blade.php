<div class="row list__items" itemscope="" itemtype="http://schema.org/BlogPosting" itemprop="BlogPost">
    @foreach ($news as $new)
        <div class="col-md-6 col-sm-12 col-xs-12 center991">
            <div itemscope="" itemprop="image" itemtype="http://schema.org/ImageObject" class="img">
                <figure>
                    <a href="{{ $new->url }}">
                        <img itemprop="url contentUrl" src="{{ asset($new->image->path) }}" class="img-add" alt="{{ $new->image->alt }}" title="{{ $new->image->title }}">
                        <meta itemprop="url" content="{{ asset($new->image->path) }}">
                        <meta itemprop="width" content="365">
                        <meta itemprop="height" content="330">
                    </a>
                </figure>
            </div>
            <div class="text-wrap">
                <div class="date">
                    <time itemprop="datePublished" datetime="{{ $new->published_at->format('c') }}">
                        {{ $new->published_at->formatLocalized('%d %b %Y') }} г.
                    </time>
                </div>
                <a href="{{ $new->url }}" class="name">{{ $new->name }}</a>
                <div itemprop="articleBody" class="text">
                    {!! $new->preview !!}
                </div>
                <a href="{{ $new->url }}" class="btn2 btn2__color_mod read-more">Читать далее</a>
            </div>
        </div>
    @endforeach
</div>
<div class="pagination">
    {{ $news->links() }}
</div>
