@extends('layouts.layout')

@section('style')
    <style>
        .filebrosur {
            margin-left: -30px;
        }
    </style>
@endsection

@section('hero')
@endsection

@section('main')
    <main id="main">

        <!-- ======= Brosur Section ======= -->
        <section id="brosur" class="brosur section-bg py-5">
            <div class="container" data-aos="fade-up">
                <div class="section-title text-center">
                    <h2>Brosur</h2>
                </div>
                <div class="row d-flex align-items-center">
                    <div class="col-2">
                        <a style="text-decoration: none;">Download File Brosur:</a>
                    </div>
                    <div class="col filebrosur d-flex align-items-center gap-2">
                        @foreach ($filebrosurs as $filebrosur)
                            <a href="{{ route('download.filebrosur', $filebrosur->file) }}" class="mt-1">
                                <i class="bx bxs-file-pdf" style="font-size: 24px;"></i>
                            </a>
                        @endforeach
                    </div>
                </div>

                <div class="row mt-3">
                    @foreach ($brosurs as $brosur)
                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                            <div class="card w-100">
                                <a href="{{ asset('storage/images/' . $brosur->image) }}" download>
                                    <img src="{{ asset('storage/images/' . $brosur->image) }}" class="card-img-top"
                                        alt="Brosur">
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="mt-4">
                    <a href="#" class="btn btn-primary" target="_blank">Daftar Sekarang!</a>
                </div>
            </div>
        </section>
        <!-- End Brosur Section -->

    </main><!-- End #main -->
@endsection
