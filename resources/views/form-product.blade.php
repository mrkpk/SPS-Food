@extends('/layout.mainlayout')

@section('title', 'Product')

@section('content')

    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg/produk.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-text text-center">
                        <h2>Buat Poduct Baru</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Elements Area Start ##### -->
    <section class="elements-area section-padding-80-0">
        <div class="container">
            <div class="row">

                <!-- ********** Buttons ********** -->
                <div class="col-12">
                    <div class="elements-title">
                        <h2>Product</h2>
                    </div>
                    <!-- Buttons -->
                    <hr>
                    <div class="row">
                        <div class="col-12">
                            <div class="contact-form-area">
                                <form action="tambah-produk" id="formProduk" method="post" enctype="multipart/form-data"
                                    onsubmit="validateForm(event)">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12 col-lg-6">
                                            <div class="single-contact-information">
                                                <p>Nama Produk</p>
                                            </div>
                                            <input type="text" class="form-control" id="produk" name="produk"
                                                placeholder="Nama Produk">
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <div class="single-contact-information">
                                                <p>Kategori</p>
                                            </div>

                                            <select class="form-select" name="kategori" id="kategori" multiple
                                                aria-label="multiple select example">
                                                <option value="0" selected>Open this select menu</option>
                                                <option value="Bijag">Bijag</option>
                                                <option value="Kaca">Kaca</option>
                                                <option value="LB">Langit Biru</option>
                                                <option value="Mimora">Mimora</option>
                                                <option value="Padamu">Padamu</option>
                                                <option value="Vitarasa">Vitarasa</option>
                                            </select>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-12 col-lg-6">
                                            <div class="single-contact-information">
                                                <p>Principal</p>
                                            </div>
                                            <input type="text" class="form-control" id="principal" name="principal"
                                                placeholder="Principal">
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <div class="single-contact-information">
                                                <p>Merk</p>
                                            </div>
                                            <input type="text" class="form-control" id="merk" name="merk"
                                                placeholder="Merk">
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <div class="single-contact-information">
                                                <p>Deskripsi</p>
                                            </div>
                                            <input type="text" class="form-control" id="desk" name="desk"
                                                placeholder="Deskripsi">
                                        </div>
                                    </div>

                                    <div class="single-contact-information">
                                        <p>Gambar (Opsional)</p>
                                    </div>
                                    <div style="text-align: center">
                                        <div class="mb-3">
                                            <input class="form-control" type="file" name="gambar" id="gambar">
                                        </div>

                                    </div>
                                    <hr>

                                    <div class="col-4">
                                        <button class="btn delicious-btn mt-30 mb-30" type="submit">Kirim Produk</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>


            </div>
        </div>
    </section>
    <!-- ***** Elements Area End ***** -->

    <script>
        function validateForm(e) {
            e.preventDefault();
            var produk = document.getElementById("produk").value;
            var kategori = document.getElementById("kategori").value;
            var principal = document.getElementById("principal").value;
            var merk = document.getElementById("merk").value;
            var gambar = document.getElementById("gambar").value;
            var gambarsize = document.getElementById("gambar").files[0].size / 1024 / 1024;
            var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;

            if (produk == "" || kategori == "" || principal == "" || merk == "" || gambar == "") {
                alertify
                    .alert("Ooopss..", "Beberapa kolom wajib diisi.", function() {
                        alertify.message('OK');
                    });
                return false;
            }
            if (kategori == "0") {
                alertify
                    .alert("Ooopss..", "Mohon pilih kategori", function() {
                        alertify.message('OK');
                    });
                return false;
            }
            if (!allowedExtensions.exec(gambar)) {
                alertify
                    .alert("Ooopss..", "Extension gambar salah.", function() {
                        alertify.message('OK');
                    });
                return false;
            }
            if (gambarsize > 2) {
                alertify
                    .alert("Ooopss..", "Ukuran gambar terlalu besar.", function() {
                        alertify.message('OK');
                    });
                return false;
            } else {
                console.log(gambar);
                alertify.confirm("This is a confirm dialog.",
                    function() {
                        alertify.success('Ok');
                        document.getElementById('formProduk').submit();
                    },
                    function() {
                        alertify.error('Cancel');
                    });



            }

        }
    </script>



@endsection
