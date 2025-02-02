@extends('layouts.auth')

@section('judul')
    <title>Sub Topik</title>
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

                <div class="d-flex mb-4">
                    <a href="{{ route('topik.index') }}" class="btn btn-primary me-2">Topik</a>
                    <a href="{{ route('subtopik.index') }}" class="btn btn-primary">Sub Topik</a>
                </div>

                <h5>Sub Topik</h5>
                <br>
                <a href="{{ route('subtopik.create') }}" class="btn btn-success mb-3">Tambah Data</a>

                <!-- Pilih Kelompok -->
                <div class="mb-3">
                    <strong>Pilih Kelompok:</strong>
                    @foreach ($kelompokList as $kelompok)
                        <a href="{{ route('subtopik.index', ['kelompok' => $kelompok]) }}"
                            class="btn {{ $kelompok == $selectedKelompok ? 'btn-primary' : 'btn-outline-primary' }}">
                            {{ $kelompok }}
                        </a>
                    @endforeach
                </div>

                <div class="table-responsive">
                    @foreach ($subtopiks->groupBy('topik.tema.kelompok') as $kelompok => $subtopikByKelompok)
                        @foreach ($subtopikByKelompok->groupBy('topik.tema.tema') as $tema => $subtopikByTema)
                            <h6><u>Tema: {{ $tema }}</u></h6>

                            @foreach ($subtopikByTema->groupBy('topik.topik') as $topik => $subtopikByTopik)
                                <h6 class="ms-3 text-primary"><strong>Topik: {{ $topik }}</strong></h6>

                                <!-- Variabel untuk nomor urut per Topik -->
                                @php $counter = 1; @endphp

                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Sub Topik</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($subtopikByTopik as $subtopik)
                                            <tr>
                                                <!-- Nomor urut dimulai dari 1 untuk setiap topik -->
                                                <td>{{ $counter++ }}</td>
                                                <td>{{ $subtopik->subtopik }}</td>
                                                <td>
                                                    <form action="{{ route('subtopik.destroy', $subtopik->id) }}"
                                                        method="POST">
                                                        <a class="me-2"
                                                            href="{{ route('subtopik.edit', $subtopik->id) }}"
                                                            style="text-decoration: none;">
                                                            edit
                                                        </a>

                                                        @csrf
                                                        @method('DELETE')

                                                        <button class="btn mb-1" type="submit" style="color: red">
                                                            hapus
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endforeach
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
