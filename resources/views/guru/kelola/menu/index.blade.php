@extends('layouts.auth')

@section('judul')
    <title>Guru - Breakfast Menu</title>
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

                <a href="{{ route('menu.create') }}"><button type="button"
                        class="btn btn-primary m-1 mb-3">Tambah</button></a>

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Menu</th>
                                <th scope="col">Karbohidrat</th>
                                <th scope="col">Protein</th>
                                <th scope="col">Lemak</th>
                                <th scope="col">Serat</th>
                                <th scope="col">Kalori</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($menus as $menu)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $menu->menu }}</td>
                                    <td>{{ $menu->karbohidrat }}</td>
                                    <td>{{ $menu->protein }}</td>
                                    <td>{{ $menu->lemak }}</td>
                                    <td>{{ $menu->serat }}</td>
                                    <td>{{ $menu->kalori }}</td>
                                    <td>
                                        <form action="{{ route('menu.destroy', $menu->id) }}" method="POST">
                                            <a href="{{ route('menu.edit', $menu->id) }}"
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

                {{ $menus->links() }}
            </div>
        </div>
    </div>
@endsection
