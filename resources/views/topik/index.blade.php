@extends('layouts.auth')

@section('judul')
    <title>Topik</title>
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

                <h5>Topik</h5>
                <br>
                <a href="{{ route('topik.create') }}" class="btn btn-success mb-3">Tambah Data</a>

                <div class="mb-3">
                    <strong>Pilih Kelompok:</strong>
                    @foreach ($kelompokList as $kelompok)
                        <a href="{{ route('topik.index', ['kelompok' => $kelompok]) }}"
                            class="btn {{ $kelompok == $selectedKelompok ? 'btn-primary' : 'btn-outline-primary' }}">
                            {{ $kelompok }}
                        </a>
                    @endforeach
                </div>

                <div class="table-responsive">
                    @foreach ($topiks as $tema => $topikByTema)
                        <h6 class="mt-4"><u>Tema: {{ $tema }}</u></h6>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Topik</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($topikByTema as $index => $topik)
                                    <tr>
                                        <td>{{ $index + 1 }}</td> <!-- Nomor urut dimulai dari 1 per tema -->
                                        <td>{{ $topik->topik }}</td>
                                        <td>
                                            <form action="{{ route('topik.destroy', $topik->id) }}" method="POST">
                                                <a class="me-2" href="{{ route('topik.edit', $topik->id) }}"
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
                </div>
            </div>
        </div>
    </div>
@endsection
