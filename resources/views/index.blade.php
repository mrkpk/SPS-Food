@extends('/layout.mainlayout')

@section('title', 'Home')

@section('content')
    <!-- ##### Hero Area Start ##### -->
    <section class="hero-area">
        <div class="hero-slides owl-carousel">

            @foreach ($hero as $hero)
                <!-- Single Hero Slide -->
                <div class="single-hero-slide bg-img" style="background-image: url(/storage/public/{{ $hero->gambar }});">
                    <div class="container h-100">
                        <div class="row h-100 align-items-center">
                            @if ($hero->nama != null || $hero->deskripsi != null)
                                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                                    <div class="hero-slides-content" data-animation="fadeInUp" data-delay="100ms">
                                        @if ($hero->nama != null)
                                            <h2 data-animation="fadeInUp" data-delay="300ms">{{ $hero->nama }}</h2>
                                        @endif
                                        @if ($hero->deskripsi)
                                            <p data-animation="fadeInUp" data-delay="700ms">{{ $hero->deskripsi }}</p>
                                        @endif
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <!-- ##### Hero Area End ##### -->

    <!-- ##### Top Catagory Area Start ##### -->
    <section class="top-catagory-area section-padding-80-0">
        <div class="container">
            <div class="row">
                <!-- Top Catagory Area -->
                <div class="col-12 col-lg-6">
                    <div class="single-top-catagory">
                        <img src="img/bg/bg24.jpg" alt="">
                        <!-- Content -->
                        <div class="top-cta-content">
                            <h3>Resep Masakan</h3>
                            <h6>Simple &amp; Delicios</h6>
                            <a href="/receipe" class="btn delicious-btn">See Recipes</a>
                        </div>
                    </div>
                </div>
                <!-- Top Catagory Area -->
                <div class="col-12 col-lg-6">
                    <div class="single-top-catagory">
                        <img src="img/bg/produk1.jpg" alt="">
                        <!-- Content -->
                        <div class="top-cta-content">
                            <h3>Produk Kami</h3>
                            <h6></h6>
                            <a href="/product" class="btn delicious-btn">See All Products</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Top Catagory Area End ##### -->

    <!-- ##### Best Receipe Area Start ##### -->
    <section class="best-receipe-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                        <h3>The Best Recipes</h3>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach ($best as $best)
                    <div class="col-6 col-sm-6 col-lg-4">
                        <div class="single-best-receipe-area mb-30">
                            <a href="/receipe-id/{{ $best->id_menu }}">
                                <img src="/storage/public/{{ $best->gambar_path }}" alt="">
                            </a>
                            <div class="receipe-content">
                                <a href="/receipe-id/{{ $best->id_menu }}">
                                    <h5>
                                        {{ $best->nama_menu }}
                                    </h5>
                                </a>
                                <div class="ratings">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                <!-- Single Best Receipe Area -->
            </div>
        </div>
    </section>
    <!-- ##### Best Receipe Area End ##### -->

    <!-- ##### CTA Area Start ##### -->
    <section class="cta-area bg-img bg-overlay" style="background-image: url(img/bg/bg8.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <!-- Cta Content -->
                    <div class="cta-content text-center">
                        <h2>Tentang Kami</h2>
                        <p>PT Sinar Pangan Sejahtera berdiri pada tahun 2005 sebagai perusahaan yang memproduksi produk
                            bihun jagung merk "PADAMU" dan "BI JAG" berlokasi di Pasauruan Jawa Timur. PT. Sinar Pangan
                            Sejahtera hadir menjawab kebutuhan konsumennya atas produk makanan yang berkualitas
                            khususnya kategori bigun jagung yang pasarnya atau kebutuhannya terus bertumbuh sangat
                            pesat. Hingga saat ini PT. Sinar Pangan Sejahtera terus berkembang pesat dan mempunyai
                            produk-produk unggulan lainnya, seperti sohun merk "SOHUN KACA", mie kering merk "MIMORA"
                            dan "Langit Biru". Untuk wilayah distribusi produk-produk PT Sinar Pangan Sejahtera, saat
                            ini sudah mencakup seluruh wilayah Indonesia, dengan didukung oleh distributor yang
                            mempunyai kemampuan distribusi dan team distribusi yang tangguh.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br><br>
    <!-- ##### Our Marketplace Area Start ##### -->
    <section class="best-receipe-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                        <h3 class="om">Our Marketplaces</h3>
                    </div>
                </div>
            </div>
            <div class="row align-items-center mt-40">
                <!-- Single Cool Fact -->


                <!-- Single Cool Fact -->
                <div class="col-4 col-sm-3 col-lg-4">
                    <div class="single-marketplace">
                        <a href="https://shopee.co.id/sps_food" target="_blank">
                            <img class="w220 hp" src="img/core-img/shopee.png" alt="">
                        </a>
                    </div>
                </div>

                <!-- Single Cool Fact -->
                <div class="col-4 col-sm-3 col-lg-4">
                    <div class="single-marketplace">
                        <a href="https://www.blibli.com/merchant/sps-food-official-store/SPF-70002" target="_blank">
                            <img class="w220 hp" src="img/core-img/blibli.png" alt="">
                        </a>

                    </div>
                </div>
                <div class="col-4 col-sm-3 col-lg-4">
                    <div class="single-marketplace">
                        <a href="https://www.bukalapak.com/sps-food-official-store-official" target="_blank">
                            <img class="w220 hp" src="img/core-img/bukalapak.png" alt="">
                        </a>

                    </div>
                </div>

                <!-- Single Cool Fact -->

            </div>


            <div class="row align-items-center mt-40">
                <!-- Single Cool Fact -->
                <div class="col-4 col-sm-6 col-lg-3">
                    <div class="single-marketplace">
                    </div>
                </div>

                <!-- Single Cool Fact -->
                <div class="col-4 col-sm-6 col-lg-3">
                    <div class="single-marketplace">
                        <a href="https://tokopedia.link/1dFi0HSZtub" target="_blank">
                            <img class="hp" src="img/core-img/tokopedia.png" alt="">
                        </a>
                    </div>
                </div>

                <!-- Single Cool Fact -->
                <div class="col-4 col-sm-6 col-lg-2">
                    <div class="single-marketplace">
                        <a href="https://www.lazada.co.id/shop/sinar-anugerah-niaga-store?path=index.htm&lang=id&pageTypeId=1"
                            target="_blank">
                            <img class="hp" src="img/core-img/lazada.png"alt="">
                        </a>
                    </div>
                </div>

                <!-- Single Cool Fact -->

            </div>
        </div>
    </section>

@endsection

<!-- ##### CTA Area End ##### -->

<!-- ##### Small Receipe Area Start ##### -->

<!-- ##### Small Receipe Area End ##### -->
