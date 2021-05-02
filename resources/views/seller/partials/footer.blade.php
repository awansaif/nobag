<footer>
    <div class="ct-prefooter">
        <div class="container">
            <div class="ct-prefooter-inner ct-u-relative ct-u-paddingTop80 ct-u-paddingBottom50"><a href="#home"
                    class="btn-toTop ct-js-btnScroll"><i class="fa fa-angle-up ct-js-btnScroll"></i></a>
                <div class="row">
                    <div class="col-sm-6 col-md-3">
                        <div class="widget widget-contact">
                            <div class="widget-inner">
                                <h6 class="text-uppercase ct-u-colorMotive ct-fw-600 ct-u-marginBottom30">
                                    contact info</h6>
                                <ul class="list-inline list-unstyled">
                                    <li>
                                        <a href="">
                                            <i class="fa fa-map-marker">
                                            </i>{{ App\Models\SiteProfile::pluck('address')->first() }}
                                        </a>
                                    </li>
                                    <li>
                                        <i class="fa fa-phone"></i>
                                        Phone:
                                        <a href="tel:{{ App\Models\SiteProfile::pluck('phone')->first() }}">
                                            {{ App\Models\SiteProfile::pluck('phone')->first() }}
                                        </a>
                                    </li>
                                    <li>
                                        <i class="fa fa-envelope"></i>
                                        Mail:
                                        <a href="mailto:{{ App\Models\SiteProfile::pluck('email')->first() }}">
                                            {{ App\Models\SiteProfile::pluck('email')->first() }}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="widget widget-latestDeals">
                            <div class="widget-inner">
                                <h6 class="text-uppercase ct-u-colorMotive ct-fw-600 ct-u-marginBottom30">last
                                    minute deals</h6>
                                @foreach (App\Models\Trip::take(3)->latest()->get() as $trip)
                                <div class="media">
                                    <a href="{{ Route('singleTrip', $trip->id) }}">
                                        <div class="media-left">
                                            @foreach (json_decode($trip->photos) as $item)
                                            @if ($loop->first)
                                            <img src="{{ asset($item) }}" alt="deals" width="50px" height="50px">
                                            @endif

                                            @endforeach
                                        </div>
                                        <div class="media-body">
                                            <h6 class="media-heading">{{ $trip->event_title }}</h6>
                                            <ul class="ct-productPrice ct-u-colorMotive list-unstyled list-inline">
                                                <li><i class="fa fa-tag"></i></li>
                                                <li><span class="">${{ $trip->cost }}</span></li>
                                                <li>{{ date('d M, Y',strtotime($trip->closing_date_of_the_sale)) }}</li>
                                            </ul>
                                        </div>
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="widget widget-recentPosts">
                            <div class="widget-inner">
                                <h6 class="text-uppercase ct-u-colorMotive ct-fw-600 ct-u-marginBottom20">recent
                                    posts</h6>
                                <ul class="list-unstyled text-capitalize">
                                    @forelse ($articles as $article)
                                    <li>
                                        <a href="{{ Route('singleBlog',$article->id) }}">{{ $article->title }}</a>
                                    </li>
                                    @empty

                                    @endforelse
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="widget widget-tags">
                            <div class="widget-inner">
                                <h6 class="text-uppercase ct-u-colorMotive ct-fw-600 ct-u-marginBottom30">tags
                                </h6>
                                <ul class="list-inline list-unstyled text-capitalize">
                                    @forelse ($categories as $category)
                                    <li>
                                        <a href="#">{{ $category->category }}</a>
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
    </div>
    <div class="container">
        <div class="ct-postfooter text-center"><span>&#169; Copyright {{ date('Y', strtotime(now())) }}. All Rights
                Reserved</span></div>
    </div>
</footer>

