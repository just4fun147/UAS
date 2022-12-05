<?php

namespace App\Http\Controllers;


use App\Models\Pesawat;
use App\Models\Kota;
use Illuminate\Http\Request;

class PesawatController extends Controller
{
    public function index(Request $request){
        $pesawat = Pesawat::where('from_id',$request->keberangkatan)
            ->where('to_id',$request->tujuan)
            ->where('jadwal_keberangkatan',$request->tanggal)
            ->where('kelas', $request->kelas)
            ->get();
        return view('page.listPesawat',compact('pesawat'), [
            'title' => 'jadwal Pesawat',
            'active' => 'jadwal Pesawat'
        ]);
       }
}
