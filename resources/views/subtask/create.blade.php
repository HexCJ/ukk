@extends('layouts.app')
@section('content')
    <div class="border border-primary rounded">
        <div class="card mt-1">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6 margin-tb">
                        <div class="pull-left">
                            <h5>Tambah Sub To Do List</h5>
                        </div>
                    </div>
                </div>
                <form action="{{route('substore')}}" method="POST">
                    @csrf    
                    @method('POST')
                    <div class="row mt-2">
                        <input type="hidden" name="parent" class="form-control" id="" value="{{$data->id}}" placeholder="Masukkan Task">
                        <div class="col-sm-12">
                            <label for="" class="form-label">Task</label>
                            <input type="text" name="task" class="form-control" id="" value="{{old('task')}}" placeholder="Masukkan Task">
                            @error('task')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-sm-12">
                            <label for="" class="form-label">Deskripsi</label>
                            <input type="text" name="deskripsi" class="form-control" id="" value="{{old('deskripsi')}}" placeholder="Masukkan Deskripsi Task">
                            @error('deskripsi')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="d-flex justify-content-center gap-2">
                            <a href="{{route('index')}}" class="btn btn-outline-warning">Kembali</a>
                            <button type="submit" class="btn btn-outline-success">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection