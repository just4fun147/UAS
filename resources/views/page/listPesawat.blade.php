@extends('layout.transportasi')

@section('container')   

    @forelse ($pesawat as $item)
        <p>{{$item->name}}</p>
        <p>{{$item->jadwal_keberangkatan}}</p>
        <p>{{$item->jam_keberangkatan}}</p>
        <p>{{$item->jadwal_tiba}}</p>
        <p>{{$item->jam_tiba}}</p>
    @empty
        <p>kosong</p>
    @endforelse
@endsection