@extends('layout.app')
@section('content_landing')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-2 text-white mb-4">Blog Kami</h1>
            <h2 class="display-2 text-white mb-4">بِسْــــــــــــــــمِ اﷲِالرَّحْمَنِ اارَّحِيم</h2>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item text-white" aria-current="page">Our Blog</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Blog Start-->
    <div class="container-fluid blog py-5">
        <div class="container py-5">
            <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
                <h4 class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius">
                    Berita dan blog terbaru kami</h4>
                <h1 class="mb-5 display-3">lihat Blog dan berita baru kami</h1>
            </div>
            <div class="row g-5 justify-content-center">



                @foreach ($allBlogs as $blog)
                    <div class="col-md-6 col-lg-6 col-xl-4 wow fadeIn" data-wow-delay="0.1s">
                        <div class="blog-item rounded-bottom h-100 d-flex flex-column">
                            <div class="blog-img overflow-hidden position-relative img-border-radius">
                                <img src="{{ asset('storage/gambar_blog/' . $blog->gambar_blog) }}" class="img-fluid w-100"
                                    alt="Image" style="height:200px; object-fit:cover;">
                            </div>
                            <div
                                class="d-flex justify-content-between px-4 py-3 bg-light border-bottom border-primary blog-date-comments">
                                <small class="text-dark">{{ $blog->kategori_blog }}</small>
                            </div>
                            <div class="blog-content d-flex align-items-center px-4 py-3 bg-light"></div>
                            <div class="px-4 pb-4 bg-light rounded-bottom flex-grow-1 d-flex flex-column mt-auto">
                                <div class="blog-text-inner">
                                    <a href="{{ route('blog.detail', $blog->id) }}" class="h4">{{ $blog->judul_blog }}</a>
                                    <p class="mt-3 mb-4">{!! Str::limit($blog->deskripsi_blog, 30) !!}</p>
                                </div>
                                <div class="text-center mt-auto">
                                    <a href="{{ route('blog.detail', $blog->id) }}"
                                        class="btn btn-primary text-white px-4 py-2 mb-3 btn-border-radius">View Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- Blog End-->
@endsection
