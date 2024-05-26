<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
    public function index (){
        
        $data = Admin::all();
        return view('Admin.Admin', compact('data'));

    }

    public function tambah (){

        return view('Admin.tambah');

    }

    public function simpan (Request $request){
        //dd($request->all());
        $data = $request->except('_token', 'submit');
        Admin::create($data);

        return redirect('Admin');

        
        
    }

    public function edit ($id){
        $data = Admin::findOrFail($id);
        return view('Admin.edit', compact('data'));
    }

    public function update (Request $request, $id){

        $data = Admin::findOrFail($id);
        $data->nama = $request->nama;
        $data->jabatan = $request->jabatan;
        
        
        $data->save();

        return redirect('Admin');
    }

    public function delete ($id){
        $data = Admin::findOrFail($id);
        $data->delete();
        return redirect('Admin');
    }

    
}
