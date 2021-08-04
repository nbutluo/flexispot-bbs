@extends('admin.layouts.index')
@section('title',$advertise->title.'编辑')
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card card-border-color card-border-color-primary">
      <div class="card-header card-header-divider">
        编辑广告位
        <span class="card-subtitle">
          <li class="mb-1 mt-1">标题字数不能少于2个</li>
          <li class="mb-1 mt-1">URl 链接必须是以 http 开头</li>
        </span>
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('admin.advertises.update',$advertise->id) }}" enctype="multipart/form-data" accept-charset="UTF-8" onsubmit="return confirm('确认提交吗？')">
          @csrf
          @method('PATCH')
          @include('admin.shared._error')

          <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-right">标题描述</label>
            <div class="col-12 col-sm-8 col-lg-6">
              <input class="form-control" type="text" name="title" value="{{ old('title',$advertise->title)}}">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-right">链接</label>
            <div class="col-12 col-sm-8 col-lg-6">
              <input class="form-control" type="text" name="link" value="{{ old('link',$advertise->link)}}">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-right">广告图</label>
            <div class="col-12 col-sm-8 col-lg-6">
              <div id="advertise-cover" name="cover"></div>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-right">显示/隐藏</label>
            <div class="col-12 col-sm-8 col-lg-6">
              <select class="form-control" name="is_show">
                <option value="0" {{ $advertise->is_show== 0 ? 'selected' :'' }}>隐藏</option>
                <option value="1" {{ $advertise->is_show== 1 ? 'selected' :'' }}>显示</option>
              </select>
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
<script>
  var coverImage = new Cupload({
    ele: '#advertise-cover',
    name: 'cover',
    data: ['{{ $advertise->cover }}'],
  });
</script>
@endsection
