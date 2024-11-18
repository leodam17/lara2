@extends('base.base')

@section('content')
    <div class="container">
        <form action={{ route('login.post') }} method="POST">
            @csrf
            {{-- @if (session()->has('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif --}}
            <h3 class="bg-primary text-light p-3">Login Page</h3>

            <label for="email">Email</label>
            <input class="form-control @error('email') is-invalid @enderror" 
             name="email" id="email" value="{{ old('email') }}"   required>
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror


            <label for="password">Password</label>
            <input class="form-control" type="password" name="password" id="password" required>

            <button type="submit" class="btn btn-primary" style="margin-top: 10px">Simpan</button>

        </form>
    </div>

@endsection
