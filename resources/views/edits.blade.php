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
        @if ($id == 5)
            <h1 class="h3 mb-2 text-gray-800">Edit Products</h1>
        @endif

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    @if ($id == 1)
                        <a href="/receipes-admin/1" class="btn btn-secondary btn-circle" title="back">
                            <i class="fa fa-arrow-left"></i>
                        </a>
                    @endif
                    @if ($id == 2)
                        <a href="/blog-admin/2" class="btn btn-secondary btn-circle" title="back">
                            <i class="fa fa-arrow-left"></i>
                        </a>
                    @endif
                    @if ($id == 5)
                        <a href="/product-admin/3" class="btn btn-secondary btn-circle" title="back">
                            <i class="fa fa-arrow-left"></i>
                        </a>
                    @endif

                </h6>
            </div>
            @if ($id == 1)
                <div class="card-body">
                    <form action="/edit-actionr" class="user" id="formReceipe" method="POST"
                        enctype="multipart/form-data" onsubmit="validateForm(event)">
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
                                <div class="mb-1 small">Resep oleh</div>
                                <input type="text" id="oleh" name="oleh" class="form-control form-control-user"
                                    value="{{ $data->oleh }}" placeholder="Resep oleh..">
                            </div>

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
                                <img src="/storage/public/{{ $data->gambar_path }}" id="gambar-resep" class="img-thumbnail"
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
                        <div class="form-group">
                            <div class="mb-1 small">Link Instagram</div>
                            <input type="text" id="link" name="link" class="form-control form-control-user"
                                value="{{ $data->link }}" placeholder="Link Instagram">
                        </div>

                        <div class="row">
                            <div class="col-4">
                                <a href="/editbp/1/{{ $data->id_menu }}" class="btn btn-primary btn-user btn-block">Edit
                                    Bumbu &
                                    Bahan</a>
                            </div>
                            <div class="col-4">

                            </div>
                            <div class="col-4">
                                <a href="/editbp/2/{{ $data->id_menu }}" class="btn btn-primary btn-user btn-block">Edit
                                    Proses</a>
                            </div>

                        </div>
                        <br>
                        <hr>
                        <button type="submit" class="btn btn-primary btn-user btn-block">Update</button>
                    </form>

                </div>
            @endif
            @if ($id == 2)
                <div class="card-body">
                    <form action="/edit-actionr" class="user" id="formBlog" method="post"
                        enctype="multipart/form-data" onsubmit="validateFormB(event)">
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
                                <img src="/storage/public/{{ $data->gambar_blog }}" id="gambar-blog"
                                    class="img-thumbnail" style="max-width: 250px" alt="...">
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
                        <input type="hidden" name="id_modal" value="{{ $data->id_modal }}">
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
                                <img src="/storage/public/{{ $data->gambar }}" id="gambar-hero" class="img-thumbnail"
                                    style="max-width: 250px" alt="...">
                            @endif
                        </div>

                        <hr>
                        <button type="submit" href="index.html"
                            class="btn btn-primary btn-user btn-block">Update</button>


                    </form>

                </div>
            @endif

            @if ($id == 4)
                <div class="card-body">
                    <form action="/kirim-hero" class="user" id="formHero" method="post"
                        enctype="multipart/form-data" onsubmit="validateFormH(event)">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <div class="mb-1 small">Judul</div>
                            <input type="text" class="form-control form-control-user" name="judul" id="judul"
                                placeholder="Judul Modal">
                        </div>
                        <input type="hidden" name="id_modal">
                        <input type="hidden" name="path" value="3">
                        <div class="form-group">
                            <div class="mb-1 small">Deskripsi</div>
                            <input type="text" class="form-control form-control-user" name="deskripsi" id="deskripsi"
                                placeholder="Deskripsi">
                        </div>
                        <div class="form-group">
                            <div class="single-contact-information">
                                <p>Gambar</p>
                            </div>
                            <input type="file" class="form-control-file" name="gambar" id="gambar"
                                onchange="previewh(event)">
                            <br>

                            <img src="" id="gambar-hero" class="img-thumbnail" style="max-width: 250px"
                                alt="...">

                        </div>

                        <hr>
                        <button type="submit" href="index.html"
                            class="btn btn-primary btn-user btn-block">Tambah</button>


                    </form>

                </div>
            @endif
            @if ($id == 5)
                <div class="card-body">
                    <form action="/edit-actionr" class="user" id="formProduct" method="post"
                        enctype="multipart/form-data" onsubmit="validateFormP(event)">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <div class="single-contact-information">Nama Produk</div>
                            <input type="text" class="form-control form-control-user" name="nama" id="nama"
                                value="{{ $data->nama_produk }}" placeholder="Nama Produk">
                        </div>
                        <input type="hidden" name="id_produk" value="{{ $data->id_produk }}">
                        <input type="hidden" name="path" value="4">

                        <div class="form-group">
                            <div class="single-contact-information">
                                <p>Kategori</p>
                            </div>

                            <select class="form-select" name="kategori" id="kategori">
                                <option value="0" selected>Open this select menu</option>
                                <option value="Bijag">Bijag</option>
                                <option value="Kaca">Kaca</option>
                                <option value="Langit Biru">Langit Biru</option>
                                <option value="Mimora">Mimora</option>
                                <option value="Padamu">Padamu</option>
                                <option value="Vitarasa">Vitarasa</option>
                                <option value="Bisohun">Bisohun</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="single-contact-information">Principal</div>
                            <input type="text" class="form-control form-control-user" name="principal" id="principal"
                                value="{{ $data->principal }}" placeholder="Principal">
                        </div>
                        <div class="form-group">
                            <div class="single-contact-information">Deskripsi</div>
                            <input type="text" class="form-control form-control-user" name="desk" id="desk"
                                value="{{ $data->desk }}" placeholder="Deskripsi">
                        </div>
                        <div class="form-group">
                            <div class="single-contact-information">
                                <p>Gambar</p>
                            </div>
                            <input type="file" class="form-control-file" name="gambar" id="gambar"
                                onchange="previewp(event)">
                            <br>
                            @if ($data->gambar)
                                <img src="/storage/public/{{ $data->gambar }}" id="gambar-product" class="img-thumbnail"
                                    style="max-width: 250px" alt="...">
                            @endif
                        </div>

                        <hr>
                        <button type="submit" href="index.html"
                            class="btn btn-primary btn-user btn-block">Update</button>


                    </form>

                </div>
            @endif
            @if ($id == 6)
                <div class="card-body">
                    <form action="/edit-actionr" class="user" id="formContact" method="post"
                        enctype="multipart/form-data" onsubmit="validateFormC(event)">
                        @csrf
                        @method('POST')
                        <h1 class="h3 mb-2 text-gray-800">Content</h1>
                        <div class="form-group">
                            <div class="mb-1 small">Tentang - Home</div>
                            <textarea type="text" class="form-control" rows="4" name="tentang_home" placeholder="Judul Modal">
                                {{ $data->tentang_home }}
                            </textarea>
                        </div>
                        <div class="form-group">
                            <div class="mb-1 small">Resep - Desc</div>
                            <textarea type="text" class="form-control" rows="4" name="resep_desc" placeholder="Resep deskripsi">
                                {{ $data->resep_desc }}
                            </textarea>
                        </div>
                        <div class="form-group">
                            <div class="mb-1 small">Produk - Desc</div>
                            <textarea type="text" class="form-control" rows="4" name="produk_desc" placeholder="Produk deskripsi">
                                {{ $data->produk_desc }}
                            </textarea>
                        </div>


                        <h1 class="h3 mb-2 text-gray-800">About</h1>
                        <div class="form-group">
                            <div class="mb-1 small">Tentang - Tentang Kami - Primary</div>
                            <textarea type="text" class="form-control" rows="4" name="prim_about" placeholder="Judul Modal">
                                {{ $data->prim_about }}
                            </textarea>
                        </div>
                        <div class="form-group">
                            <div class="mb-1 small">Tentang - Tentang Kami - Secondary</div>
                            <textarea type="text" class="form-control" rows="4" name="sec_about" placeholder="Judul Modal">
                                {{ $data->sec_about }}
                            </textarea>
                        </div>
                        <div class="form-group">
                            <div class="mb-1 small">Visi</div>
                            <textarea type="text" class="form-control" rows="4" name="visi" placeholder="Judul Modal">
                                {{ $data->visi }}
                            </textarea>
                        </div>
                        <div class="form-group">
                            <div class="mb-1 small">Misi</div>
                            <textarea type="text" class="form-control" rows="4" name="misi" placeholder="Judul Modal">
                                {{ $data->misi }}
                            </textarea>
                        </div>

                        <h1 class="h3 mb-2 text-gray-800">Kontak</h1>
                        <div class="form-group">
                            <div class="mb-1 small">Deskripsi pada halaman contact</div>
                            <input type="hidden" name="path" value="6">
                            <textarea type="text" class="form-control" rows="4" name="desc_cont" id="nama"
                                placeholder="Judul Modal">
                                {{ $data->desc_cont }}
                            </textarea>
                        </div>
                        <div class="form-group">
                            <div class="mb-1 small">Alamat 1 pada halaman contact</div>
                            <input type="text" class="form-control" name="alamat1" placeholder="Alamat1"
                                value="{{ $data->alamat1 }}">

                        </div>
                        <div class="form-group">
                            <div class="mb-1 small">Alamat 2 pada halaman contact</div>
                            <input type="text" class="form-control" name="alamat2" placeholder="Alamat 2"
                                value="{{ $data->alamat2 }}">
                        </div>
                        <div class="form-group">
                            <div class="mb-1 small">No HP 1 pada halaman contact</div>
                            <input type="text" class="form-control" name="no_hp1" placeholder="No HP 1"
                                value="{{ $data->no_hp1 }}">
                        </div>
                        <div class="form-group">
                            <div class="mb-1 small">No HP 2 pada halaman contact</div>
                            <input type="text" class="form-control" name="no_hp2" placeholder="No HP 2"
                                value="{{ $data->no_hp2 }}">
                        </div>
                        <div class="form-group">
                            <div class="mb-1 small">No HP 3 pada halaman contact</div>
                            <input type="text" class="form-control" name="no_hp3" placeholder="No HP 3"
                                value="{{ $data->no_hp3 }}">
                        </div>
                        <div class="form-group">
                            <div class="mb-1 small">Email 1 pada halaman contact</div>
                            <input type="text" class="form-control" name="email1" placeholder="Email 1"
                                value="{{ $data->email1 }}">
                        </div>
                        <div class="form-group">
                            <div class="mb-1 small">Email 2 pada halaman contact</div>
                            <input type="text" class="form-control" name="email2" placeholder="Email 2"
                                value="{{ $data->email2 }}">
                        </div>
                        <div class="form-group">
                            <div class="mb-1 small">Email 3 pada halaman contact</div>
                            <input type="text" class="form-control" name="email3" placeholder="Email 3"
                                value="{{ $data->email3 }}">
                        </div>
                        {{-- <input type="hidden" name="id_produk" value="{{ $data->id_produk }}">
                        <input type="hidden" name="path" value="4">
                        <div class="form-group">
                            <div class="mb-1 small">Kategori</div>
                            <input type="text" class="form-control form-control-user" name="kategori" id="kategori"
                                value="{{ $data->kategori }}" placeholder="Deskripsi">
                        </div>
                        <div class="form-group">
                            <div class="mb-1 small">Principal</div>
                            <input type="text" class="form-control form-control-user" name="principal" id="principal"
                                value="{{ $data->principal }}" placeholder="Deskripsi">
                        </div>
                        <div class="form-group">
                            <div class="single-contact-information">
                                <p>Gambar</p>
                            </div>
                            <input type="file" class="form-control-file" name="gambar" id="gambar"
                                onchange="previewp(event)">
                            <br>
                            @if ($data->gambar)
                                <img src="/storage/public/{{ $data->gambar }}" id="gambar-product" class="img-thumbnail"
                                    style="max-width: 250px" alt="...">
                            @endif
                        </div>

                        <hr> --}}
                        <button type="submit" href="index.html"
                            class="btn btn-primary btn-user btn-block">Update</button>


                    </form>

                </div>
            @endif
            @if ($id == 7)
                <div class="card-body">
                    <form action="/edit-actionr" class="user" id="formCat" method="post"
                        enctype="multipart/form-data" onsubmit="validateFormCat(event)">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <div class="mb-1 small">Kategori</div>
                            <input type="text" class="form-control form-control-user" name="kategori" id="kategori"
                                value="{{ $data->kategori }}" placeholder="Kategori">
                        </div>
                        <input type="hidden" name="id_cat" value="{{ $data->id_cat }}">
                        <input type="hidden" name="path" value="7">
                        <div class="form-group">
                            <div class="mb-1 small">Deskripsi</div>
                            <textarea type="text" class="form-control" rows="4" name="desk" id="desk"
                                placeholder="Deskripsi">
                                {{ $data->desk }}
                            </textarea>
                        </div>
                        <div class="form-group">
                            <div class="single-contact-information">
                                <p>Gambar</p>
                            </div>
                            <input type="file" class="form-control-file" name="gambar" id="gambar"
                                onchange="previewcat(event)">
                            <br>
                            @if ($data->path)
                                <img src="/storage/public/{{ $data->path }}" id="gambar_cat" class="img-thumbnail"
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
            if (gambar != "") {
                var gambarsize = document.getElementById("gambar").files[0].size / 1024 / 1024;
            }
            var video = document.getElementById("video").value;
            var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
            var allowedExtensionsvids = /(\.mp4|\.avi|\.3gp|\.gif)$/i;
            if (nama == "" || kategori == "") {
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
            if (gambar != "") {
                var gambarsize = document.getElementById("gambar").files[0].size / 1024 / 1024;
            }
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
            if (gambar != "") {
                var gambarsize = document.getElementById("gambar").files[0].size / 1024 / 1024;
            }
            var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
            var allowedExtensionsvids = /(\.mp4|\.avi|\.3gp|\.gif)$/i;

            if (gambar == "") {
                alertify
                    .alert("Ooopss..", "Harap upload gambar.", function() {
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
            if (gambarsize > 2) {
                alertify
                    .alert("Ooopss..", "Ukuran gambar terlalu besar.", function() {
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

        function validateFormCat(e) {
            e.preventDefault();
            var kategori = document.getElementById("kategori").value;
            var desk = document.getElementById("desk").value;
            var gambar = document.getElementById("gambar").value;
            if (gambar != "") {
                var gambarsize = document.getElementById("gambar").files[0].size / 1024 / 1024;
            }
            var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;

            if (gambar != "" && !allowedExtensions.exec(gambar)) {
                alertify
                    .alert("Ooopss..", "Extension gambar salah.", function() {
                        alertify.message('OK');
                    });
                return false;
            } else if (kategori == "" || desk == "") {
                alertify
                    .alert("Ooopss..", "Tidak boleh ada field kosong.", function() {
                        alertify.message('OK');
                    });
                return false;
            } else if (gambarsize > 2) {
                alertify
                    .alert("Ooopss..", "Ukuran gambar terlalu besar.", function() {
                        alertify.message('OK');
                    });
                return false;
            } else {
                alertify.confirm("This is a confirm dialog.",
                    function() {
                        alertify.success('Ok');
                        document.getElementById('formCat').submit();
                    },
                    function() {
                        alertify.error('Cancel');
                    });
            }
        }

        function validateFormP(e) {
            e.preventDefault();
            var nama = document.getElementById("nama").value;
            var principal = document.getElementById("principal").value;
            var kategori = document.getElementById("kategori").value;
            var gambar = document.getElementById("gambar").value;
            if (gambar != "") {
                var gambarsize = document.getElementById("gambar").files[0].size / 1024 / 1024;
            }

            var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
            console.log(gambar.size);
            if (nama == "" || principal == "" || kategori == "") {
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
            if (gambar != "" && !allowedExtensions.exec(gambar)) {
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
                alertify.confirm("This is a confirm dialog.",
                    function() {
                        alertify.success('Ok');
                        document.getElementById('formProduct').submit();
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

        function previewp(e) {
            var output = document.getElementById("gambar-product");
            output.src = URL.createObjectURL(event.target.files[0]);
        }

        function previewh(e) {
            var output = document.getElementById("gambar-hero");
            output.src = URL.createObjectURL(event.target.files[0]);
        }

        function previewcat(e) {
            var output = document.getElementById("gambar_cat");
            output.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>
@endsection
