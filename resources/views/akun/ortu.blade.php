@extends('layouts.auth')

@section('judul')
    <title>Akun Orang Tua</title>
@endsection

@section('content')
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">

        @include('include.sidebar')

        <div class="body-wrapper">
            @include('include.header-admin')
            <div class="container-fluid">
                @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                @endif

                <a href="{{ route('register') }}" target="_blank"><button type="button" class="btn btn-success m-1 mb-3">Tambah Akun</button></a>

                <h5>Orang Tua</h5>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">No Hp</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ortus as $ortu)
                                <tr>
                                    <td class="col-md-1">{{ $loop->iteration }}</td>
                                    <td class="col-md-2">{{ $ortu->name }}</td>
                                    <td class="col-md-2">{{ $ortu->nohp }}</td>
                                    <td class="col-md-2">
                                        <form action="{{ route('destroyAkun', $ortu->id) }}" method="POST">
                                            <a href="{{ route('editAkun', $ortu->id) }}" class="me-2" style="text-decoration: none;">
                                                edit
                                            </a>

                                            <a href="{{ route('editPassword', $ortu->id) }}" style="text-decoration: none; color: green;">
                                                ubah password
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
                <div>
                    {{ $ortus->links() }}
                </div>

                <div>
                    <a href="{{ route('akun.admin') }}" class="btn btn-primary">Admin</a>
                    <a href="{{ route('akun.guru') }}" class="btn btn-primary">Guru</a>
                    <a href="{{ route('akun.ortu') }}" class="btn btn-primary">Orangtua</a>
                    <a href="{{ route('akun.pembeli') }}" class="btn btn-primary">Mitra</a>
                </div>

            </div>
        </div>
    </div>
@endsection
