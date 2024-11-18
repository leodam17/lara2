@extends('base.base');

@section('content')

<div class="container">
    {{-- pelanggan.create itu soalnya create ada di folder pelanggan hehe, berlaku sama untuk pelanggan.edit --}}
    <a class="btn btn-primary my-3" href="{{ route('pelanggan.create') }}"> 
        Tambah data
    </a>
    
    @auth
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="nav-link" href="#">
            Logout
        </button>
    </form>
    @endauth
    <table class="table table-border table-stripped">
        <thead>
            <tr>
                <th>No</th>
                <th>Email</th>
                <th>Password</th>
                <th>Sosmed</th>
                <th>is_verif</th>
                <th>order_id</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pelanggan as $row)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $row->email }}</td>
                    <td>{{ $row->password }}</td>
                    <td>{{ $row->sosmed }}</td>
                    <td>{{ $row->is_verif }}</td>
                    <td>{{ $row->order_id }} - {{ $row->order->nama_quest }}</td>
                    @can('insert')
                    <td>
                        <a href="{{ route('pelanggan.edit', $row) }}" class="btn btn-warning">Edit</a>
                        <form method="POST" action="{{ route('joki.delete', $row) }}" onsubmit="return confirm('hapus data ini?')">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                    @endcan
                </tr>
            @endforeach
        </tbody>
    </table>
    <br>

    <h3>Daftar Order</h3>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>nama_quest</th>
                <th>harga</th> 
                <th>tanggal_pesan</th> 
                <th>tanggal_selesai</th>
                <th>deadline</th>
                <th>keterangan</th>   
                <th>id_listquest</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $order->listquest->nama_quest }}</td>
                    <td>{{ $order->listquest->harga }}</td> 
                    <td>{{ $order->tanggal_pesan }}</td> 
                    <td>{{ $order->tanggal_selesai }}</td> 
                    <td>
                        @php
                            // Assuming tanggal_pesan and tanggal_selesai are in 'Y-m-d' format
                            $tanggalPesan = \Carbon\Carbon::parse($order->tanggal_pesan);
                            $tanggalSelesai = \Carbon\Carbon::parse($order->tanggal_selesai);
                            $deadline = $tanggalSelesai->diffInDays($tanggalPesan); // Calculate the difference in days
                        @endphp
                        {{ $deadline }} days
                    </td> 
                    <td>{!! nl2br(e($order->listquest->langkah_langkah)) !!}</td>
                    <td>{{ $order->listquest->id }}</td> 
                </tr>
            @endforeach
        </tbody>
    </table>
   