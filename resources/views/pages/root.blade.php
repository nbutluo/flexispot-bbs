@extends('layouts.app')
@section('title', '首页')
<link href="{{ mix('css/index.css') }}" rel="stylesheet">
@section('content')
<div class="banner-box">
  <img src="assets/banner.png" alt="" class="banner" />
</div>
<div class="forum-content">
  <div class="left-panel">
    <div class="card">
      <p class="title">Sort by Category</p>
      <div class="content">
        <p class="category-tab" onclick="setActive(this)">
          <img src="/assets/horn.png" alt="" class="icon" />
          <span class="text">News & Announcements</span>
        </p>
        <p class="category-tab" onclick="setActive(this)">
          <img src="/assets/flag.png" alt="" class="icon" />
          <span class="text">Deals & Giveaways</span>
        </p>
        <p class="category-tab" onclick="setHeight(this,'100px')">
          <img src="/assets/discuss.png" alt="" class="icon" />
          <span class="text">General & Product Discussion</span>
          <span class="arrow-btn"></span>
        </p>
        <div class="more-menus">
          <span>Serie 1</span>
          <span>Serie 1</span>
          <span>Serie 1</span>
          <span>Serie 1</span>
        </div>
        <p class="category-tab" onclick="setActive(this)">
          <img src="/assets/note.png" alt="" class="icon" />
          <span class="text">Questions & Answers</span>
        </p>
        <p class="category-tab" onclick="setActive(this)">
          <img src="/assets/message2.png" alt="" class="icon" />
          <span class="text">Product Reviews</span>
        </p>
        <p class="category-tab" onclick="setHeight(this,'100px')">
          <img src="/assets/bulb.png" alt="" class="icon" />
          <span class="text">Ideas & Suggestions</span>
          <span class="arrow-btn"></span>
        </p>
        <div class="more-menus">
          <span>Standing desks</span>
          <span>Desk bikes</span>
          <span>Desk converters</span>
          <span>Services</span>
          <span>Others</span>
        </div>
      </div>
    </div>
    <div class="card">
      <p class="title">Community Announcements</p>
      <div class="content">
        Community Guidelines to Improve Your Experience!
      </div>
    </div>
    <div class="card">
      <p class="title">Community Highlight</p>
      <div class="content">
        <img src="https://picsum.photos/334/278" alt="" class="discuss" />
        <img src="https://picsum.photos/334/278" alt="" class="discuss" />
      </div>
    </div>
  </div>
  <div class="right-panel">
    <div class="tabs-box">
      <span class="tab active_tab all_tab">All categories</span>
      <span class="tab">Latest</span>
      <span class="tab">Top</span>
    </div>
    <div class="discuss-list">
      <div class="discuss-box">
        <div class="info">
          <div class="title">
            Because we are getting such an excluse, small family here
          </div>
          <p>
            <span class="date"> Created on Jun 16</span>
            <span class="tag">Deals & Giveaways</span>
          </p>
        </div>
        <div class="ava">
          <img src="/assets/avatar.png" alt="user avatar" />
          <!-- <div class="float-window">
            <div class="head-row">
              <img src="/assets/avatar.png" alt="" />
              <span>
                <span>Lisa</span>
                <span>Lv.6</span>
              </span>
            </div>
            <p class="row">
              <span>Member since: </span><span>Lisa</span>
            </p>
            <p class="row">
              <span>Posts:</span>
              <span>24</span>
            </p>
            <p class="row">
              <span>Likes received: </span>
              <span>36</span>
            </p>
            <p class="last-row">This user's public profile is hidden.</p>
          </div> -->
        </div>
        <div class="nums">
          <span class="num">215</span><span class="num">15</span>
        </div>
      </div>
      <div class="discuss-box">
        <div class="info">
          <div class="title">
            Because we are getting such an excluse, small family here
          </div>
          <p>
            <span class="date"> Created on Jun 16</span>
            <span class="tag">Deals & Giveaways</span>
          </p>
        </div>
        <div class="ava">
          <img src="/assets/avatar.png" alt="user avatar" />
        </div>
        <div class="nums">
          <span class="num">215</span><span class="num">15</span>
        </div>
      </div>
      <div class="discuss-box">
        <div class="info">
          <div class="title">
            Because we are getting such an excluse, small family here
          </div>
          <p>
            <span class="date"> Created on Jun 16</span>
            <span class="tag">Deals & Giveaways</span>
          </p>
        </div>
        <div class="ava">
          <img src="/assets/avatar.png" alt="user avatar" />
        </div>
        <div class="nums">
          <span class="num">215</span><span class="num">15</span>
        </div>
      </div>
      <div class="discuss-box">
        <div class="info">
          <div class="title">
            Because we are getting such an excluse, small family here
          </div>
          <p>
            <span class="date"> Created on Jun 16</span>
            <span class="tag">Deals & Giveaways</span>
          </p>
        </div>
        <div class="ava">
          <img src="/assets/avatar.png" alt="user avatar" />
        </div>
        <div class="nums">
          <span class="num">215</span><span class="num">15</span>
        </div>
      </div>
      <div class="discuss-box">
        <div class="info">
          <div class="title">
            Because we are getting such an excluse, small family here
          </div>
          <p>
            <span class="date"> Created on Jun 16</span>
            <span class="tag">Deals & Giveaways</span>
          </p>
        </div>
        <div class="ava">
          <img src="/assets/avatar.png" alt="user avatar" />
        </div>
        <div class="nums">
          <span class="num">215</span><span class="num">15</span>
        </div>
      </div>
      <div class="discuss-box">
        <div class="info">
          <div class="title">
            Because we are getting such an excluse, small family here
          </div>
          <p>
            <span class="date"> Created on Jun 16</span>
            <span class="tag">Deals & Giveaways</span>
          </p>
        </div>
        <div class="ava">
          <img src="/assets/avatar.png" alt="user avatar" />
        </div>
        <div class="nums">
          <span class="num">215</span><span class="num">15</span>
        </div>
      </div>

      <div class="discuss-box">
        <div class="info">
          <div class="title">
            Because we are getting such an excluse, small family here
          </div>
          <p>
            <span class="date"> Created on Jun 16</span>
            <span class="tag">Deals & Giveaways</span>
          </p>
        </div>
        <div class="ava">
          <img src="/assets/avatar.png" alt="user avatar" />
        </div>
        <div class="nums">
          <span class="num">215</span><span class="num">15</span>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="category_box">
  <div class="category_cover"></div>
  <div class="category_list">
    <p class="cate_title">News & Announcements</p>
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
<div class="control-btns">
  <img src="/assets/arrow.png" alt="" onClick="goTop()" />
  <a href="/new.html">
    <img src="/assets/plus.png" alt="" />
  </a>
</div>
@stop

@section('scripts')
<script src="{{ asset('js/root.js')}}"></script>
@endsection
