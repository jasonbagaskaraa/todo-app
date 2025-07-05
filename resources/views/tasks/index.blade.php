<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do list</title>
</head>
<body>
    <h1>Daftar Tugas</h1>
    @if(session('success'))
        <div style="color:green">
            {{ session('success') }}
        </div>
    @endif
    
    <a href="{{ route('tasks.create') }}">Tambah Tugas Baru</a>

    <ul>
        @foreach($tasks as $task)
        <li>
            <strong>{{ $task->judul }}</strong> - {{ $task->status }} <br>

            <a href="{{ route('tasks.show', $task->id) }}">Lihat Detail</a> |

            <a href="{{ route('tasks.edit', $task->id) }}">Edit</a> |
            
            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" styles="display:inline;">
                @csrf
                @METHOD('DELETE')
                <button type="submit">Hapus</button>
            </form>
        </li>
        @endforeach
    </ul>
</body>
</html>