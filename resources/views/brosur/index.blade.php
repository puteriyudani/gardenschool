@extends('layouts.auth')

@section('judul')
    <title>Brosur</title>
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

                <h5>Brosur</h5>
                <br>
                <a href="{{ route('brosur.create') }}" class="btn btn-success mb-3">Tambah Data</a>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Gambar</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($brosurs as $brosur)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $brosur->name }}</td>
                                    <td><img src="{{ asset('storage/images/' . $brosur->image) }}" class="img-thumbnail"
                                        style="width:200px" /></td>
                                    <td>
                                        <form action="{{ route('brosur.destroy', $brosur->id) }}" method="POST">
                                            <a class="me-2" href="{{ route('brosur.edit', $brosur->id) }}" style="text-decoration: none;">
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
