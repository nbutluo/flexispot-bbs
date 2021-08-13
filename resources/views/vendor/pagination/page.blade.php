@if ($paginator->hasPages())
<div class="num-btns">
  {{-- Previous Page Link --}}
  @if ($paginator->onFirstPage())
  <img src="{{ asset('/assets/grey_arrow.png') }}" class="left-btn">
  @else
  <a href="{{ $paginator->previousPageUrl() }}"> <img src="{{ asset('/assets/grey_arrow.png') }}" class="left-btn"></a>
  @endif

  {{-- Pagination Elements --}}
  @foreach ($elements as $element)
  @if (is_string($element))
  <span class="num">{{ $element }}</span>
  @endif
  {{-- Array Of Links --}}
  @if (is_array($element))
  @foreach ($element as $page => $url)
  @if ($page == $paginator->currentPage())
  <span class="num active">{{ $page }}</span>
  @else
  <a href="{{ $url }}"> <span class="num">{{ $page }}</span></a>
  @endif
  @endforeach
  @endif
  @endforeach



  {{-- Next Page Link --}}
  @if ($paginator->hasMorePages())
  <a href="{{ $paginator->nextPageUrl() }}"><img src="{{ asset('/assets/blue_arrow.png') }}" class="right-btn"></a>
  @else
  <img src="{{ asset('/assets/blue_arrow.png') }}" class="right-btn">
  @endif
</div>
@endif
