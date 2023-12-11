jQuery(document).ready(function () {
  jQuery("#what-carousel> .owl-carousel").owlCarousel({
    loop: true,
    margin: 10,
    nav: true,
    responsive: {
      0: {
        items: 1,
      },
      600: {
        items: 3,
      },
      1000: {
        items: 3,
      },
    },
  });
  jQuery('[data-fancybox="galleries"]>img').each(function () {
    var src = jQuery(this).attr("src");
    jQuery('[data-fancybox="galleries"]')
      .eq(jQuery('[data-fancybox="galleries"]>img').index(this))
      .attr("href", src);
  });
  jQuery('[data-fancybox="galleries"]').fancybox({
    buttons: ["close"],
    protect: true,
  });
  if (jQuery(window).width() < 450) {
    jQuery(".community-gallery-wrap").addClass("owl-theme owl-carousel");
    jQuery("#community-carousel").owlCarousel({
      loop: true,
      margin: 10,
      nav: true,
      responsive: {
        0: {
          items: 2,
        },
      },
    });
  } else {
    jQuery(".community-gallery-wrap").removeClass("owl-theme owl-carousel");
  }
  //------------------newsletter validation
  jQuery("#sidebar_button").click(function (e) {
    jQuery(".custom-error").remove();
    jQuery(".all-class").remove();
    var sub_name = jQuery("#subnewsname").val();
    var sub_email = jQuery("#subnewsemail").val();
    if (sub_name == "" || sub_email == "") {
      if (sub_name == "") {
        jQuery("#subnewsname").after(
          "<div class='all-class'>This field is required.</div>"
        );
        jQuery("#subnewsname").addClass("smart-error");
        e.preventDefault();
      }
      if (sub_email == "") {
        jQuery("#subnewsemail").after(
          "<div class='all-class'>This field is required.</div>"
        );
        jQuery("#subnewsemail").addClass("smart-error");
        e.preventDefault();
      }

      jQuery("#epicwin_subscription").after(
        "<div class='validation custom-error' >One or more fields have an error. Please check and try again.</div>"
      );
    }
    if (sub_email != "") {
      if (validateEmail(sub_email)) {
        jQuery("#emailcustome").remove();
        jQuery("#subnewsemail").removeClass("smart-error");
      } else {
        jQuery("#subnewsemail").after(
          '<div for="email" id="emailcustome" class="error-smart all-class">Please enter a valid email address.</div>'
        );
        jQuery("#subnewsemail").addClass("smart-error");
        e.preventDefault();
      }
    }
    function validateEmail(sub_email) {
      var filter = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;
      if (filter.test(sub_email)) {
        return true;
      } else {
        return false;
      }
    }
  });
  jQuery(".wpcf7-form input[type!='submit']")
    .focusin(function () {
      jQuery(this).parents("p").addClass("input_focus");
    })
    .focusout(function () {
      jQuery(this).parents("p").removeClass("input_focus");
    });
  jQuery('.wpcf7-form input[type!="submit"],.wpcf7-form select').on(
    "change",
    function () {
      var input = jQuery(this);
      var val = input.val();
      if (val != "") input.parents("p").addClass("value_focus");
      else input.parents("p").removeClass("value_focus");
    }
  );
  jQuery(".wpcf7-form textarea").each(function () {
    var input = jQuery(this);

    var val = input.val();
    if (val != "") input.parents("p").addClass("value_focus");
    else input.parents("p").removeClass("value_focus");
  });
  document.addEventListener("wpcf7submit", function (e) {
    jQuery(".wpcf7-form").children("p").removeClass("value_focus");
  });
  //input -focus newsletter
  jQuery("#epicwin_subscription input[type='text']")
    .focusin(function () {
      jQuery(this).parents("p").addClass("input_focus");
    })
    .focusout(function () {
      jQuery(this).parents("p").removeClass("input_focus");
    });
  jQuery('#epicwin_subscription input[type="text"]').on("change", function () {
    var input = jQuery(this);
    var val = input.val();
    if (val != "") input.parents("p").addClass("value_focus");
    else input.parents("p").removeClass("value_focus");
  });
  jQuery('#epicwin_subscription input[type="text"]').each(function () {
    var input = jQuery(this);

    var val = input.val();
    if (val != "") input.parents("p").addClass("value_focus");
    else input.parents("p").removeClass("value_focus");
  });

  jQuery(".wpcf7-form input[value='Submit']").click(function (e) {
    jQuery(".wpcf7-not-valid-tip").remove();
    jQuery(".custom-error").remove();
    jQuery(".all-class").remove();
    var first_name = jQuery(".wpcf7-form input[name='your-name']").val();
    var last_name = jQuery(".wpcf7-form input[name='text-350']").val();
    var email = jQuery(".wpcf7-form input[name='your-email']").val();

    if (first_name == "" || email == "" || last_name == "") {
      if (first_name == "") {
        jQuery(".wpcf7-form input[name='your-name']").after(
          "<div class='all-class'>This field is required.</div>"
        );
        jQuery(".wpcf7-form input[name='your-name']").addClass("smart-error");
        e.preventDefault();
      }
      if (last_name == "") {
        jQuery(".wpcf7-form input[name='text-350']").after(
          "<div class='all-class'>This field is required.</div>"
        );
        jQuery(".wpcf7-form input[name='text-350']").addClass("smart-error");
        e.preventDefault();
      }
      if (email == "") {
        jQuery(".wpcf7-form input[name='your-email']").after(
          "<div class='all-class'>This field is required.</div>"
        );
        jQuery(".wpcf7-form input[name='your-email']").addClass("smart-error");
        e.preventDefault();
      }

      jQuery(".wpcf7-form").after(
        "<div class='validation custom-error' >One or more fields have an error. Please check and try again.</div>"
      );
    }
    if (email != "") {
      if (validateEmail(email)) {
        jQuery("#emailcustome").remove();
        jQuery(".wpcf7-form input[name='your-email']").removeClass(
          "smart-error"
        );
      } else {
        jQuery(".wpcf7-form input[name='your-email']").after(
          '<div for="email" id="emailcustome" class="error-smart all-class">Please enter a valid email address.</div>'
        );
        jQuery(".wpcf7-form").after(
          "<div class='validation custom-error' >One or more fields have an error. Please check and try again.</div>"
        );
        jQuery(".wpcf7-form input[name='your-email']").addClass("smart-error");
        e.preventDefault();
      }
    }
    function validateEmail(email) {
      var filter = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;
      if (filter.test(email)) {
        return true;
      } else {
        return false;
      }
    }
  });
});

jQuery(document).ready(function () {
  jQuery(".btn-top>div>div>a").prop("href", "javascript:void(0)");
  jQuery(".btn-top").hide();
  var toTop = jQuery(".btn-top");
  // logic
  toTop.on("click", function () {
    jQuery("html, body").animate({
      scrollTop: jQuery("html, body").offset().top,
    });
  });
});
/*---------------------------sticky ----------*/
jQuery(window).scroll(function () {
  if (jQuery(document).scrollTop() > 100) {
    jQuery(".header").addClass("sticky");
    jQuery(".btn-top").show();
  } else {
    jQuery(".header").removeClass("sticky");
    jQuery(".btn-top").hide();
  }
});

jQuery(".btn-top").click(function () {
  jQuery("html, body").animate(
    {
      scrollTop: 0,
    },
    400
  );
  return false;
});

// ---------------
//   WPCF7 FORM focus
jQuery(document).ready(function () {
  jQuery(".wpcf7-form input,.wpcf7-textarea").each(function () {
    jQuery(this).focusin(function () {
      jQuery(this).parent().parent().addClass("input-focus");
    });
    jQuery(this).focusout(function () {
      jQuery(this).parent().parent().removeClass("input-focus");
      jQuery(".date-field").addClass("input-focus");
      if (jQuery(this).val()) {
        jQuery(this).parent().parent().addClass("value-focus");
      } else {
        jQuery(this).parent().parent().removeClass("value-focus");
      }
    });
  });
  jQuery(".wpcf7-form input,.wpcf7-textarea").each(function () {
    if (jQuery(this).val()) {
      jQuery(this).parent().parent().addClass("value-focus");
    } else {
      jQuery(this).parent().parent().removeClass("value-focus");
    }
  });
  document.addEventListener("wpcf7mailsent", function (e) {
    jQuery(".wpcf7-form input,.wpcf7-textarea").each(function () {
      jQuery(this).parent().parent().removeClass("value-focus");
      jQuery(this).parent().parent().removeClass("input-focus");
    });
    jQuery(".date-field").addClass("input-focus");
  });
  date = new Date().toLocaleDateString("fr-ca");
  jQuery(".wpcf7-date").attr("max", date);
});
// ------------------
$(".down-button").click(function () {
  if (jQuery(window).width() <= 1024) {
    jQuery("html, body").animate(
      {
        scrollTop: jQuery("#what-we-do").offset().top,
      },
      800
    );
  } else {
    jQuery("html, body").animate(
      {
        scrollTop:
          jQuery("#what-we-do").offset().top - jQuery("#header").height() + 200,
      },
      800
    );
  }
});
$(".footer-chatbot .form").scrollTop(
  $(".footer-chatbot .form")[0].scrollHeight -
    jQuery(".footer-chatbot .form>div:last").height() -
    jQuery(".footer-chatbot .user-inbox:last").height() -
    50
);
jQuery(".slider").slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  fade: false,
  // asNavFor: ".slider-nav",
});

jQuery(".slider-nav").slick({
  slidesToShow: 2,
  slidesToScroll: 1,
  asNavFor: ".slider",
  focusOnSelect: true,
});