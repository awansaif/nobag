@extends('buyer.layout.buyer')

@section('title')
{{ Auth::guard('buyer')->user()->first_name }} - Tourist
@endsection

@section('content')
<section class="ct-u-paddingBoth80 ct-blog">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-3">
                <article class="ct-article ct-fw-600 ct-article--grey">
                    <div class="ct-article-body">
                        <div class="ct-article-title">
                            <h5 class="text-uppercase ct-u-colorMotive ct-fw-700">Rank</h5>
                            <h4 class="text-uppercase ct-u-colorMotive ct-fw-700">Bronze</h4>
                        </div>
                        <ul class="ct-article-meta list-unstyled list-inline">
                            <li class="ct-article-tags">
                                <ul class="list-unstyled list-inline text-uppercase">
                                    <li><a href="#" itemprop="url">Last Updated</a></li>
                                </ul>
                            </li>
                            <li class="ct-article-date">
                                <i class="fa fa-calendar"></i>
                                31 March, 2015
                            </li>
                        </ul>
                    </div>
                </article>
            </div>
            <div class="col-sm-6 col-md-3">
                <article class="ct-article ct-fw-600 ct-article--grey">
                    <div class="ct-article-body">
                        <div class="ct-article-title">
                            <h5 class="text-uppercase ct-u-colorMotive ct-fw-700">Total Trips</h5>
                            <h4 class="text-uppercase ct-u-colorMotive ct-fw-700">80</h4>
                        </div>
                        <ul class="ct-article-meta list-unstyled list-inline">
                            <li class="ct-article-tags">
                                <ul class="list-unstyled list-inline text-uppercase">
                                    <li><a href="#" itemprop="url">Lastt Trip</a></li>
                                </ul>
                            </li>
                            <li class="ct-article-date">
                                <i class="fa fa-calendar"></i>
                                31 March, 2015
                            </li>
                        </ul>
                    </div>
                </article>
            </div>
            <div class="clearfix visible-sm"></div>
            <div class="col-sm-6 col-md-3">
                <article class="ct-article ct-fw-600 ct-article--grey">
                    <div class="ct-article-body">
                        <div class="ct-article-title">
                            <h5 class="text-uppercase ct-u-colorMotive ct-fw-700">Visited Countires</h5>
                            <h4 class="text-uppercase ct-u-colorMotive ct-fw-700">80</h4>
                        </div>
                        <ul class="ct-article-meta list-unstyled list-inline">
                            <li class="ct-article-tags">
                                <ul class="list-unstyled list-inline text-uppercase">
                                    <li><a href="#" itemprop="url">Last Trip</a></li>
                                </ul>
                            </li>
                            <li class="ct-article-date">
                                <i class="fa fa-calendar"></i>
                                31 March, 2015
                            </li>
                        </ul>
                    </div>
                </article>
            </div>
            <div class="col-sm-6 col-md-3">
                <article class="ct-article ct-fw-600 ct-article--grey">
                    <div class="ct-article-body">
                        <div class="ct-article-title">
                            <h5 class="text-uppercase ct-u-colorMotive ct-fw-700">Total Cost</h5>
                            <h4 class="text-uppercase ct-u-colorMotive ct-fw-700">80</h4>
                        </div>
                        <ul class="ct-article-meta list-unstyled list-inline">
                            <li class="ct-article-tags">
                                <ul class="list-unstyled list-inline text-uppercase">
                                    <li><a href="#" itemprop="url">Last Trip</a></li>
                                </ul>
                            </li>
                            <li class="ct-article-date">
                                <i class="fa fa-calendar"></i>
                                31 March, 2015
                            </li>
                        </ul>
                    </div>
                </article>
            </div>
            <div class="clearfix visible-sm"></div>
        </div>
    </div>
</section>
@endsection
