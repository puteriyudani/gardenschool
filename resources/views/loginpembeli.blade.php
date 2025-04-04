@extends('layouts.auth')

@section('judul')
    <title>Login</title>
@endsection

@section('content')
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <div
            class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3">
                        <div class="card mb-0">
                            <div class="card-body">
                                @if (Session::has('error'))
                                    <div class="alert alert-danger" role="alert">
                                        {{ Session::get('error') }}
                                    </div>
                                @endif
                                @if (Session::has('success'))
                                    <div class="alert alert-success" role="alert">
                                        {{ Session::get('success') }}
                                    </div>
                                @endif

                                <p class="text-center">Login</p>
                                <form action="{{ route('loginpembeli') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="nohp" class="form-label">No HP</label>
                                        <input type="text" name="nohp" id="nohp" class="form-control"
                                            placeholder="Nomor Handphone">
                                    </div>
                                    <div class="mb-4">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" name="password" id="password" class="form-control"
                                            placeholder="***********">
                                    </div>
                                    <input name="login" id="login"
                                        class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2" type="submit"
                                        value="Login">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
