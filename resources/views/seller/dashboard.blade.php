@extends('seller.layout.seller')

@section('title')
{{ Auth::guard('seller')->user()->first_name }} - Guide
@endsection

@section('content')
<section class="ct-u-paddingBoth80 ct-blog">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-3">
                <article class="ct-article ct-fw-600 ct-article--grey">
                    <div class="ct-article-body">
                        <div class="ct-article-title">
                            <h5 class="text-uppercase ct-u-colorMotive ct-fw-700">Ticket Sale</h5>
                            <h4 class="text-uppercase ct-u-colorMotive ct-fw-700">{{ $ticketSales }}</h4>
                        </div>
                        <ul class="ct-article-meta list-unstyled list-inline">
                            <li class="ct-article-tags">
                                <ul class="list-unstyled list-inline text-uppercase">
                                    <li><a href="#" itemprop="url">Last Updated</a></li>
                                </ul>
                            </li>
                            <li class="ct-article-date">
                                <i class="fa fa-calendar"></i>
                                {{ date('d M, Y',strtotime(now())) }}
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
                            <h4 class="text-uppercase ct-u-colorMotive ct-fw-700">{{ $trips }}</h4>
                        </div>
                        <ul class="ct-article-meta list-unstyled list-inline">
                            <li class="ct-article-tags">
                                <ul class="list-unstyled list-inline text-uppercase">
                                    <li><a href="#" itemprop="url">Last Updated</a></li>
                                </ul>
                            </li>
                            <li class="ct-article-date">
                                <i class="fa fa-calendar"></i>
                                {{ date('d M, Y',strtotime(now())) }}
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
                            <h5 class="text-uppercase ct-u-colorMotive ct-fw-700">Total Tourist</h5>
                            <h4 class="text-uppercase ct-u-colorMotive ct-fw-700">{{ $toruists }}</h4>
                        </div>
                        <ul class="ct-article-meta list-unstyled list-inline">
                            <li class="ct-article-tags">
                                <ul class="list-unstyled list-inline text-uppercase">
                                    <li><a href="#" itemprop="url">Last Updated</a></li>
                                </ul>
                            </li>
                            <li class="ct-article-date">
                                <i class="fa fa-calendar"></i>
                                {{ date('d M, Y',strtotime(now())) }}
                            </li>
                        </ul>
                    </div>
                </article>
            </div>
            <div class="col-sm-6 col-md-3">
                <article class="ct-article ct-fw-600 ct-article--grey">
                    <div class="ct-article-body">
                        <div class="ct-article-title">
                            <h5 class="text-uppercase ct-u-colorMotive ct-fw-700">Reviews</h5>
                            <h4 class="text-uppercase ct-u-colorMotive ct-fw-700">80</h4>
                        </div>
                        <ul class="ct-article-meta list-unstyled list-inline">
                            <li class="ct-article-tags">
                                <ul class="list-unstyled list-inline text-uppercase">
                                    <li><a href="#" itemprop="url">Last updated</a></li>
                                </ul>
                            </li>
                            <li class="ct-article-date">
                                <i class="fa fa-calendar"></i>
                                {{ date('d M, Y',strtotime(now())) }}
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
