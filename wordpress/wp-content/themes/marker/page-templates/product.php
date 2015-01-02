<?php
/**
 * Template Name: Product
 * Description: Product Page Template
 */

get_header(); ?>

<link href="<?php echo get_template_directory_uri(); ?>/css/font-awesome.min.css" rel="stylesheet">
<link href="<?php echo get_template_directory_uri(); ?>/css/plugin/bootstrap-spinner.css" rel="stylesheet">
<link href="<?php echo get_template_directory_uri(); ?>/css/plugin/owl.carousel.css" rel="stylesheet">
<link href="<?php echo get_template_directory_uri(); ?>/css/plugin/owl.theme.css" rel="stylesheet">
<link href="<?php echo get_template_directory_uri(); ?>/css/product.css" rel="stylesheet">

</head>

<body>
    <div class="page-container">
        <div class="page-sidebar-wrapper">
            <button class="navbar-toggle collapsed sidebar-navbar-collapse" data-target=".page-sidebar" data-toggle="collapse" type="button">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="page-sidebar navbar-collapse collapse">
                <div class="page-logo">
                    <a href="http://milemarker.com" title="Mile Marker">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png">
                    </a>
                </div>
                <ul class="page-sidebar-menu" data-slide-speed="200" data-auto-scroll="true">
                    <li>
                        <a href="http://milemarker.com/products" target="_self">PRODUCTS</a>
                    </li>
                    <li>
                        <a href="http://milemarker.com/team-orange" target="_self">TEAM ORANGE</a>
                    </li>
                    <li>
                        <a href="http://milemarker.com/news-room" target="_self">NEWS</a>
                    </li>
                    <li>
                        <a href="http://milemarker.com/company" target="_self">COMPANY</a>
                    </li>
                    <li>
                        <a href="http://milemarker.com/where-to-buy" target="_self">WHERE TO BUY</a>
                    </li>
                </ul>
                <div class="search-content">
                    <form method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
                        <input type="text" value="<?php echo wp_specialchars($s, 1); ?>" name="s" id="s" placeholder="Search" />
                        <button type="submit" id="searchsubmit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
                <div class="social-content">
                    <ul class="social-list">
                        <li>
                            <a href="https://www.facebook.com/milemarker" target="_blank" title="facebook" class="facebook"></a>
                        </li>
                        <li>
                            <a href="https://twitter.com/MileMarkerWinch" target="_blank" title="twitter" class="twitter"></a>
                        </li>
                        <li>
                            <a href="http://instagram.com/milemarker_winch" target="_blank" title="instagram" class="instagram"></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="page-main-wrapper">
            <section class="product-section">
                <div class="section-content product-page">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <h1 class="product-title">SEC8 SCOUT (es)</h1>
                                <div class="title-icon-content">
                                    <div class="capacity-icon title-icon pull-left"></div>
                                    <div class="score-icon title-icon pull-left"></div>
                                </div>
                                <ol class="breadcrumb">
                                    <li><a href="#">PRODUCT</a></li>
                                    <li><a href="#">TYPE</a></li>
                                    <li class="active">PRODUCT TITLE</li>
                                </ol>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="product-main-image">
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/product/product_main_image.png" />
                                </div>
                                <ul class="product-side-list row">
                                    <li class="col-md-3">
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/product/product_main_image.png" />
                                    </li>
                                    <li class="col-md-3">
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/product/product_main_image.png" />
                                    </li>
                                    <li class="col-md-3">
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/product/product_main_image.png" />
                                    </li>
                                    <li class="col-md-3">
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/product/product_main_image.png" />
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h2 class="product-desc-title">This is a product subhead.<br>It is really important.</h2>
                                <div class="product-desc-content">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam ut convallis eros. Fusce vitae hendrerit turpis. Aenean blandit ex id cursus varius. Aenean gravida augue justo. Nunc sit amet hendrerit lacus. Ut in nibh a ipsum egestas venenatis. Praesent purus elit, vulputate vestibulum felis id, tempor consequat mauris. fringilla, consectetur orci sed, pulvinar ante. Vivamus pulvinar suscipit mauris feugiat sollicitudin. Phasellus scelerisque lorem vel nisi fringilla aliquam. Suspendisse quis tellus non tellus dapibus viverra. Pellentesque tellus erat, tristique nec facilisis ac, bibendum non nunc. Duis pellentesque dignissim tortor. Donec feugiat mollis nisl. Suspendisse ante lacus, posuere sit amet dapibus eget, bibendum ut ligula. Donec malesuada sit amet metus a fringilla. Curabitur consectetur libero justo, sit amet tempus orci interdum quis.</p>
                                    <br>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam ut convallis eros. Fusce vitae</p>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <p class="product-cost">$1549<span class="decimal">99</span></p>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="pull-left">
                                            <p class="quantity-title">QUANTITY</p>
                                            <div class="input-group spinner" data-trigger="spinner">
                                                <input type="text" class="quantity-value" value="1" data-rule="quantity">
                                                <span class="input-group-btn">
                                                    <a href="javascript:;" class="spin-up" data-spin="up"></a>
                                                    <a href="javascript:;" class="spin-down" data-spin="down"></a>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="pull-left">
                                            <ul class="product-social-list">
                                                <li>
                                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-buttons">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button class="small-button black-color-button">ADD TO CART</button>
                                        </div>
                                        <div class="col-md-6">
                                            <button class="small-button black-color-button">FIND A DEALER</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="product-options">
                                    <div class="row">
                                        <div class="col-md-6 product-option">
                                            <div class="product-option-control">
                                                PRODUCT FEATURE
                                                <i class="fa fa-caret-down"></i>
                                            </div>
                                            <div class="product-option-content">
                                            </div>
                                        </div>
                                        <div class="col-md-6 product-option">
                                            <div class="product-option-control">
                                                PRODUCT DOWNLOADS
                                                <i class="fa fa-caret-down"></i>
                                            </div>
                                            <div class="product-option-content">
                                            </div>
                                        </div>
                                        <div class="col-md-6 product-option">
                                            <div class="product-option-control">
                                                PRODUCT SPECIFICATIONS
                                                <i class="fa fa-caret-down"></i>
                                            </div>
                                            <div class="product-option-content">
                                            </div>
                                        </div>
                                        <div class="col-md-6 product-option">
                                            <div class="product-option-control">
                                                PRODUCT PERFORMANCE
                                                <i class="fa fa-caret-down"></i>
                                            </div>
                                            <div class="product-option-content">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="slider-nav-prev"></div>
                                <div class="slider-nav-next"></div>
                                <div class="related-product-content">
                                    <h2 class="related-pro-title">RELATED PRODUCTS</h2>
                                    <div class="related-pro-list owl-carousel owl-theme">
                                        <div class="item">
                                            <img src="<?php echo get_template_directory_uri(); ?>/images/product/product_main_image.png" />
                                            <p>Product Name</p>
                                        </div>
                                        <div class="item">
                                            <img src="<?php echo get_template_directory_uri(); ?>/images/product/product_main_image.png" />
                                            <p>Product Name</p>
                                        </div>
                                        <div class="item">
                                            <img src="<?php echo get_template_directory_uri(); ?>/images/product/product_main_image.png" />
                                            <p>Product Name</p>
                                        </div>
                                        <div class="item">
                                            <img src="<?php echo get_template_directory_uri(); ?>/images/product/product_main_image.png" />
                                            <p>Product Name</p>
                                        </div>
                                        <div class="item">
                                            <img src="<?php echo get_template_directory_uri(); ?>/images/product/product_main_image.png" />
                                            <p>Product Name</p>
                                        </div>
                                        <div class="item">
                                            <img src="<?php echo get_template_directory_uri(); ?>/images/product/product_main_image.png" />
                                            <p>Product Name</p>
                                        </div>
                                        <div class="item">
                                            <img src="<?php echo get_template_directory_uri(); ?>/images/product/product_main_image.png" />
                                            <p>Product Name</p>
                                        </div>
                                        <div class="item">
                                            <img src="<?php echo get_template_directory_uri(); ?>/images/product/product_main_image.png" />
                                            <p>Product Name</p>
                                        </div>
                                        <div class="item">
                                            <img src="<?php echo get_template_directory_uri(); ?>/images/product/product_main_image.png" />
                                            <p>Product Name</p>
                                        </div>
                                        <div class="item">
                                            <img src="<?php echo get_template_directory_uri(); ?>/images/product/product_main_image.png" />
                                            <p>Product Name</p>
                                        </div>
                                        <div class="item">
                                            <img src="<?php echo get_template_directory_uri(); ?>/images/product/product_main_image.png" />
                                            <p>Product Name</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo get_template_directory_uri(); ?>/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/plugin/jquery.spinner.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/plugin/owl.carousel.js"></script>

<script type="text/javascript">

    $('.product-option-control').on('click', function(e) {
        var product_option = $(this).closest('.product-option');
        if(product_option.hasClass('active')) {
            product_option.removeClass('active');
        } else {
            product_option.addClass('active');
        }
    });

    $(document).ready(function ($) {
        var owl = $(".related-pro-list");
        owl.owlCarousel({
            pagination: false,
            items : 6, //10 items above 1000px browser width
            itemsDesktop : [1000,5], //5 items between 1000px and 901px
            itemsDesktopSmall : [900,3], // betweem 900px and 601px
            itemsTablet: [600,2]
        });
        // Custom Navigation Events
        $(".slider-nav-next").click(function(){
            owl.trigger('owl.next');
        })
        $(".slider-nav-prev").click(function(){
            owl.trigger('owl.prev');
        })
    });

</script>

<?php get_footer(); ?>