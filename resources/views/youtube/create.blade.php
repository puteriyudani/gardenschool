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

                                        <!-- Dropdown for selecting PDF -->
                                        <div class="mb-3">
                                            <label for="pdf_id" class="form-label">Pilih PDF</label>
                                            <select class="form-control" id="pdf_id" name="pdf_id"
                                                aria-describedby="pdfHelp" required onchange="updateJudul()">
                                                <option value="" disabled selected>Pilih PDF</option>
                                                @foreach ($pdfs as $pdf)
                                                    <option value="{{ $pdf->id }}" data-judul="{{ $pdf->judul }}">
                                                        {{ $pdf->judul }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <!-- Input for Judul -->
                                        <div class="mb-3">
                                            <label for="judul" class="form-label">Judul</label>
                                            <input type="text" class="form-control" id="judul" name="judul"
                                                readonly>
                                        </div>

                                        <script>
                                            function updateJudul() {
                                                var selectedPdf = document.getElementById('pdf_id');
                                                var judul = selectedPdf.options[selectedPdf.selectedIndex].getAttribute('data-judul');
                                                document.getElementById('judul').value = judul;
                                            }
                                        </script>


                                        <!-- Keterangan -->
                                        <div class="mb-3">
                                            <label for="keterangan" class="form-label">Keterangan</label>
                                            <textarea class="form-control" placeholder="Masukkan keterangan" id="keterangan" name="keterangan" style="height: 100px"
                                                required></textarea>
                                        </div>

                                        <!-- Link -->
                                        <div class="mb-3">
                                            <label for="link" class="form-label">Link</label>
                                            <textarea class="form-control" placeholder="Masukkan link" id="link" name="link" style="height: 100px" required></textarea>
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
