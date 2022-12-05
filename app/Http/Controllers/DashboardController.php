<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use App\Models\Pesawat;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function pesawat(){
        $kotas = Kota::all();
        $user = auth()->user();
        return view('page/pesawat',compact('kotas','user'), [
            'title' => 'Penerbangan',
            'active' => 'Penerbangan'
        ]);
    }
    public function kereta(){
        return view('page/kereta', [
            'title' => 'Kereta',
            'active' => 'Kereta'
        ]);
    }
    public function bus(){
        return view('page/bus', [
            'title' => 'Bus',
            'active' => 'Bus'
        ]);
    }
    public function mobil(){
        return view('page/mobil', [
            'title' => 'Penyewaan Mobil',
            'active' => 'Penyewaan Mobil'
        ]);
    }
}
