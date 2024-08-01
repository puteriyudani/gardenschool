@extends('layouts.auth')

@section('judul')
    <title>Guru - Edit Welcome Mood</title>
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
            z-index: 1100;
            /* Higher z-index value for the popup overlay */
        }

        .popup-content {
            background: rgba(255, 255, 255, 0);
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

        .modal {
            display: flex;
            justify-content: center;
            align-items: center;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-image: url('{{ asset('auth') }}/images/bg1.jpg');
            /* Replace with the correct path */
            background-size: cover;
            /* Cover the entire modal */
            background-position: center;
            /* Center the background image */
            width: 100%;
            height: 100%;
            max-width: none;
            margin: auto;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .modal-inner {
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            position: absolute;
            /* Make position absolute */
            top: 2%;
            /* Adjust as needed */
            right: 15%;
            /* Adjust as needed */
        }

        .modal-inner label {
            /* color: white; */
            font-size: 20px;
        }

        .modal-inner .keterangan label {
            /* color: white; */
            font-size: 30px;
        }

        .close {
            color: #aaa;
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .custom-select-container {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
            /* Adds some space between the images */
        }

        .custom-select-item {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .custom-select-container img {
            width: 170px !important;
            /* Adjust the width as needed */
            height: auto !important;
            /* Maintain the aspect ratio */
            cursor: pointer;
            transition: transform 0.2s ease-in-out;
            /* Adds a smooth transition effect */
        }

        .custom-select-container img:hover {
            transform: scale(1.1);
            /* Slightly enlarges the image on hover */
        }

        .custom-select-item p {
            margin-top: 2px;
            font-size: 20px
                /* color: white; */
        }

        .progress-bar {
            width: 60%;
            /* Set width to 80% */
            margin: 0 auto;
            /* Center the range input */
            display: block;
            /* Ensure it's centered as a block element */
        }

        .indikator {
            display: none;
            text-align: center;
        }

        /* Gaya untuk modal gambar */
        .image-modal {
            display: none;
            position: fixed;
            z-index: 9999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5);
            /* Latar belakang semi-transparan */
        }

        .image-modal-content {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            background: rgba(255, 255, 255, 0);
        }

        .image-modal-content img {
            max-width: 100%;
            height: auto;
        }

        @media (max-width: 640px) {
            .modal {
                display: flex;
                justify-content: center;
                align-items: center;
                position: fixed;
                z-index: 1000;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.4);
            }

            .modal-content {
                background-image: url('{{ asset('auth') }}/images/bg1.jpg');
                background-size: cover;
                background-position: center;
                width: 100%;
                height: 100%;
                max-width: none;
                margin: auto;
                display: flex;
                justify-content: center;
                align-items: center;
                position: relative;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }

            .modal-inner {
                padding: 20px;
                border-radius: 10px;
                text-align: center;
            }

            .close {
                color: #aaa;
                position: absolute;
                top: 10px;
                right: 10px;
                font-size: 28px;
                font-weight: bold;
            }

            .close:hover,
            .close:focus {
                color: black;
                text-decoration: none;
                cursor: pointer;
            }

            .custom-select-container {
                display: flex;
                justify-content: center;
                align-items: center;
                gap: 20px;
            }

            .custom-select-item {
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            .custom-select-container img {
                width: 50px !important;
                height: auto !important;
                cursor: pointer;
                transition: transform 0.2s ease-in-out;
            }

            .custom-select-container img:hover {
                transform: scale(1.1);
            }

            .custom-select-item p {
                margin-top: 2px;
            }

            .progress-bar {
                width: 80%;
                margin: 0 auto;
                display: block;
            }
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
                            <h5 class="card-title fw-semibold mb-4">Edit Welcome Mood</h5>
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
                                    <form action="{{ route('welcome.update', $welcome->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <div class="mb-3">
                                            <label for="tanggal" class="form-label">Tanggal</label>
                                            <input type="date" class="form-control" id="tanggal" name="tanggal"
                                                value="{{ $welcome->tanggal }}">
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

                                        <!-- Notification for rotating screen -->
                                        <div id="rotateNotification"
                                            style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); z-index: 1200; justify-content: center; align-items: center;">
                                            <div
                                                style="background-color: white; padding: 20px; border-radius: 10px; text-align: center;">
                                                <p>Please rotate your screen for the best experience.</p>
                                                <button id="closeNotification" style="margin-top: 10px;">Close</button>
                                            </div>
                                        </div>

                                        <!-- Button to open the modal -->
                                        <button type="button" class="btn btn-primary" id="openModalButton">Open
                                            Form</button>

                                        <!-- Audio element for modal open sound -->
                                        <audio id="modalOpenSound" src="{{ asset('auth') }}/sound/modal-open.mp3"></audio>

                                        <!-- The Modal -->
                                        <div class="modal" id="formModal">
                                            <div class="modal-content">
                                                <div class="modal-inner">
                                                    <!-- Form elements inside the modal -->
                                                    <div class="mb-2 keterangan">
                                                        <label for="keterangan" class="form-label">My Mood</label>
                                                        <select id="keterangan" name="keterangan"
                                                            class="form-select hidden-select">
                                                            <option value="{{ $welcome->keterangan }}" selected>
                                                                {{ $welcome->keterangan }}</option>
                                                            <option value="Happy">Happy</option>
                                                            <option value="Neutral">Bored</option>
                                                            <option value="Sad">Downed</option>
                                                        </select>
                                                        <div class="custom-select-container" id="customSelectContainer">
                                                            <div class="custom-select-item">
                                                                <img src="{{ asset('auth') }}/images/face/happy.png"
                                                                    alt="Happy" data-value="Happy">
                                                                <p>Happy</p>
                                                            </div>
                                                            <div class="custom-select-item">
                                                                <img src="{{ asset('auth') }}/images/face/neutral.png"
                                                                    alt="Neutral" data-value="Neutral">
                                                                <p>Bored</p>
                                                            </div>
                                                            <div class="custom-select-item">
                                                                <img src="{{ asset('auth') }}/images/face/sad.png"
                                                                    alt="Sad" data-value="Sad">
                                                                <p>Downed</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @error('keterangan')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror

                                                    <!-- Initially hidden submit button -->
                                                    <div id="submitContainer" style="display: none;">
                                                        <button type="button" class="btn btn-success"
                                                            id="closeModalButton">Submit</button>
                                                    </div>

                                                    <div class="indikator mb-3 mt-2">
                                                        <label for="indikator" class="form-label"
                                                            id="progressLabel">Indikator:
                                                            {{ $welcome->indikator }}%</label>
                                                        <div class="range-container">
                                                            <input type="range" class="progress-bar" id="progressBar"
                                                                name="indikator" value="{{ $welcome->indikator }}"
                                                                min="0" max="100">
                                                        </div>
                                                    </div>

                                                    @error('indikator')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Modal untuk gambar popup -->
                                        <div id="imageModal" class="image-modal" style="display: none;">
                                            <div class="image-modal-content">
                                                <img id="popupImage" src="{{ asset('auth') }}/gif/thankyou.gif"
                                                    alt="Response Image">
                                            </div>
                                        </div>

                                        <!-- Overlay for popup GIFs -->
                                        <div class="popup-overlay" id="popupOverlay" style="display: none;">
                                            <div class="popup-content">
                                                <img src="{{ asset('auth') }}/gif/happy.gif" alt="Happy GIF"
                                                    id="happyGif" class="popup-gif" style="display: none;">
                                                <img src="{{ asset('auth') }}/gif/sad.gif" alt="Sad GIF" id="sadGif"
                                                    class="popup-gif" style="display: none;">
                                                <button class="popup-close btn btn-danger" id="popupClose">Close</button>
                                            </div>
                                        </div>

                                        <div class="mb-3 mt-3">
                                            <label for="notifikasi" class="form-label">Notifikasi</label>
                                            <select class="form-select" name="notifikasi"
                                                onchange="if(this.options[this.selectedIndex].value=='customOption'){
                                                    toggleField(this,this.nextSibling);
                                                    this.selectedIndex='0';
                                                }">
                                                <option value="{{ $welcome->notifikasi }}" selected>- {{ $welcome->notifikasi }} -</option>
                                                <option value="Tidur Cukup">Tidur Cukup</option>
                                                <option value="Tidur Kurang">Tidur Kurang</option>
                                                <option value="customOption">[Lainnya]</option>
                                            </select><input class="form-control" name="notifikasi" style="display:none;"
                                                disabled="disabled"
                                                onblur="if(this.value==''){toggleField(this,this.previousSibling);}">
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
            const indikatorContainer = document.querySelector('.indikator');
            const submitContainer = document.getElementById('submitContainer');
            const rotateNotification = document.getElementById('rotateNotification');
            const closeNotification = document.getElementById('closeNotification');

            let audio; // Reference to the audio object

            const checkConditions = () => {
                happyGif.style.display = 'none';
                sadGif.style.display = 'none';

                if (progressBar.value === '100') {
                    if (hiddenSelect.value === 'Happy') {
                        happyGif.style.display = 'block';
                        popupOverlay.style.display = 'flex';
                        // Putar suara
                        audio = new Audio('{{ asset('auth') }}/sound/happy.mp3');
                        audio.play();
                    } else if (hiddenSelect.value === 'Sad') {
                        sadGif.style.display = 'block';
                        popupOverlay.style.display = 'flex';
                        // Putar suara
                        audio = new Audio('{{ asset('auth') }}/sound/sad.mp3');
                        audio.play();
                    } else {
                        popupOverlay.style.display = 'none';
                    }
                } else {
                    popupOverlay.style.display = 'none';
                }

                // Tampilkan tombol submit jika opsi keterangan dipilih
                if (hiddenSelect.value !== '') {
                    submitContainer.style.display = 'block';
                } else {
                    submitContainer.style.display = 'none';
                }
            };

            images.forEach(image => {
                image.addEventListener('click', function() {
                    hiddenSelect.value = this.getAttribute('data-value');
                    images.forEach(img => img.style.border = 'none');
                    this.style.border = '2px solid blue';
                    checkConditions();

                    // Tampilkan indikator setelah memilih keterangan
                    if (hiddenSelect.value !== '') {
                        indikatorContainer.style.display = 'block';
                    }
                });
            });

            progressBar.addEventListener('input', () => {
                progressLabel.textContent = `Indikator: ${progressBar.value}%`;
                checkConditions();
            });

            popupClose.addEventListener('click', (event) => {
                popupOverlay.style.display = 'none';
                event.preventDefault();
                if (audio) {
                    audio.pause();
                    audio.currentTime = 0; // Reset audio to the beginning
                }
            });

            // Initial trigger to set the indicator based on the default select value and progress bar value
            checkConditions();

            // Modal display handling
            document.getElementById('openModalButton').onclick = function() {
                if (window.innerWidth >= 640 && window.innerWidth <= 1024) {
                    rotateNotification.style.display = 'flex';
                } else {
                    document.getElementById('formModal').style.display = 'block';
                }
            };

            closeNotification.onclick = function() {
                rotateNotification.style.display = 'none';
            };

            document.getElementById('closeModalButton').addEventListener('click', function() {
                // Konfirmasi sebelum submit
                const isConfirmed = confirm("Apakah yakin dengan isianmu?");
                if (isConfirmed) {
                    // Tutup modal
                    document.getElementById('formModal').style.display = 'none';

                    // Putar suara
                    var audio = new Audio('{{ asset('auth') }}/sound/close.mp3');
                    audio.play();

                    // Tampilkan modal gambar
                    var imageModal = document.getElementById('imageModal');
                    imageModal.style.display = 'block';

                    // Sembunyikan modal gambar setelah 5 detik
                    setTimeout(function() {
                        imageModal.style.display = 'none';
                    }, 5000);
                }
            });
        });
    </script>
    <script>
        function toggleField(hideObj, showObj) {
            hideObj.disabled = true;
            hideObj.style.display = 'none';
            showObj.disabled = false;
            showObj.style.display = 'inline';
            showObj.focus();
        }
    </script>
@endsection
