@extends('layouts.main')

@section('navbar')
    @extends('partials.navbar', ['activePage' => 'jobs', 'activeJobs' => 'myjobs'])
@endsection

@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        .job-item {
            transition: box-shadow 0.3s ease;
            cursor: pointer;
            background: #fff;
            /* Tambah background putih */
            padding: 10px;
            /* Biar shadow terlihat jelas */
            border-radius: 8px;
            /* Supaya lebih lembut */
        }


        .job-item:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .tes {
            margin-top: 100px !important;
        }
    </style>


    <!-- Search Start -->
    <div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
        <div class="container">
            <div class="row g-2">
                <div class="col-md-10">
                    <div class="row g-2">
                        <div class="col-md-4">
                            <input type="text" class="form-control border-0 py-3" placeholder="Temukan Pekerjaan">
                        </div>
                        <div class="col-md-4">
                            <select class="form-select border-0 py-3">
                                <option selected>Tipe Pekerjaan</option>
                                <option value="1">Tipe Pekerjaan 1</option>
                                <option value="2">Tipe Pekerjaan 2</option>
                                <option value="3">Tipe Pekerjaan 3</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select class="form-select border-0 py-3">
                                <option selected>Lokasi</option>
                                <option value="1">Lokasi 1</option>
                                <option value="2">Lokasi 2</option>
                                <option value="3">Lokasi 3</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-dark border-0 w-100 py-3">Cari</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Search End -->

    <!-- jobs start -->
    <div class="container-xxl py-5" style="margin-top : -60px;">
        <div class="container">
            <div class="row g-0 gx-5 align-items-end">
                <div class="col-lg-6" style="margin-bottom:-30px;">
                    <div class="text-start mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s">
                        <h1 class="mb-3">Lowongan Favorit</h1>
                        <p>Berikut adalah daftar lowongan kerja yang telah Anda tandai sebagai favorit. Tinjau kembali
                            setiap posisi untuk menemukan peluang terbaik yang sesuai dengan minat dan tujuan karier Anda!
                        </p>
                    </div>
                </div>
            </div>
            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <div class="row g-4" id="job-list">
                        <!-- job-list -->
                        <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s">
                            <a class="btn btn-primary py-3 px-5" href="">Browse More Jobs</a>
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
    <script>
        $(document).ready(function () {
            $.ajax({
                url: "{{ route('favorites.data') }}",
                type: "GET",
                dataType: "json",
                success: function (data) {
                    let jobsHtml = '';
                    data.forEach(job => {
                        jobsHtml += `
                                <a href="/jobs/detail/${job.id}">
                                <div class="col-12 wow fadeInUp position-relative" style="margin-bottom : -20px;" data-wow-delay="0.1s">
                                    <div class="d-flex border rounded p-3 align-items-start job-item">
                                    <img src="${job.image ? `/storage/${job.image}` : '/img/default-profile.jpg'}" 
                                    alt="Job Image" 
                                    width="80" height="80" 
                                    class="me-3 rounded">
                                    <div>
                                    <h5 class="mb-1">${job.title}</h5>
                                    <p class="mb-1">${job.company_name ?? 'Nama Perusahaan'}</p>
                                    <p class="mb-0 text-muted">${job.description}</p>
                                    <div class="dropdown position-absolute" style="top: 18px; right: 25px;">
          <button class="btn btn-sm p-0 border-0 bg-transparent" type="button" data-bs-toggle="dropdown" aria-expanded="false">
          </a>
            <i class="bi bi-three-dots-vertical fs-5 text-secondary"></i>
          </button>
          <ul class="dropdown-menu dropdown-menu-end shadow-none border rounded-2">
            <li><a class="dropdown-item" href="/jobs/detail/${job.id}">Detail</a></li>
            <li><a class="dropdown-item" href="/lamaran/${job.id}/apply">Lamar</a></li>
            <li>
                 <button class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#modal-hapus-${job.id}">
                                    Hapus
                                </button>
            </li>
          </ul>
        </div>

                                                                </div>
                                                            </div>
                                                        </div>

                                                    <!-- Modal Hapus -->
                                <div class="modal fade tes" id="modal-hapus-${job.id}" tabindex="-1" aria-labelledby="modalHapusLabel-${job.id}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <form action="/jobs/favorites/delete/${job.id}" method="POST" class="modal-content">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalHapusLabel-${job.id}">Konfirmasi Hapus</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah Anda yakin ingin menghapus lowongan <strong>${job.title}</strong> dari <strong>${job.company_name} dari lowongan favorit anda</strong>?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                                        `;

                    });
                    $('#job-list').html(jobsHtml);
                }
            });
        });
    </script>

@endsection