<div class="post_title">
  <span class="title_text">
    {{ $topic->title }}
    <span class="share_btn" onclick="openAlert()"></span>
  </span>
  <div class="copy_box">
    <span class="title">post #1</span>
    <input type="text" class="link" value="{{ Request::url() }}" readonly />
    <span class="icons">
      <a class="addthis_button_twitter" href="#"> <img src="/assets/bird.png"></a>
      <a class="addthis_button_facebook" href="#"><img src="/assets/face.png"> </a>
      <a class="linkedin_share" target="_blank"
        href="https://www.linkedin.com/shareArticle?mini=true&url={{ Request::url() }}&title={{ $topic->title }}&source=&summary={{ $topic->excerpt }}">
        <img src="/assets/linkedin.png"></a>
      <img src="/assets/x.png" onclick="closeAlert()" alt="">
    </span>
  </div>
</div>
<p class="tags">
  <a href="{{ route('categories.show',$topic->category) }}">
    <span class="tag">{{ $topic->category->name }}</span>
  </a>
  <!-- <span class="tag" style="background-color: #F65442;">Topic</span> -->
</p>
