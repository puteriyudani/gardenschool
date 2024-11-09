@extends('layouts.auth')

@section('judul')
    <title>Guru - Breakfast</title>
    <style>
        .btn.btn-primary.disabled,
        .btn.btn-warning.disabled,
        .btn.btn-success.disabled,
        .btn.btn-danger.disabled {
            pointer-events: none;
            opacity: 1;
        }

        .nama {
            margin-top: -20px;
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
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title fw-semibold mb-4">Playgroup - Breakfast</h5>

                            <div class="row text-center">
                                @foreach ($siswas as $siswa)
                                    <div class="col-6 col-sm-4 col-md-3 col-lg-2 text-center mb-3">
                                        <div class="card d-inline-block rounded-circle"
                                            style="width: 130px; height: 130px; border-radius: 50%; overflow: hidden;">
                                            <a target="_blank" href="{{ route('tpbreakfast.index', $siswa->id) }}">
                                                <img src="{{ asset('storage/images/' . $siswa->image) }}"
                                                    class="img-fluid rounded-circle" alt="..."
                                                    style="width: 100%; height: 100%; object-fit: cover;">
                                            </a>
                                        </div>
                                        <div class="nama">
                                            <a target="_blank" href="{{ route('tpbreakfast.index', $siswa->id) }}"
                                                class="btn"
                                                style="background-color: #6FAC45; color: white">{{ $siswa->nama }}</a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
