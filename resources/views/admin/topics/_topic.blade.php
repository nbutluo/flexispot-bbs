<td>{{ $topic->id }}</td>
<td>
  @if ($topic->top==1)<img src="{{ env('APP_URL').'assets/top.png' }}"> @endif
  <a href="{{ route('topics.show',$topic->id) }}" target="_blank" rel="noopener noreferrer">
    {{ $topic->title }}
  </a>
</td>
<td>
  <img src="{{ $topic->user->avatar }}" style="height:30px;width:30px"> {{ $topic->user->name  }}
</td>
<td> {{ $topic->category->name }} </td>
<td> {{ $topic->view_count }} </td>
<td> {{ $topic->reply_count }} </td>
<td class="actions">
  <a class="icon" href="{{ route('admin.topics.edit',$topic->id) }}">
    <button class="btn btn-space btn-primary btn-sm">
      <i class="mdi mdi-edit"></i>
      编辑
    </button>
  </a>
  <a class="icon" href="#">
    <form action="{{ route('admin.topics.destroy',$topic->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('确定删除吗？')">
      @csrf
      @method('DELETE')
      <button class="btn btn-space btn-danger btn-sm" type="submit">
        <i class="mdi mdi-delete"></i>
        删除
      </button>
    </form>
  </a>
</td>
