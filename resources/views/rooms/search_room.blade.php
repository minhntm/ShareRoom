<div class="col-md-6">
    <div class="hotel-box">
        <div class="header clearfix">
            <img src="{{ asset($room->getFirstImageUrl()) }}" alt="img-1" class="img-responsive">
        </div>
        <div class="detail clearfix">
            <div class="pr">
                {{ trans('app.dollar') }}{{ $room->price }}<sub>{{ trans('app.night') }}</sub>
                <div class="rating">
                    {{ $room->rating() }}
                    <i class="fa fa-star"></i>
                </div>
            </div>
            <div>
                <span>{{ $room->roomType()->get()[0]->type }}</span>
            </div>
            <h3>
                <a href="{{ route('rooms.show', $room->id) }}">{{ $room->name }}</a>
            </h3>
            <h5 class="location">
                <a href="{{ route('rooms.show', $room->id) }}">
                    <i class="fa fa-map-marker"></i>{{ $room->address }},
                </a>
            </h5>
        </div>
    </div>
</div>
