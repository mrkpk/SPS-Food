@extends('/layout.adminlayout')

@section('title', 'Receipes')

@section('content')

    <div class="container-fluid">

        <!-- Page Heading -->



        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"></h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <h1 class="col-11 h3 mb-2 text-gray-800">About</h1>
                    <a href="/edit-content/6/1" class="btn btn-primary btn-circle">
                        <i class="fa fa-pencil"></i>
                    </a>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Konten</th>
                                <th>Isi</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="font-size: 14px">Primary About</td>
                                <td style="font-size: 16px" contenteditable="">{{ $data->prim_about }}</td>
                            </tr>
                            <tr>
                                <td style="font-size: 14px">Secondary About</td>
                                <td style="font-size: 16px">{{ $data->sec_about }}</td>
                            </tr>
                            <tr>
                                <td style="font-size: 14px">Visi</td>
                                <td style="font-size: 16px">{{ $data->visi }}</td>
                            </tr>
                            <tr>
                                <td style="font-size: 14px">Misi</td>
                                <td style="font-size: 16px">{{ $data->misi }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <h1 class="h3 mb-2 text-gray-800">Contact</h1>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Konten</th>
                                <th>Isi</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="font-size: 14px">Deskripsi</td>
                                <td style="font-size: 16px">{{ $data->desc_cont }}</td>
                            </tr>
                            <tr>
                                <td style="font-size: 14px">Alamat 1</td>
                                <td style="font-size: 16px">{{ $data->alamat1 }}</td>
                            </tr>
                            <tr>
                                <td style="font-size: 14px">Alamat 2</td>
                                <td style="font-size: 16px">{{ $data->alamat2 }}</td>
                            </tr>
                            <tr>
                                <td style="font-size: 14px">Alamat 3</td>
                                <td style="font-size: 16px">{{ $data->alamat3 }}</td>
                            </tr>
                            <tr>
                                <td style="font-size: 14px">No HP 1</td>
                                <td style="font-size: 16px">{{ $data->no_hp1 }}</td>
                            </tr>
                            <tr>
                                <td style="font-size: 14px">No HP 2</td>
                                <td style="font-size: 16px">{{ $data->no_hp2 }}</td>
                            </tr>
                            <tr>
                                <td style="font-size: 14px">No HP 3</td>
                                <td style="font-size: 16px">{{ $data->no_hp3 }}</td>
                            </tr>
                            <tr>
                                <td style="font-size: 14px">Email 1</td>
                                <td style="font-size: 16px">{{ $data->email1 }}</td>
                            </tr>
                            <tr>
                                <td style="font-size: 14px">Email 2</td>
                                <td style="font-size: 16px">{{ $data->email2 }}</td>
                            </tr>
                            <tr>
                                <td style="font-size: 14px">Email 3</td>
                                <td style="font-size: 16px">{{ $data->email3 }}</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

@endsection
