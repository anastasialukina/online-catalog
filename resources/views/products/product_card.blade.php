<li class="list-group-item">
    <div class="card" style="width: 18rem;">
        <img src="{{$product->image}}" class="img-thumbnail" alt="..." style="height: 200px;width: 240px;">
        <div class="card-body">
            <h5 class="card-title">{{$product->name}}</h5>
            <p class="card-text">{{$product->details}}</p>
            @auth
                @if($product->usersThatLiked()->find(Auth::user()) != null)
                    <form id="unlike_product"
                          action="{{route('product.unlike', ['product' => $product->id])}}" method="post">
                        <button type="submit"
                                class="btn btn-primary"> {{__('Remove From Favourites')}}
                        </button>
                        @method('delete')
                        @csrf
                    </form>
                @else
                    <button class="btn btn-primary">
                        <a href="{{route('product.like', ['product' => $product->id])}}">
                            {{__('Add To Favourites')}}</a>
                    </button>
                @endif
            @endauth
            <a href="{{route('products.show', ['product' => $product->id])}}"
               class="btn btn-primary"> {{__('Show Product')}}</a>
        </div>
    </div>

</li>
