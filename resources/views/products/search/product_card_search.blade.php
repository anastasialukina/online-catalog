<li class="list-group-item">
    <div class="card" style="width: 18rem;">
        <img src="{{$product->image}}" class="img-thumbnail" alt="..." style="height: 200px;width: 240px;">
        <div class="card-body">
            <h5 class="card-title">{{$product->name}}</h5>
            <p class="card-text">{{$product->details}}</p>
            <a href="{{route('products.show', ['product' => $product->id])}}"
               class="btn btn-primary"> {{__('Show Product')}}</a>
        </div>
    </div>

</li>

