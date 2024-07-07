@extends('layouts.auth')

@section('judul')
    <title>Guru - Edit Fun Activities</title>
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
                            <h5 class="card-title fw-semibold mb-4">Edit Fun Activities</h5>
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
                                    <form action="{{ route('fun.update', $fun->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <div class="mb-3">
                                            <label for="tanggal" class="form-label">Tanggal</label>
                                            <input type="date" class="form-control" id="tanggal" name="tanggal"
                                                value="{{ $fun->tanggal }}">
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
                                            <label for="tidur" class="form-label">Tidur Siang</label>
                                            <br>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="tidur" id="ya"
                                                    value="Ya" {{ $fun->tidur == 'Ya' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="ya">Ya</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="tidur" id="tidak"
                                                    value="Tidak" {{ $fun->tidur == 'Tidak' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="tidak">Tidak</label>
                                            </div>
                                        </div>
                                        @error('tidur')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="mb-3">
                                            <label for="poop" class="form-label">Poop</label>
                                            <br>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="poop" id="ya"
                                                    value="Ya" {{ $fun->poop == 'Ya' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="ya">Ya</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="poop" id="tidak"
                                                    value="Tidak" {{ $fun->poop == 'Tidak' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="tidak">Tidak</label>
                                            </div>
                                        </div>
                                        @error('poop')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="mb-3">
                                            <label for="pee" class="form-label">Pee</label>
                                            <br>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="pee" id="ya"
                                                    value="Ya" {{ $fun->pee == 'Ya' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="ya">Ya</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="pee" id="tidak"
                                                    value="Tidak" {{ $fun->pee == 'Tidak' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="tidak">Tidak</label>
                                            </div>
                                        </div>
                                        @error('pee')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="mb-3">
                                            <label for="mandi" class="form-label">Mandi Sore</label>
                                            <br>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="mandi" id="ya"
                                                    value="Ya" {{ $fun->mandi == 'Ya' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="ya">Ya</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="mandi" id="tidak"
                                                    value="Tidak" {{ $fun->mandi == 'Tidak' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="tidak">Tidak</label>
                                            </div>
                                        </div>
                                        @error('mandi')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        <div class="mb-3 mt-3">
                                            <label for="notifikasi" class="form-label">Notifikasi</label>
                                            <select id="notifikasi" name="notifikasi" class="form-select">
                                                <option value="{{ $fun->notifikasi }}" selected>{{ $fun->notifikasi }}</option>
                                                <option value="Tidur Cukup">Tidur Cukup</option>
                                                <option value="Tidur Kurang">Tidur Kurang</option>
                                                <option value="Lainnya">Lainnya</option>
                                            </select>
                                        </div>
                                        @error('notifikasi')
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
