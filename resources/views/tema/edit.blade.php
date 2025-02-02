@extends('layouts.auth')

@section('judul')
    <title>Edit Tema</title>
@endsection

@section('content')
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">

        @include('include.sidebar')

        <!--  Main wrapper -->
        <div class="body-wrapper">
            @include('include.header-admin')
            <div class="container-fluid">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title fw-semibold mb-4">Edit Tema</h5>
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('tema.update', $tema->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')

                                        <div class="mb-3">
                                            <label for="kelompok" class="form-label">Kelompok</label>
                                            <select class="form-control" id="kelompok" name="kelompok">
                                                <option value="TK" {{ $tema->kelompok == 'TK' ? 'selected' : '' }}>TK
                                                </option>
                                                <option value="KB" {{ $tema->kelompok == 'KB' ? 'selected' : '' }}>KB
                                                </option>
                                                <option value="BC" {{ $tema->kelompok == 'BC' ? 'selected' : '' }}>BC
                                                </option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="tema" class="form-label">Tema</label>
                                            <input type="text" class="form-control" id="tema" name="tema"
                                                aria-describedby="temaHelp" value="{{ $tema->tema }}">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
