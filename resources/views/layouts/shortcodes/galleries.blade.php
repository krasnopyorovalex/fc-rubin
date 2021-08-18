<div class="row list__items" itemscope="" itemtype="http://schema.org/BlogPosting" itemprop="BlogPost">
    @foreach ($galleries as $gallery)
        <div class="col-md-6 col-sm-12 col-xs-12 center991">
            @if(count($gallery->images))
            <div itemscope="" itemprop="image" itemtype="http://schema.org/ImageObject" class="img">
                <figure>
                    <a href="{{ $gallery->urlGallery }}">
                        <img itemprop="url contentUrl" src="{{ asset($gallery->images[0]->getPath()) }}" class="img-add" alt="{{ $gallery->images[0]->alt }}" title="{{ $gallery->images[0]->title }}">
                        <meta itemprop="url" content="{{ asset($gallery->images[0]->path) }}">
                        <meta itemprop="width" content="365">
                        <meta itemprop="height" content="330">
                    </a>
                </figure>
            </div>
            @endif
                <div class="text-wrap">
                    <a href="{{ $gallery->urlGallery }}" class="name">{{ $gallery->name }}</a>
                </div>
        </div>
    @endforeach
</div>
<div class="pagination">
    {{ $galleries->links() }}
</div>
