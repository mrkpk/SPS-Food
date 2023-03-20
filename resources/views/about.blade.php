@extends('/layout.mainlayout')

@section('title', 'Home')

@section('content')

    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg/background.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-text text-center">
                        <h2>About us</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### About Area Start ##### -->
    <section class="about-area section-padding-80">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                        <h3>Who we are and what we do?</h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <h6 class="sub-heading pb-5">PT Sinar Pangan Sejahtera berdiri pada tahun 2005 sebagai perusahaan yang
                        memproduksi produk bihun jagung merk “PADAMU” dan “BI JAG” berlokasi di Pasuruan Jawa Timur. PT
                        Sinar Pangan Sejahtera hadir menjawab kebutuhan konsumennya atas produk makanan yang berkualitas
                        khususnya kategori bihun jagung yang pasarnya atau kebutuhannya terus bertumbuh sangat pesat.</h6>

                    <p class="text-center">Hingga saat ini PT Sinar Pangan Sejahtera terus berkembang pesat dan telah
                        mempunyai produk-produk unggulan lainnya, seperti sohun merk “SOHUN KACA”, mie kering merk “MIMORA”

                        Untuk wilayah distribusi produk-produk PT Sinar Pangan Sejahtera, saat ini sudah mencakup seluruh
                        wilayah di Indonesia, dengan di dukung oleh distributor yang mempunyai kemampuan distribusi dan team
                        distribusi yang tangguh.</p>
                </div>
            </div>



            <div class="row">
                <div class="col-12">
                    <img class="mb-70" src="img/bg-img/.png" alt="">
                    <p class="text-center">VISI PERUSAHAAN :

                        PT Sinar Pangan Sejahtera selalu memberikan yang terbaik sebagai perusahaan nasional yang
                        menghasilkan produk-produk berkualitas dan selalu mengutamakan kepuasan konsumennya.

                    </p>

                    <p class="text-center">


                        MISI PERUSAHAAN :

                        Melakukan inovasi dan kreatifitas untuk terus menghasilkan produk-produk berkualitas. Berperan aktif
                        dalam hal-hal memproduksi produk-produk yang mengutamakan kesehatan dan bergizi untuk bangsa
                        Indonesia</p>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### About Area End ##### -->

    <!-- ##### Contact Area Start ##### -->
    <div class="contact-area section-padding-0-80">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                        <h3>Contact Us</h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
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
                                <div class="col-12 text-center">
                                    <button class="btn delicious-btn mt-30" type="submit">Send</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Contact Area End ##### -->

@endsection
