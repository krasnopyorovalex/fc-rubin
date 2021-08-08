<section class="section-games">
    @foreach ($games as $game)
        <div class="row">
            <div class="col-md-2">
                <div class="section-games-item-name">
                    {{ $game->name }}
                </div>
            </div>
            <div class="col-2">
                <div class="section-games-item-date">
                    <div>{{ $game->started_at->formatLocalized('%d %b %Y') }}</div>
                    <div>{{ $game->started_time_at }}</div>
                </div>
            </div>
            <div class="col-6">
                <div class="section-games-item-team">
                    <div class="name-city">
                        <div class="name">{{ $game->teamFirst->name }}</div>
                        <div class="city">{{ $game->teamFirst->city }}</div>
                    </div>
                    <div class="image">
                        @if($game->teamFirst->image )
                            <img src="{{ asset($game->teamFirst->image->path) }}" alt="{{ $game->teamFirst->image->alt }}" title="{{ $game->teamFirst->image->title }}">
                        @endif
                    </div>
                    <div class="image">
                        @if($game->teamSecond->image )
                            <img src="{{ asset($game->teamSecond->image->path) }}" alt="{{ $game->teamSecond->image->alt }}" title="{{ $game->teamSecond->image->title }}">
                        @endif
                    </div>
                    <div class="name-city">
                        <div class="name">{{ $game->teamSecond->name }}</div>
                        <div class="city">{{ $game->teamSecond->city }}</div>
                    </div>
                </div>
            </div>
            <div class="col-2">
                <a href="{{ $game->url }}" class="btn2">Подробнее</a>
            </div>
        </div>
    @endforeach
</section>