<?php

namespace App\Http\Controllers;

use App\Models\notifications;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Task;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function create_notification($id) {
        $task = Task::findOrFail($id);
        $deadline = Carbon::parse($task->deadline);
        $date_notification = null;
        if ($task->reminder == '1 hari') {
            $date_notification = $deadline->subDay();
        } else if($task->reminder == '2 hari') {
            $date_notification = $deadline->subDays(2);

        } else if($task->reminder == '3 hari') {
            $date_notification = $deadline->subDays(3);
        }
        return notifications::create([
            'user_id' => auth()->user()->id,
            'task_id' => $id,
            'date_notification' => $date_notification
        ]);
    }
    public function update_notification($id)
    {
        $notification = notifications::findOrFail($id);
        $deadline = Carbon::parse($notification->task->deadline);
        $date_notification = null;
        if ($notification->task->reminder == '1 hari') {
            $date_notification = $deadline->subDay();
        } else if($notification->task->reminder == '2 hari') {
            $date_notification = $deadline->subDays(2);

        } else if($notification->task->reminder == '3 hari') {
            $date_notification = $deadline->subDays(3);
        }
        return $notification->update([
            'date_notification' => $date_notification
        ]);
    }
    public function delete_notification($id)
    {
        $notification = notifications::findOrFail($id);
        $notification->delete();
        return back();
    }
    public function store(Request $request)
    {
        // Validasi input menggunakan aturan validasi Laravel
    $request->validate([
        'deskripsi' => 'required',
        'deadline' => 'required|date|after_or_equal:today', // Tanggal deadline harus setelah atau sama dengan hari ini
        'reminder' => 'required',
    ]);
        $task = Task::create([
            'user_id'    => auth()->user()->id,
            'deskripsi'  => $request->deskripsi,
            'deadline'   => $request->deadline,
            'status'     => 'belum deadline',
            'reminder'   => $request->reminder,
        ]);

        $this->create_notification($task->id);

        return back()->with('success', ' Task berhasil dibuat.');
    }


    public function update(Request $request, Task $task, $id)
    {
        $request->validate([
            'deskripsi' => 'required',
            'deadline' => 'required|date|after_or_equal:today',
            'reminder' => 'required',
        ]);

        $task = Task::findOrFail($id);
        $task->update($request->all());

        $id_notification = notifications::where('task_id', $id)->first();
        $this->update_notification($id_notification->id);

        return back()->with('success', 'Task berhasil diupdate');
    }

    public function delete($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return back()->with('success', 'Task berhasil dihapus');
    }
    public function dashboard()
    {

        $todayData = DB::table('task')
            ->whereDate('deadline', today())
            ->where('status', 'belum deadline')
            ->get();

        $notifications = notifications::where('user_id', auth()->user()->id)->whereDate('date_notification', today())->get();

        return view('mytask.home', compact('todayData', 'notifications'));
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

            return redirect()->route('dashboard')->with('success', 'Tugas berhasil diselesaikan');
        } else {
            return redirect()->route('dashboard')->with('error', 'Tugas sudah diselesaikan sebelumnya');
        }
    }

    public function form()
    {
        return view('mytask.form');
    }
    public function daftar()
    {
        $tugas_belum_deadline = DB::table('task')
            ->where('status', 'belum deadline')
            ->get();
        $tugas_telat = DB::table('task')
            ->where('status', 'telat')
            ->get();
        return view('mytask.other-task', compact('tugas_belum_deadline', 'tugas_telat'));
    }
}
