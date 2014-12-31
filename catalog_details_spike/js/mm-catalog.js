var $ = jQuery;
var _s = _.string;

function getDetails(partNumber) {
  var pr;
  Shopatron.getProduct(
    {
      partNumber: partNumber
    },
    {
      error: function () {
        console.log('Part lookup failed');
        pr = {
          description: 'Description unavailable'
        }
      },
      success: function (product, text) {
        pr = {
          description: product.description,
          image: product.image,
          name: product.name,
          price: product.price
        }
        $('h2.product-desc-title').text(_s.unescapeHTML(pr.name))
        $('div.product-desc-content').text(_s.unescapeHTML(pr.description))
        $('p.product-cost').text('$' + _s.unescapeHTML(pr.price))
      }
    }
  )
}


$(document).ready(
  function() {
    var partNumber = $('[data-partNumber]').attr('data-partNumber')
    console.log("Looking up " + partNumber);
    getDetails(partNumber);
  }
)
