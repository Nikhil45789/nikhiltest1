/*------------------------------custom.js-------------------- */

/*  Custom Javascript for baner video start */
jQuery(document).ready(function () {
  jQuery("[data-fancybox]").fancybox({
    type: "iframe",
    buttons: ["close"],
    padding: 10,
    protect: true,
    preventCaptionOverlap: true,
    helpers: {
      overlay: { closeClick: true },
    },
  });
  jQuery("[data-fancybox]").click(function () {
    jQuery("html").addClass("thr-fancy");
    jQuery(".fancybox-close,.fancybox-overlay").click(function () {
      jQuery("html").removeClass("thr-fancy");
    });
  });
  jQuery(".minicart-dropdown").click(function () {
    window.location.replace(jQuery(this).children("a").attr("href"));
  });
  jQuery(".tax-total th").text("GST (10%)");
  if (window.location.hash === "#about-us") {
    // URL has the #about-us parameter, scroll to it with a custom offset
    var customOffset = -125;
    jQuery("html, body").animate(
      { scrollTop: jQuery("#about-us").offset().top + customOffset },
      800
    );
  }
  if (window.location.hash === "#programs-page") {
    // URL has the #about-us parameter, scroll to it with a custom offset
    var customOffset = 550;
    jQuery("html, body").animate(
      { scrollTop: jQuery("#about-us").offset().top + customOffset },
      800
    );
  }

  jQuery(".student-menu .hfe-nav-menu-icon .fa-window-close").click(
    function () {
      // alert('student-menu-close');
      jQuery("html").toggleClass("student-menu-open");
    }
  );

  jQuery(".student-menu .hfe-nav-menu-icon").click(function () {
    // alert('student-menu-open');
    jQuery("html").toggleClass("student-menu-open");
  });
  jQuery(".header-menu .hfe-nav-menu-icon .fa-window-close").click(function () {
    // alert('student-menu-close');
    jQuery("html").toggleClass("header-menu-open");
  });

  jQuery(".header-menu .hfe-nav-menu-icon").click(function () {
    // alert('student-menu-open');
    jQuery("html").toggleClass("header-menu-open");
  });

  jQuery(".our-btn").click(function (e) {
    e.preventDefault();
    // jQuery('.Our-why-popup').show();
    jQuery(".Our-why-popup").removeClass("hidden");
    jQuery("html").addClass("Our-why");
  });
  jQuery(".why-close").click(function (e) {
    e.preventDefault();
    // jQuery('.Our-why-popup').show();
    jQuery(".Our-why-popup").addClass("hidden");
    jQuery("html").removeClass("Our-why");
  });
  jQuery(".Solution-close").click(function (e) {
    e.preventDefault();
    // jQuery('.Our-why-popup').show();
    jQuery(".solution-content").addClass("hidden");
    jQuery("html").removeClass("solustion-why");
  });
  jQuery(".Solution-btn").click(function (e) {
    e.preventDefault();

    jQuery(".solution-content").removeClass("hidden");
    jQuery("html").addClass("solustion-why");
  });

  jQuery(".who-are-close").click(function (e) {
    e.preventDefault();
    // jQuery('.Our-why-popup').show();
    jQuery(".who-are-content").addClass("hidden");
    jQuery("html").removeClass("who-are-u");
  });
  jQuery(".who-btn").click(function (e) {
    e.preventDefault();
    jQuery(".who-are-content").removeClass("hidden");
    jQuery("html").addClass("who-are-u");
  });

  // if (jQuery(window).width > 778) {
  //   var isVideoPlaying = false;

  //   setInterval(function () {
  //     var video = jQuery(".banner-video video").get(0);

  //     if (!video.paused) {
  //       if (!isVideoPlaying) {
  //         // Video started playing, update the flag and make changes
  //         isVideoPlaying = true;
  //         jQuery(".no-video-head").addClass("hidden");
  //         jQuery(".video-head").removeClass("hidden");
  //       }
  //     } else {
  //       if (isVideoPlaying) {
  //         // Video paused, update the flag and make changes
  //         isVideoPlaying = false;
  //         jQuery(".no-video-head").removeClass("hidden");
  //         jQuery(".video-head").addClass("hidden");
  //       }
  //     }
  //   }, 200);
  // }
  // else{
  //   setTimeout(function(){
  //     var isVideoPlaying = false;

  //     // setInterval(function () {
  //       var video = jQuery(".banner-video video").get(0);

  //       if (!video.paused) {
  //         if (!isVideoPlaying) {
  //           // Video started playing, update the flag and make changes
  //           isVideoPlaying = true;
  //           jQuery(".no-video-head").addClass("hidden");
  //           jQuery(".video-head").removeClass("hidden");
  //         }
  //       } else {
  //         if (isVideoPlaying) {
  //           // Video paused, update the flag and make changes
  //           isVideoPlaying = false;
  //           jQuery(".no-video-head").removeClass("hidden");
  //           jQuery(".video-head").addClass("hidden");
  //         }
  //       }

  //   },1000)
  //   // }, 200);
  // }
});
/*  Custom Javascript for baner video end */

jQuery(document).ready(function () {
  jQuery(".mute").on("click", function () {
    jQuery(".mute").toggleClass("unmute");
    if (jQuery(".elementor-video")[0].muted) {
      jQuery(".elementor-video")[0].muted = false;
    } else {
      jQuery(".elementor-video")[0].muted = true;
    }
  });

  jQuery(".toggle-password").click(function () {
    // toggle icon
    jQuery(this).toggleClass("eye-slash");
  });
  if (jQuery(".user_quiz_result").length > 0) {
    jQuery("body").addClass("Course-quiz-result");
  }
  /*  */
  jQuery(".course-status-right-wrap")
    .siblings(".course_timeline")
    .children("ul")
    .children(".section")
    .each(function () {
      jQuery(this).click(function () {
        if (jQuery(this).hasClass("sec-active")) {
          jQuery(this).removeClass("sec-active");
          var next1 = jQuery(this);
          while (next1.length) {
            next1 = next1.next();
            if (next1.hasClass("section")) {
              break;
            }

            next1.removeClass("visible");
          }
        } else {
          jQuery(this).addClass("sec-active");
          var next = jQuery(this);
          while (next.length) {
            next = next.next();
            if (next.hasClass("section")) {
              break;
            }

            next.addClass("visible");
          }
        }
        //   alert(nextindex);
      });
    });

  // jQuery('.course-status-right-wrap').siblings('.course_action_points').hide()
  jQuery(".days-remain span").text(jQuery(".course_time span").text());
  jQuery(".course_certificate").html(
    '<i class="icon-certificate-file"></i> ' + "Program certificate"
  );

  setInterval(function () {
    if (!jQuery("body.buddydrive .bread-edit").length) {
      if (jQuery("body.buddydrive #buddydrive-title-edit").length > 0) {
        jQuery("body.buddydrive .breadcrumb").append(
          '<li class="bread-edit">Edit Treatment Plans</li>'
        );
        jQuery("body.buddydrive #buddypress .page-title h1").text(
          "Edit Treatment Plans"
        );
      }
    }
    if (jQuery("body.buddydrive #buddydrive-title-edit").length == 0) {
      jQuery("body.buddydrive .bread-edit").remove();
      jQuery("body.buddydrive #buddypress .page-title h1").text(
        "My Treatment Plans"
      );
    }

    // setTimeout(function () {
    jQuery(document).on(
      "change",
      ".buddydrive-item-details input, .buddydrive-item-details textarea",
      function () {
        var data = jQuery(this).val();
        if (data === "") {
          jQuery(this).parent().removeClass("value_focus");
        } else {
          jQuery(this).parent().addClass("value_focus");
        }
      }
    );

    jQuery(".buddydrive-item-details input, .buddydrive-item-details textarea")
      .focusin(function () {
        jQuery(this).parent().addClass("input_focus");
      })
      .focusout(function () {
        jQuery(this).parent().removeClass("input_focus");
      });
    jQuery(
      ".buddydrive-item-details input, .buddydrive-item-details textarea"
    ).each(function () {
      var data = jQuery(this).val();
      if (data == "") {
        jQuery(this).parent().removeClass("value_focus");
      } else {
        jQuery(this).parent().addClass("value_focus");
      }
    });
    // }, 2000);
  }, 100);
  jQuery(document).ajaxComplete(function () {
    jQuery(".tax-total th").text("GST (10%)");
    if (!jQuery(".bookme-service-radio").length) {
      jQuery(".bookme-service").after('<div class="bookme-service-radio">');
    }
    var radio_html = "";
    jQuery(".bookme-service option").each(function () {
      var text = jQuery(this).text();
      radio_html +=
        '<div class="radio-wrap"><input type="radio" name="custom-service-radio"><label>' +
        text +
        "</label></div>";
    });
    jQuery(".bookme-service-radio").eq(0).html(radio_html);
    // var service_count=0;
    jQuery(".bookme-service-radio .radio-wrap").each(function () {
      jQuery(this)
        .children("input")
        .click(function () {
          var label = jQuery(this).siblings("label").text();
          jQuery(".bookme-service option").each(function () {
            if (jQuery(this).text() == label) {
              jQuery(this).prop("selected", true);
              jQuery(".bookme-service").trigger("change");
            }
          });
        });
    });
    var ajax_select = jQuery(".bookme-service").find(":selected").text();
    jQuery(".bookme-service-radio .radio-wrap").each(function () {
      if (jQuery(this).children("label").text() == ajax_select) {
        jQuery(this).children("input").prop("checked", true);
      }
    });
  });
  if (!jQuery(".bookme-service-radio").length) {
    jQuery(".bookme-service").after('<div class="bookme-service-radio">');
  }
  var radio_html = "";
  jQuery(".bookme-service option").each(function () {
    var text = jQuery(this).text();
    radio_html +=
      '<div class="radio-wrap"><input type="radio" name="custom-service-radio"><label>' +
      text +
      "</label></div>";
  });
  jQuery(".bookme-service-radio").eq(0).html(radio_html);
  // var service_count=0;
  jQuery(".bookme-service-radio .radio-wrap").each(function () {
    jQuery(this)
      .children("input")
      .click(function () {
        var label = jQuery(this).siblings("label").text();
        jQuery(".bookme-service option").each(function () {
          if (jQuery(this).text() == label) {
            jQuery(this).prop("selected", true);
            jQuery(".bookme-service").trigger("change");
          }
        });
      });
  });

  jQuery(".drag-drop-info").next("p").addClass("drag-drop-or");
  jQuery(".pagination-custom a.prev.page-numbers").text("Previous");
  jQuery(".pagination-custom a.next.page-numbers").text("Next");
  jQuery(".single-course .program-details-1 #home a").text("OVERVIEW");
  jQuery(".single-course .program-details-1 #curriculum a").text("PROGRAM");

  jQuery(
    "#item-header-avatar #subnav ul li#change-avatar-personal-li a#change-avatar"
  ).text("Edit Photo");
  jQuery("#item-header-avatar #subnav ul li#edit-personal-li").remove();
  jQuery("#item-header-avatar #subnav ul li#public-personal-li").remove();

  jQuery(
    "#item-body .profile #subnav ul li#change-avatar-personal-li a#change-avatar"
  ).remove();

  jQuery("#item-body .profile #subnav ul li#edit-personal-li a#edit").text(
    "Edit Profile"
  );
  jQuery("#item-body .profile #subnav ul li#public-personal-li").remove();
  jQuery(".THR-pop-title").each(function () {
    jQuery(".THR-pop-title").click(function () {
      jQuery(".thr-library-popup-main-wrap").hide();
      jQuery(".thr-popup-main-wrap").each(function () {
        jQuery(this).hide();
      });
      var postid = jQuery(this).children(".THR-Library-h2").attr("post-id");
      // alert(postid)
      jQuery(".thr-library-popup-main-wrap").show();
      jQuery(".thr-popup-main-wrap[post-id=" + postid + "]").show();
      jQuery("html").addClass("raj");
      jQuery(this).addClass("active");
    });
  });
  jQuery(".thr-popup-close").click(function () {
    jQuery("html").removeClass("raj");
    jQuery(".thr-library-popup-main-wrap").hide();
    jQuery(".thr-popup-main-wrap").each(function () {
      jQuery(this).hide();
    });
  });
  //   jQuery('ul.profile-fields li.name').each(function(){
  //     jQuery(this).click(function(){

  //         window.open(jQuery(this).siblings('.value').text(), '_blank')
  //     })
  // })
  // /*----------------------------------------------- */
  jQuery(".hfe-search-form__input").attr("placeholder", "Search");
  jQuery("#submit").attr("value", "Submit");
  /*--------------------------------comment--------------------*/
  jQuery(".comment-body-content").each(function () {
    var commentText = jQuery(this).find(".comment-text");
    var replyLink = jQuery(this).find(".comment-reply-link");

    commentText.insertBefore(replyLink);
  });
  /*----------------------value-focus-validate---------------------- */
  jQuery(document).on(
    "change",
    "#commentform input, #commentform textarea",
    function () {
      var data = jQuery(this).val();
      if (data == "") {
        jQuery(this).parent().removeClass("value_focus");
      } else {
        jQuery(this).parent().addClass("value_focus");
      }
    }
  );

  jQuery("#commentform input, #commentform textarea")
    .focusin(function () {
      jQuery(this).parent().addClass("input_focus");
    })
    .focusout(function () {
      jQuery(this).parent().removeClass("input_focus");
    });

  jQuery(".single-course .widget.pricing .add_to_cart_inline").removeAttr(
    "style"
  );
  if (jQuery("body.single-course").length) {
    jQuery("span.woocommerce-Price-amount").eq(0).remove();
  }

  function addValueFocus() {
    jQuery(
      "#profile-edit-form input, #profile-edit-form textarea , #send_message_form input, #send_message_form textarea"
    ).each(function () {
      if (jQuery(this).val() !== "") {
        jQuery(this).parent().addClass("value_focus");
      }
    });
  }

  // Initial call to addValueFocus after the page loads
  addValueFocus();

  // Attach a change event to handle changes
  jQuery(document).on(
    "change",
    "#profile-edit-form input, #profile-edit-form textarea , #send_message_form input, #send_message_form textarea , .buddydrive-item-details input, .buddydrive-item-details textarea",
    function () {
      var data = jQuery(this).val();
      if (data === "") {
        jQuery(this).parent().removeClass("value_focus");
      } else {
        jQuery(this).parent().addClass("value_focus");
      }
    }
  );

  jQuery(
    "#profile-edit-form input, #profile-edit-form textarea ,#send_message_form input, #send_message_form textarea , .buddydrive-item-details input, .buddydrive-item-details textarea"
  )
    .focusin(function () {
      jQuery(this).parent().addClass("input_focus");
    })
    .focusout(function () {
      jQuery(this).parent().removeClass("input_focus");
    });
  /*---------------------comment form validation--------------*/
  jQuery("#submit").click(function (e) {
    jQuery(".custom-error").remove();
    jQuery(".all-class").remove();
    var sub_firstname = jQuery("#author").val();
    var sub_email = jQuery("#email").val();
    var sub_message = jQuery("#comment").val();

    if (sub_firstname == "" || sub_email == "" || sub_message == "") {
      if (sub_firstname == "") {
        jQuery("#author").after(
          "<div class='all-class'>This field is required.</div>"
        );
        jQuery("#author").addClass("smart-error");
        e.preventDefault();
      } else {
        jQuery("#author").removeClass("smart-error");
      }

      if (sub_email == "") {
        jQuery("#email").after(
          "<div class='all-class'>This field is required.</div>"
        );
        jQuery("#email").addClass("smart-error");
        e.preventDefault();
      } else {
        jQuery("#email").removeClass("smart-error");
      }

      if (sub_message == "") {
        jQuery("#comment").after(
          "<div class='all-class'>This field is required.</div>"
        );
        jQuery("#comment").addClass("smart-error");
        e.preventDefault();
      } else {
        jQuery("#comment").removeClass("smart-error");
      }
      jQuery(".custom-error").remove();

      jQuery(".comment-form").after(
        "<div class='all-class blog-error' >One or more fields have an error. Please check and try again.</div>"
      );
      jQuery(".custom-error").show();
    }
    if (sub_email != "") {
      if (validateEmail(sub_email)) {
        jQuery("#emailcustome").remove();
        jQuery("#email").removeClass("smart-error");
      } else {
        jQuery("#email").after(
          '<div for="email" id="emailcustome" class="error-smart all-class">Please enter a valid email address.</div>'
        );
        jQuery(".custom-error").show();

        jQuery("#email").addClass("smart-error");
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
  /*----------------------end-validate---------------------- */
  /*----------------------value-focus-validate---------------------- */
  jQuery(document).on(
    "change",
    " #commentform input #commentform textarea  ",
    function () {
      if (data == "") {
        var data = jQuery(this).val();
        if (data == "") {
          jQuery(this).parent().removeClass("value_focus");
        } else {
          jQuery(this).parent().addClass("value_focus");
        }
      } else {
        if (data == "") {
          jQuery(this).parent().removeClass("value_focus");
        } else {
          jQuery(this).parent().addClass("value_focus");
        }
      }
    }
  );
  jQuery(" #commentform input #commentform textarea ")
    .focusin(function () {
      jQuery(this).parent().addClass("input_focus");
    })
    .focusout(function () {
      jQuery(this).parents().removeClass("input_focus");
    });
  /********************************************************************************************** */
  jQuery(document).on(
    "change",
    " .woocommerce-edit-address form  input ,.woocommerce-edit-address form  textarea ",
    function () {
      if (data == "") {
        var data = jQuery(this).val();
        if (data == "") {
          jQuery(this).parent().parent().removeClass("value_focus");
        } else {
          jQuery(this).parent().parent().addClass("value_focus");
        }
      } else {
        if (data == "") {
          jQuery(this).parent().parent().removeClass("value_focus");
        } else {
          jQuery(this).parent().parent().addClass("value_focus");
        }
      }
    }
  );
  jQuery(
    ".woocommerce-edit-address form  input ,.woocommerce-edit-address form  textarea "
  )
    .focusin(function () {
      jQuery(this).parent().parent().addClass("input_focus");
    })
    .focusout(function () {
      jQuery(this).parents().parent().removeClass("input_focus");
    });

  /************************************************************************************************* */
  var pop = jQuery.cookie("home-pop");
  if (pop != 1) {
    setTimeout(function () {
      jQuery("html").addClass("home-popup");
      jQuery(".subscribe-wrap").show();
      jQuery.cookie("home-pop", 1);
    }, 5000);
  }

  jQuery(".close-popup-btn").click(function (e) {
    e.preventDefault();
    jQuery(".popup-main-wrap").hide();
    jQuery(".subscribe-wrap").hide();
    jQuery("html").removeClass("home-popup");
    jQuery("html").removeClass("our-popup");
    jQuery("html").removeClass("Indi-popup");
  });
  jQuery(".new-class").click(function () {
    jQuery(".Individual-popup").show();
    jQuery("html").addClass("Indi-popup");
  });
  jQuery(".please-click").click(function (e) {
    e.preventDefault();
    jQuery("html").addClass("home-popup");
    jQuery(".our-programmer-popup").show();
  });
  jQuery(".login-close-popup").click(function (e) {
    e.preventDefault();
    jQuery("html").removeClass("login-popup");
    jQuery(".login-password").hide();
  });
  jQuery(".lost-close-popup").click(function (e) {
    e.preventDefault();
    jQuery("html").removeClass("lost-popup");
    jQuery(".lost-password").hide();
  });
  jQuery(".lost_password").click(function (e) {
    e.preventDefault();
    jQuery("html").removeClass("login-popup");
    jQuery("html").addClass("lost-popup");
    jQuery(".login-password").hide();
    jQuery(".lost-password").show();
  });
  jQuery(".header-login").click(function (e) {
    e.preventDefault();
    jQuery("html").addClass("login-popup");
    jQuery(".login-password").show();
  });
  jQuery(
    ".woocommerce-orders #page #title .container .row .col-md-12 .pagetitle h1"
  ).text("My Orders");
  jQuery(
    ".woocommerce-edit-address #page #title .container .row .col-md-12 .pagetitle h1"
  ).text("My Addresses");

  jQuery(".menu-login-btn").click(function (e) {
    e.preventDefault();
    jQuery("html").addClass("login-popup");
    jQuery(".login-password").show();
  });

  jQuery(
    '.newletter-form .mc4wp-form .mc4wp-form-fields .submit-btn input[type="submit"]'
  ).attr("value", "SUBSCRIBE");

  jQuery(".close-popup-btn").click(function () {
    jQuery('input[type="text"], input[type="email"]').removeClass(
      "smart-error"
    );
    jQuery("div.all-class").remove();
  });
  jQuery(".close-popup-btn").click(function () {
    jQuery(".wpcf7-form-control").removeClass(" wpcf7-not-valid");
    jQuery("span.wpcf7-not-valid-tip").remove();
  });
  var pathname = window.location.pathname;

  // Check if the pathname contains "individual-programs" or "about-us"
  if (
    pathname.indexOf("individual-programs") !== -1 ||
    pathname.indexOf("corporate-program") !== -1
  ) {
    // Add the class to the element with the specified ID
    jQuery("#menu-1-c2eb173 #menu-item-40").addClass("current-menu-item");
    jQuery("#menu-1-6d308a8 #menu-item-40").addClass("current-menu-item");
  } else if (pathname.indexOf("our-credentials") !== -1) {
    jQuery("#menu-1-c2eb173 #menu-item-39").addClass("current-menu-item");
    jQuery("#menu-1-6d308a8 #menu-item-39").addClass("current-menu-item");
  } else if (pathname.indexOf("category") !== -1) {
    jQuery("#menu-1-c2eb173 #menu-item-41").addClass("current-menu-item");
    jQuery("#menu-1-6d308a8 #menu-item-41").addClass("current-menu-item");
  } else if (pathname.indexOf("blog") !== -1) {
    jQuery("#menu-1-c2eb173 #menu-item-41").addClass("current-menu-item");
    jQuery("#menu-1-6d308a8 #menu-item-41").addClass("current-menu-item");
  }

  if (jQuery("body").hasClass("single-post")) {
    jQuery("#menu-1-c2eb173 #menu-item-41").addClass("current-menu-item");
    jQuery("#menu-1-6d308a8 #menu-item-41").addClass("current-menu-item");
  }

  jQuery(".show-more-button").click(function () {
    jQuery(".show-more-button").hide();
    jQuery(".hidden").show();
  });
  jQuery(".testimonial-container").owlCarousel({
    loop: true,
    margin: 28,
    nav: true,
    dote: true,
    autoplay: true,
    autoplayTimeout: 7000,
    autoplayHoverPause: false,
    responsive: {
      0: {
        items: 1,
      },
      600: {
        items: 2,
      },
      1000: {
        items: 3,
      },
    },
  });

  if (jQuery(window).width() <= 768) {
    // alert("window 768");
    jQuery("#sbi_images").addClass("instagram-moblie-view-image owl-carousel");

    // console.log('working Window=786');
    jQuery(".instagram-moblie-view-image").owlCarousel({
      loop: true,
      margin: 10,
      nav: true,
      responsive: {
        0: {
          items: 2,
        },
      },
    });
  }

  jQuery(".post-container").owlCarousel({
    loop: true,
    margin: 38,
    nav: true,
    responsive: {
      0: {
        items: 1,
      },
      768: {
        items: 3,
      },
      1100: {
        items: 4,
      },
    },
  });

  jQuery(".hfe-nav-menu-icon").click(function () {
    jQuery("html").toggleClass("no-scroll");
  });

  // Handle the click event for the .btn-top
  jQuery(".btn-top").click(function (e) {
    e.preventDefault();
    // Scroll to the top of the page with a smooth animation
    jQuery("html, body").animate({ scrollTop: 0 }, "slow");
  });

  /*-------------------------footer------------------------------------- */

  jQuery("#mc4wp-form-1, #mc4wp-form-2").submit(function (event) {
    event.preventDefault();

    var formId = jQuery(this).attr("id"); // Get the ID of the submitted form
    var firstName = jQuery("#" + formId + " .fname").val();
    var lastName = jQuery("#" + formId + " .lname").val();
    var email = jQuery("#" + formId + " .email").val();
    var emailRegex = /^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/;

    // Reset error classes and messages for the current form
    jQuery("#" + formId + " .all-class").remove();
    jQuery("#" + formId + " .fname").removeClass("smart-error");
    jQuery("#" + formId + " .lname").removeClass("smart-error");
    jQuery("#" + formId + " .email").removeClass("smart-error");

    var hasErrors = false;

    if (firstName === "") {
      jQuery("#" + formId + " .fname").after(
        "<div class='all-class'>This field is required.</div>"
      );
      jQuery("#" + formId + " .fname").addClass("smart-error");
      hasErrors = true;
    }

    if (lastName === "") {
      jQuery("#" + formId + " .lname").after(
        "<div class='all-class'>This field is required.</div>"
      );
      jQuery("#" + formId + " .lname").addClass("smart-error");
      hasErrors = true;
    }

    if (email === "") {
      jQuery("#" + formId + " .email").after(
        "<div class='all-class'>This field is required.</div>"
      );
      jQuery("#" + formId + " .email").addClass("smart-error");
      hasErrors = true;
    } else if (!emailRegex.test(email)) {
      jQuery("#" + formId + " .email").after(
        '<div for="email" class="error-smart all-class">Please enter a valid email address.</div>'
      );
      jQuery("#" + formId + " .email").addClass("smart-error");
      hasErrors = true;
    }

    if (hasErrors) {
      // Display a single error message for the form
      jQuery("#" + formId).append(
        "<div class='all-class'>One or more fields have an error. Please check and try again.</div>"
      );
    } else {
      // If there are no errors for the current form, submit it
      jQuery("#" + formId)
        .off("submit")
        .submit();
    }
  });

  jQuery(
    "input[name='frsttname'], input[name='lastname'], input[name='EMAIL']"
  ).focus(function () {
    jQuery(this).removeClass("smart-error");
    jQuery(this).siblings(".all-class").remove();
  });
  /*--------------------------------------------------------------------------- */
  jQuery(".edit-account-form").submit(function (event) {
    // Reset any previous error messages
    jQuery(".error-message").remove();

    // Get the values of the fields
    var shippingFirstName = jQuery("#shipping_first_name").val().trim();
    var shippingLastName = jQuery("#shipping_last_name").val().trim();
    var shippingAddress1 = jQuery("#shipping_address_1").val().trim();
    var shippingCity = jQuery("#shipping_city").val().trim();
    var shippingPostcode = jQuery("#shipping_postcode").val().trim();

    var shippingCountry = jQuery("#shipping_country").val();

    // Define a flag to track validation status
    var isValid = true;

    // Custom validation for Shipping First Name
    if (shippingFirstName === "") {
      jQuery("#shipping_first_name_field").append(
        '<span class="all-class">This field is required.</span>'
      );
      isValid = false;
      jQuery("#shipping_first_name_field").addClass("smart-error");
    }

    // Custom validation for Shipping Last Name
    if (shippingLastName === "") {
      jQuery("#shipping_last_name_field").append(
        '<span class="all-class">This field is required.</span>'
      );
      isValid = false;
      jQuery("#shipping_last_name_field").addClass("smart-error");
    }

    // Custom validation for Shipping Address
    if (shippingAddress1 === "") {
      jQuery("#shipping_address_1_field").append(
        '<span class="all-class">This field is required.</span>'
      );
      isValid = false;
      jQuery("#shipping_address_1_field").addClass("smart-error");
    }

    // Custom validation for Shipping City
    if (shippingCity === "") {
      jQuery("#shipping_city_field").append(
        '<span class="all-class">This field is required.</span>'
      );
      jQuery("#shipping_city_field").addClass("smart-error");
      isValid = false;
    }

    // Custom validation for Shipping Postcode
    if (shippingPostcode === "") {
      jQuery("#shipping_postcode_field").append(
        '<span class="all-class">This field is required.</span>'
      );
      jQuery("#shipping_postcode_field").addClass("smart-error");
      isValid = false;
    }

    // Custom validation for Shipping Country / Region
    if (shippingCountry === "") {
      jQuery("#shipping_country_field").append(
        '<span class="all-class">This field is required.</span>'
      );
      jQuery("#shipping_country_field").addClass("smart-error");
      isValid = false;
    }
    // If any validation fails, prevent the form submission
    if (!isValid) {
      event.preventDefault();
    }
  }); /*------------------------------------------------ */
  jQuery('[name="save_address"]').click(function (event) {
    console.log("Working");
    jQuery(".all-class").remove();
    var billingFirstName = jQuery("#billing_first_name").val().trim();
    var billingLastName = jQuery("#billing_last_name").val().trim();
    var billingAddress1 = jQuery("#billing_address_1").val().trim();
    var billingCity = jQuery("#billing_city").val().trim();
    var billingPostcode = jQuery("#billing_postcode").val().trim();
    var billingPhone = jQuery("#billing_phone").val().trim();
    var billingEmail = jQuery("#billing_email").val().trim();
    var billingCountry = jQuery("#billing_country").val();

    var isValid = true;

    if (billingFirstName === "") {
      jQuery("#billing_first_name_field").append(
        '<span class="all-class">This field is required.</span>'
      );
      jQuery("#billing_first_name_field").addClass("smart-error");

      isValid = false;
    }

    // Custom validation for Billing Last Name
    if (billingLastName === "") {
      jQuery("#billing_last_name_field").append(
        '<span class="all-class">This field is required.</span>'
      );
      jQuery("#billing_last_name_field").addClass("smart-error");

      isValid = false;
    }

    // Custom validation for Billing Address
    if (billingAddress1 === "") {
      jQuery("#billing_address_1_field").append(
        '<span class="all-class">This field is required.</span>'
      );
      jQuery("#billing_address_1_field").addClass("smart-error");
      isValid = false;
    }

    // Custom validation for Billing City
    if (billingCity === "") {
      jQuery("#billing_city_field").append(
        '<span class="all-class">This field is required.</span>'
      );
      jQuery("#billing_city_field").addClass("smart-error");
      isValid = false;
    }

    // Custom validation for Billing Postcode
    if (billingPostcode === "") {
      jQuery("#billing_postcode_field").append(
        '<span class="all-class">This field is required.</span>'
      );
      jQuery("#billing_postcode_field").addClass("smart-error");
      isValid = false;
    }

    // Custom validation for Billing Phone
    if (billingPhone === "") {
      jQuery("#billing_phone_field").append(
        '<span class="all-class">This field is required.</span>'
      );
      jQuery("#billing_phone_field").addClass("smart-error");
      isValid = false;
    }

    // Custom validation for Billing Email
    if (billingEmail === "" || !isValidEmail(billingEmail)) {
      jQuery("#billing_email_field").append(
        '<span class="all-class">This field is required.</span>'
      );
      jQuery("#billing_email_field").addClass("smart-error");
      isValid = false;
    }

    // Custom validation for Billing Country / Region
    if (billingCountry === "") {
      jQuery("#billing_country_field").append(
        '<span class="all-class">This field is required.</span>'
      );
      jQuery("#billing_country_field").addClass("smart-error");
      isValid = false;
    }
    // If any validation fails, prevent the form submission
    if (!isValid) {
      event.preventDefault();
    }
  });

  /* ----------------------------------------*/
  jQuery('[name="save_account_details"]').click(function (event) {
    // Prevent the default form submission behavior
    event.preventDefault();

    // Remove any previous error messages
    jQuery(".all-class").remove();

    // Get the values of the fields
    var billingFirstName = jQuery("#account_first_name").val().trim();
    var billingLastName = jQuery("#account_last_name").val().trim();
    var billingAddress1 = jQuery("#account_display_name").val().trim();
    var billingEmail = jQuery("#account_email").val().trim();

    var isValid = true;

    if (billingFirstName === "") {
      jQuery("#account_first_name").after(
        '<span class="all-class">This field is required.</span>'
      );
      isValid = false;
    }

    if (billingLastName === "") {
      jQuery("#account_last_name").after(
        '<span class="all-class">This field is required.</span>'
      );
      isValid = false;
    }

    if (billingAddress1 === "") {
      jQuery("#account_display_name").after(
        '<span class="all-class">This field is required.</span>'
      );
      isValid = false;
    }

    if (billingEmail === "" || !isValidEmail(billingEmail)) {
      jQuery("#account_email").after(
        '<span class="all-class">Valid email is required</span>'
      );
      isValid = false;
    }

    if (!isValid) {
      return;
    }
  });

  function isValidEmail(email) {
    var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    return emailPattern.test(email);
  }
  /*------------------------------------------ */

  jQuery('[value="Reset password"]').on("click", function (e) {
    jQuery(".all-class").remove();
    var username = jQuery("#user_login").val();

    if (username == "") {
      if (username == "") {
        jQuery("#user_login").after(
          "<div class='all-class'>This field is required.</div>"
        );
        jQuery("#user_login").addClass("error");
        e.preventDefault();
      } else {
        jQuery("#user_login").removeClass("error");
      }

      jQuery(".custom-error").remove();

      jQuery(".forgot-pass-btn")
        .parent()
        .after(
          "<div class='validation custom-error' >One or more fields have an error. Please check and try again.</div>"
        );
      jQuery(".custom-error").show();
    }
    if (username != "") {
      if (validateEmail(username)) {
        jQuery("#emailcustome").remove();
        jQuery("#user_login").removeClass("error");
      } else {
        jQuery("#user_login").after(
          '<div for="email" id="emailcustome" class="error-smart all-class">Please enter a valid email address.</div>'
        );
        jQuery("#user_login").addClass("error");
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

  /*--------------------------------------------*/
  jQuery(document).on(
    "change",
    " #mc4wp-form-1 input ,#mc4wp-form-2 input  ",
    function () {
      if (data == "") {
        var data = jQuery(this).val();
        if (data == "") {
          jQuery(this).parent().removeClass("value_focus");
        } else {
          jQuery(this).parent().addClass("value_focus");
        }
      } else {
        if (data == "") {
          jQuery(this).parent().removeClass("value_focus");
        } else {
          jQuery(this).parent().addClass("value_focus");
        }
      }
    }
  );
  jQuery(" #mc4wp-form-1 input ,#mc4wp-form-2 input ")
    .focusin(function () {
      jQuery(this).parent().addClass("input_focus");
    })
    .focusout(function () {
      jQuery(this).parents().removeClass("input_focus");
    });
  /************************************************************************* */
  jQuery(document).on(
    "change",
    ".woocommerce-EditAccountForm  input ",
    function () {
      if (data == "") {
        var data = jQuery(this).val();
        if (data == "") {
          jQuery(this).parent().removeClass("value_focus");
        } else {
          jQuery(this).parent().addClass("value_focus");
        }
      } else {
        if (data == "") {
          jQuery(this).parent().removeClass("value_focus");
        } else {
          jQuery(this).parent().addClass("value_focus");
        }
      }
    }
  );
  jQuery(".woocommerce-EditAccountForm  input")
    .focusin(function () {
      jQuery(this).parent().addClass("input_focus");
    })
    .focusout(function () {
      jQuery(this).parents().removeClass("input_focus");
    });
  /***************************login value ---------------------------- */
  jQuery(document).on(
    "change",
    ".login input,.lost-pass-wrap .lost_reset_password input",
    function () {
      var data = jQuery(this).val();
      if (data === "") {
        jQuery(this).parent().removeClass("value_focus");
      } else {
        jQuery(this).parent().addClass("value_focus");
      }
    }
  );
  jQuery(" .login input,.lost-pass-wrap .lost_reset_password input")
    .focusin(function () {
      jQuery(this).parent().addClass("input_focus");
    })
    .focusout(function () {
      jQuery(this).parents().removeClass("input_focus");
    });
  jQuery(".lost_reset_password input")
    .focusin(function () {
      jQuery(this).parent().parent().addClass("input_focus");
    })
    .focusout(function () {
      if (jQuery(this).val() == "") {
        jQuery(this).parents().parent().removeClass("input_focus");
      }
    });
  /*--------------------Check out ------------- */
  jQuery(document).on(
    "change",
    ".woocommerce-checkout input ,.woocommerce-checkout textarea ",
    function () {
      if (data == "") {
        var data = jQuery(this).val();
        if (data == "") {
          jQuery(this).parent().parent().removeClass("value_focus");
        } else {
          jQuery(this).parent().parent().addClass("value_focus");
        }
      } else {
        if (data == "") {
          jQuery(this).parent().parent().removeClass("value_focus");
        } else {
          jQuery(this).parent().parent().addClass("value_focus");
        }
      }
    }
  );
  jQuery(".woocommerce-checkout input , .woocommerce-checkout textarea").each(
    function () {
      var data = jQuery(this).val();
      if (data == "") {
        jQuery(this).parent().parent().removeClass("value_focus");
      } else {
        jQuery(this).parent().parent().addClass("value_focus");
      }
    }
  );
  jQuery(".woocommerce-checkout input ")
    .focusin(function () {
      jQuery(this).parent().parent().addClass("input_focus");
    })
    .focusout(function () {
      jQuery(this).parents().parent().removeClass("input_focus");
    });
  // --------------------------------------Blog page-------------------------------------
  jQuery(document).on("change", " .wp-block-search input ", function () {
    if (data == "") {
      var data = jQuery(this).val();
      if (data == "") {
        jQuery(this).parent().parent().removeClass("value_focus");
      } else {
        jQuery(this).parent().parent().addClass("value_focus");
      }
    } else {
      if (data == "") {
        jQuery(this).parent().parent().removeClass("value_focus");
      } else {
        jQuery(this).parent().parent().addClass("value_focus");
      }
    }
  });
  jQuery(".wp-block-search input")
    .focusin(function () {
      jQuery(this).parent().parent().addClass("input_focus");
    })
    .focusout(function () {
      jQuery(this).parents().parent().removeClass("input_focus");
    });

  if (jQuery("body").hasClass("search")) {
    jQuery(".wp-block-search").addClass("value_focus");
  }

  if (
    window.location.pathname.split("/")[1] == "suplements-2" ||
    window.location.pathname.split("/")[2] == "suplements-2"
  ) {
    jQuery("body").addClass("suplememnt-page");
  }

  /*----------------------search button validation--------------*/
  jQuery(".wp-block-search .wp-block-search__button").click(function (e) {
    if (jQuery(".wp-block-search .wp-block-search__input").val() == "") {
      e.preventDefault();
      jQuery(".wp-block-search .wp-block-search__input").addClass(
        ".smart-error"
      );
      if (jQuery(".wp-block-search").find(".smart-error").length == 0) {
        jQuery(".wp-block-search").append(
          "<p class='all-class'>This field required</p>"
        );
      }
    }
  });
  /*------------------------------------------login from-------------------------------- */
  var login = false;
  jQuery(".login button").on("click", function (e) {
    jQuery(".all-class").remove();
    jQuery(".all-class1").remove();
    jQuery(".woocommerce-notices-wrapper").remove();
    jQuery("#reg_email").removeClass("error");
    jQuery("#reg_billing_first_name").removeClass("error");
    jQuery("#reg_billing_last_name").removeClass("error");
    jQuery("#reg_username").removeClass("error");
    jQuery("#reg_password").removeClass("error");
    jQuery("#reg_password2").removeClass("error");
    var username = jQuery("#username").val();
    var password = jQuery("#password").val();
    if (username == "" || password == "") {
      if (username == "") {
        jQuery("#username").after(
          "<div class='all-class'>This field is required.</div>"
        );
        jQuery("#username").addClass("error");
        e.preventDefault();
        //console.log("test");
      } else {
        jQuery("#username").removeClass("error");
      }

      if (password == "") {
        jQuery("#password").after(
          "<div class='all-class'>This field is required.</div>"
        );
        jQuery("#password").addClass("error");
        e.preventDefault();
        //console.log("test");
      } else if (password.length < 8) {
        jQuery("#password").after(
          "<div class='all-class'>This field is required minimum 8 character.</div>"
        );
        jQuery("#password").addClass("error");
        e.preventDefault();
        //console.log("test");
      } else {
        jQuery("#password").removeClass("error");
      }
      jQuery(".custom-error").remove();

      jQuery(".mo-openid-app-icons").after(
        "<div class='validation custom-error' >One or more fields have an error. Please check and try again.</div>"
      );
      jQuery(".custom-error").show();
      //setTimeout(function() { jQuery(".custom-error").hide(); }, 10000);
    } else if (password.length < 8) {
      jQuery("#password").after(
        "<div class='all-class'>This field is required minimum 8 character.</div>"
      );
      jQuery("#password").addClass("error");
      e.preventDefault();
      //console.log("test");
    } else if (password.length >= 8 && username != "") {
      if (!login) {
        e.preventDefault();
      }

      jQuery.ajax({
        type: "POST",

        url: "https://thehealthreflex.webmasterindia.net/beta/wp-admin/admin-ajax.php",
        data: {
          action: "ajaxlogin", //calls wp_ajax_nopriv_ajaxlogin
          username: username,
          password: password,
        },
        success: function (data) {
          if (data == "true") {
            let currentURL = window.location.pathname;
            var current = currentURL.split("/");
            login = true;
            if (current[1] == "beta") {
              window.location.replace(
                "https://" + window.location.host + "/beta/members/" + username
              );
            } else {
              window.location.replace(
                "https://" + window.location.host + "/members/" + username
              );
            }
          } else {
            jQuery("#password").after(
              "<div class='all-class'>Invalid Username or Password</div>"
            );
            jQuery("#password").addClass("error");
          }
        },
      });
    }
  });
  jQuery("#corporate-12").eq(0).remove();

  /*---------------------------value focus --------------------------------------- */
  jQuery(document).on(
    "change",
    ".wpcf7-form input,.wpcf7-form textarea ,.wpcf7-form select ",
    function () {
      if (data == "") {
        var data = jQuery(this).val();
        if (data == "") {
          jQuery(this).parent().parent().removeClass("value_focus");
        } else {
          jQuery(this).parent().parent().addClass("value_focus");
        }
      } else {
        if (data == "") {
          jQuery(this).parent().parent().removeClass("value_focus");
        } else {
          jQuery(this).parent().parent().addClass("value_focus");
        }
      }
    }
  );
  jQuery(".wpcf7-form input,.wpcf7-form textarea, .wpcf7-form select ")
    .focusin(function () {
      jQuery(this).parent().parent().addClass("input_focus");
    })
    .focusout(function () {
      jQuery(this).parents().parent().removeClass("input_focus");
    });

  document.addEventListener(
    "wpcf7mailsent",
    function (event) {
      jQuery(".wpcf7-response-output").addClass("success-msg");
      jQuery(".contact-form div").removeClass("value_focus");
      jQuery(
        "form select,.wpcf7-textarea,  .wpcf7-form input[type='text'],.wpcf7-form input[type='email'],.wpcf7-form input[type='number'] ,.wpcf7-form input[type='tel']"
      )
        .parent()
        .parent()
        .removeClass("value_focus");
    },
    false
  );

  // if (jQuery('body').hasClass('woocommerce-checkout')) {
  // Find the billing_address_1 input field and remove the placeholder attribute
  // }
  // /*--------------------------------------------*/
  jQuery(".addtoany_share").click(function () {
    jQuery("html").addClass("no-scroll");
  });
  jQuery(".a2a_overlay").click(function () {
    jQuery("html").removeClass("no-scroll");
  });
  /*-----------------------------------------*/
  jQuery(".rpwwt-widget .widget_title").addClass("article-btn");
  if (jQuery(window).width() < 786) {
    var button = jQuery("<button>", {
      type: "button",
      text: "Open",
      class: "plus-button",
    });
    jQuery(".article-btn").after(button);

    /* ----------------------0 */

    jQuery(".articles-list").hide();
    jQuery(".plus-button").click(function () {
      jQuery(".articles-list").slideToggle();
      jQuery(this).toggleClass("close");
    });
  }

  jQuery("#categories-2 .widget_title").addClass("cat-btn");
  if (jQuery(window).width() < 786) {
    var button = jQuery("<button>", {
      type: "button",
      text: "open",
      class: "plus-btn",
    });
    jQuery(".cat-btn").after(button);

    jQuery(".widget_categories ul").hide();
    jQuery(".plus-btn").click(function () {
      jQuery(".widget_categories ul").slideToggle();
      jQuery(this).toggleClass("close");
    });
  }

  /*----------------------------- */
  //   if(jQuery('.course_button').text()=='Apply for Course'){
  //     jQuery('.course_button').addClass('hidden')
  // }else{
  //     jQuery('.course_button').removeClass('hidden')
  // }
  // if(jQuery('.course_button').val()=="CONTINUE COURSE"){
  //   jQuery('.add_to_cart_inline ').remove()
  //   }

  //   if(jQuery('.course_button').val()=="START COURSE"){
  //     jQuery('.add_to_cart_inline ').remove()
  //   }
  /*-----------------------insert--------------------*/
  jQuery(".rpwwt-widget").each(function () {
    var plusbtn = jQuery(this).find(".plus-button");
    var sidetitle = jQuery(this).find(".widget_title span");
    plusbtn.insertAfter(sidetitle);
  });

  jQuery(".widget_categories").each(function () {
    var catbtn = jQuery(this).find(".plus-btn");
    var cattitle = jQuery(this).find(".cat-btn span");
    catbtn.insertAfter(cattitle);
  });
  jQuery(".single-course .widget.pricing .add_to_cart_button").text(
    "Apply Now"
  );

  // jQuery('.woocommerce-Price-amount.amount').each(function () {
  //   if (jQuery(this).index() > 1) {
  //     jQuery(this).remove()
  //   }
  // })

  jQuery(
    "#billing_country_field , #billing_state_field , #shipping_country_field , #shipping_state_field"
  ).addClass("value_focus");
  jQuery(
    "#billing_country_field , #billing_state_field , #shipping_country_field , #shipping_state_field"
  ).addClass("comon-select");
  // jQuery('#billing_country_field , #billing_state_field , #shipping_country , #shipping_state').addClass('comon-select');
  jQuery("#billing_address_1 ,#shipping_address_1 ").removeAttr("placeholder");

  if (jQuery("body.single-course .widget.pricing .course_button").val() != "") {
    jQuery("body.single-course .widget.pricing .add_to_cart_inline").hide();
  } else {
    if (
      jQuery(
        "body.single-course .widget.pricing .course_price strong"
      ).text() != "FREE"
    ) {
      jQuery("body.single-course .widget.pricing .course_button").hide();
    }
  }
  jQuery(".program-product .ajax_add_to_cart").text("BUY PROGRAM");
});

jQuery(document).on("ajaxComplete", function () {
  if (
    jQuery(".single-course .widget.pricing .added_to_cart").length ||
    jQuery(".program-product .ajax_add_to_cart.added").length ||
    jQuery(".Corporate-buy-now .ajax_add_to_cart.added").length
  ) {
    jQuery(".program-product .add_to_cart_inline").hide();
    jQuery(".single-course .add_to_cart_inline").hide();
    jQuery(".Corporate-buy-now .add_to_cart_inline").hide();
    window.location.href = window.location.origin + "/beta/checkout/";
  }
});
jQuery(window).scroll(function () {
  jQuery("#billing_address_1").removeAttr("placeholder");

  var sticky = jQuery("body"),
    scroll = jQuery(window).scrollTop();

  if (scroll >= 100) sticky.addClass("sticky_header");
  else sticky.removeClass("sticky_header");
});

jQuery(document).on(
  "click",
  ".woocommerce-checkout #place_order",
  function (e) {
    jQuery(".all-class").remove();
    jQuery("input").removeClass("error");
    var billing_first_name = jQuery("#billing_first_name").val();
    var billing_last_name = jQuery("#billing_last_name").val();
    var billing_city = jQuery("#billing_city").val();
    var billing_address_1 = jQuery("#billing_address_1").val();
    var billing_postcode = jQuery("#billing_postcode").val();
    var billing_phone = jQuery("#billing_phone").val();
    var billing_email = jQuery("#billing_email").val();
    var billing_state = jQuery("#billing_state").val();

    var color = jQuery("#billing_state_field").css("display");
    if (color == "none") {
      billing_state = "no state";
    }
    if (
      billing_state == "" ||
      billing_last_name == "" ||
      billing_first_name == "" ||
      billing_address_1 == "" ||
      billing_city == "" ||
      billing_phone == "" ||
      billing_postcode == "" ||
      billing_email == ""
    ) {
      if (billing_first_name == "") {
        jQuery("#billing_first_name").after(
          "<div class='all-class'>This field is required.</div>"
        );
        jQuery("#billing_first_name").addClass("error");
        e.preventDefault();
      } else {
        jQuery("#billing_first_name").removeClass("error");
      }
      if (billing_email == "") {
        jQuery("#billing_email").after(
          "<div class='all-class'>Please enter an email address.</div>"
        );
        jQuery("#billing_email").addClass("error");
        e.preventDefault();
      } else {
        jQuery("#billing_email").removeClass("error");
      }
      if (billing_last_name == "") {
        jQuery("#billing_last_name").after(
          "<div class='all-class'>This field is required.</div>"
        );
        jQuery("#billing_last_name").addClass("error");
        e.preventDefault();
      } else {
        jQuery("#billing_last_name").removeClass("error");
      }
      if (billing_state == "") {
        jQuery("#billing_state")
          .parent()
          .after("<div class='all-class'>This field is required.</div>");
        jQuery("#billing_state").addClass("error");
        e.preventDefault();
      } else {
        jQuery("#billing_state").removeClass("error");
      }
      if (billing_address_1 == "") {
        jQuery("#billing_address_1").after(
          "<div class='all-class'>This field is required.</div>"
        );
        jQuery("#billing_address_1").addClass("error");
        e.preventDefault();
      } else {
        jQuery("#billing_address_1").removeClass("error");
      }
      if (billing_city == "") {
        jQuery("#billing_city").after(
          "<div class='all-class'>This field is required.</div>"
        );
        jQuery("#billing_city").addClass("error");
        e.preventDefault();
      } else {
        jQuery("#billing_city").removeClass("error");
      }
      if (billing_postcode == "") {
        jQuery("#billing_postcode").after(
          "<div class='all-class'>This field is required.</div>"
        );
        jQuery("#billing_postcode").addClass("error");
        e.preventDefault();
      } else {
        // Regular expression for ZIP code validation (5 digits or 5+4 format)
        var zipCodePattern = /^\d{5}(?:-\d{4})?$/;

        if (!zipCodePattern.test(billing_postcode)) {
          jQuery("#billing_postcode").after(
            "<div class='all-class'>Invalid ZIP code format.</div>"
          );
          jQuery("#billing_postcode").addClass("error");
          e.preventDefault();
        } else {
          jQuery("#billing_postcode").removeClass("error");
        }
      }
      if (billing_phone == "") {
        jQuery("#billing_phone").after(
          "<div class='all-class'>This field is required.</div>"
        );
        jQuery("#billing_phone").addClass("error");
        e.preventDefault();
      } else {
        jQuery("#billing_phone").removeClass("error");
      }
      jQuery(".custom-error").remove();
      jQuery("#place_order").after(
        "<div class='validation custom-error' >One or more fields have an error. Please check and try again.</div>"
      );
      jQuery(".custom-error").show();
    }
    if (billing_phone != "") {
      intRegex = /[0-9 -()+]+$/;
      if (!intRegex.test(billing_phone)) {
        jQuery("#billing_phone").after(
          '<div for="phone" id="phone" class="error-smart all-class">Please enter a valid phone number.</div>'
        );
        jQuery("#billing_phone").addClass("error");
        e.preventDefault();
      } else {
        jQuery("#billing_phone").removeClass("error");
        jQuery(".custom-error").remove();
      }
    }
    if (billing_email != "") {
      if (validateEmail(billing_email)) {
        Cookies("email", billing_email);
        jQuery("#emailcustome").remove();
        jQuery("#billing_email").removeClass("error");
      } else {
        jQuery("#billing_email").after(
          '<div for="email" id="emailcustome" class="error-smart all-class">Please enter a valid email address.</div>'
        );
        jQuery("#billing_email").addClass("error");
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
    if (
      jQuery("#ship-to-different-address")
        .find("input[type=checkbox]")
        .prop("checked") == true
    ) {
      var shipping_first_name = jQuery("#shipping_first_name").val();
      var shipping_last_name = jQuery("#shipping_last_name").val();
      var shipping_city = jQuery("#shipping_city").val();
      var shipping_address_1 = jQuery("#shipping_address_1").val();
      var shipping_postcode = jQuery("#shipping_postcode").val();
      var shipping_phone = jQuery("#shipping_phone").val();

      var shipping_state = jQuery("#shipping_state").val();
      var color = jQuery("#shipping_state_field").css("display");
      if (color == "none") {
        shipping_state = "no state";
      }
      if (
        shipping_last_name == "" ||
        shipping_first_name == "" ||
        shipping_address_1 == "" ||
        shipping_phone == "" ||
        shipping_city == "" ||
        shipping_state == "" ||
        shipping_phone == "" ||
        shipping_postcode == "" ||
        shipping_state == ""
      ) {
        if (shipping_first_name == "") {
          jQuery("#shipping_first_name").after(
            "<div class='all-class'>This field is required.</div>"
          );
          jQuery("#shipping_first_name").addClass("error");
          e.preventDefault();
        } else {
          jQuery("#shipping_first_name").removeClass("error");
        }
        if (shipping_last_name == "") {
          jQuery("#shipping_last_name").after(
            "<div class='all-class'>This field is required.</div>"
          );
          jQuery("#shipping_last_name").addClass("error");
          e.preventDefault();
        } else {
          jQuery("#shipping_last_name").removeClass("error");
        }
        if (shipping_state == "") {
          jQuery("#shipping_state")
            .parent()
            .after("<div class='all-class'>This field is required.</div>");
          jQuery("#shipping_state").addClass("error");
          e.preventDefault();
        } else {
          jQuery("#shipping_state").removeClass("error");
        }
        if (shipping_address_1 == "") {
          jQuery("#shipping_address_1").after(
            "<div class='all-class'>This field is required.</div>"
          );
          jQuery("#shipping_address_1").addClass("error");
          e.preventDefault();
        } else {
          jQuery("#shipping_address_1").removeClass("error");
        }
        if (shipping_city == "") {
          jQuery("#shipping_city").after(
            "<div class='all-class'>This field is required.</div>"
          );
          jQuery("#shipping_city").addClass("error");
          e.preventDefault();
        } else {
          jQuery("#shipping_city").removeClass("error");
        }
        if (shipping_postcode == "") {
          jQuery("#shipping_postcode").after(
            "<div class='all-class'>This field is required.</div>"
          );
          jQuery("#shipping_postcode").addClass("error");
          e.preventDefault();
        } else {
          jQuery("#shipping_postcode").removeClass("error");
        }

        if (shipping_phone == "") {
          jQuery("#shipping_phone").after(
            "<div class='all-class'>This field is required.</div>"
          );
          jQuery("#shipping_phone").addClass("error");
          e.preventDefault();
        } else {
          jQuery("#shipping_phone").removeClass("error");
        }
        jQuery(".custom-error").remove();
        jQuery("#place_order").after(
          "<div class='validation  custom-error' >One or more fields have an error. Please check and try again.</div>"
        );
        jQuery(".custom-error").show();
      }
    }
  }
);

jQuery(document).ready(function (jQuery) {});
