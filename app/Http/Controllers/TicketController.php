<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TicketKereta;
use App\Models\TicketPesawat;
use App\Models\TicketBus;
use App\Models\Kereta;
use App\Models\Pesawat;
use App\Models\Bus;
use App\Http\Resources\TicketResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


class TicketController extends Controller
{
    public function getKereta($id){
        $ticket = DB::table('ticket_keretas')->where('user_id',$id)->get();
        if(count($ticket) > 0){
            return new ticketResource(true, 'List Data ticket', $ticket);
        }else{
            return response([
                'message' => 'Belum ada ticket',
                'data' => null
            ], 400);
        }
    }
    public function lunasKereta($id){
        $ticket = TicketKereta::find($id);
        
        if($ticket){
            if($ticket->status=="Dipesan"){
                $ticket->status="Lunas";
                $ticket->save();
                return new ticketResource(true, 'Pembayaran Berhasil', $ticket);
            }else{
                return new ticketResource(true, 'Ticket Sudah Dibayar', $ticket);
            }
            
        }else{
            return response([
                'message' => 'Tiket tidak ditemukan',
                'data' => null
            ], 400);
        }
    }
    public function getPesawat($id){
        $ticket = DB::table('ticket_pesawats')->where('user_id',$id)->get();
        if(count($ticket) > 0){
            return new ticketResource(true, 'List Data ticket', $ticket);
        }else{
            return response([
                'message' => 'Belum ada ticket',
                'data' => null
            ], 400);
        }
    }
    public function lunasPesawat($id){
       $ticket = TicketPesawat::find($id);
        
        if($ticket){
            if($ticket->status=="Dipesan"){
                $ticket->status="Lunas";
                $ticket->save();
                return new ticketResource(true, 'Pembayaran Berhasil', $ticket);
            }else{
                return new ticketResource(true, 'Ticket Sudah Dibayar', $ticket);
            }
            
        }else{
            return response([
                'message' => 'Tiket tidak ditemukan',
                'data' => null
            ], 400);
        }
    }
    public function getBus($id){
        $ticket = DB::table('ticket_buses')->where('user_id',$id)->get();
        if(count($ticket) > 0){
            return new ticketResource(true, 'List Data ticket', $ticket);
        }else{
            return response([
                'message' => 'Belum ada ticket',
                'data' => null
            ], 400);
        }
    }
    public function lunasBus($id){
        $ticket = TicketBus::find($id);
        
        if($ticket){
            if($ticket->status=="Dipesan"){
                $ticket->status="Lunas";
                $ticket->save();
                return new ticketResource(true, 'Pembayaran Berhasil', $ticket);
            }else{
                return new ticketResource(true, 'Ticket Sudah Dibayar', $ticket);
            }
            
        }else{
            return response([
                'message' => 'Tiket tidak ditemukan',
                'data' => null
            ], 400);
        }
    }
    
    public function kereta($id){
        $ticket = TicketKereta::all()->where('user_id', $id);
        if(count($ticket) > 0){
            return new ticketResource(true, 'List Data ticket', $ticket);
        }else{
            return response([
                'message' => 'Belum ada ticket',
                'data' => null
            ], 400);
        }
    }
    public function pesawat($id){
        $ticket = TicketPesawat::all()->where('user_id', $id);
        if(count($ticket) > 0){
            return new ticketResource(true, 'List Data ticket', $ticket);
        }else{
            return response([
                'message' => 'Belum ada ticket',
                'data' => null
            ], 400);
        }
    }
    public function bus($id){
        $ticket = TicketBus::all()->where('user_id', $id);
        if(count($ticket) > 0){
            return new ticketResource(true, 'List Data ticket', $ticket);
        }else{
            return response([
                'message' => 'Belum ada ticket',
                'data' => null
            ], 400);
        }
    }

    public function storeKereta(Request $request){
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|numeric',
            'kereta_id' => 'required|numeric',
        ]);

        if($validator->fails()) {
           return response()->json($validator->errors(), 422); 
        }
        $kereta = Kereta::find($request->kereta_id);
        $ticket = TicketKereta::create([ 
            'nama' => $kereta->name,
            'user_id' => $request->user_id, 
            'asal' => $kereta->from_id,
            'tujuan' => $kereta->to_id,
            'jadwal_keberangkatan' => $kereta->jadwal_keberangkatan,
            'jadwal_tiba' => $kereta->jadwal_tiba,
            'status' => "Dipesan"
        ]);

        return new TicketResource(true, 'Ticket Kereta Berhasil Dibeli!', $ticket);
    }
    public function storePesawat(Request $request){
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|numeric',
            'pesawat_id' => 'required|numeric',
        ]);

        if($validator->fails()) {
           return response()->json($validator->errors(), 422); 
        }
        $pesawat = Pesawat::find($request->pesawat_id);
        $ticket = TicketPesawat::create([ 
            'nama' => $pesawat->name,
            'user_id' => $request->user_id, 
            'asal' => $pesawat->from_id,
            'tujuan' => $pesawat->to_id,
            'jadwal_keberangkatan' => $pesawat->jadwal_keberangkatan,
            'jadwal_tiba' => $pesawat->jadwal_tiba,
            'status' => "Dipesan"
        ]);

        return new TicketResource(true, 'Ticket Pesawat Berhasil Dibeli!', $ticket);
    }
    public function storeBus(Request $request){
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|numeric',
            'bus_id' => 'required|numeric',
        ]);

        if($validator->fails()) {
           return response()->json($validator->errors(), 422); 
        }
        $bus = Bus::find($request->bus_id);
        $ticket = TicketBus::create([ 
            'nama' => $bus->name,
            'user_id' => $request->user_id, 
            'asal' => $bus->from_id,
            'tujuan' => $bus->to_id,
            'jadwal_keberangkatan' => $bus->jadwal_keberangkatan,
            'jadwal_tiba' => $bus->jadwal_tiba,
            'status' => "Dipesan"
        ]);

        return new TicketResource(true, 'Ticket Bus Berhasil Dibeli!', $ticket);
    }

    public function destroyKereta($id)
    {
        $ticket= TicketKereta::find($id);

        if(is_null($ticket)){
            return response([
                'message' => 'Ticket Tidak Ditemukan',
                'data' => null
            ], 404);
        }

        if($ticket->delete()){
            return response([
                'message' =>'Delete Ticket Sukses',
                'data' => $ticket
            ], 200);
        }
        return response([
            'message' => 'Delete Ticket Gagal',
            'data' => null
        ], 400);
    }
    
    public function destroyPesawat($id)
    {
        $ticket= TicketPesawat::find($id);

        if(is_null($ticket)){
            return response([
                'message' => 'Ticket Tidak Ditemukan',
                'data' => null
            ], 404);
        }

        if($ticket->delete()){
            return response([
                'message' =>'Delete Ticket Sukses',
                'data' => $ticket
            ], 200);
        }
        return response([
            'message' => 'Delete Ticket Gagal',
            'data' => null
        ], 400);
    }
    
    public function destroyBus($id)
    {
        $ticket= TicketBus::find($id);

        if(is_null($ticket)){
            return response([
                'message' => 'Ticket Tidak Ditemukan',
                'data' => null
            ], 404);
        }

        if($ticket->delete()){
            return response([
                'message' =>'Delete Ticket Sukses',
                'data' => $ticket
            ], 200);
        }
        return response([
            'message' => 'Delete Ticket Gagal',
            'data' => null
        ], 400);
    }
}
