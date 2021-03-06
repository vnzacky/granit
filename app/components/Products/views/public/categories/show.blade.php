{{-- Update the Meta Description --}}
@section('meta_description')

@stop

{{-- Update the Meta Keywords --}}
@section('meta_keywords')

@stop

@section('heading')
<!-- BEGIN PAGE HEADING -->
<div class="page-title title-1">
    <div class="container">
        <div class="row">
            <div class="cell-12">
                <?php
                $menu = Menu::published()
                        ->where(function($query) {
                            $query->where('link', '=', Request::path())
                            ->orWhere('link_manual', '=', Request::path());
                        })
                        ->first();
                if ($menu) {
                    $type = $menu->title;
                } else {
                    $type = 'Category';
                }
                ?>
                <h1 class="fx" style="">{{ $type }}</h1>
                <div data-animate="fadeInUp" class="breadcrumbs main-bg fx animated fadeInUp" style="">
                    <span class="bold">{{ trans('cms.you_are_in') }}:</span>
                    <a href="{{ url('/') }}">{{ trans('cms.home') }}</a><span class="line-separate">/</span>
                    <a href="{{ url('categories') }}">{{ trans('Products::cms.categories') }}</a><span class="line-separate"></span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END PAGE HEADING -->
@stop

@section('content')
<section class="sectionWrapper">
    <div class="container">
        <div class="row">
            <div class="cell-3">
                @include('Products::public._layouts.sidebar')
                <!-- filter -->
                <div id="product-filter" class="widget menu-categories fx animated fadeInLeft">
                    <h3 class="widget-head">{{ trans('Products::cms.search_filters') }}</h3>
                    <div class="widget-content">
                        <div class="clearfix filter-item">
                            <h3>Price</h3>
                            <p>
                                <label for="amount">{{ trans('Products::cms.range') }}: <span id="amount"></span></label>
                            </p>
                            <div id="filter-price" data-value-max="{{$price['max']}}" data-value-min="{{$price['min']}}"></div>
                        </div>
                        <div class="clearfix filter-item">
                            <h3>Measurements</h3>
                            <div>
                                <p>
                                    <label for="width">{{ trans('Products::cms.width') }}: <span id="width"></span></label>
                                </p>
                                <div id="filter-width" data-value-max="{{$width['max']}}" data-value-min="{{$width['min']}}"></div>
                            </div>
                            <div>
                                <p>
                                    <label for="height">{{ trans('Products::cms.height') }}: <span id="height"></span></label>
                                </p>
                                <div id="filter-height" data-value-max="{{$height['max']}}" data-value-min="{{$height['min']}}"></div>
                            </div>
                        </div>
                        <div class="clearfix filter-item">
                            <h3>Colors</h3>
                            <ul id="filter-colors">
                                <li><a class="button active" href="#" data-filter="*"><span>All</span></a></li>
                                @foreach($colors as $color)
                                <li><a class="button" href="#" data-filter=".{{\Str::slug($color->name)}}-{{$color->id}}"><img src="{{url($color->icon)}}" alt="" />{{ get_trans($color, 'name') }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div> 
                </div>
            </div>
            <!-- content -->
            <div class="cell-9">
                <!-- Sort -->
                <div class="toolsBar">
                    <div class="cell-10 left products-filter-top">
                        <div class="left">
                            <span>{{ trans('Products::cms.sort_by') }}: </span>
                            <select name="is-sort" id="sorts">
                                <option value="original-order" data-sort-by="original-order" selected="selected">Date</option>
                                <option value="name" data-sort-by="name">{{ trans('Products::cms.name') }}</option>
                                <option value="price" data-sort-by="price">{{ trans('Products::cms.price') }}</option>
                            </select>
                        </div>
                        <div class="left">
                            <a href="#" class="order-asc" data-sort="false"><i class="fa fa-sort-amount-asc"></i></a>
                        </div>
                    </div>
                    <div class="right cell-2 list-grid">
                        <a class="list-btn" href="#" data-title="List view" data-tooltip="true"><i class="fa fa-list"></i></a>
                        <a class="grid-btn selected" href="#" data-title="Grid view" data-tooltip="true"><i class="fa fa-th"></i></a>
                    </div>

                </div>
                <!-- end sort -->
                <div class="clearfix"></div>
                <div class="products-wrap">
                    <h2 class="block-head">{{ trans('Products::cms.gravestones') }}</h2>
                    <div class="product-items grid-list">
                        @foreach( $products as $product )
                        <div class="product-item cell-4 {{$product->getClasses()}}" data-width="{{$product->width}}" data-height="{{$product->height}}">
                            <div class="product-box">
                                <h3 class="product-title"><a class="product-url name" href="{{url('product/'.$product->alias.'/'.$product->productColor->first()->color_id)}}">{{$product->product_code}} {{ get_trans($product, 'name') }}</a></h3>
                                <div class="product-sale">
                                    @if($product->productColor->first()->sale > 0)
                                    <span class="discount">{{$product->productColor->first()->sale}}% </span>
                                    @endif
                                </div>
                                <div class="product-image">
                                    <a class="product-url" href="{{url('product/'.$product->alias.'/'.$product->productColor->first()->color_id)}}"><img alt="" src="{{url($product->productColor->first()->image)}}"></a>
                                </div>
                                <ul class="product-colors">
                                    @foreach($product->productColor as $index => $product_color)
                                    <li class="{{$index == 0 ? 'active' : ''}}"><a class="change-color" data-image="{{url($product_color->image)}}" data-price='{{$product_color->getPrice()}}' data-url="{{url('/product/'.$product->alias.'/'.$product_color->color_id)}}" data-sale="{{$product_color->sale}}"><img src="{{url($product_color->color->icon)}}" alt="" /></a></li>
                                    @endforeach
                                </ul>
                                <div class="price-box">
                                    {{$product->productColor->first()->getPrice()}}
                                </div>
                                <div class="btn-design">
                                    <h3 class="btn btn-lg"><a href="{{url('product/'.$product->alias.'/'.$product->productColor->first()->color_id)}}" class="view-more">More Details</a></h3>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="pager skew-25">
                    {{$products->links()}}
                </div>
                <!--modal box-->
                <div class="cell-9 product-modal product-detail product-item">
                    <div class="cell-4">
                        <div class="product-image">
                            <img alt="" id="img_01" src="" />
                        </div>
                    </div>
                    <div class="cell-8">
                        <h2 class="product-title" class="main-color"></h2>
                        <div class="product-specs product-block list-item">
                            <label class="control-label">{{ trans('Products::cms.measurements') }}:</label>
                            <ul class="product-size">
                                <li><i class="fa fa-arrows-v"></i> {{ trans('Products::cms.height') }}: <span id="height"></span> cm</li>
                                <li><i class="fa fa-arrows-h"></i> {{ trans('Products::cms.width') }}: <span id="width"></span> cm</li>
                            </ul>
                        </div>
                        <div class="list-item product-block item-add">
                            <form class="form-design" action="" method="post">
                                <div class="left add-items"><a href="#"><i class="fa fa-minus"></i></a></div>
                                <div class="left"><input id="items-num" value="1"></div>
                                <div class="left add-items"><a href="#"><i class="fa fa-plus"></i></a></div>
                                <div class="left"><input type="submit" value="Design & Order" class="btn btn-medium add-cart main-bg"></div>
                                <div class="left" style="margin-left: 10px;"><input type="submit" value="Design" class="btn btn-medium main-bg"></div>
                            </form>
                        </div>
                        <div class="product-specs price-block list-item last-list">
                            <label class="control-label">{{ trans('Products::cms.price') }}:</label>
                            <div class="price-box"></div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <!--modal box-->
            </div>
        </div>
    </div>
</section>
@stop

@section('styles')
<link rel="stylesheet" href="{{URL::to("assets/public/exception/css/jquery-ui.min.css")}}">
@stop

@section('scripts')
<script type="text/javascript" src="{{URL::to('assets/public/exception/js/jquery-ui.min.js')}}"></script>
<script>
jQuery(document).ready(function ($) {
    var $container = $('.product-items').isotope({
        itemSelector: '.product-item',
        layoutMode: 'fitRows',
        getSortData: {
            name: '.name',
            price: function (itemElem) {
                var price = $(itemElem).find('.product-price').text();
                return parseFloat(price.replace(/[\(\)\$]/g, ''));
            }
        }
    });
    // bind sort button click
    $('#sorts').on('change', function () {
        var sortByValue = $(this).val();
        $container.isotope({sortBy: sortByValue});
    });
    $('#filter-colors').on('click', 'a', function (e) {
        e.preventDefault();
        $(this).closest('#filter-colors').find('a').removeClass('active');
        $(this).addClass('active');
        var filterValue = $(this).attr('data-filter');
        $container.isotope({filter: filterValue});
    });
    var filterFns = {
        // show if number is greater than 50
        numberGreaterThan50: function () {
            var number = $(this).find('.number').text();
            return parseInt(number, 10) > 50;
        },
        // show if name ends with -ium
        ium: function () {
            var name = $(this).find('.name').text();
            return name.match(/ium$/);
        }
    };
    //price filter
    var min = parseInt($("#filter-price").data('value-min'));
    var max = parseInt($("#filter-price").data('value-max'));
    $("#filter-price").slider({
        range: true,
        min: min,
        max: max,
        values: [min, max],
        slide: function (event, ui) {
            var min = ui.values[ 0 ],
                    max = ui.values[ 1 ];
            $container.isotope({filter: function () {
                    var price = $(this).find('.product-price').text();
                    price = parseInt(price.replace('$', ''));
                    $("#amount").text("$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ]);
                    return price >= min && price <= max ? true : false;
                }})
        }
    });
    $("#amount").text("$" + $("#filter-price").slider("values", 0) + " - $" + $("#filter-price").slider("values", 1));
    //Width filter
    filter_measult($container, "#filter-width", 'width', '#width');
    filter_measult($container, "#filter-height", 'height', '#height');
    //update istope
    $('.change-color').click(function (e) {
        $container.isotope('updateSortData').isotope();
    });
    $('.order-asc').click(function (e) {
        e.preventDefault();
        $(this).find('i.fa').toggleClass('fa-sort-amount-asc fa-sort-amount-desc');
        var value = $(this).data('sort');
        console.log(value);
        // sort by number, highest number first
        $container.isotope({
            sortBy: $('#sorts').val(),
            sortAscending: value
        });
        if (value == true) {
            $(this).data('sort', false);
        } else {
            $(this).data('sort', true);
        }
    });

    /**
    * Ajax load more details product
    */
    $('.view-more').click(function(e){
        e.preventDefault();
        var url = $(this).attr('href');
        $.getJSON(url, function(data){
            var $parent = $('.product-modal'),
            product = $.parseJSON(data.product),
            color = $.parseJSON(data.productColor),
            base_url = "{{asset('/')}}";
            $('.product-image #img_01',$parent).attr('src', base_url + color.image);
            $('.product-title',$parent).text(product.name);
            $('.product-size #height',$parent).text(product.height);
            $('.product-size #width',$parent).text(product.width);
            $('.form-design',$parent).attr('action', base_url + '/product/'+product.alias+'/'+color.color_id);
            $('.price-box',$parent).html(getPrice(color.price, color.sale));
            $('body').append('<div class="modal-overlay"></div>');
            $parent.fadeIn('fast').click(function(e){e.stopPropagation()});
        }) .fail(function() {
            alert( "error" );
        });
    });
    $(document).click(function () {
        if($('.product-modal').is(':visible')){
            $('.product-modal').fadeOut("fast");
            $('.modal-overlay').remove();
        }
    });
    
});
function getPrice(price, sale) {
        var $html = '';
        if( sale > 0 ) {
            var $new = price - price * sale/100;
            $html += '<span class="product-price">$'+ $new +'</span><span class="old-price">$'+price+'</span>';
        } else {
            $html += '<span class="product-price">$'+ price +'</span>';
        }
        return $html;
    }
function filter_measult($container, $e, $data, $rs) {
    var min = parseInt($($e).data('value-min'));
    var max = parseInt($($e).data('value-max'));
    $($e).slider({
        range: true,
        min: min,
        max: max,
        values: [min, max],
        slide: function (event, ui) {
            var min = ui.values[ 0 ],
                    max = ui.values[ 1 ];
            $container.isotope({filter: function () {
                    var width = $(this).data($data);
                    width = parseInt(width);
                    $($rs).text(ui.values[ 0 ] + " cm - " + ui.values[ 1 ] + " cm");
                    return width >= min && width <= max ? true : false;
                }})
        }
    });
    $($rs).text($($e).slider("values", 0) + " cm - " + $($e).slider("values", 1) + 'cm');
}

</script>
@stop