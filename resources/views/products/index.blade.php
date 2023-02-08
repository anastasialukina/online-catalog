@if(session()->has('success'))
    <div class="alert alert-success text-center">
        {{ session()->get('success') }}
    </div>
@endif
@foreach($products as $product)
    <ul class="list-group" style="list-style-type:none;">
        @include('products.product_card', ['product' => $product])
    </ul>
@endforeach

