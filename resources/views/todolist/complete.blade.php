@extends('layouts.app')
@section('content')
<div class="card mt-3">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-6 margin-tb">
                <div class="pull-left mt-2">
                    <h5>Daftar To Do List Complete</h5>
                </div>
            </div>
            <div class="col-lg-6 margin-tb">
                <div class="pull-right">
                    <form action="{{route('complete')}}" method="GET">
                        @csrf
                        <div class="input-group mt-lg-2">
                            <select name="kategori" id="" class="form-select" style="width: 50px;">
                                <option value="" selected disabled>Kategori</option>
                                <option value="1">Rumah</option>
                                <option value="2">Sekolah</option>
                            </select>
                            <input type="text" class="form-control" name="cari"
                                placeholder="Cari Task" value="{{ old('cari') }}">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-outline-success btn-outline-oke" type="button">
                                    {{-- <i class="fa-solid fa-magnifying-glass"></i> --}}
                                    Cari
                                </button>
                                <a href="{{route('index')}}" class="btn btn-outline-warning">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="table-responsive mt-4">
            <table class="table table-bordered table-striped table-inka" id="pegawai">
                <thead>
                    <tr>
                        <th style="width: 40px;" class="text-center">No</th>
                        <th style="width: 900px;" class="text-center">Task</th>
                        <th style="width: 180px;" class="text-center">Deadline</th>
                        <th style="width: 180px;" class="text-center">Priority Level</th>
                        <th style="width: 120px;" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    @php
                        $level = '';
                        if($item->level == 1){
                            $level = 'Low';
                        } elseif ($item->level == 2){
                            $level = 'Medium';
                        } elseif ($item->level == 3){
                            $level = 'High';
                        }
                    @endphp
                        
                    <tr>
                        <td class="text-center">{{$loop->iteration}}</td>
                        <td>
                            {{$item->task}}
                            <li>
                                {{$item->deskripsi}}
                            </li>
                        </td>
                        <td>{{\Carbon\Carbon::parse($item->deadline)->format('d-m-Y')}}</td>
                        <td class="text-center">{{$level}}</td>
                        <td class="text-center">
                            <button class="btn btn-outline-danger" onclick="hapus({{$item->id}})">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus data ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <form id="delete-form" action="{{route('destroy')}}" method="POST">
                    @csrf
                    @method('POST')
                    <input type="hidden" name="id" id="idhapus">
                    <button type="submit" class="btn btn-outline-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function hapus(id){
        $('#deleteModal').modal('show');
        $('#idhapus').val(id);
    }
</script>
@endsection