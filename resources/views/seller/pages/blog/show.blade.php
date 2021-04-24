@extends('seller.layout.seller')

@section('title')
{{ Auth::guard('seller')->user()->first_name }} - Guide
@endsection

@section('content')
<div class="row">
    <div class="col-sm-2 col-md-2">

    </div>
    <div class="col-sm-6 col-md-7" style="margin: auto;">
        <article class="ct-article ct-fw-600">
            <div class="ct-article-media">
                <img src="{{ $blog->featured_image }}" alt="Blog Post" itemprop="image">
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
                                {{ date('d F,Y', strtotime($blog->created_at)) }}
                            </li>
                        </ul>
                    </div>
                </div>
                <div itemprop="text" class="ct-article-description ct-fw-400 ct-u-paddingBottom30 ct-u-marginBottom20">
                    <p>
                        {{ $blog->body }}
                    </p>
                </div>
                <div class="ct-article-tags">
                    <ul class="list-unstyled">
                        <li>
                            <i class="fa fa-tag"></i>
                            <span class="ct-fw-700">Tags:</span>
                            @forelse ($blog->tags as $tag)
                            <a href="#">{{ $tag->tag_title }},</a>
                            @empty

                            @endforelse
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
@endsection
