@foreach($data as $value)
<tr>
    <td>{{$value->tgl_pengaduan}}</td>
    <td>{{$value->isi_pengaduan}}</td>
    <td>{{$value->ruangan->nama_ruangan}}</td>
    <td>@if($value->id_staf != null) {{$value->staf->nama}} @endif</td>
    <td>{{$value->status_enumi}}</td>
    <td>{{$value->keterangan}}</td>
    <td>
        <a href="{{ route('detail-pengaduan', $value->id)}}" class="btn btn-primary btn-circle btn-sm"><i class="fas fa-eye"></i></a>
    </td>
</tr>
@endforeach