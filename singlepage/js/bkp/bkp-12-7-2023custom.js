jQuery(document).ready(function () {
    jQuery('.to-top>div>div>a').prop("href", "javascript:void(0)");
    jQuery(".to-top").hide();
    var toTop = jQuery('.to-top');
    // logic
    toTop.on('click', function () {
        jQuery('html, body').animate({
            scrollTop: jQuery('html, body').offset().top,
        });
    });
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
            // if (jQuery(this).attr('rel')) {
            jQuery(this).attr('href', 'javascript:void(0)');
            // }
        })

    }
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