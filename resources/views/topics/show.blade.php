@extends('layouts.app')

@section('metas')
<meta property="og:type" content="article" />
<meta name="twitter:creator" content="{{ '@'.$topic->user->name }}" />
<meta property="og:title" content="{{ $topic->title }}" />
<meta property="og:description" content="{{ $topic->excerpt }}" />
<meta property="og:url" content="{{ route('topics.show',$topic->id) }}" />
<meta property="og:image" content="{{ $topic->topic_cover }}" />
<meta name="image" property="og:image" content="{{ $topic->topic_cover }}" />
@endsection

@section('title', $topic->title)
@section('description', $topic->excerpt)

@section('styles')
<link rel="stylesheet" href="{{ asset('css/detail.css') }}">
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
    @include('topics._reply_list', ['replies' => $topic->replies()->whereNull('parent_id')->with('user')->paginate(5)])
    @yield('reply-list-scripts')
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

<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-612c9b63a0743429"></script>
<script src="https://cloud.yofoto.cn/Themes/jquery-1.11.1.min.js"></script>

<script type="text/javascript" src="{{ asset('js/module.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/hotkeys.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/uploader.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/simditor.js') }}"></script>

<script>
  $(function(){

    $('.reply-topic').click(function() {
      $('.reply-topic-title').text("{{ $topic->title }}")
    });

    Simditor.locale = 'en-US';
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
  })
</script>
