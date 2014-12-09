  $(document).ready(function() {

    // Shopatron('#atc').addToCartButton({ 
    //   partNumber: '1',

    // }, {
    //     clickSuccess: function () {
    //       var checkOutDiv  = document.getElementById('checkOutDiv');
    //       checkOutDiv.style.display = "";
    //     },
    // });
    // Testing purposes ^^

    function checkOutHideShow() { 
      var checkOutDiv = document.getElementById('checkOutDiv');
      checkOutDiv.style.display = "";
    }

  // Winches Hydraulic
  // ==========================================================================||  

  // H Series
  // ==========================================================================||

  Shopatron('#atc_H-18K').addToCartButton({ 
      partNumber: '70-58000C' }, { clickSuccess: function () { checkOutHideShow() },
    });

  Shopatron('#atc_H1200').addToCartButton({ 
      partNumber: '70-52000C'
    }, {
      clickSuccess: function () {
        checkOutHideShow()
      },
    });

    Shopatron('#atc_H9000').addToCartButton({ 
      partNumber: '70-50080C'
    }, {
      clickSuccess: function () {
        checkOutHideShow()
      },
    });

    Shopatron('#atc_H10500').addToCartButton({ 
      partNumber: '70-50050C'
    }, {
      clickSuccess: function () {
        checkOutHideShow()
      },
    });


  // HI Series
  // ==========================================================================||

  Shopatron('#atc_HI10500').addToCartButton({ 
      partNumber: '75-50050C'
    }, {
      clickSuccess: function () {
        checkOutHideShow()
      },
    });

    Shopatron('#atc_HI1200').addToCartButton({ 
      partNumber: '75-52000C'
    }, {
      clickSuccess: function () {
        checkOutHideShow()
      },
    });

    Shopatron('#atc_HI9000').addToCartButton({ 
      partNumber: '75-50085C'
    }, {
      clickSuccess: function () {
        checkOutHideShow()
      },
    });


  // H Winch
  // ==========================================================================||

  Shopatron('#atc_HWA_Kit').addToCartButton({ 
      partNumber: '34-5020-06' }, { clickSuccess: function () { checkOutHideShow() },
    });

  // HI Winch
  // ==========================================================================||


  // HS Winch
  // ==========================================================================||

   Shopatron('#atc_HS9000').addToCartButton({ 
      partNumber: '70-59000C'
      }, { 
        clickSuccess: function () { 
          checkOutHideShow() } 
      });

  // End Winches Hydraulic
  // ==========================================================================||
   
  // Electric Winches  
  // ==========================================================================||

  // 12000 Pound  
  // ==========================================================================||

  Shopatron('#atc_SEC12').addToCartButton({ 
      partNumber: '76-50251BW'
      }, { 
        clickSuccess: function () { 
          checkOutHideShow() } 
      });

  // 15000 Pound  
  // ==========================================================================||

  Shopatron('#atc_SEC15').addToCartButton({ 
      partNumber: '76-50260W'
      }, { 
        clickSuccess: function () { 
          checkOutHideShow() } 
      });

  // 8000 Pound  
  // ==========================================================================||

   Shopatron('#atc_SEC8_V12').addToCartButton({ 
      partNumber: '77-50141'
      }, { 
        clickSuccess: function () { 
          checkOutHideShow() } 
      });
   Shopatron('#atc_SEC8').addToCartButton({ 
      partNumber: '77-50141W'
      }, { 
        clickSuccess: function () { 
          checkOutHideShow() } 
      });

   Shopatron('#atc_SEC8_scout').addToCartButton({ 
      partNumber: '77-53141W'
      }, { 
        clickSuccess: function () { 
          checkOutHideShow() } 
      });

  // 95000 Pound  
  // ==========================================================================||

  Shopatron('#atc_SEC9_5').addToCartButton({ 
      partNumber: '76-50246BW'
      }, { 
        clickSuccess: function () { 
          checkOutHideShow() } 
      });

   Shopatron('#atc_SI95000').addToCartButton({ 
      partNumber: '76-50147'
      }, { 
        clickSuccess: function () { 
          checkOutHideShow() } 
      });


  // ATV_UTV
  // ==========================================================================|| 

   Shopatron('#atc_PE2_5_12V_2500').addToCartButton({ 
      partNumber: '77-50105B'
      }, { 
        clickSuccess: function () { 
          checkOutHideShow() }
      });

   Shopatron('#atc_PE2_5_12V_2500_Syn').addToCartButton({ 
      partNumber: '77-53105B'
      }, { 
        clickSuccess: function () { 
          checkOutHideShow() } 
      });

   Shopatron('#atc_PE2_5_ES_12V_wp').addToCartButton({ 
      partNumber: '77-50105BW'
      }, { 
        clickSuccess: function () { 
          checkOutHideShow() } 
      });

   Shopatron('#atc_PE2_5_ES_12V_wp_Syn').addToCartButton({ 
      partNumber: '77-53105BW'
      }, { 
        clickSuccess: function () { 
          checkOutHideShow() } 
      });

   Shopatron('#atc_PE3_5_12V_3500').addToCartButton({ 
      partNumber: '77-50112B'
      }, { 
        clickSuccess: function () { 
          checkOutHideShow() } 
      });

   Shopatron('#atc_PE3_5_12V_3500_Syn').addToCartButton({ 
      partNumber: '77-53112B'
      }, { 
        clickSuccess: function () { 
          checkOutHideShow() } 
      });

   Shopatron('#atc_PE3_5_ES_12V_wp').addToCartButton({ 
      partNumber: '77-50112BW'
      }, { 
        clickSuccess: function () { 
          checkOutHideShow() } 
      });

   Shopatron('#atc_PE3_5_ES_12V_wp_Syn').addToCartButton({ 
      partNumber: '77-53112BW'
      }, { 
        clickSuccess: function () { 
          checkOutHideShow() } 
      });

   Shopatron('#atc_PE4500_12V_Winch_Per').addToCartButton({ 
      partNumber: '76-50115B'
      }, { 
        clickSuccess: function () { 
          checkOutHideShow() } 
      });

   Shopatron('#atc_PE4500_ES_Trailer').addToCartButton({ 
      partNumber: '76-50115BW'
      }, { 
        clickSuccess: function () { 
          checkOutHideShow() } 
      });

   Shopatron('#atc_VMX2_5_12V').addToCartButton({ 
      partNumber: '76-72105'
      }, { 
        clickSuccess: function () { 
          checkOutHideShow() } 
      });

   Shopatron('#atc_VMX3_5_12V').addToCartButton({ 
      partNumber: '76-72112'
      }, { 
        clickSuccess: function () { 
          checkOutHideShow() } 
      });

  // ES9 Gator
  // ==========================================================================||


   Shopatron('#atc_ES9').addToCartButton({ 
      partNumber: '76-53248'
      }, { 
        clickSuccess: function () { 
          checkOutHideShow() } 
      });

  // End Eletric Winches
  // ==========================================================================
  // ==========================================================================|| 

  // Recovery Gear
  // ==========================================================================||  

  // Gloves
  // ==========================================================================||

    Shopatron('#atc_glovesL').addToCartButton({ 
      partNumber: '30-19-G4'
      }, { 
        clickSuccess: function () { 
          checkOutHideShow() } 
    });
    Shopatron('#atc_glovesXL').addToCartButton({ 
      partNumber: '30-19-G2'
      }, { 
        clickSuccess: function () { 
          checkOutHideShow() } 
    });

  // Recovery Kits
  // ==========================================================================||


  Shopatron('#atc_ATV_UTV').addToCartButton({ 
    partNumber: '19-00105'
    }, { 
      clickSuccess: function () { 
        checkOutHideShow() } 
  });
  Shopatron('#atc_off_road').addToCartButton({ 
    partNumber: '19-00100'
    }, { 
      clickSuccess: function () { 
        checkOutHideShow() } 
  });

  Shopatron('#atc_HD').addToCartButton({ 
    partNumber: '19-00150'
    }, { 
      clickSuccess: function () { 
        checkOutHideShow() } 
  });
  Shopatron('#atc_winch_damp').addToCartButton({ 
    partNumber: '30-19-B5'
    }, { 
      clickSuccess: function () { 
        checkOutHideShow() } 
  });

  // Shackles
  // ==========================================================================||

  Shopatron('#atc_power_coat_5_8').addToCartButton({ 
    partNumber: '60-50158'
    }, { 
      clickSuccess: function () { 
        checkOutHideShow() } 
  });
  Shopatron('#atc_power_coat_3_4').addToCartButton({ 
    partNumber: '60-50134'
    }, { 
      clickSuccess: function () { 
        checkOutHideShow() } 
  });
  Shopatron('#atc_3_4_Shackle').addToCartButton({ 
    partNumber: '60-50086'
    }, { 
      clickSuccess: function () { 
        checkOutHideShow() } 
  });

  // Snatch Blocks
  // ==========================================================================||

  Shopatron('#atc_SB_20K').addToCartButton({ 
    partNumber: '60-50083'
    }, { 
      clickSuccess: function () { 
        checkOutHideShow() } 
  });
  Shopatron('#atc_SB_30K').addToCartButton({ 
    partNumber: '60-50185'
    }, { 
      clickSuccess: function () { 
        checkOutHideShow() } 
  });

  Shopatron('#atc_ATV_Snatch').addToCartButton({ 
    partNumber: '60-50105'
    }, { 
      clickSuccess: function () { 
        checkOutHideShow() } 
  });

  // Straps
  // ==========================================================================||

  Shopatron('#atc_ATV_Strap').addToCartButton({ 
    partNumber: '19108'
    }, { 
      clickSuccess: function () { 
        checkOutHideShow() } 
  });
  Shopatron('#atc_tree_strap15').addToCartButton({ 
    partNumber: '19315'
    }, { 
      clickSuccess: function () { 
        checkOutHideShow() } 
  });
  Shopatron('#atc_tree_strap30').addToCartButton({ 
    partNumber: '19330'
    }, { 
      clickSuccess: function () { 
        checkOutHideShow() } 
  });


  // End Recovery Kits
  // ==========================================================================
  // ==========================================================================|| 


  // Shopatron 
  // ==========================================================================||

    Shopatron('#quick_cart_div_id').getQuickCart({ cartLink: '/cart' });
    Shopatron('#full_cart_div_id').getCart();

  });

  // Functionality / CSS w Javascript
  // ==========================================================================||

  function hideCheckOut() {
    var hideCheckOutDiv = document.getElementById('checkOutDiv');
    hideCheckOutDiv.style.display = "none";
  }
