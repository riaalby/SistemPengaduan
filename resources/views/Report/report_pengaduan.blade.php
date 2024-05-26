<html>
<head>
	<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
	<style type="text/css">
		body {
			font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";
		}

		/* Table */
		table {
			margin: auto;
			font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";
			font-size: 12px;
            width: 100%;
		}
		.demo-table {
			border-collapse: collapse;
			font-size: 13px;
		}
		.demo-table th,
		.demo-table td {
			border-bottom: 1px solid #e1edff;
			border-left: 1px solid #e1edff;
			padding: 7px 15px;
		}
		.demo-table th,
		.demo-table td:last-child {
			border-right: 1px solid #e1edff;
            border-top: 1px solid #e1edff;
		}
		.demo-table td:first-child {
			border-top: 1px solid #e1edff;
		}
		.demo-table td:last-child{
			border-bottom: 1px solid #e1edff;
		}
		caption {
			caption-side: top;
			margin-bottom: 10px;
		}

		/* Table Header */
		.demo-table thead th {
			background-color: #508abb;
			color: #FFFFFF;
			border-color: #6ea1cc !important;
			text-transform: uppercase;
		}

		/* Table Body */
		.demo-table tbody td {
			color: #353535;
		}

		.demo-table tbody tr:nth-child(odd) td {
			background-color: #f4fbff;
		}
		.demo-table tbody tr:hover th,
		.demo-table tbody tr:hover td {
			background-color: #ffffa2;
			border-color: #ffff0f;
			transition: all .2s;
		}
	</style>
</head>
<body>
  <center>
    <h4 style="font-family: Arial, Helvetica, sans-serif; font-size: 25px;">Laporan Pengaduan</h4>
  </center>
	<p>Periode: {{ date('d F Y', strtotime($tanggal_awal)) }} - {{ date('d F Y', strtotime($tanggal_akhir)) }}</p>
	<table class="demo-table responsive" >
		<thead>
        <tr>
            <th scope="col">Tanggal Pengaduan</th>
            <th scope="col">Isi Pengaduan</th>
            <th scope="col">Nama Ruangan</th>
            <th scope="col">Staf</th>
            <th scope="col">Status</th>
        </tr>
		</thead>
    <tbody>
        @foreach($data as $value)
            <tr>
	            <th scope="row">{{ date('d-m-Y', strtotime($value->tgl_pengaduan)); }}</th>
	            <td>{{$value->isi_pengaduan}}</td>
	            <td>{{$value->ruangan->nama_ruangan}}</td>
			    <td>@if($value->id_staf != null) {{$value->staf->nama}} @endif</td>
			    <td>{{$value->status_enumi}}</td>
	        </tr>
         @endforeach
    </tbody>
</table>
