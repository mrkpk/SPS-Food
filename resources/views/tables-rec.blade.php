@extends('/layout.adminlayout')

@section('title', 'Receipes')

@section('content')

    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Receipes</h1>


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
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
                                            <img style="max-width:250px" src="/storage/{{ $data->gambar_path }}"
                                                alt="">
                                        @else
                                            Tidak ada gambar
                                        @endif
                                    </td>
                                    <td>
                                        @if (!empty($data->video_path))
                                            <video style="max-width: 250px;" controls>
                                                <source src="/storage/{{ $data->video_path }}" type="video/mp4">

                                                Your browser does not support the video tag.
                                            </video>
                                        @else
                                            Tidak ada video
                                        @endif
                                    </td>
                                    <td>
                                        <a href="/edit-receipes/1/{{ $data->id_menu }}" class="btn btn-primary btn-circle">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <a href="/delete-receipes/1/{{ $data->id_menu }}" class="btn btn-danger btn-circle">
                                            <i class="fa fa-minus"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
