@isset($categories)
    @include('categories.popular', $categories)
@endisset
@isset($products)
    @include('products.search.index_search', $products)
@endisset
