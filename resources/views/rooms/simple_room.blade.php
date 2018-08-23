<div class="col-md-4">
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
                @if (Auth::user()->id === $room->owner()->get()[0]->id)
                    <a onclick="event.preventDefault(); document.getElementById('form-{{$room->id}}').submit();" style="float:right;">
                        <i class="fas fa-trash"></i>
                    </a>
                    {{ Form::open(['method' => 'DELETE', 'url' => route('rooms.destroy', $room->id), 'id' => 'form-' . $room->id]) }}
                    {{ Form::close() }}
                @endif
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
