<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Tambah To Do List</title>
</head>
<body>
    <h1>Tambah Tugas</h1>
    
    @if ($errors->any())
        <div style="color: red">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf

        <label for="judul">Judul tugas:</label>
        <input type="text" name="judul" id="judul" value="{{ old('judul') }}" required><br>

        <label for="deskripsi">Deskripsi:</label>
        <textarea name="deskripsi" id="deskripsi" required>{{ old('deskripsi') }}</textarea><br>

        <label for="status">Status:</label>
        <select name="status" id="status">
            <option value="pending" {{ old('status') == 'pending' ? 'selected' : ''}}>Pending</option>
            <option value="in_progress" {{ old('status') == 'in_progress' ? 'selected' : ''}}>In Progress</option>
            <option value="selesai" {{ old('status') == 'selesai' ? 'selected' : ''}}>Selesai</option>
        </select>
        
        <button type="submit">Simpan Tugas</button>
    </form>

    <a href="{{ route('tasks.index') }}">Kembali ke To Do List</a>
</body>
</html>