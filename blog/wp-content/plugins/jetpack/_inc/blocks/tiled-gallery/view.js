!function(t,e){for(var n in e)t[n]=e[n]}(window,function(t){var e={};function n(r){if(e[r])return e[r].exports;var i=e[r]={i:r,l:!1,exports:{}};return t[r].call(i.exports,i,i.exports,n),i.l=!0,i.exports}return n.m=t,n.c=e,n.d=function(t,e,r){n.o(t,e)||Object.defineProperty(t,e,{enumerable:!0,get:r})},n.r=function(t){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(t,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(t,"__esModule",{value:!0})},n.t=function(t,e){if(1&e&&(t=n(t)),8&e)return t;if(4&e&&"object"==typeof t&&t&&t.__esModule)return t;var r=Object.create(null);if(n.r(r),Object.defineProperty(r,"default",{enumerable:!0,value:t}),2&e&&"string"!=typeof t)for(var i in t)n.d(r,i,function(e){return t[e]}.bind(null,i));return r},n.n=function(t){var e=t&&t.__esModule?function(){return t.default}:function(){return t};return n.d(e,"a",e),e},n.o=function(t,e){return Object.prototype.hasOwnProperty.call(t,e)},n.p="",n(n.s=520)}({114:function(t,e,n){"use strict";n.d(e,"b",(function(){return u})),n.d(e,"a",(function(){return c}));var r=n(9),i=n.n(r),o=n(28);function a(t,e){var n=(e-t.reduce((function(t,e){return t+e}),0))/t.length;return t.map((function(t){return t+n}))}function u(t,e){return function(t,e,n){var r=i()(e,2),u=r[0],c=r[1],d=1/u*(n-o.b*(t.childElementCount-1)-c);return function(t,e){var n=e.rawHeight,r=e.rowWidth,i=s(t),u=i.map((function(t){return(n-o.b*(t.childElementCount-1))*l(t)[0]})),c=a(u,r);return i.forEach((function(t,e){var r=u[e],i=c[e];!function(t,e){var n=e.colHeight,r=e.width,i=e.rawWidth,o=a(f(t).map((function(t){return i/h(t)})),n);Array.from(t.children).forEach((function(t,e){var n=o[e];t.setAttribute("style","height:".concat(n,"px;width:").concat(r,"px;"))}))}(t,{colHeight:n-o.b*(t.childElementCount-1),width:i,rawWidth:r})})),c.map((function(t){return parseFloat(t/r*100).toFixed(5)}))}(t,{rawHeight:d,rowWidth:n-o.b*(t.childElementCount-1)})}(t,function(t){return s(t).map(l).reduce((function(t,e){var n=i()(t,2),r=n[0],o=n[1],a=i()(e,2);return[r+a[0],o+a[1]]}),[0,0])}(t),e)}function c(t){return Array.from(t.querySelectorAll(".tiled-gallery__row"))}function s(t){return Array.from(t.querySelectorAll(".tiled-gallery__col"))}function f(t){return Array.from(t.querySelectorAll(".tiled-gallery__item > img, .tiled-gallery__item > a > img"))}function l(t){var e=f(t),n=e.length,r=1/e.map(h).reduce((function(t,e){return t+1/e}),0);return[r,r*n||1]}function h(t){var e=parseInt(t.dataset.width,10),n=parseInt(t.dataset.height,10);return e&&!Number.isNaN(e)&&n&&!Number.isNaN(n)?e/n:1}},115:function(t,e){t.exports=function(t){if(Array.isArray(t))return t}},116:function(t,e){t.exports=function(t,e){if("undefined"!=typeof Symbol&&Symbol.iterator in Object(t)){var n=[],_n=!0,r=!1,i=void 0;try{for(var o,a=t[Symbol.iterator]();!(_n=(o=a.next()).done)&&(n.push(o.value),!e||n.length!==e);_n=!0);}catch(u){r=!0,i=u}finally{try{_n||null==a.return||a.return()}finally{if(r)throw i}}return n}}},117:function(t,e){t.exports=function(){throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}},28:function(t,e,n){"use strict";n.d(e,"a",(function(){return r})),n.d(e,"b",(function(){return i})),n.d(e,"h",(function(){return o})),n.d(e,"i",(function(){return a})),n.d(e,"j",(function(){return u})),n.d(e,"c",(function(){return c})),n.d(e,"d",(function(){return s})),n.d(e,"e",(function(){return f})),n.d(e,"f",(function(){return l})),n.d(e,"g",(function(){return h}));var r=["image"],i=4,o=20,a=20,u=2e3,c="circle",s="columns",f="rectangular",l="square",h=[{isDefault:!0,name:f},{name:c},{name:l},{name:s}]},48:function(t,e,n){"object"==typeof window&&window.Jetpack_Block_Assets_Base_Url&&window.Jetpack_Block_Assets_Base_Url.url&&(n.p=window.Jetpack_Block_Assets_Base_Url.url)},52:function(t,e,n){"use strict";n.r(e);n(48)},520:function(t,e,n){n(52),t.exports=n(521)},521:function(t,e,n){"use strict";n.r(e);var r=n(65),i=n.n(r),o=n(57),a=n.n(o),u=(n(522),n(72)),c=n(114);function s(t){s.pendingRaf&&cancelAnimationFrame(s.pendingRaf),s.pendingRaf=requestAnimationFrame((function(){s.pendingRaf=null;var e,n=i()(t);try{var r=function(){var t=e.value,n=t.contentRect.width;Array.from(t.target.querySelectorAll(".tiled-gallery__row")).forEach((function(t){return Object(c.b)(t,n)}))};for(n.s();!(e=n.n()).done;)r()}catch(o){n.e(o)}finally{n.f()}}))}"undefined"!=typeof window&&a()((function(){var t=Array.from(document.querySelectorAll(".wp-block-jetpack-tiled-gallery.is-style-rectangular > .tiled-gallery__gallery,.wp-block-jetpack-tiled-gallery.is-style-columns > .tiled-gallery__gallery"));if(0!==t.length){var e=new u.a(s);t.forEach((function(t){"true"!==t.getAttribute("data-jetpack-block-initialized")&&(e.observe(t),t.setAttribute("data-jetpack-block-initialized","true"))}))}}))},522:function(t,e,n){},57:function(t,e){t.exports=window.wp.domReady},65:function(t,e,n){var r=n(75);t.exports=function(t,e){var n;if("undefined"==typeof Symbol||null==t[Symbol.iterator]){if(Array.isArray(t)||(n=r(t))||e&&t&&"number"==typeof t.length){n&&(t=n);var i=0,o=function(){};return{s:o,n:function(){return i>=t.length?{done:!0}:{done:!1,value:t[i++]}},e:function(t){throw t},f:o}}throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}var a,u=!0,c=!1;return{s:function(){n=t[Symbol.iterator]()},n:function(){var t=n.next();return u=t.done,t},e:function(t){c=!0,a=t},f:function(){try{u||null==n.return||n.return()}finally{if(c)throw a}}}}},72:function(t,e,n){"use strict";var r=function(){if("undefined"!=typeof Map)return Map;function t(t,e){var n=-1;return t.some((function(t,r){return t[0]===e&&(n=r,!0)})),n}return function(){function e(){this.__entries__=[]}return Object.defineProperty(e.prototype,"size",{get:function(){return this.__entries__.length},enumerable:!0,configurable:!0}),e.prototype.get=function(e){var n=t(this.__entries__,e),r=this.__entries__[n];return r&&r[1]},e.prototype.set=function(e,n){var r=t(this.__entries__,e);~r?this.__entries__[r][1]=n:this.__entries__.push([e,n])},e.prototype.delete=function(e){var n=this.__entries__,r=t(n,e);~r&&n.splice(r,1)},e.prototype.has=function(e){return!!~t(this.__entries__,e)},e.prototype.clear=function(){this.__entries__.splice(0)},e.prototype.forEach=function(t,e){void 0===e&&(e=null);for(var n=0,r=this.__entries__;n<r.length;n++){var i=r[n];t.call(e,i[1],i[0])}},e}()}(),i="undefined"!=typeof window&&"undefined"!=typeof document&&window.document===document,o="undefined"!=typeof window&&window.Math===Math?window:"undefined"!=typeof self&&self.Math===Math?self:"undefined"!=typeof window&&window.Math===Math?window:Function("return this")(),a="function"==typeof requestAnimationFrame?requestAnimationFrame.bind(o):function(t){return setTimeout((function(){return t(Date.now())}),1e3/60)};var u=["top","right","bottom","left","width","height","size","weight"],c="undefined"!=typeof MutationObserver,s=function(){function t(){this.connected_=!1,this.mutationEventsAdded_=!1,this.mutationsObserver_=null,this.observers_=[],this.onTransitionEnd_=this.onTransitionEnd_.bind(this),this.refresh=function(t,e){var n=!1,r=!1,i=0;function o(){n&&(n=!1,t()),r&&c()}function u(){a(o)}function c(){var t=Date.now();if(n){if(t-i<2)return;r=!0}else n=!0,r=!1,setTimeout(u,e);i=t}return c}(this.refresh.bind(this),20)}return t.prototype.addObserver=function(t){~this.observers_.indexOf(t)||this.observers_.push(t),this.connected_||this.connect_()},t.prototype.removeObserver=function(t){var e=this.observers_,n=e.indexOf(t);~n&&e.splice(n,1),!e.length&&this.connected_&&this.disconnect_()},t.prototype.refresh=function(){this.updateObservers_()&&this.refresh()},t.prototype.updateObservers_=function(){var t=this.observers_.filter((function(t){return t.gatherActive(),t.hasActive()}));return t.forEach((function(t){return t.broadcastActive()})),t.length>0},t.prototype.connect_=function(){i&&!this.connected_&&(document.addEventListener("transitionend",this.onTransitionEnd_),window.addEventListener("resize",this.refresh),c?(this.mutationsObserver_=new MutationObserver(this.refresh),this.mutationsObserver_.observe(document,{attributes:!0,childList:!0,characterData:!0,subtree:!0})):(document.addEventListener("DOMSubtreeModified",this.refresh),this.mutationEventsAdded_=!0),this.connected_=!0)},t.prototype.disconnect_=function(){i&&this.connected_&&(document.removeEventListener("transitionend",this.onTransitionEnd_),window.removeEventListener("resize",this.refresh),this.mutationsObserver_&&this.mutationsObserver_.disconnect(),this.mutationEventsAdded_&&document.removeEventListener("DOMSubtreeModified",this.refresh),this.mutationsObserver_=null,this.mutationEventsAdded_=!1,this.connected_=!1)},t.prototype.onTransitionEnd_=function(t){var e=t.propertyName,n=void 0===e?"":e;u.some((function(t){return!!~n.indexOf(t)}))&&this.refresh()},t.getInstance=function(){return this.instance_||(this.instance_=new t),this.instance_},t.instance_=null,t}(),f=function(t,e){for(var n=0,r=Object.keys(e);n<r.length;n++){var i=r[n];Object.defineProperty(t,i,{value:e[i],enumerable:!1,writable:!1,configurable:!0})}return t},l=function(t){return t&&t.ownerDocument&&t.ownerDocument.defaultView||o},h=_(0,0,0,0);function d(t){return parseFloat(t)||0}function p(t){for(var e=[],n=1;n<arguments.length;n++)e[n-1]=arguments[n];return e.reduce((function(e,n){return e+d(t["border-"+n+"-width"])}),0)}function v(t){var e=t.clientWidth,n=t.clientHeight;if(!e&&!n)return h;var r=l(t).getComputedStyle(t),i=function(t){for(var e={},n=0,r=["top","right","bottom","left"];n<r.length;n++){var i=r[n],o=t["padding-"+i];e[i]=d(o)}return e}(r),o=i.left+i.right,a=i.top+i.bottom,u=d(r.width),c=d(r.height);if("border-box"===r.boxSizing&&(Math.round(u+o)!==e&&(u-=p(r,"left","right")+o),Math.round(c+a)!==n&&(c-=p(r,"top","bottom")+a)),!function(t){return t===l(t).document.documentElement}(t)){var s=Math.round(u+o)-e,f=Math.round(c+a)-n;1!==Math.abs(s)&&(u-=s),1!==Math.abs(f)&&(c-=f)}return _(i.left,i.top,u,c)}var b="undefined"!=typeof SVGGraphicsElement?function(t){return t instanceof l(t).SVGGraphicsElement}:function(t){return t instanceof l(t).SVGElement&&"function"==typeof t.getBBox};function y(t){return i?b(t)?function(t){var e=t.getBBox();return _(0,0,e.width,e.height)}(t):v(t):h}function _(t,e,n,r){return{x:t,y:e,width:n,height:r}}var m=function(){function t(t){this.broadcastWidth=0,this.broadcastHeight=0,this.contentRect_=_(0,0,0,0),this.target=t}return t.prototype.isActive=function(){var t=y(this.target);return this.contentRect_=t,t.width!==this.broadcastWidth||t.height!==this.broadcastHeight},t.prototype.broadcastRect=function(){var t=this.contentRect_;return this.broadcastWidth=t.width,this.broadcastHeight=t.height,t},t}(),w=function(t,e){var n,r,i,o,a,u,c,s=(r=(n=e).x,i=n.y,o=n.width,a=n.height,u="undefined"!=typeof DOMRectReadOnly?DOMRectReadOnly:Object,c=Object.create(u.prototype),f(c,{x:r,y:i,width:o,height:a,top:i,right:r+o,bottom:a+i,left:r}),c);f(this,{target:t,contentRect:s})},g=function(){function t(t,e,n){if(this.activeObservations_=[],this.observations_=new r,"function"!=typeof t)throw new TypeError("The callback provided as parameter 1 is not a function.");this.callback_=t,this.controller_=e,this.callbackCtx_=n}return t.prototype.observe=function(t){if(!arguments.length)throw new TypeError("1 argument required, but only 0 present.");if("undefined"!=typeof Element&&Element instanceof Object){if(!(t instanceof l(t).Element))throw new TypeError('parameter 1 is not of type "Element".');var e=this.observations_;e.has(t)||(e.set(t,new m(t)),this.controller_.addObserver(this),this.controller_.refresh())}},t.prototype.unobserve=function(t){if(!arguments.length)throw new TypeError("1 argument required, but only 0 present.");if("undefined"!=typeof Element&&Element instanceof Object){if(!(t instanceof l(t).Element))throw new TypeError('parameter 1 is not of type "Element".');var e=this.observations_;e.has(t)&&(e.delete(t),e.size||this.controller_.removeObserver(this))}},t.prototype.disconnect=function(){this.clearActive(),this.observations_.clear(),this.controller_.removeObserver(this)},t.prototype.gatherActive=function(){var t=this;this.clearActive(),this.observations_.forEach((function(e){e.isActive()&&t.activeObservations_.push(e)}))},t.prototype.broadcastActive=function(){if(this.hasActive()){var t=this.callbackCtx_,e=this.activeObservations_.map((function(t){return new w(t.target,t.broadcastRect())}));this.callback_.call(t,e,t),this.clearActive()}},t.prototype.clearActive=function(){this.activeObservations_.splice(0)},t.prototype.hasActive=function(){return this.activeObservations_.length>0},t}(),O="undefined"!=typeof WeakMap?new WeakMap:new r,E=function t(e){if(!(this instanceof t))throw new TypeError("Cannot call a class as a function.");if(!arguments.length)throw new TypeError("1 argument required, but only 0 present.");var n=s.getInstance(),r=new g(e,n,this);O.set(this,r)};["observe","unobserve","disconnect"].forEach((function(t){E.prototype[t]=function(){var e;return(e=O.get(this))[t].apply(e,arguments)}}));var A=void 0!==o.ResizeObserver?o.ResizeObserver:E;e.a=A},75:function(t,e,n){var r=n(84);t.exports=function(t,e){if(t){if("string"==typeof t)return r(t,e);var n=Object.prototype.toString.call(t).slice(8,-1);return"Object"===n&&t.constructor&&(n=t.constructor.name),"Map"===n||"Set"===n?Array.from(t):"Arguments"===n||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)?r(t,e):void 0}}},84:function(t,e){t.exports=function(t,e){(null==e||e>t.length)&&(e=t.length);for(var n=0,r=new Array(e);n<e;n++)r[n]=t[n];return r}},9:function(t,e,n){var r=n(115),i=n(116),o=n(75),a=n(117);t.exports=function(t,e){return r(t)||i(t,e)||o(t,e)||a()}}}));