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
      <div class="content">
        @if ($announcements->link)
        <a data-pjax href="{{ $announcements->link }}" target="_blank"> {{ $announcements->content }}</a>
        @else
        {{ $announcements->content }}
        @endif
      </div>
    </div>
    @endif

    <div class="card">
      <p class="title">Community Highlight</p>
      <div class="content">
        @if (count($advertises))

        @foreach ($advertises as $advertise)
        <div class="item">
          @if ($advertise->link)
          <a data-pjax href="{{ $advertise->link }}" target="_blank">
            <img src="{{ $advertise->cover }}" class="discuss">
          </a>
          @else
          <img src="{{ $advertise->cover }}" class="discuss">
          @endif

          <p>{{ $advertise->title ? $advertise->title : ''}}</p>
        </div>
        @endforeach
        @else
        <img src="https://picsum.photos/334/278" alt="" class="discuss">

        @endif
      </div>
    </div>
  </div>

  <div class="right-panel">
    <div class="tabs-box">
      <span class="tab all_tab" onclick="toggleModal()">All categories</span>
      <a data-pjax href="{{ Request::url() }}"><span
              class="tab {{ active_tab_class (if_query('tab',null))}}">Latest</span></a>
      <a data-pjax href="?tab=top"><span class="tab {{ active_tab_class (if_query('tab','top'))}}">Top</span></a>
    </div>

    <div class="discuss-list">

      @if (count($topics))

      @foreach ($topics as $topic)
      <div class="discuss-box">
        <div class="info" onclick="window.location.href=`{{ route('topics.show',$topic->id) }}`">

          <div class="title"><a data-pjax href="{{ route('topics.show',$topic->id) }}">{{ $topic->title }}</a></div>

          <p>
            <span class="date"> Created on {{ $topic->created_at->format('M d, Y') }}</span>
            <span class="{{active_categories_class($topic->category->id)}}">
              {{ $topic->category->name }}
            </span>
          </p>
        </div>
        <div class="ava">
          <a data-pjax href="{{ route('users.show',$topic->user_id) }}" target="_blank"></a>
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
  @include('pages._mobile_categories')
</div>

@endsection

@section('control-btns')
<div class="control-btns">
  <img src="{{ asset('assets/arrow.png') }}" alt="" onClick="goTop()" />
  <a data-pjax href="{{ route('topics.create') }}" target="_blank">
    <img src="{{ asset('assets/plus.png') }}" alt="" />
  </a>
</div>
@endsection

<script src="{{ asset('js/jquery.min.js') }}"></script>
<script>
  $(document).ready(function() {
    $(document).pjax('[data-pjax] a, a[data-pjax]', '#pjax-container');
    //定义pjax有效时间，超过这个时间会整页刷新
    $.pjax.defaults.timeout = 1200;

    $(document).on('pjax:start', function() {
      NProgress.start();
    });
    $(document).on('pjax:end', function() {
      NProgress.done();
    });
  });
</script>
