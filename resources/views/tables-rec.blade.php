@extends('/layout.adminlayout')

@section('title', 'Receipes')

@section('content')

    <div class="container-fluid">

        <!-- Page Heading -->
        @if ($type == 1)
            <h1 class="h3 mb-2 text-gray-800">Receipes</h1>
        @endif
        @if ($type == 0)
            <h1 class="h3 mb-2 text-gray-800">Receipes Trash</h1>
        @endif


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    @if ($type == 1)
                        <a href="/receipes-trash/1" class="btn btn-secondary btn-circle">
                            <i class="fa fa-trash"></i>
                        </a>
                    @endif
                    @if ($type == 0)
                        <a href="/receipes-admin/1" class="btn btn-secondary btn-circle">
                            <i class="fa fa-reply"></i>
                        </a>
                        <a href="#" id="1" class="btn btn-danger dump btn-circle" data-toggle="tooltip"
                            data-placement="top" title="Clear Trash">
                            <i class="fa-solid fa-dumpster"></i>
                        </a>
                    @endif
                </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama Menu</th>
                                <th>Kategori</th>
                                <th>Gambar</th>
                                <th>Video</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $data)
                                <tr>
                                    <td>{{ $data->nama_menu }}</td>
                                    <td>{{ $data->kategori }}</td>
                                    <td>
                                        @if (!empty($data->gambar_path))
                                            <img style="max-width:250px" src="/storage/public/{{ $data->gambar_path }}"
                                                alt="">
                                        @else
                                            Tidak ada gambar
                                        @endif
                                    </td>
                                    <td>
                                        @if (!empty($data->video_path))
                                            <video style="max-width: 250px;" controls>
                                                <source src="/storage/public/{{ $data->video_path }}" type="video/mp4">

                                                Your browser does not support the video tag.
                                            </video>
                                        @else
                                            Tidak ada video
                                        @endif
                                    </td>
                                    <td>
                                        @if ($type == 1)
                                            <a href="/edit-receipes/1/{{ $data->id_menu }}"
                                                class="btn btn-primary btn-circle">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <a href="#" class="trash btn btn-danger btn-circle"
                                                id="1/{{ $data->id_menu }}">
                                                <i class="fa fa-minus"></i>
                                            </a>
                                        @endif
                                        @if ($type == 0)
                                            <a href="#" class="trash btn btn-primary btn-circle"
                                                id="0/{{ $data->id_menu }}">
                                                <i class="fa fa-undo"></i>
                                            </a>
                                            <a href="#" class="trash btn btn-danger btn-circle"
                                                id="2/{{ $data->id_menu }}">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        @endif
                                        <!-- Logout Modal-->

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <script>
        $(document).on('click', '.trash', function() {
            var a = this.id;

            alertify.confirm("Apakah anda yakin ?",
                function() {

                    alertify.success('Ok');
                    location.href = "/remove-receipes/1/" + a;
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


    <!-- /.container-fluid -->
@endsection
