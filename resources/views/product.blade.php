@extends('/layout.mainlayout')

@section('title', 'Home')

@section('content')

    <!-- ##### Breadcumb Area Start ##### -->
    @if (session('id_user'))
        <a href="/product-form">
    @endif
    <div class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg/produk.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-text text-center">
                        <h2>Our Product</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if (session('id_user'))
        </a>
    @endif
    <section class="about-area" style="padding-top: 20px">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb" style="background-color: transparent">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Produk</li>

                </ol>
            </nav>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### About Area Start ##### -->
    <section class="about-area section-padding-80">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                        <h3>Apa saja produk kami ?</h3>
                    </div>
                </div>
            </div>



            <div class="row align-items-center mt-70">
                <!-- Single Cool Fact -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-marketplace">
                        <a href="product-cat/Bijag">
                            <img src="img/logo/bijag.png" style="max-width: 120px" alt="">
                        </a>
                    </div>
                </div>
                <!-- Single Cool Fact -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-marketplace">
                        <a href="product-cat/Kaca">
                            <img src="img/logo/kaca.png" style="max-width: 120px" alt="">
                        </a>
                    </div>
                </div>
                <!-- Single Cool Fact -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-marketplace">
                        <a href="product-cat/Langit Biru">
                            <img src="img/logo/LB.png" style="max-width: 120px" alt="">
                        </a>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-marketplace">
                        <a href="product-cat/Mimora">
                            <img src="img/logo/mimora.png" style="max-width: 120px" alt="">
                        </a>
                    </div>
                </div>
                <!-- Single Cool Fact -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-marketplace">
                        <a href="product-cat/Padamu">
                            <img src="img/logo/padamu.png" style="max-width: 120px" alt="">
                        </a>
                    </div>
                </div>
                <!-- Single Cool Fact -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-marketplace">
                        <a href="product-cat/Vitarasa">
                            <img src="img/logo/vitarasa.png" style="max-width: 120px" alt="">
                        </a>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-12">
                    <img class="mb-70" src="img/bg-img/.png" alt="">
                    <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nec
                        varius dui. Suspendisse potenti. Vestibulum ac pellentesque tortor. Aenean congue sed metus in
                        iaculis. Cras a tortor enim. Phasellus posuere vestibulum ipsum, eget lobortis purus. Orci
                        varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin
                        malesuada et mauris ut lobortis. Sed eu iaculis sapien, eget luctus quam. Aenean hendrerit
                        varius massa quis laoreet. Donec quis metus ac arcu luctus accumsan. Nunc in justo tincidunt,
                        sodales nunc id, finibus nibh. Class aptent taciti sociosqu ad litora torquent per conubia
                        nostra, per inceptos himenaeos.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### About Area End ##### -->


@endsection
