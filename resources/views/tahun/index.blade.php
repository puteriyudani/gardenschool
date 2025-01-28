@extends('layouts.auth')

@section('judul')
    <title>Tahun</title>
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

                <h5>Tahun</h5>
                <br>
                <a href="{{ route('tahun.create') }}">Tambah Data</a>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Tahun</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tahuns as $tahun)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $tahun->tahun }}</td>
                                    <td>{{ $tahun->status }}</td>
                                    <td>
                                        <form action="{{ route('tahun.destroy', $tahun->id) }}" method="POST">
                                            <a class="me-2" href="{{ route('tahun.edit', $tahun->id) }}" style="text-decoration: none;">
                                                edit
                                            </a>
                                            <a href="{{ route('tahun.editStatus', $tahun->id) }}" style="text-decoration: none; color: green;">
                                                edit status
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
                </div>
            </div>
        </div>
    </div>
@endsection
