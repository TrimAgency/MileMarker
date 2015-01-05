var $ = jQuery;
var _s = _.string;

$(document).ready(function() {

    // Get product details from Shopatron
    // partNumber is a unique ID embedded into the page
    var partNumber = $('[data-partNumber]').attr('data-partNumber');

    getDetails(partNumber);

    Shopatron('#cart-button').addToCartButton(
      {
        partNumber: partNumber
      },
      {
        clickSuccess: function () { revealCart() },
      }
    );

    /* timeup */
    $('.winch').counterUp();

    /* fancybox */
    $(".fancybox").fancybox({
        autoSize: true,
        padding: 0,
        margin: 20,
        aspectRatio: true,
        helpers: {
            title : {
                type : 'outside'
            },
            overlay : {
                speedOut : 0
            }
        }
    });

  animation();

});

function animation() {
  var controller = new ScrollMagic();
    new ScrollScene({offset: 267, triggerElement: "#gator_start_trigger", duration: 1300, triggerHook: 1})
        .setPin("#gator_rope_winch")
        .addTo(controller)
        .on("progress", function (e) {
            $('#gator_rope').css('height', 1300 * e.progress.toFixed(3));
        });

    new ScrollScene({offset: 266, triggerElement: "#trade_start_trigger", duration: 1300, triggerHook: 1})
        .setPin("#trade_rope_winch")
        .addTo(controller)
        .on("progress", function (e) {
            $('#trade_rope').css('height', 1300 * e.progress.toFixed(3));
        });

     new ScrollScene({offset: 580, triggerElement: "#gator_sec1", triggerHook: 1}).setTween(TweenMax.fromTo("#gator_sec1", 0.5, {"opacity": 0}, {"opacity": 1})).addTo(controller);
     new ScrollScene({offset: 580, triggerElement: "#gator_sec2", triggerHook: 1}).setTween(TweenMax.fromTo("#gator_sec2", 0.5, {"opacity": 0}, {"opacity": 1})).addTo(controller);
     new ScrollScene({offset: 580, triggerElement: "#gator_sec3", triggerHook: 1}).setTween(TweenMax.fromTo("#gator_sec3", 0.5, {"opacity": 0}, {"opacity": 1})).addTo(controller);
     new ScrollScene({offset: 580, triggerElement: "#gator_sec4", triggerHook: 1}).setTween(TweenMax.fromTo("#gator_sec4", 0.5, {"opacity": 0}, {"opacity": 1})).addTo(controller);
     new ScrollScene({offset: 580, triggerElement: "#trade_sec1", triggerHook: 1}).setTween(TweenMax.fromTo("#trade_sec1", 0.5, {"opacity": 0}, {"opacity": 1})).addTo(controller);
     new ScrollScene({offset: 580, triggerElement: "#trade_sec2", triggerHook: 1}).setTween(TweenMax.fromTo("#trade_sec2", 0.5, {"opacity": 0}, {"opacity": 1})).addTo(controller);
     new ScrollScene({offset: 580, triggerElement: "#trade_sec3", triggerHook: 1}).setTween(TweenMax.fromTo("#trade_sec3", 0.5, {"opacity": 0}, {"opacity": 1})).addTo(controller);
     new ScrollScene({offset: 580, triggerElement: "#trade_sec4", triggerHook: 1}).setTween(TweenMax.fromTo("#trade_sec4", 0.5, {"opacity": 0}, {"opacity": 1})).addTo(controller);
}

function checkOutHideShow() {
  var checkOutCart = document.getElementById('checkOutCart');
  checkOutCart.style.display = "";
}

function enlargeImage(url) {
  var enlargedImage = '<img src=' + url + '>';
  var enlargedImageDiv = $('div.product-main-image');

  enlargedImageDiv.html(enlargedImage);
}

function revealCart() {
  var checkOutCart = document.getElementById('checkOutCart');
  checkOutCart.style.display = "";

  var arrowHead = document.getElementById('arrowHead');
  arrowHead.style.display = "";

  $('#arrowHead').delay(2000).fadeOut(2000);
}

function insertDetails(details) {
  $('p.product-cost').text('$' + _s.unescapeHTML(details.price))
  $('h2.product-desc-title').text(_s.unescapeHTML(details.name))
  $('div.product-desc-content').text(_s.unescapeHTML(details.description))
  $('div.product-main-image').html('<img src=' + details.image  + '/>')

  var productImages = details.images;
  var images = "";

  for (var i = 0; i < productImages.length; i++) {
    var url = productImages[i].url;

    if (url != undefined) {
      images += '<li onClick=enlargeImage("' + url + '") class="col-md-3"><img src=' + url + ' /></li>';
    }
  }

  if (images) {
    $('ul.product-side-list').html(images);
  }
}

function getDetails(partNumber) {
  Shopatron.getProduct(
    {
      partNumber: partNumber
    },
    {
      error: function () {
        // TODO: i18n
        insertDetails ({
          description: 'Description unavailable',
          name: 'Long name unavailable',
          price: 'Price unavailable',
          image: '//images/placeholder.png'
        });
      },
      success: function (product) {
        insertDetails({
          description: product.description,
          image: product.image,
          name: product.name,
          price: product.price,
          images: product.images
        });
      }
    }
  )
}
