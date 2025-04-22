@extends('layouts.app')
@section('content')
<div class="container-fluid mt-4">
    <div class="row g-3">
        <div class="col-md-3">
            <div class="p-3 rounded card-outline-primary" onclick="window.location.href='{{route('complete')}}'" style="cursor: pointer;">
                <div class="d-flex align-items-center" style="height: 100px;">
                    <i class="bi bi-check-circle fs-2 me-3"></i>
                    <div>
                        <div class="fs-5 fw-bold">{{$done}}</div>
                        <div class="small">Complete Task</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="p-3 rounded card-outline-primary" onclick="window.location.href='{{route('cancel')}}'" style="cursor: pointer;">
                <div class="d-flex align-items-center" style="height: 100px;">
                    <i class="bi-x-octagon fs-2 me-3"></i>
                    <div>
                        <div class="fs-5 fw-bold">{{$cancel}}</div>
                        <div class="small">Cancel Task</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="p-3 rounded card-outline-primary">
                <div class="d-flex align-items-center" style="height: 100px;">
                    <i class="bi-hourglass-split fs-2 me-3"></i>
                    <div>
                        <div class="fs-5 fw-bold">{{$progress}}</div>
                        <div class="small">Ongoing Task</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="p-3 rounded card-outline-primary">
                <div class="d-flex align-items-center" style="height: 100px;">
                    <i class="bi bi-calendar-x fs-2 me-3"></i>
                    <div>
                        <div class="fs-5 fw-bold">{{$over}}</div>
                        <div class="small">Overdue Task</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt-4">
    <div class="progress">
        <div class="progress-bar" role="progressbar" style="width: {{$bar}}%;" aria-valuenow="{{$bar}}" aria-valuemin="0" aria-valuemax="100">
          {{$bar}}%
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
                    <form action="{{route('index')}}" method="GET">
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
                                    <i class="bi bi-search"></i>
                                </button>
                                <a href="{{route('create')}}" class="btn btn-outline-success btn-outline-oke"><i class="bi bi-plus me-1"></i>Tambah</a>
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
                        <th style="width: 300px;" class="text-center">SubTask</th>
                        <th class="text-center">Deadline</th>
                        <th style="width: 180px;" class="text-center">Priority Level</th>
                        <th style="width: 180px;" class="text-center">Progress</th>
                        <th style="width: 160px;" class="text-center">Aksi</th>
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

                        $bg = '';
                        $now = \Carbon\Carbon::now()->parse();
                        $deadline = \Carbon\Carbon::parse($item->deadline);
                        if ($deadline->isPast()) {
                            $bg = 'text-white bg-danger';
                        } elseif ($now->diffInDays($deadline) <= 3)
                        {
                            $bg = 'text-white bg-warning';
                        }
                    @endphp
                        
                    <tr>
                        <td class="text-center">{{$loop->iteration}}</td>
                        <td style="padding: 5px;">
                            <p style="font-size: 17px;  margin: 0px;">
                                {{$item->task}}
                            </p>
                            <li>
                                {{$item->deskripsi}} 
                            </li>
                        </td>
                        <td>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($item->subtask as $sub)
                            @php
                                $a = $i++;
                            @endphp
                            <ul style="padding: 1px; margin: 0px;">
                                <li style="list-style: none;">
                                    {{$a}}. {{$sub->task}}
                                </li>
                            </ul>
                            @endforeach
                        </td>
                        <td class="{{$bg}}" style="white-space: nowrap">{{\Carbon\Carbon::parse($item->deadline)->format('d-m-Y')}}</td>
                        <td class="text-center">{{$level}}</td>
                        <td>
                            <form action="{{route('status', $item->id)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <select name="status" id="" class="form-select" onchange="this.form.submit()">
                                    <option value="" {{$item->status == 0 ? 'selected' : ''}} disabled>New</option>
                                    <option value="2" {{$item->status == 2 ? 'selected' : ''}}>Complete</option>
                                    <option value="1" {{$item->status == 1 ? 'selected' : ''}}>Progress</option>
                                    <option value="3" {{$item->status == 3 ? 'selected' : ''}}>Cancel</option>
                                </select>
                            </form>
                        </td>
                        <td style="white-space: nowrap;">
                            <a href="{{route('edit', $item->id)}}" class="btn btn-outline-warning"><i class="bi bi-pencil-square"></i></a>
                            <a href="{{route('show', $item->id)}}" class="btn btn-outline-primary"><i class="bi bi-info-circle"></i></a>
                            <button class="btn btn-outline-danger" onclick="hapus({{$item->id}})">
                                <i class="bi bi-trash"></i>
                            </button>
                            <a href="{{route('subtask', $item->id)}}" class="btn btn-outline-primary"><i class="bi bi-plus-circle"></i></a>
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