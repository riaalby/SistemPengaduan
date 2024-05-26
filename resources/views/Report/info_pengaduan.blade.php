@extends ('template')
@section('navigasi')
@endsection
@section('content')
<div class="row">
	<div class="col-md-8">
		<div class="card shadow mb-4">
		    <div class="card-header py-3">
		    	<form id="form-download" action="{{ route('download-pengaduan') }}" method="POST">
		    		@csrf
		    		<input type="hidden" id="r_tanggal_akhir" name="tanggal_akhir">
		    		<input type="hidden" id="r_tanggal_awal" name="tanggal_awal">
		    		<button class="btn btn-primary btn-icon-split" onclick="downloadReport()">
			            <span class="icon text-white-50"><i class="fas fa-plus"></i></span>
			            <span class="text">Cetak Pengaduan</span>
			        </button>
		    	</form>
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
		                <tbody id="dataInfoPengaduan">
		                    @include('report.tabel_info_pengaduan')
		                </tbody>
		            </table>
		        </div>
		    </div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="card mb-4">
        <h5 class="card-header">Filter</h5>
        <form method="POST" action="">
              @csrf
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">Tanggal Awal</label>
                      <input class="form-control" type="date" id="tanggal_awal">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">Tanggal Akhir</label>
                      <input class="form-control" type="date" id="tanggal_akhir">
                    </div>
                  </div>
                  <hr class="horizontal dark">
                  <div class="col-md-12">
                    <div class="form-group">
                      <a class="btn btn-primary btn-sm ms-auto" onclick="filterData();" type="button" href="#">Cari Data</a>
                    </div>
                  </div>
              </div>
        </form>
      </div>
	</div>
</div>
<script>
function filterData() {
    var tanggalAwal=$('#tanggal_awal').val();
    var tanggalAkhir=$('#tanggal_akhir').val();
    $.ajax({
        type : 'post',
        url : 'pengaduan-info/filter',
        data:{
            "tanggal_awal": tanggalAwal,
            "tanggal_akhir": tanggalAkhir,
            "_token": "{{ csrf_token() }}"},
        success:function(data){
            $('#dataInfoPengaduan').html(data);
            }
        });
  }



function downloadReport(){
    var tanggalAwal=$('#tanggal_awal').val();
    var tanggalAkhir=$('#tanggal_akhir').val();
    document.getElementById("r_tanggal_akhir").setAttribute('value', tanggalAkhir);
    document.getElementById("r_tanggal_awal").setAttribute('value', tanggalAwal);
    document.getElementById("form-download").submit();
}
</script>

@endsection