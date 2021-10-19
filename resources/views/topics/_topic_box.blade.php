<div class="user-box">
  <a href="{{ route('users.show',$topic->user_id) }}" target="_blank">
    <img src="{{ $topic->user->avatar }}" alt="">
  </a>
  <span class="name author-name">{{ $topic->user->name }}</span>
</div>

<div class="info">
  <div class="date">
    <span>{{ $topic->created_at->toDayDateTimeString() }}</span>
    <span class="order">#1</span>
  </div>
  <p class="content">
    <span class="text">{!! $topic->body !!}</span>
  </p>
</div>

<div class="btns">
  @can('update', $topic)
  <span class="btn">
    <a href="{{ route('topics.edit', $topic->id) }}" class="btn btn-outline-secondary btn-sm" role="button">
      <i class="far fa-edit"></i>
    </a>
  </span>
  <form action="{{ route('topics.destroy', $topic->id) }}" method="post" style="display: inline-block;"
        onsubmit="return confirm('Confirm delete ?');">
    @csrf
    @method('DELETE')
    <button class="btn btn-item" type="submit"><i class="far fa-trash-alt"></i></button>
  </form>
  @endcan
  <span class="btn like-btn">
    @guest
    <img src="/assets/like.png" class="like-img">
    @else
    <img src="{{ $topic->hasLiked() ? '/assets/liked.png': '/assets/like.png'}}" class="like-img">
    @endguest
    <span class="like-count">{{ $topic->like_count }}</span>
  </span>
  <span class="btn reply-topic" onclick="openModal()"><img src="/assets/share_btn.png">Reply </span>
  <span class="btn collect-topic">
    @guest
    <img src="/assets/collect.png" class="collect-img">
    @else
    <img src="{{$topic->hasCollected() ? '/assets/yellow_collect.png' : '/assets/collect.png'}}" class="collect-img"
         onclick="toggleCollect(this)">
    @endguest
  </span>
</div>

@section('reply_script')
<script>
  var num = Number($('.like-count').text());
  // console.log(num);

  // 话题点赞
  $('.like-btn').click(function() {
    $.ajax({
      type: "get",
      url: "{{ route('topic.togglelike',$topic->id) }}",
      dataType: "json",
      success: function(response) {
        console.log(response);
        // 判断是否登录
        if (response.code == 0) {
          window.location.href = `{{ route('login') }}`;
          return false;
        }

        // 切换点赞
        if (response.res == 1) {
          $('.like-count').text(num -= 1);
          $('.like-img').attr('src', '/assets/like.png')
        } else {
          $('.like-count').text(num += 1);
          $('.like-img').attr('src', '/assets/liked.png')
        }
      }
    });
  })
</script>

<script>
  $('.collect-topic').click(function() {
    $.ajax({
      type: "get",
      url: "{{ route('topic.togglecollect',$topic->id) }}",
      dataType: "json",
      success: function(response) {
        // 判断是否登录
        if (response.code == 0) {
          console.log(response.code == 0)
          window.location.href = `{{ route('login') }}`;
          return false;
        }
      }
    });
  });
</script>
@endsection
