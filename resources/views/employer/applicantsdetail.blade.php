@extends('layouts.main')

@section('navbar')
    @extends('partials.navbar', ['activePage' => 'jobs', 'activeJobs' => 'applicantsdetail'])
@endsection

@section('content')

    <style>
        .tes {
            margin-top: 100px !important;
        }
    </style>

    <!-- Detail Pelamar -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row align-items-start">
                <!-- Informasi Pelamar -->
                <div class="col-md-6 d-flex flex-column justify-content-start ps-md-4">
                    <h1 class="mb-3 fw-bold">{{ $lamarans->name }}</h1>
                    <p class="mb-4 text-muted">Detail pelamar untuk lowongan <strong>{{ $lamarans->job->title }}</strong>
                    </p>

                    <ul class="list-unstyled mb-4">
                        <li class="mb-2"><strong>📧 Email:</strong> {{ $lamarans->email }}</li>
                        <li class="mb-2" style="margin-top:3%;"><strong>📍 Alamat:</strong> {{ $lamarans->address }}</li>
                        <li class="mb-2" style="margin-top:3%;"><strong>🗓 Tanggal Lamar:</strong>
                            {{ $lamarans->created_at->format('d M Y H:i') }}</li>
                        <li class="mb-2" style="margin-top:3%;"><strong>📄 Status:</strong>
                            {{ ucfirst($lamarans->status ?? 'menunggu') }}</li>
                        <li class="mb-2" style="margin-top:3%;"><strong>📢 Pesan:</strong>
                            {{ ucfirst($lamarans->message ?? '-') }}</li>
                        @if ($lamarans->cv_path)
                            <div class="mb-3" style="margin-top:18px;">
                                <a href="{{ asset('storage/' . $lamarans->cv_path) }}" download class="btn btn-outline-primary">
                                    <i class="bi bi-download me-1"></i> Lihat / Unduh CV
                                </a>
                            </div>
                        @endif
                        <form action="{{ route('employer.lamaransupdate', $lamarans->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select name="status" id="status" class="form-select">
                                    <option value="dipertimbangkan" {{ $lamarans->status == 'dipertimbangkan' ? 'selected' : '' }}>Dipertimbangkan</option>
                                    <option value="diterima" {{ $lamarans->status == 'diterima' ? 'selected' : '' }}>Diterima
                                    </option>
                                    <option value="ditolak" {{ $lamarans->status == 'ditolak' ? 'selected' : '' }}>Ditolak
                                    </option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="catatan" class="form-label">Catatan</label>
                                <textarea name="catatan" id="catatan"
                                    class="form-control">{{ $lamarans->catatan }}</textarea>
                            </div>

                            <div class="btn-group" role="group">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modal-hapus-{{ $lamarans->id }}">Hapus</button>
                            </div>
                        </form>

                    </ul>
                </div>
            </div>
        </div>

        <!-- Modal Hapus -->
        <div class="modal fade tes" id="modal-hapus-{{ $lamarans->id }}" tabindex="-1"
            aria-labelledby="modalHapusLabel-{{ $lamarans->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <form action="{{ route('employer.lamaransdelete', $lamarans->id) }}" method="POST" class="modal-content">
                    @csrf
                    @method('DELETE')
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalHapusLabel-{{ $lamarans->id }}">Konfirmasi Hapus</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Apakah Anda yakin ingin menghapus lamaran dari <strong>{{ $lamarans->name }}</strong>?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </div>
                </form>
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