@extends('layouts.app')

@section('title', $topic->title)
@section('description', $topic->excerpt)
@section('styles')
<link rel="stylesheet" href="{{ mix('css/detail.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/simditor.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/new.css') }}">
<script src="https://cloud.yofoto.cn/Themes/jquery-1.11.1.min.js"></script>
@endsection

@section('content')
@include('shared._error')
<div class="head-box">
    @include('topics._head_box')
</div>

<div class="comments-list">
    <div class="comment-box topic-box">
        @include('topics._topic_box')
    </div>

    <!-- TODO::分页数据分配 -->
    <div class="reply-list">
        @include('topics._reply_list', ['replies' => $topic->replies()->with('user')->paginate(5)])
    </div>
</div>

<div class="suggest-topics">
    @includeWhen(count($topic->suggests()),'topics._suggest_topics_list',['suggests'=>$topic->suggests()])
</div>

<div class="reply-modal">
    @include('topics._reply_modal')
    @yield('reply_script')
</div>
@endsection
