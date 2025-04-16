<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;
use Illuminate\Validation\ValidationException as VE;

class TodolistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('todolist/index');
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        return view('todolist/detail');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        return view('todolist/edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function complete()
    {
        return view('todolist/complete');
    }

    public function cancel()
    {
        return view('todolist/cancel');
    }
}
