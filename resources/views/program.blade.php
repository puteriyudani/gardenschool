@extends('layouts.layout')

@section('style')
@endsection


@section('hero')
@endsection

@section('main')
    <main id="main">

        <!-- ======= Program Section ======= -->
        <section id="program" class="testimonials section-bg">
            <div class="container" data-aos="fade-up">
                @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                @endif

                <!-- Tanda Login -->
                <div class="mb-4 d-flex justify-content-between align-items-center">
                    @if (auth()->check() && auth()->user()->level == 'pembeli')
                        <div class="alert alert-success mb-0" role="alert">
                            Selamat datang, {{ auth()->user()->name }}! Anda login sebagai mitra.
                        </div>
                    @endif

                    @if (auth()->check() && auth()->user()->level == 'pembeli')
                        <form action="{{ route('logoutpembeli') }}" style="margin: 0;">
                            <button type="submit" class="btn btn-danger btn-sm">Logout</button>
                        </form>
                    @endif
                </div>

                <!-- Tabel Program Garden School Indonesia -->
                <div class="section-title">
                    <h2>Program Garden School Indonesia</h2>
                </div>

                <!-- Pilih Kelompok -->
                <div class="mb-3">
                    <strong>Pilih Kelompok:</strong>
                    @foreach ($kelompokList as $kelompok)
                        <a href="{{ route('program.index', ['kelompok' => $kelompok]) }}"
                            class="btn {{ $kelompok == $selectedKelompok ? 'btn-primary' : 'btn-outline-primary' }}">
                            {{ $kelompok }}
                        </a>
                    @endforeach
                </div>

                <div class="table-responsive">
                    @foreach ($groupedPdfs as $kelompok => $temaGroup)
                        <h6><u>Kelompok: {{ $kelompok }}</u></h6>
                        @foreach ($temaGroup as $tema => $topikGroup)
                            <h6
                                class="mt-4 fw-bold
                        {{ auth()->check() && auth()->user()->level == 'pembeli' ? 'text-success' : 'text-muted' }}">
                                Tema {{ $loop->iteration }}: {{ $tema }}
                            </h6>
                            @foreach ($topikGroup as $topik => $pdfs)
                                <h6
                                    class="ms-3 fw-bold
                            {{ auth()->check() && auth()->user()->level == 'pembeli' ? 'text-primary' : 'text-muted' }}">
                                    Topik {{ $loop->iteration }}: {{ $topik }}
                                </h6>

                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Sub Topik</th>
                                            <th>Judul</th>
                                            <th>Keterangan</th>
                                            <th>Dokumen</th>
                                            <th>Video</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pdfs as $pdf)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td class="text-warning fw-bold">
                                                    @if (auth()->check() && auth()->user()->level == 'pembeli')
                                                        {{ $pdf->subtopik->subtopik ?? '-' }}
                                                    @else
                                                        @if (!empty($pdf->subtopik->subtopik))
                                                            <a style="text-decoration: none;" data-bs-toggle="modal"
                                                                data-bs-target="#loginModal">
                                                                {{ $pdf->subtopik->subtopik }}
                                                            </a>
                                                        @else
                                                            -
                                                        @endif
                                                    @endif
                                                </td>
                                                <td>{{ $pdf->judul }}</td>
                                                <td>
                                                    @if (auth()->check() && auth()->user()->level == 'pembeli')
                                                        {{ $pdf->keterangan }}
                                                    @else
                                                        <span>Harus login untuk mengakses keterangan</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if (auth()->check() && auth()->user()->level == 'pembeli')
                                                        <a href="{{ asset('/storage/file/' . $pdf->file) }}"
                                                            download="{{ $pdf->judul }}.pdf">
                                                            <i class="bx bxs-file-pdf"
                                                                style="font-size: 24px; color: rgb(73, 73, 73);"></i>
                                                        </a>
                                                    @else
                                                        <span>Harus login untuk mengakses PDF</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if (auth()->check() && auth()->user()->level == 'pembeli')
                                                        @if ($pdf->youtubes->isNotEmpty())
                                                            @foreach ($pdf->youtubes as $youtube)
                                                                <iframe width="auto" height="auto"
                                                                    src="{{ $youtube->link }}" title="YouTube video player"
                                                                    frameborder="0"
                                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                                    allowfullscreen>
                                                                </iframe>
                                                            @endforeach
                                                        @else
                                                            Tidak ada video
                                                        @endif
                                                    @else
                                                        @if ($pdf->youtubes->isNotEmpty())
                                                            @foreach ($pdf->youtubes as $youtube)
                                                                @php
                                                                    preg_match(
                                                                        '/\/embed\/([^?]*)/',
                                                                        $youtube->link,
                                                                        $matches,
                                                                    );
                                                                    $videoId = $matches[1] ?? null;
                                                                    $thumbnailUrl = $videoId
                                                                        ? "https://img.youtube.com/vi/{$videoId}/maxresdefault.jpg"
                                                                        : null;
                                                                @endphp
                                                                @if ($thumbnailUrl)
                                                                    <a href="#" data-bs-toggle="modal"
                                                                        data-bs-target="#loginModal">
                                                                        <img src="{{ $thumbnailUrl }}" alt="Thumbnail"
                                                                            style="width: 200px; height: auto; border-radius: 5px;">
                                                                    </a>
                                                                @endif
                                                            @endforeach
                                                        @else
                                                            Tidak ada video
                                                        @endif
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endforeach
                        @endforeach
                    @endforeach
                </div>
                <!-- Modal -->
                <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="loginModalLabel">Akses Dibatasi</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Keterangan lebih lanjut mengenai program ini hanya bisa diakses bagi mitra GS. Segera buat
                                akun Anda untuk bermitra.
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                <a href="{{ route('loginpembeli') }}" class="btn btn-primary">Login</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!-- End Program Section -->

    </main><!-- End #main -->
@endsection
