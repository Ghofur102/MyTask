<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
