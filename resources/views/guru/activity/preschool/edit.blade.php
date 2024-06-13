@extends('layouts.auth')

@section('judul')
    <title>Guru - Edit Pre School</title>
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
                            <h5 class="card-title fw-semibold mb-4">Edit Pre School</h5>
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('preschool.update', $preschool->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <div class="mb-3">
                                            <label for="tanggal" class="form-label">Tanggal</label>
                                            <input type="date" class="form-control" id="tanggal" name="tanggal"
                                                value="{{ $preschool->tanggal }}">
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
                                            <label for="huruf" class="form-label">Huruf & Membaca</label>
                                            <textarea class="form-control" id="huruf" name="huruf" rows="5">{{ $preschool->huruf }}</textarea>
                                        </div>
                                        @error('huruf')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="mb-3">
                                            <label for="angka" class="form-label">Angka & Berhitung</label>
                                            <textarea class="form-control" id="angka" name="angka" rows="5">{{ $preschool->angka }}</textarea>
                                        </div>
                                        @error('angka')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="mb-3">
                                            <label for="english" class="form-label">Pre Basic English</label>
                                            <textarea class="form-control" id="english" name="english" rows="5">{{ $preschool->english }}</textarea>
                                        </div>
                                        @error('english')
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
