@extends('layouts.auth')

@section('judul')
    <title>Tambah PDF</title>
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
                                    <form action="{{ route('pdf.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf

                                        <div class="mb-3">
                                            <label for="judul" class="form-label">Judul</label>
                                            <input type="text" class="form-control" id="judul" name="judul"
                                                aria-describedby="judulHelp">
                                        </div>
                                        <div class="mb-3">
                                            <label for="keterangan" class="form-label">Keterangan</label>
                                            <textarea class="form-control" placeholder="keterangan" id="keterangan" name="keterangan" style="height: 100px"></textarea>
                                        </div>
                                        <!-- Pilihan Subtopik -->
                                        <div class="mb-3">
                                            <label for="subtopik_id" class="form-label">Pilih Subtopik</label>
                                            <select class="form-control" id="subtopik_id" name="subtopik_id">
                                                <option value="">Pilih Subtopik</option>
                                                @foreach ($subtopiks as $subtopik)
                                                    <option value="{{ $subtopik->id }}">
                                                        {{ $subtopik->subtopik }} -
                                                        {{ $subtopik->topik->topik }} (Topik) -
                                                        {{ $subtopik->topik->tema->tema }} (Tema) -
                                                        {{ $subtopik->topik->tema->kelompok }} (Kelompok)
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="file" class="form-label">Pilih file:</label>
                                            <input type="file" id="file" name="file"
                                                class="form-control @error('file') is-invalid @enderror">
                                            @error('file')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
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
