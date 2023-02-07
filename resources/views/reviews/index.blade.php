@foreach($reviews as $review)
    <ul class="list-group">
        @include('reviews.review_card', ['review' => $review])
    </ul>
@endforeach
