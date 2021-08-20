@extends('layouts.app')

@section('content')
<form action="{{ route('topics.store') }}" method="POST" accept-charset="UTF-8" name="topics-store">
    @csrf

    <div class="post-box">
        @include('shared._error')
        <input type="text" name="title" value="{{ old('title') }}" class="post-title" placeholder="Please fill in the title">

        <select class="class" placeholder="Please select a classification" name="category_id" required>
            <option value="">Please select the Category</option>
            @foreach ($categories as $value)
            <option value="{{ $value->id }}">
                {{ $value->name }}
            </option>
            @endforeach
        </select>

        <div>
            <textarea name="body" id="editor"></textarea>
        </div>
        <span class="save-btn" onclick="document.forms['topics-store'].submit()">PRESERVE</span>
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
