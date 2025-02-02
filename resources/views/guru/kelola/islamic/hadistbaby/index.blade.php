@extends('layouts.auth')

@section('judul')
    <title>Guru - Hadist</title>
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

                <a href="{{ route('hadistbaby.create') }}"><button type="button"
                        class="btn btn-primary m-1 mb-3">Tambah</button></a>

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Hadist</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($hadists as $hadist)
                                <tr>
                                    <td>{{ ($hadists->currentPage() - 1) * $hadists->perPage() + $loop->iteration }}</td>
                                    <td>{{ $hadist->hadist }}</td>
                                    <td>
                                        <form action="{{ route('hadistbaby.destroy', $hadist->id) }}" method="POST">
                                            <a href="{{ route('hadistbaby.edit', $hadist->id) }}"
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

                {{ $hadists->links() }}
            </div>
        </div>
    </div>
@endsection
