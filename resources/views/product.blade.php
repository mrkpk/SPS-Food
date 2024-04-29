@extends('/layout.mainlayout')

@section('title', 'Home')

@section('content')

    <!-- ##### Breadcumb Area Start ##### -->
    @if (session('id_user'))
        <a href="/product-form">
    @endif
    <div class="breadcumb-area bg-img" style="background-image: url(img/bg/produk.jpg);">

    </div>

    @if (session('id_user'))
        </a>
    @endif
    <section class="about-area" style="padding-top: 20px">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb" style="background-color: transparent">
                    <li class="breadcrumb-item"><a href="/">Beranda</a></li>
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
                    <p class="text-center">{{ $content['prod_desc'] }}</p>
                </div>
            </div>
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
                <div class="insta-feeds d-flex">

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

                    <div class="single-insta-feeds" id="Bisohun">
                        <img src="img/logo/BISOHUN.png" alt="">
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
        $(document).on('click', '#Bijag, #Kaca, #LB, #Mimora, #Padamu, #Vitarasa, #Bisohun',
            function() {
                // Remove active class from all items
                $('.single-insta-feeds').removeClass('active');

                // Add active class to the clicked item
                $(this).addClass('active');
                var id = this.id;
                ambilData(id).then(prod => {
                    console.log(prod.cat);
                    var item = "";
                    var head = "";

                    head = '<div class="row align-items-center mt-70" id="bijagitem">' +
                        '<div class="row d-flex justify-content-center">' +
                        '<div class="col-10 col-md-9 col-lg-12">' +

                        '<p class="text-center" style="color:rgb(24, 24, 24)"><img src="' + prod.cat.path +
                        '"' +
                        '" style="width:150px; background-size: cover;"' +
                        'alt="..."><br><br><strong>' + prod.cat.desk + '</strong></p>' +
                        '</div>' +
                        '</div>' +
                        '<div class="owl-carousel owl-theme" id="items">' +
                        '</div>' +
                        '</div>';
                    for (var i = 0; i < prod.data.length; i++) {

                        item += '<div class="item" >' +
                            '<img src="/storage/public/' + prod.data[i].gambar +
                            '" style="width:300px; background-size: cover;"' +
                            'alt="...">' +
                            '<p class="desc-prod"><strong>' + prod
                            .data[i]
                            .desk +
                            '' +
                            '</strong></p>' +
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
