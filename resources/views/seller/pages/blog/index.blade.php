@extends('seller.layout.seller')

@section('title')
{{ Auth::guard('seller')->user()->first_name }} - Guide
@endsection

@section('content')
<section class="ct-u-paddingBoth80 ct-blog">
    <div class="container">
        <div class="ct-heading--withBorder ct-heading--withBorderGrey ct-u-marginBottom40">
            <h4 class="ct-u-colorMotive text-uppercase ct-u-marginBottom10">My Blogs</h4>
            <p>{{ $profile->self_description? $profile->self_description : 'Please add your self desription from your profile page' }}
            </p>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-3">
                <article class="ct-article ct-fw-600 ct-article--grey">
                    <a href="blog-single.html">
                        <img src="{{ asset('assets/images/content/guide-tour/blog-mini.jpg') }}" alt="Blog Post"
                            itemprop="image">
                    </a>
                    <div class="ct-article-body">
                        <ul class="ct-article-meta list-unstyled list-inline">
                            <li class="ct-article-category">
                                <a href="#" itemprop="url">
                                    <i class="fa fa-edit"></i>Edit
                                </a>
                            </li>
                            <li class="ct-article-category">
                                <a href="#" itemprop="url">
                                    <i class="fa fa-trash"></i>Remove
                                </a>
                            </li>
                        </ul>
                        <div class="ct-article-title">
                            <a href="blog-single.html">
                                <h5 class="text-uppercase ct-u-colorMotive ct-fw-700"> Breakfast for two</h5>
                            </a>
                        </div>
                        <ul class="ct-article-meta list-unstyled list-inline">
                            <li itemprop="dateCreated" class="ct-article-date">
                                <i class="fa fa-calendar"></i>
                                31 March, 2015
                            </li>
                            <li class="ct-article-category">
                                <a href="#" itemprop="url">
                                    <i class="fa fa-folder"></i>Food
                                </a>
                            </li>
                            <li class="ct-article-tags">
                                <ul class="list-unstyled list-inline text-uppercase">
                                    <li><a href="#" itemprop="url">breakfast</a></li>
                                    <li><a href="#" itemprop="url">juice</a></li>
                                </ul>
                            </li>
                        </ul>
                        <div itemprop="text" class="ct-article-description">
                            <p>Lorem ipsum dolor sit amet, conuit tetur adipiscing elit. Integer sed.</p><a
                                href="blog-single.html" itemprop="url"
                                class="btn-primary btn-xs btn text-uppercase">read article</a>
                        </div>

                    </div>
                </article>
            </div>
            <div class="col-sm-6 col-md-3">
                <article class="ct-article ct-fw-600 ct-article--grey">
                    <a href="blog-single.html">
                        <img src="{{ asset('assets/images/content/guide-tour/blog-mini.jpg') }}" alt="Blog Post"
                            itemprop="image">
                    </a>
                    <div class="ct-article-body">
                        <ul class="ct-article-meta list-unstyled list-inline">
                            <li class="ct-article-category">
                                <a href="#" itemprop="url">
                                    <i class="fa fa-edit"></i>Edit
                                </a>
                            </li>
                            <li class="ct-article-category">
                                <a href="#" itemprop="url">
                                    <i class="fa fa-trash"></i>Remove
                                </a>
                            </li>
                        </ul>
                        <div class="ct-article-title">
                            <a href="blog-single.html">
                                <h5 class="text-uppercase ct-u-colorMotive ct-fw-700"> Breakfast for two</h5>
                            </a>
                        </div>
                        <ul class="ct-article-meta list-unstyled list-inline">
                            <li itemprop="dateCreated" class="ct-article-date">
                                <i class="fa fa-calendar"></i>
                                31 March, 2015
                            </li>
                            <li class="ct-article-category">
                                <a href="#" itemprop="url">
                                    <i class="fa fa-folder"></i>Food
                                </a>
                            </li>
                            <li class="ct-article-tags">
                                <ul class="list-unstyled list-inline text-uppercase">
                                    <li><a href="#" itemprop="url">breakfast</a></li>
                                    <li><a href="#" itemprop="url">juice</a></li>
                                </ul>
                            </li>
                        </ul>
                        <div itemprop="text" class="ct-article-description">
                            <p>Lorem ipsum dolor sit amet, conuit tetur adipiscing elit. Integer sed.</p><a
                                href="blog-single.html" itemprop="url"
                                class="btn-primary btn-xs btn text-uppercase">read article</a>
                        </div>

                    </div>
                </article>
            </div>
            <div class="clearfix visible-sm"></div>
            <div class="col-sm-6 col-md-3">
                <article class="ct-article ct-fw-600 ct-article--grey">
                    <a href="blog-single.html">
                        <img src="{{ asset('assets/images/content/guide-tour/blog-mini.jpg') }}" alt="Blog Post"
                            itemprop="image">
                    </a>
                    <div class="ct-article-body">
                        <ul class="ct-article-meta list-unstyled list-inline">
                            <li class="ct-article-category">
                                <a href="#" itemprop="url">
                                    <i class="fa fa-edit"></i>Edit
                                </a>
                            </li>
                            <li class="ct-article-category">
                                <a href="#" itemprop="url">
                                    <i class="fa fa-trash"></i>Remove
                                </a>
                            </li>
                        </ul>
                        <div class="ct-article-title">
                            <a href="blog-single.html">
                                <h5 class="text-uppercase ct-u-colorMotive ct-fw-700"> Breakfast for two</h5>
                            </a>
                        </div>
                        <ul class="ct-article-meta list-unstyled list-inline">
                            <li itemprop="dateCreated" class="ct-article-date">
                                <i class="fa fa-calendar"></i>
                                31 March, 2015
                            </li>
                            <li class="ct-article-category">
                                <a href="#" itemprop="url">
                                    <i class="fa fa-folder"></i>Food
                                </a>
                            </li>
                            <li class="ct-article-tags">
                                <ul class="list-unstyled list-inline text-uppercase">
                                    <li><a href="#" itemprop="url">breakfast</a></li>
                                    <li><a href="#" itemprop="url">juice</a></li>
                                </ul>
                            </li>
                        </ul>
                        <div itemprop="text" class="ct-article-description">
                            <p>Lorem ipsum dolor sit amet, conuit tetur adipiscing elit. Integer sed.</p><a
                                href="blog-single.html" itemprop="url"
                                class="btn-primary btn-xs btn text-uppercase">read article</a>
                        </div>

                    </div>
                </article>
            </div>
            <div class="col-sm-6 col-md-3">
                <article class="ct-article ct-fw-600 ct-article--grey">
                    <a href="blog-single.html">
                        <img src="{{ asset('assets/images/content/guide-tour/blog-mini.jpg') }}" alt="Blog Post"
                            itemprop="image">
                    </a>
                    <div class="ct-article-body">
                        <ul class="ct-article-meta list-unstyled list-inline">
                            <li class="ct-article-category">
                                <a href="#" itemprop="url">
                                    <i class="fa fa-edit"></i>Edit
                                </a>
                            </li>
                            <li class="ct-article-category">
                                <a href="#" itemprop="url">
                                    <i class="fa fa-trash"></i>Remove
                                </a>
                            </li>
                        </ul>
                        <div class="ct-article-title">
                            <a href="blog-single.html">
                                <h5 class="text-uppercase ct-u-colorMotive ct-fw-700"> Breakfast for two</h5>
                            </a>
                        </div>
                        <ul class="ct-article-meta list-unstyled list-inline">
                            <li itemprop="dateCreated" class="ct-article-date">
                                <i class="fa fa-calendar"></i>
                                31 March, 2015
                            </li>
                            <li class="ct-article-category">
                                <a href="#" itemprop="url">
                                    <i class="fa fa-folder"></i>Food
                                </a>
                            </li>
                            <li class="ct-article-tags">
                                <ul class="list-unstyled list-inline text-uppercase">
                                    <li><a href="#" itemprop="url">breakfast</a></li>
                                    <li><a href="#" itemprop="url">juice</a></li>
                                </ul>
                            </li>
                        </ul>
                        <div itemprop="text" class="ct-article-description">
                            <p>Lorem ipsum dolor sit amet, conuit tetur adipiscing elit. Integer sed.</p><a
                                href="blog-single.html" itemprop="url"
                                class="btn-primary btn-xs btn text-uppercase">read article</a>
                        </div>

                    </div>
                </article>
            </div>
            <div class="clearfix visible-sm"></div>
        </div>
    </div>
</section>
@endsection
