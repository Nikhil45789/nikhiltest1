jQuery(document).ready(function () {
  jQuery('.to-top>div>div>a').prop("href", "javascript:void(0)");
  jQuery(".to-top").hide();
  jQuery(window).scroll(function () {
      if (jQuery(document).scrollTop() > 300) {
          jQuery(".header").addClass("sticky");
          jQuery(".to-top").show();
      } else {
          jQuery(".header").removeClass("sticky");
          jQuery(".to-top").hide();
      }
  });
  jQuery(".to-top").click(function () {
      jQuery("html, body").animate(
          {
              scrollTop: 0,
          },
          400
      );
      return false;
  });
  jQuery(".hfe-nav-menu-icon").click(function () {

      jQuery("html").toggleClass("no-scroll");

  });
  if (jQuery('body').hasClass('error404')) {
      var url = jQuery('.hfe-nav-menu li>a').eq(0).attr('href');
      jQuery('.hfe-nav-menu li>a').each(function () {
          if (jQuery(this).attr('rel')) {
              jQuery(this).attr('href', url + '?rel=' + jQuery(this).attr('rel'))
          }
      })
  }
  if (jQuery('body').hasClass('home')) {
      // var url=jQuery('.hfe-nav-menu li>a').eq(0).attr('href');
      jQuery('.hfe-nav-menu li>a').each(function () {
          jQuery(this).attr('href', 'javascript:void(0)');
          jQuery(this).click(function () {
              if (jQuery(this).attr('rel')) {
                  var location = jQuery(this).attr('rel');
                  var scrollPos = jQuery(document).scrollTop();

                  if (jQuery(window).width() <= 1024) {
                      if (scrollPos == 0) {
                      jQuery('html, body').animate({
                          scrollTop: jQuery("#" + location).offset().top - 10 
                          - jQuery('header').height()*2
                      }, 800);
                  }
                  else{
                      jQuery('html, body').animate({
                          scrollTop: jQuery("#" + location).offset().top - 10 
                          - jQuery('header').height()
                      }, 800);
                  }

                  }
                  else {
                      if (scrollPos == 0) {

                          console.log(scrollPos + '1')

                          jQuery('html, body').animate({
                              scrollTop: jQuery("#" + location).offset().top - jQuery('header').height()*2
                              // + 300
                          }, 800);
                      }
                      else {
                          jQuery('html, body').animate({
                              scrollTop: jQuery("#" + location).offset().top - jQuery('header').height() 
                              // + 300
                          }, 800);
                      }

                  }
              }
              else {
                  jQuery('.to-top').trigger('click');
              }
          })

      })

  }
  jQuery(document).on("scroll", onScroll);
  jQuery('.hfe-nav-menu li a').click(function () {
    if (jQuery('html').hasClass('no-scroll')) {
        jQuery('html').removeClass('no-scroll');
        jQuery('.hfe-nav-menu__toggle').trigger('click');
    }
})
});
jQuery(window).load(function () {
  if (jQuery("body").hasClass("home")) {
      var getUrlParameter = function getUrlParameter(sParam) {
          var sPageURL = window.location.search.substring(1),
              sURLVariables = sPageURL.split('&'),
              sParameterName,
              i;

          for (i = 0; i < sURLVariables.length; i++) {
              sParameterName = sURLVariables[i].split('=');

              if (sParameterName[0] === sParam) {
                  return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
              }
          }
          return false;
      };
      var rel = getUrlParameter('rel');
      jQuery('.hfe-nav-menu li>a').each(function () {
          if (jQuery(this).attr('rel') == rel) {
              jQuery(this).trigger('click');
          }
      });
  }
});

function onScroll(event) {

  var scrollPos = jQuery(document).scrollTop();
  var viewportWidth = jQuery(window).width();

  if (viewportWidth >= 1024) {
      jQuery(".hfe-nav-menu li").each(function () {
          jQuery(this).removeClass("current_page_item");
      });
      jQuery(".hfe-nav-menu li>a").each(function () {
          var rel = jQuery(this).attr("rel");
          var currentid = "#" + rel;
          if (jQuery(currentid).size() > 0) {
              if (jQuery(currentid).position().top - jQuery('header').height() - parseInt(jQuery(this).css("padding-top").slice(0, -2)) <= scrollPos && jQuery(currentid).position().top + jQuery(currentid).height() > scrollPos) {
                  jQuery(this).parent().addClass("current_page_item");
              }
          }
      });
  } else if (jQuery(window).width() <= 1024 && jQuery(window).width() >= 768) {
      jQuery(".hfe-nav-menu li").each(function () {
          jQuery(this).removeClass("current_page_item");
      });
      jQuery(".hfe-nav-menu li>a").each(function () {
          var rel = jQuery(this).attr("rel");
          var currentid = "#" + rel;
          if (jQuery(currentid).size() > 0) {
              if (jQuery(currentid).position().top - jQuery('header').height() - parseInt(jQuery(this).css("padding-top").slice(0, -2)) <= scrollPos && jQuery(currentid).position().top + jQuery(currentid).height() > scrollPos) {
                  jQuery(this).parent().addClass("current_page_item");
              }
          }
      });
  } else {
      jQuery(".hfe-nav-menu li").each(function () {
          jQuery(this).removeClass("current_page_item");
      });
      jQuery(".hfe-nav-menu li>a").each(function () {
          var rel = jQuery(this).attr("rel");
          var currentid = "#" + rel;
          if (jQuery(currentid).size() > 0) {
              if (jQuery(currentid).position().top - jQuery('header').height() - parseInt(jQuery(this).css("padding-top").slice(0, -2)) <= scrollPos && jQuery(currentid).position().top + jQuery(currentid).height() > scrollPos) {
                  jQuery(this).parent().addClass("current_page_item");
              }
          }
      });
  }
  if (scrollPos == 0) {
      jQuery(".hfe-nav-menu li>a").each(function () {
          var rel = jQuery(this).attr("rel");
          if (!rel) {
              jQuery(this).parent().addClass("current_page_item");
          }
      });
  }

  


}