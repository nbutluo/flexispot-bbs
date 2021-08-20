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
</div>
@endsection

@section('scripts')
<script>
    $(function() {
        $('.reply-topic').click(function() {
            $('.reply-topic-title').text("{{ $topic->title }}")
        });
        var num = Number($('.like-count').text());
        console.log(num);
        $('.like-btn').click(function() {
            $.ajax({
                type: "get",
                url: "{{ route('topic.togglelike',$topic->id) }}",
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    response == 1 ? $('.like-count').text(--num) : $('.like-count').text(++num);
                }
            });
        })
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
