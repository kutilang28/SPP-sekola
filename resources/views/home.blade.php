@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (Auth::user()->level == 'admin')
                    <li class="nav-item">
                        <a href="{{ route('transaksi.index')}}" class="nav-link">Admin Dashboard</a>
                    </li>
                    @elseif (Auth::user()->level == 'siswa')
                        <li class="nav-item">
                            <a href="{{ route('siswa') }}" class="nav-link">Siswa  Dashboard</a>
                        </li>
                    @elseif (Auth::user()->level == 'petugas')
                        <li class="nav-item">
                            <a href="{{ route('transaksi.index') }}" class="nav-link">Petugas  Dashboard</a>
                        </li>
                    @endif
                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
