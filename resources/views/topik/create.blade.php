@extends('layouts.auth')

@section('judul')
    <title>Tambah Topik</title>
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
                            <h5 class="card-title fw-semibold mb-4">Tambah Topik</h5>
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('topik.store') }}" method="POST">
                                        @csrf

                                        <div class="mb-3">
                                            <label for="tema_id" class="form-label">Tema</label>
                                            <select class="form-control" id="tema_id" name="tema_id">
                                                <option value="">-- Pilih Tema --</option>
                                                @foreach ($temas as $tema)
                                                    <option value="{{ $tema->id }}">{{ $tema->tema }}
                                                        ({{ $tema->kelompok }})</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="topik" class="form-label">Topik</label>
                                            <input type="text" class="form-control" id="topik" name="topik"
                                                aria-describedby="topikHelp">
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
