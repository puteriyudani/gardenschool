@extends('layouts.auth')

@section('judul')
    <title>File Brosur</title>
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

                <h5>File Brosur</h5>
                <br>
                <a href="{{ route('filebrosur.create') }}" class="btn btn-success mb-3">Tambah Data</a>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">File</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($filebrosurs as $filebrosur)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $filebrosur->name }}</td>
                                    <td>
                                        <object data="{{ asset('/storage/file/' . $filebrosur->file) }}"
                                            type="application/pdf" width="100%" height="300">
                                            <p>Browser Anda tidak dapat menampilkan PDF. <a
                                                    href="{{ asset('/storage/file/' . $filebrosur->file) }}" download>
                                                    Klik di sini untuk mengunduh PDF
                                                </a>.
                                            </p>
                                        </object>
                                    </td>
                                    <td>
                                        <form action="{{ route('filebrosur.destroy', $filebrosur->id) }}" method="POST">
                                            <a class="me-2" href="{{ route('filebrosur.edit', $filebrosur->id) }}"
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
                </div>
            </div>
        </div>
    </div>
@endsection
