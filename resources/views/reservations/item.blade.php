<div class="hotel-box-list">
    <div class="row">
        <div class="col-md-4">
            <img src="{{ asset($reservation->room()->get()[0]->getFirstImageUrl()) }}" alt="rooms-col-1" class="img-responsive">
        </div>
        <div class="col-md-8 detail">
            <div class="heading">
                <div class="row">
                    <div class="col-md-10">
                        <div class="title">
                            <h3>
                                <a href="{{ route('rooms.show', $reservation->room_id) }}">{{ $reservation->room()->get()[0]->name }}</a>
                            </h3>
                        </div>
                    </div>
                    @auth
                        @if (Auth::user()->id === $reservation->user()->get()[0]->id)
                            <div class="col-md-2">
                                <a onclick="event.preventDefault(); document.getElementById('delete-form').submit();">
                                    <i class="fas fa-trash"></i>
                                    {{ trans('app.delete') }}
                                </a>
                                {{ Form::open(['id' => 'delete-form', 'method' => 'DELETE', 'url' => route('users.reservation.destroy', ['user' => Auth::user()->id, 'reservation' => $reservation->id])]) }}
                                {{ Form::close() }}
                            </div>
                        @endif
                    @endauth
                </div>
                <div class="price">
                    {{ trans('app.show-price', ['price' => $reservation->total]) }}
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <ul class="fecilities">
                        <li>
                            <i class="fas fa-hourglass-start"></i>
                            {{ trans('app.start-date') }}
                        </li>
                        <li>
                            {{ $reservation->start_date }}
                        </li>
                    </ul>
                </div>
                <div class="col-sm-4">
                    <ul class="fecilities">
                        <li>
                            <i class="fas fa-hourglass-end"></i>
                            {{ trans('app.end-date') }}
                        </li>
                        <li>
                            {{ $reservation->end_date }}
                        </li>
                    </ul>
                </div>
                <div class="col-sm-4">
                    <ul class="fecilities">
                        <li>
                            <i class="fas fa-bell"></i>
                            {{ trans('app.status') }}
                        </li>
                        <li>
                            @if ($reservation->status==1)
                                {{ trans('app.on') }}
                            @else
                                {{ trans('app.off') }}
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
            <div class="hiddenmt-15">
                <a href="{{ route('rooms.show', $reservation->room_id) }}" class="read-more-btn">{{ trans('app.read-more') }}</a>
            </div>
        </div>
    </div>
</div>