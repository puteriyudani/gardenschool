@extends('layouts.auth')

@section('judul')
    <title>Edit Brosur</title>
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
                            <h5 class="card-title fw-semibold mb-4">Forms</h5>
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('brosur.update', $brosur->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Nama</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                aria-describedby="nameHelp" value="{{ $brosur->name }}">
                                        </div>
                                        <div class="row mb-3">
                                            <label for="image" class="col-sm-2 col-form-label">Gambar</label>
                                            <div class="col-sm-10">
                                                <!-- Display the existing image -->
                                                <div>
                                                    <img id="existingImage"
                                                        src="{{ asset('storage/images/' . $brosur->image) }}"
                                                        alt="Gambar Sebelumnya"
                                                        style="max-width: 200px; max-height: 200px;">
                                                </div>
                                                <!-- Input for uploading a new image -->
                                                <input class="form-control mt-3" name="image[]" id="image"
                                                    type="file" placeholder="image">
                                                <small class="text-muted">Ukuran maksimal gambar adalah 2 MB.</small>
                                            </div>
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
