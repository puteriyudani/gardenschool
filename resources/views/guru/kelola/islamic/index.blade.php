@extends('layouts.auth')

@section('judul')
    <title>Guru - Islamic</title>
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
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title fw-semibold mb-4">Islamic Base Learning</h5>
                            <a href="{{ route('hadist.index') }}"><button type="button" class="btn btn-warning m-1">Hadist</button></a>
                            <a href="{{ route('quran.index') }}"><button type="button" class="btn btn-success m-1">Al-Qur'an</button></a>
                            <a href="{{ route('doa.index') }}"><button type="button" class="btn btn-primary m-1">Doa</button></a>
                        </div>

                        <div class="card-body">
                            <h5 class="card-title fw-semibold mb-4">Islamic Base Learning Baby Camp</h5>
                            <a href="{{ route('hadistbaby.index') }}"><button type="button" class="btn btn-warning m-1">Hadist</button></a>
                            <a href="{{ route('quranbaby.index') }}"><button type="button" class="btn btn-success m-1">Al-Qur'an</button></a>
                            <a href="{{ route('doababy.index') }}"><button type="button" class="btn btn-primary m-1">Doa</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
