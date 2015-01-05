<?php
/**
 * Template Name: Home
 * Description: Home Page Template
 */

get_header(); ?>

<link href="<?php echo get_template_directory_uri(); ?>/css/font-awesome.min.css" rel="stylesheet">
<link href="<?php echo get_template_directory_uri(); ?>/css/plugin/perfect-scrollbar.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/plugin/ion.rangeSlider.css" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/plugin/ion.rangeSlider.skinFlat.css" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/plugin/ion.rangeSlider.skinHTML5.css" />
<link href="<?php echo get_template_directory_uri(); ?>/css/home.css" rel="stylesheet">

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
                        <ul>
                            <li>
                                <a href="#">SAMPLE TEXT 1</a>
                                <ul>
                                    <li><a href="#">SAMPLE TEXT 1</a></li>
                                    <li><a href="#">SAMPLE TEXT 2</a></li>
                                    <li><a href="#">SAMPLE TEXT 3</a></li>
                                </ul>
                            </li>
                            <li><a href="#">SAMPLE TEXT 2</a></li>
                            <li><a href="#">SAMPLE TEXT 3</a></li>
                            <li><a href="#">SAMPLE TEXT 4</a></li>
                            <li><a href="#">SAMPLE TEXT 5</a></li>
                            <li><a href="#">SAMPLE TEXT 6</a></li>
                            <li><a href="#">SAMPLE TEXT 7</a></li>
                        </ul>
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
            <section id="section1">
                <div class="section-content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <h1 class="content-title">THIS WINCH CHANGES<br>EVERYTHING.</h1>
                                <div class="content-title-divider"></div>
                                <img class="gator-logo" src="<?php echo get_template_directory_uri(); ?>/images/top_logo.png" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <a href="http://milemarker.com/gator" target="_self" class="btn_see_gator button">SEE THE GATOR</a>
                            </div>
                        </div>
                        <a class="btn_play_button fancybox fancybox.iframe" href="http://www.youtube.com/embed/KWKMjCWlbog?enablejsapi=1&wmode=opaque"></a>
                    </div>
                </div>
            </section>
            <section class="category-section">
                <div class="section-content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="category-nav">
                                    <li>
                                        <a href="#winches_and_hubs" data-link="#winches_and_hubs" class="applet-button" target="_self">FIND A PRODUCT</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="#how_do_you_buy" data-link="#how_do_you_buy" class="applet-button" target="_self">FIND A DEALER</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="#winches_and_hubs" data-link="#winches_and_hubs" class="applet-button" target="_self">BECOME A DEALER</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section id="section2">
                <div class="section-content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <img class="team-orange" src="<?php echo get_template_directory_uri(); ?>/images/team_orange.png" />
                            </div>
                            <div class="col-md-6">
                                <div class="sign-me-content">
                                    <h3>SEO INTRO CONTENT ABOUT MILE MARKER</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
                                    <div class="row">
                                        <div class="col-md-7">
                                            <input type="email" class="sign-me-email" placeholder="Email Address" />
                                        </div>
                                        <div class="col-md-5">
                                            <button type="button" class="sign-me-up">SIGN ME UP</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section id="section3">
                <div class="section-content">
                    <div class="container-fluid">
                        <!-- Winches And Hubs -->
                        <div class="row applet-area padding0" id="winches_and_hubs" style="display: block;">
                            <div class="col-md-6">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/applet/winches_gator_car.png" />
                                <a class="button product-finder-button applet-button" href="#search_for_winch" data-link="#search_for_winch">WINCHES</a>
                            </div>
                            <div class="col-md-6">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/applet/hubs_gator_car.png" />
                                <a class="button product-finder-button applet-button" href="#select_your_vehicle" data-link="#select_your_vehicle">HUBS</a>
                            </div>
                        </div>

                        <!-- Search For Winch -->
                        <div class="row applet-area" id="search_for_winch">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <a class="button back-button applet-button" href="#winches_and_hubs" data-link="#winches_and_hubs">BACK</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h1 class="applet-title">SEARCH BY WINCH</h1>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1">
                                        <div class="row">
                                            <div class="col-md-4 search-by-item">
                                                <div class="vehicle-icon search-by-icon"></div>
                                                <a class="button search-by-button applet-button" href="#product_finder_select_vehicle" data-link="#product_finder_select_vehicle">VEHICLE</a>
                                            </div>
                                            <div class="col-md-4 search-by-item">
                                                <div class="industry-icon search-by-icon"></div>
                                                <a class="button search-by-button applet-button" href="#select_your_industry" data-link="#select_your_industry">INDUSTRY</a>
                                            </div>
                                            <div class="col-md-4 search-by-item">
                                                <div class="capacity-icon search-by-icon"></div>
                                                <a class="button search-by-button applet-button" href="#choose_winch_capacity" data-link="#choose_winch_capacity">CAPACITY</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Select Your Vehicle -->
                        <div class="row applet-area" id="select_your_vehicle">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <a class="button back-button applet-button" href="#winches_and_hubs" data-link="#winches_and_hubs">BACK</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h1 class="applet-title">SELECT YOUR VEHICLE:</h1>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1">
                                        <div class="row">
                                            <div class="col-md-4 select-content">
                                                <div class="select-control">
                                                    MAKE
                                                    <i class="fa fa-angle-down"></i>
                                                </div>
                                                <ul class="select-drop-list">
                                                    <li>
                                                        <a href="#choose_your_product" class="applet-button" data-link="#choose_your_product">CHEVY</a>
                                                    </li>
                                                    <li>
                                                        <a href="#choose_your_product" class="applet-button" data-link="#choose_your_product">JEEP</a>
                                                    </li>
                                                    <li>
                                                        <a href="#choose_your_product" class="applet-button" data-link="#choose_your_product">LAND ROVER</a>
                                                    </li>
                                                    <li>
                                                        <a href="#choose_your_product" class="applet-button" data-link="#choose_your_product">CHEVY</a>
                                                    </li>
                                                    <li>
                                                        <a href="#choose_your_product" class="applet-button" data-link="#choose_your_product">JEEP</a>
                                                    </li>
                                                    <li>
                                                        <a href="#choose_your_product" class="applet-button" data-link="#choose_your_product">LAND ROVER</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-md-4 select-content">
                                                <div class="select-control">
                                                    MODEL
                                                    <i class="fa fa-angle-down"></i>
                                                </div>
                                                <ul class="select-drop-list">
                                                    <li>
                                                        <a href="javascript:void(0);">CHEVY</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);">JEEP</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);">LAND ROVER</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);">CHEVY</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);">JEEP</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);">LAND ROVER</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-md-4 select-content">
                                                <div class="select-control">
                                                    YEAR
                                                    <i class="fa fa-angle-down"></i>
                                                </div>
                                                <ul class="select-drop-list">
                                                    <li>
                                                        <a href="javascript:void(0);">CHEVY</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);">JEEP</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);">LAND ROVER</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);">CHEVY</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);">JEEP</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);">LAND ROVER</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Select Your Industry -->
                        <div class="row applet-area" id="select_your_industry">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <a class="button back-button applet-button" href="#search_for_winch" data-link="#search_for_winch">BACK</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h1 class="applet-title">SELECT YOUR INDUSTRY:</h1>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1">
                                        <div class="row">
                                            <div class="col-md-4 select-content">
                                                <div class="select-control">
                                                    MAKE
                                                    <i class="fa fa-angle-down"></i>
                                                </div>
                                                <ul class="select-drop-list">
                                                    <li>
                                                        <a href="#choose_your_product" class="applet-button" data-link="#choose_your_product">CHEVY</a>
                                                    </li>
                                                    <li>
                                                        <a href="#choose_your_product" class="applet-button" data-link="#choose_your_product">JEEP</a>
                                                    </li>
                                                    <li>
                                                        <a href="#choose_your_product" class="applet-button" data-link="#choose_your_product">LAND ROVER</a>
                                                    </li>
                                                    <li>
                                                        <a href="#choose_your_product" class="applet-button" data-link="#choose_your_product">CHEVY</a>
                                                    </li>
                                                    <li>
                                                        <a href="#choose_your_product" class="applet-button" data-link="#choose_your_product">JEEP</a>
                                                    </li>
                                                    <li>
                                                        <a href="#choose_your_product" class="applet-button" data-link="#choose_your_product">LAND ROVER</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-md-4 select-content">
                                                <div class="select-control">
                                                    MODEL
                                                    <i class="fa fa-angle-down"></i>
                                                </div>
                                                <ul class="select-drop-list">
                                                    <li>
                                                        <a href="#choose_your_product" class="applet-button" data-link="#choose_your_product">CHEVY</a>
                                                    </li>
                                                    <li>
                                                        <a href="#choose_your_product" class="applet-button" data-link="#choose_your_product">JEEP</a>
                                                    </li>
                                                    <li>
                                                        <a href="#choose_your_product" class="applet-button" data-link="#choose_your_product">LAND ROVER</a>
                                                    </li>
                                                    <li>
                                                        <a href="#choose_your_product" class="applet-button" data-link="#choose_your_product">CHEVY</a>
                                                    </li>
                                                    <li>
                                                        <a href="#choose_your_product" class="applet-button" data-link="#choose_your_product">JEEP</a>
                                                    </li>
                                                    <li>
                                                        <a href="#choose_your_product" class="applet-button" data-link="#choose_your_product">LAND ROVER</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-md-4 select-content">
                                                <div class="select-control">
                                                    YEAR
                                                    <i class="fa fa-angle-down"></i>
                                                </div>
                                                <ul class="select-drop-list">
                                                    <li>
                                                        <a href="javascript:void(0);">CHEVY</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);">JEEP</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);">LAND ROVER</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);">CHEVY</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);">JEEP</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);">LAND ROVER</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Choose Your Product -->
                        <div class="row applet-area" id="choose_your_product">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <a class="button back-button applet-button" href="#select_your_vehicle" data-link="#select_your_vehicle">BACK</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h1 class="applet-title">CHOOSE YOUR PRODUCT</h1>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1">
                                        <div class="row">
                                            <ul class="product-list">
                                                <?php
                                                // product posts
                                                $args = array(
                                                    'post_type' => 'product',
                                                    'orderby' => 'date',
                                                    'order' => 'DESC'
                                                );
                                                $query = new WP_Query( $args );
                                                if( $query->have_posts() ) {
                                                    while ($query->have_posts()) {
                                                        $query->the_post();
                                                        $product_name = get_the_title();
                                                        $part_number = get_field("part_number");
                                                        $capacity = get_field("capacity");
                                                        $line_speed = get_field("line_speed");
                                                        $cable = get_field("cable");
                                                        $product_image = get_field("product_image");
                                                        $link = get_the_permalink();
                                                        echo '
                                                            <li class="col-md-6">
                                                                <div class="row product-item">
                                                                    <div class="col-md-5 product-img">
                                                                        <img src="' . $product_image . '" />
                                                                        <a class="view-product-button" href="' . $link . '">VIEW PRODUCT</a>
                                                                    </div>
                                                                    <div class="col-md-7 product-content">
                                                                        <h5>' . $product_name . '</h5>
                                                                        <p>Part Number: ' . $part_number . '</p>
                                                                        <p>Capacity: ' . $capacity . '</p>
                                                                        <p>Line Speed: ' . $line_speed . '</p>
                                                                        <p>Cable: ' . $cable . '</p>
                                                                    </div>
                                                                </div>
                                                            </li>';
                                                    }
                                                }
                                                wp_reset_query();
                                                ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Buy Local -->
                        <div class="row applet-area" id="buy_local">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <a class="button back-button applet-button" href="#how_do_you_buy" data-link="#how_do_you_buy">BACK</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h1 class="applet-title">BUY LOCAL</h1>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5 col-md-offset-1">
                                        <div class="row">
                                            <div class="col-md-7 padding5">
                                                <input type="text" placeholder="Zipcode*" />
                                            </div>
                                            <div class="col-md-5 padding5">
                                                <button class="small-button">SEARCH</button>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <ul class="property-list padding5">
                                                <li>
                                                    <a class="property-item">
                                                        <div class="col-md-7 title">Alligator Off-Road Madness</div>
                                                        <div class="col-md-5">
                                                            <div class="score-icon"></div>
                                                            <div class="score-icon active"></div>
                                                            <div class="score-icon active"></div>
                                                            <div class="score-icon"></div>
                                                            <div class="score-icon"></div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="property-item">
                                                        <div class="col-md-7 title">Hillbilly Parts</div>
                                                        <div class="col-md-5">
                                                            <div class="score-icon active"></div>
                                                            <div class="score-icon active"></div>
                                                            <div class="score-icon"></div>
                                                            <div class="score-icon active"></div>
                                                            <div class="score-icon active"></div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="property-item">
                                                        <div class="col-md-7 title">Hammerhead Trucks</div>
                                                        <div class="col-md-5">
                                                            <div class="score-icon active"></div>
                                                            <div class="score-icon active"></div>
                                                            <div class="score-icon active"></div>
                                                            <div class="score-icon"></div>
                                                            <div class="score-icon"></div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="property-item">
                                                        <div class="col-md-7 title">Baracuda 4X4 Inc.</div>
                                                        <div class="col-md-5">
                                                            <div class="score-icon"></div>
                                                            <div class="score-icon"></div>
                                                            <div class="score-icon active"></div>
                                                            <div class="score-iconactive"></div>
                                                            <div class="score-icon"></div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="property-item">
                                                        <div class="col-md-7 title">Get Er Done Auto</div>
                                                        <div class="col-md-5">
                                                            <div class="score-icon"></div>
                                                            <div class="score-icon active"></div>
                                                            <div class="score-icon active"></div>
                                                            <div class="score-icon active"></div>
                                                            <div class="score-icon"></div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="property-item">
                                                        <div class="col-md-7 title">Distance</div>
                                                        <div class="col-md-5">
                                                            <div class="score-icon active"></div>
                                                            <div class="score-icon active"></div>
                                                            <div class="score-icon active"></div>
                                                            <div class="score-icon active"></div>
                                                            <div class="score-icon"></div>
                                                        </div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-5 padding5">
                                        <div class="row">
                                            <div class="col-md-12 map-area">
                                                <img src="<?php echo get_template_directory_uri(); ?>/images/applet/map.png" />
                                            </div>
                                        </div>
                                        <div class="row marginT10">
                                            <div class="col-md-7 local-contact-info">
                                                <p class="user-name">HAMMERHEAD TRUCKS</p>
                                                <p class="address">2031 Sharkfin Way</p>
                                                <p class="address">Pompano Beach, FL 33069</p>
                                                <p class="phone">(888) 000-0000</p>
                                                <p class="email">bitten@hammerheadtrucks.com</p>
                                            </div>
                                            <div class="col-md-5">
                                                <button class="small-button marginT40">VISIT WEBSITE</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Buy International -->
                        <div class="row applet-area" id="buy_international">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <a class="button back-button applet-button" href="#how_do_you_buy" data-link="#how_do_you_buy">BACK</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h1 class="applet-title">BUY INTERNATIONAL</h1>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5 col-md-offset-1">
                                        <div class="row">
                                            <div class="col-md-7 padding5">
                                                <input type="text" placeholder="Country*" />
                                            </div>
                                            <div class="col-md-5 padding5">
                                                <button class="small-button">SEARCH</button>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <ul class="property-list marginT30 padding5">
                                                <li>
                                                    <a class="property-item">
                                                        Dealer1
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="property-item">
                                                        Dealer2
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="property-item">
                                                        Dealer3
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="property-item">
                                                        Dealer4
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="property-item">
                                                        Dealer5
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-5 padding30">
                                        <div class="row">
                                            <div class="col-md-12 international-contact-info">
                                                <p class="user-name">HAMMERHEAD TRUCKS</p>
                                                <p class="address">2031 Sharkfin Way</p>
                                                <p class="address">Pompano Beach, FL 33069</p>
                                                <p class="phone">(888) 000-0000</p>
                                                <p class="email">bitten@hammerheadtrucks.com</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="international-score-list marginT30">
                                                <div class="score-icon active"></div>
                                                <div class="score-icon active"></div>
                                                <div class="score-icon active"></div>
                                                <div class="score-icon active"></div>
                                                <div class="score-icon"></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <button class="small-button marginT30">VISIT WEBSITE</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Choose Winch Capacity -->
                        <div class="row applet-area" id="choose_winch_capacity">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <a class="button back-button applet-button" href="#search_for_winch" data-link="#search_for_winch">BACK</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h1 class="applet-title">CHOOSE WINCH CAPACITY</h1>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 col-md-offset-2">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p class="capacity-text pulling-capacity">DESIRED PULLING CAPACITY</p>
                                                <input type="text" id="range" value="" name="range" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 capacity-value">
                                                <p class="capacity-text">I NEED A WINCH THAT CAN PULL:</p>
                                                <p class="capacity-value"><span id="capacity_value">2,000</span> LBS</p>
                                            </div>
                                            <div class="col-md-3">
                                                <a class="button small-button1 applet-button" href="#choose_your_product" data-link="#choose_your_product">VIEW WINCHES</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Buy Online -->
                        <div class="row applet-area" id="buy_online">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <a class="button back-button applet-button" href="#how_do_you_buy" data-link="#how_do_you_buy">BACK</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h1 class="applet-title">BUY ONLINE</h1>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1">
                                        <div class="row">
                                            <ul class="buy-online-list">
                                                <li class="col-md-2">
                                                    <a class="buy-online-item">
                                                        <img src="<?php echo get_template_directory_uri(); ?>/images/applet/company_mark_sample.png" />
                                                        <p>Company Name</p>
                                                    </a>
                                                </li>
                                                <li class="col-md-2">
                                                    <a class="buy-online-item">
                                                        <img src="<?php echo get_template_directory_uri(); ?>/images/applet/company_mark_sample.png" />
                                                        <p>Company Name</p>
                                                    </a>
                                                </li>
                                                <li class="col-md-2">
                                                    <a class="buy-online-item">
                                                        <img src="<?php echo get_template_directory_uri(); ?>/images/applet/company_mark_sample.png" />
                                                        <p>Company Name</p>
                                                    </a>
                                                </li>
                                                <li class="col-md-2">
                                                    <a class="buy-online-item">
                                                        <img src="<?php echo get_template_directory_uri(); ?>/images/applet/company_mark_sample.png" />
                                                        <p>Company Name</p>
                                                    </a>
                                                </li>
                                                <li class="col-md-2">
                                                    <a class="buy-online-item">
                                                        <img src="<?php echo get_template_directory_uri(); ?>/images/applet/company_mark_sample.png" />
                                                        <p>Company Name</p>
                                                    </a>
                                                </li>
                                                <li class="col-md-2">
                                                    <a class="buy-online-item">
                                                        <img src="<?php echo get_template_directory_uri(); ?>/images/applet/company_mark_sample.png" />
                                                        <p>Company Name</p>
                                                    </a>
                                                </li>
                                                <li class="col-md-2">
                                                    <a class="buy-online-item">
                                                        <img src="<?php echo get_template_directory_uri(); ?>/images/applet/company_mark_sample.png" />
                                                        <p>Company Name</p>
                                                    </a>
                                                </li>
                                                <li class="col-md-2">
                                                    <a class="buy-online-item">
                                                        <img src="<?php echo get_template_directory_uri(); ?>/images/applet/company_mark_sample.png" />
                                                        <p>Company Name</p>
                                                    </a>
                                                </li>
                                                <li class="col-md-2">
                                                    <a class="buy-online-item">
                                                        <img src="<?php echo get_template_directory_uri(); ?>/images/applet/company_mark_sample.png" />
                                                        <p>Company Name</p>
                                                    </a>
                                                </li>
                                                <li class="col-md-2">
                                                    <a class="buy-online-item">
                                                        <img src="<?php echo get_template_directory_uri(); ?>/images/applet/company_mark_sample.png" />
                                                        <p>Company Name</p>
                                                    </a>
                                                </li>
                                                <li class="col-md-2">
                                                    <a class="buy-online-item">
                                                        <img src="<?php echo get_template_directory_uri(); ?>/images/applet/company_mark_sample.png" />
                                                        <p>Company Name</p>
                                                    </a>
                                                </li>
                                                <li class="col-md-2">
                                                    <a class="buy-online-item">
                                                        <img src="<?php echo get_template_directory_uri(); ?>/images/applet/company_mark_sample.png" />
                                                        <p>Company Name</p>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-md-offset-3">
                                                <button>SEE ALL ONLINE DEALERS</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Product Finder Select Vehicle -->
                        <div class="row applet-area" id="product_finder_select_vehicle">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <a class="button back-button applet-button" href="#search_for_winch" data-link="#search_for_winch">BACK</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h1 class="applet-title">SELECT YOUR VEHICLE:</h1>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/applet/atv.png" />
                                        <a class="product-finder-button button applet-button" href="#choose_your_product" data-link="#choose_your_product">ATV</a>
                                    </div>
                                    <div class="col-md-4">
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/applet/utv.png" />
                                        <a class="product-finder-button button applet-button" href="#choose_your_product" data-link="#choose_your_product">UTV</a>
                                    </div>
                                    <div class="col-md-4">
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/applet/jeep.png" />
                                        <a class="product-finder-button button applet-button" href="#choose_your_product" data-link="#choose_your_product">JEEP</a>
                                    </div>
                                    <div class="col-md-4">
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/applet/suv.png" />
                                        <a class="product-finder-button button applet-button" href="#choose_your_product" data-link="#choose_your_product">SUV</a>
                                    </div>
                                    <div class="col-md-4">
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/applet/light_duty_truck.png" />
                                        <a class="product-finder-button button applet-button" href="#choose_your_product" data-link="#choose_your_product">LIGHT- DUTY TRUCK</a>
                                    </div>
                                    <div class="col-md-4">
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/applet/heavy_duty_truck.png" />
                                        <a class="product-finder-button button applet-button" href="#choose_your_product" data-link="#choose_your_product">HEAVY- DUTY TRUCK</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- How do you buy? -->
                        <div class="row applet-area" id="how_do_you_buy">
                            <div class="col-md-12">
                                <!--
                                <div class="row">
                                    <div class="col-md-12">
                                        <button class="back-button applet-button">BACK</button>
                                    </div>
                                </div>
                                -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <h1 class="applet-title">HOW DO YOU BUY?</h1>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1">
                                        <div class="row">
                                            <div class="col-md-4 search-by-item">
                                                <div class="buy-online-icon search-by-icon buy-icon"></div>
                                                <a class="button search-by-button applet-button" href="#buy_online" data-link="#buy_online">BUY ONLINE</a>
                                            </div>
                                            <div class="col-md-4 search-by-item">
                                                <div class="buy-local-icon search-by-icon buy-icon"></div>
                                                <a class="button search-by-button applet-button" href="#buy_local" data-link="#buy_local">BUY LOCAL</a>
                                            </div>
                                            <div class="col-md-4 search-by-item">
                                                <div class="buy-international-icon search-by-icon buy-icon"></div>
                                                <a class="button search-by-button applet-button" href="#buy_international" data-link="#buy_international">BUY INTERNATIONAL</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section id="section4">
                <div class="section-content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <h1>FROM THE TRAIL</h1>
                            </div>
                        </div>
                        <div class="row">
                            <ul id="wire_list">
                                <?php
                                // twitter feeds
                                echo do_shortcode('[fts twitter twitter_name=MileMarkerWinch]');

                                // Instagram feeds
                                echo do_shortcode('[fts instagram instagram_id=332678824]');

                                // wp posts
                                $post_count = 4;
                                $args = array(
                                    'orderby' => 'date',
                                    'order' => 'DESC'
                                );
                                $query = new WP_Query( $args );
                                if( $query->have_posts() ) {
                                    $post_index = 0;
                                    while ($query->have_posts() && $post_index < $post_count) {
                                        $query->the_post();
                                        $link = get_the_permalink();
                                        $username = get_the_author();
                                        $title = get_the_title();
                                        $content = get_the_content();
                                        $time = get_the_date();
                                        echo "
                                            <li class='feed-wrap col-lg-3 col-md-3 col-sm-4 col-xs-6'>
                                                <div class='feed-info wp-post' href='$link'>
                                                    <div class='feed-content-overlay'>
                                                        <div class='feed-user-name'>$username</div>
                                                        <div class='feed-content'>
                                                            <h3>$title</h3>
                                                            <p>$content</p>
                                                        </div>
                                                        <div class='feed-time'>$time</div>
                                                    </div>
                                                    <div class='feed-info-wrapper'>
                                                        <div class='feed-user-name'>$username</div>
                                                        <div class='feed-content'>
                                                            <h3>$title</h3>
                                                            <p>$content</p>
                                                        </div>
                                                        <div class='feed-time'>$time</div>
                                                    </div>
                                                </div>
                                            </li>";
                                        $post_index++;
                                    }
                                }
                                wp_reset_query();
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
            <section id="section5">
                <div class="section-content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" />
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="bottom-section">
                <div class="section-content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <ul class="bottom-nav">
                                    <li><h5>PRODUCTS</h5></li>
                                    <li><a href="#">ELECTRIC WINCHES</a></li>
                                    <li><a href="#">HYDRAULIC WINCHES</a></li>
                                    <li><a href="#">ATV/UTV WINCHES</a></li>
                                    <li><a href="#">RECOVERY GEAR</a></li>
                                    <li><a href="#">WINCH ACCESSORIES</a></li>
                                    <li><a href="#">REPLACEMENT PARTS</a></li>
                                    <li><a href="#">DRIVETRAIN PRODUCTS</a></li>
                                    <li><a href="#">WINCH MOUNTS</a></li>
                                    <li><a href="#">MILITARY PRODUCTS</a></li>
                                </ul>
                                <ul class="bottom-nav">
                                    <li><h5>CUSTOMER SERVICE</h5></li>
                                    <li><a href="#">PRODUCT LITERATURE</a></li>
                                    <li><a href="#">WARRANTY INFO</a></li>
                                    <li><a href="#">PRODUCT REGISTRATION</a></li>
                                    <li><a href="#">REPORT WEBSITE BUGS</a></li>
                                    <li><a href="#">CONTACT MILE MARKER</a></li>
                                </ul>
                                <ul class="bottom-nav">
                                    <li><h5>TEAM ORANGE</h5></li>
                                    <li><a href="#">COMPANY</a></li>
                                    <li><a href="#">GALLERY</a></li>
                                    <li><a href="#">MM YOUTUBE CHANNEL</a></li>
                                    <li><a href="#">SCHOOL OF RECOVERY</a></li>
                                    <li><a href="#">FACEBOOK</a></li>
                                    <li><a href="#">TWITTER</a></li>
                                    <li><a href="#">NEWS ROOM</a></li>
                                </ul>
                                <ul class="bottom-nav">
                                    <li><h5>MM DEALER</h5></li>
                                    <li><a href="#">FIND A DEALER</a></li>
                                    <li><a href="#">BECOME A DEALER</a></li>
                                    <li><a href="#">DEALER PORTAL</a></li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <div class="contact-info">
                                    <h3><i class="fa fa-home"></i> 2121 Blount Road Pompano Beach, FL USA</h3>
                                    <h3><i class="fa fa-phone"></i> 1(800) 000 - 0000</h3>
                                    <h3><i class="fa fa-envelope"></i> help@milemarker.com</h3>
                                </div>
                                <div class="sign-me-content">
                                    <h4>SIGN UP FOR STUFF.</h4>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <input type="email" class="sign-me-email" placeholder="Email Address" />
                                        </div>
                                        <div class="col-md-4">
                                            <button type="button" class="sign-me-up">SIGN ME UP</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="bottom-certification">
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/bottom_certification.png" />
                                </div>
                                <div class="copyright">
                                    Copyright © 2014 Mile Marker Incorporated. All Rights Reserved. Mile Marker and Use Mile Marker Logo are Registered Trademarks of Mile Marker Incorporated. Privacy Policy and Legal Statement.
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

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/plugin/jquery.scrolltofixed.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/plugin/perfect-scrollbar.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/plugin/ion.rangeSlider.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/plugin/jquery.easing.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/plugin/jquery.scrollTo-1.4.3.1-min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/plugin/jquery.localscroll-1.2.7-min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/plugin/fancybox/jquery.mousewheel-3.0.6.pack.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/plugin/fancybox/jquery.fancybox.js?v=2.1.4"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/plugin/fancybox/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/plugin/fancybox/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/plugin/fancybox/helpers/jquery.fancybox-media.js?v=1.0.5"></script>

<script src="http://www.youtube.com/player_api"></script>

<script type="text/javascript">
    // Fires whenever a player has finished loading
    function onPlayerReady(event) {
        event.target.playVideo();
    }

    // Fires when the player's state changes.
    function onPlayerStateChange(event) {
        // Go to the next video after the current one is finished playing
        if (event.data === 0) {
            $.fancybox.close();
        }
    }

    // The API will call this function when the page has finished downloading the JavaScript for the player API
    function onYouTubePlayerAPIReady() {
        // Initialise the fancyBox after the DOM is loaded
        $(document).ready(function() {
            $(".playvideo")
                .attr('rel', 'media-gallery')
                .fancybox({
                    autoSize: true,
                    padding: 0,
                    margin: 0,
                    aspectRatio: true,
                    beforeShow  : function() {
                        // Find the iframe ID
                        var id = $.fancybox.inner.find('iframe').attr('id');

                        // Create video player object and add event listeners
                        var player = new YT.Player(id, {
                            events: {
                                'onReady': onPlayerReady,
                                'onStateChange': onPlayerStateChange
                            }
                        });
                    }
                });
        });

    }

    $('.feed-info').on('click', function(e) {
        var href = $(this).attr('href');
        if(href != undefined) location.href = href;
    });

    $('.search-by-button').on('mouseover', function(e) {
        $('.search-by-icon').removeClass('hover');
        $(this).parent().find('.search-by-icon').addClass('hover');
    });

    $('.search-by-button').on('mouseout', function(e) {
        $('.search-by-icon').removeClass('hover');
    });

    $('.select-control').on('click', function(e) {
        var select_content = $(this).closest('.select-content');
        if(select_content.hasClass('active')) {
            select_content.removeClass('active');
        } else {
            $('.select-content').removeClass('active');
            select_content.addClass('active');
        }
    });

    $('.applet-button').on('click', function(e) {
        e.preventDefault();
        var link = $(this).attr('data-link');
        if(link != undefined) {
            $('.applet-area').css('display', 'none');
            $(link).css('display', 'block');
        }
    });

    $(document).ready(function ($) {
        $('.select-drop-list').perfectScrollbar();

        $('.applet-area').localScroll({hash:true, offset: {top: 0},duration: 1000, easing:'easeInOutExpo'});
        $('.category-section').localScroll({hash:true, offset: {top: 0},duration: 1000, easing:'easeInOutExpo'});

        $("#range").ionRangeSlider({
            hide_min_max: true,
            min: 2000,
            max: 20000,
            step: 2000,
            values: [2000, 4000, 6000, 8000, 10000, 12000, 14000, 16000, 18000, 20000],
            grid: true,
            prettify_separator: ",",
            onChange: function (data) {
                var num = parseInt(data.from_value);
                var value = num.toString();

                $('#capacity_value').html(value.replace(/(\d{1,3}(?=(?:\d\d\d)+(?!\d)))/g, "$1" + ","));

                if(num >= 6000 && num < 12000) {
                    $('.irs-single').removeClass('second').addClass('first');
                } else if(num >= 12000 && num < 18000) {
                    $('.irs-single').removeClass('first').removeClass('third').addClass('second');
                } else if(num >= 18000) {
                    $('.irs-single').removeClass('second').addClass('third');
                } else {
                    $('.irs-single').removeClass('first').removeClass('second').removeClass('third');
                }
            }
        });

        $('.category-section').scrollToFixed({
            limit: $('#section4').offset().top - $('.category-section').outerHeight(true)
        });
    });

</script>

<?php get_footer(); ?>