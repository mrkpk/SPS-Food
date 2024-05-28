@extends('/layout.adminlayout')

@section('title', 'Receipes')

@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            @if ($path == 1)
                <h1 class="h3 mb-0 text-gray-800">Index Admin</h1>
            @endif
            @if ($path == 0)
                <h1 class="h3 mb-0 text-gray-800">Trash</h1>
            @endif
        </div>
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->

            @if ($path == 1)
                <div class="col-xl-6 col-md-4 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <a class="btn btn-primary btn-icon-split" id="herobut">
                                        <span class="icon text-white-50">
                                            <i class="fa fa-flag" aria-hidden="true"></i>
                                        </span>
                                        <span class="text">Edit Jumbotron</span>
                                    </a>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fa fa-window-maximize fa-2x" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Annual) Card Example -->
                <div class="col-xl-6 col-md-4 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <a class="btn btn-success btn-icon-split" id="bestbut">
                                        <span class="icon text-white-50">
                                            <i class="fa fa-flag" aria-hidden="true"></i>
                                        </span>
                                        <span class="text">Edit Best Receipe</span>
                                    </a>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fa fa-star fa-2x" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-xl-4 col-md-4 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <a class="btn btn-warning btn-icon-split" id="igbut">
                                        <span class="icon text-white-50">
                                            <i class="fa fa-flag" aria-hidden="true"></i>
                                        </span>
                                        <span class="text">Edit IG Highlights</span>
                                    </a>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fa fa-star fa-2x" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            @endif
            <div class="container-fluid">


                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">

                    </div>
                    <div class="card-body">
                        <div class="table-responsive" id="herotab">
                            @if ($path == 1)
                                <a href="/tambah-hero/4/0" class="btn btn-success btn-circle" style="margin-bottom: 10px"
                                    data-toggle="tooltip" data-placement="top" title="Tambah Jumbotron">
                                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                </a>
                                <a href="/pages/0" class="btn btn-secondary btn-circle" style="margin-bottom: 10px"
                                    data-toggle="tooltip" data-placement="top" title="Trash">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            @endif
                            @if ($path == 0)
                                <a href="/pages/1" class="btn btn-secondary btn-circle" style="margin-bottom: 10px"
                                    data-toggle="tooltip" data-placement="top" title="Return">
                                    <i class="fa-solid fa-reply"></i>
                                </a>
                                <a href="#" id="0" class="btn btn-danger dump btn-circle"
                                    style="margin-bottom: 10px" data-toggle="tooltip" data-placement="top"
                                    title="Clear Trash">
                                    <i class="fa-solid fa-dumpster"></i>
                                </a>
                            @endif


                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        @if ($path == 1)
                                            <th>No</th>
                                        @endif
                                        <th>judul</th>
                                        <th>Isi</th>
                                        <th>Gambar (5184 x 3456)</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                @if ($path == 1)
                                    <tbody id="hero">

                                    </tbody>
                                @endif
                                @if ($path == 0)
                                    <tbody>
                                        <tr>
                                            @foreach ($data as $hero)
                                                <td>{{ $hero['nama'] }}</td>
                                                <td>{{ $hero['deskripsi'] }}</td>
                                                <td><img style="max-width:500px" src="/storage/public/{{ $hero['gambar'] }}"
                                                        alt=""></td>
                                                <td>
                                                    <a href="#" id="0/{{ $hero['id_modal'] }}"
                                                        class="btn btn-secondary delete btn-circle" title="Rollback">
                                                        <i class="fa-solid fa-rotate-left fa-spin fa-spin-reverse"></i>
                                                    </a>
                                                    <a href="#" id="2/{{ $hero['id_modal'] }}"
                                                        class="btn btn-danger delete btn-circle" title="Delete">
                                                        <i class="fa-solid fa-rotate-left fa-trash fa-spin-reverse"></i>
                                                    </a>
                                                </td>
                                        </tr>
                                @endforeach
                                </tbody>
                                @endif
                            </table>

                        </div>
                        @if ($path == 1)
                            <div class="table-responsive" id="besttab">
                                <!-- Button trigger modal -->

                                <a href="#" id="butadd" class="btn btn-success btn-circle"
                                    style="margin-bottom: 10px" data-toggle="modal" data-target="#exampleModal">
                                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                </a>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <table class="table table-bordered" id="dataTable" width="100%"
                                                    cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th>Urutan</th>
                                                            <th>Menu</th>
                                                            <th>Gambar</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody id="nol">

                                                    </tbody>

                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                </div>


                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Urutan</th>
                                            <th>Menu</th>
                                            <th>Gambar</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody id="best">

                                    </tbody>

                                </table>

                            </div>
                        @endif
                    </div>
                </div>

            </div>


        </div>
    </div>
    @if ($path != 0)
        <script>
            tampilDataHero()
            tampilDataBest()

            tampilDatanotBest()
            $("#besttab").hide();

            $(document).ready(function() {
                $("#herobut").click(function() {
                    $("#herotab").toggle(1000);
                    $("#besttab").hide(300);

                });
            });

            $(document).ready(function() {
                $("#bestbut").click(function() {
                    $("#besttab").toggle(1000);
                    $("#herotab").hide(300);

                });
            });





            function tampilDataHero() {

                $('#hero').html('');
                $.ajax({
                    url: "{{ route('hero') }}",
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $.each(data, function(key, values) {
                            $('#hero').append('<tr><td>' + parseInt(key + 1) + '</td><td>' + data[key]
                                .nama + '</td><td>' + data[key].deskripsi +
                                '</td><td><img style="max-width:500px" src="/storage/public/' + data[
                                    key]
                                .gambar + '" alt=""></td><td><a id="edit" href="/edit-hero/3/' + data[
                                    key].id_modal + '" name="' + data[key].id_modal +
                                '" class="btn-pilih btn btn-success btn-circle"><i class="fa-solid fa-pencil"></i></a><a id="' +
                                data[key].id_modal + '" name="' + data[key].id_modal +
                                '" class="btn btn-danger trash btn-circle"><i class="fa-solid fa-circle-minus"></i></a>' +
                                (data[key].first == 0 ? '<a href="/pinned/' +
                                    data[key].id_modal + '" name="' + data[key].id_modal +
                                    '" class="btn btn-primary btn-circle"><i class="fa-solid fa-thumbtack"></i></a>' :
                                    '') +
                                '</td></tr>'
                            );
                        });
                    }

                });
            }

            function tampilDataBest() {

                $('#best').html('');
                $.ajax({
                    url: "{{ route('best') }}",
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        var countKey = Object.keys(data).length;
                        if (countKey == 6) {
                            $("#butadd").hide(300)
                            $('#exampleModal').modal('hide')
                        } else {
                            $("#butadd").show(300)
                        }
                        console.log(countKey);
                        $.each(data, function(key, values) {

                            $('#best').append('<tr><td>' + parseInt(key + 1) + '</td><td id="' + data[key]
                                .id_menu + '">' + data[key].nama_menu +
                                '</td><td style="text-align:center"><img style="max-width:100px;margin-bottom:20px" src="/storage/public/' +
                                data[key].gambar_path + '" alt=""></td><td><a id="1" name="' + data[key]
                                .id_menu +
                                '" class="btn-pilih btn btn-danger btn-circle"><i class="fa fa-minus-circle" aria-hidden="true"></i></i></a></td></tr>'
                            );
                        });
                    }

                });
            }

            function tampilDatanotBest() {

                $('#nol').html('');
                $.ajax({
                    url: "{{ route('tambahbest') }}",
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $.each(data, function(key, values) {
                            $('#nol').append('<tr><td contenteditable>' + parseInt(key + 1) +
                                '</td><td id="' + data[key].id_menu + '">' + data[key].nama_menu +
                                '</td><td style="text-align:center"><img style="max-width:100px" src="/storage/public/' +
                                data[
                                    key]
                                .gambar_path +
                                '" alt=""></td><td><a id="2" name="' + data[key].id_menu +
                                '" class="btn-pilih btn btn-success btn-circle"><i class="fa fa-minus-circle" aria-hidden="true"></i></i></a></td></tr>'
                            );
                        });
                    }

                });
            }

            $(document).on('click', '.btn-pilih', function() {
                var id_t = this.id;
                var id = this.name;
                if (id_t == 1) {
                    var value = 0
                } else {
                    var value = 1
                }


                $.ajax({
                    url: "/updatebest/" + id + "/" + value,
                    type: "GET",
                    data: {

                        id: id,
                        value: value
                    },
                    success: function(response) {

                        tampilDataBest()

                        tampilDatanotBest()
                    }
                })
            });
            $(document).on('click', '.trash', function() {
                var a = this.id;

                alertify.confirm("Apakah anda yakin.",
                    function() {

                        alertify.success('Ok');
                        location.href = "/remove-hero/3/1/" + a;
                    },
                    function() {
                        alertify.error('Cancel');
                    });
            });
        </script>
    @endif
    <script>
        $(document).on('click', '.delete', function() {
            var a = this.id;

            alertify.confirm("Apakah anda yakin.",
                function() {

                    alertify.success('Ok');
                    location.href = "/remove-hero/3/" + a;
                },
                function() {
                    alertify.error('Cancel');
                });
        });

        $(document).on('click', '.dump', function() {
            var a = this.id;

            alertify.confirm("Apakah anda yakin menghapus permanen semua item ?",
                function() {

                    alertify.success('Ok');
                    location.href = "/clear-trash/" + a;
                },
                function() {
                    alertify.error('Cancel');
                });
        });
    </script>
@endsection
