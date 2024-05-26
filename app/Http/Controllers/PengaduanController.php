<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Pengaduan;
use App\Models\RiwayatPengaduan;
use App\Models\Ruangan;
use App\Models\Staf;
use Auth;

class PengaduanController extends Controller
{
    public function index()
    {
        $dataStaf = Staf::where('user_id', Auth::user()->id)->first();

        if($dataStaf->jabatan != 'Kepala Ruangan'){
            $data = Pengaduan::all();
        }else{
            $data = Pengaduan::where('id_ruangan', $dataStaf->id_ruangan)->get();
        }
        
        return view('pengaduan.Pengaduan', compact('data'));
    }

    public function tambah()
    {
        //dd($data); 
        return view('pengaduan.tambah');
    }

    public function simpan(Request $request)
    {
        $dataKepalaRuangan = Staf::where('user_id', Auth::user()->id)->first();
        $data = $request->except('_token', 'submit');
        if ($request->hasFile('gambar')) { //untuk melakukan pengecekan apakah ada file yang dikirim dari view

            $fileGambar = $request->file('gambar'); //data gambar disimpan di variabel fileGambar
            $pathGambar = $fileGambar->storeAs('foto-bukti', 'pengaduan_' . uniqid() . '.' . $fileGambar->Extension(), ['disk' => 'public']); //untuk menyimpan data gambar ke storage server
            $link = Storage::url($pathGambar); //untuk membuat gambar bisa di akses di view
            $data['gambar'] = $pathGambar; //path file disimpan di database
        }

        $data['status_enumi'] = "Pending";
        if($dataKepalaRuangan->id_ruangan != null){
            $data['id_ruangan'] = $dataKepalaRuangan->id_ruangan;
        }
        $pengaduan = Pengaduan::create($data);

        $riwayatPengaduan = [
                'id_pengaduan' => $pengaduan->id,
                'keterangan' => "Pengaduan dibuat oleh ". $dataKepalaRuangan->nama,
            ];

        RiwayatPengaduan::create($riwayatPengaduan);

        return redirect('pengaduan');
    }

    public function edit($id)
    {
        $data = Pengaduan::findOrFail($id);
        $data1 = Ruangan::all(); 
        $data2 = RiwayatPengaduan::where('id_pengaduan', $id)->get();
        //dd($data2); 
        return view('pengaduan.edit', compact('data', 'data1', 'data2'));
    }

    public function update(Request $request, $id)
    {
        //dd($request->all());
        $dataStaf = Staf::where('user_id', Auth::user()->id)->first();

        $data = Pengaduan::findOrFail($id);

        $keterangan = "";
        if($data->status_enumi == 'Done' && $dataStaf->jabatan == 'Kepala Ruangan'){
            $data->status_enumi = "Pending";
            $data->keterangan = $request->keterangan;
            
            if($request->keterangan != null){
                $keterangan = "Banding diajukan oleh ". $dataStaf->nama . " (".$data->keterangan.")";
            }else{
                $keterangan = "Pengaduan diajukan oleh ". $dataStaf->nama;
            }
        }else{
            $data->status_enumi = "On Process";
            $data->keterangan = $request->keterangan;
            $data->id_staf = $dataStaf->id;
            if($request->keterangan != null){
                $keterangan = "Pengaduan diproses oleh ". $dataStaf->nama . " (".$data->keterangan.")";
            }else{
                $keterangan = "Pengaduan diproses oleh ". $dataStaf->nama;
            }

            //dd($keterangan); 
        }

        $data->save();

        $riwayatPengaduan = [
                    'id_pengaduan' => $data->id,
                    'keterangan' => $keterangan,
                ];

            RiwayatPengaduan::create($riwayatPengaduan);

        return redirect('pengaduan');
    }

    public function selesai($id)
    {
        //dd($request->all());
        $dataStaf = Staf::where('user_id', Auth::user()->id)->first();

        $data = Pengaduan::findOrFail($id);
        $data->status_enumi = "Done";
        $data->save();

        //dd($keterangan);

        $riwayatPengaduan = [
                'id_pengaduan' => $data->id,
                'keterangan' => "Pengaduan diselesaikan oleh ". $dataStaf->nama,
            ];

        RiwayatPengaduan::create($riwayatPengaduan);

        return redirect('pengaduan');
    }

    public function completed($id)
    {
        //dd($request->all());
        $dataStaf = Staf::where('user_id', Auth::user()->id)->first();

        $data = Pengaduan::findOrFail($id);
        $data->status_enumi = "Completed";
        $data->save();

        //dd($keterangan);

        $riwayatPengaduan = [
                'id_pengaduan' => $data->id,
                'keterangan' => "Pengaduan telah ditutup oleh ". $dataStaf->nama,
            ];

        RiwayatPengaduan::create($riwayatPengaduan);

        return redirect('pengaduan');
    }

    public function delete($id)
    {
        $data = Pengaduan::findOrFail($id);
        $data->delete();
        return redirect('pengaduan');
    }
}
