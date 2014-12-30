var $ = jQuery;
// var s = underscore.string;

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
        // $('div.product-desc-content').text(s.unescapeHTML(pr.description))
        $('div.product-desc-content').text(pr.description)
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
