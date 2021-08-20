<p class="title">Sort by Category</p>
<div class="content">
    @foreach ($categories as $category)

    @if($category['_data'])
    <p class="category-tab" onclick="setHeight(this,'100px')">
        <img src="{{ asset('/assets/discuss.png') }}" alt="{{ $category['name'] }}" class="icon {{ $category['id'] ==3 ? 'show' : 'hidden'}}">
        <img src="{{ asset('/assets/bulb.png') }}" alt="{{ $category['name'] }}" class="icon {{ $category['id'] ==6 ? 'show' : 'hidden'}}">
        <span class="text">{{ $category['name'] }}</span>
        <span class="arrow-btn"></span>
    </p>
    <div class="more-menus">
        @foreach ($category['_data'] as $childCategory)
        <span>
            <a href="{{ route('categories.show',$childCategory['id']) }}" class="{{ category_nav_active($category['id']) }}">{{ $childCategory['name']}}</a>
        </span>
        @endforeach
    </div>

    @elseif ($category['id'] ==1)
    <p class="category-tab" onclick="setActive(this)">
        <img src="{{ asset('/assets/horn.png') }}" alt="{{ $category['name'] }}" class="icon">
        <span class="text">
            <a href="{{ route('categories.show',$category['id']) }}" class="{{ category_nav_active(1) }}">{{ $category['name'] }}</a>
        </span>
    </p>
    @elseif ($category['id'] ==2)
    <p class="category-tab" onclick="setActive(this)">
        <img src="{{ asset('/assets/flag.png') }}" alt="{{ $category['name'] }}" class="icon">
        <span class="text">
            <a href="{{ route('categories.show',$category['id']) }}" class="{{ category_nav_active($category['id']) }}">{{ $category['name'] }}</a>
        </span>
    </p>
    @elseif ($category['id'] ==4)
    <p class="category-tab" onclick="setActive(this)">
        <img src="{{ asset('/assets/note.png') }}" alt="{{ $category['name'] }}" class="icon">
        <span class="text">
            <a href="{{ route('categories.show',$category['id']) }}" class="{{ category_nav_active($category['id']) }}">{{ $category['name'] }}</a>
        </span>
    </p>
    @elseif ($category['id'] ==5)
    <p class="category-tab" onclick="setActive(this)">
        <img src="{{ asset('/assets/message2.png') }}" alt="{{ $category['name'] }}" class="icon">
        <span class="text">
            <a href="{{ route('categories.show',$category['id']) }}" class="{{ category_nav_active($category['id']) }}">{{ $category['name'] }}</a>
        </span>
    </p>
    @else
    <p class="category-tab" onclick="setActive(this)">
        <img src="{{ asset('/assets/discuss.png') }}" alt="{{ $category['name'] }}" class="icon">
        <span class="text">
            <a href="{{ route('categories.show',$category['id']) }}" class="{{ category_nav_active($category['id']) }}">{{ $category['name'] }}</a>
        </span>
    </p>
    @endif

    @endforeach

</div>
