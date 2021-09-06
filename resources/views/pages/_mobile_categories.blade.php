<div class="category_list">
  <p class="cate_title"><a href="{{ route('root') }}"> All Categories</a></p>
  @foreach ($categories as $category)

  @if($category['_data'])
  <p class="cate_title">

    <a href="{{ route('categories.show', $category['id']) }}">{{ $category['name'] }}</a>
    @foreach ($category['_data'] as $childCategory)
    <span><a href="{{ route('categories.show', $childCategory['id']) }}">{{ $childCategory['name']}}</a></span>
    @endforeach
  </p>
  @else
  <p class="cate_title"><a href="{{ route('categories.show', $category['id']) }}">{{ $category['name'] }}</a></p>
  @endif
  @endforeach
</div>
