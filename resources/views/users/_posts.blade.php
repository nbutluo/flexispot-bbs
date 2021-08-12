@if (count($posts))

@foreach ($posts as $topic)
<div class="every-colum">
  <a class="every-colum-image" href="{{ route('users.show',[$topic->user, 'tab' => 'posts']) }}">
    <img src="{{ asset($topic->user->avatar) }}" alt="{{ $topic->user->name }}">
  </a>
  <div class="every-colum-content">
    <a href="{{ route('topics.show',$topic->id) }}" class="title"> {{ $topic->title }}</a>
    <div class="timeAndType">
      <div class="time">Created on {{ $topic->created_at->toFormattedDateString() }}</div>
      <a href="{{ route('categories.show',$topic->category->id) }}" class="{{active_categories_class($topic->category->id)}}">
        {{ $topic->category->name }}
      </a>
    </div>
  </div>
  <div class="every-colum-data">
    <div>
      <img src="/assets/eye.png" alt=""><span>&nbsp;{{ $topic->view_count }}</span>
    </div>
    <a class="every-colum-data-news">
      <img src="/assets/duanxin.png" alt=""><span>&nbsp;{{ $topic->reply_count }}</span>
    </a>
  </div>
</div>
@endforeach
<div class="pagi-box">
  <div class="num-btns">
    <img src="/assets/grey_arrow.png" class="left-btn">
    <span class="num active">1</span>
    <span class="num">2</span>
    <span class="num">3</span>
    <span class="num">4</span>
    <span class="num">5</span>
    <img src="/assets/blue_arrow.png" class="right-btn">
  </div>
</div>
@else
<span style="color: red;">暂无发帖数据</span>
@endif
