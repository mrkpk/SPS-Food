@extends('/layout.adminlayout')

@section('title', 'Receipes')

@section('content')

    <div class="container-fluid">

        <!-- Page Heading -->
        @if ($id == 1)
            <h1 class="h3 mb-2 text-gray-800">Edit Receipes</h1>
        @endif
        @if ($id == 2)
            <h1 class="h3 mb-2 text-gray-800">Edit Blogs</h1>
        @endif

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"></h6>
            </div>
            @if ($id == 1)
                <div class="card-body">
                    <form action="/edit-actionr" class="user" id="formReceipe" method="POST" enctype="multipart/form-data"
                        onsubmit="validateForm(event)">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <div class="mb-1 small">Nama Resep</div>
                            <input type="text" id="nama_resep" name="nama_resep" class="form-control form-control-user"
                                value="{{ $data->nama_menu }}" placeholder="Nama Resep">
                        </div>
                        <input type="hidden" name="id_menu" value="{{ $data->id_menu }}">
                        <input type="hidden" name="path" value="1">

                        <div class="form-group">
                            <div class="mb-1 small">Kategori</div>
                            <input type="text" id="kategori" name="kategori_resep"
                                class="form-control form-control-user" value="{{ $data->kategori }}" placeholder="Kategori">
                        </div>
                        <div class="row">
                            <div class="col-4 form-group">
                                <div class="mb-1 small">Persiapan</div>
                                <input type="text" id="persiapan" name="persiapan" class="form-control form-control-user"
                                    value="{{ $data->persiapan }}" placeholder="Persiapan">
                            </div>
                            <div class="col-4 form-group">
                                <div class="mb-1 small">Durasi</div>
                                <input type="text" id="durasi" name="durasi" class="form-control form-control-user"
                                    value="{{ $data->durasi }}" placeholder="Durasi">
                            </div>
                            <div class="col-4 form-group">
                                <div class="mb-1 small">Porsi</div>
                                <input type="text" id="porsi" name="porsi" class="form-control form-control-user"
                                    value="{{ $data->porsi }}" placeholder="Porsi">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="single-contact-information">
                                <p>Gambar</p>
                            </div>
                            <input type="file" class="form-control-file" name="gambar" id="gambar"
                                onchange="preview(event)">
                            <br>
                            @if ($data->gambar_path)
                                <img src="/storage/{{ $data->gambar_path }}" id="gambar-resep" class="img-thumbnail"
                                    style="max-width: 250px" alt="...">
                            @endif
                        </div>
                        <div class="form-group">
                            <div class="single-contact-information">
                                <p>Video</p>
                            </div>
                            <input type="file" class="form-control-file" name="video" id="video"
                                onchange="vidpreview(event)">
                            <br>
                            @if (isset($data->video_path))
                                <div class="" style="text-align: center">
                                    <video style="max-width: 75%;" controls>
                                        <source id="vid" src="/storage/{{ $data->video_path }}" type="video/mp4">

                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                            @endif
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-primary btn-user btn-block">Update</button>
                    </form>

                </div>
            @endif
            @if ($id == 2)
                <div class="card-body">
                    <form action="/edit-actionr" class="user" id="formBlog" method="post" enctype="multipart/form-data"
                        onsubmit="validateFormB(event)">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <div class="mb-1 small">Judul Blog</div>
                            <input type="text" class="form-control form-control-user" name="judul" id="judul"
                                value="{{ $data->judul_blog }}" placeholder="Judul Blog">
                        </div>
                        <input type="hidden" name="id_blog" value="{{ $data->id_blog }}">
                        <input type="hidden" name="path" value="2">
                        <div class="form-group">
                            <div class="mb-1 small">Kategori</div>
                            <input type="text" class="form-control form-control-user" name="kategori" id="kategori"
                                value="{{ $data->kategori }}" placeholder="Kategori">
                        </div>
                        <div class="form-group">
                            <div class="mb-1 small">isi blog</div>
                            <textarea type="textarea" class="form-control border-2 small" name="isi" id="isi"
                                rows="15"placeholder="Isi Blog">
                            {{ $data->isi_blog }}</textarea>
                        </div>
                        <div class="form-group">
                            <div class="single-contact-information">
                                <p>Gambar</p>
                            </div>
                            <input type="file" class="form-control-file" name="gambar" id="gambar"
                                onchange="previewb(event)">
                            <br>
                            @if ($data->gambar_blog)
                                <img src="/storage/{{ $data->gambar_blog }}" id="gambar-blog" class="img-thumbnail"
                                    style="max-width: 250px" alt="...">
                            @endif
                        </div>
                        <div class="form-group">
                            <div class="single-contact-information">
                                <p>Video</p>
                            </div>
                            <input type="file" class="form-control-file" name="video" id="video"
                                onchange="vidpreview(event)">
                            <br>
                            @if (isset($data->video_blog))
                                <div class="" style="text-align: center">
                                    <video style="max-width: 75%;" controls>
                                        <source id="vid" src="/storage/{{ $data->video_blog }}" type="video/mp4">

                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                            @endif
                        </div>
                        <hr>
                        <button type="submit" href="index.html"
                            class="btn btn-primary btn-user btn-block">Update</button>


                    </form>

                </div>
            @endif
            @if ($id == 3)
                <div class="card-body">
                    <form action="/edit-actionr" class="user" id="formHero" method="post"
                        enctype="multipart/form-data" onsubmit="validateFormH(event)">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <div class="mb-1 small">Judul</div>
                            <input type="text" class="form-control form-control-user" name="judul" id="judul"
                                value="{{ $data->nama }}" placeholder="Judul Modal">
                        </div>
                        <input type="hidden" name="id_modal" value="{{ $data->id_hero }}">
                        <input type="hidden" name="path" value="3">
                        <div class="form-group">
                            <div class="mb-1 small">Deskripsi</div>
                            <input type="text" class="form-control form-control-user" name="deskripsi" id="deskripsi"
                                value="{{ $data->deskripsi }}" placeholder="Deskripsi">
                        </div>
                        <div class="form-group">
                            <div class="single-contact-information">
                                <p>Gambar</p>
                            </div>
                            <input type="file" class="form-control-file" name="gambar" id="gambar"
                                onchange="previewh(event)">
                            <br>
                            @if ($data->gambar)
                                <img src="/storage/{{ $data->gambar }}" id="gambar-hero" class="img-thumbnail"
                                    style="max-width: 250px" alt="...">
                            @endif
                        </div>

                        <hr>
                        <button type="submit" href="index.html"
                            class="btn btn-primary btn-user btn-block">Update</button>


                    </form>

                </div>
            @endif
        </div>

    </div>
    <!-- /.container-fluid -->
    <script>
        function validateForm(e) {
            e.preventDefault();
            var nama = document.getElementById("nama_resep").value;
            var kategori = document.getElementById("kategori").value;
            var persiapan = document.getElementById("persiapan").value;
            var proses = document.getElementById("durasi").value;
            var porsi = document.getElementById("porsi").value;
            var gambar = document.getElementById("gambar").value;
            var video = document.getElementById("video").value;
            var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
            var allowedExtensionsvids = /(\.mp4|\.avi|\.3gp|\.gif)$/i;
            if (nama == "" || kategori == "" || persiapan == "" || proses == "" || porsi == "") {
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

        function validateFormB(e) {
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

        function validateFormH(e) {
            e.preventDefault();
            var judul = document.getElementById("judul").value;
            var deskripsi = document.getElementById("deskripsi").value;
            var gambar = document.getElementById("gambar").value;
            var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
            var allowedExtensionsvids = /(\.mp4|\.avi|\.3gp|\.gif)$/i;
            if (judul == "" || deskripsi == "") {
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
            } else {
                alertify.confirm("This is a confirm dialog.",
                    function() {
                        alertify.success('Ok');
                        document.getElementById('formHero').submit();
                    },
                    function() {
                        alertify.error('Cancel');
                    });
            }
        }


        function preview(e) {
            var output = document.getElementById("gambar-resep");
            output.src = URL.createObjectURL(event.target.files[0]);
        }

        function previewb(e) {
            var output = document.getElementById("gambar-blog");
            output.src = URL.createObjectURL(event.target.files[0]);
        }

        function previewh(e) {
            var output = document.getElementById("gambar-hero");
            output.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>
@endsection
