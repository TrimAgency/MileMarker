var $ = jQuery;
var _s = _.string;

function insertDetails(details) {
  $('p.product-cost').text('$' + _s.unescapeHTML(details.price))
  $('h2.product-desc-title').text(_s.unescapeHTML(details.name))
  $('div.product-desc-content').text(_s.unescapeHTML(details.description))
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
        insertDetails({
          description: product.description,
          image: product.image,
          name: product.name,
          price: product.price
        });
      }
    }
  )
}

$(document).ready(
  function() {
    var partNumber = $('[data-partNumber]').attr('data-partNumber')
    console.log("Looking up " + partNumber);
    getDetails(partNumber);

    Shopatron('#cart-button').addToCartButton(
      { 
        partNumber: partNumber 
      }, 
      { 
        clickSuccess: function () { checkOutHideShow() },
      }
    );
  }
)





