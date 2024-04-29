@extends('/layout.mainlayout')

@section('title', 'Blog')

@section('content')

    <!-- ##### Breadcumb Area Start ##### -->
    @if (session('id_user'))
        <a href="/blog-form">
    @endif
    <div class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg/background.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-text text-center">
                        <h2 class="head-1">Blog</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if (session('id_user'))
        </a>
    @endif
    <!-- ##### Breadcumb Area End ##### -->
    <section class="about-area" style="padding-top: 20px">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb" style="background-color: transparent">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Blog</li>
                </ol>
            </nav>
        </div>
    </section>
    <!-- ##### Blog Area Start ##### -->

    <div class="blog-area section-padding-80">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="blog-posts-area">

                        <!-- Single Blog Area -->
                        @foreach ($blog as $blog)
                            <div class="single-blog-area mb-80">
                                <!-- Thumbnail -->
                                <div class="blog-thumbnail bg-overlay">
                                    <a href="/blog-id/{{ $blog->id_blog }}">
                                        <img src="storage/public/{{ $blog->gambar_blog }}" alt="">
                                    </a>
                                    <!-- Post Date -->
                                    <div class="post-date">
                                        <a href="#"><span>{{ $blog->created_at->format('d') }}</span>{{ $blog->created_at->format('M') }}
                                            <br>
                                            {{ $blog->created_at->format('Y') }}</a>
                                    </div>
                                </div>
                                <!-- Content -->
                                <div class="blog-content">
                                    <a href="/blog-id/{{ $blog->id_blog }}" class="post-title">{{ $blog->judul_blog }}</a>
                                    <div class="meta-data">by <a href="#">{{ $blog->kategori }}</a> in <a
                                            href="#">SPS</a>
                                    </div>
                                    <p>
                                        {{ Str::limit($blog->isi_blog, 200) }}
                                    </p>
                                    <a href="/blog-id/{{ $blog->id_blog }}" class="btn delicious-btn mt-30">Read More</a>
                                </div>
                            </div>
                        @endforeach

                    </div>

                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item active"><a class="page-link" href="#">01.</a></li>
                            <li class="page-item"><a class="page-link" href="#">02.</a></li>
                            <li class="page-item"><a class="page-link" href="#">03.</a></li>
                        </ul>
                    </nav>
                </div>

                <div class="col-12 col-lg-4">
                    <div class="blog-sidebar-area">

                        <!-- Widget -->
                        <div class="single-widget mb-80">
                            <h6>Archive</h6>
                            <ul class="list">
                                <li><a href="#">March 2018</a></li>
                                <li><a href="#">February 2018</a></li>
                                <li><a href="#">January 2018</a></li>
                                <li><a href="#">December 2017</a></li>
                                <li><a href="#">November 2017</a></li>
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

                        <!-- Widget -->
                        <div class="single-widget mb-80">
                            <div class="quote-area text-center">
                                <span>"</span>
                                <h4>Nothing is better than going home to family and eating good food and relaxing</h4>
                                <p>John Smith</p>
                                <div class="date-comments d-flex justify-content-between">
                                    <div class="date">January 04, 2018</div>
                                    <div class="comments">2 Comments</div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Blog Area End ##### -->

@endsection
