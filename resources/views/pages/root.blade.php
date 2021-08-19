@extends('layouts.app')

@section('styles')
<link href="{{ mix('css/index.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="banner-box">
    <img src="{{ asset('assets/banner.png') }}" alt="" class="banner">
</div>

<div class="forum-content">
    <div class="left-panel">
        <div class="card">
            <p class="title">Sort by Category</p>
            <div class="content">
                @foreach ($categories as $category)

                @if($category['_data'])
                <p class="category-tab" onclick="setHeight(this,'100px')">
                    <img src="{{ asset('/assets/discuss.png') }}" alt="{{ $category['name'] }}" class="icon {{ $category['id'] ==3 ? 'show' : 'hidden'}}">
                    <img src="{{ asset('/assets/bulb.png') }}" alt="{{ $category['name'] }}" class="icon {{ $category['id'] ==6 ? 'show' : 'hidden'}}">
                    <span class="text">
                        {{ $category['name'] }}
                    </span>
                    <span class="arrow-btn"></span>
                </p>
                <div class="more-menus">
                    @foreach ($category['_data'] as $childCategory)
                    <span><a href="{{ route('categories.show',$category['id']) }}">{{ $childCategory['name']}}</a></span>
                    @endforeach
                </div>

                @else
                <p class="category-tab" onclick="setActive(this)">
                    <img src="{{ asset('/assets/horn.png') }}" alt="{{ $category['name'] }}" class="icon {{ $category['id'] ==1 ? 'show' : 'hidden'}}">
                    <img src="{{ asset('/assets/flag.png') }}" alt="{{ $category['name'] }}" class="icon {{ $category['id'] ==2 ? 'show' : 'hidden'}}">
                    <img src="{{ asset('/assets/note.png') }}" alt="{{ $category['name'] }}" class="icon {{ $category['id'] ==4 ? 'show' : 'hidden'}}">
                    <img src="{{ asset('/assets/message2.png') }}" alt="{{ $category['name'] }}" class="icon {{ $category['id'] ==5 ? 'show' : 'hidden'}}">
                    <span class="text">
                        <a href="{{ route('categories.show',$category['id']) }}">{{ $category['name'] }}</a>
                    </span>
                </p>
                @endif

                @endforeach

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
            <a href="{{ Request::url() }}"><span class="tab {{ active_tab_class (if_query('tab',null))}}">Latest</span></a>
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
                @if (if_query('tab', 'top'))
                {!! $topics->appends(Request::except('page'))->links('pagination::page') !!}
                @else
                {!! $topics->links('pagination::page') !!}
                @endif
            </div>

            @else
            <p style="color: #e3342f;"> 暂无数据</p>
            @endif
        </div>
    </div>

    <div class="control-btns">
        <img src="/assets/arrow.png" alt="" onClick="goTop()" />
        <a href="/new.html">
            <img src="/assets/plus.png" alt="" />
        </a>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/root.js')}}"></script>
@endsection
