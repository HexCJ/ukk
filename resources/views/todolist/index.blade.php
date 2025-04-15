@extends('layouts.app')
@section('content')
<div class="container-fluid mt-4">
    <div class="row g-3">
        <div class="col-md-3">
            <div class="p-3 rounded card-outline-primary" onclick="window.location.href='{{route('complete')}}'" style="cursor: pointer;">
                <div class="d-flex align-items-center" style="height: 100px;">
                    <i class="bi bi-check-circle fs-2 me-3"></i>
                    <div>
                        <div class="fs-5 fw-bold">10</div>
                        <div class="small">Complete Task</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="p-3 rounded card-outline-primary">
                <div class="d-flex align-items-center" style="height: 100px;">
                    <i class="bi bi-star fs-2 me-3"></i>
                    <div>
                        <div class="fs-5 fw-bold">10</div>
                        <div class="small">Priority Task</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="p-3 rounded card-outline-primary">
                <div class="d-flex align-items-center" style="height: 100px;">
                    <i class="bi bi-list-task fs-2 me-3"></i>
                    <div>
                        <div class="fs-5 fw-bold">5</div>
                        <div class="small">Ongoing Task</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="p-3 rounded card-outline-primary">
                <div class="d-flex align-items-center" style="height: 100px;">
                    <i class="bi bi-exclamation-circle fs-2 me-3"></i>
                    <div>
                        <div class="fs-5 fw-bold">3</div>
                        <div class="small">Overdue Task</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card mt-3">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-6 margin-tb">
                <div class="pull-left mt-2">
                    <h5>Daftar To Do List</h5>
                </div>
            </div>
            <div class="col-lg-6 margin-tb">
                <div class="pull-right">
                    <form action="" method="GET">
                        @csrf
                        <div class="input-group mt-lg-2">
                            <select name="" id="" class="form-select" style="width: 50px;">
                                <option value="" selected disabled>Kategori</option>
                                <option value="">Rumah</option>
                                <option value="">Sekolah</option>
                            </select>
                            <input type="text" class="form-control" name="cari"
                                placeholder="Cari Task" value="{{ old('cari') }}">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-outline-success btn-outline-oke" type="button">
                                    {{-- <i class="fa-solid fa-magnifying-glass"></i> --}}
                                    Cari
                                </button>
                                <a href="{{route('create')}}" class="btn btn-outline-success btn-outline-oke">Tambah</a>
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
                        <th class="text-center">Deadline</th>
                        <th style="width: 180px;" class="text-center">Priority Level</th>
                        <th style="width: 180px;" class="text-center">Progress</th>
                        <th style="width: 280px;" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center">1</td>
                        <td>
                            Mengerjakan Soal Ukk
                            <li>
                                Mengerjakan Soal UKK Pengetahuan dan Praktik Web To Do List agar mendapat nilai Terbaik
                            </li>
                        </td>
                        <td>22/04/2025</td>
                        <td class="text-center">High</td>
                        <td>
                            <form action="" method="POST">
                                @csrf
                                <select name="" id="" class="form-select">
                                    <option value="">Complete</option>
                                    <option value="">Progress</option>
                                    <option value="">Cancle</option>
                                </select>
                            </form>
                        </td>
                        <td>
                            <a href="{{route('edit')}}" class="btn btn-outline-warning">Edit</a>
                            <a href="{{route('edit')}}" class="btn btn-outline-primary">Detail</a>
                            <button class="btn btn-outline-danger" onclick="hapus()">
                                Hapus
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">2</td>
                        <td>Belajar React JS
                            <li>
                                Agar bisa mengerjakan projek berbasis React JS
                            </li>
                        </td>
                        <td>30/04/2025</td>
                        <td class="text-center">Medium</td>
                        <td>
                            <form action="" method="POST">
                                @csrf
                                <select name="" id="" class="form-select">
                                    <option value="1">Complete</option>
                                    <option value="2">Progress</option>
                                    <option value="3">Cancle</option>
                                </select>
                            </form>
                        </td>
                        <td>
                            <a href="{{route('edit')}}" class="btn btn-outline-warning">Edit</a>
                            <a href="{{route('edit')}}" class="btn btn-outline-primary">Detail</a>
                            <button class="btn btn-outline-danger" onclick="hapus()">
                                Hapus
                            </button>                        
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">3</td>
                        <td>Belajar Java
                            <li>
                                Agar bisa mengerjakan projek berbasis Java
                            </li>
                        </td>
                        <td>05/05/2025</td>
                        <td class="text-center">Low</td>
                        <td>
                            <form action="" method="POST">
                                @csrf
                                <select name="" id="" class="form-select">
                                    <option value="">Complete</option>
                                    <option value="">Progress</option>
                                    <option value="">Cancle</option>
                                </select>
                            </form>
                        </td>
                        <td>
                            <a href="{{route('edit')}}" class="btn btn-outline-warning">Edit</a>
                            <a href="{{route('edit')}}" class="btn btn-outline-primary">Detail</a>
                            <button class="btn btn-outline-danger" onclick="hapus()">
                                Hapus
                            </button>                        
                        </td>
                    </tr>
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
                <form id="delete-form" action="" method="POST">
                    @csrf
                    <input type="hidden" name="id" id="idhapus">
                    <button type="submit" class="btn btn-outline-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function hapus(){
        $('#deleteModal').modal('show');
    }
</script>
@endsection