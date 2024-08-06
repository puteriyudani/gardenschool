@extends('layouts.auth')

@section('judul')
    <title>Guru - Edit Breakfast Menu</title>
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
                            <h5 class="card-title fw-semibold mb-4">Edit Breakfast Menu</h5>
                            @if (Session::has('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('success') }}
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

                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('menu.update', $menu->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <div class="mb-3">
                                            <label for="menu" class="form-label">Menu</label>
                                            <input type="text" class="form-control" id="menu" name="menu"
                                                value="{{ $menu->menu }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="karbohidrat" class="form-label">Karbohidrat</label>
                                            <input type="number" class="form-control" id="karbohidrat" name="karbohidrat"
                                                value="{{ $menu->karbohidrat }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="protein" class="form-label">Protein</label>
                                            <input type="number" class="form-control" id="protein" name="protein"
                                                value="{{ $menu->protein }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="lemak" class="form-label">Lemak</label>
                                            <input type="number" class="form-control" id="lemak" name="lemak"
                                                value="{{ $menu->lemak }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="serat" class="form-label">Serat</label>
                                            <input type="number" class="form-control" id="serat" name="serat"
                                                value="{{ $menu->serat }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="kalori" class="form-label">Kalori</label>
                                            <input type="number" class="form-control" id="kalori" name="kalori"
                                                value="{{ $menu->kalori }}">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
