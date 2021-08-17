@extends('layouts.app')

@section('styles')
<link href="{{ mix('css/index.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="banner-box">
    <img src="assets/banner.png" alt="" class="banner">
</div>
<div class="forum-content">
    <div class="left-panel">
        <div class="card">
            <p class="title">Sort by Category</p>
            <div class="content">
                <p class="category-tab" onclick="setActive(this)">
                    <img src="./assets/horn.png" alt="" class="icon">
                    <span class="text">News &amp; Announcements</span>
                </p>
                <p class="category-tab" onclick="setActive(this)">
                    <img src="./assets/flag.png" alt="" class="icon">
                    <span class="text">Deals &amp; Giveaways</span>
                </p>
                <p class="category-tab" onclick="setHeight(this,'100px')">
                    <img src="./assets/discuss.png" alt="" class="icon">
                    <span class="text">General &amp; Product Discussion</span>
                    <span class="arrow-btn"></span>
                </p>
                <div class="more-menus">
                    <span>Serie 1</span>
                    <span>Serie 1</span>
                    <span>Serie 1</span>
                    <span>Serie 1</span>
                </div>
                <p class="category-tab" onclick="setActive(this)">
                    <img src="./assets/note.png" alt="" class="icon">
                    <span class="text">Questions &amp; Answers</span>
                </p>
                <p class="category-tab" onclick="setActive(this)">
                    <img src="./assets/message2.png" alt="" class="icon">
                    <span class="text">Product Reviews</span>
                </p>
                <p class="category-tab" onclick="setHeight(this,'100px')">
                    <img src="./assets/bulb.png" alt="" class="icon">
                    <span class="text">Ideas &amp; Suggestions</span>
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
            <!-- <span class="tab active_tab all_tab">All categories</span> -->
            <a href="{{ route('root') }}"><span class="tab {{ active_tab_class (if_query('tab',null))}}">Latest</span></a>
            <a href="?tab=top"><span class="tab {{ active_tab_class (if_query('tab','top'))}}">Top</span></a>
        </div>
        <div class="discuss-list">

            @if (count($topics))

            @foreach ($topics as $topic)
            <div class="discuss-box">
                <div class="info">
                    <div class="title"><a href="{{ route('topics.show',$topic->id) }}" target="_blank">{{ $topic->title }}</a></div>
                    <p>
                        <span class="date"> Created on {{ $topic->created_at->formatLocalized('%B %d') }}</span>
                        <span class="{{active_categories_class($topic->category->id)}}">
                            <a href="{{ route('categories.show',$topic->category_id) }}" target="_blank">{{ $topic->category->name }}</a>
                        </span>
                    </p>
                </div>
                <div class="ava">
                    <a href="{{ route('users.show',$topic->user_id) }}" target="_blank"></a>
                    <img src="{{ asset($topic->user->avatar) }}" alt="{{ $topic->user->name }}" onmouseover="showFloat(this)" onmouseout="hideFloat(this)" onclick="location.href='/users/{{ $topic->user_id }}' ">
                    <div class="float-window" style="display: none;">
                        <div class="head-row">
                            <img src="{{ asset($topic->user->avatar) }}" alt="{{ $topic->user->name }}">
                            <span>
                                <span>{{ $topic->user->name }}</span>
                                <span>Lv.6</span>
                            </span>
                        </div>
                        <p class="row">
                            <span>Member since: </span><span>{{ $topic->user->name }}</span>
                        </p>
                        <p class="row">
                            <span>Posts:</span>
                            <span>{{ $topic->user->posts()}}</span>
                        </p>
                        <p class="row">
                            <span>Likes received: </span>
                            <span>36</span>
                        </p>
                        <p class="last-row">This user's public profile is hidden.</p>
                    </div>
                </div>
                <div class="nums">
                    <span class="num">{{ $topic->view_count }}</span><span class="num">{{ $topic->reply_count }}</span>
                </div>
            </div>
            @endforeach

            <div class="pagi-box">
                {!! $topics->links('pagination::page') !!}
            </div>

            @else
            <p style="color: #e3342f;"> 暂无数据</p>
            @endif
        </div>
    </div>
    <div class="category_box">
        <div class="category_cover"></div>
        <div class="category_list">
            <p class="cate_title">News &amp; Announcements</p>
            <p class="cate_title">Deals &amp; Giveaways</p>
            <p class="cate_title">
                General &amp; Producr Discussion
                <span>Serie 1</span>
                <span>Serie 1</span>
                <span>Serie 1</span>
                <span>Serie 1</span>
            </p>
            <p class="cate_title">Questions &amp; Answers</p>
            <p class="cate_title">Producr Rexiews</p>
            <p class="cate_title">
                Ideas &amp; Suggestions
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
