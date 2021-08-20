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
    <span class="btn like-btn" onclick="toggleLike(this)"><img src="/assets/like.png"><span class="like-count">{{ $topic->likerCount()}}</span></span>
    <span class="btn reply-topic" onclick="openModal()"><img src="/assets/share_btn.png">Reply </span>
    <span class="btn" onclick="toggleCollect(this)"><img src="/assets/yellow_collect.png"></span>
</div>
