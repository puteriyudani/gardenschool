@extends('layouts.auth')

@section('judul')
    <title>Guru - Create Vocabulary</title>
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
                            <h5 class="card-title fw-semibold mb-4">Create Vocabulary</h5>
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
                                    <form action="{{ route('vocabulary.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <div class="mb-3">
                                            <label for="tanggal" class="form-label">Tanggal</label>
                                            <input type="date" class="form-control" id="tanggal" name="tanggal">
                                        </div>
                                        @error('tanggal')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        <fieldset disabled>
                                            <div class="mb-3">
                                                <label for="siswa_id_display" class="form-label">Nama Siswa</label>
                                                <select id="siswa_id_display" name="siswa_id_display" class="form-select">
                                                    <option value="{{ $siswa->id }}" selected>{{ $siswa->nama }}
                                                    </option>
                                                </select>
                                            </div>
                                        </fieldset>

                                        <input type="hidden" name="siswa_id" value="{{ $siswa->id }}">

                                        @error('siswa_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        <div class="mb-3">
                                            <label for="vocabulary" class="form-label">Vocabulary</label>
                                            <input type="text" class="form-control" id="vocabulary" name="vocabulary">
                                        </div>
                                        @error('vocabulary')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        <div class="mb-3">
                                            <label for="sentence" class="form-label">Sentence</label>
                                            <input type="text" class="form-control" id="sentence" name="sentence">
                                        </div>
                                        @error('sentence')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        <div class="mb-3">
                                            <label for="tale" class="form-label">Tale</label>
                                            <input type="text" class="form-control" id="tale" name="tale">
                                        </div>
                                        @error('tale')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        <div class="mb-3">
                                            <label for="song" class="form-label">Song</label>
                                            <input type="text" class="form-control" id="song" name="song">
                                        </div>
                                        @error('song')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
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
    <script>
        // JavaScript to set the date input value to today's date if it's not manually changed
        document.addEventListener('DOMContentLoaded', (event) => {
            const dateInput = document.getElementById('tanggal');
            if (!dateInput.value) {
                const today = new Date().toISOString().substr(0, 10);
                dateInput.value = today;
            }
        });
    </script>
@endsection
