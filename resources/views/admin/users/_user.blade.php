<td>{{ $user->id }}</td>
<td>
  <a href="{{ $user->avatar }}" target="_blank" rel="noopener noreferrer">
    <img src="{{ $user->avatar }}" class="user-avatar" style="width: 50px;"></a>
</td>
<td>{{ $user->name }}</td>
<td>{{ $user->email }}</td>
<td>{{ $user->created_at }}</td>
<td class="actions">
  <a class="icon" href="{{ route('admin.users.edit',$user->id) }}">
    <button class="btn btn-space btn-primary btn-sm">
      <i class="mdi mdi-edit"></i>
      编辑
    </button>
  </a>
  <a class="icon" href="#">
    <form action="{{ route('admin.users.destroy',$user->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('确定删除吗？')">
      @csrf
      @method('DELETE')
      <button class="btn btn-space btn-danger btn-sm" type="submit">
        <i class="mdi mdi-delete"></i>
        删除
      </button>
    </form>
  </a>
</td>
