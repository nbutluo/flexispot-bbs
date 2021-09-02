@extends('layouts.app')

@section('content')
@if($topic->id)
<form action="{{ route('topics.update', $topic->id) }}" method="POST" accept-charset="UTF-8">
  @method('PUT')
  @else
  <form action="{{ route('topics.store') }}" method="POST" accept-charset="UTF-8" name="topics-store">
    @endif
    @csrf
    <div class="post-box">
      @include('shared._error')
      <input type="text" name="title" value="{{ old('title', $topic->title ) }}" class="post-title" placeholder="Please fill in the title">

      <select class="class" placeholder="Please select a classification" name="category_id" required>
        <option value="">Please select the Category</option>
        @foreach ($categories as $value)
        <option value="{{ $value->id }}" {{ $topic->category_id == $value->id ? 'selected' : '' }}>
          {{ $value->name }}
        </option>
        @endforeach
      </select>

      <div>
        <textarea name="body" id="editor">{{ old('body',$topic->body) }}</textarea>
      </div>
      <span class="save-btn" onclick="this.parentElement.parentElement.submit()">PRESERVE</span>
    </div>
  </form>
  @endsection

  @section('styles')
  <link rel="stylesheet" type="text/css" href="{{ asset('css/simditor.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/new.css') }}">
  @stop

  @section('scripts')
  <script type="text/javascript" src="{{ asset('js/module.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/hotkeys.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/uploader.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/simditor.js') }}"></script>

  <script>
    $(document).ready(function() {
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
    });
  </script>
  @stop
