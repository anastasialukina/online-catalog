<li class="list-group-item">
    <div class="card" style="width: 18rem;">
        <img src="{{$product->image}}" class="img-thumbnail" alt="..." style="height: 200px;width: 240px;">
        <div class="card-body">
            <h5 class="card-title">{{$product->name}}</h5>
            <p class="card-text">{{$product->details}}</p>
            <a href="{{route('product.like', ['product' => $product->id])}}"
               class="btn btn-primary"> {{__('Add To Favourites')}}</a>
            <a href="{{route('products.show', ['product' => $product->id])}}"
               class="btn btn-primary"> {{__('Show Product')}}</a>
        </div>
    </div>
    @if(session()->has('success'))
        <div class="alert alert-success text-center">
            {{ session()->get('success') }}
        </div>
    @endif
</li>
