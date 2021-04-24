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
                                    <li><a
                                            href="https://www.google.pl/maps/place/Con+Brio+Blvd,+Upper+Coomera+QLD+4209,+Australia/@-27.875425,153.2992508,17z/data=!3m1!4b1!4m2!3m1!1s0x6b91115395fd91fb:0x90a661613552390e"><i
                                                class="fa fa-map-marker"></i>Con Brio Boulevard, Upper Coomera
                                            QLD 4209, Australia</a></li>
                                    <li><i class="fa fa-phone"></i>Phone:<a href="tel:(012)345-6789"> (012)
                                            345-6789</a></li>
                                    <li><i class="fa fa-envelope"></i>Mail:<a href="mailto:ticketstours@info.com">
                                            tickets&amp;tours@info.com</a>
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
                                <div class="media"><a href="basic-package-single.html">
                                        <div class="media-left"><img
                                                src="{{ asset('assets/images/content/guide-tour/latest-deals.jpg') }}"
                                                alt="deals"></div>
                                        <div class="media-body">
                                            <h6 class="media-heading">Grand Colosseum, Rome</h6>
                                            <ul class="ct-productPrice ct-u-colorMotive list-unstyled list-inline">
                                                <li><i class="fa fa-tag"></i></li>
                                                <li><span class="ct-discount">$56</span></li>
                                                <li>30% OFF: $45</li>
                                            </ul>
                                        </div>
                                    </a></div>
                                <div class="media"><a href="basic-package-single.html">
                                        <div class="media-left"><img
                                                src="{{ asset('assets/images/content/guide-tour/latest-deals2.jpg') }}"
                                                alt="deals"></div>
                                        <div class="media-body">
                                            <h6 class="media-heading">St. Peter's Basilica</h6>
                                            <ul class="ct-productPrice ct-u-colorMotive list-unstyled list-inline">
                                                <li><i class="fa fa-tag"></i></li>
                                                <li><span class="ct-discount">76</span></li>
                                                <li>10% OFF: 68</li>
                                            </ul>
                                        </div>
                                    </a></div>
                                <div class="media"><a href="basic-package-single.html">
                                        <div class="media-left"><img
                                                src="{{ asset('assets/images/content/guide-tour/latest-deals3.jpg') }}"
                                                alt="deals"></div>
                                        <div class="media-body">
                                            <h6 class="media-heading">Bridge Ponte Di Rialto</h6>
                                            <ul class="ct-productPrice ct-u-colorMotive list-unstyled list-inline">
                                                <li><i class="fa fa-tag"></i></li>
                                                <li><span class="ct-discount">$34</span></li>
                                                <li>15% OFF: $24</li>
                                            </ul>
                                        </div>
                                    </a></div>
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
                                        <a href="blog-single.html">{{ $article->title }}</a>
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
                                        <a href="blog-single.html">{{ $category->category }}</a>
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
        <div class="ct-postfooter text-center"><span>&#169; Copyright 2015. All Rights Reserved</span></div>
    </div>
</footer>
