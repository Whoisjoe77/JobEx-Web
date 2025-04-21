@extends('layouts.main')

@section('navbar')
    @extends('partials.navbar', ['activePage' => 'home'])
@endsection
@section('content')
    <!-- Header Start -->
    <div class="container-fluid header bg-white p-0">
        <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
            <div class="col-md-6 p-5 mt-lg-5">
                <br>
                <br>
                <h1 class="display-5 animated fadeIn mb-4">Temukan <span class="text-primary"> Kandidat Terbaik</span> untuk
                    Tim Anda</h1>
                <p class="animated fadeIn mb-4 pb-2">Jobex adalah platform rekrutmen yang membantu perusahaan menemukan
                    talenta terbaik, dari fresh graduate hingga profesional berpengalaman. Dengan fitur pencarian dan filter
                    canggih, Anda dapat menjangkau kandidat yang sesuai dengan kebutuhan dan budaya perusahaan Anda.</p>
            </div>
            <div class="col-md-6 animated fadeIn">
                <div class="owl-carousel header-carousel">
                    <div class="owl-carousel-item">
                        <img class="img-fluid" src="{{asset('template/img/carousel-1.jpg')}}" alt="">
                    </div>
                    <div class="owl-carousel-item">
                        <img class="img-fluid" src="{{asset('template/img/carousel-2.jpg')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
@endsection