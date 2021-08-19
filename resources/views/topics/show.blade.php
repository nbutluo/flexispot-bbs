@extends('layouts.app')

@section('title', $topic->title)
@section('description', $topic->excerpt)
@section('styles')
<link rel="stylesheet" href="{{ mix('css/detail.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/simditor.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/new.css') }}">
@endsection

@section('content')
@include('shared._error')
<div class="head-box">
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
        <span class="tag">{{ $topic->category->name }}</span><span class="tag">Topic</span>
    </p>
</div>

<div class="comments-list">
    <div class="comment-box topic-box">
        @include('topics._topic_box')
    </div>

    <div class="reply-list">
        @include('topics._reply_list', ['replies' => $topic->replies()->with('user')->paginate()])
    </div>
</div>

<div class="topic-list">
    @include('topics._suggest_topics_list',['suggests'=>$topic->suggests()])
</div>

<div class="reply-modal">
    <div class="title-box" onclick="resetModal()">
        <div>
            <img src="/assets/share_btn.png" alt="">
            <span class="reply-topic-title" style="color: #1774dc;">AAAAAAAAAAAAA</span>
        </div>
        <div>
            <img src="/assets/-.png" alt="" style="margin-bottom:7px;" onclick="foldModal(event)">
            <img src="/assets/x.png" alt="" onclick="hideModal()">
        </div>
    </div>
    <form action="{{ route('replies.store') }}" method="POST" accept-charset="UTF-8" name="replies-store" onsubmit="return confirm('确认提交吗？')">
        @csrf
        <input type="hidden" name="topic_id" value="{{ $topic->id }}">
        <div class="content"><textarea name="content" id="editor"></textarea></div>
        <div class="btn-box"><span class="btn" onclick="document.forms['replies-store'].submit()">Post Reply</span></div>
    </form>
</div>
@endsection

@section('scripts')
<script>
    $(function() {
        $('.reply-topic').click(function() {
            $('.reply-topic-title').text("{{ $topic->title }}")
        });
    })
</script>

<script>
    $(document).ready(function() {
        var editor = new Simditor({
            textarea: $('#editor'),
            upload: {
                url: "{{ route('topics.upload_image') }}",
                params: {
                    _token: '{{ csrf_token() }}'
                },
                fileKey: 'upload_file',
                connectionCount: 3,
                leaveConfirm: '文件上传中，关闭此页面将取消上传。'
            },
            pasteImage: true,
        });
    });
</script>
<script src="{{ asset('js/detail.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/module.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/hotkeys.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/uploader.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/simditor.js') }}"></script>

@endsection
