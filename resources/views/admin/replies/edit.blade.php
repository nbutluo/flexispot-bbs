@extends('admin.layouts.index')
@section('title','编辑回复')
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card card-border-color card-border-color-primary">
      <div class="card-header card-header-divider">
        编辑回复
        <span class="card-subtitle">
          <li class="mb-1 mt-1">话题字数不少于3个</li>
        </span>
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('admin.replies.update',$reply->id) }}" enctype="multipart/form-data" accept-charset="UTF-8" onsubmit="return confirm('确认提交吗？')">
          @csrf
          @method('PATCH')
          @include('admin.shared._error')

          <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-right">话题</label>
            <div class="col-12 col-sm-8 col-lg-6">
              <input class="form-control" disabled value="{{ old('name',$reply->topic->title)}}">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-right">回复内容</label>
            <div class="col-12 col-sm-8 col-lg-6">
              <textarea class="form-control" name="content">{{ old('content',$reply->content) }}</textarea>
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
