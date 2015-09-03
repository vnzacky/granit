@section('styles')
<!-- Flexslider -->
{{ HTML::style("assets/public/default/css/flexslider.css") }}
<!-- Exp Slider -->
<!-- Theme CSS -->
{{ HTML::style("assets/shared/slider/css/slider.css") }}
{{ HTML::style("assets/shared/slider/css/slider-animate.css") }}
{{ HTML::style("assets/shared/slider/vendor/rs-plugin/css/settings.css") }}
{{ HTML::style("assets/shared/slider/css/slider-responsive.css") }}

@stop

@section('scripts')
<!-- Flexslider -->
{{ HTML::script("assets/public/default/js/jquery.flexslider.js") }}
<!-- Exp Slider -->
{{ HTML::script("assets/shared/slider/vendor/rs-plugin/js/jquery.themepunch.plugins.min.js") }}
{{ HTML::script("assets/shared/slider/vendor/rs-plugin/js/jquery.themepunch.revolution.min.js") }}

<!-- Flexslider Init -->
<script type="text/javascript">

$(window).load(function () {
    $('.flexslider').flexslider({
        animation: "fade",
        controlNav: false,
        // Callback API
        before: function () {
        },
        after: function () {
        },
        start: function (slider) {
            $('#slider').removeClass('loading');
        }
    });
});

/*
 Extraction
 */
(function () {
    "use strict";
    var Home = {
        initialized: false,
        initialize: function () {
            if (this.initialized)
                return;
            this.initialized = true;
            this.build();
            this.events();

        },
        build: function (options) {
            // Revolution Slider Initialize
            $("#revolutionSlider").each(function () {
                var slider = $(this);
                var defaults = {
                    delay: 9000,
                    startheight: 525,
                    startwidth: 960,
                    hideThumbs: 10,
                    thumbWidth: 100,
                    thumbHeight: 50,
                    thumbAmount: 5,
                    navigationType: "both",
                    navigationArrows: "verticalcentered",
                    navigationStyle: "round",
                    touchenabled: "on",
                    onHoverStop: "on",
                    navOffsetHorizontal: 0,
                    navOffsetVertical: 20,
                    stopAtSlide: 0,
                    stopAfterLoops: -1,
                    shadow: 0,
                    fullWidth: "on",
                }
                var config = $.extend({}, defaults, options, slider.data("plugin-options"));

                // Initialize Slider
                var sliderApi = slider.revolution(config).addClass("slider-init");

                // Set Play Button to Visible
                sliderApi.bind("revolution.slide.onloaded ", function (e, data) {
                    $(".home-player").addClass("visible");
                });
            });
        },
        events: function () {
        }

    };

    Home.initialize();

})();

</script>
@stop

@section('slider')
@if ($slides->count() > 0)
<!-- BEGIN SLIDER -->
<section id="slider" class="loading">

    <div class="container-fluid">
        <!--
                <div class="flexslider">
                    <ul class="slides">
        
                        @foreach ($slides as $slide)
                        <li>
                            <img src="{{ URL::to($slide->image) }}" />
                            <div class="slide-caption">
                                {{ $slide->caption }}
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
        -->
        <div class="slider-container">
            <div class="slider" id="revolutionSlider">
                <ul>

                    <li data-transition="fade" data-slotamount="3" data-masterspeed="1200" >

                        <img src="{{asset('assets/shared/slider/img/bg.png')}}" data-bgfit="cover" data-bgposition="left center" data-bgrepeat="no-repeat" >

                        <div class="tp-caption big-label sft stb"
                             data-x="0"
                             data-y="50"
                             data-speed="1000"
                             data-start="100"
                             data-easing="easeOutExpo">Design a Gravestone online!</div>

                        <div class="tp-caption medium-label sft stb"
                             data-x="0"
                             data-y="115"
                             data-speed="1000"
                             data-start="200"
                             data-easing="easeOutExpo">Design, Get a Bid, Share with Family</div>

                        <div class="tp-caption white-text sft stb"
                             data-x="00"
                             data-y="165"
                             data-speed="1000"
                             data-start="300"
                             data-easing="easeOutExpo">On our new website you can easily find a Gravestone for you loved ones.<br /><strong>Choose a Gravestone > Insert your own Text > Add Accessories > Finish</strong></div>

                        <div class="tp-caption white sft stb"
                             data-x="00"
                             data-y="230"
                             data-speed="1000"
                             data-start="400"
                             data-easing="easeOutExpo"><strong>Sign up!</strong> & save all your designs, Compare designs, Invite friends & family to join stone Design. <br />Discuss, Comment, Chat, Share and Design Gravestones together with our Design System.</div>

                        <div class="tp-caption white sfl stb"
                             data-x="00"
                             data-y="280"
                             data-speed="1000"
                             data-start="500"
                             data-easing="easeOutExpo"><img src="{{asset('assets/shared/slider/img/small.png')}}" /></div>

                        <div class="tp-caption white sfl stb"
                             data-x="300"
                             data-y="280"
                             data-speed="1000"
                             data-start="600"
                             data-easing="easeOutExpo"><img src="{{asset('assets/shared/slider/img/medium.png')}}" /></div>

                        <div class="tp-caption white sfl stb"
                             data-x="620"
                             data-y="280"
                             data-speed="1000"
                             data-start="700"
                             data-easing="easeOutExpo"><img src="{{asset('assets/shared/slider/img/large.png')}}" /></div>


                    </li>

                    <li data-transition="fade" data-slotamount="3" data-masterspeed="1200" >

                        <img src="{{asset('assets/shared/slider/img/bg.png')}}" data-bgfit="cover" data-bgposition="left center" data-bgrepeat="no-repeat" >

                        <div class="tp-caption big-label sft stb"
                             data-x="0"
                             data-y="50"
                             data-speed="1000"
                             data-start="100"
                             data-easing="easeOutExpo">Design a Gravestone online!</div>

                        <div class="tp-caption big-label sft stb"
                             data-x="0"
                             data-y="115"
                             data-speed="1000"
                             data-start="200"
                             data-easing="easeOutExpo">Design, Get a Bid, Share with Family</div>

                        <div class="tp-caption white-text sft stb"
                             data-x="00"
                             data-y="165"
                             data-speed="1000"
                             data-start="300"
                             data-easing="easeOutExpo">On our new website you can easily find a Gravestone for you loved ones.<br /><strong>Choose a Gravestone > Insert your own Text > Add Accessories > Finish</strong></div>

                        <div class="tp-caption white sft stb"
                             data-x="00"
                             data-y="230"
                             data-speed="1000"
                             data-start="400"
                             data-easing="easeOutExpo"><strong>Sign up!</strong> & save all your designs, Compare designs, Invite friends & family to join stone Design. <br />Discuss, Comment, Chat, Share and Design Gravestones together with our Design System.</div>

                        <div class="tp-caption white sfr stb"
                             data-x="00"
                             data-y="280"
                             data-speed="1000"
                             data-start="500"
                             data-easing="easeOutExpo"><img src="{{asset('assets/shared/slider/img/small.png')}}" /></div>

                        <div class="tp-caption white sfr stb"
                             data-x="300"
                             data-y="280"
                             data-speed="1000"
                             data-start="600"
                             data-easing="easeOutExpo"><img src="{{asset('assets/shared/slider/img/medium.png')}}" /></div>

                        <div class="tp-caption white sfr stb"
                             data-x="620"
                             data-y="280"
                             data-speed="1000"
                             data-start="700"
                             data-easing="easeOutExpo"><img src="{{asset('assets/shared/slider/img/large.png')}}" /></div>


                    </li>

                   
                </ul>
            </div>
        </div> <!--SLIDER-->
    </div>

</section>
<!-- END SLIDER -->
@endif
@stop

@section('content')
<!-- Content Start -->
<div id="contentWrapper">
    <!-- Welcome Box start -->
    <div class="welcome">
        <div class="container">
            {{ region_render('introduce') }}
        </div>
    </div>
    <!-- Welcome Box end -->

    <!-- Services boxes style 1 start -->
    <div class="gry-bg">
        <div class="container">
            <div class="row">
                <div class="cell-3 fx" data-animate="fadeInUp" data-animation-delay="200">
                    {{ region_render('feature_first') }}
                </div>
                <div class="cell-3 fx" data-animate="fadeInUp" data-animation-delay="200">
                    {{ region_render('feature_second') }}
                </div>
                <div class="cell-3 fx" data-animate="fadeInUp" data-animation-delay="200">
                    {{ region_render('feature_third') }}
                </div>
                <div class="cell-3 fx" data-animate="fadeInUp" data-animation-delay="200">
                    {{ region_render('feature_fourth') }}
                </div>
            </div>
        </div>
    </div>
    <!-- Services boxes style 1 start -->

    <!-- Portfolio start -->
    <div class="sectionWrapper">
        <div class="container">
            <div class="row">
                <div class="cell-3">
                    {{ region_render('portfolio') }}
                </div>
                <div class="cell-9">
                    <div class="homeGallery portfolio">
                        <!-- staff item start -->
                        <div>
                            <div class="portfolio-item">
                                <div class="img-holder">
                                    <div class="img-over">
                                        <a href="#" class="fx link"><b class="fa fa-link"></b></a>
                                        <a href="{{URL::to('assets/public/exception/images/portfolio/1.jpg')}}" class="fx zoom" data-gal="prettyPhoto[pp_gal]" title="Project Title"><b class="fa fa-search-plus"></b></a>
                                    </div>
                                    <img alt="" src="{{URL::to('assets/public/exception/images/portfolio/1.jpg')}}">
                                </div>
                                <div class="name-holder">
                                    <a href="#" class="project-name">{{ trans('Project Title') }}</a>
                                </div>
                            </div>
                        </div>
                        <!-- staff item end -->

                        <!-- staff item start -->
                        <div>
                            <div class="portfolio-item">
                                <div class="img-holder">
                                    <div class="img-over">
                                        <a href="#" class="fx link"><b class="fa fa-link"></b></a>
                                        <a href="{{URL::to('assets/public/exception/images/portfolio/1.jpg')}}" class="fx zoom" data-gal="prettyPhoto[pp_gal]" title="Project Title"><b class="fa fa-search-plus"></b></a>
                                    </div>
                                    <img alt="" src="{{URL::to('assets/public/exception/images/portfolio/1.jpg')}}">
                                </div>
                                <div class="name-holder">
                                    <a href="#" class="project-name">{{ trans('Project Title') }}</a>
                                </div>
                            </div>
                        </div>
                        <!-- staff item end -->

                        <!-- staff item start -->
                        <div>
                            <div class="portfolio-item">
                                <div class="img-holder">
                                    <div class="img-over">
                                        <a href="#" class="fx link"><b class="fa fa-link"></b></a>
                                        <a href="{{URL::to('assets/public/exception/images/portfolio/1.jpg')}}" class="fx zoom" data-gal="prettyPhoto[pp_gal]" title="Project Title"><b class="fa fa-search-plus"></b></a>
                                    </div>
                                    <img alt="" src="{{URL::to('assets/public/exception/images/portfolio/1.jpg')}}">
                                </div>
                                <div class="name-holder">
                                    <a href="#" class="project-name">{{ trans('Project Title') }}</a>
                                </div>
                            </div>
                        </div>
                        <!-- staff item end -->

                        <!-- staff item start -->
                        <div>
                            <div class="portfolio-item">
                                <div class="img-holder">
                                    <div class="img-over">
                                        <a href="#" class="fx link"><b class="fa fa-link"></b></a>
                                        <a href="{{URL::to('assets/public/exception/images/portfolio/1.jpg')}}" class="fx zoom" data-gal="prettyPhoto[pp_gal]" title="Project Title"><b class="fa fa-search-plus"></b></a>
                                    </div>
                                    <img alt="" src="{{URL::to('assets/public/exception/images/portfolio/1.jpg')}}">
                                </div>
                                <div class="name-holder">
                                    <a href="#" class="project-name">{{ trans('Project Title') }}</a>
                                </div>
                            </div>
                        </div>
                        <!-- staff item end -->

                        <!-- staff item start -->
                        <div>
                            <div class="portfolio-item">
                                <div class="img-holder">
                                    <div class="img-over">
                                        <a href="#" class="fx link"><b class="fa fa-link"></b></a>
                                        <a href="{{URL::to('assets/public/exception/images/portfolio/1.jpg')}}" class="fx zoom" data-gal="prettyPhoto[pp_gal]" title="Project Title"><b class="fa fa-search-plus"></b></a>
                                    </div>
                                    <img alt="" src="{{URL::to('assets/public/exception/images/portfolio/1.jpg')}}">
                                </div>
                                <div class="name-holder">
                                    <a href="#" class="project-name">{{ trans('Project Title') }}</a>
                                </div>
                            </div>
                        </div>
                        <!-- staff item end -->

                        <!-- staff item start -->
                        <div>
                            <div class="portfolio-item">
                                <div class="img-holder">
                                    <div class="img-over">
                                        <a href="#" class="fx link"><b class="fa fa-link"></b></a>
                                        <a href="{{URL::to('assets/public/exception/images/portfolio/1.jpg')}}" class="fx zoom" data-gal="prettyPhoto[pp_gal]" title="Project Title"><b class="fa fa-search-plus"></b></a>
                                    </div>
                                    <img alt="" src="{{URL::to('assets/public/exception/images/portfolio/1.jpg')}}">
                                </div>
                                <div class="name-holder">
                                    <a href="#" class="project-name">{{ trans('Project Title') }}</a>
                                </div>
                            </div>
                        </div>
                        <!-- staff item end -->

                    </div><!-- .portfolioGallery end -->
                </div>
            </div>
        </div>
    </div>
    <!-- Portfolio end -->

    <!-- About us and Features container start -->
    <div class="sectionWrapper">
        <div class="container">
            <div class="row">
                <!-- about us left block -->
                <div class="cell-8">								

                    <!-- testimonials start -->
                    <div class="fx" data-animate="fadeInLeft">

                        {{ region_render('testimonials') }}

                        <div class="testimonials-1 slick-button-hor">
                            @foreach($testimonials as $testimonial)
                            <!-- testimonials item start -->
                            <div>
                                <div class="testimonials-bg">
                                    <h3>{{$testimonial->title}}</h3>
                                    <span>{{$testimonial->description}}</span>
                                    <div class="rating">
                                        {{$testimonial->rate()}}
                                    </div>
                                </div>
                                <div class="testimonials-name"><strong>{{$testimonial->name}}</strong></div>
                            </div>
                            <!-- testimonials item end -->
                            @endforeach
                        </div>

                        {{ region_render('testimonial_quotes') }}

                    </div>
                    <!-- testimonials end -->

                </div>
                <!-- about us left block end -->

                <!-- our skills right block -->
                <div class="cell-4 fx" data-animate="fadeInRight">
                    <div class="catalogue main-bg padd-vertical-10 center">
                        <h1>Catalogue</h1>
                        {{HTML::image(asset('uploads/images/news.png'))}}
                        <p><a href="#" class="btn more-btn btn-large">Read</a></p>
                    </div>
                </div>
                <!-- our skills right block end -->							
            </div>
        </div>
    </div>
    <!-- About us and Features container end -->

</div>
<!-- Content End -->
@stop
