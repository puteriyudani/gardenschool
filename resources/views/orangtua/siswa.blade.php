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
                <h5>Kindergarten</h5>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Foto</th>
                                <th scope="col">Nama</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kindergarten as $siswa)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><img src="{{ asset('/storage/images/' . $siswa->image) }}"
                                        class="img-thumbnail" style="width:200px" /></td>
                                    <td><a href="{{ route('ortu.kindergarten', $siswa->id) }}">{{ $siswa->nama }}</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <h5>Play Group</h5>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Foto</th>
                                <th scope="col">Nama</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($playgroup as $siswa)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><img src="{{ asset('/storage/images/' . $siswa->image) }}"
                                        class="img-thumbnail" style="width:200px" /></td>
                                    <td><a href="{{ route('ortu.playgroup', $siswa->id) }}">{{ $siswa->nama }}</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <h5>Baby Camp</h5>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Foto</th>
                                <th scope="col">Nama</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($babycamp as $siswa)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><img src="{{ asset('/storage/images/' . $siswa->image) }}"
                                        class="img-thumbnail" style="width:200px" /></td>
                                    <td><a href="{{ route('ortu.babycamp', $siswa->id) }}">{{ $siswa->nama }}</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
