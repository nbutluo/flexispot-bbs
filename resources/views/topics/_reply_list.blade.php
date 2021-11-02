@foreach ($replies as $index => $reply)
<div class="comment-box">
  <div class="user-box">
    <a href="{{ route('users.show',$reply->user_id ) }}" target="_blank"><img src="{{ $reply->user->avatar }}"
           alt="{{ $reply->user->name }}"></a>
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
    <span class="btn reply-like-btn" replyId="{{ $reply->id }}" data-val="{{ $reply->id }}">
      @guest
      <img src="/assets/like.png" class="reply-like-img">
      @else
      <img src="{{$reply->hasLiked() ? '/assets/liked.png' : '/assets/like.png'}}" class="reply-like-img">
      @endguest
      <span class="reply-like-count">{{ $reply->like_count }}</span>
    </span>
    <span class="btn" onclick="addComment(this)"><img src="/assets/share_btn.png" alt="">Reply</span>
    @can('destroy', $reply)
    <form action="{{ route('replies.destroy', $reply->id) }}" style="display: inline-block;" method="post">
      @csrf
      @method('DELETE')
      <span class="btn btn-item" onclick="delReply(this)"><i class="far fa-trash-alt"></i></span>
    </form>
    @endcan
  </div>


  <div class="add-form">
    <form action="{{ route('subreplies.store') }}" method="POST" accept-charset="UTF-8" name="subreplies-store">
      @csrf
      <input type="hidden" name="topic_id" value="{{ $topic->id }}">
      <input type="hidden" name="parent_id" value="{{ $reply->id }}">
      <input type="hidden" name="parent_user_id" value="{{ $reply->user_id }}">
      <textarea name="content" cols="86" rows="2" class="comment-area"
                placeholder="Reply to @ {{ $reply->user->name }}"></textarea>
      <span class="save-btn" onclick="this.parentElement.submit()">SAVE</span>
    </form>
  </div>

  @includeWhen(count($subcomments = $reply->subcomments()->with(['user','subcomments'])->get())>=1,'topics._sub_comment'
  )
  @yield('subcomment-script')

</div>
@endforeach
<!-- TODO::分页数据分配 -->
@if ($replies->total()>5)
<div class="pagi-box">
  {!! $replies->links('pagination::page') !!}
</div>
@endif

@section('reply-list-scripts')
<script>
  var starLoading = false;

  $('.reply-like-btn').on('click', function() {

    const _this = this
    var num = Number($(_this).find('.reply-like-count').text());
    var replyId = $(_this).attr('replyId');

    if (starLoading) return;
    starLoading = true;

    $.ajax({
      type: "get",
      url: "/reply/like/" + replyId,
      dataType: "json",
      success: (response) => {
        // 判断是否登录
        if (response.code == 0) {
          <x-not-login/>
        }
        // // 切换点赞
        if (response.res == 1) {
          // console.log(_this);
          $(_this).find('.reply-like-count').text(num -= 1);
          $(_this).find('.reply-like-img').attr('src', '/assets/like.png');
        } else {
          $(_this).find('.reply-like-count').text(num += 1);
          $(_this).find('.reply-like-img').attr('src', '/assets/liked.png');
        }
      },
      complete: () => {
        starLoading = false;
      }
    });
  });

  function delReply(el) {
    Swal.fire({
      title: 'Are you sure to Delete?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        el.parentElement.submit()
      }
    })
  }
</script>
@endsection
