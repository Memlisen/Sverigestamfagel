!function(e){var a,n,t,i,s;function o(){"block"===e(".menu-toggle").css("display")?(n.hasClass("toggled-on")?n.attr("aria-expanded","true"):n.attr("aria-expanded","false"),t.closest(".main-navigation").hasClass("toggled-on")?t.attr("aria-expanded","true"):t.attr("aria-expanded","false")):(n.removeAttr("aria-expanded"),t.removeAttr("aria-expanded"),n.removeAttr("aria-controls"))}i=e(".main-navigation"),s=e("<button />",{class:"dropdown-toggle","aria-expanded":!1}).append(e("<span />",{class:"dropdown-symbol",text:"+"})).append(e("<span />",{class:"screen-reader-text",text:sverigestamfagelforeningScreenReaderText.expand})),i.find(".menu-item-has-children > a, .page_item_has_children > a").after(s),i.find(".dropdown-toggle").click(function(a){var n=e(this),t=n.find(".screen-reader-text");dropdownSymbol=n.find(".dropdown-symbol"),dropdownSymbol.text("-"===dropdownSymbol.text()?"+":"-"),a.preventDefault(),n.toggleClass("toggled-on"),n.next(".children, .sub-menu").toggleClass("toggled-on"),n.attr("aria-expanded","false"===n.attr("aria-expanded")?"true":"false"),t.text(t.text()===sverigestamfagelforeningScreenReaderText.expand?sverigestamfagelforeningScreenReaderText.collapse:sverigestamfagelforeningScreenReaderText.expand)}),a=e("#masthead"),n=a.find(".menu-toggle"),t=a.find(".main-navigation > div > ul"),n.length&&(n.add(t).attr("aria-expanded","false"),n.on("click.sverigestamfagelforening",function(){e(t.closest(".main-navigation"),this).toggleClass("toggled-on"),e(this).add(t).attr("aria-expanded","false"===e(this).add(t).attr("aria-expanded")?"true":"false")})),function(){function a(){"none"===e(".menu-toggle").css("display")?(e(document.body).on("touchstart.sverigestamfagelforening",function(a){e(a.target).closest(".main-navigation li").length||e(".main-navigation li").removeClass("focus")}),t.find(".menu-item-has-children > a, .page_item_has_children > a").on("touchstart.sverigestamfagelforening",function(a){var n=e(this).parent("li");n.hasClass("focus")||(a.preventDefault(),n.toggleClass("focus"),n.siblings(".focus").removeClass("focus"))})):t.find(".menu-item-has-children > a, .page_item_has_children > a").unbind("touchstart.sverigestamfagelforening")}t.length&&t.children().length&&("ontouchstart"in window&&(e(window).on("resize.sverigestamfagelforening",a),a()),t.find("a").on("focus.sverigestamfagelforening blur.sverigestamfagelforening",function(){e(this).parents(".menu-item, .page_item").toggleClass("focus")}))}(),e(document).ready(function(){e(window).on("load.sverigestamfagelforening",o),e(window).on("resize.sverigestamfagelforening",o)})}(jQuery);
!function(o){var t=o("header"),s=o("html, body").scrollTop(),i=o(".main-navigation"),n=i.height(),a=i.offset().top;o(window).scroll(function(){s=o("html, body").scrollTop(),setTimeout(function(){s>a?(i.addClass("stick"),t.css({"padding-bottom":n})):(i.removeClass("stick"),t.css({"padding-bottom":0}))},20)})}(jQuery);
!function(){var e=navigator.userAgent.toLowerCase().indexOf("webkit")>-1,t=navigator.userAgent.toLowerCase().indexOf("opera")>-1,n=navigator.userAgent.toLowerCase().indexOf("msie")>-1;(e||t||n)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var e,t=location.hash.substring(1);/^[A-z0-9_-]+$/.test(t)&&(e=document.getElementById(t))&&(/^(?:a|select|input|button|textarea)$/i.test(e.tagName)||(e.tabIndex=-1),e.focus())},!1)}();
!function(s){s(".stf-slider");var d=s(".stf-slider ul"),l=s(".stf-slider ul .slide"),e=s(".stf-slider .previous"),i=s(".stf-slider .next"),t=0,n=0;1===l.length&&(e.css({display:"none"}),i.css({display:"none"})),d.css({width:100*l.length+"%"}),l.css({width:100/l.length+"%"}),s(l[t]).find("div").addClass("current"),e.click(function(){s(l[t]).find("div").removeClass("current"),n<0?(n+=100,s(l[--t]).find("div").addClass("current"),s(".stf-slider ul").css({left:n+"%"})):(t=l.length-1,n=-100*l.length+100,s(l[t]).find("div").addClass("current"),s(".stf-slider ul").css({left:n+"%"}))}),i.click(function(){s(l[t]).find("div").removeClass("current"),n>-(100*l.length-100)?(n-=100,s(l[++t]).find("div").addClass("current"),s(".stf-slider ul").css({left:n+"%"})):(n=0,s(l[t=0]).find("div").addClass("current"),s(".stf-slider ul").css({left:n}))})}(jQuery);