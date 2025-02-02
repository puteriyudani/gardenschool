@extends('layouts.auth')

@section('judul')
    <title>Edit Topik</title>
@endsection

@section('content')
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">

        @include('include.sidebar')

        <div class="body-wrapper">
            @include('include.header-admin')
            <div class="container-fluid">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> Ada beberapa masalah dengan input Anda.<br><br>
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
                            <h5 class="card-title fw-semibold mb-4">Edit Topik</h5>
                            <form action="{{ route('topik.update', $topik->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <label for="tema_id" class="form-label">Tema</label>
                                    <select class="form-control" id="tema_id" name="tema_id">
                                        @foreach ($temas as $tema)
                                            <option value="{{ $tema->id }}"
                                                {{ $topik->tema_id == $tema->id ? 'selected' : '' }}>
                                                {{ $tema->tema }} ({{ $tema->kelompok }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="topik" class="form-label">Topik</label>
                                    <input type="text" class="form-control" id="topik" name="topik"
                                        value="{{ old('topik', $topik->topik) }}" required>
                                </div>

                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                <a href="{{ route('topik.index') }}" class="btn btn-secondary">Batal</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
