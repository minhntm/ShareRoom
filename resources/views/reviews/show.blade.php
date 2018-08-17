<ul class="comments">
    <li>
        <div class="comment">
            <div class="comment-author">
                <a href="#">
                    <img src="{{ url('img/users/user.png') }}" alt="avatar">
                </a>
            </div>
            <div class="comment-content">
                <div class="comment-meta">
                    <div class="comment-meta-author">
                        {{ $review->user()->get()[0]->name }}
                    </div>
                    <div class="comment-meta-delete">
                        @if (Auth::user()->id === $review->user()->get()[0]->id)
                            <a onclick="event.preventDefault(); document.getElementById('delete-form').submit();">
                                <i class="fas fa-trash"></i>
                            </a>
                            {{ Form::open(['id' => 'delete-form', 'method' => 'DELETE', 'url' => route('rooms.reviews.destroy', ['room' => $review->room()->get()[0]->id, 'review' => $review->id])]) }}
                            {{ Form::close() }}
                        @else
                            <a onclick="event.preventDefault(); document.getElementById('delete-form').submit();">
                                <i class="fas fa-trash"></i>
                            </a>
                            <!-- {{ Form::open(['id' => 'delete-form', 'method' => 'DELETE', 'url' => route('rooms.reviews.destroy', ['room' => $review->room()->get()[0]->id, 'review' => $review->id])]) }}
                            {{ Form::close() }} -->
                        @endif
                    </div>
                    <div class="comment-meta-date">
                        <span class="hidden-xs">8:42 PM 3/3/2017</span>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="comment-body">
                    <div class="comment-rating">
                        <div id="star_{{ $review->id }}"></div>
                    </div>
                    <p>{{ $review->comment }}</p>
                </div>
            </div>
        </div>
    </li>
</ul>

<script>
    $('#star_{{ $review->id }}').raty({
        path: '{{ url('/bower_components/jquery-raty/lib/images') }}',
        readOnly: true,
        score: {{ $review->star }}
    })
</script>