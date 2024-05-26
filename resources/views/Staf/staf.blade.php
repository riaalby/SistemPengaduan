@extends ('template')
@section('navigasi')
@endsection
@section('content')
<form id="hapus" method="GET" action= "" style="display:none;">
  @csrf 
</form>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="{{ route('staf-tambah') }}" class="btn btn-primary btn-icon-split">
            <span class="icon text-white-50"><i class="fas fa-plus"></i></span>
            <span class="text">Tambah Data</span>
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Ruangan</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $value)
                    <tr>
                        <td>{{$value->nama}}</td>
                        <td>{{$value->jabatan}}</td>
                        <td>@if($value->id_ruangan != null) {{$value->ruangan->nama_ruangan}} @endif</td>
                        <td>
                            <a href="{{ route('staf-edit', $value->id)}}" class="btn btn-warning btn-circle btn-sm"><i class="fas fa-pen"></i></a>
                            <a href="#" class="btn btn-danger btn-circle btn-sm" onclick= "event.preventDefault();if(confirm('Apakah Anda Yakin?')) { $('form#hapus').attr('action', '{{ route('staf-delete', $value->id) }}').submit();}"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection