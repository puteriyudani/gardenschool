@extends('layouts.auth')

@section('judul')
    <title>Guru - Edit Islamic Base Learning</title>
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
                            <h5 class="card-title fw-semibold mb-4">Edit Islamic Base Learning</h5>
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
                                    <form action="{{ route('islamic.update', $islamic->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <div class="mb-3">
                                            <label for="tanggal" class="form-label">Tanggal</label>
                                            <input type="date" class="form-control" id="tanggal" name="tanggal"
                                                value="{{ $islamic->tanggal }}">
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
                                            <label for="hadist" class="form-label">Hafalan Hadist</label>
                                            <br>
                                            @foreach ($hadists as $hadist)
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" name="hadist[]"
                                                        id="{{ $hadist->id }}" value="{{ $hadist->id }}"
                                                        {{ in_array($hadist->id, json_decode($islamic->hadist)) ? 'checked' : '' }}>
                                                    <label class="form-check-label"
                                                        for="{{ $hadist->id }}">{{ $hadist->hadist }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                        @error('hadist')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        <div class="mb-3">
                                            <label for="hadist_stat" class="form-label">Status Hadist</label>
                                            <br>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="hadist_stat"
                                                    id="progress" value="Progress"
                                                    {{ $islamic->hadist_stat == 'Progress' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="progress">Progress</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="hadist_stat"
                                                    id="tuntas" value="Tuntas"
                                                    {{ $islamic->hadist_stat == 'Tuntas' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="tuntas">Tuntas</label>
                                            </div>
                                        </div>
                                        @error('hadist_stat')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        <div class="mb-3">
                                            <label for="quran" class="form-label">Hafalan Al-Qur'an</label>
                                            <br>
                                            @foreach ($qurans as $quran)
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" name="quran[]"
                                                        id="{{ $quran->id }}" value="{{ $quran->id }}"
                                                        {{ in_array($quran->id, json_decode($islamic->quran)) ? 'checked' : '' }}>
                                                    <label class="form-check-label"
                                                        for="{{ $quran->id }}">{{ $quran->quran }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                        @error('quran')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        <div class="mb-3">
                                            <label for="quran_stat" class="form-label">Status Al-Qur'an</label>
                                            <br>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="quran_stat"
                                                    id="progress" value="Progress"
                                                    {{ $islamic->quran_stat == 'Progress' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="progress">Progress</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="quran_stat"
                                                    id="tuntas" value="Tuntas"
                                                    {{ $islamic->quran_stat == 'Tuntas' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="tuntas">Tuntas</label>
                                            </div>
                                        </div>
                                        @error('quran_stat')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        <div class="mb-3">
                                            <label for="doa" class="form-label">Hafalan Doa</label>
                                            <br>
                                            @foreach ($doas as $doa)
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" name="doa[]"
                                                        id="{{ $doa->id }}" value="{{ $doa->id }}"
                                                        {{ in_array($doa->id, json_decode($islamic->doa)) ? 'checked' : '' }}>
                                                    <label class="form-check-label"
                                                        for="{{ $doa->id }}">{{ $doa->doa }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                        @error('doa')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        <div class="mb-3">
                                            <label for="doa_stat" class="form-label">Status Doa</label>
                                            <br>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="doa_stat"
                                                    id="progress" value="Progress"
                                                    {{ $islamic->doa_stat == 'Progress' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="progress">Progress</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="doa_stat"
                                                    id="tuntas" value="Tuntas"
                                                    {{ $islamic->doa_stat == 'Tuntas' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="tuntas">Tuntas</label>
                                            </div>
                                        </div>
                                        @error('doa_stat')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        <div class="mb-3">
                                            <label for="notifikasi" class="form-label">Notifikasi</label>
                                            <textarea class="form-control" id="notifikasi" name="notifikasi" rows="5">{{ $islamic->notifikasi }}</textarea>
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
