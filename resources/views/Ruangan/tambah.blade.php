@extends ('template')
@section('navigasi')
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">            
  <h4 class="py-3 mb-4">
    <span class="text-muted fw-light">SIMPEDU ></span> Ruangan
  </h4>

  <div class="row">
    <div class="col-md-6">
      <div class="card mb-4">
        <h5 class="card-header">Form Tambah Ruangan</h5>
        <form method="POST" action="{{ route('ruangan-simpan') }}" enctype='multipart/form-data'>
              @csrf
          <div class="card-body">
            <div>
              <label for="defaultFormControlInput" class="form-label">Nama Ruangan</label>
              <input type="text" class="form-control" name="nama_ruangan" id="defaultFormControlInput" placeholder="" aria-describedby="defaultFormControlHelp">        
            </div>
              <div id="defaultFormControlHelp" class="form-text"></div>
              <div>
              <label for="defaultFormControlInput" class="form-label">Lokasi Ruangan</label>
              <input type="text" class="form-control" name="lokasi_ruangan" id="defaultFormControlInput" placeholder="" aria-describedby="defaultFormControlHelp">
              
            </div>
            <br/>
            <button class="btn btn-primary btn-sm ms-auto" Type = "submit"> Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection