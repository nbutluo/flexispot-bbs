@extends('admin.layouts.index')
@section('title','广告位管理')
@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="card card-table">
      <div class="card-header">
        广告位列表
      </div>
      <div class="card-body">
        <table class="table table-hover">
          <thead>
            <tr>
              <th style="width:5%;">ID</th>
              <th>标题描述</th>
              <th>链接</th>
              <th>图片</th>
              <th>显示/隐藏</th>
              <th style="width:20%;text-align: center;">操作</th>
            </tr>
          </thead>
          <tbody>
            @if (count($advertises)>0)
            @foreach ($advertises as $key => $advertise)
            <tr>
              <td>{{ $advertise->id }}</td>
              <td>{{ $advertise->title }}</td>
              <td>
                <a href="{{ $advertise->link }}" target="_blank">{{ $advertise->link }}</a>
              </td>
              <td>
                <a href="{{ $advertise->cover }}" target="_blank" rel="noopener noreferrer">
                  <img src="{{ $advertise->cover }}" alt="{{ $advertise->title }}" class="advertise-cover" style="width: 50px;">
                </a>
              </td>
              <td>
                @if ($advertise->is_show)
                <span class="badge badge-pill badge-success">显示</span>
                @else
                <span class="badge badge-pill badge-warning">隐藏</span>
                @endif
              </td>
              <td class="actions">
                <a class="icon" href="{{ route('admin.advertises.edit',$advertise->id) }}">
                  <button class="btn btn-space btn-primary btn-sm">
                    <i class="mdi mdi-edit"></i>
                    编辑
                  </button>
                </a>
              </td>

            </tr>
            @endforeach
            @else
            <tr>
              <td><span style="color: red;">暂无数据～～</span></td>
            </tr>
            @endif
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<div class="row be-datatable-footer">
  <div class="col-sm-5">
    <div class="dataTables_info" id="table6_info" role="status" aria-live="polite">广告位总数：{{$advertises->total()}}</div>
  </div>
  <div class="col-sm-7">
    <div class="dataTables_paginate paging_simple_numbers" id="table6_paginate">
      <ul class="pagination">
        {{ $advertises->render() }}
      </ul>
    </div>
  </div>
</div>
@endsection
