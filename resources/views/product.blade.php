@extends('/layout.mainlayout')

@section('title', 'Home')

@section('content')

    <!-- ##### Breadcumb Area Start ##### -->
    @if (session('id_user'))
        <a href="/product-form">
    @endif
    <div class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg/bg8.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-text text-center">
                        <h1 class="head-1">
                            Produk Kami
                        </h1>
                        <h3 class="head-2">OUR PRODUCT</h3>
                        <h3 class="head-3">WE PROVIDE <br>
                            GOOD QUALITY FOOD</h3>

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
            {{-- <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                        <h5>Bihun Jagung</h5>
                    </div>
                </div>
            </div> --}}

            <div class="follow-us-instagram">
                {{-- <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h5>Follow Us Instragram</h5>
                        </div>
                    </div>
                </div> --}}
                <!-- Instagram Feeds -->
                <div class="insta-feeds d-flex flex-wrap">

                    <!-- Single Insta Feeds -->
                    <div class="single-insta-feeds" id="Bijag">
                        <img src="img/logo/BIJAG.png" alt="">
                        <!-- Icon -->
                    </div>

                    <!-- Single Insta Feeds -->
                    <div class="single-insta-feeds" id="Padamu">
                        <img src="img/logo/PADAMU.png"alt="">
                        <!-- Icon -->
                    </div>

                    <!-- Single Insta Feeds -->
                    <div class="single-insta-feeds" id="LB">
                        <img src="img/logo/LB.png" alt="">
                        <!-- Icon -->
                    </div>

                    <!-- Single Insta Feeds -->
                    <div class="single-insta-feeds" id="Mimora">
                        <img src="img/logo/MIMORA.png" alt="">
                        <!-- Icon -->
                    </div>

                    <!-- Single Insta Feeds -->
                    <div class="single-insta-feeds" id="Kaca">
                        <img src="img/logo/KACA.png" alt="">
                        <!-- Icon -->
                    </div>

                    <!-- Single Insta Feeds -->
                    <div class="single-insta-feeds" id="Vitarasa">
                        <img src="img/logo/VITARASA.png" alt="">
                        <!-- Icon -->
                    </div>
                </div>
            </div>


            <div class="a">

            </div>


        </div>
    </section>
    <!-- ##### About Area End ##### -->

    <script>
        $(document).on('click', '#Bijag, #Kaca, #LB, #Mimora, #Padamu, #Vitarasa', function() {

            var id = this.id;
            ambilData(id).then(prod => {
                console.log(prod.data);
                var item = "";
                var head = "";

                head = '<div class="row align-items-center mt-70" id="bijagitem">' +
                    '<div class="owl-carousel owl-theme" id="items">' +
                    '</div>' +
                    '</div>';
                for (var i = 0; i < prod.data.length; i++) {

                    item += '<div class="item" >' +
                        '<img src="/storage/public/' + prod.data[i].gambar +
                        '" style="width:300px; background-size: cover;"' +
                        'alt="...">' +
                        '<p style="color: black;text-align:center">' + prod.data[i].desk +
                        '' +
                        '</p>' +
                        '</div>';
                }
                $('.a').html(head);
                $('#items').html(item);
                $('#items').owlCarousel({
                    center: true
                }); // Initialize Owl Carousel
                $('#items').trigger('refresh.owl.carousel'); // Refresh the carousel with new content

            })


        });


        async function ambilData(id) {
            let response = await fetch('/api/prod/' + id + '/');
            let data = await response.json();

            return data;
        }
    </script>
@endsection
