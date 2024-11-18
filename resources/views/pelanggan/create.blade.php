@extends('base.base')

@section('content')
    <div class="container">
        <form action="{{ route('joki.insert') }}" method="POST">
            @csrf
            <h3>Input Data Pelanggan</h3>

            <label for="email">Email</label>
            <input class="form-control" type="email" name="email" id="email" required>

            <label for="password">Password</label>
            <input class="form-control" type="password" name="password" id="password" required>

            <label for="sosmed">Sosmed</label>
            <input class="form-control" type="text" name="sosmed" id="sosmed" required>

            <label for="order_id">Order</label>
            <select class="form-control" name="order_id" id="order_id" required>
                @foreach($orders as $order)
                    <option value="{{ $order->id }}">
                        {{ $order->listquest->nama_quest }} <!-- Ganti dengan atribut yang sesuai di ListQuest -->
                    </option>
                @endforeach
            </select>


            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
