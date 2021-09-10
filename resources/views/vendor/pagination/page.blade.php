@if ($paginator->hasPages())

<div class="num-btns">
  {{-- 上一页按钮
  {{-- @if ($paginator->onFirstPage())
  <span class="left-btn disabled" onclick="undatePagi('left')"></span>
  @else
  <a href="{{ $paginator->previousPageUrl() }}"> <span class="left-btn" onclick="undatePagi('left')"></span></a>
  @endif
  --}}


  <span class="left-btn" onclick="undatePagi('left',this);" data-url={{ $paginator->previousPageUrl() }}></span>
  @for ($page = 1; $page <= $paginator->lastPage(); $page++)
    @if ($page == $paginator->currentPage())
    <span class="pagi-num active" onclick="undatePagi('',this)">{{ $page }}</span>
    @else

    @if (if_query('tab', 'top'))
    <span class="pagi-num" onclick="undatePagi('',this);"
          data-url="{{ Request::url()  }}?tab=top&page={{ $page }}">{{ $page }}</span>
    @else
    <span class="pagi-num" onclick="undatePagi('',this);"
          data-url="{{ Request::url()  }}?page={{ $page }}">{{ $page }}</span>
    @endif


    @endif

    @endfor
    <span class="right-btn" onclick="undatePagi('right',this);" data-url={{ $paginator->nextPageUrl() }}></span>


    {{-- 下一页按钮
    @if ($paginator->hasMorePages())
    <a href="{{ $paginator->nextPageUrl() }}"> <span class="right-btn" onclick="undatePagi('right')"></span></a>
    @else
    <span class="right-btn disabled" onclick="undatePagi('right')"></span>
    @endif
    --}}
</div>
@endif

@section('scripts')
<script>
  var activeIdx = 0;
  var temp = location.href.split('page=')[1];
  if(temp){
    activeIdx = parseInt(temp) -1;
  }

function removeActive() {
  let active = document.querySelector(".active");
  if (active) {
    active.classList.remove("active");
  }
}
let left_btn = document.querySelector(".left-btn"),
  right_btn = document.querySelector(".right-btn"),
  nums = document.querySelectorAll(".pagi-num");
// 初次渲染分页器
undatePagi("first");

function undatePagi(leftRight, el) {
  if (leftRight !== "first") {
    removeActive();
  }
  // if (leftRight == "left" && activeIdx > 0) {
  //   activeIdx--;
  // } else if (leftRight == "right" && activeIdx < nums.length - 1) {
  //   activeIdx++;
  // }
  if(el&&el.dataset.url){
    location.href=el.dataset.url;
  }
  let start = 0,
    end = nums.length - 1;
  if (activeIdx >= 2 && activeIdx <= nums.length - 3) {
    start = activeIdx - 2;
    end = activeIdx + 2;
  } else if (activeIdx < 2) {
    start = 0;
    end = 4;
  } else if (activeIdx > nums.length - 3) {
    start = nums.length - 5;
  }
  nums.forEach((num, idx) => {
    if (idx >= start && idx <= end) {
      num.style.display = "inline";
    } else {
      num.style.display = "none";
    }
  });
  if (activeIdx == 0) {
    left_btn.classList.add("disabled");
  } else if (activeIdx == nums.length - 1) {
    right_btn.classList.add("disabled");
  } else if (right_btn.classList.contains("disabled")) {
    right_btn.classList.remove("disabled");
  } else if (left_btn.classList.contains("disabled")) {
    left_btn.classList.remove("disabled");
  }
  nums[activeIdx].classList.add("active");
}


</script>
@endsection
