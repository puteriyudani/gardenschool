@extends('layouts.auth')

@section('judul')
    <title>Register</title>
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
                                @if (Session::has('success'))
                                    <div class="alert alert-success" role="alert">
                                        {{ Session::get('success') }}
                                    </div>
                                @endif
                                @if (Session::has('error'))
                                    <div class="alert alert-danger" role="alert">
                                        {{ Session::get('error') }}
                                    </div>
                                @endif
                                <a href="#" class="text-nowrap logo-img text-center d-block py-3 w-100">
                                    <img src="{{ asset('assets') }}/img/logo.png" width="180" alt="">
                                </a>
                                <p class="text-center">Register</p>
                                <form action="{{ route('register') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" name="name" id="name" class="form-control"
                                            placeholder="Name" value="{{ old('name') }}">
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="nohp" class="form-label">No HP</label>
                                        <input type="text" name="nohp" id="nohp" class="form-control"
                                            placeholder="Nomor Handphone" value="{{ old('nohp') }}">
                                        @error('nohp')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" name="password" id="password" class="form-control"
                                            placeholder="***********">
                                        @error('password')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="confirmpassword" class="form-label">Confirm Password</label>
                                        <input type="password" name="confirmpassword" id="confirmpassword"
                                            class="form-control" placeholder="***********">
                                        @error('confirmpassword')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-4">
                                        <select class="form-select" name="level" id="level"
                                            aria-label="Floating label select example">
                                            <option selected>Level</option>
                                            <option value="0" {{ old('level') == 0 ? 'selected' : '' }}>Admin</option>
                                            <option value="1" {{ old('level') == 1 ? 'selected' : '' }}>Guru</option>
                                            <option value="2" {{ old('level') == 2 ? 'selected' : '' }}>Ortu</option>
                                            <option value="3" {{ old('level') == 3 ? 'selected' : '' }}>Pembeli</option>
                                        </select>
                                        @error('level')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <input name="register" id="register"
                                        class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2" type="submit"
                                        value="Register">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <p class="fs-4 mb-0 fw-bold">Already have an Account?</p>
                                        <a class="text-primary fw-bold ms-2" href="{{ route('login') }}">Sign In</a>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
