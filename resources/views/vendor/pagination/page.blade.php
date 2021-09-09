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

function goTop() {
  document.documentElement.scrollTop = 0;
}
function toggleMenu() {
  let target = document.querySelector(".hamburg-menu"),
    menu_box = document.querySelector(".type");
  target.classList.toggle("active");
  if (target.classList.contains("active")) {
    menu_box.style.display = "flex";
  } else {
    menu_box.style.display = "none";
  }
}
function setActive(el) {
  let active = document.querySelector(".active-category-tab");
  if (active) {
    active.classList.remove("active-category-tab");
  }

  el.classList.add("active-category-tab");
}
function setHeight(el, height) {
  if (
    el.nextElementSibling.style.height &&
    el.nextElementSibling.style.height !== "0px"
  ) {
    el.lastElementChild.classList.remove("open");
    el.nextElementSibling.style.height = "0px";
  } else {
    let active = document.querySelector(".active-category-tab");
    if (active) {
      active.classList.remove("active-category-tab");
    }
    el.classList.add("active-category-tab");
    el.lastElementChild.classList.add("open");
    el.nextElementSibling.style.height = height || "120px";
  }
}

function showFloat(el) {
  let float = el.nextElementSibling;
  if (float) {
    float.style.display = "flex";
  }
}
function hideFloat(el) {
  let float = el.nextElementSibling;
  if (float) {
    float.style.display = "none";
  }
}

var modal = document.querySelector(".category_box"),
  all_tab = document.querySelector(".all_tab"),
  cates = document.querySelector(".cates_pc");

function toggleModal() {
  modal.style.display = "flex";
}


modal.addEventListener("click", () => {
  modal.style.display = "none";
});

</script>
@endsection
