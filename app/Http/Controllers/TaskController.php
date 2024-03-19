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
            'reminder' => 'required',

        ]);

        // validasi deadline tidak boleh kurang dari hari 
        $deadline = Carbon::parse($request->deadline);
        if ($deadline->lte(Carbon::now())) {
            return back()->withErrors('Deadline tidak boleh kurang dari hari ini');
        }
        Task::create([
            'user_id'    => auth()->user()->id,
            'deskripsi'  => $request->deskripsi,
            'deadline'   => $request->deadline,
            'status'     => 'belum deadline',
            'reminder'   => $request->reminder,
        ]);

        return back()->with('success',' Task berhasil dibuat.');
    }


    public function update(Request $request, Task $task, $id)
    {
        $request->validate([
            'deskripsi' => 'required',
            'deadline' => 'required',
            'status' => 'required',
            'reminder' => 'required',
        ]);

        // $task = Task::findOrFail($id);
        $task->update($request->all());

        return redirect()->route('task')->with('success','Task berhasil diupdate');

    }

    public function delete($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->route('task')->with('success', 'Task berhasil dihapus');
    }
    public function dashboard()
    {
        return view('welcome');
    }
    public function status($id)
    {
        // temukan tugas berdasarkan id yang diberikan
        $task = Task::findOrFail($id);
        // jika status belum deadline
        if ($task->status == 'belum deadline') {
            // jika deadline lebih dari hari ini
            if ($task->deadline > Carbon::now()) {
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

    public function form() {
        return view('mytask.form');
    }
}
