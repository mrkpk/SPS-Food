@extends('/layout.adminlayout')

@section('title', 'Receipes')

@section('content')

    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Produk</h1>


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    <h6 class="m-0 font-weight-bold text-primary">
                        @if ($type == 1)
                            <a href="/product-trash/3" class="btn btn-secondary btn-circle">
                                <i class="fa fa-trash"></i>
                            </a>
                        @endif
                        @if ($type == 0)
                            <a href="/product-admin/3" class="btn btn-secondary btn-circle">
                                <i class="fa fa-reply"></i>
                            </a>
                        @endif
                    </h6>
                </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Kategori</th>
                                <th>Principal</th>
                                <th>Deskripsi</th>
                                <th>Gambar</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($data as $data)
                                <tr>
                                    <td style="font-size: 12px">{{ $data->nama_produk }}</td>
                                    <td style="font-size: 12px">{{ $data->kategori }}</td>
                                    <td style="font-size: 11px">{{ $data->principal }}</td>
                                    <td style="font-size: 11px">{{ $data->desk }}</td>
                                    <td>
                                        @if (!empty($data->gambar))
                                            <img style="max-width:75px" class="prod-{{ $i }} a"
                                                id="{{ $i }}" src="/storage/public/{{ $data->gambar }}"
                                                alt="" data-toggle="modal" data-target="#image">
                                        @else
                                            Tidak ada gambar
                                        @endif
                                    </td>

                                    <td>
                                        @if ($type == 1)
                                            <a href="/edit-prod/5/{{ $data->id_produk }}"
                                                class="btn btn-primary btn-circle">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <a href="#" class="trash btn btn-danger btn-circle"
                                                id="1/{{ $data->id_produk }}">
                                                <i class="fa fa-minus"></i>
                                            </a>
                                        @endif
                                        @if ($type == 0)
                                            <a href="#" class="trash btn btn-primary btn-circle"
                                                id="0/{{ $data->id_produk }}">
                                                <i class="fa fa-undo"></i>
                                            </a>
                                            <a href="#" class="trash btn btn-danger btn-circle"
                                                id="2/{{ $data->id_produk }}">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                @php
                                    $i++;
                                @endphp
                            @endforeach
                        </tbody>
                    </table>
                    <div class="modal fade" id="image" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body" id="gamb">

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
    <script>
        $(document).on('click', '.a', function() {
            var id = $(this).attr('id');
            console.log(id);
            var image = $('.prod-' + id).attr('src');
            gambar =
                '<img style="max-width:250px;display: block;margin-left: auto;margin-right: auto;" alt="" id="#asd" src="' +
                image + '">';
            $('#gamb').html(gambar);
        });

        $(document).on('click', '.trash', function() {
            var a = this.id;
            console.log(a);

            alertify.confirm("This is a confirm dialog.",
                function() {

                    alertify.success('Ok');
                    location.href = "/remove-product/5/" + a;
                },
                function() {
                    alertify.error('Cancel');
                });
        });
    </script>
@endsection
