@extends('layouts.auth')

@section('judul')
    <title>Guru - Breakfast</title>
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
                <a target="_blank" href="{{ route('breakfast.create') }}"><button type="button" class="btn btn-primary m-1 mb-3">Tambah</button></a>

                <p>{{ $siswa->nama }}</p>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Menu</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Indikator %</th>
                                <th scope="col">Catatan</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>27/05/2024</td>
                                <td>Variasi nasi, sop ayam dan tempe goreng</td>
                                <td>Habis</td>
                                <td>100%</td>
                                <td>anak tidak suka makanan tahu</td>
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
