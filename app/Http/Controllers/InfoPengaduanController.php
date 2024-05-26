<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;
use App\Models\RiwayatPengaduan;
use App\Models\Ruangan;
use Barryvdh\DomPDF\Facade\Pdf;

class InfoPengaduanController extends Controller
{
    public function index()
    {
        $data = Pengaduan::all();
        return view('report.info_pengaduan', compact('data'));
    }

    public function detail($id)
    {
        $data = Pengaduan::findOrFail($id);
        $data1 = Ruangan::all(); 
        $data2 = RiwayatPengaduan::where('id_pengaduan', $id)->get();
        //dd($data2); 
        return view('report.detail_pengaduan', compact('data', 'data1', 'data2'));
    }

    public function filter(Request $request)
    {
        $data = Pengaduan::where('tgl_pengaduan', '>=', $request->tanggal_awal)
                           ->where('tgl_pengaduan', '<=', $request->tanggal_akhir)
                           ->get();
        //dd($data);
        return view('report.tabel_info_pengaduan', compact('data'));
    }

    public function download(Request $request)
    {
        //dd($request->all());
        $tanggal_awal = $request->tanggal_awal;
        $tanggal_akhir = $request->tanggal_akhir;

        if($request->tanggal_awal != null && $request->tanggal_akhir != null){
            $data = Pengaduan::where('tgl_pengaduan', '>=', $request->tanggal_awal)
                           ->where('tgl_pengaduan', '<=', $request->tanggal_akhir)
                           ->get();
        }else if($request->tanggal_awal == null && $request->tanggal_akhir != null){
            $data = Pengaduan::where('tgl_pengaduan', '<=', $request->tanggal_akhir)
                               ->orderBy('tgl_pengaduan', 'asc')->get();
            $dataPertama = $data->first();
            $tanggal_awal = $dataPertama->tgl_pengaduan;
        }else if($request->tanggal_awal != null && $request->tanggal_akhir == null){
            $data = Pengaduan::where('tgl_pengaduan', '>=', $request->tanggal_awal)
                               ->orderBy('tgl_pengaduan', 'asc')->get();
            $dataTerakhir = $data->last();
            $tanggal_akhir = $dataTerakhir->tgl_pengaduan;
        }else{
            $data = Pengaduan::all();
            $data = $data->sortBy('tgl_pengaduan');
            $dataPertama = $data->first();
            $dataTerakhir = $data->last();
            $tanggal_awal = $dataPertama->tgl_pengaduan;
            $tanggal_akhir = $dataTerakhir->tgl_pengaduan;
        }
        //dd($tan);
        //return view('report.tabel_info_pengaduan', compact('data'));
        $pdf= Pdf::loadView('report.report_pengaduan', compact('data', 'tanggal_awal', 'tanggal_akhir'));
        return $pdf->stream('Laporan-Pengaduan.pdf');

    }
}
