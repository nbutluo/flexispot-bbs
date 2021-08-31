@extends('admin.layouts.index')
@section('title','分类管理')
@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="card card-table">
      <div class="card-header">
        分类列表
        <a href="{{ route('admin.categories.create') }}" target="_blank">
          <div class="icon icon-add" style="float: right;"><span class="mdi mdi-brush"> 分类新增</span></div>
        </a>
      </div>
      <div class="card-body">
        <table class="table table-hover">
          <thead>
            <tr>
              <th style="width:5%;">ID</th>
              <th>名称</th>
              <th>描述</th>
              <th>显示/隐藏</th>
              <th style="text-align: center;">管理</th>
            </tr>
          </thead>
          <tbody>
            @if (count($categories)>0)
            @foreach ($categories as $key => $category)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>
                <a href="{{ route('categories.show',$category['id']) }}" target="_blank" rel="noopener noreferrer">
                  {!! $category['_name'] !!}
                </a>
              </td>

              <td>{{ $category['description'] }}</td>
              <td>
                @if ($category['is_show'])
                <span class="badge badge-pill badge-success">显示</span>
                @else
                <span class="badge badge-pill badge-warning">隐藏</span>
                @endif
              </td>
              <td class="actions">
                <a class="icon" href="{{ route('admin.categories.edit',$category['id']) }}">
                  <button class="btn btn-space btn-primary btn-sm">
                    <i class="mdi mdi-edit"></i>
                    编辑
                  </button>
                </a>
                <a class="icon" href="#">
                  <form action="{{ route('admin.categories.destroy',$category['id']) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('确定删除吗？')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-space btn-danger btn-sm" type="submit">
                      <i class="mdi mdi-delete"></i>
                      删除
                    </button>
                  </form>
                </a>
              </td>

            </tr>
            @endforeach
            @else
            <tr>
              <td><span style="color: red;">{{ _('Oh, no data yet') }}～～</span></td>
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
    <div class="dataTables_info" id="table6_info" role="status" aria-live="polite">分类总数：{{ count($categories)}}</div>
  </div>
  <div class="col-sm-7">
    <div class="dataTables_paginate paging_simple_numbers" id="table6_paginate">
      <ul class="pagination">
        {{-- $categories->render() --}}
      </ul>
    </div>
  </div>
</div>
@endsection
