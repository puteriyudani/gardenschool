@extends('layouts.auth')

@section('judul')
    <title>Guru - Edit Morning Booster</title>
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
                            <h5 class="card-title fw-semibold mb-4">Edit Morning Booster</h5>
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
                                    <form action="{{ route('morning.update', $morning->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <div class="mb-3">
                                            <label for="tanggal" class="form-label">Tanggal</label>
                                            <input type="date" class="form-control" id="tanggal" name="tanggal"
                                                value="{{ $morning->tanggal }}">
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
                                            <label for="kegiatan" class="form-label">Kegiatan</label>
                                            <br>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="kegiatan"
                                                    id="senampagi" value="Senam Pagi"
                                                    {{ $morning->kegiatan == 'Senam Pagi' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="senampagi">Senam Pagi</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="kegiatan"
                                                    id="apelbendera" value="Apel Bendera"
                                                    {{ $morning->kegiatan == 'Apel Bendera' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="apelbendera">Apel Bendera</label>
                                            </div>
                                        </div>
                                        @error('kegiatan')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        <div class="mb-3">
                                            <label for="circletime" class="form-label">Circle Time</label>
                                            <br>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="circletime[]"
                                                    id="icebreaking" value="Ice Breaking"
                                                    {{ in_array('Ice Breaking', explode(', ', $morning->circletime)) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="icebreaking">Ice Breaking</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="circletime[]"
                                                    id="berdiskusi" value="Berdiskusi/Cerita"
                                                    {{ in_array('Berdiskusi/Cerita', explode(', ', $morning->circletime)) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="berdiskusi">Berdiskusi/Cerita</label>
                                            </div>
                                        </div>
                                        @error('circletime')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        <div class="mb-3 mt-3">
                                            <label for="notifikasi" class="form-label">Notifikasi</label>
                                            <select class="form-select" name="notifikasi"
                                                onchange="if(this.options[this.selectedIndex].value=='customOption'){
                                                    toggleField(this,this.nextSibling);
                                                    this.selectedIndex='0';
                                                }">
                                                <option value="{{ $morning->notifikasi }}" selected>-
                                                    {{ $morning->notifikasi }} -</option>
                                                    <option value="Ananda mengikuti kegiatan pagi dengan penuh semangat dan gembira">Ananda mengikuti kegiatan pagi dengan penuh semangat dan gembira</option>
                                                    <option value="Ananda telat datang ke sekolah">Ananda telat datang ke sekolah</option>
                                                    <option value="Ananda tidak ingin berdiri lama">Ananda tidak ingin berdiri lama</option>
                                                    <option value="Ananda tidak menyukai kebisingan">Ananda tidak menyukai kebisingan</option>
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
