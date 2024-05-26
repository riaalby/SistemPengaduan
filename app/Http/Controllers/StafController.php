<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staf;
use App\Models\Ruangan;
use App\Models\User;

class StafController extends Controller
{
        public function index (){
            
            $data = Staf::all();
            return view('staf.staf', compact('data'));
        }

        public function tambah (){

            $data = Ruangan::all(); 
            return view('staf.tambah', compact('data'));
    
        }

        public function simpan (Request $request){
            //dd($request->all());
            $userData = [
                'nama' => $request->input('nama'),
                'username' => $request->input('nama'),
                'password' => bcrypt($request->input('nama')),
                'jabatan' => $request->input('jabatan'),
            ];

            // Create user record
            $user = User::create($userData);

            $data = $request->except('_token', 'submit');
            $data['user_id'] = $user->id;
    
            Staf::create($data);

            return redirect('staf');
        }

        public function edit ($id){
            $data = Staf::findOrFail($id);
            $data1 = Ruangan::all(); 
            return view('staf.edit', compact('data', 'data1'));
        }

        public function update (Request $request, $id){

            $data = Staf::findOrFail($id);
            $data->nama = $request->nama;
            $data->Jabatan = $request->jabatan;
            $data->id_ruangan = $request->id_ruangan;

            $user = User::findOrFail($data->user_id);
            $user->nama = $request->nama;
            $user->save();

            $data->save();
    
            return redirect('staf');
        }
        
        public function delete ($id){
            
            $data = Staf::findOrFail($id);

            $user = User::findOrFail($data->user_id);
            $user->delete();
    
            $data->delete();
            return redirect('staf');
        }
}
