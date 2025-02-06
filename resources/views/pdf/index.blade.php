@extends('layouts.auth')

@section('judul')
    <title>Montessory - PDF</title>
@endsection

@section('content')
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">

        @include('include.sidebar')

        <!--  Main wrapper -->
        <div class="body-wrapper">
            @include('include.header-admin')
            <div class="container-fluid">
                @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                @endif

                <h5>PDF</h5>
                <br>
                <a href="{{ route('pdf.create') }}" class="btn btn-success mb-3">Tambah Data</a>

                <!-- Pilih Kelompok -->
                <div class="mb-3">
                    <strong>Pilih Kelompok:</strong>
                    @foreach ($kelompokList as $kelompok)
                        <a href="{{ route('pdf.index', ['kelompok' => $kelompok]) }}"
                            class="btn {{ $kelompok == $selectedKelompok ? 'btn-primary' : 'btn-outline-primary' }}">
                            {{ $kelompok }}
                        </a>
                    @endforeach
                </div>

                <div class="table-responsive">
                    @foreach ($groupedPdfs as $kelompok => $temaGroup)
                        <h6><u>Kelompok: {{ $kelompok }}</u></h6>
                        @foreach ($temaGroup as $tema => $topikGroup)
                            <h6 class="mt-4 text-success fw-bold">Tema {{ $loop->iteration }}: {{ $tema }}</h6>
                            @foreach ($topikGroup as $topik => $subtopikGroup)
                                <h6 class="ms-3 text-primary"><strong>Topik {{ $loop->iteration }}:
                                        {{ $topik }}</strong></h6>

                                @foreach ($subtopikGroup as $subtopik => $pdfs)
                                    <h6 class="ms-5 text-warning"><strong>Subtopik {{ $loop->iteration }}:
                                            {{ $subtopik }}</strong></h6>

                                    <!-- Variabel untuk nomor urut per Subtopik -->
                                    @php $counter = 1; @endphp

                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Judul</th>
                                                <th scope="col">Keterangan</th>
                                                <th scope="col">File</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pdfs as $pdf)
                                                <tr>
                                                    <td>{{ $counter++ }}</td>
                                                    <td>{{ $pdf->judul }}</td>
                                                    <td>{{ $pdf->keterangan }}</td>
                                                    <td>
                                                        <object data="{{ asset('/storage/file/' . $pdf->file) }}"
                                                            type="application/pdf" width="100%" height="300">
                                                            <p>Browser Anda tidak dapat menampilkan PDF. <a
                                                                    href="{{ asset('/storage/file/' . $pdf->file) }}"
                                                                    download>
                                                                    Klik di sini untuk mengunduh PDF
                                                                </a>.
                                                            </p>
                                                        </object>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('pdf.edit', $pdf->id) }}"
                                                            class="btn btn-warning btn-sm">
                                                            Edit
                                                        </a>
                                                        <form action="{{ route('pdf.destroy', $pdf->id) }}" method="POST"
                                                            style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm">
                                                                Hapus
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @endforeach
                            @endforeach
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
