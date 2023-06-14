/* Notiflix Loading AIO (https://notiflix.github.io) - Version: 3.2.5 - Author: Furkan MT (https://github.com/furcan) - Copyright 2019 - 2022 Notiflix, MIT Licence (https://opensource.org/licenses/MIT) */

(function(a,b){"function"==typeof define&&define.amd?define([],function(){return b(a)}):"object"==typeof module&&"object"==typeof module.exports?module.exports=b(a):a.Notiflix=b(a)})("undefined"==typeof global?"undefined"==typeof window?this:window:global,function(a){'use strict';if("undefined"==typeof a&&"undefined"==typeof a.document)return!1;var b,c={Standard:"Standard",Hourglass:"Hourglass",Circle:"Circle",Arrows:"Arrows",Dots:"Dots",Pulse:"Pulse",Custom:"Custom",Notiflix:"Notiflix"},d={ID:"NotiflixLoadingWrap",className:"notiflix-loading",zindex:4e3,backgroundColor:"rgba(0,0,0,0.8)",rtl:!1,fontFamily:"Quicksand",cssAnimation:!0,cssAnimationDuration:400,clickToClose:!1,customSvgUrl:null,customSvgCode:null,svgSize:"80px",svgColor:"#32c682",messageID:"NotiflixLoadingMessage",messageFontSize:"15px",messageMaxLength:34,messageColor:"#dcdcdc"},e=function(a){return console.error("%c Notiflix Error ","padding:2px;border-radius:20px;color:#fff;background:#ff5549","\n"+a+"\n\nVisit documentation page to learn more: https://notiflix.github.io/documentation")},f=function(b){return b||(b="head"),null!==a.document[b]||(e("\nNotiflix needs to be appended to the \"<"+b+">\" element, but you called it before the \"<"+b+">\" element has been created."),!1)},g=function(b,c){if(!f("head"))return!1;if(null!==b()&&!a.document.getElementById(c)){var d=a.document.createElement("style");d.id=c,d.innerHTML=b(),a.document.head.appendChild(d)}},h=function(){var a={},b=!1,c=0;"[object Boolean]"===Object.prototype.toString.call(arguments[0])&&(b=arguments[0],c++);for(var d=function(c){for(var d in c)Object.prototype.hasOwnProperty.call(c,d)&&(a[d]=b&&"[object Object]"===Object.prototype.toString.call(c[d])?h(a[d],c[d]):c[d])};c<arguments.length;c++)d(arguments[c]);return a},i=function(b){var c=a.document.createElement("div");return c.innerHTML=b,c.textContent||c.innerText||""},j=function(a,b){a||(a="60px"),b||(b="#32c682");var c="<svg xmlns=\"http://www.w3.org/2000/svg\" stroke=\""+b+"\" width=\""+a+"\" height=\""+a+"\" transform=\"scale(.8)\" viewBox=\"0 0 38 38\"><g fill=\"none\" fill-rule=\"evenodd\" stroke-width=\"2\" transform=\"translate(1 1)\"><circle cx=\"18\" cy=\"18\" r=\"18\" stroke-opacity=\".25\"/><path d=\"M36 18c0-9.94-8.06-18-18-18\"><animateTransform attributeName=\"transform\" dur=\"1s\" from=\"0 18 18\" repeatCount=\"indefinite\" to=\"360 18 18\" type=\"rotate\"/></path></g></svg>";return c},k=function(a,b){a||(a="60px"),b||(b="#32c682");var c="<svg xmlns=\"http://www.w3.org/2000/svg\" id=\"NXLoadingHourglass\" fill=\""+b+"\" width=\""+a+"\" height=\""+a+"\" viewBox=\"0 0 200 200\"><style>@-webkit-keyframes NXhourglass5-animation{0%{-webkit-transform:scale(1,1);transform:scale(1,1)}16.67%{-webkit-transform:scale(1,.8);transform:scale(1,.8)}33.33%{-webkit-transform:scale(.88,.6);transform:scale(.88,.6)}37.5%{-webkit-transform:scale(.85,.55);transform:scale(.85,.55)}41.67%{-webkit-transform:scale(.8,.5);transform:scale(.8,.5)}45.83%{-webkit-transform:scale(.75,.45);transform:scale(.75,.45)}50%{-webkit-transform:scale(.7,.4);transform:scale(.7,.4)}54.17%{-webkit-transform:scale(.6,.35);transform:scale(.6,.35)}58.33%{-webkit-transform:scale(.5,.3);transform:scale(.5,.3)}83.33%,to{-webkit-transform:scale(.2,0);transform:scale(.2,0)}}@keyframes NXhourglass5-animation{0%{-webkit-transform:scale(1,1);transform:scale(1,1)}16.67%{-webkit-transform:scale(1,.8);transform:scale(1,.8)}33.33%{-webkit-transform:scale(.88,.6);transform:scale(.88,.6)}37.5%{-webkit-transform:scale(.85,.55);transform:scale(.85,.55)}41.67%{-webkit-transform:scale(.8,.5);transform:scale(.8,.5)}45.83%{-webkit-transform:scale(.75,.45);transform:scale(.75,.45)}50%{-webkit-transform:scale(.7,.4);transform:scale(.7,.4)}54.17%{-webkit-transform:scale(.6,.35);transform:scale(.6,.35)}58.33%{-webkit-transform:scale(.5,.3);transform:scale(.5,.3)}83.33%,to{-webkit-transform:scale(.2,0);transform:scale(.2,0)}}@-webkit-keyframes NXhourglass3-animation{0%{-webkit-transform:scale(1,.02);transform:scale(1,.02)}79.17%,to{-webkit-transform:scale(1,1);transform:scale(1,1)}}@keyframes NXhourglass3-animation{0%{-webkit-transform:scale(1,.02);transform:scale(1,.02)}79.17%,to{-webkit-transform:scale(1,1);transform:scale(1,1)}}@-webkit-keyframes NXhourglass1-animation{0%,83.33%{-webkit-transform:rotate(0deg);transform:rotate(0deg)}to{-webkit-transform:rotate(180deg);transform:rotate(180deg)}}@keyframes NXhourglass1-animation{0%,83.33%{-webkit-transform:rotate(0deg);transform:rotate(0deg)}to{-webkit-transform:rotate(180deg);transform:rotate(180deg)}}#NXLoadingHourglass *{-webkit-animation-duration:1.2s;animation-duration:1.2s;-webkit-animation-iteration-count:infinite;animation-iteration-count:infinite;-webkit-animation-timing-function:cubic-bezier(0,0,1,1);animation-timing-function:cubic-bezier(0,0,1,1)}</style><g data-animator-group=\"true\" data-animator-type=\"1\" style=\"-webkit-animation-name:NXhourglass1-animation;animation-name:NXhourglass1-animation;-webkit-transform-origin:50% 50%;transform-origin:50% 50%;transform-box:fill-box\"><g id=\"NXhourglass2\" fill=\"inherit\"><g data-animator-group=\"true\" data-animator-type=\"2\" style=\"-webkit-animation-name:NXhourglass3-animation;animation-name:NXhourglass3-animation;-webkit-animation-timing-function:cubic-bezier(.42,0,.58,1);animation-timing-function:cubic-bezier(.42,0,.58,1);-webkit-transform-origin:50% 100%;transform-origin:50% 100%;transform-box:fill-box\" opacity=\".4\"><path id=\"NXhourglass4\" d=\"M100 100l-34.38 32.08v31.14h68.76v-31.14z\"/></g><g data-animator-group=\"true\" data-animator-type=\"2\" style=\"-webkit-animation-name:NXhourglass5-animation;animation-name:NXhourglass5-animation;-webkit-transform-origin:50% 100%;transform-origin:50% 100%;transform-box:fill-box\" opacity=\".4\"><path id=\"NXhourglass6\" d=\"M100 100L65.62 67.92V36.78h68.76v31.14z\"/></g><path d=\"M51.14 38.89h8.33v14.93c0 15.1 8.29 28.99 23.34 39.1 1.88 1.25 3.04 3.97 3.04 7.08s-1.16 5.83-3.04 7.09c-15.05 10.1-23.34 23.99-23.34 39.09v14.93h-8.33a4.859 4.859 0 1 0 0 9.72h97.72a4.859 4.859 0 1 0 0-9.72h-8.33v-14.93c0-15.1-8.29-28.99-23.34-39.09-1.88-1.26-3.04-3.98-3.04-7.09s1.16-5.83 3.04-7.08c15.05-10.11 23.34-24 23.34-39.1V38.89h8.33a4.859 4.859 0 1 0 0-9.72H51.14a4.859 4.859 0 1 0 0 9.72zm79.67 14.93c0 15.87-11.93 26.25-19.04 31.03-4.6 3.08-7.34 8.75-7.34 15.15 0 6.41 2.74 12.07 7.34 15.15 7.11 4.78 19.04 15.16 19.04 31.03v14.93H69.19v-14.93c0-15.87 11.93-26.25 19.04-31.02 4.6-3.09 7.34-8.75 7.34-15.16 0-6.4-2.74-12.07-7.34-15.15-7.11-4.78-19.04-15.16-19.04-31.03V38.89h61.62v14.93z\"/></g></g></svg>";return c},l=function(a,b){a||(a="60px"),b||(b="#32c682");var c="<svg xmlns=\"http://www.w3.org/2000/svg\" width=\""+a+"\" height=\""+a+"\" viewBox=\"25 25 50 50\" style=\"-webkit-animation:rotate 2s linear infinite;animation:rotate 2s linear infinite;height:"+a+";-webkit-transform-origin:center center;-ms-transform-origin:center center;transform-origin:center center;width:"+a+";position:absolute;top:0;left:0;margin:auto\"><style>@-webkit-keyframes rotate{to{-webkit-transform:rotate(360deg);transform:rotate(360deg)}}@keyframes rotate{to{-webkit-transform:rotate(360deg);transform:rotate(360deg)}}@-webkit-keyframes dash{0%{stroke-dasharray:1,200;stroke-dashoffset:0}50%{stroke-dasharray:89,200;stroke-dashoffset:-35}to{stroke-dasharray:89,200;stroke-dashoffset:-124}}@keyframes dash{0%{stroke-dasharray:1,200;stroke-dashoffset:0}50%{stroke-dasharray:89,200;stroke-dashoffset:-35}to{stroke-dasharray:89,200;stroke-dashoffset:-124}}</style><circle cx=\"50\" cy=\"50\" r=\"20\" fill=\"none\" stroke=\""+b+"\" stroke-width=\"2\" style=\"-webkit-animation:dash 1.5s ease-in-out infinite,color 1.5s ease-in-out infinite;animation:dash 1.5s ease-in-out infinite,color 1.5s ease-in-out infinite\" stroke-dasharray=\"150 200\" stroke-dashoffset=\"-10\" stroke-linecap=\"round\"/></svg>";return c},m=function(a,b){a||(a="60px"),b||(b="#32c682");var c="<svg xmlns=\"http://www.w3.org/2000/svg\" fill=\""+b+"\" width=\""+a+"\" height=\""+a+"\" viewBox=\"0 0 128 128\"><g><path fill=\"inherit\" d=\"M109.25 55.5h-36l12-12a29.54 29.54 0 0 0-49.53 12H18.75A46.04 46.04 0 0 1 96.9 31.84l12.35-12.34v36zm-90.5 17h36l-12 12a29.54 29.54 0 0 0 49.53-12h16.97A46.04 46.04 0 0 1 31.1 96.16L18.74 108.5v-36z\"/><animateTransform attributeName=\"transform\" dur=\"1.5s\" from=\"0 64 64\" repeatCount=\"indefinite\" to=\"360 64 64\" type=\"rotate\"/></g></svg>";return c},n=function(a,b){a||(a="60px"),b||(b="#32c682");var c="<svg xmlns=\"http://www.w3.org/2000/svg\" fill=\""+b+"\" width=\""+a+"\" height=\""+a+"\" viewBox=\"0 0 100 100\"><g transform=\"translate(25 50)\"><circle r=\"9\" fill=\"inherit\" transform=\"scale(.239)\"><animateTransform attributeName=\"transform\" begin=\"-0.266s\" calcMode=\"spline\" dur=\"0.8s\" keySplines=\"0.3 0 0.7 1;0.3 0 0.7 1\" keyTimes=\"0;0.5;1\" repeatCount=\"indefinite\" type=\"scale\" values=\"0;1;0\"/></circle></g><g transform=\"translate(50 50)\"><circle r=\"9\" fill=\"inherit\" transform=\"scale(.00152)\"><animateTransform attributeName=\"transform\" begin=\"-0.133s\" calcMode=\"spline\" dur=\"0.8s\" keySplines=\"0.3 0 0.7 1;0.3 0 0.7 1\" keyTimes=\"0;0.5;1\" repeatCount=\"indefinite\" type=\"scale\" values=\"0;1;0\"/></circle></g><g transform=\"translate(75 50)\"><circle r=\"9\" fill=\"inherit\" transform=\"scale(.299)\"><animateTransform attributeName=\"transform\" begin=\"0s\" calcMode=\"spline\" dur=\"0.8s\" keySplines=\"0.3 0 0.7 1;0.3 0 0.7 1\" keyTimes=\"0;0.5;1\" repeatCount=\"indefinite\" type=\"scale\" values=\"0;1;0\"/></circle></g></svg>";return c},o=function(a,b){a||(a="60px"),b||(b="#32c682");var c="<svg xmlns=\"http://www.w3.org/2000/svg\" stroke=\""+b+"\" width=\""+a+"\" height=\""+a+"\" viewBox=\"0 0 44 44\"><g fill=\"none\" fill-rule=\"evenodd\" stroke-width=\"2\"><circle cx=\"22\" cy=\"22\" r=\"1\"><animate attributeName=\"r\" begin=\"0s\" calcMode=\"spline\" dur=\"1.8s\" keySplines=\"0.165, 0.84, 0.44, 1\" keyTimes=\"0; 1\" repeatCount=\"indefinite\" values=\"1; 20\"/><animate attributeName=\"stroke-opacity\" begin=\"0s\" calcMode=\"spline\" dur=\"1.8s\" keySplines=\"0.3, 0.61, 0.355, 1\" keyTimes=\"0; 1\" repeatCount=\"indefinite\" values=\"1; 0\"/></circle><circle cx=\"22\" cy=\"22\" r=\"1\"><animate attributeName=\"r\" begin=\"-0.9s\" calcMode=\"spline\" dur=\"1.8s\" keySplines=\"0.165, 0.84, 0.44, 1\" keyTimes=\"0; 1\" repeatCount=\"indefinite\" values=\"1; 20\"/><animate attributeName=\"stroke-opacity\" begin=\"-0.9s\" calcMode=\"spline\" dur=\"1.8s\" keySplines=\"0.3, 0.61, 0.355, 1\" keyTimes=\"0; 1\" repeatCount=\"indefinite\" values=\"1; 0\"/></circle></g></svg>";return c},p=function(a,b,c){a||(a="60px"),b||(b="#f8f8f8"),c||(c="#32c682");var d="<svg xmlns=\"http://www.w3.org/2000/svg\" id=\"NXLoadingNotiflixLib\" width=\""+a+"\" height=\""+a+"\" viewBox=\"0 0 200 200\"><defs><style>@keyframes notiflix-n{0%{stroke-dashoffset:1000}to{stroke-dashoffset:0}}@keyframes notiflix-x{0%{stroke-dashoffset:1000}to{stroke-dashoffset:0}}@keyframes notiflix-dot{0%,to{stroke-width:0}50%{stroke-width:12}}.nx-icon-line{stroke:"+b+";stroke-width:12;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:22;fill:none}</style></defs><path d=\"M47.97 135.05a6.5 6.5 0 1 1 0 13 6.5 6.5 0 0 1 0-13z\" style=\"animation-name:notiflix-dot;animation-timing-function:ease-in-out;animation-duration:1.25s;animation-iteration-count:infinite;animation-direction:normal\" fill=\""+c+"\" stroke=\""+c+"\" stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-miterlimit=\"22\" stroke-width=\"12\"/><path class=\"nx-icon-line\" d=\"M10.14 144.76V87.55c0-5.68-4.54-41.36 37.83-41.36 42.36 0 37.82 35.68 37.82 41.36v57.21\" style=\"animation-name:notiflix-n;animation-timing-function:linear;animation-duration:2.5s;animation-delay:0s;animation-iteration-count:infinite;animation-direction:normal\" stroke-dasharray=\"500\"/><path class=\"nx-icon-line\" d=\"M115.06 144.49c24.98-32.68 49.96-65.35 74.94-98.03M114.89 46.6c25.09 32.58 50.19 65.17 75.29 97.75\" style=\"animation-name:notiflix-x;animation-timing-function:linear;animation-duration:2.5s;animation-delay:.2s;animation-iteration-count:infinite;animation-direction:normal\" stroke-dasharray=\"500\"/></svg>";return d},q=function(){return"[id^=NotiflixLoadingWrap]{-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;position:fixed;z-index:4000;width:100%;height:100%;left:0;top:0;right:0;bottom:0;margin:auto;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-wrap:wrap;-ms-flex-wrap:wrap;flex-wrap:wrap;-webkit-box-orient:vertical;-webkit-box-direction:normal;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;-webkit-box-align:center;-webkit-align-items:center;-ms-flex-align:center;align-items:center;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;text-align:center;-webkit-box-sizing:border-box;box-sizing:border-box;background:rgba(0,0,0,.8);font-family:\"Quicksand\",-apple-system,BlinkMacSystemFont,\"Segoe UI\",Roboto,\"Helvetica Neue\",Arial,sans-serif}[id^=NotiflixLoadingWrap] *{-webkit-box-sizing:border-box;box-sizing:border-box}[id^=NotiflixLoadingWrap].nx-loading-click-to-close{cursor:pointer}[id^=NotiflixLoadingWrap]>div[class*=\"-icon\"]{width:60px;height:60px;position:relative;-webkit-transition:top .2s ease-in-out;-o-transition:top .2s ease-in-out;transition:top .2s ease-in-out;margin:0 auto}[id^=NotiflixLoadingWrap]>div[class*=\"-icon\"] img,[id^=NotiflixLoadingWrap]>div[class*=\"-icon\"] svg{max-width:unset;max-height:unset;width:100%;height:auto;position:absolute;left:0;top:0}[id^=NotiflixLoadingWrap]>p{position:relative;margin:10px auto 0;font-family:inherit!important;font-weight:normal;font-size:15px;line-height:1.4;padding:0 10px;width:100%;text-align:center}[id^=NotiflixLoadingWrap].nx-with-animation{-webkit-animation:loading-animation-fade .3s ease-in-out 0s normal;animation:loading-animation-fade .3s ease-in-out 0s normal}@-webkit-keyframes loading-animation-fade{0%{opacity:0}100%{opacity:1}}@keyframes loading-animation-fade{0%{opacity:0}100%{opacity:1}}[id^=NotiflixLoadingWrap].nx-with-animation.nx-remove{opacity:0;-webkit-animation:loading-animation-fade-remove .3s ease-in-out 0s normal;animation:loading-animation-fade-remove .3s ease-in-out 0s normal}@-webkit-keyframes loading-animation-fade-remove{0%{opacity:1}100%{opacity:0}}@keyframes loading-animation-fade-remove{0%{opacity:1}100%{opacity:0}}[id^=NotiflixLoadingWrap]>p.nx-loading-message-new{-webkit-animation:loading-new-message-fade .3s ease-in-out 0s normal;animation:loading-new-message-fade .3s ease-in-out 0s normal}@-webkit-keyframes loading-new-message-fade{0%{opacity:0}100%{opacity:1}}@keyframes loading-new-message-fade{0%{opacity:0}100%{opacity:1}}"},r=function(g,q,r,s,u){if(!f("body"))return!1;b||t.Loading.init({});var v=h(!0,b,{});if("object"==typeof q&&!Array.isArray(q)||"object"==typeof r&&!Array.isArray(r)){var w={};"object"==typeof q?w=q:"object"==typeof r&&(w=r),b=h(!0,b,w)}var x="";if("string"==typeof q&&0<q.length&&(x=q),s){x=x.length>b.messageMaxLength?i(x).toString().substring(0,b.messageMaxLength)+"...":i(x).toString();var y="";0<x.length&&(y="<p id=\""+b.messageID+"\" class=\"nx-loading-message\" style=\"color:"+b.messageColor+";font-size:"+b.messageFontSize+";\">"+x+"</p>"),b.cssAnimation||(b.cssAnimationDuration=0);var z="";if(g===c.Standard)z=j(b.svgSize,b.svgColor);else if(g===c.Hourglass)z=k(b.svgSize,b.svgColor);else if(g===c.Circle)z=l(b.svgSize,b.svgColor);else if(g===c.Arrows)z=m(b.svgSize,b.svgColor);else if(g===c.Dots)z=n(b.svgSize,b.svgColor);else if(g===c.Pulse)z=o(b.svgSize,b.svgColor);else if(g===c.Custom&&null!==b.customSvgCode&&null===b.customSvgUrl)z=b.customSvgCode||"";else if(g===c.Custom&&null!==b.customSvgUrl&&null===b.customSvgCode)z="<img class=\"nx-custom-loading-icon\" width=\""+b.svgSize+"\" height=\""+b.svgSize+"\" src=\""+b.customSvgUrl+"\" alt=\"Notiflix\">";else{if(g===c.Custom&&(null===b.customSvgUrl||null===b.customSvgCode))return e("You have to set a static SVG url to \"customSvgUrl\" option to use Loading Custom."),!1;z=p(b.svgSize,"#f8f8f8","#32c682")}var A=parseInt((b.svgSize||"").replace(/[^0-9]/g,"")),B=a.innerWidth,C=A>=B?B-40+"px":A+"px",D="<div style=\"width:"+C+"; height:"+C+";\" class=\""+b.className+"-icon"+(0<x.length?" nx-with-message":"")+"\">"+z+"</div>",E=a.document.createElement("div");if(E.id=d.ID,E.className=b.className+(b.cssAnimation?" nx-with-animation":"")+(b.clickToClose?" nx-loading-click-to-close":""),E.style.zIndex=b.zindex,E.style.background=b.backgroundColor,E.style.animationDuration=b.cssAnimationDuration+"ms",E.style.fontFamily="\""+b.fontFamily+"\", "+"-apple-system, BlinkMacSystemFont, \"Segoe UI\", Roboto, \"Helvetica Neue\", Arial, \"Noto Sans\", sans-serif",E.style.display="flex",E.style.flexWrap="wrap",E.style.flexDirection="column",E.style.alignItems="center",E.style.justifyContent="center",b.rtl&&(E.setAttribute("dir","rtl"),E.classList.add("nx-rtl-on")),E.innerHTML=D+y,!a.document.getElementById(E.id)&&(a.document.body.appendChild(E),b.clickToClose)){var F=a.document.getElementById(E.id);F.addEventListener("click",function(){E.classList.add("nx-remove");var a=setTimeout(function(){null!==E.parentNode&&(E.parentNode.removeChild(E),clearTimeout(a))},b.cssAnimationDuration)})}}else if(a.document.getElementById(d.ID))var G=a.document.getElementById(d.ID),H=setTimeout(function(){G.classList.add("nx-remove");var a=setTimeout(function(){null!==G.parentNode&&(G.parentNode.removeChild(G),clearTimeout(a))},b.cssAnimationDuration);clearTimeout(H)},u);b=h(!0,b,v)},s=function(c){"string"!=typeof c&&(c="");var f=a.document.getElementById(d.ID);if(f)if(0<c.length){c=c.length>b.messageMaxLength?i(c).substring(0,b.messageMaxLength)+"...":i(c);var g=f.getElementsByTagName("p")[0];if(g)g.innerHTML=c;else{var h=a.document.createElement("p");h.id=b.messageID,h.className="nx-loading-message nx-loading-message-new",h.style.color=b.messageColor,h.style.fontSize=b.messageFontSize,h.innerHTML=c,f.appendChild(h)}}else e("Where is the new message?")},t={Loading:{init:function(a){b=h(!0,d,a),g(q,"NotiflixLoadingInternalCSS")},merge:function(a){return b?void(b=h(!0,b,a)):(e("You have to initialize the Loading module before call Merge function."),!1)},standard:function(a,b){r(c.Standard,a,b,!0,0)},hourglass:function(a,b){r(c.Hourglass,a,b,!0,0)},circle:function(a,b){r(c.Circle,a,b,!0,0)},arrows:function(a,b){r(c.Arrows,a,b,!0,0)},dots:function(a,b){r(c.Dots,a,b,!0,0)},pulse:function(a,b){r(c.Pulse,a,b,!0,0)},custom:function(a,b){r(c.Custom,a,b,!0,0)},notiflix:function(a,b){r(c.Notiflix,a,b,!0,0)},remove:function(a){"number"!=typeof a&&(a=0),r(null,null,null,!1,a)},change:function(a){s(a)}}};return"object"==typeof a.Notiflix?h(!0,a.Notiflix,{Loading:t.Loading}):{Loading:t.Loading}});