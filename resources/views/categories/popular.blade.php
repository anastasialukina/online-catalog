<ul class="list-group" style="list-style-type:none;">
    @foreach($categories as $category)
        <li class="list-group-item">
            <a href="{{ route('categories.show', ['category' => $category->id]) }}">
                {{ $category->name }}</a>
        </li>
    @endforeach
</ul>
