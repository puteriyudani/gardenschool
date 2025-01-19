@extends('layouts.auth')

@section('judul')
    <title>Tambah Youtube</title>
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
                                    <form action="{{ route('youtube.store') }}" method="POST">
                                        @csrf

                                        <div class="mb-3">
                                            <label for="judul" class="form-label">Judul</label>
                                            <select class="form-control" id="judul" name="judul"
                                                aria-describedby="judulHelp">
                                                <option value="" disabled selected>Pilih Judul</option>
                                                @foreach ($pdfs as $pdf)
                                                    <option value="{{ $pdf->judul }}">{{ $pdf->judul }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="keterangan" class="form-label">Keterangan</label>
                                            <textarea class="form-control" placeholder="keterangan" id="keterangan" name="keterangan" style="height: 100px"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="link" class="form-label">Link</label>
                                            <textarea class="form-control" placeholder="link" id="link" name="link" style="height: 100px"></textarea>
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
