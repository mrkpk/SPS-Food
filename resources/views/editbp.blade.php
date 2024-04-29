@extends('/layout.adminlayout')

@section('title', 'Receipes')

@section('content')

    <div class="container-fluid">

        <!-- Page Heading -->
        @if ($id == 1)
            <h1 class="h3 mb-2 text-gray-800">Edit Bahan dan Bumbu</h1>
        @endif
        @if ($id == 2)
            <h1 class="h3 mb-2 text-gray-800">Edit Blogs</h1>
        @endif

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    <a href="/edit-receipes/1/{{ $menu->id_menu }}" class="btn btn-secondary btn-circle" title="back">
                        <i class="fa fa-arrow-left"></i>
                    </a>
                </h6>
            </div>
            @if ($id == 1)
                <div class="card-body">
                    <form action="/edit-actionbp" class="user" id="formReceipe" method="POST"
                        enctype="multipart/form-data" onsubmit="validateForm(event)">
                        @csrf
                        @method('POST')
                        <h1 class="h3 mb-2 text-gray-800">{{ $menu->nama_menu }}</h1>
                        <input type="hidden" name="id_menu" value="{{ $menu->id_menu }}">
                        <input type="hidden" name="path" value="1">
                        <hr>
                        <h3 class="h4 mb-2 text-gray-800">Bumbu</h3>

                        @for ($i = 0; $i < count($bumbu); $i++)
                            <div class="form-group">
                                <div class="mb-1 small">Bumbu ke {{ $i + 1 }}</div>
                                <div class="row">
                                    <input type="text" id="kategori" name="bumbu[{{ $i }}]"
                                        class="col-8 ml-3 mr-3 form-control form-control-user"
                                        value="{{ $bumbu[$i]['bahan'] }}" placeholder="">
                                    <a class="col-2 del-bum btn btn-secondary btn-user btn-block"
                                        id="{{ $bumbu[$i]->id_bahan }}">Hapus</a>
                                    <input type="hidden" name="id_bumbu[{{ $i }}]"
                                        value="{{ $bumbu[$i]->id_bahan }}">
                                </div>
                            </div>
                        @endfor
                        <div id="bumbu_field">

                        </div>
                        <a class="col-3 btn btn-secondary btn-user float-right btn-block" id="bumbu">Tambah
                            bumbu baru</a>
                        <br>
                        <br>
                        <hr>
                        <h3 class="h4 mb-2 text-gray-800">Bahan</h3>
                        @for ($i = 0; $i < count($bahan); $i++)
                            <div class="form-group">
                                <div class="mb-1 small">Bahan ke {{ $i + 1 }}</div>
                                <div class="row">
                                    <input type="text" id="kategori" name="bahan[{{ $i }}]"
                                        class="col-8 ml-3 mr-3 form-control form-control-user"
                                        value="{{ $bahan[$i]['bahan'] }}" placeholder="">
                                    <a class="col-2 del-bum btn btn-secondary btn-user btn-block"
                                        id="{{ $bahan[$i]->id_bahan }}">Hapus</a>
                                    <input type="hidden" name="id_bahan[{{ $i }}]"
                                        value="{{ $bahan[$i]->id_bahan }}">
                                </div>
                            </div>
                        @endfor
                        <div id="bahan_field">

                        </div>
                        <a class="col-3 btn btn-secondary btn-user float-right btn-block" id="bahan">Tambah
                            bahan baru</a>
                        <br>
                        <br>
                        <hr>
                        <button type="submit" class="btn btn-primary btn-user btn-block">Update</button>
                    </form>

                </div>
            @endif
            @if ($id == 2)
                <div class="card-body">
                    <form action="/edit-actionbp" class="user" id="formReceipe" method="POST"
                        enctype="multipart/form-data" onsubmit="validateForm(event)">
                        @csrf
                        @method('POST')
                        <h1 class="h3 mb-2 text-gray-800">{{ $menu->nama_menu }}</h1>
                        <input type="hidden" name="id_menu" value="{{ $menu->id_menu }}">
                        <input type="hidden" name="path" value="2">
                        <hr>

                        @for ($i = 0; $i < count($proses); $i++)
                            <div class="form-group">
                                <div class="mb-1 small">Proses ke {{ $i + 1 }}</div>
                                <div class="row">
                                    <textarea type="text" rows="5" id="kategori" name="proses[{{ $i }}]"
                                        class="col-8 ml-3 mr-3 form-control" id="exampleFormControlTextarea1" placeholder="Proses">{{ $proses[$i]['proses'] }}</textarea>
                                    <a class="col-2 del-pro btn btn-secondary btn-user btn-block"
                                        id="{{ $proses[$i]->id_proses }}">Hapus</a>
                                    <input type="hidden" name="id_proses[{{ $i }}]"
                                        value="{{ $proses[$i]->id_proses }}">

                                </div>
                            </div>
                        @endfor
                        <div id="proses_field">

                        </div>
                        <a class="col-3 btn btn-secondary btn-user float-right btn-block" id="proses">Tambah
                            proses baru</a>

                        <br>
                        <br>
                        <hr>
                        <button type="submit" class="btn btn-primary btn-user btn-block">Update</button>
                    </form>

                </div>
            @endif
        </div>

    </div>
    <!-- /.container-fluid -->
    @if ($id == 1)
        <script>
            $(document).ready(function() {
                var a = {{ count($bumbu) }};
                var b = a - 1;
                $('#bumbu').click(function() {
                    $('#c' + b + '').hide();
                    $('#bumbu_field').append(
                        '<div class="form-group" id="row' + a + '" style="margin-left:5px">' +
                        '<div class="mb-1 small">Bumbu ke-' + (a + 1) +
                        '</div><div class="row"><input type="text" id="kategori" name="bumbu[' + (a) +
                        ']" class="col-8 mx-3 form-control form-control-user"placeholder="...">' +
                        '<a class="col-2 qq btn btn-secondary btn-user btn-block" name=' + a + ' id="c' +
                        a +
                        '">Hapus</a></div></div>'
                    );
                    a++;
                    b++;
                })

                var c = {{ count($bahan) }};
                var d = c - 1;
                $('#bahan').click(function() {
                    $('#d' + d + '').hide();
                    $('#bahan_field').append(
                        '<div class="form-group" id="rows' + c + '" style="margin-left:5px">' +
                        '<div class="mb-1 small">Bahan ke-' + (c + 1) +
                        '</div><div class="row"><input type="text" id="kategori" name="bahan[' + c +
                        ']" class="col-8 mx-3 form-control form-control-user"placeholder="...">' +
                        '<a class="col-2 pp btn btn-secondary btn-user btn-block" name=' + c + ' id="d' +
                        c +
                        '">Hapus</a></div></div>'
                    );
                    c++;
                    d++;
                })
                $(document).on('click', '.qq', function() {
                    var button_id = $(this).attr("name");
                    console.log('#row' + button_id + '');
                    $('#row' + button_id + '').remove();
                    $('#c' + (button_id - 1) + '').show();
                    a--;
                    b--;
                });
                $(document).on('click', '.pp', function() {
                    var button_id = $(this).attr("name");
                    console.log('#rows' + button_id + '');
                    $('#rows' + button_id + '').remove();
                    $('#d' + (button_id - 1) + '').show();
                    c--;
                    d--;

                });
            })

            $(document).on('click', '.del-bum', function() {

                var id_bah = $(this).attr("id");
                alertify.confirm("This is a confirm dialog.",
                    function() {

                        alertify.success('Ok');
                        fetch('/delete-bahan/1/' + id_bah, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            },
                        });

                        window.location.reload();
                    },
                    function() {
                        alertify.error('Cancel');
                    });
            })
        </script>
    @endif
    @if ($id == 2)
        <script>
            $(document).ready(function() {
                var a = {{ count($proses) }};
                var b = a - 1;
                $('#proses').click(function() {
                    $('#c' + b + '').hide();
                    $('#proses_field').append(
                        '<div class="form-group" id="row' + a + '" style="margin-left:5px">' +
                        '<div class="mb-1 small">Proses ke-' + (a + 1) +
                        '</div><div class="row"><textarea id="kategori" name="proses[' + (a) +
                        ']" class="col-8 mx-3 form-control"placeholder="..." id="exampleFormControlTextarea1"></textarea>' +
                        '<a class="col-2 qq btn btn-secondary btn-user btn-block" name=' + a + ' id="c' +
                        a +
                        '">Hapus</a></div></div>'
                    );
                    a++;
                    b++;
                })
                $(document).on('click', '.qq', function() {
                    var button_id = $(this).attr("name");
                    console.log('#row' + button_id + '');
                    $('#row' + button_id + '').remove();
                    $('#c' + (button_id - 1) + '').show();
                    a--;
                    b--;

                });
            })
            $(document).on('click', '.del-pro', function() {

                var id_pro = $(this).attr("id");
                alertify.confirm("This is a confirm dialog.",
                    function() {

                        alertify.success('Ok');
                        fetch('/delete-bahan/2/' + id_pro, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            },
                        });

                        window.location.reload();
                    },
                    function() {
                        alertify.error('Cancel');
                    });
            })
        </script>
    @endif
@endsection
