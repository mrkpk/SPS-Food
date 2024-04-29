@extends('/layout.mainlayout')

@section('title', 'Resep')

@section('content')


    <div class="receipe-post-area section-padding-0-80">
        <div class="container" style="z-index: auto">
            <section class="about-area" style="padding-top: 20px">
                <div class="container">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb" style="background-color: transparent">
                            <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                            <li class="breadcrumb-item"><a href="/receipe">Resep</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $menu->nama_menu }}</li>
                        </ol>
                    </nav>
                </div>
            </section>

            <!-- Receipe Slider -->


            {{-- <div class="hero-area">
            <div class="bg-img" style="background-image: url(/storage/public/{{ $menu->gambar_path }}); height: 1000px;">
                <div class="container">
                    <div class="row h-100 align-items-center">
                        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                            <div class="container">
                                <h2 data-delay="300ms"></h2>
                                <p data-delay="700ms"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}



            <!-- Receipe Content Area -->
            <div class="receipe-content-area">
                <div class="container" style="outline: 3px solid #e4a402; padding-top: 10px">
                    <div class="row">
                        <div class="col-lg-4 col-md-3 col-2">
                            <div class="receipe-ratings text-right my-5">
                                @if (isset($menu->video_path))
                                    <a class="venobox" data-autoplay="true" data-vbtype="video"
                                        href="/storage/public/{{ $menu->video_path }}"><i
                                            class="fa fa-play-circle fa-lg"></i></a>
                                @endif
                                <br>
                                <br>
                                @if (isset($menu->link))
                                    <a href="{{ $menu->link }}" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                                @endif

                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-8">
                            <img style="margin:0 auto" src="/storage/public/{{ $menu->gambar_path }}" alt="">
                            <!-- Post Date -->
                        </div>
                        <div class="col-lg-4 col-md-3">
                            <div class="receipe-duration">
                                @if ($menu->persiapan > 0)
                                    <h6><span class="sp">Persiapan</span> <br>{{ $menu->persiapan }} mins</h6>
                                @endif
                                @if ($menu->durasi > 0)
                                    <h6><span class="sp">Memasak</span><br>{{ $menu->durasi }} mins</h6>
                                @endif
                                @if ($menu->porsi > 0)
                                    <h6><span class="sp">Porsi</span><br>{{ $menu->porsi }} Porsi</h6>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-12" style="text-align: center">
                            <div class="receipe-headline my-5">
                                <span>{{ $menu->created_at->format('F d, Y') }} </span>
                                <div class="blog-content mb-50">
                                    <a href="#" class="post-title">{{ $menu->nama_menu }}</a>
                                    @if ($menu->oleh != null)
                                        <div class="meta-data">by <a href="#">{{ $menu->oleh }}</a>
                                            <br>
                                        </div>
                                    @endif
                                </div>


                            </div>
                        </div>


                    </div>

                    <div class="row">
                        <div class="col-12 col-lg-4">
                            <div class="row">
                                <div class="col-12 col-md-6 col-lg-12 ingredients">
                                    <h4 style="margin-bottom: 0%">Bumbu</h4>


                                    @php
                                        $i = 0;
                                    @endphp
                                    @foreach ($bumbu as $bum)
                                        <div class="custom-control custom-checkbox asw" style="margin-bottom: 0%">

                                            <label class="custom-control-label">{{ $bumbu[$i]->bahan }}</label>
                                        </div>
                                        @php $i++; @endphp
                                    @endforeach
                                    <!-- Custom Checkbox -->



                                </div>

                                <div class="col-12 col-md-6 col-lg-12 mt-3 ingredients">
                                    <h4 style="margin-bottom: 0%">Bahan</h4>
                                    @php
                                        $i = 0;
                                    @endphp
                                    @foreach ($bahan as $bah)
                                        <div class="custom-control custom-checkbox asw" style="margin-bottom: 0%">

                                            <label class="custom-control-label"
                                                for="customCheck2{{ $i + 1 }}">{{ $bahan[$i]->bahan }}</label>
                                        </div>
                                        @php $i++; @endphp
                                    @endforeach
                                    <!-- Custom Checkbox -->


                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-8">
                            <h1 class="head-1">
                                Cara Memasak
                            </h1>
                            <!-- Single Preparation Step -->
                            @php
                                $i = 0;
                            @endphp
                            @foreach ($proses as $pros)
                                <div class="single-preparation-step d-flex">
                                    @if ($i < 9)
                                        <h4>0{{ $i + 1 }}.</h4>
                                    @endif
                                    @if ($i >= 9)
                                        <h4>{{ $i + 1 }}.</h4>
                                    @endif
                                    <h6>
                                        {{ $proses[$i]->proses }}
                                    </h6>
                                </div>
                                @php $i++; @endphp
                            @endforeach

                        </div>

                        <!-- Ingredients -->


                    </div>
                    <br> <br>
                    <hr>
                    <br>
                    <!--<div class="row">-->
                    <!--    <div class="col-12">-->
                    <!--        <div class="section-heading text-left">-->
                    <!--            <h4>Leave a comment</h4>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->

                    <!--<div class="row">-->
                    <!--    <div class="col-8">-->
                    <!--        <div class="contact-form-area">-->
                    <!--            <form action="#" method="post">-->
                    <!--                <div class="row">-->
                    <!--                    <div class="col-12 col-lg-6">-->
                    <!--                        <input type="text" class="form-control" id="name" placeholder="Name">-->
                    <!--                    </div>-->
                    <!--                    <div class="col-12 col-lg-6">-->
                    <!--                        <input type="email" class="form-control" id="email" placeholder="E-mail">-->
                    <!--                    </div>-->
                    <!--                    <div class="col-12">-->
                    <!--                        <input type="text" class="form-control" id="subject" placeholder="Subject">-->
                    <!--                    </div>-->
                    <!--                    <div class="col-12">-->
                    <!--                        <textarea name="message" class="form-control" id="message" cols="30" rows="10" placeholder="Message"></textarea>-->
                    <!--                    </div>-->
                    <!--                    <div class="col-12">-->
                    <!--                        <button class="btn delicious-btn mt-30" type="submit">Post Comments</button>-->
                    <!--                    </div>-->
                    <!--                </div>-->
                    <!--            </form>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                </div>
            </div>
        </div>
    </div>

@endsection
