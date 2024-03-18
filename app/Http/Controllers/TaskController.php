<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Task;


class TaskController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([

            'deskripsi' => 'required',
            'deadline' => 'required',
            'status' => 'required',
            'reminder' => 'required',

        ]);

        Product::create([
            'user_id'         => auth()->user(),
            'deskripsi'         => $request->deskripsi,
            'status'   => $request->status,
            'reminder'         => $request->reminder,
        ]);

        return back('');
    }
    public function dashboard()
    {
        return view('welcome');
    }
    public function complete($id)
    {
        // temukan tugas berdasarkan id yang diberikan
        $task = Task::findOrFail($id);
        // jika status belum deadline
        if ($task->status == 'belum deadline') {
            // jika deadline lebih dari hari ini
            if ($task->deadline >= Carbon::now()) {
                //maka status akan diganti ke 'telat'
                $task->status = 'telat';
                //dan jika tidak
            } else {
                //ketika di tombol maka status akan menjadi 'sudah dikerjakan'
                $task->status = 'sudah dikerjakan';
            }
            //untuk menyimpan perubahan di atas
            $task->save();

            return redirect()->route('task')->with('success', 'Tugas berhasil diselesaikan');
        } else {
            return redirect()->route('task')->with('error', 'Tugas sudah diselesaikan sebelumnya');
        }
    }
}
