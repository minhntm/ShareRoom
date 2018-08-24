<div class="col-md-4">
    <div class="hotel-box">
        <div class="header clearfix">
            <img src="{{ asset($bookmark->room()->first()->getFirstImageUrl()) }}" alt="img-1" class="img-responsive">
        </div>
        <div class="detail clearfix">
            <div class="pr">
                {{ trans('app.dollar') }}{{ $bookmark->room()->first()->price }}<sub>{{ trans('app.night') }}</sub>
                <div class="rating">
                    {{ $bookmark->room()->first()->rating() }}
                    <i class="fa fa-star"></i>
                </div>
            </div>
            <div>
                <span>{{ $bookmark->room()->first()->roomType()->get()[0]->type }}</span>
                @if (Auth::user()->id === $bookmark->room()->first()->owner()->get()[0]->id)
                    <a onclick="event.preventDefault(); document.getElementById('form-{{$room->id}}').submit();" style="float:right;">
                        <i class="fas fa-trash"></i>
                    </a>
                    {{ Form::open(['method' => 'DELETE', 'url' => route('rooms.destroy', $room->id), 'id' => 'form-' . $bookmark->room()->first()->id]) }}
                    {{ Form::close() }}
                @endif
            </div>
            <h3>
                <a href="{{ route('rooms.show', $bookmark->room()->first()->id) }}">{{ $bookmark->room()->first()->name }}</a>
            </h3>
            <h5 class="location">
                <a href="{{ route('rooms.show', $bookmark->room()->first()->id) }}">
                    <i class="fa fa-map-marker"></i>{{ $bookmark->room()->first()->address }},
                </a>
            </h5>
        </div>
    </div>
</div>
