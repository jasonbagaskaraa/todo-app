<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail To Do</title>
</head>
<body>
    <h1>Detail To Do</h1>

    <p>{{ $task->judul }}</p>

    <p>{{ $task->deskripsi }}</p>

    <p>Status: {{ $task->status }}</p>

    <a href="{{ route("tasks.index") }}">Kembali ke To Do List</a>
</body>
</html>