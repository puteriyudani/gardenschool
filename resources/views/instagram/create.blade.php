@extends('layouts.auth')

@section('judul')
    <title>Tambah Instagram</title>
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
                                    <form action="{{ route('instagram.store') }}" method="POST">
                                        @csrf

                                        <!-- Dropdown for selecting SubTopik -->
                                        <div class="mb-3">
                                            <label for="subtopik_id" class="form-label">Pilih SubTopik</label>
                                            <select class="form-control" id="subtopik_id" name="subtopik_id"
                                                aria-describedby="subTopikHelp" required onchange="updateJudul()">
                                                <option value="" disabled selected>Pilih SubTopik</option>
                                                @foreach ($subtopiks as $subtopik)
                                                    <option value="{{ $subtopik->id }}"
                                                        data-judul="{{ $subtopik->subtopik }}">
                                                        {{ Str::limit($subtopik->subtopik, 20) }} -
                                                        {{ Str::limit($subtopik->topik->topik, 15) }} (Topik) -
                                                        {{ Str::limit($subtopik->topik->tema->tema, 15) }} (Tema) -
                                                        {{ Str::limit($subtopik->topik->tema->kelompok, 15) }}
                                                        (Kelompok)
                                                    </option>
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
                                                var selectedSubTopik = document.getElementById('subtopik_id');
                                                var judul = selectedSubTopik.options[selectedSubTopik.selectedIndex].getAttribute('data-judul');
                                                document.getElementById('judul').value = judul;
                                            }
                                        </script>

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
