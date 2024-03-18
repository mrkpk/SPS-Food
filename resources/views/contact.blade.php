@extends('/layout.mainlayout')

@section('title', 'Home')

@section('content')

    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg/bg2.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-text text-center">
                        <h2>Contact</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Contact Information Area Start ##### -->
    <div class="contact-information-area section-padding-80">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="logo mb-80">
                        <img src="img/logo/sps.png" style="max-width: 180px" alt="">
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Contact Text -->
                <div class="col-12 col-lg-6">
                    <div class="contact-text">
                        <p>{{ $content->desc_cont }}</p>
                        <!--<p>Orci varius natoque penatibus et magnis dis ac pellentesque tortor. Aenean congue parturient-->
                        <!--    montes, nascetur ridiculus mus.</p>-->
                    </div>
                </div>
                <div class="col-12 col-lg-2"></div>
                <div class="col-12 col-lg-4">
                    <!-- Single Contact Information -->
                    <div class="single-contact-information mb-30">

                        <i class="fa-solid fa-location-dot" style="color: #40ba37;"></i>
                        <h6>Alamat:</h6>
                        <p> {{ $content->alamat1 }}</p>
                        <p>{{ $content->alamat2 }}</p>
                    </div>
                    <!-- Single Contact Information -->
                    <div class="single-contact-information mb-30">
                        <i class="fa-solid fa-phone fa-shake" style="color: #40ba37;"></i>
                        <h6>Phone:</h6>
                        <p> {{ $content->no_hp1 }}
                            <br> {{ $content->no_hp2 }}
                            <br>{{ $content->no_hp3 }}
                        </p>
                    </div>
                    <!-- Single Contact Information -->
                    <div class="single-contact-information mb-30">
                        <i class="fa-solid fa-envelope" style="color: #40ba37;"></i>
                        <h6>Email:</h6>
                        <p> {{ $content->email1 }} <br>{{ $content->email2 }}
                            <br>{{ $content->email3 }}
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- ##### Contact Information Area End ##### -->

    <!-- ##### Contact Form Area Start ##### -->
    <!--<div class="contact-area section-padding-0-80">-->
    <!--    <div class="container">-->
    <!--        <div class="row">-->
    <!--            <div class="col-12">-->
    <!--                <div class="section-heading">-->
    <!--                    <h3>Get In Touch</h3>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->

    <!--        <div class="row">-->
    <!--            <div class="col-12">-->
    <!--                <div class="contact-form-area">-->
    <!--                    <form action="#" method="post">-->
    <!--                        <div class="row">-->
    <!--                            <div class="col-12 col-lg-6">-->
    <!--                                <input type="text" class="form-control" id="name" placeholder="Nama">-->
    <!--                            </div>-->
    <!--                            <div class="col-12 col-lg-6">-->
    <!--                                <input type="email" class="form-control" id="email" placeholder="E-mail">-->
    <!--                            </div>-->
    <!--                            <div class="col-12">-->
    <!--                                <input type="text" class="form-control" id="subject" placeholder="Subject">-->
    <!--                            </div>-->
    <!--                            <div class="col-12">-->
    <!--                                <textarea name="message" class="form-control" id="message" cols="30" rows="10" placeholder="Message"></textarea>-->
    <!--                            </div>-->
    <!--                            <div class="col-12 text-center">-->
    <!--                                <button class="btn delicious-btn mt-30" type="submit">Send</button>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </form>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    <!-- ##### Contact Form Area End ##### -->
@endsection
