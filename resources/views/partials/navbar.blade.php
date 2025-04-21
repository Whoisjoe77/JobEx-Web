<!-- Navbar Start -->
<div class="container-fluid nav-bar bg-transparent">
    <nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-4">
        <a href="index.html" class="navbar-brand d-flex align-items-center text-center">
            <div class="icon p-2 me-2">
                <img class="img-fluid" src="{{asset('template/img/icon-deal.png')}}" alt="Icon"
                    style="width: 30px; height: 30px;">
            </div>
            <h1 class="m-0 text-primary">JobEx</h1>
        </a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto">
                @role('employer')
                <a href="{{route('employer.home')}}"
                    class="nav-item nav-link {{ ($activePage ?? '') === 'home' ? 'active' : '' }}">Beranda</a>
                @endrole
                @role('job_seeker')
                <a href="{{route('dashboard.home')}}"
                    class="nav-item nav-link {{ ($activePage ?? '') === 'home' ? 'active' : '' }}">Beranda</a>
                @endrole
                <a href="" class="nav-item nav-link {{ ($activePage ?? '') === 'about' ? 'active' : '' }}">Tentang </a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle {{ ($activePage ?? '') === 'jobs' ? 'active' : '' }}"
                        data-bs-toggle="dropdown">Pekerjaan</a>
                    <div class="dropdown-menu rounded-0 m-0">
                        @role('job_seeker')
                        <a href="{{route('jobs.joblist')}}" class="dropdown-item {{ ($activeJobs ?? '') === 'joblist' ? 'active' : '' }}">Daftar Pekerjaan</a>
                        <a href="{{route('jobs.favoritejobs')}}" class="dropdown-item {{ ($activeJobs ?? '') === 'joblist' ? '' : '' }}">Favorit</a>
                        
                        @if(($activeJobs ?? '') === 'jobdetail' && isset($job))
                            <a href="{{ route('jobs.detail', $job->id) }}" class="dropdown-item active">Detail
                                Pekerjaan</a>
                        @endif
                        @if(($activeJobs ?? '') === 'apply' && isset($job))
                        <a href="{{ route('jobs.detail', $job->id) }}" class="dropdown-item">Detail
                                Pekerjaan</a>
                        <a href="{{route('lamaran.apply', $job->id)}}" class="dropdown-item active">Lamar Pekerjaan</a>
                        @endif
                        @endrole
                        
                        @role('employer')
                        <a href="{{ route('employer.myjobs') }}" class="dropdown-item {{ ($activeJobs ?? '') === 'myjobs' ? 'active' : '' }}">Daftar Pekerjaan</a>
                        @if(($activeJobs ?? '') === 'jobdetail' && isset($job))
                            <a href="{{ route('employer.jobdetail', $job->id) }}" class="dropdown-item active">Detail
                                Pekerjaan</a>
                        @endif
                        @if(($activeJobs ?? '') === 'applicants' && isset($job))
                            <a href="{{ route('employer.applicants', $job->id) }}" class="dropdown-item active">Daftar Pelamar</a>
                        @endif
                        @if(($activeJobs ?? '') === 'applicantsdetail' && isset($job, $lamarans))
                            <a href="{{ route('employer.applicants', $job->id) }}" class="dropdown-item">Daftar Pelamar</a>
                            <a href="{{ route('employer.applicantsdetail', $lamarans->id) }}" class="dropdown-item active">Detail Pelamar</a>
                        @endif
                        @if(($activeJobs ?? '') === 'editjob' && isset($job))
                            <a href="{{ route('employer.jobdetail', $job->id) }}" class="dropdown-item">Detail
                                Pekerjaan</a>
                            <a href="{{ route('employer.editjob', $job->id) }}" class="dropdown-item active">Edit
                                Pekerjaan</a>
                        @endif
                        <a href="{{ route('employer.addjob') }}" class="dropdown-item {{ ($activeJobs ?? '') === 'addjob' ? 'active' : '' }}">Tambah Pekerjaan</a>
                        @endrole

                    </div>
                </div>
                <a href="contact.html" class="nav-item nav-link">Kontak</a>
            </div>
            <a href="{{ route('logout') }}" class="btn btn-secondary px-3 d-none d-lg-flex">LOGOUT</a>
        </div>
    </nav>
</div>
<!-- Navbar End -->