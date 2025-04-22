<?php

namespace App\Http\Controllers;

use App\Models\Subtaskmodel;
use App\Models\TodolistModel;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;
use Illuminate\Validation\ValidationException as VE;

class TodolistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = TodolistModel::with('subtask')->whereIn('status', [0,1])
        ->when($request->cari, function($query, $cari){
                return $query->where('task', 'like', '%' . $cari . '%')
                             ->orWhere('deskripsi', 'like', '%' . $cari . '%')->whereIn('status', [0,1]);
        })
        ->when($request->kategori, function($query, $kategori){
            return $query->where('kategori', 'like', '%' . $kategori . '%')->whereIn('status', [0,1]);
        })
        ->get();

        $done = TodolistModel::where('status', 2)->count();
        $progress = TodolistModel::where('status', 1)->count();
        $new = TodolistModel::where('status', 0)->count();
        $cancel = TodolistModel::where('status', 3)->count();
        $now = Carbon::now();
        $over = TodolistModel::where('deadline', '<=', $now)->whereIn('status', [0,1])->count();
        $all = $done + $progress + $new;
        $bar = ($done / $all) * 100;
        return view('todolist/index', compact('data', 'done', 'progress', 'new', 'cancel', 'bar', 'over'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('todolist/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try
        {
            $request->validate([
                'task' => 'required',
                'deskripsi' => 'required',
                'kategori' => 'required',
                'level' => 'required',
                'deadline' => 'required',
            ]);
        }
        catch(VE $e){
            Alert::error('Gagal', 'Periksa kembali pesan kesalahan');
            return redirect()->back()->withInput()->withErrors($e->validator);
        }

        $data = [
            'task' => $request->task,
            'deskripsi' => $request->deskripsi,
            'kategori' => $request->kategori,
            'level' => $request->level,
            'deadline' => $request->deadline,
            'status' => 0,
        ];
        TodolistModel::create($data);

        Alert::success('Berhasil', 'Data berhasil disimpan');
        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = TodolistModel::where('id', $id)->first();
        return view('todolist/detail', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = TodolistModel::where('id', $id)->first();
        return view('todolist/edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try
        {
            $request->validate([
                'task' => 'required',
                'deskripsi' => 'required',
                'kategori' => 'required',
                'level' => 'required',
                'deadline' => 'required',
            ]);
        }
        catch(VE $e){
            Alert::error('Gagal', 'Periksa kembali pesan kesalahan');
            return redirect()->back()->withInput()->withErrors($e->validator);
        }

        $data = [
            'task' => $request->task,
            'deskripsi' => $request->deskripsi,
            'kategori' => $request->kategori,
            'level' => $request->level,
            'deadline' => $request->deadline,
            'status' => 0,
        ];
        TodolistModel::where('id', $id)->update($data);

        Alert::success('Berhasil', 'Data berhasil disimpan');
        return redirect()->route('index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        TodolistModel::where('id', $request->id)->delete();
        Alert::success('Berhasil', 'Data berhasil dihapus');
        return redirect()->back();
    }

    public function complete(Request $request)
    {
        $data = TodolistModel::where('status', 2)
        ->when($request->cari, function($query, $cari){
                return $query->where('task', 'like', '%' . $cari . '%')
                             ->orWhere('deskripsi', 'like', '%' . $cari . '%')->whereIn('status', [0,1]);
        })
        ->when($request->kategori, function($query, $kategori){
            return $query->where('task', 'like', '%' . $kategori . '%')->whereIn('status', [0,1]);
        })
        ->paginate(10);
        return view('todolist/complete', compact('data'));
    }

    public function cancel(Request $request)
    {
        $data = TodolistModel::where('status', 3)
        ->when($request->cari, function($query, $cari){
                return $query->where('task', 'like', '%' . $cari . '%')
                             ->orWhere('deskripsi', 'like', '%' . $cari . '%')->whereIn('status', [0,1]);
        })
        ->when($request->kategori, function($query, $kategori){
            return $query->where('task', 'like', '%' . $kategori . '%')->whereIn('status', [0,1]);
        })
        ->paginate(10);
        return view('todolist/cancel', compact('data'));
    }

    public function status(Request $request, string $id)
    {
        $data =[
            'status' => $request->status,
        ];
        TodolistModel::where('id', $id)->update($data);
        Alert::success('Berhasil', 'Data berhasil disimpan');
        return redirect()->back();
    }

    // Sub Task
    public function subtask(string $id)
    {
        $data = TodolistModel::where('id', $id)->first();
        return view('subtask/create', compact('data'));
    }

    public function substore(Request $request)
    {
        try
        {
            $request->validate([
                'task' => 'required',
                'deskripsi' => 'required',
            ]);
        }
        catch(VE $e){
            Alert::error('Gagal', 'Periksa kembali pesan kesalahan');
            return redirect()->back()->withInput()->withErrors($e->validator);
        }

        $data = [
            'idp' => $request->parent,
            'task' => $request->task,
            'deskripsi' => $request->deskripsi,
        ];
        Subtaskmodel::create($data); 

        Alert::success('Berhasil', 'Data berhasil disimpan');
        return redirect()->route('index');
    }
}
