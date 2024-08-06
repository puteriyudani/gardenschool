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
                                    <form action="{{ route('islamic.store') }}" method="POST"
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
                                            <label for="hadist" class="form-label">Hafalan Hadist</label>
                                            <br>
                                            @foreach ($hadists as $hadist)
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" name="hadist[]"
                                                        id="{{ $hadist->id }}" value="{{ $hadist->id }}">
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
                                                    id="progress" value="Progress">
                                                <label class="form-check-label" for="progress">Progress</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="hadist_stat"
                                                    id="tuntas" value="Tuntas">
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
                                                        id="{{ $quran->id }}" value="{{ $quran->id }}">
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
                                                    id="progress" value="Progress">
                                                <label class="form-check-label" for="progress">Progress</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="quran_stat"
                                                    id="tuntas" value="Tuntas">
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
                                                        id="{{ $doa->id }}" value="{{ $doa->id }}">
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
                                                    id="progress" value="Progress">
                                                <label class="form-check-label" for="progress">Progress</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="doa_stat"
                                                    id="tuntas" value="Tuntas">
                                                <label class="form-check-label" for="tuntas">Tuntas</label>
                                            </div>
                                        </div>
                                        @error('doa_stat')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        <div class="mb-3 mt-3">
                                            <label for="notifikasi" class="form-label">Notifikasi</label>
                                            <select class="form-select" name="notifikasi"
                                                onchange="if(this.options[this.selectedIndex].value=='customOption'){
                                                    toggleField(this,this.nextSibling);
                                                    this.selectedIndex='0';
                                                }">
                                                <option selected>- Notifikasi -</option>
                                                @if ($siswa->kelompok === 'kindergarten' || $siswa->kelompok === 'playgroup')
                                                    <option
                                                        value="Ananda semangat menghafal surah pendek dan hadist, diharapkan ayah bunda memotivasi ananda untuk mengulang kembali hafalan dirumah.">
                                                        Ananda semangat menghafal surah pendek dan hadist, diharapkan ayah
                                                        bunda memotivasi ananda untuk mengulang kembali hafalan dirumah.
                                                    </option>
                                                    <option
                                                        value="Ananda kurang tidur, sebaiknya ayah bunda mengajak ananda tidur lebih awal.">
                                                        Ananda kurang tidur, sebaiknya ayah bunda mengajak ananda tidur
                                                        lebih awal.</option>
                                                @elseif ($siswa->kelompok === 'babycamp')
                                                    <option
                                                        value="Ananda sangat antusias mendengarkan bacaan hadist, surah pendek, dan doa.">
                                                        Ananda sangat antusias mendengarkan bacaan hadist, surah pendek, dan
                                                        doa.</option>
                                                    <option
                                                        value="Ananda mulai mengikuti ucapan dari bacaan hadist, surah pendek, dan doa.">
                                                        Ananda mulai mengikuti ucapan dari bacaan hadist, surah pendek, dan
                                                        doa.
                                                    </option>
                                                @endif
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
        function toggleField(hideObj, showObj) {
            hideObj.disabled = true;
            hideObj.style.display = 'none';
            showObj.disabled = false;
            showObj.style.display = 'inline';
            showObj.focus();
        }
    </script>
@endsection
