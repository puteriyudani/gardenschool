@extends('layouts.auth')

@section('judul')
    <title>Tambah Tema</title>
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
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title fw-semibold mb-4">Tambah Tema</h5>
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('tema.store') }}" method="POST">
                                        @csrf

                                        <div class="mb-3">
                                            <label for="kelompok" class="form-label">Kelompok</label>
                                            <select class="form-control" id="kelompok" name="kelompok">
                                                <option value="TK">TK</option>
                                                <option value="KB">KB</option>
                                                <option value="BC">BC</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="tema" class="form-label">Tema</label>
                                            <input type="text" class="form-control" id="tema" name="tema"
                                                aria-describedby="temaHelp">
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
