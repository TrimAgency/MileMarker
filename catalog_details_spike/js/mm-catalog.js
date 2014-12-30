var $ = jQuery;
var _s = _.string;

function getDetails(partNumber) {
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
        var pr = {
          description: product.description,
          image: product.image,
          name: product.name
        }
        $('div.product-desc-content').text(_s.unescapeHTML(pr.description))
      }
    }
  )
}


$(document).ready(
  function() {
    var partNumber = $('[data-partNumber]').attr('data-partNumber')
    console.log("Looking up " + partNumber);
    getDetails(partNumber);
    console.log(pr);
  }
)
