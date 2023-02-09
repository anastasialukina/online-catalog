@foreach($products as $product)
    <ul class="list-group" style="list-style-type:none;">
        @include('products.search.product_card_search', ['product' => $product])
    </ul>
@endforeach
