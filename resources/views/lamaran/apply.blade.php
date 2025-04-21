@extends('layouts.main')
@section('navbar')
@extends('partials.navbar', ['activePage' => 'jobs', 'activeJobs'=>'apply'])
@endsection
@section('content')
    <div class="container-xxl py-5">
        <div class="">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="text-start mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s">
                        <h1 class="mb-3 text-center" >Ajukan Lamaran</h1>
                        <p class="text-center">Ambil langkah pertama menuju karier impianmu!</p>
                    </div>
                </div>
                <div class="container-fluid header">
                    <div class="row justify-content-center">
                        <div class="col-md-6 p-5 ">
                            <form action="{{ route('lamaran.store', $job->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <br>
                                <br>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama</label>
                                    <input type="text" class="form-control" name="name" placeholder="Masukan nama lengkap"
                                        required>
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" class="form-control" name="email" placeholder="Masukkan email"
                                        required>
                                </div>

                                <div class="mb-3">
                                    <label for="phone" class="form-label">Nomor Telepon</label>
                                    <input type="text" class="form-control" name="phone"
                                        placeholder="Masukkan nomor WhatsApp" required>
                                </div>

                                <div class="mb-3">
                                    <label for="address" class="form-label">Alamat</label>
                                    <input type="text" class="form-control" name="address"
                                        placeholder="Misalnya : Jl.Jend. Sudirman, Yogyakarta" required>
                                </div>

                                <div class="mb-3">
                                    <label for="cv" class="form-label">Upload CV (PDF)</label>
                                    <input type="file" class="form-control" name="cv" accept=".pdf">
                                </div>

                                <div class="mb-3">
                                    <label for="message" class="form-label">Pesan (Opsional)</label>
                                    <textarea class="form-control" id="message" name="message" rows="4" placeholder="Mengapa kami harus menerimamu"></textarea>
                                </div>

                                <button type="submit" class="btn btn-primary py-3 px-5">Kirim Lamaran</button>
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