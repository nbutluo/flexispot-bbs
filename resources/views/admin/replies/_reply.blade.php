<td>{{ $reply->id }}</td>
<td>
  <div style="max-width:300px">
    {!! $reply->content !!}
  </div>
</td>
<td>
  <img src="{{ $reply->user->avatar }}" style="height:30px;width:30px"> {{ $reply->user->name  }}
</td>

<td>
  <div style="max-width:200px">
    <a href="{{ route('topics.show',$reply->topic_id) }}" target="_blank" rel="noopener noreferrer">{{ $reply->topic->title}}</a>
  </div>
</td>

<td class="actions">
  <a class="icon" href="{{ route('admin.replies.edit',$reply->id) }}">
    <button class="btn btn-space btn-primary btn-sm">
      <i class="mdi mdi-edit"></i>
      编辑
    </button>
  </a>
  <a class="icon" href="#">
    <form action="{{ route('admin.replies.destroy',$reply->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('确定删除吗？')">
      @csrf
      @method('DELETE')
      <button class="btn btn-space btn-danger btn-sm" type="submit">
        <i class="mdi mdi-delete"></i>
        删除
      </button>
    </form>
  </a>
</td>
