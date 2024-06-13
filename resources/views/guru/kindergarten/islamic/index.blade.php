@extends('layouts.auth')

@section('judul')
    <title>Guru - Islamic Base Learning</title>
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
                <a target="_blank" href="{{ route('islamic-base-learning.create') }}"><button type="button" class="btn btn-primary m-1 mb-3">Tambah</button></a>

                <p>{{ $siswa->nama }}</p>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Hafalan Hadist</th>
                                <th scope="col">Status Hafalan Hadist</th>
                                <th scope="col">Hafalan Qur'an</th>
                                <th scope="col">Status Hafalan Qur'an</th>
                                <th scope="col">Hafalan Doa</th>
                                <th scope="col">Status Hafalan Doa</th>
                                <th scope="col">Notifikasi</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>27/05/2024</td>
                                <td>Larangan Marah, Makan & Minum, dll</td>
                                <td>Progress</td>
                                <td>Al-Fatihah, Al-Ikhlas, dll</td>
                                <td>Tuntas</td>
                                <td>Makan, Pasca Makan, dll</td>
                                <td>Tuntas</td>
                                <td>catatan tentang hafalan</td>
                                <td>
                                    <form action="#" method="POST">
                                        <a target="_blank" href="" style="text-decoration: none; color: #28a745"><i class="ti ti-pencil nav-small-cap-icon fs-4"></i></a>

                                        @csrf
                                        @method('DELETE')

                                        <button class="btn mb-1" type="submit" style="color: red">
                                            <i class="ti ti-trash nav-small-cap-icon fs-4"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
