@extends('layouts.auth')

@section('judul')
    <title>Guru - Create Islamic Base Learning</title>
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
                            <h5 class="card-title fw-semibold mb-4">Create Islamic Base Learning</h5>
                            <div class="card">
                                <div class="card-body">
                                    <form>
                                        <div class="mb-3">
                                            <label for="tanggal" class="form-label">Tanggal</label>
                                            <input type="date" class="form-control" id="tanggal" name="tanggal">
                                        </div>
                                        <fieldset disabled>
                                            <div class="mb-3">
                                                <label for="siswa_id" class="form-label">Nama Siswa</label>
                                                <select id="siswa_id" name="siswa_id" class="form-select">
                                                    <option value="{{ $siswa->id }}">{{ $siswa->nama }}</option>
                                                </select>
                                            </div>
                                        </fieldset>
                                        <div class="mb-3">
                                            <label for="hadist" class="form-label">Hafalan Hadist</label>
                                            <br>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="hadist" id="hadist1"
                                                    value="Hadist 1">
                                                <label class="form-check-label" for="hadist1">Hadist 1</label>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="hadist_stat" class="form-label">Status Hadist</label>
                                            <br>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="hadist_stat"
                                                    id="progress">
                                                <label class="form-check-label" for="progress">Progress</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="hadist_stat"
                                                    id="tuntas">
                                                <label class="form-check-label" for="tuntas">Tuntas</label>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="quran" class="form-label">Hafalan Al-Qur'an</label>
                                            <br>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="quran" id="quran1"
                                                    value="Al-Qur'an 1">
                                                <label class="form-check-label" for="quran1">Al-Qur'an 1</label>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="quran_stat" class="form-label">Status Al-Qur'an</label>
                                            <br>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="quran_stat"
                                                    id="progress">
                                                <label class="form-check-label" for="progress">Progress</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="quran_stat"
                                                    id="tuntas">
                                                <label class="form-check-label" for="tuntas">Tuntas</label>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="doa" class="form-label">Hafalan Doa</label>
                                            <br>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="doa" id="doa1"
                                                    value="Doa 1">
                                                <label class="form-check-label" for="doa1">Doa 1</label>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="doa_stat" class="form-label">Status Doa</label>
                                            <br>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="doa_stat"
                                                    id="progress">
                                                <label class="form-check-label" for="progress">Progress</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="doa_stat"
                                                    id="tuntas">
                                                <label class="form-check-label" for="tuntas">Tuntas</label>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="notifikasi" class="form-label">Notifikasi</label>
                                            <textarea class="form-control" id="notifikasi" name="notifikasi" rows="5"></textarea>
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
