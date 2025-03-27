@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="auth-container p-4 bg-white rounded shadow-sm" style="max-width: 400px; width: 100%;">
            <h2 class="text-center mb-4">Kirish</h2>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Elektron pochta</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Parol</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary w-100">Kirish</button>
            </form>
            <p class="mt-3 text-center">Hisobingiz yo'qmi? <a href="{{ route('register') }}">Ro'yxatdan o'tish</a></p>
        </div>
    </div>
@endsection
