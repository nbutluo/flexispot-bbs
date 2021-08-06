@extends('admin.layouts.index')
@section('title','编辑分类')
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card card-border-color card-border-color-primary">
      <div class="card-header card-header-divider">
        编辑回复
        <span class="card-subtitle">
          <li class="mb-1 mt-1">分类字数不少于2个</li>
        </span>
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('admin.categories.update',$category->id) }}" enctype="multipart/form-data" accept-charset="UTF-8" onsubmit="return confirm('确认提交吗？')">
          @csrf
          @method('PATCH')
          @include('admin.shared._error')

          <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-right">父级分类</label>
            <div class="col-12 col-sm-8 col-lg-6">
              <select class="form-control" name="pid">
                <option value="0">顶级分类</option>
                @foreach ($categories as $class)
                <option value="{{ $class['id'] }}" {{ $class['_selected'] ?'selected':'' }} {{  $class['_disabled'] ?'disabled':'' }}>{!! $class['_name'] !!}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-right">分类名称</label>
            <div class="col-12 col-sm-8 col-lg-6">
              <input class="form-control" type="text" name="name" value="{{ old('name',$category->name)}}">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-right">描述</label>
            <div class="col-12 col-sm-8 col-lg-6">
              <input class="form-control" type="text" name="description" value="{{ old('description',$category->description)}}">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-right">显示/隐藏</label>
            <div class="col-12 col-sm-8 col-lg-6">
              <select class="form-control" name="is_show">
                <option value="">--请选择--</option>
                <option value="0" {{ $category->is_show== 0 ? 'selected' :'' }}>隐藏</option>
                <option value="1" {{ $category->is_show== 1 ? 'selected' :'' }}>显示</option>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-sm-6 pl-0">
              <p class="text-right">
                <button class="btn btn-space btn-primary" type="submit">提交</button>
                <a href="{{ route('admin.categories.index') }}" class="btn btn-space btn-secondary">返回</a>
              </p>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
