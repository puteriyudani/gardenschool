@extends('layouts.auth')

@section('judul')
    <title>Guru - Edit Breakfast</title>
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
                            <h5 class="card-title fw-semibold mb-4">Edit Breakfast</h5>
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
                                    <form action="{{ route('breakfast.update', $breakfast->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <div class="mb-3">
                                            <label for="tanggal" class="form-label">Tanggal</label>
                                            <input type="date" class="form-control" id="tanggal" name="tanggal"
                                                value="{{ $breakfast->tanggal }}">
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

                                        <div class="mb-3 mt-3">
                                            <label for="menu" class="form-label">Menu</label>
                                            <select id="menu" name="menu" class="form-select">
                                                <option value="{{ $breakfast->menu_id }}" selected>
                                                    {{ $breakfast->menu->menu }}</option>
                                                @foreach ($menus as $menu)
                                                    <option value="{{ $menu->id }}">{{ $menu->menu }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="menu_id" class="form-label">Menu</label>
                                            <br>
                                            @foreach ($menus as $menu)
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="menu_id"
                                                        id="{{ $menu->id }}" value="{{ $menu->id }}"
                                                        {{ $menu->id == $breakfast->menu_id ? 'checked' : '' }}>
                                                    <label class="form-check-label"
                                                        for="{{ $menu->id }}">{{ $menu->menu }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                        @error('menu')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        <div class="mb-3">
                                            <label for="keterangan" class="form-label">Keterangan</label>
                                            <br>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="keterangan"
                                                    id="habis" value="Habis"
                                                    {{ $breakfast->keterangan == 'Habis' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="habis">Habis</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="keterangan"
                                                    id="bersisa" value="Bersisa"
                                                    {{ $breakfast->keterangan == 'Bersisa' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="bersisa">Bersisa</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="keterangan"
                                                    id="tidakmakan" value="Tidak Makan"
                                                    {{ $breakfast->keterangan == 'Tidak Makan' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="tidakmakan">Tidak Makan</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="keterangan"
                                                    id="tambah" value="Tambah"
                                                    {{ $breakfast->keterangan == 'Tambah' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="tambah">Tambah</label>
                                            </div>
                                        </div>
                                        @error('keterangan')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        <div class="mb-3">
                                            <label for="indikator" class="form-label">Indikator</label>
                                            <input type="text" class="form-control" id="indikator" name="indikator"
                                                value="{{ $breakfast->indikator }}">
                                        </div>
                                        @error('indikator')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        <div class="mb-3 mt-3">
                                            <label for="catatan" class="form-label">Catatan</label>
                                            <select id="catatan" name="catatan" class="form-select">
                                                <option value="{{ $breakfast->catatan }}" selected>
                                                    {{ $breakfast->catatan }}</option>
                                                <option value="Tidur Cukup">Tidur Cukup</option>
                                                <option value="Tidur Kurang">Tidur Kurang</option>
                                                <option value="Lainnya">Lainnya</option>
                                            </select>
                                        </div>
                                        @error('catatan')
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const indikatorInput = document.getElementById('indikator');
            const radioButtons = document.querySelectorAll('input[name="keterangan"]');

            radioButtons.forEach(radio => {
                radio.addEventListener('change', function() {
                    if (this.value === 'Habis') {
                        indikatorInput.value = 100;
                    } else if (this.value === 'Tambah') {
                        indikatorInput.value = '100+';
                    } else {
                        indikatorInput.value = ''; // Reset for other values
                    }
                });
            });
        });
    </script>
@endsection
