@extends('layouts.auth')

@section('judul')
    <title>Guru - Act Base Learning</title>
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
                @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                @endif

                <a target="_blank" href="{{ route('act.create') }}"><button type="button"
                        class="btn btn-primary m-1 mb-3">Tambah</button></a>

                <p>{{ $siswa->nama }}</p>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Practical Life</th>
                                <th scope="col">Sensorial</th>
                                <th scope="col">Language</th>
                                <th scope="col">Mathematics</th>
                                <th scope="col">Culture</th>
                                <th scope="col">Notifikasi</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($acts as $act)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $act->tanggal }}</td>
                                    <td>{{ $act->practical }}</td>
                                    <td>{{ $act->sensorial }}</td>
                                    <td>{{ $act->language }}</td>
                                    <td>{{ $act->math }}</td>
                                    <td>{{ $act->culture }}</td>
                                    <td>{{ $act->notifikasi }}</td>
                                    <td>
                                        <form action="{{ route('act.destroy', $act->id) }}" method="POST">
                                            <a target="_blank" href="{{ route('act.edit', $act->id) }}"
                                                style="text-decoration: none; color: #28a745"><i
                                                    class="ti ti-pencil nav-small-cap-icon fs-4"></i></a>

                                            @csrf
                                            @method('DELETE')

                                            <button class="btn mb-1" type="submit" style="color: red">
                                                <i class="ti ti-trash nav-small-cap-icon fs-4"></i>
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
