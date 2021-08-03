@extends('admin.layouts.index')
@section('title',$user->name.'用户编辑')
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card card-border-color card-border-color-primary">
      <div class="card-header card-header-divider">
        说明
        <span class="card-subtitle">
          <li class="mb-1 mt-1">用户名字数不少于3个</li>
        </span>
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('admin.users.update',$user->id) }}" enctype="multipart/form-data" accept-charset="UTF-8" onsubmit="return confirm('确认提交吗？')">
          @csrf
          @method('PATCH')
          @include('admin.shared._error')

          <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-right">用户名</label>
            <div class="col-12 col-sm-8 col-lg-6">
              <input class="form-control" name="name" type="text" placeholder="请输入用户名" value="{{ old('name',$user->name)}}">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-right">邮箱</label>
            <div class="col-12 col-sm-8 col-lg-6">
              <input class="form-control" name="email" type="text" placeholder="请输入邮箱" value="{{ old('email',$user->email)}}">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-right">个人简介</label>
            <div class="col-12 col-sm-8 col-lg-6">
              <textarea class="form-control" name="introduction">{{ old('introduction',$user->introduction)}}</textarea>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-right">注册时间</label>
            <div class="col-12 col-sm-8 col-lg-6">
              <input class="form-control" name="created_at" type="text" disabled value="{{ old('created_at',$user->created_at)}}">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-right">头像</label>
            <div class="col-12 col-sm-8 col-lg-6">
              <img src="{{ $user->avatar }}" class="avatar-img" alt="{{ $user->name }}" style="width:146px;">
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
