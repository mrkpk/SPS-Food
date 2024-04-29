@extends('/layout.mainlayout')

@section('title', 'Resep')

@section('content')

    <!-- ##### Breadcumb Area Start ##### -->.
    @if (session('id_user'))
        <a href="/form-resep">
    @endif


    <div class="breadcumb-area bg-img" style="background-image: url(img/bg/resep.jpg);">

    </div>
    @if (session('id_user'))
        </a>
    @endif
    <!-- ##### Breadcumb Area End ##### -->
    <section class="about-area" style="padding-top: 20px">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb" style="background-color: transparent">
                    <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Resep</li>
                </ol>
            </nav>
        </div>
    </section>
    <div class="receipe-post-area">

        <!-- Receipe Post Search -->
        <!--<div class="receipe-post-search mb-80">-->
        <!--    <div class="container">-->
        <!--        <form action="#" method="post">-->
        <!--            <div class="row">-->
        <!--                <div class="col-12 col-lg-3">-->
        <!--                    <select name="select1" id="select1">-->
        <!--                        <option value="1">All Receipies Categories</option>-->
        <!--                        <option value="1">All Receipies Categories 2</option>-->
        <!--                        <option value="1">All Receipies Categories 3</option>-->
        <!--                        <option value="1">All Receipies Categories 4</option>-->
        <!--                        <option value="1">All Receipies Categories 5</option>-->
        <!--                    </select>-->
        <!--                </div>-->
        <!--                <div class="col-12 col-lg-3">-->
        <!--                    <select name="select1" id="select2">-->
        <!--                        <option value="1">All Receipies Categories</option>-->
        <!--                        <option value="1">All Receipies Categories 2</option>-->
        <!--                        <option value="1">All Receipies Categories 3</option>-->
        <!--                        <option value="1">All Receipies Categories 4</option>-->
        <!--                        <option value="1">All Receipies Categories 5</option>-->
        <!--                    </select>-->
        <!--                </div>-->
        <!--                <div class="col-12 col-lg-3">-->
        <!--                    <input type="search" name="search" placeholder="Search Receipies">-->
        <!--                </div>-->
        <!--                <div class="col-12 col-lg-3 text-right">-->
        <!--                    <button type="submit" class="btn delicious-btn">Search</button>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </form>-->

        <!--    </div>-->
        <!--</div>-->

        <div class="blog-area section-padding-40">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <p class="text-center">{{ $content['resep_desc'] }}</p>
                    </div>
                </div>
                <div class="row">

                    <div class="row">
                        <!-- Single Best Receipe Area -->

                        @foreach ($menus as $menu)
                            <div class="col-6 col-sm-6 col-lg-4">
                                <div class="single-best-receipe-area mb-30">
                                    <a href="/receipe-id/{{ $menu->id_menu }}">
                                        <img src="/storage/public/{{ $menu->gambar_path }}" alt="">
                                    </a>
                                    {{-- <div class="post-date">
                                        <a href="/receipe-id/{{ $menu->id_menu }}"><span>{{ $menu->created_at->format('d') }}</span>{{ $menu->created_at->format('M') }}
                                            <br> {{ $menu->created_at->format('Y') }}</a>
                                    </div> --}}
                                    <div class="receipe-content">
                                        <a href="/receipe-id/{{ $menu->id_menu }}">
                                            <h5>
                                                {{ $menu->nama_menu }}
                                            </h5>
                                        </a>
                                        {{-- <div class="ratings">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star-o" aria-hidden="true"></i>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <div style="color: brown; margin-bottom: 40px">
                        {{ $menus->links('pagination.default') }}
                    </div>



                </div>
            </div>
        </div>



        <!-- Receipe Content Area -->


    @endsection
