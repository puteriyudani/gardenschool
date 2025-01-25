@extends('layouts.auth')

@section('judul')
    <title>Edit Kelas</title>
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
                            <h5 class="card-title fw-semibold mb-4">Forms</h5>
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('kelompok.update', $kelompok->id) }}" method="POST">

                                        @csrf
                                        @method('PUT')

                                        <div class="mb-3">
                                            <label for="kategori" class="form-label">Kategori</label>
                                            <select class="form-control" id="kategori" name="kategori">
                                                <option value="TK" {{ $kelompok->kategori == 'TK' ? 'selected' : '' }}>TK
                                                </option>
                                                <option value="KB" {{ $kelompok->kategori == 'KB' ? 'selected' : '' }}>KB
                                                </option>
                                                <option value="BC" {{ $kelompok->kategori == 'BC' ? 'selected' : '' }}>BC
                                                </option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="kelompok" class="form-label">Kelas</label>
                                            <input type="text" class="form-control" id="kelompok" name="kelompok"
                                                aria-describedby="kelompokHelp" value="{{ $kelompok->kelompok }}">
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
