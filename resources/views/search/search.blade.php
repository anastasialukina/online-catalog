<form id="search_form" action="{{ route('search.results') }}" method="post">
    @csrf
    <label for="word">{{ __('Search categories and products') }}</label>
    <input id="word" type="search" class="form-control" placeholder="Enter a word to search" name="word">
    <button type="submit" class="btn btn-primary">{{ __('Search') }}</button>
</form>
