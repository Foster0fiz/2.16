@extends('layouts.app')

@section('title', "Ro'yxatdan o'tish")

@section('content')
    <div class="auth-container">
        <h2 class="text-center mb-4">Ro'yxatdan o'tish</h2>
        <form action="{{ route('register') }}" method="POST">
            @csrf
            @if ($errors->has('password'))
    <div class="alert alert-danger">
        {{ $errors->first('password') }}
    </div>
@endif
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="mb-3">
    <label for="name" class="form-label">Foydalanuvchi nomi</label>
    <input type="text" class="form-control" id="name" name="name" required>
</div>

            <div class="mb-3">
                <label for="email" class="form-label">Elektron pochta</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Parol</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Parolni tasdiqlang</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Ro'yxatdan o'tish</button>
        </form>
        <p class="mt-3 text-center">Hisobingiz bormi? <a href="{{ route('login') }}">Kirish</a></p>
    </div>
@endsection
