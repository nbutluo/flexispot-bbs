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
    <div class="info">
        <div class="date">
            <span>{{ $reply->created_at->toDayDateTimeString() }}</span>
            <span class="order">#{{ $index+2 }}</span>
        </div>
        <p class="content">
            <span class="text">{!! $reply->content !!}</span>
        </p>
    </div>
    <div class="btns">
        <span class="btn"><img src="/assets/heart.png" alt=""> 2</span>
        <span class="btn" onclick="openModal()">
            <img src="/assets/share_btn.png" alt="">Reply
        </span>
    </div>
</div>
@endforeach
<!-- 分页 -->
<div class="pagi-box">
    {!! $replies->links('pagination::page') !!}
</div>
