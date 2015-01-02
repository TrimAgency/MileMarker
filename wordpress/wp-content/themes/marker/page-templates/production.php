<?php
/**
 * Template Name: Production
 * Description: Production Page Template
 */

get_header(); ?>

<link href="<?php echo get_template_directory_uri(); ?>/css/production.css" rel="stylesheet">

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
		<!--
        <div id="mobile_bg">
            <img src="<?php echo get_template_directory_uri(); ?>/images/section1.jpg" />
        </div>
		-->
        <section id="section1">
            <!--
            <div class="section-bg">
                <img src="<?php echo get_template_directory_uri(); ?>/images/section1.jpg" />
            </div>
            -->
            <div class="section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-offset-1 col-lg-9 col-sm-offset-0 col-sm-12">
                            <div class="logo-block block row">
                                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                    <h1>NOT JUST A<br>PRETTY FACE</h1>
                                    <h3>This winch has teeth.</h3>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <a class="btn_play_video playvideo fancybox fancybox.iframe" data-fancybox-group="video1" href="http://www.youtube.com/embed/1naeJfCTILY?enablejsapi=1&wmode=opaque"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="buy-gator-container">
                            <a id="buy_link" href="http://shop.milemarker.com/p/es9-gator-9-000-pound-waterproof-electric-winch?pp=12">BUY</a>
                            <a id="esg_gator_link"></a>
                            <a id="limited_link"></a>
                            <div id="gator_machine">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/gator_machine.png" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="section2">
            <div class="section-bg">
                <img src="<?php echo get_template_directory_uri(); ?>/images/section2.jpg" />
            </div>
            <div class="section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-offset-1 col-lg-5 col-md-offset-1 col-md-6 col-sm-offset-0 col-sm-12">
                            <h1>
                                THE ONLY WINCH THAT PULLS 9K ON DEMAND
                            </h1>
                            <div class="block">
                                <p>Introducing the winch that changes everything. The all new, 9,000 pound capacity, ES9 Gator is the first and only winch to pull 9,000 pounds at every layer of line. Unlike traditional winches that lose strength on every layer of cable, the ES9 Gator is a true 9,000 pound winch ready to pull at full capacity on demand.</p>
                                <a class="btn_get_gator" href="http://shop.milemarker.com/p/es9-gator-9-000-pound-waterproof-electric-winch?pp=12">GET THE GATOR</a>
                            </div>
                        </div>
                    </div>					
                </div>
            </div>
        </section>
		<section id="section3">
			<div class="section-content">
				<div class="container-fluid">
					<div class="row">
                        <ul class="portfolio-list">
                            <li class="col-lg-2 col-md-2 col-sm-3 col-xs-6">
                                <a class="fancybox" data-fancybox-group="gallery" href="<?php echo get_template_directory_uri(); ?>/images/product/Large_ClutchHandle.jpg" title="REDESIGNED CLUTCH & GEAR HOUSING">
                                    <img class="portfolio" src="<?php echo get_template_directory_uri(); ?>/images/product/Thumbs_ClutchHandle.jpg" />
                                    <img class="portfolio-hover" src="<?php echo get_template_directory_uri(); ?>/images/product/Thumbs_ClutchHandle_Hover.jpg" />
                                </a>
                            </li>
                            <li class="col-lg-2 col-md-2 col-sm-3 col-xs-6">
                                <a class="fancybox" data-fancybox-group="gallery" href="<?php echo get_template_directory_uri(); ?>/images/product/Large_Crate.jpg" title="LIMITED EDITION">
                                    <img class="portfolio" src="<?php echo get_template_directory_uri(); ?>/images/product/Thumbs_Crate.jpg" />
                                    <img class="portfolio-hover" src="<?php echo get_template_directory_uri(); ?>/images/product/Thumbs_Crate_Hover.jpg" />
                                </a>
                            </li>
                            <li class="col-lg-2 col-md-2 col-sm-3 col-xs-6">
                                <a class="fancybox" data-fancybox-group="gallery" href="<?php echo get_template_directory_uri(); ?>/images/product/Large_Factor55Angle.jpg" title="FACTOR 55 PRO LINK">
                                    <img class="portfolio" src="<?php echo get_template_directory_uri(); ?>/images/product/Thumbs_Factor55Angle.jpg" />
                                    <img class="portfolio-hover" src="<?php echo get_template_directory_uri(); ?>/images/product/Thumbs_Factor55Angle_Hover.jpg" />
                                </a>
                            </li>
                            <li class="col-lg-2 col-md-2 col-sm-3 col-xs-6">
                                <a class="fancybox" data-fancybox-group="gallery" href="<?php echo get_template_directory_uri(); ?>/images/product/Large_Factor55Lifestyle.jpg" title="FACTOR 55">
                                    <img class="portfolio" src="<?php echo get_template_directory_uri(); ?>/images/product/Thumbs_Factor55Lifestyle.jpg" />
                                    <img class="portfolio-hover" src="<?php echo get_template_directory_uri(); ?>/images/product/Thumbs_Factor55Lifestyle_Hover.jpg" />
                                </a>
                            </li>
                            <li class="col-lg-2 col-md-2 col-sm-3 col-xs-6">
                                <a class="fancybox" data-fancybox-group="gallery" href="<?php echo get_template_directory_uri(); ?>/images/product/Large_GatorLifestyle1.jpg" title="MAXIMUM PERFORMANCE">
                                    <img class="portfolio" src="<?php echo get_template_directory_uri(); ?>/images/product/Thumbs_GatorLifestyle1.jpg" />
                                    <img class="portfolio-hover" src="<?php echo get_template_directory_uri(); ?>/images/product/Thumbs_GatorLifestyle1_Hover.jpg" />
                                </a>
                            </li>
                            <li class="col-lg-2 col-md-2 col-sm-3 col-xs-6">
                                <a class="fancybox" data-fancybox-group="gallery" href="<?php echo get_template_directory_uri(); ?>/images/product/Large_JeepLifestyle.jpg" title="ELEMENT SEALED">
                                    <img class="portfolio" src="<?php echo get_template_directory_uri(); ?>/images/product/Thumbs_JeepLifestyle.jpg" />
                                    <img class="portfolio-hover" src="<?php echo get_template_directory_uri(); ?>/images/product/Thumbs_JeepLifestyle_Hover.jpg" />
                                </a>
                            </li>
                            <li class="col-lg-2 col-md-2 col-sm-3 col-xs-6">
                                <a class="fancybox" data-fancybox-group="gallery" href="<?php echo get_template_directory_uri(); ?>/images/product/Large_LimitedEditionLogo.jpg" title="LIMITED EDITION ELECTRIC WINCH">
                                    <img class="portfolio" src="<?php echo get_template_directory_uri(); ?>/images/product/Thumbs_LimitedEditionLogo.jpg" />
                                    <img class="portfolio-hover" src="<?php echo get_template_directory_uri(); ?>/images/product/Thumbs_LimitedEditionLogo_Hover.jpg" />
                                </a>
                            </li>
                            <li class="col-lg-2 col-md-2 col-sm-3 col-xs-6">
                                <a class="fancybox" data-fancybox-group="gallery" href="<?php echo get_template_directory_uri(); ?>/images/product/Large_ProductShotAngle.jpg" title="PULLS 9,000 POUNDS ON EVERY LAYER">
                                    <img class="portfolio" src="<?php echo get_template_directory_uri(); ?>/images/product/Thumbs_ProductShotAngle.jpg" />
                                    <img class="portfolio-hover" src="<?php echo get_template_directory_uri(); ?>/images/product/Thumbs_ProductShotAngle_Hover.jpg" />
                                </a>
                            </li>
                            <li class="col-lg-2 col-md-2 col-sm-3 col-xs-6">
                                <a class="fancybox" data-fancybox-group="gallery" href="<?php echo get_template_directory_uri(); ?>/images/product/Large_ProductShotAngleClutch.jpg" title="PULLS 9,000 POUNDS ON EVERY LAYER">
                                    <img class="portfolio" src="<?php echo get_template_directory_uri(); ?>/images/product/Thumbs_ProductShotAngleClutch.jpg" />
                                    <img class="portfolio-hover" src="<?php echo get_template_directory_uri(); ?>/images/product/Thumbs_ProductShotAngleClutch_Hover.jpg" />
                                </a>
                            </li>
                            <li class="col-lg-2 col-md-2 col-sm-3 col-xs-6">
                                <a class="fancybox" data-fancybox-group="gallery" href="<?php echo get_template_directory_uri(); ?>/images/product/Large_ProjectESLogo.jpg" title="ELEMENT SEALED IP68">
                                    <img class="portfolio" src="<?php echo get_template_directory_uri(); ?>/images/product/Thumbs_ProjectESLogo.jpg" />
                                    <img class="portfolio-hover" src="<?php echo get_template_directory_uri(); ?>/images/product/Thumbs_ProjectESLogo_Hover.jpg" />
                                </a>
                            </li>
                            <li class="col-lg-2 col-md-2 col-sm-3 col-xs-6">
                                <a class="fancybox" data-fancybox-group="gallery" href="<?php echo get_template_directory_uri(); ?>/images/product/Large_RopeInWater.jpg" title="SYNTHETIC ROPE">
                                    <img class="portfolio" src="<?php echo get_template_directory_uri(); ?>/images/product/Thumbs_RopeInWater.jpg" />
                                    <img class="portfolio-hover" src="<?php echo get_template_directory_uri(); ?>/images/product/Thumbs_RopeInWater_Hover.jpg" />
                                </a>
                            </li>
                            <li class="col-lg-2 col-md-2 col-sm-3 col-xs-6">
                                <a class="fancybox" data-fancybox-group="gallery" href="<?php echo get_template_directory_uri(); ?>/images/product/Large_Skin.jpg" title="GATOR SKIN COATING">
                                    <img class="portfolio" src="<?php echo get_template_directory_uri(); ?>/images/product/Thumbs_Skin.jpg" />
                                    <img class="portfolio-hover" src="<?php echo get_template_directory_uri(); ?>/images/product/Thumbs_Skin_Hover.jpg" />
                                </a>
                            </li>
                        </ul>
                    </div>
				</div>
			</div>
		</section>
        <section id="section4">
            <!--
            <div class="section-bg">
                <img src="<?php echo get_template_directory_uri(); ?>/images/section4.jpg" />
            </div>
            -->
            <div class="section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-offset-1 col-lg-5 col-md-offset-0 col-md-6 col-sm-6 col-xs-12">
                            <div class="gator-pound pound-container">
                                <div id="gator_machine_trigger"></div>
                                <div id="gator_machine_title">
                                    <div class="title">
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/es9_gator_small.png" />
                                    </div>
                                    <div class="machine-image">
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/gator.png" />
                                    </div>
                                </div>
                                <div id="gator_start_trigger"></div>
                                <div class="rope-container" id="gator_rope_container">
                                    <div id="gator_rope"></div>
                                    <ul class="rope-list" id="gator_rope_list">
                                        <li id="gator_sec1">
                                            <div class="rope-area"></div>
                                            <div class="percent" id="gator_percent1">
                                                <h1>100%</h1>
                                                <p>9,000 POUNDS</p>
                                            </div>
                                            <p class="divider-percent">25'</p>
                                        </li>
                                        <li id="gator_sec2">
                                            <div class="rope-area"></div>
                                            <div class="percent" id="gator_percent2">
                                                <h1>100%</h1>
                                                <p>9,000 POUNDS</p>
                                            </div>
                                            <p class="divider-percent">50'</p>
                                        </li>
                                        <li id="gator_sec3">
                                            <div class="rope-area"></div>
                                            <div class="percent" id="gator_percent3">
                                                <h1>100%</h1>
                                                <p>9,000 POUNDS</p>
                                            </div>
                                            <p class="divider-percent">75'</p>
                                        </li>
                                        <li id="gator_sec4">
                                            <div class="rope-area"></div>
                                            <div class="percent" id="gator_percent4">
                                                <h1>100%</h1>
                                                <p>9,000 POUNDS</p>
                                            </div>
                                            <p class="divider-percent">100'</p>
                                        </li>
                                    </ul>
                                    <div id="gator_rope_winch" class="rope-winch"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-6 col-sm-6 col-xs-12">
                            <div class="traditional-pound pound-container">
                                <div id="trade_machine_trigger"></div>
                                <div id="trade_machine_title">
                                    <div class="title">TRADITIONAL WINCHES</div>
                                    <div class="machine-image">
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/traditional.png" />
                                    </div>
                                </div>
                                <div id="trade_start_trigger"></div>
                                <div class="rope-container" id="trade_rope_container">
                                    <div id="trade_rope"></div>
                                    <ul class="rope-list" id="traditional_rope_list">
                                        <li id="trade_sec1">
                                            <div class="rope-area"></div>
                                            <div class="percent" id="trade_percent1">
                                                <h1>60%</h1>
                                                <p>6,000 POUNDS</p>
                                            </div>
                                            <p class="divider-percent">25'</p>
                                        </li>
                                        <li id="trade_sec2">
                                            <div class="rope-area"></div>
                                            <div class="percent" id="trade_percent2">
                                                <h1>70%</h1>
                                                <p>7,000 POUNDS</p>
                                            </div>
                                            <p class="divider-percent">50'</p>
                                        </li>
                                        <li id="trade_sec3">
                                            <div class="rope-area"></div>
                                            <div class="percent" id="trade_percent3">
                                                <h1>80%</h1>
                                                <p>8,000 POUNDS</p>
                                            </div>
                                            <p class="divider-percent">75'</p>
                                        </li>
                                        <li id="trade_sec4">
                                            <div class="rope-area"></div>
                                            <div class="percent" id="trade_percent4">
                                                <h1>100%</h1>
                                                <p>9,000 POUNDS</p>
                                            </div>
                                            <p class="divider-percent">100'</p>
                                        </li>
                                    </ul>
                                    <div id="trade_rope_winch" class="rope-winch"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="btn_get_gator winches-button" href="http://shop.milemarker.com/p/es9-gator-9-000-pound-waterproof-electric-winch?pp=12">GET THE GATOR</a>
                </div>
            </div>
        </section>
        <section id="section5">
            <!--
            <div class="section-bg">
                <img src="<?php echo get_template_directory_uri(); ?>/images/section5.jpg" />
            </div>
            -->
            <div class="section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-offset-1 col-lg-3">
                            <h1>
                                THE GATOR<br>
                                VS. THE REST
                            </h1>
                        </div>
                        <div class="col-lg-6">
							<div class="block row">
								<div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
									<p>3 identical batteries; No charging source; Head-to-head pull at 9,000 pounds; That is the test that we performed to see where the Gator stacks up against the competition's 10,000 pound winches. Here is how far each pulled before stalling.</p>
								</div>
								<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
									<a class="btn_get_gator playvideo fancybox fancybox.iframe" data-fancybox-group="video2" href="http://www.youtube.com/embed/z2nTUVLTa3M?enablejsapi=1&wmode=opaque">SEE THE TEST VIDEO</a>	
								</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-offset-1 col-lg-10">
                            <ul id="winches_area_list">
                                <li class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                    <div class="title"><img src="<?php echo get_template_directory_uri(); ?>/images/es9_gator_small.png" /></div>
                                    <div class="winches-area">
                                        <div class="winch">27</div>
                                        <div class="winch-unit">'</div>
                                    </div>
                                </li>
                                <li class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                    <div class="title">WARN</div>
                                    <div class="winches-area">
                                        <div class="winch">07</div>
                                        <div class="winch-unit">'</div>
                                    </div>
                                </li>
                                <li class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                    <div class="title">SMITTYBILT</div>
                                    <div class="winches-area">
                                        <div class="winch">15</div>
                                        <div class="winch-unit">'</div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-offset-1 col-lg-4 col-xs-12 marginT50">
                            <table id="tbl_specs">
                                <thead>
                                <tr>
                                    <th colspan="2">SPECS</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Part Number</td>
                                    <td>76-50260</td>
                                </tr>
                                <tr>
                                    <td>Rated line pull</td>
                                    <td>9,000 EVERY LAYER</td>
                                </tr>
                                <tr>
                                    <td>Control Pendant</td>
                                    <td>Power-In, Power-Out Remote, 12' <small>(3.7m)</small></td>
                                </tr>
                                <tr>
                                    <td>Dimensions (LxWxH)</td>
                                    <td>22.44" X 6.29" X 11.00" <small>(570mm X 160mm X 280mm)</small></td>
                                </tr>
                                <tr>
                                    <td>Cable</td>
                                    <td>3/8" X 100' Synthetic Rope with Factor 55 thimble</td>
                                </tr>
                                <tr>
                                    <td>Drum Size: Diameter/Length</td>
                                    <td>2.9" X 8.9" (75mm X 228mm)</td>
                                </tr>
                                <tr>
                                    <td>Net weight</td>
                                    <td>101 lbs (46 kg)</td>
                                </tr>
                                <tr>
                                    <td>Bolt Pattern</td>
                                    <td>4 Bolt Pattern, 4.5" X 10" (114.3mm X 114.3mm)</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-lg-3 col-xs-12 marginT50">
                            <table id="tbl_performance">
                                <thead>
                                <tr>
                                    <th colspan="6">Performance</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>LAYER</td>
                                    <td>LB</td>
                                    <td>KG</td>
                                    <td>FPM</td>
                                    <td>MPM</td>
                                    <td>AMPS @ 12V</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>9000</td>
                                    <td>408G</td>
                                    <td>7.75</td>
                                    <td>2.36</td>
                                    <td>279</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>9000</td>
                                    <td>408G</td>
                                    <td>8.14</td>
                                    <td>2.48</td>
                                    <td>306</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>9000</td>
                                    <td>408G</td>
                                    <td>8.8</td>
                                    <td>2.68</td>
                                    <td>331</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>9000</td>
                                    <td>408G</td>
                                    <td>9.82</td>
                                    <td>2.99</td>
                                    <td>360</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-lg-2 col-xs-12 marginT50">
                            <div class="feature-container">
                                <h1>OTHER FEATURES</h1>
                                <ul id="feature_list">
                                    <li>
                                        <span class="glyphicon glyphicon-stop"></span>
                                        Factor 55 Thimble
                                    </li>
                                    <li>
                                        <span class="glyphicon glyphicon-stop"></span>
                                        Synthetic Rope
                                    </li>
                                    <li>
                                        <span class="glyphicon glyphicon-stop"></span>
                                        Waterproof
                                    </li>
                                    <li>
                                        <span class="glyphicon glyphicon-stop"></span>
                                        Wireless Remote
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="buy-gator-container" style="margin-top: 220px; margin-bottom: 120px">
                            <a id="buy_link" href="http://shop.milemarker.com/p/es9-gator-9-000-pound-waterproof-electric-winch?pp=12">BUY</a>
                            <a id="esg_gator_link"></a>
                            <a id="limited_link"></a>
                            <div id="gator_machine">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/gator_machine.png" />
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

<script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/plugin/jquery.counterup.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/plugin/TweenMax.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/plugin/jquery.scrollmagic.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/plugin/fancybox/jquery.mousewheel-3.0.6.pack.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/plugin/fancybox/jquery.fancybox.js?v=2.1.4"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/plugin/fancybox/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/plugin/fancybox/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/plugin/fancybox/helpers/jquery.fancybox-media.js?v=1.0.5"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/product.js"></script>

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
</script>