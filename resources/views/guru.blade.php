@extends('layouts.auth')

@section('judul')
    <title>Guru</title>
    <style>
        .btn.btn-primary.disabled,
        .btn.btn-warning.disabled,
        .btn.btn-success.disabled,
        .btn.btn-danger.disabled {
            pointer-events: none;
            opacity: 1;
        }
    </style>
@endsection

@section('content')
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">

        @include('include.guru.sidebar')

        <!--  Main wrapper -->
        <div class="body-wrapper">
            @include('include.header-admin')
            <div class="container-fluid">
                <h5 class="mt-5">Selamat datang di halaman guru</h5>

                <!-- Form Pilih Tanggal -->
                <form action="{{ route('teacher.index') }}" method="GET" class="mb-4 d-flex align-items-end">
                    <div class="me-2">
                        <label for="tanggal" class="form-label">Pilih Tanggal:</label>
                        <input type="date" name="tanggal" id="tanggal" value="{{ $tanggal }}" class="form-control"
                            style="max-width: 300px;">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary mt-2">Tampilkan</button>
                    </div>
                </form>

                <!-- Card untuk Menampilkan Jumlah Orang Tua yang Login -->
                <div class="card mt-4" style="background-color: #e1f5fe; border-radius: 10px; padding: 20px;">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0" style="font-weight: bold; color: #0288d1;">Jumlah Orang Tua yang Login Hari
                            Ini</h5>
                        <div class="badge bg-success text-white p-2" style="font-size: 18px; font-weight: bold;">
                            {{ $jumlahUserLevel2 }} User
                        </div>
                    </div>
                </div>


                <!-- Card Wrapper - Welcome Mood -->
                <div class="card mt-4" style="background-color: #f8f2d6; border-radius: 10px; padding: 20px;">
                    <h3 class="text-center">Welcome Mood</h3>
                    <!-- Tampilan Rekapan Data -->
                    <div class="row mt-4">
                        @php
                            $images = [
                                'Sad' => 'auth/images/face/sad.png',
                                'Neutral' => 'auth/images/face/neutral.png',
                                'Happy' => 'auth/images/face/happy.png',
                            ];
                        @endphp
                        @foreach ($images as $key => $image)
                            <div class="col-md-4 text-center">
                                <img src="{{ asset($image) }}" alt="{{ $key }}" class="img-fluid"
                                    style="max-width: 150px;">
                                <h6 class="mt-2">{{ $key }}</h6>
                                <p>{{ round($persentaseWelcome[$key] ?? 0, 2) }}%</p>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Card Wrapper - Recalling -->
                <div class="card mt-4" style="background-color: #f1d6f8; border-radius: 10px; padding: 20px;">
                    <h3 class="text-center">Recalling</h3>
                    <!-- Tampilan Rekapan Data -->
                    <div class="row mt-4">
                        @php
                            $images = [
                                'Sad' => 'auth/images/face/sad.png',
                                'Neutral' => 'auth/images/face/neutral.png',
                                'Happy' => 'auth/images/face/happy.png',
                            ];
                        @endphp
                        @foreach ($images as $key => $image)
                            <div class="col-md-4 text-center">
                                <img src="{{ asset($image) }}" alt="{{ $key }}" class="img-fluid"
                                    style="max-width: 150px;">
                                <h6 class="mt-2">{{ $key }}</h6>
                                <p>{{ round($persentaseRecalling[$key] ?? 0, 2) }}%</p>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Card Wrapper - Tingkat Keberhasilan -->
                <div class="card mt-4" style="background-color: #d6f8d9; border-radius: 10px; padding: 20px;">
                    <h3 class="text-center">Tingkat Keberhasilan</h3>
                    <div class="row mt-4">
                        @php
                            $icons = [
                                'increase' => 'auth/images/icons/up.png',
                                'decrease' => 'auth/images/icons/down.png',
                                'equal' => 'auth/images/icons/equal.png',
                            ];
                        @endphp
                        @foreach (['Happy', 'Neutral', 'Sad'] as $key)
                            <div class="col-md-4 text-center">
                                <h6>{{ $key }}</h6>
                                <img src="{{ asset($icons[$statusKeberhasilan[$key]]) }}"
                                    alt="{{ $statusKeberhasilan[$key] }}" class="img-fluid" style="max-width: 50px;">
                                <p class="mt-2">
                                    @if ($statusKeberhasilan[$key] == 'increase')
                                        Ada peningkatan
                                    @elseif ($statusKeberhasilan[$key] == 'decrease')
                                        Ada penurunan
                                    @else
                                        Tetap sama
                                    @endif
                                </p>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
