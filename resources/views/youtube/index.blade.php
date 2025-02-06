@extends('layouts.auth')

@section('judul')
    <title>Montessory - Youtube</title>
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

                <h5>Youtube</h5>
                <br>
                <a href="{{ route('youtube.create') }}" class="btn btn-success mb-3">Tambah Data</a>

                <!-- Pilih Kelompok -->
                <div class="mb-3">
                    <strong>Pilih Kelompok:</strong>
                    @foreach ($kelompokList as $kelompok)
                        <a href="{{ route('youtube.index', ['kelompok' => $kelompok]) }}"
                            class="btn {{ $kelompok == $selectedKelompok ? 'btn-primary' : 'btn-outline-primary' }}">
                            {{ $kelompok }}
                        </a>
                    @endforeach
                </div>

                <div class="table-responsive">
                    @foreach ($groupedYoutubes as $kelompok => $temaGroup)
                        <h6><u>Kelompok: {{ $kelompok }}</u></h6>
                        @foreach ($temaGroup as $tema => $topikGroup)
                            <h6 class="mt-4 text-success fw-bold">Tema {{ $loop->iteration }}: {{ $tema }}</h6>
                            @foreach ($topikGroup as $topik => $youtubes)
                                <h6 class="ms-3 text-primary"><strong>Topik {{ $loop->iteration }}:
                                        {{ $topik }}</strong></h6>

                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Judul</th>
                                            <th scope="col">Keterangan</th>
                                            <th scope="col">Video</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($youtubes as $youtube)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $youtube->judul }}</td>
                                                <td>{{ $youtube->keterangan }}</td>
                                                <td>
                                                    <iframe width="320" height="180" src="{{ $youtube->link }}"
                                                        title="YouTube video player" frameborder="0"
                                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                        allowfullscreen></iframe>
                                                </td>
                                                <td>
                                                    <a href="{{ route('youtube.edit', $youtube->id) }}"
                                                        class="btn btn-warning btn-sm">
                                                        Edit
                                                    </a>
                                                    <form action="{{ route('youtube.destroy', $youtube->id) }}"
                                                        method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">
                                                            Hapus
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
