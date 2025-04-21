@extends('layouts.main')
@section('navbar')
    @extends('partials.navbar')
@endsection
@section('content')
    <div class="container-xxl py-5">
        <div class="text-center">
            <h1 class="primary mb-4">Lamaranmu Berhasil Dikirim!</h1>
            <p class="mb-4">Terima kasih telah mengajukan lamaran. Kami akan segera meninjaunya. Semoga sukses!</p>

            <div class="d-flex justify-content-center gap-3 mt-4">
                <a href="{{ route('jobs.joblist') }}" class="btn btn-outline-primary px-4 py-2">Lihat Pekerjaan Lain</a>
                <a href="{{ route('dashboard.home') }}" class="btn btn-primary px-4 py-2">Kembali ke Beranda</a>
            </div>
        </div>
    </div>
    <link href="
            https://cdn.jsdelivr.net/npm/sweetalert2@11.19.1/dist/sweetalert2.min.css
            " rel="stylesheet">
    <script src="
            https://cdn.jsdelivr.net/npm/sweetalert2@11.19.1/dist/sweetalert2.all.min.js
            "></script>

    @if ($message = Session::get('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: "{{ $message }}",
            });
        </script>
    @endif
@endsection

@section('script')
@endsection