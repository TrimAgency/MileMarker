<?php
/**
 * Template Name: Splash
 * Description: Splash Page Template
 */

get_header(); ?>

<link href="<?php echo get_template_directory_uri(); ?>/css/splash.css" rel="stylesheet">

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
                <a href="#" title="Mile Marker">
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
        </div>
    </div>
    <div class="page-content-wrapper">
        <div class="splash-page-content">
            <h1 class="content-title">THIS WINCH CHANGES<br>EVERYTHING.</h1>
            <div class="content-title-divider"></div>
            <img class="top-logo" src="<?php echo get_template_directory_uri(); ?>/images/top_logo.png" />
            <a class="btn_play_button fancybox fancybox.iframe" href="http://www.youtube.com/embed/KWKMjCWlbog?enablejsapi=1&wmode=opaque"></a>
            <a href="http://milemarker.com/gator" target="_self" class="btn_see_gator">SEE THE GATOR</a>
        </div>
    </div>
</div>

<div class="page-footer">
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
    <div class="bottom-nav-content navbar-collapse collapse">
        <ul class="bottom-nav" data-slide-speed="200" data-auto-scroll="true">
            <li>
                <a href="http://milemarker.com/products/electric-winches/projectes" target="_self">WINCHES</a>
            </li>
            <li class="divider"></li>
            <li>
                <a href="http://milemarker.com/products/recovery-gear" target="_self">RECOVERY GEAR</a>
            </li>
            <li class="divider"></li>
            <li>
                <a href="http://milemarker.com/products/drive-train-products/lock-out-hubs" target="_self">HUBS</a>
            </li>
        </ul>
    </div>
    <div class="bottom-logo">
        <a href="http://milemarker.com/team-orange" class="btn_team_orange" target="_self"></a>
    </div>
</div>

<div id="bg_splash">
    <img src="<?php echo get_template_directory_uri(); ?>/images/bg_splash.jpg" style="width:100%;" />
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo get_template_directory_uri(); ?>/bootstrap/js/bootstrap.min.js"></script>

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
            $(".fancybox")
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