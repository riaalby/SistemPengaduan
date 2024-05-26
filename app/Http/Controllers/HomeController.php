<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;
use App\Models\RiwayatPengaduan;
use App\Models\Ruangan;
use App\Models\Staf;

class HomeController extends Controller
{
    public function index()
    {
        $dataRuangan = Ruangan::count();
        $dataStaf = Staf::count();
        $dataPengaduanCompleted = Pengaduan::where('status_enumi', '=', 'Completed')->count();
        $dataPengaduanPending = Pengaduan::where('status_enumi', '=', 'Pending')->count();
        $dataPengaduanDiproses = Pengaduan::where('status_enumi', '=', 'On Process')->count();
        $dataPengaduan = Pengaduan::count();
        //dd($dataPengaduanPending);
        return view('home', compact('dataRuangan', 'dataStaf', 'dataPengaduanPending', 'dataPengaduanDiproses', 'dataPengaduanCompleted', 'dataPengaduan'));
    }
}
