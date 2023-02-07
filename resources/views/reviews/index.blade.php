@foreach($reviews as $review)
    <ul class="list-group" style="list-style-type:none;">
        @include('reviews.review_card', ['review' => $review])
    </ul>
@endforeach
