@extends('layouts.app')
@section('content')
    <div class="border border-primary rounded">
        <div class="card mt-1">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6 margin-tb">
                        <div class="pull-left">
                            <h5>Detail To Do List</h5>
                        </div>
                    </div>
                </div>
                    <div class="row mt-2">
                        <div class="col-1">
                            <label for="" class="form-label">Task</label>
                        </div>
                        <div class="col-6">
                            <label for="" class="form-label">: {{$data->task}}</label>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-1">
                            <label for="" class="form-label">Deskripsi</label>
                        </div>
                        <div class="col-6">
                            <label for="" class="form-label">: {{$data->deskripsi}}</label>
                        </div>
                    </div>
                    @php
                        $kategori = '';
                        if ($data->kategori == 1) {
                            $kategori = 'Rumah';
                        } elseif ($data->kategori == 2){
                            $kategori = 'Sekolah';
                        }

                        $level = '';
                        if($data->level == 1){
                            $level = 'Low';
                        } elseif ($data->level == 2){
                            $level = 'Medium';
                        } elseif ($data->level == 3){
                            $level = 'High';
                        }
                    @endphp
                    <div class="row mt-2">
                        <div class="col-1">
                            <label for="" class="form-label">Kategori</label>
                        </div>
                        <div class="col-6">
                            <label for="" class="form-label">: {{$kategori}}</label>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-1">
                            <label for="" class="form-label">Level</label>
                        </div>
                        <div class="col-6">
                            <label for="" class="form-label">: {{$level}}</label>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-1">
                            <label for="" class="form-label">Deadline</label>
                        </div>
                        <div class="col-6">
                            <label for="" class="form-label">: {{\Carbon\Carbon::parse($data->deadline)->format('d-m-Y')}}</label>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="d-flex justify-content-center gap-2">
                            <a href="{{route('index')}}" class="btn btn-outline-warning">Kembali</a>
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection