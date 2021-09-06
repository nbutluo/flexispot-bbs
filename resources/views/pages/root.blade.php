@extends('layouts.app')

@section('styles')
<link href="{{ mix('css/index.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/nprogress.css') }}">
@endsection

@section('content')
<div class="banner-box">
  <img src="{{ asset('assets/banner.png') }}" alt="" class="banner">
</div>

<div class="forum-content" id="pjax-container">
  <div class="left-panel">
    <div class="card">
      @include('pages._categories')
    </div>
    @if ($announcements->is_show)
    <div class="card">
      <p class="title">Community Announcements</p>
      <a href="{{ $announcements->link }}" target="_blank">
        <div class="content">
          {{ $announcements->content }}
        </div>
      </a>
    </div>
    @endif

    <div class="card">
      <p class="title">Community Highlight</p>
      <div class="content">
        @if (count($advertises))

        @foreach ($advertises as $advertise)
        <a href="{{ $advertise->link }}" target="_blank"> <img src="{{ $advertise->cover }}" alt="" class="discuss"></a>
        @endforeach
        @else
        <img src="https://picsum.photos/334/278" alt="" class="discuss">

        @endif
      </div>
    </div>
  </div>

  <div class="right-panel">
    <div class="tabs-box">
      {{--  <span class="tab active_tab all_tab">All categories</span>--}}
      <a href="{{ Request::url() }}"><span class="tab {{ active_tab_class (if_query('tab',null))}}">Latest</span></a>
      <a href="?tab=top"><span class="tab {{ active_tab_class (if_query('tab','top'))}}">Top</span></a>
    </div>

    <div class="discuss-list">

      @if (count($topics))

      @foreach ($topics as $topic)
      <div class="discuss-box">
        <div class="info" onclick="window.location.href=`{{ route('topics.show',$topic->id) }}`">

          <div class="title">{{ $topic->title }}</div>

          <p>
            <span class="date"> Created on {{ $topic->created_at->formatLocalized('%B %d') }}</span>
            <span class="{{active_categories_class($topic->category->id)}}">
              {{ $topic->category->name }}
            </span>
          </p>
        </div>
        <div class="ava">
          <a href="{{ route('users.show',$topic->user_id) }}" target="_blank"></a>
          <img src="{{ asset($topic->user->avatar) }}" alt="{{ $topic->user->name }}" onmouseover="showFloat(this)"
            onmouseout="hideFloat(this)" onclick="location.href=`{{ route('users.show',$topic->user_id) }}` ">
          <div class="float-window" style="display: none;">
            <div class="head-row">
              <img src="{{ asset($topic->user->avatar) }}" alt="{{ $topic->user->name }}">
              <span>
                <span>{{ $topic->user->name }}</span>
                {{--<span>Lv.6</span>--}}
              </span>
            </div>
            <p class="row">
              <span>Member since: </span><span>{{ $topic->user->name }}</span>
            </p>
            <p class="row">
              <span>Posts:</span>
              <span>{{ $topic->user->posts()}}</span>
            </p>
            {{--
                <p class="row">
                    <span>Likes received: </span>
                    <span>36</span>
                </p>
                <p class="last-row">This user's public profile is hidden.</p>
             --}}
          </div>
        </div>
        <div class="nums">
          <span class="num">{{ $topic->view_count }}</span><span class="num">{{ $topic->reply_count }}</span>
        </div>
      </div>
      @endforeach

      <div class="pagi-box">
        @if (if_query('tab', 'top'))
        {!! $topics->appends(Request::except('page'))->links('pagination::page') !!}
        @else
        {!! $topics->links('pagination::page') !!}
        @endif
      </div>

      @else
      <p style="color: #e3342f;"> {{ _('Oh, no data yet') }}</p>
      @endif
    </div>
  </div>

</div>

<div class="category_box">
  <div class="category_cover"></div>
  <div class="category_list">
    <p class="cate_title"><a href="{{ route('root') }}"> All Categories</a></p>
    <p class="cate_title"><a href="{{ route('categories.show',1) }}">News & Announcements</a></p>
    <p class="cate_title">Deals & Giveaways</p>
    <p class="cate_title">
      General & Producr Discussion
      <span>Serie 1</span>
      <span>Serie 1</span>
      <span>Serie 1</span>
      <span>Serie 1</span>
    </p>
    <p class="cate_title">Questions & Answers</p>
    <p class="cate_title">Producr Rexiews</p>
    <p class="cate_title">
      Ideas & Suggestions
      <span>Standing desks</span>
      <span>Desk bikes</span>
      <span>Desk converters</span>
      <span>Services</span>
      <span>Others</span>
    </p>
  </div>
</div>

@endsection

@section('control-btns')
<div class="control-btns">
  <img src="{{ asset('assets/arrow.png') }}" alt="" onClick="goTop()" />
  <a href="{{ route('topics.create') }}" target="_blank">
    <img src="{{ asset('assets/plus.png') }}" alt="" />
  </a>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/root.js')}}"></script>

<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/jquery.pjax.js') }}"></script>
<script src="{{ asset('js/nprogress.js') }}"></script>

<script>
  (function($) {
        var LearnKu = {
            init: function() {
                var self = this;

                // Pjax 页面准备就绪的事件
                $(document).on('pjax:end', function() {
                    // 每一次 Pjax 请求完成后执行
                    NProgress.done();
                    self.siteBootUp();
                });

                // 第一次正常页面加载完成后执行
                self.siteBootUp();
            },

            siteBootUp: function() {
                var self = this;
                $(document).pjax('a', '#pjax-container');
                //定义pjax有效时间，超过这个时间会整页刷新
                $.pjax.defaults.timeout = 1200;
                $(document).on('pjax:start', function() {
                    NProgress.start();
                });
            },
        };
        window.LearnKu = LearnKu;
    })(jQuery);

    $(document).ready(function() {
        LearnKu.init();
    });
</script>
@endsection
