@foreach($reviews as $review)
    @include('reviews.show', compact('review'))
@endforeach