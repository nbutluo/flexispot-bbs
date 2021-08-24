<div class="post_title">
    <span class="title_text">
        {{ $topic->title }}
        <span class="share_btn" onclick="openAlert()"></span>
        <span class="share_txt">share</span>
    </span>
    <div class="copy_box">
        <span class="title">post #1</span>
        <span class="link">{{ Request::url() }}</span>
        <span class="icons">
            <img src="/assets/bird.png" alt="">
            <img src="/assets/face.png" alt="">
            <img src="/assets/ins@2x.png" alt="">
            <img src="/assets/x.png" onclick="closeAlert()" alt="">
        </span>
    </div>
</div>
<p class="tags">
    <a href="{{ route('categories.show',$topic->category) }}">
        <span class="tag">{{ $topic->category->name }}</span>
    </a>
    <span class="tag">Topic</span>
</p>
