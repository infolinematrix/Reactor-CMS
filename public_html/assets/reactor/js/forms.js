<<<<<<< HEAD
!function(e){"function"==typeof define&&define.amd?define(["jquery"],e):"object"==typeof exports?module.exports=e(require("jquery")):e(jQuery)}(function(e){"use strict";function t(t,a){var i,r,n,o,s,d=e('<div class="minicolors" />'),u=e.minicolors.defaults;if(!t.data("minicolors-initialized")){if(a=e.extend(!0,{},u,a),d.addClass("minicolors-theme-"+a.theme).toggleClass("minicolors-with-opacity",a.opacity).toggleClass("minicolors-no-data-uris",a.dataUris!==!0),void 0!==a.position&&e.each(a.position.split(" "),function(){d.addClass("minicolors-position-"+this)}),i="rgb"===a.format?a.opacity?"25":"20":a.keywords?"11":"7",t.addClass("minicolors-input").data("minicolors-initialized",!1).data("minicolors-settings",a).prop("size",i).wrap(d).after('<div class="minicolors-panel minicolors-slider-'+a.control+'"><div class="minicolors-slider minicolors-sprite"><div class="minicolors-picker"></div></div><div class="minicolors-opacity-slider minicolors-sprite"><div class="minicolors-picker"></div></div><div class="minicolors-grid minicolors-sprite"><div class="minicolors-grid-inner"></div><div class="minicolors-picker"><div></div></div></div></div>'),a.inline||(t.after('<span class="minicolors-swatch minicolors-sprite minicolors-input-swatch"><span class="minicolors-swatch-color"></span></span>'),t.next(".minicolors-input-swatch").on("click",function(e){e.preventDefault(),t.focus()})),o=t.parent().find(".minicolors-panel"),o.on("selectstart",function(){return!1}).end(),a.swatches&&0!==a.swatches.length)for(a.swatches.length>7&&(a.swatches.length=7),o.addClass("minicolors-with-swatches"),r=e('<ul class="minicolors-swatches"></ul>').appendTo(o),s=0;s<a.swatches.length;++s)n=a.swatches[s],n=v(n)?m(n,!0):T(f(n,!0)),e('<li class="minicolors-swatch minicolors-sprite"><span class="minicolors-swatch-color"></span></li>').appendTo(r).data("swatch-color",a.swatches[s]).find(".minicolors-swatch-color").css({backgroundColor:x(n),opacity:n.a}),a.swatches[s]=n;a.inline&&t.parent().addClass("minicolors-inline"),l(t,!1),t.data("minicolors-initialized",!0)}}function a(e){var t=e.parent();e.removeData("minicolors-initialized").removeData("minicolors-settings").removeProp("size").removeClass("minicolors-input"),t.before(e).remove()}function i(e){var t=e.parent(),a=t.find(".minicolors-panel"),i=e.data("minicolors-settings");!e.data("minicolors-initialized")||e.prop("disabled")||t.hasClass("minicolors-inline")||t.hasClass("minicolors-focus")||(r(),t.addClass("minicolors-focus"),a.stop(!0,!0).fadeIn(i.showSpeed,function(){i.show&&i.show.call(e.get(0))}))}function r(){e(".minicolors-focus").each(function(){var t=e(this),a=t.find(".minicolors-input"),i=t.find(".minicolors-panel"),r=a.data("minicolors-settings");i.fadeOut(r.hideSpeed,function(){r.hide&&r.hide.call(a.get(0)),t.removeClass("minicolors-focus")})})}function n(e,t,a){var i,r,n,s,l=e.parents(".minicolors").find(".minicolors-input"),d=l.data("minicolors-settings"),u=e.find("[class$=-picker]"),c=e.offset().left,h=e.offset().top,f=Math.round(t.pageX-c),m=Math.round(t.pageY-h),g=a?d.animationSpeed:0;t.originalEvent.changedTouches&&(f=t.originalEvent.changedTouches[0].pageX-c,m=t.originalEvent.changedTouches[0].pageY-h),0>f&&(f=0),0>m&&(m=0),f>e.width()&&(f=e.width()),m>e.height()&&(m=e.height()),e.parent().is(".minicolors-slider-wheel")&&u.parent().is(".minicolors-grid")&&(i=75-f,r=75-m,n=Math.sqrt(i*i+r*r),s=Math.atan2(r,i),0>s&&(s+=2*Math.PI),n>75&&(n=75,f=75-75*Math.cos(s),m=75-75*Math.sin(s)),f=Math.round(f),m=Math.round(m)),e.is(".minicolors-grid")?u.stop(!0).animate({top:m+"px",left:f+"px"},g,d.animationEasing,function(){o(l,e)}):u.stop(!0).animate({top:m+"px"},g,d.animationEasing,function(){o(l,e)})}function o(e,t){function a(e,t){var a,i;return e.length&&t?(a=e.offset().left,i=e.offset().top,{x:a-t.offset().left+e.outerWidth()/2,y:i-t.offset().top+e.outerHeight()/2}):null}var i,r,n,o,l,u,c,h=e.val(),f=e.attr("data-opacity"),m=e.parent(),g=e.data("minicolors-settings"),v=m.find(".minicolors-input-swatch"),y=m.find(".minicolors-grid"),b=m.find(".minicolors-slider"),k=m.find(".minicolors-opacity-slider"),x=y.find("[class$=-picker]"),D=b.find("[class$=-picker]"),S=k.find("[class$=-picker]"),T=a(x,y),_=a(D,b),M=a(S,k);if(t.is(".minicolors-grid, .minicolors-slider, .minicolors-opacity-slider")){switch(g.control){case"wheel":o=y.width()/2-T.x,l=y.height()/2-T.y,u=Math.sqrt(o*o+l*l),c=Math.atan2(l,o),0>c&&(c+=2*Math.PI),u>75&&(u=75,T.x=69-75*Math.cos(c),T.y=69-75*Math.sin(c)),r=p(u/.75,0,100),i=p(180*c/Math.PI,0,360),n=p(100-Math.floor(_.y*(100/b.height())),0,100),h=w({h:i,s:r,b:n}),b.css("backgroundColor",w({h:i,s:r,b:100}));break;case"saturation":i=p(parseInt(T.x*(360/y.width()),10),0,360),r=p(100-Math.floor(_.y*(100/b.height())),0,100),n=p(100-Math.floor(T.y*(100/y.height())),0,100),h=w({h:i,s:r,b:n}),b.css("backgroundColor",w({h:i,s:100,b:n})),m.find(".minicolors-grid-inner").css("opacity",r/100);break;case"brightness":i=p(parseInt(T.x*(360/y.width()),10),0,360),r=p(100-Math.floor(T.y*(100/y.height())),0,100),n=p(100-Math.floor(_.y*(100/b.height())),0,100),h=w({h:i,s:r,b:n}),b.css("backgroundColor",w({h:i,s:r,b:100})),m.find(".minicolors-grid-inner").css("opacity",1-n/100);break;default:i=p(360-parseInt(_.y*(360/b.height()),10),0,360),r=p(Math.floor(T.x*(100/y.width())),0,100),n=p(100-Math.floor(T.y*(100/y.height())),0,100),h=w({h:i,s:r,b:n}),y.css("backgroundColor",w({h:i,s:100,b:100}))}f=g.opacity?parseFloat(1-M.y/k.height()).toFixed(2):1,s(e,h,f)}else v.find("span").css({backgroundColor:h,opacity:f}),d(e,h,f)}function s(e,t,a){var i,r=e.parent(),n=e.data("minicolors-settings"),o=r.find(".minicolors-input-swatch");n.opacity&&e.attr("data-opacity",a),"rgb"===n.format?(i=v(t)?m(t,!0):T(f(t,!0)),a=""===e.attr("data-opacity")?1:p(parseFloat(e.attr("data-opacity")).toFixed(2),0,1),(isNaN(a)||!n.opacity)&&(a=1),t=e.minicolors("rgbObject").a<=1&&i&&n.opacity?"rgba("+i.r+", "+i.g+", "+i.b+", "+parseFloat(a)+")":"rgb("+i.r+", "+i.g+", "+i.b+")"):(v(t)&&(t=k(t)),t=h(t,n.letterCase)),e.val(t),o.find("span").css({backgroundColor:t,opacity:a}),d(e,t,a)}function l(t,a){var i,r,n,o,s,l,u,c,b,x,S=t.parent(),T=t.data("minicolors-settings"),_=S.find(".minicolors-input-swatch"),M=S.find(".minicolors-grid"),O=S.find(".minicolors-slider"),C=S.find(".minicolors-opacity-slider"),W=M.find("[class$=-picker]"),F=O.find("[class$=-picker]"),P=C.find("[class$=-picker]");switch(v(t.val())?(i=k(t.val()),s=p(parseFloat(y(t.val())).toFixed(2),0,1),s&&t.attr("data-opacity",s)):i=h(f(t.val(),!0),T.letterCase),i||(i=h(g(T.defaultValue,!0),T.letterCase)),r=D(i),o=T.keywords?e.map(T.keywords.split(","),function(t){return e.trim(t.toLowerCase())}):[],l=""!==t.val()&&e.inArray(t.val().toLowerCase(),o)>-1?h(t.val()):v(t.val())?m(t.val()):i,a||t.val(l),T.opacity&&(n=""===t.attr("data-opacity")?1:p(parseFloat(t.attr("data-opacity")).toFixed(2),0,1),isNaN(n)&&(n=1),t.attr("data-opacity",n),_.find("span").css("opacity",n),c=p(C.height()-C.height()*n,0,C.height()),P.css("top",c+"px")),"transparent"===t.val().toLowerCase()&&_.find("span").css("opacity",0),_.find("span").css("backgroundColor",i),T.control){case"wheel":b=p(Math.ceil(.75*r.s),0,M.height()/2),x=r.h*Math.PI/180,u=p(75-Math.cos(x)*b,0,M.width()),c=p(75-Math.sin(x)*b,0,M.height()),W.css({top:c+"px",left:u+"px"}),c=150-r.b/(100/M.height()),""===i&&(c=0),F.css("top",c+"px"),O.css("backgroundColor",w({h:r.h,s:r.s,b:100}));break;case"saturation":u=p(5*r.h/12,0,150),c=p(M.height()-Math.ceil(r.b/(100/M.height())),0,M.height()),W.css({top:c+"px",left:u+"px"}),c=p(O.height()-r.s*(O.height()/100),0,O.height()),F.css("top",c+"px"),O.css("backgroundColor",w({h:r.h,s:100,b:r.b})),S.find(".minicolors-grid-inner").css("opacity",r.s/100);break;case"brightness":u=p(5*r.h/12,0,150),c=p(M.height()-Math.ceil(r.s/(100/M.height())),0,M.height()),W.css({top:c+"px",left:u+"px"}),c=p(O.height()-r.b*(O.height()/100),0,O.height()),F.css("top",c+"px"),O.css("backgroundColor",w({h:r.h,s:r.s,b:100})),S.find(".minicolors-grid-inner").css("opacity",1-r.b/100);break;default:u=p(Math.ceil(r.s/(100/M.width())),0,M.width()),c=p(M.height()-Math.ceil(r.b/(100/M.height())),0,M.height()),W.css({top:c+"px",left:u+"px"}),c=p(O.height()-r.h/(360/O.height()),0,O.height()),F.css("top",c+"px"),M.css("backgroundColor",w({h:r.h,s:100,b:100}))}t.data("minicolors-initialized")&&d(t,l,n)}function d(e,t,a){var i,r,n,o=e.data("minicolors-settings"),s=e.data("minicolors-lastChange");if(!s||s.value!==t||s.opacity!==a){if(e.data("minicolors-lastChange",{value:t,opacity:a}),o.swatches&&0!==o.swatches.length){for(i=v(t)?m(t,!0):T(t),r=-1,n=0;n<o.swatches.length;++n)if(i.r===o.swatches[n].r&&i.g===o.swatches[n].g&&i.b===o.swatches[n].b&&i.a===o.swatches[n].a){r=n;break}e.parent().find(".minicolors-swatches .minicolors-swatch").removeClass("selected"),-1!==n&&e.parent().find(".minicolors-swatches .minicolors-swatch").eq(n).addClass("selected")}o.change&&(o.changeDelay?(clearTimeout(e.data("minicolors-changeTimeout")),e.data("minicolors-changeTimeout",setTimeout(function(){o.change.call(e.get(0),t,a)},o.changeDelay))):o.change.call(e.get(0),t,a)),e.trigger("change").trigger("input")}}function u(t){var a=f(e(t).val(),!0),i=T(a),r=e(t).attr("data-opacity");return i?(void 0!==r&&e.extend(i,{a:parseFloat(r)}),i):null}function c(t,a){var i=f(e(t).val(),!0),r=T(i),n=e(t).attr("data-opacity");return r?(void 0===n&&(n=1),a?"rgba("+r.r+", "+r.g+", "+r.b+", "+parseFloat(n)+")":"rgb("+r.r+", "+r.g+", "+r.b+")"):null}function h(e,t){return"uppercase"===t?e.toUpperCase():e.toLowerCase()}function f(e,t){return e=e.replace(/^#/g,""),e.match(/^[A-F0-9]{3,6}/gi)?3!==e.length&&6!==e.length?"":(3===e.length&&t&&(e=e[0]+e[0]+e[1]+e[1]+e[2]+e[2]),"#"+e):""}function m(e,t){var a=e.replace(/[^\d,.]/g,""),i=a.split(",");return i[0]=p(parseInt(i[0],10),0,255),i[1]=p(parseInt(i[1],10),0,255),i[2]=p(parseInt(i[2],10),0,255),i[3]&&(i[3]=p(parseFloat(i[3],10),0,1)),t?{r:i[0],g:i[1],b:i[2],a:i[3]?i[3]:null}:"undefined"!=typeof i[3]&&i[3]<=1?"rgba("+i[0]+", "+i[1]+", "+i[2]+", "+i[3]+")":"rgb("+i[0]+", "+i[1]+", "+i[2]+")"}function g(e,t){return v(e)?m(e):f(e,t)}function p(e,t,a){return t>e&&(e=t),e>a&&(e=a),e}function v(e){var t=e.match(/^rgba?[\s+]?\([\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?/i);return!(!t||4!==t.length)}function y(e){return e=e.match(/^rgba?[\s+]?\([\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?,[\s+]?(\d+(\.\d{1,2})?|\.\d{1,2})[\s+]?/i),e&&6===e.length?e[4]:"1"}function b(e){var t={},a=Math.round(e.h),i=Math.round(255*e.s/100),r=Math.round(255*e.b/100);if(0===i)t.r=t.g=t.b=r;else{var n=r,o=(255-i)*r/255,s=(n-o)*(a%60)/60;360===a&&(a=0),60>a?(t.r=n,t.b=o,t.g=o+s):120>a?(t.g=n,t.b=o,t.r=n-s):180>a?(t.g=n,t.r=o,t.b=o+s):240>a?(t.b=n,t.r=o,t.g=n-s):300>a?(t.b=n,t.g=o,t.r=o+s):360>a?(t.r=n,t.g=o,t.b=n-s):(t.r=0,t.g=0,t.b=0)}return{r:Math.round(t.r),g:Math.round(t.g),b:Math.round(t.b)}}function k(e){return e=e.match(/^rgba?[\s+]?\([\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?/i),e&&4===e.length?"#"+("0"+parseInt(e[1],10).toString(16)).slice(-2)+("0"+parseInt(e[2],10).toString(16)).slice(-2)+("0"+parseInt(e[3],10).toString(16)).slice(-2):""}function x(t){var a=[t.r.toString(16),t.g.toString(16),t.b.toString(16)];return e.each(a,function(e,t){1===t.length&&(a[e]="0"+t)}),"#"+a.join("")}function w(e){return x(b(e))}function D(e){var t=S(T(e));return 0===t.s&&(t.h=360),t}function S(e){var t={h:0,s:0,b:0},a=Math.min(e.r,e.g,e.b),i=Math.max(e.r,e.g,e.b),r=i-a;return t.b=i,t.s=0!==i?255*r/i:0,0!==t.s?e.r===i?t.h=(e.g-e.b)/r:e.g===i?t.h=2+(e.b-e.r)/r:t.h=4+(e.r-e.g)/r:t.h=-1,t.h*=60,t.h<0&&(t.h+=360),t.s*=100/255,t.b*=100/255,t}function T(e){return e=parseInt(e.indexOf("#")>-1?e.substring(1):e,16),{r:e>>16,g:(65280&e)>>8,b:255&e}}e.minicolors={defaults:{animationSpeed:50,animationEasing:"swing",change:null,changeDelay:0,control:"hue",dataUris:!0,defaultValue:"",format:"hex",hide:null,hideSpeed:100,inline:!1,keywords:"",letterCase:"lowercase",opacity:!1,position:"bottom left",show:null,showSpeed:100,theme:"default",swatches:[]}},e.extend(e.fn,{minicolors:function(n,o){switch(n){case"destroy":return e(this).each(function(){a(e(this))}),e(this);case"hide":return r(),e(this);case"opacity":return void 0===o?e(this).attr("data-opacity"):(e(this).each(function(){l(e(this).attr("data-opacity",o))}),e(this));case"rgbObject":return u(e(this),"rgbaObject"===n);case"rgbString":case"rgbaString":return c(e(this),"rgbaString"===n);case"settings":return void 0===o?e(this).data("minicolors-settings"):(e(this).each(function(){var t=e(this).data("minicolors-settings")||{};a(e(this)),e(this).minicolors(e.extend(!0,t,o))}),e(this));case"show":return i(e(this).eq(0)),e(this);case"value":return void 0===o?e(this).val():(e(this).each(function(){"object"==typeof o?(o.opacity&&e(this).attr("data-opacity",p(o.opacity,0,1)),o.color&&e(this).val(o.color)):e(this).val(o),l(e(this))}),e(this));default:return"create"!==n&&(o=n),e(this).each(function(){t(e(this),o)}),e(this)}}}),e(document).on("mousedown.minicolors touchstart.minicolors",function(t){e(t.target).parents().add(t.target).hasClass("minicolors")||r()}).on("mousedown.minicolors touchstart.minicolors",".minicolors-grid, .minicolors-slider, .minicolors-opacity-slider",function(t){var a=e(this);t.preventDefault(),e(document).data("minicolors-target",a),n(a,t,!0)}).on("mousemove.minicolors touchmove.minicolors",function(t){var a=e(document).data("minicolors-target");a&&n(a,t)}).on("mouseup.minicolors touchend.minicolors",function(){e(this).removeData("minicolors-target")}).on("click.minicolors",".minicolors-swatches li",function(t){t.preventDefault();var a=e(this),i=a.parents(".minicolors").find(".minicolors-input"),r=a.data("swatch-color");s(i,r,y(r)),l(i)}).on("mousedown.minicolors touchstart.minicolors",".minicolors-input-swatch",function(t){var a=e(this).parent().find(".minicolors-input");t.preventDefault(),i(a)}).on("focus.minicolors",".minicolors-input",function(){var t=e(this);t.data("minicolors-initialized")&&i(t)}).on("blur.minicolors",".minicolors-input",function(){var t,a,i,r,n,o=e(this),s=o.data("minicolors-settings");o.data("minicolors-initialized")&&(t=s.keywords?e.map(s.keywords.split(","),function(t){return e.trim(t.toLowerCase())}):[],""!==o.val()&&e.inArray(o.val().toLowerCase(),t)>-1?n=o.val():(v(o.val())?i=m(o.val(),!0):(a=f(o.val(),!0),i=a?T(a):null),n=null===i?s.defaultValue:"rgb"===s.format?m(s.opacity?"rgba("+i.r+","+i.g+","+i.b+","+o.attr("data-opacity")+")":"rgb("+i.r+","+i.g+","+i.b+")"):x(i)),r=s.opacity?o.attr("data-opacity"):1,"transparent"===n.toLowerCase()&&(r=0),o.closest(".minicolors").find(".minicolors-input-swatch > span").css("opacity",r),o.val(n),""===o.val()&&o.val(g(s.defaultValue,!0)),o.val(h(o.val(),s.letterCase)))}).on("keydown.minicolors",".minicolors-input",function(t){var a=e(this);if(a.data("minicolors-initialized"))switch(t.keyCode){case 9:r();break;case 13:case 27:r(),a.blur()}}).on("keyup.minicolors",".minicolors-input",function(){var t=e(this);t.data("minicolors-initialized")&&l(t,!0)}).on("paste.minicolors",".minicolors-input",function(){var t=e(this);t.data("minicolors-initialized")&&setTimeout(function(){l(t,!0)},1)})});var DateFormatter;!function(){"use strict";var e,t,a,i,r,n;r=864e5,n=3600,e=function(e,t){return"string"==typeof e&&"string"==typeof t&&e.toLowerCase()===t.toLowerCase()},t=function(e,a,i){var r=i||"0",n=e.toString();return n.length<a?t(r+n,a):n},a=function(e){var t,i;for(e=e||{},t=1;t<arguments.length;t++)if(i=arguments[t])for(var r in i)i.hasOwnProperty(r)&&("object"==typeof i[r]?a(e[r],i[r]):e[r]=i[r]);return e},i={dateSettings:{days:["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"],daysShort:["Sun","Mon","Tue","Wed","Thu","Fri","Sat"],months:["January","February","March","April","May","June","July","August","September","October","November","December"],monthsShort:["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],meridiem:["AM","PM"],ordinal:function(e){var t=e%10,a={1:"st",2:"nd",3:"rd"};return 1!==Math.floor(e%100/10)&&a[t]?a[t]:"th"}},separators:/[ \-+\/\.T:@]/g,validParts:/[dDjlNSwzWFmMntLoYyaABgGhHisueTIOPZcrU]/g,intParts:/[djwNzmnyYhHgGis]/g,tzParts:/\b(?:[PMCEA][SDP]T|(?:Pacific|Mountain|Central|Eastern|Atlantic) (?:Standard|Daylight|Prevailing) Time|(?:GMT|UTC)(?:[-+]\d{4})?)\b/g,tzClip:/[^-+\dA-Z]/g},DateFormatter=function(e){var t=this,r=a(i,e);t.dateSettings=r.dateSettings,t.separators=r.separators,t.validParts=r.validParts,t.intParts=r.intParts,t.tzParts=r.tzParts,t.tzClip=r.tzClip},DateFormatter.prototype={constructor:DateFormatter,parseDate:function(t,a){var i,r,n,o,s,l,d,u,c,h,f=this,m=!1,g=!1,p=f.dateSettings,v={date:null,year:null,month:null,day:null,hour:0,min:0,sec:0};if(t){if(t instanceof Date)return t;if("number"==typeof t)return new Date(t);if("U"===a)return n=parseInt(t),n?new Date(1e3*n):t;if("string"!=typeof t)return"";if(i=a.match(f.validParts),!i||0===i.length)throw new Error("Invalid date format definition.");for(r=t.replace(f.separators,"\0").split("\0"),n=0;n<r.length;n++)switch(o=r[n],s=parseInt(o),i[n]){case"y":case"Y":c=o.length,2===c?v.year=parseInt((70>s?"20":"19")+o):4===c&&(v.year=s),m=!0;break;case"m":case"n":case"M":case"F":isNaN(o)?(l=p.monthsShort.indexOf(o),l>-1&&(v.month=l+1),l=p.months.indexOf(o),l>-1&&(v.month=l+1)):s>=1&&12>=s&&(v.month=s),m=!0;break;case"d":case"j":s>=1&&31>=s&&(v.day=s),m=!0;break;case"g":case"h":d=i.indexOf("a")>-1?i.indexOf("a"):i.indexOf("A")>-1?i.indexOf("A"):-1,h=r[d],d>-1?(u=e(h,p.meridiem[0])?0:e(h,p.meridiem[1])?12:-1,s>=1&&12>=s&&u>-1?v.hour=s+u-1:s>=0&&23>=s&&(v.hour=s)):s>=0&&23>=s&&(v.hour=s),g=!0;break;case"G":case"H":s>=0&&23>=s&&(v.hour=s),g=!0;break;case"i":s>=0&&59>=s&&(v.min=s),g=!0;break;case"s":s>=0&&59>=s&&(v.sec=s),g=!0}if(m===!0&&v.year&&v.month&&v.day)v.date=new Date(v.year,v.month-1,v.day,v.hour,v.min,v.sec,0);else{if(g!==!0)return!1;v.date=new Date(0,0,0,v.hour,v.min,v.sec,0)}return v.date}},guessDate:function(e,t){if("string"!=typeof e)return e;var a,i,r,n,o=this,s=e.replace(o.separators,"\0").split("\0"),l=/^[djmn]/g,d=t.match(o.validParts),u=new Date,c=0;if(!l.test(d[0]))return e;for(i=0;i<s.length;i++){switch(c=2,r=s[i],n=parseInt(r.substr(0,2)),i){case 0:"m"===d[0]||"n"===d[0]?u.setMonth(n-1):u.setDate(n);break;case 1:"m"===d[0]||"n"===d[0]?u.setDate(n):u.setMonth(n-1);break;case 2:a=u.getFullYear(),r.length<4?(u.setFullYear(parseInt(a.toString().substr(0,4-r.length)+r)),c=r.length):(u.setFullYear=parseInt(r.substr(0,4)),c=4);break;case 3:u.setHours(n);break;case 4:u.setMinutes(n);break;case 5:u.setSeconds(n)}r.substr(c).length>0&&s.splice(i+1,0,r.substr(c))}return u},parseFormat:function(e,a){var i,o=this,s=o.dateSettings,l=/\\?(.?)/gi,d=function(e,t){return i[e]?i[e]():t};return i={d:function(){return t(i.j(),2)},D:function(){return s.daysShort[i.w()]},j:function(){return a.getDate()},l:function(){return s.days[i.w()]},N:function(){return i.w()||7},w:function(){return a.getDay()},z:function(){var e=new Date(i.Y(),i.n()-1,i.j()),t=new Date(i.Y(),0,1);return Math.round((e-t)/r)},W:function(){var e=new Date(i.Y(),i.n()-1,i.j()-i.N()+3),a=new Date(e.getFullYear(),0,4);return t(1+Math.round((e-a)/r/7),2)},F:function(){return s.months[a.getMonth()]},m:function(){return t(i.n(),2)},M:function(){return s.monthsShort[a.getMonth()]},n:function(){return a.getMonth()+1},t:function(){return new Date(i.Y(),i.n(),0).getDate()},L:function(){var e=i.Y();return e%4===0&&e%100!==0||e%400===0?1:0},o:function(){var e=i.n(),t=i.W(),a=i.Y();return a+(12===e&&9>t?1:1===e&&t>9?-1:0)},Y:function(){return a.getFullYear()},y:function(){return i.Y().toString().slice(-2)},a:function(){return i.A().toLowerCase()},A:function(){var e=i.G()<12?0:1;return s.meridiem[e]},B:function(){var e=a.getUTCHours()*n,i=60*a.getUTCMinutes(),r=a.getUTCSeconds();return t(Math.floor((e+i+r+n)/86.4)%1e3,3)},g:function(){return i.G()%12||12},G:function(){return a.getHours()},h:function(){return t(i.g(),2)},H:function(){return t(i.G(),2)},i:function(){return t(a.getMinutes(),2)},s:function(){return t(a.getSeconds(),2)},u:function(){return t(1e3*a.getMilliseconds(),6)},e:function(){var e=/\((.*)\)/.exec(String(a))[1];return e||"Coordinated Universal Time"},T:function(){var e=(String(a).match(o.tzParts)||[""]).pop().replace(o.tzClip,"");return e||"UTC"},I:function(){var e=new Date(i.Y(),0),t=Date.UTC(i.Y(),0),a=new Date(i.Y(),6),r=Date.UTC(i.Y(),6);return e-t!==a-r?1:0},O:function(){var e=a.getTimezoneOffset(),i=Math.abs(e);return(e>0?"-":"+")+t(100*Math.floor(i/60)+i%60,4)},P:function(){var e=i.O();return e.substr(0,3)+":"+e.substr(3,2)},Z:function(){return 60*-a.getTimezoneOffset()},c:function(){return"Y-m-d\\TH:i:sP".replace(l,d)},r:function(){return"D, d M Y H:i:s O".replace(l,d)},U:function(){return a.getTime()/1e3||0}},d(e,e)},formatDate:function(e,t){var a,i,r,n,o,s=this,l="";if("string"==typeof e&&(e=s.parseDate(e,t),e===!1))return!1;if(e instanceof Date){for(r=t.length,a=0;r>a;a++)o=t.charAt(a),"S"!==o&&(n=s.parseFormat(o,e),a!==r-1&&s.intParts.test(o)&&"S"===t.charAt(a+1)&&(i=parseInt(n),n+=s.dateSettings.ordinal(i)),l+=n);return l}return""}}}(),function(e){"function"==typeof define&&define.amd?define(["jquery","jquery-mousewheel"],e):"object"==typeof exports?module.exports=e:e(jQuery)}(function(e){"use strict";function t(e,t,a){this.date=e,this.desc=t,this.style=a}var a={i18n:{ar:{months:["كانون الثاني","شباط","آذار","نيسان","مايو","حزيران","تموز","آب","أيلول","تشرين الأول","تشرين الثاني","كانون الأول"],dayOfWeekShort:["ن","ث","ع","خ","ج","س","ح"],dayOfWeek:["الأحد","الاثنين","الثلاثاء","الأربعاء","الخميس","الجمعة","السبت","الأحد"]},ro:{months:["Ianuarie","Februarie","Martie","Aprilie","Mai","Iunie","Iulie","August","Septembrie","Octombrie","Noiembrie","Decembrie"],dayOfWeekShort:["Du","Lu","Ma","Mi","Jo","Vi","Sâ"],dayOfWeek:["Duminică","Luni","Marţi","Miercuri","Joi","Vineri","Sâmbătă"]},id:{months:["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"],dayOfWeekShort:["Min","Sen","Sel","Rab","Kam","Jum","Sab"],dayOfWeek:["Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu"]},is:{months:["Janúar","Febrúar","Mars","Apríl","Maí","Júní","Júlí","Ágúst","September","Október","Nóvember","Desember"],dayOfWeekShort:["Sun","Mán","Þrið","Mið","Fim","Fös","Lau"],dayOfWeek:["Sunnudagur","Mánudagur","Þriðjudagur","Miðvikudagur","Fimmtudagur","Föstudagur","Laugardagur"]},bg:{months:["Януари","Февруари","Март","Април","Май","Юни","Юли","Август","Септември","Октомври","Ноември","Декември"],dayOfWeekShort:["Нд","Пн","Вт","Ср","Чт","Пт","Сб"],dayOfWeek:["Неделя","Понеделник","Вторник","Сряда","Четвъртък","Петък","Събота"]},fa:{months:["فروردین","اردیبهشت","خرداد","تیر","مرداد","شهریور","مهر","آبان","آذر","دی","بهمن","اسفند"],dayOfWeekShort:["یکشنبه","دوشنبه","سه شنبه","چهارشنبه","پنجشنبه","جمعه","شنبه"],dayOfWeek:["یک‌شنبه","دوشنبه","سه‌شنبه","چهارشنبه","پنج‌شنبه","جمعه","شنبه","یک‌شنبه"]},ru:{months:["Январь","Февраль","Март","Апрель","Май","Июнь","Июль","Август","Сентябрь","Октябрь","Ноябрь","Декабрь"],dayOfWeekShort:["Вс","Пн","Вт","Ср","Чт","Пт","Сб"],dayOfWeek:["Воскресенье","Понедельник","Вторник","Среда","Четверг","Пятница","Суббота"]},uk:{months:["Січень","Лютий","Березень","Квітень","Травень","Червень","Липень","Серпень","Вересень","Жовтень","Листопад","Грудень"],dayOfWeekShort:["Ндл","Пнд","Втр","Срд","Чтв","Птн","Сбт"],dayOfWeek:["Неділя","Понеділок","Вівторок","Середа","Четвер","П'ятниця","Субота"]},en:{months:["January","February","March","April","May","June","July","August","September","October","November","December"],dayOfWeekShort:["Sun","Mon","Tue","Wed","Thu","Fri","Sat"],dayOfWeek:["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]},el:{months:["Ιανουάριος","Φεβρουάριος","Μάρτιος","Απρίλιος","Μάιος","Ιούνιος","Ιούλιος","Αύγουστος","Σεπτέμβριος","Οκτώβριος","Νοέμβριος","Δεκέμβριος"],dayOfWeekShort:["Κυρ","Δευ","Τρι","Τετ","Πεμ","Παρ","Σαβ"],dayOfWeek:["Κυριακή","Δευτέρα","Τρίτη","Τετάρτη","Πέμπτη","Παρασκευή","Σάββατο"]},de:{months:["Januar","Februar","März","April","Mai","Juni","Juli","August","September","Oktober","November","Dezember"],dayOfWeekShort:["So","Mo","Di","Mi","Do","Fr","Sa"],dayOfWeek:["Sonntag","Montag","Dienstag","Mittwoch","Donnerstag","Freitag","Samstag"]},nl:{months:["januari","februari","maart","april","mei","juni","juli","augustus","september","oktober","november","december"],dayOfWeekShort:["zo","ma","di","wo","do","vr","za"],dayOfWeek:["zondag","maandag","dinsdag","woensdag","donderdag","vrijdag","zaterdag"]},tr:{months:["Ocak","Şubat","Mart","Nisan","Mayıs","Haziran","Temmuz","Ağustos","Eylül","Ekim","Kasım","Aralık"],dayOfWeekShort:["Paz","Pts","Sal","Çar","Per","Cum","Cts"],dayOfWeek:["Pazar","Pazartesi","Salı","Çarşamba","Perşembe","Cuma","Cumartesi"]},fr:{months:["Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Août","Septembre","Octobre","Novembre","Décembre"],dayOfWeekShort:["Dim","Lun","Mar","Mer","Jeu","Ven","Sam"],dayOfWeek:["dimanche","lundi","mardi","mercredi","jeudi","vendredi","samedi"]},es:{months:["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],dayOfWeekShort:["Dom","Lun","Mar","Mié","Jue","Vie","Sáb"],dayOfWeek:["Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado"]},th:{months:["มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม"],dayOfWeekShort:["อา.","จ.","อ.","พ.","พฤ.","ศ.","ส."],dayOfWeek:["อาทิตย์","จันทร์","อังคาร","พุธ","พฤหัส","ศุกร์","เสาร์","อาทิตย์"]},pl:{months:["styczeń","luty","marzec","kwiecień","maj","czerwiec","lipiec","sierpień","wrzesień","październik","listopad","grudzień"],dayOfWeekShort:["nd","pn","wt","śr","cz","pt","sb"],dayOfWeek:["niedziela","poniedziałek","wtorek","środa","czwartek","piątek","sobota"]},pt:{months:["Janeiro","Fevereiro","Março","Abril","Maio","Junho","Julho","Agosto","Setembro","Outubro","Novembro","Dezembro"],dayOfWeekShort:["Dom","Seg","Ter","Qua","Qui","Sex","Sab"],dayOfWeek:["Domingo","Segunda","Terça","Quarta","Quinta","Sexta","Sábado"]},ch:{months:["一月","二月","三月","四月","五月","六月","七月","八月","九月","十月","十一月","十二月"],dayOfWeekShort:["日","一","二","三","四","五","六"]},se:{months:["Januari","Februari","Mars","April","Maj","Juni","Juli","Augusti","September","Oktober","November","December"],dayOfWeekShort:["Sön","Mån","Tis","Ons","Tor","Fre","Lör"]},kr:{months:["1월","2월","3월","4월","5월","6월","7월","8월","9월","10월","11월","12월"],dayOfWeekShort:["일","월","화","수","목","금","토"],dayOfWeek:["일요일","월요일","화요일","수요일","목요일","금요일","토요일"]},it:{months:["Gennaio","Febbraio","Marzo","Aprile","Maggio","Giugno","Luglio","Agosto","Settembre","Ottobre","Novembre","Dicembre"],dayOfWeekShort:["Dom","Lun","Mar","Mer","Gio","Ven","Sab"],dayOfWeek:["Domenica","Lunedì","Martedì","Mercoledì","Giovedì","Venerdì","Sabato"]},da:{months:["January","Februar","Marts","April","Maj","Juni","July","August","September","Oktober","November","December"],dayOfWeekShort:["Søn","Man","Tir","Ons","Tor","Fre","Lør"],dayOfWeek:["søndag","mandag","tirsdag","onsdag","torsdag","fredag","lørdag"]},no:{months:["Januar","Februar","Mars","April","Mai","Juni","Juli","August","September","Oktober","November","Desember"],dayOfWeekShort:["Søn","Man","Tir","Ons","Tor","Fre","Lør"],dayOfWeek:["Søndag","Mandag","Tirsdag","Onsdag","Torsdag","Fredag","Lørdag"]},ja:{months:["1月","2月","3月","4月","5月","6月","7月","8月","9月","10月","11月","12月"],dayOfWeekShort:["日","月","火","水","木","金","土"],dayOfWeek:["日曜","月曜","火曜","水曜","木曜","金曜","土曜"]},vi:{months:["Tháng 1","Tháng 2","Tháng 3","Tháng 4","Tháng 5","Tháng 6","Tháng 7","Tháng 8","Tháng 9","Tháng 10","Tháng 11","Tháng 12"],dayOfWeekShort:["CN","T2","T3","T4","T5","T6","T7"],dayOfWeek:["Chủ nhật","Thứ hai","Thứ ba","Thứ tư","Thứ năm","Thứ sáu","Thứ bảy"]},sl:{months:["Januar","Februar","Marec","April","Maj","Junij","Julij","Avgust","September","Oktober","November","December"],dayOfWeekShort:["Ned","Pon","Tor","Sre","Čet","Pet","Sob"],dayOfWeek:["Nedelja","Ponedeljek","Torek","Sreda","Četrtek","Petek","Sobota"]},cs:{months:["Leden","Únor","Březen","Duben","Květen","Červen","Červenec","Srpen","Září","Říjen","Listopad","Prosinec"],dayOfWeekShort:["Ne","Po","Út","St","Čt","Pá","So"]},hu:{months:["Január","Február","Március","Április","Május","Június","Július","Augusztus","Szeptember","Október","November","December"],dayOfWeekShort:["Va","Hé","Ke","Sze","Cs","Pé","Szo"],dayOfWeek:["vasárnap","hétfő","kedd","szerda","csütörtök","péntek","szombat"]},az:{months:["Yanvar","Fevral","Mart","Aprel","May","Iyun","Iyul","Avqust","Sentyabr","Oktyabr","Noyabr","Dekabr"],dayOfWeekShort:["B","Be","Ça","Ç","Ca","C","Ş"],dayOfWeek:["Bazar","Bazar ertəsi","Çərşənbə axşamı","Çərşənbə","Cümə axşamı","Cümə","Şənbə"]},bs:{months:["Januar","Februar","Mart","April","Maj","Jun","Jul","Avgust","Septembar","Oktobar","Novembar","Decembar"],dayOfWeekShort:["Ned","Pon","Uto","Sri","Čet","Pet","Sub"],dayOfWeek:["Nedjelja","Ponedjeljak","Utorak","Srijeda","Četvrtak","Petak","Subota"]},ca:{months:["Gener","Febrer","Març","Abril","Maig","Juny","Juliol","Agost","Setembre","Octubre","Novembre","Desembre"],dayOfWeekShort:["Dg","Dl","Dt","Dc","Dj","Dv","Ds"],dayOfWeek:["Diumenge","Dilluns","Dimarts","Dimecres","Dijous","Divendres","Dissabte"]},"en-GB":{months:["January","February","March","April","May","June","July","August","September","October","November","December"],dayOfWeekShort:["Sun","Mon","Tue","Wed","Thu","Fri","Sat"],dayOfWeek:["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]},et:{months:["Jaanuar","Veebruar","Märts","Aprill","Mai","Juuni","Juuli","August","September","Oktoober","November","Detsember"],dayOfWeekShort:["P","E","T","K","N","R","L"],dayOfWeek:["Pühapäev","Esmaspäev","Teisipäev","Kolmapäev","Neljapäev","Reede","Laupäev"]},eu:{months:["Urtarrila","Otsaila","Martxoa","Apirila","Maiatza","Ekaina","Uztaila","Abuztua","Iraila","Urria","Azaroa","Abendua"],dayOfWeekShort:["Ig.","Al.","Ar.","Az.","Og.","Or.","La."],dayOfWeek:["Igandea","Astelehena","Asteartea","Asteazkena","Osteguna","Ostirala","Larunbata"]},fi:{months:["Tammikuu","Helmikuu","Maaliskuu","Huhtikuu","Toukokuu","Kesäkuu","Heinäkuu","Elokuu","Syyskuu","Lokakuu","Marraskuu","Joulukuu"],dayOfWeekShort:["Su","Ma","Ti","Ke","To","Pe","La"],dayOfWeek:["sunnuntai","maanantai","tiistai","keskiviikko","torstai","perjantai","lauantai"]},gl:{months:["Xan","Feb","Maz","Abr","Mai","Xun","Xul","Ago","Set","Out","Nov","Dec"],dayOfWeekShort:["Dom","Lun","Mar","Mer","Xov","Ven","Sab"],dayOfWeek:["Domingo","Luns","Martes","Mércores","Xoves","Venres","Sábado"]},hr:{months:["Siječanj","Veljača","Ožujak","Travanj","Svibanj","Lipanj","Srpanj","Kolovoz","Rujan","Listopad","Studeni","Prosinac"],dayOfWeekShort:["Ned","Pon","Uto","Sri","Čet","Pet","Sub"],dayOfWeek:["Nedjelja","Ponedjeljak","Utorak","Srijeda","Četvrtak","Petak","Subota"]},ko:{months:["1월","2월","3월","4월","5월","6월","7월","8월","9월","10월","11월","12월"],dayOfWeekShort:["일","월","화","수","목","금","토"],dayOfWeek:["일요일","월요일","화요일","수요일","목요일","금요일","토요일"]},lt:{months:["Sausio","Vasario","Kovo","Balandžio","Gegužės","Birželio","Liepos","Rugpjūčio","Rugsėjo","Spalio","Lapkričio","Gruodžio"],dayOfWeekShort:["Sek","Pir","Ant","Tre","Ket","Pen","Šeš"],dayOfWeek:["Sekmadienis","Pirmadienis","Antradienis","Trečiadienis","Ketvirtadienis","Penktadienis","Šeštadienis"]},lv:{months:["Janvāris","Februāris","Marts","Aprīlis ","Maijs","Jūnijs","Jūlijs","Augusts","Septembris","Oktobris","Novembris","Decembris"],dayOfWeekShort:["Sv","Pr","Ot","Tr","Ct","Pk","St"],dayOfWeek:["Svētdiena","Pirmdiena","Otrdiena","Trešdiena","Ceturtdiena","Piektdiena","Sestdiena"]},mk:{months:["јануари","февруари","март","април","мај","јуни","јули","август","септември","октомври","ноември","декември"],dayOfWeekShort:["нед","пон","вто","сре","чет","пет","саб"],dayOfWeek:["Недела","Понеделник","Вторник","Среда","Четврток","Петок","Сабота"]},mn:{months:["1-р сар","2-р сар","3-р сар","4-р сар","5-р сар","6-р сар","7-р сар","8-р сар","9-р сар","10-р сар","11-р сар","12-р сар"],
dayOfWeekShort:["Дав","Мяг","Лха","Пүр","Бсн","Бям","Ням"],dayOfWeek:["Даваа","Мягмар","Лхагва","Пүрэв","Баасан","Бямба","Ням"]},"pt-BR":{months:["Janeiro","Fevereiro","Março","Abril","Maio","Junho","Julho","Agosto","Setembro","Outubro","Novembro","Dezembro"],dayOfWeekShort:["Dom","Seg","Ter","Qua","Qui","Sex","Sáb"],dayOfWeek:["Domingo","Segunda","Terça","Quarta","Quinta","Sexta","Sábado"]},sk:{months:["Január","Február","Marec","Apríl","Máj","Jún","Júl","August","September","Október","November","December"],dayOfWeekShort:["Ne","Po","Ut","St","Št","Pi","So"],dayOfWeek:["Nedeľa","Pondelok","Utorok","Streda","Štvrtok","Piatok","Sobota"]},sq:{months:["Janar","Shkurt","Mars","Prill","Maj","Qershor","Korrik","Gusht","Shtator","Tetor","Nëntor","Dhjetor"],dayOfWeekShort:["Die","Hën","Mar","Mër","Enj","Pre","Shtu"],dayOfWeek:["E Diel","E Hënë","E Martē","E Mërkurë","E Enjte","E Premte","E Shtunë"]},"sr-YU":{months:["Januar","Februar","Mart","April","Maj","Jun","Jul","Avgust","Septembar","Oktobar","Novembar","Decembar"],dayOfWeekShort:["Ned","Pon","Uto","Sre","čet","Pet","Sub"],dayOfWeek:["Nedelja","Ponedeljak","Utorak","Sreda","Četvrtak","Petak","Subota"]},sr:{months:["јануар","фебруар","март","април","мај","јун","јул","август","септембар","октобар","новембар","децембар"],dayOfWeekShort:["нед","пон","уто","сре","чет","пет","суб"],dayOfWeek:["Недеља","Понедељак","Уторак","Среда","Четвртак","Петак","Субота"]},sv:{months:["Januari","Februari","Mars","April","Maj","Juni","Juli","Augusti","September","Oktober","November","December"],dayOfWeekShort:["Sön","Mån","Tis","Ons","Tor","Fre","Lör"],dayOfWeek:["Söndag","Måndag","Tisdag","Onsdag","Torsdag","Fredag","Lördag"]},"zh-TW":{months:["一月","二月","三月","四月","五月","六月","七月","八月","九月","十月","十一月","十二月"],dayOfWeekShort:["日","一","二","三","四","五","六"],dayOfWeek:["星期日","星期一","星期二","星期三","星期四","星期五","星期六"]},zh:{months:["一月","二月","三月","四月","五月","六月","七月","八月","九月","十月","十一月","十二月"],dayOfWeekShort:["日","一","二","三","四","五","六"],dayOfWeek:["星期日","星期一","星期二","星期三","星期四","星期五","星期六"]},he:{months:["ינואר","פברואר","מרץ","אפריל","מאי","יוני","יולי","אוגוסט","ספטמבר","אוקטובר","נובמבר","דצמבר"],dayOfWeekShort:["א'","ב'","ג'","ד'","ה'","ו'","שבת"],dayOfWeek:["ראשון","שני","שלישי","רביעי","חמישי","שישי","שבת","ראשון"]},hy:{months:["Հունվար","Փետրվար","Մարտ","Ապրիլ","Մայիս","Հունիս","Հուլիս","Օգոստոս","Սեպտեմբեր","Հոկտեմբեր","Նոյեմբեր","Դեկտեմբեր"],dayOfWeekShort:["Կի","Երկ","Երք","Չոր","Հնգ","Ուրբ","Շբթ"],dayOfWeek:["Կիրակի","Երկուշաբթի","Երեքշաբթի","Չորեքշաբթի","Հինգշաբթի","Ուրբաթ","Շաբաթ"]},kg:{months:["Үчтүн айы","Бирдин айы","Жалган Куран","Чын Куран","Бугу","Кулжа","Теке","Баш Оона","Аяк Оона","Тогуздун айы","Жетинин айы","Бештин айы"],dayOfWeekShort:["Жек","Дүй","Шей","Шар","Бей","Жум","Ише"],dayOfWeek:["Жекшемб","Дүйшөмб","Шейшемб","Шаршемб","Бейшемби","Жума","Ишенб"]},rm:{months:["Schaner","Favrer","Mars","Avrigl","Matg","Zercladur","Fanadur","Avust","Settember","October","November","December"],dayOfWeekShort:["Du","Gli","Ma","Me","Gie","Ve","So"],dayOfWeek:["Dumengia","Glindesdi","Mardi","Mesemna","Gievgia","Venderdi","Sonda"]},ka:{months:["იანვარი","თებერვალი","მარტი","აპრილი","მაისი","ივნისი","ივლისი","აგვისტო","სექტემბერი","ოქტომბერი","ნოემბერი","დეკემბერი"],dayOfWeekShort:["კვ","ორშ","სამშ","ოთხ","ხუთ","პარ","შაბ"],dayOfWeek:["კვირა","ორშაბათი","სამშაბათი","ოთხშაბათი","ხუთშაბათი","პარასკევი","შაბათი"]}},value:"",rtl:!1,format:"Y/m/d H:i",formatTime:"H:i",formatDate:"Y/m/d",startDate:!1,step:60,monthChangeSpinner:!0,closeOnDateSelect:!1,closeOnTimeSelect:!0,closeOnWithoutClick:!0,closeOnInputClick:!0,timepicker:!0,datepicker:!0,weeks:!1,defaultTime:!1,defaultDate:!1,minDate:!1,maxDate:!1,minTime:!1,maxTime:!1,disabledMinTime:!1,disabledMaxTime:!1,allowTimes:[],opened:!1,initTime:!0,inline:!1,theme:"",onSelectDate:function(){},onSelectTime:function(){},onChangeMonth:function(){},onGetWeekOfYear:function(){},onChangeYear:function(){},onChangeDateTime:function(){},onShow:function(){},onClose:function(){},onGenerate:function(){},withoutCopyright:!0,inverseButton:!1,hours12:!1,next:"xdsoft_next",prev:"xdsoft_prev",dayOfWeekStart:0,parentID:"body",timeHeightInTimePicker:25,timepickerScrollbar:!0,todayButton:!0,prevButton:!0,nextButton:!0,defaultSelect:!0,scrollMonth:!0,scrollTime:!0,scrollInput:!0,lazyInit:!1,mask:!1,validateOnBlur:!0,allowBlank:!0,yearStart:1950,yearEnd:2050,monthStart:0,monthEnd:11,style:"",id:"",fixed:!1,roundTime:"round",className:"",weekends:[],highlightedDates:[],highlightedPeriods:[],allowDates:[],allowDateRe:null,disabledDates:[],disabledWeekDays:[],yearOffset:0,beforeShowDay:null,enterLikeTab:!0,showApplyButton:!1},i=null,r="en",n="en",o={meridiem:["AM","PM"]},s=function(){var t=a.i18n[n],r={days:t.dayOfWeek,daysShort:t.dayOfWeekShort,months:t.months,monthsShort:e.map(t.months,function(e){return e.substring(0,3)})};i=new DateFormatter({dateSettings:e.extend({},o,r)})};e.datetimepicker={setLocale:function(e){var t=a.i18n[e]?e:r;n!=t&&(n=t,s())},setDateFormatter:function(e){i=e},RFC_2822:"D, d M Y H:i:s O",ATOM:"Y-m-dTH:i:sP",ISO_8601:"Y-m-dTH:i:sO",RFC_822:"D, d M y H:i:s O",RFC_850:"l, d-M-y H:i:s T",RFC_1036:"D, d M y H:i:s O",RFC_1123:"D, d M Y H:i:s O",RSS:"D, d M Y H:i:s O",W3C:"Y-m-dTH:i:sP"},s(),window.getComputedStyle||(window.getComputedStyle=function(e){return this.el=e,this.getPropertyValue=function(t){var a=/(\-([a-z]){1})/g;return"float"===t&&(t="styleFloat"),a.test(t)&&(t=t.replace(a,function(e,t,a){return a.toUpperCase()})),e.currentStyle[t]||null},this}),Array.prototype.indexOf||(Array.prototype.indexOf=function(e,t){var a,i;for(a=t||0,i=this.length;i>a;a+=1)if(this[a]===e)return a;return-1}),Date.prototype.countDaysInMonth=function(){return new Date(this.getFullYear(),this.getMonth()+1,0).getDate()},e.fn.xdsoftScroller=function(t){return this.each(function(){var a,i,r,n,o,s=e(this),l=function(e){var t,a={x:0,y:0};return"touchstart"===e.type||"touchmove"===e.type||"touchend"===e.type||"touchcancel"===e.type?(t=e.originalEvent.touches[0]||e.originalEvent.changedTouches[0],a.x=t.clientX,a.y=t.clientY):("mousedown"===e.type||"mouseup"===e.type||"mousemove"===e.type||"mouseover"===e.type||"mouseout"===e.type||"mouseenter"===e.type||"mouseleave"===e.type)&&(a.x=e.clientX,a.y=e.clientY),a},d=100,u=!1,c=0,h=0,f=0,m=!1,g=0,p=function(){};return"hide"===t?void s.find(".xdsoft_scrollbar").hide():(e(this).hasClass("xdsoft_scroller_box")||(a=s.children().eq(0),i=s[0].clientHeight,r=a[0].offsetHeight,n=e('<div class="xdsoft_scrollbar"></div>'),o=e('<div class="xdsoft_scroller"></div>'),n.append(o),s.addClass("xdsoft_scroller_box").append(n),p=function(e){var t=l(e).y-c+g;0>t&&(t=0),t+o[0].offsetHeight>f&&(t=f-o[0].offsetHeight),s.trigger("scroll_element.xdsoft_scroller",[d?t/d:0])},o.on("touchstart.xdsoft_scroller mousedown.xdsoft_scroller",function(a){i||s.trigger("resize_scroll.xdsoft_scroller",[t]),c=l(a).y,g=parseInt(o.css("margin-top"),10),f=n[0].offsetHeight,"mousedown"===a.type||"touchstart"===a.type?(document&&e(document.body).addClass("xdsoft_noselect"),e([document.body,window]).on("touchend mouseup.xdsoft_scroller",function r(){e([document.body,window]).off("touchend mouseup.xdsoft_scroller",r).off("mousemove.xdsoft_scroller",p).removeClass("xdsoft_noselect")}),e(document.body).on("mousemove.xdsoft_scroller",p)):(m=!0,a.stopPropagation(),a.preventDefault())}).on("touchmove",function(e){m&&(e.preventDefault(),p(e))}).on("touchend touchcancel",function(){m=!1,g=0}),s.on("scroll_element.xdsoft_scroller",function(e,t){i||s.trigger("resize_scroll.xdsoft_scroller",[t,!0]),t=t>1?1:0>t||isNaN(t)?0:t,o.css("margin-top",d*t),setTimeout(function(){a.css("marginTop",-parseInt((a[0].offsetHeight-i)*t,10))},10)}).on("resize_scroll.xdsoft_scroller",function(e,t,l){var u,c;i=s[0].clientHeight,r=a[0].offsetHeight,u=i/r,c=u*n[0].offsetHeight,u>1?o.hide():(o.show(),o.css("height",parseInt(c>10?c:10,10)),d=n[0].offsetHeight-o[0].offsetHeight,l!==!0&&s.trigger("scroll_element.xdsoft_scroller",[t||Math.abs(parseInt(a.css("marginTop"),10))/(r-i)]))}),s.on("mousewheel",function(e){var t=Math.abs(parseInt(a.css("marginTop"),10));return t-=20*e.deltaY,0>t&&(t=0),s.trigger("scroll_element.xdsoft_scroller",[t/(r-i)]),e.stopPropagation(),!1}),s.on("touchstart",function(e){u=l(e),h=Math.abs(parseInt(a.css("marginTop"),10))}),s.on("touchmove",function(e){if(u){e.preventDefault();var t=l(e);s.trigger("scroll_element.xdsoft_scroller",[(h-(t.y-u.y))/(r-i)])}}),s.on("touchend touchcancel",function(){u=!1,h=0})),void s.trigger("resize_scroll.xdsoft_scroller",[t]))})},e.fn.datetimepicker=function(r,o){var s,l,d=this,u=48,c=57,h=96,f=105,m=17,g=46,p=13,v=27,y=8,b=37,k=38,x=39,w=40,D=9,S=116,T=65,_=67,M=86,O=90,C=89,W=!1,F=e.isPlainObject(r)||!r?e.extend(!0,{},a,r):e.extend(!0,{},a),P=0,A=function(e){e.on("open.xdsoft focusin.xdsoft mousedown.xdsoft touchstart",function t(){e.is(":disabled")||e.data("xdsoft_datetimepicker")||(clearTimeout(P),P=setTimeout(function(){e.data("xdsoft_datetimepicker")||s(e),e.off("open.xdsoft focusin.xdsoft mousedown.xdsoft touchstart",t).trigger("open.xdsoft")},100))})};return s=function(a){function o(){var e,t=!1;return F.startDate?t=Y.strToDate(F.startDate):(t=F.value||(a&&a.val&&a.val()?a.val():""),t?t=Y.strToDateTime(t):F.defaultDate&&(t=Y.strToDateTime(F.defaultDate),F.defaultTime&&(e=Y.strtotime(F.defaultTime),t.setHours(e.getHours()),t.setMinutes(e.getMinutes())))),t&&Y.isValidDate(t)?I.data("changed",!0):t="",t||0}function s(t){var i=function(e,t){var a=e.replace(/([\[\]\/\{\}\(\)\-\.\+]{1})/g,"\\$1").replace(/_/g,"{digit+}").replace(/([0-9]{1})/g,"{digit$1}").replace(/\{digit([0-9]{1})\}/g,"[0-$1_]{1}").replace(/\{digit[\+]\}/g,"[0-9_]{1}");return new RegExp(a).test(t)},r=function(e){try{if(document.selection&&document.selection.createRange){var t=document.selection.createRange();return t.getBookmark().charCodeAt(2)-2}if(e.setSelectionRange)return e.selectionStart}catch(a){return 0}},n=function(e,t){if(e="string"==typeof e||e instanceof String?document.getElementById(e):e,!e)return!1;if(e.createTextRange){var a=e.createTextRange();return a.collapse(!0),a.moveEnd("character",t),a.moveStart("character",t),a.select(),!0}return!!e.setSelectionRange&&(e.setSelectionRange(t,t),!0)};t.mask&&a.off("keydown.xdsoft"),t.mask===!0&&(t.mask="undefined"!=typeof moment?t.format.replace(/Y{4}/g,"9999").replace(/Y{2}/g,"99").replace(/M{2}/g,"19").replace(/D{2}/g,"39").replace(/H{2}/g,"29").replace(/m{2}/g,"59").replace(/s{2}/g,"59"):t.format.replace(/Y/g,"9999").replace(/F/g,"9999").replace(/m/g,"19").replace(/d/g,"39").replace(/H/g,"29").replace(/i/g,"59").replace(/s/g,"59")),"string"===e.type(t.mask)&&(i(t.mask,a.val())||(a.val(t.mask.replace(/[0-9]/g,"_")),n(a[0],0)),a.on("keydown.xdsoft",function(o){var s,l,d=this.value,F=o.which;if(F>=u&&c>=F||F>=h&&f>=F||F===y||F===g){for(s=r(this),l=F!==y&&F!==g?String.fromCharCode(F>=h&&f>=F?F-u:F):"_",F!==y&&F!==g||!s||(s-=1,l="_");/[^0-9_]/.test(t.mask.substr(s,1))&&s<t.mask.length&&s>0;)s+=F===y||F===g?-1:1;if(d=d.substr(0,s)+l+d.substr(s+1),""===e.trim(d))d=t.mask.replace(/[0-9]/g,"_");else if(s===t.mask.length)return o.preventDefault(),!1;for(s+=F===y||F===g?0:1;/[^0-9_]/.test(t.mask.substr(s,1))&&s<t.mask.length&&s>0;)s+=F===y||F===g?-1:1;i(t.mask,d)?(this.value=d,n(this,s)):""===e.trim(d)?this.value=t.mask.replace(/[0-9]/g,"_"):a.trigger("error_input.xdsoft")}else if(-1!==[T,_,M,O,C].indexOf(F)&&W||-1!==[v,k,w,b,x,S,m,D,p].indexOf(F))return!0;return o.preventDefault(),!1}))}var l,d,P,A,j,Y,z,I=e('<div class="xdsoft_datetimepicker xdsoft_noselect"></div>'),H=e('<div class="xdsoft_copyright"><a target="_blank" href="http://xdsoft.net/jqplugins/datetimepicker/">xdsoft.net</a></div>'),J=e('<div class="xdsoft_datepicker active"></div>'),N=e('<div class="xdsoft_mounthpicker"><button type="button" class="xdsoft_prev"></button><button type="button" class="xdsoft_today_button"></button><div class="xdsoft_label xdsoft_month"><span></span><i></i></div><div class="xdsoft_label xdsoft_year"><span></span><i></i></div><button type="button" class="xdsoft_next"></button></div>'),R=e('<div class="xdsoft_calendar"></div>'),L=e('<div class="xdsoft_timepicker active"><button type="button" class="xdsoft_prev"></button><div class="xdsoft_time_box"></div><button type="button" class="xdsoft_next"></button></div>'),E=L.find(".xdsoft_time_box").eq(0),$=e('<div class="xdsoft_time_variant"></div>'),V=e('<button type="button" class="xdsoft_save_selected blue-gradient-button">Save Selected</button>'),B=e('<div class="xdsoft_select xdsoft_monthselect"><div></div></div>'),G=e('<div class="xdsoft_select xdsoft_yearselect"><div></div></div>'),q=!1,U=0;F.id&&I.attr("id",F.id),F.style&&I.attr("style",F.style),F.weeks&&I.addClass("xdsoft_showweeks"),F.rtl&&I.addClass("xdsoft_rtl"),I.addClass("xdsoft_"+F.theme),I.addClass(F.className),N.find(".xdsoft_month span").after(B),N.find(".xdsoft_year span").after(G),N.find(".xdsoft_month,.xdsoft_year").on("touchstart mousedown.xdsoft",function(t){var a,i,r=e(this).find(".xdsoft_select").eq(0),n=0,o=0,s=r.is(":visible");for(N.find(".xdsoft_select").hide(),Y.currentTime&&(n=Y.currentTime[e(this).hasClass("xdsoft_month")?"getMonth":"getFullYear"]()),r[s?"hide":"show"](),a=r.find("div.xdsoft_option"),i=0;i<a.length&&a.eq(i).data("value")!==n;i+=1)o+=a[0].offsetHeight;return r.xdsoftScroller(o/(r.children()[0].offsetHeight-r[0].clientHeight)),t.stopPropagation(),!1}),N.find(".xdsoft_select").xdsoftScroller().on("touchstart mousedown.xdsoft",function(e){e.stopPropagation(),e.preventDefault()}).on("touchstart mousedown.xdsoft",".xdsoft_option",function(){(void 0===Y.currentTime||null===Y.currentTime)&&(Y.currentTime=Y.now());var t=Y.currentTime.getFullYear();Y&&Y.currentTime&&Y.currentTime[e(this).parent().parent().hasClass("xdsoft_monthselect")?"setMonth":"setFullYear"](e(this).data("value")),e(this).parent().parent().hide(),I.trigger("xchange.xdsoft"),F.onChangeMonth&&e.isFunction(F.onChangeMonth)&&F.onChangeMonth.call(I,Y.currentTime,I.data("input")),t!==Y.currentTime.getFullYear()&&e.isFunction(F.onChangeYear)&&F.onChangeYear.call(I,Y.currentTime,I.data("input"))}),I.getValue=function(){return Y.getCurrentTime()},I.setOptions=function(r){var n={};F=e.extend(!0,{},F,r),r.allowTimes&&e.isArray(r.allowTimes)&&r.allowTimes.length&&(F.allowTimes=e.extend(!0,[],r.allowTimes)),r.weekends&&e.isArray(r.weekends)&&r.weekends.length&&(F.weekends=e.extend(!0,[],r.weekends)),r.allowDates&&e.isArray(r.allowDates)&&r.allowDates.length&&(F.allowDates=e.extend(!0,[],r.allowDates)),r.allowDateRe&&"[object String]"===Object.prototype.toString.call(r.allowDateRe)&&(F.allowDateRe=new RegExp(r.allowDateRe)),r.highlightedDates&&e.isArray(r.highlightedDates)&&r.highlightedDates.length&&(e.each(r.highlightedDates,function(a,r){var o,s=e.map(r.split(","),e.trim),l=new t(i.parseDate(s[0],F.formatDate),s[1],s[2]),d=i.formatDate(l.date,F.formatDate);void 0!==n[d]?(o=n[d].desc,o&&o.length&&l.desc&&l.desc.length&&(n[d].desc=o+"\n"+l.desc)):n[d]=l}),F.highlightedDates=e.extend(!0,[],n)),r.highlightedPeriods&&e.isArray(r.highlightedPeriods)&&r.highlightedPeriods.length&&(n=e.extend(!0,[],F.highlightedDates),e.each(r.highlightedPeriods,function(a,r){var o,s,l,d,u,c,h;if(e.isArray(r))o=r[0],s=r[1],l=r[2],h=r[3];else{var f=e.map(r.split(","),e.trim);o=i.parseDate(f[0],F.formatDate),s=i.parseDate(f[1],F.formatDate),l=f[2],h=f[3]}for(;s>=o;)d=new t(o,l,h),u=i.formatDate(o,F.formatDate),o.setDate(o.getDate()+1),void 0!==n[u]?(c=n[u].desc,c&&c.length&&d.desc&&d.desc.length&&(n[u].desc=c+"\n"+d.desc)):n[u]=d}),F.highlightedDates=e.extend(!0,[],n)),r.disabledDates&&e.isArray(r.disabledDates)&&r.disabledDates.length&&(F.disabledDates=e.extend(!0,[],r.disabledDates)),r.disabledWeekDays&&e.isArray(r.disabledWeekDays)&&r.disabledWeekDays.length&&(F.disabledWeekDays=e.extend(!0,[],r.disabledWeekDays)),!F.open&&!F.opened||F.inline||a.trigger("open.xdsoft"),F.inline&&(q=!0,I.addClass("xdsoft_inline"),a.after(I).hide()),F.inverseButton&&(F.next="xdsoft_prev",F.prev="xdsoft_next"),F.datepicker?J.addClass("active"):J.removeClass("active"),F.timepicker?L.addClass("active"):L.removeClass("active"),F.value&&(Y.setCurrentTime(F.value),a&&a.val&&a.val(Y.str)),F.dayOfWeekStart=isNaN(F.dayOfWeekStart)?0:parseInt(F.dayOfWeekStart,10)%7,F.timepickerScrollbar||E.xdsoftScroller("hide"),F.minDate&&/^[\+\-](.*)$/.test(F.minDate)&&(F.minDate=i.formatDate(Y.strToDateTime(F.minDate),F.formatDate)),F.maxDate&&/^[\+\-](.*)$/.test(F.maxDate)&&(F.maxDate=i.formatDate(Y.strToDateTime(F.maxDate),F.formatDate)),V.toggle(F.showApplyButton),N.find(".xdsoft_today_button").css("visibility",F.todayButton?"visible":"hidden"),N.find("."+F.prev).css("visibility",F.prevButton?"visible":"hidden"),N.find("."+F.next).css("visibility",F.nextButton?"visible":"hidden"),s(F),F.validateOnBlur&&a.off("blur.xdsoft").on("blur.xdsoft",function(){if(F.allowBlank&&(!e.trim(e(this).val()).length||"string"==typeof F.mask&&e.trim(e(this).val())===F.mask.replace(/[0-9]/g,"_")))e(this).val(null),I.data("xdsoft_datetime").empty();else{var t=i.parseDate(e(this).val(),F.format);if(t)e(this).val(i.formatDate(t,F.format));else{var a=+[e(this).val()[0],e(this).val()[1]].join(""),r=+[e(this).val()[2],e(this).val()[3]].join("");e(this).val(!F.datepicker&&F.timepicker&&a>=0&&24>a&&r>=0&&60>r?[a,r].map(function(e){return e>9?e:"0"+e}).join(":"):i.formatDate(Y.now(),F.format))}I.data("xdsoft_datetime").setCurrentTime(e(this).val())}I.trigger("changedatetime.xdsoft"),I.trigger("close.xdsoft")}),F.dayOfWeekStartPrev=0===F.dayOfWeekStart?6:F.dayOfWeekStart-1,I.trigger("xchange.xdsoft").trigger("afterOpen.xdsoft")},I.data("options",F).on("touchstart mousedown.xdsoft",function(e){return e.stopPropagation(),e.preventDefault(),G.hide(),B.hide(),!1}),E.append($),E.xdsoftScroller(),I.on("afterOpen.xdsoft",function(){E.xdsoftScroller()}),I.append(J).append(L),F.withoutCopyright!==!0&&I.append(H),J.append(N).append(R).append(V),e(F.parentID).append(I),l=function(){var t=this;t.now=function(e){var a,i,r=new Date;return!e&&F.defaultDate&&(a=t.strToDateTime(F.defaultDate),r.setFullYear(a.getFullYear()),r.setMonth(a.getMonth()),r.setDate(a.getDate())),F.yearOffset&&r.setFullYear(r.getFullYear()+F.yearOffset),!e&&F.defaultTime&&(i=t.strtotime(F.defaultTime),r.setHours(i.getHours()),r.setMinutes(i.getMinutes())),r},t.isValidDate=function(e){return"[object Date]"===Object.prototype.toString.call(e)&&!isNaN(e.getTime())},t.setCurrentTime=function(e,a){t.currentTime="string"==typeof e?t.strToDateTime(e):t.isValidDate(e)?e:e||a||!F.allowBlank?t.now():null,I.trigger("xchange.xdsoft")},t.empty=function(){t.currentTime=null},t.getCurrentTime=function(){return t.currentTime},t.nextMonth=function(){(void 0===t.currentTime||null===t.currentTime)&&(t.currentTime=t.now());var a,i=t.currentTime.getMonth()+1;return 12===i&&(t.currentTime.setFullYear(t.currentTime.getFullYear()+1),i=0),a=t.currentTime.getFullYear(),t.currentTime.setDate(Math.min(new Date(t.currentTime.getFullYear(),i+1,0).getDate(),t.currentTime.getDate())),t.currentTime.setMonth(i),F.onChangeMonth&&e.isFunction(F.onChangeMonth)&&F.onChangeMonth.call(I,Y.currentTime,I.data("input")),a!==t.currentTime.getFullYear()&&e.isFunction(F.onChangeYear)&&F.onChangeYear.call(I,Y.currentTime,I.data("input")),I.trigger("xchange.xdsoft"),i},t.prevMonth=function(){(void 0===t.currentTime||null===t.currentTime)&&(t.currentTime=t.now());var a=t.currentTime.getMonth()-1;return-1===a&&(t.currentTime.setFullYear(t.currentTime.getFullYear()-1),a=11),t.currentTime.setDate(Math.min(new Date(t.currentTime.getFullYear(),a+1,0).getDate(),t.currentTime.getDate())),t.currentTime.setMonth(a),F.onChangeMonth&&e.isFunction(F.onChangeMonth)&&F.onChangeMonth.call(I,Y.currentTime,I.data("input")),I.trigger("xchange.xdsoft"),a},t.getWeekOfYear=function(t){if(F.onGetWeekOfYear&&e.isFunction(F.onGetWeekOfYear)){var a=F.onGetWeekOfYear.call(I,t);if("undefined"!=typeof a)return a}var i=new Date(t.getFullYear(),0,1);return 4!=i.getDay()&&i.setMonth(0,1+(4-i.getDay()+7)%7),Math.ceil(((t-i)/864e5+i.getDay()+1)/7)},t.strToDateTime=function(e){var a,r,n=[];return e&&e instanceof Date&&t.isValidDate(e)?e:(n=/^(\+|\-)(.*)$/.exec(e),n&&(n[2]=i.parseDate(n[2],F.formatDate)),n&&n[2]?(a=n[2].getTime()-6e4*n[2].getTimezoneOffset(),r=new Date(t.now(!0).getTime()+parseInt(n[1]+"1",10)*a)):r=e?i.parseDate(e,F.format):t.now(),t.isValidDate(r)||(r=t.now()),r)},t.strToDate=function(e){if(e&&e instanceof Date&&t.isValidDate(e))return e;var a=e?i.parseDate(e,F.formatDate):t.now(!0);return t.isValidDate(a)||(a=t.now(!0)),a},t.strtotime=function(e){if(e&&e instanceof Date&&t.isValidDate(e))return e;var a=e?i.parseDate(e,F.formatTime):t.now(!0);return t.isValidDate(a)||(a=t.now(!0)),a},t.str=function(){return i.formatDate(t.currentTime,F.format)},t.currentTime=this.now()},Y=new l,V.on("touchend click",function(e){e.preventDefault(),I.data("changed",!0),Y.setCurrentTime(o()),a.val(Y.str()),I.trigger("close.xdsoft")}),N.find(".xdsoft_today_button").on("touchend mousedown.xdsoft",function(){I.data("changed",!0),Y.setCurrentTime(0,!0),I.trigger("afterOpen.xdsoft")}).on("dblclick.xdsoft",function(){var e,t,i=Y.getCurrentTime();i=new Date(i.getFullYear(),i.getMonth(),i.getDate()),e=Y.strToDate(F.minDate),e=new Date(e.getFullYear(),e.getMonth(),e.getDate()),e>i||(t=Y.strToDate(F.maxDate),t=new Date(t.getFullYear(),t.getMonth(),t.getDate()),i>t||(a.val(Y.str()),a.trigger("change"),I.trigger("close.xdsoft")))}),N.find(".xdsoft_prev,.xdsoft_next").on("touchend mousedown.xdsoft",function(){var t=e(this),a=0,i=!1;!function r(e){t.hasClass(F.next)?Y.nextMonth():t.hasClass(F.prev)&&Y.prevMonth(),F.monthChangeSpinner&&(i||(a=setTimeout(r,e||100)))}(500),e([document.body,window]).on("touchend mouseup.xdsoft",function n(){clearTimeout(a),i=!0,e([document.body,window]).off("touchend mouseup.xdsoft",n)})}),L.find(".xdsoft_prev,.xdsoft_next").on("touchend mousedown.xdsoft",function(){var t=e(this),a=0,i=!1,r=110;!function n(e){var o=E[0].clientHeight,s=$[0].offsetHeight,l=Math.abs(parseInt($.css("marginTop"),10));t.hasClass(F.next)&&s-o-F.timeHeightInTimePicker>=l?$.css("marginTop","-"+(l+F.timeHeightInTimePicker)+"px"):t.hasClass(F.prev)&&l-F.timeHeightInTimePicker>=0&&$.css("marginTop","-"+(l-F.timeHeightInTimePicker)+"px"),E.trigger("scroll_element.xdsoft_scroller",[Math.abs(parseInt($[0].style.marginTop,10)/(s-o))]),r=r>10?10:r-10,i||(a=setTimeout(n,e||r))}(500),e([document.body,window]).on("touchend mouseup.xdsoft",function o(){clearTimeout(a),i=!0,e([document.body,window]).off("touchend mouseup.xdsoft",o)})}),d=0,I.on("xchange.xdsoft",function(t){clearTimeout(d),d=setTimeout(function(){if(void 0===Y.currentTime||null===Y.currentTime){if(F.allowBlank)return;Y.currentTime=Y.now()}for(var t,o,s,l,d,u,c,h,f,m,g="",p=new Date(Y.currentTime.getFullYear(),Y.currentTime.getMonth(),1,12,0,0),v=0,y=Y.now(),b=!1,k=!1,x=[],w=!0,D="",S="";p.getDay()!==F.dayOfWeekStart;)p.setDate(p.getDate()-1);for(g+="<table><thead><tr>",F.weeks&&(g+="<th></th>"),t=0;7>t;t+=1)g+="<th>"+F.i18n[n].dayOfWeekShort[(t+F.dayOfWeekStart)%7]+"</th>";for(g+="</tr></thead>",g+="<tbody>",F.maxDate!==!1&&(b=Y.strToDate(F.maxDate),b=new Date(b.getFullYear(),b.getMonth(),b.getDate(),23,59,59,999)),F.minDate!==!1&&(k=Y.strToDate(F.minDate),k=new Date(k.getFullYear(),k.getMonth(),k.getDate()));v<Y.currentTime.countDaysInMonth()||p.getDay()!==F.dayOfWeekStart||Y.currentTime.getMonth()===p.getMonth();)x=[],v+=1,s=p.getDay(),l=p.getDate(),d=p.getFullYear(),u=p.getMonth(),c=Y.getWeekOfYear(p),m="",x.push("xdsoft_date"),h=F.beforeShowDay&&e.isFunction(F.beforeShowDay.call)?F.beforeShowDay.call(I,p):null,F.allowDateRe&&"[object RegExp]"===Object.prototype.toString.call(F.allowDateRe)?F.allowDateRe.test(i.formatDate(p,F.formatDate))||x.push("xdsoft_disabled"):F.allowDates&&F.allowDates.length>0?-1===F.allowDates.indexOf(i.formatDate(p,F.formatDate))&&x.push("xdsoft_disabled"):b!==!1&&p>b||k!==!1&&k>p||h&&h[0]===!1?x.push("xdsoft_disabled"):-1!==F.disabledDates.indexOf(i.formatDate(p,F.formatDate))?x.push("xdsoft_disabled"):-1!==F.disabledWeekDays.indexOf(s)?x.push("xdsoft_disabled"):a.is("[readonly]")&&x.push("xdsoft_disabled"),h&&""!==h[1]&&x.push(h[1]),Y.currentTime.getMonth()!==u&&x.push("xdsoft_other_month"),(F.defaultSelect||I.data("changed"))&&i.formatDate(Y.currentTime,F.formatDate)===i.formatDate(p,F.formatDate)&&x.push("xdsoft_current"),i.formatDate(y,F.formatDate)===i.formatDate(p,F.formatDate)&&x.push("xdsoft_today"),(0===p.getDay()||6===p.getDay()||-1!==F.weekends.indexOf(i.formatDate(p,F.formatDate)))&&x.push("xdsoft_weekend"),void 0!==F.highlightedDates[i.formatDate(p,F.formatDate)]&&(o=F.highlightedDates[i.formatDate(p,F.formatDate)],x.push(void 0===o.style?"xdsoft_highlighted_default":o.style),m=void 0===o.desc?"":o.desc),F.beforeShowDay&&e.isFunction(F.beforeShowDay)&&x.push(F.beforeShowDay(p)),w&&(g+="<tr>",w=!1,F.weeks&&(g+="<th>"+c+"</th>")),g+='<td data-date="'+l+'" data-month="'+u+'" data-year="'+d+'" class="xdsoft_date xdsoft_day_of_week'+p.getDay()+" "+x.join(" ")+'" title="'+m+'"><div>'+l+"</div></td>",p.getDay()===F.dayOfWeekStartPrev&&(g+="</tr>",w=!0),p.setDate(l+1);if(g+="</tbody></table>",R.html(g),N.find(".xdsoft_label span").eq(0).text(F.i18n[n].months[Y.currentTime.getMonth()]),N.find(".xdsoft_label span").eq(1).text(Y.currentTime.getFullYear()),D="",S="",u="",f=function(t,r){var n,o,s=Y.now(),l=F.allowTimes&&e.isArray(F.allowTimes)&&F.allowTimes.length;s.setHours(t),t=parseInt(s.getHours(),10),s.setMinutes(r),r=parseInt(s.getMinutes(),10),n=new Date(Y.currentTime),n.setHours(t),n.setMinutes(r),x=[],F.minDateTime!==!1&&F.minDateTime>n||F.maxTime!==!1&&Y.strtotime(F.maxTime).getTime()<s.getTime()||F.minTime!==!1&&Y.strtotime(F.minTime).getTime()>s.getTime()?x.push("xdsoft_disabled"):F.minDateTime!==!1&&F.minDateTime>n||F.disabledMinTime!==!1&&s.getTime()>Y.strtotime(F.disabledMinTime).getTime()&&F.disabledMaxTime!==!1&&s.getTime()<Y.strtotime(F.disabledMaxTime).getTime()?x.push("xdsoft_disabled"):a.is("[readonly]")&&x.push("xdsoft_disabled"),o=new Date(Y.currentTime),o.setHours(parseInt(Y.currentTime.getHours(),10)),l||o.setMinutes(Math[F.roundTime](Y.currentTime.getMinutes()/F.step)*F.step),(F.initTime||F.defaultSelect||I.data("changed"))&&o.getHours()===parseInt(t,10)&&(!l&&F.step>59||o.getMinutes()===parseInt(r,10))&&(F.defaultSelect||I.data("changed")?x.push("xdsoft_current"):F.initTime&&x.push("xdsoft_init_time")),parseInt(y.getHours(),10)===parseInt(t,10)&&parseInt(y.getMinutes(),10)===parseInt(r,10)&&x.push("xdsoft_today"),D+='<div class="xdsoft_time '+x.join(" ")+'" data-hour="'+t+'" data-minute="'+r+'">'+i.formatDate(s,F.formatTime)+"</div>"},F.allowTimes&&e.isArray(F.allowTimes)&&F.allowTimes.length)for(v=0;v<F.allowTimes.length;v+=1)S=Y.strtotime(F.allowTimes[v]).getHours(),u=Y.strtotime(F.allowTimes[v]).getMinutes(),f(S,u);else for(v=0,t=0;v<(F.hours12?12:24);v+=1)for(t=0;60>t;t+=F.step)S=(10>v?"0":"")+v,u=(10>t?"0":"")+t,f(S,u);for($.html(D),r="",v=0,v=parseInt(F.yearStart,10)+F.yearOffset;v<=parseInt(F.yearEnd,10)+F.yearOffset;v+=1)r+='<div class="xdsoft_option '+(Y.currentTime.getFullYear()===v?"xdsoft_current":"")+'" data-value="'+v+'">'+v+"</div>";for(G.children().eq(0).html(r),v=parseInt(F.monthStart,10),r="";v<=parseInt(F.monthEnd,10);v+=1)r+='<div class="xdsoft_option '+(Y.currentTime.getMonth()===v?"xdsoft_current":"")+'" data-value="'+v+'">'+F.i18n[n].months[v]+"</div>";B.children().eq(0).html(r),e(I).trigger("generate.xdsoft")},10),t.stopPropagation()}).on("afterOpen.xdsoft",function(){if(F.timepicker){var e,t,a,i;$.find(".xdsoft_current").length?e=".xdsoft_current":$.find(".xdsoft_init_time").length&&(e=".xdsoft_init_time"),e?(t=E[0].clientHeight,a=$[0].offsetHeight,i=$.find(e).index()*F.timeHeightInTimePicker+1,i>a-t&&(i=a-t),E.trigger("scroll_element.xdsoft_scroller",[parseInt(i,10)/(a-t)])):E.trigger("scroll_element.xdsoft_scroller",[0])}}),P=0,R.on("touchend click.xdsoft","td",function(t){t.stopPropagation(),P+=1;var i=e(this),r=Y.currentTime;return(void 0===r||null===r)&&(Y.currentTime=Y.now(),r=Y.currentTime),!i.hasClass("xdsoft_disabled")&&(r.setDate(1),r.setFullYear(i.data("year")),r.setMonth(i.data("month")),r.setDate(i.data("date")),I.trigger("select.xdsoft",[r]),a.val(Y.str()),F.onSelectDate&&e.isFunction(F.onSelectDate)&&F.onSelectDate.call(I,Y.currentTime,I.data("input"),t),I.data("changed",!0),I.trigger("xchange.xdsoft"),I.trigger("changedatetime.xdsoft"),(P>1||F.closeOnDateSelect===!0||F.closeOnDateSelect===!1&&!F.timepicker)&&!F.inline&&I.trigger("close.xdsoft"),void setTimeout(function(){P=0},200))}),$.on("touchend click.xdsoft","div",function(t){t.stopPropagation();var a=e(this),i=Y.currentTime;return(void 0===i||null===i)&&(Y.currentTime=Y.now(),i=Y.currentTime),!a.hasClass("xdsoft_disabled")&&(i.setHours(a.data("hour")),i.setMinutes(a.data("minute")),I.trigger("select.xdsoft",[i]),I.data("input").val(Y.str()),F.onSelectTime&&e.isFunction(F.onSelectTime)&&F.onSelectTime.call(I,Y.currentTime,I.data("input"),t),I.data("changed",!0),I.trigger("xchange.xdsoft"),I.trigger("changedatetime.xdsoft"),void(F.inline!==!0&&F.closeOnTimeSelect===!0&&I.trigger("close.xdsoft")))}),J.on("mousewheel.xdsoft",function(e){return!F.scrollMonth||(e.deltaY<0?Y.nextMonth():Y.prevMonth(),!1)}),a.on("mousewheel.xdsoft",function(e){return!F.scrollInput||(!F.datepicker&&F.timepicker?(A=$.find(".xdsoft_current").length?$.find(".xdsoft_current").eq(0).index():0,A+e.deltaY>=0&&A+e.deltaY<$.children().length&&(A+=e.deltaY),$.children().eq(A).length&&$.children().eq(A).trigger("mousedown"),!1):F.datepicker&&!F.timepicker?(J.trigger(e,[e.deltaY,e.deltaX,e.deltaY]),a.val&&a.val(Y.str()),I.trigger("changedatetime.xdsoft"),!1):void 0)}),I.on("changedatetime.xdsoft",function(t){if(F.onChangeDateTime&&e.isFunction(F.onChangeDateTime)){var a=I.data("input");F.onChangeDateTime.call(I,Y.currentTime,a,t),delete F.value,a.trigger("change")}}).on("generate.xdsoft",function(){F.onGenerate&&e.isFunction(F.onGenerate)&&F.onGenerate.call(I,Y.currentTime,I.data("input")),q&&(I.trigger("afterOpen.xdsoft"),q=!1)}).on("click.xdsoft",function(e){e.stopPropagation()}),A=0,z=function(e,t){do if(e=e.parentNode,t(e)===!1)break;while("HTML"!==e.nodeName)},j=function(){var t,a,i,r,n,o,s,l,d,u,c,h,f;if(l=I.data("input"),t=l.offset(),a=l[0],u="top",i=t.top+a.offsetHeight-1,r=t.left,n="absolute",d=e(window).width(),h=e(window).height(),f=e(window).scrollTop(),document.documentElement.clientWidth-t.left<J.parent().outerWidth(!0)){var m=J.parent().outerWidth(!0)-a.offsetWidth;r-=m}"rtl"===l.parent().css("direction")&&(r-=I.outerWidth()-l.outerWidth()),F.fixed?(i-=f,r-=e(window).scrollLeft(),n="fixed"):(s=!1,z(a,function(e){return"fixed"===window.getComputedStyle(e).getPropertyValue("position")?(s=!0,!1):void 0}),s?(n="fixed",i+I.outerHeight()>h+f?(u="bottom",i=h+f-t.top):i-=f):i+a.offsetHeight>h+f&&(i=t.top-a.offsetHeight+1),0>i&&(i=0),r+a.offsetWidth>d&&(r=d-a.offsetWidth)),o=I[0],z(o,function(e){var t;return t=window.getComputedStyle(e).getPropertyValue("position"),"relative"===t&&d>=e.offsetWidth?(r-=(d-e.offsetWidth)/2,!1):void 0}),c={position:n,left:r,top:"",bottom:""},c[u]=i,I.css(c)},I.on("open.xdsoft",function(t){var a=!0;F.onShow&&e.isFunction(F.onShow)&&(a=F.onShow.call(I,Y.currentTime,I.data("input"),t)),a!==!1&&(I.show(),j(),e(window).off("resize.xdsoft",j).on("resize.xdsoft",j),F.closeOnWithoutClick&&e([document.body,window]).on("touchstart mousedown.xdsoft",function i(){I.trigger("close.xdsoft"),e([document.body,window]).off("touchstart mousedown.xdsoft",i)}))}).on("close.xdsoft",function(t){var a=!0;N.find(".xdsoft_month,.xdsoft_year").find(".xdsoft_select").hide(),F.onClose&&e.isFunction(F.onClose)&&(a=F.onClose.call(I,Y.currentTime,I.data("input"),t)),a===!1||F.opened||F.inline||I.hide(),t.stopPropagation()}).on("toggle.xdsoft",function(){I.trigger(I.is(":visible")?"close.xdsoft":"open.xdsoft")}).data("input",a),U=0,I.data("xdsoft_datetime",Y),I.setOptions(F),Y.setCurrentTime(o()),
a.data("xdsoft_datetimepicker",I).on("open.xdsoft focusin.xdsoft mousedown.xdsoft touchstart",function(){a.is(":disabled")||a.data("xdsoft_datetimepicker").is(":visible")&&F.closeOnInputClick||(clearTimeout(U),U=setTimeout(function(){a.is(":disabled")||(q=!0,Y.setCurrentTime(o(),!0),F.mask&&s(F),I.trigger("open.xdsoft"))},100))}).on("keydown.xdsoft",function(t){var a,i=t.which;return-1!==[p].indexOf(i)&&F.enterLikeTab?(a=e("input:visible,textarea:visible,button:visible,a:visible"),I.trigger("close.xdsoft"),a.eq(a.index(this)+1).focus(),!1):-1!==[D].indexOf(i)?(I.trigger("close.xdsoft"),!0):void 0}).on("blur.xdsoft",function(){I.trigger("close.xdsoft")})},l=function(t){var a=t.data("xdsoft_datetimepicker");a&&(a.data("xdsoft_datetime",null),a.remove(),t.data("xdsoft_datetimepicker",null).off(".xdsoft"),e(window).off("resize.xdsoft"),e([window,document.body]).off("mousedown.xdsoft touchstart"),t.unmousewheel&&t.unmousewheel())},e(document).off("keydown.xdsoftctrl keyup.xdsoftctrl").on("keydown.xdsoftctrl",function(e){e.keyCode===m&&(W=!0)}).on("keyup.xdsoftctrl",function(e){e.keyCode===m&&(W=!1)}),this.each(function(){var t,a=e(this).data("xdsoft_datetimepicker");if(a){if("string"===e.type(r))switch(r){case"show":e(this).select().focus(),a.trigger("open.xdsoft");break;case"hide":a.trigger("close.xdsoft");break;case"toggle":a.trigger("toggle.xdsoft");break;case"destroy":l(e(this));break;case"reset":this.value=this.defaultValue,this.value&&a.data("xdsoft_datetime").isValidDate(i.parseDate(this.value,F.format))||a.data("changed",!1),a.data("xdsoft_datetime").setCurrentTime(this.value);break;case"validate":t=a.data("input"),t.trigger("blur.xdsoft");break;default:a[r]&&e.isFunction(a[r])&&(d=a[r](o))}else a.setOptions(r);return 0}"string"!==e.type(r)&&(!F.lazyInit||F.open||F.inline?s(e(this)):A(e(this)))}),d},e.fn.datetimepicker.defaults=a}),function(e){"function"==typeof define&&define.amd?define(["jquery"],e):"object"==typeof exports?module.exports=e:e(jQuery)}(function(e){function t(t){var o=t||window.event,s=l.call(arguments,1),d=0,c=0,h=0,f=0,m=0,g=0;if(t=e.event.fix(o),t.type="mousewheel","detail"in o&&(h=-1*o.detail),"wheelDelta"in o&&(h=o.wheelDelta),"wheelDeltaY"in o&&(h=o.wheelDeltaY),"wheelDeltaX"in o&&(c=-1*o.wheelDeltaX),"axis"in o&&o.axis===o.HORIZONTAL_AXIS&&(c=-1*h,h=0),d=0===h?c:h,"deltaY"in o&&(h=-1*o.deltaY,d=h),"deltaX"in o&&(c=o.deltaX,0===h&&(d=-1*c)),0!==h||0!==c){if(1===o.deltaMode){var p=e.data(this,"mousewheel-line-height");d*=p,h*=p,c*=p}else if(2===o.deltaMode){var v=e.data(this,"mousewheel-page-height");d*=v,h*=v,c*=v}if(f=Math.max(Math.abs(h),Math.abs(c)),(!n||n>f)&&(n=f,i(o,f)&&(n/=40)),i(o,f)&&(d/=40,c/=40,h/=40),d=Math[d>=1?"floor":"ceil"](d/n),c=Math[c>=1?"floor":"ceil"](c/n),h=Math[h>=1?"floor":"ceil"](h/n),u.settings.normalizeOffset&&this.getBoundingClientRect){var y=this.getBoundingClientRect();m=t.clientX-y.left,g=t.clientY-y.top}return t.deltaX=c,t.deltaY=h,t.deltaFactor=n,t.offsetX=m,t.offsetY=g,t.deltaMode=0,s.unshift(t,d,c,h),r&&clearTimeout(r),r=setTimeout(a,200),(e.event.dispatch||e.event.handle).apply(this,s)}}function a(){n=null}function i(e,t){return u.settings.adjustOldDeltas&&"mousewheel"===e.type&&t%120===0}var r,n,o=["wheel","mousewheel","DOMMouseScroll","MozMousePixelScroll"],s="onwheel"in document||document.documentMode>=9?["wheel"]:["mousewheel","DomMouseScroll","MozMousePixelScroll"],l=Array.prototype.slice;if(e.event.fixHooks)for(var d=o.length;d;)e.event.fixHooks[o[--d]]=e.event.mouseHooks;var u=e.event.special.mousewheel={version:"3.1.12",setup:function(){if(this.addEventListener)for(var a=s.length;a;)this.addEventListener(s[--a],t,!1);else this.onmousewheel=t;e.data(this,"mousewheel-line-height",u.getLineHeight(this)),e.data(this,"mousewheel-page-height",u.getPageHeight(this))},teardown:function(){if(this.removeEventListener)for(var a=s.length;a;)this.removeEventListener(s[--a],t,!1);else this.onmousewheel=null;e.removeData(this,"mousewheel-line-height"),e.removeData(this,"mousewheel-page-height")},getLineHeight:function(t){var a=e(t),i=a["offsetParent"in e.fn?"offsetParent":"parent"]();return i.length||(i=e("body")),parseInt(i.css("fontSize"),10)||parseInt(a.css("fontSize"),10)||16},getPageHeight:function(t){return e(t).height()},settings:{adjustOldDeltas:!0,normalizeOffset:!0}};e.fn.extend({mousewheel:function(e){return e?this.bind("mousewheel",e):this.trigger("mousewheel")},unmousewheel:function(e){return this.unbind("mousewheel",e)}})}),function(e){"use strict";function t(e,t,a){this.el=e,t=t||'input[type="password"]',a=a||".form-group__password > .password-strength",this.field=this.el.find(t),this.meter=this.el.find(a),this._init()}t.prototype={_init:function(){this.characters=0,this.capitalletters=0,this.lowerletters=0,this.number=0,this.special=0,this.upperCase=new RegExp("[A-Z]"),this.lowerCase=new RegExp("[a-z]"),this.numbers=new RegExp("[0-9]"),this.specialchars=new RegExp("([!,%,&,@,#,$,^,*,?,_,~,/])");var e=this;this.field.on("keyup keydown",function(){e._checkStrength($(this).val())})},_setPercentage:function(e){this.meter.css({width:e+"%"})},_setClass:function(e){e<=1?(this.meter.removeClass(),this.meter.addClass("password-strength password-strength--veryweak")):2===e?(this.meter.removeClass(),this.meter.addClass("password-strength password-strength--weak")):3===e?(this.meter.removeClass(),this.meter.addClass("password-strength password-strength--medium")):(this.meter.removeClass(),this.meter.addClass("password-strength password-strength--strong"))},_checkStrength:function(e){e.length>=8?this.characters=1:this.characters=0,e.match(this.upperCase)?this.capitalletters=1:this.capitalletters=0,e.match(this.lowerCase)?this.lowerletters=1:this.lowerletters=0,e.match(this.numbers)?this.number=1:this.number=0,e.match(this.specialchars)?this.special=1:this.special=0;var t=this._getTotal(),a=this._getPercentage(5,t);this._setPercentage(a),this._setClass(t)},_getPercentage:function(e,t){return t/e*100},_getTotal:function(){return this.characters+this.capitalletters+this.lowerletters+this.number+this.special}},e.PasswordMeter=t}(window),function(e){"use strict";function t(){}t.prototype={initSearcher:function(){this.searchurl=this.el.data("searchurl"),this.results=this.el.find("ul.related-search__results"),this.search=this.el.find('input[name="_relatedsearch"]'),this.searching=!1,this.itemKeys=[],this._extractItems(),this._initSearcherEvents()},_initSearcherEvents:function(){var e=this;this.search.on("keydown.searchable",function(t){var a=$(this).val().trim(),i=$(this);return 27==t.which?(t.stopPropagation(),""===a?i.blur():i.val(""),void e._clearSearch()):40==t.which?(t.stopPropagation(),void(e._hasResults()&&e._focusResult(0))):(13==t.which&&(t.preventDefault(),e._searchPressReturn(a)),!e.searching&&a.length>0&&e._search(a),void(""==a&&e._clearSearch()))}),this.search.on("focus",function(){e._showResults()}),$("body").click(function(){e._hideResults()}),this.el.click(function(e){e.stopPropagation()}),this.results.on("keydown.searchable","input.related-search__input",function(t){t.stopPropagation(),t.preventDefault();var a=$(this).closest("li");40==t.which?a.is(":last-child")||e._focusResult(a.index()+1):38==t.which?a.is(":first-child")?e._focusSearch():e._focusResult(a.index()-1):13==t.which&&e._addItem(a)}),this.results.on("click.searchable","li.related-search__result",function(){e._addItem($(this))}),this.results.on("mouseenter.searchable","li.related-search__result",function(){e._focusResult($(this).index())})},_searchPressReturn:function(e){},_populateResults:function(e){this.results.empty();for(var t in e)if(this.itemKeys.indexOf(parseInt(t))==-1){var a=this._addResult(t,e[t]);this.results.append(a)}},_hasResults:function(){return this.results.find("li.related-search__result").length>0},_focusResult:function(e){var t=$(this.results).find("li.related-search__result"),a=t.eq(e);t.removeClass("related-search__result--selected"),a.addClass("related-search__result--selected"),a.find("input").focus()},_focusSearch:function(){$(this.results).find("li.related-search__result").removeClass("related-search__result--selected"),this.search.focus()},_clearSearch:function(){this.results.empty(),this.search.val("")},_showResults:function(){this.results.removeClass("related-search__results--hidden")},_hideResults:function(){this.results.addClass("related-search__results--hidden")}},e.Searcher=t}(window),function(e){"use strict";function t(e){this.el=e,this._init()}inheritsFrom(t,Searcher),t.prototype._init=function(){this.mode=this.el.data("mode"),this.filter=this.el.data("filter"),this.items=this.el.find("ul.related-items"),this.value=this.el.find('input[type="hidden"]'),this.initSearcher(),this._initEvents()},t.prototype._extractItems=function(){var e=this.value.val().trim();""!=e&&("single"===this.mode?this.itemKeys.push(parseInt(e)):this.itemKeys=JSON.parse(e))},t.prototype._initEvents=function(){var e=this;this.items.on("click","i.related-item__close",function(t){t.stopPropagation(),e._removeItem($(this).parent())}),"single"!==this.mode&&this.items.sortable({tolerance:"pointer",placeholder:"placeholder",opacity:.7,delay:50,stop:function(){e._regenerateValue()}})},t.prototype._search=function(e){var t=this;t.searching||$.post(this.searchurl,{q:e,filter:t.filter},function(e){t._populateResults(e)})},t.prototype._addResult=function(e,t){return $('<li class="related-search__result">'+t+'<input class="related-search__input" type="text" value="'+e+'"></li>')},t.prototype._addItem=function(e){var t=parseInt(e.find("input").val()),e=$('<li class="related-item" data-id="'+t+'">'+e.text()+'<i class="icon-cancel related-item__close"></i></li>');"single"===this.mode&&(this.items.empty(),this.itemKeys=[]),this.items.append(e),this.itemKeys.push(t),this._regenerateValue(),this._clearSearch(),this.search.focus()},t.prototype._removeItem=function(e){var t=this.itemKeys.indexOf(e.data("id"));delete this.itemKeys[t],e.remove(),this._regenerateValue()},t.prototype._regenerateValue=function(){var e="";if("single"===this.mode){var t=this.items.find("li.related-item:first-child");1==t.length&&(e=t.data("id"))}else{for(var a=[],i=this.items.find("li.related-item"),r=0;r<i.length;r++)a.push($(i[r]).data("id"));e=JSON.stringify(a)}this.value.val(e)},e.RelationField=t}(window),function(e){"use strict";function t(e){this.el=e,this._init()}t.prototype={_init:function(){this.input=this.el.find('input[type="text"]');var e="undefined"!=typeof this.input.data("follows")?this.input.data("follows"):"#title";this.follow=$(e),this.dirty=""!==this.input.val(),this._initEvents()},_initEvents:function(){var e=this;this.input.on("keyup",function(){e.dirty=!0}),this.follow.on("keyup",function(){e.dirty||e._setSlug()}),this.input.on("blur",function(){""===e.input.val()&&(e.changed=!1,e._setSlug())})},_setSlug:function(){var e=this._slugify(this.follow.val());this.input.val(e)},_slugify:function(e){e=e.replace(/^\s+|\s+$/g,"").toLowerCase();for(var t="àáäâèéëêıìíïîòóöôùúüûñçğş·/_,:;",a="aaaaeeeeiiiiioooouuuuncgs------",i=0,r=t.length;i<r;i++)e=e.replace(new RegExp(t.charAt(i),"g"),a.charAt(i));return e.replace(/[^a-z0-9 -]/g,"").replace(/\s+/g,"-").replace(/-+/g,"-")}},e.Slug=t}(window),$(".form-group input, .form-group textarea").focus(function(){$(this).closest(".form-group").find(".form-group__label").addClass("form-group__label--focus")}),$(".form-group input, .form-group textarea").blur(function(){$(this).closest(".form-group").find(".form-group__label").removeClass("form-group__label--focus")}),$(".form-group--password").each(function(){new PasswordMeter($(this))}),$(".form-group--slug").each(function(){new Slug($(this))}),$("input.minicolors").minicolors({position:"bottom left"}),$.datetimepicker.setLocale(window.locale),$(".form-group--datetime").each(function(){$(this).find('input[type="text"]').datetimepicker({format:"Y-m-d H:i:s"})}),$(".form-group__relation").each(function(){new RelationField($(this))});
=======
!function (e) {
    "function" == typeof define && define.amd ? define(["jquery"], e) : "object" == typeof exports ? module.exports = e(require("jquery")) : e(jQuery)
}(function (e) {
    "use strict";
    function t(t, a) {
        var i, r, n, o, s, d = e('<div class="minicolors" />'), u = e.minicolors.defaults;
        if (!t.data("minicolors-initialized")) {
            if (a = e.extend(!0, {}, u, a), d.addClass("minicolors-theme-" + a.theme).toggleClass("minicolors-with-opacity", a.opacity).toggleClass("minicolors-no-data-uris", a.dataUris !== !0), void 0 !== a.position && e.each(a.position.split(" "), function () {
                    d.addClass("minicolors-position-" + this)
                }), i = "rgb" === a.format ? a.opacity ? "25" : "20" : a.keywords ? "11" : "7", t.addClass("minicolors-input").data("minicolors-initialized", !1).data("minicolors-settings", a).prop("size", i).wrap(d).after('<div class="minicolors-panel minicolors-slider-' + a.control + '"><div class="minicolors-slider minicolors-sprite"><div class="minicolors-picker"></div></div><div class="minicolors-opacity-slider minicolors-sprite"><div class="minicolors-picker"></div></div><div class="minicolors-grid minicolors-sprite"><div class="minicolors-grid-inner"></div><div class="minicolors-picker"><div></div></div></div></div>'), a.inline || (t.after('<span class="minicolors-swatch minicolors-sprite minicolors-input-swatch"><span class="minicolors-swatch-color"></span></span>'), t.next(".minicolors-input-swatch").on("click", function (e) {
                    e.preventDefault(), t.focus()
                })), o = t.parent().find(".minicolors-panel"), o.on("selectstart", function () {
                    return !1
                }).end(), a.swatches && 0 !== a.swatches.length)for (a.swatches.length > 7 && (a.swatches.length = 7), o.addClass("minicolors-with-swatches"), r = e('<ul class="minicolors-swatches"></ul>').appendTo(o), s = 0; s < a.swatches.length; ++s)n = a.swatches[s], n = v(n) ? m(n, !0) : T(f(n, !0)), e('<li class="minicolors-swatch minicolors-sprite"><span class="minicolors-swatch-color"></span></li>').appendTo(r).data("swatch-color", a.swatches[s]).find(".minicolors-swatch-color").css({
                backgroundColor: x(n),
                opacity: n.a
            }), a.swatches[s] = n;
            a.inline && t.parent().addClass("minicolors-inline"), l(t, !1), t.data("minicolors-initialized", !0)
        }
    }

    function a(e) {
        var t = e.parent();
        e.removeData("minicolors-initialized").removeData("minicolors-settings").removeProp("size").removeClass("minicolors-input"), t.before(e).remove()
    }

    function i(e) {
        var t = e.parent(), a = t.find(".minicolors-panel"), i = e.data("minicolors-settings");
        !e.data("minicolors-initialized") || e.prop("disabled") || t.hasClass("minicolors-inline") || t.hasClass("minicolors-focus") || (r(), t.addClass("minicolors-focus"), a.stop(!0, !0).fadeIn(i.showSpeed, function () {
            i.show && i.show.call(e.get(0))
        }))
    }

    function r() {
        e(".minicolors-focus").each(function () {
            var t = e(this), a = t.find(".minicolors-input"), i = t.find(".minicolors-panel"), r = a.data("minicolors-settings");
            i.fadeOut(r.hideSpeed, function () {
                r.hide && r.hide.call(a.get(0)), t.removeClass("minicolors-focus")
            })
        })
    }

    function n(e, t, a) {
        var i, r, n, s, l = e.parents(".minicolors").find(".minicolors-input"), d = l.data("minicolors-settings"), u = e.find("[class$=-picker]"), c = e.offset().left, h = e.offset().top, f = Math.round(t.pageX - c), m = Math.round(t.pageY - h), g = a ? d.animationSpeed : 0;
        t.originalEvent.changedTouches && (f = t.originalEvent.changedTouches[0].pageX - c, m = t.originalEvent.changedTouches[0].pageY - h), 0 > f && (f = 0), 0 > m && (m = 0), f > e.width() && (f = e.width()), m > e.height() && (m = e.height()), e.parent().is(".minicolors-slider-wheel") && u.parent().is(".minicolors-grid") && (i = 75 - f, r = 75 - m, n = Math.sqrt(i * i + r * r), s = Math.atan2(r, i), 0 > s && (s += 2 * Math.PI), n > 75 && (n = 75, f = 75 - 75 * Math.cos(s), m = 75 - 75 * Math.sin(s)), f = Math.round(f), m = Math.round(m)), e.is(".minicolors-grid") ? u.stop(!0).animate({
            top: m + "px",
            left: f + "px"
        }, g, d.animationEasing, function () {
            o(l, e)
        }) : u.stop(!0).animate({top: m + "px"}, g, d.animationEasing, function () {
            o(l, e)
        })
    }

    function o(e, t) {
        function a(e, t) {
            var a, i;
            return e.length && t ? (a = e.offset().left, i = e.offset().top, {
                x: a - t.offset().left + e.outerWidth() / 2,
                y: i - t.offset().top + e.outerHeight() / 2
            }) : null
        }

        var i, r, n, o, l, u, c, h = e.val(), f = e.attr("data-opacity"), m = e.parent(), g = e.data("minicolors-settings"), v = m.find(".minicolors-input-swatch"), y = m.find(".minicolors-grid"), b = m.find(".minicolors-slider"), k = m.find(".minicolors-opacity-slider"), x = y.find("[class$=-picker]"), D = b.find("[class$=-picker]"), S = k.find("[class$=-picker]"), T = a(x, y), _ = a(D, b), M = a(S, k);
        if (t.is(".minicolors-grid, .minicolors-slider, .minicolors-opacity-slider")) {
            switch (g.control) {
                case"wheel":
                    o = y.width() / 2 - T.x, l = y.height() / 2 - T.y, u = Math.sqrt(o * o + l * l), c = Math.atan2(l, o), 0 > c && (c += 2 * Math.PI), u > 75 && (u = 75, T.x = 69 - 75 * Math.cos(c), T.y = 69 - 75 * Math.sin(c)), r = p(u / .75, 0, 100), i = p(180 * c / Math.PI, 0, 360), n = p(100 - Math.floor(_.y * (100 / b.height())), 0, 100), h = w({
                        h: i,
                        s: r,
                        b: n
                    }), b.css("backgroundColor", w({h: i, s: r, b: 100}));
                    break;
                case"saturation":
                    i = p(parseInt(T.x * (360 / y.width()), 10), 0, 360), r = p(100 - Math.floor(_.y * (100 / b.height())), 0, 100), n = p(100 - Math.floor(T.y * (100 / y.height())), 0, 100), h = w({
                        h: i,
                        s: r,
                        b: n
                    }), b.css("backgroundColor", w({
                        h: i,
                        s: 100,
                        b: n
                    })), m.find(".minicolors-grid-inner").css("opacity", r / 100);
                    break;
                case"brightness":
                    i = p(parseInt(T.x * (360 / y.width()), 10), 0, 360), r = p(100 - Math.floor(T.y * (100 / y.height())), 0, 100), n = p(100 - Math.floor(_.y * (100 / b.height())), 0, 100), h = w({
                        h: i,
                        s: r,
                        b: n
                    }), b.css("backgroundColor", w({
                        h: i,
                        s: r,
                        b: 100
                    })), m.find(".minicolors-grid-inner").css("opacity", 1 - n / 100);
                    break;
                default:
                    i = p(360 - parseInt(_.y * (360 / b.height()), 10), 0, 360), r = p(Math.floor(T.x * (100 / y.width())), 0, 100), n = p(100 - Math.floor(T.y * (100 / y.height())), 0, 100), h = w({
                        h: i,
                        s: r,
                        b: n
                    }), y.css("backgroundColor", w({h: i, s: 100, b: 100}))
            }
            f = g.opacity ? parseFloat(1 - M.y / k.height()).toFixed(2) : 1, s(e, h, f)
        } else v.find("span").css({backgroundColor: h, opacity: f}), d(e, h, f)
    }

    function s(e, t, a) {
        var i, r = e.parent(), n = e.data("minicolors-settings"), o = r.find(".minicolors-input-swatch");
        n.opacity && e.attr("data-opacity", a), "rgb" === n.format ? (i = v(t) ? m(t, !0) : T(f(t, !0)), a = "" === e.attr("data-opacity") ? 1 : p(parseFloat(e.attr("data-opacity")).toFixed(2), 0, 1), (isNaN(a) || !n.opacity) && (a = 1), t = e.minicolors("rgbObject").a <= 1 && i && n.opacity ? "rgba(" + i.r + ", " + i.g + ", " + i.b + ", " + parseFloat(a) + ")" : "rgb(" + i.r + ", " + i.g + ", " + i.b + ")") : (v(t) && (t = k(t)), t = h(t, n.letterCase)), e.val(t), o.find("span").css({
            backgroundColor: t,
            opacity: a
        }), d(e, t, a)
    }

    function l(t, a) {
        var i, r, n, o, s, l, u, c, b, x, S = t.parent(), T = t.data("minicolors-settings"), _ = S.find(".minicolors-input-swatch"), M = S.find(".minicolors-grid"), O = S.find(".minicolors-slider"), C = S.find(".minicolors-opacity-slider"), W = M.find("[class$=-picker]"), F = O.find("[class$=-picker]"), P = C.find("[class$=-picker]");
        switch (v(t.val()) ? (i = k(t.val()), s = p(parseFloat(y(t.val())).toFixed(2), 0, 1), s && t.attr("data-opacity", s)) : i = h(f(t.val(), !0), T.letterCase), i || (i = h(g(T.defaultValue, !0), T.letterCase)), r = D(i), o = T.keywords ? e.map(T.keywords.split(","), function (t) {
            return e.trim(t.toLowerCase())
        }) : [], l = "" !== t.val() && e.inArray(t.val().toLowerCase(), o) > -1 ? h(t.val()) : v(t.val()) ? m(t.val()) : i, a || t.val(l), T.opacity && (n = "" === t.attr("data-opacity") ? 1 : p(parseFloat(t.attr("data-opacity")).toFixed(2), 0, 1), isNaN(n) && (n = 1), t.attr("data-opacity", n), _.find("span").css("opacity", n), c = p(C.height() - C.height() * n, 0, C.height()), P.css("top", c + "px")), "transparent" === t.val().toLowerCase() && _.find("span").css("opacity", 0), _.find("span").css("backgroundColor", i), T.control) {
            case"wheel":
                b = p(Math.ceil(.75 * r.s), 0, M.height() / 2), x = r.h * Math.PI / 180, u = p(75 - Math.cos(x) * b, 0, M.width()), c = p(75 - Math.sin(x) * b, 0, M.height()), W.css({
                    top: c + "px",
                    left: u + "px"
                }), c = 150 - r.b / (100 / M.height()), "" === i && (c = 0), F.css("top", c + "px"), O.css("backgroundColor", w({
                    h: r.h,
                    s: r.s,
                    b: 100
                }));
                break;
            case"saturation":
                u = p(5 * r.h / 12, 0, 150), c = p(M.height() - Math.ceil(r.b / (100 / M.height())), 0, M.height()), W.css({
                    top: c + "px",
                    left: u + "px"
                }), c = p(O.height() - r.s * (O.height() / 100), 0, O.height()), F.css("top", c + "px"), O.css("backgroundColor", w({
                    h: r.h,
                    s: 100,
                    b: r.b
                })), S.find(".minicolors-grid-inner").css("opacity", r.s / 100);
                break;
            case"brightness":
                u = p(5 * r.h / 12, 0, 150), c = p(M.height() - Math.ceil(r.s / (100 / M.height())), 0, M.height()), W.css({
                    top: c + "px",
                    left: u + "px"
                }), c = p(O.height() - r.b * (O.height() / 100), 0, O.height()), F.css("top", c + "px"), O.css("backgroundColor", w({
                    h: r.h,
                    s: r.s,
                    b: 100
                })), S.find(".minicolors-grid-inner").css("opacity", 1 - r.b / 100);
                break;
            default:
                u = p(Math.ceil(r.s / (100 / M.width())), 0, M.width()), c = p(M.height() - Math.ceil(r.b / (100 / M.height())), 0, M.height()), W.css({
                    top: c + "px",
                    left: u + "px"
                }), c = p(O.height() - r.h / (360 / O.height()), 0, O.height()), F.css("top", c + "px"), M.css("backgroundColor", w({
                    h: r.h,
                    s: 100,
                    b: 100
                }))
        }
        t.data("minicolors-initialized") && d(t, l, n)
    }

    function d(e, t, a) {
        var i, r, n, o = e.data("minicolors-settings"), s = e.data("minicolors-lastChange");
        if (!s || s.value !== t || s.opacity !== a) {
            if (e.data("minicolors-lastChange", {value: t, opacity: a}), o.swatches && 0 !== o.swatches.length) {
                for (i = v(t) ? m(t, !0) : T(t), r = -1, n = 0; n < o.swatches.length; ++n)if (i.r === o.swatches[n].r && i.g === o.swatches[n].g && i.b === o.swatches[n].b && i.a === o.swatches[n].a) {
                    r = n;
                    break
                }
                e.parent().find(".minicolors-swatches .minicolors-swatch").removeClass("selected"), -1 !== n && e.parent().find(".minicolors-swatches .minicolors-swatch").eq(n).addClass("selected")
            }
            o.change && (o.changeDelay ? (clearTimeout(e.data("minicolors-changeTimeout")), e.data("minicolors-changeTimeout", setTimeout(function () {
                o.change.call(e.get(0), t, a)
            }, o.changeDelay))) : o.change.call(e.get(0), t, a)), e.trigger("change").trigger("input")
        }
    }

    function u(t) {
        var a = f(e(t).val(), !0), i = T(a), r = e(t).attr("data-opacity");
        return i ? (void 0 !== r && e.extend(i, {a: parseFloat(r)}), i) : null
    }

    function c(t, a) {
        var i = f(e(t).val(), !0), r = T(i), n = e(t).attr("data-opacity");
        return r ? (void 0 === n && (n = 1), a ? "rgba(" + r.r + ", " + r.g + ", " + r.b + ", " + parseFloat(n) + ")" : "rgb(" + r.r + ", " + r.g + ", " + r.b + ")") : null
    }

    function h(e, t) {
        return "uppercase" === t ? e.toUpperCase() : e.toLowerCase()
    }

    function f(e, t) {
        return e = e.replace(/^#/g, ""), e.match(/^[A-F0-9]{3,6}/gi) ? 3 !== e.length && 6 !== e.length ? "" : (3 === e.length && t && (e = e[0] + e[0] + e[1] + e[1] + e[2] + e[2]), "#" + e) : ""
    }

    function m(e, t) {
        var a = e.replace(/[^\d,.]/g, ""), i = a.split(",");
        return i[0] = p(parseInt(i[0], 10), 0, 255), i[1] = p(parseInt(i[1], 10), 0, 255), i[2] = p(parseInt(i[2], 10), 0, 255), i[3] && (i[3] = p(parseFloat(i[3], 10), 0, 1)), t ? {
            r: i[0],
            g: i[1],
            b: i[2],
            a: i[3] ? i[3] : null
        } : "undefined" != typeof i[3] && i[3] <= 1 ? "rgba(" + i[0] + ", " + i[1] + ", " + i[2] + ", " + i[3] + ")" : "rgb(" + i[0] + ", " + i[1] + ", " + i[2] + ")"
    }

    function g(e, t) {
        return v(e) ? m(e) : f(e, t)
    }

    function p(e, t, a) {
        return t > e && (e = t), e > a && (e = a), e
    }

    function v(e) {
        var t = e.match(/^rgba?[\s+]?\([\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?/i);
        return !(!t || 4 !== t.length)
    }

    function y(e) {
        return e = e.match(/^rgba?[\s+]?\([\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?,[\s+]?(\d+(\.\d{1,2})?|\.\d{1,2})[\s+]?/i), e && 6 === e.length ? e[4] : "1"
    }

    function b(e) {
        var t = {}, a = Math.round(e.h), i = Math.round(255 * e.s / 100), r = Math.round(255 * e.b / 100);
        if (0 === i)t.r = t.g = t.b = r; else {
            var n = r, o = (255 - i) * r / 255, s = (n - o) * (a % 60) / 60;
            360 === a && (a = 0), 60 > a ? (t.r = n, t.b = o, t.g = o + s) : 120 > a ? (t.g = n, t.b = o, t.r = n - s) : 180 > a ? (t.g = n, t.r = o, t.b = o + s) : 240 > a ? (t.b = n, t.r = o, t.g = n - s) : 300 > a ? (t.b = n, t.g = o, t.r = o + s) : 360 > a ? (t.r = n, t.g = o, t.b = n - s) : (t.r = 0, t.g = 0, t.b = 0)
        }
        return {r: Math.round(t.r), g: Math.round(t.g), b: Math.round(t.b)}
    }

    function k(e) {
        return e = e.match(/^rgba?[\s+]?\([\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?/i), e && 4 === e.length ? "#" + ("0" + parseInt(e[1], 10).toString(16)).slice(-2) + ("0" + parseInt(e[2], 10).toString(16)).slice(-2) + ("0" + parseInt(e[3], 10).toString(16)).slice(-2) : ""
    }

    function x(t) {
        var a = [t.r.toString(16), t.g.toString(16), t.b.toString(16)];
        return e.each(a, function (e, t) {
            1 === t.length && (a[e] = "0" + t)
        }), "#" + a.join("")
    }

    function w(e) {
        return x(b(e))
    }

    function D(e) {
        var t = S(T(e));
        return 0 === t.s && (t.h = 360), t
    }

    function S(e) {
        var t = {h: 0, s: 0, b: 0}, a = Math.min(e.r, e.g, e.b), i = Math.max(e.r, e.g, e.b), r = i - a;
        return t.b = i, t.s = 0 !== i ? 255 * r / i : 0, 0 !== t.s ? e.r === i ? t.h = (e.g - e.b) / r : e.g === i ? t.h = 2 + (e.b - e.r) / r : t.h = 4 + (e.r - e.g) / r : t.h = -1, t.h *= 60, t.h < 0 && (t.h += 360), t.s *= 100 / 255, t.b *= 100 / 255, t
    }

    function T(e) {
        return e = parseInt(e.indexOf("#") > -1 ? e.substring(1) : e, 16), {r: e >> 16, g: (65280 & e) >> 8, b: 255 & e}
    }

    e.minicolors = {
        defaults: {
            animationSpeed: 50,
            animationEasing: "swing",
            change: null,
            changeDelay: 0,
            control: "hue",
            dataUris: !0,
            defaultValue: "",
            format: "hex",
            hide: null,
            hideSpeed: 100,
            inline: !1,
            keywords: "",
            letterCase: "lowercase",
            opacity: !1,
            position: "bottom left",
            show: null,
            showSpeed: 100,
            theme: "default",
            swatches: []
        }
    }, e.extend(e.fn, {
        minicolors: function (n, o) {
            switch (n) {
                case"destroy":
                    return e(this).each(function () {
                        a(e(this))
                    }), e(this);
                case"hide":
                    return r(), e(this);
                case"opacity":
                    return void 0 === o ? e(this).attr("data-opacity") : (e(this).each(function () {
                        l(e(this).attr("data-opacity", o))
                    }), e(this));
                case"rgbObject":
                    return u(e(this), "rgbaObject" === n);
                case"rgbString":
                case"rgbaString":
                    return c(e(this), "rgbaString" === n);
                case"settings":
                    return void 0 === o ? e(this).data("minicolors-settings") : (e(this).each(function () {
                        var t = e(this).data("minicolors-settings") || {};
                        a(e(this)), e(this).minicolors(e.extend(!0, t, o))
                    }), e(this));
                case"show":
                    return i(e(this).eq(0)), e(this);
                case"value":
                    return void 0 === o ? e(this).val() : (e(this).each(function () {
                        "object" == typeof o ? (o.opacity && e(this).attr("data-opacity", p(o.opacity, 0, 1)), o.color && e(this).val(o.color)) : e(this).val(o), l(e(this))
                    }), e(this));
                default:
                    return "create" !== n && (o = n), e(this).each(function () {
                        t(e(this), o)
                    }), e(this)
            }
        }
    }), e(document).on("mousedown.minicolors touchstart.minicolors", function (t) {
        e(t.target).parents().add(t.target).hasClass("minicolors") || r()
    }).on("mousedown.minicolors touchstart.minicolors", ".minicolors-grid, .minicolors-slider, .minicolors-opacity-slider", function (t) {
        var a = e(this);
        t.preventDefault(), e(document).data("minicolors-target", a), n(a, t, !0)
    }).on("mousemove.minicolors touchmove.minicolors", function (t) {
        var a = e(document).data("minicolors-target");
        a && n(a, t)
    }).on("mouseup.minicolors touchend.minicolors", function () {
        e(this).removeData("minicolors-target")
    }).on("click.minicolors", ".minicolors-swatches li", function (t) {
        t.preventDefault();
        var a = e(this), i = a.parents(".minicolors").find(".minicolors-input"), r = a.data("swatch-color");
        s(i, r, y(r)), l(i)
    }).on("mousedown.minicolors touchstart.minicolors", ".minicolors-input-swatch", function (t) {
        var a = e(this).parent().find(".minicolors-input");
        t.preventDefault(), i(a)
    }).on("focus.minicolors", ".minicolors-input", function () {
        var t = e(this);
        t.data("minicolors-initialized") && i(t)
    }).on("blur.minicolors", ".minicolors-input", function () {
        var t, a, i, r, n, o = e(this), s = o.data("minicolors-settings");
        o.data("minicolors-initialized") && (t = s.keywords ? e.map(s.keywords.split(","), function (t) {
            return e.trim(t.toLowerCase())
        }) : [], "" !== o.val() && e.inArray(o.val().toLowerCase(), t) > -1 ? n = o.val() : (v(o.val()) ? i = m(o.val(), !0) : (a = f(o.val(), !0), i = a ? T(a) : null), n = null === i ? s.defaultValue : "rgb" === s.format ? m(s.opacity ? "rgba(" + i.r + "," + i.g + "," + i.b + "," + o.attr("data-opacity") + ")" : "rgb(" + i.r + "," + i.g + "," + i.b + ")") : x(i)), r = s.opacity ? o.attr("data-opacity") : 1, "transparent" === n.toLowerCase() && (r = 0), o.closest(".minicolors").find(".minicolors-input-swatch > span").css("opacity", r), o.val(n), "" === o.val() && o.val(g(s.defaultValue, !0)), o.val(h(o.val(), s.letterCase)))
    }).on("keydown.minicolors", ".minicolors-input", function (t) {
        var a = e(this);
        if (a.data("minicolors-initialized"))switch (t.keyCode) {
            case 9:
                r();
                break;
            case 13:
            case 27:
                r(), a.blur()
        }
    }).on("keyup.minicolors", ".minicolors-input", function () {
        var t = e(this);
        t.data("minicolors-initialized") && l(t, !0)
    }).on("paste.minicolors", ".minicolors-input", function () {
        var t = e(this);
        t.data("minicolors-initialized") && setTimeout(function () {
            l(t, !0)
        }, 1)
    })
});
var DateFormatter;
!function () {
    "use strict";
    var e, t, a, i, r, n;
    r = 864e5, n = 3600, e = function (e, t) {
        return "string" == typeof e && "string" == typeof t && e.toLowerCase() === t.toLowerCase()
    }, t = function (e, a, i) {
        var r = i || "0", n = e.toString();
        return n.length < a ? t(r + n, a) : n
    }, a = function (e) {
        var t, i;
        for (e = e || {}, t = 1; t < arguments.length; t++)if (i = arguments[t])for (var r in i)i.hasOwnProperty(r) && ("object" == typeof i[r] ? a(e[r], i[r]) : e[r] = i[r]);
        return e
    }, i = {
        dateSettings: {
            days: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
            daysShort: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
            months: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
            monthsShort: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            meridiem: ["AM", "PM"],
            ordinal: function (e) {
                var t = e % 10, a = {1: "st", 2: "nd", 3: "rd"};
                return 1 !== Math.floor(e % 100 / 10) && a[t] ? a[t] : "th"
            }
        },
        separators: /[ \-+\/\.T:@]/g,
        validParts: /[dDjlNSwzWFmMntLoYyaABgGhHisueTIOPZcrU]/g,
        intParts: /[djwNzmnyYhHgGis]/g,
        tzParts: /\b(?:[PMCEA][SDP]T|(?:Pacific|Mountain|Central|Eastern|Atlantic) (?:Standard|Daylight|Prevailing) Time|(?:GMT|UTC)(?:[-+]\d{4})?)\b/g,
        tzClip: /[^-+\dA-Z]/g
    }, DateFormatter = function (e) {
        var t = this, r = a(i, e);
        t.dateSettings = r.dateSettings, t.separators = r.separators, t.validParts = r.validParts, t.intParts = r.intParts, t.tzParts = r.tzParts, t.tzClip = r.tzClip
    }, DateFormatter.prototype = {
        constructor: DateFormatter, parseDate: function (t, a) {
            var i, r, n, o, s, l, d, u, c, h, f = this, m = !1, g = !1, p = f.dateSettings, v = {
                date: null,
                year: null,
                month: null,
                day: null,
                hour: 0,
                min: 0,
                sec: 0
            };
            if (t) {
                if (t instanceof Date)return t;
                if ("number" == typeof t)return new Date(t);
                if ("U" === a)return n = parseInt(t), n ? new Date(1e3 * n) : t;
                if ("string" != typeof t)return "";
                if (i = a.match(f.validParts), !i || 0 === i.length)throw new Error("Invalid date format definition.");
                for (r = t.replace(f.separators, "\0").split("\0"), n = 0; n < r.length; n++)switch (o = r[n], s = parseInt(o), i[n]) {
                    case"y":
                    case"Y":
                        c = o.length, 2 === c ? v.year = parseInt((70 > s ? "20" : "19") + o) : 4 === c && (v.year = s), m = !0;
                        break;
                    case"m":
                    case"n":
                    case"M":
                    case"F":
                        isNaN(o) ? (l = p.monthsShort.indexOf(o), l > -1 && (v.month = l + 1), l = p.months.indexOf(o), l > -1 && (v.month = l + 1)) : s >= 1 && 12 >= s && (v.month = s), m = !0;
                        break;
                    case"d":
                    case"j":
                        s >= 1 && 31 >= s && (v.day = s), m = !0;
                        break;
                    case"g":
                    case"h":
                        d = i.indexOf("a") > -1 ? i.indexOf("a") : i.indexOf("A") > -1 ? i.indexOf("A") : -1, h = r[d], d > -1 ? (u = e(h, p.meridiem[0]) ? 0 : e(h, p.meridiem[1]) ? 12 : -1, s >= 1 && 12 >= s && u > -1 ? v.hour = s + u - 1 : s >= 0 && 23 >= s && (v.hour = s)) : s >= 0 && 23 >= s && (v.hour = s), g = !0;
                        break;
                    case"G":
                    case"H":
                        s >= 0 && 23 >= s && (v.hour = s), g = !0;
                        break;
                    case"i":
                        s >= 0 && 59 >= s && (v.min = s), g = !0;
                        break;
                    case"s":
                        s >= 0 && 59 >= s && (v.sec = s), g = !0
                }
                if (m === !0 && v.year && v.month && v.day)v.date = new Date(v.year, v.month - 1, v.day, v.hour, v.min, v.sec, 0); else {
                    if (g !== !0)return !1;
                    v.date = new Date(0, 0, 0, v.hour, v.min, v.sec, 0)
                }
                return v.date
            }
        }, guessDate: function (e, t) {
            if ("string" != typeof e)return e;
            var a, i, r, n, o = this, s = e.replace(o.separators, "\0").split("\0"), l = /^[djmn]/g, d = t.match(o.validParts), u = new Date, c = 0;
            if (!l.test(d[0]))return e;
            for (i = 0; i < s.length; i++) {
                switch (c = 2, r = s[i], n = parseInt(r.substr(0, 2)), i) {
                    case 0:
                        "m" === d[0] || "n" === d[0] ? u.setMonth(n - 1) : u.setDate(n);
                        break;
                    case 1:
                        "m" === d[0] || "n" === d[0] ? u.setDate(n) : u.setMonth(n - 1);
                        break;
                    case 2:
                        a = u.getFullYear(), r.length < 4 ? (u.setFullYear(parseInt(a.toString().substr(0, 4 - r.length) + r)), c = r.length) : (u.setFullYear = parseInt(r.substr(0, 4)), c = 4);
                        break;
                    case 3:
                        u.setHours(n);
                        break;
                    case 4:
                        u.setMinutes(n);
                        break;
                    case 5:
                        u.setSeconds(n)
                }
                r.substr(c).length > 0 && s.splice(i + 1, 0, r.substr(c))
            }
            return u
        }, parseFormat: function (e, a) {
            var i, o = this, s = o.dateSettings, l = /\\?(.?)/gi, d = function (e, t) {
                return i[e] ? i[e]() : t
            };
            return i = {
                d: function () {
                    return t(i.j(), 2)
                }, D: function () {
                    return s.daysShort[i.w()]
                }, j: function () {
                    return a.getDate()
                }, l: function () {
                    return s.days[i.w()]
                }, N: function () {
                    return i.w() || 7
                }, w: function () {
                    return a.getDay()
                }, z: function () {
                    var e = new Date(i.Y(), i.n() - 1, i.j()), t = new Date(i.Y(), 0, 1);
                    return Math.round((e - t) / r)
                }, W: function () {
                    var e = new Date(i.Y(), i.n() - 1, i.j() - i.N() + 3), a = new Date(e.getFullYear(), 0, 4);
                    return t(1 + Math.round((e - a) / r / 7), 2)
                }, F: function () {
                    return s.months[a.getMonth()]
                }, m: function () {
                    return t(i.n(), 2)
                }, M: function () {
                    return s.monthsShort[a.getMonth()]
                }, n: function () {
                    return a.getMonth() + 1
                }, t: function () {
                    return new Date(i.Y(), i.n(), 0).getDate()
                }, L: function () {
                    var e = i.Y();
                    return e % 4 === 0 && e % 100 !== 0 || e % 400 === 0 ? 1 : 0
                }, o: function () {
                    var e = i.n(), t = i.W(), a = i.Y();
                    return a + (12 === e && 9 > t ? 1 : 1 === e && t > 9 ? -1 : 0)
                }, Y: function () {
                    return a.getFullYear()
                }, y: function () {
                    return i.Y().toString().slice(-2)
                }, a: function () {
                    return i.A().toLowerCase()
                }, A: function () {
                    var e = i.G() < 12 ? 0 : 1;
                    return s.meridiem[e]
                }, B: function () {
                    var e = a.getUTCHours() * n, i = 60 * a.getUTCMinutes(), r = a.getUTCSeconds();
                    return t(Math.floor((e + i + r + n) / 86.4) % 1e3, 3)
                }, g: function () {
                    return i.G() % 12 || 12
                }, G: function () {
                    return a.getHours()
                }, h: function () {
                    return t(i.g(), 2)
                }, H: function () {
                    return t(i.G(), 2)
                }, i: function () {
                    return t(a.getMinutes(), 2)
                }, s: function () {
                    return t(a.getSeconds(), 2)
                }, u: function () {
                    return t(1e3 * a.getMilliseconds(), 6)
                }, e: function () {
                    var e = /\((.*)\)/.exec(String(a))[1];
                    return e || "Coordinated Universal Time"
                }, T: function () {
                    var e = (String(a).match(o.tzParts) || [""]).pop().replace(o.tzClip, "");
                    return e || "UTC"
                }, I: function () {
                    var e = new Date(i.Y(), 0), t = Date.UTC(i.Y(), 0), a = new Date(i.Y(), 6), r = Date.UTC(i.Y(), 6);
                    return e - t !== a - r ? 1 : 0
                }, O: function () {
                    var e = a.getTimezoneOffset(), i = Math.abs(e);
                    return (e > 0 ? "-" : "+") + t(100 * Math.floor(i / 60) + i % 60, 4)
                }, P: function () {
                    var e = i.O();
                    return e.substr(0, 3) + ":" + e.substr(3, 2)
                }, Z: function () {
                    return 60 * -a.getTimezoneOffset()
                }, c: function () {
                    return "Y-m-d\\TH:i:sP".replace(l, d)
                }, r: function () {
                    return "D, d M Y H:i:s O".replace(l, d)
                }, U: function () {
                    return a.getTime() / 1e3 || 0
                }
            }, d(e, e)
        }, formatDate: function (e, t) {
            var a, i, r, n, o, s = this, l = "";
            if ("string" == typeof e && (e = s.parseDate(e, t), e === !1))return !1;
            if (e instanceof Date) {
                for (r = t.length, a = 0; r > a; a++)o = t.charAt(a), "S" !== o && (n = s.parseFormat(o, e), a !== r - 1 && s.intParts.test(o) && "S" === t.charAt(a + 1) && (i = parseInt(n), n += s.dateSettings.ordinal(i)), l += n);
                return l
            }
            return ""
        }
    }
}(), function (e) {
    "function" == typeof define && define.amd ? define(["jquery", "jquery-mousewheel"], e) : "object" == typeof exports ? module.exports = e : e(jQuery)
}(function (e) {
    "use strict";
    function t(e, t, a) {
        this.date = e, this.desc = t, this.style = a
    }

    var a = {
        i18n: {
            ar: {
                months: ["كانون الثاني", "شباط", "آذار", "نيسان", "مايو", "حزيران", "تموز", "آب", "أيلول", "تشرين الأول", "تشرين الثاني", "كانون الأول"],
                dayOfWeekShort: ["ن", "ث", "ع", "خ", "ج", "س", "ح"],
                dayOfWeek: ["الأحد", "الاثنين", "الثلاثاء", "الأربعاء", "الخميس", "الجمعة", "السبت", "الأحد"]
            },
            ro: {
                months: ["Ianuarie", "Februarie", "Martie", "Aprilie", "Mai", "Iunie", "Iulie", "August", "Septembrie", "Octombrie", "Noiembrie", "Decembrie"],
                dayOfWeekShort: ["Du", "Lu", "Ma", "Mi", "Jo", "Vi", "Sâ"],
                dayOfWeek: ["Duminică", "Luni", "Marţi", "Miercuri", "Joi", "Vineri", "Sâmbătă"]
            },
            id: {
                months: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
                dayOfWeekShort: ["Min", "Sen", "Sel", "Rab", "Kam", "Jum", "Sab"],
                dayOfWeek: ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"]
            },
            is: {
                months: ["Janúar", "Febrúar", "Mars", "Apríl", "Maí", "Júní", "Júlí", "Ágúst", "September", "Október", "Nóvember", "Desember"],
                dayOfWeekShort: ["Sun", "Mán", "Þrið", "Mið", "Fim", "Fös", "Lau"],
                dayOfWeek: ["Sunnudagur", "Mánudagur", "Þriðjudagur", "Miðvikudagur", "Fimmtudagur", "Föstudagur", "Laugardagur"]
            },
            bg: {
                months: ["Януари", "Февруари", "Март", "Април", "Май", "Юни", "Юли", "Август", "Септември", "Октомври", "Ноември", "Декември"],
                dayOfWeekShort: ["Нд", "Пн", "Вт", "Ср", "Чт", "Пт", "Сб"],
                dayOfWeek: ["Неделя", "Понеделник", "Вторник", "Сряда", "Четвъртък", "Петък", "Събота"]
            },
            fa: {
                months: ["فروردین", "اردیبهشت", "خرداد", "تیر", "مرداد", "شهریور", "مهر", "آبان", "آذر", "دی", "بهمن", "اسفند"],
                dayOfWeekShort: ["یکشنبه", "دوشنبه", "سه شنبه", "چهارشنبه", "پنجشنبه", "جمعه", "شنبه"],
                dayOfWeek: ["یک‌شنبه", "دوشنبه", "سه‌شنبه", "چهارشنبه", "پنج‌شنبه", "جمعه", "شنبه", "یک‌شنبه"]
            },
            ru: {
                months: ["Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь"],
                dayOfWeekShort: ["Вс", "Пн", "Вт", "Ср", "Чт", "Пт", "Сб"],
                dayOfWeek: ["Воскресенье", "Понедельник", "Вторник", "Среда", "Четверг", "Пятница", "Суббота"]
            },
            uk: {
                months: ["Січень", "Лютий", "Березень", "Квітень", "Травень", "Червень", "Липень", "Серпень", "Вересень", "Жовтень", "Листопад", "Грудень"],
                dayOfWeekShort: ["Ндл", "Пнд", "Втр", "Срд", "Чтв", "Птн", "Сбт"],
                dayOfWeek: ["Неділя", "Понеділок", "Вівторок", "Середа", "Четвер", "П'ятниця", "Субота"]
            },
            en: {
                months: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
                dayOfWeekShort: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
                dayOfWeek: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"]
            },
            el: {
                months: ["Ιανουάριος", "Φεβρουάριος", "Μάρτιος", "Απρίλιος", "Μάιος", "Ιούνιος", "Ιούλιος", "Αύγουστος", "Σεπτέμβριος", "Οκτώβριος", "Νοέμβριος", "Δεκέμβριος"],
                dayOfWeekShort: ["Κυρ", "Δευ", "Τρι", "Τετ", "Πεμ", "Παρ", "Σαβ"],
                dayOfWeek: ["Κυριακή", "Δευτέρα", "Τρίτη", "Τετάρτη", "Πέμπτη", "Παρασκευή", "Σάββατο"]
            },
            de: {
                months: ["Januar", "Februar", "März", "April", "Mai", "Juni", "Juli", "August", "September", "Oktober", "November", "Dezember"],
                dayOfWeekShort: ["So", "Mo", "Di", "Mi", "Do", "Fr", "Sa"],
                dayOfWeek: ["Sonntag", "Montag", "Dienstag", "Mittwoch", "Donnerstag", "Freitag", "Samstag"]
            },
            nl: {
                months: ["januari", "februari", "maart", "april", "mei", "juni", "juli", "augustus", "september", "oktober", "november", "december"],
                dayOfWeekShort: ["zo", "ma", "di", "wo", "do", "vr", "za"],
                dayOfWeek: ["zondag", "maandag", "dinsdag", "woensdag", "donderdag", "vrijdag", "zaterdag"]
            },
            tr: {
                months: ["Ocak", "Şubat", "Mart", "Nisan", "Mayıs", "Haziran", "Temmuz", "Ağustos", "Eylül", "Ekim", "Kasım", "Aralık"],
                dayOfWeekShort: ["Paz", "Pts", "Sal", "Çar", "Per", "Cum", "Cts"],
                dayOfWeek: ["Pazar", "Pazartesi", "Salı", "Çarşamba", "Perşembe", "Cuma", "Cumartesi"]
            },
            fr: {
                months: ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"],
                dayOfWeekShort: ["Dim", "Lun", "Mar", "Mer", "Jeu", "Ven", "Sam"],
                dayOfWeek: ["dimanche", "lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi"]
            },
            es: {
                months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
                dayOfWeekShort: ["Dom", "Lun", "Mar", "Mié", "Jue", "Vie", "Sáb"],
                dayOfWeek: ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"]
            },
            th: {
                months: ["มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม"],
                dayOfWeekShort: ["อา.", "จ.", "อ.", "พ.", "พฤ.", "ศ.", "ส."],
                dayOfWeek: ["อาทิตย์", "จันทร์", "อังคาร", "พุธ", "พฤหัส", "ศุกร์", "เสาร์", "อาทิตย์"]
            },
            pl: {
                months: ["styczeń", "luty", "marzec", "kwiecień", "maj", "czerwiec", "lipiec", "sierpień", "wrzesień", "październik", "listopad", "grudzień"],
                dayOfWeekShort: ["nd", "pn", "wt", "śr", "cz", "pt", "sb"],
                dayOfWeek: ["niedziela", "poniedziałek", "wtorek", "środa", "czwartek", "piątek", "sobota"]
            },
            pt: {
                months: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"],
                dayOfWeekShort: ["Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sab"],
                dayOfWeek: ["Domingo", "Segunda", "Terça", "Quarta", "Quinta", "Sexta", "Sábado"]
            },
            ch: {
                months: ["一月", "二月", "三月", "四月", "五月", "六月", "七月", "八月", "九月", "十月", "十一月", "十二月"],
                dayOfWeekShort: ["日", "一", "二", "三", "四", "五", "六"]
            },
            se: {
                months: ["Januari", "Februari", "Mars", "April", "Maj", "Juni", "Juli", "Augusti", "September", "Oktober", "November", "December"],
                dayOfWeekShort: ["Sön", "Mån", "Tis", "Ons", "Tor", "Fre", "Lör"]
            },
            kr: {
                months: ["1월", "2월", "3월", "4월", "5월", "6월", "7월", "8월", "9월", "10월", "11월", "12월"],
                dayOfWeekShort: ["일", "월", "화", "수", "목", "금", "토"],
                dayOfWeek: ["일요일", "월요일", "화요일", "수요일", "목요일", "금요일", "토요일"]
            },
            it: {
                months: ["Gennaio", "Febbraio", "Marzo", "Aprile", "Maggio", "Giugno", "Luglio", "Agosto", "Settembre", "Ottobre", "Novembre", "Dicembre"],
                dayOfWeekShort: ["Dom", "Lun", "Mar", "Mer", "Gio", "Ven", "Sab"],
                dayOfWeek: ["Domenica", "Lunedì", "Martedì", "Mercoledì", "Giovedì", "Venerdì", "Sabato"]
            },
            da: {
                months: ["January", "Februar", "Marts", "April", "Maj", "Juni", "July", "August", "September", "Oktober", "November", "December"],
                dayOfWeekShort: ["Søn", "Man", "Tir", "Ons", "Tor", "Fre", "Lør"],
                dayOfWeek: ["søndag", "mandag", "tirsdag", "onsdag", "torsdag", "fredag", "lørdag"]
            },
            no: {
                months: ["Januar", "Februar", "Mars", "April", "Mai", "Juni", "Juli", "August", "September", "Oktober", "November", "Desember"],
                dayOfWeekShort: ["Søn", "Man", "Tir", "Ons", "Tor", "Fre", "Lør"],
                dayOfWeek: ["Søndag", "Mandag", "Tirsdag", "Onsdag", "Torsdag", "Fredag", "Lørdag"]
            },
            ja: {
                months: ["1月", "2月", "3月", "4月", "5月", "6月", "7月", "8月", "9月", "10月", "11月", "12月"],
                dayOfWeekShort: ["日", "月", "火", "水", "木", "金", "土"],
                dayOfWeek: ["日曜", "月曜", "火曜", "水曜", "木曜", "金曜", "土曜"]
            },
            vi: {
                months: ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12"],
                dayOfWeekShort: ["CN", "T2", "T3", "T4", "T5", "T6", "T7"],
                dayOfWeek: ["Chủ nhật", "Thứ hai", "Thứ ba", "Thứ tư", "Thứ năm", "Thứ sáu", "Thứ bảy"]
            },
            sl: {
                months: ["Januar", "Februar", "Marec", "April", "Maj", "Junij", "Julij", "Avgust", "September", "Oktober", "November", "December"],
                dayOfWeekShort: ["Ned", "Pon", "Tor", "Sre", "Čet", "Pet", "Sob"],
                dayOfWeek: ["Nedelja", "Ponedeljek", "Torek", "Sreda", "Četrtek", "Petek", "Sobota"]
            },
            cs: {
                months: ["Leden", "Únor", "Březen", "Duben", "Květen", "Červen", "Červenec", "Srpen", "Září", "Říjen", "Listopad", "Prosinec"],
                dayOfWeekShort: ["Ne", "Po", "Út", "St", "Čt", "Pá", "So"]
            },
            hu: {
                months: ["Január", "Február", "Március", "Április", "Május", "Június", "Július", "Augusztus", "Szeptember", "Október", "November", "December"],
                dayOfWeekShort: ["Va", "Hé", "Ke", "Sze", "Cs", "Pé", "Szo"],
                dayOfWeek: ["vasárnap", "hétfő", "kedd", "szerda", "csütörtök", "péntek", "szombat"]
            },
            az: {
                months: ["Yanvar", "Fevral", "Mart", "Aprel", "May", "Iyun", "Iyul", "Avqust", "Sentyabr", "Oktyabr", "Noyabr", "Dekabr"],
                dayOfWeekShort: ["B", "Be", "Ça", "Ç", "Ca", "C", "Ş"],
                dayOfWeek: ["Bazar", "Bazar ertəsi", "Çərşənbə axşamı", "Çərşənbə", "Cümə axşamı", "Cümə", "Şənbə"]
            },
            bs: {
                months: ["Januar", "Februar", "Mart", "April", "Maj", "Jun", "Jul", "Avgust", "Septembar", "Oktobar", "Novembar", "Decembar"],
                dayOfWeekShort: ["Ned", "Pon", "Uto", "Sri", "Čet", "Pet", "Sub"],
                dayOfWeek: ["Nedjelja", "Ponedjeljak", "Utorak", "Srijeda", "Četvrtak", "Petak", "Subota"]
            },
            ca: {
                months: ["Gener", "Febrer", "Març", "Abril", "Maig", "Juny", "Juliol", "Agost", "Setembre", "Octubre", "Novembre", "Desembre"],
                dayOfWeekShort: ["Dg", "Dl", "Dt", "Dc", "Dj", "Dv", "Ds"],
                dayOfWeek: ["Diumenge", "Dilluns", "Dimarts", "Dimecres", "Dijous", "Divendres", "Dissabte"]
            },
            "en-GB": {
                months: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
                dayOfWeekShort: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
                dayOfWeek: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"]
            },
            et: {
                months: ["Jaanuar", "Veebruar", "Märts", "Aprill", "Mai", "Juuni", "Juuli", "August", "September", "Oktoober", "November", "Detsember"],
                dayOfWeekShort: ["P", "E", "T", "K", "N", "R", "L"],
                dayOfWeek: ["Pühapäev", "Esmaspäev", "Teisipäev", "Kolmapäev", "Neljapäev", "Reede", "Laupäev"]
            },
            eu: {
                months: ["Urtarrila", "Otsaila", "Martxoa", "Apirila", "Maiatza", "Ekaina", "Uztaila", "Abuztua", "Iraila", "Urria", "Azaroa", "Abendua"],
                dayOfWeekShort: ["Ig.", "Al.", "Ar.", "Az.", "Og.", "Or.", "La."],
                dayOfWeek: ["Igandea", "Astelehena", "Asteartea", "Asteazkena", "Osteguna", "Ostirala", "Larunbata"]
            },
            fi: {
                months: ["Tammikuu", "Helmikuu", "Maaliskuu", "Huhtikuu", "Toukokuu", "Kesäkuu", "Heinäkuu", "Elokuu", "Syyskuu", "Lokakuu", "Marraskuu", "Joulukuu"],
                dayOfWeekShort: ["Su", "Ma", "Ti", "Ke", "To", "Pe", "La"],
                dayOfWeek: ["sunnuntai", "maanantai", "tiistai", "keskiviikko", "torstai", "perjantai", "lauantai"]
            },
            gl: {
                months: ["Xan", "Feb", "Maz", "Abr", "Mai", "Xun", "Xul", "Ago", "Set", "Out", "Nov", "Dec"],
                dayOfWeekShort: ["Dom", "Lun", "Mar", "Mer", "Xov", "Ven", "Sab"],
                dayOfWeek: ["Domingo", "Luns", "Martes", "Mércores", "Xoves", "Venres", "Sábado"]
            },
            hr: {
                months: ["Siječanj", "Veljača", "Ožujak", "Travanj", "Svibanj", "Lipanj", "Srpanj", "Kolovoz", "Rujan", "Listopad", "Studeni", "Prosinac"],
                dayOfWeekShort: ["Ned", "Pon", "Uto", "Sri", "Čet", "Pet", "Sub"],
                dayOfWeek: ["Nedjelja", "Ponedjeljak", "Utorak", "Srijeda", "Četvrtak", "Petak", "Subota"]
            },
            ko: {
                months: ["1월", "2월", "3월", "4월", "5월", "6월", "7월", "8월", "9월", "10월", "11월", "12월"],
                dayOfWeekShort: ["일", "월", "화", "수", "목", "금", "토"],
                dayOfWeek: ["일요일", "월요일", "화요일", "수요일", "목요일", "금요일", "토요일"]
            },
            lt: {
                months: ["Sausio", "Vasario", "Kovo", "Balandžio", "Gegužės", "Birželio", "Liepos", "Rugpjūčio", "Rugsėjo", "Spalio", "Lapkričio", "Gruodžio"],
                dayOfWeekShort: ["Sek", "Pir", "Ant", "Tre", "Ket", "Pen", "Šeš"],
                dayOfWeek: ["Sekmadienis", "Pirmadienis", "Antradienis", "Trečiadienis", "Ketvirtadienis", "Penktadienis", "Šeštadienis"]
            },
            lv: {
                months: ["Janvāris", "Februāris", "Marts", "Aprīlis ", "Maijs", "Jūnijs", "Jūlijs", "Augusts", "Septembris", "Oktobris", "Novembris", "Decembris"],
                dayOfWeekShort: ["Sv", "Pr", "Ot", "Tr", "Ct", "Pk", "St"],
                dayOfWeek: ["Svētdiena", "Pirmdiena", "Otrdiena", "Trešdiena", "Ceturtdiena", "Piektdiena", "Sestdiena"]
            },
            mk: {
                months: ["јануари", "февруари", "март", "април", "мај", "јуни", "јули", "август", "септември", "октомври", "ноември", "декември"],
                dayOfWeekShort: ["нед", "пон", "вто", "сре", "чет", "пет", "саб"],
                dayOfWeek: ["Недела", "Понеделник", "Вторник", "Среда", "Четврток", "Петок", "Сабота"]
            },
            mn: {
                months: ["1-р сар", "2-р сар", "3-р сар", "4-р сар", "5-р сар", "6-р сар", "7-р сар", "8-р сар", "9-р сар", "10-р сар", "11-р сар", "12-р сар"],
                dayOfWeekShort: ["Дав", "Мяг", "Лха", "Пүр", "Бсн", "Бям", "Ням"],
                dayOfWeek: ["Даваа", "Мягмар", "Лхагва", "Пүрэв", "Баасан", "Бямба", "Ням"]
            },
            "pt-BR": {
                months: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"],
                dayOfWeekShort: ["Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sáb"],
                dayOfWeek: ["Domingo", "Segunda", "Terça", "Quarta", "Quinta", "Sexta", "Sábado"]
            },
            sk: {
                months: ["Január", "Február", "Marec", "Apríl", "Máj", "Jún", "Júl", "August", "September", "Október", "November", "December"],
                dayOfWeekShort: ["Ne", "Po", "Ut", "St", "Št", "Pi", "So"],
                dayOfWeek: ["Nedeľa", "Pondelok", "Utorok", "Streda", "Štvrtok", "Piatok", "Sobota"]
            },
            sq: {
                months: ["Janar", "Shkurt", "Mars", "Prill", "Maj", "Qershor", "Korrik", "Gusht", "Shtator", "Tetor", "Nëntor", "Dhjetor"],
                dayOfWeekShort: ["Die", "Hën", "Mar", "Mër", "Enj", "Pre", "Shtu"],
                dayOfWeek: ["E Diel", "E Hënë", "E Martē", "E Mërkurë", "E Enjte", "E Premte", "E Shtunë"]
            },
            "sr-YU": {
                months: ["Januar", "Februar", "Mart", "April", "Maj", "Jun", "Jul", "Avgust", "Septembar", "Oktobar", "Novembar", "Decembar"],
                dayOfWeekShort: ["Ned", "Pon", "Uto", "Sre", "čet", "Pet", "Sub"],
                dayOfWeek: ["Nedelja", "Ponedeljak", "Utorak", "Sreda", "Četvrtak", "Petak", "Subota"]
            },
            sr: {
                months: ["јануар", "фебруар", "март", "април", "мај", "јун", "јул", "август", "септембар", "октобар", "новембар", "децембар"],
                dayOfWeekShort: ["нед", "пон", "уто", "сре", "чет", "пет", "суб"],
                dayOfWeek: ["Недеља", "Понедељак", "Уторак", "Среда", "Четвртак", "Петак", "Субота"]
            },
            sv: {
                months: ["Januari", "Februari", "Mars", "April", "Maj", "Juni", "Juli", "Augusti", "September", "Oktober", "November", "December"],
                dayOfWeekShort: ["Sön", "Mån", "Tis", "Ons", "Tor", "Fre", "Lör"],
                dayOfWeek: ["Söndag", "Måndag", "Tisdag", "Onsdag", "Torsdag", "Fredag", "Lördag"]
            },
            "zh-TW": {
                months: ["一月", "二月", "三月", "四月", "五月", "六月", "七月", "八月", "九月", "十月", "十一月", "十二月"],
                dayOfWeekShort: ["日", "一", "二", "三", "四", "五", "六"],
                dayOfWeek: ["星期日", "星期一", "星期二", "星期三", "星期四", "星期五", "星期六"]
            },
            zh: {
                months: ["一月", "二月", "三月", "四月", "五月", "六月", "七月", "八月", "九月", "十月", "十一月", "十二月"],
                dayOfWeekShort: ["日", "一", "二", "三", "四", "五", "六"],
                dayOfWeek: ["星期日", "星期一", "星期二", "星期三", "星期四", "星期五", "星期六"]
            },
            he: {
                months: ["ינואר", "פברואר", "מרץ", "אפריל", "מאי", "יוני", "יולי", "אוגוסט", "ספטמבר", "אוקטובר", "נובמבר", "דצמבר"],
                dayOfWeekShort: ["א'", "ב'", "ג'", "ד'", "ה'", "ו'", "שבת"],
                dayOfWeek: ["ראשון", "שני", "שלישי", "רביעי", "חמישי", "שישי", "שבת", "ראשון"]
            },
            hy: {
                months: ["Հունվար", "Փետրվար", "Մարտ", "Ապրիլ", "Մայիս", "Հունիս", "Հուլիս", "Օգոստոս", "Սեպտեմբեր", "Հոկտեմբեր", "Նոյեմբեր", "Դեկտեմբեր"],
                dayOfWeekShort: ["Կի", "Երկ", "Երք", "Չոր", "Հնգ", "Ուրբ", "Շբթ"],
                dayOfWeek: ["Կիրակի", "Երկուշաբթի", "Երեքշաբթի", "Չորեքշաբթի", "Հինգշաբթի", "Ուրբաթ", "Շաբաթ"]
            },
            kg: {
                months: ["Үчтүн айы", "Бирдин айы", "Жалган Куран", "Чын Куран", "Бугу", "Кулжа", "Теке", "Баш Оона", "Аяк Оона", "Тогуздун айы", "Жетинин айы", "Бештин айы"],
                dayOfWeekShort: ["Жек", "Дүй", "Шей", "Шар", "Бей", "Жум", "Ише"],
                dayOfWeek: ["Жекшемб", "Дүйшөмб", "Шейшемб", "Шаршемб", "Бейшемби", "Жума", "Ишенб"]
            },
            rm: {
                months: ["Schaner", "Favrer", "Mars", "Avrigl", "Matg", "Zercladur", "Fanadur", "Avust", "Settember", "October", "November", "December"],
                dayOfWeekShort: ["Du", "Gli", "Ma", "Me", "Gie", "Ve", "So"],
                dayOfWeek: ["Dumengia", "Glindesdi", "Mardi", "Mesemna", "Gievgia", "Venderdi", "Sonda"]
            },
            ka: {
                months: ["იანვარი", "თებერვალი", "მარტი", "აპრილი", "მაისი", "ივნისი", "ივლისი", "აგვისტო", "სექტემბერი", "ოქტომბერი", "ნოემბერი", "დეკემბერი"],
                dayOfWeekShort: ["კვ", "ორშ", "სამშ", "ოთხ", "ხუთ", "პარ", "შაბ"],
                dayOfWeek: ["კვირა", "ორშაბათი", "სამშაბათი", "ოთხშაბათი", "ხუთშაბათი", "პარასკევი", "შაბათი"]
            }
        },
        value: "",
        rtl: !1,
        format: "Y/m/d H:i",
        formatTime: "H:i",
        formatDate: "Y/m/d",
        startDate: !1,
        step: 60,
        monthChangeSpinner: !0,
        closeOnDateSelect: !1,
        closeOnTimeSelect: !0,
        closeOnWithoutClick: !0,
        closeOnInputClick: !0,
        timepicker: !0,
        datepicker: !0,
        weeks: !1,
        defaultTime: !1,
        defaultDate: !1,
        minDate: !1,
        maxDate: !1,
        minTime: !1,
        maxTime: !1,
        disabledMinTime: !1,
        disabledMaxTime: !1,
        allowTimes: [],
        opened: !1,
        initTime: !0,
        inline: !1,
        theme: "",
        onSelectDate: function () {
        },
        onSelectTime: function () {
        },
        onChangeMonth: function () {
        },
        onGetWeekOfYear: function () {
        },
        onChangeYear: function () {
        },
        onChangeDateTime: function () {
        },
        onShow: function () {
        },
        onClose: function () {
        },
        onGenerate: function () {
        },
        withoutCopyright: !0,
        inverseButton: !1,
        hours12: !1,
        next: "xdsoft_next",
        prev: "xdsoft_prev",
        dayOfWeekStart: 0,
        parentID: "body",
        timeHeightInTimePicker: 25,
        timepickerScrollbar: !0,
        todayButton: !0,
        prevButton: !0,
        nextButton: !0,
        defaultSelect: !0,
        scrollMonth: !0,
        scrollTime: !0,
        scrollInput: !0,
        lazyInit: !1,
        mask: !1,
        validateOnBlur: !0,
        allowBlank: !0,
        yearStart: 1950,
        yearEnd: 2050,
        monthStart: 0,
        monthEnd: 11,
        style: "",
        id: "",
        fixed: !1,
        roundTime: "round",
        className: "",
        weekends: [],
        highlightedDates: [],
        highlightedPeriods: [],
        allowDates: [],
        allowDateRe: null,
        disabledDates: [],
        disabledWeekDays: [],
        yearOffset: 0,
        beforeShowDay: null,
        enterLikeTab: !0,
        showApplyButton: !1
    }, i = null, r = "en", n = "en", o = {meridiem: ["AM", "PM"]}, s = function () {
        var t = a.i18n[n], r = {
            days: t.dayOfWeek,
            daysShort: t.dayOfWeekShort,
            months: t.months,
            monthsShort: e.map(t.months, function (e) {
                return e.substring(0, 3)
            })
        };
        i = new DateFormatter({dateSettings: e.extend({}, o, r)})
    };
    e.datetimepicker = {
        setLocale: function (e) {
            var t = a.i18n[e] ? e : r;
            n != t && (n = t, s())
        },
        setDateFormatter: function (e) {
            i = e
        },
        RFC_2822: "D, d M Y H:i:s O",
        ATOM: "Y-m-dTH:i:sP",
        ISO_8601: "Y-m-dTH:i:sO",
        RFC_822: "D, d M y H:i:s O",
        RFC_850: "l, d-M-y H:i:s T",
        RFC_1036: "D, d M y H:i:s O",
        RFC_1123: "D, d M Y H:i:s O",
        RSS: "D, d M Y H:i:s O",
        W3C: "Y-m-dTH:i:sP"
    }, s(), window.getComputedStyle || (window.getComputedStyle = function (e) {
        return this.el = e, this.getPropertyValue = function (t) {
            var a = /(\-([a-z]){1})/g;
            return "float" === t && (t = "styleFloat"), a.test(t) && (t = t.replace(a, function (e, t, a) {
                return a.toUpperCase()
            })), e.currentStyle[t] || null
        }, this
    }), Array.prototype.indexOf || (Array.prototype.indexOf = function (e, t) {
        var a, i;
        for (a = t || 0, i = this.length; i > a; a += 1)if (this[a] === e)return a;
        return -1
    }), Date.prototype.countDaysInMonth = function () {
        return new Date(this.getFullYear(), this.getMonth() + 1, 0).getDate()
    }, e.fn.xdsoftScroller = function (t) {
        return this.each(function () {
            var a, i, r, n, o, s = e(this), l = function (e) {
                var t, a = {x: 0, y: 0};
                return "touchstart" === e.type || "touchmove" === e.type || "touchend" === e.type || "touchcancel" === e.type ? (t = e.originalEvent.touches[0] || e.originalEvent.changedTouches[0], a.x = t.clientX, a.y = t.clientY) : ("mousedown" === e.type || "mouseup" === e.type || "mousemove" === e.type || "mouseover" === e.type || "mouseout" === e.type || "mouseenter" === e.type || "mouseleave" === e.type) && (a.x = e.clientX, a.y = e.clientY), a
            }, d = 100, u = !1, c = 0, h = 0, f = 0, m = !1, g = 0, p = function () {
            };
            return "hide" === t ? void s.find(".xdsoft_scrollbar").hide() : (e(this).hasClass("xdsoft_scroller_box") || (a = s.children().eq(0), i = s[0].clientHeight, r = a[0].offsetHeight, n = e('<div class="xdsoft_scrollbar"></div>'), o = e('<div class="xdsoft_scroller"></div>'), n.append(o), s.addClass("xdsoft_scroller_box").append(n), p = function (e) {
                var t = l(e).y - c + g;
                0 > t && (t = 0), t + o[0].offsetHeight > f && (t = f - o[0].offsetHeight), s.trigger("scroll_element.xdsoft_scroller", [d ? t / d : 0])
            }, o.on("touchstart.xdsoft_scroller mousedown.xdsoft_scroller", function (a) {
                i || s.trigger("resize_scroll.xdsoft_scroller", [t]), c = l(a).y, g = parseInt(o.css("margin-top"), 10), f = n[0].offsetHeight, "mousedown" === a.type || "touchstart" === a.type ? (document && e(document.body).addClass("xdsoft_noselect"), e([document.body, window]).on("touchend mouseup.xdsoft_scroller", function r() {
                    e([document.body, window]).off("touchend mouseup.xdsoft_scroller", r).off("mousemove.xdsoft_scroller", p).removeClass("xdsoft_noselect")
                }), e(document.body).on("mousemove.xdsoft_scroller", p)) : (m = !0, a.stopPropagation(), a.preventDefault())
            }).on("touchmove", function (e) {
                m && (e.preventDefault(), p(e))
            }).on("touchend touchcancel", function () {
                m = !1, g = 0
            }), s.on("scroll_element.xdsoft_scroller", function (e, t) {
                i || s.trigger("resize_scroll.xdsoft_scroller", [t, !0]), t = t > 1 ? 1 : 0 > t || isNaN(t) ? 0 : t, o.css("margin-top", d * t), setTimeout(function () {
                    a.css("marginTop", -parseInt((a[0].offsetHeight - i) * t, 10))
                }, 10)
            }).on("resize_scroll.xdsoft_scroller", function (e, t, l) {
                var u, c;
                i = s[0].clientHeight, r = a[0].offsetHeight, u = i / r, c = u * n[0].offsetHeight, u > 1 ? o.hide() : (o.show(), o.css("height", parseInt(c > 10 ? c : 10, 10)), d = n[0].offsetHeight - o[0].offsetHeight, l !== !0 && s.trigger("scroll_element.xdsoft_scroller", [t || Math.abs(parseInt(a.css("marginTop"), 10)) / (r - i)]))
            }), s.on("mousewheel", function (e) {
                var t = Math.abs(parseInt(a.css("marginTop"), 10));
                return t -= 20 * e.deltaY, 0 > t && (t = 0), s.trigger("scroll_element.xdsoft_scroller", [t / (r - i)]), e.stopPropagation(), !1
            }), s.on("touchstart", function (e) {
                u = l(e), h = Math.abs(parseInt(a.css("marginTop"), 10))
            }), s.on("touchmove", function (e) {
                if (u) {
                    e.preventDefault();
                    var t = l(e);
                    s.trigger("scroll_element.xdsoft_scroller", [(h - (t.y - u.y)) / (r - i)])
                }
            }), s.on("touchend touchcancel", function () {
                u = !1, h = 0
            })), void s.trigger("resize_scroll.xdsoft_scroller", [t]))
        })
    }, e.fn.datetimepicker = function (r, o) {
        var s, l, d = this, u = 48, c = 57, h = 96, f = 105, m = 17, g = 46, p = 13, v = 27, y = 8, b = 37, k = 38, x = 39, w = 40, D = 9, S = 116, T = 65, _ = 67, M = 86, O = 90, C = 89, W = !1, F = e.isPlainObject(r) || !r ? e.extend(!0, {}, a, r) : e.extend(!0, {}, a), P = 0, A = function (e) {
            e.on("open.xdsoft focusin.xdsoft mousedown.xdsoft touchstart", function t() {
                e.is(":disabled") || e.data("xdsoft_datetimepicker") || (clearTimeout(P), P = setTimeout(function () {
                    e.data("xdsoft_datetimepicker") || s(e), e.off("open.xdsoft focusin.xdsoft mousedown.xdsoft touchstart", t).trigger("open.xdsoft")
                }, 100))
            })
        };
        return s = function (a) {
            function o() {
                var e, t = !1;
                return F.startDate ? t = Y.strToDate(F.startDate) : (t = F.value || (a && a.val && a.val() ? a.val() : ""), t ? t = Y.strToDateTime(t) : F.defaultDate && (t = Y.strToDateTime(F.defaultDate), F.defaultTime && (e = Y.strtotime(F.defaultTime), t.setHours(e.getHours()), t.setMinutes(e.getMinutes())))), t && Y.isValidDate(t) ? I.data("changed", !0) : t = "", t || 0
            }

            function s(t) {
                var i = function (e, t) {
                    var a = e.replace(/([\[\]\/\{\}\(\)\-\.\+]{1})/g, "\\$1").replace(/_/g, "{digit+}").replace(/([0-9]{1})/g, "{digit$1}").replace(/\{digit([0-9]{1})\}/g, "[0-$1_]{1}").replace(/\{digit[\+]\}/g, "[0-9_]{1}");
                    return new RegExp(a).test(t)
                }, r = function (e) {
                    try {
                        if (document.selection && document.selection.createRange) {
                            var t = document.selection.createRange();
                            return t.getBookmark().charCodeAt(2) - 2
                        }
                        if (e.setSelectionRange)return e.selectionStart
                    } catch (a) {
                        return 0
                    }
                }, n = function (e, t) {
                    if (e = "string" == typeof e || e instanceof String ? document.getElementById(e) : e, !e)return !1;
                    if (e.createTextRange) {
                        var a = e.createTextRange();
                        return a.collapse(!0), a.moveEnd("character", t), a.moveStart("character", t), a.select(), !0
                    }
                    return !!e.setSelectionRange && (e.setSelectionRange(t, t), !0)
                };
                t.mask && a.off("keydown.xdsoft"), t.mask === !0 && (t.mask = "undefined" != typeof moment ? t.format.replace(/Y{4}/g, "9999").replace(/Y{2}/g, "99").replace(/M{2}/g, "19").replace(/D{2}/g, "39").replace(/H{2}/g, "29").replace(/m{2}/g, "59").replace(/s{2}/g, "59") : t.format.replace(/Y/g, "9999").replace(/F/g, "9999").replace(/m/g, "19").replace(/d/g, "39").replace(/H/g, "29").replace(/i/g, "59").replace(/s/g, "59")), "string" === e.type(t.mask) && (i(t.mask, a.val()) || (a.val(t.mask.replace(/[0-9]/g, "_")), n(a[0], 0)), a.on("keydown.xdsoft", function (o) {
                    var s, l, d = this.value, F = o.which;
                    if (F >= u && c >= F || F >= h && f >= F || F === y || F === g) {
                        for (s = r(this), l = F !== y && F !== g ? String.fromCharCode(F >= h && f >= F ? F - u : F) : "_", F !== y && F !== g || !s || (s -= 1, l = "_"); /[^0-9_]/.test(t.mask.substr(s, 1)) && s < t.mask.length && s > 0;)s += F === y || F === g ? -1 : 1;
                        if (d = d.substr(0, s) + l + d.substr(s + 1), "" === e.trim(d))d = t.mask.replace(/[0-9]/g, "_"); else if (s === t.mask.length)return o.preventDefault(), !1;
                        for (s += F === y || F === g ? 0 : 1; /[^0-9_]/.test(t.mask.substr(s, 1)) && s < t.mask.length && s > 0;)s += F === y || F === g ? -1 : 1;
                        i(t.mask, d) ? (this.value = d, n(this, s)) : "" === e.trim(d) ? this.value = t.mask.replace(/[0-9]/g, "_") : a.trigger("error_input.xdsoft")
                    } else if (-1 !== [T, _, M, O, C].indexOf(F) && W || -1 !== [v, k, w, b, x, S, m, D, p].indexOf(F))return !0;
                    return o.preventDefault(), !1
                }))
            }

            var l, d, P, A, j, Y, z, I = e('<div class="xdsoft_datetimepicker xdsoft_noselect"></div>'), H = e('<div class="xdsoft_copyright"><a target="_blank" href="http://xdsoft.net/jqplugins/datetimepicker/">xdsoft.net</a></div>'), J = e('<div class="xdsoft_datepicker active"></div>'), N = e('<div class="xdsoft_mounthpicker"><button type="button" class="xdsoft_prev"></button><button type="button" class="xdsoft_today_button"></button><div class="xdsoft_label xdsoft_month"><span></span><i></i></div><div class="xdsoft_label xdsoft_year"><span></span><i></i></div><button type="button" class="xdsoft_next"></button></div>'), R = e('<div class="xdsoft_calendar"></div>'), L = e('<div class="xdsoft_timepicker active"><button type="button" class="xdsoft_prev"></button><div class="xdsoft_time_box"></div><button type="button" class="xdsoft_next"></button></div>'), E = L.find(".xdsoft_time_box").eq(0), $ = e('<div class="xdsoft_time_variant"></div>'), V = e('<button type="button" class="xdsoft_save_selected blue-gradient-button">Save Selected</button>'), B = e('<div class="xdsoft_select xdsoft_monthselect"><div></div></div>'), G = e('<div class="xdsoft_select xdsoft_yearselect"><div></div></div>'), q = !1, U = 0;
            F.id && I.attr("id", F.id), F.style && I.attr("style", F.style), F.weeks && I.addClass("xdsoft_showweeks"), F.rtl && I.addClass("xdsoft_rtl"), I.addClass("xdsoft_" + F.theme), I.addClass(F.className), N.find(".xdsoft_month span").after(B), N.find(".xdsoft_year span").after(G), N.find(".xdsoft_month,.xdsoft_year").on("touchstart mousedown.xdsoft", function (t) {
                var a, i, r = e(this).find(".xdsoft_select").eq(0), n = 0, o = 0, s = r.is(":visible");
                for (N.find(".xdsoft_select").hide(), Y.currentTime && (n = Y.currentTime[e(this).hasClass("xdsoft_month") ? "getMonth" : "getFullYear"]()), r[s ? "hide" : "show"](), a = r.find("div.xdsoft_option"), i = 0; i < a.length && a.eq(i).data("value") !== n; i += 1)o += a[0].offsetHeight;
                return r.xdsoftScroller(o / (r.children()[0].offsetHeight - r[0].clientHeight)), t.stopPropagation(), !1
            }), N.find(".xdsoft_select").xdsoftScroller().on("touchstart mousedown.xdsoft", function (e) {
                e.stopPropagation(), e.preventDefault()
            }).on("touchstart mousedown.xdsoft", ".xdsoft_option", function () {
                (void 0 === Y.currentTime || null === Y.currentTime) && (Y.currentTime = Y.now());
                var t = Y.currentTime.getFullYear();
                Y && Y.currentTime && Y.currentTime[e(this).parent().parent().hasClass("xdsoft_monthselect") ? "setMonth" : "setFullYear"](e(this).data("value")), e(this).parent().parent().hide(), I.trigger("xchange.xdsoft"), F.onChangeMonth && e.isFunction(F.onChangeMonth) && F.onChangeMonth.call(I, Y.currentTime, I.data("input")), t !== Y.currentTime.getFullYear() && e.isFunction(F.onChangeYear) && F.onChangeYear.call(I, Y.currentTime, I.data("input"))
            }), I.getValue = function () {
                return Y.getCurrentTime()
            }, I.setOptions = function (r) {
                var n = {};
                F = e.extend(!0, {}, F, r), r.allowTimes && e.isArray(r.allowTimes) && r.allowTimes.length && (F.allowTimes = e.extend(!0, [], r.allowTimes)), r.weekends && e.isArray(r.weekends) && r.weekends.length && (F.weekends = e.extend(!0, [], r.weekends)), r.allowDates && e.isArray(r.allowDates) && r.allowDates.length && (F.allowDates = e.extend(!0, [], r.allowDates)), r.allowDateRe && "[object String]" === Object.prototype.toString.call(r.allowDateRe) && (F.allowDateRe = new RegExp(r.allowDateRe)), r.highlightedDates && e.isArray(r.highlightedDates) && r.highlightedDates.length && (e.each(r.highlightedDates, function (a, r) {
                    var o, s = e.map(r.split(","), e.trim), l = new t(i.parseDate(s[0], F.formatDate), s[1], s[2]), d = i.formatDate(l.date, F.formatDate);
                    void 0 !== n[d] ? (o = n[d].desc, o && o.length && l.desc && l.desc.length && (n[d].desc = o + "\n" + l.desc)) : n[d] = l
                }), F.highlightedDates = e.extend(!0, [], n)), r.highlightedPeriods && e.isArray(r.highlightedPeriods) && r.highlightedPeriods.length && (n = e.extend(!0, [], F.highlightedDates), e.each(r.highlightedPeriods, function (a, r) {
                    var o, s, l, d, u, c, h;
                    if (e.isArray(r))o = r[0], s = r[1], l = r[2], h = r[3]; else {
                        var f = e.map(r.split(","), e.trim);
                        o = i.parseDate(f[0], F.formatDate), s = i.parseDate(f[1], F.formatDate), l = f[2], h = f[3]
                    }
                    for (; s >= o;)d = new t(o, l, h), u = i.formatDate(o, F.formatDate), o.setDate(o.getDate() + 1), void 0 !== n[u] ? (c = n[u].desc, c && c.length && d.desc && d.desc.length && (n[u].desc = c + "\n" + d.desc)) : n[u] = d
                }), F.highlightedDates = e.extend(!0, [], n)), r.disabledDates && e.isArray(r.disabledDates) && r.disabledDates.length && (F.disabledDates = e.extend(!0, [], r.disabledDates)), r.disabledWeekDays && e.isArray(r.disabledWeekDays) && r.disabledWeekDays.length && (F.disabledWeekDays = e.extend(!0, [], r.disabledWeekDays)), !F.open && !F.opened || F.inline || a.trigger("open.xdsoft"), F.inline && (q = !0, I.addClass("xdsoft_inline"), a.after(I).hide()), F.inverseButton && (F.next = "xdsoft_prev", F.prev = "xdsoft_next"), F.datepicker ? J.addClass("active") : J.removeClass("active"), F.timepicker ? L.addClass("active") : L.removeClass("active"), F.value && (Y.setCurrentTime(F.value), a && a.val && a.val(Y.str)), F.dayOfWeekStart = isNaN(F.dayOfWeekStart) ? 0 : parseInt(F.dayOfWeekStart, 10) % 7, F.timepickerScrollbar || E.xdsoftScroller("hide"), F.minDate && /^[\+\-](.*)$/.test(F.minDate) && (F.minDate = i.formatDate(Y.strToDateTime(F.minDate), F.formatDate)), F.maxDate && /^[\+\-](.*)$/.test(F.maxDate) && (F.maxDate = i.formatDate(Y.strToDateTime(F.maxDate), F.formatDate)), V.toggle(F.showApplyButton), N.find(".xdsoft_today_button").css("visibility", F.todayButton ? "visible" : "hidden"), N.find("." + F.prev).css("visibility", F.prevButton ? "visible" : "hidden"), N.find("." + F.next).css("visibility", F.nextButton ? "visible" : "hidden"), s(F), F.validateOnBlur && a.off("blur.xdsoft").on("blur.xdsoft", function () {
                    if (F.allowBlank && (!e.trim(e(this).val()).length || "string" == typeof F.mask && e.trim(e(this).val()) === F.mask.replace(/[0-9]/g, "_")))e(this).val(null), I.data("xdsoft_datetime").empty(); else {
                        var t = i.parseDate(e(this).val(), F.format);
                        if (t)e(this).val(i.formatDate(t, F.format)); else {
                            var a = +[e(this).val()[0], e(this).val()[1]].join(""), r = +[e(this).val()[2], e(this).val()[3]].join("");
                            e(this).val(!F.datepicker && F.timepicker && a >= 0 && 24 > a && r >= 0 && 60 > r ? [a, r].map(function (e) {
                                return e > 9 ? e : "0" + e
                            }).join(":") : i.formatDate(Y.now(), F.format))
                        }
                        I.data("xdsoft_datetime").setCurrentTime(e(this).val())
                    }
                    I.trigger("changedatetime.xdsoft"), I.trigger("close.xdsoft")
                }), F.dayOfWeekStartPrev = 0 === F.dayOfWeekStart ? 6 : F.dayOfWeekStart - 1, I.trigger("xchange.xdsoft").trigger("afterOpen.xdsoft")
            }, I.data("options", F).on("touchstart mousedown.xdsoft", function (e) {
                return e.stopPropagation(), e.preventDefault(), G.hide(), B.hide(), !1
            }), E.append($), E.xdsoftScroller(), I.on("afterOpen.xdsoft", function () {
                E.xdsoftScroller()
            }), I.append(J).append(L), F.withoutCopyright !== !0 && I.append(H), J.append(N).append(R).append(V), e(F.parentID).append(I), l = function () {
                var t = this;
                t.now = function (e) {
                    var a, i, r = new Date;
                    return !e && F.defaultDate && (a = t.strToDateTime(F.defaultDate), r.setFullYear(a.getFullYear()), r.setMonth(a.getMonth()), r.setDate(a.getDate())), F.yearOffset && r.setFullYear(r.getFullYear() + F.yearOffset), !e && F.defaultTime && (i = t.strtotime(F.defaultTime), r.setHours(i.getHours()), r.setMinutes(i.getMinutes())), r
                }, t.isValidDate = function (e) {
                    return "[object Date]" === Object.prototype.toString.call(e) && !isNaN(e.getTime())
                }, t.setCurrentTime = function (e, a) {
                    t.currentTime = "string" == typeof e ? t.strToDateTime(e) : t.isValidDate(e) ? e : e || a || !F.allowBlank ? t.now() : null, I.trigger("xchange.xdsoft")
                }, t.empty = function () {
                    t.currentTime = null
                }, t.getCurrentTime = function () {
                    return t.currentTime
                }, t.nextMonth = function () {
                    (void 0 === t.currentTime || null === t.currentTime) && (t.currentTime = t.now());
                    var a, i = t.currentTime.getMonth() + 1;
                    return 12 === i && (t.currentTime.setFullYear(t.currentTime.getFullYear() + 1), i = 0), a = t.currentTime.getFullYear(), t.currentTime.setDate(Math.min(new Date(t.currentTime.getFullYear(), i + 1, 0).getDate(), t.currentTime.getDate())), t.currentTime.setMonth(i), F.onChangeMonth && e.isFunction(F.onChangeMonth) && F.onChangeMonth.call(I, Y.currentTime, I.data("input")), a !== t.currentTime.getFullYear() && e.isFunction(F.onChangeYear) && F.onChangeYear.call(I, Y.currentTime, I.data("input")), I.trigger("xchange.xdsoft"), i
                }, t.prevMonth = function () {
                    (void 0 === t.currentTime || null === t.currentTime) && (t.currentTime = t.now());
                    var a = t.currentTime.getMonth() - 1;
                    return -1 === a && (t.currentTime.setFullYear(t.currentTime.getFullYear() - 1), a = 11), t.currentTime.setDate(Math.min(new Date(t.currentTime.getFullYear(), a + 1, 0).getDate(), t.currentTime.getDate())), t.currentTime.setMonth(a), F.onChangeMonth && e.isFunction(F.onChangeMonth) && F.onChangeMonth.call(I, Y.currentTime, I.data("input")), I.trigger("xchange.xdsoft"), a
                }, t.getWeekOfYear = function (t) {
                    if (F.onGetWeekOfYear && e.isFunction(F.onGetWeekOfYear)) {
                        var a = F.onGetWeekOfYear.call(I, t);
                        if ("undefined" != typeof a)return a
                    }
                    var i = new Date(t.getFullYear(), 0, 1);
                    return 4 != i.getDay() && i.setMonth(0, 1 + (4 - i.getDay() + 7) % 7), Math.ceil(((t - i) / 864e5 + i.getDay() + 1) / 7)
                }, t.strToDateTime = function (e) {
                    var a, r, n = [];
                    return e && e instanceof Date && t.isValidDate(e) ? e : (n = /^(\+|\-)(.*)$/.exec(e), n && (n[2] = i.parseDate(n[2], F.formatDate)), n && n[2] ? (a = n[2].getTime() - 6e4 * n[2].getTimezoneOffset(), r = new Date(t.now(!0).getTime() + parseInt(n[1] + "1", 10) * a)) : r = e ? i.parseDate(e, F.format) : t.now(), t.isValidDate(r) || (r = t.now()), r)
                }, t.strToDate = function (e) {
                    if (e && e instanceof Date && t.isValidDate(e))return e;
                    var a = e ? i.parseDate(e, F.formatDate) : t.now(!0);
                    return t.isValidDate(a) || (a = t.now(!0)), a
                }, t.strtotime = function (e) {
                    if (e && e instanceof Date && t.isValidDate(e))return e;
                    var a = e ? i.parseDate(e, F.formatTime) : t.now(!0);
                    return t.isValidDate(a) || (a = t.now(!0)), a
                }, t.str = function () {
                    return i.formatDate(t.currentTime, F.format)
                }, t.currentTime = this.now()
            }, Y = new l, V.on("touchend click", function (e) {
                e.preventDefault(), I.data("changed", !0), Y.setCurrentTime(o()), a.val(Y.str()), I.trigger("close.xdsoft")
            }), N.find(".xdsoft_today_button").on("touchend mousedown.xdsoft", function () {
                I.data("changed", !0), Y.setCurrentTime(0, !0), I.trigger("afterOpen.xdsoft")
            }).on("dblclick.xdsoft", function () {
                var e, t, i = Y.getCurrentTime();
                i = new Date(i.getFullYear(), i.getMonth(), i.getDate()), e = Y.strToDate(F.minDate), e = new Date(e.getFullYear(), e.getMonth(), e.getDate()), e > i || (t = Y.strToDate(F.maxDate), t = new Date(t.getFullYear(), t.getMonth(), t.getDate()), i > t || (a.val(Y.str()), a.trigger("change"), I.trigger("close.xdsoft")))
            }), N.find(".xdsoft_prev,.xdsoft_next").on("touchend mousedown.xdsoft", function () {
                var t = e(this), a = 0, i = !1;
                !function r(e) {
                    t.hasClass(F.next) ? Y.nextMonth() : t.hasClass(F.prev) && Y.prevMonth(), F.monthChangeSpinner && (i || (a = setTimeout(r, e || 100)))
                }(500), e([document.body, window]).on("touchend mouseup.xdsoft", function n() {
                    clearTimeout(a), i = !0, e([document.body, window]).off("touchend mouseup.xdsoft", n)
                })
            }), L.find(".xdsoft_prev,.xdsoft_next").on("touchend mousedown.xdsoft", function () {
                var t = e(this), a = 0, i = !1, r = 110;
                !function n(e) {
                    var o = E[0].clientHeight, s = $[0].offsetHeight, l = Math.abs(parseInt($.css("marginTop"), 10));
                    t.hasClass(F.next) && s - o - F.timeHeightInTimePicker >= l ? $.css("marginTop", "-" + (l + F.timeHeightInTimePicker) + "px") : t.hasClass(F.prev) && l - F.timeHeightInTimePicker >= 0 && $.css("marginTop", "-" + (l - F.timeHeightInTimePicker) + "px"), E.trigger("scroll_element.xdsoft_scroller", [Math.abs(parseInt($[0].style.marginTop, 10) / (s - o))]), r = r > 10 ? 10 : r - 10, i || (a = setTimeout(n, e || r))
                }(500), e([document.body, window]).on("touchend mouseup.xdsoft", function o() {
                    clearTimeout(a), i = !0, e([document.body, window]).off("touchend mouseup.xdsoft", o)
                })
            }), d = 0, I.on("xchange.xdsoft", function (t) {
                clearTimeout(d), d = setTimeout(function () {
                    if (void 0 === Y.currentTime || null === Y.currentTime) {
                        if (F.allowBlank)return;
                        Y.currentTime = Y.now()
                    }
                    for (var t, o, s, l, d, u, c, h, f, m, g = "", p = new Date(Y.currentTime.getFullYear(), Y.currentTime.getMonth(), 1, 12, 0, 0), v = 0, y = Y.now(), b = !1, k = !1, x = [], w = !0, D = "", S = ""; p.getDay() !== F.dayOfWeekStart;)p.setDate(p.getDate() - 1);
                    for (g += "<table><thead><tr>", F.weeks && (g += "<th></th>"), t = 0; 7 > t; t += 1)g += "<th>" + F.i18n[n].dayOfWeekShort[(t + F.dayOfWeekStart) % 7] + "</th>";
                    for (g += "</tr></thead>", g += "<tbody>", F.maxDate !== !1 && (b = Y.strToDate(F.maxDate), b = new Date(b.getFullYear(), b.getMonth(), b.getDate(), 23, 59, 59, 999)), F.minDate !== !1 && (k = Y.strToDate(F.minDate), k = new Date(k.getFullYear(), k.getMonth(), k.getDate())); v < Y.currentTime.countDaysInMonth() || p.getDay() !== F.dayOfWeekStart || Y.currentTime.getMonth() === p.getMonth();)x = [], v += 1, s = p.getDay(), l = p.getDate(), d = p.getFullYear(), u = p.getMonth(), c = Y.getWeekOfYear(p), m = "", x.push("xdsoft_date"), h = F.beforeShowDay && e.isFunction(F.beforeShowDay.call) ? F.beforeShowDay.call(I, p) : null, F.allowDateRe && "[object RegExp]" === Object.prototype.toString.call(F.allowDateRe) ? F.allowDateRe.test(i.formatDate(p, F.formatDate)) || x.push("xdsoft_disabled") : F.allowDates && F.allowDates.length > 0 ? -1 === F.allowDates.indexOf(i.formatDate(p, F.formatDate)) && x.push("xdsoft_disabled") : b !== !1 && p > b || k !== !1 && k > p || h && h[0] === !1 ? x.push("xdsoft_disabled") : -1 !== F.disabledDates.indexOf(i.formatDate(p, F.formatDate)) ? x.push("xdsoft_disabled") : -1 !== F.disabledWeekDays.indexOf(s) ? x.push("xdsoft_disabled") : a.is("[readonly]") && x.push("xdsoft_disabled"), h && "" !== h[1] && x.push(h[1]), Y.currentTime.getMonth() !== u && x.push("xdsoft_other_month"), (F.defaultSelect || I.data("changed")) && i.formatDate(Y.currentTime, F.formatDate) === i.formatDate(p, F.formatDate) && x.push("xdsoft_current"), i.formatDate(y, F.formatDate) === i.formatDate(p, F.formatDate) && x.push("xdsoft_today"), (0 === p.getDay() || 6 === p.getDay() || -1 !== F.weekends.indexOf(i.formatDate(p, F.formatDate))) && x.push("xdsoft_weekend"), void 0 !== F.highlightedDates[i.formatDate(p, F.formatDate)] && (o = F.highlightedDates[i.formatDate(p, F.formatDate)], x.push(void 0 === o.style ? "xdsoft_highlighted_default" : o.style), m = void 0 === o.desc ? "" : o.desc), F.beforeShowDay && e.isFunction(F.beforeShowDay) && x.push(F.beforeShowDay(p)), w && (g += "<tr>", w = !1, F.weeks && (g += "<th>" + c + "</th>")), g += '<td data-date="' + l + '" data-month="' + u + '" data-year="' + d + '" class="xdsoft_date xdsoft_day_of_week' + p.getDay() + " " + x.join(" ") + '" title="' + m + '"><div>' + l + "</div></td>", p.getDay() === F.dayOfWeekStartPrev && (g += "</tr>", w = !0), p.setDate(l + 1);
                    if (g += "</tbody></table>", R.html(g), N.find(".xdsoft_label span").eq(0).text(F.i18n[n].months[Y.currentTime.getMonth()]), N.find(".xdsoft_label span").eq(1).text(Y.currentTime.getFullYear()), D = "", S = "", u = "", f = function (t, r) {
                            var n, o, s = Y.now(), l = F.allowTimes && e.isArray(F.allowTimes) && F.allowTimes.length;
                            s.setHours(t), t = parseInt(s.getHours(), 10), s.setMinutes(r), r = parseInt(s.getMinutes(), 10), n = new Date(Y.currentTime), n.setHours(t), n.setMinutes(r), x = [], F.minDateTime !== !1 && F.minDateTime > n || F.maxTime !== !1 && Y.strtotime(F.maxTime).getTime() < s.getTime() || F.minTime !== !1 && Y.strtotime(F.minTime).getTime() > s.getTime() ? x.push("xdsoft_disabled") : F.minDateTime !== !1 && F.minDateTime > n || F.disabledMinTime !== !1 && s.getTime() > Y.strtotime(F.disabledMinTime).getTime() && F.disabledMaxTime !== !1 && s.getTime() < Y.strtotime(F.disabledMaxTime).getTime() ? x.push("xdsoft_disabled") : a.is("[readonly]") && x.push("xdsoft_disabled"), o = new Date(Y.currentTime), o.setHours(parseInt(Y.currentTime.getHours(), 10)), l || o.setMinutes(Math[F.roundTime](Y.currentTime.getMinutes() / F.step) * F.step), (F.initTime || F.defaultSelect || I.data("changed")) && o.getHours() === parseInt(t, 10) && (!l && F.step > 59 || o.getMinutes() === parseInt(r, 10)) && (F.defaultSelect || I.data("changed") ? x.push("xdsoft_current") : F.initTime && x.push("xdsoft_init_time")), parseInt(y.getHours(), 10) === parseInt(t, 10) && parseInt(y.getMinutes(), 10) === parseInt(r, 10) && x.push("xdsoft_today"), D += '<div class="xdsoft_time ' + x.join(" ") + '" data-hour="' + t + '" data-minute="' + r + '">' + i.formatDate(s, F.formatTime) + "</div>"
                        }, F.allowTimes && e.isArray(F.allowTimes) && F.allowTimes.length)for (v = 0; v < F.allowTimes.length; v += 1)S = Y.strtotime(F.allowTimes[v]).getHours(), u = Y.strtotime(F.allowTimes[v]).getMinutes(), f(S, u); else for (v = 0, t = 0; v < (F.hours12 ? 12 : 24); v += 1)for (t = 0; 60 > t; t += F.step)S = (10 > v ? "0" : "") + v, u = (10 > t ? "0" : "") + t, f(S, u);
                    for ($.html(D), r = "", v = 0, v = parseInt(F.yearStart, 10) + F.yearOffset; v <= parseInt(F.yearEnd, 10) + F.yearOffset; v += 1)r += '<div class="xdsoft_option ' + (Y.currentTime.getFullYear() === v ? "xdsoft_current" : "") + '" data-value="' + v + '">' + v + "</div>";
                    for (G.children().eq(0).html(r), v = parseInt(F.monthStart, 10), r = ""; v <= parseInt(F.monthEnd, 10); v += 1)r += '<div class="xdsoft_option ' + (Y.currentTime.getMonth() === v ? "xdsoft_current" : "") + '" data-value="' + v + '">' + F.i18n[n].months[v] + "</div>";
                    B.children().eq(0).html(r), e(I).trigger("generate.xdsoft")
                }, 10), t.stopPropagation()
            }).on("afterOpen.xdsoft", function () {
                if (F.timepicker) {
                    var e, t, a, i;
                    $.find(".xdsoft_current").length ? e = ".xdsoft_current" : $.find(".xdsoft_init_time").length && (e = ".xdsoft_init_time"), e ? (t = E[0].clientHeight, a = $[0].offsetHeight, i = $.find(e).index() * F.timeHeightInTimePicker + 1, i > a - t && (i = a - t), E.trigger("scroll_element.xdsoft_scroller", [parseInt(i, 10) / (a - t)])) : E.trigger("scroll_element.xdsoft_scroller", [0])
                }
            }), P = 0, R.on("touchend click.xdsoft", "td", function (t) {
                t.stopPropagation(), P += 1;
                var i = e(this), r = Y.currentTime;
                return (void 0 === r || null === r) && (Y.currentTime = Y.now(), r = Y.currentTime), !i.hasClass("xdsoft_disabled") && (r.setDate(1), r.setFullYear(i.data("year")), r.setMonth(i.data("month")), r.setDate(i.data("date")), I.trigger("select.xdsoft", [r]), a.val(Y.str()), F.onSelectDate && e.isFunction(F.onSelectDate) && F.onSelectDate.call(I, Y.currentTime, I.data("input"), t), I.data("changed", !0), I.trigger("xchange.xdsoft"), I.trigger("changedatetime.xdsoft"), (P > 1 || F.closeOnDateSelect === !0 || F.closeOnDateSelect === !1 && !F.timepicker) && !F.inline && I.trigger("close.xdsoft"), void setTimeout(function () {
                    P = 0
                }, 200))
            }), $.on("touchend click.xdsoft", "div", function (t) {
                t.stopPropagation();
                var a = e(this), i = Y.currentTime;
                return (void 0 === i || null === i) && (Y.currentTime = Y.now(), i = Y.currentTime), !a.hasClass("xdsoft_disabled") && (i.setHours(a.data("hour")), i.setMinutes(a.data("minute")), I.trigger("select.xdsoft", [i]), I.data("input").val(Y.str()), F.onSelectTime && e.isFunction(F.onSelectTime) && F.onSelectTime.call(I, Y.currentTime, I.data("input"), t), I.data("changed", !0), I.trigger("xchange.xdsoft"), I.trigger("changedatetime.xdsoft"), void(F.inline !== !0 && F.closeOnTimeSelect === !0 && I.trigger("close.xdsoft")))
            }), J.on("mousewheel.xdsoft", function (e) {
                return !F.scrollMonth || (e.deltaY < 0 ? Y.nextMonth() : Y.prevMonth(), !1)
            }), a.on("mousewheel.xdsoft", function (e) {
                return !F.scrollInput || (!F.datepicker && F.timepicker ? (A = $.find(".xdsoft_current").length ? $.find(".xdsoft_current").eq(0).index() : 0, A + e.deltaY >= 0 && A + e.deltaY < $.children().length && (A += e.deltaY), $.children().eq(A).length && $.children().eq(A).trigger("mousedown"), !1) : F.datepicker && !F.timepicker ? (J.trigger(e, [e.deltaY, e.deltaX, e.deltaY]), a.val && a.val(Y.str()), I.trigger("changedatetime.xdsoft"), !1) : void 0)
            }), I.on("changedatetime.xdsoft", function (t) {
                if (F.onChangeDateTime && e.isFunction(F.onChangeDateTime)) {
                    var a = I.data("input");
                    F.onChangeDateTime.call(I, Y.currentTime, a, t), delete F.value, a.trigger("change")
                }
            }).on("generate.xdsoft", function () {
                F.onGenerate && e.isFunction(F.onGenerate) && F.onGenerate.call(I, Y.currentTime, I.data("input")), q && (I.trigger("afterOpen.xdsoft"), q = !1)
            }).on("click.xdsoft", function (e) {
                e.stopPropagation()
            }), A = 0, z = function (e, t) {
                do if (e = e.parentNode, t(e) === !1)break; while ("HTML" !== e.nodeName)
            }, j = function () {
                var t, a, i, r, n, o, s, l, d, u, c, h, f;
                if (l = I.data("input"), t = l.offset(), a = l[0], u = "top", i = t.top + a.offsetHeight - 1, r = t.left, n = "absolute", d = e(window).width(), h = e(window).height(), f = e(window).scrollTop(), document.documentElement.clientWidth - t.left < J.parent().outerWidth(!0)) {
                    var m = J.parent().outerWidth(!0) - a.offsetWidth;
                    r -= m
                }
                "rtl" === l.parent().css("direction") && (r -= I.outerWidth() - l.outerWidth()), F.fixed ? (i -= f, r -= e(window).scrollLeft(), n = "fixed") : (s = !1, z(a, function (e) {
                    return "fixed" === window.getComputedStyle(e).getPropertyValue("position") ? (s = !0, !1) : void 0
                }), s ? (n = "fixed", i + I.outerHeight() > h + f ? (u = "bottom", i = h + f - t.top) : i -= f) : i + a.offsetHeight > h + f && (i = t.top - a.offsetHeight + 1), 0 > i && (i = 0), r + a.offsetWidth > d && (r = d - a.offsetWidth)), o = I[0], z(o, function (e) {
                    var t;
                    return t = window.getComputedStyle(e).getPropertyValue("position"), "relative" === t && d >= e.offsetWidth ? (r -= (d - e.offsetWidth) / 2, !1) : void 0
                }), c = {position: n, left: r, top: "", bottom: ""}, c[u] = i, I.css(c)
            }, I.on("open.xdsoft", function (t) {
                var a = !0;
                F.onShow && e.isFunction(F.onShow) && (a = F.onShow.call(I, Y.currentTime, I.data("input"), t)), a !== !1 && (I.show(), j(), e(window).off("resize.xdsoft", j).on("resize.xdsoft", j), F.closeOnWithoutClick && e([document.body, window]).on("touchstart mousedown.xdsoft", function i() {
                    I.trigger("close.xdsoft"), e([document.body, window]).off("touchstart mousedown.xdsoft", i)
                }))
            }).on("close.xdsoft", function (t) {
                var a = !0;
                N.find(".xdsoft_month,.xdsoft_year").find(".xdsoft_select").hide(), F.onClose && e.isFunction(F.onClose) && (a = F.onClose.call(I, Y.currentTime, I.data("input"), t)), a === !1 || F.opened || F.inline || I.hide(), t.stopPropagation()
            }).on("toggle.xdsoft", function () {
                I.trigger(I.is(":visible") ? "close.xdsoft" : "open.xdsoft")
            }).data("input", a), U = 0, I.data("xdsoft_datetime", Y), I.setOptions(F), Y.setCurrentTime(o()),
                a.data("xdsoft_datetimepicker", I).on("open.xdsoft focusin.xdsoft mousedown.xdsoft touchstart", function () {
                    a.is(":disabled") || a.data("xdsoft_datetimepicker").is(":visible") && F.closeOnInputClick || (clearTimeout(U), U = setTimeout(function () {
                        a.is(":disabled") || (q = !0, Y.setCurrentTime(o(), !0), F.mask && s(F), I.trigger("open.xdsoft"))
                    }, 100))
                }).on("keydown.xdsoft", function (t) {
                    var a, i = t.which;
                    return -1 !== [p].indexOf(i) && F.enterLikeTab ? (a = e("input:visible,textarea:visible,button:visible,a:visible"), I.trigger("close.xdsoft"), a.eq(a.index(this) + 1).focus(), !1) : -1 !== [D].indexOf(i) ? (I.trigger("close.xdsoft"), !0) : void 0
                }).on("blur.xdsoft", function () {
                    I.trigger("close.xdsoft")
                })
        }, l = function (t) {
            var a = t.data("xdsoft_datetimepicker");
            a && (a.data("xdsoft_datetime", null), a.remove(), t.data("xdsoft_datetimepicker", null).off(".xdsoft"), e(window).off("resize.xdsoft"), e([window, document.body]).off("mousedown.xdsoft touchstart"), t.unmousewheel && t.unmousewheel())
        }, e(document).off("keydown.xdsoftctrl keyup.xdsoftctrl").on("keydown.xdsoftctrl", function (e) {
            e.keyCode === m && (W = !0)
        }).on("keyup.xdsoftctrl", function (e) {
            e.keyCode === m && (W = !1)
        }), this.each(function () {
            var t, a = e(this).data("xdsoft_datetimepicker");
            if (a) {
                if ("string" === e.type(r))switch (r) {
                    case"show":
                        e(this).select().focus(), a.trigger("open.xdsoft");
                        break;
                    case"hide":
                        a.trigger("close.xdsoft");
                        break;
                    case"toggle":
                        a.trigger("toggle.xdsoft");
                        break;
                    case"destroy":
                        l(e(this));
                        break;
                    case"reset":
                        this.value = this.defaultValue, this.value && a.data("xdsoft_datetime").isValidDate(i.parseDate(this.value, F.format)) || a.data("changed", !1), a.data("xdsoft_datetime").setCurrentTime(this.value);
                        break;
                    case"validate":
                        t = a.data("input"), t.trigger("blur.xdsoft");
                        break;
                    default:
                        a[r] && e.isFunction(a[r]) && (d = a[r](o))
                } else a.setOptions(r);
                return 0
            }
            "string" !== e.type(r) && (!F.lazyInit || F.open || F.inline ? s(e(this)) : A(e(this)))
        }), d
    }, e.fn.datetimepicker.defaults = a
}), function (e) {
    "function" == typeof define && define.amd ? define(["jquery"], e) : "object" == typeof exports ? module.exports = e : e(jQuery)
}(function (e) {
    function t(t) {
        var o = t || window.event, s = l.call(arguments, 1), d = 0, c = 0, h = 0, f = 0, m = 0, g = 0;
        if (t = e.event.fix(o), t.type = "mousewheel", "detail" in o && (h = -1 * o.detail), "wheelDelta" in o && (h = o.wheelDelta), "wheelDeltaY" in o && (h = o.wheelDeltaY), "wheelDeltaX" in o && (c = -1 * o.wheelDeltaX), "axis" in o && o.axis === o.HORIZONTAL_AXIS && (c = -1 * h, h = 0), d = 0 === h ? c : h, "deltaY" in o && (h = -1 * o.deltaY, d = h), "deltaX" in o && (c = o.deltaX, 0 === h && (d = -1 * c)), 0 !== h || 0 !== c) {
            if (1 === o.deltaMode) {
                var p = e.data(this, "mousewheel-line-height");
                d *= p, h *= p, c *= p
            } else if (2 === o.deltaMode) {
                var v = e.data(this, "mousewheel-page-height");
                d *= v, h *= v, c *= v
            }
            if (f = Math.max(Math.abs(h), Math.abs(c)), (!n || n > f) && (n = f, i(o, f) && (n /= 40)), i(o, f) && (d /= 40, c /= 40, h /= 40), d = Math[d >= 1 ? "floor" : "ceil"](d / n), c = Math[c >= 1 ? "floor" : "ceil"](c / n), h = Math[h >= 1 ? "floor" : "ceil"](h / n), u.settings.normalizeOffset && this.getBoundingClientRect) {
                var y = this.getBoundingClientRect();
                m = t.clientX - y.left, g = t.clientY - y.top
            }
            return t.deltaX = c, t.deltaY = h, t.deltaFactor = n, t.offsetX = m, t.offsetY = g, t.deltaMode = 0, s.unshift(t, d, c, h), r && clearTimeout(r), r = setTimeout(a, 200), (e.event.dispatch || e.event.handle).apply(this, s)
        }
    }

    function a() {
        n = null
    }

    function i(e, t) {
        return u.settings.adjustOldDeltas && "mousewheel" === e.type && t % 120 === 0
    }

    var r, n, o = ["wheel", "mousewheel", "DOMMouseScroll", "MozMousePixelScroll"], s = "onwheel" in document || document.documentMode >= 9 ? ["wheel"] : ["mousewheel", "DomMouseScroll", "MozMousePixelScroll"], l = Array.prototype.slice;
    if (e.event.fixHooks)for (var d = o.length; d;)e.event.fixHooks[o[--d]] = e.event.mouseHooks;
    var u = e.event.special.mousewheel = {
        version: "3.1.12", setup: function () {
            if (this.addEventListener)for (var a = s.length; a;)this.addEventListener(s[--a], t, !1); else this.onmousewheel = t;
            e.data(this, "mousewheel-line-height", u.getLineHeight(this)), e.data(this, "mousewheel-page-height", u.getPageHeight(this))
        }, teardown: function () {
            if (this.removeEventListener)for (var a = s.length; a;)this.removeEventListener(s[--a], t, !1); else this.onmousewheel = null;
            e.removeData(this, "mousewheel-line-height"), e.removeData(this, "mousewheel-page-height")
        }, getLineHeight: function (t) {
            var a = e(t), i = a["offsetParent" in e.fn ? "offsetParent" : "parent"]();
            return i.length || (i = e("body")), parseInt(i.css("fontSize"), 10) || parseInt(a.css("fontSize"), 10) || 16
        }, getPageHeight: function (t) {
            return e(t).height()
        }, settings: {adjustOldDeltas: !0, normalizeOffset: !0}
    };
    e.fn.extend({
        mousewheel: function (e) {
            return e ? this.bind("mousewheel", e) : this.trigger("mousewheel")
        }, unmousewheel: function (e) {
            return this.unbind("mousewheel", e)
        }
    })
}), function (e) {
    "use strict";
    function t(e, t, a) {
        this.el = e, t = t || 'input[type="password"]', a = a || ".form-group__password > .password-strength", this.field = this.el.find(t), this.meter = this.el.find(a), this._init()
    }

    t.prototype = {
        _init: function () {
            this.characters = 0, this.capitalletters = 0, this.lowerletters = 0, this.number = 0, this.special = 0, this.upperCase = new RegExp("[A-Z]"), this.lowerCase = new RegExp("[a-z]"), this.numbers = new RegExp("[0-9]"), this.specialchars = new RegExp("([!,%,&,@,#,$,^,*,?,_,~,/])");
            var e = this;
            this.field.on("keyup keydown", function () {
                e._checkStrength($(this).val())
            })
        }, _setPercentage: function (e) {
            this.meter.css({width: e + "%"})
        }, _setClass: function (e) {
            e <= 1 ? (this.meter.removeClass(), this.meter.addClass("password-strength password-strength--veryweak")) : 2 === e ? (this.meter.removeClass(), this.meter.addClass("password-strength password-strength--weak")) : 3 === e ? (this.meter.removeClass(), this.meter.addClass("password-strength password-strength--medium")) : (this.meter.removeClass(), this.meter.addClass("password-strength password-strength--strong"))
        }, _checkStrength: function (e) {
            e.length >= 8 ? this.characters = 1 : this.characters = 0, e.match(this.upperCase) ? this.capitalletters = 1 : this.capitalletters = 0, e.match(this.lowerCase) ? this.lowerletters = 1 : this.lowerletters = 0, e.match(this.numbers) ? this.number = 1 : this.number = 0, e.match(this.specialchars) ? this.special = 1 : this.special = 0;
            var t = this._getTotal(), a = this._getPercentage(5, t);
            this._setPercentage(a), this._setClass(t)
        }, _getPercentage: function (e, t) {
            return t / e * 100
        }, _getTotal: function () {
            return this.characters + this.capitalletters + this.lowerletters + this.number + this.special
        }
    }, e.PasswordMeter = t
}(window), function (e) {
    "use strict";
    function t() {
    }

    t.prototype = {
        initSearcher: function () {
            this.searchurl = this.el.data("searchurl"), this.results = this.el.find("ul.related-search__results"), this.search = this.el.find('input[name="_relatedsearch"]'), this.searching = !1, this.itemKeys = [], this._extractItems(), this._initSearcherEvents()
        }, _initSearcherEvents: function () {
            var e = this;
            this.search.on("keydown.searchable", function (t) {
                var a = $(this).val().trim(), i = $(this);
                return 27 == t.which ? (t.stopPropagation(), "" === a ? i.blur() : i.val(""), void e._clearSearch()) : 40 == t.which ? (t.stopPropagation(), void(e._hasResults() && e._focusResult(0))) : (13 == t.which && (t.preventDefault(), e._searchPressReturn(a)), !e.searching && a.length > 0 && e._search(a), void("" == a && e._clearSearch()))
            }), this.search.on("focus", function () {
                e._showResults()
            }), $("body").click(function () {
                e._hideResults()
            }), this.el.click(function (e) {
                e.stopPropagation()
            }), this.results.on("keydown.searchable", "input.related-search__input", function (t) {
                t.stopPropagation(), t.preventDefault();
                var a = $(this).closest("li");
                40 == t.which ? a.is(":last-child") || e._focusResult(a.index() + 1) : 38 == t.which ? a.is(":first-child") ? e._focusSearch() : e._focusResult(a.index() - 1) : 13 == t.which && e._addItem(a)
            }), this.results.on("click.searchable", "li.related-search__result", function () {
                e._addItem($(this))
            }), this.results.on("mouseenter.searchable", "li.related-search__result", function () {
                e._focusResult($(this).index())
            })
        }, _searchPressReturn: function (e) {
        }, _populateResults: function (e) {
            this.results.empty();
            for (var t in e)if (this.itemKeys.indexOf(parseInt(t)) == -1) {
                var a = this._addResult(t, e[t]);
                this.results.append(a)
            }
        }, _hasResults: function () {
            return this.results.find("li.related-search__result").length > 0
        }, _focusResult: function (e) {
            var t = $(this.results).find("li.related-search__result"), a = t.eq(e);
            t.removeClass("related-search__result--selected"), a.addClass("related-search__result--selected"), a.find("input").focus()
        }, _focusSearch: function () {
            $(this.results).find("li.related-search__result").removeClass("related-search__result--selected"), this.search.focus()
        }, _clearSearch: function () {
            this.results.empty(), this.search.val("")
        }, _showResults: function () {
            this.results.removeClass("related-search__results--hidden")
        }, _hideResults: function () {
            this.results.addClass("related-search__results--hidden")
        }
    }, e.Searcher = t
}(window), function (e) {
    "use strict";
    function t(e) {
        this.el = e, this._init()
    }

    inheritsFrom(t, Searcher), t.prototype._init = function () {
        this.mode = this.el.data("mode"), this.filter = this.el.data("filter"), this.items = this.el.find("ul.related-items"), this.value = this.el.find('input[type="hidden"]'), this.initSearcher(), this._initEvents()
    }, t.prototype._extractItems = function () {
        var e = this.value.val().trim();
        "" != e && ("single" === this.mode ? this.itemKeys.push(parseInt(e)) : this.itemKeys = JSON.parse(e))
    }, t.prototype._initEvents = function () {
        var e = this;
        this.items.on("click", "i.related-item__close", function (t) {
            t.stopPropagation(), e._removeItem($(this).parent())
        }), "single" !== this.mode && this.items.sortable({
            tolerance: "pointer",
            placeholder: "placeholder",
            opacity: .7,
            delay: 50,
            stop: function () {
                e._regenerateValue()
            }
        })
    }, t.prototype._search = function (e) {
        var t = this;
        t.searching || $.post(this.searchurl, {q: e, filter: t.filter}, function (e) {
            t._populateResults(e)
        })
    }, t.prototype._addResult = function (e, t) {
        return $('<li class="related-search__result">' + t + '<input class="related-search__input" type="text" value="' + e + '"></li>')
    }, t.prototype._addItem = function (e) {
        var t = parseInt(e.find("input").val()), e = $('<li class="related-item" data-id="' + t + '">' + e.text() + '<i class="fa fa-trash  fa-lg related-item__close"></i></li>');
        "single" === this.mode && (this.items.empty(), this.itemKeys = []), this.items.append(e), this.itemKeys.push(t), this._regenerateValue(), this._clearSearch(), this.search.focus()
    }, t.prototype._removeItem = function (e) {
        var t = this.itemKeys.indexOf(e.data("id"));
        delete this.itemKeys[t], e.remove(), this._regenerateValue()
    }, t.prototype._regenerateValue = function () {
        var e = "";
        if ("single" === this.mode) {
            var t = this.items.find("li.related-item:first-child");
            1 == t.length && (e = t.data("id"))
        } else {
            for (var a = [], i = this.items.find("li.related-item"), r = 0; r < i.length; r++)a.push($(i[r]).data("id"));
            e = JSON.stringify(a)
        }
        this.value.val(e)
    }, e.RelationField = t
}(window), function (e) {
    "use strict";
    function t(e) {
        this.el = e, this._init()
    }

    t.prototype = {
        _init: function () {
            this.input = this.el.find('input[type="text"]');
            var e = "undefined" != typeof this.input.data("follows") ? this.input.data("follows") : "#title";
            this.follow = $(e), this.dirty = "" !== this.input.val(), this._initEvents()
        }, _initEvents: function () {
            var e = this;
            this.input.on("keyup", function () {
                e.dirty = !0
            }), this.follow.on("keyup", function () {
                e.dirty || e._setSlug()
            }), this.input.on("blur", function () {
                "" === e.input.val() && (e.changed = !1, e._setSlug())
            })
        }, _setSlug: function () {
            var e = this._slugify(this.follow.val());
            this.input.val(e)
        }, _slugify: function (e) {
            e = e.replace(/^\s+|\s+$/g, "").toLowerCase();
            for (var t = "àáäâèéëêıìíïîòóöôùúüûñçğş·/_,:;", a = "aaaaeeeeiiiiioooouuuuncgs------", i = 0, r = t.length; i < r; i++)e = e.replace(new RegExp(t.charAt(i), "g"), a.charAt(i));
            return e.replace(/[^a-z0-9 -]/g, "").replace(/\s+/g, "-").replace(/-+/g, "-")
        }
    }, e.Slug = t
}(window), $(".form-group input, .form-group textarea").focus(function () {
    $(this).closest(".form-group").find(".form-group__label").addClass("form-group__label--focus")
}), $(".form-group input, .form-group textarea").blur(function () {
    $(this).closest(".form-group").find(".form-group__label").removeClass("form-group__label--focus")
}), $(".form-group--password").each(function () {
    new PasswordMeter($(this))
}), $(".form-group--slug").each(function () {
    new Slug($(this))
}), $("input.minicolors").minicolors({position: "bottom left"}), $.datetimepicker.setLocale(window.locale), $(".form-group--datetime").each(function () {
    $(this).find('input[type="text"]').datetimepicker({format: "Y-m-d H:i:s"})
}), $(".form-group__relation").each(function () {
    new RelationField($(this))
});
>>>>>>> a55e7fb566919476f1352d59a4554173b8a1ae6c
