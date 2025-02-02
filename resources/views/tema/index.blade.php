@extends('layouts.auth')

@section('judul')
    <title>Tema</title>
@endsection

@section('content')
    <!-- Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">

        @include('include.sidebar')

        <!-- Main wrapper -->
        <div class="body-wrapper">
            @include('include.header-admin')
            <div class="container-fluid">
                @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                @endif

                <h5>Tema</h5>
                <br>
                <a href="{{ route('tema.create') }}" class="btn btn-primary">Tambah Data</a>
                <br><br>

                @foreach (['TK' => $tkTemas, 'KB' => $kbTemas, 'BC' => $bcTemas] as $kelompok => $temas)
                    <h5>Tema - {{ $kelompok }}</h5>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Kelompok</th>
                                    <th scope="col">Tema</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($temas as $tema)
                                    <tr>
                                        <td>{{ $temas->firstItem() + $loop->index }}</td>
                                        <td>{{ $tema->kelompok }}</td>
                                        <td>{{ $tema->tema }}</td>
                                        <td>
                                            <form action="{{ route('tema.destroy', $tema->id) }}" method="POST">
                                                <a class="me-2" href="{{ route('tema.edit', $tema->id) }}"
                                                    style="text-decoration: none;">edit</a>
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn mb-1" type="submit" style="color: red">hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $temas->links() }}
                    </div>
                    <br>
                @endforeach
            </div>
        </div>
    </div>
@endsection
