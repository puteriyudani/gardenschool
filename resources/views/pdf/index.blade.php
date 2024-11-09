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

                <h5>PDF</h5>
                <br>
                <a href="{{ route('pdf.create') }}">Tambah Data</a>
                <div class="table-responsive">
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
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $pdf->judul }}</td>
                                    <td>{{ $pdf->keterangan }}</td>
                                    <td>
                                        <object data="{{ asset('/storage/file/' . $pdf->file) }}" type="application/pdf"
                                            width="100%" height="300">
                                            <p>Browser Anda tidak dapat menampilkan PDF. <a
                                                    href="{{ asset('/storage/file/' . $pdf->file) }}" download>Klik di sini
                                                    untuk mengunduh PDF</a>.</p>
                                        </object>
                                    </td>
                                    <td>
                                        <form action="{{ route('pdf.destroy', $pdf->id) }}" method="POST">
                                            <a href="{{ route('pdf.edit', $pdf->id) }}" style="text-decoration: none;">
                                                edit
                                            </a>

                                            @csrf
                                            @method('DELETE')

                                            <button class="btn mb-1" type="submit" style="color: red">
                                                hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{ $pdfs->links() }}
            </div>
        </div>
    </div>
@endsection
