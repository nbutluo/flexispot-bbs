@foreach ($replies as $index => $reply)
<div class="comment-box">
  <div class="user-box">
    <a href="{{ route('users.show',$reply->user_id ) }}" target="_blank"><img src="{{ $reply->user->avatar }}" alt="{{ $reply->user->name }}"></a>
    <span class="name">
      <a href="{{ route('users.show', [$reply->user_id]) }}" title="{{ $reply->user->name }}">
        {{ $reply->user->name }}
      </a>
    </span>
  </div>

  <div class="info" replyId="{{ $reply->id }}" parentId="{{ $reply->parent_id }}">
    <div class="date">
      <span>{{ $reply->created_at->toDayDateTimeString() }}</span>
      <span class="order">#{{ $index+2 }}</span>
    </div>
    <p class="content">
      <span class="text">{!! $reply->content !!}</span>
    </p>
  </div>

  <div class="btns">
    <span class="btn" style="color: #fff; cursor: auto;">编辑</span>
    <span class="btn" style="color: #fff; cursor: auto;">删除</span>
    <span class="btn reply-like-btn" replyId="{{ $reply->id }}" data-val="{{ $reply->id }}">
      @guest
      <img src="/assets/like.png" class="reply-like-img">
      @else
      <img src="{{$reply->hasLiked() ? '/assets/liked.png' : '/assets/like.png'}}" class="reply-like-img">
      @endguest
      <span class="reply-like-count">{{ $reply->like_count }}</span>
    </span>
    <span class="btn" onclick="addComment(this)"><img src="/assets/share_btn.png" alt="">Reply</span>
  </div>


  <div class="add-form">
    <form action="{{ route('subreplies.store') }}" method="POST" accept-charset="UTF-8" name="subreplies-store">
      @csrf
      <input type="hidden" name="topic_id" value="{{ $topic->id }}">
      <input type="hidden" name="parent_id" value="{{ $reply->id }}">
      <input type="hidden" name="parent_user_id" value="{{ $reply->user_id }}">
      <textarea name="content" cols="86" rows="2" class="comment-area"></textarea>
      <span class="save-btn" onclick="this.parentElement.submit()">SAVE</span>
    </form>
  </div>

  {{--
    <div class="sub-comments">
        <div class="sub-comment">
            <img src="/assets/avatar.png" alt="" class="left">
            <div class="right">
                <div class="comment">
                    <span class="name">Care</span>
                    <p class="content">AAAAAAAAAAAAAAAAAAAAAAAAAAAA</p>
                </div>
                <div class="sub-info">
                    <span class="date">Jun 2, 2021 8:32 pm</span>
                    <div class="icons">
                        <span class="btn">删除</span>
                        <span onclick="addComment(this)"><img src="/assets/message.png" alt=""></span>
                        <span onclick="toggleLike(this)"><img src="/assets/liked.png" alt="">
                        </span>
                    </div>
                    <div class="add-form">
                        <textarea name="" id="" cols="86" rows="2" class="comment-area"></textarea>
                        <span class="save-btn">SAVE</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="sub-comment">
            <img src="/assets/avatar.png" alt="" class="left">
            <div class="right">
                <div class="comment">
                    <span class="name">Care</span>
                    <p class="content">AAAAAAAAAAAAAAAAAAAAAAAAAAAA</p>
                </div>
                <div class="sub-info">
                    <span class="date">Jun 2, 2021 8:32 pm</span>
                    <div class="icons">
                        <span class="btn">删除</span>
                        <span onclick="addComment(this)"><img src="/assets/message.png" alt=""></span>
                        <span onclick="toggleLike(this)"><img src="/assets/liked.png" alt="">
                        </span>
                    </div>
                    <div class="add-form">
                        <textarea name="aa" id="" cols="86" rows="2" class="comment-area"></textarea>
                        <span class="save-btn">SAVE</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
  --}}
</div>
@endforeach
<!-- 分页 -->
<!-- TODO::分页数据分配 -->
@if ($replies->total()>5)
<div class="pagi-box">
  {!! $replies->links('pagination::page') !!}
</div>
@endif

@section('reply-list-scripts')
<script>
  $('.reply-like-btn').on('click', function() {

    const _this = this
    var num = Number($(_this).find('.reply-like-count').text());
    var replyId = $(_this).attr('replyId');

    $.ajax({
      type: "get",
      url: "/reply/like/" + replyId,
      dataType: "json",
      success: (response) => {
        // console.log(response);
        // 判断是否登录
        if (response.code == 0) {
          window.location.href = '/login';
          return false;
        }

        // // 切换点赞
        if (response.res == 1) {
          console.log(_this);
          $(_this).find('.reply-like-count').text(--num);
          $(_this).find('.reply-like-img').attr('src', '/assets/like.png');
        } else {
          $(_this).find('.reply-like-count').text(++num);
          $(_this).find('.reply-like-img').attr('src', '/assets/liked.png');
        }
      }
    });
  });
</script>
@endsection
