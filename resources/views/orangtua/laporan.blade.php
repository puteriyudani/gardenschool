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
            <div class="container-fluid" id="download-container">
                <p>{{ $siswa->nama }}</p>
                <fieldset disabled>
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                    </div>
                </fieldset>

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
                                        <div class="col-4 text-center">
                                            <img src="{{ asset('auth') }}/images/rcq.jpg" class="mt-2" alt="">
                                            <h6>Support By:</h6>
                                            <a>RUMAH CERDAS QURAN</a>
                                            <div class="card text-justify hadist">
                                                <h4>Hafalan Hadist:</h4>

                                                @php
                                                    $hadist_list = [
                                                        1 => 'Larangan Marah',
                                                        2 => 'Makan & Minum',
                                                        3 => 'Kasih Sayang',
                                                        4 => 'Kebersihan',
                                                        5 => 'Menuntut Ilmu',
                                                        6 => 'Sabar',
                                                    ];
                                                @endphp

                                                @foreach ($hadist_list as $hadist_id => $hadist_name)
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

                                                <div class="status">
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
                                                            $quran_list = [
                                                                1 => 'Al-Fatihah',
                                                                2 => 'Al-Ikhlas',
                                                                3 => 'Al-Annas',
                                                                4 => 'Al-Falaq',
                                                                5 => 'Al-Lahab',
                                                                6 => 'An-Nasr',
                                                                7 => 'Al-Kafirun',
                                                                8 => 'Al-Kautsar',
                                                                9 => 'Al-Maun',
                                                            ];
                                                        @endphp

                                                        @foreach ($quran_list as $quran_id => $quran_name)
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

                                                        <div class="status">
                                                            <h3>{{ $islamic->quran_stat }}</h3>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="card doa">
                                                        <h4>Hafalan Doa:</h4>

                                                        @php
                                                            $doa_list = [
                                                                1 => 'Makan',
                                                                2 => 'Pasca Makan',
                                                                3 => 'Keluar Rumah',
                                                                4 => 'Naik Kendaraan',
                                                                5 => 'Kebaikan',
                                                                6 => 'Orang Tua',
                                                                7 => 'Masuk WC',
                                                                8 => 'Masuk Masjid',
                                                                9 => 'Belajar',
                                                                10 => 'Mau Tidur',
                                                            ];
                                                        @endphp

                                                        @foreach ($doa_list as $doa_id => $doa_name)
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

                                                        <div class="status">
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
                                                        <img class="check" src="{{ asset('auth') }}/images/icon/check.png"
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
                                                        <img class="check" src="{{ asset('auth') }}/images/icon/check.png"
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
                                                        <img class="check" src="{{ asset('auth') }}/images/icon/check.png"
                                                            alt="">
                                                    </div>
                                                    <div class="col">
                                                        <p>Pre Basic English</p>
                                                    </div>
                                                </div>
                                                <div class="grey-notif">
                                                    <p class="mb-0">Notifikasi : <a>{{ $preschool->english }}</a></p>
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
                                                    <p class="mb-0">Notifikasi : <a>{{ $tematik->kegiatan1 }}</a></p>
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
                                                    <p class="mb-0">Notifikasi : <a>{{ $tematik->kegiatan2 }}</a></p>
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
                                            <p>Vit.Mineral</p>
                                        </div>
                                        <div class="col">
                                            <div class="progress" role="progressbar" aria-label="Success example"
                                                aria-valuenow="{{ $breakfast->menu->vitmineral }}" aria-valuemin="0"
                                                aria-valuemax="100">
                                                <div class="progress-bar bg-success"
                                                    style="width: {{ $breakfast->menu->vitmineral }}%"></div>
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
                                        <iframe width="280" src="{{ $video->video }}" title="YouTube video player"
                                            frameborder="0"
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
                        @if ($recallings->isNotEmpty())
                            <blockquote class="blockquote blockquote-custom shadow rounded mt-3 bg-mustard">
                                <div class="blockquote-custom-icon shadow-sm">
                                    <h5>Re Calling</h5>
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
                                                <img src="{{ asset('auth/images/face/neutral.png') }}" alt="Neutral">
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

            </div>

            <button class="floating-button" id="download-button">Download</button>
        </div>
    </div>

    <script>
        // JavaScript to set the date input value to today's date if it's not manually changed
        document.addEventListener('DOMContentLoaded', (event) => {
            const dateInput = document.getElementById('tanggal');
            if (!dateInput.value) {
                const today = new Date().toISOString().substr(0, 10);
                dateInput.value = today;
            }
        });
    </script>

    <script>
        document.getElementById('download-button').addEventListener('click', function() {
            // Pilih elemen yang ingin Anda unduh sebagai PDF
            var element = document.getElementById('download-container'); // Pilih elemen dengan ID 'download-container'

            // Ambil nilai tanggal dari input
            var tanggal = document.getElementById('tanggal').value;

            // Dapatkan nama siswa dari PHP menggunakan sintaks Blade
            var namaSiswa = "{{ $siswa->nama }}";

            // Buat nama file berdasarkan nama siswa dan tanggal
            var filename = 'Laporan-' + namaSiswa + '-' + tanggal + '.pdf';

            // Opsi untuk html2pdf.js
            var opt = {
                margin: 0.5,
                filename: filename,
                image: {
                    type: 'jpeg',
                    quality: 0.98
                },
                html2canvas: {
                    scale: 2
                }, // Sesuaikan skala (default adalah 2)
                jsPDF: {
                    unit: 'in',
                    format: [13, 20],
                    orientation: 'portrait'
                } // Format halaman lebih besar
            };

            // Membuat PDF
            html2pdf().set(opt).from(element).save();
        });
    </script>

@endsection
