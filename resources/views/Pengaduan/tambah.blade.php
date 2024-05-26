@extends ('template')
@section('navigasi')
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light">SIMPEDU ></span> Pengaduan
        </h4>
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">
                    <h5 class="card-header">Form Tambah Pengaduan</h5>
                    <form method="POST" action="{{ route('pengaduan-simpan') }}" enctype='multipart/form-data'>
                        @csrf
                        <div class="card-body">
                            
                            <div>
                                <label for="exampleFormControlTextarea1" class="form-label">Tanggal</label>
                                <input class="form-control" type="date" name="tgl_pengaduan">
                            </div>
                            <div>
                                <label for="exampleFormControlTextarea1" class="form-label">Pengaduan</label>
                                <textarea class="form-control" name="isi_pengaduan" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Gambar</label>
                                <input type="file" class="form-control" name="gambar" id="exampleFormControlInput1">
                            </div>
                            <br />
                            <button class="btn btn-primary btn-sm ms-auto" Type = "submit"> Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
