{{ Form::open(['method' => 'POST', 'id' => 'submit-review']) }}
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

    $('#submit-review').on('submit', function(e){
        e.preventDefault();
        var formData = $(this).serialize();
        formData['star'] = $('user_stars').raty('score');
        $.ajax({
            url: '{{ route('reviews.store') }}',
            method: 'POST',
            data: formData,
            success: function(data) {
                toastr.success(data.message, data.title);
                $('#submit-review')[0].reset();
                fetchAllReviews();
            },
            error: function(data) {
                console.log('asdfasdf')
                console.log(data)
                var errors = data.responseJSON.errors
                for (let error in errors) {
                    for (let subErr of errors[error]) {
                        toastr.error(subErr, error.capitalize());
                    }
                }
            }
        })
    })

    // $(document).on('click', '#submit', function(e){
    //     e.preventDefault();

    // });

    
</script>