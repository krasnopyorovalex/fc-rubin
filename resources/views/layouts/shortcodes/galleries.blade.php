<div class="row list__items galleries" itemscope="" itemtype="http://schema.org/BlogPosting" itemprop="BlogPost">
    @foreach ($galleries as $gallery)
        <div class="col-md-6 col-sm-12 col-xs-12 center991">
            @if($gallery->image)
            <div itemscope="" itemprop="image" itemtype="http://schema.org/ImageObject" class="img">
                <figure>
                    <a href="{{ $gallery->urlGallery }}">
                        <img itemprop="url contentUrl" src="{{ asset($gallery->image->path) }}" class="img-add" alt="{{ $gallery->image->alt }}" title="{{ $gallery->image->title }}">
                        <meta itemprop="url" content="{{ asset($gallery->image->path) }}">
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
