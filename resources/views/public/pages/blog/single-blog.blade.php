@extends('layout.app')
@section('content')
<header id="home" data-stellar-background-ratio="0.3" data-height="230" data-type="parallax"
    data-background="{{ asset('assets/images/content/guide-tour/header-mini.jpg') }}"
    data-background-mobile="{{ asset('assets/images/content/guide-tour/header-mini.jpg') }}" class="ct-mediaSection">
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
                <div class="col-md-9">
                    <article class="ct-article ct-fw-600">
                        <div class="ct-article-media">
                            <img src="{{ asset($blog->featured_image) }}" alt="Blog Post" width="100%" height="300px">
                        </div>
                        <div class="ct-article-body">
                            <div class="ct-u-displayTableVertical ct-u-displayTableMobile ct-u-marginBottom40">
                                <div class="ct-u-displayTableCell">
                                    <div class="ct-article-title">
                                        <h5 class="text-uppercase ct-fw-700">{{ $blog->title }}</h5>
                                    </div>
                                    <ul class="ct-article-meta list-unstyled list-inline">
                                        <li itemprop="dateCreated" class="ct-article-date">
                                            <i class="fa fa-calendar"></i>
                                            {{ date('d F, Y',strtotime($blog->created_at)) }}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="ct-article-description ct-fw-400 ct-u-paddingBottom30 ct-u-marginBottom20">
                                <p>
                                    {!! $blog->body !!}
                                </p>
                            </div>
                            <div class="ct-article-tags">
                                <ul class="list-unstyled">
                                    <li>
                                        <i class="fa fa-tag"></i>
                                        <span class="ct-fw-700">Tags:</span>
                                        @foreach ($blog->tags as $tag)
                                        <a href="#">{{ $tag->tag_title }}</a>
                                        @endforeach
                                    </li>
                                    <li>
                                        <i class="fa fa-folder"></i>
                                        <span class="ct-fw-700">Posted In:</span>
                                        <a href="#">{{ $blog->category->category }}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection