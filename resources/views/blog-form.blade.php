@extends('/layout.mainlayout')

@section('title', 'Blog')

@section('content')

    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg/background.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-text text-center">
                        <h2>Kirim Blog Baru</h2>
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
                        <h2>BLOG</h2>
                    </div>
                    <!-- Buttons -->
                    <hr>
                    <div class="row">
                        <div class="col-12">
                            <div class="contact-form-area">
                                <form action="tambah-blog" id="formBlog" method="post" enctype="multipart/form-data"
                                    onsubmit="validateForm(event)">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12 col-lg-6">
                                            <div class="single-contact-information">
                                                <p>Judul</p>
                                            </div>
                                            <input type="text" class="form-control" id="judul" name="judul"
                                                placeholder="Judul blog">
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <div class="single-contact-information">
                                                <p>Kategori</p>
                                            </div>
                                            <input type="text" class="form-control" id="kategori" name="kategori"
                                                placeholder="Kategori">
                                        </div>
                                    </div>
                                    <hr>
                                    <div id="bahan_field">
                                        <div class="single-contact-information">
                                            <p>Isi Blog</p>
                                        </div>
                                        <textarea name="isi" class="form-control" id="isi" cols="30" rows="10" placeholder="Isi blog"></textarea>

                                    </div>
                                    <div class="single-contact-information">
                                        <p>Gambar (Opsional)</p>
                                    </div>
                                    <div style="text-align: center">
                                        <div class="mb-3">
                                            <input class="form-control" type="file" name="gambar" id="gambar">
                                        </div>

                                    </div>

                                    <div class="single-contact-information">
                                        <p>Video (Opsional)</p>
                                    </div>
                                    <div style="text-align: center">
                                        <div class="mb-3">
                                            <input class="form-control" type="file" name="video" id="video">
                                        </div>

                                    </div>
                                    <hr>

                                    <div class="col-4">
                                        <button class="btn delicious-btn mt-30 mb-30" type="submit">Post
                                            Comments</button>
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
            var judul = document.getElementById("judul").value;
            var kategori = document.getElementById("kategori").value;
            var isi = document.getElementById("isi").value;
            var gambar = document.getElementById("gambar").value;
            var video = document.getElementById("video").value;
            var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
            var allowedExtensionsvids = /(\.mp4|\.avi|\.3gp|\.gif)$/i;

            if (judul == "" || kategori == "" || isi == "") {
                alertify
                    .alert("Ooopss..", "Beberapa kolom wajib diisi.", function() {
                        alertify.message('OK');
                    });
                return false;
            }
            if (gambar != "" && !allowedExtensions.exec(gambar)) {
                alertify
                    .alert("Ooopss..", "Extension gambar salah.", function() {
                        alertify.message('OK');
                    });
                return false;
            }

            if (video != "" && !allowedExtensionsvids.exec(video)) {
                alertify
                    .alert("Ooopss..", "Extension video salah.", function() {
                        alertify.message('OK');
                    });
                return false;

            } else {
                console.log(gambar);
                alertify.confirm("This is a confirm dialog.",
                    function() {
                        alertify.success('Ok');
                        document.getElementById('formBlog').submit();
                    },
                    function() {
                        alertify.error('Cancel');
                    });



            }

        }
    </script>



@endsection
