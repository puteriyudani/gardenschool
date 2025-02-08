@extends('layouts.auth')

@section('judul')
    <title>Edit File Brosur</title>
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
                                    <form action="{{ route('filebrosur.update', $filebrosur->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Nama</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                aria-describedby="nameHelp" value="{{ $filebrosur->name }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="file" class="form-label">Pilih file baru (opsional):</label>
                                            <input type="file" id="file" name="file"
                                                class="form-control @error('file') is-invalid @enderror">
                                            @error('file')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <!-- Menampilkan file yang ada sebelumnya -->
                                        <div class="mb-3">
                                            <label for="currentFile" class="form-label">File saat ini:</label>
                                            <input type="text" id="currentFile" name="currentFile"
                                                value="{{ $filebrosur->file }}" readonly class="form-control-plaintext">
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
