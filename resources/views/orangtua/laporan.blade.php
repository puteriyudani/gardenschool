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
            <div class="container-fluid" id="download-container" style="background-color: rgb(207, 207, 207);">
                <div class="row kepala">
                    <div class="col-2"><a class="text-nowrap logo-img">
                            <img src="{{ asset('assets') }}/img/logo.png" alt="" />
                        </a></div>
                    <div class="col-10 d-flex justify-content-end align-items-center profile">
                        <p class="me-2">{{ $siswa->nama }}</p>
                        <img src="{{ asset('/storage/images/' . $siswa->image) }}" alt="" class="rounded-circle">
                    </div>
                </div>

                <form method="POST" action="{{ route('laporan.tanggal', ['id' => $siswa->id]) }}" id="tanggalForm">
                    @csrf
                    <input type="hidden" name="siswa_id" value="{{ $siswa->id }}">
                    <div class="mb-3 d-flex align-items-center">
                        <input class="form-control me-2" id="tanggal" name="tanggal" type="date" required
                            value="{{ \Carbon\Carbon::parse($selected)->format('Y-m-d') }}">
                        <button type="submit" class="btn btn-primary" hidden>Tanggal</button>
                    </div>
                </form>

                @if ($kelompok == 'TK' || $kelompok == 'KB')
                    <div class="row align-items-start mobile-no-gutters">
                        <div class="col-8">
                            @if ($welcomes->isNotEmpty())
                                <blockquote class="blockquote blockquote-custom shadow rounded mt-3 bg-green">
                                    <div class="blockquote-custom-icon shadow-sm">
                                        <h5>Welcome Mood</h5>
                                    </div>
                                    @foreach ($welcomes as $welcome)
                                        <div class="row">
                                            <div class="col-3 text-center">
                                                @if ($welcome->keterangan == 'Happy')
                                                    <img src="{{ asset('auth/images/face/happy.png') }}" alt="Happy">
                                                @elseif ($welcome->keterangan == 'Neutral')
                                                    <img src="{{ asset('auth/images/face/neutral.png') }}" alt="Neutral">
                                                @elseif ($welcome->keterangan == 'Sad')
                                                    <img src="{{ asset('auth/images/face/sad.png') }}" alt="Sad">
                                                @else
                                                    <img src="{{ asset('auth/images/face/almost-happy.png') }}"
                                                        alt="Almost Happy">
                                                @endif
                                                <h1>{{ $welcome->indikator }}%</h1>
                                            </div>
                                            <div class="col-9">
                                                <h2>{{ $welcome->keterangan }}</h2>
                                                <p class="mb-0 mt-2">Notifikasi : <a>{{ $welcome->notifikasi }}</a></p>
                                            </div>
                                        </div>
                                    @endforeach
                                </blockquote>
                            @endif

                            @if ($islamics->isNotEmpty())
                                <blockquote class="blockquote blockquote-custom shadow rounded bg-yellow">
                                    <div class="blockquote-custom-icon shadow-sm">
                                        <h5>Islamic Base Learning</h5>
                                    </div>
                                    @foreach ($islamics as $islamic)
                                        <div class="row mobile-no-gutters hadist">
                                            <div class="col-4 text-center hadists">
                                                <img src="{{ asset('auth') }}/images/rcq.png" class="mt-2"
                                                    alt="">
                                                <h6>Support By:</h6>
                                                <a>RUMAH CERDAS QURAN</a>
                                                <div class="card text-justify hadist">
                                                    <h4>Hafalan Hadist:</h4>

                                                    @php
                                                        $hadist_list_array = $hadist_list
                                                            ->pluck('hadist', 'id')
                                                            ->toArray();
                                                    @endphp

                                                    @foreach ($hadist_list_array as $hadist_id => $hadist_name)
                                                        <div class="row mobile-no-gutters yellow">
                                                            <div class="col-1">
                                                                <img class="{{ in_array($hadist_id, json_decode($islamic->hadist)) ? 'check' : 'cross' }}"
                                                                    src="{{ asset('auth') }}/images/icon/{{ in_array($hadist_id, json_decode($islamic->hadist)) ? 'check' : 'cross' }}.png"
                                                                    alt="">
                                                            </div>
                                                            <div class="col">
                                                                <p>{{ $hadist_name }}</p>
                                                            </div>
                                                        </div>
                                                    @endforeach

                                                    <div class="gap"></div>

                                                    <div
                                                        class="status {{ $islamic->hadist_stat == 'Progress' ? 'progress-status' : ($islamic->hadist_stat == 'Tuntas' ? 'tuntas-status' : '') }}">
                                                        <h3>{{ $islamic->hadist_stat }}</h3>
                                                    </div>

                                                </div>

                                            </div>
                                            <div class="col-8">
                                                <h2>Alquran, Hadist dan Doa</h2>
                                                <div class="row mobile-no-gutters quran-doa">
                                                    <div class="col-6">
                                                        <div class="card quran">
                                                            <h4>Hafalan Quran:</h4>

                                                            @php
                                                                $quran_list_array = $quran_list
                                                                    ->pluck('quran', 'id')
                                                                    ->toArray();
                                                            @endphp

                                                            @foreach ($quran_list_array as $quran_id => $quran_name)
                                                                <div class="row mobile-no-gutters yellow">
                                                                    <div class="col-1">
                                                                        <img class="{{ in_array($quran_id, json_decode($islamic->quran)) ? 'check' : 'cross' }}"
                                                                            src="{{ asset('auth') }}/images/icon/{{ in_array($quran_id, json_decode($islamic->quran)) ? 'check' : 'cross' }}.png"
                                                                            alt="">
                                                                    </div>
                                                                    <div class="col">
                                                                        <p>{{ $quran_name }}</p>
                                                                    </div>
                                                                </div>
                                                            @endforeach

                                                            <div class="gap"></div>

                                                            <div
                                                                class="status {{ $islamic->quran_stat == 'Progress' ? 'progress-status' : ($islamic->quran_stat == 'Tuntas' ? 'tuntas-status' : '') }}">
                                                                <h3>{{ $islamic->quran_stat }}</h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="card doa">
                                                            <h4>Hafalan Doa:</h4>

                                                            @php
                                                                $doa_list_array = $doa_list
                                                                    ->pluck('doa', 'id')
                                                                    ->toArray();
                                                            @endphp

                                                            @foreach ($doa_list_array as $doa_id => $doa_name)
                                                                <div class="row mobile-no-gutters yellow">
                                                                    <div class="col-1">
                                                                        <img class="{{ in_array($doa_id, json_decode($islamic->doa)) ? 'check' : 'cross' }}"
                                                                            src="{{ asset('auth') }}/images/icon/{{ in_array($doa_id, json_decode($islamic->doa)) ? 'check' : 'cross' }}.png"
                                                                            alt="">
                                                                    </div>
                                                                    <div class="col">
                                                                        <p>{{ $doa_name }}</p>
                                                                    </div>
                                                                </div>
                                                            @endforeach

                                                            <div
                                                                class="status {{ $islamic->doa_stat == 'Progress' ? 'progress-status' : ($islamic->doa_stat == 'Tuntas' ? 'tuntas-status' : '') }}">
                                                                <h3>{{ $islamic->doa_stat }}</h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="yellow-notif">
                                            <p class="mb-0 mt-2">Notifikasi : <a>{{ $islamic->notifikasi }}</a></p>
                                        </div>
                                    @endforeach
                                </blockquote>
                            @endif

                            <div class="row mobile-no-gutters pretem">
                                <div class="col-6 grey">
                                    @if ($preschools->isNotEmpty())
                                        <blockquote class="blockquote blockquote-custom shadow rounded mt-3 bg-grey">
                                            <div class="blockquote-custom-icon shadow-sm">
                                                <h5>Pre School</h5>
                                            </div>

                                            @foreach ($preschools as $preschool)
                                                <div class="sub">
                                                    <div class="row mobile-no-gutters">
                                                        <div class="col-1">
                                                            <img class="check"
                                                                src="{{ asset('auth') }}/images/icon/check.png"
                                                                alt="">
                                                        </div>
                                                        <div class="col">
                                                            <p>Huruf & Membaca</p>
                                                        </div>
                                                    </div>
                                                    <div class="grey-notif">
                                                        <p class="mb-0">Notifikasi : <a>{{ $preschool->huruf }}</a></p>
                                                    </div>
                                                </div>

                                                <div class="sub mt-2">
                                                    <div class="row mobile-no-gutters">
                                                        <div class="col-1">
                                                            <img class="check"
                                                                src="{{ asset('auth') }}/images/icon/check.png"
                                                                alt="">
                                                        </div>
                                                        <div class="col">
                                                            <p>Angka & Berhitung</p>
                                                        </div>
                                                    </div>
                                                    <div class="grey-notif">
                                                        <p class="mb-0">Notifikasi : <a>{{ $preschool->angka }}</a></p>
                                                    </div>
                                                </div>

                                                <div class="sub mt-2">
                                                    <div class="row mobile-no-gutters">
                                                        <div class="col-1">
                                                            <img class="check"
                                                                src="{{ asset('auth') }}/images/icon/check.png"
                                                                alt="">
                                                        </div>
                                                        <div class="col">
                                                            <p>Pre Basic English</p>
                                                        </div>
                                                    </div>
                                                    <div class="grey-notif">
                                                        <p class="mb-0">Notifikasi : <a>{{ $preschool->english }}</a>
                                                        </p>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </blockquote>
                                    @endif

                                    @if ($pooppees->isNotEmpty())
                                        <blockquote class="blockquote blockquote-custom shadow rounded bg-darkgreen">
                                            <div class="blockquote-custom-icon shadow-sm">
                                                <h5>Poop and Pee</h5>
                                            </div>

                                            @foreach ($pooppees as $pooppee)
                                                @if ($pooppee->poop == 'Ya')
                                                    <div class="sub">
                                                        <div class="row mobile-no-gutters">
                                                            <div class="col-1">
                                                                <img class="check"
                                                                    src="{{ asset('auth') }}/images/icon/check.png"
                                                                    alt="">
                                                            </div>
                                                            <div class="col">
                                                                <p>Buang Air Besar</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @elseif ($pooppee->poop == 'Tidak')
                                                    <div class="sub">
                                                        <div class="row mobile-no-gutters">
                                                            <div class="col-1">
                                                                <img class="check-none"
                                                                    src="{{ asset('auth') }}/images/icon/check-none.png"
                                                                    alt="">
                                                            </div>
                                                            <div class="col">
                                                                <p>Buang Air Besar</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif

                                                @if ($pooppee->pee == 'Ya')
                                                    <div class="sub">
                                                        <div class="row mobile-no-gutters">
                                                            <div class="col-1">
                                                                <img class="check"
                                                                    src="{{ asset('auth') }}/images/icon/check.png"
                                                                    alt="">
                                                            </div>
                                                            <div class="col">
                                                                <p>Buang Air Kecil</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @elseif ($pooppee->pee == 'Tidak')
                                                    <div class="sub">
                                                        <div class="row mobile-no-gutters">
                                                            <div class="col-1">
                                                                <img class="check-none"
                                                                    src="{{ asset('auth') }}/images/icon/check-none.png"
                                                                    alt="">
                                                            </div>
                                                            <div class="col">
                                                                <p>Buang Air Kecil</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif

                                                <div class="darkgreen-catatan">
                                                    <p class="mb-0 mt-2">Catatan : <a>{{ $pooppee->catatan }}</a></p>
                                                </div>
                                            @endforeach
                                        </blockquote>
                                    @endif
                                </div>
                                <div class="col-6 brown">
                                    @if ($tematiks->isNotEmpty())
                                        <blockquote class="blockquote blockquote-custom shadow rounded mt-3 bg-brown">
                                            <div class="blockquote-custom-icon shadow-sm">
                                                <h5>Tematik</h5>
                                            </div>

                                            @foreach ($tematiks as $tematik)
                                                <div class="sub">
                                                    <div class="row mobile-no-gutters">
                                                        <div class="col-1">
                                                            <img class="check"
                                                                src="{{ asset('auth') }}/images/icon/check.png"
                                                                alt="">
                                                        </div>
                                                        <div class="col">
                                                            <p>{{ $tematik->judul1 }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="brown-notif">
                                                        <p class="mb-0">Notifikasi : <a>{{ $tematik->kegiatan1 }}</a>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="sub mt-2">
                                                    <div class="row mobile-no-gutters">
                                                        <div class="col-1">
                                                            <img class="check"
                                                                src="{{ asset('auth') }}/images/icon/check.png"
                                                                alt="">
                                                        </div>
                                                        <div class="col">
                                                            <p>{{ $tematik->judul2 }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="brown-notif">
                                                        <p class="mb-0">Notifikasi : <a>{{ $tematik->kegiatan2 }}</a>
                                                        </p>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </blockquote>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            @if ($mornings->isNotEmpty())
                                <blockquote class="blockquote blockquote-custom shadow rounded mt-3 bg-blue">
                                    <div class="blockquote-custom-icon shadow-sm">
                                        <h5>Morning Booster</h5>
                                    </div>

                                    @foreach ($mornings as $morning)
                                        @if ($morning->kegiatan == 'Senam Pagi')
                                            <div class="row mobile-no-gutters blue">
                                                <div class="col-1">
                                                    <img class="check" src="{{ asset('auth/images/icon/check.png') }}"
                                                        alt="Check">
                                                </div>
                                                <div class="col">
                                                    <p>Senam pagi</p>
                                                </div>
                                            </div>

                                            <div class="row mobile-no-gutters blue">
                                                <div class="col-1">
                                                    <img class="cross" src="{{ asset('auth/images/icon/cross.png') }}"
                                                        alt="Cross">
                                                </div>
                                                <div class="col">
                                                    <p>Apel Bendera</p>
                                                </div>
                                            </div>
                                        @elseif ($morning->kegiatan == 'Apel Bendera')
                                            <div class="row mobile-no-gutters blue">
                                                <div class="col-1">
                                                    <img class="cross" src="{{ asset('auth/images/icon/cross.png') }}"
                                                        alt="Cross">
                                                </div>
                                                <div class="col">
                                                    <p>Senam pagi</p>
                                                </div>
                                            </div>

                                            <div class="row mobile-no-gutters blue">
                                                <div class="col-1">
                                                    <img class="check" src="{{ asset('auth/images/icon/check.png') }}"
                                                        alt="Check">
                                                </div>
                                                <div class="col">
                                                    <p>Apel Bendera</p>
                                                </div>
                                            </div>
                                        @endif


                                        <div class="row mobile-no-gutters blue">
                                            <div class="col-1"></div>
                                            <div class="col card">
                                                <p>Circle Time</p>
                                                @if ($morning->circletime == 'Ice Breaking, Berdiskusi/Cerita')
                                                    <div class="row sub mobile-no-gutters blue">
                                                        <div class="col-1">
                                                            <img class="check"
                                                                src="{{ asset('auth/images/icon/check.png') }}"
                                                                alt="">
                                                        </div>
                                                        <div class="col">
                                                            <p>Ice Breaking</p>
                                                        </div>
                                                    </div>
                                                    <div class="row sub mobile-no-gutters blue">
                                                        <div class="col-1">
                                                            <img class="check"
                                                                src="{{ asset('auth/images/icon/check.png') }}"
                                                                alt="">
                                                        </div>
                                                        <div class="col">
                                                            <p>Berdiskusi/Cerita</p>
                                                        </div>
                                                    </div>
                                                @elseif ($morning->circletime == 'Ice Breaking')
                                                    <div class="row sub mobile-no-gutters blue">
                                                        <div class="col-1">
                                                            <img class="check"
                                                                src="{{ asset('auth/images/icon/check.png') }}"
                                                                alt="">
                                                        </div>
                                                        <div class="col">
                                                            <p>Ice Breaking</p>
                                                        </div>
                                                    </div>
                                                    <div class="row sub mobile-no-gutters blue">
                                                        <div class="col-1">
                                                            <img class="cross"
                                                                src="{{ asset('auth/images/icon/cross.png') }}"
                                                                alt="">
                                                        </div>
                                                        <div class="col">
                                                            <p>Berdiskusi/Cerita</p>
                                                        </div>
                                                    </div>
                                                @elseif ($morning->circletime == 'Berdiskusi/Cerita')
                                                    <div class="row sub mobile-no-gutters blue">
                                                        <div class="col-1">
                                                            <img class="cross"
                                                                src="{{ asset('auth/images/icon/cross.png') }}"
                                                                alt="">
                                                        </div>
                                                        <div class="col">
                                                            <p>Ice Breaking</p>
                                                        </div>
                                                    </div>
                                                    <div class="row sub mobile-no-gutters blue">
                                                        <div class="col-1">
                                                            <img class="check"
                                                                src="{{ asset('auth/images/icon/check.png') }}"
                                                                alt="">
                                                        </div>
                                                        <div class="col">
                                                            <p>Berdiskusi/Cerita</p>
                                                        </div>
                                                    </div>
                                                @endif

                                            </div>
                                        </div>

                                        <div class="notifikasi">
                                            <p class="mb-0">Notifikasi : <a>{{ $morning->notifikasi }}</a></p>
                                        </div>
                                    @endforeach
                                </blockquote>
                            @endif

                            @if ($breakfasts->isNotEmpty())
                                <blockquote class="blockquote blockquote-custom shadow rounded bg-orange">
                                    <div class="blockquote-custom-icon shadow-sm">
                                        <h5>Breakfast</h5>
                                    </div>

                                    @foreach ($breakfasts as $breakfast)
                                        <div class="menu">
                                            <p class="mb-2 mt-2">Menu : <a>{{ $breakfast->menu->menu }}</a></p>
                                        </div>

                                        <div class="row gizi">
                                            <div class="col-4">
                                                <p>Karbohidrat</p>
                                            </div>
                                            <div class="col">
                                                <div class="progress" role="progressbar" aria-label="Success example"
                                                    aria-valuenow="{{ $breakfast->menu->karbohidrat }}" aria-valuemin="0"
                                                    aria-valuemax="100">
                                                    <div class="progress-bar bg-success"
                                                        style="width: {{ $breakfast->menu->karbohidrat }}%"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row gizi">
                                            <div class="col-4">
                                                <p>Protein</p>
                                            </div>
                                            <div class="col">
                                                <div class="progress" role="progressbar" aria-label="Success example"
                                                    aria-valuenow="{{ $breakfast->menu->protein }}" aria-valuemin="0"
                                                    aria-valuemax="100">
                                                    <div class="progress-bar bg-success"
                                                        style="width: {{ $breakfast->menu->protein }}%"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row gizi">
                                            <div class="col-4">
                                                <p>Lemak</p>
                                            </div>
                                            <div class="col">
                                                <div class="progress" role="progressbar" aria-label="Success example"
                                                    aria-valuenow="{{ $breakfast->menu->lemak }}" aria-valuemin="0"
                                                    aria-valuemax="100">
                                                    <div class="progress-bar bg-success"
                                                        style="width: {{ $breakfast->menu->lemak }}%"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row gizi">
                                            <div class="col-4">
                                                <p>Serat</p>
                                            </div>
                                            <div class="col">
                                                <div class="progress" role="progressbar" aria-label="Success example"
                                                    aria-valuenow="{{ $breakfast->menu->serat }}" aria-valuemin="0"
                                                    aria-valuemax="100">
                                                    <div class="progress-bar bg-success"
                                                        style="width: {{ $breakfast->menu->serat }}%"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row gizi">
                                            <div class="col-4">
                                                <p>Kalori</p>
                                            </div>
                                            <div class="col">
                                                <div class="progress" role="progressbar" aria-label="Success example"
                                                    aria-valuenow="{{ $breakfast->menu->kalori }}" aria-valuemin="0"
                                                    aria-valuemax="100">
                                                    <div class="progress-bar bg-success"
                                                        style="width: {{ $breakfast->menu->kalori }}%"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mobile-no-gutters orange">
                                            <div class="col-7">
                                                @if ($breakfast->keterangan == 'Habis')
                                                    <div class="sub">
                                                        <div class="row mobile-no-gutters">
                                                            <div class="col-1">
                                                                <img class="check"
                                                                    src="{{ asset('auth/images/icon/check.png') }}"
                                                                    alt="Check">
                                                            </div>
                                                            <div class="col">
                                                                <p>Habis</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="sub">
                                                        <div class="row mobile-no-gutters">
                                                            <div class="col-1">
                                                                <img class="check-none"
                                                                    src="{{ asset('auth/images/icon/check-none.png') }}"
                                                                    alt="Check-none">
                                                            </div>
                                                            <div class="col">
                                                                <p>Bersisa</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="sub">
                                                        <div class="row mobile-no-gutters">
                                                            <div class="col-1">
                                                                <img class="check-none"
                                                                    src="{{ asset('auth/images/icon/check-none.png') }}"
                                                                    alt="Check-none">
                                                            </div>
                                                            <div class="col">
                                                                <p>Tdk Mkn</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="sub">
                                                        <div class="row mobile-no-gutters">
                                                            <div class="col-1">
                                                                <img class="check-none"
                                                                    src="{{ asset('auth/images/icon/check-none.png') }}"
                                                                    alt="Check-none">
                                                            </div>
                                                            <div class="col">
                                                                <p>Tambah</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @elseif ($breakfast->keterangan == 'Bersisa')
                                                    <div class="sub">
                                                        <div class="row mobile-no-gutters">
                                                            <div class="col-1">
                                                                <img class="check-none"
                                                                    src="{{ asset('auth/images/icon/check-none.png') }}"
                                                                    alt="Check-none">
                                                            </div>
                                                            <div class="col">
                                                                <p>Habis</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="sub">
                                                        <div class="row mobile-no-gutters">
                                                            <div class="col-1">
                                                                <img class="check"
                                                                    src="{{ asset('auth/images/icon/check.png') }}"
                                                                    alt="Check">
                                                            </div>
                                                            <div class="col">
                                                                <p>Bersisa</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="sub">
                                                        <div class="row mobile-no-gutters">
                                                            <div class="col-1">
                                                                <img class="check-none"
                                                                    src="{{ asset('auth/images/icon/check-none.png') }}"
                                                                    alt="Check-none">
                                                            </div>
                                                            <div class="col">
                                                                <p>Tdk Mkn</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="sub">
                                                        <div class="row mobile-no-gutters">
                                                            <div class="col-1">
                                                                <img class="check-none"
                                                                    src="{{ asset('auth/images/icon/check-none.png') }}"
                                                                    alt="Check-none">
                                                            </div>
                                                            <div class="col">
                                                                <p>Tambah</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @elseif ($breakfast->keterangan == 'Tdk Mkn')
                                                    <div class="sub">
                                                        <div class="row mobile-no-gutters">
                                                            <div class="col-1">
                                                                <img class="check-none"
                                                                    src="{{ asset('auth/images/icon/check-none.png') }}"
                                                                    alt="Check-none">
                                                            </div>
                                                            <div class="col">
                                                                <p>Habis</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="sub">
                                                        <div class="row mobile-no-gutters">
                                                            <div class="col-1">
                                                                <img class="check-none"
                                                                    src="{{ asset('auth/images/icon/check-none.png') }}"
                                                                    alt="Check-none">
                                                            </div>
                                                            <div class="col">
                                                                <p>Bersisa</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="sub">
                                                        <div class="row mobile-no-gutters">
                                                            <div class="col-1">
                                                                <img class="check"
                                                                    src="{{ asset('auth/images/icon/check.png') }}"
                                                                    alt="Check">
                                                            </div>
                                                            <div class="col">
                                                                <p>Tdk Mkn</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="sub">
                                                        <div class="row mobile-no-gutters">
                                                            <div class="col-1">
                                                                <img class="check-none"
                                                                    src="{{ asset('auth/images/icon/check-none.png') }}"
                                                                    alt="Check-none">
                                                            </div>
                                                            <div class="col">
                                                                <p>Tambah</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @elseif ($breakfast->keterangan == 'Tambah')
                                                    <div class="sub">
                                                        <div class="row mobile-no-gutters">
                                                            <div class="col-1">
                                                                <img class="check-none"
                                                                    src="{{ asset('auth/images/icon/check-none.png') }}"
                                                                    alt="Check-none">
                                                            </div>
                                                            <div class="col">
                                                                <p>Habis</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="sub">
                                                        <div class="row mobile-no-gutters">
                                                            <div class="col-1">
                                                                <img class="check-none"
                                                                    src="{{ asset('auth/images/icon/check-none.png') }}"
                                                                    alt="Check-none">
                                                            </div>
                                                            <div class="col">
                                                                <p>Bersisa</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="sub">
                                                        <div class="row mobile-no-gutters">
                                                            <div class="col-1">
                                                                <img class="check-none"
                                                                    src="{{ asset('auth/images/icon/check-none.png') }}"
                                                                    alt="Check-none">
                                                            </div>
                                                            <div class="col">
                                                                <p>Tdk Mkn</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="sub">
                                                        <div class="row mobile-no-gutters">
                                                            <div class="col-1">
                                                                <img class="check"
                                                                    src="{{ asset('auth/images/icon/check.png') }}"
                                                                    alt="Check">
                                                            </div>
                                                            <div class="col">
                                                                <p>Tambah</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif

                                            </div>
                                            <div class="col-5 persentase d-flex align-items-center">
                                                <h1>{{ $breakfast->indikator }}%</h1>
                                            </div>
                                        </div>

                                        <div class="catatan">
                                            <p class="mb-0 mt-2">Catatan : <a>{{ $breakfast->catatan }}</a></p>
                                        </div>
                                    @endforeach
                                </blockquote>
                            @endif

                            @if ($videos->isNotEmpty())
                                <blockquote class="blockquote blockquote-custom shadow rounded bg-black">
                                    <div class="blockquote-custom-icon shadow-sm">
                                        <h5>Today Videos</h5>
                                    </div>

                                    @foreach ($videos as $video)
                                        <div class="youtube text-center">
                                            <iframe width="280" src="{{ $video->video }}"
                                                title="YouTube video player" frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                        </div>
                                    @endforeach
                                </blockquote>
                            @endif
                        </div>
                    </div>

                    <div class="row align-items-start mobile-no-gutters">
                        <div class="col-4"></div>
                        <div class="col-8 recalling">
                            @if ($vocabularys->isNotEmpty())
                                <blockquote class="blockquote blockquote-custom shadow rounded bg-purple">
                                    <div class="blockquote-custom-icon shadow-sm">
                                        <h5>English Skill</h5>
                                    </div>

                                    <div class="row">
                                        <div class="col-8 col-md-9 col-lg-9">
                                            @foreach ($vocabularys as $vocabulary)
                                                <div class="sub">
                                                    <div class="vocab">
                                                        <div class="row mobile-no-gutters">
                                                            <div class="col-1">
                                                                <img class="check"
                                                                    src="{{ asset('auth') }}/images/icon/check.png"
                                                                    alt="">
                                                            </div>
                                                            <div class="col">
                                                                <p>Vocabulary & Sentence</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mobile-no-gutters mb-2">
                                                        <div class="col">
                                                            <p><a>{{ $vocabulary->vocabulary }} vocab</a></p>
                                                        </div>
                                                        <div class="col">
                                                            <p><a>{{ $vocabulary->sentence }} sentence</a></p>
                                                        </div>
                                                    </div>
                                                    <div class="row mobile-no-gutters">
                                                        <div class="col">
                                                            <p><a>{{ $vocabulary->tale }} tale</a></p>
                                                        </div>
                                                        <div class="col">
                                                            <p><a>{{ $vocabulary->song }} song</a></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                        <div class="col-4 col-md-3 col-lg-3 aozora text-center"
                                            style="margin-top: -15px; color:white;">
                                            <img src="{{ asset('auth') }}/images/english.png" class="mt-2"
                                                alt="">
                                            <p>Support By:</p>
                                            <br>
                                            <a>AOZORA</a>
                                        </div>
                                    </div>

                                </blockquote>
                            @endif

                            @if ($recallings->isNotEmpty())
                                <blockquote class="blockquote blockquote-custom shadow rounded bg-mustard">
                                    <div class="blockquote-custom-icon shadow-sm">
                                        <h5>Re-Calling</h5>
                                    </div>
                                    @foreach ($recallings as $recalling)
                                        <div class="row">
                                            <div class="col-9">
                                                <h2>{{ $recalling->keterangan }}</h2>
                                                <p class="mb-0 mt-2">Notifikasi : <a>{{ $recalling->notifikasi }}</a></p>
                                            </div>
                                            <div class="col-3 text-center emot">
                                                @if ($recalling->keterangan == 'Happy')
                                                    <img src="{{ asset('auth/images/face/happy.png') }}" alt="Happy">
                                                @elseif ($recalling->keterangan == 'Neutral')
                                                    <img src="{{ asset('auth/images/face/neutral.png') }}"
                                                        alt="Neutral">
                                                @elseif ($recalling->keterangan == 'Sad')
                                                    <img src="{{ asset('auth/images/face/sad.png') }}" alt="Sad">
                                                @else
                                                    <img src="{{ asset('auth/images/face/almost-happy.png') }}"
                                                        alt="Almost Happy">
                                                @endif
                                                <h1>{{ $recalling->indikator }}%</h1>
                                            </div>
                                        </div>
                                    @endforeach
                                </blockquote>
                            @endif
                        </div>
                    </div>
                @elseif ($kelompok == 'BC')
                    <div class="row align-items-start mobile-no-gutters">
                        <div class="col-8">
                            @if ($welcomes->isNotEmpty())
                                <blockquote class="blockquote blockquote-custom shadow rounded mt-3 bg-tosca">
                                    <div class="blockquote-custom-icon shadow-sm">
                                        <h5>Welcome Mood</h5>
                                    </div>
                                    @foreach ($welcomes as $welcome)
                                        <div class="row">
                                            <div class="col-3 text-center">
                                                @if ($welcome->keterangan == 'Happy')
                                                    <img src="{{ asset('auth/images/face/happy.png') }}" alt="Happy">
                                                @elseif ($welcome->keterangan == 'Neutral')
                                                    <img src="{{ asset('auth/images/face/neutral.png') }}"
                                                        alt="Neutral">
                                                @elseif ($welcome->keterangan == 'Sad')
                                                    <img src="{{ asset('auth/images/face/sad.png') }}" alt="Sad">
                                                @else
                                                    <img src="{{ asset('auth/images/face/almost-happy.png') }}"
                                                        alt="Almost Happy">
                                                @endif
                                                <h1>{{ $welcome->indikator }}%</h1>
                                            </div>
                                            <div class="col-9">
                                                <h2>{{ $welcome->keterangan }}</h2>
                                                <p class="mb-0 mt-2">Notifikasi : <a>{{ $welcome->notifikasi }}</a></p>
                                            </div>
                                        </div>
                                    @endforeach
                                </blockquote>
                            @endif

                            @if ($islamics->isNotEmpty())
                                <blockquote class="blockquote blockquote-custom shadow rounded bg-darkblue">
                                    <div class="blockquote-custom-icon shadow-sm">
                                        <h5>Islamic Base Learning</h5>
                                    </div>
                                    @foreach ($islamics as $islamic)
                                        <div class="row mobile-no-gutters hadist baby">
                                            <div class="col-4 text-center hadists">
                                                <img src="{{ asset('auth') }}/images/rcq.png" class="mt-2"
                                                    alt="">
                                                <h6>Support By:</h6>
                                                <a style="color: white">RUMAH CERDAS QURAN</a>
                                                <div class="card text-justify hadist">
                                                    <h4>Hafalan Hadist:</h4>

                                                    @php
                                                        $hadistbaby_list_array = $hadistbaby_list
                                                            ->pluck('hadist', 'id')
                                                            ->toArray();
                                                    @endphp

                                                    @foreach ($hadistbaby_list_array as $hadist_id => $hadist_name)
                                                        <div class="row mobile-no-gutters darkblue">
                                                            <div class="col-1">
                                                                <img class="{{ in_array($hadist_id, json_decode($islamic->hadist)) ? 'check' : 'cross' }}"
                                                                    src="{{ asset('auth') }}/images/icon/{{ in_array($hadist_id, json_decode($islamic->hadist)) ? 'check' : 'cross' }}.png"
                                                                    alt="">
                                                            </div>
                                                            <div class="col">
                                                                <p>{{ $hadist_name }}</p>
                                                            </div>
                                                        </div>
                                                    @endforeach

                                                    <div class="gap"></div>

                                                    <div
                                                        class="status {{ $islamic->hadist_stat == 'Progress' ? 'progress-status' : ($islamic->hadist_stat == 'Tuntas' ? 'tuntas-status' : '') }}">
                                                        <h3>{{ $islamic->hadist_stat }}</h3>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-8">
                                                <h2>Alquran, Hadist dan Doa</h2>
                                                <div class="row mobile-no-gutters quran-doa">
                                                    <div class="col-6">
                                                        <div class="card quran">
                                                            <h4>Hafalan Quran:</h4>

                                                            @php
                                                                $quranbaby_list_array = $quranbaby_list
                                                                    ->pluck('quran', 'id')
                                                                    ->toArray();
                                                            @endphp

                                                            @foreach ($quranbaby_list_array as $quran_id => $quran_name)
                                                                <div class="row mobile-no-gutters darkblue">
                                                                    <div class="col-1">
                                                                        <img class="{{ in_array($quran_id, json_decode($islamic->quran)) ? 'check' : 'cross' }}"
                                                                            src="{{ asset('auth') }}/images/icon/{{ in_array($quran_id, json_decode($islamic->quran)) ? 'check' : 'cross' }}.png"
                                                                            alt="">
                                                                    </div>
                                                                    <div class="col">
                                                                        <p>{{ $quran_name }}</p>
                                                                    </div>
                                                                </div>
                                                            @endforeach

                                                            <div class="gap"></div>

                                                            <div
                                                                class="status {{ $islamic->quran_stat == 'Progress' ? 'progress-status' : ($islamic->quran_stat == 'Tuntas' ? 'tuntas-status' : '') }}">
                                                                <h3>{{ $islamic->quran_stat }}</h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="card doa">
                                                            <h4>Hafalan Doa:</h4>

                                                            @php
                                                                $doababy_list_array = $doababy_list
                                                                    ->pluck('doa', 'id')
                                                                    ->toArray();
                                                            @endphp

                                                            @foreach ($doababy_list_array as $doa_id => $doa_name)
                                                                <div class="row mobile-no-gutters darkblue">
                                                                    <div class="col-1">
                                                                        <img class="{{ in_array($doa_id, json_decode($islamic->doa)) ? 'check' : 'cross' }}"
                                                                            src="{{ asset('auth') }}/images/icon/{{ in_array($doa_id, json_decode($islamic->doa)) ? 'check' : 'cross' }}.png"
                                                                            alt="">
                                                                    </div>
                                                                    <div class="col">
                                                                        <p>{{ $doa_name }}</p>
                                                                    </div>
                                                                </div>
                                                            @endforeach

                                                            <div
                                                                class="status {{ $islamic->doa_stat == 'Progress' ? 'progress-status' : ($islamic->doa_stat == 'Tuntas' ? 'tuntas-status' : '') }}">
                                                                <h3>{{ $islamic->doa_stat }}</h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="darkblue-notif">
                                            <p class="mb-0 mt-2">Notifikasi : <a>{{ $islamic->notifikasi }}</a></p>
                                        </div>
                                    @endforeach
                                </blockquote>
                            @endif
                        </div>
                        <div class="col-4">
                            @if ($mornings->isNotEmpty())
                                <blockquote class="blockquote blockquote-custom shadow rounded mt-3 bg-blue">
                                    <div class="blockquote-custom-icon shadow-sm">
                                        <h5>Morning Booster</h5>
                                    </div>

                                    @foreach ($mornings as $morning)
                                        @if ($morning->kegiatan == 'Senam Pagi')
                                            <div class="row mobile-no-gutters blue">
                                                <div class="col-1">
                                                    <img class="check" src="{{ asset('auth/images/icon/check.png') }}"
                                                        alt="Check">
                                                </div>
                                                <div class="col">
                                                    <p>Senam pagi</p>
                                                </div>
                                            </div>

                                            <div class="row mobile-no-gutters blue">
                                                <div class="col-1">
                                                    <img class="cross" src="{{ asset('auth/images/icon/cross.png') }}"
                                                        alt="Cross">
                                                </div>
                                                <div class="col">
                                                    <p>Apel Bendera</p>
                                                </div>
                                            </div>
                                        @elseif ($morning->kegiatan == 'Apel Bendera')
                                            <div class="row mobile-no-gutters blue">
                                                <div class="col-1">
                                                    <img class="cross" src="{{ asset('auth/images/icon/cross.png') }}"
                                                        alt="Cross">
                                                </div>
                                                <div class="col">
                                                    <p>Senam pagi</p>
                                                </div>
                                            </div>

                                            <div class="row mobile-no-gutters blue">
                                                <div class="col-1">
                                                    <img class="check" src="{{ asset('auth/images/icon/check.png') }}"
                                                        alt="Check">
                                                </div>
                                                <div class="col">
                                                    <p>Apel Bendera</p>
                                                </div>
                                            </div>
                                        @endif


                                        <div class="row mobile-no-gutters blue">
                                            <div class="col-1"></div>
                                            <div class="col card">
                                                <p>Circle Time</p>
                                                @if ($morning->circletime == 'Ice Breaking, Berdiskusi/Cerita')
                                                    <div class="row sub mobile-no-gutters blue">
                                                        <div class="col-1">
                                                            <img class="check"
                                                                src="{{ asset('auth/images/icon/check.png') }}"
                                                                alt="">
                                                        </div>
                                                        <div class="col">
                                                            <p>Ice Breaking</p>
                                                        </div>
                                                    </div>
                                                    <div class="row sub mobile-no-gutters blue">
                                                        <div class="col-1">
                                                            <img class="check"
                                                                src="{{ asset('auth/images/icon/check.png') }}"
                                                                alt="">
                                                        </div>
                                                        <div class="col">
                                                            <p>Berdiskusi/Cerita</p>
                                                        </div>
                                                    </div>
                                                @elseif ($morning->circletime == 'Ice Breaking')
                                                    <div class="row sub mobile-no-gutters blue">
                                                        <div class="col-1">
                                                            <img class="check"
                                                                src="{{ asset('auth/images/icon/check.png') }}"
                                                                alt="">
                                                        </div>
                                                        <div class="col">
                                                            <p>Ice Breaking</p>
                                                        </div>
                                                    </div>
                                                    <div class="row sub mobile-no-gutters blue">
                                                        <div class="col-1">
                                                            <img class="cross"
                                                                src="{{ asset('auth/images/icon/cross.png') }}"
                                                                alt="">
                                                        </div>
                                                        <div class="col">
                                                            <p>Berdiskusi/Cerita</p>
                                                        </div>
                                                    </div>
                                                @elseif ($morning->circletime == 'Berdiskusi/Cerita')
                                                    <div class="row sub mobile-no-gutters blue">
                                                        <div class="col-1">
                                                            <img class="cross"
                                                                src="{{ asset('auth/images/icon/cross.png') }}"
                                                                alt="">
                                                        </div>
                                                        <div class="col">
                                                            <p>Ice Breaking</p>
                                                        </div>
                                                    </div>
                                                    <div class="row sub mobile-no-gutters blue">
                                                        <div class="col-1">
                                                            <img class="check"
                                                                src="{{ asset('auth/images/icon/check.png') }}"
                                                                alt="">
                                                        </div>
                                                        <div class="col">
                                                            <p>Berdiskusi/Cerita</p>
                                                        </div>
                                                    </div>
                                                @endif

                                            </div>
                                        </div>

                                        <div class="notifikasi">
                                            <p class="mb-0">Notifikasi : <a>{{ $morning->notifikasi }}</a></p>
                                        </div>
                                    @endforeach
                                </blockquote>
                            @endif

                            @if ($acts->isNotEmpty())
                                <blockquote class="blockquote blockquote-custom shadow rounded bg-greyb">
                                    <div class="blockquote-custom-icon shadow-sm">
                                        <h5>Act Base Learning</h5>
                                    </div>

                                    @foreach ($acts as $act)
                                        @if ($act->practical == 'Ya')
                                            <div class="sub">
                                                <div class="row mobile-no-gutters">
                                                    <div class="col-1">
                                                        <img class="check"
                                                            src="{{ asset('auth') }}/images/icon/check.png"
                                                            alt="">
                                                    </div>
                                                    <div class="col">
                                                        <p>Practical Life</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @elseif ($act->practical == 'Tidak')
                                            <div class="sub">
                                                <div class="row mobile-no-gutters">
                                                    <div class="col-1">
                                                        <img class="check-none"
                                                            src="{{ asset('auth') }}/images/icon/check-none.png"
                                                            alt="">
                                                    </div>
                                                    <div class="col">
                                                        <p>Practical Life</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                        @if ($act->sensorial == 'Ya')
                                            <div class="sub">
                                                <div class="row mobile-no-gutters">
                                                    <div class="col-1">
                                                        <img class="check"
                                                            src="{{ asset('auth') }}/images/icon/check.png"
                                                            alt="">
                                                    </div>
                                                    <div class="col">
                                                        <p>Sensorial</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @elseif ($act->sensorial == 'Tidak')
                                            <div class="sub">
                                                <div class="row mobile-no-gutters">
                                                    <div class="col-1">
                                                        <img class="check-none"
                                                            src="{{ asset('auth') }}/images/icon/check-none.png"
                                                            alt="">
                                                    </div>
                                                    <div class="col">
                                                        <p>Sensorial</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                        @if ($act->language == 'Ya')
                                            <div class="sub">
                                                <div class="row mobile-no-gutters">
                                                    <div class="col-1">
                                                        <img class="check"
                                                            src="{{ asset('auth') }}/images/icon/check.png"
                                                            alt="">
                                                    </div>
                                                    <div class="col">
                                                        <p>Language</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @elseif ($act->language == 'Tidak')
                                            <div class="sub">
                                                <div class="row mobile-no-gutters">
                                                    <div class="col-1">
                                                        <img class="check-none"
                                                            src="{{ asset('auth') }}/images/icon/check-none.png"
                                                            alt="">
                                                    </div>
                                                    <div class="col">
                                                        <p>Language</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                        @if ($act->math == 'Ya')
                                            <div class="sub">
                                                <div class="row mobile-no-gutters">
                                                    <div class="col-1">
                                                        <img class="check"
                                                            src="{{ asset('auth') }}/images/icon/check.png"
                                                            alt="">
                                                    </div>
                                                    <div class="col">
                                                        <p>Mathematics</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @elseif ($act->math == 'Tidak')
                                            <div class="sub">
                                                <div class="row mobile-no-gutters">
                                                    <div class="col-1">
                                                        <img class="check-none"
                                                            src="{{ asset('auth') }}/images/icon/check-none.png"
                                                            alt="">
                                                    </div>
                                                    <div class="col">
                                                        <p>Mathematics</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                        @if ($act->culture == 'Ya')
                                            <div class="sub">
                                                <div class="row mobile-no-gutters">
                                                    <div class="col-1">
                                                        <img class="check"
                                                            src="{{ asset('auth') }}/images/icon/check.png"
                                                            alt="">
                                                    </div>
                                                    <div class="col">
                                                        <p>Culture</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @elseif ($act->culture == 'Tidak')
                                            <div class="sub">
                                                <div class="row mobile-no-gutters">
                                                    <div class="col-1">
                                                        <img class="check-none"
                                                            src="{{ asset('auth') }}/images/icon/check-none.png"
                                                            alt="">
                                                    </div>
                                                    <div class="col">
                                                        <p>Culture</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                        <div class="greyb-catatan">
                                            <p class="mb-0 mt-2">Notifikasi : <a>{{ $act->notifikasi }}</a></p>
                                        </div>
                                    @endforeach
                                </blockquote>
                            @endif
                        </div>
                    </div>

                    <div class="row align-items-start mobile-no-gutters">
                        <div class="col-4">
                            @if ($funs->isNotEmpty())
                                <blockquote class="blockquote blockquote-custom shadow rounded bg-brownb">
                                    <div class="blockquote-custom-icon shadow-sm">
                                        <h5>Fun Activities</h5>
                                    </div>

                                    @foreach ($funs as $fun)
                                        @if ($fun->tidur == 'Ya')
                                            <div class="sub">
                                                <div class="row mobile-no-gutters">
                                                    <div class="col-1">
                                                        <img class="check"
                                                            src="{{ asset('auth') }}/images/icon/check.png"
                                                            alt="">
                                                    </div>
                                                    <div class="col">
                                                        <p>Tidur Siang</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @elseif ($fun->tidur == 'Tidak')
                                            <div class="sub">
                                                <div class="row mobile-no-gutters">
                                                    <div class="col-1">
                                                        <img class="check-none"
                                                            src="{{ asset('auth') }}/images/icon/check-none.png"
                                                            alt="">
                                                    </div>
                                                    <div class="col">
                                                        <p>Tidur Siang</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                        @if ($fun->poop == 'Ya')
                                            <div class="sub">
                                                <div class="row mobile-no-gutters">
                                                    <div class="col-1">
                                                        <img class="check"
                                                            src="{{ asset('auth') }}/images/icon/check.png"
                                                            alt="">
                                                    </div>
                                                    <div class="col">
                                                        <p>Buang Air Besar</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @elseif ($fun->poop == 'Tidak')
                                            <div class="sub">
                                                <div class="row mobile-no-gutters">
                                                    <div class="col-1">
                                                        <img class="check-none"
                                                            src="{{ asset('auth') }}/images/icon/check-none.png"
                                                            alt="">
                                                    </div>
                                                    <div class="col">
                                                        <p>Buang Air Besar</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                        @if ($fun->pee == 'Ya')
                                            <div class="sub">
                                                <div class="row mobile-no-gutters">
                                                    <div class="col-1">
                                                        <img class="check"
                                                            src="{{ asset('auth') }}/images/icon/check.png"
                                                            alt="">
                                                    </div>
                                                    <div class="col">
                                                        <p>Buang Air Kecil</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @elseif ($fun->pee == 'Tidak')
                                            <div class="sub">
                                                <div class="row mobile-no-gutters">
                                                    <div class="col-1">
                                                        <img class="check-none"
                                                            src="{{ asset('auth') }}/images/icon/check-none.png"
                                                            alt="">
                                                    </div>
                                                    <div class="col">
                                                        <p>Buang Air Kecil</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                        @if ($fun->mandi == 'Ya')
                                            <div class="sub">
                                                <div class="row mobile-no-gutters">
                                                    <div class="col-1">
                                                        <img class="check"
                                                            src="{{ asset('auth') }}/images/icon/check.png"
                                                            alt="">
                                                    </div>
                                                    <div class="col">
                                                        <p>Mandi Sore</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @elseif ($fun->mandi == 'Tidak')
                                            <div class="sub">
                                                <div class="row mobile-no-gutters">
                                                    <div class="col-1">
                                                        <img class="check-none"
                                                            src="{{ asset('auth') }}/images/icon/check-none.png"
                                                            alt="">
                                                    </div>
                                                    <div class="col">
                                                        <p>Mandi Sore</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                        <div class="brownb-catatan">
                                            <p class="mb-0 mt-2">Notifikasi : <a>{{ $fun->notifikasi }}</a></p>
                                        </div>
                                    @endforeach
                                </blockquote>
                            @endif

                            @if ($videos->isNotEmpty())
                                <blockquote class="blockquote blockquote-custom shadow rounded bg-blackb">
                                    <div class="blockquote-custom-icon shadow-sm">
                                        <h5>Today Videos</h5>
                                    </div>

                                    @foreach ($videos as $video)
                                        <div class="youtube text-center">
                                            <iframe class="responsive-iframe" width="280" height="200"
                                                src="{{ $video->video }}" title="YouTube video player" frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                        </div>
                                    @endforeach
                                </blockquote>
                            @endif
                        </div>
                        <div class="col-4">
                            @if ($breakfasts->isNotEmpty())
                                <blockquote class="blockquote blockquote-custom shadow rounded bg-lemon">
                                    <div class="blockquote-custom-icon shadow-sm">
                                        <h5>Breakfast</h5>
                                    </div>

                                    @foreach ($breakfasts as $breakfast)
                                        <div class="menu">
                                            <p class="mb-2 mt-2">Menu : <a>{{ $breakfast->menuData->menu ?? $breakfast->menu }}</a></p>
                                        </div>

                                        <div class="row gizi">
                                            <div class="col-4">
                                                <p>Karbohidrat</p>
                                            </div>
                                            <div class="col">
                                                <div class="progress" role="progressbar" aria-label="Success example"
                                                    aria-valuenow="{{ $breakfast->menuData->karbohidrat ?? 0 }}"
                                                    aria-valuemin="0" aria-valuemax="100">
                                                    <div class="progress-bar bg-success"
                                                        style="width: {{ $breakfast->menuData->karbohidrat ?? 0 }}%">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row gizi">
                                            <div class="col-4">
                                                <p>Protein</p>
                                            </div>
                                            <div class="col">
                                                <div class="progress" role="progressbar" aria-label="Success example"
                                                    aria-valuenow="{{ $breakfast->menuData->protein ?? 0 }}" aria-valuemin="0"
                                                    aria-valuemax="100">
                                                    <div class="progress-bar bg-success"
                                                        style="width: {{ $breakfast->menuData->protein ?? 0 }}%"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row gizi">
                                            <div class="col-4">
                                                <p>Lemak</p>
                                            </div>
                                            <div class="col">
                                                <div class="progress" role="progressbar" aria-label="Success example"
                                                    aria-valuenow="{{ $breakfast->menuData->lemak ?? 0 }}" aria-valuemin="0"
                                                    aria-valuemax="100">
                                                    <div class="progress-bar bg-success"
                                                        style="width: {{ $breakfast->menuData->lemak ?? 0 }}%"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row gizi">
                                            <div class="col-4">
                                                <p>Serat</p>
                                            </div>
                                            <div class="col">
                                                <div class="progress" role="progressbar" aria-label="Success example"
                                                    aria-valuenow="{{ $breakfast->menuData->serat ?? 0 }}" aria-valuemin="0"
                                                    aria-valuemax="100">
                                                    <div class="progress-bar bg-success"
                                                        style="width: {{ $breakfast->menuData->serat ?? 0 }}%"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row gizi">
                                            <div class="col-4">
                                                <p>Kalori</p>
                                            </div>
                                            <div class="col">
                                                <div class="progress" role="progressbar" aria-label="Success example"
                                                    aria-valuenow="{{ $breakfast->menuData->kalori ?? 0 }}" aria-valuemin="0"
                                                    aria-valuemax="100">
                                                    <div class="progress-bar bg-success"
                                                        style="width: {{ $breakfast->menuData->kalori ?? 0 }}%"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mobile-no-gutters lemon">
                                            <div class="col-7">
                                                @if ($breakfast->keterangan == 'Habis')
                                                    <div class="sub">
                                                        <div class="row mobile-no-gutters">
                                                            <div class="col-1">
                                                                <img class="check"
                                                                    src="{{ asset('auth/images/icon/check.png') }}"
                                                                    alt="Check">
                                                            </div>
                                                            <div class="col">
                                                                <p>Habis</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="sub">
                                                        <div class="row mobile-no-gutters">
                                                            <div class="col-1">
                                                                <img class="check-none"
                                                                    src="{{ asset('auth/images/icon/check-none.png') }}"
                                                                    alt="Check-none">
                                                            </div>
                                                            <div class="col">
                                                                <p>Bersisa</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="sub">
                                                        <div class="row mobile-no-gutters">
                                                            <div class="col-1">
                                                                <img class="check-none"
                                                                    src="{{ asset('auth/images/icon/check-none.png') }}"
                                                                    alt="Check-none">
                                                            </div>
                                                            <div class="col">
                                                                <p>Tdk Mkn</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="sub">
                                                        <div class="row mobile-no-gutters">
                                                            <div class="col-1">
                                                                <img class="check-none"
                                                                    src="{{ asset('auth/images/icon/check-none.png') }}"
                                                                    alt="Check-none">
                                                            </div>
                                                            <div class="col">
                                                                <p>Tambah</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @elseif ($breakfast->keterangan == 'Bersisa')
                                                    <div class="sub">
                                                        <div class="row mobile-no-gutters">
                                                            <div class="col-1">
                                                                <img class="check-none"
                                                                    src="{{ asset('auth/images/icon/check-none.png') }}"
                                                                    alt="Check-none">
                                                            </div>
                                                            <div class="col">
                                                                <p>Habis</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="sub">
                                                        <div class="row mobile-no-gutters">
                                                            <div class="col-1">
                                                                <img class="check"
                                                                    src="{{ asset('auth/images/icon/check.png') }}"
                                                                    alt="Check">
                                                            </div>
                                                            <div class="col">
                                                                <p>Bersisa</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="sub">
                                                        <div class="row mobile-no-gutters">
                                                            <div class="col-1">
                                                                <img class="check-none"
                                                                    src="{{ asset('auth/images/icon/check-none.png') }}"
                                                                    alt="Check-none">
                                                            </div>
                                                            <div class="col">
                                                                <p>Tdk Mkn</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="sub">
                                                        <div class="row mobile-no-gutters">
                                                            <div class="col-1">
                                                                <img class="check-none"
                                                                    src="{{ asset('auth/images/icon/check-none.png') }}"
                                                                    alt="Check-none">
                                                            </div>
                                                            <div class="col">
                                                                <p>Tambah</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @elseif ($breakfast->keterangan == 'Tdk Mkn')
                                                    <div class="sub">
                                                        <div class="row mobile-no-gutters">
                                                            <div class="col-1">
                                                                <img class="check-none"
                                                                    src="{{ asset('auth/images/icon/check-none.png') }}"
                                                                    alt="Check-none">
                                                            </div>
                                                            <div class="col">
                                                                <p>Habis</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="sub">
                                                        <div class="row mobile-no-gutters">
                                                            <div class="col-1">
                                                                <img class="check-none"
                                                                    src="{{ asset('auth/images/icon/check-none.png') }}"
                                                                    alt="Check-none">
                                                            </div>
                                                            <div class="col">
                                                                <p>Bersisa</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="sub">
                                                        <div class="row mobile-no-gutters">
                                                            <div class="col-1">
                                                                <img class="check"
                                                                    src="{{ asset('auth/images/icon/check.png') }}"
                                                                    alt="Check">
                                                            </div>
                                                            <div class="col">
                                                                <p>Tdk Mkn</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="sub">
                                                        <div class="row mobile-no-gutters">
                                                            <div class="col-1">
                                                                <img class="check-none"
                                                                    src="{{ asset('auth/images/icon/check-none.png') }}"
                                                                    alt="Check-none">
                                                            </div>
                                                            <div class="col">
                                                                <p>Tambah</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @elseif ($breakfast->keterangan == 'Tambah')
                                                    <div class="sub">
                                                        <div class="row mobile-no-gutters">
                                                            <div class="col-1">
                                                                <img class="check-none"
                                                                    src="{{ asset('auth/images/icon/check-none.png') }}"
                                                                    alt="Check-none">
                                                            </div>
                                                            <div class="col">
                                                                <p>Habis</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="sub">
                                                        <div class="row mobile-no-gutters">
                                                            <div class="col-1">
                                                                <img class="check-none"
                                                                    src="{{ asset('auth/images/icon/check-none.png') }}"
                                                                    alt="Check-none">
                                                            </div>
                                                            <div class="col">
                                                                <p>Bersisa</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="sub">
                                                        <div class="row mobile-no-gutters">
                                                            <div class="col-1">
                                                                <img class="check-none"
                                                                    src="{{ asset('auth/images/icon/check-none.png') }}"
                                                                    alt="Check-none">
                                                            </div>
                                                            <div class="col">
                                                                <p>Tdk Mkn</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="sub">
                                                        <div class="row mobile-no-gutters">
                                                            <div class="col-1">
                                                                <img class="check"
                                                                    src="{{ asset('auth/images/icon/check.png') }}"
                                                                    alt="Check">
                                                            </div>
                                                            <div class="col">
                                                                <p>Tambah</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif

                                            </div>
                                            <div class="col-5 persentase d-flex align-items-center">
                                                <h1>{{ $breakfast->indikator }}%</h1>
                                            </div>
                                        </div>

                                        <div class="catatan">
                                            <p class="mb-0 mt-2">Catatan : <a>{{ $breakfast->catatan }}</a></p>
                                        </div>
                                    @endforeach
                                </blockquote>
                            @endif
                        </div>
                        <div class="col-4">
                            @if ($lunchs->isNotEmpty())
                                <blockquote class="blockquote blockquote-custom shadow rounded bg-pink">
                                    <div class="blockquote-custom-icon shadow-sm">
                                        <h5>Lunch</h5>
                                    </div>

                                    @foreach ($lunchs as $lunch)
                                        <div class="menu">
                                            <p class="mb-2 mt-2">Menu : <a>{{ $lunch->menu->menu }}</a></p>
                                        </div>

                                        <div class="row gizi">
                                            <div class="col-4">
                                                <p>Karbohidrat</p>
                                            </div>
                                            <div class="col">
                                                <div class="progress" role="progressbar" aria-label="Success example"
                                                    aria-valuenow="{{ $lunch->menu->karbohidrat }}" aria-valuemin="0"
                                                    aria-valuemax="100">
                                                    <div class="progress-bar bg-success"
                                                        style="width: {{ $lunch->menu->karbohidrat }}%">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row gizi">
                                            <div class="col-4">
                                                <p>Protein</p>
                                            </div>
                                            <div class="col">
                                                <div class="progress" role="progressbar" aria-label="Success example"
                                                    aria-valuenow="{{ $lunch->menu->protein }}" aria-valuemin="0"
                                                    aria-valuemax="100">
                                                    <div class="progress-bar bg-success"
                                                        style="width: {{ $lunch->menu->protein }}%"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row gizi">
                                            <div class="col-4">
                                                <p>Lemak</p>
                                            </div>
                                            <div class="col">
                                                <div class="progress" role="progressbar" aria-label="Success example"
                                                    aria-valuenow="{{ $lunch->menu->lemak }}" aria-valuemin="0"
                                                    aria-valuemax="100">
                                                    <div class="progress-bar bg-success"
                                                        style="width: {{ $lunch->menu->lemak }}%"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row gizi">
                                            <div class="col-4">
                                                <p>Serat</p>
                                            </div>
                                            <div class="col">
                                                <div class="progress" role="progressbar" aria-label="Success example"
                                                    aria-valuenow="{{ $lunch->menu->serat }}" aria-valuemin="0"
                                                    aria-valuemax="100">
                                                    <div class="progress-bar bg-success"
                                                        style="width: {{ $lunch->menu->serat }}%"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row gizi">
                                            <div class="col-4">
                                                <p>Kalori</p>
                                            </div>
                                            <div class="col">
                                                <div class="progress" role="progressbar" aria-label="Success example"
                                                    aria-valuenow="{{ $lunch->menu->kalori }}" aria-valuemin="0"
                                                    aria-valuemax="100">
                                                    <div class="progress-bar bg-success"
                                                        style="width: {{ $lunch->menu->kalori }}%"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mobile-no-gutters pink">
                                            <div class="col-7">
                                                @if ($lunch->keterangan == 'Habis')
                                                    <div class="sub">
                                                        <div class="row mobile-no-gutters">
                                                            <div class="col-1">
                                                                <img class="check"
                                                                    src="{{ asset('auth/images/icon/check.png') }}"
                                                                    alt="Check">
                                                            </div>
                                                            <div class="col">
                                                                <p>Habis</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="sub">
                                                        <div class="row mobile-no-gutters">
                                                            <div class="col-1">
                                                                <img class="check-none"
                                                                    src="{{ asset('auth/images/icon/check-none.png') }}"
                                                                    alt="Check-none">
                                                            </div>
                                                            <div class="col">
                                                                <p>Bersisa</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="sub">
                                                        <div class="row mobile-no-gutters">
                                                            <div class="col-1">
                                                                <img class="check-none"
                                                                    src="{{ asset('auth/images/icon/check-none.png') }}"
                                                                    alt="Check-none">
                                                            </div>
                                                            <div class="col">
                                                                <p>Tdk Mkn</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="sub">
                                                        <div class="row mobile-no-gutters">
                                                            <div class="col-1">
                                                                <img class="check-none"
                                                                    src="{{ asset('auth/images/icon/check-none.png') }}"
                                                                    alt="Check-none">
                                                            </div>
                                                            <div class="col">
                                                                <p>Tambah</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @elseif ($lunch->keterangan == 'Bersisa')
                                                    <div class="sub">
                                                        <div class="row mobile-no-gutters">
                                                            <div class="col-1">
                                                                <img class="check-none"
                                                                    src="{{ asset('auth/images/icon/check-none.png') }}"
                                                                    alt="Check-none">
                                                            </div>
                                                            <div class="col">
                                                                <p>Habis</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="sub">
                                                        <div class="row mobile-no-gutters">
                                                            <div class="col-1">
                                                                <img class="check"
                                                                    src="{{ asset('auth/images/icon/check.png') }}"
                                                                    alt="Check">
                                                            </div>
                                                            <div class="col">
                                                                <p>Bersisa</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="sub">
                                                        <div class="row mobile-no-gutters">
                                                            <div class="col-1">
                                                                <img class="check-none"
                                                                    src="{{ asset('auth/images/icon/check-none.png') }}"
                                                                    alt="Check-none">
                                                            </div>
                                                            <div class="col">
                                                                <p>Tdk Mkn</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="sub">
                                                        <div class="row mobile-no-gutters">
                                                            <div class="col-1">
                                                                <img class="check-none"
                                                                    src="{{ asset('auth/images/icon/check-none.png') }}"
                                                                    alt="Check-none">
                                                            </div>
                                                            <div class="col">
                                                                <p>Tambah</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @elseif ($lunch->keterangan == 'Tdk Mkn')
                                                    <div class="sub">
                                                        <div class="row mobile-no-gutters">
                                                            <div class="col-1">
                                                                <img class="check-none"
                                                                    src="{{ asset('auth/images/icon/check-none.png') }}"
                                                                    alt="Check-none">
                                                            </div>
                                                            <div class="col">
                                                                <p>Habis</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="sub">
                                                        <div class="row mobile-no-gutters">
                                                            <div class="col-1">
                                                                <img class="check-none"
                                                                    src="{{ asset('auth/images/icon/check-none.png') }}"
                                                                    alt="Check-none">
                                                            </div>
                                                            <div class="col">
                                                                <p>Bersisa</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="sub">
                                                        <div class="row mobile-no-gutters">
                                                            <div class="col-1">
                                                                <img class="check"
                                                                    src="{{ asset('auth/images/icon/check.png') }}"
                                                                    alt="Check">
                                                            </div>
                                                            <div class="col">
                                                                <p>Tdk Mkn</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="sub">
                                                        <div class="row mobile-no-gutters">
                                                            <div class="col-1">
                                                                <img class="check-none"
                                                                    src="{{ asset('auth/images/icon/check-none.png') }}"
                                                                    alt="Check-none">
                                                            </div>
                                                            <div class="col">
                                                                <p>Tambah</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @elseif ($lunch->keterangan == 'Tambah')
                                                    <div class="sub">
                                                        <div class="row mobile-no-gutters">
                                                            <div class="col-1">
                                                                <img class="check-none"
                                                                    src="{{ asset('auth/images/icon/check-none.png') }}"
                                                                    alt="Check-none">
                                                            </div>
                                                            <div class="col">
                                                                <p>Habis</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="sub">
                                                        <div class="row mobile-no-gutters">
                                                            <div class="col-1">
                                                                <img class="check-none"
                                                                    src="{{ asset('auth/images/icon/check-none.png') }}"
                                                                    alt="Check-none">
                                                            </div>
                                                            <div class="col">
                                                                <p>Bersisa</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="sub">
                                                        <div class="row mobile-no-gutters">
                                                            <div class="col-1">
                                                                <img class="check-none"
                                                                    src="{{ asset('auth/images/icon/check-none.png') }}"
                                                                    alt="Check-none">
                                                            </div>
                                                            <div class="col">
                                                                <p>Tdk Mkn</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="sub">
                                                        <div class="row mobile-no-gutters">
                                                            <div class="col-1">
                                                                <img class="check"
                                                                    src="{{ asset('auth/images/icon/check.png') }}"
                                                                    alt="Check">
                                                            </div>
                                                            <div class="col">
                                                                <p>Tambah</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif

                                            </div>
                                            <div class="col-5 persentase d-flex align-items-center">
                                                <h1>{{ $lunch->indikator }}%</h1>
                                            </div>
                                        </div>

                                        <div class="catatan">
                                            <p class="mb-0 mt-2">Catatan : <a>{{ $lunch->catatan }}</a></p>
                                        </div>
                                    @endforeach
                                </blockquote>
                            @endif
                        </div>
                    </div>

                    <div class="row align-items-start mobile-no-gutters">
                        <div class="col">
                            @if ($recallings->isNotEmpty())
                                <blockquote class="blockquote blockquote-custom shadow rounded bg-turquoise">
                                    <div class="blockquote-custom-icon shadow-sm">
                                        <h5>Re Calling</h5>
                                    </div>
                                    @foreach ($recallings as $recalling)
                                        <div class="row">
                                            <div class="col-9">
                                                <h2>{{ $recalling->keterangan }}</h2>
                                                <p class="mb-0 mt-2">Notifikasi : <a>{{ $recalling->notifikasi }}</a>
                                                </p>
                                            </div>
                                            <div class="col-3 text-center emot">
                                                @if ($recalling->keterangan == 'Happy')
                                                    <img src="{{ asset('auth/images/face/happy.png') }}"
                                                        alt="Happy">
                                                @elseif ($recalling->keterangan == 'Neutral')
                                                    <img src="{{ asset('auth/images/face/neutral.png') }}"
                                                        alt="Neutral">
                                                @elseif ($recalling->keterangan == 'Sad')
                                                    <img src="{{ asset('auth/images/face/sad.png') }}" alt="Sad">
                                                @else
                                                    <img src="{{ asset('auth/images/face/almost-happy.png') }}"
                                                        alt="Almost Happy">
                                                @endif
                                                <h1>{{ $recalling->indikator }}%</h1>
                                            </div>
                                        </div>
                                    @endforeach
                                </blockquote>
                            @endif
                        </div>
                    </div>
                @endif

            </div>

            <button class="floating-button" id="download-button">I Have Read</button>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dateInput = document.getElementById('tanggal');

            // Set today's date if the input is empty
            if (!dateInput.value) {
                const today = new Date();
                const formattedToday = today.toISOString().split('T')[0]; // Format YYYY-MM-DD
                dateInput.value = formattedToday;
            }

            // Submit form when date is changed
            dateInput.addEventListener('change', function() {
                document.getElementById('tanggalForm').submit();
            });
        });
    </script>

    <script>
        document.getElementById('download-button').addEventListener('click', function() {
            var userId = "{{ auth()->user()->id }}"; // Ambil ID user dari session Laravel

            // Simpan klik download ke database dengan AJAX
            fetch("{{ route('saveDownload') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({
                    user_id: userId,
                    tanggal: new Date().toISOString().split('T')[0] // Format YYYY-MM-DD
                })
            });

            // Proses download PDF tetap berjalan
            var element = document.getElementById('download-container');
            var filename = 'Laporan-' + userId + '-' + new Date().toISOString().split('T')[0] + '.pdf';

            var opt = {
                margin: 0.5,
                filename: filename,
                image: {
                    type: 'jpeg',
                    quality: 0.98
                },
                html2canvas: {
                    scale: window.innerWidth <= 768 ? 1 : 2
                },
                jsPDF: {
                    unit: 'in',
                    format: [13, 21],
                    orientation: 'portrait'
                }
            };

            html2pdf().set(opt).from(element).save();
        });
    </script>
@endsection
