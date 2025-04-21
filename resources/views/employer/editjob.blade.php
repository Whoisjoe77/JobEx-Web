@extends('layouts.main')
@section('navbar')
    @extends('partials.navbar', ['activePage' => 'jobs', 'activeJobs'=>'editjob']);
@endsection
@section('content')
    <div class="container-xxl py-5">
        <div class="">
            <div class="row g-0 gx-5 align-items-end">
                <div class="col-lg-6">
                    <div class="text-start mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s">
                        <h1 class="mb-3" style="margin-left:30px;">Edit Pekerjaan</h1>
                        <p style="margin-left:30px;">Edit bagian yang perlu diedit!</p>
                    </div>
                </div>
                <div class="container-fluid header">
                    <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
                        <div class="col-md-6 p-5">
                            <form action="{{ route('employer.update', $job->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <br>
                                <br>
                                
                                <img src="{{ asset('storage/' . $job->image) }}" class="img-fluid rounded shadow" alt="Gambar Lowongan" width="100" height="100">
                                <br>
                                <br>
                                <div class="mb-3">
                                    <label for="image" class="form-label">Ubah Gambar</label>
                                    <input type="file" class="form-control" name="image">
                                </div>

                                <div class="mb-3">
                                    <label for="title" class="form-label">Judul Pekerjaan</label>
                                    <input type="text" class="form-control" name="title"
                                        placeholder="Masukan judul pekerjaan" value="{{ $job->title }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="company" class="form-label">Nama Perusahaan</label>
                                    <input type="text" class="form-control" name="company"
                                        placeholder="Contoh: PT. Tech Indonesia" value="{{ $job->company_name }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label">Deskripsi Pekerjaan</label>
                                    <input type="text" class="form-control" name="description"
                                        placeholder="Jelaskan secara singkat tentang pekerjaan ini"
                                        value="{{ $job->description }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="location" class="form-label">Lokasi</label>
                                    <input type="text" class="form-control" name="location"
                                        placeholder="Contoh: Jakarta, Indonesia" value="{{ $job->location }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="category" class="form-label">Kategori</label>
                                    <select class="form-select" name="category" required>
                                        <option value="">-- Pilih Kategori --</option>
                                        <option value="Teknologi" {{ $job->category == 'Teknologi' ? 'selected' : '' }}>
                                            Teknologi</option>
                                        <option value="Keuangan" {{ $job->category == 'Keuangan' ? 'selected' : '' }}>Keuangan
                                        </option>
                                        <option value="Kesehatan" {{ $job->category == 'Kesehatan' ? 'selected' : '' }}>
                                            Kesehatan</option>
                                        <option value="Pendidikan" {{ $job->category == 'Pendidikan' ? 'selected' : '' }}>
                                            Pendidikan</option>
                                        <option value="Pemasaran" {{ $job->category == 'Pemasaran' ? 'selected' : '' }}>
                                            Pemasaran</option>
                                        <option value="Manufaktur" {{ $job->category == 'Manufaktur' ? 'selected' : '' }}>
                                            Manufaktur</option>
                                        <option value="Desain" {{ $job->category == 'Desain' ? 'selected' : '' }}>Desain
                                        </option>
                                        <option value="Administrasi" {{ $job->category == 'Administrasi' ? 'selected' : '' }}>
                                            Administrasi</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="employment_type" class="form-label">Tipe Pekerjaan</label>
                                    <select class="form-select" name="employment_type" required>
                                        <option value="">-- Pilih Tipe --</option>
                                        <option value="Full-Time" {{ $job->employment_type == 'Full-time' ? 'selected' : '' }}>Full-Time</option>
                                        <option value="Part-Time" {{ $job->employment_type == 'Part-time' ? 'selected' : '' }}>Part-Time</option>
                                        <option value="Contract" {{ $job->employment_type == 'Contract' ? 'selected' : '' }}>
                                            Contract</option>
                                        <option value="Freelance" {{ $job->employment_type == 'Freelance' ? 'selected' : '' }}>Freelance</option>
                                        <option value="Internship" {{ $job->employment_type == 'Internship' ? 'selected' : '' }}>Internship</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="salary" class="form-label">Gaji</label>
                                    <input type="text" class="form-control" name="salary"
                                        placeholder="*tak perlu titik. Contoh: 10000000" value="{{ $job->salary }}"
                                        required>
                                </div>

                                <div class="mb-3">
                                    <label for="deadline" class="form-label">Batas Akhir Pendaftaran</label>
                                    <input type="datetime-local" class="form-control" name="deadline"
                                        value="{{ $job->deadline }}" required>
                                </div>


                                <button type="submit" class="btn btn-primary py-3 px-5">Perbarui</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection