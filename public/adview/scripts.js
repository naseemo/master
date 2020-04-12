function smoothScroll(t){var e=t.hash;$("html, body").animate({scrollTop:$(t.hash).offset().top-50},600,function(){window.location.hash=e})}!function(t){if(!t.hasInitialised){var e={escapeRegExp:function(t){return t.replace(/[\-\[\]\/\{\}\(\)\*\+\?\.\\\^\$\|]/g,"\\$&")},hasClass:function(t,e){var s=" ";return 1===t.nodeType&&(s+t.className+s).replace(/[\n\t]/g,s).indexOf(s+e+s)>=0},addClass:function(t,e){t.className+=" "+e},removeClass:function(t,e){var s=new RegExp("\\b"+this.escapeRegExp(e)+"\\b");t.className=t.className.replace(s,"")},interpolateString:function(t,e){var s=/{{([a-z][a-z0-9\-_]*)}}/gi;return t.replace(s,function(){return e(arguments[1])||""})},getCookie:function(t){var e="; "+document.cookie,s=e.split("; "+t+"=");return 2!=s.length?void 0:s.pop().split(";").shift()},setCookie:function(t,e,s,i,n){var o=new Date;o.setDate(o.getDate()+(s||365));var a=[t+"="+e,"expires="+o.toUTCString(),"path="+(n||"/")];i&&a.push("domain="+i),document.cookie=a.join(";")},deepExtend:function(t,e){for(var s in e)e.hasOwnProperty(s)&&(s in t&&this.isPlainObject(t[s])&&this.isPlainObject(e[s])?this.deepExtend(t[s],e[s]):t[s]=e[s]);return t},throttle:function(t,e){var s=!1;return function(){s||(t.apply(this,arguments),s=!0,setTimeout(function(){s=!1},e))}},hash:function(t){var e,s,i,n=0;if(0===t.length)return n;for(e=0,i=t.length;e<i;++e)s=t.charCodeAt(e),n=(n<<5)-n+s,n|=0;return n},normaliseHex:function(t){return"#"==t[0]&&(t=t.substr(1)),3==t.length&&(t=t[0]+t[0]+t[1]+t[1]+t[2]+t[2]),t},getContrast:function(t){return t=this.normaliseHex(t),(299*parseInt(t.substr(0,2),16)+587*parseInt(t.substr(2,2),16)+114*parseInt(t.substr(4,2),16))/1e3>=128?"#000":"#fff"},getLuminance:function(t){var e=parseInt(this.normaliseHex(t),16),s=38,i=(e>>16)+s,n=(e>>8&255)+s,o=(255&e)+s;return"#"+(16777216+65536*(i<255?i<1?0:i:255)+256*(n<255?n<1?0:n:255)+(o<255?o<1?0:o:255)).toString(16).slice(1)},isMobile:function(){return/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)},isPlainObject:function(t){return"object"==typeof t&&null!==t&&t.constructor==Object}};t.status={deny:"deny",allow:"allow",dismiss:"dismiss"},t.transitionEnd=function(){var t=document.createElement("div"),e={t:"transitionend",OT:"oTransitionEnd",msT:"MSTransitionEnd",MozT:"transitionend",WebkitT:"webkitTransitionEnd"};for(var s in e)if(e.hasOwnProperty(s)&&"undefined"!=typeof t.style[s+"ransition"])return e[s];return""}(),t.hasTransition=!!t.transitionEnd;var s=Object.keys(t.status).map(e.escapeRegExp);t.customStyles={},t.Popup=function(){function i(){this.initialise.apply(this,arguments)}function n(t){this.openingTimeout=null,e.removeClass(t,"cc-invisible")}function o(e){e.style.display="none",e.removeEventListener(t.transitionEnd,this.afterTransition),this.afterTransition=null}function a(){var e=this.options.onInitialise.bind(this);if(!window.navigator.cookieEnabled)return e(t.status.deny),!0;if(window.CookiesOK||window.navigator.CookiesOK)return e(t.status.allow),!0;var s=Object.keys(t.status),i=this.getStatus(),n=s.indexOf(i)>=0;return n&&e(i),n}function r(){var t=this.options.position.split("-"),e=[];return t.forEach(function(t){e.push("cc-"+t)}),e}function l(){var t=this.options,s="top"==t.position||"bottom"==t.position?"banner":"floating";e.isMobile()&&(s="floating");var i=["cc-"+s,"cc-type-"+t.type,"cc-theme-"+t.theme];return t["static"]&&i.push("cc-static"),i.push.apply(i,r.call(this)),d.call(this,this.options.palette),this.customStyleSelector&&i.push(this.customStyleSelector),i}function c(){var t={},s=this.options;s.showLink||(s.elements.link="",s.elements.messagelink=s.elements.message),Object.keys(s.elements).forEach(function(i){t[i]=e.interpolateString(s.elements[i],function(t){var e=s.content[t];return t&&"string"==typeof e&&e.length?e:""})});var i=s.compliance[s.type];i||(i=s.compliance.info),t.compliance=e.interpolateString(i,function(e){return t[e]});var n=s.layouts[s.layout];return n||(n=s.layouts.basic),e.interpolateString(n,function(e){return t[e]})}function p(s){var i=this.options,n=document.createElement("div"),o=i.container&&1===i.container.nodeType?i.container:document.body;n.innerHTML=s;var a=n.children[0];return a.style.display="none",e.hasClass(a,"cc-window")&&t.hasTransition&&e.addClass(a,"cc-invisible"),this.onButtonClick=u.bind(this),a.addEventListener("click",this.onButtonClick),i.autoAttach&&(o.firstChild?o.insertBefore(a,o.firstChild):o.appendChild(a)),a}function u(i){var n=i.target;if(e.hasClass(n,"cc-btn")){var o=n.className.match(new RegExp("\\bcc-("+s.join("|")+")\\b")),a=o&&o[1]||!1;a&&(this.setStatus(a),this.close(!0))}e.hasClass(n,"cc-close")&&(this.setStatus(t.status.dismiss),this.close(!0)),e.hasClass(n,"cc-revoke")&&this.revokeChoice()}function d(t){var s=e.hash(JSON.stringify(t)),i="cc-color-override-"+s,n=e.isPlainObject(t);return this.customStyleSelector=n?i:null,n&&v(s,t,"."+i),n}function v(s,i,n){if(t.customStyles[s])return void++t.customStyles[s].references;var o={},a=i.popup,r=i.button,l=i.highlight;a&&(a.text=a.text?a.text:e.getContrast(a.background),a.link=a.link?a.link:a.text,o[n+".cc-window"]=["color: "+a.text,"background-color: "+a.background],o[n+".cc-revoke"]=["color: "+a.text,"background-color: "+a.background],o[n+" .cc-link,"+n+" .cc-link:active,"+n+" .cc-link:visited"]=["color: "+a.link],r&&(r.text=r.text?r.text:e.getContrast(r.background),r.border=r.border?r.border:"transparent",o[n+" .cc-btn"]=["color: "+r.text,"border-color: "+r.border,"background-color: "+r.background],"transparent"!=r.background&&(o[n+" .cc-btn:hover, "+n+" .cc-btn:focus"]=["background-color: "+h(r.background)]),l?(l.text=l.text?l.text:e.getContrast(l.background),l.border=l.border?l.border:"transparent",o[n+" .cc-highlight .cc-btn:first-child"]=["color: "+l.text,"border-color: "+l.border,"background-color: "+l.background]):o[n+" .cc-highlight .cc-btn:first-child"]=["color: "+a.text]));var c=document.createElement("style");document.head.appendChild(c),t.customStyles[s]={references:1,element:c.sheet};var p=-1;for(var u in o)o.hasOwnProperty(u)&&c.sheet.insertRule(u+"{"+o[u].join(";")+"}",++p)}function h(t){return t=e.normaliseHex(t),"000000"==t?"#222":e.getLuminance(t)}function g(s){if(e.isPlainObject(s)){var i=e.hash(JSON.stringify(s)),n=t.customStyles[i];if(n&&!--n.references){var o=n.element.ownerNode;o&&o.parentNode&&o.parentNode.removeChild(o),t.customStyles[i]=null}}}function f(t,e){for(var s=0,i=t.length;s<i;++s){var n=t[s];if(n instanceof RegExp&&n.test(e)||"string"==typeof n&&n.length&&n===e)return!0}return!1}function m(){var e=this.setStatus.bind(this),s=this.options.dismissOnTimeout;"number"==typeof s&&s>=0&&(this.dismissTimeout=window.setTimeout(function(){e(t.status.dismiss)},Math.floor(s)));var i=this.options.dismissOnScroll;if("number"==typeof i&&i>=0){var n=function(){window.pageYOffset>Math.floor(i)&&(e(t.status.dismiss),window.removeEventListener("scroll",n),this.onWindowScroll=null)};this.onWindowScroll=n,window.addEventListener("scroll",n)}}function y(){if("info"!=this.options.type&&(this.options.revokable=!0),e.isMobile()&&(this.options.animateRevokable=!1),this.options.revokable){var t=r.call(this);this.options.animateRevokable&&t.push("cc-animate"),this.customStyleSelector&&t.push(this.customStyleSelector);var s=this.options.revokeBtn.replace("{{classes}}",t.join(" "));this.revokeBtn=p.call(this,s);var i=this.revokeBtn;if(this.options.animateRevokable){var n=e.throttle(function(t){var s=!1,n=window.innerHeight-20;e.hasClass(i,"cc-top")&&t.clientY<20&&(s=!0),e.hasClass(i,"cc-bottom")&&t.clientY>n&&(s=!0),s?e.hasClass(i,"cc-active")||e.addClass(i,"cc-active"):e.hasClass(i,"cc-active")&&e.removeClass(i,"cc-active")},200);this.onMouseMove=n,window.addEventListener("mousemove",n)}}}var b={enabled:!0,container:null,cookie:{name:"cookieconsent_status",path:"/",domain:"",expiryDays:365},onPopupOpen:function(){},onPopupClose:function(){},onInitialise:function(){},onStatusChange:function(){},onRevokeChoice:function(){},content:{header:"Cookies used on the website!",message:"This website uses cookies to ensure you get the best experience on our website.",dismiss:"Got it!",allow:"Allow cookies",deny:"Decline",link:"Learn more",href:"http://cookiesandyou.com",close:"&#x274c;"},elements:{header:'<span class="cc-header">{{header}}</span>&nbsp;',message:'<span id="cookieconsent:desc" class="cc-message">{{message}}</span>',messagelink:'<span id="cookieconsent:desc" class="cc-message">{{message}} <a aria-label="learn more about cookies" role=button tabindex="0" class="cc-link" href="{{href}}" rel="noopener noreferrer nofollow" target="_blank">{{link}}</a></span>',dismiss:'<a aria-label="dismiss cookie message" role=button tabindex="0" class="cc-btn cc-dismiss">{{dismiss}}</a>',allow:'<a aria-label="allow cookies" role=button tabindex="0"  class="cc-btn cc-allow">{{allow}}</a>',deny:'<a aria-label="deny cookies" role=button tabindex="0" class="cc-btn cc-deny">{{deny}}</a>',link:'<a aria-label="learn more about cookies" role=button tabindex="0" class="cc-link" href="{{href}}" target="_blank">{{link}}</a>',close:'<span aria-label="dismiss cookie message" role=button tabindex="0" class="cc-close">{{close}}</span>'},window:'<div role="dialog" aria-live="polite" aria-label="cookieconsent" aria-describedby="cookieconsent:desc" class="cc-window {{classes}}"><!--googleoff: all-->{{children}}<!--googleon: all--></div>',revokeBtn:'<div class="cc-revoke {{classes}}">Cookie Policy</div>',compliance:{info:'<div class="cc-compliance">{{dismiss}}</div>',"opt-in":'<div class="cc-compliance cc-highlight">{{dismiss}}{{allow}}</div>',"opt-out":'<div class="cc-compliance cc-highlight">{{deny}}{{dismiss}}</div>'},type:"info",layouts:{basic:"{{messagelink}}{{compliance}}","basic-close":"{{messagelink}}{{compliance}}{{close}}","basic-header":"{{header}}{{message}}{{link}}{{compliance}}"},layout:"basic",position:"bottom",theme:"block","static":!1,palette:null,revokable:!1,animateRevokable:!0,showLink:!0,dismissOnScroll:!1,dismissOnTimeout:!1,autoOpen:!0,autoAttach:!0,whitelistPage:[],blacklistPage:[],overrideHTML:null};return i.prototype.initialise=function(t){this.options&&this.destroy(),e.deepExtend(this.options={},b),e.isPlainObject(t)&&e.deepExtend(this.options,t),a.call(this)&&(this.options.enabled=!1),f(this.options.blacklistPage,location.pathname)&&(this.options.enabled=!1),f(this.options.whitelistPage,location.pathname)&&(this.options.enabled=!0);var s=this.options.window.replace("{{classes}}",l.call(this).join(" ")).replace("{{children}}",c.call(this)),i=this.options.overrideHTML;if("string"==typeof i&&i.length&&(s=i),this.options["static"]){var n=p.call(this,'<div class="cc-grower">'+s+"</div>");n.style.display="",this.element=n.firstChild,this.element.style.display="none",e.addClass(this.element,"cc-invisible")}else this.element=p.call(this,s);m.call(this),y.call(this),this.options.autoOpen&&this.autoOpen()},i.prototype.destroy=function(){this.onButtonClick&&this.element&&(this.element.removeEventListener("click",this.onButtonClick),this.onButtonClick=null),this.dismissTimeout&&(clearTimeout(this.dismissTimeout),this.dismissTimeout=null),this.onWindowScroll&&(window.removeEventListener("scroll",this.onWindowScroll),this.onWindowScroll=null),this.onMouseMove&&(window.removeEventListener("mousemove",this.onMouseMove),this.onMouseMove=null),this.element&&this.element.parentNode&&this.element.parentNode.removeChild(this.element),this.element=null,this.revokeBtn&&this.revokeBtn.parentNode&&this.revokeBtn.parentNode.removeChild(this.revokeBtn),this.revokeBtn=null,g(this.options.palette),this.options=null},i.prototype.open=function(){if(this.element)return this.isOpen()||(t.hasTransition?this.fadeIn():this.element.style.display="",this.options.revokable&&this.toggleRevokeButton(),this.options.onPopupOpen.call(this)),this},i.prototype.close=function(e){if(this.element)return this.isOpen()&&(t.hasTransition?this.fadeOut():this.element.style.display="none",e&&this.options.revokable&&this.toggleRevokeButton(!0),this.options.onPopupClose.call(this)),this},i.prototype.fadeIn=function(){var s=this.element;if(t.hasTransition&&s&&(this.afterTransition&&o.call(this,s),e.hasClass(s,"cc-invisible"))){if(s.style.display="",this.options["static"]){var i=this.element.clientHeight;this.element.parentNode.style.maxHeight=i+"px"}this.openingTimeout=setTimeout(n.bind(this,s),20)}},i.prototype.fadeOut=function(){var s=this.element;t.hasTransition&&s&&(this.openingTimeout&&(clearTimeout(this.openingTimeout),n.bind(this,s)),e.hasClass(s,"cc-invisible")||(this.options["static"]&&(this.element.parentNode.style.maxHeight=""),this.afterTransition=o.bind(this,s),s.addEventListener(t.transitionEnd,this.afterTransition),e.addClass(s,"cc-invisible")))},i.prototype.isOpen=function(){return this.element&&""==this.element.style.display&&(!t.hasTransition||!e.hasClass(this.element,"cc-invisible"))},i.prototype.toggleRevokeButton=function(t){this.revokeBtn&&(this.revokeBtn.style.display=t?"":"none")},i.prototype.revokeChoice=function(t){this.options.enabled=!0,this.clearStatus(),this.options.onRevokeChoice.call(this),t||this.autoOpen()},i.prototype.hasAnswered=function(){return Object.keys(t.status).indexOf(this.getStatus())>=0},i.prototype.hasConsented=function(){var e=this.getStatus();return e==t.status.allow||e==t.status.dismiss},i.prototype.autoOpen=function(){!this.hasAnswered()&&this.options.enabled&&this.open()},i.prototype.setStatus=function(s){var i=this.options.cookie,n=e.getCookie(i.name),o=Object.keys(t.status).indexOf(n)>=0;Object.keys(t.status).indexOf(s)>=0?(e.setCookie(i.name,s,i.expiryDays,i.domain,i.path),this.options.onStatusChange.call(this,s,o)):this.clearStatus()},i.prototype.getStatus=function(){return e.getCookie(this.options.cookie.name)},i.prototype.clearStatus=function(){var t=this.options.cookie;e.setCookie(t.name,"",-1,t.domain,t.path)},i}(),t.Location=function(){function t(t){e.deepExtend(this.options={},o),e.isPlainObject(t)&&e.deepExtend(this.options,t),this.currentServiceIndex=-1}function s(t,e,s){var i,n=document.createElement("script");n.type="text/"+(t.type||"javascript"),n.src=t.src||t,n.async=!1,n.onreadystatechange=n.onload=function(){var t=n.readyState;clearTimeout(i),e.done||t&&!/loaded|complete/.test(t)||(e.done=!0,e(),n.onreadystatechange=n.onload=null)},document.body.appendChild(n),i=setTimeout(function(){e.done=!0,e(),n.onreadystatechange=n.onload=null},s)}function i(t,e,s,i,n){var o=new(window.XMLHttpRequest||window.ActiveXObject)("MSXML2.XMLHTTP.3.0");if(o.open(i?"POST":"GET",t,1),o.setRequestHeader("X-Requested-With","XMLHttpRequest"),o.setRequestHeader("Content-type","application/x-www-form-urlencoded"),Array.isArray(n))for(var a=0,r=n.length;a<r;++a){var l=n[a].split(":",2);o.setRequestHeader(l[0].replace(/^\s+|\s+$/g,""),l[1].replace(/^\s+|\s+$/g,""))}"function"==typeof e&&(o.onreadystatechange=function(){o.readyState>3&&e(o)}),o.send(i)}function n(t){return new Error("Error ["+(t.code||"UNKNOWN")+"]: "+t.error)}var o={timeout:5e3,services:["freegeoip","ipinfo","maxmind"],serviceDefinitions:{freegeoip:function(){return{url:"//freegeoip.net/json/?callback={callback}",isScript:!0,callback:function(t,e){try{var s=JSON.parse(e);return s.error?n(s):{code:s.country_code}}catch(t){return n({error:"Invalid response ("+t+")"})}}}},ipinfo:function(){return{url:"//ipinfo.io",headers:["Accept: application/json"],callback:function(t,e){try{var s=JSON.parse(e);return s.error?n(s):{code:s.country}}catch(t){return n({error:"Invalid response ("+t+")"})}}}},ipinfodb:function(){return{url:"//api.ipinfodb.com/v3/ip-country/?key={api_key}&format=json&callback={callback}",isScript:!0,callback:function(t,e){try{var s=JSON.parse(e);return"ERROR"==s.statusCode?n({error:s.statusMessage}):{code:s.countryCode}}catch(t){return n({error:"Invalid response ("+t+")"})}}}},maxmind:function(){return{url:"//js.maxmind.com/js/apis/geoip2/v2.1/geoip2.js",isScript:!0,callback:function(t){return window.geoip2?void geoip2.country(function(e){try{t({code:e.country.iso_code})}catch(e){t(n(e))}},function(e){t(n(e))}):void t(new Error("Unexpected response format. The downloaded script should have exported `geoip2` to the global scope"))}}}}};return t.prototype.getNextService=function(){var t;do{t=this.getServiceByIdx(++this.currentServiceIndex)}while(this.currentServiceIndex<this.options.services.length&&!t);return t},t.prototype.getServiceByIdx=function(t){var s=this.options.services[t];if("function"==typeof s){var i=s();return i.name&&e.deepExtend(i,this.options.serviceDefinitions[i.name](i)),i}return"string"==typeof s?this.options.serviceDefinitions[s]():e.isPlainObject(s)?this.options.serviceDefinitions[s.name](s):null},t.prototype.locate=function(t,e){var s=this.getNextService();return s?(this.callbackComplete=t,this.callbackError=e,void this.runService(s,this.runNextServiceOnError.bind(this))):void e(new Error("No services to run"))},t.prototype.setupUrl=function(t){var e=this.getCurrentServiceOpts();return t.url.replace(/\{(.*?)\}/g,function(s,i){if("callback"===i){var n="callback"+Date.now();return window[n]=function(e){t.__JSONP_DATA=JSON.stringify(e)},n}if(i in e.interpolateUrl)return e.interpolateUrl[i]})},t.prototype.runService=function(t,e){var n=this;if(t&&t.url&&t.callback){(t.isScript?s:i)(this.setupUrl(t),function(s){var i=s?s.responseText:"";t.__JSONP_DATA&&(i=t.__JSONP_DATA,delete t.__JSONP_DATA),n.runServiceCallback.call(n,e,t,i)},this.options.timeout,t.data,t.headers)}},t.prototype.runServiceCallback=function(t,e,s){var i=this,n=function(e){o||i.onServiceResult.call(i,t,e)},o=e.callback(n,s);o&&this.onServiceResult.call(this,t,o)},t.prototype.onServiceResult=function(t,e){e instanceof Error||e&&e.error?t.call(this,e,null):t.call(this,null,e)},t.prototype.runNextServiceOnError=function(t,e){if(t){this.logError(t);var s=this.getNextService();s?this.runService(s,this.runNextServiceOnError.bind(this)):this.completeService.call(this,this.callbackError,new Error("All services failed"))}else this.completeService.call(this,this.callbackComplete,e)},t.prototype.getCurrentServiceOpts=function(){var t=this.options.services[this.currentServiceIndex];return"string"==typeof t?{name:t}:"function"==typeof t?t():e.isPlainObject(t)?t:{}},t.prototype.completeService=function(t,e){this.currentServiceIndex=-1,t&&t(e)},t.prototype.logError=function(t){var e=this.currentServiceIndex,s=this.getServiceByIdx(e);console.error("The service["+e+"] ("+s.url+") responded with the following error",t)},t}(),t.Law=function(){function t(){this.initialise.apply(this,arguments)}var s={regionalLaw:!0,hasLaw:["AT","BE","BG","HR","CZ","CY","DK","EE","FI","FR","DE","EL","HU","IE","IT","LV","LT","LU","MT","NL","PL","PT","SK","SI","ES","SE","GB","UK"],revokable:["HR","CY","DK","EE","FR","DE","LV","LT","NL","PT","ES"],explicitAction:["HR","IT","ES"]};return t.prototype.initialise=function(t){e.deepExtend(this.options={},s),e.isPlainObject(t)&&e.deepExtend(this.options,t)},t.prototype.get=function(t){var e=this.options;return{hasLaw:e.hasLaw.indexOf(t)>=0,revokable:e.revokable.indexOf(t)>=0,explicitAction:e.explicitAction.indexOf(t)>=0}},t.prototype.applyLaw=function(t,e){var s=this.get(e);return s.hasLaw||(t.enabled=!1),this.options.regionalLaw&&(s.revokable&&(t.revokable=!0),s.explicitAction&&(t.dismissOnScroll=!1,t.dismissOnTimeout=!1)),t},t}(),t.initialise=function(e,s,i){var n=new t.Law(e.law);s||(s=function(){}),i||(i=function(){}),t.getCountryCode(e,function(i){delete e.law,delete e.location,i.code&&(e=n.applyLaw(e,i.code)),s(new t.Popup(e))},function(s){delete e.law,delete e.location,i(s,new t.Popup(e))})},t.getCountryCode=function(e,s,i){if(e.law&&e.law.countryCode)return void s({code:e.law.countryCode});if(e.location){return void new t.Location(e.location).locate(function(t){s(t||{})},i)}s({})},t.utils=e,t.hasInitialised=!0,window.cookieconsent=t}}(window.cookieconsent||{}),function(t){"use strict";var e;e={slippryWrapper:'<div class="sy-box" />',slideWrapper:'<div class="sy-slides-wrap" />',slideCrop:'<div class="sy-slides-crop" />',boxClass:"sy-list",elements:"li",activeClass:"sy-active",fillerClass:"sy-filler",loadingClass:"sy-loading",adaptiveHeight:!0,start:1,loop:!0,captionsSrc:"img",captions:"overlay",captionsEl:".sy-caption",initSingle:!0,responsive:!0,preload:"visible",pager:!0,pagerClass:"sy-pager",controls:!0,controlClass:"sy-controls",prevClass:"sy-prev",prevText:"Previous",nextClass:"sy-next",nextText:"Next",hideOnEnd:!0,transition:"fade",kenZoom:120,slideMargin:0,transClass:"transition",speed:800,easing:"swing",continuous:!0,useCSS:!0,auto:!0,autoDirection:"next",autoHover:!0,autoHoverDelay:100,autoDelay:500,pause:4e3,onSliderLoad:function(){return this},onSlideBefore:function(){return this},onSlideAfter:function(){return this}},t.fn.slippry=function(s){var i,n,o,a,r,l,c,p,u,d,v,h,g,f,m,y,b,k,C,S,w,x,E,T;return n=this,0===n.length?this:n.length>1?(n.each(function(){t(this).slippry(s)}),this):(i={},i.vars={},v=function(){var t,e,s;e=document.createElement("div"),s={WebkitTransition:"webkitTransitionEnd",MozTransition:"transitionend",MSTransition:"msTransitionEnd",OTransition:"oTransitionEnd",transition:"transitionEnd transitionend"};for(t in s)if(void 0!==e.style[t])return s[t]},S=function(){var t=document.createElement("div"),e=["Khtml","Ms","O","Moz","Webkit"],s=e.length;return function(i){if(i in t.style)return!0;for(i=i.replace(/^[a-z]/,function(t){return t.toUpperCase()});s--;)if(e[s]+i in t.style)return!0;return!1}}(),E=function(e,s){var i,n,o,a;return i=s.split("."),n=t(e),o="",a="",t.each(i,function(t,e){e.indexOf("#")>=0?o+=e.replace(/^#/,""):a+=e+" "}),o.length&&n.attr("id",o),a.length&&n.attr("class",t.trim(a)),n},T=function(){var t,e,s,n;s={},n={},t=100-i.settings.kenZoom,n.width=i.settings.kenZoom+"%",i.vars.active.index()%2==0?(n.left=t+"%",n.top=t+"%",s.left="0%",s.top="0%"):(n.left="0%",n.top="0%",s.left=t+"%",s.top=t+"%"),e=i.settings.pause+2*i.settings.speed,i.vars.active.css(n),i.vars.active.animate(s,{duration:e,easing:i.settings.easing,queue:!1})},u=function(){i.vars.fresh?(i.vars.slippryWrapper.removeClass(i.settings.loadingClass),i.vars.fresh=!1,i.settings.auto&&n.startAuto(),i.settings.useCSS||"kenburns"!==i.settings.transition||T(),i.settings.onSliderLoad.call(void 0,i.vars.active.index())):t("."+i.settings.fillerClass,i.vars.slideWrapper).addClass("ready")},f=function(e,s){var n,o,a;n=e/s,o=1/n*100+"%",a=t("."+i.settings.fillerClass,i.vars.slideWrapper),a.css({paddingTop:o}),u()},a=function(e){var s,i;void 0!==t("img",e).attr("src")?t("<img />").on("load",function(){s=e.width(),i=e.height(),f(s,i)}).attr("src",t("img",e).attr("src")):(s=e.width(),i=e.height(),f(s,i))},o=function(){if(0===t("."+i.settings.fillerClass,i.vars.slideWrapper).length&&i.vars.slideWrapper.append(t('<div class="'+i.settings.fillerClass+'" />')),!0===i.settings.adaptiveHeight)a(t("."+i.settings.activeClass,n));else{var e,s,o;s=0,o=0,t(i.vars.slides).each(function(){t(this).height()>s&&(e=t(this),s=e.height()),(o+=1)===i.vars.count&&(void 0===e&&(e=t(t(i.vars.slides)[0])),a(e))})}},g=function(){i.settings.pager&&(t("."+i.settings.pagerClass+" li",i.vars.slippryWrapper).removeClass(i.settings.activeClass),t(t("."+i.settings.pagerClass+" li",i.vars.slippryWrapper)[i.vars.active.index()]).addClass(i.settings.activeClass))},k=function(){!i.settings.loop&&i.settings.hideOnEnd&&(t("."+i.settings.prevClass,i.vars.slippryWrapper)[i.vars.first?"hide":"show"](),t("."+i.settings.nextClass,i.vars.slippryWrapper)[i.vars.last?"hide":"show"]())},l=function(){var e,s;!1!==i.settings.captions&&(e="img"!==i.settings.captionsSrc?i.vars.active.attr("title"):void 0!==t("img",i.vars.active).attr("title")?t("img",i.vars.active).attr("title"):t("img",i.vars.active).attr("alt"),s="custom"!==i.settings.captions?t(i.settings.captionsEl,i.vars.slippryWrapper):t(i.settings.captionsEl),void 0!==e&&""!==e?s.html(e).show():s.hide())},n.startAuto=function(){void 0===i.vars.timer&&void 0===i.vars.delay&&(i.vars.delay=window.setTimeout(function(){i.vars.autodelay=!1,i.vars.timer=window.setInterval(function(){i.vars.trigger="auto",b(i.settings.autoDirection)},i.settings.pause)},i.vars.autodelay?i.settings.autoHoverDelay:i.settings.autoDelay),i.settings.autoHover&&i.vars.slideWrapper.unbind("mouseenter").unbind("mouseleave").bind("mouseenter",function(){void 0!==i.vars.timer?(i.vars.hoverStop=!0,n.stopAuto()):i.vars.hoverStop=!1}).bind("mouseleave",function(){i.vars.hoverStop&&(i.vars.autodelay=!0,n.startAuto())}))},n.stopAuto=function(){window.clearInterval(i.vars.timer),i.vars.timer=void 0,window.clearTimeout(i.vars.delay),i.vars.delay=void 0},n.refresh=function(){i.vars.slides.removeClass(i.settings.activeClass),i.vars.active.addClass(i.settings.activeClass),i.settings.responsive?o():u(),k(),g(),l()},y=function(){n.refresh()},d=function(){i.vars.moving=!1,i.vars.active.removeClass(i.settings.transClass),i.vars.fresh||i.vars.old.removeClass("sy-ken"),i.vars.old.removeClass(i.settings.transClass),i.settings.onSlideAfter.call(void 0,i.vars.active,i.vars.old.index(),i.vars.active.index()),i.settings.auto&&(i.vars.hoverStop&&void 0!==i.vars.hoverStop||n.startAuto())},m=function(){var e,s,o,a,r,l,c;i.settings.onSlideBefore.call(void 0,i.vars.active,i.vars.old.index(),i.vars.active.index()),!1!==i.settings.transition?(i.vars.moving=!0,"fade"===i.settings.transition||"kenburns"===i.settings.transition?(i.vars.fresh?(i.settings.useCSS?i.vars.slides.css({transitionDuration:i.settings.speed+"ms",opacity:0}):i.vars.slides.css({opacity:0}),i.vars.active.css("opacity",1),"kenburns"===i.settings.transition&&i.settings.useCSS&&(r=i.settings.pause+2*i.settings.speed,i.vars.slides.css({animationDuration:r+"ms"}),i.vars.active.addClass("sy-ken")),d()):i.settings.useCSS?(i.vars.old.addClass(i.settings.transClass).css("opacity",0),i.vars.active.addClass(i.settings.transClass).css("opacity",1),"kenburns"===i.settings.transition&&i.vars.active.addClass("sy-ken"),t(window).off("focus").on("focus",function(){i.vars.moving&&i.vars.old.trigger(i.vars.transition)}),i.vars.old.one(i.vars.transition,function(){return d(),this})):("kenburns"===i.settings.transition&&T(),i.vars.old.addClass(i.settings.transClass).animate({opacity:0},i.settings.speed,i.settings.easing,function(){d()}),i.vars.active.addClass(i.settings.transClass).css("opacity",0).animate({opacity:1},i.settings.speed,i.settings.easing)),y()):("horizontal"===i.settings.transition||"vertical"===i.settings.transition)&&(l="horizontal"===i.settings.transition?"left":"top",e="-"+i.vars.active.index()*(100+i.settings.slideMargin)+"%",i.vars.fresh?(n.css(l,e),d()):(c={},i.settings.continuous&&(!i.vars.jump||"controls"!==i.vars.trigger&&"auto"!==i.vars.trigger||(s=!0,a=e,i.vars.first?(o=0,i.vars.active.css(l,i.vars.count*(100+i.settings.slideMargin)+"%"),e="-"+i.vars.count*(100+i.settings.slideMargin)+"%"):(o=(i.vars.count-1)*(100+i.settings.slideMargin)+"%",i.vars.active.css(l,-(100+i.settings.slideMargin)+"%"),e=100+i.settings.slideMargin+"%"))),i.vars.active.addClass(i.settings.transClass),i.settings.useCSS?(c[l]=e,c.transitionDuration=i.settings.speed+"ms",n.addClass(i.settings.transition),n.css(c),t(window).off("focus").on("focus",function(){i.vars.moving&&n.trigger(i.vars.transition)}),n.one(i.vars.transition,function(){return n.removeClass(i.settings.transition),s&&(i.vars.active.css(l,o),c[l]=a,c.transitionDuration="0ms",n.css(c)),d(),this})):(c[l]=e,n.stop().animate(c,i.settings.speed,i.settings.easing,function(){return s&&(i.vars.active.css(l,o),n.css(l,a)),d(),this}))),y())):(y(),d())},C=function(t){i.vars.first=i.vars.last=!1,"prev"===t||0===t?i.vars.first=!0:("next"===t||t===i.vars.count-1)&&(i.vars.last=!0)},b=function(e){var s,o;i.vars.moving||("auto"!==i.vars.trigger&&n.stopAuto(),s=i.vars.active.index(),"prev"===e?(o=e,s>0?e=s-1:i.settings.loop&&(e=i.vars.count-1)):"next"===e?(o=e,s<i.vars.count-1?e=s+1:i.settings.loop&&(e=0)):(e-=1,o=s>e?"prev":"next"),i.vars.jump=!1,"prev"===e||"next"===e||e===s&&!i.vars.fresh||(C(e),i.vars.old=i.vars.active,i.vars.active=t(i.vars.slides[e]),(0===s&&"prev"===o||s===i.vars.count-1&&"next"===o)&&(i.vars.jump=!0),m()))},n.goToSlide=function(t){i.vars.trigger="external",b(t)},n.goToNextSlide=function(){i.vars.trigger="external",b("next")},n.goToPrevSlide=function(){i.vars.trigger="external",b("prev")},c=function(){if(i.settings.pager&&i.vars.count>1){var e,s,n;for(e=i.vars.slides.length,n=t('<ul class="'+i.settings.pagerClass+'" />'),s=1;e+1>s;s+=1)n.append(t("<li />").append(t('<a href="#'+s+'">'+s+"</a>")));i.vars.slippryWrapper.append(n),t("."+i.settings.pagerClass+" a",i.vars.slippryWrapper).click(function(){return i.vars.trigger="pager",b(parseInt(this.hash.split("#")[1],10)),!1}),g()}},p=function(){i.settings.controls&&i.vars.count>1&&(i.vars.slideWrapper.append(t('<ul class="'+i.settings.controlClass+'" />').append('<li class="'+i.settings.prevClass+'"><a href="#prev">'+i.settings.prevText+"</a></li>").append('<li class="'+i.settings.nextClass+'"><a href="#next">'+i.settings.nextText+"</a></li>")),t("."+i.settings.controlClass+" a",i.vars.slippryWrapper).click(function(){return i.vars.trigger="controls",b(this.hash.split("#")[1]),!1}),k())},h=function(){!1!==i.settings.captions&&("overlay"===i.settings.captions?i.vars.slideWrapper.append(t('<div class="sy-caption-wrap" />').html(E("<div />",i.settings.captionsEl))):"below"===i.settings.captions&&i.vars.slippryWrapper.append(t('<div class="sy-caption-wrap" />').html(E("<div />",i.settings.captionsEl))))},x=function(){b(i.vars.active.index()+1)},w=function(e){var s,n,o,a;return a="all"===i.settings.preload?e:i.vars.active,o=t("img, iframe",a),s=o.length,0===s?void x():(n=0,void o.each(function(){t(this).one("load error",function(){++n===s&&x()}).each(function(){this.complete&&t(this).trigger("load")})}))},n.getCurrentSlide=function(){return i.vars.active},n.getSlideCount=function(){return i.vars.count},n.destroySlider=function(){!1===i.vars.fresh&&(n.stopAuto(),i.vars.moving=!1,i.vars.slides.each(function(){void 0!==t(this).data("sy-cssBckup")?t(this).attr("style",t(this).data("sy-cssBckup")):t(this).removeAttr("style"),void 0!==t(this).data("sy-classBckup")?t(this).attr("class",t(this).data("sy-classBckup")):t(this).removeAttr("class")}),void 0!==n.data("sy-cssBckup")?n.attr("style",n.data("sy-cssBckup")):n.removeAttr("style"),void 0!==n.data("sy-classBckup")?n.attr("class",n.data("sy-classBckup")):n.removeAttr("class"),i.vars.slippryWrapper.before(n),i.vars.slippryWrapper.remove(),i.vars.fresh=void 0)},n.reloadSlider=function(){n.destroySlider(),r()},r=function(){var o;return i.settings=t.extend({},e,s),i.vars.slides=t(i.settings.elements,n),i.vars.count=i.vars.slides.length,i.settings.useCSS&&(S("transition")||(i.settings.useCSS=!1),i.vars.transition=v()),n.data("sy-cssBckup",n.attr("style")),n.data("sy-classBackup",n.attr("class")),n.addClass(i.settings.boxClass).wrap(i.settings.slippryWrapper).wrap(i.settings.slideWrapper).wrap(i.settings.slideCrop),i.vars.slideWrapper=n.parent().parent(),i.vars.slippryWrapper=i.vars.slideWrapper.parent().addClass(i.settings.loadingClass),i.vars.fresh=!0,i.vars.slides.each(function(){t(this).addClass("sy-slide "+i.settings.transition),i.settings.useCSS&&t(this).addClass("useCSS"),"horizontal"===i.settings.transition?t(this).css("left",t(this).index()*(100+i.settings.slideMargin)+"%"):"vertical"===i.settings.transition&&t(this).css("top",t(this).index()*(100+i.settings.slideMargin)+"%")}),i.vars.count>1||i.settings.initSingle?(-1===t("."+i.settings.activeClass,n).index()?(o="random"===i.settings.start?Math.round(Math.random()*(i.vars.count-1)):i.settings.start>0&&i.settings.start<=i.vars.count?i.settings.start-1:0,i.vars.active=t(i.vars.slides[o]).addClass(i.settings.activeClass)):i.vars.active=t("."+i.settings.activeClass,n),p(),c(),h(),void w(i.vars.slides)):this},r(),this)}}(jQuery),jQuery(document).ready(function(){jQuery("#slippry-demo").slippry({slippryWrapper:'<div class="sy-box front-page" />'}),jQuery(".button-link.download, .button-link.github-download").click(function(){ga("send","event","Download","Click","Slippry(zip)")}),jQuery(".github-link").click(function(){ga("send","event","Github","Click","Ribbon")}),jQuery("#out-of-the-box-demo").slippry(),jQuery("#settings-jump a:not(#select-setting)").click(function(t){t.preventDefault(),smoothScroll(this)}),jQuery("#front-link").click(function(t){t.preventDefault(),smoothScroll(this)}),jQuery("#pictures-demo").slippry({slippryWrapper:'<div class="sy-box pictures-slider" />',adaptiveHeight:!1,captions:!1,pager:!1,controls:!1,autoHover:!1,transition:"kenburns",kenZoom:140,speed:2e3}),jQuery("#portfolio-demo").slippry({slippryWrapper:'<div class="sy-box portfolio-slider" />',
adaptiveHeight:!1,start:"random",loop:!1,captionsSrc:"li",captions:"custom",captionsEl:".external-captions",transition:"fade",easing:"linear",continuous:!1,auto:!1}),jQuery("#news-demo").slippry({slippryWrapper:'<div class="sy-box news-slider" />',elements:"article",adaptiveHeight:!1,captions:!1,pagerClass:"news-pager",transition:"horizontal",speed:1200,pause:8e3,autoDirection:"prev"}),jQuery("#shop-demo").slippry({slippryWrapper:'<div class="sy-box shop-slider" />',elements:"article",adaptiveHeight:!1,start:2,loop:!1,captionsSrc:"article",captions:"custom",captionsEl:".product-name",pager:!1,slideMargin:20,useCSS:!0,transition:"horizontal",auto:!1});var t=jQuery("#thumbnails").slippry({slippryWrapper:'<div class="sy-box thumbnails" />',transition:"horizontal",pager:!1,auto:!1,onSlideBefore:function(t,e,s){jQuery(".thumbs a img").removeClass("active"),jQuery("img",jQuery(".thumbs a")[s]).addClass("active")}});jQuery(".thumbs a").click(function(){return t.goToSlide($(this).data("slide")),!1}),jQuery("#css-demo").slippry({slippryWrapper:'<div class="sy-box css-demo" />',adaptiveHeight:!0,useCSS:!0,autoHover:!1,transition:"horizontal"}),jQuery("#jquery-demo").slippry({slippryWrapper:'<div class="sy-box jquery-demo" />',adaptiveHeight:!1,useCSS:!1,autoHover:!1,transition:"horizontal"}),jQuery("#select-setting").click(function(){return jQuery("#settings-jump").hasClass("open")?jQuery("#settings-jump").switchClass("open","closed",1e3):jQuery("#settings-jump").hasClass("closed")&&jQuery("#settings-jump").switchClass("closed","open",1e3),!1}),jQuery("#settings-jump a").click(function(){jQuery("#settings-jump").hasClass("open")&&jQuery("#settings-jump").switchClass("open","closed",1e3)})});