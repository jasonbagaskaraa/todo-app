<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit To Do</title>
</head>
<body>
    <h1>Edit To Do</h1>

    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="judul">Judul To DO:</label>
        <input type="text" name="judul" value="{{ old('judul', $task->judul) }}" required><br>

        <label for="deskripsi">Deskripsi:</label>
        <textarea name="deskripsi" id="deskripsi" required>{{ old('deskripsi', $task->deskripsi) }}</textarea><br>

        <label for="status">Status:</label>
        <select name="status" id="status">
            <option value="pending" {{ old('status', $task->status) == 'pending' ? 'selected' : ''}}>Pending</option>
            <option value="in_progress" {{ old('status', $task->status) == 'in_progress' ? 'selected' : ''}}>In Progress</option>
            <option value="selesai" {{ old('status', $task->status) == 'selesai' ? 'selected' : ''}}>Selesai</option>
        </select>

        <button type="submit">Update To Do</button>
    </form>
</body>
</html>