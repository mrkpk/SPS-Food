@extends('/layout.mainlayout')

@section('title', 'Product')

@section('content')

    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb-area bg-img bg-overlay" style="background-image: url(/img/bg/produk1.jpg);">
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
    <!-- ##### Breadcumb Area End ##### -->
    <section class="about-area" style="padding-top: 20px">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb" style="background-color: transparent">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="/product">Produk</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $kategori }}</li>
                </ol>
            </nav>
        </div>
    </section>
    <!-- ##### About Area Start ##### -->
    <section class="about-area" style="padding-top: 30px;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                        <div class="single-marketplace">
                            @if ($kategori == 'Bijag')
                                <img src="/img/logo/BIJAG.png" style="max-width: 120px" alt="">
                            @elseif ($kategori == 'Kaca')
                                <img src="/img/logo/KACA.png" style="max-width: 120px" alt="">
                            @elseif ($kategori == 'Langit Biru')
                                <img src="/img/logo/LB.png" style="max-width: 120px" alt="">
                            @elseif ($kategori == 'Mimora')
                                <img src="/img/logo/MIMORA.png" style="max-width: 120px" alt="">
                            @elseif ($kategori == 'Padamu')
                                <img src="/img/logo/PADAMU.png" style="max-width: 120px" alt="">
                            @elseif ($kategori == 'Vitarasa')
                                <img src="/img/logo/VITARASA.png" style="max-width: 120px" alt="">
                            @endif

                        </div>
                    </div>
                </div>
            </div>



            <div class="row align-items-center mt-70">
                <div class="owl-carousel owl-theme">
                    @foreach ($produk as $prod)
                        <div class="item">
                            <img src="/storage/public/{{ $prod->gambar }}" style="width:300px; background-size: cover;"
                                alt="...">
                            <p class="text-justify" style="color: black">
                                {{ $prod->desk }}
                            </p>
                        </div>
                    @endforeach
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
