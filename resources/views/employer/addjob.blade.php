@extends('layouts.main')
@section('navbar')
    @extends('partials.navbar', ['activePage' => 'jobs', 'activeJobs' => 'addjob'])
@endsection
@section('content')
    <div class="container-xxl py-5">
        <div class="">
            <div class="row g-0 gx-5 align-items-end">
                <div class="col-lg-6">
                    <div class="text-start mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s">
                        <h1 class="mb-3" style="margin-left:30px;">Tambah Pekerjaan</h1>
                        <p style="margin-left:30px;">Temukan Rekan Kerjamu sekarang!</p>
                    </div>
                </div>
                <div class="container-fluid header">
                    <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
                        <div class="col-md-6 p-5">
                            <form action="{{ route('employer.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <br>
                                <br>
                                <div class="mb-3">
                                    <label for="title" class="form-label">Judul Pekerjaan</label>
                                    <input type="text" class="form-control" name="title"
                                        placeholder="Masukan judul pekerjaan" required>
                                </div>

                                <div class="mb-3">
                                    <label for="company" class="form-label">Nama Perusahaan</label>
                                    <input type="text" class="form-control" name="company"
                                        placeholder="Contoh: PT. Tech Indonesia" required>
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label">Deskripsi Pekerjaan</label>
                                    <input type="text" class="form-control" name="description"
                                        placeholder="Jelaskan secara singkat tentang pekerjaan ini" required>
                                </div>

                                <div class="mb-3">
                                    <label for="location" class="form-label">Lokasi</label>
                                    <input type="text" class="form-control" name="location"
                                        placeholder="Contoh: Jakarta, Indonesia" required>
                                </div>

                                <div class="mb-3">
                                    <label for="category" class="form-label">Kategori</label>
                                    <select type="text" class="form-select" name="category" required>
                                        <option value="">-- Pilih Kategori --</option>
                                        <option value="Teknologi">Teknologi</option>
                                        <option value="Keuangan">Keuangan</option>
                                        <option value="Kesehatan">Kesehatan</option>
                                        <option value="Pendidikan">Pendidikan</option>
                                        <option value="Pemasaran">Pemasaran</option>
                                        <option value="Manufaktur">Manufaktur</option>
                                        <option value="Desain">Desain</option>
                                        <option value="Administrasi">Administrasi</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="employment_type" class="form-label">Tipe Pekerjaan</label>
                                    <select type="text" class="form-select" name="employment_type" required>
                                        <option value="">-- Pilih Tipe --</option>
                                        <option value="Full-Time">Full-Time</option>
                                        <option value="Part-Time">Part-Time</option>
                                        <option value="Contract">Contract</option>
                                        <option value="Freelance">Freelance</option>
                                        <option value="Internship">Internship</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="salary" class="form-label">Gaji</label>
                                    <input type="text" class="form-control" name="salary"
                                        placeholder="*tak perlu titik. Contoh: 10000000" required>
                                </div>

                                <div class="mb-3">
                                    <label for="deadline" class="form-label">Batas Akhir Pendaftaran</label>
                                    <input type="datetime-local" class="form-control" name="deadline" required>
                                </div>

                                <div class="mb-3">
                                    <label for="image" class="form-label">Unggah Gambar</label>
                                    <input type="file" class="form-control" name="image">
                                </div>

                                <button type="submit" class="btn btn-primary py-3 px-5">Kirim</button>
                            </form>
                        </div>
                    </div>
                </div>
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