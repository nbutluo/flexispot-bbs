<p class="title">Sort by Category</p>


<div class="content">
  <p class="category-tab" onclick="setActive(this)">
    <img src="{{ asset('/assets/home.png') }}" class="icon">
    <span class="text">
      <a data-pjax href="{{ route('root') }}"
         class="{{ active_class(if_route('root'),'active-category-tab') }}">{{ __('All Categories') }}</a>
    </span>
  </p>
  @foreach ($categories as $category)

  
  
  


  <p class="category-tab" onclick="setActive(this)">
    <img src="{{ env('APP_URL').$category['icon'] }}" alt="{{ $category['name'] }}" class="icon">
    <span class="text">
      <a data-pjax href="{{ route('categories.show',$category['id']) }}"
         class="{{ category_nav_active($category['id']) }}">{{ $category['name'] }}</a>
    </span>
  </p>




  @endforeach

</div>
