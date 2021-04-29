@extends('layout.app')
@section('content')
<header id="home" data-stellar-background-ratio="0.3" data-height="230" data-type="parallax"
    data-background="./assets/images/content/guide-tour/header-mini.jpg"
    data-background-mobile="./assets/images/content/guide-tour/header-mini.jpg" class="ct-mediaSection">
    <div class="ct-breadcrumbs">
        <ul class="list-inline list-unstyled text-uppercase">
            <li>
                <a href="{{ route('welcome') }}">
                    <i class="fa fa-home"></i>
                </a>
                <i class="fa fa-angle-right"></i>blog
            </li>
        </ul>
    </div>
</header>
<section class="ct-u-paddingBoth80 ct-blog">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="ct-sidebar ct-sidebar--grey">
                    <div class="row">
                        <div class="col-sm-6 col-md-12">
                            <div class="widget">
                                <div class="widget-inner">
                                    <h6 class="text-uppercase ct-fw-700 widget-title"> categories</h6>
                                    <ul class="list-unstyled">
                                        @forelse ($categories as $category)
                                        <li>
                                            <a href="#" class="text-capitalize">
                                                <i class="fa fa-long-arrow-right"></i>{{ $category->category }}
                                            </a>
                                        </li>
                                        @empty

                                        @endforelse
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                @forelse ($articles as $article)
                <article class="ct-article ct-fw-600 ct-article--inline">
                    <div class="ct-article-media">
                        <a href="blog-single.html" itemprop="url">
                            <img src="{{ asset($article->featured_image) }}" alt="Blog Post" width="200px"
                                height="200px">
                        </a>
                    </div>
                    <div class="ct-article-body">
                        <div class="ct-article-title">
                            <a href="blog-single.html">
                                <h5 class="text-uppercase ct-u-colorMotive ct-fw-700">{{ $article->title }}</h5>
                            </a></div>
                        <ul class="ct-article-meta list-unstyled list-inline">
                            <li itemprop="dateCreated" class="ct-article-date">
                                <i class="fa fa-calendar"></i>
                                {{ date('d F, Y', strtotime($article->created_at)) }}
                            </li>
                        </ul>
                        <div class="ct-article-description">
                            <p style="height:100px; overflow:hidden;">{{ $article->body }}</p>
                            <a href="{{ Route('singleBlog',$article->id) }}"
                                class="btn-primary btn-lg btn text-uppercase">read article</a>
                        </div>
                    </div>
                </article>
                @empty

                @endforelse
            </div>
        </div>
    </div>
</section>
@endsection