@extends('layouts.auth')

@section('judul')
    <title>Orang Tua - Siswa</title>
@endsection

@section('content')
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">

        @include('include.ortu.sidebar')

        <!--  Main wrapper -->
        <div class="body-wrapper">
            @include('include.header-admin')
            <div class="container-fluid">
                @if ($notifications->isNotEmpty())
                    <div class="alert alert-danger">
                        <h6>Notifikasi</h6>
                        @foreach ($notifications as $notification)
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="mb-0">
                                    {{ $notification->message }}
                                </p>
                                <a href="{{ route('mark-and-delete-notification', $notification->id) }}" class="text-danger" style="text-decoration: none;">
                                    <i class="ti ti-trash"></i>
                                </a>
                            </div>
                        @endforeach
                    </div>
                @endif

                <h5>Siswa</h5>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Nama</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($siswas as $siswa)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><img src="{{ asset('/storage/images/' . $siswa->image) }}" class="img-thumbnail"
                                        style="width:200px" /></td>
                                <td><a href="{{ route('ortu.laporan', $siswa->id) }}">{{ $siswa->nama }}</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
