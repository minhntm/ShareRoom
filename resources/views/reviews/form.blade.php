{{ Form::open(['method' => 'POST', 'url' => route('rooms.reviews.store', ['room' => $room->id])]) }}
    <div id="user_stars"></div>
    {{ Form::text('comment', old('comment'), ['placeholder' => 'Your comment']) }}
    {{ Form::hidden('room_id', $room->id) }}
    {{ Form::submit('Submit', ['class' => 'btn btn-primary btn-theme', 'id' => 'submit']) }}
{{ Form::close() }}

<script>
    $('#user_stars').raty({
        path: '{{ url('/bower_components/jquery-raty/lib/images') }}',
        scoreName: 'star',
        score: 1
    });

    // $(document).on('click', '#submit', function(e){
    //     e.preventDefault();
    //
    // });

</script>