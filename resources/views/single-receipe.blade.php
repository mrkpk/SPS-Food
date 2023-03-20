@extends('/layout.mainlayout')

@section('title', 'Receipes')

@section('content')


    <div class="receipe-post-area section-padding-80">
        <section class="about-area" style="padding-top: 20px">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb" style="background-color: transparent">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item"><a href="/receipe">Receipe</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $menu->nama_menu }}</li>
                    </ol>
                </nav>
            </div>
        </section>

        <!-- Receipe Slider -->
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="blog-thumbnail">
                        <img src="/storage/{{ $menu->gambar_path }}" alt="">
                        <!-- Post Date -->

                    </div>

                </div>
            </div>
        </div>

        <!-- Receipe Content Area -->
        <div class="receipe-content-area">
            <div class="container">

                <div class="row">
                    <div class="col-12 col-md-8">
                        <div class="receipe-headline my-5">
                            <span>{{ $menu->created_at->format('F d, Y') }} </span>
                            <h2>{{ $menu->nama_menu }}</h2>
                            <div class="receipe-duration">
                                <h6>Persiapan : {{ $menu->persiapan }} mins</h6>
                                <h6>Memasak : {{ $menu->durasi }} mins</h6>
                                <h6>Posrsi : {{ $menu->porsi }} Porsi</h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-4">
                        <div class="receipe-ratings text-right my-5">
                            <div class="ratings">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                            </div>
                            @if (isset($menu->video_path))
                                <a class="venobox" data-autoplay="true" data-vbtype="video"
                                    href="/storage/{{ $menu->video_path }}"><i class="fa fa-play-circle fa-lg"
                                        style="font-size: 25px"> Play Video</i></a>
                            @else
                                <i class="fa fa-times-circle-o" style="font-size: 25px"> No Video</i>
                            @endif

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-lg-8">
                        <!-- Single Preparation Step -->
                        @php
                            $i = 0;
                        @endphp
                        @foreach ($proses as $pros)
                            <div class="single-preparation-step d-flex">
                                <h4>0{{ $proses[$i]->tahap + 1 }}.</h4>
                                <p>
                                    {{ $proses[$i]->proses }}
                                </p>
                            </div>
                            @php $i++; @endphp
                        @endforeach

                    </div>

                    <!-- Ingredients -->
                    <div class="col-12 col-lg-4">
                        <div class="ingredients">
                            <h4>Ingredients</h4>


                            @php
                                $i = 0;
                            @endphp
                            @foreach ($bahan as $bah)
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input"
                                        id="customCheck{{ $i + 1 }}">
                                    <label class="custom-control-label"
                                        for="customCheck{{ $i + 1 }}">{{ $bahan[$i]->bahan }}</label>
                                </div>
                                @php $i++; @endphp
                            @endforeach
                            <!-- Custom Checkbox -->



                        </div>
                    </div>
                </div>
                <br> <br>
                <hr>
                <br>
                <div class="row">
                    <div class="col-12">
                        <div class="section-heading text-left">
                            <h4>Leave a comment</h4>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-8">
                        <div class="contact-form-area">
                            <form action="#" method="post">
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <input type="text" class="form-control" id="name" placeholder="Name">
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <input type="email" class="form-control" id="email" placeholder="E-mail">
                                    </div>
                                    <div class="col-12">
                                        <input type="text" class="form-control" id="subject" placeholder="Subject">
                                    </div>
                                    <div class="col-12">
                                        <textarea name="message" class="form-control" id="message" cols="30" rows="10" placeholder="Message"></textarea>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn delicious-btn mt-30" type="submit">Post Comments</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
