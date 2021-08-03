@extends('admin.layouts.index')
@section('title','话题列表')
@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="card card-table">
      <div class="card-header">
      </div>
      <div class="card-body">
        <table class="table table-hover">
          <thead>
            <tr>
              <th style="width:5%;">ID</th>
              <th>话题</th>
              <th>作者</th>
              <th>分类</th>
              <th>查看数</th>
              <th>评论数</th>
              <th style="text-align: center;">管理</th>
            </tr>
          </thead>
          <tbody>
            @if (count($topics)>0)
            @foreach ($topics as $key => $topic)
            <tr>
              @include('admin.topics._topic')
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
    <div class="dataTables_info" id="table6_info" role="status" aria-live="polite">话题总数：{{$topics->total()}}</div>
  </div>
  <div class="col-sm-7">
    <div class="dataTables_paginate paging_simple_numbers" id="table6_paginate">
      <ul class="pagination">
        {{ $topics->render() }}
      </ul>
    </div>
  </div>
</div>
@endsection
