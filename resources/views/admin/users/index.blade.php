@extends('admin.layouts.index')
@section('title','用户管理')
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
              <th>头像</th>
              <th>用户名</th>
              <th>邮箱</th>
              <th>注册时间</th>
              <th style="width:20%;text-align: center;">操作</th>
            </tr>
          </thead>
          <tbody>
            @if (count($users)>0)
            @foreach ($users as $key => $user)
            <tr>
              @include('admin.users._user')
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
    <div class="dataTables_info" id="table6_info" role="status" aria-live="polite">用户数：{{$users->total()}}</div>
  </div>
  <div class="col-sm-7">
    <div class="dataTables_paginate paging_simple_numbers" id="table6_paginate">
      <ul class="pagination">
        {{ $users->render() }}
      </ul>
    </div>
  </div>
</div>
@endsection
