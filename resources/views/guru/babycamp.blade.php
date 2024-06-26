@extends('layouts.auth')

@section('judul')
    <title>Guru</title>
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
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title fw-semibold mb-4">Baby Camp</h5>
                        <div class="row text-center">
                            <div class="col-md-4">
                                <div class="card">
                                    <img src="{{ asset('auth') }}/images/activity/welcome.png" class="card-img-top"
                                        alt="...">
                                    <div class="card-body">
                                        <a target="_blank" href="{{ route('tbwelcome.siswa') }}" class="btn"
                                            style="background-color: #E8B5A5; color: white">Welcome Mood</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <img src="{{ asset('auth') }}/images/activity/morning.png" class="card-img-top"
                                        alt="...">
                                    <div class="card-body">
                                        <a target="_blank" href="{{ route('tbmorning.siswa') }}" class="btn"
                                            style="background-color: #FFF27F; color: white">Morning Booster</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <img src="{{ asset('auth') }}/images/activity/breakfast.png" class="card-img-top"
                                        alt="...">
                                    <div class="card-body">
                                        <a target="_blank" href="{{ route('tbbreakfast.siswa') }}" class="btn"
                                            style="background-color: #EEC997; color: white">Breakfast</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row text-center">
                            <div class="col-md-4">
                                <div class="card">
                                    <img src="{{ asset('auth') }}/images/activity/islamic.png" class="card-img-top"
                                        alt="...">
                                    <div class="card-body">
                                        <a target="_blank" href="{{ route('tbislamic.siswa') }}" class="btn"
                                            style="background-color: #364F35; color: white">Islamic Base Learning</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <img src="{{ asset('auth') }}/images/activity/preschool.png" class="card-img-top"
                                        alt="...">
                                    <div class="card-body">
                                        <a target="_blank" href="{{ route('tbact.siswa') }}" class="btn"
                                            style="background-color: #627FAB; color: white">Act Base Learning</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <img src="{{ asset('auth') }}/images/activity/tematik.png" class="card-img-top"
                                        alt="...">
                                    <div class="card-body">
                                        <a target="_blank" href="{{ route('tbfun.siswa') }}" class="btn"
                                            style="background-color: #C4ABD9; color: white">Fun Activities</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row text-center">
                            <div class="col-md-4">
                                <div class="card">
                                    <img src="{{ asset('auth') }}/images/activity/lunch.png" class="card-img-top"
                                        alt="...">
                                    <div class="card-body">
                                        <a target="_blank" href="{{ route('tbpooppee.siswa') }}" class="btn"
                                            style="background-color: #ED6565; color: white">Lunch</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <img src="{{ asset('auth') }}/images/activity/recalling.png" class="card-img-top"
                                        alt="...">
                                    <div class="card-body">
                                        <a target="_blank" href="{{ route('tbrecalling.siswa') }}" class="btn"
                                            style="background-color: #947252; color: white">Re Calling</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
