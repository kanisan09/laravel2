<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todoリスト</title>
</head>
<body>
    <h1>Todoリスト</h1>

    <a href="{{ route('tasks.create')}}">新しいタスクを追加</a>

    <ul>
        @forelse ($tasks as $task)
        <li>
            <form action="{{ route('tasks.update',$task)}}" method="POST" style="display: inline;">
                @csrf
                @method('PUT')
                <input type="checkbox" name="is_completed" onchange="this.from.submit()" {{ $task->is_completed ? 'checked' : ''}}>
            </form>
            {{ $task->title }}
            <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit">削除</button>
            </form>
        </li>
        @empty
        <li>まだタスクはありません。</li>
        @endforelse
    </ul>
    
</body>
</html>