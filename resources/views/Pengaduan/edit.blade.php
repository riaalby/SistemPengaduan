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
        <h5 class="card-header">Form {{ Auth::user()->jabatan == 'Kepala Ruangan' ? 'Detail' : 'Edit' }} Pengaduan</h5>
        <form method="POST" action="{{ route('pengaduan-update', $data->id) }}" enctype='multipart/form-data'>
              @csrf
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12" >
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">Ruangan</label>
                      <select class="form-control" name="id_ruangan"  id="exampleFormControlSelect1" aria-label="Default select example" {{ Auth::user()->jabatan != 'Admin' ? 'disabled' : '' }}>
                        @foreach($data1 as $value)
                        <option value="{{$value->id}}" {{ $data->id_ruangan == $value->id ? 'selected' : '' }}>{{$value->nama_ruangan}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">Pengaduan</label>
                      <textarea class="form-control" name="isi_pengaduan" rows="5">{{ $data->isi_pengaduan }}</textarea>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">Gambar</label>
                      <br/>
                      <img src="{{ asset('storage/'. $data->gambar) }}" height="200"></img>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">Keterangan</label>
                      <input class="form-control" type="text" name="keterangan" >
                    </div>
                  </div>
                </div>
                <hr class="horizontal dark">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                    
                    @if(auth()->user()->jabatan == 'Kepala Ruangan' && $data->status_enumi == "Done")
                      <button class="btn btn-primary btn-sm ms-auto" type="submit">Ajukan Banding</button>
                      <a class="btn btn-success btn-sm ms-auto" type="button" href="{{ route('pengaduan-completed', $data->id) }}">Tutup Aduan</a>
                    @endif  
                    @if(auth()->user()->jabatan != 'Kepala Ruangan')
                      <button class="btn btn-primary btn-sm ms-auto" type="submit">{{ Auth::user()->jabatan == 'Engineer' ? 'Proses Aduan' : 'Simpan' }}</button>
                      <a class="btn btn-success btn-sm ms-auto" type="button" href="{{ route('pengaduan-selesai', $data->id) }}">Selesai</a>
                    @endif
                    </div>
                  </div>
                </div>
              </div>
        </form>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card mb-4">
        <h5 class="card-header">Riwayat Pengaduan</h5>
        <form>
          <br/>
          <div class="container">
            <div class="row">
                <div class="col">
                    <div class="timeline-steps aos-init aos-animate" data-aos="fade-up">
                      @foreach($data2 as $value)
                        <div class="timeline-step">
                            <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="And here's some amazing content. It's very engaging. Right?" data-original-title="2003">
                                <div class="inner-circle"></div>
                                <p class="h6 mt-3 mb-1"><b>{{ date('d-m-Y H:i', strtotime($value->created_at)); }}</b></p>
                                <p class="h6 text-muted mb-0 mb-lg-0">{{$value->keterangan}}</p>
                            </div>
                        </div>
                      @endforeach
                    </div>
                </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<style>
.timeline-steps {
    display: flex;
    justify-content: center;
    flex-wrap: wrap
}

.timeline-steps .timeline-step {
    align-items: center;
    display: flex;
    flex-direction: column;
    position: relative;
    margin: 1rem
}

@media (min-width:768px) {
    .timeline-steps .timeline-step:not(:last-child):after {
        content: "";
        display: block;
        border-top: .25rem dotted #3b82f6;
        width: 3.46rem;
        position: absolute;
        left: 7.5rem;
        top: .3125rem
    }
    .timeline-steps .timeline-step:not(:first-child):before {
        content: "";
        display: block;
        border-top: .25rem dotted #3b82f6;
        width: 3.8125rem;
        position: absolute;
        right: 7.5rem;
        top: .3125rem
    }
}

.timeline-steps .timeline-content {
    width: 10rem;
    text-align: center
}

.timeline-steps .timeline-content .inner-circle {
    border-radius: 1.5rem;
    height: 1rem;
    width: 1rem;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    background-color: #3b82f6
}

.timeline-steps .timeline-content .inner-circle:before {
    content: "";
    background-color: #3b82f6;
    display: inline-block;
    height: 3rem;
    width: 3rem;
    min-width: 3rem;
    border-radius: 6.25rem;
    opacity: .5
}
</style>
@endsection