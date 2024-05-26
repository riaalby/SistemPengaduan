<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ruangan;

class RuanganController extends Controller
{
    public function index (){
        
        $data = Ruangan::all();
        return view('ruangan.Ruangan', compact('data'));
    }
        public function tambah (){

            return view('ruangan.tambah');
    
        }
        public function simpan (Request $request){
            //dd($request->all());
            $data = $request->except('_token', 'submit');
    
            Ruangan::create($data);
    
            return redirect('ruangan');
    
            
            
        }

        public function edit ($id){
            $data = Ruangan::findOrFail($id);
            return view('ruangan.edit', compact('data',));
        }

        

        public function update (Request $request, $id){

            $data = Ruangan::findOrFail($id);
            $data->nama_ruangan = $request->nama_ruangan;
            $data->lokasi_ruangan = $request->lokasi_ruangan;
            
            $data->save();
    
            return redirect('ruangan');
        }
        
        public function delete ($id){
            
            $data = Ruangan::findOrFail($id);
    
            $data->delete();
            return redirect('ruangan');
        }
   
}
