@extends('/layout.adminlayout')

@section('title', 'Receipes')

@section('content')

    <div class="container-fluid">

        <!-- Page Heading -->
        @if ($type == 1)
            <h1 class="h3 mb-2 text-gray-800">Blogs</h1>
        @endif
        @if ($type == 0)
            <h1 class="h3 mb-2 text-gray-800">Blogs Trash</h1>
        @endif

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    @if ($type == 1)
                        <a href="/blog-trash/2" class="btn btn-secondary btn-circle">
                            <i class="fa fa-trash"></i>
                        </a>
                    @endif
                    @if ($type == 0)
                        <a href="/blog-admin/2" class="btn btn-secondary btn-circle">
                            <i class="fa fa-reply"></i>
                        </a>
                    @endif
                </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Judul</th>
                                <th>Kategori</th>
                                <th>isi</th>
                                <th>Gambar</th>
                                <th>Video</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $data)
                                <tr>
                                    <td style="font-size: 12px">{{ $data->judul_blog }}</td>
                                    <td style="font-size: 12px">{{ $data->kategori }}</td>
                                    <td style="font-size: 11px">{{ $data->isi_blog }}</td>
                                    <td>
                                        @if (!empty($data->gambar_blog))
                                            <img style="max-width:250px" src="/storage/public/{{ $data->gambar_blog }}"
                                                alt="">
                                        @else
                                            Tidak ada gambar
                                        @endif
                                    </td>
                                    <td>
                                        @if (!empty($data->video_blog))
                                            <video style="max-width: 250px;" controls>
                                                <source src="/storage/public/{{ $data->video_blog }}" type="video/mp4">

                                                Your browser does not support the video tag.
                                            </video>
                                        @else
                                            Tidak ada video
                                        @endif
                                    </td>
                                    <td>
                                        @if ($type == 1)
                                            <a href="/edit-blog/2/{{ $data->id_blog }}" class="btn btn-primary btn-circle">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <a href="#" class="trash btn btn-danger btn-circle"
                                                id="1/{{ $data->id_blog }}">
                                                <i class="fa fa-minus"></i>
                                            </a>
                                        @endif
                                        @if ($type == 0)
                                            <a href="#" class="trash btn btn-primary btn-circle"
                                                id="0/{{ $data->id_blog }}">
                                                <i class="fa fa-undo"></i>
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
        <script>
            $(document).on('click', '.trash', function() {
                var a = this.id;

                alertify.confirm("This is a confirm dialog.",
                    function() {

                        alertify.success('Ok');
                        location.href = "/remove-blog/2/" + a;
                    },
                    function() {
                        alertify.error('Cancel');
                    });
            });
        </script>
    </div>
    <!-- /.container-fluid -->

@endsection
