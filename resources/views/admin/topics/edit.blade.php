@extends('admin.layouts.index')
@section('title',$topic->title.'话题编辑')
@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('css/simditor.css') }}">
<script src="https://cloud.yofoto.cn/Themes/jquery-1.11.1.min.js"></script>
@endsection
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card card-border-color card-border-color-primary">
      <div class="card-header card-header-divider">
        编辑话题
        <span class="card-subtitle">
          <li class="mb-1 mt-1">话题字数不少于3个</li>
        </span>
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('admin.topics.update',$topic->id) }}" enctype="multipart/form-data"
              accept-charset="UTF-8" onsubmit="return confirm('确认提交吗？')">
          @csrf
          @method('PATCH')
          @include('admin.shared._error')

          <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-right">作者</label>
            <div class="col-12 col-sm-8 col-lg-6">
              <input class="form-control" name="name" type="text" disabled value="{{ old('name',$topic->user->name)}}">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-right">话题标题</label>
            <div class="col-12 col-sm-8 col-lg-6">
              <input class="form-control" name="title" type="text" value="{{ old('title',$topic->title) }}">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-right">分类</label>
            <div class="col-12 col-sm-8 col-lg-6">
              <select class="form-control" name="category_id">
                @foreach ($categories as $category)
                <option value="{{ $category->id }}" @if ($category->id==$topic->category_id) selected @endif>
                  {{ $category->name }}
                </option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-right">置顶</label>
            <div class="col-12 col-sm-8 col-lg-6">
              <select class="form-control" name="top">
                <option value="1"@if($topic->top==1) selected @endif>
                  是
                </option>
                <option value="0"@if($topic->top==0) selected @endif>
                  否
                </option>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-right">话题内容</label>
            <div class="col-12 col-sm-8 col-lg-6">
              <div><textarea name="body" id="editor">{!! old('body',$topic->body) !!}</textarea></div>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-right">查看数</label>
            <div class="col-12 col-sm-8 col-lg-6">
              <input class="form-control" name="view_count" type="text" placeholder="请输入"
                     value="{{ old('view_count',$topic->view_count)}}">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-right">评论数</label>
            <div class="col-12 col-sm-8 col-lg-6">
              <input class="form-control" name="reply_count" type="text" disabled value="{{ $topic->reply_count }}">
            </div>
          </div>


          <div class="form-group row">
            <div class="col-sm-6 pl-0">
              <p class="text-right">
                <button class="btn btn-space btn-primary" type="submit">提交</button>
                <a href="{{ url()->previous() }}" class="btn btn-space btn-secondary">
                  返回
                </a>
              </p>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
<script type="text/javascript" src="{{ asset('js/module.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/hotkeys.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/uploader.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/simditor.js') }}"></script>
<script>
  $(function(){
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
@endsection
