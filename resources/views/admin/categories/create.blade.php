@extends('admin.layouts.index')
@section('title','新增分类')
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card card-border-color card-border-color-primary">
      <div class="card-header card-header-divider">
        新增分类
        <span class="card-subtitle">
          <li class="mb-1 mt-1">分类字数不少于2个</li>
          <li class="mb-1 mt-1">新增分类时请注意层级</li>
        </span>
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('admin.categories.store') }}" enctype="multipart/form-data" accept-charset="UTF-8" onsubmit="return confirm('确认提交吗？')">
          @csrf
          @include('admin.shared._error')

          <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-right">所属分类</label>
            <div class="col-12 col-sm-8 col-lg-6">
              <select class="form-control" name="pid">
                <option value="0">顶级分类</option>
                @foreach ($categories as $category)
                <option value="{{ $category['id'] }}">{!! $category['_name'] !!}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-right">分类名称</label>
            <div class="col-12 col-sm-8 col-lg-6">
              <input class="form-control" type="text" name="name" placeholder="必填" value="{{ old('name')}}">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-right">上传图标</label>
            <div class="col-12 col-sm-8 col-lg-6">
              <input class="form-control" type="file" name="fileicon" placeholder="必填" value="{{ old('name')}}">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-right">描述</label>
            <div class="col-12 col-sm-8 col-lg-6">
              <input class="form-control" type="text" name="description" placeholder="非必填项" value="{{ old('description')}}">
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
