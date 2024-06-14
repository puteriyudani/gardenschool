@extends('layouts.auth')

@section('judul')
    <title>Guru - Create Re Calling</title>
    <style>
        .btn.btn-primary.disabled,
        .btn.btn-warning.disabled,
        .btn.btn-success.disabled,
        .btn.btn-danger.disabled {
            pointer-events: none;
            opacity: 1;
        }

        .progress-bar {
            width: 100%;
        }

        /* Pop-up styles */
        .popup-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        .popup-content {
            background: white;
            padding: 10px;
            border-radius: 10px;
            text-align: center;
        }

        .popup-content img {
            max-width: 100%;
            height: auto;
        }

        .popup-close {
            cursor: pointer;
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
                            <h5 class="card-title fw-semibold mb-4">Create Re Calling</h5>
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
                                    <form action="{{ route('recalling.store') }}" method="POST"
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
                                            <label for="keterangan" class="form-label">Keterangan</label>
                                            <select id="keterangan" name="keterangan" class="form-select hidden-select">
                                                <option value="Happy">Happy</option>
                                                <option value="Neutral">Neutral</option>
                                                <option value="Sad">Sad</option>
                                            </select>
                                            <div class="custom-select-container" id="customSelectContainer">
                                                <img src="{{ asset('auth') }}/images/face/happy.png" alt="Happy"
                                                    data-value="Happy">
                                                <img src="{{ asset('auth') }}/images/face/sad.png" alt="Sad"
                                                    data-value="Sad">
                                            </div>
                                        </div>
                                        @error('keterangan')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        <div class="mb-3">
                                            <label for="indikator" class="form-label" id="progressLabel">Indikator:
                                                0%</label>
                                            <input type="range" class="progress-bar" id="progressBar" name="indikator"
                                                value="0" min="0" max="100">
                                        </div>
                                        <div class="popup-overlay" id="popupOverlay" style="display: none;">
                                            <div class="popup-content">
                                                <img src="{{ asset('auth') }}/gif/happy.gif" alt="Happy GIF" id="happyGif"
                                                    class="popup-gif" style="display: none;">
                                                <img src="{{ asset('auth') }}/gif/sad.gif" alt="Sad GIF" id="sadGif"
                                                    class="popup-gif" style="display: none;">
                                                <button class="popup-close btn btn-danger" id="popupClose">Close</button>
                                            </div>
                                        </div>
                                        @error('indikator')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        <div class="mb-3">
                                            <label for="notifikasi" class="form-label">Notifikasi</label>
                                            <textarea class="form-control" id="notifikasi" name="notifikasi" rows="5"></textarea>
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const hiddenSelect = document.getElementById('keterangan');
            const customSelectContainer = document.getElementById('customSelectContainer');
            const images = customSelectContainer.querySelectorAll('img');
            const progressBar = document.getElementById('progressBar');
            const progressLabel = document.getElementById('progressLabel');
            const popupOverlay = document.getElementById('popupOverlay');
            const popupClose = document.getElementById('popupClose');
            const happyGif = document.getElementById('happyGif');
            const sadGif = document.getElementById('sadGif');

            const checkConditions = () => {
                happyGif.style.display = 'none';
                sadGif.style.display = 'none';

                if (progressBar.value === '100') {
                    if (hiddenSelect.value === 'Happy') {
                        happyGif.style.display = 'block';
                        popupOverlay.style.display = 'flex';
                    } else if (hiddenSelect.value === 'Sad') {
                        sadGif.style.display = 'block';
                        popupOverlay.style.display = 'flex';
                    } else {
                        popupOverlay.style.display = 'none';
                    }
                } else {
                    popupOverlay.style.display = 'none';
                }
            };

            images.forEach(image => {
                image.addEventListener('click', function() {
                    hiddenSelect.value = this.getAttribute('data-value');
                    images.forEach(img => img.style.border = 'none');
                    this.style.border = '2px solid blue';
                    checkConditions();
                });
            });

            progressBar.addEventListener('input', () => {
                progressLabel.textContent = `Progress: ${progressBar.value}%`;
                checkConditions();
            });

            popupClose.addEventListener('click', (event) => {
                popupOverlay.style.display = 'none';
                event.preventDefault();
            });

            // Initial trigger to set the indicator based on the default select value and progress bar value
            checkConditions();
        });
    </script>
@endsection
