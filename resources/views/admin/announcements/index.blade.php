@extends('admin.layouts.index')
@section('title','首页公告')
@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="card card-table">
      <div class="card-header">
        首页公告
      </div>
      <div class="card-body">
        <table class="table table-hover">
          <thead>
            <tr>
              <th style="width:5%;">ID</th>
              <th>公告内容</th>
              <th>链接</th>
              <th>显示/隐藏</th>
              <th style="width:20%;text-align: center;">操作</th>
            </tr>
          </thead>
          <tbody>
            @if (count($announcements)>0)
            @foreach ($announcements as $key => $announcement)
            <tr>
              <td>{{ $announcement->id }}</td>
              <td>
                <div style="max-width: 300px;">
                  <a href="{{ route('root') }}" target="_blank"> {{ $announcement->content }}</a>
                </div>
              </td>
              <td>
                <a href="{{ $announcement->link }}" target="_blank">{{ $announcement->link }}</a>
              </td>
              <td>
                @if ($announcement->is_show)
                <span class="badge badge-pill badge-success">显示</span>
                @else
                <span class="badge badge-pill badge-warning">隐藏</span>
                @endif
              </td>
              <td class="actions">
                <a class="icon" href="{{ route('admin.announcements.edit',$announcement->id) }}">
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
              <td><span style="color: red;display: inline-block;">{{ _('Oh, no data yet') }}～～</span></td>
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
    <div class="dataTables_info" id="table6_info" role="status" aria-live="polite">公告总数：{{$announcements->total()}}</div>
  </div>
  <div class="col-sm-7">
    <div class="dataTables_paginate paging_simple_numbers" id="table6_paginate">
      <ul class="pagination">
        {{ $announcements->render() }}
      </ul>
    </div>
  </div>
</div>
@endsection
