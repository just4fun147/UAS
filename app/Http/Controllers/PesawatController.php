<?php

namespace App\Http\Controllers;


use App\Models\Pesawat;
use App\Models\Kota;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\PesawatResource;
use App\Models\User;

class PesawatController extends Controller
{
    public function index(Request $request){
        if($request->from_id == null){
            $pesawat = Pesawat::all();
        }else{
            $pesawat = Pesawat::where('from_id',$request->from_id)
                ->where('to_id',$request->to_id)
                ->where('jadwal_keberangkatan',$request->jadwal_keberangkatan)
                ->where('kelas', $request->kelas)
                ->get();
        }

        if(count($pesawat) > 0){
            return new pesawatResource(true, 'List Data Pesawat', $pesawat);
        }

        return response([
            'message' => 'Empty',
            'data' => null
        ], 400);
    }

    public function show(Request $request){
        $pesawat = Pesawat::where('from_id',$request->keberangkatan)
            ->where('to_id',$request->tujuan)
            ->where('jadwal_keberangkatan',$request->tanggal)
            ->where('kelas', $request->kelas)
            ->get();
            return new PesawatResource(true, 'List Data Pesawat', $pesawat);
       }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'user_id' => 'required|numeric',
            'from_id' => 'required|numeric',
            'to_id' => 'required|numeric',
            'kelas' => 'required|numeric',
            'jadwal_keberangkatan' => 'required', //date
            'jam_keberangkatan' => 'required',
            'jadwal_tiba' => 'required', //date
           'jam_tiba' => 'required'
        ]);

        if($validator->fails()) {
           return response()->json($validator->errors(), 422); 
        }
        $pesawat = Pesawat::create([ 
            'name' => $request->name, 
            'user_id' => $request->user_id, 
            'from_id' => $request->from_id,
            'to_id' => $request->to_id,
            'kelas' => $request->kelas,
            'jadwal_keberangkatan' => $request->jadwal_keberangkatan,
            'jam_keberangkatan' => $request->jam_keberangkatan,
            'jadwal_tiba' => $request->jadwal_tiba,
            'jam_tiba' => $request->jam_tiba
        ]);

        return new PesawatResource(true, 'Data Pesawat Berhasil Ditambahkan!', $pesawat);
   
    }
    public function destroy($id)
    {
        $pesawat= Pesawat::find($id);

        if(is_null($pesawat)){
            return response([
                'message' => 'Pesawat Tidak Ditemukan',
                'data' => null
            ], 404);
        }

        if($pesawat->delete()){
            return response([
                'message' =>'Delete Pesawat Sukses',
                'data' => $pesawat
            ], 200);
        }
        return response([
            'message' => 'Delete Pesawat Gagal',
            'data' => null
        ], 400);
    }
    
    
    
    public function update(Request $request, $id){
        $pesawat = Pesawat::find($id);

        if(is_null($pesawat)){
            return response([
                'message' => 'Pesawat Tidak Ditemukan',
                'data' => null
            ], 404);
        }

        if($request->name){
            $pesawat->name = $request->name;
        }
        if($request->from_id){
            $pesawat->from_id = $request->from_id;
        }
        if($request->to_id){
            $pesawat->to_id = $request->to_id;
        }
        if($request->kelas){
            $pesawat->kelas = $request->kelas;
        }
        if($request->jadwal_keberangkatan){
            $pesawat->jadwal_keberangkatan = $request->jadwal_keberangkatan;
        }
        if ($request->jam_keberangkatan) {
            $pesawat->jam_keberangkatan = $request->jam_keberangkatan;
        }
        if ($request->jam_tiba) {
            $pesawat->jam_tiba = $request->jam_tiba;
        }
        if ($request->jadwal_tiba) {
            $pesawat->jadwal_tiba = $request->jadwal_tiba;
        }
        $pesawat->save();
        return new pesawatResource(true, 'Update Pesawat Sukses', $pesawat);
    }
}
