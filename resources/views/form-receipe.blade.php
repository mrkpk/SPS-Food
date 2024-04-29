@extends('/layout.mainlayout')

@section('title', 'Resep')

@section('content')

    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg/background.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-text text-center">
                        <h2>Kirim Resep Baru</h2>
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
                    <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="/receipe">Resep</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Form Resep</li>
                </ol>
            </nav>
        </div>
    </section>

    <!-- ##### Elements Area Start ##### -->
    <section class="elements-area section-padding-80-0">
        <div class="container">
            <div class="row">

                <!-- ********** Buttons ********** -->
                <div class="col-12">
                    <div class="elements-title">
                        <h2>Resep</h2>
                    </div>
                    <!-- Buttons -->
                    <hr>
                    <div class="row">
                        <div class="col-12">
                            <div class="contact-form-area">
                                <form action="tambah-receipe" id="formReceipe" method="post" enctype="multipart/form-data"
                                    onsubmit="validateForm(event)">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12 col-lg-6">
                                            <div class="single-contact-information">
                                                <p>Nama Menu</p>
                                            </div>
                                            <input type="text" class="form-control" id="nama" name="nama"
                                                placeholder="Nama Menu">
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
                                    <div class="single-contact-information">
                                        <p>Keterangan Tambahan(Opsional)</p>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="single-contact-information">
                                                <p>Resep oleh</p>
                                            </div>
                                            <input type="text" class="form-control" id="oleh" name="oleh"
                                                placeholder="Resep oleh..">
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="single-contact-information">
                                                <p>Persiapan</p>
                                            </div>
                                            <input type="text" class="form-control" id="persiapan" name="persiapan"
                                                placeholder="Durasi Persiapan">
                                        </div>
                                        <div class="col-4">
                                            <div class="single-contact-information">
                                                <p>Proses</p>
                                            </div>
                                            <input type="text" class="form-control" id="proses" name="durasi"
                                                placeholder="Durasi Memasak">
                                        </div>
                                        <div class="col-4">
                                            <div class="single-contact-information">
                                                <p>Porsi</p>
                                            </div>
                                            <input type="text" class="form-control" id="porsi" name="porsi"
                                                placeholder="Jumlah Porsi">
                                        </div>
                                    </div>
                                    <hr>

                                    <div id="bumbu_field">
                                        <div class="rowd1">
                                            <div class="col-7">
                                                <div class="single-contact-information">
                                                    <p>Bumbu</p>
                                                </div>
                                                <input type="text" class="form-control" name="bumbu[1]"
                                                    placeholder="Bumbu ke 1">
                                            </div>
                                        </div>
                                    </div>
                                    <div style="text-align: center">
                                        <a type="button" class="btn delicious-btn btn-4 m-1"
                                            style="font-size: 12px; min-width:20px; border-radius: 1000px"
                                            id="tambah_bumbu">
                                            Tambah Bumbu </a>
                                    </div>
                                    <div id="bahan_field">
                                        <div class="rows1">
                                            <div class="col-7">
                                                <div class="single-contact-information">
                                                    <p>Bahan</p>
                                                </div>
                                                <input type="text" class="form-control" name="bahan[1]"
                                                    placeholder="Bahan ke 1">
                                            </div>
                                        </div>
                                    </div>
                                    <div style="text-align: center">
                                        <a type="button" class="btn delicious-btn btn-4 m-1"
                                            style="font-size: 12px; min-width:20px; border-radius: 1000px"
                                            id="tambah_bahan">
                                            Tambah Bahan </a>
                                    </div>
                                    <hr>
                                    <div id="proses_field">
                                        <div class="row1">
                                            <div class="col-12">
                                                <div class="single-contact-information">
                                                    <p>Proses</p>
                                                </div>
                                                <input type="text" class="form-control" name="proses[1]"
                                                    placeholder="Proses tahap 1">
                                            </div>

                                        </div>

                                    </div>

                                    <div style="text-align: center">
                                        <a type="button" class="btn delicious-btn btn-4 m-1"
                                            style="font-size: 12px; min-width:20px; border-radius: 1000px"
                                            id="tambah_proses">
                                            Tambah Proses </a>
                                    </div>


                                    <hr>
                                    <div class="single-contact-information">
                                        <p>Gambar</p>
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
                                    <div class="single-contact-information">
                                        <p>Link Instagram (Opsional)</p>
                                    </div>
                                    <div style="text-align: center">
                                        <div class="mb-3">
                                            <input class="form-control" type="text" name="link" id="link">
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
        var i = 1;
        var l = 0;
        var j = 1;
        var k = 0;
        var a = 1;
        var b = 0;
        $(document).ready(function() {

            $('#tambah_proses').click(function() {
                console.log(l, i)
                i++;
                l++;
                $('#a' + l + '').hide();
                $('#proses_field').append(
                    '<div id="row' + i +
                    '"><div class="row"><div class="col-11"><input type="text" class="form-control" name="proses[' +
                    i +
                    ']"placeholder="Proses tahap ' + i +
                    '"></div> <div class="col-1" style="text-align:right;">' + (i - l == 1 ?
                        '<a type="button" class="btn qq delicious-btn btn-5 m-1" name="' +
                        i + '" id="a' +
                        i +
                        '"style="font-size: 12px; min-width:20px; border-radius: 1000px"' +
                        'id = "hapus_proses" >' +
                        'Hapus </a>' : '') +
                    '</div> </div> </div>'
                );
                document.getElementsByTagName("index_proses").value = i;
            })
        })
        $(document).ready(function() {
            $('#tambah_bahan').click(function() {
                j++;
                k++;

                $('#b' + k + '').hide();
                $('#bahan_field').append(
                    '<div id="rows' + j +
                    '"><div class="row"><div class="col-7"><input type="text" class="form-control" name="bahan[' +
                    j +
                    ']"placeholder="Bahan ke ' + j +
                    '"></div> <div class="col-1" style="text-align:right;"> <a type="button" class="btn pp delicious-btn btn-5 m-1" name="' +
                    j + '" id="b' +
                    j +
                    '"style="font-size: 12px; min-width:20px; border-radius: 1000px"' +
                    'id = "tambah_proses" >' +
                    'Hapus </a></div> </div> </div>'
                );
            })
        })

        $(document).ready(function() {
            $('#tambah_bumbu').click(function() {
                a++;
                b++;

                $('#c' + b + '').hide();
                $('#bumbu_field').append(
                    '<div id="rowd' + a +
                    '"><div class="row"><div class="col-7"><input type="text" class="form-control" name="bumbu[' +
                    a +
                    ']"placeholder="Bumbu ke ' + a +
                    '"></div> <div class="col-1" style="text-align:right;"> <a type="button" class="btn oo delicious-btn btn-5 m-1" name="' +
                    a + '" id="c' +
                    a +
                    '"style="font-size: 12px; min-width:20px; border-radius: 1000px"' +
                    'id = "tambah_proses" >' +
                    'Hapus </a></div> </div> </div>'
                );
            })
        })
        $(document).on('click', '.qq', function() {
            var button_id = $(this).attr("name");
            console.log('#row' + button_id + '');
            $('#row' + button_id + '').remove();
            $('#a' + (button_id - 1) + '').show();
            i--;
            l--;

        });
        $(document).on('click', '.pp', function() {
            var button_id = $(this).attr("name");
            console.log('#rows' + button_id + '');
            $('#rows' + button_id + '').remove();
            $('#b' + (button_id - 1) + '').show();
            j--;
            k--;

        });
        $(document).on('click', '.oo', function() {
            var button_id = $(this).attr("name");
            console.log('#rowd' + button_id + '');
            $('#rowd' + button_id + '').remove();
            $('#c' + (button_id - 1) + '').show();
            a--;
            b--;

        });


        function validateForm(e) {
            e.preventDefault();
            var nama = document.getElementById("nama").value;
            var kategori = document.getElementById("kategori").value;
            var persiapan = document.getElementById("persiapan").value;
            var proses = document.getElementById("proses").value;
            var porsi = document.getElementById("porsi").value;
            var gambar = document.getElementById("gambar").value;
            if (gambar != "") {
                var gambarsize = document.getElementById("gambar").files[0].size / 1024 / 1024;
            }
            var video = document.getElementById("video").value;
            var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
            var allowedExtensionsvids = /(\.mp4|\.avi|\.3gp|\.gif)$/i;

            if (nama == "" || kategori == "" || gambar == "") {
                alertify
                    .alert("Ooopss..", "Beberapa kolom wajib diisi.", function() {
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
                        document.getElementById('formReceipe').submit();
                    },
                    function() {
                        alertify.error('Cancel');
                    });



            }

        }
    </script>



@endsection
