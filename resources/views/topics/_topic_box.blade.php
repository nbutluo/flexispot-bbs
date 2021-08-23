<div class="user-box">
    <a href="{{ route('users.show',$topic->user_id) }}" target="_blank">
        <img src="{{ asset($topic->user->avatar) }}" alt="">
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
    <span class="btn">编辑</span>
    <span class="btn">删除</span>
    <span class="btn like-btn">
        @guest
        <img src="/assets/like.png" class="like-img">
        @else
        <img src="{{ $topic->hasLiked() ? '/assets/liked.png': '/assets/like.png'}}" class="like-img">
        @endguest
        <span class="like-count">{{ $topic->likerCount()}}</span>
    </span>
    <span class="btn reply-topic" onclick="openModal()"><img src="/assets/share_btn.png">Reply </span>
    <span class="btn" onclick="toggleCollect(this)"><img src="/assets/yellow_collect.png"></span>
</div>

@section('reply_script')
<script>
    var num = Number($('.like-count').text());
    console.log(num);

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
                    window.location.href = '/login';
                    return false;
                }

                // 切换点赞
                if (response.res == 1) {
                    $('.like-count').text(--num);
                    $('.like-img').attr('src', '/assets/like.png')
                } else {
                    $('.like-count').text(++num);
                    $('.like-img').attr('src', '/assets/liked.png')
                }
            }
        });
    })
</script>
@endsection
