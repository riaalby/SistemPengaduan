@extends ('template')
@section('navigasi')
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">            
  <h4 class="py-3 mb-4">
    <span class="text-muted fw-light">SIMPEDU ></span> Staf
  </h4>

  <div class="row">
    <div class="col-md-6">
      <div class="card mb-4">
        <h5 class="card-header">Form Tambah Staf</h5>
        <form method="POST" action="{{ route('staf-simpan') }}" enctype='multipart/form-data'>
              @csrf
          <div class="card-body">
            <div>
              <label for="defaultFormControlInput" class="form-label">Nama</label>
              <input type="text" class="form-control" name="nama" id="defaultFormControlInput" placeholder="" aria-describedby="defaultFormControlHelp">       
            </div>
            <div id="defaultFormControlHelp" class="form-text"></div>
              <div>
                <label for="defaultFormControlInput" class="form-label">Jabatan</label>
                <input type="text" class="form-control" name="jabatan" id="defaultFormControlInput" placeholder="" aria-describedby="defaultFormControlHelp">
            </div>
            
            <div class="mb-3">
              <label class="form-label">Ruangan</label>
              <select class="form-control" name="id_ruangan"  id="exampleFormControlSelect1" aria-label="Default select example">
                <option value="" selected>Pilih Ruangan</option>
                @foreach($data as $value)
                <option value="{{$value->id}}">{{$value->nama_ruangan}}</option>
                @endforeach
              </select>
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