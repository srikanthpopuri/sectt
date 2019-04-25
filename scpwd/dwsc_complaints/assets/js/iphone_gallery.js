$(function(){
	$('.gallery').fadeScroll({
		elem: '.gallery-list>li',
		interval: 0
	});
});
$(window).load(function(){
	$('.iphone-gallery').addClass('fadeScroll').fadeScroll({
		interval: 6000,
		elem: ".gallery-list>div",
		touchwipe: true,
		mousewipe: true,
		duration: 600,
		direction: "left",
		fade: false,
		switchers: ""
	});
});
jQuery.fn.fadeScroll = function(o) {
	o = $.extend( {
		touch: true,
		mouseTouch: false,
		interval: 7000,
		duration: 700,
		fade: 0,
		direction: "top",  //left
		elem: ">li",
		switchers: "make",
		switchersClass: "switchers",
		prev: '.prev',
		next: '.next',
		activeClass:"active",
		event: 'click',
		easing : "easeInOutQuint",
		addClass: 'before',
		pauseOnHover: true,
		touchwipe: true,
		mousewipe: false
	}, o || {});
	function defineItem(str, elem){
		if (str.length > 0) {
			if (str[0] == "#") {
				return jQuery(str);
			}
			else {
				return jQuery(str, elem);
			}
		} else {
			return null;
		}
	}
	function makeSwtichers(elems, holder, index){
        return null;

		var html = "<ul class='"+o.switchersClass+"'>";
		for(var i=0; i<elems.size(); i++) {
			if (i==index) {
				html+="<li><a href='#' class="+o.activeClass+">"+(i+1)+"</a></li> ";
			} else {
				html+="<li><a href='#'>"+(i+1)+"</a></li> ";
			}
		}
		html+="</ul>";
		return jQuery(html).appendTo(holder).find('a');
	}
	function animateObj(mass){
		var obj = new Object();
		for (i=0; i<mass.length; i+=2) {
			obj[mass[i]] = mass[i+1];
		}
		return obj;
	}
	return this.each(
		function() {
			var _this = jQuery(this),
				elems = jQuery(o.elem, this),
				prev = defineItem(o.prev, this),
				next = defineItem(o.next, this),
				curElem = 0,
				elemsDimension = (o.direction == "top" || o.direction == "margin-top") ? elems.outerHeight(true) : elems.outerWidth(true),
				timer;
				
			if (elems.hasClass(o.activeClass)) {
				curElem = elems.index(elems.filter(o.activeClass));
			} else {
				elems.eq(curElem).addClass(o.activeClass);
			}
			
			if (o.switchers == "make") {
				var switchers = makeSwtichers(elems, _this, curElem);
			} else {
				var switchers = defineItem(o.switchers, _this);
			}
			
			if (o.fade < 1 && o.fade >=0) {
				elems.css('opacity',o.fade).eq(curElem).css('opacity',1);
			}
			
			function step(n) {
				if (curElem != n && !elems.is(':animated')) {
					var nextElem = elems.eq(n);
					if (n>curElem) {
						nextElem.css(o.direction, elemsDimension);
						if (o.fade < 1 && o.fade >=0) {
							elems.eq(curElem).animate(animateObj([o.direction, -elemsDimension, 'opacity', o.fade]), o.duration, o.easing);
							nextElem.animate(animateObj([o.direction, 0, 'opacity',1]), o.duration, o.easing);
						} else {
							elems.eq(curElem).animate(animateObj([o.direction, -elemsDimension]), o.duration, o.easing);
							nextElem.animate(animateObj([o.direction, 0]), o.duration, o.easing);
						}
					} else {
						nextElem.css(o.direction, -elemsDimension);
						if (o.fade < 1 && o.fade >=0) {
							elems.eq(curElem).animate(animateObj([o.direction, elemsDimension, 'opacity', o.fade]), o.duration, o.easing);
							nextElem.animate(animateObj([o.direction, 0, 'opacity',1]), o.duration, o.easing);
						} else {
							elems.eq(curElem).animate(animateObj([o.direction, elemsDimension]), o.duration, o.easing);
							nextElem.animate(animateObj([o.direction, 0]), o.duration, o.easing);
						}
					}
					curElem = elems.index(nextElem);
					if (o.addClass == "after") {
						setTimeout(function(){
							elems.removeClass(o.activeClass).eq(curElem).addClass(o.activeClass);
							if (switchers) {
								switchers.removeClass(o.activeClass).eq(curElem).addClass(o.activeClass);
							}
						}, o.duration)
					} else {
						elems.removeClass(o.activeClass).eq(curElem).addClass(o.activeClass);
						if (switchers) {
							switchers.removeClass(o.activeClass).eq(curElem).addClass(o.activeClass);
						}
					}
				}
			}
			if (switchers) {
				switchers.bind(o.event, function(e){
					step(switchers.index(this));
					e.preventDefault();
				});
			}
			
			if (o.touchwipe && "touchwipe" in $.fn) {
				if (o.direction == "top" || o.direction == "margin-top") {
					_this.touchwipe({
						wipeUp: function(){
							step(curElem < 1 ? elems.size()-1 : curElem-1);
						},
						wipeDown: function(){
							step(curElem > elems.size()-2 ? 0 : curElem+1);
						},
						mouseEvents: o.mousewipe
					});
				} else {
					_this.touchwipe({
						wipeLeft: function(){
							step(curElem > elems.size()-2 ? 0 : curElem+1);
						},
						wipeRight: function(){
							step(curElem < 1 ? elems.size()-1 : curElem-1);
						},
						mouseEvents: o.mousewipe
					});
				}
			}
			next.bind(o.event, function(e){
				step(curElem > elems.size()-2 ? 0 : curElem+1);
				e.preventDefault();
			});
			
			prev.bind(o.event, function(e){
				step(curElem < 1 ? elems.size()-1 : curElem-1);
				e.preventDefault();
			});
			
			if (o.interval>0) {
				if (o.pauseOnHover){
					_this.hover(function(){
						clearInterval(timer);
					}, function(){
						clearInterval(timer);
						timer = setInterval(function(){
							step(curElem > elems.stop(true,true).size()-2 ? 0 : curElem+1);
						}, o.duration+o.interval);
					});
				}
				timer = setInterval(function(){
					step(curElem > elems.stop(true,true).size()-2 ? 0 : curElem+1);
				}, o.duration+o.interval);
			}
		});
};