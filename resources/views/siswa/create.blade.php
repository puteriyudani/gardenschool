@extends('layouts.auth')

@section('judul')
    <title>Tambah Siswa</title>
@endsection

@section('content')
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">

        @include('include.sidebar')

        <!--  Main wrapper -->
        <div class="body-wrapper">
            @include('include.header-admin')
            <div class="container-fluid">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title fw-semibold mb-4">Forms</h5>
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('siswa.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf

                                        <div class="mb-3">
                                            <label for="orangtua_id" class="form-label">Akun Orangtua</label>
                                            <select id="orangtua_id" name="orangtua_id" class="form-select"
                                                aria-label="Default select example">
                                                <option selected>- Pilih -</option>
                                                @foreach ($ortus as $ortu)
                                                    <option value="{{ $ortu->id }}">{{ $ortu->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="tahun_id" class="form-label">Tahun</label>
                                            <select id="tahun_id" name="tahun_id" class="form-select"
                                                aria-label="Default select example">
                                                <option selected>- Pilih -</option>
                                                @foreach ($tahuns as $tahun)
                                                    <option value="{{ $tahun->id }}">{{ $tahun->tahun }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="nama" class="form-label">Nama</label>
                                            <input type="text" class="form-control" id="nama" name="nama"
                                                aria-describedby="namaHelp">
                                        </div>
                                        <div class="mb-3">
                                            <label for="panggilan" class="form-label">Nama Panggilan</label>
                                            <input type="text" class="form-control" id="panggilan" name="panggilan"
                                                aria-describedby="panggilanHelp">
                                        </div>
                                        <div class="mb-3">
                                            <label for="noinduk" class="form-label">No Induk</label>
                                            <input type="text" class="form-control" id="noinduk" name="noinduk"
                                                aria-describedby="noindukHelp">
                                        </div>
                                        <div class="mb-3">
                                            <label for="kelompok" class="form-label">Kelompok</label>
                                            <select id="kelompok" name="kelompok" class="form-select"
                                                aria-label="Default select example">
                                                <option selected>- Pilih -</option>
                                                @foreach ($kelompok as $item)
                                                    <option value="{{ $item->id }}">{{ $item->kelompok }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                                                aria-describedby="tempat_lahirHelp">
                                        </div>
                                        <div class="mb-3">
                                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                            <input type="date" class="form-control" id="tanggal_lahir"
                                                name="tanggal_lahir" aria-describedby="tanggal_lahirHelp">
                                        </div>
                                        <div class="mb-3">
                                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                            <select id="jenis_kelamin" name="jenis_kelamin" class="form-select"
                                                aria-label="Default select example">
                                                <option selected>- Pilih -</option>
                                                <option value="lakilaki">Laki-laki</option>
                                                <option value="perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="agama" class="form-label">Agama</label>
                                            <input type="text" class="form-control" id="agama" name="agama"
                                                aria-describedby="agamaHelp">
                                        </div>
                                        <div class="mb-3">
                                            <label for="anakke" class="form-label">Anak ke</label>
                                            <input type="text" class="form-control" id="anakke" name="anakke"
                                                aria-describedby="anakkeHelp">
                                        </div>
                                        <div class="mb-3">
                                            <label for="nama_ayah" class="form-label">Nama Ayah</label>
                                            <input type="text" class="form-control" id="nama_ayah" name="nama_ayah"
                                                aria-describedby="nama_ayahHelp">
                                        </div>
                                        <div class="mb-3">
                                            <label for="nama_ibu" class="form-label">Nama Ibu</label>
                                            <input type="text" class="form-control" id="nama_ibu" name="nama_ibu"
                                                aria-describedby="nama_ibuHelp">
                                        </div>
                                        <div class="mb-3">
                                            <label for="alamat" class="form-label">Alamat</label>
                                            <input type="text" class="form-control" id="alamat" name="alamat"
                                                aria-describedby="alamatHelp">
                                        </div>
                                        <div class="row mb-3">
                                            <label for="image" class="col-sm-2 col-form-label">Gambar</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" name="image" id="image" type="file"
                                                    placeholder="image">
                                            </div>
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
@endsection
