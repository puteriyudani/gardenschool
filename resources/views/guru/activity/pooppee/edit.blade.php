@extends('layouts.auth')

@section('judul')
    <title>Guru - Edit Poop & Pee</title>
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
                            <h5 class="card-title fw-semibold mb-4">Edit Poop & Pee</h5>
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
                                    <form action="{{ route('pooppee.update', $pooppee->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <div class="mb-3">
                                            <label for="tanggal" class="form-label">Tanggal</label>
                                            <input type="date" class="form-control" id="tanggal" name="tanggal"
                                                value="{{ $pooppee->tanggal }}">
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
                                            <label for="poop" class="form-label">Poop</label>
                                            <br>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="poop" id="ya"
                                                    value="Ya" {{ $pooppee->poop == 'Ya' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="ya">Ya</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="poop" id="tidak"
                                                    value="Tidak" {{ $pooppee->poop == 'Tidak' ? 'checked' : '' }}>
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
                                                    value="Ya" {{ $pooppee->pee == 'Ya' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="ya">Ya</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="pee" id="tidak"
                                                    value="Tidak" {{ $pooppee->pee == 'Tidak' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="tidak">Tidak</label>
                                            </div>
                                        </div>
                                        @error('pee')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        <div class="mb-3 mt-3">
                                            <label for="catatan" class="form-label">Catatan</label>
                                            <select class="form-select" name="catatan"
                                                onchange="if(this.options[this.selectedIndex].value=='customOption'){
                                                    toggleField(this,this.nextSibling);
                                                    this.selectedIndex='0';
                                                }">
                                                <option value="{{ $pooppee->catatan }}" selected>-
                                                    {{ $pooppee->catatan }} -</option>
                                                <option value="Tidur Cukup">Tidur Cukup</option>
                                                <option value="Tidur Kurang">Tidur Kurang</option>
                                                <option value="customOption">[Lainnya]</option>
                                            </select><input class="form-control" name="catatan" style="display:none;"
                                                disabled="disabled"
                                                onblur="if(this.value==''){toggleField(this,this.previousSibling);}">
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
        function toggleField(hideObj, showObj) {
            hideObj.disabled = true;
            hideObj.style.display = 'none';
            showObj.disabled = false;
            showObj.style.display = 'inline';
            showObj.focus();
        }
    </script>
@endsection
