<div class="header">
  <div>
    <a href="{{ route('root') }}">
      <img src="{{ asset('assets/logo.png')}}" alt="" />
    </a>
  </div>
  <div class="type">
    <div class="type-active">
      <img src="/assets/home.png" alt="" /><span>Forum</span>
    </div>
    <div><img src="/assets/gift.png" alt="" /><span>Testting</span></div>
    <div><img src="/assets/uplod.png" alt="" /><span>Shop</span></div>
  </div>
  @guest
  <div class="login">
    <div class="login-not">
      <div class="new_post">
        <a href="{{ route('topics.create') }}">
          <span class="plus-img"></span>
        </a>
        <span style="margin: 0 4px; color: #999">|</span>
      </div>
      <div class="login-box">
        <a href="{{ route('login') }}"><span style="color: #fff">Log in</span></a>
      </div>
    </div>
  </div>
  @else
  <div class="login">
    <div class="new_post">
      <a href="{{ route('topics.create') }}">
        <span class="plus-img"></span>
      </a>
      <span style="margin: 0 4px; color: #999">|</span>
    </div>
    <div class="login-yes">
      <div class="message">{{ Auth::user()->notification_count }}</div>
      <img src="{{ Auth::user()->avatar }}" alt="" id="avatars">
    </div>
    <div id="news">
      <div class="news-title">
        <div class="news-title-line"><a href="#"><img src="/assets/login.png" alt="">
            Individual</a></div>
        <div class="news-title-line"><img src="/assets/collect.png" alt=""> Collect</div>
        <div class="news-title-line"><img src="/assets/pen.png" alt=""> Edit</div>
      </div>
      <div class="news-bottom">
        <form action="{{ route('logout') }}" method="POST" onsubmit="return confirm('您确定要退出吗？');">
          @csrf
          <button type="submit">QUit</button>
        </form>
      </div>
    </div>
  </div>
  @endguest
</div>
<script src="{{ asset('js/header.js') }}"></script>
