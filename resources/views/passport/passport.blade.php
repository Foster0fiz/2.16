@extends('layouts.app')

@section('title', "Passport ma'lumotlari")

@section('content')
    <h1 class="mb-4">Passport ma'lumotlari</h1>

    @if ($passport)
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Passport raqami: <span>{{ $passport->passport_number }}</span></h5>
                <p class="card-text">Berilgan sana: <span>{{ $passport->issue_date }}</span></p>
                <p class="card-text">Amal qilish muddati: <span>{{ $passport->expiry_date }}</span></p>
                <a href="{{ route('passport.edit', $passport->id) }}" class="btn btn-primary">
                    <i class="fas fa-edit"></i> Tahrirlash
                </a>
            </div>
        </div>
    @else
        <p class="alert alert-warning">Sizda passport ma'lumotlari yo'q.</p>
        <a href="{{ route('passport.create') }}" class="btn btn-success">
            <i class="fas fa-plus"></i> Passport qo'shish
        </a>
    @endif
@endsection
