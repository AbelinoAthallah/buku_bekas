<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Jenis_model;
use Auth;

class JenisController extends Controller
{
    public function store(Request $request)
    {
        // if(Auth::User()->status=="admin"){
        $validator=Validator::make($request->all(),[
            'nama_jenis'=>'required'
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(),
            400);
        }else{
            $insert=Jenis_model::insert([
                'nama_jenis'=>$request->nama_jenis
            ]);
            if($insert){
                $status="Sukses menambahkan data!";
            }else{
                $status="Gagal menambahkan data!";
            }
            return response()->json(compact('status'));
        }
        // }else{
        // return response()->json(['status'=>'anda bukan admin']);
        // }
    }

    public function update($id,Request $req)
    {
        // if(Auth::User()->status=="admin"){
        $validator=Validator::make($req->all(),
        [
            'nama_jenis'=>'required'
        ]);

        if($validator->fails()){
            return Response()->json($validator->errors());
        }
        $ubah=Jenis_model::where('id_jenis_buku', $id)->update([
            'nama_jenis'=>$req->nama_jenis
        ]);
        if($ubah){
            return Response()->json(['status'=>'Data berhasil diubah!']);
        }else{
            return Response()->json(['status'=>'Data gagal diubah!']);
        }
        // }else{
        // return response()->json(['status'=>'anda bukan admin']);
        // }
    }
    public function destroy($id)
    {
        // if(Auth::User()->status=="admin"){
        $hapus=Jenis_model::where('id_jenis_buku',$id)->delete();
        if($hapus){
            return Response()->json(['status'=>'Data berhasil dihapus!']);
        }else{
            return Response()->json(['status'=>'Data gagal dihapus!']);
        }
        // }else{
        // return response()->json(['status'=>'anda bukan admin']);
        // }
    }

    public function tampil_jenis()
    {
        // if(Auth::User()->status=="admin"){
        $data_jenis=Jenis_model::get();
        return Response()->json($data_jenis);
        
        // }else{
        // return response()->json(['status'=>'anda bukan admin']);
        // }
    }
}
