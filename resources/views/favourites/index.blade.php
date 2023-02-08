<div class="mb-3">
    <h2> {{ __('Your favourite products') }}</h2>
    @foreach($products as $product)
        <ul class="list-group" style="list-style-type:none;">
            @include('products.product_card', ['product' => $product])
        </ul>
    @endforeach
</div>

