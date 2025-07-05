<?php

namespace App\Http\Controllers;
use App\Models\Task;  // Mengimpor Model Task
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(){
        $tasks = Task::all(); // Tampilin semua task yang ada di db

        return view('tasks.index', compact('tasks')); // mengirim data ke tampilan (view), compact untuk mengirim variabel $task ke view
    }

    public function create() {
        return view('tasks.create'); // tampilin form kosong untuk task baru
    }

    public function store(Request $request) {
        $request->validate([ // validasi data yang masuk
            'judul' => 'required|string|max:255', // wajib diisi, memiliki panjang max 255
            'deskripsi' => 'required|string', // wajib diisi, 
            'status' => 'required|in:pending,in_progress,selesai', // harus bernilai pending, in_progress, atau selesai
        ]);

        Task::create($request->all()); // menyimpan data diterima dari form
        
        return redirect()->route('tasks.index')->with('success', 'Tugas berhasil ditambahkan!'); // membawa kembali ke halaman index dan mengirim pesan sukses
    }
    
    public function show($id) {
        $task = Task::findOrFail($id); // mencari task berdasarkan id (kalau gagal mengirim ke 404)
        
        return view('tasks.show', compact('task')); // mengembalikan halaman detail task dan mengirim data task
    }
    
    public function edit($id) {
        $task = Task::findOrFail($id); // mencari task berdasarkan id
        
        return view('tasks.edit', compact('task')); // mengembalikan halaman edit dan data task
    }

    public function update(Request $request, $id) {
        $request->validate([ // validasi data yang masuk
            'judul' => 'required|string|max:255', // wajib diisi, memiliki panjang max 255
            'deskripsi' => 'required|string', // wajib diisi, 
            'status' => 'required|in:pending,in_progress,selesai', // harus bernilai pending, in_progress, atau selesai
        ]);

        $task = Task::findOrFail($id); // mencari task untuk di edit

        $task->update($request -> all()); // memperbarui task dengan data yang baru

        return redirect()->route('tasks.index')->with('success', 'Tugas berhasil diupdate!'); // mengembalikan halaman index
    }

    public function destroy($id) {
        $task = Task::findOrFail($id); // mencari task untuk dihapus

        $task->delete(); // menghapus task

        return redirect()->route('tasks.index')->with('success', 'Tugas berhasil dihapus!'); // mengembalikan haliman index
    }
}
