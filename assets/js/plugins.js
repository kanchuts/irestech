/**
 * BxSlider v4.1.2 - Fully loaded, responsive content slider
 * http://bxslider.com
 *
 * Copyright 2014, Steven Wanderski - http://stevenwanderski.com - http://bxcreative.com
 * Written while drinking Belgian ales and listening to jazz
 *
 * Released under the MIT license - http://opensource.org/licenses/MIT
 */
! function (t) {
	var e = {},
		s = {
			mode: "horizontal",
			slideSelector: "",
			infiniteLoop: !0,
			hideControlOnEnd: !1,
			speed: 500,
			easing: null,
			slideMargin: 0,
			startSlide: 0,
			randomStart: !1,
			captions: !1,
			ticker: !1,
			tickerHover: !1,
			adaptiveHeight: !1,
			adaptiveHeightSpeed: 500,
			video: !1,
			useCSS: !0,
			preloadImages: "visible",
			responsive: !0,
			slideZIndex: 50,
			touchEnabled: !0,
			swipeThreshold: 50,
			oneToOneTouch: !0,
			preventDefaultSwipeX: !0,
			preventDefaultSwipeY: !1,
			pager: !0,
			pagerType: "full",
			pagerShortSeparator: " / ",
			pagerSelector: null,
			buildPager: null,
			pagerCustom: null,
			controls: !0,
			nextText: "Next",
			prevText: "Prev",
			nextSelector: null,
			prevSelector: null,
			autoControls: !1,
			startText: "Start",
			stopText: "Stop",
			autoControlsCombine: !1,
			autoControlsSelector: null,
			auto: !1,
			pause: 4e3,
			autoStart: !0,
			autoDirection: "next",
			autoHover: !1,
			autoDelay: 0,
			minSlides: 1,
			maxSlides: 1,
			moveSlides: 0,
			slideWidth: 0,
			onSliderLoad: function () {},
			onSlideBefore: function () {},
			onSlideAfter: function () {},
			onSlideNext: function () {},
			onSlidePrev: function () {},
			onSliderResize: function () {}
		};
	t.fn.bxSlider = function (n) {
		if (0 == this.length) return this;
		if (this.length > 1) return this.each(function () {
			t(this).bxSlider(n)
		}), this;
		var o = {},
			r = this;
		e.el = this;
		var a = t(window).width(),
			l = t(window).height(),
			d = function () {
				o.settings = t.extend({}, s, n), o.settings.slideWidth = parseInt(o.settings.slideWidth), o.children = r.children(o.settings.slideSelector), o.children.length < o.settings.minSlides && (o.settings.minSlides = o.children.length), o.children.length < o.settings.maxSlides && (o.settings.maxSlides = o.children.length), o.settings.randomStart && (o.settings.startSlide = Math.floor(Math.random() * o.children.length)), o.active = {
					index: o.settings.startSlide
				}, o.carousel = o.settings.minSlides > 1 || o.settings.maxSlides > 1, o.carousel && (o.settings.preloadImages = "all"), o.minThreshold = o.settings.minSlides * o.settings.slideWidth + (o.settings.minSlides - 1) * o.settings.slideMargin, o.maxThreshold = o.settings.maxSlides * o.settings.slideWidth + (o.settings.maxSlides - 1) * o.settings.slideMargin, o.working = !1, o.controls = {}, o.interval = null, o.animProp = "vertical" == o.settings.mode ? "top" : "left", o.usingCSS = o.settings.useCSS && "fade" != o.settings.mode && function () {
					var t = document.createElement("div"),
						e = ["WebkitPerspective", "MozPerspective", "OPerspective", "msPerspective"];
					for (var i in e)
						if (void 0 !== t.style[e[i]]) return o.cssPrefix = e[i].replace("Perspective", "").toLowerCase(), o.animProp = "-" + o.cssPrefix + "-transform", !0;
					return !1
				}(), "vertical" == o.settings.mode && (o.settings.maxSlides = o.settings.minSlides), r.data("origStyle", r.attr("style")), r.children(o.settings.slideSelector).each(function () {
					t(this).data("origStyle", t(this).attr("style"))
				}), c()
			},
			c = function () {
				r.wrap('<div class="bx-wrapper"><div class="bx-viewport"></div></div>'), o.viewport = r.parent(), o.loader = t('<div class="bx-loading" />'), o.viewport.prepend(o.loader), r.css({
					width: "horizontal" == o.settings.mode ? 100 * o.children.length + 215 + "%" : "auto",
					position: "relative"
				}), o.usingCSS && o.settings.easing ? r.css("-" + o.cssPrefix + "-transition-timing-function", o.settings.easing) : o.settings.easing || (o.settings.easing = "swing"), f(), o.viewport.css({
					width: "100%",
					overflow: "hidden",
					position: "relative"
				}), o.viewport.parent().css({
					maxWidth: p()
				}), o.settings.pager || o.viewport.parent().css({
					margin: "0 auto 0px"
				}), o.children.css({
					"float": "horizontal" == o.settings.mode ? "left" : "none",
					listStyle: "none",
					position: "relative"
				}), o.children.css("width", u()), "horizontal" == o.settings.mode && o.settings.slideMargin > 0 && o.children.css("marginRight", o.settings.slideMargin), "vertical" == o.settings.mode && o.settings.slideMargin > 0 && o.children.css("marginBottom", o.settings.slideMargin), "fade" == o.settings.mode && (o.children.css({
					position: "absolute",
					zIndex: 0,
					display: "none"
				}), o.children.eq(o.settings.startSlide).css({
					zIndex: o.settings.slideZIndex,
					display: "block"
				})), o.controls.el = t('<div class="bx-controls" />'), o.settings.captions && P(), o.active.last = o.settings.startSlide == x() - 1, o.settings.video && r.fitVids();
				var e = o.children.eq(o.settings.startSlide);
				"all" == o.settings.preloadImages && (e = o.children), o.settings.ticker ? o.settings.pager = !1 : (o.settings.pager && T(), o.settings.controls && C(), o.settings.auto && o.settings.autoControls && E(), (o.settings.controls || o.settings.autoControls || o.settings.pager) && o.viewport.after(o.controls.el)), g(e, h)
			},
			g = function (e, i) {
				var s = e.find("img, iframe").length;
				if (0 == s) return i(), void 0;
				var n = 0;
				e.find("img, iframe").each(function () {
					t(this).one("load", function () {
						++n == s && i()
					}).each(function () {
						this.complete && t(this).load()
					})
				})
			},
			h = function () {
				if (o.settings.infiniteLoop && "fade" != o.settings.mode && !o.settings.ticker) {
					var e = "vertical" == o.settings.mode ? o.settings.minSlides : o.settings.maxSlides,
						i = o.children.slice(0, e).clone().addClass("bx-clone"),
						s = o.children.slice(-e).clone().addClass("bx-clone");
					r.append(i).prepend(s)
				}
				o.loader.remove(), S(), "vertical" == o.settings.mode && (o.settings.adaptiveHeight = !0), o.viewport.height(v()), r.redrawSlider(), o.settings.onSliderLoad(o.active.index), o.initialized = !0, o.settings.responsive && t(window).bind("resize", Z), o.settings.auto && o.settings.autoStart && H(), o.settings.ticker && L(), o.settings.pager && q(o.settings.startSlide), o.settings.controls && W(), o.settings.touchEnabled && !o.settings.ticker && O()
			},
			v = function () {
				var e = 0,
					s = t();
				if ("vertical" == o.settings.mode || o.settings.adaptiveHeight)
					if (o.carousel) {
						var n = 1 == o.settings.moveSlides ? o.active.index : o.active.index * m();
						for (s = o.children.eq(n), i = 1; i <= o.settings.maxSlides - 1; i++) s = n + i >= o.children.length ? s.add(o.children.eq(i - 1)) : s.add(o.children.eq(n + i))
					} else s = o.children.eq(o.active.index);
				else s = o.children;
				return "vertical" == o.settings.mode ? (s.each(function () {
					e += t(this).outerHeight()
				}), o.settings.slideMargin > 0 && (e += o.settings.slideMargin * (o.settings.minSlides - 1))) : e = Math.max.apply(Math, s.map(function () {
					return t(this).outerHeight(!1)
				}).get()), e
			},
			p = function () {
				var t = "100%";
				return o.settings.slideWidth > 0 && (t = "horizontal" == o.settings.mode ? o.settings.maxSlides * o.settings.slideWidth + (o.settings.maxSlides - 1) * o.settings.slideMargin : o.settings.slideWidth), t
			},
			u = function () {
				var t = o.settings.slideWidth,
					e = o.viewport.width();
				return 0 == o.settings.slideWidth || o.settings.slideWidth > e && !o.carousel || "vertical" == o.settings.mode ? t = e : o.settings.maxSlides > 1 && "horizontal" == o.settings.mode && (e > o.maxThreshold || e < o.minThreshold && (t = (e - o.settings.slideMargin * (o.settings.minSlides - 1)) / o.settings.minSlides)), t
			},
			f = function () {
				var t = 1;
				if ("horizontal" == o.settings.mode && o.settings.slideWidth > 0)
					if (o.viewport.width() < o.minThreshold) t = o.settings.minSlides;
					else if (o.viewport.width() > o.maxThreshold) t = o.settings.maxSlides;
				else {
					var e = o.children.first().width();
					t = Math.floor(o.viewport.width() / e)
				} else "vertical" == o.settings.mode && (t = o.settings.minSlides);
				return t
			},
			x = function () {
				var t = 0;
				if (o.settings.moveSlides > 0)
					if (o.settings.infiniteLoop) t = o.children.length / m();
					else
						for (var e = 0, i = 0; e < o.children.length;) ++t, e = i + f(), i += o.settings.moveSlides <= f() ? o.settings.moveSlides : f();
				else t = Math.ceil(o.children.length / f());
				return t
			},
			m = function () {
				return o.settings.moveSlides > 0 && o.settings.moveSlides <= f() ? o.settings.moveSlides : f()
			},
			S = function () {
				if (o.children.length > o.settings.maxSlides && o.active.last && !o.settings.infiniteLoop) {
					if ("horizontal" == o.settings.mode) {
						var t = o.children.last(),
							e = t.position();
						b(-(e.left - (o.viewport.width() - t.width())), "reset", 0)
					} else if ("vertical" == o.settings.mode) {
						var i = o.children.length - o.settings.minSlides,
							e = o.children.eq(i).position();
						b(-e.top, "reset", 0)
					}
				} else {
					var e = o.children.eq(o.active.index * m()).position();
					o.active.index == x() - 1 && (o.active.last = !0), void 0 != e && ("horizontal" == o.settings.mode ? b(-e.left, "reset", 0) : "vertical" == o.settings.mode && b(-e.top, "reset", 0))
				}
			},
			b = function (t, e, i, s) {
				if (o.usingCSS) {
					var n = "vertical" == o.settings.mode ? "translate3d(0, " + t + "px, 0)" : "translate3d(" + t + "px, 0, 0)";
					r.css("-" + o.cssPrefix + "-transition-duration", i / 1e3 + "s"), "slide" == e ? (r.css(o.animProp, n), r.bind("transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd", function () {
						r.unbind("transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd"), D()
					})) : "reset" == e ? r.css(o.animProp, n) : "ticker" == e && (r.css("-" + o.cssPrefix + "-transition-timing-function", "linear"), r.css(o.animProp, n), r.bind("transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd", function () {
						r.unbind("transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd"), b(s.resetValue, "reset", 0), N()
					}))
				} else {
					var a = {};
					a[o.animProp] = t, "slide" == e ? r.animate(a, i, o.settings.easing, function () {
						D()
					}) : "reset" == e ? r.css(o.animProp, t) : "ticker" == e && r.animate(a, speed, "linear", function () {
						b(s.resetValue, "reset", 0), N()
					})
				}
			},
			w = function () {
				for (var e = "", i = x(), s = 0; i > s; s++) {
					var n = "";
					o.settings.buildPager && t.isFunction(o.settings.buildPager) ? (n = o.settings.buildPager(s), o.pagerEl.addClass("bx-custom-pager")) : (n = s + 1, o.pagerEl.addClass("bx-default-pager")), e += '<div class="bx-pager-item"><a href="" data-slide-index="' + s + '" class="bx-pager-link">' + n + "</a></div>"
				}
				o.pagerEl.html(e)
			},
			T = function () {
				o.settings.pagerCustom ? o.pagerEl = t(o.settings.pagerCustom) : (o.pagerEl = t('<div class="bx-pager" />'), o.settings.pagerSelector ? t(o.settings.pagerSelector).html(o.pagerEl) : o.controls.el.addClass("bx-has-pager").append(o.pagerEl), w()), o.pagerEl.on("click", "a", I)
			},
			C = function () {
				o.controls.next = t('<a class="bx-next" href="">' + o.settings.nextText + "</a>"), o.controls.prev = t('<a class="bx-prev" href="">' + o.settings.prevText + "</a>"), o.controls.next.bind("click", y), o.controls.prev.bind("click", z), o.settings.nextSelector && t(o.settings.nextSelector).append(o.controls.next), o.settings.prevSelector && t(o.settings.prevSelector).append(o.controls.prev), o.settings.nextSelector || o.settings.prevSelector || (o.controls.directionEl = t('<div class="bx-controls-direction" />'), o.controls.directionEl.append(o.controls.prev).append(o.controls.next), o.controls.el.addClass("bx-has-controls-direction").append(o.controls.directionEl))
			},
			E = function () {
				o.controls.start = t('<div class="bx-controls-auto-item"><a class="bx-start" href="">' + o.settings.startText + "</a></div>"), o.controls.stop = t('<div class="bx-controls-auto-item"><a class="bx-stop" href="">' + o.settings.stopText + "</a></div>"), o.controls.autoEl = t('<div class="bx-controls-auto" />'), o.controls.autoEl.on("click", ".bx-start", k), o.controls.autoEl.on("click", ".bx-stop", M), o.settings.autoControlsCombine ? o.controls.autoEl.append(o.controls.start) : o.controls.autoEl.append(o.controls.start).append(o.controls.stop), o.settings.autoControlsSelector ? t(o.settings.autoControlsSelector).html(o.controls.autoEl) : o.controls.el.addClass("bx-has-controls-auto").append(o.controls.autoEl), A(o.settings.autoStart ? "stop" : "start")
			},
			P = function () {
				o.children.each(function () {
					var e = t(this).find("img:first").attr("title");
					void 0 != e && ("" + e).length && t(this).append('<div class="bx-caption"><span>' + e + "</span></div>")
				})
			},
			y = function (t) {
				o.settings.auto && r.stopAuto(), r.goToNextSlide(), t.preventDefault()
			},
			z = function (t) {
				o.settings.auto && r.stopAuto(), r.goToPrevSlide(), t.preventDefault()
			},
			k = function (t) {
				r.startAuto(), t.preventDefault()
			},
			M = function (t) {
				r.stopAuto(), t.preventDefault()
			},
			I = function (e) {
				o.settings.auto && r.stopAuto();
				var i = t(e.currentTarget),
					s = parseInt(i.attr("data-slide-index"));
				s != o.active.index && r.goToSlide(s), e.preventDefault()
			},
			q = function (e) {
				var i = o.children.length;
				return "short" == o.settings.pagerType ? (o.settings.maxSlides > 1 && (i = Math.ceil(o.children.length / o.settings.maxSlides)), o.pagerEl.html(e + 1 + o.settings.pagerShortSeparator + i), void 0) : (o.pagerEl.find("a").removeClass("active"), o.pagerEl.each(function (i, s) {
					t(s).find("a").eq(e).addClass("active")
				}), void 0)
			},
			D = function () {
				if (o.settings.infiniteLoop) {
					var t = "";
					0 == o.active.index ? t = o.children.eq(0).position() : o.active.index == x() - 1 && o.carousel ? t = o.children.eq((x() - 1) * m()).position() : o.active.index == o.children.length - 1 && (t = o.children.eq(o.children.length - 1).position()), t && ("horizontal" == o.settings.mode ? b(-t.left, "reset", 0) : "vertical" == o.settings.mode && b(-t.top, "reset", 0))
				}
				o.working = !1, o.settings.onSlideAfter(o.children.eq(o.active.index), o.oldIndex, o.active.index)
			},
			A = function (t) {
				o.settings.autoControlsCombine ? o.controls.autoEl.html(o.controls[t]) : (o.controls.autoEl.find("a").removeClass("active"), o.controls.autoEl.find("a:not(.bx-" + t + ")").addClass("active"))
			},
			W = function () {
				1 == x() ? (o.controls.prev.addClass("disabled"), o.controls.next.addClass("disabled")) : !o.settings.infiniteLoop && o.settings.hideControlOnEnd && (0 == o.active.index ? (o.controls.prev.addClass("disabled"), o.controls.next.removeClass("disabled")) : o.active.index == x() - 1 ? (o.controls.next.addClass("disabled"), o.controls.prev.removeClass("disabled")) : (o.controls.prev.removeClass("disabled"), o.controls.next.removeClass("disabled")))
			},
			H = function () {
				o.settings.autoDelay > 0 ? setTimeout(r.startAuto, o.settings.autoDelay) : r.startAuto(), o.settings.autoHover && r.hover(function () {
					o.interval && (r.stopAuto(!0), o.autoPaused = !0)
				}, function () {
					o.autoPaused && (r.startAuto(!0), o.autoPaused = null)
				})
			},
			L = function () {
				var e = 0;
				if ("next" == o.settings.autoDirection) r.append(o.children.clone().addClass("bx-clone"));
				else {
					r.prepend(o.children.clone().addClass("bx-clone"));
					var i = o.children.first().position();
					e = "horizontal" == o.settings.mode ? -i.left : -i.top
				}
				b(e, "reset", 0), o.settings.pager = !1, o.settings.controls = !1, o.settings.autoControls = !1, o.settings.tickerHover && !o.usingCSS && o.viewport.hover(function () {
					r.stop()
				}, function () {
					var e = 0;
					o.children.each(function () {
						e += "horizontal" == o.settings.mode ? t(this).outerWidth(!0) : t(this).outerHeight(!0)
					});
					var i = o.settings.speed / e,
						s = "horizontal" == o.settings.mode ? "left" : "top",
						n = i * (e - Math.abs(parseInt(r.css(s))));
					N(n)
				}), N()
			},
			N = function (t) {
				speed = t ? t : o.settings.speed;
				var e = {
						left: 0,
						top: 0
					},
					i = {
						left: 0,
						top: 0
					};
				"next" == o.settings.autoDirection ? e = r.find(".bx-clone").first().position() : i = o.children.first().position();
				var s = "horizontal" == o.settings.mode ? -e.left : -e.top,
					n = "horizontal" == o.settings.mode ? -i.left : -i.top,
					a = {
						resetValue: n
					};
				b(s, "ticker", speed, a)
			},
			O = function () {
				o.touch = {
					start: {
						x: 0,
						y: 0
					},
					end: {
						x: 0,
						y: 0
					}
				}, o.viewport.bind("touchstart", X)
			},
			X = function (t) {
				if (o.working) t.preventDefault();
				else {
					o.touch.originalPos = r.position();
					var e = t.originalEvent;
					o.touch.start.x = e.changedTouches[0].pageX, o.touch.start.y = e.changedTouches[0].pageY, o.viewport.bind("touchmove", Y), o.viewport.bind("touchend", V)
				}
			},
			Y = function (t) {
				var e = t.originalEvent,
					i = Math.abs(e.changedTouches[0].pageX - o.touch.start.x),
					s = Math.abs(e.changedTouches[0].pageY - o.touch.start.y);
				if (3 * i > s && o.settings.preventDefaultSwipeX ? t.preventDefault() : 3 * s > i && o.settings.preventDefaultSwipeY && t.preventDefault(), "fade" != o.settings.mode && o.settings.oneToOneTouch) {
					var n = 0;
					if ("horizontal" == o.settings.mode) {
						var r = e.changedTouches[0].pageX - o.touch.start.x;
						n = o.touch.originalPos.left + r
					} else {
						var r = e.changedTouches[0].pageY - o.touch.start.y;
						n = o.touch.originalPos.top + r
					}
					b(n, "reset", 0)
				}
			},
			V = function (t) {
				o.viewport.unbind("touchmove", Y);
				var e = t.originalEvent,
					i = 0;
				if (o.touch.end.x = e.changedTouches[0].pageX, o.touch.end.y = e.changedTouches[0].pageY, "fade" == o.settings.mode) {
					var s = Math.abs(o.touch.start.x - o.touch.end.x);
					s >= o.settings.swipeThreshold && (o.touch.start.x > o.touch.end.x ? r.goToNextSlide() : r.goToPrevSlide(), r.stopAuto())
				} else {
					var s = 0;
					"horizontal" == o.settings.mode ? (s = o.touch.end.x - o.touch.start.x, i = o.touch.originalPos.left) : (s = o.touch.end.y - o.touch.start.y, i = o.touch.originalPos.top), !o.settings.infiniteLoop && (0 == o.active.index && s > 0 || o.active.last && 0 > s) ? b(i, "reset", 200) : Math.abs(s) >= o.settings.swipeThreshold ? (0 > s ? r.goToNextSlide() : r.goToPrevSlide(), r.stopAuto()) : b(i, "reset", 200)
				}
				o.viewport.unbind("touchend", V)
			},
			Z = function () {
				var e = t(window).width(),
					i = t(window).height();
				(a != e || l != i) && (a = e, l = i, r.redrawSlider(), o.settings.onSliderResize.call(r, o.active.index))
			};
		return r.goToSlide = function (e, i) {
			if (!o.working && o.active.index != e)
				if (o.working = !0, o.oldIndex = o.active.index, o.active.index = 0 > e ? x() - 1 : e >= x() ? 0 : e, o.settings.onSlideBefore(o.children.eq(o.active.index), o.oldIndex, o.active.index), "next" == i ? o.settings.onSlideNext(o.children.eq(o.active.index), o.oldIndex, o.active.index) : "prev" == i && o.settings.onSlidePrev(o.children.eq(o.active.index), o.oldIndex, o.active.index), o.active.last = o.active.index >= x() - 1, o.settings.pager && q(o.active.index), o.settings.controls && W(), "fade" == o.settings.mode) o.settings.adaptiveHeight && o.viewport.height() != v() && o.viewport.animate({
					height: v()
				}, o.settings.adaptiveHeightSpeed), o.children.filter(":visible").fadeOut(o.settings.speed).css({
					zIndex: 0
				}), o.children.eq(o.active.index).css("zIndex", o.settings.slideZIndex + 1).fadeIn(o.settings.speed, function () {
					t(this).css("zIndex", o.settings.slideZIndex), D()
				});
				else {
					o.settings.adaptiveHeight && o.viewport.height() != v() && o.viewport.animate({
						height: v()
					}, o.settings.adaptiveHeightSpeed);
					var s = 0,
						n = {
							left: 0,
							top: 0
						};
					if (!o.settings.infiniteLoop && o.carousel && o.active.last)
						if ("horizontal" == o.settings.mode) {
							var a = o.children.eq(o.children.length - 1);
							n = a.position(), s = o.viewport.width() - a.outerWidth()
						} else {
							var l = o.children.length - o.settings.minSlides;
							n = o.children.eq(l).position()
						}
					else if (o.carousel && o.active.last && "prev" == i) {
						var d = 1 == o.settings.moveSlides ? o.settings.maxSlides - m() : (x() - 1) * m() - (o.children.length - o.settings.maxSlides),
							a = r.children(".bx-clone").eq(d);
						n = a.position()
					} else if ("next" == i && 0 == o.active.index) n = r.find("> .bx-clone").eq(o.settings.maxSlides).position(), o.active.last = !1;
					else if (e >= 0) {
						var c = e * m();
						n = o.children.eq(c).position()
					}
					if ("undefined" != typeof n) {
						var g = "horizontal" == o.settings.mode ? -(n.left - s) : -n.top;
						b(g, "slide", o.settings.speed)
					}
				}
		}, r.goToNextSlide = function () {
			if (o.settings.infiniteLoop || !o.active.last) {
				var t = parseInt(o.active.index) + 1;
				r.goToSlide(t, "next")
			}
		}, r.goToPrevSlide = function () {
			if (o.settings.infiniteLoop || 0 != o.active.index) {
				var t = parseInt(o.active.index) - 1;
				r.goToSlide(t, "prev")
			}
		}, r.startAuto = function (t) {
			o.interval || (o.interval = setInterval(function () {
				"next" == o.settings.autoDirection ? r.goToNextSlide() : r.goToPrevSlide()
			}, o.settings.pause), o.settings.autoControls && 1 != t && A("stop"))
		}, r.stopAuto = function (t) {
			o.interval && (clearInterval(o.interval), o.interval = null, o.settings.autoControls && 1 != t && A("start"))
		}, r.getCurrentSlide = function () {
			return o.active.index
		}, r.getCurrentSlideElement = function () {
			return o.children.eq(o.active.index)
		}, r.getSlideCount = function () {
			return o.children.length
		}, r.redrawSlider = function () {
			o.children.add(r.find(".bx-clone")).outerWidth(u()), o.viewport.css("height", v()), o.settings.ticker || S(), o.active.last && (o.active.index = x() - 1), o.active.index >= x() && (o.active.last = !0), o.settings.pager && !o.settings.pagerCustom && (w(), q(o.active.index))
		}, r.destroySlider = function () {
			o.initialized && (o.initialized = !1, t(".bx-clone", this).remove(), o.children.each(function () {
				void 0 != t(this).data("origStyle") ? t(this).attr("style", t(this).data("origStyle")) : t(this).removeAttr("style")
			}), void 0 != t(this).data("origStyle") ? this.attr("style", t(this).data("origStyle")) : t(this).removeAttr("style"), t(this).unwrap().unwrap(), o.controls.el && o.controls.el.remove(), o.controls.next && o.controls.next.remove(), o.controls.prev && o.controls.prev.remove(), o.pagerEl && o.settings.controls && o.pagerEl.remove(), t(".bx-caption", this).remove(), o.controls.autoEl && o.controls.autoEl.remove(), clearInterval(o.interval), o.settings.responsive && t(window).unbind("resize", Z))
		}, r.reloadSlider = function (t) {
			void 0 != t && (n = t), r.destroySlider(), d()
		}, d(), this
	}
}(jQuery);


/*! fancyBox v2.1.4 fancyapps.com | fancyapps.com/fancybox/#license */
(function (C, z, f, r) {
	var q = f(C),
		n = f(z),
		b = f.fancybox = function () {
			b.open.apply(this, arguments)
		},
		H = navigator.userAgent.match(/msie/),
		w = null,
		s = z.createTouch !== r,
		t = function (a) {
			return a && a.hasOwnProperty && a instanceof f
		},
		p = function (a) {
			return a && "string" === f.type(a)
		},
		F = function (a) {
			return p(a) && 0 < a.indexOf("%")
		},
		l = function (a, d) {
			var e = parseInt(a, 10) || 0;
			d && F(a) && (e *= b.getViewport()[d] / 100);
			return Math.ceil(e)
		},
		x = function (a, b) {
			return l(a, b) + "px"
		};
	f.extend(b, {
		version: "2.1.4",
		defaults: {
			padding: 15,
			margin: 20,
			width: 800,
			height: 600,
			minWidth: 100,
			minHeight: 100,
			maxWidth: 9999,
			maxHeight: 9999,
			autoSize: !0,
			autoHeight: !1,
			autoWidth: !1,
			autoResize: !0,
			autoCenter: !s,
			fitToView: !0,
			aspectRatio: !1,
			topRatio: 0.5,
			leftRatio: 0.5,
			scrolling: "auto",
			wrapCSS: "",
			arrows: !0,
			closeBtn: !0,
			closeClick: !1,
			nextClick: !1,
			mouseWheel: !0,
			autoPlay: !1,
			playSpeed: 3E3,
			preload: 3,
			modal: !1,
			loop: !0,
			ajax: {
				dataType: "html",
				headers: {
					"X-fancyBox": !0
				}
			},
			iframe: {
				scrolling: "auto",
				preload: !0
			},
			swf: {
				wmode: "transparent",
				allowfullscreen: "true",
				allowscriptaccess: "always"
			},
			keys: {
				next: {
					13: "left",
					34: "up",
					39: "left",
					40: "up"
				},
				prev: {
					8: "right",
					33: "down",
					37: "right",
					38: "down"
				},
				close: [27],
				play: [32],
				toggle: [70]
			},
			direction: {
				next: "left",
				prev: "right"
			},
			scrollOutside: !0,
			index: 0,
			type: null,
			href: null,
			content: null,
			title: null,
			tpl: {
				wrap: '<div class="fancybox-wrap" tabIndex="-1"><div class="fancybox-skin"><div class="fancybox-outer"><div class="fancybox-inner"></div></div></div></div>',
				image: '<img class="fancybox-image" src="{href}" alt="" />',
				iframe: '<iframe id="fancybox-frame{rnd}" name="fancybox-frame{rnd}" class="fancybox-iframe" frameborder="0" vspace="0" hspace="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen' +
					(H ? ' allowtransparency="true"' : "") + "></iframe>",
				error: '<p class="fancybox-error">The requested content cannot be loaded.<br/>Please try again later.</p>',
				closeBtn: '<a title="Close" class="fancybox-item fancybox-close" href="javascript:;"></a>',
				next: '<a title="Next" class="fancybox-nav fancybox-next" href="javascript:;"><span></span></a>',
				prev: '<a title="Previous" class="fancybox-nav fancybox-prev" href="javascript:;"><span></span></a>'
			},
			openEffect: "fade",
			openSpeed: 250,
			openEasing: "swing",
			openOpacity: !0,
			openMethod: "zoomIn",
			closeEffect: "fade",
			closeSpeed: 250,
			closeEasing: "swing",
			closeOpacity: !0,
			closeMethod: "zoomOut",
			nextEffect: "elastic",
			nextSpeed: 250,
			nextEasing: "swing",
			nextMethod: "changeIn",
			prevEffect: "elastic",
			prevSpeed: 250,
			prevEasing: "swing",
			prevMethod: "changeOut",
			helpers: {
				overlay: !0,
				title: !0
			},
			onCancel: f.noop,
			beforeLoad: f.noop,
			afterLoad: f.noop,
			beforeShow: f.noop,
			afterShow: f.noop,
			beforeChange: f.noop,
			beforeClose: f.noop,
			afterClose: f.noop
		},
		group: {},
		opts: {},
		previous: null,
		coming: null,
		current: null,
		isActive: !1,
		isOpen: !1,
		isOpened: !1,
		wrap: null,
		skin: null,
		outer: null,
		inner: null,
		player: {
			timer: null,
			isActive: !1
		},
		ajaxLoad: null,
		imgPreload: null,
		transitions: {},
		helpers: {},
		open: function (a, d) {
			if (a && (f.isPlainObject(d) || (d = {}), !1 !== b.close(!0))) return f.isArray(a) || (a = t(a) ? f(a).get() : [a]), f.each(a, function (e, c) {
				var k = {},
					g, h, j, m, l;
				"object" === f.type(c) && (c.nodeType && (c = f(c)), t(c) ? (k = {
					href: c.data("fancybox-href") || c.attr("href"),
					title: c.data("fancybox-title") || c.attr("title"),
					isDom: !0,
					element: c
				}, f.metadata && f.extend(!0, k,
					c.metadata())) : k = c);
				g = d.href || k.href || (p(c) ? c : null);
				h = d.title !== r ? d.title : k.title || "";
				m = (j = d.content || k.content) ? "html" : d.type || k.type;
				!m && k.isDom && (m = c.data("fancybox-type"), m || (m = (m = c.prop("class").match(/fancybox\.(\w+)/)) ? m[1] : null));
				p(g) && (m || (b.isImage(g) ? m = "image" : b.isSWF(g) ? m = "swf" : "#" === g.charAt(0) ? m = "inline" : p(c) && (m = "html", j = c)), "ajax" === m && (l = g.split(/\s+/, 2), g = l.shift(), l = l.shift()));
				j || ("inline" === m ? g ? j = f(p(g) ? g.replace(/.*(?=#[^\s]+$)/, "") : g) : k.isDom && (j = c) : "html" === m ? j = g : !m && (!g &&
					k.isDom) && (m = "inline", j = c));
				f.extend(k, {
					href: g,
					type: m,
					content: j,
					title: h,
					selector: l
				});
				a[e] = k
			}), b.opts = f.extend(!0, {}, b.defaults, d), d.keys !== r && (b.opts.keys = d.keys ? f.extend({}, b.defaults.keys, d.keys) : !1), b.group = a, b._start(b.opts.index)
		},
		cancel: function () {
			var a = b.coming;
			a && !1 !== b.trigger("onCancel") && (b.hideLoading(), b.ajaxLoad && b.ajaxLoad.abort(), b.ajaxLoad = null, b.imgPreload && (b.imgPreload.onload = b.imgPreload.onerror = null), a.wrap && a.wrap.stop(!0, !0).trigger("onReset").remove(), b.coming = null, b.current ||
				b._afterZoomOut(a))
		},
		close: function (a) {
			b.cancel();
			!1 !== b.trigger("beforeClose") && (b.unbindEvents(), b.isActive && (!b.isOpen || !0 === a ? (f(".fancybox-wrap").stop(!0).trigger("onReset").remove(), b._afterZoomOut()) : (b.isOpen = b.isOpened = !1, b.isClosing = !0, f(".fancybox-item, .fancybox-nav").remove(), b.wrap.stop(!0, !0).removeClass("fancybox-opened"), b.transitions[b.current.closeMethod]())))
		},
		play: function (a) {
			var d = function () {
					clearTimeout(b.player.timer)
				},
				e = function () {
					d();
					b.current && b.player.isActive && (b.player.timer =
						setTimeout(b.next, b.current.playSpeed))
				},
				c = function () {
					d();
					f("body").unbind(".player");
					b.player.isActive = !1;
					b.trigger("onPlayEnd")
				};
			if (!0 === a || !b.player.isActive && !1 !== a) {
				if (b.current && (b.current.loop || b.current.index < b.group.length - 1)) b.player.isActive = !0, f("body").bind({
					"afterShow.player onUpdate.player": e,
					"onCancel.player beforeClose.player": c,
					"beforeLoad.player": d
				}), e(), b.trigger("onPlayStart")
			} else c()
		},
		next: function (a) {
			var d = b.current;
			d && (p(a) || (a = d.direction.next), b.jumpto(d.index + 1, a, "next"))
		},
		prev: function (a) {
			var d = b.current;
			d && (p(a) || (a = d.direction.prev), b.jumpto(d.index - 1, a, "prev"))
		},
		jumpto: function (a, d, e) {
			var c = b.current;
			c && (a = l(a), b.direction = d || c.direction[a >= c.index ? "next" : "prev"], b.router = e || "jumpto", c.loop && (0 > a && (a = c.group.length + a % c.group.length), a %= c.group.length), c.group[a] !== r && (b.cancel(), b._start(a)))
		},
		reposition: function (a, d) {
			var e = b.current,
				c = e ? e.wrap : null,
				k;
			c && (k = b._getPosition(d), a && "scroll" === a.type ? (delete k.position, c.stop(!0, !0).animate(k, 200)) : (c.css(k), e.pos = f.extend({},
				e.dim, k)))
		},
		update: function (a) {
			var d = a && a.type,
				e = !d || "orientationchange" === d;
			e && (clearTimeout(w), w = null);
			b.isOpen && !w && (w = setTimeout(function () {
				var c = b.current;
				c && !b.isClosing && (b.wrap.removeClass("fancybox-tmp"), (e || "load" === d || "resize" === d && c.autoResize) && b._setDimension(), "scroll" === d && c.canShrink || b.reposition(a), b.trigger("onUpdate"), w = null)
			}, e && !s ? 0 : 300))
		},
		toggle: function (a) {
			b.isOpen && (b.current.fitToView = "boolean" === f.type(a) ? a : !b.current.fitToView, s && (b.wrap.removeAttr("style").addClass("fancybox-tmp"),
				b.trigger("onUpdate")), b.update())
		},
		hideLoading: function () {
			n.unbind(".loading");
			f("#fancybox-loading").remove()
		},
		showLoading: function () {
			var a, d;
			b.hideLoading();
			a = f('<div id="fancybox-loading"><div></div></div>').click(b.cancel).appendTo("body");
			n.bind("keydown.loading", function (a) {
				if (27 === (a.which || a.keyCode)) a.preventDefault(), b.cancel()
			});
			b.defaults.fixed || (d = b.getViewport(), a.css({
				position: "absolute",
				top: 0.5 * d.h + d.y,
				left: 0.5 * d.w + d.x
			}))
		},
		getViewport: function () {
			var a = b.current && b.current.locked ||
				!1,
				d = {
					x: q.scrollLeft(),
					y: q.scrollTop()
				};
			a ? (d.w = a[0].clientWidth, d.h = a[0].clientHeight) : (d.w = s && C.innerWidth ? C.innerWidth : q.width(), d.h = s && C.innerHeight ? C.innerHeight : q.height());
			return d
		},
		unbindEvents: function () {
			b.wrap && t(b.wrap) && b.wrap.unbind(".fb");
			n.unbind(".fb");
			q.unbind(".fb")
		},
		bindEvents: function () {
			var a = b.current,
				d;
			a && (q.bind("orientationchange.fb" + (s ? "" : " resize.fb") + (a.autoCenter && !a.locked ? " scroll.fb" : ""), b.update), (d = a.keys) && n.bind("keydown.fb", function (e) {
				var c = e.which || e.keyCode,
					k =
					e.target || e.srcElement;
				if (27 === c && b.coming) return !1;
				!e.ctrlKey && (!e.altKey && !e.shiftKey && !e.metaKey && (!k || !k.type && !f(k).is("[contenteditable]"))) && f.each(d, function (d, k) {
					if (1 < a.group.length && k[c] !== r) return b[d](k[c]), e.preventDefault(), !1;
					if (-1 < f.inArray(c, k)) return b[d](), e.preventDefault(), !1
				})
			}), f.fn.mousewheel && a.mouseWheel && b.wrap.bind("mousewheel.fb", function (d, c, k, g) {
				for (var h = f(d.target || null), j = !1; h.length && !j && !h.is(".fancybox-skin") && !h.is(".fancybox-wrap");) j = h[0] && !(h[0].style.overflow &&
					"hidden" === h[0].style.overflow) && (h[0].clientWidth && h[0].scrollWidth > h[0].clientWidth || h[0].clientHeight && h[0].scrollHeight > h[0].clientHeight), h = f(h).parent();
				if (0 !== c && !j && 1 < b.group.length && !a.canShrink) {
					if (0 < g || 0 < k) b.prev(0 < g ? "down" : "left");
					else if (0 > g || 0 > k) b.next(0 > g ? "up" : "right");
					d.preventDefault()
				}
			}))
		},
		trigger: function (a, d) {
			var e, c = d || b.coming || b.current;
			if (c) {
				f.isFunction(c[a]) && (e = c[a].apply(c, Array.prototype.slice.call(arguments, 1)));
				if (!1 === e) return !1;
				c.helpers && f.each(c.helpers, function (d,
					e) {
					e && (b.helpers[d] && f.isFunction(b.helpers[d][a])) && (e = f.extend(!0, {}, b.helpers[d].defaults, e), b.helpers[d][a](e, c))
				});
				f.event.trigger(a + ".fb")
			}
		},
		isImage: function (a) {
			return p(a) && a.match(/(^data:image\/.*,)|(\.(jp(e|g|eg)|gif|png|bmp|webp)((\?|#).*)?$)/i)
		},
		isSWF: function (a) {
			return p(a) && a.match(/\.(swf)((\?|#).*)?$/i)
		},
		_start: function (a) {
			var d = {},
				e, c;
			a = l(a);
			e = b.group[a] || null;
			if (!e) return !1;
			d = f.extend(!0, {}, b.opts, e);
			e = d.margin;
			c = d.padding;
			"number" === f.type(e) && (d.margin = [e, e, e, e]);
			"number" === f.type(c) &&
				(d.padding = [c, c, c, c]);
			d.modal && f.extend(!0, d, {
				closeBtn: !1,
				closeClick: !1,
				nextClick: !1,
				arrows: !1,
				mouseWheel: !1,
				keys: null,
				helpers: {
					overlay: {
						closeClick: !1
					}
				}
			});
			d.autoSize && (d.autoWidth = d.autoHeight = !0);
			"auto" === d.width && (d.autoWidth = !0);
			"auto" === d.height && (d.autoHeight = !0);
			d.group = b.group;
			d.index = a;
			b.coming = d;
			if (!1 === b.trigger("beforeLoad")) b.coming = null;
			else {
				c = d.type;
				e = d.href;
				if (!c) return b.coming = null, b.current && b.router && "jumpto" !== b.router ? (b.current.index = a, b[b.router](b.direction)) : !1;
				b.isActive = !0;
				if ("image" === c || "swf" === c) d.autoHeight = d.autoWidth = !1, d.scrolling = "visible";
				"image" === c && (d.aspectRatio = !0);
				"iframe" === c && s && (d.scrolling = "scroll");
				d.wrap = f(d.tpl.wrap).addClass("fancybox-" + (s ? "mobile" : "desktop") + " fancybox-type-" + c + " fancybox-tmp " + d.wrapCSS).appendTo(d.parent || "body");
				f.extend(d, {
					skin: f(".fancybox-skin", d.wrap),
					outer: f(".fancybox-outer", d.wrap),
					inner: f(".fancybox-inner", d.wrap)
				});
				f.each(["Top", "Right", "Bottom", "Left"], function (a, b) {
					d.skin.css("padding" + b, x(d.padding[a]))
				});
				b.trigger("onReady");
				if ("inline" === c || "html" === c) {
					if (!d.content || !d.content.length) return b._error("content")
				} else if (!e) return b._error("href");
				"image" === c ? b._loadImage() : "ajax" === c ? b._loadAjax() : "iframe" === c ? b._loadIframe() : b._afterLoad()
			}
		},
		_error: function (a) {
			f.extend(b.coming, {
				type: "html",
				autoWidth: !0,
				autoHeight: !0,
				minWidth: 0,
				minHeight: 0,
				scrolling: "no",
				hasError: a,
				content: b.coming.tpl.error
			});
			b._afterLoad()
		},
		_loadImage: function () {
			var a = b.imgPreload = new Image;
			a.onload = function () {
				this.onload = this.onerror = null;
				b.coming.width =
					this.width;
				b.coming.height = this.height;
				b._afterLoad()
			};
			a.onerror = function () {
				this.onload = this.onerror = null;
				b._error("image")
			};
			a.src = b.coming.href;
			!0 !== a.complete && b.showLoading()
		},
		_loadAjax: function () {
			var a = b.coming;
			b.showLoading();
			b.ajaxLoad = f.ajax(f.extend({}, a.ajax, {
				url: a.href,
				error: function (a, e) {
					b.coming && "abort" !== e ? b._error("ajax", a) : b.hideLoading()
				},
				success: function (d, e) {
					"success" === e && (a.content = d, b._afterLoad())
				}
			}))
		},
		_loadIframe: function () {
			var a = b.coming,
				d = f(a.tpl.iframe.replace(/\{rnd\}/g,
					(new Date).getTime())).attr("scrolling", s ? "auto" : a.iframe.scrolling).attr("src", a.href);
			f(a.wrap).bind("onReset", function () {
				try {
					f(this).find("iframe").hide().attr("src", "//about:blank").end().empty()
				} catch (a) {}
			});
			a.iframe.preload && (b.showLoading(), d.one("load", function () {
				f(this).data("ready", 1);
				s || f(this).bind("load.fb", b.update);
				f(this).parents(".fancybox-wrap").width("100%").removeClass("fancybox-tmp").show();
				b._afterLoad()
			}));
			a.content = d.appendTo(a.inner);
			a.iframe.preload || b._afterLoad()
		},
		_preloadImages: function () {
			var a =
				b.group,
				d = b.current,
				e = a.length,
				c = d.preload ? Math.min(d.preload, e - 1) : 0,
				f, g;
			for (g = 1; g <= c; g += 1) f = a[(d.index + g) % e], "image" === f.type && f.href && ((new Image).src = f.href)
		},
		_afterLoad: function () {
			var a = b.coming,
				d = b.current,
				e, c, k, g, h;
			b.hideLoading();
			if (a && !1 !== b.isActive)
				if (!1 === b.trigger("afterLoad", a, d)) a.wrap.stop(!0).trigger("onReset").remove(), b.coming = null;
				else {
					d && (b.trigger("beforeChange", d), d.wrap.stop(!0).removeClass("fancybox-opened").find(".fancybox-item, .fancybox-nav").remove());
					b.unbindEvents();
					e = a.content;
					c = a.type;
					k = a.scrolling;
					f.extend(b, {
						wrap: a.wrap,
						skin: a.skin,
						outer: a.outer,
						inner: a.inner,
						current: a,
						previous: d
					});
					g = a.href;
					switch (c) {
						case "inline":
						case "ajax":
						case "html":
							a.selector ? e = f("<div>").html(e).find(a.selector) : t(e) && (e.data("fancybox-placeholder") || e.data("fancybox-placeholder", f('<div class="fancybox-placeholder"></div>').insertAfter(e).hide()), e = e.show().detach(), a.wrap.bind("onReset", function () {
								f(this).find(e).length && e.hide().replaceAll(e.data("fancybox-placeholder")).data("fancybox-placeholder",
									!1)
							}));
							break;
						case "image":
							e = a.tpl.image.replace("{href}", g);
							break;
						case "swf":
							e = '<object id="fancybox-swf" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="100%" height="100%"><param name="movie" value="' + g + '"></param>', h = "", f.each(a.swf, function (a, b) {
								e += '<param name="' + a + '" value="' + b + '"></param>';
								h += " " + a + '="' + b + '"'
							}), e += '<embed src="' + g + '" type="application/x-shockwave-flash" width="100%" height="100%"' + h + "></embed></object>"
					}(!t(e) || !e.parent().is(a.inner)) && a.inner.append(e);
					b.trigger("beforeShow");
					a.inner.css("overflow", "yes" === k ? "scroll" : "no" === k ? "hidden" : k);
					b._setDimension();
					b.reposition();
					b.isOpen = !1;
					b.coming = null;
					b.bindEvents();
					if (b.isOpened) {
						if (d.prevMethod) b.transitions[d.prevMethod]()
					} else f(".fancybox-wrap").not(a.wrap).stop(!0).trigger("onReset").remove();
					b.transitions[b.isOpened ? a.nextMethod : a.openMethod]();
					b._preloadImages()
				}
		},
		_setDimension: function () {
			var a = b.getViewport(),
				d = 0,
				e = !1,
				c = !1,
				e = b.wrap,
				k = b.skin,
				g = b.inner,
				h = b.current,
				c = h.width,
				j = h.height,
				m = h.minWidth,
				u = h.minHeight,
				n = h.maxWidth,
				v = h.maxHeight,
				s = h.scrolling,
				q = h.scrollOutside ? h.scrollbarWidth : 0,
				y = h.margin,
				p = l(y[1] + y[3]),
				r = l(y[0] + y[2]),
				z, A, t, D, B, G, C, E, w;
			e.add(k).add(g).width("auto").height("auto").removeClass("fancybox-tmp");
			y = l(k.outerWidth(!0) - k.width());
			z = l(k.outerHeight(!0) - k.height());
			A = p + y;
			t = r + z;
			D = F(c) ? (a.w - A) * l(c) / 100 : c;
			B = F(j) ? (a.h - t) * l(j) / 100 : j;
			if ("iframe" === h.type) {
				if (w = h.content, h.autoHeight && 1 === w.data("ready")) try {
					w[0].contentWindow.document.location && (g.width(D).height(9999), G = w.contents().find("body"), q && G.css("overflow-x",
						"hidden"), B = G.height())
				} catch (H) {}
			} else if (h.autoWidth || h.autoHeight) g.addClass("fancybox-tmp"), h.autoWidth || g.width(D), h.autoHeight || g.height(B), h.autoWidth && (D = g.width()), h.autoHeight && (B = g.height()), g.removeClass("fancybox-tmp");
			c = l(D);
			j = l(B);
			E = D / B;
			m = l(F(m) ? l(m, "w") - A : m);
			n = l(F(n) ? l(n, "w") - A : n);
			u = l(F(u) ? l(u, "h") - t : u);
			v = l(F(v) ? l(v, "h") - t : v);
			G = n;
			C = v;
			h.fitToView && (n = Math.min(a.w - A, n), v = Math.min(a.h - t, v));
			A = a.w - p;
			r = a.h - r;
			h.aspectRatio ? (c > n && (c = n, j = l(c / E)), j > v && (j = v, c = l(j * E)), c < m && (c = m, j = l(c / E)), j < u &&
				(j = u, c = l(j * E))) : (c = Math.max(m, Math.min(c, n)), h.autoHeight && "iframe" !== h.type && (g.width(c), j = g.height()), j = Math.max(u, Math.min(j, v)));
			if (h.fitToView)
				if (g.width(c).height(j), e.width(c + y), a = e.width(), p = e.height(), h.aspectRatio)
					for (;
						(a > A || p > r) && (c > m && j > u) && !(19 < d++);) j = Math.max(u, Math.min(v, j - 10)), c = l(j * E), c < m && (c = m, j = l(c / E)), c > n && (c = n, j = l(c / E)), g.width(c).height(j), e.width(c + y), a = e.width(), p = e.height();
				else c = Math.max(m, Math.min(c, c - (a - A))), j = Math.max(u, Math.min(j, j - (p - r)));
			q && ("auto" === s && j < B && c + y +
				q < A) && (c += q);
			g.width(c).height(j);
			e.width(c + y);
			a = e.width();
			p = e.height();
			e = (a > A || p > r) && c > m && j > u;
			c = h.aspectRatio ? c < G && j < C && c < D && j < B : (c < G || j < C) && (c < D || j < B);
			f.extend(h, {
				dim: {
					width: x(a),
					height: x(p)
				},
				origWidth: D,
				origHeight: B,
				canShrink: e,
				canExpand: c,
				wPadding: y,
				hPadding: z,
				wrapSpace: p - k.outerHeight(!0),
				skinSpace: k.height() - j
			});
			!w && (h.autoHeight && j > u && j < v && !c) && g.height("auto")
		},
		_getPosition: function (a) {
			var d = b.current,
				e = b.getViewport(),
				c = d.margin,
				f = b.wrap.width() + c[1] + c[3],
				g = b.wrap.height() + c[0] + c[2],
				c = {
					position: "absolute",
					top: c[0],
					left: c[3]
				};
			d.autoCenter && d.fixed && !a && g <= e.h && f <= e.w ? c.position = "fixed" : d.locked || (c.top += e.y, c.left += e.x);
			c.top = x(Math.max(c.top, c.top + (e.h - g) * d.topRatio));
			c.left = x(Math.max(c.left, c.left + (e.w - f) * d.leftRatio));
			return c
		},
		_afterZoomIn: function () {
			var a = b.current;
			a && (b.isOpen = b.isOpened = !0, b.wrap.css("overflow", "visible").addClass("fancybox-opened"), b.update(), (a.closeClick || a.nextClick && 1 < b.group.length) && b.inner.css("cursor", "pointer").bind("click.fb", function (d) {
				!f(d.target).is("a") && !f(d.target).parent().is("a") &&
					(d.preventDefault(), b[a.closeClick ? "close" : "next"]())
			}), a.closeBtn && f(a.tpl.closeBtn).appendTo(b.skin).bind("click.fb", function (a) {
				a.preventDefault();
				b.close()
			}), a.arrows && 1 < b.group.length && ((a.loop || 0 < a.index) && f(a.tpl.prev).appendTo(b.outer).bind("click.fb", b.prev), (a.loop || a.index < b.group.length - 1) && f(a.tpl.next).appendTo(b.outer).bind("click.fb", b.next)), b.trigger("afterShow"), !a.loop && a.index === a.group.length - 1 ? b.play(!1) : b.opts.autoPlay && !b.player.isActive && (b.opts.autoPlay = !1, b.play()))
		},
		_afterZoomOut: function (a) {
			a =
				a || b.current;
			f(".fancybox-wrap").trigger("onReset").remove();
			f.extend(b, {
				group: {},
				opts: {},
				router: !1,
				current: null,
				isActive: !1,
				isOpened: !1,
				isOpen: !1,
				isClosing: !1,
				wrap: null,
				skin: null,
				outer: null,
				inner: null
			});
			b.trigger("afterClose", a)
		}
	});
	b.transitions = {
		getOrigPosition: function () {
			var a = b.current,
				d = a.element,
				e = a.orig,
				c = {},
				f = 50,
				g = 50,
				h = a.hPadding,
				j = a.wPadding,
				m = b.getViewport();
			!e && (a.isDom && d.is(":visible")) && (e = d.find("img:first"), e.length || (e = d));
			t(e) ? (c = e.offset(), e.is("img") && (f = e.outerWidth(), g = e.outerHeight())) :
				(c.top = m.y + (m.h - g) * a.topRatio, c.left = m.x + (m.w - f) * a.leftRatio);
			if ("fixed" === b.wrap.css("position") || a.locked) c.top -= m.y, c.left -= m.x;
			return c = {
				top: x(c.top - h * a.topRatio),
				left: x(c.left - j * a.leftRatio),
				width: x(f + j),
				height: x(g + h)
			}
		},
		step: function (a, d) {
			var e, c, f = d.prop;
			c = b.current;
			var g = c.wrapSpace,
				h = c.skinSpace;
			if ("width" === f || "height" === f) e = d.end === d.start ? 1 : (a - d.start) / (d.end - d.start), b.isClosing && (e = 1 - e), c = "width" === f ? c.wPadding : c.hPadding, c = a - c, b.skin[f](l("width" === f ? c : c - g * e)), b.inner[f](l("width" ===
				f ? c : c - g * e - h * e))
		},
		zoomIn: function () {
			var a = b.current,
				d = a.pos,
				e = a.openEffect,
				c = "elastic" === e,
				k = f.extend({
					opacity: 1
				}, d);
			delete k.position;
			c ? (d = this.getOrigPosition(), a.openOpacity && (d.opacity = 0.1)) : "fade" === e && (d.opacity = 0.1);
			b.wrap.css(d).animate(k, {
				duration: "none" === e ? 0 : a.openSpeed,
				easing: a.openEasing,
				step: c ? this.step : null,
				complete: b._afterZoomIn
			})
		},
		zoomOut: function () {
			var a = b.current,
				d = a.closeEffect,
				e = "elastic" === d,
				c = {
					opacity: 0.1
				};
			e && (c = this.getOrigPosition(), a.closeOpacity && (c.opacity = 0.1));
			b.wrap.animate(c, {
				duration: "none" === d ? 0 : a.closeSpeed,
				easing: a.closeEasing,
				step: e ? this.step : null,
				complete: b._afterZoomOut
			})
		},
		changeIn: function () {
			var a = b.current,
				d = a.nextEffect,
				e = a.pos,
				c = {
					opacity: 1
				},
				f = b.direction,
				g;
			e.opacity = 0.1;
			"elastic" === d && (g = "down" === f || "up" === f ? "top" : "left", "down" === f || "right" === f ? (e[g] = x(l(e[g]) - 200), c[g] = "+=200px") : (e[g] = x(l(e[g]) + 200), c[g] = "-=200px"));
			"none" === d ? b._afterZoomIn() : b.wrap.css(e).animate(c, {
				duration: a.nextSpeed,
				easing: a.nextEasing,
				complete: b._afterZoomIn
			})
		},
		changeOut: function () {
			var a =
				b.previous,
				d = a.prevEffect,
				e = {
					opacity: 0.1
				},
				c = b.direction;
			"elastic" === d && (e["down" === c || "up" === c ? "top" : "left"] = ("up" === c || "left" === c ? "-" : "+") + "=200px");
			a.wrap.animate(e, {
				duration: "none" === d ? 0 : a.prevSpeed,
				easing: a.prevEasing,
				complete: function () {
					f(this).trigger("onReset").remove()
				}
			})
		}
	};
	b.helpers.overlay = {
		defaults: {
			closeClick: !0,
			speedOut: 200,
			showEarly: !0,
			css: {},
			locked: !s,
			fixed: !0
		},
		overlay: null,
		fixed: !1,
		create: function (a) {
			a = f.extend({}, this.defaults, a);
			this.overlay && this.close();
			this.overlay = f('<div class="fancybox-overlay"></div>').appendTo("body");
			this.fixed = !1;
			a.fixed && b.defaults.fixed && (this.overlay.addClass("fancybox-overlay-fixed"), this.fixed = !0)
		},
		open: function (a) {
			var d = this;
			a = f.extend({}, this.defaults, a);
			this.overlay ? this.overlay.unbind(".overlay").width("auto").height("auto") : this.create(a);
			this.fixed || (q.bind("resize.overlay", f.proxy(this.update, this)), this.update());
			a.closeClick && this.overlay.bind("click.overlay", function (a) {
				f(a.target).hasClass("fancybox-overlay") && (b.isActive ? b.close() : d.close())
			});
			this.overlay.css(a.css).show()
		},
		close: function () {
			f(".fancybox-overlay").remove();
			q.unbind("resize.overlay");
			this.overlay = null;
			!1 !== this.margin && (f("body").css("margin-right", this.margin), this.margin = !1);
			this.el && this.el.removeClass("fancybox-lock")
		},
		update: function () {
			var a = "100%",
				b;
			this.overlay.width(a).height("100%");
			H ? (b = Math.max(z.documentElement.offsetWidth, z.body.offsetWidth), n.width() > b && (a = n.width())) : n.width() > q.width() && (a = n.width());
			this.overlay.width(a).height(n.height())
		},
		onReady: function (a, b) {
			f(".fancybox-overlay").stop(!0,
				!0);
			this.overlay || (this.margin = n.height() > q.height() || "scroll" === f("body").css("overflow-y") ? f("body").css("margin-right") : !1, this.el = z.all && !z.querySelector ? f("html") : f("body"), this.create(a));
			a.locked && this.fixed && (b.locked = this.overlay.append(b.wrap), b.fixed = !1);
			!0 === a.showEarly && this.beforeShow.apply(this, arguments)
		},
		beforeShow: function (a, b) {
			b.locked && (this.el.addClass("fancybox-lock"), !1 !== this.margin && f("body").css("margin-right", l(this.margin) + b.scrollbarWidth));
			this.open(a)
		},
		onUpdate: function () {
			this.fixed ||
				this.update()
		},
		afterClose: function (a) {
			this.overlay && !b.isActive && this.overlay.fadeOut(a.speedOut, f.proxy(this.close, this))
		}
	};
	b.helpers.title = {
		defaults: {
			type: "float",
			position: "bottom"
		},
		beforeShow: function (a) {
			var d = b.current,
				e = d.title,
				c = a.type;
			f.isFunction(e) && (e = e.call(d.element, d));
			if (p(e) && "" !== f.trim(e)) {
				d = f('<div class="fancybox-title fancybox-title-' + c + '-wrap">' + e + "</div>");
				switch (c) {
					case "inside":
						c = b.skin;
						break;
					case "outside":
						c = b.wrap;
						break;
					case "over":
						c = b.inner;
						break;
					default:
						c = b.skin, d.appendTo("body"),
							H && d.width(d.width()), d.wrapInner('<span class="child"></span>'), b.current.margin[2] += Math.abs(l(d.css("margin-bottom")))
				}
				d["top" === a.position ? "prependTo" : "appendTo"](c)
			}
		}
	};
	f.fn.fancybox = function (a) {
		var d, e = f(this),
			c = this.selector || "",
			k = function (g) {
				var h = f(this).blur(),
					j = d,
					k, l;
				!g.ctrlKey && (!g.altKey && !g.shiftKey && !g.metaKey) && !h.is(".fancybox-wrap") && (k = a.groupAttr || "data-fancybox-group", l = h.attr(k), l || (k = "rel", l = h.get(0)[k]), l && ("" !== l && "nofollow" !== l) && (h = c.length ? f(c) : e, h = h.filter("[" + k + '="' + l +
					'"]'), j = h.index(this)), a.index = j, !1 !== b.open(h, a) && g.preventDefault())
			};
		a = a || {};
		d = a.index || 0;
		!c || !1 === a.live ? e.unbind("click.fb-start").bind("click.fb-start", k) : n.undelegate(c, "click.fb-start").delegate(c + ":not('.fancybox-item, .fancybox-nav')", "click.fb-start", k);
		this.filter("[data-fancybox-start=1]").trigger("click");
		return this
	};
	n.ready(function () {
		f.scrollbarWidth === r && (f.scrollbarWidth = function () {
			var a = f('<div style="width:50px;height:50px;overflow:auto"><div/></div>').appendTo("body"),
				b = a.children(),
				b = b.innerWidth() - b.height(99).innerWidth();
			a.remove();
			return b
		});
		if (f.support.fixedPosition === r) {
			var a = f.support,
				d = f('<div style="position:fixed;top:20px;"></div>').appendTo("body"),
				e = 20 === d[0].offsetTop || 15 === d[0].offsetTop;
			d.remove();
			a.fixedPosition = e
		}
		f.extend(b.defaults, {
			scrollbarWidth: f.scrollbarWidth(),
			fixed: f.support.fixedPosition,
			parent: f("body")
		})
	})
})(window, document, jQuery);

! function (a) {
	function c() {
		a(".crf-sm.opened").length && (a(".crf-s.opened").removeClass("opened"), a(".crf-sm.opened").removeClass("opened").hide(), b.close.call())
	}
	a.fn.crfi = function () {
		this.change(function () {
			"radio" == a(this).attr("type") && a("input[name=" + a(this).attr("name") + "]").not(this).next(".crf").removeClass("checked"), a(this).prop("checked") ? a(this).next().addClass("checked") : a(this).next().removeClass("checked")
		}), this.not(".crf-i").each(function (b) {
			a(this).attr("id", "crf-input-" + b).css({
				position: "absolute",
				left: "-9999em"
			}).addClass("crf-i").next("label").addClass("crf").attr("for", "crf-input-" + b), a(this).prop("checked") && a(this).next().addClass("checked")
		})
	};
	var b, d = {
		init: function (d) {
			b = a.extend({
				select: function () {},
				done: function () {},
				open: function () {},
				close: function () {}
			}, d), a(document).unbind("click.crfs").on("click.crfs", ".crf-s", function () {
				var d = a("div[data-id=" + a(this).attr("id") + "]");
				if (d.is(":visible")) return c(), !1;
				c();
				var e = a(this).outerHeight(),
					f = a(this).find("select").attr("class"),
					g = a(this).offset(),
					h = d.show().height();
				d.css({
					position: "absolute",
					left: "-9999em"
				}), a(this).addClass("opened"), d.addClass("opened " + f).css({
					left: g.left,
					top: g.top + e + h > a(document).height() ? g.top - h : g.top + e,
					width: a(this).outerWidth()
				}).show(), b.open.call()
			}), a(document).click(function (b) {
				return a(b.target).closest(".crf-sm.opened, .crf-s.opened").length > 0 ? !1 : (c(), void 0)
			}), a(window).resize(function () {
				var b = a(".crf-s.opened");
				if (b.length) {
					var c = a(".crf-sm.opened"),
						d = b.outerHeight(),
						e = b.offset(),
						f = c.height();
					c.css({
						left: e.left,
						top: e.top + d + f > a(document).height() ? e.top - f : e.top + d,
						width: b.outerWidth()
					})
				}
			}), a(document).on("click.crfs", ".crf-sm li", function () {
				var d = a(this).parentsUntil(".crf-sm").parent().attr("data-id"),
					e = a("#" + d).attr("class");
				return a("#" + d).attr("class", "crf-s").addClass(a(this).attr("class").replace("selected", "")).addClass(e.replace("hided-s", "").replace("opened", "")).find(".option").text(a(this).text()), a("#" + d).find("select").children().prop("selected", !1).eq(a(this).index()).prop("selected", !0).change(), a(this).parentsUntil(".crf-sm").parent().find(".selected").removeClass("selected"), a(this).addClass("selected"), c(), b.select.call(), !1
			}), this.not(".hided-s").each(function (c) {
				a(this).addClass("hided-s").hide().wrap("<span class='crf-s " + a(this).attr("class") + "' id='crf-s-" + c + "' />").parent().append("<span class='option'>" + a(this).find("option:selected").text() + "</span>");
				var d = a("<ul></ul>");
				a(this).children().each(function () {
					d.append("<li class='" + (void 0 != a(this).attr("class") ? a(this).attr("class") + "" : "") + (a(this).is(":selected") ? " selected" : "") + "'><span class='link'>" + a(this).text() + "</span></li>")
				}), a("<div class='crf-sm' data-id='crf-s-" + c + "'/>").append(d).appendTo("body"), b.done.call()
			})
		},
		hide: function () {
			c()
		}
	};
	a.fn.crfs = function (a) {
		return d[a] ? d[a].apply(this, Array.prototype.slice.call(arguments, 1)) : "object" != typeof a && a ? void 0 : d.init.apply(this, arguments)
	}
}(jQuery);
