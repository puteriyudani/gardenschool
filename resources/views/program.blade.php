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
                                        <a href="{{ asset('/storage/file/' . $item['pdf_file']) }}"
                                            download="{{ $item['judul'] }}.pdf">
                                            <i class="bx bxs-file-pdf" style="font-size: 24px; color: rgb(73, 73, 73);"></i>
                                        </a>
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
