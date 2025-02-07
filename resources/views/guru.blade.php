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

        .modal {
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.4);
            display: none;
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            width: 80%;
            max-width: 600px;
        }

        .close {
            color: #aaa;
            font-size: 28px;
            font-weight: bold;
            position: absolute;
            top: 10px;
            right: 25px;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                <h5 class="mt-5">Selamat datang di halaman guru</h5>

                <!-- Form Pilih Tanggal -->
                <form action="{{ route('teacher.index') }}" method="GET" class="mb-4 d-flex align-items-end">
                    <div class="me-2">
                        <label for="tanggal" class="form-label">Pilih Tanggal:</label>
                        <input type="date" name="tanggal" id="tanggal" value="{{ $tanggal }}" class="form-control"
                            style="max-width: 300px;">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary mt-2">Tampilkan</button>
                    </div>
                </form>

                <!-- Card untuk Menampilkan Jumlah Orang Tua yang Login -->
                <div class="card mt-4" style="background-color: #e1f5fe; border-radius: 10px; padding: 20px;">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0" style="font-weight: bold; color: #0288d1;">Jumlah Orang Tua yang Login Hari Ini
                        </h5>
                        <div class="badge bg-success text-white p-2" style="font-size: 18px; font-weight: bold;">
                            {{ $jumlahUserLevel2 }} User
                        </div>
                    </div>
                </div>

                <!-- Card untuk Menampilkan Jumlah Download Laporan Hari Ini -->
                <div class="card mt-4" style="background-color: #ffecb3; border-radius: 10px; padding: 20px;">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0" style="font-weight: bold; color: #ff9800;">Jumlah Download Laporan Hari Ini</h5>
                        <div class="badge bg-warning text-white p-2" style="font-size: 18px; font-weight: bold;">
                            {{ $jumlahDownloadHariIni }} Download
                        </div>
                    </div>
                </div>

                <!-- Card Wrapper - Statistik Download -->
                <div class="card mt-4" style="background-color: #d6eaf8; border-radius: 10px; padding: 20px;">
                    <h3 class="text-center">Statistik Download Laporan</h3>
                    <a style="font-size: 12px; color: #0288d1; cursor: pointer;" id="showModal">Selengkapnya</a>
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <canvas id="downloadChart" style="max-width: 100%; height: 300px;"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Modal Detail Download -->
                <div id="downloadModal" class="modal" style="display: none;">
                    <div class="modal-content">
                        <span class="close" id="closeModal">&times;</span>
                        <h4>Detail Download Laporan</h4>
                        <table id="downloadTable" class="table">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Jumlah Klik</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Data download akan diisi oleh JavaScript -->
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Card Wrapper - Welcome Mood -->
                <div class="card mt-4" style="background-color: #f8f2d6; border-radius: 10px; padding: 20px;">
                    <h3 class="text-center">Welcome Mood</h3>
                    <!-- Tampilan Grafik -->
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <canvas id="welcomeMoodChart" style="max-width: 100%; height: 300px;"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Card Wrapper - Recalling -->
                <div class="card mt-4" style="background-color: #f1d6f8; border-radius: 10px; padding: 20px;">
                    <h3 class="text-center">Recalling</h3>
                    <!-- Tampilan Grafik -->
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <canvas id="recallingChart" style="max-width: 100%; height: 300px;"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Card Wrapper - Tingkat Keberhasilan -->
                <div class="card mt-4" style="background-color: #d6f8d9; border-radius: 10px; padding: 20px;">
                    <h3 class="text-center">Tingkat Keberhasilan</h3>
                    <div class="row mt-4">
                        @php
                            $icons = [
                                'increase' => 'auth/images/icons/up.png',
                                'decrease' => 'auth/images/icons/down.png',
                                'equal' => 'auth/images/icons/equal.png',
                            ];
                        @endphp
                        @foreach (['Happy', 'Neutral', 'Sad'] as $key)
                            <div class="col-md-4 text-center">
                                <h6>{{ $key }}</h6>
                                <img src="{{ asset($icons[$statusKeberhasilan[$key]]) }}"
                                    alt="{{ $statusKeberhasilan[$key] }}" class="img-fluid" style="max-width: 50px;">
                                <p class="mt-2">
                                    @if ($statusKeberhasilan[$key] == 'increase')
                                        Ada peningkatan
                                    @elseif ($statusKeberhasilan[$key] == 'decrease')
                                        Ada penurunan
                                    @else
                                        Tetap sama
                                    @endif
                                </p>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        // Data untuk orangtua yang klik download
        var ctxDownload = document.getElementById('downloadChart').getContext('2d');
        var downloadChart = new Chart(ctxDownload, {
            type: 'line',
            data: {
                labels: {!! json_encode($downloadLabels) !!},
                datasets: [{
                    label: 'Jumlah Download',
                    data: {!! json_encode($downloadCounts) !!},
                    backgroundColor: '#42A5F5',
                    borderColor: '#1E88E5',
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        suggestedMin: 0, // Menentukan nilai minimal y-axis
                        suggestedMax: 100 // Menentukan nilai maksimal y-axis
                    }
                }
            }
        });

        // Data untuk Welcome Mood
        var welcomeMoodData = {
            labels: ['Sad', 'Neutral', 'Happy'],
            datasets: [{
                label: 'Persentase Welcome Mood',
                data: [{{ round($persentaseWelcome['Sad'] ?? 0, 2) }},
                    {{ round($persentaseWelcome['Neutral'] ?? 0, 2) }},
                    {{ round($persentaseWelcome['Happy'] ?? 0, 2) }}
                ],
                backgroundColor: ['#ff6f61', '#f8b400', '#4caf50'],
                borderColor: ['#ff6f61', '#f8b400', '#4caf50'],
                borderWidth: 2,
                fill: false, // Menghapus pengisian area di bawah grafik
                tension: 0.4 // Membuat garis sedikit melengkung
            }]
        };

        // Data untuk Recalling
        var recallingData = {
            labels: ['Sad', 'Neutral', 'Happy'],
            datasets: [{
                label: 'Persentase Recalling',
                data: [{{ round($persentaseRecalling['Sad'] ?? 0, 2) }},
                    {{ round($persentaseRecalling['Neutral'] ?? 0, 2) }},
                    {{ round($persentaseRecalling['Happy'] ?? 0, 2) }}
                ],
                backgroundColor: ['#ff6f61', '#f8b400', '#4caf50'],
                borderColor: ['#ff6f61', '#f8b400', '#4caf50'],
                borderWidth: 2,
                fill: false, // Menghapus pengisian area di bawah grafik
                tension: 0.4 // Membuat garis sedikit melengkung
            }]
        };

        // Konfigurasi untuk Welcome Mood - Line Chart
        var ctxWelcomeMood = document.getElementById('welcomeMoodChart').getContext('2d');
        var welcomeMoodChart = new Chart(ctxWelcomeMood, {
            type: 'line', // Ubah tipe menjadi line
            data: welcomeMoodData,
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        suggestedMin: 0, // Menentukan nilai minimal y-axis
                        suggestedMax: 100 // Menentukan nilai maksimal y-axis
                    }
                }
            }
        });

        // Konfigurasi untuk Recalling - Line Chart
        var ctxRecalling = document.getElementById('recallingChart').getContext('2d');
        var recallingChart = new Chart(ctxRecalling, {
            type: 'line', // Ubah tipe menjadi line
            data: recallingData,
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        suggestedMin: 0, // Menentukan nilai minimal y-axis
                        suggestedMax: 100 // Menentukan nilai maksimal y-axis
                    }
                }
            }
        });
    </script>

    <!-- JavaScript untuk menangani klik dan menampilkan modal detail download -->
    <script>
        document.getElementById("showModal").onclick = function() {
            const tanggal = document.getElementById("tanggal").value;

            fetch(`/get-download-statistics?tanggal=${tanggal}`)
                .then(response => response.json())
                .then(data => {
                    const tbody = document.getElementById('downloadTable').getElementsByTagName('tbody')[0];
                    tbody.innerHTML = ''; // Kosongkan tabel sebelum menambahkan data baru

                    data.downloads.forEach(item => {
                        const row = tbody.insertRow();
                        const cellName = row.insertCell(0);
                        const cellCount = row.insertCell(1);

                        cellName.textContent = item.name;
                        cellCount.textContent = item.jumlah;
                    });

                    document.getElementById("downloadModal").style.display = "flex";
                });
        };

        document.getElementById("closeModal").onclick = function() {
            document.getElementById("downloadModal").style.display = "none";
        };

        // Tutup modal jika area di luar modal diklik
        window.onclick = function(event) {
            if (event.target == document.getElementById("downloadModal")) {
                document.getElementById("downloadModal").style.display = "none";
            }
        };
    </script>
@endsection
