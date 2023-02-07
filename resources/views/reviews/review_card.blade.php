<li class="list-group-item">
    <div class="card border-info" style="max-width: 18rem;">
        <div class="card-header">{{ App\Models\User::find($review->user_id)->name }}</div>
        <div class="card-body">
            <h6 class="card-title">
                @for ($i = 1; $i <= $review->rating; $i++)
                    <i class="far fa-star fa-sm text-info">☆</i>
                @endfor
            </h6>
            <p class="card-text">{{$review->review}}</p>
        </div>
    </div>
</li>
<br>
