@extends('/layout.mainlayout')

@section('title', 'Blog')

@section('content')

    <!-- ##### Breadcumb Area Start ##### -->

    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Blog Area Start ##### -->
    <div class="blog-area">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="blog-posts-area">
                        <section class="about-area" style="padding-top: 20px">
                            <div class="container">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb" style="background-color: transparent">
                                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                                        <li class="breadcrumb-item"><a href="/blog">Blog</a></li>
                                        <li class="breadcrumb-item"><a href="#">{{ $blog->kategori }}</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">{{ $blog->judul_blog }}</li>
                                    </ol>
                                </nav>
                            </div>
                        </section>

                        <!-- Single Blog Area -->
                        <div class="single-blog-area mb-80">
                            <!-- Thumbnail -->

                            <div class="blog-content mb-50">
                                <a href="#" class="post-title" style="font-size: 30px">{{ $blog->judul_blog }}</a>
                                <div class="meta-data">by <a href="#">Nama orang</a> in <a
                                        href="#">{{ $blog->kategori }}</a>
                                    <br>
                                    {{ $blog->created_at->format('F d, Y') }}
                                </div>
                            </div>
                            <div class="" style="max-width: 100%; text-align: center">
                                <img src="/storage/{{ $blog->gambar_blog }}" alt="">
                                <!-- Post Date -->

                            </div>
                            <!-- Content -->
                            <div class="blog-content">
                                <p>
                                    {{ $blog->isi_blog }}
                                </p>

                            </div>
                            @if (isset($blog->video_blog))
                                <div class="" style="text-align: center">
                                    <video style="max-width: 100%;" controls>
                                        <source src="/storage/{{ $blog->video_blog }}" type="video/mp4">

                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                            @endif

                        </div>


                    </div>


                </div>

                <div class="col-12 col-lg-4">
                    <div class="blog-sidebar-area">

                        <!-- Widget -->
                        <div class="single-widget mb-80" style="padding-top: 50px">
                            <h6>Another Post</h6>
                            <ul class="list">
                                <div class="row">
                                    @foreach ($another as $ano)
                                        <div class="col-6 col-lg-12">
                                            <div class="row">
                                                <div class="col-6 col-lg-4">

                                                    <img src="/storage/{{ $ano->gambar_blog }}" alt="">

                                                </div>
                                                <!-- Thumbnail -->

                                                <div class="col-6 col-lg-8 blog-side-content mb-50"
                                                    style="padding-left: 0px">
                                                    <a href="/blog-id/{{ $ano->id_blog }}"
                                                        class="post-side-title">{{ $ano->judul_blog }}</a>
                                                    <div class="meta-data">
                                                        by <a href="#">Nama orang</a> in <a
                                                            href="#">{{ $ano->kategori }}</a>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </ul>
                        </div>

                        <!-- Widget -->
                        <div class="single-widget mb-80">
                            <h6>Categories</h6>
                            <ul class="list">
                                <li><a href="#">Restaurants</a></li>
                                <li><a href="#">Food &amp; Drinks</a></li>
                                <li><a href="#">Vegans</a></li>
                                <li><a href="#">Events &amp; Lifestyle</a></li>
                                <li><a href="#">Uncategorized</a></li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Blog Area End ##### -->

@endsection
