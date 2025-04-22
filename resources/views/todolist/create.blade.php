@extends('layouts.app')
@section('content')
    <div class="border border-primary rounded">
        <div class="card mt-1">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6 margin-tb">
                        <div class="pull-left">
                            <h5>Tambah To Do List</h5>
                        </div>
                    </div>
                </div>
                <form action="{{route('store')}}" method="POST">
                    @csrf    
                    @method('POST')
                    <div class="row mt-2">
                        <div class="col-sm-6">
                            <label for="" class="form-label">Task</label>
                            <input type="text" name="task" class="form-control" id="" value="{{old('task')}}" placeholder="Masukkan Task">
                            @error('task')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <label for="" class="form-label">Deskripsi</label>
                            <input type="text" name="deskripsi" class="form-control" id="" value="{{old('deskripsi')}}" placeholder="Masukkan Deskripsi Task">
                            @error('deskripsi')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-sm-6">
                            <label for="kategori" class="form-label">Kategori</label>
                            <select name="kategori" class="form-select" id="">
                                <option value="" selected disabled>Pilih Kategori</option>
                                <option value="1" {{old('kategori') == 1 ? 'selected' : ''}}>Rumah</option>
                                <option value="2" {{old('kategori') == 2 ? 'selected' : ''}}>Sekolah</option>
                            </select>
                            @error('kategori')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <label for="" class="form-label">Level Priority</label>
                            <select name="level" class="form-select" id="">
                                <option value="" selected disabled>Pilih Level Priority</option>
                                <option value="1" {{old('level') == 1 ? 'selected' : ''}}>Low</option>
                                <option value="2" {{old('level') == 2 ? 'selected' : ''}}>Medium</option>
                                <option value="3" {{old('level') == 3 ? 'selected' : ''}}>High</option>
                            </select>
                            @error('level')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-sm-12">
                            <label for="" class="form-label">Deadline</label>
                            <input type="date" name="deadline" value="{{old('deadline')}}" class="form-control">
                            @error('deadline')
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