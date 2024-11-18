@extends('base.base')

@section('content')
    <div class="container">
        <form action="{{ route('joki.update', $pelanggan->id) }}" method="POST">
            @csrf
            @method('put')
            <h3>Edit data Pelanggan</h3>
            <label for="email">Email</label>
            <input class="form-control" type="email" name="email" id="email"  value="{{$pelanggan->email}}" required>

            <label for="password">Password</label>
            <input class="form-control" type="password" name="password" id="password" value="{{$pelanggan->password}}" required>

            <label for="sosmed">Sosmed</label>
            <input class="form-control" type="text" name="sosmed" id="sosmed" value="{{$pelanggan->sosmed}}" required>

            <label for="is_verif">Is Verified</label>
            <select class="form-control" name="is_verif" id="is_verif" required>
                <option value="1" {{ $pelanggan->is_verif ? 'selected' : '' }}>Yes</option>
                <option value="0" {{ !$pelanggan->is_verif ? 'selected' : '' }}>No</option>
            </select>

            <label for="order_id">Order</label>
            <select class="form-control" name="order_id" id="order_id" required>
                @foreach($orders as $order)
                    <option value="{{ $order->id }}">
                        {{ $order->listquest->nama_quest }}
                    </option>
                @endforeach
            </select>


            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection('content')
</html>