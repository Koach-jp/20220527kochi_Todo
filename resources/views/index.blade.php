@extends ('layouts.default')
@push('css')
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
@endpush

@section ('title', 'Todo TOP')

@section ('content')
<div class="content__box">
  <h1>Todo List</h1>
  @error ('content')
  <p class="error">※{{$message}}</p>
  @enderror
  <form action="/todo/create" method="post" class="form create">
    @csrf
    <input type="text" name="content" class="textbox create">
    <button type="submit" class="btn create">追加</button>
  </form>
  @if (isset($todoList[0]))
  <table class="todolist">
    <tr>
      <th>作成日</th>
      <th>タスク名</th>
      <th>更新</th>
      <th>削除</th>
    </tr>
    @foreach ($todoList as $todo)
      <tr>
        <td>{{$todo->created_at->format('Y/m/d (D) H:i:s')}}</td>
        <form action="/todo/update?id={{$todo->id}}" method="post">
          @csrf
          <td>
            <input type="text" name="content" value="{{$todo->content}}" class="textbox update">
          </td>
          <td>
            <button type="submit" class="btn update">更新</button>
          </td>
        </form>
        <form action="/todo/delete?id={{$todo->id}}" method="post">
          @csrf
          <td>
            <button type="submit" class="btn delete">削除</button>
          </td>
        </form>
      </tr>
    @endforeach
  </table>
  @else
  <p class="no-task">タスクはありません。</p>
  @endif
</div>
@endsection

