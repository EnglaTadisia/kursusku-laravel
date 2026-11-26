@extends('layouts.app')

@section('title', 'Akun Saya - KursusKu')

@section('content')

<div class="container py-4">

    <div class="p-4 mb-4 rounded-3 text-white"
         style="background:linear-gradient(90deg,#df3190,#f45b9d)">
        <h2>Informasi Akun 👋</h2>
        <p>Selamat datang di KursusKu.</p>
    </div>

    <div class="card shadow-sm border-0 p-4 mb-4">

        <h4 class="mb-4" style="color:#df3190">
            Informasi Pengguna
        </h4>

        <p>Nama: <strong>{{ $user->name }}</strong></p>
        <p>Username: <strong>{{ $user->username }}</strong></p>
        <p>Email: <strong>{{ $user->email }}</strong></p>
        <p>Role: <strong>{{ strtoupper($user->role) }}</strong></p>
        <p>Status: <strong>{{ strtoupper($user->status) }}</strong></p>

        <p>Login Terakhir:
            <strong>
                {{ $user->last_login_at
                    ? $user->last_login_at->format('d/m/Y H:i')
                    : 'Belum tersedia' }}
            </strong>
        </p>

    </div>

    <div class="card shadow-sm border-0 p-4 mb-4">

        <h4 style="color:#df3190">Ganti Password</h4>

        <form action="{{ route('account.password') }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Password Saat Ini</label>
                <input type="password"
                       name="current_password"
                       class="form-control"
                       required>
            </div>

            <div class="mb-3">
                <label>Password Baru</label>
                <input type="password"
                       name="password"
                       class="form-control"
                       required>
            </div>

            <div class="mb-3">
                <label>Ulangi Password Baru</label>
                <input type="password"
                       name="password_confirmation"
                       class="form-control"
                       required>
            </div>

            <button class="btn text-white"
                    style="background:#df3190">
                Ganti Password
            </button>

        </form>

    </div>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button class="btn btn-danger">Logout</button>
    </form>

</div>

@endsection
