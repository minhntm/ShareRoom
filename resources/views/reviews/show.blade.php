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
                    @auth
                        <div class="comment-meta-delete">
                            @if (Auth::user()->id === $review->user()->get()[0]->id)
                                <a onclick="event.preventDefault(); document.getElementById('delete-form').submit();">
                                    <i class="fas fa-trash"></i>
                                </a>
                                {{ Form::open(['id' => 'delete-form', 'method' => 'DELETE', 'url' => route('rooms.reviews.destroy', ['room' => $review->room()->get()[0]->id, 'review' => $review->id])]) }}
                                {{ Form::close() }}
                            @endif

                        </div>
                    @endauth
                    <div class="comment-meta-date">
                        <span class="hidden-xs">{{ $review->created_at }}</span>
                    </div>
                </div>
                <div class="clearfix"></div>
                @auth 
                    @if (Auth::user()->id !== $review->user()->get()[0]->id)
                        @if (Auth::user()->hasLike($review->id))
                            @if (Auth::user()->getLike($review->id)->is_vote === 1)
                                <a id="upvote-{{$review->id}}" class="liked">
                                    <i class="fas fa-arrow-up"></i>
                                    <!-- <span id="upvote-count-{{$review->id}}">{{ count($review->upvotes) }}</span> -->
                                </a> 
                                <span id="up-downvote-subtract-{{$review->id}}">{{ $review->upvoteDownvoteSubtraction() }}</span>
                                <a id="downvote-{{$review->id}}">
                                    <i class="fas fa-arrow-down"></i>
                                    <!-- <span id="downvote-count-{{$review->id}}">{{ count($review->downvotes) }}</span> -->
                                </a> 
                            @else
                                <a id="upvote-{{$review->id}}">
                                    <i class="fas fa-arrow-up"></i>
                                    <!-- <span id="upvote-count-{{$review->id}}">{{ count($review->upvotes) }}</span> -->
                                </a> 
                                <span id="up-downvote-subtract-{{$review->id}}">{{ $review->upvoteDownvoteSubtraction() }}</span>
                                <a id="downvote-{{$review->id}}" class="liked">
                                    <i class="fas fa-arrow-down"></i>
                                    <!-- <span id="downvote-count-{{$review->id}}">{{ count($review->downvotes) }}</span> -->
                                </a> 
                            @endif
                        @else
                            <a id="upvote-{{$review->id}}">
                                <i class="fas fa-arrow-up"></i>
                                <!-- <span id="upvote-count-{{$review->id}}">{{ count($review->upvotes) }}</span> -->
                            </a> 
                            <span id="up-downvote-subtract-{{$review->id}}">{{ $review->upvoteDownvoteSubtraction() }}</span>
                            <a id="downvote-{{$review->id}}">
                                <i class="fas fa-arrow-down"></i>
                                <!-- <span id="downvote-count-{{$review->id}}">{{ count($review->downvotes) }}</span> -->
                            </a> 
                        @endif
                    @endif
                @endauth
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
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function() {

    user_like_{{$review->id}} = '{!! Auth::user()->hasLike($review->id) !!}';
    is_vote_{{$review->id}} = '{!! Auth::user()->getLike($review->id)['is_vote'] !!}';
    like_id_{{$review->id}} = '{!! Auth::user()->getLike($review->id)['id'] !!}';
    // upvote_count_{{$review->id}} = {{ count($review->upvotes) }};
    // downvote_count_{{$review->id}} = {{ count($review->downvotes) }};
    upvote_downvote_subtraction_{{$review->id}} = {{ $review->upvoteDownvoteSubtraction() }};

    destroy_route = '{{ route('likes.destroy', 1) }}';
    update_route = '{{ route('likes.update', 1)}}';

    destroy_route = destroy_route.substring(0, destroy_route.length-1);
    update_route = update_route.substring(0, update_route.length-1);
    

    $(document).on('click', '#upvote-{{$review->id}}', function(e){
        e.preventDefault();
        if ( user_like_{{$review->id}} === '1' ) {
            if ( is_vote_{{$review->id}} === '1' ) {
                $.ajax({
                    url: destroy_route + like_id_{{$review->id}},
                    type: 'DELETE',
                    // data: {'review_id': '{{$review->id}}', 'is_vote': '1'},
                    success: function(data) {
                        $('#upvote-{{$review->id}}').removeClass('liked');
                        user_like_{{$review->id}} = data['user_like'];
                        is_vote_{{$review->id}} = data['is_vote'];
                        like_id_{{$review->id}} = data['like_id'];
                        // upvote_count_{{$review->id}}--;
                        // $('#upvote-count-{{$review->id}}').text(''+upvote_count_{{$review->id}});
                        upvote_downvote_subtraction_{{$review->id}}--;
                        $('#up-downvote-subtract-{{$review->id}}').text(''+upvote_downvote_subtraction_{{$review->id}});
                    }
                })
            } else {
                $.ajax({
                    url: update_route + like_id_{{$review->id}},
                    type: 'PUT',
                    data: {'review_id': '{{$review->id}}', 'is_vote': '1'},
                    dataType: 'json',
                    success: function(data) {
                        $('#upvote-{{$review->id}}').addClass('liked');
                        $('#downvote-{{$review->id}}').removeClass('liked');
                        user_like_{{$review->id}} = data['user_like'];
                        is_vote_{{$review->id}} = data['is_vote'];
                        like_id_{{$review->id}} = data['like_id'];
                        // upvote_count_{{$review->id}}++;
                        // downvote_count_{{$review->id}}--;
                        // $('#upvote-count-{{$review->id}}').text(''+upvote_count_{{$review->id}});
                        // $('#downvote-count-{{$review->id}}').text(''+downvote_count_{{$review->id}});
                        upvote_downvote_subtraction_{{$review->id}} = upvote_downvote_subtraction_{{$review->id}} + 2;
                        $('#up-downvote-subtract-{{$review->id}}').text(''+upvote_downvote_subtraction_{{$review->id}});
                    }
                })
            }
        } else {
            $.ajax({
                url: '{{route('likes.store')}}',
                type: 'POST',
                data: {'review_id': '{{$review->id}}', 'is_vote': '1'},
                dataType: 'json',
                success: function(data) {
                    $('#upvote-{{$review->id}}').addClass('liked');
                    user_like_{{$review->id}} = data['user_like'];
                    is_vote_{{$review->id}} = data['is_vote'];
                    like_id_{{$review->id}} = data['like_id'];
                    // upvote_count_{{$review->id}}++;
                    // $('#upvote-count-{{$review->id}}').text(''+upvote_count_{{$review->id}});
                    upvote_downvote_subtraction_{{$review->id}}++;
                    $('#up-downvote-subtract-{{$review->id}}').text(''+upvote_downvote_subtraction_{{$review->id}});
                }
            })
        }
    })

    $(document).on('click', '#downvote-{{$review->id}}', function(e){
        e.preventDefault();
        if ( user_like_{{$review->id}} === '1' ) {
            if ( is_vote_{{$review->id}} === '1' ) {
                $.ajax({
                    url: update_route + like_id_{{$review->id}},
                    type: 'PUT',
                    data: {'review_id': '{{$review->id}}', 'is_vote': '0'},
                    dataType: 'json',
                    success: function(data) {
                        $('#upvote-{{$review->id}}').removeClass('liked');
                        $('#downvote-{{$review->id}}').addClass('liked');
                        user_like_{{$review->id}} = data['user_like'];
                        is_vote_{{$review->id}} = data['is_vote'];
                        like_id_{{$review->id}} = data['like_id'];
                        // upvote_count_{{$review->id}}--;
                        // downvote_count_{{$review->id}}++;
                        // $('#upvote-count-{{$review->id}}').text(''+upvote_count_{{$review->id}});
                        // $('#downvote-count-{{$review->id}}').text(''+downvote_count_{{$review->id}});
                        upvote_downvote_subtraction_{{$review->id}} = upvote_downvote_subtraction_{{$review->id}} - 2;
                        $('#up-downvote-subtract-{{$review->id}}').text(''+upvote_downvote_subtraction_{{$review->id}});
                    }
                })
            } else {
                $.ajax({
                    url: destroy_route + like_id_{{$review->id}},
                    type: 'DELETE',
                    // data: {'review_id': '{{$review->id}}', 'is_vote': '0'},
                    success: function(data) {
                        $('#downvote-{{$review->id}}').removeClass('liked');
                        user_like_{{$review->id}} = data['user_like'];
                        is_vote_{{$review->id}} = data['is_vote'];
                        like_id_{{$review->id}} = data['like_id'];
                        // downvote_count_{{$review->id}}--;
                        // $('#downvote-count-{{$review->id}}').text(''+downvote_count_{{$review->id}});
                        upvote_downvote_subtraction_{{$review->id}}++;
                        $('#up-downvote-subtract-{{$review->id}}').text(''+upvote_downvote_subtraction_{{$review->id}});
                    }
                })
            }
        } else {
            $.ajax({
                url: '{{route('likes.store')}}',
                type: 'POST',
                data: {'review_id': '{{$review->id}}', 'is_vote': '0'},
                dataType: 'json',
                success: function(data) {
                    $('#downvote-{{$review->id}}').addClass('liked');
                    user_like_{{$review->id}} = data['user_like'];
                    is_vote_{{$review->id}} = data['is_vote'];
                    like_id_{{$review->id}} = data['like_id'];
                    // downvote_count_{{$review->id}}++;
                    // $('#downvote-count-{{$review->id}}').text(''+downvote_count_{{$review->id}});
                    upvote_downvote_subtraction_{{$review->id}}--;
                    $('#up-downvote-subtract-{{$review->id}}').text(''+upvote_downvote_subtraction_{{$review->id}});
                }
            })
        }
    })
    })
</script>