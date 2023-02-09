@if(session()->has('success'))
    <div class="alert alert-success text-center">
        {{ session()->get('success') }}
    </div>
@endif

<h2>
    {{App\Models\Category::find($categoryId)->name}}
    {{ __(' category') }}
</h2>
<button class="btn btn-primary">
    <a href="{{ route('products.popular', ['category' => $categoryId]) }}">
        {{ __('Sort by popularity') }}</a>
</button>

<button class="btn btn-primary">
    <a href="{{ route('products.by-date', ['category' => $categoryId]) }}">
        {{ __('Sort by date from latest to first') }}</a>
</button>

<button class="btn btn-primary">
    <a href="{{ route('products.by-date-reverse', ['category' => $categoryId]) }}">
        {{ __('Sort by date from first to latest') }}</a>
</button>

<div>
    @foreach($products as $product)
        <ul class="list-group" style="list-style-type:none;">
            @include('products.product_card', ['product' => $product])
        </ul>
    @endforeach
</div>


