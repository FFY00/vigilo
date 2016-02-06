/*
Yb    dP 88  dP""b8 88 88      dP"Yb  
 Yb  dP  88 dP   `" 88 88     dP   Yb 
  YbdP   88 Yb  "88 88 88  .o Yb   dP  
   YP    88  YboodP 88 88ood8  YbodP   -js
*/
//If protocolis HTTP refresh href in HTTPS protocol
if (window.location.protocol != "https:")
    window.location.href = "https:" + window.location.href.substring(window.location.protocol.length);
//Check if jQuery library is included
if (!window['jQuery']) alert('The jQuery library must be included before the vigilo-js. The plugin will not work propery.');

//jquery smoothscroll
;(function($){var h=$.scrollTo=function(a,b,c){$(window).scrollTo(a,b,c)};h.defaults={axis:'xy',duration:parseFloat($.fn.jquery)>=1.3?0:1,limit:true};h.window=function(a){return $(window)._scrollable()};$.fn._scrollable=function(){return this.map(function(){var a=this,isWin=!a.nodeName||$.inArray(a.nodeName.toLowerCase(),['iframe','#document','html','body'])!=-1;if(!isWin)return a;var b=(a.contentWindow||a).document||a.ownerDocument||a;return/webkit/i.test(navigator.userAgent)||b.compatMode=='BackCompat'?b.body:b.documentElement})};$.fn.scrollTo=function(e,f,g){if(typeof f=='object'){g=f;f=0}if(typeof g=='function')g={onAfter:g};if(e=='max')e=9e9;g=$.extend({},h.defaults,g);f=f||g.duration;g.queue=g.queue&&g.axis.length>1;if(g.queue)f/=2;g.offset=both(g.offset);g.over=both(g.over);return this._scrollable().each(function(){if(e==null)return;var d=this,$elem=$(d),targ=e,toff,attr={},win=$elem.is('html,body');switch(typeof targ){case'number':case'string':if(/^([+-]=)?\d+(\.\d+)?(px|%)?$/.test(targ)){targ=both(targ);break}targ=$(targ,this);if(!targ.length)return;case'object':if(targ.is||targ.style)toff=(targ=$(targ)).offset()}$.each(g.axis.split(''),function(i,a){var b=a=='x'?'Left':'Top',pos=b.toLowerCase(),key='scroll'+b,old=d[key],max=h.max(d,a);if(toff){attr[key]=toff[pos]+(win?0:old-$elem.offset()[pos]);if(g.margin){attr[key]-=parseInt(targ.css('margin'+b))||0;attr[key]-=parseInt(targ.css('border'+b+'Width'))||0}attr[key]+=g.offset[pos]||0;if(g.over[pos])attr[key]+=targ[a=='x'?'width':'height']()*g.over[pos]}else{var c=targ[pos];attr[key]=c.slice&&c.slice(-1)=='%'?parseFloat(c)/100*max:c}if(g.limit&&/^\d+$/.test(attr[key]))attr[key]=attr[key]<=0?0:Math.min(attr[key],max);if(!i&&g.queue){if(old!=attr[key])animate(g.onAfterFirst);delete attr[key]}});animate(g.onAfter);function animate(a){$elem.animate(attr,f,g.easing,a&&function(){a.call(this,e,g)})}}).end()};h.max=function(a,b){var c=b=='x'?'Width':'Height',scroll='scroll'+c;if(!$(a).is('html,body'))return a[scroll]-$(a)[c.toLowerCase()]();var d='client'+c,html=a.ownerDocument.documentElement,body=a.ownerDocument.body;return Math.max(html[scroll],body[scroll])-Math.min(html[d],body[d])};function both(a){return typeof a=='object'?a:{top:a,left:a}}})(jQuery);
;(function(b){function g(a,e,d){var h=e.hash.slice(1),f=document.getElementById(h)||document.getElementsByName(h)[0];if(f){a&&a.preventDefault();var c=b(d.target);if(!(d.lock&&c.is(":animated")||d.onBefore&&!1===d.onBefore(a,f,c))){d.stop&&c._scrollable().stop(!0);if(d.hash){var a=f.id==h?"id":"name",g=b("<a> </a>").attr(a,h).css({position:"absolute",top:b(window).scrollTop(),left:b(window).scrollLeft()});f[a]="";b("body").prepend(g);location=e.hash;g.remove();f[a]=h}c.scrollTo(f,d).trigger("notify.serialScroll",
[f])}}}var i=location.href.replace(/#.*/,""),c=b.localScroll=function(a){b("body").localScroll(a)};c.defaults={duration:1E3,axis:"y",event:"click",stop:!0,target:window,reset:!0};c.hash=function(a){if(location.hash){a=b.extend({},c.defaults,a);a.hash=!1;if(a.reset){var e=a.duration;delete a.duration;b(a.target).scrollTo(0,a);a.duration=e}g(0,location,a)}};b.fn.localScroll=function(a){function e(){return!!this.href&&!!this.hash&&this.href.replace(this.hash,"")==i&&(!a.filter||b(this).is(a.filter))}
a=b.extend({},c.defaults,a);return a.lazy?this.bind(a.event,function(d){var c=b([d.target,d.target.parentNode]).filter(e)[0];c&&g(d,c,a)}):this.find("a,area").filter(e).bind(a.event,function(b){g(b,this,a)}).end().end()}})(jQuery);
jQuery(function($){ $.localScroll({filter:'.smoothScroll'}); });

//antipub function
var domWrite = (function(){         
// private
 
var dw = document.write,              // save document.write()
          myCalls = [],                // contains all outstanding Scripts
          t = '';                      // timeout
 
function startnext(){                // start next call in pipeline
  if ( myCalls.length > 0 ) {
  if ( Object.watch ) console.log( 'next is '+myCalls[0].f.toString() );
  myCalls[0].startCall();
  }
  }
 
function evals( pCall ){            // eval embedded script tags in HTML code
  var scripts = [],
      script,
      regexp = /<script[^>]*>([\s\S]*?)<\/script>/gi;
  while ((script = regexp.exec(pCall.buf))) scripts.push(script[1]);
  scripts = scripts.join('\n');
  if (scripts) {
  eval(scripts);
  }
  }
 
function finishCall( pCall ){
  pCall.e.innerHTML = pCall.buf;            // write output to element
  evals( pCall );
  document.write=dw;                        // restore document.write()
  myCalls.shift();
  window.setTimeout( startnext, 50 );
  }
 
function testDone( pCall ){
  var myCall = pCall;
  return function(){
    if ( myCall.buf !== myCall.oldbuf ){
    myCall.oldbuf = myCall.buf;
    t=window.setTimeout( testDone( myCall ), myCall.ms );
    }
    else {
    finishCall( myCall );
    }
    }
  }
 
function MyCall( pDiv, pSrc, pFunc ){                    // Class
  this.e = ( typeof pDiv == 'string' ?
            document.getElementById( pDiv ) :
            pDiv ),                    // the div element
  this.f = pFunc || function(){},
  this.stat = 0,                        // 0=idle, 1=waiting, 2=running, 3=finished
  this.src = pSrc,                      // script source address
  this.buf = '',                        // output string buffer
  this.oldbuf = '',                      // compare buffer
  this.ms = 100,                        // milliseconds
  this.scripttag;                        // the script tag
  }
 
MyCall.prototype={
  startCall: function(){
  this.f.apply( window );                // execute settings function
  this.stat=1;
  var that = this;                            // status = waiting
  document.write = (function(){
    var o=that,
        cb=testDone( o ),
        t;
    return function( pString ){            // overload document.write()
    window.clearTimeout( t );
    o.stat=2;                            // status = running
    window.clearTimeout(t);
    o.oldbuf = o.buf;
    o.buf += pString;                    // add string to buffer
    t=window.setTimeout( cb, o.ms );
    };
    })();
  var s=document.createElement('script');
  s.setAttribute('language','javascript');
  s.setAttribute('type','text/javascript');
  s.setAttribute('src', this.src);
  document.getElementsByTagName('head')[0].appendChild(s);
  }
  }
 
return function( pDiv, pSrc, pFunc ){  // public
  var c = new MyCall( pDiv, pSrc, pFunc );
  myCalls.push( c );
  if ( myCalls.length === 1 ){
  startnext();
  }
  }
})();

$(document).ready(function(){

$(function(){
 
    $(document).on( 'scroll', function(){
 
      if ($(window).scrollTop() > 100) {
      $('.scroll-top-wrapper').addClass('show');
    } else {
      $('.scroll-top-wrapper').removeClass('show');
    }
  });
 
  $('.scroll-top-wrapper').on('click', scrollToTop);
});
 
function scrollToTop() {
  verticalOffset = typeof(verticalOffset) != 'undefined' ? verticalOffset : 0;
  element = $('body');
  offset = element.offset();
  offsetTop = offset.top;
  $('html, body').animate({scrollTop: offsetTop}, 500, 'linear');
}

});

$(function () {
  $('[data-toggle="tooltip"]').tooltip()
});
