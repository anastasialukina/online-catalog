@foreach($products as $product)
    <ul class="list-group">
        @include('products.product_card', ['product' => $product])
    </ul>
@endforeach
