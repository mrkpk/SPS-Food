@extends('/layout.adminlayout')

@section('title', 'Receipes')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
        </div>

        <!-- Content Row -->
        <div class="text-center">
            <div class="error mx-auto" data-text="SPS">SPS</div>
            <p class="lead text-gray-800 mb-5">Welcome, admin</p>
            <p class="text-gray-500 mb-0">This page provide you to edit the content</p>
            <a href="/">&larr; Back to Website</a>
        </div>



    </div>
    <!-- /.container-fluid -->
@endsection
