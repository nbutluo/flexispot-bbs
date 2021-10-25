<div class="sub-comments">
  @foreach ($subcomments as $subcomment)
  <div class="sub-comment">
    <img src="{{ $subcomment->user->avatar }}" class="left avatar">
    <div class="right">
      <div class="comment">
        <a href="{{ route('users.show',$subcomment->user->id) }}" target="_blank">
          <span class="name">{{ $subcomment->user->name}}</span>
        </a>
        <p class="content">{{ strip_tags($subcomment->content) }}</p>
      </div>
      <div class="sub-info">
        <span class="date">{{ $subcomment->created_at->toDayDateTimeString() }}</span>
        <div class="icons">
          @can('destroy',$subcomment)
          <form action="{{ route('replies.destroy', $subcomment->id) }}" style="display: inline-block;"
                onsubmit="return confirm('Be sure to delete this comment?');" method="post">
            @csrf
            @method('DELETE')
            <button class="btn btn-item" type="submit"><i class="far fa-trash-alt"></i></button>
          </form>
          @endcan
          <span onclick="addComment(this)"><img src="/assets/message.png"></span>
          <span class="sub-like-btn">
            @guest
            <img src="/assets/like.png" class="subcomment-like-img" subcommentId="{{ $subcomment->id }}"
                 onclick="subLikeBtn(this)">
            @else
            <img src="{{ $subcomment->hasLiked() ? '/assets/liked.png' : '/assets/like.png' }}"
                 class="subcomment-like-img" subcommentId="{{ $subcomment->id }}" onclick="subLikeBtn(this)">
            @endguest
            <span class="subcomment-like-count">{{ $subcomment->like_count }}</span>
          </span>
        </div>
        <div class="add-form">
          <form action="{{ route('subreplies.store') }}" method="POST" style="display: inherit">
            @csrf
            <input type="hidden" name="topic_id" value="{{ $topic->id }}">
            <input type="hidden" name="parent_id" value="{{ $reply->id }}">
            <input type="hidden" name="parent_user_id" value="{{ $subcomment->user_id }}">
            <textarea name="content" cols="80" rows="2" class="comment-area"
                      placeholder="Reply to @ {{ $subcomment->user->name }}"></textarea>
            <span class="save-btn" onclick="this.parentElement.submit()">SAVE</span>
          </form>
        </div>
      </div>
    </div>
  </div>
  @endforeach
</div>

@section('subcomment-script')

<script>
  var starLoading = false;
  function subLikeBtn(el) {
    var subcommentId  = el.getAttribute('subcommentId');
    var src = el.getAttribute('src');;
    var count = el.nextElementSibling.textContent;
    // return false;
    if(starLoading) return ;
    starLoading = true;

    $.ajax({
      type: "get",
      url: "/reply/like/" + subcommentId,
      dataType: "json",
      success: (response) => {
        // 判断是否登录
        if (response.code == 0) {
          window.location.href = `{{ route('login') }}`;
          return false;
        }

       // 切换点赞
        if (response.res == 1) {
          el.src = '/assets/like.png';
          el.nextElementSibling.textContent = String(parseInt(count)-1)

        } else {
          el.src = '/assets/liked.png';
          el.nextElementSibling.textContent = String(parseInt(count)+ 1)
        }
      },
      complete: () => {
        starLoading = false;
      }
    });
  }

</script>

@endsection
