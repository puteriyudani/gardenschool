@extends('layouts.auth')

@section('judul')
    <title>Siswa</title>
@endsection

@section('content')
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">

        @include('include.sidebar')

        <!--  Main wrapper -->
        <div class="body-wrapper">
            @include('include.header-admin')
            <div class="container-fluid">
                @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                @endif

                <div class="data-siswa">
                    <h5>Data Siswa <span><a href="{{ route('siswa.create') }}"><i class="mx-1 ti ti-plus" style="color: #28a745"></i></a></span></h5>
                </div>

                <div class="mt-3">
                    <a href="{{ route('showKindergarten') }}" class="btn btn-primary px-4 me-3">
                        <p>Kindergarten</p>
                        <h2>{{ $kindergartens }}</h2>
                        <p>Total data Siswa Kindergarten</p>
                    </a>
                    <a href="{{ route('showPlaygroup') }}" class="btn btn-warning px-4 me-3">
                        <p>Play Group</p>
                        <h2>{{ $playgroups }}</h2>
                        <p>Total data Siswa Play Group</p>
                    </a>
                    <a href="{{ route('showBabycamp') }}" class="btn btn-danger px-4 me-3">
                        <p>Baby Camp</p>
                        <h2>{{ $babycamps }}</h2>
                        <p>Total data Siswa Baby Camp</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
