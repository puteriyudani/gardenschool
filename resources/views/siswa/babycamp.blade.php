@extends('layouts.auth')

@section('judul')
    <title>Siswa - Baby Camp</title>
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
                @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                @endif

                <h5>Baby Camp</h5>

                <form action="{{ route('showBabycamp') }}" method="GET" class="mb-4">
                    <div class="row">
                        <div class="col-md-4">
                            <select name="tahun" class="form-select" onchange="this.form.submit()">
                                <option value="">Pilih Tahun</option>
                                @foreach ($tahuns as $tahun)
                                    <option value="{{ $tahun->id }}"
                                        {{ request('tahun') == $tahun->id ? 'selected' : '' }}>
                                        {{ $tahun->tahun }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </form>

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Foto</th>
                                <th scope="col">Tahun Angkatan</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Nama Panggilan</th>
                                <th scope="col">No Induk</th>
                                <th scope="col">Kelompok</th>
                                <th scope="col">Tempat Lahir</th>
                                <th scope="col">Tanggal Lahir</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Agama</th>
                                <th scope="col">Anak Ke</th>
                                <th scope="col">Nama Ayah</th>
                                <th scope="col">Nama Ibu</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">No Hp</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($siswas as $siswa)
                                <tr>
                                    <!-- Menambahkan offset berdasarkan halaman -->
                                    <td>{{ $loop->iteration + ($siswas->currentPage() - 1) * $siswas->perPage() }}</td>
                                    <td><img src="{{ asset('storage/images/' . $siswa->image) }}" class="img-thumbnail"
                                            style="width:200px" /></td>
                                    @foreach ($tahuns as $tahun)
                                        @if ($tahun->id == $siswa->tahun_id)
                                            <td>{{ $tahun->tahun }}</td>
                                        @endif
                                    @endforeach
                                    <td>{{ $siswa->nama }}</td>
                                    <td>{{ $siswa->panggilan }}</td>
                                    <td>{{ $siswa->noinduk }}</td>
                                    <td>{{ $siswa->kelompoks ? $siswa->kelompoks->kelompok : 'Tidak Ada' }}</td>
                                    <td>{{ $siswa->tempat_lahir }}</td>
                                    <td>{{ $siswa->tanggal_lahir }}</td>
                                    <td>{{ $siswa->jenis_kelamin }}</td>
                                    <td>{{ $siswa->agama }}</td>
                                    <td>{{ $siswa->anakke }}</td>
                                    <td>{{ $siswa->nama_ayah }}</td>
                                    <td>{{ $siswa->nama_ibu }}</td>
                                    <td>{{ $siswa->alamat }}</td>
                                    @foreach ($ortus as $ortu)
                                        @if ($ortu->id == $siswa->orangtua_id)
                                            <td>{{ $ortu->nohp }}</td>
                                        @endif
                                    @endforeach
                                    <td>
                                        <form action="{{ route('siswa.destroy', $siswa->id) }}" method="POST">
                                            <a href="{{ route('siswa.edit', $siswa->id) }}"
                                                style="text-decoration: none;">edit</a>

                                            @csrf
                                            @method('DELETE')

                                            <button class="btn mb-1" type="submit" style="color: red">hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="d-flex mt-4">
                    {{ $siswas->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
