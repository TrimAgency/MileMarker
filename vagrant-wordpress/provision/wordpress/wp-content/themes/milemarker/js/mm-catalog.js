var $ = jQuery;
var _s = _.string;

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
  console.log(productImages);
}

function getDetails(partNumber) {
  Shopatron.getProduct(
    {
      partNumber: partNumber
    },
    {
      error: function () {
        console.log('Part lookup failed');
        insertDetails ({
          description: 'Description unavailable',
          name: 'Long name unavailable',
          price: 'Price unavailable',
          image: '//images/placeholder.png'
        });
      },
      success: function (product) {
        console.log('PRODUCT:');
        console.log(product);
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

$(document).ready(
  function() {
    var partNumber = $('[data-partNumber]').attr('data-partNumber');
    console.log("Looking up " + partNumber);
    getDetails(partNumber);

    Shopatron('#cart-button').addToCartButton(
      {
        partNumber: partNumber
      },
      {
        clickSuccess: function () { revealCart() },
      }
    );
  }
);





