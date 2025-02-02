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
                @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                @endif

                <a target="_blank" href="{{ route('islamic.create') }}"><button type="button"
                        class="btn btn-primary m-1 mb-3">Tambah</button></a>

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
                            @foreach ($islamics as $islamic)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $islamic->tanggal }}</td>
                                    <td>
                                        @php
                                            $hadist = json_decode($islamic->hadist, true);
                                            echo is_array($hadist) ? implode(', ', $hadist) : $islamic->hadist->hadist;
                                        @endphp
                                    </td>
                                    <td>{{ $islamic->hadist_stat }}</td>
                                    <td>
                                        @php
                                            $quran = json_decode($islamic->quran, true);
                                            echo is_array($quran) ? implode(', ', $quran) : $islamic->quran->quran;
                                        @endphp
                                    </td>
                                    <td>{{ $islamic->quran_stat }}</td>
                                    <td>
                                        @php
                                            $doa = json_decode($islamic->doa, true);
                                            echo is_array($doa) ? implode(', ', $doa) : $islamic->doa->doa;
                                        @endphp
                                    </td>
                                    <td>{{ $islamic->doa_stat }}</td>
                                    <td>{{ $islamic->notifikasi }}</td>
                                    <td>
                                        <form action="{{ route('islamic.destroy', $islamic->id) }}" method="POST">
                                            <a target="_blank" href="{{ route('islamic.edit', $islamic->id) }}"
                                                style="text-decoration: none; color: #28a745">
                                                <i class="ti ti-pencil nav-small-cap-icon fs-4"></i>
                                            </a>

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
