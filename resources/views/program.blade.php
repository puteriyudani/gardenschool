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

                <!-- Tanda Login -->
                <div class="mb-4 d-flex justify-content-between align-items-center">
                    @if (auth()->check() && auth()->user()->level == 'pembeli')
                        <div class="alert alert-success mb-0" role="alert">
                            Selamat datang, {{ auth()->user()->name }}! Anda login sebagai pembeli.
                        </div>
                    @else
                        <div class="alert alert-info mb-0" role="alert">
                            Anda belum login. Login untuk mengakses fitur lengkap.
                        </div>
                    @endif

                    @if (auth()->check() && auth()->user()->level == 'pembeli')
                        <form action="{{ route('logoutpembeli') }}" style="margin: 0;">
                            <button type="submit" class="btn btn-danger btn-sm">Logout</button>
                        </form>
                    @endif
                </div>

                <!-- Tabel Gabungan Montessory -->
                <div class="section-title">
                    <h2>Montessory</h2>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Judul</th>
                                <th>Keterangan</th>
                                <th>Dokumen</th>
                                <th>Video</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $item['judul'] }}</td>
                                    <td>{{ $item['pdf_keterangan'] }}</td>
                                    <td>
                                        @if (auth()->check() && auth()->user()->level == 'pembeli')
                                            <a href="{{ asset('/storage/file/' . $item['pdf_file']) }}"
                                                download="{{ $item['judul'] }}.pdf">
                                                <i class="bx bxs-file-pdf"
                                                    style="font-size: 24px; color: rgb(73, 73, 73);"></i>
                                            </a>
                                        @else
                                            <span>Harus login untuk mengakses PDF</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item['youtube_link'])
                                            <iframe width="auto" height="auto" src="{{ $item['youtube_link'] }}"
                                                title="YouTube video player" frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                allowfullscreen>
                                            </iframe>
                                        @else
                                            Tidak ada video
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>

            </div>
        </section>
        <!-- End Program Section -->

    </main><!-- End #main -->
@endsection
