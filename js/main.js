  

  $(document).ready(function() {

    Shopatron('#atc').addToCartButton({ 
      partNumber: '1',

    }, {
        clickSuccess: function () {
          var checkOutDiv  = document.getElementById('checkOutDiv');
          checkOutDiv.style.display = "";
        },
    });
    Shopatron('#quick_cart_div_id').getQuickCart({ cartLink: '/cart' });
    Shopatron('#full_cart_div_id').getCart();

  });

  function hideCheckOut() {
    var hideCheckOutDiv = document.getElementById('checkOutDiv');
    hideCheckOutDiv.style.display = "none";
  }




















