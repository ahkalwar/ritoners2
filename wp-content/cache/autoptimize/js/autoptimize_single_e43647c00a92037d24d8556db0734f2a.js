function fusionDisableStickyHeader(){jQuery(window).off(".stickyheader"),jQuery(".fusion-header-wrapper, .fusion-header-sticky-height, .fusion-header, .fusion-logo, .fusion-header-wrapper .fusion-main-menu > li a, .fusion-header-wrapper .fusion-secondary-main-menu").attr("style",""),jQuery(".fusion-is-sticky").removeClass("fusion-is-sticky")}function fusionInitStickyHeader(){var a,b,c,d,e,f,g,h=300,i=0;avadaHeaderVars.sticky_header_shrinkage||(h=0),a=jQuery(".fusion-header").parent(),window.$headerParentHeight=a.outerHeight(),window.$headerHeight=jQuery(".fusion-header").outerHeight(),b=parseInt(avadaHeaderVars.nav_height,10),window.$menuHeight=b,window.$scrolled_header_height=65,c=jQuery(".fusion-logo img:visible").length?jQuery(".fusion-logo img:visible"):"",d=!1,window.$stickyTrigger=jQuery(".fusion-header"),window.$wpadminbarHeight=jQuery("#wpadminbar").length?jQuery("#wpadminbar").height():0,window.$stickyTrigger_position=window.$stickyTrigger.length?Math.round(window.$stickyTrigger.offset().top)-window.$wpadminbarHeight-window.$woo_store_notice-window.$top_frame:0,window.$woo_store_notice=jQuery(".woocommerce-store-notice").length&&jQuery(".woocommerce-store-notice").is(":visible")?jQuery(".woocommerce-store-notice").outerHeight():0,window.$top_frame=jQuery(".fusion-top-frame").is(":visible")?jQuery(".fusion-top-frame").outerHeight()-window.$woo_store_notice:0,window.sticky_header_type=1,window.$slider_offset=0,window.$site_width=jQuery("#wrapper").outerWidth(),window.$media_query_test_1=Modernizr.mq("only screen and (min-device-width: 768px) and (max-device-width: 1366px) and (orientation: portrait)")||Modernizr.mq("only screen and (min-device-width: 768px) and (max-device-width: 1024px) and (orientation: landscape)"),window.$media_query_test_2=Modernizr.mq("screen and (max-width: "+avadaHeaderVars.side_header_break_point+"px)"),window.$media_query_test_3=Modernizr.mq("screen and (max-width: "+avadaHeaderVars.side_header_break_point+"px)"),window.$media_query_test_4=Modernizr.mq("only screen and (max-width: "+avadaHeaderVars.side_header_break_point+"px)"),window.$standardLogoHeight=jQuery(".fusion-standard-logo").height(),window.$logoMarginTop=""!==jQuery(".fusion-logo").data("margin-top")?parseInt(jQuery(".fusion-logo").data("margin-top"),10):0,window.$logoMarginBottom=""!==jQuery(".fusion-logo").data("margin-bottom")?parseInt(jQuery(".fusion-logo").data("margin-bottom"),10):0,window.$standardLogoHeight+=window.$logoMarginTop+window.$logoMarginBottom,window.$initial_desktop_header_height=Math.max(window.$headerHeight,Math.round(Math.max(window.$menuHeight,window.$standardLogoHeight)+parseFloat(jQuery(".fusion-header").find(".fusion-row").css("padding-top"))+parseFloat(jQuery(".fusion-header").find(".fusion-row").css("padding-bottom")))),window.$initial_sticky_header_shrinkage=avadaHeaderVars.sticky_header_shrinkage,window.$sticky_can_be_shrinked=!0,avadaHeaderVars.sticky_header_shrinkage||(h=0,window.$scrolled_header_height=window.$headerHeight),window.original_logo_height=0,""!==c&&(c[0].hasAttribute("data-retina_logo_url")?(e=new Image,e.src=c.attr("data-retina_logo_url"),window.original_logo_height=parseInt(c.height(),10)+parseInt(avadaHeaderVars.logo_margin_top,10)+parseInt(avadaHeaderVars.logo_margin_bottom,10)):(e=new Image,e.src=c.attr("src"),window.original_logo_height=parseInt(e.naturalHeight,10)+parseInt(avadaHeaderVars.logo_margin_top,10)+parseInt(avadaHeaderVars.logo_margin_bottom,10))),(1<=jQuery(".fusion-header-v4").length||1<=jQuery(".fusion-header-v5").length)&&(window.sticky_header_type=2,"menu_and_logo"===avadaHeaderVars.header_sticky_type2_layout||Modernizr.mq("only screen and (max-width: "+avadaHeaderVars.side_header_break_point+"px)")&&"modern"===avadaHeaderVars.mobile_menu_design?window.$stickyTrigger=jQuery(".fusion-sticky-header-wrapper"):window.$stickyTrigger=jQuery(".fusion-secondary-main-menu"),window.$stickyTrigger_position=Math.round(window.$stickyTrigger.offset().top)-window.$wpadminbarHeight-window.$woo_store_notice-window.$top_frame),1===window.sticky_header_type?Modernizr.mq("only screen and (max-width: "+avadaHeaderVars.side_header_break_point+"px)")?window.$scrolled_header_height=window.$headerHeight:window.$original_sticky_trigger_height=jQuery(window.$stickyTrigger).outerHeight():2===window.sticky_header_type&&("classic"===avadaHeaderVars.mobile_menu_design&&jQuery(a).height(window.$headerParentHeight),Modernizr.mq("only screen and (max-width: "+avadaHeaderVars.side_header_break_point+"px)")?window.$scrolled_header_height=window.$headerParentHeight:jQuery(a).height(window.$headerParentHeight)),1<=jQuery("#side-header").length&&(window.sticky_header_type=3),jQuery(".fusion-secondary-header").length&&(i=jQuery(".fusion-secondary-header").outerHeight()),jQuery(document).height()-(window.$initial_desktop_header_height+i+window.$wpadminbarHeight-window.$scrolled_header_height)<jQuery(window).height()&&avadaHeaderVars.sticky_header_shrinkage?(window.$sticky_can_be_shrinked=!1,jQuery(".fusion-header-wrapper").removeClass("fusion-is-sticky")):window.$sticky_can_be_shrinked=!0,f=jQuery(window).width(),g=jQuery(window).height(),jQuery(window).on("resize.stickyheader",function(){var d,e,j,k,l,m;window.$media_query_test_1=Modernizr.mq("only screen and (min-device-width: 768px) and (max-device-width: 1366px) and (orientation: portrait)")||Modernizr.mq("only screen and (min-device-width: 768px) and (max-device-width: 1024px) and (orientation: landscape)"),window.$media_query_test_2=Modernizr.mq("screen and (max-width: "+avadaHeaderVars.side_header_break_point+"px)"),window.$media_query_test_3=Modernizr.mq("screen and (max-width: "+avadaHeaderVars.side_header_break_point+"px)"),window.$media_query_test_4=Modernizr.mq("only screen and (max-width: "+avadaHeaderVars.side_header_break_point+"px)"),!Modernizr.mq("only screen and (min-width: "+avadaHeaderVars.side_header_break_point+"px)")||-1===avadaHeaderVars.header_padding_top.indexOf("%")&&-1===avadaHeaderVars.header_padding_bottom.indexOf("%")||jQuery(".fusion-is-sticky").length||(window.$headerHeight=Math.round(Math.max(window.$menuHeight,window.$standardLogoHeight)+parseFloat(jQuery(".fusion-header").find(".fusion-row").css("padding-top"))+parseFloat(jQuery(".fusion-header").find(".fusion-row").css("padding-bottom"))),jQuery(".fusion-header, .fusion-header-sticky-height").height(window.$headerHeight),avadaHeaderVars.sticky_header_shrinkage||(window.$scrolled_header_height=window.$headerHeight)),(-1!==avadaHeaderVars.header_padding_top.indexOf("%")||-1!==avadaHeaderVars.header_padding_bottom.indexOf("%")&&!jQuery(".fusion-is-sticky").length)&&(window.$initial_desktop_header_height=Math.max(window.$headerHeight,Math.round(Math.max(window.$menuHeight,window.$standardLogoHeight)+parseFloat(jQuery(".fusion-header").find(".fusion-row").css("padding-top"))+parseFloat(jQuery(".fusion-header").find(".fusion-row").css("padding-bottom"))))),!avadaHeaderVars.header_sticky_tablet&&window.$media_query_test_1?(jQuery(".fusion-header-wrapper, .fusion-header-sticky-height, .fusion-header, .fusion-logo, .fusion-header-wrapper .fusion-main-menu > li a, .fusion-header-wrapper .fusion-secondary-main-menu").attr("style",""),jQuery(".fusion-header-wrapper").removeClass("fusion-is-sticky")):avadaHeaderVars.header_sticky_tablet&&window.$media_query_test_1&&(h=0),avadaHeaderVars.header_sticky_mobile||!window.$media_query_test_2||window.$media_query_test_1?avadaHeaderVars.header_sticky_mobile&&window.$media_query_test_2&&!window.$media_query_test_1&&(h=0):(jQuery(".fusion-header-wrapper, .fusion-header-sticky-height, .fusion-header, .fusion-logo, .fusion-header-wrapper .fusion-main-menu > li a, .fusion-header-wrapper .fusion-secondary-main-menu").attr("style",""),jQuery(".fusion-header-wrapper").removeClass("fusion-is-sticky")),(jQuery("body").hasClass("fusion-builder-live")||f&&g&&(jQuery(window).width()!==f||jQuery(window).height()!==g))&&(b=parseInt(avadaHeaderVars.nav_height,10),jQuery("#wpadminbar").length?window.$wpadminbarHeight=jQuery("#wpadminbar").height():window.$wpadminbarHeight=0,window.$woo_store_notice=jQuery(".woocommerce-store-notice").length&&jQuery(".woocommerce-store-notice").is(":visible")?jQuery(".woocommerce-store-notice").outerHeight():0,jQuery(".fusion-is-sticky").length&&(d=jQuery(".fusion-header"),2===window.sticky_header_type&&(d="menu_only"!==avadaHeaderVars.header_sticky_type2_layout||"classic"!==avadaHeaderVars.mobile_menu_design&&window.$media_query_test_4?jQuery(".fusion-sticky-header-wrapper"):jQuery(".fusion-secondary-main-menu")),jQuery("#wpadminbar").length&&(jQuery(".fusion-header, .fusion-sticky-header-wrapper, .fusion-secondary-main-menu").css("top",""),jQuery(d).css("top",window.$wpadminbarHeight+window.$woo_store_notice+window.$top_frame)),"boxed"===avadaHeaderVars.layout_mode.toLowerCase()&&jQuery(d).css("max-width",jQuery("#wrapper").outerWidth()+"px")),1===window.sticky_header_type&&(avadaHeaderVars.sticky_header_shrinkage=window.$initial_sticky_header_shrinkage,jQuery(".fusion-header-wrapper").hasClass("fusion-is-sticky")||(jQuery(".fusion-secondary-header").length?window.$stickyTrigger_position=Math.round(jQuery(".fusion-secondary-header").offset().top)-window.$wpadminbarHeight-window.$woo_store_notice-window.$top_frame+jQuery(".fusion-secondary-header").outerHeight():window.$stickyTrigger_position=Math.round(jQuery(".fusion-header").offset().top)-window.$wpadminbarHeight-window.$woo_store_notice-window.$top_frame),Modernizr.mq("only screen and (max-width: "+avadaHeaderVars.side_header_break_point+"px)")||(e=jQuery(".fusion-logo img:visible").length?jQuery(".fusion-logo img:visible").outerHeight()+parseInt(avadaHeaderVars.logo_margin_top,10)+parseInt(avadaHeaderVars.logo_margin_bottom,10):0,j=0,jQuery(".fusion-main-menu > ul > li").each(function(){j+=jQuery(this).outerWidth()}),jQuery(".fusion-header-v6").length&&(j=0),jQuery(".fusion-is-sticky").length?(j>jQuery(".fusion-header .fusion-row").width()-jQuery(".fusion-logo img:visible").outerWidth()?(window.$headerHeight=jQuery(".fusion-main-menu").outerHeight()+e,jQuery(".fusion-header-v7").length&&(window.$headerHeight=jQuery(".fusion-middle-logo-menu").height()),(jQuery(".fusion-header-v2").length||jQuery(".fusion-header-v3").length)&&(window.$headerHeight+=1)):avadaHeaderVars.sticky_header_shrinkage?window.$headerHeight=65:(window.original_logo_height>b?window.$headerHeight=window.original_logo_height:window.$headerHeight=b,window.$headerHeight+=parseFloat(jQuery(".fusion-header > .fusion-row").css("padding-top"))+parseFloat(jQuery(".fusion-header > .fusion-row").css("padding-bottom")),window.$headerHeight=Math.round(window.$headerHeight),(jQuery(".fusion-header-v2").length||jQuery(".fusion-header-v3").length)&&(window.$headerHeight+=1)),window.$scrolled_header_height=window.$headerHeight,jQuery(".fusion-header-sticky-height").css("height",window.$headerHeight),jQuery(".fusion-header").css("height",window.$headerHeight)):(k=jQuery(".fusion-header .fusion-row").width()-jQuery(".fusion-logo img:visible").outerWidth(),jQuery(".fusion-header-v7").length&&(k=jQuery(".fusion-header .fusion-row").width()),j>k?(window.$headerHeight=jQuery(".fusion-main-menu").outerHeight()+e,jQuery(".fusion-header-v7").length&&(window.$headerHeight=jQuery(".fusion-middle-logo-menu").height()),avadaHeaderVars.sticky_header_shrinkage=!1):(window.original_logo_height>b?window.$headerHeight=window.original_logo_height:window.$headerHeight=b,jQuery(".fusion-header-v7").length&&(window.$headerHeight=jQuery(".fusion-main-menu").outerHeight())),window.$headerHeight+=parseFloat(jQuery(".fusion-header > .fusion-row").css("padding-top"))+parseFloat(jQuery(".fusion-header > .fusion-row").css("padding-bottom")),window.$headerHeight=Math.round(window.$headerHeight),(jQuery(".fusion-header-v2").length||jQuery(".fusion-header-v3").length)&&(window.$headerHeight+=1),window.$scrolled_header_height=65,avadaHeaderVars.sticky_header_shrinkage||(window.$scrolled_header_height=window.$headerHeight),jQuery(".fusion-header-sticky-height").css("height",window.$headerHeight),jQuery(".fusion-header").css("height",window.$headerHeight))),Modernizr.mq("only screen and (max-width: "+avadaHeaderVars.side_header_break_point+"px)")&&(jQuery(".fusion-header").css("height",""),window.$headerHeight=jQuery(".fusion-header").outerHeight(),window.$scrolled_header_height=window.$headerHeight,jQuery(".fusion-header-sticky-height").css("height",window.$scrolled_header_height))),2===window.sticky_header_type&&("modern"===avadaHeaderVars.mobile_menu_design&&(!Modernizr.mq("only screen and (max-width: "+avadaHeaderVars.side_header_break_point+"px)")&&jQuery(".fusion-is-sticky").length&&"menu_only"===avadaHeaderVars.header_sticky_type2_layout?window.$headerParentHeight=jQuery(".fusion-header").parent().outerHeight()+jQuery(".fusion-secondary-main-menu").outerHeight():window.$headerParentHeight=jQuery(".fusion-header").parent().outerHeight(),window.$scrolled_header_height=window.header_parent_height,Modernizr.mq("only screen and (max-width: "+avadaHeaderVars.side_header_break_point+"px)")||(window.$headerParentHeight=jQuery(".fusion-header").outerHeight()+jQuery(".fusion-secondary-main-menu").outerHeight(),window.$stickyTrigger_position=Math.round(jQuery(".fusion-header").offset().top)-window.$wpadminbarHeight-window.$woo_store_notice-window.$top_frame+jQuery(".fusion-header").outerHeight(),jQuery(a).height(window.$headerParentHeight),jQuery(".fusion-header-sticky-height").css("height","")),Modernizr.mq("only screen and (max-width: "+avadaHeaderVars.side_header_break_point+"px)")&&(jQuery(".fusion-secondary-header").length?window.$stickyTrigger_position=Math.round(jQuery(".fusion-secondary-header").offset().top)-window.$wpadminbarHeight-window.$woo_store_notice-window.$top_frame+jQuery(".fusion-secondary-header").outerHeight():window.$stickyTrigger_position=Math.round(jQuery(".fusion-header").offset().top)-window.$wpadminbarHeight-window.$woo_store_notice-window.$top_frame,jQuery(a).height(""),jQuery(".fusion-header-sticky-height").css("height",jQuery(".fusion-sticky-header-wrapper").outerHeight()))),"classic"===avadaHeaderVars.mobile_menu_design&&(window.$headerParentHeight=jQuery(".fusion-header").outerHeight()+jQuery(".fusion-secondary-main-menu").outerHeight(),window.$stickyTrigger_position=Math.round(jQuery(".fusion-header").offset().top)-window.$wpadminbarHeight-window.$woo_store_notice-window.$top_frame+jQuery(".fusion-header").outerHeight(),jQuery(a).height(window.$headerParentHeight))),3===window.sticky_header_type&&(Modernizr.mq("only screen and (max-width:"+avadaHeaderVars.side_header_break_point+"px)")||(jQuery("#side-header-sticky").css({height:"",top:""}),jQuery("#side-header").hasClass("fusion-is-sticky")&&(jQuery("#side-header").css({top:"",position:""}),jQuery("#side-header").removeClass("fusion-is-sticky")))),jQuery(document).height()-(window.$initial_desktop_header_height+i+window.$wpadminbarHeight-window.$scrolled_header_height)<jQuery(window).height()&&avadaHeaderVars.sticky_header_shrinkage?(window.$sticky_can_be_shrinked=!1,jQuery(".fusion-header-wrapper").removeClass("fusion-is-sticky"),jQuery(".fusion-header").css("height",""),jQuery(".fusion-logo").css({"margin-top":"","margin-bottom":""}),jQuery(".fusion-main-menu > ul > li > a").css("height",""),jQuery(".fusion-logo img").css("height","")):(window.$sticky_can_be_shrinked=!0,1<=jQuery(".fusion-is-sticky").length&&(1!==window.sticky_header_type||Modernizr.mq("only screen and (max-width: "+avadaHeaderVars.side_header_break_point+"px)")||(Modernizr.mq("only screen and (max-width: "+avadaHeaderVars.side_header_break_point+"px)")?jQuery(".fusion-header-sticky-height").css("height",window.$scrolled_header_height):parseInt(window.$headerHeight,10)===parseInt(window.$initial_desktop_header_height,10)&&(jQuery(window.$stickyTrigger).stop(!0,!0).animate({height:window.$scrolled_header_height},{queue:!1,duration:h,easing:"easeOutCubic",complete:function(){jQuery(this).css("overflow","visible")}}),jQuery(".fusion-header-sticky-height").stop(!0,!0).animate({height:window.$scrolled_header_height},{queue:!1,duration:h,easing:"easeOutCubic",complete:function(){jQuery(this).css("overflow","visible")}})),avadaHeaderVars.sticky_header_shrinkage&&parseInt(window.$headerHeight,10)===parseInt(window.$initial_desktop_header_height,10)&&(c&&(l=c.height(),l<window.$scrolled_header_height-10?m=(window.$scrolled_header_height-l)/2:(l=window.$scrolled_header_height-10,m=5),c.stop(!0,!0).animate({height:l},{queue:!1,duration:h,easing:"easeOutCubic",complete:function(){jQuery(this).css("display","")},step:function(){jQuery(this).css("display","")}})),jQuery(".fusion-logo").stop(!0,!0).animate({"margin-top":m,"margin-bottom":m},{queue:!1,duration:h,easing:"easeOutCubic"}),jQuery(".fusion-header-v6").length||jQuery(".fusion-main-menu > ul > li").not(".fusion-middle-logo-menu-logo").find("> a").stop(!0,!0).animate({height:window.$scrolled_header_height},{queue:!1,duration:h,easing:"easeOutCubic"}))))),f=jQuery(window).width(),g=jQuery(window).height())}),jQuery(window).on("scroll.stickyheader",function(){var a,e;if(window.$sticky_can_be_shrinked){if(!avadaHeaderVars.header_sticky_tablet&&window.$media_query_test_1)return;if(avadaHeaderVars.header_sticky_tablet&&window.$media_query_test_1&&(h=0),!avadaHeaderVars.header_sticky_mobile&&window.$media_query_test_2&&!window.$media_query_test_1)return;if(avadaHeaderVars.header_sticky_mobile&&window.$media_query_test_2&&(h=0),3===window.sticky_header_type&&!avadaHeaderVars.header_sticky_mobile)return;if(3===window.sticky_header_type&&!avadaHeaderVars.header_sticky_mobile&&!window.$media_query_test_3)return;0===jQuery(".fusion-is-sticky").length&&jQuery(".fusion-header, .fusion-secondary-main-menu, #side-header").find(".fusion-mobile-nav-holder > ul").is(":visible")&&(jQuery(".fusion-header-has-flyout-menu-content").length?window.$stickyTrigger_position=Math.round(jQuery(".fusion-header, .fusion-sticky-header-wrapper, #side-header").find(".fusion-header-has-flyout-menu-content").offset().top)-window.$wpadminbarHeight-window.$woo_store_notice-window.$top_frame:window.$stickyTrigger_position=Math.round(jQuery(".fusion-header, .fusion-sticky-header-wrapper, #side-header").find(".fusion-mobile-nav-holder:visible").offset().top)-window.$wpadminbarHeight-window.$woo_store_notice-window.$top_frame+jQuery(".fusion-header, .fusion-sticky-header-wrapper, #side-header").find(".fusion-mobile-nav-holder:visible").height()),3!==window.sticky_header_type&&0===jQuery(".fusion-is-sticky").length&&!jQuery(".fusion-header, .fusion-secondary-main-menu").find(".fusion-mobile-nav-holder > ul").is(":visible")&&jQuery(".fusion-header").length&&(window.$stickyTrigger=jQuery(".fusion-header"),window.$stickyTrigger_position=Math.round(window.$stickyTrigger.offset().top)-window.$wpadminbarHeight-window.$woo_store_notice-window.$top_frame,2===window.sticky_header_type&&("menu_and_logo"===avadaHeaderVars.header_sticky_type2_layout||window.$media_query_test_4&&"modern"===avadaHeaderVars.mobile_menu_design?window.$stickyTrigger=jQuery(".fusion-sticky-header-wrapper"):window.$stickyTrigger=jQuery(".fusion-secondary-main-menu"),window.$stickyTrigger_position=Math.round(window.$stickyTrigger.offset().top)-window.$wpadminbarHeight-window.$woo_store_notice-window.$top_frame),"modern"!==avadaHeaderVars.mobile_menu_design||2!==window.sticky_header_type||!window.$media_query_test_4&&"menu_and_logo"!==avadaHeaderVars.header_sticky_type2_layout||(window.$headerHeight=jQuery(window.$stickyTrigger).outerHeight(),window.$scrolled_header_height=window.$headerHeight,jQuery(".fusion-header-sticky-height").css("height",window.$scrolled_header_height))),3!==window.sticky_header_type||0!==jQuery(".fusion-is-sticky").length||jQuery("#side-header").find(".fusion-mobile-nav-holder > ul").is(":visible")||(window.$stickyTrigger=jQuery("#side-header"),window.$stickyTrigger_position=Math.round(window.$stickyTrigger.offset().top)-window.$wpadminbarHeight-window.$woo_store_notice-window.$top_frame),jQuery(window).scrollTop()>window.$stickyTrigger_position?!1===d&&(window.$woo_store_notice=jQuery(".woocommerce-store-notice").length&&jQuery(".woocommerce-store-notice").is(":visible")?jQuery(".woocommerce-store-notice").outerHeight():0,jQuery(".fusion-header-wrapper").addClass("fusion-is-sticky"),"function"==typeof resizeOverlaySearch&&resizeOverlaySearch(),jQuery(window.$stickyTrigger).css("top",window.$wpadminbarHeight+window.$woo_store_notice+window.$top_frame),c=jQuery(".fusion-logo img:visible"),"modern"===avadaHeaderVars.mobile_menu_design?(jQuery(".fusion-header, .fusion-secondary-main-menu, #side-header").find(".fusion-mobile-nav-holder").hide(),jQuery(".fusion-secondary-main-menu .fusion-main-menu-search .fusion-custom-menu-item-contents").hide(),jQuery(".fusion-mobile-menu-search").hide()):"classic"===avadaHeaderVars.mobile_menu_design&&(jQuery(".fusion-header, .fusion-secondary-main-menu, #side-header").find(".fusion-mobile-nav-holder > ul").hide(),jQuery(".fusion-mobile-menu-search").hide()),"modern"===avadaHeaderVars.mobile_menu_design&&1<=jQuery(".fusion-is-sticky").length&&1<=jQuery(".fusion-mobile-sticky-nav-holder").length&&jQuery(".fusion-mobile-nav-holder").is(":visible")&&jQuery(".fusion-mobile-nav-holder").not(".fusion-mobile-sticky-nav-holder").hide(),"boxed"===avadaHeaderVars.layout_mode.toLowerCase()&&jQuery(window.$stickyTrigger).css("max-width",jQuery("#wrapper").outerWidth()),1===window.sticky_header_type&&(Modernizr.mq("only screen and (max-width: "+avadaHeaderVars.side_header_break_point+"px)")?jQuery(".fusion-header-sticky-height").css("height",window.$scrolled_header_height):parseInt(window.$headerHeight,10)===parseInt(window.$initial_desktop_header_height,10)&&(jQuery(window.$stickyTrigger).stop(!0,!0).animate({height:window.$scrolled_header_height},{queue:!1,duration:h,easing:"easeOutCubic",complete:function(){jQuery(this).css("overflow","visible")}}),jQuery(".fusion-header-sticky-height").stop(!0,!0).animate({height:window.$scrolled_header_height},{queue:!1,duration:h,easing:"easeOutCubic",complete:function(){jQuery(this).css("overflow","visible")}})),"1"!==avadaHeaderVars.header_sticky_shadow&&1!==avadaHeaderVars.header_sticky_shadow&&!0!==avadaHeaderVars.header_sticky_shadow&&"true"!==avadaHeaderVars.header_sticky_shadow||setTimeout(function(){jQuery(".fusion-header").addClass("fusion-sticky-shadow")},150),avadaHeaderVars.sticky_header_shrinkage&&parseInt(window.$headerHeight,10)===parseInt(window.$initial_desktop_header_height,10)&&(jQuery(window.$stickyTrigger).find(".fusion-row").stop(!0,!0).animate({"padding-top":0,"padding-bottom":0},{queue:!1,duration:h,easing:"easeOutCubic"}),c&&(a=c.height(),c.attr("data-logo-height",c.height()),c.attr("data-logo-width",c.width()),a<window.$scrolled_header_height-10?e=(window.$scrolled_header_height-a)/2:(a=window.$scrolled_header_height-10,e=5),c.stop(!0,!0).animate({height:a},{queue:!1,duration:h,easing:"easeOutCubic",complete:function(){jQuery(this).css("display","")},step:function(){jQuery(this).css("display","")}})),jQuery(".fusion-logo").stop(!0,!0).animate({"margin-top":e,"margin-bottom":e},{queue:!1,duration:h,easing:"easeOutCubic"}),jQuery(".fusion-header-v6").length||jQuery(".fusion-main-menu > ul > li").not(".fusion-middle-logo-menu-logo").find("> a").stop(!0,!0).animate({height:window.$scrolled_header_height},{queue:!1,duration:h,easing:"easeOutCubic"}))),2===window.sticky_header_type&&"menu_and_logo"===avadaHeaderVars.header_sticky_type2_layout&&(jQuery(window.$stickyTrigger).css("height",""),window.$headerHeight=jQuery(window.$stickyTrigger).outerHeight(),window.$scrolled_header_height=window.$headerHeight,jQuery(window.$stickyTrigger).css("height",window.$scrolled_header_height),jQuery(".fusion-header-sticky-height").css("height",window.$scrolled_header_height)),3===window.sticky_header_type&&Modernizr.mq("only screen and (max-width:"+avadaHeaderVars.side_header_break_point+"px)")&&(jQuery("#side-header-sticky").css({height:jQuery("#side-header").outerHeight()}),jQuery("#side-header").css({position:"fixed",top:window.$wpadminbarHeight+window.$woo_store_notice+window.$top_frame}).addClass("fusion-is-sticky")),d=!0):jQuery(window).scrollTop()<=window.$stickyTrigger_position&&(jQuery(".fusion-header-wrapper").removeClass("fusion-is-sticky"),"function"==typeof resizeOverlaySearch&&resizeOverlaySearch(),jQuery(".fusion-header").removeClass("fusion-sticky-shadow"),c=jQuery(".fusion-logo img:visible"),"modern"===avadaHeaderVars.mobile_menu_design&&0===jQuery(".fusion-is-sticky").length&&1<=jQuery(".fusion-mobile-sticky-nav-holder").length&&jQuery(".fusion-mobile-nav-holder").is(":visible")&&jQuery(".fusion-mobile-sticky-nav-holder").hide(),1===window.sticky_header_type&&(Modernizr.mq("only screen and (max-width: "+avadaHeaderVars.side_header_break_point+"px)")?jQuery(".fusion-header-sticky-height").css("height",window.$headerHeight):(1===window.sticky_header_type&&65===parseInt(window.$headerHeight,10)&&(window.$headerHeight=window.$initial_desktop_header_height),parseInt(window.$headerHeight,10)===parseInt(window.$initial_desktop_header_height,10)?(jQuery(window.$stickyTrigger).stop(!0,!0).animate({height:window.$headerHeight},{queue:!1,duration:h,easing:"easeOutCubic",complete:function(){jQuery(this).css("overflow","visible")},step:function(){jQuery(this).css("overflow","visible")}}),jQuery(".fusion-header-sticky-height").stop(!0,!0).animate({height:window.$headerHeight},{queue:!1,duration:h,easing:"easeOutCubic",complete:function(){jQuery(this).css("overflow","visible")},step:function(){jQuery(this).css("overflow","visible")}})):jQuery(".fusion-header-v7").length&&(jQuery(".fusion-header-sticky-height").css("height",jQuery(".fusion-middle-logo-menu").height()),jQuery(".fusion-header").css("height",jQuery(".fusion-middle-logo-menu").height()))),avadaHeaderVars.sticky_header_shrinkage&&parseInt(window.$headerHeight,10)===parseInt(window.$initial_desktop_header_height,10)&&(jQuery(window.$stickyTrigger).find(".fusion-row").stop(!0,!0).animate({"padding-top":avadaHeaderVars.header_padding_top,"padding-bottom":avadaHeaderVars.header_padding_bottom},{queue:!1,duration:h,easing:"easeOutCubic"}),c&&c.stop(!0,!0).animate({height:c.data("logo-height")},{queue:!1,duration:h,easing:"easeOutCubic",complete:function(){jQuery(this).css("display",""),jQuery(".fusion-sticky-logo").css("height","")}}),jQuery(".fusion-logo").stop(!0,!0).animate({"margin-top":window.$logoMarginTop,"margin-bottom":window.$logoMarginBottom},{queue:!1,duration:h,easing:"easeOutCubic"}),jQuery(".fusion-header-v6").length||jQuery(".fusion-main-menu > ul > li").not(".fusion-middle-logo-menu-logo").find("> a").stop(!0,!0).animate({height:b},{queue:!1,duration:h,easing:"easeOutCubic"}))),2===window.sticky_header_type&&"menu_and_logo"===avadaHeaderVars.header_sticky_type2_layout&&(jQuery(window.$stickyTrigger).css("height",""),window.$headerHeight=jQuery(window.$stickyTrigger).outerHeight(),window.$scrolled_header_height=window.$headerHeight,jQuery(window.$stickyTrigger).css("height",window.$scrolled_header_height),jQuery(".fusion-header-sticky-height").css("height",window.$scrolled_header_height)),3===window.sticky_header_type&&Modernizr.mq("only screen and (max-width:"+avadaHeaderVars.side_header_break_point+"px)")&&(jQuery("#side-header-sticky").css({height:""}),jQuery("#side-header").css({position:""}).removeClass("fusion-is-sticky")),d=!1)}}),jQuery(window).trigger("scroll")}function getStickyHeaderHeight(a){var b=1,c=0,d=Modernizr.mq("only screen and (min-device-width: 768px) and (max-device-width: 1366px) and (orientation: portrait)")||Modernizr.mq("only screen and (min-device-width: 768px) and (max-device-width: 1024px) and (orientation: landscape)");return a=a||!1,(jQuery(".fusion-header-v4").length||jQuery(".fusion-header-v5").length)&&(b=2),jQuery("#side-header").length&&(b="side"),avadaHeaderVars.header_sticky&&(jQuery(".fusion-header-wrapper").length||jQuery("#side-header").length)&&(1===b?(c=jQuery(".fusion-header").outerHeight(),a&&avadaHeaderVars.sticky_header_shrinkage&&(c=64)):2===b&&(c=jQuery(".fusion-secondary-main-menu").outerHeight(),"menu_and_logo"===avadaHeaderVars.header_sticky_type2_layout&&(c+=jQuery(".fusion-header").outerHeight())),Modernizr.mq("only screen and (max-width: "+avadaHeaderVars.side_header_break_point+"px)")&&(avadaHeaderVars.header_sticky_mobile?(c=jQuery(".fusion-header").outerHeight(),2===b&&"classic"===avadaHeaderVars.mobile_menu_design?(c=jQuery(".fusion-secondary-main-menu").find(".fusion-mobile-selector").height()+14,"menu_and_logo"===avadaHeaderVars.header_sticky_type2_layout&&(c+=jQuery(".fusion-header").outerHeight())):"side"===b&&(c=jQuery("#side-header").outerHeight())):c=0),!avadaHeaderVars.header_sticky_tablet&&d&&(c=0)),c}function getWaypointTopOffset(){var a=0,b=Modernizr.mq("only screen and (min-device-width: 768px) and (max-device-width: 1366px) and (orientation: portrait)")||Modernizr.mq("only screen and (min-device-width: 768px) and (max-device-width: 1024px) and (orientation: landscape)"),c=1;return(jQuery(".fusion-header-v4").length||jQuery(".fusion-header-v5").length)&&(c=2),jQuery("#side-header").length&&(c="side"),avadaHeaderVars.header_sticky&&(jQuery(".fusion-header-wrapper").length||jQuery("#side-header").length)&&(1===c?a=jQuery(".fusion-header").outerHeight()-1:2===c&&(a=jQuery(".fusion-secondary-main-menu").outerHeight(),"menu_and_logo"===avadaHeaderVars.header_sticky_type2_layout&&(a+=jQuery(".fusion-header").outerHeight()-1)),Modernizr.mq("only screen and (max-width: "+avadaHeaderVars.side_header_break_point+"px)")&&(avadaHeaderVars.header_sticky_mobile?(a=jQuery(".fusion-header").outerHeight()-1,"side"===c&&(a=jQuery("#side-header").outerHeight()-1)):a=0),!avadaHeaderVars.header_sticky_tablet&&b&&(a=0)),a}jQuery(window).on("load",function(){var a,b,c,d,e,f=!0;jQuery(window).scroll(function(){jQuery("#sliders-container .tfs-slider").data("parallax")&&"wide"!==avadaHeaderVars.layout_mode.toLowerCase()&&!cssua.ua.tablet_pc&&!cssua.ua.mobile&&Modernizr.mq("only screen and (min-width: "+avadaHeaderVars.side_header_break_point+"px)")&&"full"===avadaHeaderVars.scroll_offset?(c=jQuery("#sliders-container .tfs-slider"),b=jQuery(window).scrollTop(),e=0,d=jQuery("body").css("marginTop"),d=parseInt(d,10),avadaHeaderVars.header_sticky&&(1<=jQuery(".fusion-header-wrapper").length||1<=jQuery("#side-header").length)?(a=parseInt(jQuery(".fusion-header").height(),10),e=0):(a=d,e=parseInt(avadaHeaderVars.nav_height,10),1>jQuery("#side-header").length&&(a=0)),b>=jQuery("#wpadminbar").height()+d+e?(c.css("top",0),c.addClass("fusion-fixed-slider")):(c.css("top",0),c.removeClass("fusion-fixed-slider"))):jQuery("#sliders-container .tfs-slider.fusion-fixed-slider").length&&jQuery("#sliders-container .tfs-slider.fusion-fixed-slider").removeClass("fusion-fixed-slider")}),avadaHeaderVars.header_sticky&&(1<=jQuery(".fusion-header-wrapper").length||1<=jQuery("#side-header").length)&&fusionInitStickyHeader(),setTimeout(function(){f=!1,jQuery(window).trigger("resize"),f=!0},10),jQuery(window).on("resize",function(){jQuery(".woocommerce-store-notice").length&&jQuery(".woocommerce-store-notice").is(":visible")&&!jQuery(".fusion-top-frame").is(":visible")&&(jQuery("#wrapper").css("margin-top",jQuery(".woocommerce-store-notice").outerHeight()),jQuery(".sticky-header").length&&jQuery(".sticky-header").css("margin-top",jQuery(".woocommerce-store-notice").outerHeight())),jQuery(".sticky-header").length&&(765>jQuery(window).width()?jQuery("body.admin-bar #header-sticky.sticky-header").css("top","46px"):jQuery("body.admin-bar #header-sticky.sticky-header").css("top","32px"))})}),jQuery(document).ajaxComplete(function(){var a,b,c;jQuery(window).trigger("scroll"),1<=jQuery(".fusion-is-sticky").length&&window.$stickyTrigger&&3!==window.sticky_header_type&&!jQuery(".fusion-header-v6").length&&"background"!==avadaHeaderVars.nav_highlight_style&&(a=1>=Math.abs(jQuery(window.$stickyTrigger).height()-jQuery(".fusion-is-sticky .fusion-header > .fusion-row").outerHeight())?jQuery(".fusion-is-sticky .fusion-header > .fusion-row"):jQuery(window.$stickyTrigger),b=parseInt(avadaHeaderVars.nav_highlight_border,10),c=a.height(),a.height()-b,2===window.sticky_header_type&&(a=jQuery(".fusion-secondary-main-menu"),c=a.find(".fusion-main-menu > ul > li > a").outerHeight(),c-b),jQuery(".fusion-main-menu > ul > li").not(".fusion-middle-logo-menu-logo").find("> a").css("height",c+"px"))}),window.addEventListener("fusion-reinit-sticky-header",function(){void 0!==window.parent.FusionApp&&"off"===window.parent.FusionApp.preferencesData.sticky_header||(fusionDisableStickyHeader(),Number(avadaHeaderVars.header_sticky)&&setTimeout(function(){fusionInitStickyHeader()},20))}),window.addEventListener("fusion-disable-sticky-header",function(){fusionDisableStickyHeader()}),window.addEventListener("fusion-init-sticky-header",function(){fusionInitStickyHeader()}),window.addEventListener("fusion-resize-stickyheader",function(){jQuery(window).trigger("resize.stickyheader")});