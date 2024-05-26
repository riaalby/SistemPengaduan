@extends ('template')
@section('navigasi')
@endsection
@section('content')
<form id="hapus" method="GET" action="" style="display:none;">
  @csrf 
</form>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        @if(auth()->user()->jabatan == 'Kepala Ruangan')
        <a href="{{ route('pengaduan-tambah') }}" class="btn btn-primary btn-icon-split">
            <span class="icon text-white-50"><i class="fas fa-plus"></i></span>
            <span class="text">Tambah Data</span>
        </a>
        @endif
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Pengaduan</th>
                        <th>Ruangan</th>
                        <th>Staf</th>
                        <th>Status</th>
                        <th>Keterangan</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $value)
                    <tr>
                        <td>{{$value->tgl_pengaduan}}</td>
                        <td>{{$value->isi_pengaduan}}</td>
                        <td>{{$value->ruangan->nama_ruangan}}</td>
                        <td>@if($value->id_staf != null) {{$value->staf->nama}} @endif</td>
                        <td>{{$value->status_enumi}}</td>
                        <td>{{$value->keterangan}}</td>
                        <td>
                            @if(auth()->user()->jabatan == 'Admin')
                            <a href="#" class="btn btn-danger btn-circle btn-sm" onclick= "event.preventDefault();if(confirm('Apakah Anda Yakin?')) { $('form#hapus').attr('action', '{{ route('pengaduan-delete', $value->id) }}').submit();}"><i class="fas fa-trash"></i></a>
                            @endif
                            @if(auth()->user()->jabatan != 'Kepala Ruangan')
                            <a href="{{ route('pengaduan-edit', $value->id)}}" class="btn btn-warning btn-circle btn-sm"><i class="fas fa-pen"></i></a>
                            @endif
                            @if(auth()->user()->jabatan == 'Kepala Ruangan')
                            <a href="{{ route('pengaduan-edit', $value->id)}}" class="btn btn-primary btn-circle btn-sm"><i class="fas fa-eye"></i></a>
                            @endif
                            @if(auth()->user()->jabatan == 'Kepala Ruangan' && $value->status_enumi == 'Done')
                            <a href="{{ route('pengaduan-completed', $value->id)}}" class="btn btn-success btn-circle btn-sm"><i class="fas fa-check"></i></a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection