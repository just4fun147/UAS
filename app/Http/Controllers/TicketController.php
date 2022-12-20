<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TicketKereta;
use App\Models\TicketPesawat;
use App\Models\TicketBus;
use App\Http\Resources\TicketResource;
use Illuminate\Support\Facades\Validator;


class TicketController extends Controller
{
    public function index(Request $request){
        
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
        $ticket = TicketKereta::create([ 
            'user_id' => $request->user_id, 
            'kereta_id' => $request->kereta_id,
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
        $ticket = TicketPesawat::create([ 
            'user_id' => $request->user_id, 
            'pesawat_id' => $request->pesawat_id,
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
        $ticket = TicketBus::create([ 
            'user_id' => $request->user_id, 
            'bus_id' => $request->bus_id,
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
