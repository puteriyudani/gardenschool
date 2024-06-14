@extends('layouts.auth')

@section('judul')
    <title>Guru - Create Breakfast Menu</title>
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
                            <h5 class="card-title fw-semibold mb-4">Create Breakfast Menu</h5>
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
                                    <form action="{{ route('menu.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf

                                        <div class="mb-3">
                                            <label for="menu" class="form-label">Menu</label>
                                            <input type="text" class="form-control" id="menu" name="menu">
                                        </div>
                                        <div class="mb-3">
                                            <label for="karbohidrat" class="form-label">Karbohidrat</label>
                                            <input type="number" class="form-control" id="karbohidrat" name="karbohidrat">
                                        </div>
                                        <div class="mb-3">
                                            <label for="protein" class="form-label">Protein</label>
                                            <input type="number" class="form-control" id="protein" name="protein">
                                        </div>
                                        <div class="mb-3">
                                            <label for="lemak" class="form-label">Lemak</label>
                                            <input type="number" class="form-control" id="lemak" name="lemak">
                                        </div>
                                        <div class="mb-3">
                                            <label for="serat" class="form-label">Serat</label>
                                            <input type="number" class="form-control" id="serat" name="serat">
                                        </div>
                                        <div class="mb-3">
                                            <label for="vitmineral" class="form-label">Vit/Mineral</label>
                                            <input type="number" class="form-control" id="vitmineral" name="vitmineral">
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
