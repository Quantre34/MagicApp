/*!For license information please see home.js.LICENSE.txt*/
(() => {
    var e, t = {
            708: function (e) {
                e.exports = function () {
                    "use strict";

                    function e(e, t) {
                        if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                    }

                    function t(e, t) {
                        for (var n = 0; n < t.length; n++) {
                            var i = t[n];
                            i.enumerable = i.enumerable || !1, i.configurable = !0, "value" in i && (i.writable = !0), Object.defineProperty(e, i.key, i)
                        }
                    }

                    function n(e, n, i) {
                        return n && t(e.prototype, n), i && t(e, i), e
                    }

                    function i(e) {
                        return function (e) {
                            if (Array.isArray(e)) return s(e)
                        }(e) || function (e) {
                            if ("undefined" != typeof Symbol && null != e[Symbol.iterator] || null != e["@@iterator"]) return Array.from(e)
                        }(e) || function (e, t) {
                            if (e) {
                                if ("string" == typeof e) return s(e, t);
                                var n = Object.prototype.toString.call(e).slice(8, -1);
                                return "Object" === n && e.constructor && (n = e.constructor.name), "Map" === n || "Set" === n ? Array.from(e) : "Arguments" === n || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n) ? s(e, t) : void 0
                            }
                        }(e) || function () {
                            throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")
                        }()
                    }

                    function s(e, t) {
                        (null == t || t > e.length) && (t = e.length);
                        for (var n = 0, i = new Array(t); n < t; n++) i[n] = e[n];
                        return i
                    }
                    var r = !1,
                        o = function () {
                            return !!window.Promise
                        };

                    function a(e) {
                        return e && e.__esModule && Object.prototype.hasOwnProperty.call(e, "default") ? e.default : e
                    }
                    var l = {},
                        c = {};
                    ! function (e) {
                        Object.defineProperty(e, "__esModule", {
                            value: !0
                        }), e.default = void 0, e.default = function (e) {
                            return "[object NodeList]" === Object.prototype.toString.call(e)
                        }
                    }(c);
                    var d = {};
                    ! function (e) {
                        Object.defineProperty(e, "__esModule", {
                            value: !0
                        }), e.default = void 0, e.default = function (e) {
                            return "Array" === Object.prototype.toString.call(e).slice(8, -1)
                        }
                    }(d),
                    function (e) {
                        Object.defineProperty(e, "__esModule", {
                            value: !0
                        }), e.default = void 0;
                        var t = i(c),
                            n = i(d);

                        function i(e) {
                            return e && e.__esModule ? e : {
                                default: e
                            }
                        }
                        e.default = function (e) {
                            return (0, n.default)(e) ? e : (0, t.default)(e) ? Array.from ? Array.from(e) : Array.prototype.slice.call(e) : new Array(e)
                        }
                    }(l);
                    var u = a(l),
                        p = "visibility: hidden;",
                        f = {},
                        h = {};
                    ! function (e) {
                        Object.defineProperty(e, "__esModule", {
                            value: !0
                        }), e.default = void 0, e.default = function (e) {
                            return "Promise" === Object.prototype.toString.call(e).slice(8, -1)
                        }
                    }(h),
                    function (e) {
                        Object.defineProperty(e, "__esModule", {
                            value: !0
                        }), e.default = void 0;
                        var t, n = (t = h) && t.__esModule ? t : {
                            default: t
                        };
                        e.default = function (e) {
                            var t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : 0;
                            return (0, n.default)(e) ? e : new Promise((function (n) {
                                e(), setTimeout(n, t)
                            }))
                        }
                    }(f);
                    var m = a(f),
                        g = ["animated", "animate__animated"],
                        v = function () {
                            function t(n) {
                                e(this, t), this.swiper = n, this.container = function (e) {
                                    if (e.el) return e.el;
                                    if (e.container) return e.container[0];
                                    throw new Error("Illegal swiper instance")
                                }(this.swiper), this.animationElements = [].concat(i(u(this.container.querySelectorAll("[data-swiper-animation]"))), i(u(this.container.querySelectorAll("[data-swiper-animation-once]")))), this.activeElements = [], this.animationElements.forEach((function (e) {
                                    e.animationData = {
                                        styleCache: e.attributes.style ? p + e.style.cssText : p,
                                        effect: e.dataset.swiperAnimation || e.dataset.swiperAnimationOnce || "",
                                        duration: e.dataset.duration || ".5s",
                                        delay: e.dataset.delay || ".5s",
                                        outEffect: e.dataset.swiperOutAnimation || "",
                                        outDuration: e.dataset.outDuration || ".5s",
                                        isRecovery: !0,
                                        runOnce: !!e.dataset.swiperAnimationOnce
                                    }, e.style.cssText = e.animationData.styleCache
                                }))
                            }
                            return n(t, [{
                                key: "animate",
                                value: function () {
                                    var e = this;
                                    return Promise.resolve().then((function () {
                                        return t = e.activeElements.map((function (e) {
                                            return e.animationData.isRecovery ? Promise.resolve() : e.animationData.outEffect ? m((function () {
                                                e.style.cssText = e.animationData.styleCache, e.style.visibility = "visible", e.style.cssText += " animation-duration:".concat(e.animationData.outDuration, "; -webkit-animation-duration:").concat(e.animationData.outDuration, ";"), e.classList.add(e.animationData.outEffect, "animated")
                                            }), 500) : Promise.resolve()
                                        })), Promise.all(t);
                                        var t
                                    })).then((function () {
                                        return t = e.activeElements.map((function (e) {
                                            return e.animationData.isRecovery || e.animationData.runOnce ? Promise.resolve() : m((function () {
                                                var t;
                                                e.style.cssText = e.animationData.styleCache, (t = e.classList).remove.apply(t, i([e.animationData.effect, e.animationData.outEffect].concat(i(g)).filter((function (e) {
                                                    return !!e
                                                })))), e.animationData.isRecovery = !0
                                            }))
                                        })), Promise.all(t);
                                        var t
                                    })).then((function () {
                                        return t = e._updateActiveElements().map((function (e) {
                                            return e.animationData ? m((function () {
                                                var t;
                                                e.style.visibility = "visible", e.style.cssText += " animation-duration:".concat(e.animationData.duration, "; -webkit-animation-duration:").concat(e.animationData.duration, "; animation-delay:").concat(e.animationData.delay, "; -webkit-animation-delay:").concat(e.animationData.delay, ";"), (t = e.classList).add.apply(t, [e.animationData.effect].concat(i(g))), e.animationData.isRecovery = !1
                                            })) : Promise.resolve()
                                        })), Promise.all(t);
                                        var t
                                    }))
                                }
                            }, {
                                key: "_updateActiveElements",
                                value: function () {
                                    return this.activeElements = [].concat(i(u(this.swiper.slides[this.swiper.activeIndex].querySelectorAll("[data-swiper-animation]"))), i(u(this.swiper.slides[this.swiper.activeIndex].querySelectorAll("[data-swiper-animation-once]")))), this.activeElements
                                }
                            }]), t
                        }();
                    return function () {
                        function t() {
                            e(this, t), this.animations = null, o() || function () {
                                if (!r && !o()) {
                                    var e = document.createElement("script");
                                    e.type = "text/javascript", e.src = "../cdn.jsdelivr.net/npm/promise-polyfill%408/dist/polyfill.min.js", document.querySelector("head").appendChild(e), r = !0
                                }
                            }()
                        }
                        return n(t, [{
                            key: "init",
                            value: function (e) {
                                return this.animations || (this.animations = new v(e)), this
                            }
                        }, {
                            key: "animate",
                            value: function () {
                                var e = this;
                                return o() ? this.animations.animate() : setTimeout((function () {
                                    return e.animate()
                                }), 500)
                            }
                        }]), t
                    }()
                }()
            },
            213: e => {
                window,
                e.exports = function (e) {
                    var t = {};

                    function n(i) {
                        if (t[i]) return t[i].exports;
                        var s = t[i] = {
                            i,
                            l: !1,
                            exports: {}
                        };
                        return e[i].call(s.exports, s, s.exports, n), s.l = !0, s.exports
                    }
                    return n.m = e, n.c = t, n.d = function (e, t, i) {
                        n.o(e, t) || Object.defineProperty(e, t, {
                            enumerable: !0,
                            get: i
                        })
                    }, n.r = function (e) {
                        "undefined" != typeof Symbol && Symbol.toStringTag && Object.defineProperty(e, Symbol.toStringTag, {
                            value: "Module"
                        }), Object.defineProperty(e, "__esModule", {
                            value: !0
                        })
                    }, n.t = function (e, t) {
                        if (1 & t && (e = n(e)), 8 & t) return e;
                        if (4 & t && "object" == typeof e && e && e.__esModule) return e;
                        var i = Object.create(null);
                        if (n.r(i), Object.defineProperty(i, "default", {
                                enumerable: !0,
                                value: e
                            }), 2 & t && "string" != typeof e)
                            for (var s in e) n.d(i, s, function (t) {
                                return e[t]
                            }.bind(null, s));
                        return i
                    }, n.n = function (e) {
                        var t = e && e.__esModule ? function () {
                            return e.default
                        } : function () {
                            return e
                        };
                        return n.d(t, "a", t), t
                    }, n.o = function (e, t) {
                        return Object.prototype.hasOwnProperty.call(e, t)
                    }, n.p = "", n(n.s = 0)
                }([function (e, t, n) {
                    "use strict";
                    n.r(t);
                    var i, s = "fslightbox-",
                        r = "".concat(s, "styles"),
                        o = "".concat(s, "cursor-grabbing"),
                        a = "".concat(s, "full-dimension"),
                        l = "".concat(s, "flex-centered"),
                        c = "".concat(s, "open"),
                        d = "".concat(s, "transform-transition"),
                        u = "".concat(s, "absoluted"),
                        p = "".concat(s, "slide-btn"),
                        f = "".concat(p, "-container"),
                        h = "".concat(s, "fade-in"),
                        m = "".concat(s, "fade-out"),
                        g = h + "-strong",
                        v = m + "-strong",
                        b = "".concat(s, "opacity-"),
                        y = "".concat(b, "1"),
                        w = "".concat(s, "source");

                    function x(e) {
                        return (x = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (e) {
                            return typeof e
                        } : function (e) {
                            return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : typeof e
                        })(e)
                    }

                    function _(e) {
                        var t, n = e.props,
                            i = 0,
                            s = {};
                        this.getSourceTypeFromLocalStorageByUrl = function (e) {
                            return t[e] ? t[e] : r(e)
                        }, this.handleReceivedSourceTypeForUrl = function (e, n) {
                            !1 === s[n] && (i--, "invalid" !== e ? s[n] = e : delete s[n], 0 === i && (function (e, t) {
                                for (var n in t) e[n] = t[n]
                            }(t, s), localStorage.setItem("fslightbox-types", JSON.stringify(t))))
                        };
                        var r = function (e) {
                            i++, s[e] = !1
                        };
                        n.disableLocalStorage ? (this.getSourceTypeFromLocalStorageByUrl = function () {}, this.handleReceivedSourceTypeForUrl = function () {}) : (t = JSON.parse(localStorage.getItem("fslightbox-types"))) || (t = {}, this.getSourceTypeFromLocalStorageByUrl = r)
                    }

                    function C(e, t, n, i) {
                        var s = e.data,
                            r = e.elements.sources,
                            o = n / i,
                            a = 0;
                        this.adjustSize = function () {
                            if ((a = s.maxSourceWidth / o) < s.maxSourceHeight) return n < s.maxSourceWidth && (a = i), l();
                            a = i > s.maxSourceHeight ? s.maxSourceHeight : i, l()
                        };
                        var l = function () {
                            r[t].style.width = a * o + "px", r[t].style.height = a + "px"
                        }
                    }

                    function E(e, t) {
                        var n = this,
                            i = e.collections.sourceSizers,
                            s = e.elements,
                            r = s.sourceAnimationWrappers,
                            o = s.sourceMainWrappers,
                            a = s.sources,
                            l = e.resolve;

                        function c(e, n) {
                            i[t] = l(C, [t, e, n]), i[t].adjustSize()
                        }
                        this.runActions = function (e, i) {
                            a[t].classList.add(y), r[t].classList.add(g), o[t].removeChild(o[t].firstChild), c(e, i), n.runActions = c
                        }
                    }

                    function T(e, t) {
                        var n, i = this,
                            s = e.elements.sources,
                            r = e.props,
                            o = (0, e.resolve)(E, [t]);
                        this.handleImageLoad = function (e) {
                            var t = e.target,
                                n = t.naturalWidth,
                                i = t.naturalHeight;
                            o.runActions(n, i)
                        }, this.handleVideoLoad = function (e) {
                            var t = e.target,
                                i = t.videoWidth,
                                s = t.videoHeight;
                            n = !0, o.runActions(i, s)
                        }, this.handleNotMetaDatedVideoLoad = function () {
                            n || i.handleYoutubeLoad()
                        }, this.handleYoutubeLoad = function () {
                            var e = 1920,
                                t = 1080;
                            r.maxYoutubeDimensions && (e = r.maxYoutubeDimensions.width, t = r.maxYoutubeDimensions.height), o.runActions(e, t)
                        }, this.handleCustomLoad = function () {
                            setTimeout((function () {
                                var e = s[t];
                                o.runActions(e.offsetWidth, e.offsetHeight)
                            }))
                        }
                    }

                    function S(e, t, n) {
                        var i = e.elements.sources,
                            s = e.props.customClasses,
                            r = s[t] ? s[t] : "";
                        i[t].className = n + " " + r
                    }

                    function k(e, t) {
                        var n = e.elements.sources,
                            i = e.props.customAttributes;
                        for (var s in i[t]) n[t].setAttribute(s, i[t][s])
                    }

                    function A(e, t) {
                        var n = e.collections.sourceLoadHandlers,
                            i = e.elements,
                            s = i.sources,
                            r = i.sourceAnimationWrappers,
                            o = e.props.sources;
                        s[t] = document.createElement("img"), S(e, t, w), s[t].src = o[t], s[t].onload = n[t].handleImageLoad, k(e, t), r[t].appendChild(s[t])
                    }

                    function L(e, t) {
                        var n = e.collections.sourceLoadHandlers,
                            i = e.elements,
                            s = i.sources,
                            r = i.sourceAnimationWrappers,
                            o = e.props,
                            a = o.sources,
                            l = o.videosPosters;
                        s[t] = document.createElement("video"), S(e, t, w), s[t].src = a[t], s[t].onloadedmetadata = function (e) {
                            n[t].handleVideoLoad(e)
                        }, s[t].controls = !0, k(e, t), l[t] && (s[t].poster = l[t]);
                        var c = document.createElement("source");
                        c.src = a[t], s[t].appendChild(c), setTimeout(n[t].handleNotMetaDatedVideoLoad, 3e3), r[t].appendChild(s[t])
                    }

                    function O(e, t) {
                        var n = e.collections.sourceLoadHandlers,
                            i = e.elements,
                            r = i.sources,
                            o = i.sourceAnimationWrappers,
                            a = e.props.sources;
                        r[t] = document.createElement("iframe"), S(e, t, "".concat(w, " ").concat(s, "youtube-iframe")), r[t].src = "https://www.youtube.com/embed/".concat(a[t].match(/^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/)[2], "?enablejsapi=1"), r[t].allowFullscreen = !0, k(e, t), o[t].appendChild(r[t]), n[t].handleYoutubeLoad()
                    }

                    function P(e, t) {
                        var n = e.collections.sourceLoadHandlers,
                            i = e.elements,
                            s = i.sources,
                            r = i.sourceAnimationWrappers,
                            o = e.props.sources;
                        s[t] = o[t], S(e, t, "".concat(s[t].className, " ").concat(w)), r[t].appendChild(s[t]), n[t].handleCustomLoad()
                    }

                    function D(e, t) {
                        var n = e.elements,
                            i = n.sources,
                            r = n.sourceAnimationWrappers,
                            o = n.sourceMainWrappers;
                        e.props.sources, i[t] = document.createElement("div"), i[t].className = "".concat(s, "invalid-file-wrapper ").concat(l), i[t].innerHTML = "Invalid source", r[t].classList.add(g), r[t].appendChild(i[t]), o[t].removeChild(o[t].firstChild)
                    }

                    function M(e) {
                        var t = e.collections,
                            n = t.sourceLoadHandlers,
                            i = t.sourcesRenderFunctions,
                            s = e.core.sourceDisplayFacade,
                            r = e.resolve;
                        this.runActionsForSourceTypeAndIndex = function (t, o) {
                            var a;
                            switch ("invalid" !== t && (n[o] = r(T, [o])), t) {
                                case "image":
                                    a = A;
                                    break;
                                case "video":
                                    a = L;
                                    break;
                                case "youtube":
                                    a = O;
                                    break;
                                case "custom":
                                    a = P;
                                    break;
                                default:
                                    a = D
                            }
                            i[o] = function () {
                                return a(e, o)
                            }, s.displaySourcesWhichShouldBeDisplayed()
                        }
                    }

                    function N() {
                        var e, t, n, i = function (e) {
                                var t = document.createElement("a");
                                return t.href = e, "www.youtube.com" === t.hostname
                            },
                            s = function (e) {
                                return e.slice(0, e.indexOf("index.html"))
                            };

                        function r() {
                            if (4 !== n.readyState) {
                                if (2 === n.readyState) {
                                    var e;
                                    switch (s(n.getResponseHeader("content-type"))) {
                                        case "image":
                                            e = "image";
                                            break;
                                        case "video":
                                            e = "video";
                                            break;
                                        default:
                                            e = "invalid"
                                    }
                                    n.onreadystatechange = null, n.abort(), t(e)
                                }
                            } else t("invalid")
                        }
                        this.setUrlToCheck = function (t) {
                            e = t
                        }, this.getSourceType = function (s) {
                            if (i(e)) return s("youtube");
                            t = s, (n = new XMLHttpRequest).onreadystatechange = r, n.open("GET.html", e, !0), n.send()
                        }
                    }

                    function I(e, t, n) {
                        var i = e.props,
                            s = i.types,
                            r = i.type,
                            o = i.sources,
                            a = e.resolve;
                        this.getTypeSetByClientForIndex = function (e) {
                            var t;
                            return s && s[e] ? t = s[e] : r && (t = r), t
                        }, this.retrieveTypeWithXhrForIndex = function (e) {
                            var i = a(N);
                            i.setUrlToCheck(o[e]), i.getSourceType((function (i) {
                                t.handleReceivedSourceTypeForUrl(i, o[e]), n.runActionsForSourceTypeAndIndex(i, e)
                            }))
                        }
                    }

                    function j(e, t) {
                        var n = e.componentsServices.hideSourceLoaderIfNotYetCollection,
                            i = e.elements,
                            s = i.sourceWrappersContainer,
                            r = i.sourceMainWrappers;
                        r[t] = document.createElement("div"), r[t].className = "".concat(u, " ").concat(a, " ").concat(l), r[t].innerHTML = '<div class="fslightbox-loader"><div></div><div></div><div></div><div></div></div>';
                        var o = r[t].firstChild;
                        n[t] = function () {
                                r[t].contains(o) && r[t].removeChild(o)
                            }, s.appendChild(r[t]),
                            function (e, t) {
                                var n = e.elements,
                                    i = n.sourceMainWrappers,
                                    s = n.sourceAnimationWrappers;
                                s[t] = document.createElement("div"), i[t].appendChild(s[t])
                            }(e, t)
                    }

                    function $(e, t, n, i) {
                        var r = document.createElementNS("http://www.w3.org/2000/svg", "svg");
                        r.setAttributeNS(null, "width", t), r.setAttributeNS(null, "height", t), r.setAttributeNS(null, "viewBox", n);
                        var o = document.createElementNS("http://www.w3.org/2000/svg", "path");
                        return o.setAttributeNS(null, "class", "".concat(s, "svg-path")), o.setAttributeNS(null, "d", i), r.appendChild(o), e.appendChild(r), r
                    }

                    function z(e, t) {
                        var n = document.createElement("div");
                        return n.className = "".concat(s, "toolbar-button ").concat(l), n.title = t, e.appendChild(n), n
                    }

                    function H(e) {
                        var t = e.props.sources,
                            n = e.elements.container,
                            i = document.createElement("div");
                        i.className = "".concat(s, "nav"), n.appendChild(i),
                            function (e, t) {
                                var n = document.createElement("div");
                                n.className = "".concat(s, "toolbar"), t.appendChild(n),
                                    function (e, t) {
                                        var n = e.componentsServices,
                                            i = e.core.fullscreenToggler,
                                            s = e.data,
                                            r = "M4.5 11H3v4h4v-1.5H4.5V11zM3 7h1.5V4.5H7V3H3v4zm10.5 6.5H11V15h4v-4h-1.5v2.5zM11 3v1.5h2.5V7H15V3h-4z",
                                            o = z(t);
                                        o.title = "Enter fullscreen";
                                        var a = $(o, "20px", "0 0 18 18", r);
                                        n.enterFullscreen = function () {
                                            s.isFullscreenOpen = !0, o.title = "Exit fullscreen", a.setAttributeNS(null, "width", "24px"), a.setAttributeNS(null, "height", "24px"), a.setAttributeNS(null, "viewBox", "0 0 950 1024"), a.firstChild.setAttributeNS(null, "d", "M682 342h128v84h-212v-212h84v128zM598 810v-212h212v84h-128v128h-84zM342 342v-128h84v212h-212v-84h128zM214 682v-84h212v212h-84v-128h-128z")
                                        }, n.exitFullscreen = function () {
                                            s.isFullscreenOpen = !1, o.title = "Enter fullscreen", a.setAttributeNS(null, "width", "20px"), a.setAttributeNS(null, "height", "20px"), a.setAttributeNS(null, "viewBox", "0 0 18 18"), a.firstChild.setAttributeNS(null, "d", r)
                                        }, o.onclick = function () {
                                            s.isFullscreenOpen ? i.exitFullscreen() : i.enterFullscreen()
                                        }
                                    }(e, n),
                                    function (e, t) {
                                        var n = z(t, "Close");
                                        n.onclick = e.core.lightboxCloser.closeLightbox, $(n, "20px", "0 0 24 24", "M 4.7070312 3.2929688 L 3.2929688 4.7070312 L 10.585938 12 L 3.2929688 19.292969 L 4.7070312 20.707031 L 12 13.414062 L 19.292969 20.707031 L 20.707031 19.292969 L 13.414062 12 L 20.707031 4.7070312 L 19.292969 3.2929688 L 12 10.585938 L 4.7070312 3.2929688 z")
                                    }(e, n)
                            }(e, i), t.length > 1 && function (e, t) {
                                var n = e.componentsServices,
                                    i = e.props.sources,
                                    r = (e.stageIndexes, document.createElement("div"));
                                r.className = "".concat(s, "slide-number-container");
                                var o = document.createElement("div");
                                o.className = l;
                                var a = document.createElement("span");
                                n.setSlideNumber = function (e) {
                                    return a.innerHTML = e
                                };
                                var c = document.createElement("span");
                                c.className = "".concat(s, "slash");
                                var d = document.createElement("div");
                                d.innerHTML = i.length, r.appendChild(o), o.appendChild(a), o.appendChild(c), o.appendChild(d), t.appendChild(r), setTimeout((function () {
                                    o.offsetWidth > 55 && (r.style.justifyContent = "flex-start")
                                }))
                            }(e, i)
                    }

                    function F(e, t) {
                        var n = this,
                            i = e.elements.sourceMainWrappers,
                            s = e.props,
                            r = 0;
                        this.byValue = function (e) {
                            return r = e, n
                        }, this.negative = function () {
                            o(-a())
                        }, this.zero = function () {
                            o(0)
                        }, this.positive = function () {
                            o(a())
                        };
                        var o = function (e) {
                                i[t].style.transform = "translateX(".concat(e + r, "px)"), r = 0
                            },
                            a = function () {
                                return (1 + s.slideDistance) * innerWidth
                            }
                    }

                    function B(e, t, n, i) {
                        var s = e.elements.container,
                            r = n.charAt(0).toUpperCase() + n.slice(1),
                            o = document.createElement("div");
                        o.className = "".concat(f, " ").concat(f, "-").concat(n), o.title = "".concat(r, " slide"), o.onclick = t,
                            function (e, t) {
                                var n = document.createElement("div");
                                n.className = "".concat(p, " ").concat(l), $(n, "20px", "0 0 20 20", t), e.appendChild(n)
                            }(o, i), s.appendChild(o)
                    }

                    function q(e, t) {
                        var n = e.classList;
                        n.contains(t) && n.remove(t)
                    }

                    function R(e) {
                        var t = this,
                            n = e.core,
                            i = n.eventsDispatcher,
                            s = n.fullscreenToggler,
                            r = n.globalEventsController,
                            o = n.scrollbarRecompensor,
                            a = e.data,
                            l = e.elements,
                            d = e.props,
                            u = e.sourcePointerProps;
                        this.isLightboxFadingOut = !1, this.runActions = function () {
                            t.isLightboxFadingOut = !0, l.container.classList.add(v), r.removeListeners(), d.exitFullscreenOnClose && a.isFullscreenOpen && s.exitFullscreen(), setTimeout((function () {
                                t.isLightboxFadingOut = !1, u.isPointering = !1, l.container.classList.remove(v), document.documentElement.classList.remove(c), o.removeRecompense(), document.body.removeChild(l.container), i.dispatch("onClose")
                            }), 270)
                        }
                    }

                    function V(e) {
                        var t = e.core,
                            n = t.lightboxCloser,
                            i = t.fullscreenToggler,
                            s = t.slideChangeFacade;
                        this.listener = function (e) {
                            switch (e.key) {
                                case "Escape":
                                    n.closeLightbox();
                                    break;
                                case "ArrowLeft":
                                    s.changeToPrevious();
                                    break;
                                case "ArrowRight":
                                    s.changeToNext();
                                    break;
                                case "F11":
                                    e.preventDefault(), i.enterFullscreen()
                            }
                        }
                    }

                    function W(e) {
                        var t = e.collections.sourceMainWrappersTransformers,
                            n = e.elements,
                            i = e.sourcePointerProps,
                            s = e.stageIndexes;

                        function r(e, n) {
                            t[e].byValue(i.swipedX)[n]()
                        }
                        this.runActionsForEvent = function (e) {
                            var t, a, l;
                            n.container.contains(n.slideSwipingHoverer) || n.container.appendChild(n.slideSwipingHoverer), t = n.container, a = o, (l = t.classList).contains(a) || l.add(a), i.swipedX = e.screenX - i.downScreenX, r(s.current, "zero"), void 0 !== s.previous && i.swipedX > 0 ? r(s.previous, "negative") : void 0 !== s.next && i.swipedX < 0 && r(s.next, "positive")
                        }
                    }

                    function G(e) {
                        var t = e.props.sources,
                            n = e.resolve,
                            i = e.sourcePointerProps,
                            s = n(W);
                        1 === t.length ? this.listener = function () {
                            i.swipedX = 1
                        } : this.listener = function (e) {
                            i.isPointering && s.runActionsForEvent(e)
                        }
                    }

                    function X(e) {
                        var t = e.collections.sourceMainWrappersTransformers,
                            n = e.core.slideIndexChanger,
                            i = e.elements.sourceMainWrappers,
                            s = e.stageIndexes;
                        this.runPositiveSwipedXActions = function () {
                            void 0 === s.previous || (r("positive"), n.changeTo(s.previous)), r("zero")
                        }, this.runNegativeSwipedXActions = function () {
                            void 0 === s.next || (r("negative"), n.changeTo(s.next)), r("zero")
                        };
                        var r = function (e) {
                            i[s.current].classList.add(d), t[s.current][e]()
                        }
                    }

                    function U(e, t) {
                        e.contains(t) && e.removeChild(t)
                    }

                    function Y(e) {
                        var t = e.core.lightboxCloser,
                            n = e.elements,
                            i = e.resolve,
                            s = e.sourcePointerProps,
                            r = i(X);
                        this.runNoSwipeActions = function () {
                            U(n.container, n.slideSwipingHoverer), s.isSourceDownEventTarget || t.closeLightbox(), s.isPointering = !1
                        }, this.runActions = function () {
                            s.swipedX > 0 ? r.runPositiveSwipedXActions() : r.runNegativeSwipedXActions(), U(n.container, n.slideSwipingHoverer), n.container.classList.remove(o), s.isPointering = !1
                        }
                    }

                    function K(e) {
                        var t = e.resolve,
                            n = e.sourcePointerProps,
                            i = t(Y);
                        this.listener = function () {
                            n.isPointering && (n.swipedX ? i.runActions() : i.runNoSwipeActions())
                        }
                    }

                    function Q(e) {
                        var t, n, i;
                        n = (t = e).core.classFacade, i = t.elements, n.removeFromEachElementClassIfContains = function (e, t) {
                                for (var n = 0; n < i[e].length; n++) q(i[e][n], t)
                            },
                            function (e) {
                                var t = e.core.eventsDispatcher,
                                    n = e.props;
                                t.dispatch = function (e) {
                                    n[e] && n[e]()
                                }
                            }(e),
                            function (e) {
                                var t = e.componentsServices,
                                    n = e.core.fullscreenToggler;
                                n.enterFullscreen = function () {
                                    t.enterFullscreen();
                                    var e = document.documentElement;
                                    e.requestFullscreen ? e.requestFullscreen() : e.mozRequestFullScreen ? e.mozRequestFullScreen() : e.webkitRequestFullscreen ? e.webkitRequestFullscreen() : e.msRequestFullscreen && e.msRequestFullscreen()
                                }, n.exitFullscreen = function () {
                                    t.exitFullscreen(), document.exitFullscreen ? document.exitFullscreen() : document.mozCancelFullScreen ? document.mozCancelFullScreen() : document.webkitExitFullscreen ? document.webkitExitFullscreen() : document.msExitFullscreen && document.msExitFullscreen()
                                }
                            }(e),
                            function (e) {
                                var t = e.core,
                                    n = t.globalEventsController,
                                    i = t.windowResizeActioner,
                                    s = e.resolve,
                                    r = s(V),
                                    o = s(G),
                                    a = s(K);
                                n.attachListeners = function () {
                                    document.addEventListener("pointermove", o.listener), document.addEventListener("pointerup", a.listener), addEventListener("resize", i.runActions), document.addEventListener("keydown", r.listener)
                                }, n.removeListeners = function () {
                                    document.removeEventListener("pointermove", o.listener), document.removeEventListener("pointerup", a.listener), removeEventListener("resize", i.runActions), document.removeEventListener("keydown", r.listener)
                                }
                            }(e),
                            function (e) {
                                var t = e.core.lightboxCloser,
                                    n = (0, e.resolve)(R);
                                t.closeLightbox = function () {
                                    n.isLightboxFadingOut || n.runActions()
                                }
                            }(e), Z(e),
                            function (e) {
                                var t = e.data,
                                    n = e.core.scrollbarRecompensor;

                                function i() {
                                    document.body.offsetHeight > innerHeight && (document.body.style.marginRight = t.scrollbarWidth + "px")
                                }
                                n.addRecompense = function () {
                                    "complete" === document.readyState ? i() : addEventListener("load", (function () {
                                        i(), n.addRecompense = i
                                    }))
                                }, n.removeRecompense = function () {
                                    document.body.style.removeProperty("margin-right")
                                }
                            }(e),
                            function (e) {
                                var t = e.core,
                                    n = t.slideChangeFacade,
                                    i = t.slideIndexChanger,
                                    s = t.stageManager;
                                e.props.sources.length > 1 ? (n.changeToPrevious = function () {
                                    i.jumpTo(s.getPreviousSlideIndex())
                                }, n.changeToNext = function () {
                                    i.jumpTo(s.getNextSlideIndex())
                                }) : (n.changeToPrevious = function () {}, n.changeToNext = function () {})
                            }(e),
                            function (e) {
                                var t, n, i = e.collections.sourceMainWrappersTransformers,
                                    s = e.componentsServices,
                                    r = e.core,
                                    o = r.classFacade,
                                    a = r.slideIndexChanger,
                                    l = r.sourceDisplayFacade,
                                    c = r.stageManager,
                                    u = e.elements.sourceAnimationWrappers,
                                    p = e.stageIndexes,
                                    f = (t = function () {
                                        o.removeFromEachElementClassIfContains("sourceAnimationWrappers", m)
                                    }, n = [], function () {
                                        n.push(!0), setTimeout((function () {
                                            n.pop(), n.length || t()
                                        }), 300)
                                    });
                                a.changeTo = function (e) {
                                    p.current = e, c.updateStageIndexes(), s.setSlideNumber(e + 1), l.displaySourcesWhichShouldBeDisplayed()
                                }, a.jumpTo = function (e) {
                                    var t = p.current;
                                    a.changeTo(e), o.removeFromEachElementClassIfContains("sourceMainWrappers", d), q(u[t], g), q(u[t], h), u[t].classList.add(m), q(u[e], g), q(u[e], m), u[e].classList.add(h), f(), i[e].zero(), setTimeout((function () {
                                        t !== p.current && i[t].negative()
                                    }), 270)
                                }
                            }(e),
                            function (e) {
                                var t = e.core,
                                    n = t.classFacade,
                                    i = t.sourcesPointerDown,
                                    s = e.elements.sources,
                                    r = e.sourcePointerProps,
                                    o = e.stageIndexes;
                                i.listener = function (e) {
                                    "VIDEO" !== e.target.tagName && e.preventDefault(), r.isPointering = !0, r.downScreenX = e.screenX, r.swipedX = 0;
                                    var t = s[o.current];
                                    t && t.contains(e.target) ? r.isSourceDownEventTarget = !0 : r.isSourceDownEventTarget = !1, n.removeFromEachElementClassIfContains("sourceMainWrappers", d)
                                }
                            }(e),
                            function (e) {
                                var t = e.collections.sourcesRenderFunctions,
                                    n = e.core.sourceDisplayFacade,
                                    i = e.props,
                                    s = e.stageIndexes;

                                function r(e) {
                                    t[e] && (t[e](), delete t[e])
                                }
                                n.displaySourcesWhichShouldBeDisplayed = function () {
                                    if (i.loadOnlyCurrentSource) r(s.current);
                                    else
                                        for (var e in s) r(s[e])
                                }
                            }(e),
                            function (e) {
                                var t = e.stageIndexes,
                                    n = e.core.stageManager,
                                    i = e.props.sources.length - 1;
                                n.getPreviousSlideIndex = function () {
                                    return 0 === t.current ? i : t.current - 1
                                }, n.getNextSlideIndex = function () {
                                    return t.current === i ? 0 : t.current + 1
                                }, n.updateStageIndexes = 0 === i ? function () {} : 1 === i ? function () {
                                    0 === t.current ? (t.next = 1, delete t.previous) : (t.previous = 0, delete t.next)
                                } : function () {
                                    t.previous = n.getPreviousSlideIndex(), t.next = n.getNextSlideIndex()
                                }, n.isSourceInStage = i <= 2 ? function () {
                                    return !0
                                } : function (e) {
                                    var n = t.current;
                                    if (0 === n && e === i || n === i && 0 === e) return !0;
                                    var s = n - e;
                                    return -1 === s || 0 === s || 1 === s
                                }
                            }(e),
                            function (e) {
                                var t = e.collections,
                                    n = t.sourceMainWrappersTransformers,
                                    i = t.sourceSizers,
                                    s = e.core.windowResizeActioner,
                                    r = e.data,
                                    o = e.elements.sourceMainWrappers,
                                    a = e.props,
                                    l = e.stageIndexes;
                                s.runActions = function () {
                                    innerWidth < 992 ? r.maxSourceWidth = innerWidth : r.maxSourceWidth = .9 * innerWidth, r.maxSourceHeight = .9 * innerHeight;
                                    for (var e = 0; e < a.sources.length; e++) q(o[e], d), e !== l.current && n[e].negative(), i[e] && i[e].adjustSize()
                                }
                            }(e)
                    }

                    function J(e) {
                        var t = e.core.eventsDispatcher,
                            n = e.data,
                            i = e.elements,
                            r = e.props.sources;
                        n.isInitialized = !0, n.scrollbarWidth = function (e) {
                                var t = e.props.disableLocalStorage;
                                if (!t) {
                                    var n = localStorage.getItem("fslightbox-scrollbar-width");
                                    if (n) return n
                                }
                                var i = function () {
                                        var e = document.createElement("div"),
                                            t = e.style;
                                        return t.visibility = "hidden", t.width = "100px", t.msOverflowStyle = "scrollbar", t.overflow = "scroll", e
                                    }(),
                                    s = function () {
                                        var e = document.createElement("div");
                                        return e.style.width = "100%", e
                                    }();
                                document.body.appendChild(i);
                                var r = i.offsetWidth;
                                i.appendChild(s);
                                var o = s.offsetWidth;
                                document.body.removeChild(i);
                                var a = r - o;
                                return t || localStorage.setItem("fslightbox-scrollbar-width", a.toString()), a
                            }(e),
                            function (e) {
                                for (var t = e.collections.sourceMainWrappersTransformers, n = e.props.sources, i = e.resolve, s = 0; s < n.length; s++) t[s] = i(F, [s])
                            }(e), Q(e), i.container = document.createElement("div"), i.container.className = "".concat(s, "container ").concat(a, " ").concat(g),
                            function (e) {
                                var t = e.elements;
                                t.slideSwipingHoverer = document.createElement("div"), t.slideSwipingHoverer.className = "".concat(s, "slide-swiping-hoverer ").concat(a, " ").concat(u)
                            }(e), H(e),
                            function (e) {
                                var t = e.core.sourcesPointerDown,
                                    n = e.elements,
                                    i = e.props.sources,
                                    s = document.createElement("div");
                                s.className = "".concat(u, " ").concat(a), n.container.appendChild(s), s.addEventListener("pointerdown", t.listener), n.sourceWrappersContainer = s;
                                for (var r = 0; r < i.length; r++) j(e, r)
                            }(e), r.length > 1 && function (e) {
                                var t = e.core.slideChangeFacade;
                                B(e, t.changeToPrevious, "previous", "M18.271,9.212H3.615l4.184-4.184c0.306-0.306,0.306-0.801,0-1.107c-0.306-0.306-0.801-0.306-1.107,0L1.21,9.403C1.194,9.417,1.174,9.421,1.158,9.437c-0.181,0.181-0.242,0.425-0.209,0.66c0.005,0.038,0.012,0.071,0.022,0.109c0.028,0.098,0.075,0.188,0.142,0.271c0.021,0.026,0.021,0.061,0.045,0.085c0.015,0.016,0.034,0.02,0.05,0.033l5.484,5.483c0.306,0.307,0.801,0.307,1.107,0c0.306-0.305,0.306-0.801,0-1.105l-4.184-4.185h14.656c0.436,0,0.788-0.353,0.788-0.788S18.707,9.212,18.271,9.212z"), B(e, t.changeToNext, "next", "M1.729,9.212h14.656l-4.184-4.184c-0.307-0.306-0.307-0.801,0-1.107c0.305-0.306,0.801-0.306,1.106,0l5.481,5.482c0.018,0.014,0.037,0.019,0.053,0.034c0.181,0.181,0.242,0.425,0.209,0.66c-0.004,0.038-0.012,0.071-0.021,0.109c-0.028,0.098-0.075,0.188-0.143,0.271c-0.021,0.026-0.021,0.061-0.045,0.085c-0.015,0.016-0.034,0.02-0.051,0.033l-5.483,5.483c-0.306,0.307-0.802,0.307-1.106,0c-0.307-0.305-0.307-0.801,0-1.105l4.184-4.185H1.729c-0.436,0-0.788-0.353-0.788-0.788S1.293,9.212,1.729,9.212z")
                            }(e),
                            function (e) {
                                for (var t = e.props.sources, n = e.resolve, i = n(_), s = n(M), r = n(I, [i, s]), o = 0; o < t.length; o++)
                                    if ("string" == typeof t[o]) {
                                        var a = r.getTypeSetByClientForIndex(o);
                                        if (a) s.runActionsForSourceTypeAndIndex(a, o);
                                        else {
                                            var l = i.getSourceTypeFromLocalStorageByUrl(t[o]);
                                            l ? s.runActionsForSourceTypeAndIndex(l, o) : r.retrieveTypeWithXhrForIndex(o)
                                        }
                                    } else s.runActionsForSourceTypeAndIndex("custom", o)
                            }(e), t.dispatch("onInit")
                    }

                    function Z(e) {
                        var t = e.collections.sourceMainWrappersTransformers,
                            n = e.componentsServices,
                            i = e.core,
                            s = i.eventsDispatcher,
                            r = i.lightboxOpener,
                            o = i.globalEventsController,
                            a = i.scrollbarRecompensor,
                            l = i.sourceDisplayFacade,
                            d = i.stageManager,
                            u = i.windowResizeActioner,
                            p = e.data,
                            f = e.elements,
                            h = e.stageIndexes;
                        r.open = function () {
                            var i = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : 0;
                            h.current = i, p.isInitialized ? s.dispatch("onShow") : J(e), d.updateStageIndexes(), l.displaySourcesWhichShouldBeDisplayed(), n.setSlideNumber(i + 1), document.body.appendChild(f.container), document.documentElement.classList.add(c), a.addRecompense(), o.attachListeners(), u.runActions(), t[h.current].zero(), s.dispatch("onOpen")
                        }
                    }

                    function ee(e, t, n) {
                        return (ee = te() ? Reflect.construct : function (e, t, n) {
                            var i = [null];
                            i.push.apply(i, t);
                            var s = new(Function.bind.apply(e, i));
                            return n && ne(s, n.prototype), s
                        }).apply(null, arguments)
                    }

                    function te() {
                        if ("undefined" == typeof Reflect || !Reflect.construct) return !1;
                        if (Reflect.construct.sham) return !1;
                        if ("function" == typeof Proxy) return !0;
                        try {
                            return Date.prototype.toString.call(Reflect.construct(Date, [], (function () {}))), !0
                        } catch (e) {
                            return !1
                        }
                    }

                    function ne(e, t) {
                        return (ne = Object.setPrototypeOf || function (e, t) {
                            return e.__proto__ = t, e
                        })(e, t)
                    }

                    function ie(e) {
                        return function (e) {
                            if (Array.isArray(e)) return se(e)
                        }(e) || function (e) {
                            if ("undefined" != typeof Symbol && Symbol.iterator in Object(e)) return Array.from(e)
                        }(e) || function (e, t) {
                            if (e) {
                                if ("string" == typeof e) return se(e, t);
                                var n = Object.prototype.toString.call(e).slice(8, -1);
                                return "Object" === n && e.constructor && (n = e.constructor.name), "Map" === n || "Set" === n ? Array.from(e) : "Arguments" === n || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n) ? se(e, t) : void 0
                            }
                        }(e) || function () {
                            throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")
                        }()
                    }

                    function se(e, t) {
                        (null == t || t > e.length) && (t = e.length);
                        for (var n = 0, i = new Array(t); n < t; n++) i[n] = e[n];
                        return i
                    }

                    function re() {
                        for (var e = document.getElementsByTagName("a"), t = function (t) {
                                if (!e[t].hasAttribute("data-fslightbox")) return "continue";
                                var n = e[t].getAttribute("data-fslightbox"),
                                    i = e[t].getAttribute("href");
                                fsLightboxInstances[n] || (fsLightboxInstances[n] = new FsLightbox);
                                var s = null;
                                "#" === i.charAt(0) ? (s = document.getElementById(i.substring(1)).cloneNode(!0)).removeAttribute("id") : s = i, fsLightboxInstances[n].props.sources.push(s), fsLightboxInstances[n].elements.a.push(e[t]);
                                var r = fsLightboxInstances[n].props.sources.length - 1;
                                e[t].onclick = function (e) {
                                    e.preventDefault(), fsLightboxInstances[n].open(r)
                                }, u("types", "data-type"), u("videosPosters", "data-video-poster"), u("customClasses", "data-class"), u("customClasses", "data-custom-class");
                                for (var o = ["href", "data-fslightbox", "data-type", "data-video-poster", "data-class", "data-custom-class"], a = e[t].attributes, l = fsLightboxInstances[n].props.customAttributes, c = 0; c < a.length; c++)
                                    if (-1 === o.indexOf(a[c].name) && "data-" === a[c].name.substr(0, 5)) {
                                        l[r] || (l[r] = {});
                                        var d = a[c].name.substr(5);
                                        l[r][d] = a[c].value
                                    }
                                function u(i, s) {
                                    e[t].hasAttribute(s) && (fsLightboxInstances[n].props[i][r] = e[t].getAttribute(s))
                                }
                            }, n = 0; n < e.length; n++) t(n);
                        var i = Object.keys(fsLightboxInstances);
                        window.fsLightbox = fsLightboxInstances[i[i.length - 1]]
                    }
                    "object" === ("undefined" == typeof document ? "undefined" : x(document)) && ((i = document.createElement("style")).className = r, i.appendChild(document.createTextNode(".fslightbox-absoluted{position:absolute;top:0;left:0}.fslightbox-fade-in{animation:fslightbox-fade-in .3s cubic-bezier(0,0,.7,1)}.fslightbox-fade-out{animation:fslightbox-fade-out .3s ease}.fslightbox-fade-in-strong{animation:fslightbox-fade-in-strong .3s cubic-bezier(0,0,.7,1)}.fslightbox-fade-out-strong{animation:fslightbox-fade-out-strong .3s ease}@keyframes fslightbox-fade-in{from{opacity:.65}to{opacity:1}}@keyframes fslightbox-fade-out{from{opacity:.35}to{opacity:0}}@keyframes fslightbox-fade-in-strong{from{opacity:.3}to{opacity:1}}@keyframes fslightbox-fade-out-strong{from{opacity:1}to{opacity:0}}.fslightbox-cursor-grabbing{cursor:grabbing}.fslightbox-full-dimension{width:100%;height:100%}.fslightbox-open{overflow:hidden;height:100%}.fslightbox-flex-centered{display:flex;justify-content:center;align-items:center}.fslightbox-opacity-0{opacity:0!important}.fslightbox-opacity-1{opacity:1!important}.fslightbox-scrollbarfix{padding-right:17px}.fslightbox-transform-transition{transition:transform .3s}.fslightbox-container{font-family:Arial,sans-serif;position:fixed;top:0;left:0;background:linear-gradient(rgba(30,30,30,.9),#000 1810%);touch-action:pinch-zoom;z-index:1000000000;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;-webkit-tap-highlight-color:transparent}.fslightbox-container *{box-sizing:border-box}.fslightbox-svg-path{transition:fill .15s ease;fill:#ddd}.fslightbox-nav{height:45px;width:100%;position:absolute;top:0;left:0}.fslightbox-slide-number-container{display:flex;justify-content:center;align-items:center;position:relative;height:100%;font-size:15px;color:#d7d7d7;z-index:0;max-width:55px;text-align:left}.fslightbox-slide-number-container .fslightbox-flex-centered{height:100%}.fslightbox-slash{display:block;margin:0 5px;width:1px;height:12px;transform:rotate(15deg);background:#fff}.fslightbox-toolbar{position:absolute;z-index:3;right:0;top:0;height:100%;display:flex;background:rgba(35,35,35,.65)}.fslightbox-toolbar-button{height:100%;width:45px;cursor:pointer}.fslightbox-toolbar-button:hover .fslightbox-svg-path{fill:#fff}.fslightbox-slide-btn-container{display:flex;align-items:center;padding:12px 12px 12px 6px;position:absolute;top:50%;cursor:pointer;z-index:3;transform:translateY(-50%)}@media (min-width:476px){.fslightbox-slide-btn-container{padding:22px 22px 22px 6px}}@media (min-width:768px){.fslightbox-slide-btn-container{padding:30px 30px 30px 6px}}.fslightbox-slide-btn-container:hover .fslightbox-svg-path{fill:#f1f1f1}.fslightbox-slide-btn{padding:9px;font-size:26px;background:rgba(35,35,35,.65)}@media (min-width:768px){.fslightbox-slide-btn{padding:10px}}@media (min-width:1600px){.fslightbox-slide-btn{padding:11px}}.fslightbox-slide-btn-container-previous{left:0}@media (max-width:475.99px){.fslightbox-slide-btn-container-previous{padding-left:3px}}.fslightbox-slide-btn-container-next{right:0;padding-left:12px;padding-right:3px}@media (min-width:476px){.fslightbox-slide-btn-container-next{padding-left:22px}}@media (min-width:768px){.fslightbox-slide-btn-container-next{padding-left:30px}}@media (min-width:476px){.fslightbox-slide-btn-container-next{padding-right:6px}}.fslightbox-down-event-detector{position:absolute;z-index:1}.fslightbox-slide-swiping-hoverer{z-index:4}.fslightbox-invalid-file-wrapper{font-size:22px;color:#eaebeb;margin:auto}.fslightbox-video{object-fit:cover}.fslightbox-youtube-iframe{border:0}.fslightbox-loader{display:block;margin:auto;position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);width:67px;height:67px}.fslightbox-loader div{box-sizing:border-box;display:block;position:absolute;width:54px;height:54px;margin:6px;border:5px solid;border-color:#999 transparent transparent transparent;border-radius:50%;animation:fslightbox-loader 1.2s cubic-bezier(.5,0,.5,1) infinite}.fslightbox-loader div:nth-child(1){animation-delay:-.45s}.fslightbox-loader div:nth-child(2){animation-delay:-.3s}.fslightbox-loader div:nth-child(3){animation-delay:-.15s}@keyframes fslightbox-loader{0%{transform:rotate(0)}100%{transform:rotate(360deg)}}.fslightbox-source{position:relative;z-index:2;opacity:0}")), document.head.appendChild(i)), window.FsLightbox = function () {
                        var e = this;
                        this.props = {
                            sources: [],
                            customAttributes: [],
                            customClasses: [],
                            types: [],
                            videosPosters: [],
                            slideDistance: .3
                        }, this.data = {
                            isInitialized: !1,
                            isFullscreenOpen: !1,
                            maxSourceWidth: 0,
                            maxSourceHeight: 0,
                            scrollbarWidth: 0
                        }, this.sourcePointerProps = {
                            downScreenX: null,
                            isPointering: !1,
                            isSourceDownEventTarget: !1,
                            swipedX: 0
                        }, this.stageIndexes = {}, this.elements = {
                            a: [],
                            container: null,
                            slideSwipingHoverer: null,
                            sourceWrappersContainer: null,
                            sources: [],
                            sourceMainWrappers: [],
                            sourceAnimationWrappers: []
                        }, this.componentsServices = {
                            enterFullscreen: null,
                            exitFullscreen: null,
                            hideSourceLoaderIfNotYetCollection: [],
                            setSlideNumber: function () {}
                        }, this.resolve = function (t) {
                            var n = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : [];
                            return n.unshift(e), ee(t, ie(n))
                        }, this.collections = {
                            sourceMainWrappersTransformers: [],
                            sourceLoadHandlers: [],
                            sourcesRenderFunctions: [],
                            sourceSizers: []
                        }, this.core = {
                            classFacade: {},
                            eventsDispatcher: {},
                            fullscreenToggler: {},
                            globalEventsController: {},
                            lightboxCloser: {},
                            lightboxOpener: {},
                            lightboxUpdater: {},
                            scrollbarRecompensor: {},
                            slideChangeFacade: {},
                            slideIndexChanger: {},
                            sourcesPointerDown: {},
                            sourceDisplayFacade: {},
                            stageManager: {},
                            windowResizeActioner: {}
                        }, Z(this), this.open = function (t) {
                            return e.core.lightboxOpener.open(t)
                        }, this.close = function () {
                            return e.core.lightboxCloser.closeLightbox()
                        }
                    }, window.fsLightboxInstances = {}, re(), window.refreshFsLightbox = function () {
                        for (var e in fsLightboxInstances) {
                            var t = fsLightboxInstances[e].props;
                            fsLightboxInstances[e] = new FsLightbox, fsLightboxInstances[e].props = t, fsLightboxInstances[e].props.sources = [], fsLightboxInstances[e].elements.a = []
                        }
                        re()
                    }
                }])
            },
            755: function (e, t) {
                var n;
                ! function (t, n) {
                    "use strict";
                    "object" == typeof e.exports ? e.exports = t.document ? n(t, !0) : function (e) {
                        if (!e.document) throw new Error("jQuery requires a window with a document");
                        return n(e)
                    } : n(t)
                }("undefined" != typeof window ? window : this, (function (i, s) {
                    "use strict";
                    var r = [],
                        o = Object.getPrototypeOf,
                        a = r.slice,
                        l = r.flat ? function (e) {
                            return r.flat.call(e)
                        } : function (e) {
                            return r.concat.apply([], e)
                        },
                        c = r.push,
                        d = r.indexOf,
                        u = {},
                        p = u.toString,
                        f = u.hasOwnProperty,
                        h = f.toString,
                        m = h.call(Object),
                        g = {},
                        v = function (e) {
                            return "function" == typeof e && "number" != typeof e.nodeType && "function" != typeof e.item
                        },
                        b = function (e) {
                            return null != e && e === e.window
                        },
                        y = i.document,
                        w = {
                            type: !0,
                            src: !0,
                            nonce: !0,
                            noModule: !0
                        };

                    function x(e, t, n) {
                        var i, s, r = (n = n || y).createElement("script");
                        if (r.text = e, t)
                            for (i in w)(s = t[i] || t.getAttribute && t.getAttribute(i)) && r.setAttribute(i, s);
                        n.head.appendChild(r).parentNode.removeChild(r)
                    }

                    function _(e) {
                        return null == e ? e + "" : "object" == typeof e || "function" == typeof e ? u[p.call(e)] || "object" : typeof e
                    }
                    var C = "3.6.0",
                        E = function (e, t) {
                            return new E.fn.init(e, t)
                        };

                    function T(e) {
                        var t = !!e && "length" in e && e.length,
                            n = _(e);
                        return !v(e) && !b(e) && ("array" === n || 0 === t || "number" == typeof t && t > 0 && t - 1 in e)
                    }
                    E.fn = E.prototype = {
                        jquery: C,
                        constructor: E,
                        length: 0,
                        toArray: function () {
                            return a.call(this)
                        },
                        get: function (e) {
                            return null == e ? a.call(this) : e < 0 ? this[e + this.length] : this[e]
                        },
                        pushStack: function (e) {
                            var t = E.merge(this.constructor(), e);
                            return t.prevObject = this, t
                        },
                        each: function (e) {
                            return E.each(this, e)
                        },
                        map: function (e) {
                            return this.pushStack(E.map(this, (function (t, n) {
                                return e.call(t, n, t)
                            })))
                        },
                        slice: function () {
                            return this.pushStack(a.apply(this, arguments))
                        },
                        first: function () {
                            return this.eq(0)
                        },
                        last: function () {
                            return this.eq(-1)
                        },
                        even: function () {
                            return this.pushStack(E.grep(this, (function (e, t) {
                                return (t + 1) % 2
                            })))
                        },
                        odd: function () {
                            return this.pushStack(E.grep(this, (function (e, t) {
                                return t % 2
                            })))
                        },
                        eq: function (e) {
                            var t = this.length,
                                n = +e + (e < 0 ? t : 0);
                            return this.pushStack(n >= 0 && n < t ? [this[n]] : [])
                        },
                        end: function () {
                            return this.prevObject || this.constructor()
                        },
                        push: c,
                        sort: r.sort,
                        splice: r.splice
                    }, E.extend = E.fn.extend = function () {
                        var e, t, n, i, s, r, o = arguments[0] || {},
                            a = 1,
                            l = arguments.length,
                            c = !1;
                        for ("boolean" == typeof o && (c = o, o = arguments[a] || {}, a++), "object" == typeof o || v(o) || (o = {}), a === l && (o = this, a--); a < l; a++)
                            if (null != (e = arguments[a]))
                                for (t in e) i = e[t], "__proto__" !== t && o !== i && (c && i && (E.isPlainObject(i) || (s = Array.isArray(i))) ? (n = o[t], r = s && !Array.isArray(n) ? [] : s || E.isPlainObject(n) ? n : {}, s = !1, o[t] = E.extend(c, r, i)) : void 0 !== i && (o[t] = i));
                        return o
                    }, E.extend({
                        expando: "jQuery" + (C + Math.random()).replace(/\D/g, ""),
                        isReady: !0,
                        error: function (e) {
                            throw new Error(e)
                        },
                        noop: function () {},
                        isPlainObject: function (e) {
                            var t, n;
                            return !(!e || "[object Object]" !== p.call(e) || (t = o(e)) && ("function" != typeof (n = f.call(t, "constructor") && t.constructor) || h.call(n) !== m))
                        },
                        isEmptyObject: function (e) {
                            var t;
                            for (t in e) return !1;
                            return !0
                        },
                        globalEval: function (e, t, n) {
                            x(e, {
                                nonce: t && t.nonce
                            }, n)
                        },
                        each: function (e, t) {
                            var n, i = 0;
                            if (T(e))
                                for (n = e.length; i < n && !1 !== t.call(e[i], i, e[i]); i++);
                            else
                                for (i in e)
                                    if (!1 === t.call(e[i], i, e[i])) break;
                            return e
                        },
                        makeArray: function (e, t) {
                            var n = t || [];
                            return null != e && (T(Object(e)) ? E.merge(n, "string" == typeof e ? [e] : e) : c.call(n, e)), n
                        },
                        inArray: function (e, t, n) {
                            return null == t ? -1 : d.call(t, e, n)
                        },
                        merge: function (e, t) {
                            for (var n = +t.length, i = 0, s = e.length; i < n; i++) e[s++] = t[i];
                            return e.length = s, e
                        },
                        grep: function (e, t, n) {
                            for (var i = [], s = 0, r = e.length, o = !n; s < r; s++) !t(e[s], s) !== o && i.push(e[s]);
                            return i
                        },
                        map: function (e, t, n) {
                            var i, s, r = 0,
                                o = [];
                            if (T(e))
                                for (i = e.length; r < i; r++) null != (s = t(e[r], r, n)) && o.push(s);
                            else
                                for (r in e) null != (s = t(e[r], r, n)) && o.push(s);
                            return l(o)
                        },
                        guid: 1,
                        support: g
                    }), "function" == typeof Symbol && (E.fn[Symbol.iterator] = r[Symbol.iterator]), E.each("Boolean Number String Function Array Date RegExp Object Error Symbol".split(" "), (function (e, t) {
                        u["[object " + t + "]"] = t.toLowerCase()
                    }));
                    var S = function (e) {
                        var t, n, i, s, r, o, a, l, c, d, u, p, f, h, m, g, v, b, y, w = "sizzle" + 1 * new Date,
                            x = e.document,
                            _ = 0,
                            C = 0,
                            E = le(),
                            T = le(),
                            S = le(),
                            k = le(),
                            A = function (e, t) {
                                return e === t && (u = !0), 0
                            },
                            L = {}.hasOwnProperty,
                            O = [],
                            P = O.pop,
                            D = O.push,
                            M = O.push,
                            N = O.slice,
                            I = function (e, t) {
                                for (var n = 0, i = e.length; n < i; n++)
                                    if (e[n] === t) return n;
                                return -1
                            },
                            j = "checked|selected|async|autofocus|autoplay|controls|defer|disabled|hidden|ismap|loop|multiple|open|readonly|required|scoped",
                            $ = "[\\x20\\t\\r\\n\\f]",
                            z = "(?:\\\\[\\da-fA-F]{1,6}[\\x20\\t\\r\\n\\f]?|\\\\[^\\r\\n\\f]|[\\w-]|[^\0-\\x7f])+",
                            H = "\\[[\\x20\\t\\r\\n\\f]*(" + z + ")(?:" + $ + "*([*^$|!~]?=)" + $ + "*(?:'((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\"|(" + z + "))|)" + $ + "*\\]",
                            F = ":(" + z + ")(?:\\((('((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\")|((?:\\\\.|[^\\\\()[\\]]|" + H + ")*)|.*)\\)|)",
                            B = new RegExp($ + "+", "g"),
                            q = new RegExp("^[\\x20\\t\\r\\n\\f]+|((?:^|[^\\\\])(?:\\\\.)*)[\\x20\\t\\r\\n\\f]+$", "g"),
                            R = new RegExp("^[\\x20\\t\\r\\n\\f]*,[\\x20\\t\\r\\n\\f]*"),
                            V = new RegExp("^[\\x20\\t\\r\\n\\f]*([>+~]|[\\x20\\t\\r\\n\\f])[\\x20\\t\\r\\n\\f]*"),
                            W = new RegExp($ + "|>"),
                            G = new RegExp(F),
                            X = new RegExp("^" + z + "$"),
                            U = {
                                ID: new RegExp("^#(" + z + ")"),
                                CLASS: new RegExp("^\\.(" + z + ")"),
                                TAG: new RegExp("^(" + z + "|[*])"),
                                ATTR: new RegExp("^" + H),
                                PSEUDO: new RegExp("^" + F),
                                CHILD: new RegExp("^:(only|first|last|nth|nth-last)-(child|of-type)(?:\\([\\x20\\t\\r\\n\\f]*(even|odd|(([+-]|)(\\d*)n|)[\\x20\\t\\r\\n\\f]*(?:([+-]|)[\\x20\\t\\r\\n\\f]*(\\d+)|))[\\x20\\t\\r\\n\\f]*\\)|)", "i"),
                                bool: new RegExp("^(?:" + j + ")$", "i"),
                                needsContext: new RegExp("^[\\x20\\t\\r\\n\\f]*[>+~]|:(even|odd|eq|gt|lt|nth|first|last)(?:\\([\\x20\\t\\r\\n\\f]*((?:-\\d)?\\d*)[\\x20\\t\\r\\n\\f]*\\)|)(?=[^-]|$)", "i")
                            },
                            Y = /HTML$/i,
                            K = /^(?:input|select|textarea|button)$/i,
                            Q = /^h\d$/i,
                            J = /^[^{]+\{\s*\[native \w/,
                            Z = /^(?:#([\w-]+)|(\w+)|\.([\w-]+))$/,
                            ee = /[+~]/,
                            te = new RegExp("\\\\[\\da-fA-F]{1,6}[\\x20\\t\\r\\n\\f]?|\\\\([^\\r\\n\\f])", "g"),
                            ne = function (e, t) {
                                var n = "0x" + e.slice(1) - 65536;
                                return t || (n < 0 ? String.fromCharCode(n + 65536) : String.fromCharCode(n >> 10 | 55296, 1023 & n | 56320))
                            },
                            ie = /([\0-\x1f\x7f]|^-?\d)|^-$|[^\0-\x1f\x7f-\uFFFF\w-]/g,
                            se = function (e, t) {
                                return t ? "\0" === e ? "�" : e.slice(0, -1) + "\\" + e.charCodeAt(e.length - 1).toString(16) + " " : "\\" + e
                            },
                            re = function () {
                                p()
                            },
                            oe = we((function (e) {
                                return !0 === e.disabled && "fieldset" === e.nodeName.toLowerCase()
                            }), {
                                dir: "parentNode",
                                next: "legend"
                            });
                        try {
                            M.apply(O = N.call(x.childNodes), x.childNodes), O[x.childNodes.length].nodeType
                        } catch (e) {
                            M = {
                                apply: O.length ? function (e, t) {
                                    D.apply(e, N.call(t))
                                } : function (e, t) {
                                    for (var n = e.length, i = 0; e[n++] = t[i++];);
                                    e.length = n - 1
                                }
                            }
                        }

                        function ae(e, t, i, s) {
                            var r, a, c, d, u, h, v, b = t && t.ownerDocument,
                                x = t ? t.nodeType : 9;
                            if (i = i || [], "string" != typeof e || !e || 1 !== x && 9 !== x && 11 !== x) return i;
                            if (!s && (p(t), t = t || f, m)) {
                                if (11 !== x && (u = Z.exec(e)))
                                    if (r = u[1]) {
                                        if (9 === x) {
                                            if (!(c = t.getElementById(r))) return i;
                                            if (c.id === r) return i.push(c), i
                                        } else if (b && (c = b.getElementById(r)) && y(t, c) && c.id === r) return i.push(c), i
                                    } else {
                                        if (u[2]) return M.apply(i, t.getElementsByTagName(e)), i;
                                        if ((r = u[3]) && n.getElementsByClassName && t.getElementsByClassName) return M.apply(i, t.getElementsByClassName(r)), i
                                    } if (n.qsa && !k[e + " "] && (!g || !g.test(e)) && (1 !== x || "object" !== t.nodeName.toLowerCase())) {
                                    if (v = e, b = t, 1 === x && (W.test(e) || V.test(e))) {
                                        for ((b = ee.test(e) && ve(t.parentNode) || t) === t && n.scope || ((d = t.getAttribute("id")) ? d = d.replace(ie, se) : t.setAttribute("id", d = w)), a = (h = o(e)).length; a--;) h[a] = (d ? "#" + d : ":scope") + " " + ye(h[a]);
                                        v = h.join(",")
                                    }
                                    try {
                                        return M.apply(i, b.querySelectorAll(v)), i
                                    } catch (t) {
                                        k(e, !0)
                                    } finally {
                                        d === w && t.removeAttribute("id")
                                    }
                                }
                            }
                            return l(e.replace(q, "$1"), t, i, s)
                        }

                        function le() {
                            var e = [];
                            return function t(n, s) {
                                return e.push(n + " ") > i.cacheLength && delete t[e.shift()], t[n + " "] = s
                            }
                        }

                        function ce(e) {
                            return e[w] = !0, e
                        }

                        function de(e) {
                            var t = f.createElement("fieldset");
                            try {
                                return !!e(t)
                            } catch (e) {
                                return !1
                            } finally {
                                t.parentNode && t.parentNode.removeChild(t), t = null
                            }
                        }

                        function ue(e, t) {
                            for (var n = e.split("|"), s = n.length; s--;) i.attrHandle[n[s]] = t
                        }

                        function pe(e, t) {
                            var n = t && e,
                                i = n && 1 === e.nodeType && 1 === t.nodeType && e.sourceIndex - t.sourceIndex;
                            if (i) return i;
                            if (n)
                                for (; n = n.nextSibling;)
                                    if (n === t) return -1;
                            return e ? 1 : -1
                        }

                        function fe(e) {
                            return function (t) {
                                return "input" === t.nodeName.toLowerCase() && t.type === e
                            }
                        }

                        function he(e) {
                            return function (t) {
                                var n = t.nodeName.toLowerCase();
                                return ("input" === n || "button" === n) && t.type === e
                            }
                        }

                        function me(e) {
                            return function (t) {
                                return "form" in t ? t.parentNode && !1 === t.disabled ? "label" in t ? "label" in t.parentNode ? t.parentNode.disabled === e : t.disabled === e : t.isDisabled === e || t.isDisabled !== !e && oe(t) === e : t.disabled === e : "label" in t && t.disabled === e
                            }
                        }

                        function ge(e) {
                            return ce((function (t) {
                                return t = +t, ce((function (n, i) {
                                    for (var s, r = e([], n.length, t), o = r.length; o--;) n[s = r[o]] && (n[s] = !(i[s] = n[s]))
                                }))
                            }))
                        }

                        function ve(e) {
                            return e && void 0 !== e.getElementsByTagName && e
                        }
                        for (t in n = ae.support = {}, r = ae.isXML = function (e) {
                                var t = e && e.namespaceURI,
                                    n = e && (e.ownerDocument || e).documentElement;
                                return !Y.test(t || n && n.nodeName || "HTML")
                            }, p = ae.setDocument = function (e) {
                                var t, s, o = e ? e.ownerDocument || e : x;
                                return o != f && 9 === o.nodeType && o.documentElement ? (h = (f = o).documentElement, m = !r(f), x != f && (s = f.defaultView) && s.top !== s && (s.addEventListener ? s.addEventListener("unload", re, !1) : s.attachEvent && s.attachEvent("onunload", re)), n.scope = de((function (e) {
                                    return h.appendChild(e).appendChild(f.createElement("div")), void 0 !== e.querySelectorAll && !e.querySelectorAll(":scope fieldset div").length
                                })), n.attributes = de((function (e) {
                                    return e.className = "i", !e.getAttribute("className")
                                })), n.getElementsByTagName = de((function (e) {
                                    return e.appendChild(f.createComment("")), !e.getElementsByTagName("*").length
                                })), n.getElementsByClassName = J.test(f.getElementsByClassName), n.getById = de((function (e) {
                                    return h.appendChild(e).id = w, !f.getElementsByName || !f.getElementsByName(w).length
                                })), n.getById ? (i.filter.ID = function (e) {
                                    var t = e.replace(te, ne);
                                    return function (e) {
                                        return e.getAttribute("id") === t
                                    }
                                }, i.find.ID = function (e, t) {
                                    if (void 0 !== t.getElementById && m) {
                                        var n = t.getElementById(e);
                                        return n ? [n] : []
                                    }
                                }) : (i.filter.ID = function (e) {
                                    var t = e.replace(te, ne);
                                    return function (e) {
                                        var n = void 0 !== e.getAttributeNode && e.getAttributeNode("id");
                                        return n && n.value === t
                                    }
                                }, i.find.ID = function (e, t) {
                                    if (void 0 !== t.getElementById && m) {
                                        var n, i, s, r = t.getElementById(e);
                                        if (r) {
                                            if ((n = r.getAttributeNode("id")) && n.value === e) return [r];
                                            for (s = t.getElementsByName(e), i = 0; r = s[i++];)
                                                if ((n = r.getAttributeNode("id")) && n.value === e) return [r]
                                        }
                                        return []
                                    }
                                }), i.find.TAG = n.getElementsByTagName ? function (e, t) {
                                    return void 0 !== t.getElementsByTagName ? t.getElementsByTagName(e) : n.qsa ? t.querySelectorAll(e) : void 0
                                } : function (e, t) {
                                    var n, i = [],
                                        s = 0,
                                        r = t.getElementsByTagName(e);
                                    if ("*" === e) {
                                        for (; n = r[s++];) 1 === n.nodeType && i.push(n);
                                        return i
                                    }
                                    return r
                                }, i.find.CLASS = n.getElementsByClassName && function (e, t) {
                                    if (void 0 !== t.getElementsByClassName && m) return t.getElementsByClassName(e)
                                }, v = [], g = [], (n.qsa = J.test(f.querySelectorAll)) && (de((function (e) {
                                    var t;
                                    h.appendChild(e).innerHTML = "<a id='" + w + "'></a><select id='" + w + "-\r\\' msallowcapture=''><option selected=''></option></select>", e.querySelectorAll("[msallowcapture^='']").length && g.push("[*^$]=[\\x20\\t\\r\\n\\f]*(?:''|\"\")"), e.querySelectorAll("[selected]").length || g.push("\\[[\\x20\\t\\r\\n\\f]*(?:value|" + j + ")"), e.querySelectorAll("[id~=" + w + "-]").length || g.push("~="), (t = f.createElement("input")).setAttribute("name", ""), e.appendChild(t), e.querySelectorAll("[name='']").length || g.push("\\[[\\x20\\t\\r\\n\\f]*name[\\x20\\t\\r\\n\\f]*=[\\x20\\t\\r\\n\\f]*(?:''|\"\")"), e.querySelectorAll(":checked").length || g.push(":checked"), e.querySelectorAll("a#" + w + "+*").length || g.push(".#.+[+~]"), e.querySelectorAll("\\\f"), g.push("[\\r\\n\\f]")
                                })), de((function (e) {
                                    e.innerHTML = "<a href='' disabled='disabled'></a><select disabled='disabled'><option/></select>";
                                    var t = f.createElement("input");
                                    t.setAttribute("type", "hidden"), e.appendChild(t).setAttribute("name", "D"), e.querySelectorAll("[name=d]").length && g.push("name[\\x20\\t\\r\\n\\f]*[*^$|!~]?="), 2 !== e.querySelectorAll(":enabled").length && g.push(":enabled", ":disabled"), h.appendChild(e).disabled = !0, 2 !== e.querySelectorAll(":disabled").length && g.push(":enabled", ":disabled"), e.querySelectorAll("*,:x"), g.push(",.*:")
                                }))), (n.matchesSelector = J.test(b = h.matches || h.webkitMatchesSelector || h.mozMatchesSelector || h.oMatchesSelector || h.msMatchesSelector)) && de((function (e) {
                                    n.disconnectedMatch = b.call(e, "*"), b.call(e, "[s!='']:x"), v.push("!=", F)
                                })), g = g.length && new RegExp(g.join("|")), v = v.length && new RegExp(v.join("|")), t = J.test(h.compareDocumentPosition), y = t || J.test(h.contains) ? function (e, t) {
                                    var n = 9 === e.nodeType ? e.documentElement : e,
                                        i = t && t.parentNode;
                                    return e === i || !(!i || 1 !== i.nodeType || !(n.contains ? n.contains(i) : e.compareDocumentPosition && 16 & e.compareDocumentPosition(i)))
                                } : function (e, t) {
                                    if (t)
                                        for (; t = t.parentNode;)
                                            if (t === e) return !0;
                                    return !1
                                }, A = t ? function (e, t) {
                                    if (e === t) return u = !0, 0;
                                    var i = !e.compareDocumentPosition - !t.compareDocumentPosition;
                                    return i || (1 & (i = (e.ownerDocument || e) == (t.ownerDocument || t) ? e.compareDocumentPosition(t) : 1) || !n.sortDetached && t.compareDocumentPosition(e) === i ? e == f || e.ownerDocument == x && y(x, e) ? -1 : t == f || t.ownerDocument == x && y(x, t) ? 1 : d ? I(d, e) - I(d, t) : 0 : 4 & i ? -1 : 1)
                                } : function (e, t) {
                                    if (e === t) return u = !0, 0;
                                    var n, i = 0,
                                        s = e.parentNode,
                                        r = t.parentNode,
                                        o = [e],
                                        a = [t];
                                    if (!s || !r) return e == f ? -1 : t == f ? 1 : s ? -1 : r ? 1 : d ? I(d, e) - I(d, t) : 0;
                                    if (s === r) return pe(e, t);
                                    for (n = e; n = n.parentNode;) o.unshift(n);
                                    for (n = t; n = n.parentNode;) a.unshift(n);
                                    for (; o[i] === a[i];) i++;
                                    return i ? pe(o[i], a[i]) : o[i] == x ? -1 : a[i] == x ? 1 : 0
                                }, f) : f
                            }, ae.matches = function (e, t) {
                                return ae(e, null, null, t)
                            }, ae.matchesSelector = function (e, t) {
                                if (p(e), n.matchesSelector && m && !k[t + " "] && (!v || !v.test(t)) && (!g || !g.test(t))) try {
                                    var i = b.call(e, t);
                                    if (i || n.disconnectedMatch || e.document && 11 !== e.document.nodeType) return i
                                } catch (e) {
                                    k(t, !0)
                                }
                                return ae(t, f, null, [e]).length > 0
                            }, ae.contains = function (e, t) {
                                return (e.ownerDocument || e) != f && p(e), y(e, t)
                            }, ae.attr = function (e, t) {
                                (e.ownerDocument || e) != f && p(e);
                                var s = i.attrHandle[t.toLowerCase()],
                                    r = s && L.call(i.attrHandle, t.toLowerCase()) ? s(e, t, !m) : void 0;
                                return void 0 !== r ? r : n.attributes || !m ? e.getAttribute(t) : (r = e.getAttributeNode(t)) && r.specified ? r.value : null
                            }, ae.escape = function (e) {
                                return (e + "").replace(ie, se)
                            }, ae.error = function (e) {
                                throw new Error("Syntax error, unrecognized expression: " + e)
                            }, ae.uniqueSort = function (e) {
                                var t, i = [],
                                    s = 0,
                                    r = 0;
                                if (u = !n.detectDuplicates, d = !n.sortStable && e.slice(0), e.sort(A), u) {
                                    for (; t = e[r++];) t === e[r] && (s = i.push(r));
                                    for (; s--;) e.splice(i[s], 1)
                                }
                                return d = null, e
                            }, s = ae.getText = function (e) {
                                var t, n = "",
                                    i = 0,
                                    r = e.nodeType;
                                if (r) {
                                    if (1 === r || 9 === r || 11 === r) {
                                        if ("string" == typeof e.textContent) return e.textContent;
                                        for (e = e.firstChild; e; e = e.nextSibling) n += s(e)
                                    } else if (3 === r || 4 === r) return e.nodeValue
                                } else
                                    for (; t = e[i++];) n += s(t);
                                return n
                            }, i = ae.selectors = {
                                cacheLength: 50,
                                createPseudo: ce,
                                match: U,
                                attrHandle: {},
                                find: {},
                                relative: {
                                    ">": {
                                        dir: "parentNode",
                                        first: !0
                                    },
                                    " ": {
                                        dir: "parentNode"
                                    },
                                    "+": {
                                        dir: "previousSibling",
                                        first: !0
                                    },
                                    "~": {
                                        dir: "previousSibling"
                                    }
                                },
                                preFilter: {
                                    ATTR: function (e) {
                                        return e[1] = e[1].replace(te, ne), e[3] = (e[3] || e[4] || e[5] || "").replace(te, ne), "~=" === e[2] && (e[3] = " " + e[3] + " "), e.slice(0, 4)
                                    },
                                    CHILD: function (e) {
                                        return e[1] = e[1].toLowerCase(), "nth" === e[1].slice(0, 3) ? (e[3] || ae.error(e[0]), e[4] = +(e[4] ? e[5] + (e[6] || 1) : 2 * ("even" === e[3] || "odd" === e[3])), e[5] = +(e[7] + e[8] || "odd" === e[3])) : e[3] && ae.error(e[0]), e
                                    },
                                    PSEUDO: function (e) {
                                        var t, n = !e[6] && e[2];
                                        return U.CHILD.test(e[0]) ? null : (e[3] ? e[2] = e[4] || e[5] || "" : n && G.test(n) && (t = o(n, !0)) && (t = n.indexOf(")", n.length - t) - n.length) && (e[0] = e[0].slice(0, t), e[2] = n.slice(0, t)), e.slice(0, 3))
                                    }
                                },
                                filter: {
                                    TAG: function (e) {
                                        var t = e.replace(te, ne).toLowerCase();
                                        return "*" === e ? function () {
                                            return !0
                                        } : function (e) {
                                            return e.nodeName && e.nodeName.toLowerCase() === t
                                        }
                                    },
                                    CLASS: function (e) {
                                        var t = E[e + " "];
                                        return t || (t = new RegExp("(^|[\\x20\\t\\r\\n\\f])" + e + "(" + $ + "|$)")) && E(e, (function (e) {
                                            return t.test("string" == typeof e.className && e.className || void 0 !== e.getAttribute && e.getAttribute("class") || "")
                                        }))
                                    },
                                    ATTR: function (e, t, n) {
                                        return function (i) {
                                            var s = ae.attr(i, e);
                                            return null == s ? "!=" === t : !t || (s += "", "=" === t ? s === n : "!=" === t ? s !== n : "^=" === t ? n && 0 === s.indexOf(n) : "*=" === t ? n && s.indexOf(n) > -1 : "$=" === t ? n && s.slice(-n.length) === n : "~=" === t ? (" " + s.replace(B, " ") + " ").indexOf(n) > -1 : "|=" === t && (s === n || s.slice(0, n.length + 1) === n + "-"))
                                        }
                                    },
                                    CHILD: function (e, t, n, i, s) {
                                        var r = "nth" !== e.slice(0, 3),
                                            o = "last" !== e.slice(-4),
                                            a = "of-type" === t;
                                        return 1 === i && 0 === s ? function (e) {
                                            return !!e.parentNode
                                        } : function (t, n, l) {
                                            var c, d, u, p, f, h, m = r !== o ? "nextSibling" : "previousSibling",
                                                g = t.parentNode,
                                                v = a && t.nodeName.toLowerCase(),
                                                b = !l && !a,
                                                y = !1;
                                            if (g) {
                                                if (r) {
                                                    for (; m;) {
                                                        for (p = t; p = p[m];)
                                                            if (a ? p.nodeName.toLowerCase() === v : 1 === p.nodeType) return !1;
                                                        h = m = "only" === e && !h && "nextSibling"
                                                    }
                                                    return !0
                                                }
                                                if (h = [o ? g.firstChild : g.lastChild], o && b) {
                                                    for (y = (f = (c = (d = (u = (p = g)[w] || (p[w] = {}))[p.uniqueID] || (u[p.uniqueID] = {}))[e] || [])[0] === _ && c[1]) && c[2], p = f && g.childNodes[f]; p = ++f && p && p[m] || (y = f = 0) || h.pop();)
                                                        if (1 === p.nodeType && ++y && p === t) {
                                                            d[e] = [_, f, y];
                                                            break
                                                        }
                                                } else if (b && (y = f = (c = (d = (u = (p = t)[w] || (p[w] = {}))[p.uniqueID] || (u[p.uniqueID] = {}))[e] || [])[0] === _ && c[1]), !1 === y)
                                                    for (;
                                                        (p = ++f && p && p[m] || (y = f = 0) || h.pop()) && ((a ? p.nodeName.toLowerCase() !== v : 1 !== p.nodeType) || !++y || (b && ((d = (u = p[w] || (p[w] = {}))[p.uniqueID] || (u[p.uniqueID] = {}))[e] = [_, y]), p !== t)););
                                                return (y -= s) === i || y % i == 0 && y / i >= 0
                                            }
                                        }
                                    },
                                    PSEUDO: function (e, t) {
                                        var n, s = i.pseudos[e] || i.setFilters[e.toLowerCase()] || ae.error("unsupported pseudo: " + e);
                                        return s[w] ? s(t) : s.length > 1 ? (n = [e, e, "", t], i.setFilters.hasOwnProperty(e.toLowerCase()) ? ce((function (e, n) {
                                            for (var i, r = s(e, t), o = r.length; o--;) e[i = I(e, r[o])] = !(n[i] = r[o])
                                        })) : function (e) {
                                            return s(e, 0, n)
                                        }) : s
                                    }
                                },
                                pseudos: {
                                    not: ce((function (e) {
                                        var t = [],
                                            n = [],
                                            i = a(e.replace(q, "$1"));
                                        return i[w] ? ce((function (e, t, n, s) {
                                            for (var r, o = i(e, null, s, []), a = e.length; a--;)(r = o[a]) && (e[a] = !(t[a] = r))
                                        })) : function (e, s, r) {
                                            return t[0] = e, i(t, null, r, n), t[0] = null, !n.pop()
                                        }
                                    })),
                                    has: ce((function (e) {
                                        return function (t) {
                                            return ae(e, t).length > 0
                                        }
                                    })),
                                    contains: ce((function (e) {
                                        return e = e.replace(te, ne),
                                            function (t) {
                                                return (t.textContent || s(t)).indexOf(e) > -1
                                            }
                                    })),
                                    lang: ce((function (e) {
                                        return X.test(e || "") || ae.error("unsupported lang: " + e), e = e.replace(te, ne).toLowerCase(),
                                            function (t) {
                                                var n;
                                                do {
                                                    if (n = m ? t.lang : t.getAttribute("xml:lang") || t.getAttribute("lang")) return (n = n.toLowerCase()) === e || 0 === n.indexOf(e + "-")
                                                } while ((t = t.parentNode) && 1 === t.nodeType);
                                                return !1
                                            }
                                    })),
                                    target: function (t) {
                                        var n = e.location && e.location.hash;
                                        return n && n.slice(1) === t.id
                                    },
                                    root: function (e) {
                                        return e === h
                                    },
                                    focus: function (e) {
                                        return e === f.activeElement && (!f.hasFocus || f.hasFocus()) && !!(e.type || e.href || ~e.tabIndex)
                                    },
                                    enabled: me(!1),
                                    disabled: me(!0),
                                    checked: function (e) {
                                        var t = e.nodeName.toLowerCase();
                                        return "input" === t && !!e.checked || "option" === t && !!e.selected
                                    },
                                    selected: function (e) {
                                        return e.parentNode && e.parentNode.selectedIndex, !0 === e.selected
                                    },
                                    empty: function (e) {
                                        for (e = e.firstChild; e; e = e.nextSibling)
                                            if (e.nodeType < 6) return !1;
                                        return !0
                                    },
                                    parent: function (e) {
                                        return !i.pseudos.empty(e)
                                    },
                                    header: function (e) {
                                        return Q.test(e.nodeName)
                                    },
                                    input: function (e) {
                                        return K.test(e.nodeName)
                                    },
                                    button: function (e) {
                                        var t = e.nodeName.toLowerCase();
                                        return "input" === t && "button" === e.type || "button" === t
                                    },
                                    text: function (e) {
                                        var t;
                                        return "input" === e.nodeName.toLowerCase() && "text" === e.type && (null == (t = e.getAttribute("type")) || "text" === t.toLowerCase())
                                    },
                                    first: ge((function () {
                                        return [0]
                                    })),
                                    last: ge((function (e, t) {
                                        return [t - 1]
                                    })),
                                    eq: ge((function (e, t, n) {
                                        return [n < 0 ? n + t : n]
                                    })),
                                    even: ge((function (e, t) {
                                        for (var n = 0; n < t; n += 2) e.push(n);
                                        return e
                                    })),
                                    odd: ge((function (e, t) {
                                        for (var n = 1; n < t; n += 2) e.push(n);
                                        return e
                                    })),
                                    lt: ge((function (e, t, n) {
                                        for (var i = n < 0 ? n + t : n > t ? t : n; --i >= 0;) e.push(i);
                                        return e
                                    })),
                                    gt: ge((function (e, t, n) {
                                        for (var i = n < 0 ? n + t : n; ++i < t;) e.push(i);
                                        return e
                                    }))
                                }
                            }, i.pseudos.nth = i.pseudos.eq, {
                                radio: !0,
                                checkbox: !0,
                                file: !0,
                                password: !0,
                                image: !0
                            }) i.pseudos[t] = fe(t);
                        for (t in {
                                submit: !0,
                                reset: !0
                            }) i.pseudos[t] = he(t);

                        function be() {}

                        function ye(e) {
                            for (var t = 0, n = e.length, i = ""; t < n; t++) i += e[t].value;
                            return i
                        }

                        function we(e, t, n) {
                            var i = t.dir,
                                s = t.next,
                                r = s || i,
                                o = n && "parentNode" === r,
                                a = C++;
                            return t.first ? function (t, n, s) {
                                for (; t = t[i];)
                                    if (1 === t.nodeType || o) return e(t, n, s);
                                return !1
                            } : function (t, n, l) {
                                var c, d, u, p = [_, a];
                                if (l) {
                                    for (; t = t[i];)
                                        if ((1 === t.nodeType || o) && e(t, n, l)) return !0
                                } else
                                    for (; t = t[i];)
                                        if (1 === t.nodeType || o)
                                            if (d = (u = t[w] || (t[w] = {}))[t.uniqueID] || (u[t.uniqueID] = {}), s && s === t.nodeName.toLowerCase()) t = t[i] || t;
                                            else {
                                                if ((c = d[r]) && c[0] === _ && c[1] === a) return p[2] = c[2];
                                                if (d[r] = p, p[2] = e(t, n, l)) return !0
                                            } return !1
                            }
                        }

                        function xe(e) {
                            return e.length > 1 ? function (t, n, i) {
                                for (var s = e.length; s--;)
                                    if (!e[s](t, n, i)) return !1;
                                return !0
                            } : e[0]
                        }

                        function _e(e, t, n, i, s) {
                            for (var r, o = [], a = 0, l = e.length, c = null != t; a < l; a++)(r = e[a]) && (n && !n(r, i, s) || (o.push(r), c && t.push(a)));
                            return o
                        }

                        function Ce(e, t, n, i, s, r) {
                            return i && !i[w] && (i = Ce(i)), s && !s[w] && (s = Ce(s, r)), ce((function (r, o, a, l) {
                                var c, d, u, p = [],
                                    f = [],
                                    h = o.length,
                                    m = r || function (e, t, n) {
                                        for (var i = 0, s = t.length; i < s; i++) ae(e, t[i], n);
                                        return n
                                    }(t || "*", a.nodeType ? [a] : a, []),
                                    g = !e || !r && t ? m : _e(m, p, e, a, l),
                                    v = n ? s || (r ? e : h || i) ? [] : o : g;
                                if (n && n(g, v, a, l), i)
                                    for (c = _e(v, f), i(c, [], a, l), d = c.length; d--;)(u = c[d]) && (v[f[d]] = !(g[f[d]] = u));
                                if (r) {
                                    if (s || e) {
                                        if (s) {
                                            for (c = [], d = v.length; d--;)(u = v[d]) && c.push(g[d] = u);
                                            s(null, v = [], c, l)
                                        }
                                        for (d = v.length; d--;)(u = v[d]) && (c = s ? I(r, u) : p[d]) > -1 && (r[c] = !(o[c] = u))
                                    }
                                } else v = _e(v === o ? v.splice(h, v.length) : v), s ? s(null, o, v, l) : M.apply(o, v)
                            }))
                        }

                        function Ee(e) {
                            for (var t, n, s, r = e.length, o = i.relative[e[0].type], a = o || i.relative[" "], l = o ? 1 : 0, d = we((function (e) {
                                    return e === t
                                }), a, !0), u = we((function (e) {
                                    return I(t, e) > -1
                                }), a, !0), p = [function (e, n, i) {
                                    var s = !o && (i || n !== c) || ((t = n).nodeType ? d(e, n, i) : u(e, n, i));
                                    return t = null, s
                                }]; l < r; l++)
                                if (n = i.relative[e[l].type]) p = [we(xe(p), n)];
                                else {
                                    if ((n = i.filter[e[l].type].apply(null, e[l].matches))[w]) {
                                        for (s = ++l; s < r && !i.relative[e[s].type]; s++);
                                        return Ce(l > 1 && xe(p), l > 1 && ye(e.slice(0, l - 1).concat({
                                            value: " " === e[l - 2].type ? "*" : ""
                                        })).replace(q, "$1"), n, l < s && Ee(e.slice(l, s)), s < r && Ee(e = e.slice(s)), s < r && ye(e))
                                    }
                                    p.push(n)
                                } return xe(p)
                        }
                        return be.prototype = i.filters = i.pseudos, i.setFilters = new be, o = ae.tokenize = function (e, t) {
                            var n, s, r, o, a, l, c, d = T[e + " "];
                            if (d) return t ? 0 : d.slice(0);
                            for (a = e, l = [], c = i.preFilter; a;) {
                                for (o in n && !(s = R.exec(a)) || (s && (a = a.slice(s[0].length) || a), l.push(r = [])), n = !1, (s = V.exec(a)) && (n = s.shift(), r.push({
                                        value: n,
                                        type: s[0].replace(q, " ")
                                    }), a = a.slice(n.length)), i.filter) !(s = U[o].exec(a)) || c[o] && !(s = c[o](s)) || (n = s.shift(), r.push({
                                    value: n,
                                    type: o,
                                    matches: s
                                }), a = a.slice(n.length));
                                if (!n) break
                            }
                            return t ? a.length : a ? ae.error(e) : T(e, l).slice(0)
                        }, a = ae.compile = function (e, t) {
                            var n, s = [],
                                r = [],
                                a = S[e + " "];
                            if (!a) {
                                for (t || (t = o(e)), n = t.length; n--;)(a = Ee(t[n]))[w] ? s.push(a) : r.push(a);
                                a = S(e, function (e, t) {
                                    var n = t.length > 0,
                                        s = e.length > 0,
                                        r = function (r, o, a, l, d) {
                                            var u, h, g, v = 0,
                                                b = "0",
                                                y = r && [],
                                                w = [],
                                                x = c,
                                                C = r || s && i.find.TAG("*", d),
                                                E = _ += null == x ? 1 : Math.random() || .1,
                                                T = C.length;
                                            for (d && (c = o == f || o || d); b !== T && null != (u = C[b]); b++) {
                                                if (s && u) {
                                                    for (h = 0, o || u.ownerDocument == f || (p(u), a = !m); g = e[h++];)
                                                        if (g(u, o || f, a)) {
                                                            l.push(u);
                                                            break
                                                        } d && (_ = E)
                                                }
                                                n && ((u = !g && u) && v--, r && y.push(u))
                                            }
                                            if (v += b, n && b !== v) {
                                                for (h = 0; g = t[h++];) g(y, w, o, a);
                                                if (r) {
                                                    if (v > 0)
                                                        for (; b--;) y[b] || w[b] || (w[b] = P.call(l));
                                                    w = _e(w)
                                                }
                                                M.apply(l, w), d && !r && w.length > 0 && v + t.length > 1 && ae.uniqueSort(l)
                                            }
                                            return d && (_ = E, c = x), y
                                        };
                                    return n ? ce(r) : r
                                }(r, s)), a.selector = e
                            }
                            return a
                        }, l = ae.select = function (e, t, n, s) {
                            var r, l, c, d, u, p = "function" == typeof e && e,
                                f = !s && o(e = p.selector || e);
                            if (n = n || [], 1 === f.length) {
                                if ((l = f[0] = f[0].slice(0)).length > 2 && "ID" === (c = l[0]).type && 9 === t.nodeType && m && i.relative[l[1].type]) {
                                    if (!(t = (i.find.ID(c.matches[0].replace(te, ne), t) || [])[0])) return n;
                                    p && (t = t.parentNode), e = e.slice(l.shift().value.length)
                                }
                                for (r = U.needsContext.test(e) ? 0 : l.length; r-- && (c = l[r], !i.relative[d = c.type]);)
                                    if ((u = i.find[d]) && (s = u(c.matches[0].replace(te, ne), ee.test(l[0].type) && ve(t.parentNode) || t))) {
                                        if (l.splice(r, 1), !(e = s.length && ye(l))) return M.apply(n, s), n;
                                        break
                                    }
                            }
                            return (p || a(e, f))(s, t, !m, n, !t || ee.test(e) && ve(t.parentNode) || t), n
                        }, n.sortStable = w.split("").sort(A).join("") === w, n.detectDuplicates = !!u, p(), n.sortDetached = de((function (e) {
                            return 1 & e.compareDocumentPosition(f.createElement("fieldset"))
                        })), de((function (e) {
                            return e.innerHTML = "<a href='#'></a>", "#" === e.firstChild.getAttribute("href")
                        })) || ue("type|href|height|width", (function (e, t, n) {
                            if (!n) return e.getAttribute(t, "type" === t.toLowerCase() ? 1 : 2)
                        })), n.attributes && de((function (e) {
                            return e.innerHTML = "<input/>", e.firstChild.setAttribute("value", ""), "" === e.firstChild.getAttribute("value")
                        })) || ue("value", (function (e, t, n) {
                            if (!n && "input" === e.nodeName.toLowerCase()) return e.defaultValue
                        })), de((function (e) {
                            return null == e.getAttribute("disabled")
                        })) || ue(j, (function (e, t, n) {
                            var i;
                            if (!n) return !0 === e[t] ? t.toLowerCase() : (i = e.getAttributeNode(t)) && i.specified ? i.value : null
                        })), ae
                    }(i);
                    E.find = S, E.expr = S.selectors, E.expr[":"] = E.expr.pseudos, E.uniqueSort = E.unique = S.uniqueSort, E.text = S.getText, E.isXMLDoc = S.isXML, E.contains = S.contains, E.escapeSelector = S.escape;
                    var k = function (e, t, n) {
                            for (var i = [], s = void 0 !== n;
                                (e = e[t]) && 9 !== e.nodeType;)
                                if (1 === e.nodeType) {
                                    if (s && E(e).is(n)) break;
                                    i.push(e)
                                } return i
                        },
                        A = function (e, t) {
                            for (var n = []; e; e = e.nextSibling) 1 === e.nodeType && e !== t && n.push(e);
                            return n
                        },
                        L = E.expr.match.needsContext;

                    function O(e, t) {
                        return e.nodeName && e.nodeName.toLowerCase() === t.toLowerCase()
                    }
                    var P = /^<([a-z][^\/\0>:\x20\t\r\n\f]*)[\x20\t\r\n\f]*\/?>(?:<\/\1>|)$/i;

                    function D(e, t, n) {
                        return v(t) ? E.grep(e, (function (e, i) {
                            return !!t.call(e, i, e) !== n
                        })) : t.nodeType ? E.grep(e, (function (e) {
                            return e === t !== n
                        })) : "string" != typeof t ? E.grep(e, (function (e) {
                            return d.call(t, e) > -1 !== n
                        })) : E.filter(t, e, n)
                    }
                    E.filter = function (e, t, n) {
                        var i = t[0];
                        return n && (e = ":not(" + e + ")"), 1 === t.length && 1 === i.nodeType ? E.find.matchesSelector(i, e) ? [i] : [] : E.find.matches(e, E.grep(t, (function (e) {
                            return 1 === e.nodeType
                        })))
                    }, E.fn.extend({
                        find: function (e) {
                            var t, n, i = this.length,
                                s = this;
                            if ("string" != typeof e) return this.pushStack(E(e).filter((function () {
                                for (t = 0; t < i; t++)
                                    if (E.contains(s[t], this)) return !0
                            })));
                            for (n = this.pushStack([]), t = 0; t < i; t++) E.find(e, s[t], n);
                            return i > 1 ? E.uniqueSort(n) : n
                        },
                        filter: function (e) {
                            return this.pushStack(D(this, e || [], !1))
                        },
                        not: function (e) {
                            return this.pushStack(D(this, e || [], !0))
                        },
                        is: function (e) {
                            return !!D(this, "string" == typeof e && L.test(e) ? E(e) : e || [], !1).length
                        }
                    });
                    var M, N = /^(?:\s*(<[\w\W]+>)[^>]*|#([\w-]+))$/;
                    (E.fn.init = function (e, t, n) {
                        var i, s;
                        if (!e) return this;
                        if (n = n || M, "string" == typeof e) {
                            if (!(i = "<" === e[0] && ">" === e[e.length - 1] && e.length >= 3 ? [null, e, null] : N.exec(e)) || !i[1] && t) return !t || t.jquery ? (t || n).find(e) : this.constructor(t).find(e);
                            if (i[1]) {
                                if (t = t instanceof E ? t[0] : t, E.merge(this, E.parseHTML(i[1], t && t.nodeType ? t.ownerDocument || t : y, !0)), P.test(i[1]) && E.isPlainObject(t))
                                    for (i in t) v(this[i]) ? this[i](t[i]) : this.attr(i, t[i]);
                                return this
                            }
                            return (s = y.getElementById(i[2])) && (this[0] = s, this.length = 1), this
                        }
                        return e.nodeType ? (this[0] = e, this.length = 1, this) : v(e) ? void 0 !== n.ready ? n.ready(e) : e(E) : E.makeArray(e, this)
                    }).prototype = E.fn, M = E(y);
                    var I = /^(?:parents|prev(?:Until|All))/,
                        j = {
                            children: !0,
                            contents: !0,
                            next: !0,
                            prev: !0
                        };

                    function $(e, t) {
                        for (;
                            (e = e[t]) && 1 !== e.nodeType;);
                        return e
                    }
                    E.fn.extend({
                        has: function (e) {
                            var t = E(e, this),
                                n = t.length;
                            return this.filter((function () {
                                for (var e = 0; e < n; e++)
                                    if (E.contains(this, t[e])) return !0
                            }))
                        },
                        closest: function (e, t) {
                            var n, i = 0,
                                s = this.length,
                                r = [],
                                o = "string" != typeof e && E(e);
                            if (!L.test(e))
                                for (; i < s; i++)
                                    for (n = this[i]; n && n !== t; n = n.parentNode)
                                        if (n.nodeType < 11 && (o ? o.index(n) > -1 : 1 === n.nodeType && E.find.matchesSelector(n, e))) {
                                            r.push(n);
                                            break
                                        } return this.pushStack(r.length > 1 ? E.uniqueSort(r) : r)
                        },
                        index: function (e) {
                            return e ? "string" == typeof e ? d.call(E(e), this[0]) : d.call(this, e.jquery ? e[0] : e) : this[0] && this[0].parentNode ? this.first().prevAll().length : -1
                        },
                        add: function (e, t) {
                            return this.pushStack(E.uniqueSort(E.merge(this.get(), E(e, t))))
                        },
                        addBack: function (e) {
                            return this.add(null == e ? this.prevObject : this.prevObject.filter(e))
                        }
                    }), E.each({
                        parent: function (e) {
                            var t = e.parentNode;
                            return t && 11 !== t.nodeType ? t : null
                        },
                        parents: function (e) {
                            return k(e, "parentNode")
                        },
                        parentsUntil: function (e, t, n) {
                            return k(e, "parentNode", n)
                        },
                        next: function (e) {
                            return $(e, "nextSibling")
                        },
                        prev: function (e) {
                            return $(e, "previousSibling")
                        },
                        nextAll: function (e) {
                            return k(e, "nextSibling")
                        },
                        prevAll: function (e) {
                            return k(e, "previousSibling")
                        },
                        nextUntil: function (e, t, n) {
                            return k(e, "nextSibling", n)
                        },
                        prevUntil: function (e, t, n) {
                            return k(e, "previousSibling", n)
                        },
                        siblings: function (e) {
                            return A((e.parentNode || {}).firstChild, e)
                        },
                        children: function (e) {
                            return A(e.firstChild)
                        },
                        contents: function (e) {
                            return null != e.contentDocument && o(e.contentDocument) ? e.contentDocument : (O(e, "template") && (e = e.content || e), E.merge([], e.childNodes))
                        }
                    }, (function (e, t) {
                        E.fn[e] = function (n, i) {
                            var s = E.map(this, t, n);
                            return "Until" !== e.slice(-5) && (i = n), i && "string" == typeof i && (s = E.filter(i, s)), this.length > 1 && (j[e] || E.uniqueSort(s), I.test(e) && s.reverse()), this.pushStack(s)
                        }
                    }));
                    var z = /[^\x20\t\r\n\f]+/g;

                    function H(e) {
                        return e
                    }

                    function F(e) {
                        throw e
                    }

                    function B(e, t, n, i) {
                        var s;
                        try {
                            e && v(s = e.promise) ? s.call(e).done(t).fail(n) : e && v(s = e.then) ? s.call(e, t, n) : t.apply(void 0, [e].slice(i))
                        } catch (e) {
                            n.apply(void 0, [e])
                        }
                    }
                    E.Callbacks = function (e) {
                        e = "string" == typeof e ? function (e) {
                            var t = {};
                            return E.each(e.match(z) || [], (function (e, n) {
                                t[n] = !0
                            })), t
                        }(e) : E.extend({}, e);
                        var t, n, i, s, r = [],
                            o = [],
                            a = -1,
                            l = function () {
                                for (s = s || e.once, i = t = !0; o.length; a = -1)
                                    for (n = o.shift(); ++a < r.length;) !1 === r[a].apply(n[0], n[1]) && e.stopOnFalse && (a = r.length, n = !1);
                                e.memory || (n = !1), t = !1, s && (r = n ? [] : "")
                            },
                            c = {
                                add: function () {
                                    return r && (n && !t && (a = r.length - 1, o.push(n)), function t(n) {
                                        E.each(n, (function (n, i) {
                                            v(i) ? e.unique && c.has(i) || r.push(i) : i && i.length && "string" !== _(i) && t(i)
                                        }))
                                    }(arguments), n && !t && l()), this
                                },
                                remove: function () {
                                    return E.each(arguments, (function (e, t) {
                                        for (var n;
                                            (n = E.inArray(t, r, n)) > -1;) r.splice(n, 1), n <= a && a--
                                    })), this
                                },
                                has: function (e) {
                                    return e ? E.inArray(e, r) > -1 : r.length > 0
                                },
                                empty: function () {
                                    return r && (r = []), this
                                },
                                disable: function () {
                                    return s = o = [], r = n = "", this
                                },
                                disabled: function () {
                                    return !r
                                },
                                lock: function () {
                                    return s = o = [], n || t || (r = n = ""), this
                                },
                                locked: function () {
                                    return !!s
                                },
                                fireWith: function (e, n) {
                                    return s || (n = [e, (n = n || []).slice ? n.slice() : n], o.push(n), t || l()), this
                                },
                                fire: function () {
                                    return c.fireWith(this, arguments), this
                                },
                                fired: function () {
                                    return !!i
                                }
                            };
                        return c
                    }, E.extend({
                        Deferred: function (e) {
                            var t = [
                                    ["notify", "progress", E.Callbacks("memory"), E.Callbacks("memory"), 2],
                                    ["resolve", "done", E.Callbacks("once memory"), E.Callbacks("once memory"), 0, "resolved"],
                                    ["reject", "fail", E.Callbacks("once memory"), E.Callbacks("once memory"), 1, "rejected"]
                                ],
                                n = "pending",
                                s = {
                                    state: function () {
                                        return n
                                    },
                                    always: function () {
                                        return r.done(arguments).fail(arguments), this
                                    },
                                    catch: function (e) {
                                        return s.then(null, e)
                                    },
                                    pipe: function () {
                                        var e = arguments;
                                        return E.Deferred((function (n) {
                                            E.each(t, (function (t, i) {
                                                var s = v(e[i[4]]) && e[i[4]];
                                                r[i[1]]((function () {
                                                    var e = s && s.apply(this, arguments);
                                                    e && v(e.promise) ? e.promise().progress(n.notify).done(n.resolve).fail(n.reject) : n[i[0] + "With"](this, s ? [e] : arguments)
                                                }))
                                            })), e = null
                                        })).promise()
                                    },
                                    then: function (e, n, s) {
                                        var r = 0;

                                        function o(e, t, n, s) {
                                            return function () {
                                                var a = this,
                                                    l = arguments,
                                                    c = function () {
                                                        var i, c;
                                                        if (!(e < r)) {
                                                            if ((i = n.apply(a, l)) === t.promise()) throw new TypeError("Thenable self-resolution");
                                                            c = i && ("object" == typeof i || "function" == typeof i) && i.then, v(c) ? s ? c.call(i, o(r, t, H, s), o(r, t, F, s)) : (r++, c.call(i, o(r, t, H, s), o(r, t, F, s), o(r, t, H, t.notifyWith))) : (n !== H && (a = void 0, l = [i]), (s || t.resolveWith)(a, l))
                                                        }
                                                    },
                                                    d = s ? c : function () {
                                                        try {
                                                            c()
                                                        } catch (i) {
                                                            E.Deferred.exceptionHook && E.Deferred.exceptionHook(i, d.stackTrace), e + 1 >= r && (n !== F && (a = void 0, l = [i]), t.rejectWith(a, l))
                                                        }
                                                    };
                                                e ? d() : (E.Deferred.getStackHook && (d.stackTrace = E.Deferred.getStackHook()), i.setTimeout(d))
                                            }
                                        }
                                        return E.Deferred((function (i) {
                                            t[0][3].add(o(0, i, v(s) ? s : H, i.notifyWith)), t[1][3].add(o(0, i, v(e) ? e : H)), t[2][3].add(o(0, i, v(n) ? n : F))
                                        })).promise()
                                    },
                                    promise: function (e) {
                                        return null != e ? E.extend(e, s) : s
                                    }
                                },
                                r = {};
                            return E.each(t, (function (e, i) {
                                var o = i[2],
                                    a = i[5];
                                s[i[1]] = o.add, a && o.add((function () {
                                    n = a
                                }), t[3 - e][2].disable, t[3 - e][3].disable, t[0][2].lock, t[0][3].lock), o.add(i[3].fire), r[i[0]] = function () {
                                    return r[i[0] + "With"](this === r ? void 0 : this, arguments), this
                                }, r[i[0] + "With"] = o.fireWith
                            })), s.promise(r), e && e.call(r, r), r
                        },
                        when: function (e) {
                            var t = arguments.length,
                                n = t,
                                i = Array(n),
                                s = a.call(arguments),
                                r = E.Deferred(),
                                o = function (e) {
                                    return function (n) {
                                        i[e] = this, s[e] = arguments.length > 1 ? a.call(arguments) : n, --t || r.resolveWith(i, s)
                                    }
                                };
                            if (t <= 1 && (B(e, r.done(o(n)).resolve, r.reject, !t), "pending" === r.state() || v(s[n] && s[n].then))) return r.then();
                            for (; n--;) B(s[n], o(n), r.reject);
                            return r.promise()
                        }
                    });
                    var q = /^(Eval|Internal|Range|Reference|Syntax|Type|URI)Error$/;
                    E.Deferred.exceptionHook = function (e, t) {
                        i.console && i.console.warn && e && q.test(e.name) && i.console.warn("jQuery.Deferred exception: " + e.message, e.stack, t)
                    }, E.readyException = function (e) {
                        i.setTimeout((function () {
                            throw e
                        }))
                    };
                    var R = E.Deferred();

                    function V() {
                        y.removeEventListener("DOMContentLoaded", V), i.removeEventListener("load", V), E.ready()
                    }
                    E.fn.ready = function (e) {
                        return R.then(e).catch((function (e) {
                            E.readyException(e)
                        })), this
                    }, E.extend({
                        isReady: !1,
                        readyWait: 1,
                        ready: function (e) {
                            (!0 === e ? --E.readyWait : E.isReady) || (E.isReady = !0, !0 !== e && --E.readyWait > 0 || R.resolveWith(y, [E]))
                        }
                    }), E.ready.then = R.then, "complete" === y.readyState || "loading" !== y.readyState && !y.documentElement.doScroll ? i.setTimeout(E.ready) : (y.addEventListener("DOMContentLoaded", V), i.addEventListener("load", V));
                    var W = function (e, t, n, i, s, r, o) {
                            var a = 0,
                                l = e.length,
                                c = null == n;
                            if ("object" === _(n))
                                for (a in s = !0, n) W(e, t, a, n[a], !0, r, o);
                            else if (void 0 !== i && (s = !0, v(i) || (o = !0), c && (o ? (t.call(e, i), t = null) : (c = t, t = function (e, t, n) {
                                    return c.call(E(e), n)
                                })), t))
                                for (; a < l; a++) t(e[a], n, o ? i : i.call(e[a], a, t(e[a], n)));
                            return s ? e : c ? t.call(e) : l ? t(e[0], n) : r
                        },
                        G = /^-ms-/,
                        X = /-([a-z])/g;

                    function U(e, t) {
                        return t.toUpperCase()
                    }

                    function Y(e) {
                        return e.replace(G, "ms-").replace(X, U)
                    }
                    var K = function (e) {
                        return 1 === e.nodeType || 9 === e.nodeType || !+e.nodeType
                    };

                    function Q() {
                        this.expando = E.expando + Q.uid++
                    }
                    Q.uid = 1, Q.prototype = {
                        cache: function (e) {
                            var t = e[this.expando];
                            return t || (t = {}, K(e) && (e.nodeType ? e[this.expando] = t : Object.defineProperty(e, this.expando, {
                                value: t,
                                configurable: !0
                            }))), t
                        },
                        set: function (e, t, n) {
                            var i, s = this.cache(e);
                            if ("string" == typeof t) s[Y(t)] = n;
                            else
                                for (i in t) s[Y(i)] = t[i];
                            return s
                        },
                        get: function (e, t) {
                            return void 0 === t ? this.cache(e) : e[this.expando] && e[this.expando][Y(t)]
                        },
                        access: function (e, t, n) {
                            return void 0 === t || t && "string" == typeof t && void 0 === n ? this.get(e, t) : (this.set(e, t, n), void 0 !== n ? n : t)
                        },
                        remove: function (e, t) {
                            var n, i = e[this.expando];
                            if (void 0 !== i) {
                                if (void 0 !== t) {
                                    n = (t = Array.isArray(t) ? t.map(Y) : (t = Y(t)) in i ? [t] : t.match(z) || []).length;
                                    for (; n--;) delete i[t[n]]
                                }(void 0 === t || E.isEmptyObject(i)) && (e.nodeType ? e[this.expando] = void 0 : delete e[this.expando])
                            }
                        },
                        hasData: function (e) {
                            var t = e[this.expando];
                            return void 0 !== t && !E.isEmptyObject(t)
                        }
                    };
                    var J = new Q,
                        Z = new Q,
                        ee = /^(?:\{[\w\W]*\}|\[[\w\W]*\])$/,
                        te = /[A-Z]/g;

                    function ne(e, t, n) {
                        var i;
                        if (void 0 === n && 1 === e.nodeType)
                            if (i = "data-" + t.replace(te, "-$&").toLowerCase(), "string" == typeof (n = e.getAttribute(i))) {
                                try {
                                    n = function (e) {
                                        return "true" === e || "false" !== e && ("null" === e ? null : e === +e + "" ? +e : ee.test(e) ? JSON.parse(e) : e)
                                    }(n)
                                } catch (e) {}
                                Z.set(e, t, n)
                            } else n = void 0;
                        return n
                    }
                    E.extend({
                        hasData: function (e) {
                            return Z.hasData(e) || J.hasData(e)
                        },
                        data: function (e, t, n) {
                            return Z.access(e, t, n)
                        },
                        removeData: function (e, t) {
                            Z.remove(e, t)
                        },
                        _data: function (e, t, n) {
                            return J.access(e, t, n)
                        },
                        _removeData: function (e, t) {
                            J.remove(e, t)
                        }
                    }), E.fn.extend({
                        data: function (e, t) {
                            var n, i, s, r = this[0],
                                o = r && r.attributes;
                            if (void 0 === e) {
                                if (this.length && (s = Z.get(r), 1 === r.nodeType && !J.get(r, "hasDataAttrs"))) {
                                    for (n = o.length; n--;) o[n] && 0 === (i = o[n].name).indexOf("data-") && (i = Y(i.slice(5)), ne(r, i, s[i]));
                                    J.set(r, "hasDataAttrs", !0)
                                }
                                return s
                            }
                            return "object" == typeof e ? this.each((function () {
                                Z.set(this, e)
                            })) : W(this, (function (t) {
                                var n;
                                if (r && void 0 === t) return void 0 !== (n = Z.get(r, e)) || void 0 !== (n = ne(r, e)) ? n : void 0;
                                this.each((function () {
                                    Z.set(this, e, t)
                                }))
                            }), null, t, arguments.length > 1, null, !0)
                        },
                        removeData: function (e) {
                            return this.each((function () {
                                Z.remove(this, e)
                            }))
                        }
                    }), E.extend({
                        queue: function (e, t, n) {
                            var i;
                            if (e) return t = (t || "fx") + "queue", i = J.get(e, t), n && (!i || Array.isArray(n) ? i = J.access(e, t, E.makeArray(n)) : i.push(n)), i || []
                        },
                        dequeue: function (e, t) {
                            t = t || "fx";
                            var n = E.queue(e, t),
                                i = n.length,
                                s = n.shift(),
                                r = E._queueHooks(e, t);
                            "inprogress" === s && (s = n.shift(), i--), s && ("fx" === t && n.unshift("inprogress"), delete r.stop, s.call(e, (function () {
                                E.dequeue(e, t)
                            }), r)), !i && r && r.empty.fire()
                        },
                        _queueHooks: function (e, t) {
                            var n = t + "queueHooks";
                            return J.get(e, n) || J.access(e, n, {
                                empty: E.Callbacks("once memory").add((function () {
                                    J.remove(e, [t + "queue", n])
                                }))
                            })
                        }
                    }), E.fn.extend({
                        queue: function (e, t) {
                            var n = 2;
                            return "string" != typeof e && (t = e, e = "fx", n--), arguments.length < n ? E.queue(this[0], e) : void 0 === t ? this : this.each((function () {
                                var n = E.queue(this, e, t);
                                E._queueHooks(this, e), "fx" === e && "inprogress" !== n[0] && E.dequeue(this, e)
                            }))
                        },
                        dequeue: function (e) {
                            return this.each((function () {
                                E.dequeue(this, e)
                            }))
                        },
                        clearQueue: function (e) {
                            return this.queue(e || "fx", [])
                        },
                        promise: function (e, t) {
                            var n, i = 1,
                                s = E.Deferred(),
                                r = this,
                                o = this.length,
                                a = function () {
                                    --i || s.resolveWith(r, [r])
                                };
                            for ("string" != typeof e && (t = e, e = void 0), e = e || "fx"; o--;)(n = J.get(r[o], e + "queueHooks")) && n.empty && (i++, n.empty.add(a));
                            return a(), s.promise(t)
                        }
                    });
                    var ie = /[+-]?(?:\d*\.|)\d+(?:[eE][+-]?\d+|)/.source,
                        se = new RegExp("^(?:([+-])=|)(" + ie + ")([a-z%]*)$", "i"),
                        re = ["Top", "Right", "Bottom", "Left"],
                        oe = y.documentElement,
                        ae = function (e) {
                            return E.contains(e.ownerDocument, e)
                        },
                        le = {
                            composed: !0
                        };
                    oe.getRootNode && (ae = function (e) {
                        return E.contains(e.ownerDocument, e) || e.getRootNode(le) === e.ownerDocument
                    });
                    var ce = function (e, t) {
                        return "none" === (e = t || e).style.display || "" === e.style.display && ae(e) && "none" === E.css(e, "display")
                    };

                    function de(e, t, n, i) {
                        var s, r, o = 20,
                            a = i ? function () {
                                return i.cur()
                            } : function () {
                                return E.css(e, t, "")
                            },
                            l = a(),
                            c = n && n[3] || (E.cssNumber[t] ? "" : "px"),
                            d = e.nodeType && (E.cssNumber[t] || "px" !== c && +l) && se.exec(E.css(e, t));
                        if (d && d[3] !== c) {
                            for (l /= 2, c = c || d[3], d = +l || 1; o--;) E.style(e, t, d + c), (1 - r) * (1 - (r = a() / l || .5)) <= 0 && (o = 0), d /= r;
                            d *= 2, E.style(e, t, d + c), n = n || []
                        }
                        return n && (d = +d || +l || 0, s = n[1] ? d + (n[1] + 1) * n[2] : +n[2], i && (i.unit = c, i.start = d, i.end = s)), s
                    }
                    var ue = {};

                    function pe(e) {
                        var t, n = e.ownerDocument,
                            i = e.nodeName,
                            s = ue[i];
                        return s || (t = n.body.appendChild(n.createElement(i)), s = E.css(t, "display"), t.parentNode.removeChild(t), "none" === s && (s = "block"), ue[i] = s, s)
                    }

                    function fe(e, t) {
                        for (var n, i, s = [], r = 0, o = e.length; r < o; r++)(i = e[r]).style && (n = i.style.display, t ? ("none" === n && (s[r] = J.get(i, "display") || null, s[r] || (i.style.display = "")), "" === i.style.display && ce(i) && (s[r] = pe(i))) : "none" !== n && (s[r] = "none", J.set(i, "display", n)));
                        for (r = 0; r < o; r++) null != s[r] && (e[r].style.display = s[r]);
                        return e
                    }
                    E.fn.extend({
                        show: function () {
                            return fe(this, !0)
                        },
                        hide: function () {
                            return fe(this)
                        },
                        toggle: function (e) {
                            return "boolean" == typeof e ? e ? this.show() : this.hide() : this.each((function () {
                                ce(this) ? E(this).show() : E(this).hide()
                            }))
                        }
                    });
                    var he, me, ge = /^(?:checkbox|radio)$/i,
                        ve = /<([a-z][^\/\0>\x20\t\r\n\f]*)/i,
                        be = /^$|^module$|\/(?:java|ecma)script/i;
                    he = y.createDocumentFragment().appendChild(y.createElement("div")), (me = y.createElement("input")).setAttribute("type", "radio"), me.setAttribute("checked", "checked"), me.setAttribute("name", "t"), he.appendChild(me), g.checkClone = he.cloneNode(!0).cloneNode(!0).lastChild.checked, he.innerHTML = "<textarea>x</textarea>", g.noCloneChecked = !!he.cloneNode(!0).lastChild.defaultValue, he.innerHTML = "<option></option>", g.option = !!he.lastChild;
                    var ye = {
                        thead: [1, "<table>", "</table>"],
                        col: [2, "<table><colgroup>", "</colgroup></table>"],
                        tr: [2, "<table><tbody>", "</tbody></table>"],
                        td: [3, "<table><tbody><tr>", "</tr></tbody></table>"],
                        _default: [0, "", ""]
                    };

                    function we(e, t) {
                        var n;
                        return n = void 0 !== e.getElementsByTagName ? e.getElementsByTagName(t || "*") : void 0 !== e.querySelectorAll ? e.querySelectorAll(t || "*") : [], void 0 === t || t && O(e, t) ? E.merge([e], n) : n
                    }

                    function xe(e, t) {
                        for (var n = 0, i = e.length; n < i; n++) J.set(e[n], "globalEval", !t || J.get(t[n], "globalEval"))
                    }
                    ye.tbody = ye.tfoot = ye.colgroup = ye.caption = ye.thead, ye.th = ye.td, g.option || (ye.optgroup = ye.option = [1, "<select multiple='multiple'>", "</select>"]);
                    var _e = /<|&#?\w+;/;

                    function Ce(e, t, n, i, s) {
                        for (var r, o, a, l, c, d, u = t.createDocumentFragment(), p = [], f = 0, h = e.length; f < h; f++)
                            if ((r = e[f]) || 0 === r)
                                if ("object" === _(r)) E.merge(p, r.nodeType ? [r] : r);
                                else if (_e.test(r)) {
                            for (o = o || u.appendChild(t.createElement("div")), a = (ve.exec(r) || ["", ""])[1].toLowerCase(), l = ye[a] || ye._default, o.innerHTML = l[1] + E.htmlPrefilter(r) + l[2], d = l[0]; d--;) o = o.lastChild;
                            E.merge(p, o.childNodes), (o = u.firstChild).textContent = ""
                        } else p.push(t.createTextNode(r));
                        for (u.textContent = "", f = 0; r = p[f++];)
                            if (i && E.inArray(r, i) > -1) s && s.push(r);
                            else if (c = ae(r), o = we(u.appendChild(r), "script"), c && xe(o), n)
                            for (d = 0; r = o[d++];) be.test(r.type || "") && n.push(r);
                        return u
                    }
                    var Ee = /^([^.]*)(?:\.(.+)|)/;

                    function Te() {
                        return !0
                    }

                    function Se() {
                        return !1
                    }

                    function ke(e, t) {
                        return e === function () {
                            try {
                                return y.activeElement
                            } catch (e) {}
                        }() == ("focus" === t)
                    }

                    function Ae(e, t, n, i, s, r) {
                        var o, a;
                        if ("object" == typeof t) {
                            for (a in "string" != typeof n && (i = i || n, n = void 0), t) Ae(e, a, n, i, t[a], r);
                            return e
                        }
                        if (null == i && null == s ? (s = n, i = n = void 0) : null == s && ("string" == typeof n ? (s = i, i = void 0) : (s = i, i = n, n = void 0)), !1 === s) s = Se;
                        else if (!s) return e;
                        return 1 === r && (o = s, s = function (e) {
                            return E().off(e), o.apply(this, arguments)
                        }, s.guid = o.guid || (o.guid = E.guid++)), e.each((function () {
                            E.event.add(this, t, s, i, n)
                        }))
                    }

                    function Le(e, t, n) {
                        n ? (J.set(e, t, !1), E.event.add(e, t, {
                            namespace: !1,
                            handler: function (e) {
                                var i, s, r = J.get(this, t);
                                if (1 & e.isTrigger && this[t]) {
                                    if (r.length)(E.event.special[t] || {}).delegateType && e.stopPropagation();
                                    else if (r = a.call(arguments), J.set(this, t, r), i = n(this, t), this[t](), r !== (s = J.get(this, t)) || i ? J.set(this, t, !1) : s = {}, r !== s) return e.stopImmediatePropagation(), e.preventDefault(), s && s.value
                                } else r.length && (J.set(this, t, {
                                    value: E.event.trigger(E.extend(r[0], E.Event.prototype), r.slice(1), this)
                                }), e.stopImmediatePropagation())
                            }
                        })) : void 0 === J.get(e, t) && E.event.add(e, t, Te)
                    }
                    E.event = {
                        global: {},
                        add: function (e, t, n, i, s) {
                            var r, o, a, l, c, d, u, p, f, h, m, g = J.get(e);
                            if (K(e))
                                for (n.handler && (n = (r = n).handler, s = r.selector), s && E.find.matchesSelector(oe, s), n.guid || (n.guid = E.guid++), (l = g.events) || (l = g.events = Object.create(null)), (o = g.handle) || (o = g.handle = function (t) {
                                        return void 0 !== E && E.event.triggered !== t.type ? E.event.dispatch.apply(e, arguments) : void 0
                                    }), c = (t = (t || "").match(z) || [""]).length; c--;) f = m = (a = Ee.exec(t[c]) || [])[1], h = (a[2] || "").split(".").sort(), f && (u = E.event.special[f] || {}, f = (s ? u.delegateType : u.bindType) || f, u = E.event.special[f] || {}, d = E.extend({
                                    type: f,
                                    origType: m,
                                    data: i,
                                    handler: n,
                                    guid: n.guid,
                                    selector: s,
                                    needsContext: s && E.expr.match.needsContext.test(s),
                                    namespace: h.join(".")
                                }, r), (p = l[f]) || ((p = l[f] = []).delegateCount = 0, u.setup && !1 !== u.setup.call(e, i, h, o) || e.addEventListener && e.addEventListener(f, o)), u.add && (u.add.call(e, d), d.handler.guid || (d.handler.guid = n.guid)), s ? p.splice(p.delegateCount++, 0, d) : p.push(d), E.event.global[f] = !0)
                        },
                        remove: function (e, t, n, i, s) {
                            var r, o, a, l, c, d, u, p, f, h, m, g = J.hasData(e) && J.get(e);
                            if (g && (l = g.events)) {
                                for (c = (t = (t || "").match(z) || [""]).length; c--;)
                                    if (f = m = (a = Ee.exec(t[c]) || [])[1], h = (a[2] || "").split(".").sort(), f) {
                                        for (u = E.event.special[f] || {}, p = l[f = (i ? u.delegateType : u.bindType) || f] || [], a = a[2] && new RegExp("(^|\\.)" + h.join("\\.(?:.*\\.|)") + "(\\.|$)"), o = r = p.length; r--;) d = p[r], !s && m !== d.origType || n && n.guid !== d.guid || a && !a.test(d.namespace) || i && i !== d.selector && ("**" !== i || !d.selector) || (p.splice(r, 1), d.selector && p.delegateCount--, u.remove && u.remove.call(e, d));
                                        o && !p.length && (u.teardown && !1 !== u.teardown.call(e, h, g.handle) || E.removeEvent(e, f, g.handle), delete l[f])
                                    } else
                                        for (f in l) E.event.remove(e, f + t[c], n, i, !0);
                                E.isEmptyObject(l) && J.remove(e, "handle events")
                            }
                        },
                        dispatch: function (e) {
                            var t, n, i, s, r, o, a = new Array(arguments.length),
                                l = E.event.fix(e),
                                c = (J.get(this, "events") || Object.create(null))[l.type] || [],
                                d = E.event.special[l.type] || {};
                            for (a[0] = l, t = 1; t < arguments.length; t++) a[t] = arguments[t];
                            if (l.delegateTarget = this, !d.preDispatch || !1 !== d.preDispatch.call(this, l)) {
                                for (o = E.event.handlers.call(this, l, c), t = 0;
                                    (s = o[t++]) && !l.isPropagationStopped();)
                                    for (l.currentTarget = s.elem, n = 0;
                                        (r = s.handlers[n++]) && !l.isImmediatePropagationStopped();) l.rnamespace && !1 !== r.namespace && !l.rnamespace.test(r.namespace) || (l.handleObj = r, l.data = r.data, void 0 !== (i = ((E.event.special[r.origType] || {}).handle || r.handler).apply(s.elem, a)) && !1 === (l.result = i) && (l.preventDefault(), l.stopPropagation()));
                                return d.postDispatch && d.postDispatch.call(this, l), l.result
                            }
                        },
                        handlers: function (e, t) {
                            var n, i, s, r, o, a = [],
                                l = t.delegateCount,
                                c = e.target;
                            if (l && c.nodeType && !("click" === e.type && e.button >= 1))
                                for (; c !== this; c = c.parentNode || this)
                                    if (1 === c.nodeType && ("click" !== e.type || !0 !== c.disabled)) {
                                        for (r = [], o = {}, n = 0; n < l; n++) void 0 === o[s = (i = t[n]).selector + " "] && (o[s] = i.needsContext ? E(s, this).index(c) > -1 : E.find(s, this, null, [c]).length), o[s] && r.push(i);
                                        r.length && a.push({
                                            elem: c,
                                            handlers: r
                                        })
                                    } return c = this, l < t.length && a.push({
                                elem: c,
                                handlers: t.slice(l)
                            }), a
                        },
                        addProp: function (e, t) {
                            Object.defineProperty(E.Event.prototype, e, {
                                enumerable: !0,
                                configurable: !0,
                                get: v(t) ? function () {
                                    if (this.originalEvent) return t(this.originalEvent)
                                } : function () {
                                    if (this.originalEvent) return this.originalEvent[e]
                                },
                                set: function (t) {
                                    Object.defineProperty(this, e, {
                                        enumerable: !0,
                                        configurable: !0,
                                        writable: !0,
                                        value: t
                                    })
                                }
                            })
                        },
                        fix: function (e) {
                            return e[E.expando] ? e : new E.Event(e)
                        },
                        special: {
                            load: {
                                noBubble: !0
                            },
                            click: {
                                setup: function (e) {
                                    var t = this || e;
                                    return ge.test(t.type) && t.click && O(t, "input") && Le(t, "click", Te), !1
                                },
                                trigger: function (e) {
                                    var t = this || e;
                                    return ge.test(t.type) && t.click && O(t, "input") && Le(t, "click"), !0
                                },
                                _default: function (e) {
                                    var t = e.target;
                                    return ge.test(t.type) && t.click && O(t, "input") && J.get(t, "click") || O(t, "a")
                                }
                            },
                            beforeunload: {
                                postDispatch: function (e) {
                                    void 0 !== e.result && e.originalEvent && (e.originalEvent.returnValue = e.result)
                                }
                            }
                        }
                    }, E.removeEvent = function (e, t, n) {
                        e.removeEventListener && e.removeEventListener(t, n)
                    }, E.Event = function (e, t) {
                        if (!(this instanceof E.Event)) return new E.Event(e, t);
                        e && e.type ? (this.originalEvent = e, this.type = e.type, this.isDefaultPrevented = e.defaultPrevented || void 0 === e.defaultPrevented && !1 === e.returnValue ? Te : Se, this.target = e.target && 3 === e.target.nodeType ? e.target.parentNode : e.target, this.currentTarget = e.currentTarget, this.relatedTarget = e.relatedTarget) : this.type = e, t && E.extend(this, t), this.timeStamp = e && e.timeStamp || Date.now(), this[E.expando] = !0
                    }, E.Event.prototype = {
                        constructor: E.Event,
                        isDefaultPrevented: Se,
                        isPropagationStopped: Se,
                        isImmediatePropagationStopped: Se,
                        isSimulated: !1,
                        preventDefault: function () {
                            var e = this.originalEvent;
                            this.isDefaultPrevented = Te, e && !this.isSimulated && e.preventDefault()
                        },
                        stopPropagation: function () {
                            var e = this.originalEvent;
                            this.isPropagationStopped = Te, e && !this.isSimulated && e.stopPropagation()
                        },
                        stopImmediatePropagation: function () {
                            var e = this.originalEvent;
                            this.isImmediatePropagationStopped = Te, e && !this.isSimulated && e.stopImmediatePropagation(), this.stopPropagation()
                        }
                    }, E.each({
                        altKey: !0,
                        bubbles: !0,
                        cancelable: !0,
                        changedTouches: !0,
                        ctrlKey: !0,
                        detail: !0,
                        eventPhase: !0,
                        metaKey: !0,
                        pageX: !0,
                        pageY: !0,
                        shiftKey: !0,
                        view: !0,
                        char: !0,
                        code: !0,
                        charCode: !0,
                        key: !0,
                        keyCode: !0,
                        button: !0,
                        buttons: !0,
                        clientX: !0,
                        clientY: !0,
                        offsetX: !0,
                        offsetY: !0,
                        pointerId: !0,
                        pointerType: !0,
                        screenX: !0,
                        screenY: !0,
                        targetTouches: !0,
                        toElement: !0,
                        touches: !0,
                        which: !0
                    }, E.event.addProp), E.each({
                        focus: "focusin",
                        blur: "focusout"
                    }, (function (e, t) {
                        E.event.special[e] = {
                            setup: function () {
                                return Le(this, e, ke), !1
                            },
                            trigger: function () {
                                return Le(this, e), !0
                            },
                            _default: function () {
                                return !0
                            },
                            delegateType: t
                        }
                    })), E.each({
                        mouseenter: "mouseover",
                        mouseleave: "mouseout",
                        pointerenter: "pointerover",
                        pointerleave: "pointerout"
                    }, (function (e, t) {
                        E.event.special[e] = {
                            delegateType: t,
                            bindType: t,
                            handle: function (e) {
                                var n, i = this,
                                    s = e.relatedTarget,
                                    r = e.handleObj;
                                return s && (s === i || E.contains(i, s)) || (e.type = r.origType, n = r.handler.apply(this, arguments), e.type = t), n
                            }
                        }
                    })), E.fn.extend({
                        on: function (e, t, n, i) {
                            return Ae(this, e, t, n, i)
                        },
                        one: function (e, t, n, i) {
                            return Ae(this, e, t, n, i, 1)
                        },
                        off: function (e, t, n) {
                            var i, s;
                            if (e && e.preventDefault && e.handleObj) return i = e.handleObj, E(e.delegateTarget).off(i.namespace ? i.origType + "." + i.namespace : i.origType, i.selector, i.handler), this;
                            if ("object" == typeof e) {
                                for (s in e) this.off(s, t, e[s]);
                                return this
                            }
                            return !1 !== t && "function" != typeof t || (n = t, t = void 0), !1 === n && (n = Se), this.each((function () {
                                E.event.remove(this, e, n, t)
                            }))
                        }
                    });
                    var Oe = /<script|<style|<link/i,
                        Pe = /checked\s*(?:[^=]|=\s*.checked.)/i,
                        De = /^\s*<!(?:\[CDATA\[|--)|(?:\]\]|--)>\s*$/g;

                    function Me(e, t) {
                        return O(e, "table") && O(11 !== t.nodeType ? t : t.firstChild, "tr") && E(e).children("tbody")[0] || e
                    }

                    function Ne(e) {
                        return e.type = (null !== e.getAttribute("type")) + "/" + e.type, e
                    }

                    function Ie(e) {
                        return "true/" === (e.type || "").slice(0, 5) ? e.type = e.type.slice(5) : e.removeAttribute("type"), e
                    }

                    function je(e, t) {
                        var n, i, s, r, o, a;
                        if (1 === t.nodeType) {
                            if (J.hasData(e) && (a = J.get(e).events))
                                for (s in J.remove(t, "handle events"), a)
                                    for (n = 0, i = a[s].length; n < i; n++) E.event.add(t, s, a[s][n]);
                            Z.hasData(e) && (r = Z.access(e), o = E.extend({}, r), Z.set(t, o))
                        }
                    }

                    function $e(e, t) {
                        var n = t.nodeName.toLowerCase();
                        "input" === n && ge.test(e.type) ? t.checked = e.checked : "input" !== n && "textarea" !== n || (t.defaultValue = e.defaultValue)
                    }

                    function ze(e, t, n, i) {
                        t = l(t);
                        var s, r, o, a, c, d, u = 0,
                            p = e.length,
                            f = p - 1,
                            h = t[0],
                            m = v(h);
                        if (m || p > 1 && "string" == typeof h && !g.checkClone && Pe.test(h)) return e.each((function (s) {
                            var r = e.eq(s);
                            m && (t[0] = h.call(this, s, r.html())), ze(r, t, n, i)
                        }));
                        if (p && (r = (s = Ce(t, e[0].ownerDocument, !1, e, i)).firstChild, 1 === s.childNodes.length && (s = r), r || i)) {
                            for (a = (o = E.map(we(s, "script"), Ne)).length; u < p; u++) c = s, u !== f && (c = E.clone(c, !0, !0), a && E.merge(o, we(c, "script"))), n.call(e[u], c, u);
                            if (a)
                                for (d = o[o.length - 1].ownerDocument, E.map(o, Ie), u = 0; u < a; u++) c = o[u], be.test(c.type || "") && !J.access(c, "globalEval") && E.contains(d, c) && (c.src && "module" !== (c.type || "").toLowerCase() ? E._evalUrl && !c.noModule && E._evalUrl(c.src, {
                                    nonce: c.nonce || c.getAttribute("nonce")
                                }, d) : x(c.textContent.replace(De, ""), c, d))
                        }
                        return e
                    }

                    function He(e, t, n) {
                        for (var i, s = t ? E.filter(t, e) : e, r = 0; null != (i = s[r]); r++) n || 1 !== i.nodeType || E.cleanData(we(i)), i.parentNode && (n && ae(i) && xe(we(i, "script")), i.parentNode.removeChild(i));
                        return e
                    }
                    E.extend({
                        htmlPrefilter: function (e) {
                            return e
                        },
                        clone: function (e, t, n) {
                            var i, s, r, o, a = e.cloneNode(!0),
                                l = ae(e);
                            if (!(g.noCloneChecked || 1 !== e.nodeType && 11 !== e.nodeType || E.isXMLDoc(e)))
                                for (o = we(a), i = 0, s = (r = we(e)).length; i < s; i++) $e(r[i], o[i]);
                            if (t)
                                if (n)
                                    for (r = r || we(e), o = o || we(a), i = 0, s = r.length; i < s; i++) je(r[i], o[i]);
                                else je(e, a);
                            return (o = we(a, "script")).length > 0 && xe(o, !l && we(e, "script")), a
                        },
                        cleanData: function (e) {
                            for (var t, n, i, s = E.event.special, r = 0; void 0 !== (n = e[r]); r++)
                                if (K(n)) {
                                    if (t = n[J.expando]) {
                                        if (t.events)
                                            for (i in t.events) s[i] ? E.event.remove(n, i) : E.removeEvent(n, i, t.handle);
                                        n[J.expando] = void 0
                                    }
                                    n[Z.expando] && (n[Z.expando] = void 0)
                                }
                        }
                    }), E.fn.extend({
                        detach: function (e) {
                            return He(this, e, !0)
                        },
                        remove: function (e) {
                            return He(this, e)
                        },
                        text: function (e) {
                            return W(this, (function (e) {
                                return void 0 === e ? E.text(this) : this.empty().each((function () {
                                    1 !== this.nodeType && 11 !== this.nodeType && 9 !== this.nodeType || (this.textContent = e)
                                }))
                            }), null, e, arguments.length)
                        },
                        append: function () {
                            return ze(this, arguments, (function (e) {
                                1 !== this.nodeType && 11 !== this.nodeType && 9 !== this.nodeType || Me(this, e).appendChild(e)
                            }))
                        },
                        prepend: function () {
                            return ze(this, arguments, (function (e) {
                                if (1 === this.nodeType || 11 === this.nodeType || 9 === this.nodeType) {
                                    var t = Me(this, e);
                                    t.insertBefore(e, t.firstChild)
                                }
                            }))
                        },
                        before: function () {
                            return ze(this, arguments, (function (e) {
                                this.parentNode && this.parentNode.insertBefore(e, this)
                            }))
                        },
                        after: function () {
                            return ze(this, arguments, (function (e) {
                                this.parentNode && this.parentNode.insertBefore(e, this.nextSibling)
                            }))
                        },
                        empty: function () {
                            for (var e, t = 0; null != (e = this[t]); t++) 1 === e.nodeType && (E.cleanData(we(e, !1)), e.textContent = "");
                            return this
                        },
                        clone: function (e, t) {
                            return e = null != e && e, t = null == t ? e : t, this.map((function () {
                                return E.clone(this, e, t)
                            }))
                        },
                        html: function (e) {
                            return W(this, (function (e) {
                                var t = this[0] || {},
                                    n = 0,
                                    i = this.length;
                                if (void 0 === e && 1 === t.nodeType) return t.innerHTML;
                                if ("string" == typeof e && !Oe.test(e) && !ye[(ve.exec(e) || ["", ""])[1].toLowerCase()]) {
                                    e = E.htmlPrefilter(e);
                                    try {
                                        for (; n < i; n++) 1 === (t = this[n] || {}).nodeType && (E.cleanData(we(t, !1)), t.innerHTML = e);
                                        t = 0
                                    } catch (e) {}
                                }
                                t && this.empty().append(e)
                            }), null, e, arguments.length)
                        },
                        replaceWith: function () {
                            var e = [];
                            return ze(this, arguments, (function (t) {
                                var n = this.parentNode;
                                E.inArray(this, e) < 0 && (E.cleanData(we(this)), n && n.replaceChild(t, this))
                            }), e)
                        }
                    }), E.each({
                        appendTo: "append",
                        prependTo: "prepend",
                        insertBefore: "before",
                        insertAfter: "after",
                        replaceAll: "replaceWith"
                    }, (function (e, t) {
                        E.fn[e] = function (e) {
                            for (var n, i = [], s = E(e), r = s.length - 1, o = 0; o <= r; o++) n = o === r ? this : this.clone(!0), E(s[o])[t](n), c.apply(i, n.get());
                            return this.pushStack(i)
                        }
                    }));
                    var Fe = new RegExp("^(" + ie + ")(?!px)[a-z%]+$", "i"),
                        Be = function (e) {
                            var t = e.ownerDocument.defaultView;
                            return t && t.opener || (t = i), t.getComputedStyle(e)
                        },
                        qe = function (e, t, n) {
                            var i, s, r = {};
                            for (s in t) r[s] = e.style[s], e.style[s] = t[s];
                            for (s in i = n.call(e), t) e.style[s] = r[s];
                            return i
                        },
                        Re = new RegExp(re.join("|"), "i");

                    function Ve(e, t, n) {
                        var i, s, r, o, a = e.style;
                        return (n = n || Be(e)) && ("" !== (o = n.getPropertyValue(t) || n[t]) || ae(e) || (o = E.style(e, t)), !g.pixelBoxStyles() && Fe.test(o) && Re.test(t) && (i = a.width, s = a.minWidth, r = a.maxWidth, a.minWidth = a.maxWidth = a.width = o, o = n.width, a.width = i, a.minWidth = s, a.maxWidth = r)), void 0 !== o ? o + "" : o
                    }

                    function We(e, t) {
                        return {
                            get: function () {
                                if (!e()) return (this.get = t).apply(this, arguments);
                                delete this.get
                            }
                        }
                    }! function () {
                        function e() {
                            if (d) {
                                c.style.cssText = "position:absolute;left:-11111px;width:60px;margin-top:1px;padding:0;border:0", d.style.cssText = "position:relative;display:block;box-sizing:border-box;overflow:scroll;margin:auto;border:1px;padding:1px;width:60%;top:1%", oe.appendChild(c).appendChild(d);
                                var e = i.getComputedStyle(d);
                                n = "1%" !== e.top, l = 12 === t(e.marginLeft), d.style.right = "60%", o = 36 === t(e.right), s = 36 === t(e.width), d.style.position = "absolute", r = 12 === t(d.offsetWidth / 3), oe.removeChild(c), d = null
                            }
                        }

                        function t(e) {
                            return Math.round(parseFloat(e))
                        }
                        var n, s, r, o, a, l, c = y.createElement("div"),
                            d = y.createElement("div");
                        d.style && (d.style.backgroundClip = "content-box", d.cloneNode(!0).style.backgroundClip = "", g.clearCloneStyle = "content-box" === d.style.backgroundClip, E.extend(g, {
                            boxSizingReliable: function () {
                                return e(), s
                            },
                            pixelBoxStyles: function () {
                                return e(), o
                            },
                            pixelPosition: function () {
                                return e(), n
                            },
                            reliableMarginLeft: function () {
                                return e(), l
                            },
                            scrollboxSize: function () {
                                return e(), r
                            },
                            reliableTrDimensions: function () {
                                var e, t, n, s;
                                return null == a && (e = y.createElement("table"), t = y.createElement("tr"), n = y.createElement("div"), e.style.cssText = "position:absolute;left:-11111px;border-collapse:separate", t.style.cssText = "border:1px solid", t.style.height = "1px", n.style.height = "9px", n.style.display = "block", oe.appendChild(e).appendChild(t).appendChild(n), s = i.getComputedStyle(t), a = parseInt(s.height, 10) + parseInt(s.borderTopWidth, 10) + parseInt(s.borderBottomWidth, 10) === t.offsetHeight, oe.removeChild(e)), a
                            }
                        }))
                    }();
                    var Ge = ["Webkit", "Moz", "ms"],
                        Xe = y.createElement("div").style,
                        Ue = {};

                    function Ye(e) {
                        return E.cssProps[e] || Ue[e] || (e in Xe ? e : Ue[e] = function (e) {
                            for (var t = e[0].toUpperCase() + e.slice(1), n = Ge.length; n--;)
                                if ((e = Ge[n] + t) in Xe) return e
                        }(e) || e)
                    }
                    var Ke = /^(none|table(?!-c[ea]).+)/,
                        Qe = /^--/,
                        Je = {
                            position: "absolute",
                            visibility: "hidden",
                            display: "block"
                        },
                        Ze = {
                            letterSpacing: "0",
                            fontWeight: "400"
                        };

                    function et(e, t, n) {
                        var i = se.exec(t);
                        return i ? Math.max(0, i[2] - (n || 0)) + (i[3] || "px") : t
                    }

                    function tt(e, t, n, i, s, r) {
                        var o = "width" === t ? 1 : 0,
                            a = 0,
                            l = 0;
                        if (n === (i ? "border" : "content")) return 0;
                        for (; o < 4; o += 2) "margin" === n && (l += E.css(e, n + re[o], !0, s)), i ? ("content" === n && (l -= E.css(e, "padding" + re[o], !0, s)), "margin" !== n && (l -= E.css(e, "border" + re[o] + "Width", !0, s))) : (l += E.css(e, "padding" + re[o], !0, s), "padding" !== n ? l += E.css(e, "border" + re[o] + "Width", !0, s) : a += E.css(e, "border" + re[o] + "Width", !0, s));
                        return !i && r >= 0 && (l += Math.max(0, Math.ceil(e["offset" + t[0].toUpperCase() + t.slice(1)] - r - l - a - .5)) || 0), l
                    }

                    function nt(e, t, n) {
                        var i = Be(e),
                            s = (!g.boxSizingReliable() || n) && "border-box" === E.css(e, "boxSizing", !1, i),
                            r = s,
                            o = Ve(e, t, i),
                            a = "offset" + t[0].toUpperCase() + t.slice(1);
                        if (Fe.test(o)) {
                            if (!n) return o;
                            o = "auto"
                        }
                        return (!g.boxSizingReliable() && s || !g.reliableTrDimensions() && O(e, "tr") || "auto" === o || !parseFloat(o) && "inline" === E.css(e, "display", !1, i)) && e.getClientRects().length && (s = "border-box" === E.css(e, "boxSizing", !1, i), (r = a in e) && (o = e[a])), (o = parseFloat(o) || 0) + tt(e, t, n || (s ? "border" : "content"), r, i, o) + "px"
                    }

                    function it(e, t, n, i, s) {
                        return new it.prototype.init(e, t, n, i, s)
                    }
                    E.extend({
                        cssHooks: {
                            opacity: {
                                get: function (e, t) {
                                    if (t) {
                                        var n = Ve(e, "opacity");
                                        return "" === n ? "1" : n
                                    }
                                }
                            }
                        },
                        cssNumber: {
                            animationIterationCount: !0,
                            columnCount: !0,
                            fillOpacity: !0,
                            flexGrow: !0,
                            flexShrink: !0,
                            fontWeight: !0,
                            gridArea: !0,
                            gridColumn: !0,
                            gridColumnEnd: !0,
                            gridColumnStart: !0,
                            gridRow: !0,
                            gridRowEnd: !0,
                            gridRowStart: !0,
                            lineHeight: !0,
                            opacity: !0,
                            order: !0,
                            orphans: !0,
                            widows: !0,
                            zIndex: !0,
                            zoom: !0
                        },
                        cssProps: {},
                        style: function (e, t, n, i) {
                            if (e && 3 !== e.nodeType && 8 !== e.nodeType && e.style) {
                                var s, r, o, a = Y(t),
                                    l = Qe.test(t),
                                    c = e.style;
                                if (l || (t = Ye(a)), o = E.cssHooks[t] || E.cssHooks[a], void 0 === n) return o && "get" in o && void 0 !== (s = o.get(e, !1, i)) ? s : c[t];
                                "string" == (r = typeof n) && (s = se.exec(n)) && s[1] && (n = de(e, t, s), r = "number"), null != n && n == n && ("number" !== r || l || (n += s && s[3] || (E.cssNumber[a] ? "" : "px")), g.clearCloneStyle || "" !== n || 0 !== t.indexOf("background") || (c[t] = "inherit"), o && "set" in o && void 0 === (n = o.set(e, n, i)) || (l ? c.setProperty(t, n) : c[t] = n))
                            }
                        },
                        css: function (e, t, n, i) {
                            var s, r, o, a = Y(t);
                            return Qe.test(t) || (t = Ye(a)), (o = E.cssHooks[t] || E.cssHooks[a]) && "get" in o && (s = o.get(e, !0, n)), void 0 === s && (s = Ve(e, t, i)), "normal" === s && t in Ze && (s = Ze[t]), "" === n || n ? (r = parseFloat(s), !0 === n || isFinite(r) ? r || 0 : s) : s
                        }
                    }), E.each(["height", "width"], (function (e, t) {
                        E.cssHooks[t] = {
                            get: function (e, n, i) {
                                if (n) return !Ke.test(E.css(e, "display")) || e.getClientRects().length && e.getBoundingClientRect().width ? nt(e, t, i) : qe(e, Je, (function () {
                                    return nt(e, t, i)
                                }))
                            },
                            set: function (e, n, i) {
                                var s, r = Be(e),
                                    o = !g.scrollboxSize() && "absolute" === r.position,
                                    a = (o || i) && "border-box" === E.css(e, "boxSizing", !1, r),
                                    l = i ? tt(e, t, i, a, r) : 0;
                                return a && o && (l -= Math.ceil(e["offset" + t[0].toUpperCase() + t.slice(1)] - parseFloat(r[t]) - tt(e, t, "border", !1, r) - .5)), l && (s = se.exec(n)) && "px" !== (s[3] || "px") && (e.style[t] = n, n = E.css(e, t)), et(0, n, l)
                            }
                        }
                    })), E.cssHooks.marginLeft = We(g.reliableMarginLeft, (function (e, t) {
                        if (t) return (parseFloat(Ve(e, "marginLeft")) || e.getBoundingClientRect().left - qe(e, {
                            marginLeft: 0
                        }, (function () {
                            return e.getBoundingClientRect().left
                        }))) + "px"
                    })), E.each({
                        margin: "",
                        padding: "",
                        border: "Width"
                    }, (function (e, t) {
                        E.cssHooks[e + t] = {
                            expand: function (n) {
                                for (var i = 0, s = {}, r = "string" == typeof n ? n.split(" ") : [n]; i < 4; i++) s[e + re[i] + t] = r[i] || r[i - 2] || r[0];
                                return s
                            }
                        }, "margin" !== e && (E.cssHooks[e + t].set = et)
                    })), E.fn.extend({
                        css: function (e, t) {
                            return W(this, (function (e, t, n) {
                                var i, s, r = {},
                                    o = 0;
                                if (Array.isArray(t)) {
                                    for (i = Be(e), s = t.length; o < s; o++) r[t[o]] = E.css(e, t[o], !1, i);
                                    return r
                                }
                                return void 0 !== n ? E.style(e, t, n) : E.css(e, t)
                            }), e, t, arguments.length > 1)
                        }
                    }), E.Tween = it, it.prototype = {
                        constructor: it,
                        init: function (e, t, n, i, s, r) {
                            this.elem = e, this.prop = n, this.easing = s || E.easing._default, this.options = t, this.start = this.now = this.cur(), this.end = i, this.unit = r || (E.cssNumber[n] ? "" : "px")
                        },
                        cur: function () {
                            var e = it.propHooks[this.prop];
                            return e && e.get ? e.get(this) : it.propHooks._default.get(this)
                        },
                        run: function (e) {
                            var t, n = it.propHooks[this.prop];
                            return this.options.duration ? this.pos = t = E.easing[this.easing](e, this.options.duration * e, 0, 1, this.options.duration) : this.pos = t = e, this.now = (this.end - this.start) * t + this.start, this.options.step && this.options.step.call(this.elem, this.now, this), n && n.set ? n.set(this) : it.propHooks._default.set(this), this
                        }
                    }, it.prototype.init.prototype = it.prototype, it.propHooks = {
                        _default: {
                            get: function (e) {
                                var t;
                                return 1 !== e.elem.nodeType || null != e.elem[e.prop] && null == e.elem.style[e.prop] ? e.elem[e.prop] : (t = E.css(e.elem, e.prop, "")) && "auto" !== t ? t : 0
                            },
                            set: function (e) {
                                E.fx.step[e.prop] ? E.fx.step[e.prop](e) : 1 !== e.elem.nodeType || !E.cssHooks[e.prop] && null == e.elem.style[Ye(e.prop)] ? e.elem[e.prop] = e.now : E.style(e.elem, e.prop, e.now + e.unit)
                            }
                        }
                    }, it.propHooks.scrollTop = it.propHooks.scrollLeft = {
                        set: function (e) {
                            e.elem.nodeType && e.elem.parentNode && (e.elem[e.prop] = e.now)
                        }
                    }, E.easing = {
                        linear: function (e) {
                            return e
                        },
                        swing: function (e) {
                            return .5 - Math.cos(e * Math.PI) / 2
                        },
                        _default: "swing"
                    }, E.fx = it.prototype.init, E.fx.step = {};
                    var st, rt, ot = /^(?:toggle|show|hide)$/,
                        at = /queueHooks$/;

                    function lt() {
                        rt && (!1 === y.hidden && i.requestAnimationFrame ? i.requestAnimationFrame(lt) : i.setTimeout(lt, E.fx.interval), E.fx.tick())
                    }

                    function ct() {
                        return i.setTimeout((function () {
                            st = void 0
                        })), st = Date.now()
                    }

                    function dt(e, t) {
                        var n, i = 0,
                            s = {
                                height: e
                            };
                        for (t = t ? 1 : 0; i < 4; i += 2 - t) s["margin" + (n = re[i])] = s["padding" + n] = e;
                        return t && (s.opacity = s.width = e), s
                    }

                    function ut(e, t, n) {
                        for (var i, s = (pt.tweeners[t] || []).concat(pt.tweeners["*"]), r = 0, o = s.length; r < o; r++)
                            if (i = s[r].call(n, t, e)) return i
                    }

                    function pt(e, t, n) {
                        var i, s, r = 0,
                            o = pt.prefilters.length,
                            a = E.Deferred().always((function () {
                                delete l.elem
                            })),
                            l = function () {
                                if (s) return !1;
                                for (var t = st || ct(), n = Math.max(0, c.startTime + c.duration - t), i = 1 - (n / c.duration || 0), r = 0, o = c.tweens.length; r < o; r++) c.tweens[r].run(i);
                                return a.notifyWith(e, [c, i, n]), i < 1 && o ? n : (o || a.notifyWith(e, [c, 1, 0]), a.resolveWith(e, [c]), !1)
                            },
                            c = a.promise({
                                elem: e,
                                props: E.extend({}, t),
                                opts: E.extend(!0, {
                                    specialEasing: {},
                                    easing: E.easing._default
                                }, n),
                                originalProperties: t,
                                originalOptions: n,
                                startTime: st || ct(),
                                duration: n.duration,
                                tweens: [],
                                createTween: function (t, n) {
                                    var i = E.Tween(e, c.opts, t, n, c.opts.specialEasing[t] || c.opts.easing);
                                    return c.tweens.push(i), i
                                },
                                stop: function (t) {
                                    var n = 0,
                                        i = t ? c.tweens.length : 0;
                                    if (s) return this;
                                    for (s = !0; n < i; n++) c.tweens[n].run(1);
                                    return t ? (a.notifyWith(e, [c, 1, 0]), a.resolveWith(e, [c, t])) : a.rejectWith(e, [c, t]), this
                                }
                            }),
                            d = c.props;
                        for (function (e, t) {
                                var n, i, s, r, o;
                                for (n in e)
                                    if (s = t[i = Y(n)], r = e[n], Array.isArray(r) && (s = r[1], r = e[n] = r[0]), n !== i && (e[i] = r, delete e[n]), (o = E.cssHooks[i]) && "expand" in o)
                                        for (n in r = o.expand(r), delete e[i], r) n in e || (e[n] = r[n], t[n] = s);
                                    else t[i] = s
                            }(d, c.opts.specialEasing); r < o; r++)
                            if (i = pt.prefilters[r].call(c, e, d, c.opts)) return v(i.stop) && (E._queueHooks(c.elem, c.opts.queue).stop = i.stop.bind(i)), i;
                        return E.map(d, ut, c), v(c.opts.start) && c.opts.start.call(e, c), c.progress(c.opts.progress).done(c.opts.done, c.opts.complete).fail(c.opts.fail).always(c.opts.always), E.fx.timer(E.extend(l, {
                            elem: e,
                            anim: c,
                            queue: c.opts.queue
                        })), c
                    }
                    E.Animation = E.extend(pt, {
                            tweeners: {
                                "*": [function (e, t) {
                                    var n = this.createTween(e, t);
                                    return de(n.elem, e, se.exec(t), n), n
                                }]
                            },
                            tweener: function (e, t) {
                                v(e) ? (t = e, e = ["*"]) : e = e.match(z);
                                for (var n, i = 0, s = e.length; i < s; i++) n = e[i], pt.tweeners[n] = pt.tweeners[n] || [], pt.tweeners[n].unshift(t)
                            },
                            prefilters: [function (e, t, n) {
                                var i, s, r, o, a, l, c, d, u = "width" in t || "height" in t,
                                    p = this,
                                    f = {},
                                    h = e.style,
                                    m = e.nodeType && ce(e),
                                    g = J.get(e, "fxshow");
                                for (i in n.queue || (null == (o = E._queueHooks(e, "fx")).unqueued && (o.unqueued = 0, a = o.empty.fire, o.empty.fire = function () {
                                        o.unqueued || a()
                                    }), o.unqueued++, p.always((function () {
                                        p.always((function () {
                                            o.unqueued--, E.queue(e, "fx").length || o.empty.fire()
                                        }))
                                    }))), t)
                                    if (s = t[i], ot.test(s)) {
                                        if (delete t[i], r = r || "toggle" === s, s === (m ? "hide" : "show")) {
                                            if ("show" !== s || !g || void 0 === g[i]) continue;
                                            m = !0
                                        }
                                        f[i] = g && g[i] || E.style(e, i)
                                    } if ((l = !E.isEmptyObject(t)) || !E.isEmptyObject(f))
                                    for (i in u && 1 === e.nodeType && (n.overflow = [h.overflow, h.overflowX, h.overflowY], null == (c = g && g.display) && (c = J.get(e, "display")), "none" === (d = E.css(e, "display")) && (c ? d = c : (fe([e], !0), c = e.style.display || c, d = E.css(e, "display"), fe([e]))), ("inline" === d || "inline-block" === d && null != c) && "none" === E.css(e, "float") && (l || (p.done((function () {
                                            h.display = c
                                        })), null == c && (d = h.display, c = "none" === d ? "" : d)), h.display = "inline-block")), n.overflow && (h.overflow = "hidden", p.always((function () {
                                            h.overflow = n.overflow[0], h.overflowX = n.overflow[1], h.overflowY = n.overflow[2]
                                        }))), l = !1, f) l || (g ? "hidden" in g && (m = g.hidden) : g = J.access(e, "fxshow", {
                                        display: c
                                    }), r && (g.hidden = !m), m && fe([e], !0), p.done((function () {
                                        for (i in m || fe([e]), J.remove(e, "fxshow"), f) E.style(e, i, f[i])
                                    }))), l = ut(m ? g[i] : 0, i, p), i in g || (g[i] = l.start, m && (l.end = l.start, l.start = 0))
                            }],
                            prefilter: function (e, t) {
                                t ? pt.prefilters.unshift(e) : pt.prefilters.push(e)
                            }
                        }), E.speed = function (e, t, n) {
                            var i = e && "object" == typeof e ? E.extend({}, e) : {
                                complete: n || !n && t || v(e) && e,
                                duration: e,
                                easing: n && t || t && !v(t) && t
                            };
                            return E.fx.off ? i.duration = 0 : "number" != typeof i.duration && (i.duration in E.fx.speeds ? i.duration = E.fx.speeds[i.duration] : i.duration = E.fx.speeds._default), null != i.queue && !0 !== i.queue || (i.queue = "fx"), i.old = i.complete, i.complete = function () {
                                v(i.old) && i.old.call(this), i.queue && E.dequeue(this, i.queue)
                            }, i
                        }, E.fn.extend({
                            fadeTo: function (e, t, n, i) {
                                return this.filter(ce).css("opacity", 0).show().end().animate({
                                    opacity: t
                                }, e, n, i)
                            },
                            animate: function (e, t, n, i) {
                                var s = E.isEmptyObject(e),
                                    r = E.speed(t, n, i),
                                    o = function () {
                                        var t = pt(this, E.extend({}, e), r);
                                        (s || J.get(this, "finish")) && t.stop(!0)
                                    };
                                return o.finish = o, s || !1 === r.queue ? this.each(o) : this.queue(r.queue, o)
                            },
                            stop: function (e, t, n) {
                                var i = function (e) {
                                    var t = e.stop;
                                    delete e.stop, t(n)
                                };
                                return "string" != typeof e && (n = t, t = e, e = void 0), t && this.queue(e || "fx", []), this.each((function () {
                                    var t = !0,
                                        s = null != e && e + "queueHooks",
                                        r = E.timers,
                                        o = J.get(this);
                                    if (s) o[s] && o[s].stop && i(o[s]);
                                    else
                                        for (s in o) o[s] && o[s].stop && at.test(s) && i(o[s]);
                                    for (s = r.length; s--;) r[s].elem !== this || null != e && r[s].queue !== e || (r[s].anim.stop(n), t = !1, r.splice(s, 1));
                                    !t && n || E.dequeue(this, e)
                                }))
                            },
                            finish: function (e) {
                                return !1 !== e && (e = e || "fx"), this.each((function () {
                                    var t, n = J.get(this),
                                        i = n[e + "queue"],
                                        s = n[e + "queueHooks"],
                                        r = E.timers,
                                        o = i ? i.length : 0;
                                    for (n.finish = !0, E.queue(this, e, []), s && s.stop && s.stop.call(this, !0), t = r.length; t--;) r[t].elem === this && r[t].queue === e && (r[t].anim.stop(!0), r.splice(t, 1));
                                    for (t = 0; t < o; t++) i[t] && i[t].finish && i[t].finish.call(this);
                                    delete n.finish
                                }))
                            }
                        }), E.each(["toggle", "show", "hide"], (function (e, t) {
                            var n = E.fn[t];
                            E.fn[t] = function (e, i, s) {
                                return null == e || "boolean" == typeof e ? n.apply(this, arguments) : this.animate(dt(t, !0), e, i, s)
                            }
                        })), E.each({
                            slideDown: dt("show"),
                            slideUp: dt("hide"),
                            slideToggle: dt("toggle"),
                            fadeIn: {
                                opacity: "show"
                            },
                            fadeOut: {
                                opacity: "hide"
                            },
                            fadeToggle: {
                                opacity: "toggle"
                            }
                        }, (function (e, t) {
                            E.fn[e] = function (e, n, i) {
                                return this.animate(t, e, n, i)
                            }
                        })), E.timers = [], E.fx.tick = function () {
                            var e, t = 0,
                                n = E.timers;
                            for (st = Date.now(); t < n.length; t++)(e = n[t])() || n[t] !== e || n.splice(t--, 1);
                            n.length || E.fx.stop(), st = void 0
                        }, E.fx.timer = function (e) {
                            E.timers.push(e), E.fx.start()
                        }, E.fx.interval = 13, E.fx.start = function () {
                            rt || (rt = !0, lt())
                        }, E.fx.stop = function () {
                            rt = null
                        }, E.fx.speeds = {
                            slow: 600,
                            fast: 200,
                            _default: 400
                        }, E.fn.delay = function (e, t) {
                            return e = E.fx && E.fx.speeds[e] || e, t = t || "fx", this.queue(t, (function (t, n) {
                                var s = i.setTimeout(t, e);
                                n.stop = function () {
                                    i.clearTimeout(s)
                                }
                            }))
                        },
                        function () {
                            var e = y.createElement("input"),
                                t = y.createElement("select").appendChild(y.createElement("option"));
                            e.type = "checkbox", g.checkOn = "" !== e.value, g.optSelected = t.selected, (e = y.createElement("input")).value = "t", e.type = "radio", g.radioValue = "t" === e.value
                        }();
                    var ft, ht = E.expr.attrHandle;
                    E.fn.extend({
                        attr: function (e, t) {
                            return W(this, E.attr, e, t, arguments.length > 1)
                        },
                        removeAttr: function (e) {
                            return this.each((function () {
                                E.removeAttr(this, e)
                            }))
                        }
                    }), E.extend({
                        attr: function (e, t, n) {
                            var i, s, r = e.nodeType;
                            if (3 !== r && 8 !== r && 2 !== r) return void 0 === e.getAttribute ? E.prop(e, t, n) : (1 === r && E.isXMLDoc(e) || (s = E.attrHooks[t.toLowerCase()] || (E.expr.match.bool.test(t) ? ft : void 0)), void 0 !== n ? null === n ? void E.removeAttr(e, t) : s && "set" in s && void 0 !== (i = s.set(e, n, t)) ? i : (e.setAttribute(t, n + ""), n) : s && "get" in s && null !== (i = s.get(e, t)) ? i : null == (i = E.find.attr(e, t)) ? void 0 : i)
                        },
                        attrHooks: {
                            type: {
                                set: function (e, t) {
                                    if (!g.radioValue && "radio" === t && O(e, "input")) {
                                        var n = e.value;
                                        return e.setAttribute("type", t), n && (e.value = n), t
                                    }
                                }
                            }
                        },
                        removeAttr: function (e, t) {
                            var n, i = 0,
                                s = t && t.match(z);
                            if (s && 1 === e.nodeType)
                                for (; n = s[i++];) e.removeAttribute(n)
                        }
                    }), ft = {
                        set: function (e, t, n) {
                            return !1 === t ? E.removeAttr(e, n) : e.setAttribute(n, n), n
                        }
                    }, E.each(E.expr.match.bool.source.match(/\w+/g), (function (e, t) {
                        var n = ht[t] || E.find.attr;
                        ht[t] = function (e, t, i) {
                            var s, r, o = t.toLowerCase();
                            return i || (r = ht[o], ht[o] = s, s = null != n(e, t, i) ? o : null, ht[o] = r), s
                        }
                    }));
                    var mt = /^(?:input|select|textarea|button)$/i,
                        gt = /^(?:a|area)$/i;

                    function vt(e) {
                        return (e.match(z) || []).join(" ")
                    }

                    function bt(e) {
                        return e.getAttribute && e.getAttribute("class") || ""
                    }

                    function yt(e) {
                        return Array.isArray(e) ? e : "string" == typeof e && e.match(z) || []
                    }
                    E.fn.extend({
                        prop: function (e, t) {
                            return W(this, E.prop, e, t, arguments.length > 1)
                        },
                        removeProp: function (e) {
                            return this.each((function () {
                                delete this[E.propFix[e] || e]
                            }))
                        }
                    }), E.extend({
                        prop: function (e, t, n) {
                            var i, s, r = e.nodeType;
                            if (3 !== r && 8 !== r && 2 !== r) return 1 === r && E.isXMLDoc(e) || (t = E.propFix[t] || t, s = E.propHooks[t]), void 0 !== n ? s && "set" in s && void 0 !== (i = s.set(e, n, t)) ? i : e[t] = n : s && "get" in s && null !== (i = s.get(e, t)) ? i : e[t]
                        },
                        propHooks: {
                            tabIndex: {
                                get: function (e) {
                                    var t = E.find.attr(e, "tabindex");
                                    return t ? parseInt(t, 10) : mt.test(e.nodeName) || gt.test(e.nodeName) && e.href ? 0 : -1
                                }
                            }
                        },
                        propFix: {
                            for: "htmlFor",
                            class: "className"
                        }
                    }), g.optSelected || (E.propHooks.selected = {
                        get: function (e) {
                            var t = e.parentNode;
                            return t && t.parentNode && t.parentNode.selectedIndex, null
                        },
                        set: function (e) {
                            var t = e.parentNode;
                            t && (t.selectedIndex, t.parentNode && t.parentNode.selectedIndex)
                        }
                    }), E.each(["tabIndex", "readOnly", "maxLength", "cellSpacing", "cellPadding", "rowSpan", "colSpan", "useMap", "frameBorder", "contentEditable"], (function () {
                        E.propFix[this.toLowerCase()] = this
                    })), E.fn.extend({
                        addClass: function (e) {
                            var t, n, i, s, r, o, a, l = 0;
                            if (v(e)) return this.each((function (t) {
                                E(this).addClass(e.call(this, t, bt(this)))
                            }));
                            if ((t = yt(e)).length)
                                for (; n = this[l++];)
                                    if (s = bt(n), i = 1 === n.nodeType && " " + vt(s) + " ") {
                                        for (o = 0; r = t[o++];) i.indexOf(" " + r + " ") < 0 && (i += r + " ");
                                        s !== (a = vt(i)) && n.setAttribute("class", a)
                                    } return this
                        },
                        removeClass: function (e) {
                            var t, n, i, s, r, o, a, l = 0;
                            if (v(e)) return this.each((function (t) {
                                E(this).removeClass(e.call(this, t, bt(this)))
                            }));
                            if (!arguments.length) return this.attr("class", "");
                            if ((t = yt(e)).length)
                                for (; n = this[l++];)
                                    if (s = bt(n), i = 1 === n.nodeType && " " + vt(s) + " ") {
                                        for (o = 0; r = t[o++];)
                                            for (; i.indexOf(" " + r + " ") > -1;) i = i.replace(" " + r + " ", " ");
                                        s !== (a = vt(i)) && n.setAttribute("class", a)
                                    } return this
                        },
                        toggleClass: function (e, t) {
                            var n = typeof e,
                                i = "string" === n || Array.isArray(e);
                            return "boolean" == typeof t && i ? t ? this.addClass(e) : this.removeClass(e) : v(e) ? this.each((function (n) {
                                E(this).toggleClass(e.call(this, n, bt(this), t), t)
                            })) : this.each((function () {
                                var t, s, r, o;
                                if (i)
                                    for (s = 0, r = E(this), o = yt(e); t = o[s++];) r.hasClass(t) ? r.removeClass(t) : r.addClass(t);
                                else void 0 !== e && "boolean" !== n || ((t = bt(this)) && J.set(this, "__className__", t), this.setAttribute && this.setAttribute("class", t || !1 === e ? "" : J.get(this, "__className__") || ""))
                            }))
                        },
                        hasClass: function (e) {
                            var t, n, i = 0;
                            for (t = " " + e + " "; n = this[i++];)
                                if (1 === n.nodeType && (" " + vt(bt(n)) + " ").indexOf(t) > -1) return !0;
                            return !1
                        }
                    });
                    var wt = /\r/g;
                    E.fn.extend({
                        val: function (e) {
                            var t, n, i, s = this[0];
                            return arguments.length ? (i = v(e), this.each((function (n) {
                                var s;
                                1 === this.nodeType && (null == (s = i ? e.call(this, n, E(this).val()) : e) ? s = "" : "number" == typeof s ? s += "" : Array.isArray(s) && (s = E.map(s, (function (e) {
                                    return null == e ? "" : e + ""
                                }))), (t = E.valHooks[this.type] || E.valHooks[this.nodeName.toLowerCase()]) && "set" in t && void 0 !== t.set(this, s, "value") || (this.value = s))
                            }))) : s ? (t = E.valHooks[s.type] || E.valHooks[s.nodeName.toLowerCase()]) && "get" in t && void 0 !== (n = t.get(s, "value")) ? n : "string" == typeof (n = s.value) ? n.replace(wt, "") : null == n ? "" : n : void 0
                        }
                    }), E.extend({
                        valHooks: {
                            option: {
                                get: function (e) {
                                    var t = E.find.attr(e, "value");
                                    return null != t ? t : vt(E.text(e))
                                }
                            },
                            select: {
                                get: function (e) {
                                    var t, n, i, s = e.options,
                                        r = e.selectedIndex,
                                        o = "select-one" === e.type,
                                        a = o ? null : [],
                                        l = o ? r + 1 : s.length;
                                    for (i = r < 0 ? l : o ? r : 0; i < l; i++)
                                        if (((n = s[i]).selected || i === r) && !n.disabled && (!n.parentNode.disabled || !O(n.parentNode, "optgroup"))) {
                                            if (t = E(n).val(), o) return t;
                                            a.push(t)
                                        } return a
                                },
                                set: function (e, t) {
                                    for (var n, i, s = e.options, r = E.makeArray(t), o = s.length; o--;)((i = s[o]).selected = E.inArray(E.valHooks.option.get(i), r) > -1) && (n = !0);
                                    return n || (e.selectedIndex = -1), r
                                }
                            }
                        }
                    }), E.each(["radio", "checkbox"], (function () {
                        E.valHooks[this] = {
                            set: function (e, t) {
                                if (Array.isArray(t)) return e.checked = E.inArray(E(e).val(), t) > -1
                            }
                        }, g.checkOn || (E.valHooks[this].get = function (e) {
                            return null === e.getAttribute("value") ? "on" : e.value
                        })
                    })), g.focusin = "onfocusin" in i;
                    var xt = /^(?:focusinfocus|focusoutblur)$/,
                        _t = function (e) {
                            e.stopPropagation()
                        };
                    E.extend(E.event, {
                        trigger: function (e, t, n, s) {
                            var r, o, a, l, c, d, u, p, h = [n || y],
                                m = f.call(e, "type") ? e.type : e,
                                g = f.call(e, "namespace") ? e.namespace.split(".") : [];
                            if (o = p = a = n = n || y, 3 !== n.nodeType && 8 !== n.nodeType && !xt.test(m + E.event.triggered) && (m.indexOf(".") > -1 && (g = m.split("."), m = g.shift(), g.sort()), c = m.indexOf(":") < 0 && "on" + m, (e = e[E.expando] ? e : new E.Event(m, "object" == typeof e && e)).isTrigger = s ? 2 : 3, e.namespace = g.join("."), e.rnamespace = e.namespace ? new RegExp("(^|\\.)" + g.join("\\.(?:.*\\.|)") + "(\\.|$)") : null, e.result = void 0, e.target || (e.target = n), t = null == t ? [e] : E.makeArray(t, [e]), u = E.event.special[m] || {}, s || !u.trigger || !1 !== u.trigger.apply(n, t))) {
                                if (!s && !u.noBubble && !b(n)) {
                                    for (l = u.delegateType || m, xt.test(l + m) || (o = o.parentNode); o; o = o.parentNode) h.push(o), a = o;
                                    a === (n.ownerDocument || y) && h.push(a.defaultView || a.parentWindow || i)
                                }
                                for (r = 0;
                                    (o = h[r++]) && !e.isPropagationStopped();) p = o, e.type = r > 1 ? l : u.bindType || m, (d = (J.get(o, "events") || Object.create(null))[e.type] && J.get(o, "handle")) && d.apply(o, t), (d = c && o[c]) && d.apply && K(o) && (e.result = d.apply(o, t), !1 === e.result && e.preventDefault());
                                return e.type = m, s || e.isDefaultPrevented() || u._default && !1 !== u._default.apply(h.pop(), t) || !K(n) || c && v(n[m]) && !b(n) && ((a = n[c]) && (n[c] = null), E.event.triggered = m, e.isPropagationStopped() && p.addEventListener(m, _t), n[m](), e.isPropagationStopped() && p.removeEventListener(m, _t), E.event.triggered = void 0, a && (n[c] = a)), e.result
                            }
                        },
                        simulate: function (e, t, n) {
                            var i = E.extend(new E.Event, n, {
                                type: e,
                                isSimulated: !0
                            });
                            E.event.trigger(i, null, t)
                        }
                    }), E.fn.extend({
                        trigger: function (e, t) {
                            return this.each((function () {
                                E.event.trigger(e, t, this)
                            }))
                        },
                        triggerHandler: function (e, t) {
                            var n = this[0];
                            if (n) return E.event.trigger(e, t, n, !0)
                        }
                    }), g.focusin || E.each({
                        focus: "focusin",
                        blur: "focusout"
                    }, (function (e, t) {
                        var n = function (e) {
                            E.event.simulate(t, e.target, E.event.fix(e))
                        };
                        E.event.special[t] = {
                            setup: function () {
                                var i = this.ownerDocument || this.document || this,
                                    s = J.access(i, t);
                                s || i.addEventListener(e, n, !0), J.access(i, t, (s || 0) + 1)
                            },
                            teardown: function () {
                                var i = this.ownerDocument || this.document || this,
                                    s = J.access(i, t) - 1;
                                s ? J.access(i, t, s) : (i.removeEventListener(e, n, !0), J.remove(i, t))
                            }
                        }
                    }));
                    var Ct = i.location,
                        Et = {
                            guid: Date.now()
                        },
                        Tt = /\?/;
                    E.parseXML = function (e) {
                        var t, n;
                        if (!e || "string" != typeof e) return null;
                        try {
                            t = (new i.DOMParser).parseFromString(e, "text/xml")
                        } catch (e) {}
                        return n = t && t.getElementsByTagName("parsererror")[0], t && !n || E.error("Invalid XML: " + (n ? E.map(n.childNodes, (function (e) {
                            return e.textContent
                        })).join("\n") : e)), t
                    };
                    var St = /\[\]$/,
                        kt = /\r?\n/g,
                        At = /^(?:submit|button|image|reset|file)$/i,
                        Lt = /^(?:input|select|textarea|keygen)/i;

                    function Ot(e, t, n, i) {
                        var s;
                        if (Array.isArray(t)) E.each(t, (function (t, s) {
                            n || St.test(e) ? i(e, s) : Ot(e + "[" + ("object" == typeof s && null != s ? t : "") + "]", s, n, i)
                        }));
                        else if (n || "object" !== _(t)) i(e, t);
                        else
                            for (s in t) Ot(e + "[" + s + "]", t[s], n, i)
                    }
                    E.param = function (e, t) {
                        var n, i = [],
                            s = function (e, t) {
                                var n = v(t) ? t() : t;
                                i[i.length] = encodeURIComponent(e) + "=" + encodeURIComponent(null == n ? "" : n)
                            };
                        if (null == e) return "";
                        if (Array.isArray(e) || e.jquery && !E.isPlainObject(e)) E.each(e, (function () {
                            s(this.name, this.value)
                        }));
                        else
                            for (n in e) Ot(n, e[n], t, s);
                        return i.join("&")
                    }, E.fn.extend({
                        serialize: function () {
                            return E.param(this.serializeArray())
                        },
                        serializeArray: function () {
                            return this.map((function () {
                                var e = E.prop(this, "elements");
                                return e ? E.makeArray(e) : this
                            })).filter((function () {
                                var e = this.type;
                                return this.name && !E(this).is(":disabled") && Lt.test(this.nodeName) && !At.test(e) && (this.checked || !ge.test(e))
                            })).map((function (e, t) {
                                var n = E(this).val();
                                return null == n ? null : Array.isArray(n) ? E.map(n, (function (e) {
                                    return {
                                        name: t.name,
                                        value: e.replace(kt, "\r\n")
                                    }
                                })) : {
                                    name: t.name,
                                    value: n.replace(kt, "\r\n")
                                }
                            })).get()
                        }
                    });
                    var Pt = /%20/g,
                        Dt = /#.*$/,
                        Mt = /([?&])_=[^&]*/,
                        Nt = /^(.*?):[ \t]*([^\r\n]*)$/gm,
                        It = /^(?:GET|HEAD)$/,
                        jt = /^\/\//,
                        $t = {},
                        zt = {},
                        Ht = "*/".concat("*"),
                        Ft = y.createElement("a");

                    function Bt(e) {
                        return function (t, n) {
                            "string" != typeof t && (n = t, t = "*");
                            var i, s = 0,
                                r = t.toLowerCase().match(z) || [];
                            if (v(n))
                                for (; i = r[s++];) "+" === i[0] ? (i = i.slice(1) || "*", (e[i] = e[i] || []).unshift(n)) : (e[i] = e[i] || []).push(n)
                        }
                    }

                    function qt(e, t, n, i) {
                        var s = {},
                            r = e === zt;

                        function o(a) {
                            var l;
                            return s[a] = !0, E.each(e[a] || [], (function (e, a) {
                                var c = a(t, n, i);
                                return "string" != typeof c || r || s[c] ? r ? !(l = c) : void 0 : (t.dataTypes.unshift(c), o(c), !1)
                            })), l
                        }
                        return o(t.dataTypes[0]) || !s["*"] && o("*")
                    }

                    function Rt(e, t) {
                        var n, i, s = E.ajaxSettings.flatOptions || {};
                        for (n in t) void 0 !== t[n] && ((s[n] ? e : i || (i = {}))[n] = t[n]);
                        return i && E.extend(!0, e, i), e
                    }
                    Ft.href = Ct.href, E.extend({
                        active: 0,
                        lastModified: {},
                        etag: {},
                        ajaxSettings: {
                            url: Ct.href,
                            type: "GET",
                            isLocal: /^(?:about|app|app-storage|.+-extension|file|res|widget):$/.test(Ct.protocol),
                            global: !0,
                            processData: !0,
                            async: !0,
                            contentType: "application/x-www-form-urlencoded; charset=UTF-8",
                            accepts: {
                                "*": Ht,
                                text: "text/plain",
                                html: "text/html",
                                xml: "application/xml, text/xml",
                                json: "application/json, text/javascript"
                            },
                            contents: {
                                xml: /\bxml\b/,
                                html: /\bhtml/,
                                json: /\bjson\b/
                            },
                            responseFields: {
                                xml: "responseXML",
                                text: "responseText",
                                json: "responseJSON"
                            },
                            converters: {
                                "* text": String,
                                "text html": !0,
                                "text json": JSON.parse,
                                "text xml": E.parseXML
                            },
                            flatOptions: {
                                url: !0,
                                context: !0
                            }
                        },
                        ajaxSetup: function (e, t) {
                            return t ? Rt(Rt(e, E.ajaxSettings), t) : Rt(E.ajaxSettings, e)
                        },
                        ajaxPrefilter: Bt($t),
                        ajaxTransport: Bt(zt),
                        ajax: function (e, t) {
                            "object" == typeof e && (t = e, e = void 0), t = t || {};
                            var n, s, r, o, a, l, c, d, u, p, f = E.ajaxSetup({}, t),
                                h = f.context || f,
                                m = f.context && (h.nodeType || h.jquery) ? E(h) : E.event,
                                g = E.Deferred(),
                                v = E.Callbacks("once memory"),
                                b = f.statusCode || {},
                                w = {},
                                x = {},
                                _ = "canceled",
                                C = {
                                    readyState: 0,
                                    getResponseHeader: function (e) {
                                        var t;
                                        if (c) {
                                            if (!o)
                                                for (o = {}; t = Nt.exec(r);) o[t[1].toLowerCase() + " "] = (o[t[1].toLowerCase() + " "] || []).concat(t[2]);
                                            t = o[e.toLowerCase() + " "]
                                        }
                                        return null == t ? null : t.join(", ")
                                    },
                                    getAllResponseHeaders: function () {
                                        return c ? r : null
                                    },
                                    setRequestHeader: function (e, t) {
                                        return null == c && (e = x[e.toLowerCase()] = x[e.toLowerCase()] || e, w[e] = t), this
                                    },
                                    overrideMimeType: function (e) {
                                        return null == c && (f.mimeType = e), this
                                    },
                                    statusCode: function (e) {
                                        var t;
                                        if (e)
                                            if (c) C.always(e[C.status]);
                                            else
                                                for (t in e) b[t] = [b[t], e[t]];
                                        return this
                                    },
                                    abort: function (e) {
                                        var t = e || _;
                                        return n && n.abort(t), T(0, t), this
                                    }
                                };
                            if (g.promise(C), f.url = ((e || f.url || Ct.href) + "").replace(jt, Ct.protocol + "//"), f.type = t.method || t.type || f.method || f.type, f.dataTypes = (f.dataType || "*").toLowerCase().match(z) || [""], null == f.crossDomain) {
                                l = y.createElement("a");
                                try {
                                    l.href = f.url, l.href = l.href, f.crossDomain = Ft.protocol + "//" + Ft.host != l.protocol + "//" + l.host
                                } catch (e) {
                                    f.crossDomain = !0
                                }
                            }
                            if (f.data && f.processData && "string" != typeof f.data && (f.data = E.param(f.data, f.traditional)), qt($t, f, t, C), c) return C;
                            for (u in (d = E.event && f.global) && 0 == E.active++ && E.event.trigger("ajaxStart"), f.type = f.type.toUpperCase(), f.hasContent = !It.test(f.type), s = f.url.replace(Dt, ""), f.hasContent ? f.data && f.processData && 0 === (f.contentType || "").indexOf("application/x-www-form-urlencoded") && (f.data = f.data.replace(Pt, "+")) : (p = f.url.slice(s.length), f.data && (f.processData || "string" == typeof f.data) && (s += (Tt.test(s) ? "&" : "?") + f.data, delete f.data), !1 === f.cache && (s = s.replace(Mt, "$1"), p = (Tt.test(s) ? "&" : "?") + "_=" + Et.guid++ + p), f.url = s + p), f.ifModified && (E.lastModified[s] && C.setRequestHeader("If-Modified-Since", E.lastModified[s]), E.etag[s] && C.setRequestHeader("If-None-Match", E.etag[s])), (f.data && f.hasContent && !1 !== f.contentType || t.contentType) && C.setRequestHeader("Content-Type", f.contentType), C.setRequestHeader("Accept", f.dataTypes[0] && f.accepts[f.dataTypes[0]] ? f.accepts[f.dataTypes[0]] + ("*" !== f.dataTypes[0] ? ", " + Ht + "; q=0.01" : "") : f.accepts["*"]), f.headers) C.setRequestHeader(u, f.headers[u]);
                            if (f.beforeSend && (!1 === f.beforeSend.call(h, C, f) || c)) return C.abort();
                            if (_ = "abort", v.add(f.complete), C.done(f.success), C.fail(f.error), n = qt(zt, f, t, C)) {
                                if (C.readyState = 1, d && m.trigger("ajaxSend", [C, f]), c) return C;
                                f.async && f.timeout > 0 && (a = i.setTimeout((function () {
                                    C.abort("timeout")
                                }), f.timeout));
                                try {
                                    c = !1, n.send(w, T)
                                } catch (e) {
                                    if (c) throw e;
                                    T(-1, e)
                                }
                            } else T(-1, "No Transport");

                            function T(e, t, o, l) {
                                var u, p, y, w, x, _ = t;
                                c || (c = !0, a && i.clearTimeout(a), n = void 0, r = l || "", C.readyState = e > 0 ? 4 : 0, u = e >= 200 && e < 300 || 304 === e, o && (w = function (e, t, n) {
                                    for (var i, s, r, o, a = e.contents, l = e.dataTypes;
                                        "*" === l[0];) l.shift(), void 0 === i && (i = e.mimeType || t.getResponseHeader("Content-Type"));
                                    if (i)
                                        for (s in a)
                                            if (a[s] && a[s].test(i)) {
                                                l.unshift(s);
                                                break
                                            } if (l[0] in n) r = l[0];
                                    else {
                                        for (s in n) {
                                            if (!l[0] || e.converters[s + " " + l[0]]) {
                                                r = s;
                                                break
                                            }
                                            o || (o = s)
                                        }
                                        r = r || o
                                    }
                                    if (r) return r !== l[0] && l.unshift(r), n[r]
                                }(f, C, o)), !u && E.inArray("script", f.dataTypes) > -1 && E.inArray("json", f.dataTypes) < 0 && (f.converters["text script"] = function () {}), w = function (e, t, n, i) {
                                    var s, r, o, a, l, c = {},
                                        d = e.dataTypes.slice();
                                    if (d[1])
                                        for (o in e.converters) c[o.toLowerCase()] = e.converters[o];
                                    for (r = d.shift(); r;)
                                        if (e.responseFields[r] && (n[e.responseFields[r]] = t), !l && i && e.dataFilter && (t = e.dataFilter(t, e.dataType)), l = r, r = d.shift())
                                            if ("*" === r) r = l;
                                            else if ("*" !== l && l !== r) {
                                        if (!(o = c[l + " " + r] || c["* " + r]))
                                            for (s in c)
                                                if ((a = s.split(" "))[1] === r && (o = c[l + " " + a[0]] || c["* " + a[0]])) {
                                                    !0 === o ? o = c[s] : !0 !== c[s] && (r = a[0], d.unshift(a[1]));
                                                    break
                                                } if (!0 !== o)
                                            if (o && e.throws) t = o(t);
                                            else try {
                                                t = o(t)
                                            } catch (e) {
                                                return {
                                                    state: "parsererror",
                                                    error: o ? e : "No conversion from " + l + " to " + r
                                                }
                                            }
                                    }
                                    return {
                                        state: "success",
                                        data: t
                                    }
                                }(f, w, C, u), u ? (f.ifModified && ((x = C.getResponseHeader("Last-Modified")) && (E.lastModified[s] = x), (x = C.getResponseHeader("etag")) && (E.etag[s] = x)), 204 === e || "HEAD" === f.type ? _ = "nocontent" : 304 === e ? _ = "notmodified" : (_ = w.state, p = w.data, u = !(y = w.error))) : (y = _, !e && _ || (_ = "error", e < 0 && (e = 0))), C.status = e, C.statusText = (t || _) + "", u ? g.resolveWith(h, [p, _, C]) : g.rejectWith(h, [C, _, y]), C.statusCode(b), b = void 0, d && m.trigger(u ? "ajaxSuccess" : "ajaxError", [C, f, u ? p : y]), v.fireWith(h, [C, _]), d && (m.trigger("ajaxComplete", [C, f]), --E.active || E.event.trigger("ajaxStop")))
                            }
                            return C
                        },
                        getJSON: function (e, t, n) {
                            return E.get(e, t, n, "json")
                        },
                        getScript: function (e, t) {
                            return E.get(e, void 0, t, "script")
                        }
                    }), E.each(["get", "post"], (function (e, t) {
                        E[t] = function (e, n, i, s) {
                            return v(n) && (s = s || i, i = n, n = void 0), E.ajax(E.extend({
                                url: e,
                                type: t,
                                dataType: s,
                                data: n,
                                success: i
                            }, E.isPlainObject(e) && e))
                        }
                    })), E.ajaxPrefilter((function (e) {
                        var t;
                        for (t in e.headers) "content-type" === t.toLowerCase() && (e.contentType = e.headers[t] || "")
                    })), E._evalUrl = function (e, t, n) {
                        return E.ajax({
                            url: e,
                            type: "GET",
                            dataType: "script",
                            cache: !0,
                            async: !1,
                            global: !1,
                            converters: {
                                "text script": function () {}
                            },
                            dataFilter: function (e) {
                                E.globalEval(e, t, n)
                            }
                        })
                    }, E.fn.extend({
                        wrapAll: function (e) {
                            var t;
                            return this[0] && (v(e) && (e = e.call(this[0])), t = E(e, this[0].ownerDocument).eq(0).clone(!0), this[0].parentNode && t.insertBefore(this[0]), t.map((function () {
                                for (var e = this; e.firstElementChild;) e = e.firstElementChild;
                                return e
                            })).append(this)), this
                        },
                        wrapInner: function (e) {
                            return v(e) ? this.each((function (t) {
                                E(this).wrapInner(e.call(this, t))
                            })) : this.each((function () {
                                var t = E(this),
                                    n = t.contents();
                                n.length ? n.wrapAll(e) : t.append(e)
                            }))
                        },
                        wrap: function (e) {
                            var t = v(e);
                            return this.each((function (n) {
                                E(this).wrapAll(t ? e.call(this, n) : e)
                            }))
                        },
                        unwrap: function (e) {
                            return this.parent(e).not("body").each((function () {
                                E(this).replaceWith(this.childNodes)
                            })), this
                        }
                    }), E.expr.pseudos.hidden = function (e) {
                        return !E.expr.pseudos.visible(e)
                    }, E.expr.pseudos.visible = function (e) {
                        return !!(e.offsetWidth || e.offsetHeight || e.getClientRects().length)
                    }, E.ajaxSettings.xhr = function () {
                        try {
                            return new i.XMLHttpRequest
                        } catch (e) {}
                    };
                    var Vt = {
                            0: 200,
                            1223: 204
                        },
                        Wt = E.ajaxSettings.xhr();
                    g.cors = !!Wt && "withCredentials" in Wt, g.ajax = Wt = !!Wt, E.ajaxTransport((function (e) {
                        var t, n;
                        if (g.cors || Wt && !e.crossDomain) return {
                            send: function (s, r) {
                                var o, a = e.xhr();
                                if (a.open(e.type, e.url, e.async, e.username, e.password), e.xhrFields)
                                    for (o in e.xhrFields) a[o] = e.xhrFields[o];
                                for (o in e.mimeType && a.overrideMimeType && a.overrideMimeType(e.mimeType), e.crossDomain || s["X-Requested-With"] || (s["X-Requested-With"] = "XMLHttpRequest"), s) a.setRequestHeader(o, s[o]);
                                t = function (e) {
                                    return function () {
                                        t && (t = n = a.onload = a.onerror = a.onabort = a.ontimeout = a.onreadystatechange = null, "abort" === e ? a.abort() : "error" === e ? "number" != typeof a.status ? r(0, "error") : r(a.status, a.statusText) : r(Vt[a.status] || a.status, a.statusText, "text" !== (a.responseType || "text") || "string" != typeof a.responseText ? {
                                            binary: a.response
                                        } : {
                                            text: a.responseText
                                        }, a.getAllResponseHeaders()))
                                    }
                                }, a.onload = t(), n = a.onerror = a.ontimeout = t("error"), void 0 !== a.onabort ? a.onabort = n : a.onreadystatechange = function () {
                                    4 === a.readyState && i.setTimeout((function () {
                                        t && n()
                                    }))
                                }, t = t("abort");
                                try {
                                    a.send(e.hasContent && e.data || null)
                                } catch (e) {
                                    if (t) throw e
                                }
                            },
                            abort: function () {
                                t && t()
                            }
                        }
                    })), E.ajaxPrefilter((function (e) {
                        e.crossDomain && (e.contents.script = !1)
                    })), E.ajaxSetup({
                        accepts: {
                            script: "text/javascript, application/javascript, application/ecmascript, application/x-ecmascript"
                        },
                        contents: {
                            script: /\b(?:java|ecma)script\b/
                        },
                        converters: {
                            "text script": function (e) {
                                return E.globalEval(e), e
                            }
                        }
                    }), E.ajaxPrefilter("script", (function (e) {
                        void 0 === e.cache && (e.cache = !1), e.crossDomain && (e.type = "GET")
                    })), E.ajaxTransport("script", (function (e) {
                        var t, n;
                        if (e.crossDomain || e.scriptAttrs) return {
                            send: function (i, s) {
                                t = E("<script>").attr(e.scriptAttrs || {}).prop({
                                    charset: e.scriptCharset,
                                    src: e.url
                                }).on("load error", n = function (e) {
                                    t.remove(), n = null, e && s("error" === e.type ? 404 : 200, e.type)
                                }), y.head.appendChild(t[0])
                            },
                            abort: function () {
                                n && n()
                            }
                        }
                    }));
                    var Gt, Xt = [],
                        Ut = /(=)\?(?=&|$)|\?\?/;
                    E.ajaxSetup({
                        jsonp: "callback",
                        jsonpCallback: function () {
                            var e = Xt.pop() || E.expando + "_" + Et.guid++;
                            return this[e] = !0, e
                        }
                    }), E.ajaxPrefilter("json jsonp", (function (e, t, n) {
                        var s, r, o, a = !1 !== e.jsonp && (Ut.test(e.url) ? "url" : "string" == typeof e.data && 0 === (e.contentType || "").indexOf("application/x-www-form-urlencoded") && Ut.test(e.data) && "data");
                        if (a || "jsonp" === e.dataTypes[0]) return s = e.jsonpCallback = v(e.jsonpCallback) ? e.jsonpCallback() : e.jsonpCallback, a ? e[a] = e[a].replace(Ut, "$1" + s) : !1 !== e.jsonp && (e.url += (Tt.test(e.url) ? "&" : "?") + e.jsonp + "=" + s), e.converters["script json"] = function () {
                            return o || E.error(s + " was not called"), o[0]
                        }, e.dataTypes[0] = "json", r = i[s], i[s] = function () {
                            o = arguments
                        }, n.always((function () {
                            void 0 === r ? E(i).removeProp(s) : i[s] = r, e[s] && (e.jsonpCallback = t.jsonpCallback, Xt.push(s)), o && v(r) && r(o[0]), o = r = void 0
                        })), "script"
                    })), g.createHTMLDocument = ((Gt = y.implementation.createHTMLDocument("").body).innerHTML = "<form></form><form></form>", 2 === Gt.childNodes.length), E.parseHTML = function (e, t, n) {
                        return "string" != typeof e ? [] : ("boolean" == typeof t && (n = t, t = !1), t || (g.createHTMLDocument ? ((i = (t = y.implementation.createHTMLDocument("")).createElement("base")).href = y.location.href, t.head.appendChild(i)) : t = y), r = !n && [], (s = P.exec(e)) ? [t.createElement(s[1])] : (s = Ce([e], t, r), r && r.length && E(r).remove(), E.merge([], s.childNodes)));
                        var i, s, r
                    }, E.fn.load = function (e, t, n) {
                        var i, s, r, o = this,
                            a = e.indexOf(" ");
                        return a > -1 && (i = vt(e.slice(a)), e = e.slice(0, a)), v(t) ? (n = t, t = void 0) : t && "object" == typeof t && (s = "POST"), o.length > 0 && E.ajax({
                            url: e,
                            type: s || "GET",
                            dataType: "html",
                            data: t
                        }).done((function (e) {
                            r = arguments, o.html(i ? E("<div>").append(E.parseHTML(e)).find(i) : e)
                        })).always(n && function (e, t) {
                            o.each((function () {
                                n.apply(this, r || [e.responseText, t, e])
                            }))
                        }), this
                    }, E.expr.pseudos.animated = function (e) {
                        return E.grep(E.timers, (function (t) {
                            return e === t.elem
                        })).length
                    }, E.offset = {
                        setOffset: function (e, t, n) {
                            var i, s, r, o, a, l, c = E.css(e, "position"),
                                d = E(e),
                                u = {};
                            "static" === c && (e.style.position = "relative"), a = d.offset(), r = E.css(e, "top"), l = E.css(e, "left"), ("absolute" === c || "fixed" === c) && (r + l).indexOf("auto") > -1 ? (o = (i = d.position()).top, s = i.left) : (o = parseFloat(r) || 0, s = parseFloat(l) || 0), v(t) && (t = t.call(e, n, E.extend({}, a))), null != t.top && (u.top = t.top - a.top + o), null != t.left && (u.left = t.left - a.left + s), "using" in t ? t.using.call(e, u) : d.css(u)
                        }
                    }, E.fn.extend({
                        offset: function (e) {
                            if (arguments.length) return void 0 === e ? this : this.each((function (t) {
                                E.offset.setOffset(this, e, t)
                            }));
                            var t, n, i = this[0];
                            return i ? i.getClientRects().length ? (t = i.getBoundingClientRect(), n = i.ownerDocument.defaultView, {
                                top: t.top + n.pageYOffset,
                                left: t.left + n.pageXOffset
                            }) : {
                                top: 0,
                                left: 0
                            } : void 0
                        },
                        position: function () {
                            if (this[0]) {
                                var e, t, n, i = this[0],
                                    s = {
                                        top: 0,
                                        left: 0
                                    };
                                if ("fixed" === E.css(i, "position")) t = i.getBoundingClientRect();
                                else {
                                    for (t = this.offset(), n = i.ownerDocument, e = i.offsetParent || n.documentElement; e && (e === n.body || e === n.documentElement) && "static" === E.css(e, "position");) e = e.parentNode;
                                    e && e !== i && 1 === e.nodeType && ((s = E(e).offset()).top += E.css(e, "borderTopWidth", !0), s.left += E.css(e, "borderLeftWidth", !0))
                                }
                                return {
                                    top: t.top - s.top - E.css(i, "marginTop", !0),
                                    left: t.left - s.left - E.css(i, "marginLeft", !0)
                                }
                            }
                        },
                        offsetParent: function () {
                            return this.map((function () {
                                for (var e = this.offsetParent; e && "static" === E.css(e, "position");) e = e.offsetParent;
                                return e || oe
                            }))
                        }
                    }), E.each({
                        scrollLeft: "pageXOffset",
                        scrollTop: "pageYOffset"
                    }, (function (e, t) {
                        var n = "pageYOffset" === t;
                        E.fn[e] = function (i) {
                            return W(this, (function (e, i, s) {
                                var r;
                                if (b(e) ? r = e : 9 === e.nodeType && (r = e.defaultView), void 0 === s) return r ? r[t] : e[i];
                                r ? r.scrollTo(n ? r.pageXOffset : s, n ? s : r.pageYOffset) : e[i] = s
                            }), e, i, arguments.length)
                        }
                    })), E.each(["top", "left"], (function (e, t) {
                        E.cssHooks[t] = We(g.pixelPosition, (function (e, n) {
                            if (n) return n = Ve(e, t), Fe.test(n) ? E(e).position()[t] + "px" : n
                        }))
                    })), E.each({
                        Height: "height",
                        Width: "width"
                    }, (function (e, t) {
                        E.each({
                            padding: "inner" + e,
                            content: t,
                            "": "outer" + e
                        }, (function (n, i) {
                            E.fn[i] = function (s, r) {
                                var o = arguments.length && (n || "boolean" != typeof s),
                                    a = n || (!0 === s || !0 === r ? "margin" : "border");
                                return W(this, (function (t, n, s) {
                                    var r;
                                    return b(t) ? 0 === i.indexOf("outer") ? t["inner" + e] : t.document.documentElement["client" + e] : 9 === t.nodeType ? (r = t.documentElement, Math.max(t.body["scroll" + e], r["scroll" + e], t.body["offset" + e], r["offset" + e], r["client" + e])) : void 0 === s ? E.css(t, n, a) : E.style(t, n, s, a)
                                }), t, o ? s : void 0, o)
                            }
                        }))
                    })), E.each(["ajaxStart", "ajaxStop", "ajaxComplete", "ajaxError", "ajaxSuccess", "ajaxSend"], (function (e, t) {
                        E.fn[t] = function (e) {
                            return this.on(t, e)
                        }
                    })), E.fn.extend({
                        bind: function (e, t, n) {
                            return this.on(e, null, t, n)
                        },
                        unbind: function (e, t) {
                            return this.off(e, null, t)
                        },
                        delegate: function (e, t, n, i) {
                            return this.on(t, e, n, i)
                        },
                        undelegate: function (e, t, n) {
                            return 1 === arguments.length ? this.off(e, "**") : this.off(t, e || "**", n)
                        },
                        hover: function (e, t) {
                            return this.mouseenter(e).mouseleave(t || e)
                        }
                    }), E.each("blur focus focusin focusout resize scroll click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select submit keydown keypress keyup contextmenu".split(" "), (function (e, t) {
                        E.fn[t] = function (e, n) {
                            return arguments.length > 0 ? this.on(t, null, e, n) : this.trigger(t)
                        }
                    }));
                    var Yt = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;
                    E.proxy = function (e, t) {
                        var n, i, s;
                        if ("string" == typeof t && (n = e[t], t = e, e = n), v(e)) return i = a.call(arguments, 2), s = function () {
                            return e.apply(t || this, i.concat(a.call(arguments)))
                        }, s.guid = e.guid = e.guid || E.guid++, s
                    }, E.holdReady = function (e) {
                        e ? E.readyWait++ : E.ready(!0)
                    }, E.isArray = Array.isArray, E.parseJSON = JSON.parse, E.nodeName = O, E.isFunction = v, E.isWindow = b, E.camelCase = Y, E.type = _, E.now = Date.now, E.isNumeric = function (e) {
                        var t = E.type(e);
                        return ("number" === t || "string" === t) && !isNaN(e - parseFloat(e))
                    }, E.trim = function (e) {
                        return null == e ? "" : (e + "").replace(Yt, "")
                    }, void 0 === (n = function () {
                        return E
                    }.apply(t, [])) || (e.exports = n);
                    var Kt = i.jQuery,
                        Qt = i.$;
                    return E.noConflict = function (e) {
                        return i.$ === E && (i.$ = Qt), e && i.jQuery === E && (i.jQuery = Kt), E
                    }, void 0 === s && (i.jQuery = i.$ = E), E
                }))
            },
            630: function (e, t) {
                var n, i;
                n = function (e, t) {
                    "use strict";
                    var n, i;

                    function s(e, t) {
                        if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                    }
                    Object.defineProperty(t, "__esModule", {
                        value: !0
                    });
                    var r = function () {
                        function e(e, t) {
                            for (var n = 0; n < t.length; n++) {
                                var i = t[n];
                                i.enumerable = i.enumerable || !1, i.configurable = !0, "value" in i && (i.writable = !0), Object.defineProperty(e, i.key, i)
                            }
                        }
                        return function (t, n, i) {
                            return n && e(t.prototype, n), i && e(t, i), t
                        }
                    }();

                    function o(e, t) {
                        return t.indexOf(e) >= 0
                    }

                    function a(e, t) {
                        for (var n in t)
                            if (null == e[n]) {
                                var i = t[n];
                                e[n] = i
                            } return e
                    }

                    function l(e) {
                        var t = !(arguments.length <= 1 || void 0 === arguments[1]) && arguments[1],
                            n = !(arguments.length <= 2 || void 0 === arguments[2]) && arguments[2],
                            i = arguments.length <= 3 || void 0 === arguments[3] ? null : arguments[3],
                            s = void 0;
                        return null != document.createEvent ? (s = document.createEvent("CustomEvent")).initCustomEvent(e, t, n, i) : null != document.createEventObject ? (s = document.createEventObject()).eventType = e : s.eventName = e, s
                    }

                    function c(e, t, n) {
                        null != e.addEventListener ? e.addEventListener(t, n, !1) : null != e.attachEvent ? e.attachEvent("on" + t, n) : e[t] = n
                    }

                    function d(e, t, n) {
                        null != e.removeEventListener ? e.removeEventListener(t, n, !1) : null != e.detachEvent ? e.detachEvent("on" + t, n) : delete e[t]
                    }
                    var u = window.WeakMap || window.MozWeakMap || function () {
                            function e() {
                                s(this, e), this.keys = [], this.values = []
                            }
                            return r(e, [{
                                key: "get",
                                value: function (e) {
                                    for (var t = 0; t < this.keys.length; t++)
                                        if (this.keys[t] === e) return this.values[t]
                                }
                            }, {
                                key: "set",
                                value: function (e, t) {
                                    for (var n = 0; n < this.keys.length; n++)
                                        if (this.keys[n] === e) return this.values[n] = t, this;
                                    return this.keys.push(e), this.values.push(t), this
                                }
                            }]), e
                        }(),
                        p = window.MutationObserver || window.WebkitMutationObserver || window.MozMutationObserver || (i = n = function () {
                            function e() {
                                s(this, e), "undefined" != typeof console && null !== console && (console.warn("MutationObserver is not supported by your browser."), console.warn("WOW.js cannot detect dom mutations, please call .sync() after loading new content."))
                            }
                            return r(e, [{
                                key: "observe",
                                value: function () {}
                            }]), e
                        }(), n.notSupported = !0, i),
                        f = window.getComputedStyle || function (e) {
                            var t = /(\-([a-z]){1})/g;
                            return {
                                getPropertyValue: function (n) {
                                    "float" === n && (n = "styleFloat"), t.test(n) && n.replace(t, (function (e, t) {
                                        return t.toUpperCase()
                                    }));
                                    var i = e.currentStyle;
                                    return (null != i ? i[n] : void 0) || null
                                }
                            }
                        },
                        h = function () {
                            function e() {
                                var t = arguments.length <= 0 || void 0 === arguments[0] ? {} : arguments[0];
                                s(this, e), this.defaults = {
                                    boxClass: "wow",
                                    animateClass: "animated",
                                    offset: 0,
                                    mobile: !0,
                                    live: !0,
                                    callback: null,
                                    scrollContainer: null
                                }, this.animate = "requestAnimationFrame" in window ? function (e) {
                                    return window.requestAnimationFrame(e)
                                } : function (e) {
                                    return e()
                                }, this.vendors = ["moz", "webkit"], this.start = this.start.bind(this), this.resetAnimation = this.resetAnimation.bind(this), this.scrollHandler = this.scrollHandler.bind(this), this.scrollCallback = this.scrollCallback.bind(this), this.scrolled = !0, this.config = a(t, this.defaults), null != t.scrollContainer && (this.config.scrollContainer = document.querySelector(t.scrollContainer)), this.animationNameCache = new u, this.wowEvent = l(this.config.boxClass)
                            }
                            return r(e, [{
                                key: "init",
                                value: function () {
                                    this.element = window.document.documentElement, o(document.readyState, ["interactive", "complete"]) ? this.start() : c(document, "DOMContentLoaded", this.start), this.finished = []
                                }
                            }, {
                                key: "start",
                                value: function () {
                                    var e = this;
                                    if (this.stopped = !1, this.boxes = [].slice.call(this.element.querySelectorAll("." + this.config.boxClass)), this.all = this.boxes.slice(0), this.boxes.length)
                                        if (this.disabled()) this.resetStyle();
                                        else
                                            for (var t = 0; t < this.boxes.length; t++) {
                                                var n = this.boxes[t];
                                                this.applyStyle(n, !0)
                                            }
                                    this.disabled() || (c(this.config.scrollContainer || window, "scroll", this.scrollHandler), c(window, "resize", this.scrollHandler), this.interval = setInterval(this.scrollCallback, 50)), this.config.live && new p((function (t) {
                                        for (var n = 0; n < t.length; n++)
                                            for (var i = t[n], s = 0; s < i.addedNodes.length; s++) {
                                                var r = i.addedNodes[s];
                                                e.doSync(r)
                                            }
                                    })).observe(document.body, {
                                        childList: !0,
                                        subtree: !0
                                    })
                                }
                            }, {
                                key: "stop",
                                value: function () {
                                    this.stopped = !0, d(this.config.scrollContainer || window, "scroll", this.scrollHandler), d(window, "resize", this.scrollHandler), null != this.interval && clearInterval(this.interval)
                                }
                            }, {
                                key: "sync",
                                value: function () {
                                    p.notSupported && this.doSync(this.element)
                                }
                            }, {
                                key: "doSync",
                                value: function (e) {
                                    if (null == e && (e = this.element), 1 === e.nodeType)
                                        for (var t = (e = e.parentNode || e).querySelectorAll("." + this.config.boxClass), n = 0; n < t.length; n++) {
                                            var i = t[n];
                                            o(i, this.all) || (this.boxes.push(i), this.all.push(i), this.stopped || this.disabled() ? this.resetStyle() : this.applyStyle(i, !0), this.scrolled = !0)
                                        }
                                }
                            }, {
                                key: "show",
                                value: function (e) {
                                    return this.applyStyle(e), e.className = e.className + " " + this.config.animateClass, null != this.config.callback && this.config.callback(e), t = e, n = this.wowEvent, null != t.dispatchEvent ? t.dispatchEvent(n) : n in (null != t) ? t[n]() : "on" + n in (null != t) && t["on" + n](), c(e, "animationend", this.resetAnimation), c(e, "oanimationend", this.resetAnimation), c(e, "webkitAnimationEnd", this.resetAnimation), c(e, "MSAnimationEnd", this.resetAnimation), e;
                                    var t, n
                                }
                            }, {
                                key: "applyStyle",
                                value: function (e, t) {
                                    var n = this,
                                        i = e.getAttribute("data-wow-duration"),
                                        s = e.getAttribute("data-wow-delay"),
                                        r = e.getAttribute("data-wow-iteration");
                                    return this.animate((function () {
                                        return n.customStyle(e, t, i, s, r)
                                    }))
                                }
                            }, {
                                key: "resetStyle",
                                value: function () {
                                    for (var e = 0; e < this.boxes.length; e++) this.boxes[e].style.visibility = "visible"
                                }
                            }, {
                                key: "resetAnimation",
                                value: function (e) {
                                    if (e.type.toLowerCase().indexOf("animationend") >= 0) {
                                        var t = e.target || e.srcElement;
                                        t.className = t.className.replace(this.config.animateClass, "").trim()
                                    }
                                }
                            }, {
                                key: "customStyle",
                                value: function (e, t, n, i, s) {
                                    return t && this.cacheAnimationName(e), e.style.visibility = t ? "hidden" : "visible", n && this.vendorSet(e.style, {
                                        animationDuration: n
                                    }), i && this.vendorSet(e.style, {
                                        animationDelay: i
                                    }), s && this.vendorSet(e.style, {
                                        animationIterationCount: s
                                    }), this.vendorSet(e.style, {
                                        animationName: t ? "none" : this.cachedAnimationName(e)
                                    }), e
                                }
                            }, {
                                key: "vendorSet",
                                value: function (e, t) {
                                    for (var n in t)
                                        if (t.hasOwnProperty(n)) {
                                            var i = t[n];
                                            e["" + n] = i;
                                            for (var s = 0; s < this.vendors.length; s++) e["" + this.vendors[s] + n.charAt(0).toUpperCase() + n.substr(1)] = i
                                        }
                                }
                            }, {
                                key: "vendorCSS",
                                value: function (e, t) {
                                    for (var n = f(e), i = n.getPropertyCSSValue(t), s = 0; s < this.vendors.length; s++) {
                                        var r = this.vendors[s];
                                        i = i || n.getPropertyCSSValue("-" + r + "-" + t)
                                    }
                                    return i
                                }
                            }, {
                                key: "animationName",
                                value: function (e) {
                                    var t = void 0;
                                    try {
                                        t = this.vendorCSS(e, "animation-name").cssText
                                    } catch (n) {
                                        t = f(e).getPropertyValue("animation-name")
                                    }
                                    return "none" === t ? "" : t
                                }
                            }, {
                                key: "cacheAnimationName",
                                value: function (e) {
                                    return this.animationNameCache.set(e, this.animationName(e))
                                }
                            }, {
                                key: "cachedAnimationName",
                                value: function (e) {
                                    return this.animationNameCache.get(e)
                                }
                            }, {
                                key: "scrollHandler",
                                value: function () {
                                    this.scrolled = !0
                                }
                            }, {
                                key: "scrollCallback",
                                value: function () {
                                    if (this.scrolled) {
                                        this.scrolled = !1;
                                        for (var e = [], t = 0; t < this.boxes.length; t++) {
                                            var n = this.boxes[t];
                                            if (n) {
                                                if (this.isVisible(n)) {
                                                    this.show(n);
                                                    continue
                                                }
                                                e.push(n)
                                            }
                                        }
                                        this.boxes = e, this.boxes.length || this.config.live || this.stop()
                                    }
                                }
                            }, {
                                key: "offsetTop",
                                value: function (e) {
                                    for (; void 0 === e.offsetTop;) e = e.parentNode;
                                    for (var t = e.offsetTop; e.offsetParent;) t += (e = e.offsetParent).offsetTop;
                                    return t
                                }
                            }, {
                                key: "isVisible",
                                value: function (e) {
                                    var t = e.getAttribute("data-wow-offset") || this.config.offset,
                                        n = this.config.scrollContainer && this.config.scrollContainer.scrollTop || window.pageYOffset,
                                        i = n + Math.min(this.element.clientHeight, "innerHeight" in window ? window.innerHeight : document.documentElement.clientHeight) - t,
                                        s = this.offsetTop(e),
                                        r = s + e.clientHeight;
                                    return s <= i && r >= n
                                }
                            }, {
                                key: "disabled",
                                value: function () {
                                    return !this.config.mobile && (e = navigator.userAgent, /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(e));
                                    var e
                                }
                            }]), e
                        }();
                    t.default = h, e.exports = t.default
                }, void 0 === (i = n.apply(t, [e, t])) || (e.exports = i)
            }
        },
        n = {};

    function i(e) {
        var s = n[e];
        if (void 0 !== s) return s.exports;
        var r = n[e] = {
            exports: {}
        };
        return t[e].call(r.exports, r, r.exports, i), r.exports
    }
    i.n = e => {
        var t = e && e.__esModule ? () => e.default : () => e;
        return i.d(t, {
            a: t
        }), t
    }, i.d = (e, t) => {
        for (var n in t) i.o(t, n) && !i.o(e, n) && Object.defineProperty(e, n, {
            enumerable: !0,
            get: t[n]
        })
    }, i.o = (e, t) => Object.prototype.hasOwnProperty.call(e, t), i.r = e => {
        "undefined" != typeof Symbol && Symbol.toStringTag && Object.defineProperty(e, Symbol.toStringTag, {
            value: "Module"
        }), Object.defineProperty(e, "__esModule", {
            value: !0
        })
    }, (() => {
        "use strict";
        var e = {};

        function t(e) {
            return null !== e && "object" == typeof e && "constructor" in e && e.constructor === Object
        }

        function n(e = {}, i = {}) {
            Object.keys(i).forEach((s => {
                void 0 === e[s] ? e[s] = i[s] : t(i[s]) && t(e[s]) && Object.keys(i[s]).length > 0 && n(e[s], i[s])
            }))
        }
        i.r(e), i.d(e, {
            afterMain: () => ke,
            afterRead: () => Ee,
            afterWrite: () => Oe,
            applyStyles: () => $e,
            arrow: () => tt,
            auto: () => pe,
            basePlacements: () => fe,
            beforeMain: () => Te,
            beforeRead: () => _e,
            beforeWrite: () => Ae,
            bottom: () => ce,
            clippingParents: () => ge,
            computeStyles: () => rt,
            createPopper: () => Nt,
            createPopperBase: () => Mt,
            createPopperLite: () => It,
            detectOverflow: () => wt,
            end: () => me,
            eventListeners: () => at,
            flip: () => xt,
            hide: () => Et,
            left: () => ue,
            main: () => Se,
            modifierPhases: () => Pe,
            offset: () => Tt,
            placements: () => xe,
            popper: () => be,
            popperGenerator: () => Dt,
            popperOffsets: () => St,
            preventOverflow: () => kt,
            read: () => Ce,
            reference: () => ye,
            right: () => de,
            start: () => he,
            top: () => le,
            variationPlacements: () => we,
            viewport: () => ve,
            write: () => Le
        });
        const s = {
            body: {},
            addEventListener() {},
            removeEventListener() {},
            activeElement: {
                blur() {},
                nodeName: ""
            },
            querySelector: () => null,
            querySelectorAll: () => [],
            getElementById: () => null,
            createEvent: () => ({
                initEvent() {}
            }),
            createElement: () => ({
                children: [],
                childNodes: [],
                style: {},
                setAttribute() {},
                getElementsByTagName: () => []
            }),
            createElementNS: () => ({}),
            importNode: () => null,
            location: {
                hash: "",
                host: "",
                hostname: "",
                href: "",
                origin: "",
                pathname: "",
                protocol: "",
                search: ""
            }
        };

        function r() {
            const e = "undefined" != typeof document ? document : {};
            return n(e, s), e
        }
        const o = {
            document: s,
            navigator: {
                userAgent: ""
            },
            location: {
                hash: "",
                host: "",
                hostname: "",
                href: "",
                origin: "",
                pathname: "",
                protocol: "",
                search: ""
            },
            history: {
                replaceState() {},
                pushState() {},
                go() {},
                back() {}
            },
            CustomEvent: function () {
                return this
            },
            addEventListener() {},
            removeEventListener() {},
            getComputedStyle: () => ({
                getPropertyValue: () => ""
            }),
            Image() {},
            Date() {},
            screen: {},
            setTimeout() {},
            clearTimeout() {},
            matchMedia: () => ({}),
            requestAnimationFrame: e => "undefined" == typeof setTimeout ? (e(), null) : setTimeout(e, 0),
            cancelAnimationFrame(e) {
                "undefined" != typeof setTimeout && clearTimeout(e)
            }
        };

        function a() {
            const e = "undefined" != typeof window ? window : {};
            return n(e, o), e
        }
        class l extends Array {
            constructor(e) {
                "number" == typeof e ? super(e) : (super(...e || []), function (e) {
                    const t = e.__proto__;
                    Object.defineProperty(e, "__proto__", {
                        get: () => t,
                        set(e) {
                            t.__proto__ = e
                        }
                    })
                }(this))
            }
        }

        function c(e = []) {
            const t = [];
            return e.forEach((e => {
                Array.isArray(e) ? t.push(...c(e)) : t.push(e)
            })), t
        }

        function d(e, t) {
            return Array.prototype.filter.call(e, t)
        }

        function u(e, t) {
            const n = a(),
                i = r();
            let s = [];
            if (!t && e instanceof l) return e;
            if (!e) return new l(s);
            if ("string" == typeof e) {
                const n = e.trim();
                if (n.indexOf("<") >= 0 && n.indexOf(">") >= 0) {
                    let e = "div";
                    0 === n.indexOf("<li") && (e = "ul"), 0 === n.indexOf("<tr") && (e = "tbody"), 0 !== n.indexOf("<td") && 0 !== n.indexOf("<th") || (e = "tr"), 0 === n.indexOf("<tbody") && (e = "table"), 0 === n.indexOf("<option") && (e = "select");
                    const t = i.createElement(e);
                    t.innerHTML = n;
                    for (let e = 0; e < t.childNodes.length; e += 1) s.push(t.childNodes[e])
                } else s = function (e, t) {
                    if ("string" != typeof e) return [e];
                    const n = [],
                        i = t.querySelectorAll(e);
                    for (let e = 0; e < i.length; e += 1) n.push(i[e]);
                    return n
                }(e.trim(), t || i)
            } else if (e.nodeType || e === n || e === i) s.push(e);
            else if (Array.isArray(e)) {
                if (e instanceof l) return e;
                s = e
            }
            return new l(function (e) {
                const t = [];
                for (let n = 0; n < e.length; n += 1) - 1 === t.indexOf(e[n]) && t.push(e[n]);
                return t
            }(s))
        }
        u.fn = l.prototype;
        const p = "resize scroll".split(" ");

        function f(e) {
            return function (...t) {
                if (void 0 === t[0]) {
                    for (let t = 0; t < this.length; t += 1) p.indexOf(e) < 0 && (e in this[t] ? this[t][e]() : u(this[t]).trigger(e));
                    return this
                }
                return this.on(e, ...t)
            }
        }
        f("click"), f("blur"), f("focus"), f("focusin"), f("focusout"), f("keyup"), f("keydown"), f("keypress"), f("submit"), f("change"), f("mousedown"), f("mousemove"), f("mouseup"), f("mouseenter"), f("mouseleave"), f("mouseout"), f("mouseover"), f("touchstart"), f("touchend"), f("touchmove"), f("resize"), f("scroll");
        const h = {
            addClass: function (...e) {
                const t = c(e.map((e => e.split(" "))));
                return this.forEach((e => {
                    e.classList.add(...t)
                })), this
            },
            removeClass: function (...e) {
                const t = c(e.map((e => e.split(" "))));
                return this.forEach((e => {
                    e.classList.remove(...t)
                })), this
            },
            hasClass: function (...e) {
                const t = c(e.map((e => e.split(" "))));
                return d(this, (e => t.filter((t => e.classList.contains(t))).length > 0)).length > 0
            },
            toggleClass: function (...e) {
                const t = c(e.map((e => e.split(" "))));
                this.forEach((e => {
                    t.forEach((t => {
                        e.classList.toggle(t)
                    }))
                }))
            },
            attr: function (e, t) {
                if (1 === arguments.length && "string" == typeof e) return this[0] ? this[0].getAttribute(e) : void 0;
                for (let n = 0; n < this.length; n += 1)
                    if (2 === arguments.length) this[n].setAttribute(e, t);
                    else
                        for (const t in e) this[n][t] = e[t], this[n].setAttribute(t, e[t]);
                return this
            },
            removeAttr: function (e) {
                for (let t = 0; t < this.length; t += 1) this[t].removeAttribute(e);
                return this
            },
            transform: function (e) {
                for (let t = 0; t < this.length; t += 1) this[t].style.transform = e;
                return this
            },
            transition: function (e) {
                for (let t = 0; t < this.length; t += 1) this[t].style.transitionDuration = "string" != typeof e ? `${e}ms` : e;
                return this
            },
            on: function (...e) {
                let [t, n, i, s] = e;

                function r(e) {
                    const t = e.target;
                    if (!t) return;
                    const s = e.target.dom7EventData || [];
                    if (s.indexOf(e) < 0 && s.unshift(e), u(t).is(n)) i.apply(t, s);
                    else {
                        const e = u(t).parents();
                        for (let t = 0; t < e.length; t += 1) u(e[t]).is(n) && i.apply(e[t], s)
                    }
                }

                function o(e) {
                    const t = e && e.target && e.target.dom7EventData || [];
                    t.indexOf(e) < 0 && t.unshift(e), i.apply(this, t)
                }
                "function" == typeof e[1] && ([t, i, s] = e, n = void 0), s || (s = !1);
                const a = t.split(" ");
                let l;
                for (let e = 0; e < this.length; e += 1) {
                    const t = this[e];
                    if (n)
                        for (l = 0; l < a.length; l += 1) {
                            const e = a[l];
                            t.dom7LiveListeners || (t.dom7LiveListeners = {}), t.dom7LiveListeners[e] || (t.dom7LiveListeners[e] = []), t.dom7LiveListeners[e].push({
                                listener: i,
                                proxyListener: r
                            }), t.addEventListener(e, r, s)
                        } else
                            for (l = 0; l < a.length; l += 1) {
                                const e = a[l];
                                t.dom7Listeners || (t.dom7Listeners = {}), t.dom7Listeners[e] || (t.dom7Listeners[e] = []), t.dom7Listeners[e].push({
                                    listener: i,
                                    proxyListener: o
                                }), t.addEventListener(e, o, s)
                            }
                }
                return this
            },
            off: function (...e) {
                let [t, n, i, s] = e;
                "function" == typeof e[1] && ([t, i, s] = e, n = void 0), s || (s = !1);
                const r = t.split(" ");
                for (let e = 0; e < r.length; e += 1) {
                    const t = r[e];
                    for (let e = 0; e < this.length; e += 1) {
                        const r = this[e];
                        let o;
                        if (!n && r.dom7Listeners ? o = r.dom7Listeners[t] : n && r.dom7LiveListeners && (o = r.dom7LiveListeners[t]), o && o.length)
                            for (let e = o.length - 1; e >= 0; e -= 1) {
                                const n = o[e];
                                i && n.listener === i || i && n.listener && n.listener.dom7proxy && n.listener.dom7proxy === i ? (r.removeEventListener(t, n.proxyListener, s), o.splice(e, 1)) : i || (r.removeEventListener(t, n.proxyListener, s), o.splice(e, 1))
                            }
                    }
                }
                return this
            },
            trigger: function (...e) {
                const t = a(),
                    n = e[0].split(" "),
                    i = e[1];
                for (let s = 0; s < n.length; s += 1) {
                    const r = n[s];
                    for (let n = 0; n < this.length; n += 1) {
                        const s = this[n];
                        if (t.CustomEvent) {
                            const n = new t.CustomEvent(r, {
                                detail: i,
                                bubbles: !0,
                                cancelable: !0
                            });
                            s.dom7EventData = e.filter(((e, t) => t > 0)), s.dispatchEvent(n), s.dom7EventData = [], delete s.dom7EventData
                        }
                    }
                }
                return this
            },
            transitionEnd: function (e) {
                const t = this;
                return e && t.on("transitionend", (function n(i) {
                    i.target === this && (e.call(this, i), t.off("transitionend", n))
                })), this
            },
            outerWidth: function (e) {
                if (this.length > 0) {
                    if (e) {
                        const e = this.styles();
                        return this[0].offsetWidth + parseFloat(e.getPropertyValue("margin-right")) + parseFloat(e.getPropertyValue("margin-left"))
                    }
                    return this[0].offsetWidth
                }
                return null
            },
            outerHeight: function (e) {
                if (this.length > 0) {
                    if (e) {
                        const e = this.styles();
                        return this[0].offsetHeight + parseFloat(e.getPropertyValue("margin-top")) + parseFloat(e.getPropertyValue("margin-bottom"))
                    }
                    return this[0].offsetHeight
                }
                return null
            },
            styles: function () {
                const e = a();
                return this[0] ? e.getComputedStyle(this[0], null) : {}
            },
            offset: function () {
                if (this.length > 0) {
                    const e = a(),
                        t = r(),
                        n = this[0],
                        i = n.getBoundingClientRect(),
                        s = t.body,
                        o = n.clientTop || s.clientTop || 0,
                        l = n.clientLeft || s.clientLeft || 0,
                        c = n === e ? e.scrollY : n.scrollTop,
                        d = n === e ? e.scrollX : n.scrollLeft;
                    return {
                        top: i.top + c - o,
                        left: i.left + d - l
                    }
                }
                return null
            },
            css: function (e, t) {
                const n = a();
                let i;
                if (1 === arguments.length) {
                    if ("string" != typeof e) {
                        for (i = 0; i < this.length; i += 1)
                            for (const t in e) this[i].style[t] = e[t];
                        return this
                    }
                    if (this[0]) return n.getComputedStyle(this[0], null).getPropertyValue(e)
                }
                if (2 === arguments.length && "string" == typeof e) {
                    for (i = 0; i < this.length; i += 1) this[i].style[e] = t;
                    return this
                }
                return this
            },
            each: function (e) {
                return e ? (this.forEach(((t, n) => {
                    e.apply(t, [t, n])
                })), this) : this
            },
            html: function (e) {
                if (void 0 === e) return this[0] ? this[0].innerHTML : null;
                for (let t = 0; t < this.length; t += 1) this[t].innerHTML = e;
                return this
            },
            text: function (e) {
                if (void 0 === e) return this[0] ? this[0].textContent.trim() : null;
                for (let t = 0; t < this.length; t += 1) this[t].textContent = e;
                return this
            },
            is: function (e) {
                const t = a(),
                    n = r(),
                    i = this[0];
                let s, o;
                if (!i || void 0 === e) return !1;
                if ("string" == typeof e) {
                    if (i.matches) return i.matches(e);
                    if (i.webkitMatchesSelector) return i.webkitMatchesSelector(e);
                    if (i.msMatchesSelector) return i.msMatchesSelector(e);
                    for (s = u(e), o = 0; o < s.length; o += 1)
                        if (s[o] === i) return !0;
                    return !1
                }
                if (e === n) return i === n;
                if (e === t) return i === t;
                if (e.nodeType || e instanceof l) {
                    for (s = e.nodeType ? [e] : e, o = 0; o < s.length; o += 1)
                        if (s[o] === i) return !0;
                    return !1
                }
                return !1
            },
            index: function () {
                let e, t = this[0];
                if (t) {
                    for (e = 0; null !== (t = t.previousSibling);) 1 === t.nodeType && (e += 1);
                    return e
                }
            },
            eq: function (e) {
                if (void 0 === e) return this;
                const t = this.length;
                if (e > t - 1) return u([]);
                if (e < 0) {
                    const n = t + e;
                    return u(n < 0 ? [] : [this[n]])
                }
                return u([this[e]])
            },
            append: function (...e) {
                let t;
                const n = r();
                for (let i = 0; i < e.length; i += 1) {
                    t = e[i];
                    for (let e = 0; e < this.length; e += 1)
                        if ("string" == typeof t) {
                            const i = n.createElement("div");
                            for (i.innerHTML = t; i.firstChild;) this[e].appendChild(i.firstChild)
                        } else if (t instanceof l)
                        for (let n = 0; n < t.length; n += 1) this[e].appendChild(t[n]);
                    else this[e].appendChild(t)
                }
                return this
            },
            prepend: function (e) {
                const t = r();
                let n, i;
                for (n = 0; n < this.length; n += 1)
                    if ("string" == typeof e) {
                        const s = t.createElement("div");
                        for (s.innerHTML = e, i = s.childNodes.length - 1; i >= 0; i -= 1) this[n].insertBefore(s.childNodes[i], this[n].childNodes[0])
                    } else if (e instanceof l)
                    for (i = 0; i < e.length; i += 1) this[n].insertBefore(e[i], this[n].childNodes[0]);
                else this[n].insertBefore(e, this[n].childNodes[0]);
                return this
            },
            next: function (e) {
                return this.length > 0 ? e ? this[0].nextElementSibling && u(this[0].nextElementSibling).is(e) ? u([this[0].nextElementSibling]) : u([]) : this[0].nextElementSibling ? u([this[0].nextElementSibling]) : u([]) : u([])
            },
            nextAll: function (e) {
                const t = [];
                let n = this[0];
                if (!n) return u([]);
                for (; n.nextElementSibling;) {
                    const i = n.nextElementSibling;
                    e ? u(i).is(e) && t.push(i) : t.push(i), n = i
                }
                return u(t)
            },
            prev: function (e) {
                if (this.length > 0) {
                    const t = this[0];
                    return e ? t.previousElementSibling && u(t.previousElementSibling).is(e) ? u([t.previousElementSibling]) : u([]) : t.previousElementSibling ? u([t.previousElementSibling]) : u([])
                }
                return u([])
            },
            prevAll: function (e) {
                const t = [];
                let n = this[0];
                if (!n) return u([]);
                for (; n.previousElementSibling;) {
                    const i = n.previousElementSibling;
                    e ? u(i).is(e) && t.push(i) : t.push(i), n = i
                }
                return u(t)
            },
            parent: function (e) {
                const t = [];
                for (let n = 0; n < this.length; n += 1) null !== this[n].parentNode && (e ? u(this[n].parentNode).is(e) && t.push(this[n].parentNode) : t.push(this[n].parentNode));
                return u(t)
            },
            parents: function (e) {
                const t = [];
                for (let n = 0; n < this.length; n += 1) {
                    let i = this[n].parentNode;
                    for (; i;) e ? u(i).is(e) && t.push(i) : t.push(i), i = i.parentNode
                }
                return u(t)
            },
            closest: function (e) {
                let t = this;
                return void 0 === e ? u([]) : (t.is(e) || (t = t.parents(e).eq(0)), t)
            },
            find: function (e) {
                const t = [];
                for (let n = 0; n < this.length; n += 1) {
                    const i = this[n].querySelectorAll(e);
                    for (let e = 0; e < i.length; e += 1) t.push(i[e])
                }
                return u(t)
            },
            children: function (e) {
                const t = [];
                for (let n = 0; n < this.length; n += 1) {
                    const i = this[n].children;
                    for (let n = 0; n < i.length; n += 1) e && !u(i[n]).is(e) || t.push(i[n])
                }
                return u(t)
            },
            filter: function (e) {
                return u(d(this, e))
            },
            remove: function () {
                for (let e = 0; e < this.length; e += 1) this[e].parentNode && this[e].parentNode.removeChild(this[e]);
                return this
            }
        };
        Object.keys(h).forEach((e => {
            Object.defineProperty(u.fn, e, {
                value: h[e],
                writable: !0
            })
        }));
        const m = u;

        function g(e, t) {
            return void 0 === t && (t = 0), setTimeout(e, t)
        }

        function v() {
            return Date.now()
        }

        function b(e) {
            return "object" == typeof e && null !== e && e.constructor && "Object" === Object.prototype.toString.call(e).slice(8, -1)
        }

        function y(e) {
            return "undefined" != typeof window && void 0 !== window.HTMLElement ? e instanceof HTMLElement : e && (1 === e.nodeType || 11 === e.nodeType)
        }

        function w() {
            const e = Object(arguments.length <= 0 ? void 0 : arguments[0]),
                t = ["__proto__", "constructor", "prototype"];
            for (let n = 1; n < arguments.length; n += 1) {
                const i = n < 0 || arguments.length <= n ? void 0 : arguments[n];
                if (null != i && !y(i)) {
                    const n = Object.keys(Object(i)).filter((e => t.indexOf(e) < 0));
                    for (let t = 0, s = n.length; t < s; t += 1) {
                        const s = n[t],
                            r = Object.getOwnPropertyDescriptor(i, s);
                        void 0 !== r && r.enumerable && (b(e[s]) && b(i[s]) ? i[s].__swiper__ ? e[s] = i[s] : w(e[s], i[s]) : !b(e[s]) && b(i[s]) ? (e[s] = {}, i[s].__swiper__ ? e[s] = i[s] : w(e[s], i[s])) : e[s] = i[s])
                    }
                }
            }
            return e
        }

        function x(e, t, n) {
            e.style.setProperty(t, n)
        }

        function _(e) {
            let {
                swiper: t,
                targetPosition: n,
                side: i
            } = e;
            const s = a(),
                r = -t.translate;
            let o, l = null;
            const c = t.params.speed;
            t.wrapperEl.style.scrollSnapType = "none", s.cancelAnimationFrame(t.cssModeFrameID);
            const d = n > r ? "next" : "prev",
                u = (e, t) => "next" === d && e >= t || "prev" === d && e <= t,
                p = () => {
                    o = (new Date).getTime(), null === l && (l = o);
                    const e = Math.max(Math.min((o - l) / c, 1), 0),
                        a = .5 - Math.cos(e * Math.PI) / 2;
                    let d = r + a * (n - r);
                    if (u(d, n) && (d = n), t.wrapperEl.scrollTo({
                            [i]: d
                        }), u(d, n)) return t.wrapperEl.style.overflow = "hidden", t.wrapperEl.style.scrollSnapType = "", setTimeout((() => {
                        t.wrapperEl.style.overflow = "", t.wrapperEl.scrollTo({
                            [i]: d
                        })
                    })), void s.cancelAnimationFrame(t.cssModeFrameID);
                    t.cssModeFrameID = s.requestAnimationFrame(p)
                };
            p()
        }
        let C, E, T;

        function S() {
            return C || (C = function () {
                const e = a(),
                    t = r();
                return {
                    smoothScroll: t.documentElement && "scrollBehavior" in t.documentElement.style,
                    touch: !!("ontouchstart" in e || e.DocumentTouch && t instanceof e.DocumentTouch),
                    passiveListener: function () {
                        let t = !1;
                        try {
                            const n = Object.defineProperty({}, "passive", {
                                get() {
                                    t = !0
                                }
                            });
                            e.addEventListener("testPassiveListener", null, n)
                        } catch (e) {}
                        return t
                    }(),
                    gestures: "ongesturestart" in e
                }
            }()), C
        }
        const k = {
                on(e, t, n) {
                    const i = this;
                    if (!i.eventsListeners || i.destroyed) return i;
                    if ("function" != typeof t) return i;
                    const s = n ? "unshift" : "push";
                    return e.split(" ").forEach((e => {
                        i.eventsListeners[e] || (i.eventsListeners[e] = []), i.eventsListeners[e][s](t)
                    })), i
                },
                once(e, t, n) {
                    const i = this;
                    if (!i.eventsListeners || i.destroyed) return i;
                    if ("function" != typeof t) return i;

                    function s() {
                        i.off(e, s), s.__emitterProxy && delete s.__emitterProxy;
                        for (var n = arguments.length, r = new Array(n), o = 0; o < n; o++) r[o] = arguments[o];
                        t.apply(i, r)
                    }
                    return s.__emitterProxy = t, i.on(e, s, n)
                },
                onAny(e, t) {
                    const n = this;
                    if (!n.eventsListeners || n.destroyed) return n;
                    if ("function" != typeof e) return n;
                    const i = t ? "unshift" : "push";
                    return n.eventsAnyListeners.indexOf(e) < 0 && n.eventsAnyListeners[i](e), n
                },
                offAny(e) {
                    const t = this;
                    if (!t.eventsListeners || t.destroyed) return t;
                    if (!t.eventsAnyListeners) return t;
                    const n = t.eventsAnyListeners.indexOf(e);
                    return n >= 0 && t.eventsAnyListeners.splice(n, 1), t
                },
                off(e, t) {
                    const n = this;
                    return !n.eventsListeners || n.destroyed ? n : n.eventsListeners ? (e.split(" ").forEach((e => {
                        void 0 === t ? n.eventsListeners[e] = [] : n.eventsListeners[e] && n.eventsListeners[e].forEach(((i, s) => {
                            (i === t || i.__emitterProxy && i.__emitterProxy === t) && n.eventsListeners[e].splice(s, 1)
                        }))
                    })), n) : n
                },
                emit() {
                    const e = this;
                    if (!e.eventsListeners || e.destroyed) return e;
                    if (!e.eventsListeners) return e;
                    let t, n, i;
                    for (var s = arguments.length, r = new Array(s), o = 0; o < s; o++) r[o] = arguments[o];
                    return "string" == typeof r[0] || Array.isArray(r[0]) ? (t = r[0], n = r.slice(1, r.length), i = e) : (t = r[0].events, n = r[0].data, i = r[0].context || e), n.unshift(i), (Array.isArray(t) ? t : t.split(" ")).forEach((t => {
                        e.eventsAnyListeners && e.eventsAnyListeners.length && e.eventsAnyListeners.forEach((e => {
                            e.apply(i, [t, ...n])
                        })), e.eventsListeners && e.eventsListeners[t] && e.eventsListeners[t].forEach((e => {
                            e.apply(i, n)
                        }))
                    })), e
                }
            },
            A = {
                updateSize: function () {
                    const e = this;
                    let t, n;
                    const i = e.$el;
                    t = void 0 !== e.params.width && null !== e.params.width ? e.params.width : i[0].clientWidth, n = void 0 !== e.params.height && null !== e.params.height ? e.params.height : i[0].clientHeight, 0 === t && e.isHorizontal() || 0 === n && e.isVertical() || (t = t - parseInt(i.css("padding-left") || 0, 10) - parseInt(i.css("padding-right") || 0, 10), n = n - parseInt(i.css("padding-top") || 0, 10) - parseInt(i.css("padding-bottom") || 0, 10), Number.isNaN(t) && (t = 0), Number.isNaN(n) && (n = 0), Object.assign(e, {
                        width: t,
                        height: n,
                        size: e.isHorizontal() ? t : n
                    }))
                },
                updateSlides: function () {
                    const e = this;

                    function t(t) {
                        return e.isHorizontal() ? t : {
                            width: "height",
                            "margin-top": "margin-left",
                            "margin-bottom ": "margin-right",
                            "margin-left": "margin-top",
                            "margin-right": "margin-bottom",
                            "padding-left": "padding-top",
                            "padding-right": "padding-bottom",
                            marginRight: "marginBottom"
                        } [t]
                    }

                    function n(e, n) {
                        return parseFloat(e.getPropertyValue(t(n)) || 0)
                    }
                    const i = e.params,
                        {
                            $wrapperEl: s,
                            size: r,
                            rtlTranslate: o,
                            wrongRTL: a
                        } = e,
                        l = e.virtual && i.virtual.enabled,
                        c = l ? e.virtual.slides.length : e.slides.length,
                        d = s.children(`.${e.params.slideClass}`),
                        u = l ? e.virtual.slides.length : d.length;
                    let p = [];
                    const f = [],
                        h = [];
                    let m = i.slidesOffsetBefore;
                    "function" == typeof m && (m = i.slidesOffsetBefore.call(e));
                    let g = i.slidesOffsetAfter;
                    "function" == typeof g && (g = i.slidesOffsetAfter.call(e));
                    const v = e.snapGrid.length,
                        b = e.slidesGrid.length;
                    let y = i.spaceBetween,
                        w = -m,
                        _ = 0,
                        C = 0;
                    if (void 0 === r) return;
                    "string" == typeof y && y.indexOf("%") >= 0 && (y = parseFloat(y.replace("%", "")) / 100 * r), e.virtualSize = -y, o ? d.css({
                        marginLeft: "",
                        marginBottom: "",
                        marginTop: ""
                    }) : d.css({
                        marginRight: "",
                        marginBottom: "",
                        marginTop: ""
                    }), i.centeredSlides && i.cssMode && (x(e.wrapperEl, "--swiper-centered-offset-before", ""), x(e.wrapperEl, "--swiper-centered-offset-after", ""));
                    const E = i.grid && i.grid.rows > 1 && e.grid;
                    let T;
                    E && e.grid.initSlides(u);
                    const S = "auto" === i.slidesPerView && i.breakpoints && Object.keys(i.breakpoints).filter((e => void 0 !== i.breakpoints[e].slidesPerView)).length > 0;
                    for (let s = 0; s < u; s += 1) {
                        T = 0;
                        const o = d.eq(s);
                        if (E && e.grid.updateSlide(s, o, u, t), "none" !== o.css("display")) {
                            if ("auto" === i.slidesPerView) {
                                S && (d[s].style[t("width")] = "");
                                const r = getComputedStyle(o[0]),
                                    a = o[0].style.transform,
                                    l = o[0].style.webkitTransform;
                                if (a && (o[0].style.transform = "none"), l && (o[0].style.webkitTransform = "none"), i.roundLengths) T = e.isHorizontal() ? o.outerWidth(!0) : o.outerHeight(!0);
                                else {
                                    const e = n(r, "width"),
                                        t = n(r, "padding-left"),
                                        i = n(r, "padding-right"),
                                        s = n(r, "margin-left"),
                                        a = n(r, "margin-right"),
                                        l = r.getPropertyValue("box-sizing");
                                    if (l && "border-box" === l) T = e + s + a;
                                    else {
                                        const {
                                            clientWidth: n,
                                            offsetWidth: r
                                        } = o[0];
                                        T = e + t + i + s + a + (r - n)
                                    }
                                }
                                a && (o[0].style.transform = a), l && (o[0].style.webkitTransform = l), i.roundLengths && (T = Math.floor(T))
                            } else T = (r - (i.slidesPerView - 1) * y) / i.slidesPerView, i.roundLengths && (T = Math.floor(T)), d[s] && (d[s].style[t("width")] = `${T}px`);
                            d[s] && (d[s].swiperSlideSize = T), h.push(T), i.centeredSlides ? (w = w + T / 2 + _ / 2 + y, 0 === _ && 0 !== s && (w = w - r / 2 - y), 0 === s && (w = w - r / 2 - y), Math.abs(w) < .001 && (w = 0), i.roundLengths && (w = Math.floor(w)), C % i.slidesPerGroup == 0 && p.push(w), f.push(w)) : (i.roundLengths && (w = Math.floor(w)), (C - Math.min(e.params.slidesPerGroupSkip, C)) % e.params.slidesPerGroup == 0 && p.push(w), f.push(w), w = w + T + y), e.virtualSize += T + y, _ = T, C += 1
                        }
                    }
                    if (e.virtualSize = Math.max(e.virtualSize, r) + g, o && a && ("slide" === i.effect || "coverflow" === i.effect) && s.css({
                            width: `${e.virtualSize+i.spaceBetween}px`
                        }), i.setWrapperSize && s.css({
                            [t("width")]: `${e.virtualSize+i.spaceBetween}px`
                        }), E && e.grid.updateWrapperSize(T, p, t), !i.centeredSlides) {
                        const t = [];
                        for (let n = 0; n < p.length; n += 1) {
                            let s = p[n];
                            i.roundLengths && (s = Math.floor(s)), p[n] <= e.virtualSize - r && t.push(s)
                        }
                        p = t, Math.floor(e.virtualSize - r) - Math.floor(p[p.length - 1]) > 1 && p.push(e.virtualSize - r)
                    }
                    if (0 === p.length && (p = [0]), 0 !== i.spaceBetween) {
                        const n = e.isHorizontal() && o ? "marginLeft" : t("marginRight");
                        d.filter(((e, t) => !i.cssMode || t !== d.length - 1)).css({
                            [n]: `${y}px`
                        })
                    }
                    if (i.centeredSlides && i.centeredSlidesBounds) {
                        let e = 0;
                        h.forEach((t => {
                            e += t + (i.spaceBetween ? i.spaceBetween : 0)
                        })), e -= i.spaceBetween;
                        const t = e - r;
                        p = p.map((e => e < 0 ? -m : e > t ? t + g : e))
                    }
                    if (i.centerInsufficientSlides) {
                        let e = 0;
                        if (h.forEach((t => {
                                e += t + (i.spaceBetween ? i.spaceBetween : 0)
                            })), e -= i.spaceBetween, e < r) {
                            const t = (r - e) / 2;
                            p.forEach(((e, n) => {
                                p[n] = e - t
                            })), f.forEach(((e, n) => {
                                f[n] = e + t
                            }))
                        }
                    }
                    if (Object.assign(e, {
                            slides: d,
                            snapGrid: p,
                            slidesGrid: f,
                            slidesSizesGrid: h
                        }), i.centeredSlides && i.cssMode && !i.centeredSlidesBounds) {
                        x(e.wrapperEl, "--swiper-centered-offset-before", -p[0] + "px"), x(e.wrapperEl, "--swiper-centered-offset-after", e.size / 2 - h[h.length - 1] / 2 + "px");
                        const t = -e.snapGrid[0],
                            n = -e.slidesGrid[0];
                        e.snapGrid = e.snapGrid.map((e => e + t)), e.slidesGrid = e.slidesGrid.map((e => e + n))
                    }
                    if (u !== c && e.emit("slidesLengthChange"), p.length !== v && (e.params.watchOverflow && e.checkOverflow(), e.emit("snapGridLengthChange")), f.length !== b && e.emit("slidesGridLengthChange"), i.watchSlidesProgress && e.updateSlidesOffset(), !(l || i.cssMode || "slide" !== i.effect && "fade" !== i.effect)) {
                        const t = `${i.containerModifierClass}backface-hidden`,
                            n = e.$el.hasClass(t);
                        u <= i.maxBackfaceHiddenSlides ? n || e.$el.addClass(t) : n && e.$el.removeClass(t)
                    }
                },
                updateAutoHeight: function (e) {
                    const t = this,
                        n = [],
                        i = t.virtual && t.params.virtual.enabled;
                    let s, r = 0;
                    "number" == typeof e ? t.setTransition(e) : !0 === e && t.setTransition(t.params.speed);
                    const o = e => i ? t.slides.filter((t => parseInt(t.getAttribute("data-swiper-slide-index"), 10) === e))[0] : t.slides.eq(e)[0];
                    if ("auto" !== t.params.slidesPerView && t.params.slidesPerView > 1)
                        if (t.params.centeredSlides)(t.visibleSlides || m([])).each((e => {
                            n.push(e)
                        }));
                        else
                            for (s = 0; s < Math.ceil(t.params.slidesPerView); s += 1) {
                                const e = t.activeIndex + s;
                                if (e > t.slides.length && !i) break;
                                n.push(o(e))
                            } else n.push(o(t.activeIndex));
                    for (s = 0; s < n.length; s += 1)
                        if (void 0 !== n[s]) {
                            const e = n[s].offsetHeight;
                            r = e > r ? e : r
                        }(r || 0 === r) && t.$wrapperEl.css("height", `${r}px`)
                },
                updateSlidesOffset: function () {
                    const e = this,
                        t = e.slides;
                    for (let n = 0; n < t.length; n += 1) t[n].swiperSlideOffset = e.isHorizontal() ? t[n].offsetLeft : t[n].offsetTop
                },
                updateSlidesProgress: function (e) {
                    void 0 === e && (e = this && this.translate || 0);
                    const t = this,
                        n = t.params,
                        {
                            slides: i,
                            rtlTranslate: s,
                            snapGrid: r
                        } = t;
                    if (0 === i.length) return;
                    void 0 === i[0].swiperSlideOffset && t.updateSlidesOffset();
                    let o = -e;
                    s && (o = e), i.removeClass(n.slideVisibleClass), t.visibleSlidesIndexes = [], t.visibleSlides = [];
                    for (let e = 0; e < i.length; e += 1) {
                        const a = i[e];
                        let l = a.swiperSlideOffset;
                        n.cssMode && n.centeredSlides && (l -= i[0].swiperSlideOffset);
                        const c = (o + (n.centeredSlides ? t.minTranslate() : 0) - l) / (a.swiperSlideSize + n.spaceBetween),
                            d = (o - r[0] + (n.centeredSlides ? t.minTranslate() : 0) - l) / (a.swiperSlideSize + n.spaceBetween),
                            u = -(o - l),
                            p = u + t.slidesSizesGrid[e];
                        (u >= 0 && u < t.size - 1 || p > 1 && p <= t.size || u <= 0 && p >= t.size) && (t.visibleSlides.push(a), t.visibleSlidesIndexes.push(e), i.eq(e).addClass(n.slideVisibleClass)), a.progress = s ? -c : c, a.originalProgress = s ? -d : d
                    }
                    t.visibleSlides = m(t.visibleSlides)
                },
                updateProgress: function (e) {
                    const t = this;
                    if (void 0 === e) {
                        const n = t.rtlTranslate ? -1 : 1;
                        e = t && t.translate && t.translate * n || 0
                    }
                    const n = t.params,
                        i = t.maxTranslate() - t.minTranslate();
                    let {
                        progress: s,
                        isBeginning: r,
                        isEnd: o
                    } = t;
                    const a = r,
                        l = o;
                    0 === i ? (s = 0, r = !0, o = !0) : (s = (e - t.minTranslate()) / i, r = s <= 0, o = s >= 1), Object.assign(t, {
                        progress: s,
                        isBeginning: r,
                        isEnd: o
                    }), (n.watchSlidesProgress || n.centeredSlides && n.autoHeight) && t.updateSlidesProgress(e), r && !a && t.emit("reachBeginning toEdge"), o && !l && t.emit("reachEnd toEdge"), (a && !r || l && !o) && t.emit("fromEdge"), t.emit("progress", s)
                },
                updateSlidesClasses: function () {
                    const e = this,
                        {
                            slides: t,
                            params: n,
                            $wrapperEl: i,
                            activeIndex: s,
                            realIndex: r
                        } = e,
                        o = e.virtual && n.virtual.enabled;
                    let a;
                    t.removeClass(`${n.slideActiveClass} ${n.slideNextClass} ${n.slidePrevClass} ${n.slideDuplicateActiveClass} ${n.slideDuplicateNextClass} ${n.slideDuplicatePrevClass}`), a = o ? e.$wrapperEl.find(`.${n.slideClass}[data-swiper-slide-index="${s}"]`) : t.eq(s), a.addClass(n.slideActiveClass), n.loop && (a.hasClass(n.slideDuplicateClass) ? i.children(`.${n.slideClass}:not(.${n.slideDuplicateClass})[data-swiper-slide-index="${r}"]`).addClass(n.slideDuplicateActiveClass) : i.children(`.${n.slideClass}.${n.slideDuplicateClass}[data-swiper-slide-index="${r}"]`).addClass(n.slideDuplicateActiveClass));
                    let l = a.nextAll(`.${n.slideClass}`).eq(0).addClass(n.slideNextClass);
                    n.loop && 0 === l.length && (l = t.eq(0), l.addClass(n.slideNextClass));
                    let c = a.prevAll(`.${n.slideClass}`).eq(0).addClass(n.slidePrevClass);
                    n.loop && 0 === c.length && (c = t.eq(-1), c.addClass(n.slidePrevClass)), n.loop && (l.hasClass(n.slideDuplicateClass) ? i.children(`.${n.slideClass}:not(.${n.slideDuplicateClass})[data-swiper-slide-index="${l.attr("data-swiper-slide-index")}"]`).addClass(n.slideDuplicateNextClass) : i.children(`.${n.slideClass}.${n.slideDuplicateClass}[data-swiper-slide-index="${l.attr("data-swiper-slide-index")}"]`).addClass(n.slideDuplicateNextClass), c.hasClass(n.slideDuplicateClass) ? i.children(`.${n.slideClass}:not(.${n.slideDuplicateClass})[data-swiper-slide-index="${c.attr("data-swiper-slide-index")}"]`).addClass(n.slideDuplicatePrevClass) : i.children(`.${n.slideClass}.${n.slideDuplicateClass}[data-swiper-slide-index="${c.attr("data-swiper-slide-index")}"]`).addClass(n.slideDuplicatePrevClass)), e.emitSlidesClasses()
                },
                updateActiveIndex: function (e) {
                    const t = this,
                        n = t.rtlTranslate ? t.translate : -t.translate,
                        {
                            slidesGrid: i,
                            snapGrid: s,
                            params: r,
                            activeIndex: o,
                            realIndex: a,
                            snapIndex: l
                        } = t;
                    let c, d = e;
                    if (void 0 === d) {
                        for (let e = 0; e < i.length; e += 1) void 0 !== i[e + 1] ? n >= i[e] && n < i[e + 1] - (i[e + 1] - i[e]) / 2 ? d = e : n >= i[e] && n < i[e + 1] && (d = e + 1) : n >= i[e] && (d = e);
                        r.normalizeSlideIndex && (d < 0 || void 0 === d) && (d = 0)
                    }
                    if (s.indexOf(n) >= 0) c = s.indexOf(n);
                    else {
                        const e = Math.min(r.slidesPerGroupSkip, d);
                        c = e + Math.floor((d - e) / r.slidesPerGroup)
                    }
                    if (c >= s.length && (c = s.length - 1), d === o) return void(c !== l && (t.snapIndex = c, t.emit("snapIndexChange")));
                    const u = parseInt(t.slides.eq(d).attr("data-swiper-slide-index") || d, 10);
                    Object.assign(t, {
                        snapIndex: c,
                        realIndex: u,
                        previousIndex: o,
                        activeIndex: d
                    }), t.emit("activeIndexChange"), t.emit("snapIndexChange"), a !== u && t.emit("realIndexChange"), (t.initialized || t.params.runCallbacksOnInit) && t.emit("slideChange")
                },
                updateClickedSlide: function (e) {
                    const t = this,
                        n = t.params,
                        i = m(e).closest(`.${n.slideClass}`)[0];
                    let s, r = !1;
                    if (i)
                        for (let e = 0; e < t.slides.length; e += 1)
                            if (t.slides[e] === i) {
                                r = !0, s = e;
                                break
                            } if (!i || !r) return t.clickedSlide = void 0, void(t.clickedIndex = void 0);
                    t.clickedSlide = i, t.virtual && t.params.virtual.enabled ? t.clickedIndex = parseInt(m(i).attr("data-swiper-slide-index"), 10) : t.clickedIndex = s, n.slideToClickedSlide && void 0 !== t.clickedIndex && t.clickedIndex !== t.activeIndex && t.slideToClickedSlide()
                }
            };

        function L(e) {
            let {
                swiper: t,
                runCallbacks: n,
                direction: i,
                step: s
            } = e;
            const {
                activeIndex: r,
                previousIndex: o
            } = t;
            let a = i;
            if (a || (a = r > o ? "next" : r < o ? "prev" : "reset"), t.emit(`transition${s}`), n && r !== o) {
                if ("reset" === a) return void t.emit(`slideResetTransition${s}`);
                t.emit(`slideChangeTransition${s}`), "next" === a ? t.emit(`slideNextTransition${s}`) : t.emit(`slidePrevTransition${s}`)
            }
        }
        const O = {
                slideTo: function (e, t, n, i, s) {
                    if (void 0 === e && (e = 0), void 0 === t && (t = this.params.speed), void 0 === n && (n = !0), "number" != typeof e && "string" != typeof e) throw new Error(`The 'index' argument cannot have type other than 'number' or 'string'. [${typeof e}] given.`);
                    if ("string" == typeof e) {
                        const t = parseInt(e, 10);
                        if (!isFinite(t)) throw new Error(`The passed-in 'index' (string) couldn't be converted to 'number'. [${e}] given.`);
                        e = t
                    }
                    const r = this;
                    let o = e;
                    o < 0 && (o = 0);
                    const {
                        params: a,
                        snapGrid: l,
                        slidesGrid: c,
                        previousIndex: d,
                        activeIndex: u,
                        rtlTranslate: p,
                        wrapperEl: f,
                        enabled: h
                    } = r;
                    if (r.animating && a.preventInteractionOnTransition || !h && !i && !s) return !1;
                    const m = Math.min(r.params.slidesPerGroupSkip, o);
                    let g = m + Math.floor((o - m) / r.params.slidesPerGroup);
                    g >= l.length && (g = l.length - 1), (u || a.initialSlide || 0) === (d || 0) && n && r.emit("beforeSlideChangeStart");
                    const v = -l[g];
                    if (r.updateProgress(v), a.normalizeSlideIndex)
                        for (let e = 0; e < c.length; e += 1) {
                            const t = -Math.floor(100 * v),
                                n = Math.floor(100 * c[e]),
                                i = Math.floor(100 * c[e + 1]);
                            void 0 !== c[e + 1] ? t >= n && t < i - (i - n) / 2 ? o = e : t >= n && t < i && (o = e + 1) : t >= n && (o = e)
                        }
                    if (r.initialized && o !== u) {
                        if (!r.allowSlideNext && v < r.translate && v < r.minTranslate()) return !1;
                        if (!r.allowSlidePrev && v > r.translate && v > r.maxTranslate() && (u || 0) !== o) return !1
                    }
                    let b;
                    if (b = o > u ? "next" : o < u ? "prev" : "reset", p && -v === r.translate || !p && v === r.translate) return r.updateActiveIndex(o), a.autoHeight && r.updateAutoHeight(), r.updateSlidesClasses(), "slide" !== a.effect && r.setTranslate(v), "reset" !== b && (r.transitionStart(n, b), r.transitionEnd(n, b)), !1;
                    if (a.cssMode) {
                        const e = r.isHorizontal(),
                            n = p ? v : -v;
                        if (0 === t) {
                            const t = r.virtual && r.params.virtual.enabled;
                            t && (r.wrapperEl.style.scrollSnapType = "none", r._immediateVirtual = !0), f[e ? "scrollLeft" : "scrollTop"] = n, t && requestAnimationFrame((() => {
                                r.wrapperEl.style.scrollSnapType = "", r._swiperImmediateVirtual = !1
                            }))
                        } else {
                            if (!r.support.smoothScroll) return _({
                                swiper: r,
                                targetPosition: n,
                                side: e ? "left" : "top"
                            }), !0;
                            f.scrollTo({
                                [e ? "left" : "top"]: n,
                                behavior: "smooth"
                            })
                        }
                        return !0
                    }
                    return r.setTransition(t), r.setTranslate(v), r.updateActiveIndex(o), r.updateSlidesClasses(), r.emit("beforeTransitionStart", t, i), r.transitionStart(n, b), 0 === t ? r.transitionEnd(n, b) : r.animating || (r.animating = !0, r.onSlideToWrapperTransitionEnd || (r.onSlideToWrapperTransitionEnd = function (e) {
                        r && !r.destroyed && e.target === this && (r.$wrapperEl[0].removeEventListener("transitionend", r.onSlideToWrapperTransitionEnd), r.$wrapperEl[0].removeEventListener("webkitTransitionEnd", r.onSlideToWrapperTransitionEnd), r.onSlideToWrapperTransitionEnd = null, delete r.onSlideToWrapperTransitionEnd, r.transitionEnd(n, b))
                    }), r.$wrapperEl[0].addEventListener("transitionend", r.onSlideToWrapperTransitionEnd), r.$wrapperEl[0].addEventListener("webkitTransitionEnd", r.onSlideToWrapperTransitionEnd)), !0
                },
                slideToLoop: function (e, t, n, i) {
                    if (void 0 === e && (e = 0), void 0 === t && (t = this.params.speed), void 0 === n && (n = !0), "string" == typeof e) {
                        const t = parseInt(e, 10);
                        if (!isFinite(t)) throw new Error(`The passed-in 'index' (string) couldn't be converted to 'number'. [${e}] given.`);
                        e = t
                    }
                    const s = this;
                    let r = e;
                    return s.params.loop && (r += s.loopedSlides), s.slideTo(r, t, n, i)
                },
                slideNext: function (e, t, n) {
                    void 0 === e && (e = this.params.speed), void 0 === t && (t = !0);
                    const i = this,
                        {
                            animating: s,
                            enabled: r,
                            params: o
                        } = i;
                    if (!r) return i;
                    let a = o.slidesPerGroup;
                    "auto" === o.slidesPerView && 1 === o.slidesPerGroup && o.slidesPerGroupAuto && (a = Math.max(i.slidesPerViewDynamic("current", !0), 1));
                    const l = i.activeIndex < o.slidesPerGroupSkip ? 1 : a;
                    if (o.loop) {
                        if (s && o.loopPreventsSlide) return !1;
                        i.loopFix(), i._clientLeft = i.$wrapperEl[0].clientLeft
                    }
                    return o.rewind && i.isEnd ? i.slideTo(0, e, t, n) : i.slideTo(i.activeIndex + l, e, t, n)
                },
                slidePrev: function (e, t, n) {
                    void 0 === e && (e = this.params.speed), void 0 === t && (t = !0);
                    const i = this,
                        {
                            params: s,
                            animating: r,
                            snapGrid: o,
                            slidesGrid: a,
                            rtlTranslate: l,
                            enabled: c
                        } = i;
                    if (!c) return i;
                    if (s.loop) {
                        if (r && s.loopPreventsSlide) return !1;
                        i.loopFix(), i._clientLeft = i.$wrapperEl[0].clientLeft
                    }

                    function d(e) {
                        return e < 0 ? -Math.floor(Math.abs(e)) : Math.floor(e)
                    }
                    const u = d(l ? i.translate : -i.translate),
                        p = o.map((e => d(e)));
                    let f = o[p.indexOf(u) - 1];
                    if (void 0 === f && s.cssMode) {
                        let e;
                        o.forEach(((t, n) => {
                            u >= t && (e = n)
                        })), void 0 !== e && (f = o[e > 0 ? e - 1 : e])
                    }
                    let h = 0;
                    if (void 0 !== f && (h = a.indexOf(f), h < 0 && (h = i.activeIndex - 1), "auto" === s.slidesPerView && 1 === s.slidesPerGroup && s.slidesPerGroupAuto && (h = h - i.slidesPerViewDynamic("previous", !0) + 1, h = Math.max(h, 0))), s.rewind && i.isBeginning) {
                        const s = i.params.virtual && i.params.virtual.enabled && i.virtual ? i.virtual.slides.length - 1 : i.slides.length - 1;
                        return i.slideTo(s, e, t, n)
                    }
                    return i.slideTo(h, e, t, n)
                },
                slideReset: function (e, t, n) {
                    return void 0 === e && (e = this.params.speed), void 0 === t && (t = !0), this.slideTo(this.activeIndex, e, t, n)
                },
                slideToClosest: function (e, t, n, i) {
                    void 0 === e && (e = this.params.speed), void 0 === t && (t = !0), void 0 === i && (i = .5);
                    const s = this;
                    let r = s.activeIndex;
                    const o = Math.min(s.params.slidesPerGroupSkip, r),
                        a = o + Math.floor((r - o) / s.params.slidesPerGroup),
                        l = s.rtlTranslate ? s.translate : -s.translate;
                    if (l >= s.snapGrid[a]) {
                        const e = s.snapGrid[a];
                        l - e > (s.snapGrid[a + 1] - e) * i && (r += s.params.slidesPerGroup)
                    } else {
                        const e = s.snapGrid[a - 1];
                        l - e <= (s.snapGrid[a] - e) * i && (r -= s.params.slidesPerGroup)
                    }
                    return r = Math.max(r, 0), r = Math.min(r, s.slidesGrid.length - 1), s.slideTo(r, e, t, n)
                },
                slideToClickedSlide: function () {
                    const e = this,
                        {
                            params: t,
                            $wrapperEl: n
                        } = e,
                        i = "auto" === t.slidesPerView ? e.slidesPerViewDynamic() : t.slidesPerView;
                    let s, r = e.clickedIndex;
                    if (t.loop) {
                        if (e.animating) return;
                        s = parseInt(m(e.clickedSlide).attr("data-swiper-slide-index"), 10), t.centeredSlides ? r < e.loopedSlides - i / 2 || r > e.slides.length - e.loopedSlides + i / 2 ? (e.loopFix(), r = n.children(`.${t.slideClass}[data-swiper-slide-index="${s}"]:not(.${t.slideDuplicateClass})`).eq(0).index(), g((() => {
                            e.slideTo(r)
                        }))) : e.slideTo(r) : r > e.slides.length - i ? (e.loopFix(), r = n.children(`.${t.slideClass}[data-swiper-slide-index="${s}"]:not(.${t.slideDuplicateClass})`).eq(0).index(), g((() => {
                            e.slideTo(r)
                        }))) : e.slideTo(r)
                    } else e.slideTo(r)
                }
            },
            P = {
                loopCreate: function () {
                    const e = this,
                        t = r(),
                        {
                            params: n,
                            $wrapperEl: i
                        } = e,
                        s = i.children().length > 0 ? m(i.children()[0].parentNode) : i;
                    s.children(`.${n.slideClass}.${n.slideDuplicateClass}`).remove();
                    let o = s.children(`.${n.slideClass}`);
                    if (n.loopFillGroupWithBlank) {
                        const e = n.slidesPerGroup - o.length % n.slidesPerGroup;
                        if (e !== n.slidesPerGroup) {
                            for (let i = 0; i < e; i += 1) {
                                const e = m(t.createElement("div")).addClass(`${n.slideClass} ${n.slideBlankClass}`);
                                s.append(e)
                            }
                            o = s.children(`.${n.slideClass}`)
                        }
                    }
                    "auto" !== n.slidesPerView || n.loopedSlides || (n.loopedSlides = o.length), e.loopedSlides = Math.ceil(parseFloat(n.loopedSlides || n.slidesPerView, 10)), e.loopedSlides += n.loopAdditionalSlides, e.loopedSlides > o.length && (e.loopedSlides = o.length);
                    const a = [],
                        l = [];
                    o.each(((t, n) => {
                        const i = m(t);
                        n < e.loopedSlides && l.push(t), n < o.length && n >= o.length - e.loopedSlides && a.push(t), i.attr("data-swiper-slide-index", n)
                    }));
                    for (let e = 0; e < l.length; e += 1) s.append(m(l[e].cloneNode(!0)).addClass(n.slideDuplicateClass));
                    for (let e = a.length - 1; e >= 0; e -= 1) s.prepend(m(a[e].cloneNode(!0)).addClass(n.slideDuplicateClass))
                },
                loopFix: function () {
                    const e = this;
                    e.emit("beforeLoopFix");
                    const {
                        activeIndex: t,
                        slides: n,
                        loopedSlides: i,
                        allowSlidePrev: s,
                        allowSlideNext: r,
                        snapGrid: o,
                        rtlTranslate: a
                    } = e;
                    let l;
                    e.allowSlidePrev = !0, e.allowSlideNext = !0;
                    const c = -o[t] - e.getTranslate();
                    t < i ? (l = n.length - 3 * i + t, l += i, e.slideTo(l, 0, !1, !0) && 0 !== c && e.setTranslate((a ? -e.translate : e.translate) - c)) : t >= n.length - i && (l = -n.length + t + i, l += i, e.slideTo(l, 0, !1, !0) && 0 !== c && e.setTranslate((a ? -e.translate : e.translate) - c)), e.allowSlidePrev = s, e.allowSlideNext = r, e.emit("loopFix")
                },
                loopDestroy: function () {
                    const {
                        $wrapperEl: e,
                        params: t,
                        slides: n
                    } = this;
                    e.children(`.${t.slideClass}.${t.slideDuplicateClass},.${t.slideClass}.${t.slideBlankClass}`).remove(), n.removeAttr("data-swiper-slide-index")
                }
            };

        function D(e) {
            const t = this,
                n = r(),
                i = a(),
                s = t.touchEventsData,
                {
                    params: o,
                    touches: l,
                    enabled: c
                } = t;
            if (!c) return;
            if (t.animating && o.preventInteractionOnTransition) return;
            !t.animating && o.cssMode && o.loop && t.loopFix();
            let d = e;
            d.originalEvent && (d = d.originalEvent);
            let u = m(d.target);
            if ("wrapper" === o.touchEventsTarget && !u.closest(t.wrapperEl).length) return;
            if (s.isTouchEvent = "touchstart" === d.type, !s.isTouchEvent && "which" in d && 3 === d.which) return;
            if (!s.isTouchEvent && "button" in d && d.button > 0) return;
            if (s.isTouched && s.isMoved) return;
            o.noSwipingClass && "" !== o.noSwipingClass && d.target && d.target.shadowRoot && e.path && e.path[0] && (u = m(e.path[0]));
            const p = o.noSwipingSelector ? o.noSwipingSelector : `.${o.noSwipingClass}`,
                f = !(!d.target || !d.target.shadowRoot);
            if (o.noSwiping && (f ? function (e, t) {
                    return void 0 === t && (t = this),
                        function t(n) {
                            if (!n || n === r() || n === a()) return null;
                            n.assignedSlot && (n = n.assignedSlot);
                            const i = n.closest(e);
                            return i || n.getRootNode ? i || t(n.getRootNode().host) : null
                        }(t)
                }(p, u[0]) : u.closest(p)[0])) return void(t.allowClick = !0);
            if (o.swipeHandler && !u.closest(o.swipeHandler)[0]) return;
            l.currentX = "touchstart" === d.type ? d.targetTouches[0].pageX : d.pageX, l.currentY = "touchstart" === d.type ? d.targetTouches[0].pageY : d.pageY;
            const h = l.currentX,
                g = l.currentY,
                b = o.edgeSwipeDetection || o.iOSEdgeSwipeDetection,
                y = o.edgeSwipeThreshold || o.iOSEdgeSwipeThreshold;
            if (b && (h <= y || h >= i.innerWidth - y)) {
                if ("prevent" !== b) return;
                e.preventDefault()
            }
            if (Object.assign(s, {
                    isTouched: !0,
                    isMoved: !1,
                    allowTouchCallbacks: !0,
                    isScrolling: void 0,
                    startMoving: void 0
                }), l.startX = h, l.startY = g, s.touchStartTime = v(), t.allowClick = !0, t.updateSize(), t.swipeDirection = void 0, o.threshold > 0 && (s.allowThresholdMove = !1), "touchstart" !== d.type) {
                let e = !0;
                u.is(s.focusableElements) && (e = !1, "SELECT" === u[0].nodeName && (s.isTouched = !1)), n.activeElement && m(n.activeElement).is(s.focusableElements) && n.activeElement !== u[0] && n.activeElement.blur();
                const i = e && t.allowTouchMove && o.touchStartPreventDefault;
                !o.touchStartForcePreventDefault && !i || u[0].isContentEditable || d.preventDefault()
            }
            t.params.freeMode && t.params.freeMode.enabled && t.freeMode && t.animating && !o.cssMode && t.freeMode.onTouchStart(), t.emit("touchStart", d)
        }

        function M(e) {
            const t = r(),
                n = this,
                i = n.touchEventsData,
                {
                    params: s,
                    touches: o,
                    rtlTranslate: a,
                    enabled: l
                } = n;
            if (!l) return;
            let c = e;
            if (c.originalEvent && (c = c.originalEvent), !i.isTouched) return void(i.startMoving && i.isScrolling && n.emit("touchMoveOpposite", c));
            if (i.isTouchEvent && "touchmove" !== c.type) return;
            const d = "touchmove" === c.type && c.targetTouches && (c.targetTouches[0] || c.changedTouches[0]),
                u = "touchmove" === c.type ? d.pageX : c.pageX,
                p = "touchmove" === c.type ? d.pageY : c.pageY;
            if (c.preventedByNestedSwiper) return o.startX = u, void(o.startY = p);
            if (!n.allowTouchMove) return m(c.target).is(i.focusableElements) || (n.allowClick = !1), void(i.isTouched && (Object.assign(o, {
                startX: u,
                startY: p,
                currentX: u,
                currentY: p
            }), i.touchStartTime = v()));
            if (i.isTouchEvent && s.touchReleaseOnEdges && !s.loop)
                if (n.isVertical()) {
                    if (p < o.startY && n.translate <= n.maxTranslate() || p > o.startY && n.translate >= n.minTranslate()) return i.isTouched = !1, void(i.isMoved = !1)
                } else if (u < o.startX && n.translate <= n.maxTranslate() || u > o.startX && n.translate >= n.minTranslate()) return;
            if (i.isTouchEvent && t.activeElement && c.target === t.activeElement && m(c.target).is(i.focusableElements)) return i.isMoved = !0, void(n.allowClick = !1);
            if (i.allowTouchCallbacks && n.emit("touchMove", c), c.targetTouches && c.targetTouches.length > 1) return;
            o.currentX = u, o.currentY = p;
            const f = o.currentX - o.startX,
                h = o.currentY - o.startY;
            if (n.params.threshold && Math.sqrt(f ** 2 + h ** 2) < n.params.threshold) return;
            if (void 0 === i.isScrolling) {
                let e;
                n.isHorizontal() && o.currentY === o.startY || n.isVertical() && o.currentX === o.startX ? i.isScrolling = !1 : f * f + h * h >= 25 && (e = 180 * Math.atan2(Math.abs(h), Math.abs(f)) / Math.PI, i.isScrolling = n.isHorizontal() ? e > s.touchAngle : 90 - e > s.touchAngle)
            }
            if (i.isScrolling && n.emit("touchMoveOpposite", c), void 0 === i.startMoving && (o.currentX === o.startX && o.currentY === o.startY || (i.startMoving = !0)), i.isScrolling) return void(i.isTouched = !1);
            if (!i.startMoving) return;
            n.allowClick = !1, !s.cssMode && c.cancelable && c.preventDefault(), s.touchMoveStopPropagation && !s.nested && c.stopPropagation(), i.isMoved || (s.loop && !s.cssMode && n.loopFix(), i.startTranslate = n.getTranslate(), n.setTransition(0), n.animating && n.$wrapperEl.trigger("webkitTransitionEnd transitionend"), i.allowMomentumBounce = !1, !s.grabCursor || !0 !== n.allowSlideNext && !0 !== n.allowSlidePrev || n.setGrabCursor(!0), n.emit("sliderFirstMove", c)), n.emit("sliderMove", c), i.isMoved = !0;
            let g = n.isHorizontal() ? f : h;
            o.diff = g, g *= s.touchRatio, a && (g = -g), n.swipeDirection = g > 0 ? "prev" : "next", i.currentTranslate = g + i.startTranslate;
            let b = !0,
                y = s.resistanceRatio;
            if (s.touchReleaseOnEdges && (y = 0), g > 0 && i.currentTranslate > n.minTranslate() ? (b = !1, s.resistance && (i.currentTranslate = n.minTranslate() - 1 + (-n.minTranslate() + i.startTranslate + g) ** y)) : g < 0 && i.currentTranslate < n.maxTranslate() && (b = !1, s.resistance && (i.currentTranslate = n.maxTranslate() + 1 - (n.maxTranslate() - i.startTranslate - g) ** y)), b && (c.preventedByNestedSwiper = !0), !n.allowSlideNext && "next" === n.swipeDirection && i.currentTranslate < i.startTranslate && (i.currentTranslate = i.startTranslate), !n.allowSlidePrev && "prev" === n.swipeDirection && i.currentTranslate > i.startTranslate && (i.currentTranslate = i.startTranslate), n.allowSlidePrev || n.allowSlideNext || (i.currentTranslate = i.startTranslate), s.threshold > 0) {
                if (!(Math.abs(g) > s.threshold || i.allowThresholdMove)) return void(i.currentTranslate = i.startTranslate);
                if (!i.allowThresholdMove) return i.allowThresholdMove = !0, o.startX = o.currentX, o.startY = o.currentY, i.currentTranslate = i.startTranslate, void(o.diff = n.isHorizontal() ? o.currentX - o.startX : o.currentY - o.startY)
            }
            s.followFinger && !s.cssMode && ((s.freeMode && s.freeMode.enabled && n.freeMode || s.watchSlidesProgress) && (n.updateActiveIndex(), n.updateSlidesClasses()), n.params.freeMode && s.freeMode.enabled && n.freeMode && n.freeMode.onTouchMove(), n.updateProgress(i.currentTranslate), n.setTranslate(i.currentTranslate))
        }

        function N(e) {
            const t = this,
                n = t.touchEventsData,
                {
                    params: i,
                    touches: s,
                    rtlTranslate: r,
                    slidesGrid: o,
                    enabled: a
                } = t;
            if (!a) return;
            let l = e;
            if (l.originalEvent && (l = l.originalEvent), n.allowTouchCallbacks && t.emit("touchEnd", l), n.allowTouchCallbacks = !1, !n.isTouched) return n.isMoved && i.grabCursor && t.setGrabCursor(!1), n.isMoved = !1, void(n.startMoving = !1);
            i.grabCursor && n.isMoved && n.isTouched && (!0 === t.allowSlideNext || !0 === t.allowSlidePrev) && t.setGrabCursor(!1);
            const c = v(),
                d = c - n.touchStartTime;
            if (t.allowClick) {
                const e = l.path || l.composedPath && l.composedPath();
                t.updateClickedSlide(e && e[0] || l.target), t.emit("tap click", l), d < 300 && c - n.lastClickTime < 300 && t.emit("doubleTap doubleClick", l)
            }
            if (n.lastClickTime = v(), g((() => {
                    t.destroyed || (t.allowClick = !0)
                })), !n.isTouched || !n.isMoved || !t.swipeDirection || 0 === s.diff || n.currentTranslate === n.startTranslate) return n.isTouched = !1, n.isMoved = !1, void(n.startMoving = !1);
            let u;
            if (n.isTouched = !1, n.isMoved = !1, n.startMoving = !1, u = i.followFinger ? r ? t.translate : -t.translate : -n.currentTranslate, i.cssMode) return;
            if (t.params.freeMode && i.freeMode.enabled) return void t.freeMode.onTouchEnd({
                currentPos: u
            });
            let p = 0,
                f = t.slidesSizesGrid[0];
            for (let e = 0; e < o.length; e += e < i.slidesPerGroupSkip ? 1 : i.slidesPerGroup) {
                const t = e < i.slidesPerGroupSkip - 1 ? 1 : i.slidesPerGroup;
                void 0 !== o[e + t] ? u >= o[e] && u < o[e + t] && (p = e, f = o[e + t] - o[e]) : u >= o[e] && (p = e, f = o[o.length - 1] - o[o.length - 2])
            }
            let h = null,
                m = null;
            i.rewind && (t.isBeginning ? m = t.params.virtual && t.params.virtual.enabled && t.virtual ? t.virtual.slides.length - 1 : t.slides.length - 1 : t.isEnd && (h = 0));
            const b = (u - o[p]) / f,
                y = p < i.slidesPerGroupSkip - 1 ? 1 : i.slidesPerGroup;
            if (d > i.longSwipesMs) {
                if (!i.longSwipes) return void t.slideTo(t.activeIndex);
                "next" === t.swipeDirection && (b >= i.longSwipesRatio ? t.slideTo(i.rewind && t.isEnd ? h : p + y) : t.slideTo(p)), "prev" === t.swipeDirection && (b > 1 - i.longSwipesRatio ? t.slideTo(p + y) : null !== m && b < 0 && Math.abs(b) > i.longSwipesRatio ? t.slideTo(m) : t.slideTo(p))
            } else {
                if (!i.shortSwipes) return void t.slideTo(t.activeIndex);
                !t.navigation || l.target !== t.navigation.nextEl && l.target !== t.navigation.prevEl ? ("next" === t.swipeDirection && t.slideTo(null !== h ? h : p + y), "prev" === t.swipeDirection && t.slideTo(null !== m ? m : p)) : l.target === t.navigation.nextEl ? t.slideTo(p + y) : t.slideTo(p)
            }
        }

        function I() {
            const e = this,
                {
                    params: t,
                    el: n
                } = e;
            if (n && 0 === n.offsetWidth) return;
            t.breakpoints && e.setBreakpoint();
            const {
                allowSlideNext: i,
                allowSlidePrev: s,
                snapGrid: r
            } = e;
            e.allowSlideNext = !0, e.allowSlidePrev = !0, e.updateSize(), e.updateSlides(), e.updateSlidesClasses(), ("auto" === t.slidesPerView || t.slidesPerView > 1) && e.isEnd && !e.isBeginning && !e.params.centeredSlides ? e.slideTo(e.slides.length - 1, 0, !1, !0) : e.slideTo(e.activeIndex, 0, !1, !0), e.autoplay && e.autoplay.running && e.autoplay.paused && e.autoplay.run(), e.allowSlidePrev = s, e.allowSlideNext = i, e.params.watchOverflow && r !== e.snapGrid && e.checkOverflow()
        }

        function j(e) {
            const t = this;
            t.enabled && (t.allowClick || (t.params.preventClicks && e.preventDefault(), t.params.preventClicksPropagation && t.animating && (e.stopPropagation(), e.stopImmediatePropagation())))
        }

        function $() {
            const e = this,
                {
                    wrapperEl: t,
                    rtlTranslate: n,
                    enabled: i
                } = e;
            if (!i) return;
            let s;
            e.previousTranslate = e.translate, e.isHorizontal() ? e.translate = -t.scrollLeft : e.translate = -t.scrollTop, 0 === e.translate && (e.translate = 0), e.updateActiveIndex(), e.updateSlidesClasses();
            const r = e.maxTranslate() - e.minTranslate();
            s = 0 === r ? 0 : (e.translate - e.minTranslate()) / r, s !== e.progress && e.updateProgress(n ? -e.translate : e.translate), e.emit("setTranslate", e.translate, !1)
        }
        let z = !1;

        function H() {}
        const F = (e, t) => {
                const n = r(),
                    {
                        params: i,
                        touchEvents: s,
                        el: o,
                        wrapperEl: a,
                        device: l,
                        support: c
                    } = e,
                    d = !!i.nested,
                    u = "on" === t ? "addEventListener" : "removeEventListener",
                    p = t;
                if (c.touch) {
                    const t = !("touchstart" !== s.start || !c.passiveListener || !i.passiveListeners) && {
                        passive: !0,
                        capture: !1
                    };
                    o[u](s.start, e.onTouchStart, t), o[u](s.move, e.onTouchMove, c.passiveListener ? {
                        passive: !1,
                        capture: d
                    } : d), o[u](s.end, e.onTouchEnd, t), s.cancel && o[u](s.cancel, e.onTouchEnd, t)
                } else o[u](s.start, e.onTouchStart, !1), n[u](s.move, e.onTouchMove, d), n[u](s.end, e.onTouchEnd, !1);
                (i.preventClicks || i.preventClicksPropagation) && o[u]("click", e.onClick, !0), i.cssMode && a[u]("scroll", e.onScroll), i.updateOnWindowResize ? e[p](l.ios || l.android ? "resize orientationchange observerUpdate" : "resize observerUpdate", I, !0) : e[p]("observerUpdate", I, !0)
            },
            B = {
                attachEvents: function () {
                    const e = this,
                        t = r(),
                        {
                            params: n,
                            support: i
                        } = e;
                    e.onTouchStart = D.bind(e), e.onTouchMove = M.bind(e), e.onTouchEnd = N.bind(e), n.cssMode && (e.onScroll = $.bind(e)), e.onClick = j.bind(e), i.touch && !z && (t.addEventListener("touchstart", H), z = !0), F(e, "on")
                },
                detachEvents: function () {
                    F(this, "off")
                }
            },
            q = (e, t) => e.grid && t.grid && t.grid.rows > 1,
            R = {
                addClasses: function () {
                    const e = this,
                        {
                            classNames: t,
                            params: n,
                            rtl: i,
                            $el: s,
                            device: r,
                            support: o
                        } = e,
                        a = function (e, t) {
                            const n = [];
                            return e.forEach((e => {
                                "object" == typeof e ? Object.keys(e).forEach((i => {
                                    e[i] && n.push(t + i)
                                })) : "string" == typeof e && n.push(t + e)
                            })), n
                        }(["initialized", n.direction, {
                            "pointer-events": !o.touch
                        }, {
                            "free-mode": e.params.freeMode && n.freeMode.enabled
                        }, {
                            autoheight: n.autoHeight
                        }, {
                            rtl: i
                        }, {
                            grid: n.grid && n.grid.rows > 1
                        }, {
                            "grid-column": n.grid && n.grid.rows > 1 && "column" === n.grid.fill
                        }, {
                            android: r.android
                        }, {
                            ios: r.ios
                        }, {
                            "css-mode": n.cssMode
                        }, {
                            centered: n.cssMode && n.centeredSlides
                        }, {
                            "watch-progress": n.watchSlidesProgress
                        }], n.containerModifierClass);
                    t.push(...a), s.addClass([...t].join(" ")), e.emitContainerClasses()
                },
                removeClasses: function () {
                    const {
                        $el: e,
                        classNames: t
                    } = this;
                    e.removeClass(t.join(" ")), this.emitContainerClasses()
                }
            },
            V = {
                init: !0,
                direction: "horizontal",
                touchEventsTarget: "wrapper",
                initialSlide: 0,
                speed: 300,
                cssMode: !1,
                updateOnWindowResize: !0,
                resizeObserver: !0,
                nested: !1,
                createElements: !1,
                enabled: !0,
                focusableElements: "input, select, option, textarea, button, video, label",
                width: null,
                height: null,
                preventInteractionOnTransition: !1,
                userAgent: null,
                url: null,
                edgeSwipeDetection: !1,
                edgeSwipeThreshold: 20,
                autoHeight: !1,
                setWrapperSize: !1,
                virtualTranslate: !1,
                effect: "slide",
                breakpoints: void 0,
                breakpointsBase: "window",
                spaceBetween: 0,
                slidesPerView: 1,
                slidesPerGroup: 1,
                slidesPerGroupSkip: 0,
                slidesPerGroupAuto: !1,
                centeredSlides: !1,
                centeredSlidesBounds: !1,
                slidesOffsetBefore: 0,
                slidesOffsetAfter: 0,
                normalizeSlideIndex: !0,
                centerInsufficientSlides: !1,
                watchOverflow: !0,
                roundLengths: !1,
                touchRatio: 1,
                touchAngle: 45,
                simulateTouch: !0,
                shortSwipes: !0,
                longSwipes: !0,
                longSwipesRatio: .5,
                longSwipesMs: 300,
                followFinger: !0,
                allowTouchMove: !0,
                threshold: 0,
                touchMoveStopPropagation: !1,
                touchStartPreventDefault: !0,
                touchStartForcePreventDefault: !1,
                touchReleaseOnEdges: !1,
                uniqueNavElements: !0,
                resistance: !0,
                resistanceRatio: .85,
                watchSlidesProgress: !1,
                grabCursor: !1,
                preventClicks: !0,
                preventClicksPropagation: !0,
                slideToClickedSlide: !1,
                preloadImages: !0,
                updateOnImagesReady: !0,
                loop: !1,
                loopAdditionalSlides: 0,
                loopedSlides: null,
                loopFillGroupWithBlank: !1,
                loopPreventsSlide: !0,
                rewind: !1,
                allowSlidePrev: !0,
                allowSlideNext: !0,
                swipeHandler: null,
                noSwiping: !0,
                noSwipingClass: "swiper-no-swiping",
                noSwipingSelector: null,
                passiveListeners: !0,
                maxBackfaceHiddenSlides: 10,
                containerModifierClass: "swiper-",
                slideClass: "swiper-slide",
                slideBlankClass: "swiper-slide-invisible-blank",
                slideActiveClass: "swiper-slide-active",
                slideDuplicateActiveClass: "swiper-slide-duplicate-active",
                slideVisibleClass: "swiper-slide-visible",
                slideDuplicateClass: "swiper-slide-duplicate",
                slideNextClass: "swiper-slide-next",
                slideDuplicateNextClass: "swiper-slide-duplicate-next",
                slidePrevClass: "swiper-slide-prev",
                slideDuplicatePrevClass: "swiper-slide-duplicate-prev",
                wrapperClass: "swiper-wrapper",
                runCallbacksOnInit: !0,
                _emitClasses: !1
            };

        function W(e, t) {
            return function (n) {
                void 0 === n && (n = {});
                const i = Object.keys(n)[0],
                    s = n[i];
                "object" == typeof s && null !== s ? (["navigation", "pagination", "scrollbar"].indexOf(i) >= 0 && !0 === e[i] && (e[i] = {
                    auto: !0
                }), i in e && "enabled" in s ? (!0 === e[i] && (e[i] = {
                    enabled: !0
                }), "object" != typeof e[i] || "enabled" in e[i] || (e[i].enabled = !0), e[i] || (e[i] = {
                    enabled: !1
                }), w(t, n)) : w(t, n)) : w(t, n)
            }
        }
        const G = {
                eventsEmitter: k,
                update: A,
                translate: {
                    getTranslate: function (e) {
                        void 0 === e && (e = this.isHorizontal() ? "x" : "y");
                        const {
                            params: t,
                            rtlTranslate: n,
                            translate: i,
                            $wrapperEl: s
                        } = this;
                        if (t.virtualTranslate) return n ? -i : i;
                        if (t.cssMode) return i;
                        let r = function (e, t) {
                            void 0 === t && (t = "x");
                            const n = a();
                            let i, s, r;
                            const o = function (e) {
                                const t = a();
                                let n;
                                return t.getComputedStyle && (n = t.getComputedStyle(e, null)), !n && e.currentStyle && (n = e.currentStyle), n || (n = e.style), n
                            }(e);
                            return n.WebKitCSSMatrix ? (s = o.transform || o.webkitTransform, s.split(",").length > 6 && (s = s.split(", ").map((e => e.replace(",", "."))).join(", ")), r = new n.WebKitCSSMatrix("none" === s ? "" : s)) : (r = o.MozTransform || o.OTransform || o.MsTransform || o.msTransform || o.transform || o.getPropertyValue("transform").replace("translate(", "matrix(1, 0, 0, 1,"), i = r.toString().split(",")), "x" === t && (s = n.WebKitCSSMatrix ? r.m41 : 16 === i.length ? parseFloat(i[12]) : parseFloat(i[4])), "y" === t && (s = n.WebKitCSSMatrix ? r.m42 : 16 === i.length ? parseFloat(i[13]) : parseFloat(i[5])), s || 0
                        }(s[0], e);
                        return n && (r = -r), r || 0
                    },
                    setTranslate: function (e, t) {
                        const n = this,
                            {
                                rtlTranslate: i,
                                params: s,
                                $wrapperEl: r,
                                wrapperEl: o,
                                progress: a
                            } = n;
                        let l, c = 0,
                            d = 0;
                        n.isHorizontal() ? c = i ? -e : e : d = e, s.roundLengths && (c = Math.floor(c), d = Math.floor(d)), s.cssMode ? o[n.isHorizontal() ? "scrollLeft" : "scrollTop"] = n.isHorizontal() ? -c : -d : s.virtualTranslate || r.transform(`translate3d(${c}px, ${d}px, 0px)`), n.previousTranslate = n.translate, n.translate = n.isHorizontal() ? c : d;
                        const u = n.maxTranslate() - n.minTranslate();
                        l = 0 === u ? 0 : (e - n.minTranslate()) / u, l !== a && n.updateProgress(e), n.emit("setTranslate", n.translate, t)
                    },
                    minTranslate: function () {
                        return -this.snapGrid[0]
                    },
                    maxTranslate: function () {
                        return -this.snapGrid[this.snapGrid.length - 1]
                    },
                    translateTo: function (e, t, n, i, s) {
                        void 0 === e && (e = 0), void 0 === t && (t = this.params.speed), void 0 === n && (n = !0), void 0 === i && (i = !0);
                        const r = this,
                            {
                                params: o,
                                wrapperEl: a
                            } = r;
                        if (r.animating && o.preventInteractionOnTransition) return !1;
                        const l = r.minTranslate(),
                            c = r.maxTranslate();
                        let d;
                        if (d = i && e > l ? l : i && e < c ? c : e, r.updateProgress(d), o.cssMode) {
                            const e = r.isHorizontal();
                            if (0 === t) a[e ? "scrollLeft" : "scrollTop"] = -d;
                            else {
                                if (!r.support.smoothScroll) return _({
                                    swiper: r,
                                    targetPosition: -d,
                                    side: e ? "left" : "top"
                                }), !0;
                                a.scrollTo({
                                    [e ? "left" : "top"]: -d,
                                    behavior: "smooth"
                                })
                            }
                            return !0
                        }
                        return 0 === t ? (r.setTransition(0), r.setTranslate(d), n && (r.emit("beforeTransitionStart", t, s), r.emit("transitionEnd"))) : (r.setTransition(t), r.setTranslate(d), n && (r.emit("beforeTransitionStart", t, s), r.emit("transitionStart")), r.animating || (r.animating = !0, r.onTranslateToWrapperTransitionEnd || (r.onTranslateToWrapperTransitionEnd = function (e) {
                            r && !r.destroyed && e.target === this && (r.$wrapperEl[0].removeEventListener("transitionend", r.onTranslateToWrapperTransitionEnd), r.$wrapperEl[0].removeEventListener("webkitTransitionEnd", r.onTranslateToWrapperTransitionEnd), r.onTranslateToWrapperTransitionEnd = null, delete r.onTranslateToWrapperTransitionEnd, n && r.emit("transitionEnd"))
                        }), r.$wrapperEl[0].addEventListener("transitionend", r.onTranslateToWrapperTransitionEnd), r.$wrapperEl[0].addEventListener("webkitTransitionEnd", r.onTranslateToWrapperTransitionEnd))), !0
                    }
                },
                transition: {
                    setTransition: function (e, t) {
                        const n = this;
                        n.params.cssMode || n.$wrapperEl.transition(e), n.emit("setTransition", e, t)
                    },
                    transitionStart: function (e, t) {
                        void 0 === e && (e = !0);
                        const n = this,
                            {
                                params: i
                            } = n;
                        i.cssMode || (i.autoHeight && n.updateAutoHeight(), L({
                            swiper: n,
                            runCallbacks: e,
                            direction: t,
                            step: "Start"
                        }))
                    },
                    transitionEnd: function (e, t) {
                        void 0 === e && (e = !0);
                        const n = this,
                            {
                                params: i
                            } = n;
                        n.animating = !1, i.cssMode || (n.setTransition(0), L({
                            swiper: n,
                            runCallbacks: e,
                            direction: t,
                            step: "End"
                        }))
                    }
                },
                slide: O,
                loop: P,
                grabCursor: {
                    setGrabCursor: function (e) {
                        const t = this;
                        if (t.support.touch || !t.params.simulateTouch || t.params.watchOverflow && t.isLocked || t.params.cssMode) return;
                        const n = "container" === t.params.touchEventsTarget ? t.el : t.wrapperEl;
                        n.style.cursor = "move", n.style.cursor = e ? "grabbing" : "grab"
                    },
                    unsetGrabCursor: function () {
                        const e = this;
                        e.support.touch || e.params.watchOverflow && e.isLocked || e.params.cssMode || (e["container" === e.params.touchEventsTarget ? "el" : "wrapperEl"].style.cursor = "")
                    }
                },
                events: B,
                breakpoints: {
                    setBreakpoint: function () {
                        const e = this,
                            {
                                activeIndex: t,
                                initialized: n,
                                loopedSlides: i = 0,
                                params: s,
                                $el: r
                            } = e,
                            o = s.breakpoints;
                        if (!o || o && 0 === Object.keys(o).length) return;
                        const a = e.getBreakpoint(o, e.params.breakpointsBase, e.el);
                        if (!a || e.currentBreakpoint === a) return;
                        const l = (a in o ? o[a] : void 0) || e.originalParams,
                            c = q(e, s),
                            d = q(e, l),
                            u = s.enabled;
                        c && !d ? (r.removeClass(`${s.containerModifierClass}grid ${s.containerModifierClass}grid-column`), e.emitContainerClasses()) : !c && d && (r.addClass(`${s.containerModifierClass}grid`), (l.grid.fill && "column" === l.grid.fill || !l.grid.fill && "column" === s.grid.fill) && r.addClass(`${s.containerModifierClass}grid-column`), e.emitContainerClasses()), ["navigation", "pagination", "scrollbar"].forEach((t => {
                            const n = s[t] && s[t].enabled,
                                i = l[t] && l[t].enabled;
                            n && !i && e[t].disable(), !n && i && e[t].enable()
                        }));
                        const p = l.direction && l.direction !== s.direction,
                            f = s.loop && (l.slidesPerView !== s.slidesPerView || p);
                        p && n && e.changeDirection(), w(e.params, l);
                        const h = e.params.enabled;
                        Object.assign(e, {
                            allowTouchMove: e.params.allowTouchMove,
                            allowSlideNext: e.params.allowSlideNext,
                            allowSlidePrev: e.params.allowSlidePrev
                        }), u && !h ? e.disable() : !u && h && e.enable(), e.currentBreakpoint = a, e.emit("_beforeBreakpoint", l), f && n && (e.loopDestroy(), e.loopCreate(), e.updateSlides(), e.slideTo(t - i + e.loopedSlides, 0, !1)), e.emit("breakpoint", l)
                    },
                    getBreakpoint: function (e, t, n) {
                        if (void 0 === t && (t = "window"), !e || "container" === t && !n) return;
                        let i = !1;
                        const s = a(),
                            r = "window" === t ? s.innerHeight : n.clientHeight,
                            o = Object.keys(e).map((e => {
                                if ("string" == typeof e && 0 === e.indexOf("@")) {
                                    const t = parseFloat(e.substr(1));
                                    return {
                                        value: r * t,
                                        point: e
                                    }
                                }
                                return {
                                    value: e,
                                    point: e
                                }
                            }));
                        o.sort(((e, t) => parseInt(e.value, 10) - parseInt(t.value, 10)));
                        for (let e = 0; e < o.length; e += 1) {
                            const {
                                point: r,
                                value: a
                            } = o[e];
                            "window" === t ? s.matchMedia(`(min-width: ${a}px)`).matches && (i = r) : a <= n.clientWidth && (i = r)
                        }
                        return i || "max"
                    }
                },
                checkOverflow: {
                    checkOverflow: function () {
                        const e = this,
                            {
                                isLocked: t,
                                params: n
                            } = e,
                            {
                                slidesOffsetBefore: i
                            } = n;
                        if (i) {
                            const t = e.slides.length - 1,
                                n = e.slidesGrid[t] + e.slidesSizesGrid[t] + 2 * i;
                            e.isLocked = e.size > n
                        } else e.isLocked = 1 === e.snapGrid.length;
                        !0 === n.allowSlideNext && (e.allowSlideNext = !e.isLocked), !0 === n.allowSlidePrev && (e.allowSlidePrev = !e.isLocked), t && t !== e.isLocked && (e.isEnd = !1), t !== e.isLocked && e.emit(e.isLocked ? "lock" : "unlock")
                    }
                },
                classes: R,
                images: {
                    loadImage: function (e, t, n, i, s, r) {
                        const o = a();
                        let l;

                        function c() {
                            r && r()
                        }
                        m(e).parent("picture")[0] || e.complete && s ? c() : t ? (l = new o.Image, l.onload = c, l.onerror = c, i && (l.sizes = i), n && (l.srcset = n), t && (l.src = t)) : c()
                    },
                    preloadImages: function () {
                        const e = this;

                        function t() {
                            null != e && e && !e.destroyed && (void 0 !== e.imagesLoaded && (e.imagesLoaded += 1), e.imagesLoaded === e.imagesToLoad.length && (e.params.updateOnImagesReady && e.update(), e.emit("imagesReady")))
                        }
                        e.imagesToLoad = e.$el.find("img");
                        for (let n = 0; n < e.imagesToLoad.length; n += 1) {
                            const i = e.imagesToLoad[n];
                            e.loadImage(i, i.currentSrc || i.getAttribute("src"), i.srcset || i.getAttribute("srcset"), i.sizes || i.getAttribute("sizes"), !0, t)
                        }
                    }
                }
            },
            X = {};
        class U {
            constructor() {
                let e, t;
                for (var n = arguments.length, i = new Array(n), s = 0; s < n; s++) i[s] = arguments[s];
                if (1 === i.length && i[0].constructor && "Object" === Object.prototype.toString.call(i[0]).slice(8, -1) ? t = i[0] : [e, t] = i, t || (t = {}), t = w({}, t), e && !t.el && (t.el = e), t.el && m(t.el).length > 1) {
                    const e = [];
                    return m(t.el).each((n => {
                        const i = w({}, t, {
                            el: n
                        });
                        e.push(new U(i))
                    })), e
                }
                const r = this;
                var o;
                r.__swiper__ = !0, r.support = S(), r.device = (void 0 === (o = {
                    userAgent: t.userAgent
                }) && (o = {}), E || (E = function (e) {
                    let {
                        userAgent: t
                    } = void 0 === e ? {} : e;
                    const n = S(),
                        i = a(),
                        s = i.navigator.platform,
                        r = t || i.navigator.userAgent,
                        o = {
                            ios: !1,
                            android: !1
                        },
                        l = i.screen.width,
                        c = i.screen.height,
                        d = r.match(/(Android);?[\s\/]+([\d.]+)?/);
                    let u = r.match(/(iPad).*OS\s([\d_]+)/);
                    const p = r.match(/(iPod)(.*OS\s([\d_]+))?/),
                        f = !u && r.match(/(iPhone\sOS|iOS)\s([\d_]+)/),
                        h = "Win32" === s;
                    let m = "MacIntel" === s;
                    return !u && m && n.touch && ["1024x1366", "1366x1024", "834x1194", "1194x834", "834x1112", "1112x834", "768x1024", "1024x768", "820x1180", "1180x820", "810x1080", "1080x810"].indexOf(`${l}x${c}`) >= 0 && (u = r.match(/(Version)\/([\d.]+)/), u || (u = [0, 1, "13_0_0"]), m = !1), d && !h && (o.os = "android", o.android = !0), (u || f || p) && (o.os = "ios", o.ios = !0), o
                }(o)), E), r.browser = (T || (T = function () {
                    const e = a();
                    return {
                        isSafari: function () {
                            const t = e.navigator.userAgent.toLowerCase();
                            return t.indexOf("safari") >= 0 && t.indexOf("chrome") < 0 && t.indexOf("android") < 0
                        }(),
                        isWebView: /(iPhone|iPod|iPad).*AppleWebKit(?!.*Safari)/i.test(e.navigator.userAgent)
                    }
                }()), T), r.eventsListeners = {}, r.eventsAnyListeners = [], r.modules = [...r.__modules__], t.modules && Array.isArray(t.modules) && r.modules.push(...t.modules);
                const l = {};
                r.modules.forEach((e => {
                    e({
                        swiper: r,
                        extendParams: W(t, l),
                        on: r.on.bind(r),
                        once: r.once.bind(r),
                        off: r.off.bind(r),
                        emit: r.emit.bind(r)
                    })
                }));
                const c = w({}, V, l);
                return r.params = w({}, c, X, t), r.originalParams = w({}, r.params), r.passedParams = w({}, t), r.params && r.params.on && Object.keys(r.params.on).forEach((e => {
                    r.on(e, r.params.on[e])
                })), r.params && r.params.onAny && r.onAny(r.params.onAny), r.$ = m, Object.assign(r, {
                    enabled: r.params.enabled,
                    el: e,
                    classNames: [],
                    slides: m(),
                    slidesGrid: [],
                    snapGrid: [],
                    slidesSizesGrid: [],
                    isHorizontal: () => "horizontal" === r.params.direction,
                    isVertical: () => "vertical" === r.params.direction,
                    activeIndex: 0,
                    realIndex: 0,
                    isBeginning: !0,
                    isEnd: !1,
                    translate: 0,
                    previousTranslate: 0,
                    progress: 0,
                    velocity: 0,
                    animating: !1,
                    allowSlideNext: r.params.allowSlideNext,
                    allowSlidePrev: r.params.allowSlidePrev,
                    touchEvents: function () {
                        const e = ["touchstart", "touchmove", "touchend", "touchcancel"],
                            t = ["pointerdown", "pointermove", "pointerup"];
                        return r.touchEventsTouch = {
                            start: e[0],
                            move: e[1],
                            end: e[2],
                            cancel: e[3]
                        }, r.touchEventsDesktop = {
                            start: t[0],
                            move: t[1],
                            end: t[2]
                        }, r.support.touch || !r.params.simulateTouch ? r.touchEventsTouch : r.touchEventsDesktop
                    }(),
                    touchEventsData: {
                        isTouched: void 0,
                        isMoved: void 0,
                        allowTouchCallbacks: void 0,
                        touchStartTime: void 0,
                        isScrolling: void 0,
                        currentTranslate: void 0,
                        startTranslate: void 0,
                        allowThresholdMove: void 0,
                        focusableElements: r.params.focusableElements,
                        lastClickTime: v(),
                        clickTimeout: void 0,
                        velocities: [],
                        allowMomentumBounce: void 0,
                        isTouchEvent: void 0,
                        startMoving: void 0
                    },
                    allowClick: !0,
                    allowTouchMove: r.params.allowTouchMove,
                    touches: {
                        startX: 0,
                        startY: 0,
                        currentX: 0,
                        currentY: 0,
                        diff: 0
                    },
                    imagesToLoad: [],
                    imagesLoaded: 0
                }), r.emit("_swiper"), r.params.init && r.init(), r
            }
            enable() {
                const e = this;
                e.enabled || (e.enabled = !0, e.params.grabCursor && e.setGrabCursor(), e.emit("enable"))
            }
            disable() {
                const e = this;
                e.enabled && (e.enabled = !1, e.params.grabCursor && e.unsetGrabCursor(), e.emit("disable"))
            }
            setProgress(e, t) {
                const n = this;
                e = Math.min(Math.max(e, 0), 1);
                const i = n.minTranslate(),
                    s = (n.maxTranslate() - i) * e + i;
                n.translateTo(s, void 0 === t ? 0 : t), n.updateActiveIndex(), n.updateSlidesClasses()
            }
            emitContainerClasses() {
                const e = this;
                if (!e.params._emitClasses || !e.el) return;
                const t = e.el.className.split(" ").filter((t => 0 === t.indexOf("swiper") || 0 === t.indexOf(e.params.containerModifierClass)));
                e.emit("_containerClasses", t.join(" "))
            }
            getSlideClasses(e) {
                const t = this;
                return t.destroyed ? "" : e.className.split(" ").filter((e => 0 === e.indexOf("swiper-slide") || 0 === e.indexOf(t.params.slideClass))).join(" ")
            }
            emitSlidesClasses() {
                const e = this;
                if (!e.params._emitClasses || !e.el) return;
                const t = [];
                e.slides.each((n => {
                    const i = e.getSlideClasses(n);
                    t.push({
                        slideEl: n,
                        classNames: i
                    }), e.emit("_slideClass", n, i)
                })), e.emit("_slideClasses", t)
            }
            slidesPerViewDynamic(e, t) {
                void 0 === e && (e = "current"), void 0 === t && (t = !1);
                const {
                    params: n,
                    slides: i,
                    slidesGrid: s,
                    slidesSizesGrid: r,
                    size: o,
                    activeIndex: a
                } = this;
                let l = 1;
                if (n.centeredSlides) {
                    let e, t = i[a].swiperSlideSize;
                    for (let n = a + 1; n < i.length; n += 1) i[n] && !e && (t += i[n].swiperSlideSize, l += 1, t > o && (e = !0));
                    for (let n = a - 1; n >= 0; n -= 1) i[n] && !e && (t += i[n].swiperSlideSize, l += 1, t > o && (e = !0))
                } else if ("current" === e)
                    for (let e = a + 1; e < i.length; e += 1)(t ? s[e] + r[e] - s[a] < o : s[e] - s[a] < o) && (l += 1);
                else
                    for (let e = a - 1; e >= 0; e -= 1) s[a] - s[e] < o && (l += 1);
                return l
            }
            update() {
                const e = this;
                if (!e || e.destroyed) return;
                const {
                    snapGrid: t,
                    params: n
                } = e;

                function i() {
                    const t = e.rtlTranslate ? -1 * e.translate : e.translate,
                        n = Math.min(Math.max(t, e.maxTranslate()), e.minTranslate());
                    e.setTranslate(n), e.updateActiveIndex(), e.updateSlidesClasses()
                }
                let s;
                n.breakpoints && e.setBreakpoint(), e.updateSize(), e.updateSlides(), e.updateProgress(), e.updateSlidesClasses(), e.params.freeMode && e.params.freeMode.enabled ? (i(), e.params.autoHeight && e.updateAutoHeight()) : (s = ("auto" === e.params.slidesPerView || e.params.slidesPerView > 1) && e.isEnd && !e.params.centeredSlides ? e.slideTo(e.slides.length - 1, 0, !1, !0) : e.slideTo(e.activeIndex, 0, !1, !0), s || i()), n.watchOverflow && t !== e.snapGrid && e.checkOverflow(), e.emit("update")
            }
            changeDirection(e, t) {
                void 0 === t && (t = !0);
                const n = this,
                    i = n.params.direction;
                return e || (e = "horizontal" === i ? "vertical" : "horizontal"), e === i || "horizontal" !== e && "vertical" !== e || (n.$el.removeClass(`${n.params.containerModifierClass}${i}`).addClass(`${n.params.containerModifierClass}${e}`), n.emitContainerClasses(), n.params.direction = e, n.slides.each((t => {
                    "vertical" === e ? t.style.width = "" : t.style.height = ""
                })), n.emit("changeDirection"), t && n.update()), n
            }
            mount(e) {
                const t = this;
                if (t.mounted) return !0;
                const n = m(e || t.params.el);
                if (!(e = n[0])) return !1;
                e.swiper = t;
                const i = () => `.${(t.params.wrapperClass||"").trim().split(" ").join(".")}`;
                let s = (() => {
                    if (e && e.shadowRoot && e.shadowRoot.querySelector) {
                        const t = m(e.shadowRoot.querySelector(i()));
                        return t.children = e => n.children(e), t
                    }
                    return n.children ? n.children(i()) : m(n).children(i())
                })();
                if (0 === s.length && t.params.createElements) {
                    const e = r().createElement("div");
                    s = m(e), e.className = t.params.wrapperClass, n.append(e), n.children(`.${t.params.slideClass}`).each((e => {
                        s.append(e)
                    }))
                }
                return Object.assign(t, {
                    $el: n,
                    el: e,
                    $wrapperEl: s,
                    wrapperEl: s[0],
                    mounted: !0,
                    rtl: "rtl" === e.dir.toLowerCase() || "rtl" === n.css("direction"),
                    rtlTranslate: "horizontal" === t.params.direction && ("rtl" === e.dir.toLowerCase() || "rtl" === n.css("direction")),
                    wrongRTL: "-webkit-box" === s.css("display")
                }), !0
            }
            init(e) {
                const t = this;
                return t.initialized || !1 === t.mount(e) || (t.emit("beforeInit"), t.params.breakpoints && t.setBreakpoint(), t.addClasses(), t.params.loop && t.loopCreate(), t.updateSize(), t.updateSlides(), t.params.watchOverflow && t.checkOverflow(), t.params.grabCursor && t.enabled && t.setGrabCursor(), t.params.preloadImages && t.preloadImages(), t.params.loop ? t.slideTo(t.params.initialSlide + t.loopedSlides, 0, t.params.runCallbacksOnInit, !1, !0) : t.slideTo(t.params.initialSlide, 0, t.params.runCallbacksOnInit, !1, !0), t.attachEvents(), t.initialized = !0, t.emit("init"), t.emit("afterInit")), t
            }
            destroy(e, t) {
                void 0 === e && (e = !0), void 0 === t && (t = !0);
                const n = this,
                    {
                        params: i,
                        $el: s,
                        $wrapperEl: r,
                        slides: o
                    } = n;
                return void 0 === n.params || n.destroyed || (n.emit("beforeDestroy"), n.initialized = !1, n.detachEvents(), i.loop && n.loopDestroy(), t && (n.removeClasses(), s.removeAttr("style"), r.removeAttr("style"), o && o.length && o.removeClass([i.slideVisibleClass, i.slideActiveClass, i.slideNextClass, i.slidePrevClass].join(" ")).removeAttr("style").removeAttr("data-swiper-slide-index")), n.emit("destroy"), Object.keys(n.eventsListeners).forEach((e => {
                    n.off(e)
                })), !1 !== e && (n.$el[0].swiper = null, function (e) {
                    const t = e;
                    Object.keys(t).forEach((e => {
                        try {
                            t[e] = null
                        } catch (e) {}
                        try {
                            delete t[e]
                        } catch (e) {}
                    }))
                }(n)), n.destroyed = !0), null
            }
            static extendDefaults(e) {
                w(X, e)
            }
            static get extendedDefaults() {
                return X
            }
            static get defaults() {
                return V
            }
            static installModule(e) {
                U.prototype.__modules__ || (U.prototype.__modules__ = []);
                const t = U.prototype.__modules__;
                "function" == typeof e && t.indexOf(e) < 0 && t.push(e)
            }
            static use(e) {
                return Array.isArray(e) ? (e.forEach((e => U.installModule(e))), U) : (U.installModule(e), U)
            }
        }
        Object.keys(G).forEach((e => {
            Object.keys(G[e]).forEach((t => {
                U.prototype[t] = G[e][t]
            }))
        })), U.use([function (e) {
            let {
                swiper: t,
                on: n,
                emit: i
            } = e;
            const s = a();
            let r = null,
                o = null;
            const l = () => {
                    t && !t.destroyed && t.initialized && (i("beforeResize"), i("resize"))
                },
                c = () => {
                    t && !t.destroyed && t.initialized && i("orientationchange")
                };
            n("init", (() => {
                t.params.resizeObserver && void 0 !== s.ResizeObserver ? t && !t.destroyed && t.initialized && (r = new ResizeObserver((e => {
                    o = s.requestAnimationFrame((() => {
                        const {
                            width: n,
                            height: i
                        } = t;
                        let s = n,
                            r = i;
                        e.forEach((e => {
                            let {
                                contentBoxSize: n,
                                contentRect: i,
                                target: o
                            } = e;
                            o && o !== t.el || (s = i ? i.width : (n[0] || n).inlineSize, r = i ? i.height : (n[0] || n).blockSize)
                        })), s === n && r === i || l()
                    }))
                })), r.observe(t.el)) : (s.addEventListener("resize", l), s.addEventListener("orientationchange", c))
            })), n("destroy", (() => {
                o && s.cancelAnimationFrame(o), r && r.unobserve && t.el && (r.unobserve(t.el), r = null), s.removeEventListener("resize", l), s.removeEventListener("orientationchange", c)
            }))
        }, function (e) {
            let {
                swiper: t,
                extendParams: n,
                on: i,
                emit: s
            } = e;
            const r = [],
                o = a(),
                l = function (e, t) {
                    void 0 === t && (t = {});
                    const n = new(o.MutationObserver || o.WebkitMutationObserver)((e => {
                        if (1 === e.length) return void s("observerUpdate", e[0]);
                        const t = function () {
                            s("observerUpdate", e[0])
                        };
                        o.requestAnimationFrame ? o.requestAnimationFrame(t) : o.setTimeout(t, 0)
                    }));
                    n.observe(e, {
                        attributes: void 0 === t.attributes || t.attributes,
                        childList: void 0 === t.childList || t.childList,
                        characterData: void 0 === t.characterData || t.characterData
                    }), r.push(n)
                };
            n({
                observer: !1,
                observeParents: !1,
                observeSlideChildren: !1
            }), i("init", (() => {
                if (t.params.observer) {
                    if (t.params.observeParents) {
                        const e = t.$el.parents();
                        for (let t = 0; t < e.length; t += 1) l(e[t])
                    }
                    l(t.$el[0], {
                        childList: t.params.observeSlideChildren
                    }), l(t.$wrapperEl[0], {
                        attributes: !1
                    })
                }
            })), i("destroy", (() => {
                r.forEach((e => {
                    e.disconnect()
                })), r.splice(0, r.length)
            }))
        }]);
        const Y = U;

        function K(e, t, n, i) {
            const s = r();
            return e.params.createElements && Object.keys(i).forEach((r => {
                if (!n[r] && !0 === n.auto) {
                    let o = e.$el.children(`.${i[r]}`)[0];
                    o || (o = s.createElement("div"), o.className = i[r], e.$el.append(o)), n[r] = o, t[r] = o
                }
            })), n
        }

        function Q(e) {
            let {
                swiper: t,
                extendParams: n,
                on: i,
                emit: s
            } = e;

            function r(e) {
                let n;
                return e && (n = m(e), t.params.uniqueNavElements && "string" == typeof e && n.length > 1 && 1 === t.$el.find(e).length && (n = t.$el.find(e))), n
            }

            function o(e, n) {
                const i = t.params.navigation;
                e && e.length > 0 && (e[n ? "addClass" : "removeClass"](i.disabledClass), e[0] && "BUTTON" === e[0].tagName && (e[0].disabled = n), t.params.watchOverflow && t.enabled && e[t.isLocked ? "addClass" : "removeClass"](i.lockClass))
            }

            function a() {
                if (t.params.loop) return;
                const {
                    $nextEl: e,
                    $prevEl: n
                } = t.navigation;
                o(n, t.isBeginning && !t.params.rewind), o(e, t.isEnd && !t.params.rewind)
            }

            function l(e) {
                e.preventDefault(), (!t.isBeginning || t.params.loop || t.params.rewind) && t.slidePrev()
            }

            function c(e) {
                e.preventDefault(), (!t.isEnd || t.params.loop || t.params.rewind) && t.slideNext()
            }

            function d() {
                const e = t.params.navigation;
                if (t.params.navigation = K(t, t.originalParams.navigation, t.params.navigation, {
                        nextEl: "swiper-button-next",
                        prevEl: "swiper-button-prev"
                    }), !e.nextEl && !e.prevEl) return;
                const n = r(e.nextEl),
                    i = r(e.prevEl);
                n && n.length > 0 && n.on("click", c), i && i.length > 0 && i.on("click", l), Object.assign(t.navigation, {
                    $nextEl: n,
                    nextEl: n && n[0],
                    $prevEl: i,
                    prevEl: i && i[0]
                }), t.enabled || (n && n.addClass(e.lockClass), i && i.addClass(e.lockClass))
            }

            function u() {
                const {
                    $nextEl: e,
                    $prevEl: n
                } = t.navigation;
                e && e.length && (e.off("click", c), e.removeClass(t.params.navigation.disabledClass)), n && n.length && (n.off("click", l), n.removeClass(t.params.navigation.disabledClass))
            }
            n({
                navigation: {
                    nextEl: null,
                    prevEl: null,
                    hideOnClick: !1,
                    disabledClass: "swiper-button-disabled",
                    hiddenClass: "swiper-button-hidden",
                    lockClass: "swiper-button-lock",
                    navigationDisabledClass: "swiper-navigation-disabled"
                }
            }), t.navigation = {
                nextEl: null,
                $nextEl: null,
                prevEl: null,
                $prevEl: null
            }, i("init", (() => {
                !1 === t.params.navigation.enabled ? p() : (d(), a())
            })), i("toEdge fromEdge lock unlock", (() => {
                a()
            })), i("destroy", (() => {
                u()
            })), i("enable disable", (() => {
                const {
                    $nextEl: e,
                    $prevEl: n
                } = t.navigation;
                e && e[t.enabled ? "removeClass" : "addClass"](t.params.navigation.lockClass), n && n[t.enabled ? "removeClass" : "addClass"](t.params.navigation.lockClass)
            })), i("click", ((e, n) => {
                const {
                    $nextEl: i,
                    $prevEl: r
                } = t.navigation, o = n.target;
                if (t.params.navigation.hideOnClick && !m(o).is(r) && !m(o).is(i)) {
                    if (t.pagination && t.params.pagination && t.params.pagination.clickable && (t.pagination.el === o || t.pagination.el.contains(o))) return;
                    let e;
                    i ? e = i.hasClass(t.params.navigation.hiddenClass) : r && (e = r.hasClass(t.params.navigation.hiddenClass)), s(!0 === e ? "navigationShow" : "navigationHide"), i && i.toggleClass(t.params.navigation.hiddenClass), r && r.toggleClass(t.params.navigation.hiddenClass)
                }
            }));
            const p = () => {
                t.$el.addClass(t.params.navigation.navigationDisabledClass), u()
            };
            Object.assign(t.navigation, {
                enable: () => {
                    t.$el.removeClass(t.params.navigation.navigationDisabledClass), d(), a()
                },
                disable: p,
                update: a,
                init: d,
                destroy: u
            })
        }

        function J(e) {
            return void 0 === e && (e = ""), `.${e.trim().replace(/([\.:!\/])/g,"\\$1").replace(/ /g,".")}`
        }

        function Z(e) {
            let {
                swiper: t,
                extendParams: n,
                on: i,
                emit: s
            } = e;
            const r = "swiper-pagination";
            let o;
            n({
                pagination: {
                    el: null,
                    bulletElement: "span",
                    clickable: !1,
                    hideOnClick: !1,
                    renderBullet: null,
                    renderProgressbar: null,
                    renderFraction: null,
                    renderCustom: null,
                    progressbarOpposite: !1,
                    type: "bullets",
                    dynamicBullets: !1,
                    dynamicMainBullets: 1,
                    formatFractionCurrent: e => e,
                    formatFractionTotal: e => e,
                    bulletClass: `${r}-bullet`,
                    bulletActiveClass: `${r}-bullet-active`,
                    modifierClass: `${r}-`,
                    currentClass: `${r}-current`,
                    totalClass: `${r}-total`,
                    hiddenClass: `${r}-hidden`,
                    progressbarFillClass: `${r}-progressbar-fill`,
                    progressbarOppositeClass: `${r}-progressbar-opposite`,
                    clickableClass: `${r}-clickable`,
                    lockClass: `${r}-lock`,
                    horizontalClass: `${r}-horizontal`,
                    verticalClass: `${r}-vertical`,
                    paginationDisabledClass: `${r}-disabled`
                }
            }), t.pagination = {
                el: null,
                $el: null,
                bullets: []
            };
            let a = 0;

            function l() {
                return !t.params.pagination.el || !t.pagination.el || !t.pagination.$el || 0 === t.pagination.$el.length
            }

            function c(e, n) {
                const {
                    bulletActiveClass: i
                } = t.params.pagination;
                e[n]().addClass(`${i}-${n}`)[n]().addClass(`${i}-${n}-${n}`)
            }

            function d() {
                const e = t.rtl,
                    n = t.params.pagination;
                if (l()) return;
                const i = t.virtual && t.params.virtual.enabled ? t.virtual.slides.length : t.slides.length,
                    r = t.pagination.$el;
                let d;
                const u = t.params.loop ? Math.ceil((i - 2 * t.loopedSlides) / t.params.slidesPerGroup) : t.snapGrid.length;
                if (t.params.loop ? (d = Math.ceil((t.activeIndex - t.loopedSlides) / t.params.slidesPerGroup), d > i - 1 - 2 * t.loopedSlides && (d -= i - 2 * t.loopedSlides), d > u - 1 && (d -= u), d < 0 && "bullets" !== t.params.paginationType && (d = u + d)) : d = void 0 !== t.snapIndex ? t.snapIndex : t.activeIndex || 0, "bullets" === n.type && t.pagination.bullets && t.pagination.bullets.length > 0) {
                    const i = t.pagination.bullets;
                    let s, l, u;
                    if (n.dynamicBullets && (o = i.eq(0)[t.isHorizontal() ? "outerWidth" : "outerHeight"](!0), r.css(t.isHorizontal() ? "width" : "height", o * (n.dynamicMainBullets + 4) + "px"), n.dynamicMainBullets > 1 && void 0 !== t.previousIndex && (a += d - (t.previousIndex - t.loopedSlides || 0), a > n.dynamicMainBullets - 1 ? a = n.dynamicMainBullets - 1 : a < 0 && (a = 0)), s = Math.max(d - a, 0), l = s + (Math.min(i.length, n.dynamicMainBullets) - 1), u = (l + s) / 2), i.removeClass(["", "-next", "-next-next", "-prev", "-prev-prev", "-main"].map((e => `${n.bulletActiveClass}${e}`)).join(" ")), r.length > 1) i.each((e => {
                        const t = m(e),
                            i = t.index();
                        i === d && t.addClass(n.bulletActiveClass), n.dynamicBullets && (i >= s && i <= l && t.addClass(`${n.bulletActiveClass}-main`), i === s && c(t, "prev"), i === l && c(t, "next"))
                    }));
                    else {
                        const e = i.eq(d),
                            r = e.index();
                        if (e.addClass(n.bulletActiveClass), n.dynamicBullets) {
                            const e = i.eq(s),
                                o = i.eq(l);
                            for (let e = s; e <= l; e += 1) i.eq(e).addClass(`${n.bulletActiveClass}-main`);
                            if (t.params.loop)
                                if (r >= i.length) {
                                    for (let e = n.dynamicMainBullets; e >= 0; e -= 1) i.eq(i.length - e).addClass(`${n.bulletActiveClass}-main`);
                                    i.eq(i.length - n.dynamicMainBullets - 1).addClass(`${n.bulletActiveClass}-prev`)
                                } else c(e, "prev"), c(o, "next");
                            else c(e, "prev"), c(o, "next")
                        }
                    }
                    if (n.dynamicBullets) {
                        const s = Math.min(i.length, n.dynamicMainBullets + 4),
                            r = (o * s - o) / 2 - u * o,
                            a = e ? "right" : "left";
                        i.css(t.isHorizontal() ? a : "top", `${r}px`)
                    }
                }
                if ("fraction" === n.type && (r.find(J(n.currentClass)).text(n.formatFractionCurrent(d + 1)), r.find(J(n.totalClass)).text(n.formatFractionTotal(u))), "progressbar" === n.type) {
                    let e;
                    e = n.progressbarOpposite ? t.isHorizontal() ? "vertical" : "horizontal" : t.isHorizontal() ? "horizontal" : "vertical";
                    const i = (d + 1) / u;
                    let s = 1,
                        o = 1;
                    "horizontal" === e ? s = i : o = i, r.find(J(n.progressbarFillClass)).transform(`translate3d(0,0,0) scaleX(${s}) scaleY(${o})`).transition(t.params.speed)
                }
                "custom" === n.type && n.renderCustom ? (r.html(n.renderCustom(t, d + 1, u)), s("paginationRender", r[0])) : s("paginationUpdate", r[0]), t.params.watchOverflow && t.enabled && r[t.isLocked ? "addClass" : "removeClass"](n.lockClass)
            }

            function u() {
                const e = t.params.pagination;
                if (l()) return;
                const n = t.virtual && t.params.virtual.enabled ? t.virtual.slides.length : t.slides.length,
                    i = t.pagination.$el;
                let r = "";
                if ("bullets" === e.type) {
                    let s = t.params.loop ? Math.ceil((n - 2 * t.loopedSlides) / t.params.slidesPerGroup) : t.snapGrid.length;
                    t.params.freeMode && t.params.freeMode.enabled && !t.params.loop && s > n && (s = n);
                    for (let n = 0; n < s; n += 1) e.renderBullet ? r += e.renderBullet.call(t, n, e.bulletClass) : r += `<${e.bulletElement} class="${e.bulletClass}"></${e.bulletElement}>`;
                    i.html(r), t.pagination.bullets = i.find(J(e.bulletClass))
                }
                "fraction" === e.type && (r = e.renderFraction ? e.renderFraction.call(t, e.currentClass, e.totalClass) : `<span class="${e.currentClass}"></span> / <span class="${e.totalClass}"></span>`, i.html(r)), "progressbar" === e.type && (r = e.renderProgressbar ? e.renderProgressbar.call(t, e.progressbarFillClass) : `<span class="${e.progressbarFillClass}"></span>`, i.html(r)), "custom" !== e.type && s("paginationRender", t.pagination.$el[0])
            }

            function p() {
                t.params.pagination = K(t, t.originalParams.pagination, t.params.pagination, {
                    el: "swiper-pagination"
                });
                const e = t.params.pagination;
                if (!e.el) return;
                let n = m(e.el);
                0 !== n.length && (t.params.uniqueNavElements && "string" == typeof e.el && n.length > 1 && (n = t.$el.find(e.el), n.length > 1 && (n = n.filter((e => m(e).parents(".swiper")[0] === t.el)))), "bullets" === e.type && e.clickable && n.addClass(e.clickableClass), n.addClass(e.modifierClass + e.type), n.addClass(t.isHorizontal() ? e.horizontalClass : e.verticalClass), "bullets" === e.type && e.dynamicBullets && (n.addClass(`${e.modifierClass}${e.type}-dynamic`), a = 0, e.dynamicMainBullets < 1 && (e.dynamicMainBullets = 1)), "progressbar" === e.type && e.progressbarOpposite && n.addClass(e.progressbarOppositeClass), e.clickable && n.on("click", J(e.bulletClass), (function (e) {
                    e.preventDefault();
                    let n = m(this).index() * t.params.slidesPerGroup;
                    t.params.loop && (n += t.loopedSlides), t.slideTo(n)
                })), Object.assign(t.pagination, {
                    $el: n,
                    el: n[0]
                }), t.enabled || n.addClass(e.lockClass))
            }

            function f() {
                const e = t.params.pagination;
                if (l()) return;
                const n = t.pagination.$el;
                n.removeClass(e.hiddenClass), n.removeClass(e.modifierClass + e.type), n.removeClass(t.isHorizontal() ? e.horizontalClass : e.verticalClass), t.pagination.bullets && t.pagination.bullets.removeClass && t.pagination.bullets.removeClass(e.bulletActiveClass), e.clickable && n.off("click", J(e.bulletClass))
            }
            i("init", (() => {
                !1 === t.params.pagination.enabled ? h() : (p(), u(), d())
            })), i("activeIndexChange", (() => {
                (t.params.loop || void 0 === t.snapIndex) && d()
            })), i("snapIndexChange", (() => {
                t.params.loop || d()
            })), i("slidesLengthChange", (() => {
                t.params.loop && (u(), d())
            })), i("snapGridLengthChange", (() => {
                t.params.loop || (u(), d())
            })), i("destroy", (() => {
                f()
            })), i("enable disable", (() => {
                const {
                    $el: e
                } = t.pagination;
                e && e[t.enabled ? "removeClass" : "addClass"](t.params.pagination.lockClass)
            })), i("lock unlock", (() => {
                d()
            })), i("click", ((e, n) => {
                const i = n.target,
                    {
                        $el: r
                    } = t.pagination;
                if (t.params.pagination.el && t.params.pagination.hideOnClick && r.length > 0 && !m(i).hasClass(t.params.pagination.bulletClass)) {
                    if (t.navigation && (t.navigation.nextEl && i === t.navigation.nextEl || t.navigation.prevEl && i === t.navigation.prevEl)) return;
                    const e = r.hasClass(t.params.pagination.hiddenClass);
                    s(!0 === e ? "paginationShow" : "paginationHide"), r.toggleClass(t.params.pagination.hiddenClass)
                }
            }));
            const h = () => {
                t.$el.addClass(t.params.pagination.paginationDisabledClass), t.pagination.$el && t.pagination.$el.addClass(t.params.pagination.paginationDisabledClass), f()
            };
            Object.assign(t.pagination, {
                enable: () => {
                    t.$el.removeClass(t.params.pagination.paginationDisabledClass), t.pagination.$el && t.pagination.$el.removeClass(t.params.pagination.paginationDisabledClass), p(), u(), d()
                },
                disable: h,
                render: u,
                update: d,
                init: p,
                destroy: f
            })
        }

        function ee(e) {
            let {
                swiper: t,
                extendParams: n,
                on: i,
                emit: s
            } = e;
            n({
                lazy: {
                    checkInView: !1,
                    enabled: !1,
                    loadPrevNext: !1,
                    loadPrevNextAmount: 1,
                    loadOnTransitionStart: !1,
                    scrollingElement: "",
                    elementClass: "swiper-lazy",
                    loadingClass: "swiper-lazy-loading",
                    loadedClass: "swiper-lazy-loaded",
                    preloaderClass: "swiper-lazy-preloader"
                }
            }), t.lazy = {};
            let r = !1,
                o = !1;

            function l(e, n) {
                void 0 === n && (n = !0);
                const i = t.params.lazy;
                if (void 0 === e) return;
                if (0 === t.slides.length) return;
                const r = t.virtual && t.params.virtual.enabled ? t.$wrapperEl.children(`.${t.params.slideClass}[data-swiper-slide-index="${e}"]`) : t.slides.eq(e),
                    o = r.find(`.${i.elementClass}:not(.${i.loadedClass}):not(.${i.loadingClass})`);
                !r.hasClass(i.elementClass) || r.hasClass(i.loadedClass) || r.hasClass(i.loadingClass) || o.push(r[0]), 0 !== o.length && o.each((e => {
                    const o = m(e);
                    o.addClass(i.loadingClass);
                    const a = o.attr("data-background"),
                        c = o.attr("data-src"),
                        d = o.attr("data-srcset"),
                        u = o.attr("data-sizes"),
                        p = o.parent("picture");
                    t.loadImage(o[0], c || a, d, u, !1, (() => {
                        if (null != t && t && (!t || t.params) && !t.destroyed) {
                            if (a ? (o.css("background-image", `url("%24%7ba%7d.html")`), o.removeAttr("data-background")) : (d && (o.attr("srcset", d), o.removeAttr("data-srcset")), u && (o.attr("sizes", u), o.removeAttr("data-sizes")), p.length && p.children("source").each((e => {
                                    const t = m(e);
                                    t.attr("data-srcset") && (t.attr("srcset", t.attr("data-srcset")), t.removeAttr("data-srcset"))
                                })), c && (o.attr("src", c), o.removeAttr("data-src"))), o.addClass(i.loadedClass).removeClass(i.loadingClass), r.find(`.${i.preloaderClass}`).remove(), t.params.loop && n) {
                                const e = r.attr("data-swiper-slide-index");
                                r.hasClass(t.params.slideDuplicateClass) ? l(t.$wrapperEl.children(`[data-swiper-slide-index="${e}"]:not(.${t.params.slideDuplicateClass})`).index(), !1) : l(t.$wrapperEl.children(`.${t.params.slideDuplicateClass}[data-swiper-slide-index="${e}"]`).index(), !1)
                            }
                            s("lazyImageReady", r[0], o[0]), t.params.autoHeight && t.updateAutoHeight()
                        }
                    })), s("lazyImageLoad", r[0], o[0])
                }))
            }

            function c() {
                const {
                    $wrapperEl: e,
                    params: n,
                    slides: i,
                    activeIndex: s
                } = t, r = t.virtual && n.virtual.enabled, a = n.lazy;
                let c = n.slidesPerView;

                function d(t) {
                    if (r) {
                        if (e.children(`.${n.slideClass}[data-swiper-slide-index="${t}"]`).length) return !0
                    } else if (i[t]) return !0;
                    return !1
                }

                function u(e) {
                    return r ? m(e).attr("data-swiper-slide-index") : m(e).index()
                }
                if ("auto" === c && (c = 0), o || (o = !0), t.params.watchSlidesProgress) e.children(`.${n.slideVisibleClass}`).each((e => {
                    l(r ? m(e).attr("data-swiper-slide-index") : m(e).index())
                }));
                else if (c > 1)
                    for (let e = s; e < s + c; e += 1) d(e) && l(e);
                else l(s);
                if (a.loadPrevNext)
                    if (c > 1 || a.loadPrevNextAmount && a.loadPrevNextAmount > 1) {
                        const e = a.loadPrevNextAmount,
                            t = Math.ceil(c),
                            n = Math.min(s + t + Math.max(e, t), i.length),
                            r = Math.max(s - Math.max(t, e), 0);
                        for (let e = s + t; e < n; e += 1) d(e) && l(e);
                        for (let e = r; e < s; e += 1) d(e) && l(e)
                    } else {
                        const t = e.children(`.${n.slideNextClass}`);
                        t.length > 0 && l(u(t));
                        const i = e.children(`.${n.slidePrevClass}`);
                        i.length > 0 && l(u(i))
                    }
            }

            function d() {
                const e = a();
                if (!t || t.destroyed) return;
                const n = t.params.lazy.scrollingElement ? m(t.params.lazy.scrollingElement) : m(e),
                    i = n[0] === e,
                    s = i ? e.innerWidth : n[0].offsetWidth,
                    o = i ? e.innerHeight : n[0].offsetHeight,
                    l = t.$el.offset(),
                    {
                        rtlTranslate: u
                    } = t;
                let p = !1;
                u && (l.left -= t.$el[0].scrollLeft);
                const f = [
                    [l.left, l.top],
                    [l.left + t.width, l.top],
                    [l.left, l.top + t.height],
                    [l.left + t.width, l.top + t.height]
                ];
                for (let e = 0; e < f.length; e += 1) {
                    const t = f[e];
                    if (t[0] >= 0 && t[0] <= s && t[1] >= 0 && t[1] <= o) {
                        if (0 === t[0] && 0 === t[1]) continue;
                        p = !0
                    }
                }
                const h = !("touchstart" !== t.touchEvents.start || !t.support.passiveListener || !t.params.passiveListeners) && {
                    passive: !0,
                    capture: !1
                };
                p ? (c(), n.off("scroll", d, h)) : r || (r = !0, n.on("scroll", d, h))
            }
            i("beforeInit", (() => {
                t.params.lazy.enabled && t.params.preloadImages && (t.params.preloadImages = !1)
            })), i("init", (() => {
                t.params.lazy.enabled && (t.params.lazy.checkInView ? d() : c())
            })), i("scroll", (() => {
                t.params.freeMode && t.params.freeMode.enabled && !t.params.freeMode.sticky && c()
            })), i("scrollbarDragMove resize _freeModeNoMomentumRelease", (() => {
                t.params.lazy.enabled && (t.params.lazy.checkInView ? d() : c())
            })), i("transitionStart", (() => {
                t.params.lazy.enabled && (t.params.lazy.loadOnTransitionStart || !t.params.lazy.loadOnTransitionStart && !o) && (t.params.lazy.checkInView ? d() : c())
            })), i("transitionEnd", (() => {
                t.params.lazy.enabled && !t.params.lazy.loadOnTransitionStart && (t.params.lazy.checkInView ? d() : c())
            })), i("slideChange", (() => {
                const {
                    lazy: e,
                    cssMode: n,
                    watchSlidesProgress: i,
                    touchReleaseOnEdges: s,
                    resistanceRatio: r
                } = t.params;
                e.enabled && (n || i && (s || 0 === r)) && c()
            })), i("destroy", (() => {
                t.$el && t.$el.find(`.${t.params.lazy.loadingClass}`).removeClass(t.params.lazy.loadingClass)
            })), Object.assign(t.lazy, {
                load: c,
                loadInSlide: l
            })
        }

        function te(e) {
            let t, {
                swiper: n,
                extendParams: i,
                on: s,
                emit: o
            } = e;

            function a() {
                const e = n.slides.eq(n.activeIndex);
                let i = n.params.autoplay.delay;
                e.attr("data-swiper-autoplay") && (i = e.attr("data-swiper-autoplay") || n.params.autoplay.delay), clearTimeout(t), t = g((() => {
                    let e;
                    n.params.autoplay.reverseDirection ? n.params.loop ? (n.loopFix(), e = n.slidePrev(n.params.speed, !0, !0), o("autoplay")) : n.isBeginning ? n.params.autoplay.stopOnLastSlide ? c() : (e = n.slideTo(n.slides.length - 1, n.params.speed, !0, !0), o("autoplay")) : (e = n.slidePrev(n.params.speed, !0, !0), o("autoplay")) : n.params.loop ? (n.loopFix(), e = n.slideNext(n.params.speed, !0, !0), o("autoplay")) : n.isEnd ? n.params.autoplay.stopOnLastSlide ? c() : (e = n.slideTo(0, n.params.speed, !0, !0), o("autoplay")) : (e = n.slideNext(n.params.speed, !0, !0), o("autoplay")), (n.params.cssMode && n.autoplay.running || !1 === e) && a()
                }), i)
            }

            function l() {
                return void 0 === t && !n.autoplay.running && (n.autoplay.running = !0, o("autoplayStart"), a(), !0)
            }

            function c() {
                return !!n.autoplay.running && void 0 !== t && (t && (clearTimeout(t), t = void 0), n.autoplay.running = !1, o("autoplayStop"), !0)
            }

            function d(e) {
                n.autoplay.running && (n.autoplay.paused || (t && clearTimeout(t), n.autoplay.paused = !0, 0 !== e && n.params.autoplay.waitForTransition ? ["transitionend", "webkitTransitionEnd"].forEach((e => {
                    n.$wrapperEl[0].addEventListener(e, p)
                })) : (n.autoplay.paused = !1, a())))
            }

            function u() {
                const e = r();
                "hidden" === e.visibilityState && n.autoplay.running && d(), "visible" === e.visibilityState && n.autoplay.paused && (a(), n.autoplay.paused = !1)
            }

            function p(e) {
                n && !n.destroyed && n.$wrapperEl && e.target === n.$wrapperEl[0] && (["transitionend", "webkitTransitionEnd"].forEach((e => {
                    n.$wrapperEl[0].removeEventListener(e, p)
                })), n.autoplay.paused = !1, n.autoplay.running ? a() : c())
            }

            function f() {
                n.params.autoplay.disableOnInteraction ? c() : (o("autoplayPause"), d()), ["transitionend", "webkitTransitionEnd"].forEach((e => {
                    n.$wrapperEl[0].removeEventListener(e, p)
                }))
            }

            function h() {
                n.params.autoplay.disableOnInteraction || (n.autoplay.paused = !1, o("autoplayResume"), a())
            }
            n.autoplay = {
                running: !1,
                paused: !1
            }, i({
                autoplay: {
                    enabled: !1,
                    delay: 3e3,
                    waitForTransition: !0,
                    disableOnInteraction: !0,
                    stopOnLastSlide: !1,
                    reverseDirection: !1,
                    pauseOnMouseEnter: !1
                }
            }), s("init", (() => {
                n.params.autoplay.enabled && (l(), r().addEventListener("visibilitychange", u), n.params.autoplay.pauseOnMouseEnter && (n.$el.on("mouseenter", f), n.$el.on("mouseleave", h)))
            })), s("beforeTransitionStart", ((e, t, i) => {
                n.autoplay.running && (i || !n.params.autoplay.disableOnInteraction ? n.autoplay.pause(t) : c())
            })), s("sliderFirstMove", (() => {
                n.autoplay.running && (n.params.autoplay.disableOnInteraction ? c() : d())
            })), s("touchEnd", (() => {
                n.params.cssMode && n.autoplay.paused && !n.params.autoplay.disableOnInteraction && a()
            })), s("destroy", (() => {
                n.$el.off("mouseenter", f), n.$el.off("mouseleave", h), n.autoplay.running && c(), r().removeEventListener("visibilitychange", u)
            })), Object.assign(n.autoplay, {
                pause: d,
                run: a,
                start: l,
                stop: c
            })
        }

        function ne(e) {
            let {
                swiper: t,
                extendParams: n,
                on: i
            } = e;
            n({
                thumbs: {
                    swiper: null,
                    multipleActiveThumbs: !0,
                    autoScrollOffset: 0,
                    slideThumbActiveClass: "swiper-slide-thumb-active",
                    thumbsContainerClass: "swiper-thumbs"
                }
            });
            let s = !1,
                r = !1;

            function o() {
                const e = t.thumbs.swiper;
                if (!e || e.destroyed) return;
                const n = e.clickedIndex,
                    i = e.clickedSlide;
                if (i && m(i).hasClass(t.params.thumbs.slideThumbActiveClass)) return;
                if (null == n) return;
                let s;
                if (s = e.params.loop ? parseInt(m(e.clickedSlide).attr("data-swiper-slide-index"), 10) : n, t.params.loop) {
                    let e = t.activeIndex;
                    t.slides.eq(e).hasClass(t.params.slideDuplicateClass) && (t.loopFix(), t._clientLeft = t.$wrapperEl[0].clientLeft, e = t.activeIndex);
                    const n = t.slides.eq(e).prevAll(`[data-swiper-slide-index="${s}"]`).eq(0).index(),
                        i = t.slides.eq(e).nextAll(`[data-swiper-slide-index="${s}"]`).eq(0).index();
                    s = void 0 === n ? i : void 0 === i ? n : i - e < e - n ? i : n
                }
                t.slideTo(s)
            }

            function a() {
                const {
                    thumbs: e
                } = t.params;
                if (s) return !1;
                s = !0;
                const n = t.constructor;
                if (e.swiper instanceof n) t.thumbs.swiper = e.swiper, Object.assign(t.thumbs.swiper.originalParams, {
                    watchSlidesProgress: !0,
                    slideToClickedSlide: !1
                }), Object.assign(t.thumbs.swiper.params, {
                    watchSlidesProgress: !0,
                    slideToClickedSlide: !1
                });
                else if (b(e.swiper)) {
                    const i = Object.assign({}, e.swiper);
                    Object.assign(i, {
                        watchSlidesProgress: !0,
                        slideToClickedSlide: !1
                    }), t.thumbs.swiper = new n(i), r = !0
                }
                return t.thumbs.swiper.$el.addClass(t.params.thumbs.thumbsContainerClass), t.thumbs.swiper.on("tap", o), !0
            }

            function l(e) {
                const n = t.thumbs.swiper;
                if (!n || n.destroyed) return;
                const i = "auto" === n.params.slidesPerView ? n.slidesPerViewDynamic() : n.params.slidesPerView,
                    s = t.params.thumbs.autoScrollOffset,
                    r = s && !n.params.loop;
                if (t.realIndex !== n.realIndex || r) {
                    let o, a, l = n.activeIndex;
                    if (n.params.loop) {
                        n.slides.eq(l).hasClass(n.params.slideDuplicateClass) && (n.loopFix(), n._clientLeft = n.$wrapperEl[0].clientLeft, l = n.activeIndex);
                        const e = n.slides.eq(l).prevAll(`[data-swiper-slide-index="${t.realIndex}"]`).eq(0).index(),
                            i = n.slides.eq(l).nextAll(`[data-swiper-slide-index="${t.realIndex}"]`).eq(0).index();
                        o = void 0 === e ? i : void 0 === i ? e : i - l == l - e ? n.params.slidesPerGroup > 1 ? i : l : i - l < l - e ? i : e, a = t.activeIndex > t.previousIndex ? "next" : "prev"
                    } else o = t.realIndex, a = o > t.previousIndex ? "next" : "prev";
                    r && (o += "next" === a ? s : -1 * s), n.visibleSlidesIndexes && n.visibleSlidesIndexes.indexOf(o) < 0 && (n.params.centeredSlides ? o = o > l ? o - Math.floor(i / 2) + 1 : o + Math.floor(i / 2) - 1 : o > l && n.params.slidesPerGroup, n.slideTo(o, e ? 0 : void 0))
                }
                let o = 1;
                const a = t.params.thumbs.slideThumbActiveClass;
                if (t.params.slidesPerView > 1 && !t.params.centeredSlides && (o = t.params.slidesPerView), t.params.thumbs.multipleActiveThumbs || (o = 1), o = Math.floor(o), n.slides.removeClass(a), n.params.loop || n.params.virtual && n.params.virtual.enabled)
                    for (let e = 0; e < o; e += 1) n.$wrapperEl.children(`[data-swiper-slide-index="${t.realIndex+e}"]`).addClass(a);
                else
                    for (let e = 0; e < o; e += 1) n.slides.eq(t.realIndex + e).addClass(a)
            }
            t.thumbs = {
                swiper: null
            }, i("beforeInit", (() => {
                const {
                    thumbs: e
                } = t.params;
                e && e.swiper && (a(), l(!0))
            })), i("slideChange update resize observerUpdate", (() => {
                l()
            })), i("setTransition", ((e, n) => {
                const i = t.thumbs.swiper;
                i && !i.destroyed && i.setTransition(n)
            })), i("beforeDestroy", (() => {
                const e = t.thumbs.swiper;
                e && !e.destroyed && r && e.destroy()
            })), Object.assign(t.thumbs, {
                init: a,
                update: l
            })
        }

        function ie(e) {
            let t, n, i, {
                swiper: s,
                extendParams: r
            } = e;
            r({
                grid: {
                    rows: 1,
                    fill: "column"
                }
            }), s.grid = {
                initSlides: e => {
                    const {
                        slidesPerView: r
                    } = s.params, {
                        rows: o,
                        fill: a
                    } = s.params.grid;
                    n = t / o, i = Math.floor(e / o), t = Math.floor(e / o) === e / o ? e : Math.ceil(e / o) * o, "auto" !== r && "row" === a && (t = Math.max(t, r * o))
                },
                updateSlide: (e, r, o, a) => {
                    const {
                        slidesPerGroup: l,
                        spaceBetween: c
                    } = s.params, {
                        rows: d,
                        fill: u
                    } = s.params.grid;
                    let p, f, h;
                    if ("row" === u && l > 1) {
                        const n = Math.floor(e / (l * d)),
                            i = e - d * l * n,
                            s = 0 === n ? l : Math.min(Math.ceil((o - n * d * l) / d), l);
                        h = Math.floor(i / s), f = i - h * s + n * l, p = f + h * t / d, r.css({
                            "-webkit-order": p,
                            order: p
                        })
                    } else "column" === u ? (f = Math.floor(e / d), h = e - f * d, (f > i || f === i && h === d - 1) && (h += 1, h >= d && (h = 0, f += 1))) : (h = Math.floor(e / n), f = e - h * n);
                    r.css(a("margin-top"), 0 !== h ? c && `${c}px` : "")
                },
                updateWrapperSize: (e, n, i) => {
                    const {
                        spaceBetween: r,
                        centeredSlides: o,
                        roundLengths: a
                    } = s.params, {
                        rows: l
                    } = s.params.grid;
                    if (s.virtualSize = (e + r) * t, s.virtualSize = Math.ceil(s.virtualSize / l) - r, s.$wrapperEl.css({
                            [i("width")]: `${s.virtualSize+r}px`
                        }), o) {
                        n.splice(0, n.length);
                        const e = [];
                        for (let t = 0; t < n.length; t += 1) {
                            let i = n[t];
                            a && (i = Math.floor(i)), n[t] < s.virtualSize + n[0] && e.push(i)
                        }
                        n.push(...e)
                    }
                }
            }
        }
        var se = i(708),
            re = i.n(se),
            oe = i(630),
            ae = i.n(oe),
            le = (i(213), "top"),
            ce = "bottom",
            de = "right",
            ue = "left",
            pe = "auto",
            fe = [le, ce, de, ue],
            he = "start",
            me = "end",
            ge = "clippingParents",
            ve = "viewport",
            be = "popper",
            ye = "reference",
            we = fe.reduce((function (e, t) {
                return e.concat([t + "-" + he, t + "-" + me])
            }), []),
            xe = [].concat(fe, [pe]).reduce((function (e, t) {
                return e.concat([t, t + "-" + he, t + "-" + me])
            }), []),
            _e = "beforeRead",
            Ce = "read",
            Ee = "afterRead",
            Te = "beforeMain",
            Se = "main",
            ke = "afterMain",
            Ae = "beforeWrite",
            Le = "write",
            Oe = "afterWrite",
            Pe = [_e, Ce, Ee, Te, Se, ke, Ae, Le, Oe];

        function De(e) {
            return e ? (e.nodeName || "").toLowerCase() : null
        }

        function Me(e) {
            if (null == e) return window;
            if ("[object Window]" !== e.toString()) {
                var t = e.ownerDocument;
                return t && t.defaultView || window
            }
            return e
        }

        function Ne(e) {
            return e instanceof Me(e).Element || e instanceof Element
        }

        function Ie(e) {
            return e instanceof Me(e).HTMLElement || e instanceof HTMLElement
        }

        function je(e) {
            return "undefined" != typeof ShadowRoot && (e instanceof Me(e).ShadowRoot || e instanceof ShadowRoot)
        }
        const $e = {
            name: "applyStyles",
            enabled: !0,
            phase: "write",
            fn: function (e) {
                var t = e.state;
                Object.keys(t.elements).forEach((function (e) {
                    var n = t.styles[e] || {},
                        i = t.attributes[e] || {},
                        s = t.elements[e];
                    Ie(s) && De(s) && (Object.assign(s.style, n), Object.keys(i).forEach((function (e) {
                        var t = i[e];
                        !1 === t ? s.removeAttribute(e) : s.setAttribute(e, !0 === t ? "" : t)
                    })))
                }))
            },
            effect: function (e) {
                var t = e.state,
                    n = {
                        popper: {
                            position: t.options.strategy,
                            left: "0",
                            top: "0",
                            margin: "0"
                        },
                        arrow: {
                            position: "absolute"
                        },
                        reference: {}
                    };
                return Object.assign(t.elements.popper.style, n.popper), t.styles = n, t.elements.arrow && Object.assign(t.elements.arrow.style, n.arrow),
                    function () {
                        Object.keys(t.elements).forEach((function (e) {
                            var i = t.elements[e],
                                s = t.attributes[e] || {},
                                r = Object.keys(t.styles.hasOwnProperty(e) ? t.styles[e] : n[e]).reduce((function (e, t) {
                                    return e[t] = "", e
                                }), {});
                            Ie(i) && De(i) && (Object.assign(i.style, r), Object.keys(s).forEach((function (e) {
                                i.removeAttribute(e)
                            })))
                        }))
                    }
            },
            requires: ["computeStyles"]
        };

        function ze(e) {
            return e.split("-")[0]
        }
        var He = Math.max,
            Fe = Math.min,
            Be = Math.round;

        function qe(e, t) {
            void 0 === t && (t = !1);
            var n = e.getBoundingClientRect(),
                i = 1,
                s = 1;
            if (Ie(e) && t) {
                var r = e.offsetHeight,
                    o = e.offsetWidth;
                o > 0 && (i = Be(n.width) / o || 1), r > 0 && (s = Be(n.height) / r || 1)
            }
            return {
                width: n.width / i,
                height: n.height / s,
                top: n.top / s,
                right: n.right / i,
                bottom: n.bottom / s,
                left: n.left / i,
                x: n.left / i,
                y: n.top / s
            }
        }

        function Re(e) {
            var t = qe(e),
                n = e.offsetWidth,
                i = e.offsetHeight;
            return Math.abs(t.width - n) <= 1 && (n = t.width), Math.abs(t.height - i) <= 1 && (i = t.height), {
                x: e.offsetLeft,
                y: e.offsetTop,
                width: n,
                height: i
            }
        }

        function Ve(e, t) {
            var n = t.getRootNode && t.getRootNode();
            if (e.contains(t)) return !0;
            if (n && je(n)) {
                var i = t;
                do {
                    if (i && e.isSameNode(i)) return !0;
                    i = i.parentNode || i.host
                } while (i)
            }
            return !1
        }

        function We(e) {
            return Me(e).getComputedStyle(e)
        }

        function Ge(e) {
            return ["table", "td", "th"].indexOf(De(e)) >= 0
        }

        function Xe(e) {
            return ((Ne(e) ? e.ownerDocument : e.document) || window.document).documentElement
        }

        function Ue(e) {
            return "html" === De(e) ? e : e.assignedSlot || e.parentNode || (je(e) ? e.host : null) || Xe(e)
        }

        function Ye(e) {
            return Ie(e) && "fixed" !== We(e).position ? e.offsetParent : null
        }

        function Ke(e) {
            for (var t = Me(e), n = Ye(e); n && Ge(n) && "static" === We(n).position;) n = Ye(n);
            return n && ("html" === De(n) || "body" === De(n) && "static" === We(n).position) ? t : n || function (e) {
                var t = -1 !== navigator.userAgent.toLowerCase().indexOf("firefox");
                if (-1 !== navigator.userAgent.indexOf("Trident") && Ie(e) && "fixed" === We(e).position) return null;
                var n = Ue(e);
                for (je(n) && (n = n.host); Ie(n) && ["html", "body"].indexOf(De(n)) < 0;) {
                    var i = We(n);
                    if ("none" !== i.transform || "none" !== i.perspective || "paint" === i.contain || -1 !== ["transform", "perspective"].indexOf(i.willChange) || t && "filter" === i.willChange || t && i.filter && "none" !== i.filter) return n;
                    n = n.parentNode
                }
                return null
            }(e) || t
        }

        function Qe(e) {
            return ["top", "bottom"].indexOf(e) >= 0 ? "x" : "y"
        }

        function Je(e, t, n) {
            return He(e, Fe(t, n))
        }

        function Ze(e) {
            return Object.assign({}, {
                top: 0,
                right: 0,
                bottom: 0,
                left: 0
            }, e)
        }

        function et(e, t) {
            return t.reduce((function (t, n) {
                return t[n] = e, t
            }), {})
        }
        const tt = {
            name: "arrow",
            enabled: !0,
            phase: "main",
            fn: function (e) {
                var t, n = e.state,
                    i = e.name,
                    s = e.options,
                    r = n.elements.arrow,
                    o = n.modifiersData.popperOffsets,
                    a = ze(n.placement),
                    l = Qe(a),
                    c = [ue, de].indexOf(a) >= 0 ? "height" : "width";
                if (r && o) {
                    var d = function (e, t) {
                            return Ze("number" != typeof (e = "function" == typeof e ? e(Object.assign({}, t.rects, {
                                placement: t.placement
                            })) : e) ? e : et(e, fe))
                        }(s.padding, n),
                        u = Re(r),
                        p = "y" === l ? le : ue,
                        f = "y" === l ? ce : de,
                        h = n.rects.reference[c] + n.rects.reference[l] - o[l] - n.rects.popper[c],
                        m = o[l] - n.rects.reference[l],
                        g = Ke(r),
                        v = g ? "y" === l ? g.clientHeight || 0 : g.clientWidth || 0 : 0,
                        b = h / 2 - m / 2,
                        y = d[p],
                        w = v - u[c] - d[f],
                        x = v / 2 - u[c] / 2 + b,
                        _ = Je(y, x, w),
                        C = l;
                    n.modifiersData[i] = ((t = {})[C] = _, t.centerOffset = _ - x, t)
                }
            },
            effect: function (e) {
                var t = e.state,
                    n = e.options.element,
                    i = void 0 === n ? "[data-popper-arrow]" : n;
                null != i && ("string" != typeof i || (i = t.elements.popper.querySelector(i))) && Ve(t.elements.popper, i) && (t.elements.arrow = i)
            },
            requires: ["popperOffsets"],
            requiresIfExists: ["preventOverflow"]
        };

        function nt(e) {
            return e.split("-")[1]
        }
        var it = {
            top: "auto",
            right: "auto",
            bottom: "auto",
            left: "auto"
        };

        function st(e) {
            var t, n = e.popper,
                i = e.popperRect,
                s = e.placement,
                r = e.variation,
                o = e.offsets,
                a = e.position,
                l = e.gpuAcceleration,
                c = e.adaptive,
                d = e.roundOffsets,
                u = e.isFixed,
                p = o.x,
                f = void 0 === p ? 0 : p,
                h = o.y,
                m = void 0 === h ? 0 : h,
                g = "function" == typeof d ? d({
                    x: f,
                    y: m
                }) : {
                    x: f,
                    y: m
                };
            f = g.x, m = g.y;
            var v = o.hasOwnProperty("x"),
                b = o.hasOwnProperty("y"),
                y = ue,
                w = le,
                x = window;
            if (c) {
                var _ = Ke(n),
                    C = "clientHeight",
                    E = "clientWidth";
                _ === Me(n) && "static" !== We(_ = Xe(n)).position && "absolute" === a && (C = "scrollHeight", E = "scrollWidth"), (s === le || (s === ue || s === de) && r === me) && (w = ce, m -= (u && _ === x && x.visualViewport ? x.visualViewport.height : _[C]) - i.height, m *= l ? 1 : -1), s !== ue && (s !== le && s !== ce || r !== me) || (y = de, f -= (u && _ === x && x.visualViewport ? x.visualViewport.width : _[E]) - i.width, f *= l ? 1 : -1)
            }
            var T, S = Object.assign({
                    position: a
                }, c && it),
                k = !0 === d ? function (e) {
                    var t = e.x,
                        n = e.y,
                        i = window.devicePixelRatio || 1;
                    return {
                        x: Be(t * i) / i || 0,
                        y: Be(n * i) / i || 0
                    }
                }({
                    x: f,
                    y: m
                }) : {
                    x: f,
                    y: m
                };
            return f = k.x, m = k.y, l ? Object.assign({}, S, ((T = {})[w] = b ? "0" : "", T[y] = v ? "0" : "", T.transform = (x.devicePixelRatio || 1) <= 1 ? "translate(" + f + "px, " + m + "px)" : "translate3d(" + f + "px, " + m + "px, 0)", T)) : Object.assign({}, S, ((t = {})[w] = b ? m + "px" : "", t[y] = v ? f + "px" : "", t.transform = "", t))
        }
        const rt = {
            name: "computeStyles",
            enabled: !0,
            phase: "beforeWrite",
            fn: function (e) {
                var t = e.state,
                    n = e.options,
                    i = n.gpuAcceleration,
                    s = void 0 === i || i,
                    r = n.adaptive,
                    o = void 0 === r || r,
                    a = n.roundOffsets,
                    l = void 0 === a || a,
                    c = {
                        placement: ze(t.placement),
                        variation: nt(t.placement),
                        popper: t.elements.popper,
                        popperRect: t.rects.popper,
                        gpuAcceleration: s,
                        isFixed: "fixed" === t.options.strategy
                    };
                null != t.modifiersData.popperOffsets && (t.styles.popper = Object.assign({}, t.styles.popper, st(Object.assign({}, c, {
                    offsets: t.modifiersData.popperOffsets,
                    position: t.options.strategy,
                    adaptive: o,
                    roundOffsets: l
                })))), null != t.modifiersData.arrow && (t.styles.arrow = Object.assign({}, t.styles.arrow, st(Object.assign({}, c, {
                    offsets: t.modifiersData.arrow,
                    position: "absolute",
                    adaptive: !1,
                    roundOffsets: l
                })))), t.attributes.popper = Object.assign({}, t.attributes.popper, {
                    "data-popper-placement": t.placement
                })
            },
            data: {}
        };
        var ot = {
            passive: !0
        };
        const at = {
            name: "eventListeners",
            enabled: !0,
            phase: "write",
            fn: function () {},
            effect: function (e) {
                var t = e.state,
                    n = e.instance,
                    i = e.options,
                    s = i.scroll,
                    r = void 0 === s || s,
                    o = i.resize,
                    a = void 0 === o || o,
                    l = Me(t.elements.popper),
                    c = [].concat(t.scrollParents.reference, t.scrollParents.popper);
                return r && c.forEach((function (e) {
                        e.addEventListener("scroll", n.update, ot)
                    })), a && l.addEventListener("resize", n.update, ot),
                    function () {
                        r && c.forEach((function (e) {
                            e.removeEventListener("scroll", n.update, ot)
                        })), a && l.removeEventListener("resize", n.update, ot)
                    }
            },
            data: {}
        };
        var lt = {
            left: "right",
            right: "left",
            bottom: "top",
            top: "bottom"
        };

        function ct(e) {
            return e.replace(/left|right|bottom|top/g, (function (e) {
                return lt[e]
            }))
        }
        var dt = {
            start: "end",
            end: "start"
        };

        function ut(e) {
            return e.replace(/start|end/g, (function (e) {
                return dt[e]
            }))
        }

        function pt(e) {
            var t = Me(e);
            return {
                scrollLeft: t.pageXOffset,
                scrollTop: t.pageYOffset
            }
        }

        function ft(e) {
            return qe(Xe(e)).left + pt(e).scrollLeft
        }

        function ht(e) {
            var t = We(e),
                n = t.overflow,
                i = t.overflowX,
                s = t.overflowY;
            return /auto|scroll|overlay|hidden/.test(n + s + i)
        }

        function mt(e) {
            return ["html", "body", "#document"].indexOf(De(e)) >= 0 ? e.ownerDocument.body : Ie(e) && ht(e) ? e : mt(Ue(e))
        }

        function gt(e, t) {
            var n;
            void 0 === t && (t = []);
            var i = mt(e),
                s = i === (null == (n = e.ownerDocument) ? void 0 : n.body),
                r = Me(i),
                o = s ? [r].concat(r.visualViewport || [], ht(i) ? i : []) : i,
                a = t.concat(o);
            return s ? a : a.concat(gt(Ue(o)))
        }

        function vt(e) {
            return Object.assign({}, e, {
                left: e.x,
                top: e.y,
                right: e.x + e.width,
                bottom: e.y + e.height
            })
        }

        function bt(e, t) {
            return t === ve ? vt(function (e) {
                var t = Me(e),
                    n = Xe(e),
                    i = t.visualViewport,
                    s = n.clientWidth,
                    r = n.clientHeight,
                    o = 0,
                    a = 0;
                return i && (s = i.width, r = i.height, /^((?!chrome|android).)*safari/i.test(navigator.userAgent) || (o = i.offsetLeft, a = i.offsetTop)), {
                    width: s,
                    height: r,
                    x: o + ft(e),
                    y: a
                }
            }(e)) : Ne(t) ? function (e) {
                var t = qe(e);
                return t.top = t.top + e.clientTop, t.left = t.left + e.clientLeft, t.bottom = t.top + e.clientHeight, t.right = t.left + e.clientWidth, t.width = e.clientWidth, t.height = e.clientHeight, t.x = t.left, t.y = t.top, t
            }(t) : vt(function (e) {
                var t, n = Xe(e),
                    i = pt(e),
                    s = null == (t = e.ownerDocument) ? void 0 : t.body,
                    r = He(n.scrollWidth, n.clientWidth, s ? s.scrollWidth : 0, s ? s.clientWidth : 0),
                    o = He(n.scrollHeight, n.clientHeight, s ? s.scrollHeight : 0, s ? s.clientHeight : 0),
                    a = -i.scrollLeft + ft(e),
                    l = -i.scrollTop;
                return "rtl" === We(s || n).direction && (a += He(n.clientWidth, s ? s.clientWidth : 0) - r), {
                    width: r,
                    height: o,
                    x: a,
                    y: l
                }
            }(Xe(e)))
        }

        function yt(e) {
            var t, n = e.reference,
                i = e.element,
                s = e.placement,
                r = s ? ze(s) : null,
                o = s ? nt(s) : null,
                a = n.x + n.width / 2 - i.width / 2,
                l = n.y + n.height / 2 - i.height / 2;
            switch (r) {
                case le:
                    t = {
                        x: a,
                        y: n.y - i.height
                    };
                    break;
                case ce:
                    t = {
                        x: a,
                        y: n.y + n.height
                    };
                    break;
                case de:
                    t = {
                        x: n.x + n.width,
                        y: l
                    };
                    break;
                case ue:
                    t = {
                        x: n.x - i.width,
                        y: l
                    };
                    break;
                default:
                    t = {
                        x: n.x,
                        y: n.y
                    }
            }
            var c = r ? Qe(r) : null;
            if (null != c) {
                var d = "y" === c ? "height" : "width";
                switch (o) {
                    case he:
                        t[c] = t[c] - (n[d] / 2 - i[d] / 2);
                        break;
                    case me:
                        t[c] = t[c] + (n[d] / 2 - i[d] / 2)
                }
            }
            return t
        }

        function wt(e, t) {
            void 0 === t && (t = {});
            var n = t,
                i = n.placement,
                s = void 0 === i ? e.placement : i,
                r = n.boundary,
                o = void 0 === r ? ge : r,
                a = n.rootBoundary,
                l = void 0 === a ? ve : a,
                c = n.elementContext,
                d = void 0 === c ? be : c,
                u = n.altBoundary,
                p = void 0 !== u && u,
                f = n.padding,
                h = void 0 === f ? 0 : f,
                m = Ze("number" != typeof h ? h : et(h, fe)),
                g = d === be ? ye : be,
                v = e.rects.popper,
                b = e.elements[p ? g : d],
                y = function (e, t, n) {
                    var i = "clippingParents" === t ? function (e) {
                            var t = gt(Ue(e)),
                                n = ["absolute", "fixed"].indexOf(We(e).position) >= 0 && Ie(e) ? Ke(e) : e;
                            return Ne(n) ? t.filter((function (e) {
                                return Ne(e) && Ve(e, n) && "body" !== De(e)
                            })) : []
                        }(e) : [].concat(t),
                        s = [].concat(i, [n]),
                        r = s[0],
                        o = s.reduce((function (t, n) {
                            var i = bt(e, n);
                            return t.top = He(i.top, t.top), t.right = Fe(i.right, t.right), t.bottom = Fe(i.bottom, t.bottom), t.left = He(i.left, t.left), t
                        }), bt(e, r));
                    return o.width = o.right - o.left, o.height = o.bottom - o.top, o.x = o.left, o.y = o.top, o
                }(Ne(b) ? b : b.contextElement || Xe(e.elements.popper), o, l),
                w = qe(e.elements.reference),
                x = yt({
                    reference: w,
                    element: v,
                    strategy: "absolute",
                    placement: s
                }),
                _ = vt(Object.assign({}, v, x)),
                C = d === be ? _ : w,
                E = {
                    top: y.top - C.top + m.top,
                    bottom: C.bottom - y.bottom + m.bottom,
                    left: y.left - C.left + m.left,
                    right: C.right - y.right + m.right
                },
                T = e.modifiersData.offset;
            if (d === be && T) {
                var S = T[s];
                Object.keys(E).forEach((function (e) {
                    var t = [de, ce].indexOf(e) >= 0 ? 1 : -1,
                        n = [le, ce].indexOf(e) >= 0 ? "y" : "x";
                    E[e] += S[n] * t
                }))
            }
            return E
        }
        const xt = {
            name: "flip",
            enabled: !0,
            phase: "main",
            fn: function (e) {
                var t = e.state,
                    n = e.options,
                    i = e.name;
                if (!t.modifiersData[i]._skip) {
                    for (var s = n.mainAxis, r = void 0 === s || s, o = n.altAxis, a = void 0 === o || o, l = n.fallbackPlacements, c = n.padding, d = n.boundary, u = n.rootBoundary, p = n.altBoundary, f = n.flipVariations, h = void 0 === f || f, m = n.allowedAutoPlacements, g = t.options.placement, v = ze(g), b = l || (v !== g && h ? function (e) {
                            if (ze(e) === pe) return [];
                            var t = ct(e);
                            return [ut(e), t, ut(t)]
                        }(g) : [ct(g)]), y = [g].concat(b).reduce((function (e, n) {
                            return e.concat(ze(n) === pe ? function (e, t) {
                                void 0 === t && (t = {});
                                var n = t,
                                    i = n.placement,
                                    s = n.boundary,
                                    r = n.rootBoundary,
                                    o = n.padding,
                                    a = n.flipVariations,
                                    l = n.allowedAutoPlacements,
                                    c = void 0 === l ? xe : l,
                                    d = nt(i),
                                    u = d ? a ? we : we.filter((function (e) {
                                        return nt(e) === d
                                    })) : fe,
                                    p = u.filter((function (e) {
                                        return c.indexOf(e) >= 0
                                    }));
                                0 === p.length && (p = u);
                                var f = p.reduce((function (t, n) {
                                    return t[n] = wt(e, {
                                        placement: n,
                                        boundary: s,
                                        rootBoundary: r,
                                        padding: o
                                    })[ze(n)], t
                                }), {});
                                return Object.keys(f).sort((function (e, t) {
                                    return f[e] - f[t]
                                }))
                            }(t, {
                                placement: n,
                                boundary: d,
                                rootBoundary: u,
                                padding: c,
                                flipVariations: h,
                                allowedAutoPlacements: m
                            }) : n)
                        }), []), w = t.rects.reference, x = t.rects.popper, _ = new Map, C = !0, E = y[0], T = 0; T < y.length; T++) {
                        var S = y[T],
                            k = ze(S),
                            A = nt(S) === he,
                            L = [le, ce].indexOf(k) >= 0,
                            O = L ? "width" : "height",
                            P = wt(t, {
                                placement: S,
                                boundary: d,
                                rootBoundary: u,
                                altBoundary: p,
                                padding: c
                            }),
                            D = L ? A ? de : ue : A ? ce : le;
                        w[O] > x[O] && (D = ct(D));
                        var M = ct(D),
                            N = [];
                        if (r && N.push(P[k] <= 0), a && N.push(P[D] <= 0, P[M] <= 0), N.every((function (e) {
                                return e
                            }))) {
                            E = S, C = !1;
                            break
                        }
                        _.set(S, N)
                    }
                    if (C)
                        for (var I = function (e) {
                                var t = y.find((function (t) {
                                    var n = _.get(t);
                                    if (n) return n.slice(0, e).every((function (e) {
                                        return e
                                    }))
                                }));
                                if (t) return E = t, "break"
                            }, j = h ? 3 : 1; j > 0 && "break" !== I(j); j--);
                    t.placement !== E && (t.modifiersData[i]._skip = !0, t.placement = E, t.reset = !0)
                }
            },
            requiresIfExists: ["offset"],
            data: {
                _skip: !1
            }
        };

        function _t(e, t, n) {
            return void 0 === n && (n = {
                x: 0,
                y: 0
            }), {
                top: e.top - t.height - n.y,
                right: e.right - t.width + n.x,
                bottom: e.bottom - t.height + n.y,
                left: e.left - t.width - n.x
            }
        }

        function Ct(e) {
            return [le, de, ce, ue].some((function (t) {
                return e[t] >= 0
            }))
        }
        const Et = {
                name: "hide",
                enabled: !0,
                phase: "main",
                requiresIfExists: ["preventOverflow"],
                fn: function (e) {
                    var t = e.state,
                        n = e.name,
                        i = t.rects.reference,
                        s = t.rects.popper,
                        r = t.modifiersData.preventOverflow,
                        o = wt(t, {
                            elementContext: "reference"
                        }),
                        a = wt(t, {
                            altBoundary: !0
                        }),
                        l = _t(o, i),
                        c = _t(a, s, r),
                        d = Ct(l),
                        u = Ct(c);
                    t.modifiersData[n] = {
                        referenceClippingOffsets: l,
                        popperEscapeOffsets: c,
                        isReferenceHidden: d,
                        hasPopperEscaped: u
                    }, t.attributes.popper = Object.assign({}, t.attributes.popper, {
                        "data-popper-reference-hidden": d,
                        "data-popper-escaped": u
                    })
                }
            },
            Tt = {
                name: "offset",
                enabled: !0,
                phase: "main",
                requires: ["popperOffsets"],
                fn: function (e) {
                    var t = e.state,
                        n = e.options,
                        i = e.name,
                        s = n.offset,
                        r = void 0 === s ? [0, 0] : s,
                        o = xe.reduce((function (e, n) {
                            return e[n] = function (e, t, n) {
                                var i = ze(e),
                                    s = [ue, le].indexOf(i) >= 0 ? -1 : 1,
                                    r = "function" == typeof n ? n(Object.assign({}, t, {
                                        placement: e
                                    })) : n,
                                    o = r[0],
                                    a = r[1];
                                return o = o || 0, a = (a || 0) * s, [ue, de].indexOf(i) >= 0 ? {
                                    x: a,
                                    y: o
                                } : {
                                    x: o,
                                    y: a
                                }
                            }(n, t.rects, r), e
                        }), {}),
                        a = o[t.placement],
                        l = a.x,
                        c = a.y;
                    null != t.modifiersData.popperOffsets && (t.modifiersData.popperOffsets.x += l, t.modifiersData.popperOffsets.y += c), t.modifiersData[i] = o
                }
            },
            St = {
                name: "popperOffsets",
                enabled: !0,
                phase: "read",
                fn: function (e) {
                    var t = e.state,
                        n = e.name;
                    t.modifiersData[n] = yt({
                        reference: t.rects.reference,
                        element: t.rects.popper,
                        strategy: "absolute",
                        placement: t.placement
                    })
                },
                data: {}
            },
            kt = {
                name: "preventOverflow",
                enabled: !0,
                phase: "main",
                fn: function (e) {
                    var t = e.state,
                        n = e.options,
                        i = e.name,
                        s = n.mainAxis,
                        r = void 0 === s || s,
                        o = n.altAxis,
                        a = void 0 !== o && o,
                        l = n.boundary,
                        c = n.rootBoundary,
                        d = n.altBoundary,
                        u = n.padding,
                        p = n.tether,
                        f = void 0 === p || p,
                        h = n.tetherOffset,
                        m = void 0 === h ? 0 : h,
                        g = wt(t, {
                            boundary: l,
                            rootBoundary: c,
                            padding: u,
                            altBoundary: d
                        }),
                        v = ze(t.placement),
                        b = nt(t.placement),
                        y = !b,
                        w = Qe(v),
                        x = "x" === w ? "y" : "x",
                        _ = t.modifiersData.popperOffsets,
                        C = t.rects.reference,
                        E = t.rects.popper,
                        T = "function" == typeof m ? m(Object.assign({}, t.rects, {
                            placement: t.placement
                        })) : m,
                        S = "number" == typeof T ? {
                            mainAxis: T,
                            altAxis: T
                        } : Object.assign({
                            mainAxis: 0,
                            altAxis: 0
                        }, T),
                        k = t.modifiersData.offset ? t.modifiersData.offset[t.placement] : null,
                        A = {
                            x: 0,
                            y: 0
                        };
                    if (_) {
                        if (r) {
                            var L, O = "y" === w ? le : ue,
                                P = "y" === w ? ce : de,
                                D = "y" === w ? "height" : "width",
                                M = _[w],
                                N = M + g[O],
                                I = M - g[P],
                                j = f ? -E[D] / 2 : 0,
                                $ = b === he ? C[D] : E[D],
                                z = b === he ? -E[D] : -C[D],
                                H = t.elements.arrow,
                                F = f && H ? Re(H) : {
                                    width: 0,
                                    height: 0
                                },
                                B = t.modifiersData["arrow#persistent"] ? t.modifiersData["arrow#persistent"].padding : {
                                    top: 0,
                                    right: 0,
                                    bottom: 0,
                                    left: 0
                                },
                                q = B[O],
                                R = B[P],
                                V = Je(0, C[D], F[D]),
                                W = y ? C[D] / 2 - j - V - q - S.mainAxis : $ - V - q - S.mainAxis,
                                G = y ? -C[D] / 2 + j + V + R + S.mainAxis : z + V + R + S.mainAxis,
                                X = t.elements.arrow && Ke(t.elements.arrow),
                                U = X ? "y" === w ? X.clientTop || 0 : X.clientLeft || 0 : 0,
                                Y = null != (L = null == k ? void 0 : k[w]) ? L : 0,
                                K = M + G - Y,
                                Q = Je(f ? Fe(N, M + W - Y - U) : N, M, f ? He(I, K) : I);
                            _[w] = Q, A[w] = Q - M
                        }
                        if (a) {
                            var J, Z = "x" === w ? le : ue,
                                ee = "x" === w ? ce : de,
                                te = _[x],
                                ne = "y" === x ? "height" : "width",
                                ie = te + g[Z],
                                se = te - g[ee],
                                re = -1 !== [le, ue].indexOf(v),
                                oe = null != (J = null == k ? void 0 : k[x]) ? J : 0,
                                ae = re ? ie : te - C[ne] - E[ne] - oe + S.altAxis,
                                pe = re ? te + C[ne] + E[ne] - oe - S.altAxis : se,
                                fe = f && re ? function (e, t, n) {
                                    var i = Je(e, t, n);
                                    return i > n ? n : i
                                }(ae, te, pe) : Je(f ? ae : ie, te, f ? pe : se);
                            _[x] = fe, A[x] = fe - te
                        }
                        t.modifiersData[i] = A
                    }
                },
                requiresIfExists: ["offset"]
            };

        function At(e, t, n) {
            void 0 === n && (n = !1);
            var i, s, r = Ie(t),
                o = Ie(t) && function (e) {
                    var t = e.getBoundingClientRect(),
                        n = Be(t.width) / e.offsetWidth || 1,
                        i = Be(t.height) / e.offsetHeight || 1;
                    return 1 !== n || 1 !== i
                }(t),
                a = Xe(t),
                l = qe(e, o),
                c = {
                    scrollLeft: 0,
                    scrollTop: 0
                },
                d = {
                    x: 0,
                    y: 0
                };
            return (r || !r && !n) && (("body" !== De(t) || ht(a)) && (c = (i = t) !== Me(i) && Ie(i) ? {
                scrollLeft: (s = i).scrollLeft,
                scrollTop: s.scrollTop
            } : pt(i)), Ie(t) ? ((d = qe(t, !0)).x += t.clientLeft, d.y += t.clientTop) : a && (d.x = ft(a))), {
                x: l.left + c.scrollLeft - d.x,
                y: l.top + c.scrollTop - d.y,
                width: l.width,
                height: l.height
            }
        }

        function Lt(e) {
            var t = new Map,
                n = new Set,
                i = [];

            function s(e) {
                n.add(e.name), [].concat(e.requires || [], e.requiresIfExists || []).forEach((function (e) {
                    if (!n.has(e)) {
                        var i = t.get(e);
                        i && s(i)
                    }
                })), i.push(e)
            }
            return e.forEach((function (e) {
                t.set(e.name, e)
            })), e.forEach((function (e) {
                n.has(e.name) || s(e)
            })), i
        }
        var Ot = {
            placement: "bottom",
            modifiers: [],
            strategy: "absolute"
        };

        function Pt() {
            for (var e = arguments.length, t = new Array(e), n = 0; n < e; n++) t[n] = arguments[n];
            return !t.some((function (e) {
                return !(e && "function" == typeof e.getBoundingClientRect)
            }))
        }

        function Dt(e) {
            void 0 === e && (e = {});
            var t = e,
                n = t.defaultModifiers,
                i = void 0 === n ? [] : n,
                s = t.defaultOptions,
                r = void 0 === s ? Ot : s;
            return function (e, t, n) {
                void 0 === n && (n = r);
                var s, o, a = {
                        placement: "bottom",
                        orderedModifiers: [],
                        options: Object.assign({}, Ot, r),
                        modifiersData: {},
                        elements: {
                            reference: e,
                            popper: t
                        },
                        attributes: {},
                        styles: {}
                    },
                    l = [],
                    c = !1,
                    d = {
                        state: a,
                        setOptions: function (n) {
                            var s = "function" == typeof n ? n(a.options) : n;
                            u(), a.options = Object.assign({}, r, a.options, s), a.scrollParents = {
                                reference: Ne(e) ? gt(e) : e.contextElement ? gt(e.contextElement) : [],
                                popper: gt(t)
                            };
                            var o, c, p = function (e) {
                                var t = Lt(e);
                                return Pe.reduce((function (e, n) {
                                    return e.concat(t.filter((function (e) {
                                        return e.phase === n
                                    })))
                                }), [])
                            }((o = [].concat(i, a.options.modifiers), c = o.reduce((function (e, t) {
                                var n = e[t.name];
                                return e[t.name] = n ? Object.assign({}, n, t, {
                                    options: Object.assign({}, n.options, t.options),
                                    data: Object.assign({}, n.data, t.data)
                                }) : t, e
                            }), {}), Object.keys(c).map((function (e) {
                                return c[e]
                            }))));
                            return a.orderedModifiers = p.filter((function (e) {
                                return e.enabled
                            })), a.orderedModifiers.forEach((function (e) {
                                var t = e.name,
                                    n = e.options,
                                    i = void 0 === n ? {} : n,
                                    s = e.effect;
                                if ("function" == typeof s) {
                                    var r = s({
                                        state: a,
                                        name: t,
                                        instance: d,
                                        options: i
                                    });
                                    l.push(r || function () {})
                                }
                            })), d.update()
                        },
                        forceUpdate: function () {
                            if (!c) {
                                var e = a.elements,
                                    t = e.reference,
                                    n = e.popper;
                                if (Pt(t, n)) {
                                    a.rects = {
                                        reference: At(t, Ke(n), "fixed" === a.options.strategy),
                                        popper: Re(n)
                                    }, a.reset = !1, a.placement = a.options.placement, a.orderedModifiers.forEach((function (e) {
                                        return a.modifiersData[e.name] = Object.assign({}, e.data)
                                    }));
                                    for (var i = 0; i < a.orderedModifiers.length; i++)
                                        if (!0 !== a.reset) {
                                            var s = a.orderedModifiers[i],
                                                r = s.fn,
                                                o = s.options,
                                                l = void 0 === o ? {} : o,
                                                u = s.name;
                                            "function" == typeof r && (a = r({
                                                state: a,
                                                options: l,
                                                name: u,
                                                instance: d
                                            }) || a)
                                        } else a.reset = !1, i = -1
                                }
                            }
                        },
                        update: (s = function () {
                            return new Promise((function (e) {
                                d.forceUpdate(), e(a)
                            }))
                        }, function () {
                            return o || (o = new Promise((function (e) {
                                Promise.resolve().then((function () {
                                    o = void 0, e(s())
                                }))
                            }))), o
                        }),
                        destroy: function () {
                            u(), c = !0
                        }
                    };
                if (!Pt(e, t)) return d;

                function u() {
                    l.forEach((function (e) {
                        return e()
                    })), l = []
                }
                return d.setOptions(n).then((function (e) {
                    !c && n.onFirstUpdate && n.onFirstUpdate(e)
                })), d
            }
        }
        var Mt = Dt(),
            Nt = Dt({
                defaultModifiers: [at, St, rt, $e, Tt, xt, kt, tt, Et]
            }),
            It = Dt({
                defaultModifiers: [at, St, rt, $e]
            });
        const jt = "transitionend",
            $t = e => {
                let t = e.getAttribute("data-bs-target");
                if (!t || "#" === t) {
                    let n = e.getAttribute("href");
                    if (!n || !n.includes("#") && !n.startsWith(".")) return null;
                    n.includes("#") && !n.startsWith("#") && (n = `#${n.split("#")[1]}`), t = n && "#" !== n ? n.trim() : null
                }
                return t
            },
            zt = e => {
                const t = $t(e);
                return t && document.querySelector(t) ? t : null
            },
            Ht = e => {
                const t = $t(e);
                return t ? document.querySelector(t) : null
            },
            Ft = e => {
                e.dispatchEvent(new Event(jt))
            },
            Bt = e => !(!e || "object" != typeof e) && (void 0 !== e.jquery && (e = e[0]), void 0 !== e.nodeType),
            qt = e => Bt(e) ? e.jquery ? e[0] : e : "string" == typeof e && e.length > 0 ? document.querySelector(e) : null,
            Rt = (e, t, n) => {
                Object.keys(n).forEach((i => {
                    const s = n[i],
                        r = t[i],
                        o = r && Bt(r) ? "element" : null == (a = r) ? `${a}` : {}.toString.call(a).match(/\s([a-z]+)/i)[1].toLowerCase();
                    var a;
                    if (!new RegExp(s).test(o)) throw new TypeError(`${e.toUpperCase()}: Option "${i}" provided type "${o}" but expected type "${s}".`)
                }))
            },
            Vt = e => !(!Bt(e) || 0 === e.getClientRects().length) && "visible" === getComputedStyle(e).getPropertyValue("visibility"),
            Wt = e => !e || e.nodeType !== Node.ELEMENT_NODE || !!e.classList.contains("disabled") || (void 0 !== e.disabled ? e.disabled : e.hasAttribute("disabled") && "false" !== e.getAttribute("disabled")),
            Gt = e => {
                if (!document.documentElement.attachShadow) return null;
                if ("function" == typeof e.getRootNode) {
                    const t = e.getRootNode();
                    return t instanceof ShadowRoot ? t : null
                }
                return e instanceof ShadowRoot ? e : e.parentNode ? Gt(e.parentNode) : null
            },
            Xt = () => {},
            Ut = e => {
                e.offsetHeight
            },
            Yt = () => {
                const {
                    jQuery: e
                } = window;
                return e && !document.body.hasAttribute("data-bs-no-jquery") ? e : null
            },
            Kt = [],
            Qt = () => "rtl" === document.documentElement.dir,
            Jt = e => {
                var t;
                t = () => {
                    const t = Yt();
                    if (t) {
                        const n = e.NAME,
                            i = t.fn[n];
                        t.fn[n] = e.jQueryInterface, t.fn[n].Constructor = e, t.fn[n].noConflict = () => (t.fn[n] = i, e.jQueryInterface)
                    }
                }, "loading" === document.readyState ? (Kt.length || document.addEventListener("DOMContentLoaded", (() => {
                    Kt.forEach((e => e()))
                })), Kt.push(t)) : t()
            },
            Zt = e => {
                "function" == typeof e && e()
            },
            en = (e, t, n = !0) => {
                if (!n) return void Zt(e);
                const i = (e => {
                    if (!e) return 0;
                    let {
                        transitionDuration: t,
                        transitionDelay: n
                    } = window.getComputedStyle(e);
                    const i = Number.parseFloat(t),
                        s = Number.parseFloat(n);
                    return i || s ? (t = t.split(",")[0], n = n.split(",")[0], 1e3 * (Number.parseFloat(t) + Number.parseFloat(n))) : 0
                })(t) + 5;
                let s = !1;
                const r = ({
                    target: n
                }) => {
                    n === t && (s = !0, t.removeEventListener(jt, r), Zt(e))
                };
                t.addEventListener(jt, r), setTimeout((() => {
                    s || Ft(t)
                }), i)
            },
            tn = (e, t, n, i) => {
                let s = e.indexOf(t);
                if (-1 === s) return e[!n && i ? e.length - 1 : 0];
                const r = e.length;
                return s += n ? 1 : -1, i && (s = (s + r) % r), e[Math.max(0, Math.min(s, r - 1))]
            },
            nn = /[^.]*(?=\..*)\.|.*/,
            sn = /\..*/,
            rn = /::\d+$/,
            on = {};
        let an = 1;
        const ln = {
                mouseenter: "mouseover",
                mouseleave: "mouseout"
            },
            cn = /^(mouseenter|mouseleave)/i,
            dn = new Set(["click", "dblclick", "mouseup", "mousedown", "contextmenu", "mousewheel", "DOMMouseScroll", "mouseover", "mouseout", "mousemove", "selectstart", "selectend", "keydown", "keypress", "keyup", "orientationchange", "touchstart", "touchmove", "touchend", "touchcancel", "pointerdown", "pointermove", "pointerup", "pointerleave", "pointercancel", "gesturestart", "gesturechange", "gestureend", "focus", "blur", "change", "reset", "select", "submit", "focusin", "focusout", "load", "unload", "beforeunload", "resize", "move", "DOMContentLoaded", "readystatechange", "error", "abort", "scroll"]);

        function un(e, t) {
            return t && `${t}::${an++}` || e.uidEvent || an++
        }

        function pn(e) {
            const t = un(e);
            return e.uidEvent = t, on[t] = on[t] || {}, on[t]
        }

        function fn(e, t, n = null) {
            const i = Object.keys(e);
            for (let s = 0, r = i.length; s < r; s++) {
                const r = e[i[s]];
                if (r.originalHandler === t && r.delegationSelector === n) return r
            }
            return null
        }

        function hn(e, t, n) {
            const i = "string" == typeof t,
                s = i ? n : t;
            let r = vn(e);
            return dn.has(r) || (r = e), [i, s, r]
        }

        function mn(e, t, n, i, s) {
            if ("string" != typeof t || !e) return;
            if (n || (n = i, i = null), cn.test(t)) {
                const e = e => function (t) {
                    if (!t.relatedTarget || t.relatedTarget !== t.delegateTarget && !t.delegateTarget.contains(t.relatedTarget)) return e.call(this, t)
                };
                i ? i = e(i) : n = e(n)
            }
            const [r, o, a] = hn(t, n, i), l = pn(e), c = l[a] || (l[a] = {}), d = fn(c, o, r ? n : null);
            if (d) return void(d.oneOff = d.oneOff && s);
            const u = un(o, t.replace(nn, "")),
                p = r ? function (e, t, n) {
                    return function i(s) {
                        const r = e.querySelectorAll(t);
                        for (let {
                                target: o
                            } = s; o && o !== this; o = o.parentNode)
                            for (let a = r.length; a--;)
                                if (r[a] === o) return s.delegateTarget = o, i.oneOff && bn.off(e, s.type, t, n), n.apply(o, [s]);
                        return null
                    }
                }(e, n, i) : function (e, t) {
                    return function n(i) {
                        return i.delegateTarget = e, n.oneOff && bn.off(e, i.type, t), t.apply(e, [i])
                    }
                }(e, n);
            p.delegationSelector = r ? n : null, p.originalHandler = o, p.oneOff = s, p.uidEvent = u, c[u] = p, e.addEventListener(a, p, r)
        }

        function gn(e, t, n, i, s) {
            const r = fn(t[n], i, s);
            r && (e.removeEventListener(n, r, Boolean(s)), delete t[n][r.uidEvent])
        }

        function vn(e) {
            return e = e.replace(sn, ""), ln[e] || e
        }
        const bn = {
                on(e, t, n, i) {
                    mn(e, t, n, i, !1)
                },
                one(e, t, n, i) {
                    mn(e, t, n, i, !0)
                },
                off(e, t, n, i) {
                    if ("string" != typeof t || !e) return;
                    const [s, r, o] = hn(t, n, i), a = o !== t, l = pn(e), c = t.startsWith(".");
                    if (void 0 !== r) {
                        if (!l || !l[o]) return;
                        return void gn(e, l, o, r, s ? n : null)
                    }
                    c && Object.keys(l).forEach((n => {
                        ! function (e, t, n, i) {
                            const s = t[n] || {};
                            Object.keys(s).forEach((r => {
                                if (r.includes(i)) {
                                    const i = s[r];
                                    gn(e, t, n, i.originalHandler, i.delegationSelector)
                                }
                            }))
                        }(e, l, n, t.slice(1))
                    }));
                    const d = l[o] || {};
                    Object.keys(d).forEach((n => {
                        const i = n.replace(rn, "");
                        if (!a || t.includes(i)) {
                            const t = d[n];
                            gn(e, l, o, t.originalHandler, t.delegationSelector)
                        }
                    }))
                },
                trigger(e, t, n) {
                    if ("string" != typeof t || !e) return null;
                    const i = Yt(),
                        s = vn(t),
                        r = t !== s,
                        o = dn.has(s);
                    let a, l = !0,
                        c = !0,
                        d = !1,
                        u = null;
                    return r && i && (a = i.Event(t, n), i(e).trigger(a), l = !a.isPropagationStopped(), c = !a.isImmediatePropagationStopped(), d = a.isDefaultPrevented()), o ? (u = document.createEvent("HTMLEvents"), u.initEvent(s, l, !0)) : u = new CustomEvent(t, {
                        bubbles: l,
                        cancelable: !0
                    }), void 0 !== n && Object.keys(n).forEach((e => {
                        Object.defineProperty(u, e, {
                            get: () => n[e]
                        })
                    })), d && u.preventDefault(), c && e.dispatchEvent(u), u.defaultPrevented && void 0 !== a && a.preventDefault(), u
                }
            },
            yn = new Map,
            wn = {
                set(e, t, n) {
                    yn.has(e) || yn.set(e, new Map);
                    const i = yn.get(e);
                    i.has(t) || 0 === i.size ? i.set(t, n) : console.error(`Bootstrap doesn't allow more than one instance per element. Bound instance: ${Array.from(i.keys())[0]}.`)
                },
                get: (e, t) => yn.has(e) && yn.get(e).get(t) || null,
                remove(e, t) {
                    if (!yn.has(e)) return;
                    const n = yn.get(e);
                    n.delete(t), 0 === n.size && yn.delete(e)
                }
            };
        class xn {
            constructor(e) {
                (e = qt(e)) && (this._element = e, wn.set(this._element, this.constructor.DATA_KEY, this))
            }
            dispose() {
                wn.remove(this._element, this.constructor.DATA_KEY), bn.off(this._element, this.constructor.EVENT_KEY), Object.getOwnPropertyNames(this).forEach((e => {
                    this[e] = null
                }))
            }
            _queueCallback(e, t, n = !0) {
                en(e, t, n)
            }
            static getInstance(e) {
                return wn.get(qt(e), this.DATA_KEY)
            }
            static getOrCreateInstance(e, t = {}) {
                return this.getInstance(e) || new this(e, "object" == typeof t ? t : null)
            }
            static get VERSION() {
                return "5.1.3"
            }
            static get NAME() {
                throw new Error('You have to implement the static method "NAME", for each component!')
            }
            static get DATA_KEY() {
                return `bs.${this.NAME}`
            }
            static get EVENT_KEY() {
                return `.${this.DATA_KEY}`
            }
        }
        const _n = (e, t = "hide") => {
            const n = `click.dismiss${e.EVENT_KEY}`,
                i = e.NAME;
            bn.on(document, n, `[data-bs-dismiss="${i}"]`, (function (n) {
                if (["A", "AREA"].includes(this.tagName) && n.preventDefault(), Wt(this)) return;
                const s = Ht(this) || this.closest(`.${i}`);
                e.getOrCreateInstance(s)[t]()
            }))
        };
        class Cn extends xn {
            static get NAME() {
                return "alert"
            }
            close() {
                if (bn.trigger(this._element, "close.bs.alert").defaultPrevented) return;
                this._element.classList.remove("show");
                const e = this._element.classList.contains("fade");
                this._queueCallback((() => this._destroyElement()), this._element, e)
            }
            _destroyElement() {
                this._element.remove(), bn.trigger(this._element, "closed.bs.alert"), this.dispose()
            }
            static jQueryInterface(e) {
                return this.each((function () {
                    const t = Cn.getOrCreateInstance(this);
                    if ("string" == typeof e) {
                        if (void 0 === t[e] || e.startsWith("_") || "constructor" === e) throw new TypeError(`No method named "${e}"`);
                        t[e](this)
                    }
                }))
            }
        }
        _n(Cn, "close"), Jt(Cn);
        const En = '[data-bs-toggle="button"]';
        class Tn extends xn {
            static get NAME() {
                return "button"
            }
            toggle() {
                this._element.setAttribute("aria-pressed", this._element.classList.toggle("active"))
            }
            static jQueryInterface(e) {
                return this.each((function () {
                    const t = Tn.getOrCreateInstance(this);
                    "toggle" === e && t[e]()
                }))
            }
        }

        function Sn(e) {
            return "true" === e || "false" !== e && (e === Number(e).toString() ? Number(e) : "" === e || "null" === e ? null : e)
        }

        function kn(e) {
            return e.replace(/[A-Z]/g, (e => `-${e.toLowerCase()}`))
        }
        bn.on(document, "click.bs.button.data-api", En, (e => {
            e.preventDefault();
            const t = e.target.closest(En);
            Tn.getOrCreateInstance(t).toggle()
        })), Jt(Tn);
        const An = {
                setDataAttribute(e, t, n) {
                    e.setAttribute(`data-bs-${kn(t)}`, n)
                },
                removeDataAttribute(e, t) {
                    e.removeAttribute(`data-bs-${kn(t)}`)
                },
                getDataAttributes(e) {
                    if (!e) return {};
                    const t = {};
                    return Object.keys(e.dataset).filter((e => e.startsWith("bs"))).forEach((n => {
                        let i = n.replace(/^bs/, "");
                        i = i.charAt(0).toLowerCase() + i.slice(1, i.length), t[i] = Sn(e.dataset[n])
                    })), t
                },
                getDataAttribute: (e, t) => Sn(e.getAttribute(`data-bs-${kn(t)}`)),
                offset(e) {
                    const t = e.getBoundingClientRect();
                    return {
                        top: t.top + window.pageYOffset,
                        left: t.left + window.pageXOffset
                    }
                },
                position: e => ({
                    top: e.offsetTop,
                    left: e.offsetLeft
                })
            },
            Ln = {
                find: (e, t = document.documentElement) => [].concat(...Element.prototype.querySelectorAll.call(t, e)),
                findOne: (e, t = document.documentElement) => Element.prototype.querySelector.call(t, e),
                children: (e, t) => [].concat(...e.children).filter((e => e.matches(t))),
                parents(e, t) {
                    const n = [];
                    let i = e.parentNode;
                    for (; i && i.nodeType === Node.ELEMENT_NODE && 3 !== i.nodeType;) i.matches(t) && n.push(i), i = i.parentNode;
                    return n
                },
                prev(e, t) {
                    let n = e.previousElementSibling;
                    for (; n;) {
                        if (n.matches(t)) return [n];
                        n = n.previousElementSibling
                    }
                    return []
                },
                next(e, t) {
                    let n = e.nextElementSibling;
                    for (; n;) {
                        if (n.matches(t)) return [n];
                        n = n.nextElementSibling
                    }
                    return []
                },
                focusableChildren(e) {
                    const t = ["a", "button", "input", "textarea", "select", "details", "[tabindex]", '[contenteditable="true"]'].map((e => `${e}:not([tabindex^="-"])`)).join(", ");
                    return this.find(t, e).filter((e => !Wt(e) && Vt(e)))
                }
            },
            On = "carousel",
            Pn = {
                interval: 5e3,
                keyboard: !0,
                slide: !1,
                pause: "hover",
                wrap: !0,
                touch: !0
            },
            Dn = {
                interval: "(number|boolean)",
                keyboard: "boolean",
                slide: "(boolean|string)",
                pause: "(string|boolean)",
                wrap: "boolean",
                touch: "boolean"
            },
            Mn = "next",
            Nn = "prev",
            In = "left",
            jn = "right",
            $n = {
                ArrowLeft: jn,
                ArrowRight: In
            },
            zn = "slid.bs.carousel",
            Hn = "active",
            Fn = ".active.carousel-item";
        class Bn extends xn {
            constructor(e, t) {
                super(e), this._items = null, this._interval = null, this._activeElement = null, this._isPaused = !1, this._isSliding = !1, this.touchTimeout = null, this.touchStartX = 0, this.touchDeltaX = 0, this._config = this._getConfig(t), this._indicatorsElement = Ln.findOne(".carousel-indicators", this._element), this._touchSupported = "ontouchstart" in document.documentElement || navigator.maxTouchPoints > 0, this._pointerEvent = Boolean(window.PointerEvent), this._addEventListeners()
            }
            static get Default() {
                return Pn
            }
            static get NAME() {
                return On
            }
            next() {
                this._slide(Mn)
            }
            nextWhenVisible() {
                !document.hidden && Vt(this._element) && this.next()
            }
            prev() {
                this._slide(Nn)
            }
            pause(e) {
                e || (this._isPaused = !0), Ln.findOne(".carousel-item-next, .carousel-item-prev", this._element) && (Ft(this._element), this.cycle(!0)), clearInterval(this._interval), this._interval = null
            }
            cycle(e) {
                e || (this._isPaused = !1), this._interval && (clearInterval(this._interval), this._interval = null), this._config && this._config.interval && !this._isPaused && (this._updateInterval(), this._interval = setInterval((document.visibilityState ? this.nextWhenVisible : this.next).bind(this), this._config.interval))
            }
            to(e) {
                this._activeElement = Ln.findOne(Fn, this._element);
                const t = this._getItemIndex(this._activeElement);
                if (e > this._items.length - 1 || e < 0) return;
                if (this._isSliding) return void bn.one(this._element, zn, (() => this.to(e)));
                if (t === e) return this.pause(), void this.cycle();
                const n = e > t ? Mn : Nn;
                this._slide(n, this._items[e])
            }
            _getConfig(e) {
                return e = {
                    ...Pn,
                    ...An.getDataAttributes(this._element),
                    ..."object" == typeof e ? e : {}
                }, Rt(On, e, Dn), e
            }
            _handleSwipe() {
                const e = Math.abs(this.touchDeltaX);
                if (e <= 40) return;
                const t = e / this.touchDeltaX;
                this.touchDeltaX = 0, t && this._slide(t > 0 ? jn : In)
            }
            _addEventListeners() {
                this._config.keyboard && bn.on(this._element, "keydown.bs.carousel", (e => this._keydown(e))), "hover" === this._config.pause && (bn.on(this._element, "mouseenter.bs.carousel", (e => this.pause(e))), bn.on(this._element, "mouseleave.bs.carousel", (e => this.cycle(e)))), this._config.touch && this._touchSupported && this._addTouchEventListeners()
            }
            _addTouchEventListeners() {
                const e = e => this._pointerEvent && ("pen" === e.pointerType || "touch" === e.pointerType),
                    t = t => {
                        e(t) ? this.touchStartX = t.clientX : this._pointerEvent || (this.touchStartX = t.touches[0].clientX)
                    },
                    n = e => {
                        this.touchDeltaX = e.touches && e.touches.length > 1 ? 0 : e.touches[0].clientX - this.touchStartX
                    },
                    i = t => {
                        e(t) && (this.touchDeltaX = t.clientX - this.touchStartX), this._handleSwipe(), "hover" === this._config.pause && (this.pause(), this.touchTimeout && clearTimeout(this.touchTimeout), this.touchTimeout = setTimeout((e => this.cycle(e)), 500 + this._config.interval))
                    };
                Ln.find(".carousel-item img", this._element).forEach((e => {
                    bn.on(e, "dragstart.bs.carousel", (e => e.preventDefault()))
                })), this._pointerEvent ? (bn.on(this._element, "pointerdown.bs.carousel", (e => t(e))), bn.on(this._element, "pointerup.bs.carousel", (e => i(e))), this._element.classList.add("pointer-event")) : (bn.on(this._element, "touchstart.bs.carousel", (e => t(e))), bn.on(this._element, "touchmove.bs.carousel", (e => n(e))), bn.on(this._element, "touchend.bs.carousel", (e => i(e))))
            }
            _keydown(e) {
                if (/input|textarea/i.test(e.target.tagName)) return;
                const t = $n[e.key];
                t && (e.preventDefault(), this._slide(t))
            }
            _getItemIndex(e) {
                return this._items = e && e.parentNode ? Ln.find(".carousel-item", e.parentNode) : [], this._items.indexOf(e)
            }
            _getItemByOrder(e, t) {
                const n = e === Mn;
                return tn(this._items, t, n, this._config.wrap)
            }
            _triggerSlideEvent(e, t) {
                const n = this._getItemIndex(e),
                    i = this._getItemIndex(Ln.findOne(Fn, this._element));
                return bn.trigger(this._element, "slide.bs.carousel", {
                    relatedTarget: e,
                    direction: t,
                    from: i,
                    to: n
                })
            }
            _setActiveIndicatorElement(e) {
                if (this._indicatorsElement) {
                    const t = Ln.findOne(".active", this._indicatorsElement);
                    t.classList.remove(Hn), t.removeAttribute("aria-current");
                    const n = Ln.find("[data-bs-target]", this._indicatorsElement);
                    for (let t = 0; t < n.length; t++)
                        if (Number.parseInt(n[t].getAttribute("data-bs-slide-to"), 10) === this._getItemIndex(e)) {
                            n[t].classList.add(Hn), n[t].setAttribute("aria-current", "true");
                            break
                        }
                }
            }
            _updateInterval() {
                const e = this._activeElement || Ln.findOne(Fn, this._element);
                if (!e) return;
                const t = Number.parseInt(e.getAttribute("data-bs-interval"), 10);
                t ? (this._config.defaultInterval = this._config.defaultInterval || this._config.interval, this._config.interval = t) : this._config.interval = this._config.defaultInterval || this._config.interval
            }
            _slide(e, t) {
                const n = this._directionToOrder(e),
                    i = Ln.findOne(Fn, this._element),
                    s = this._getItemIndex(i),
                    r = t || this._getItemByOrder(n, i),
                    o = this._getItemIndex(r),
                    a = Boolean(this._interval),
                    l = n === Mn,
                    c = l ? "carousel-item-start" : "carousel-item-end",
                    d = l ? "carousel-item-next" : "carousel-item-prev",
                    u = this._orderToDirection(n);
                if (r && r.classList.contains(Hn)) return void(this._isSliding = !1);
                if (this._isSliding) return;
                if (this._triggerSlideEvent(r, u).defaultPrevented) return;
                if (!i || !r) return;
                this._isSliding = !0, a && this.pause(), this._setActiveIndicatorElement(r), this._activeElement = r;
                const p = () => {
                    bn.trigger(this._element, zn, {
                        relatedTarget: r,
                        direction: u,
                        from: s,
                        to: o
                    })
                };
                if (this._element.classList.contains("slide")) {
                    r.classList.add(d), Ut(r), i.classList.add(c), r.classList.add(c);
                    const e = () => {
                        r.classList.remove(c, d), r.classList.add(Hn), i.classList.remove(Hn, d, c), this._isSliding = !1, setTimeout(p, 0)
                    };
                    this._queueCallback(e, i, !0)
                } else i.classList.remove(Hn), r.classList.add(Hn), this._isSliding = !1, p();
                a && this.cycle()
            }
            _directionToOrder(e) {
                return [jn, In].includes(e) ? Qt() ? e === In ? Nn : Mn : e === In ? Mn : Nn : e
            }
            _orderToDirection(e) {
                return [Mn, Nn].includes(e) ? Qt() ? e === Nn ? In : jn : e === Nn ? jn : In : e
            }
            static carouselInterface(e, t) {
                const n = Bn.getOrCreateInstance(e, t);
                let {
                    _config: i
                } = n;
                "object" == typeof t && (i = {
                    ...i,
                    ...t
                });
                const s = "string" == typeof t ? t : i.slide;
                if ("number" == typeof t) n.to(t);
                else if ("string" == typeof s) {
                    if (void 0 === n[s]) throw new TypeError(`No method named "${s}"`);
                    n[s]()
                } else i.interval && i.ride && (n.pause(), n.cycle())
            }
            static jQueryInterface(e) {
                return this.each((function () {
                    Bn.carouselInterface(this, e)
                }))
            }
            static dataApiClickHandler(e) {
                const t = Ht(this);
                if (!t || !t.classList.contains("carousel")) return;
                const n = {
                        ...An.getDataAttributes(t),
                        ...An.getDataAttributes(this)
                    },
                    i = this.getAttribute("data-bs-slide-to");
                i && (n.interval = !1), Bn.carouselInterface(t, n), i && Bn.getInstance(t).to(i), e.preventDefault()
            }
        }
        bn.on(document, "click.bs.carousel.data-api", "[data-bs-slide], [data-bs-slide-to]", Bn.dataApiClickHandler), bn.on(window, "load.bs.carousel.data-api", (() => {
            const e = Ln.find('[data-bs-ride="carousel"]');
            for (let t = 0, n = e.length; t < n; t++) Bn.carouselInterface(e[t], Bn.getInstance(e[t]))
        })), Jt(Bn);
        const qn = "collapse",
            Rn = {
                toggle: !0,
                parent: null
            },
            Vn = {
                toggle: "boolean",
                parent: "(null|element)"
            },
            Wn = "show",
            Gn = "collapse",
            Xn = "collapsing",
            Un = "collapsed",
            Yn = ":scope .collapse .collapse",
            Kn = '[data-bs-toggle="collapse"]';
        class Qn extends xn {
            constructor(e, t) {
                super(e), this._isTransitioning = !1, this._config = this._getConfig(t), this._triggerArray = [];
                const n = Ln.find(Kn);
                for (let e = 0, t = n.length; e < t; e++) {
                    const t = n[e],
                        i = zt(t),
                        s = Ln.find(i).filter((e => e === this._element));
                    null !== i && s.length && (this._selector = i, this._triggerArray.push(t))
                }
                this._initializeChildren(), this._config.parent || this._addAriaAndCollapsedClass(this._triggerArray, this._isShown()), this._config.toggle && this.toggle()
            }
            static get Default() {
                return Rn
            }
            static get NAME() {
                return qn
            }
            toggle() {
                this._isShown() ? this.hide() : this.show()
            }
            show() {
                if (this._isTransitioning || this._isShown()) return;
                let e, t = [];
                if (this._config.parent) {
                    const e = Ln.find(Yn, this._config.parent);
                    t = Ln.find(".collapse.show, .collapse.collapsing", this._config.parent).filter((t => !e.includes(t)))
                }
                const n = Ln.findOne(this._selector);
                if (t.length) {
                    const i = t.find((e => n !== e));
                    if (e = i ? Qn.getInstance(i) : null, e && e._isTransitioning) return
                }
                if (bn.trigger(this._element, "show.bs.collapse").defaultPrevented) return;
                t.forEach((t => {
                    n !== t && Qn.getOrCreateInstance(t, {
                        toggle: !1
                    }).hide(), e || wn.set(t, "bs.collapse", null)
                }));
                const i = this._getDimension();
                this._element.classList.remove(Gn), this._element.classList.add(Xn), this._element.style[i] = 0, this._addAriaAndCollapsedClass(this._triggerArray, !0), this._isTransitioning = !0;
                const s = `scroll${i[0].toUpperCase()+i.slice(1)}`;
                this._queueCallback((() => {
                    this._isTransitioning = !1, this._element.classList.remove(Xn), this._element.classList.add(Gn, Wn), this._element.style[i] = "", bn.trigger(this._element, "shown.bs.collapse")
                }), this._element, !0), this._element.style[i] = `${this._element[s]}px`
            }
            hide() {
                if (this._isTransitioning || !this._isShown()) return;
                if (bn.trigger(this._element, "hide.bs.collapse").defaultPrevented) return;
                const e = this._getDimension();
                this._element.style[e] = `${this._element.getBoundingClientRect()[e]}px`, Ut(this._element), this._element.classList.add(Xn), this._element.classList.remove(Gn, Wn);
                const t = this._triggerArray.length;
                for (let e = 0; e < t; e++) {
                    const t = this._triggerArray[e],
                        n = Ht(t);
                    n && !this._isShown(n) && this._addAriaAndCollapsedClass([t], !1)
                }
                this._isTransitioning = !0, this._element.style[e] = "", this._queueCallback((() => {
                    this._isTransitioning = !1, this._element.classList.remove(Xn), this._element.classList.add(Gn), bn.trigger(this._element, "hidden.bs.collapse")
                }), this._element, !0)
            }
            _isShown(e = this._element) {
                return e.classList.contains(Wn)
            }
            _getConfig(e) {
                return (e = {
                    ...Rn,
                    ...An.getDataAttributes(this._element),
                    ...e
                }).toggle = Boolean(e.toggle), e.parent = qt(e.parent), Rt(qn, e, Vn), e
            }
            _getDimension() {
                return this._element.classList.contains("collapse-horizontal") ? "width" : "height"
            }
            _initializeChildren() {
                if (!this._config.parent) return;
                const e = Ln.find(Yn, this._config.parent);
                Ln.find(Kn, this._config.parent).filter((t => !e.includes(t))).forEach((e => {
                    const t = Ht(e);
                    t && this._addAriaAndCollapsedClass([e], this._isShown(t))
                }))
            }
            _addAriaAndCollapsedClass(e, t) {
                e.length && e.forEach((e => {
                    t ? e.classList.remove(Un) : e.classList.add(Un), e.setAttribute("aria-expanded", t)
                }))
            }
            static jQueryInterface(e) {
                return this.each((function () {
                    const t = {};
                    "string" == typeof e && /show|hide/.test(e) && (t.toggle = !1);
                    const n = Qn.getOrCreateInstance(this, t);
                    if ("string" == typeof e) {
                        if (void 0 === n[e]) throw new TypeError(`No method named "${e}"`);
                        n[e]()
                    }
                }))
            }
        }
        bn.on(document, "click.bs.collapse.data-api", Kn, (function (e) {
            ("A" === e.target.tagName || e.delegateTarget && "A" === e.delegateTarget.tagName) && e.preventDefault();
            const t = zt(this);
            Ln.find(t).forEach((e => {
                Qn.getOrCreateInstance(e, {
                    toggle: !1
                }).toggle()
            }))
        })), Jt(Qn);
        const Jn = "dropdown",
            Zn = "Escape",
            ei = "Space",
            ti = "ArrowUp",
            ni = "ArrowDown",
            ii = new RegExp("ArrowUp|ArrowDown|Escape"),
            si = "click.bs.dropdown.data-api",
            ri = "keydown.bs.dropdown.data-api",
            oi = "show",
            ai = '[data-bs-toggle="dropdown"]',
            li = ".dropdown-menu",
            ci = Qt() ? "top-end" : "top-start",
            di = Qt() ? "top-start" : "top-end",
            ui = Qt() ? "bottom-end" : "bottom-start",
            pi = Qt() ? "bottom-start" : "bottom-end",
            fi = Qt() ? "left-start" : "right-start",
            hi = Qt() ? "right-start" : "left-start",
            mi = {
                offset: [0, 2],
                boundary: "clippingParents",
                reference: "toggle",
                display: "dynamic",
                popperConfig: null,
                autoClose: !0
            },
            gi = {
                offset: "(array|string|function)",
                boundary: "(string|element)",
                reference: "(string|element|object)",
                display: "string",
                popperConfig: "(null|object|function)",
                autoClose: "(boolean|string)"
            };
        class vi extends xn {
            constructor(e, t) {
                super(e), this._popper = null, this._config = this._getConfig(t), this._menu = this._getMenuElement(), this._inNavbar = this._detectNavbar()
            }
            static get Default() {
                return mi
            }
            static get DefaultType() {
                return gi
            }
            static get NAME() {
                return Jn
            }
            toggle() {
                return this._isShown() ? this.hide() : this.show()
            }
            show() {
                if (Wt(this._element) || this._isShown(this._menu)) return;
                const e = {
                    relatedTarget: this._element
                };
                if (bn.trigger(this._element, "show.bs.dropdown", e).defaultPrevented) return;
                const t = vi.getParentFromElement(this._element);
                this._inNavbar ? An.setDataAttribute(this._menu, "popper", "none") : this._createPopper(t), "ontouchstart" in document.documentElement && !t.closest(".navbar-nav") && [].concat(...document.body.children).forEach((e => bn.on(e, "mouseover", Xt))), this._element.focus(), this._element.setAttribute("aria-expanded", !0), this._menu.classList.add(oi), this._element.classList.add(oi), bn.trigger(this._element, "shown.bs.dropdown", e)
            }
            hide() {
                if (Wt(this._element) || !this._isShown(this._menu)) return;
                const e = {
                    relatedTarget: this._element
                };
                this._completeHide(e)
            }
            dispose() {
                this._popper && this._popper.destroy(), super.dispose()
            }
            update() {
                this._inNavbar = this._detectNavbar(), this._popper && this._popper.update()
            }
            _completeHide(e) {
                bn.trigger(this._element, "hide.bs.dropdown", e).defaultPrevented || ("ontouchstart" in document.documentElement && [].concat(...document.body.children).forEach((e => bn.off(e, "mouseover", Xt))), this._popper && this._popper.destroy(), this._menu.classList.remove(oi), this._element.classList.remove(oi), this._element.setAttribute("aria-expanded", "false"), An.removeDataAttribute(this._menu, "popper"), bn.trigger(this._element, "hidden.bs.dropdown", e))
            }
            _getConfig(e) {
                if (e = {
                        ...this.constructor.Default,
                        ...An.getDataAttributes(this._element),
                        ...e
                    }, Rt(Jn, e, this.constructor.DefaultType), "object" == typeof e.reference && !Bt(e.reference) && "function" != typeof e.reference.getBoundingClientRect) throw new TypeError(`${Jn.toUpperCase()}: Option "reference" provided type "object" without a required "getBoundingClientRect" method.`);
                return e
            }
            _createPopper(t) {
                if (void 0 === e) throw new TypeError("Bootstrap's dropdowns require Popper (https://popper.js.org)");
                let n = this._element;
                "parent" === this._config.reference ? n = t : Bt(this._config.reference) ? n = qt(this._config.reference) : "object" == typeof this._config.reference && (n = this._config.reference);
                const i = this._getPopperConfig(),
                    s = i.modifiers.find((e => "applyStyles" === e.name && !1 === e.enabled));
                this._popper = Nt(n, this._menu, i), s && An.setDataAttribute(this._menu, "popper", "static")
            }
            _isShown(e = this._element) {
                return e.classList.contains(oi)
            }
            _getMenuElement() {
                return Ln.next(this._element, li)[0]
            }
            _getPlacement() {
                const e = this._element.parentNode;
                if (e.classList.contains("dropend")) return fi;
                if (e.classList.contains("dropstart")) return hi;
                const t = "end" === getComputedStyle(this._menu).getPropertyValue("--bs-position").trim();
                return e.classList.contains("dropup") ? t ? di : ci : t ? pi : ui
            }
            _detectNavbar() {
                return null !== this._element.closest(".navbar")
            }
            _getOffset() {
                const {
                    offset: e
                } = this._config;
                return "string" == typeof e ? e.split(",").map((e => Number.parseInt(e, 10))) : "function" == typeof e ? t => e(t, this._element) : e
            }
            _getPopperConfig() {
                const e = {
                    placement: this._getPlacement(),
                    modifiers: [{
                        name: "preventOverflow",
                        options: {
                            boundary: this._config.boundary
                        }
                    }, {
                        name: "offset",
                        options: {
                            offset: this._getOffset()
                        }
                    }]
                };
                return "static" === this._config.display && (e.modifiers = [{
                    name: "applyStyles",
                    enabled: !1
                }]), {
                    ...e,
                    ..."function" == typeof this._config.popperConfig ? this._config.popperConfig(e) : this._config.popperConfig
                }
            }
            _selectMenuItem({
                key: e,
                target: t
            }) {
                const n = Ln.find(".dropdown-menu .dropdown-item:not(.disabled):not(:disabled)", this._menu).filter(Vt);
                n.length && tn(n, t, e === ni, !n.includes(t)).focus()
            }
            static jQueryInterface(e) {
                return this.each((function () {
                    const t = vi.getOrCreateInstance(this, e);
                    if ("string" == typeof e) {
                        if (void 0 === t[e]) throw new TypeError(`No method named "${e}"`);
                        t[e]()
                    }
                }))
            }
            static clearMenus(e) {
                if (e && (2 === e.button || "keyup" === e.type && "Tab" !== e.key)) return;
                const t = Ln.find(ai);
                for (let n = 0, i = t.length; n < i; n++) {
                    const i = vi.getInstance(t[n]);
                    if (!i || !1 === i._config.autoClose) continue;
                    if (!i._isShown()) continue;
                    const s = {
                        relatedTarget: i._element
                    };
                    if (e) {
                        const t = e.composedPath(),
                            n = t.includes(i._menu);
                        if (t.includes(i._element) || "inside" === i._config.autoClose && !n || "outside" === i._config.autoClose && n) continue;
                        if (i._menu.contains(e.target) && ("keyup" === e.type && "Tab" === e.key || /input|select|option|textarea|form/i.test(e.target.tagName))) continue;
                        "click" === e.type && (s.clickEvent = e)
                    }
                    i._completeHide(s)
                }
            }
            static getParentFromElement(e) {
                return Ht(e) || e.parentNode
            }
            static dataApiKeydownHandler(e) {
                if (/input|textarea/i.test(e.target.tagName) ? e.key === ei || e.key !== Zn && (e.key !== ni && e.key !== ti || e.target.closest(li)) : !ii.test(e.key)) return;
                const t = this.classList.contains(oi);
                if (!t && e.key === Zn) return;
                if (e.preventDefault(), e.stopPropagation(), Wt(this)) return;
                const n = this.matches(ai) ? this : Ln.prev(this, ai)[0],
                    i = vi.getOrCreateInstance(n);
                if (e.key !== Zn) return e.key === ti || e.key === ni ? (t || i.show(), void i._selectMenuItem(e)) : void(t && e.key !== ei || vi.clearMenus());
                i.hide()
            }
        }
        bn.on(document, ri, ai, vi.dataApiKeydownHandler), bn.on(document, ri, li, vi.dataApiKeydownHandler), bn.on(document, si, vi.clearMenus), bn.on(document, "keyup.bs.dropdown.data-api", vi.clearMenus), bn.on(document, si, ai, (function (e) {
            e.preventDefault(), vi.getOrCreateInstance(this).toggle()
        })), Jt(vi);
        const bi = ".fixed-top, .fixed-bottom, .is-fixed, .sticky-top",
            yi = ".sticky-top";
        class wi {
            constructor() {
                this._element = document.body
            }
            getWidth() {
                const e = document.documentElement.clientWidth;
                return Math.abs(window.innerWidth - e)
            }
            hide() {
                const e = this.getWidth();
                this._disableOverFlow(), this._setElementAttributes(this._element, "paddingRight", (t => t + e)), this._setElementAttributes(bi, "paddingRight", (t => t + e)), this._setElementAttributes(yi, "marginRight", (t => t - e))
            }
            _disableOverFlow() {
                this._saveInitialAttribute(this._element, "overflow"), this._element.style.overflow = "hidden"
            }
            _setElementAttributes(e, t, n) {
                const i = this.getWidth();
                this._applyManipulationCallback(e, (e => {
                    if (e !== this._element && window.innerWidth > e.clientWidth + i) return;
                    this._saveInitialAttribute(e, t);
                    const s = window.getComputedStyle(e)[t];
                    e.style[t] = `${n(Number.parseFloat(s))}px`
                }))
            }
            reset() {
                this._resetElementAttributes(this._element, "overflow"), this._resetElementAttributes(this._element, "paddingRight"), this._resetElementAttributes(bi, "paddingRight"), this._resetElementAttributes(yi, "marginRight")
            }
            _saveInitialAttribute(e, t) {
                const n = e.style[t];
                n && An.setDataAttribute(e, t, n)
            }
            _resetElementAttributes(e, t) {
                this._applyManipulationCallback(e, (e => {
                    const n = An.getDataAttribute(e, t);
                    void 0 === n ? e.style.removeProperty(t) : (An.removeDataAttribute(e, t), e.style[t] = n)
                }))
            }
            _applyManipulationCallback(e, t) {
                Bt(e) ? t(e) : Ln.find(e, this._element).forEach(t)
            }
            isOverflowing() {
                return this.getWidth() > 0
            }
        }
        const xi = {
                className: "modal-backdrop",
                isVisible: !0,
                isAnimated: !1,
                rootElement: "body",
                clickCallback: null
            },
            _i = {
                className: "string",
                isVisible: "boolean",
                isAnimated: "boolean",
                rootElement: "(element|string)",
                clickCallback: "(function|null)"
            },
            Ci = "show",
            Ei = "mousedown.bs.backdrop";
        class Ti {
            constructor(e) {
                this._config = this._getConfig(e), this._isAppended = !1, this._element = null
            }
            show(e) {
                this._config.isVisible ? (this._append(), this._config.isAnimated && Ut(this._getElement()), this._getElement().classList.add(Ci), this._emulateAnimation((() => {
                    Zt(e)
                }))) : Zt(e)
            }
            hide(e) {
                this._config.isVisible ? (this._getElement().classList.remove(Ci), this._emulateAnimation((() => {
                    this.dispose(), Zt(e)
                }))) : Zt(e)
            }
            _getElement() {
                if (!this._element) {
                    const e = document.createElement("div");
                    e.className = this._config.className, this._config.isAnimated && e.classList.add("fade"), this._element = e
                }
                return this._element
            }
            _getConfig(e) {
                return (e = {
                    ...xi,
                    ..."object" == typeof e ? e : {}
                }).rootElement = qt(e.rootElement), Rt("backdrop", e, _i), e
            }
            _append() {
                this._isAppended || (this._config.rootElement.append(this._getElement()), bn.on(this._getElement(), Ei, (() => {
                    Zt(this._config.clickCallback)
                })), this._isAppended = !0)
            }
            dispose() {
                this._isAppended && (bn.off(this._element, Ei), this._element.remove(), this._isAppended = !1)
            }
            _emulateAnimation(e) {
                en(e, this._getElement(), this._config.isAnimated)
            }
        }
        const Si = {
                trapElement: null,
                autofocus: !0
            },
            ki = {
                trapElement: "element",
                autofocus: "boolean"
            },
            Ai = ".bs.focustrap",
            Li = "backward";
        class Oi {
            constructor(e) {
                this._config = this._getConfig(e), this._isActive = !1, this._lastTabNavDirection = null
            }
            activate() {
                const {
                    trapElement: e,
                    autofocus: t
                } = this._config;
                this._isActive || (t && e.focus(), bn.off(document, Ai), bn.on(document, "focusin.bs.focustrap", (e => this._handleFocusin(e))), bn.on(document, "keydown.tab.bs.focustrap", (e => this._handleKeydown(e))), this._isActive = !0)
            }
            deactivate() {
                this._isActive && (this._isActive = !1, bn.off(document, Ai))
            }
            _handleFocusin(e) {
                const {
                    target: t
                } = e, {
                    trapElement: n
                } = this._config;
                if (t === document || t === n || n.contains(t)) return;
                const i = Ln.focusableChildren(n);
                0 === i.length ? n.focus() : this._lastTabNavDirection === Li ? i[i.length - 1].focus() : i[0].focus()
            }
            _handleKeydown(e) {
                "Tab" === e.key && (this._lastTabNavDirection = e.shiftKey ? Li : "forward")
            }
            _getConfig(e) {
                return e = {
                    ...Si,
                    ..."object" == typeof e ? e : {}
                }, Rt("focustrap", e, ki), e
            }
        }
        const Pi = "modal",
            Di = "Escape",
            Mi = {
                backdrop: !0,
                keyboard: !0,
                focus: !0
            },
            Ni = {
                backdrop: "(boolean|string)",
                keyboard: "boolean",
                focus: "boolean"
            },
            Ii = "hidden.bs.modal",
            ji = "show.bs.modal",
            $i = "resize.bs.modal",
            zi = "click.dismiss.bs.modal",
            Hi = "keydown.dismiss.bs.modal",
            Fi = "mousedown.dismiss.bs.modal",
            Bi = "modal-open",
            qi = "show",
            Ri = "modal-static";
        class Vi extends xn {
            constructor(e, t) {
                super(e), this._config = this._getConfig(t), this._dialog = Ln.findOne(".modal-dialog", this._element), this._backdrop = this._initializeBackDrop(), this._focustrap = this._initializeFocusTrap(), this._isShown = !1, this._ignoreBackdropClick = !1, this._isTransitioning = !1, this._scrollBar = new wi
            }
            static get Default() {
                return Mi
            }
            static get NAME() {
                return Pi
            }
            toggle(e) {
                return this._isShown ? this.hide() : this.show(e)
            }
            show(e) {
                this._isShown || this._isTransitioning || bn.trigger(this._element, ji, {
                    relatedTarget: e
                }).defaultPrevented || (this._isShown = !0, this._isAnimated() && (this._isTransitioning = !0), this._scrollBar.hide(), document.body.classList.add(Bi), this._adjustDialog(), this._setEscapeEvent(), this._setResizeEvent(), bn.on(this._dialog, Fi, (() => {
                    bn.one(this._element, "mouseup.dismiss.bs.modal", (e => {
                        e.target === this._element && (this._ignoreBackdropClick = !0)
                    }))
                })), this._showBackdrop((() => this._showElement(e))))
            }
            hide() {
                if (!this._isShown || this._isTransitioning) return;
                if (bn.trigger(this._element, "hide.bs.modal").defaultPrevented) return;
                this._isShown = !1;
                const e = this._isAnimated();
                e && (this._isTransitioning = !0), this._setEscapeEvent(), this._setResizeEvent(), this._focustrap.deactivate(), this._element.classList.remove(qi), bn.off(this._element, zi), bn.off(this._dialog, Fi), this._queueCallback((() => this._hideModal()), this._element, e)
            }
            dispose() {
                [window, this._dialog].forEach((e => bn.off(e, ".bs.modal"))), this._backdrop.dispose(), this._focustrap.deactivate(), super.dispose()
            }
            handleUpdate() {
                this._adjustDialog()
            }
            _initializeBackDrop() {
                return new Ti({
                    isVisible: Boolean(this._config.backdrop),
                    isAnimated: this._isAnimated()
                })
            }
            _initializeFocusTrap() {
                return new Oi({
                    trapElement: this._element
                })
            }
            _getConfig(e) {
                return e = {
                    ...Mi,
                    ...An.getDataAttributes(this._element),
                    ..."object" == typeof e ? e : {}
                }, Rt(Pi, e, Ni), e
            }
            _showElement(e) {
                const t = this._isAnimated(),
                    n = Ln.findOne(".modal-body", this._dialog);
                this._element.parentNode && this._element.parentNode.nodeType === Node.ELEMENT_NODE || document.body.append(this._element), this._element.style.display = "block", this._element.removeAttribute("aria-hidden"), this._element.setAttribute("aria-modal", !0), this._element.setAttribute("role", "dialog"), this._element.scrollTop = 0, n && (n.scrollTop = 0), t && Ut(this._element), this._element.classList.add(qi), this._queueCallback((() => {
                    this._config.focus && this._focustrap.activate(), this._isTransitioning = !1, bn.trigger(this._element, "shown.bs.modal", {
                        relatedTarget: e
                    })
                }), this._dialog, t)
            }
            _setEscapeEvent() {
                this._isShown ? bn.on(this._element, Hi, (e => {
                    this._config.keyboard && e.key === Di ? (e.preventDefault(), this.hide()) : this._config.keyboard || e.key !== Di || this._triggerBackdropTransition()
                })) : bn.off(this._element, Hi)
            }
            _setResizeEvent() {
                this._isShown ? bn.on(window, $i, (() => this._adjustDialog())) : bn.off(window, $i)
            }
            _hideModal() {
                this._element.style.display = "none", this._element.setAttribute("aria-hidden", !0), this._element.removeAttribute("aria-modal"), this._element.removeAttribute("role"), this._isTransitioning = !1, this._backdrop.hide((() => {
                    document.body.classList.remove(Bi), this._resetAdjustments(), this._scrollBar.reset(), bn.trigger(this._element, Ii)
                }))
            }
            _showBackdrop(e) {
                bn.on(this._element, zi, (e => {
                    this._ignoreBackdropClick ? this._ignoreBackdropClick = !1 : e.target === e.currentTarget && (!0 === this._config.backdrop ? this.hide() : "static" === this._config.backdrop && this._triggerBackdropTransition())
                })), this._backdrop.show(e)
            }
            _isAnimated() {
                return this._element.classList.contains("fade")
            }
            _triggerBackdropTransition() {
                if (bn.trigger(this._element, "hidePrevented.bs.modal").defaultPrevented) return;
                const {
                    classList: e,
                    scrollHeight: t,
                    style: n
                } = this._element, i = t > document.documentElement.clientHeight;
                !i && "hidden" === n.overflowY || e.contains(Ri) || (i || (n.overflowY = "hidden"), e.add(Ri), this._queueCallback((() => {
                    e.remove(Ri), i || this._queueCallback((() => {
                        n.overflowY = ""
                    }), this._dialog)
                }), this._dialog), this._element.focus())
            }
            _adjustDialog() {
                const e = this._element.scrollHeight > document.documentElement.clientHeight,
                    t = this._scrollBar.getWidth(),
                    n = t > 0;
                (!n && e && !Qt() || n && !e && Qt()) && (this._element.style.paddingLeft = `${t}px`), (n && !e && !Qt() || !n && e && Qt()) && (this._element.style.paddingRight = `${t}px`)
            }
            _resetAdjustments() {
                this._element.style.paddingLeft = "", this._element.style.paddingRight = ""
            }
            static jQueryInterface(e, t) {
                return this.each((function () {
                    const n = Vi.getOrCreateInstance(this, e);
                    if ("string" == typeof e) {
                        if (void 0 === n[e]) throw new TypeError(`No method named "${e}"`);
                        n[e](t)
                    }
                }))
            }
        }
        bn.on(document, "click.bs.modal.data-api", '[data-bs-toggle="modal"]', (function (e) {
            const t = Ht(this);
            ["A", "AREA"].includes(this.tagName) && e.preventDefault(), bn.one(t, ji, (e => {
                e.defaultPrevented || bn.one(t, Ii, (() => {
                    Vt(this) && this.focus()
                }))
            }));
            const n = Ln.findOne(".modal.show");
            n && Vi.getInstance(n).hide(), Vi.getOrCreateInstance(t).toggle(this)
        })), _n(Vi), Jt(Vi);
        const Wi = "offcanvas",
            Gi = {
                backdrop: !0,
                keyboard: !0,
                scroll: !1
            },
            Xi = {
                backdrop: "boolean",
                keyboard: "boolean",
                scroll: "boolean"
            },
            Ui = "show",
            Yi = ".offcanvas.show",
            Ki = "hidden.bs.offcanvas";
        class Qi extends xn {
            constructor(e, t) {
                super(e), this._config = this._getConfig(t), this._isShown = !1, this._backdrop = this._initializeBackDrop(), this._focustrap = this._initializeFocusTrap(), this._addEventListeners()
            }
            static get NAME() {
                return Wi
            }
            static get Default() {
                return Gi
            }
            toggle(e) {
                return this._isShown ? this.hide() : this.show(e)
            }
            show(e) {
                this._isShown || bn.trigger(this._element, "show.bs.offcanvas", {
                    relatedTarget: e
                }).defaultPrevented || (this._isShown = !0, this._element.style.visibility = "visible", this._backdrop.show(), this._config.scroll || (new wi).hide(), this._element.removeAttribute("aria-hidden"), this._element.setAttribute("aria-modal", !0), this._element.setAttribute("role", "dialog"), this._element.classList.add(Ui), this._queueCallback((() => {
                    this._config.scroll || this._focustrap.activate(), bn.trigger(this._element, "shown.bs.offcanvas", {
                        relatedTarget: e
                    })
                }), this._element, !0))
            }
            hide() {
                this._isShown && (bn.trigger(this._element, "hide.bs.offcanvas").defaultPrevented || (this._focustrap.deactivate(), this._element.blur(), this._isShown = !1, this._element.classList.remove(Ui), this._backdrop.hide(), this._queueCallback((() => {
                    this._element.setAttribute("aria-hidden", !0), this._element.removeAttribute("aria-modal"), this._element.removeAttribute("role"), this._element.style.visibility = "hidden", this._config.scroll || (new wi).reset(), bn.trigger(this._element, Ki)
                }), this._element, !0)))
            }
            dispose() {
                this._backdrop.dispose(), this._focustrap.deactivate(), super.dispose()
            }
            _getConfig(e) {
                return e = {
                    ...Gi,
                    ...An.getDataAttributes(this._element),
                    ..."object" == typeof e ? e : {}
                }, Rt(Wi, e, Xi), e
            }
            _initializeBackDrop() {
                return new Ti({
                    className: "offcanvas-backdrop",
                    isVisible: this._config.backdrop,
                    isAnimated: !0,
                    rootElement: this._element.parentNode,
                    clickCallback: () => this.hide()
                })
            }
            _initializeFocusTrap() {
                return new Oi({
                    trapElement: this._element
                })
            }
            _addEventListeners() {
                bn.on(this._element, "keydown.dismiss.bs.offcanvas", (e => {
                    this._config.keyboard && "Escape" === e.key && this.hide()
                }))
            }
            static jQueryInterface(e) {
                return this.each((function () {
                    const t = Qi.getOrCreateInstance(this, e);
                    if ("string" == typeof e) {
                        if (void 0 === t[e] || e.startsWith("_") || "constructor" === e) throw new TypeError(`No method named "${e}"`);
                        t[e](this)
                    }
                }))
            }
        }
        bn.on(document, "click.bs.offcanvas.data-api", '[data-bs-toggle="offcanvas"]', (function (e) {
            const t = Ht(this);
            if (["A", "AREA"].includes(this.tagName) && e.preventDefault(), Wt(this)) return;
            bn.one(t, Ki, (() => {
                Vt(this) && this.focus()
            }));
            const n = Ln.findOne(Yi);
            n && n !== t && Qi.getInstance(n).hide(), Qi.getOrCreateInstance(t).toggle(this)
        })), bn.on(window, "load.bs.offcanvas.data-api", (() => Ln.find(Yi).forEach((e => Qi.getOrCreateInstance(e).show())))), _n(Qi), Jt(Qi);
        const Ji = new Set(["background", "cite", "href", "itemtype", "longdesc", "poster", "src", "xlink:href"]),
            Zi = /^(?:(?:https?|mailto|ftp|tel|file|sms):|[^#&/:?]*(?:[#/?]|$))/i,
            es = /^data:(?:image\/(?:bmp|gif|jpeg|jpg|png|tiff|webp)|video\/(?:mpeg|mp4|ogg|webm)|audio\/(?:mp3|oga|ogg|opus));base64,[\d+/a-z]+=*$/i,
            ts = (e, t) => {
                const n = e.nodeName.toLowerCase();
                if (t.includes(n)) return !Ji.has(n) || Boolean(Zi.test(e.nodeValue) || es.test(e.nodeValue));
                const i = t.filter((e => e instanceof RegExp));
                for (let e = 0, t = i.length; e < t; e++)
                    if (i[e].test(n)) return !0;
                return !1
            };

        function ns(e, t, n) {
            if (!e.length) return e;
            if (n && "function" == typeof n) return n(e);
            const i = (new window.DOMParser).parseFromString(e, "text/html"),
                s = [].concat(...i.body.querySelectorAll("*"));
            for (let e = 0, n = s.length; e < n; e++) {
                const n = s[e],
                    i = n.nodeName.toLowerCase();
                if (!Object.keys(t).includes(i)) {
                    n.remove();
                    continue
                }
                const r = [].concat(...n.attributes),
                    o = [].concat(t["*"] || [], t[i] || []);
                r.forEach((e => {
                    ts(e, o) || n.removeAttribute(e.nodeName)
                }))
            }
            return i.body.innerHTML
        }
        const is = "tooltip",
            ss = new Set(["sanitize", "allowList", "sanitizeFn"]),
            rs = {
                animation: "boolean",
                template: "string",
                title: "(string|element|function)",
                trigger: "string",
                delay: "(number|object)",
                html: "boolean",
                selector: "(string|boolean)",
                placement: "(string|function)",
                offset: "(array|string|function)",
                container: "(string|element|boolean)",
                fallbackPlacements: "array",
                boundary: "(string|element)",
                customClass: "(string|function)",
                sanitize: "boolean",
                sanitizeFn: "(null|function)",
                allowList: "object",
                popperConfig: "(null|object|function)"
            },
            os = {
                AUTO: "auto",
                TOP: "top",
                RIGHT: Qt() ? "left" : "right",
                BOTTOM: "bottom",
                LEFT: Qt() ? "right" : "left"
            },
            as = {
                animation: !0,
                template: '<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>',
                trigger: "hover focus",
                title: "",
                delay: 0,
                html: !1,
                selector: !1,
                placement: "top",
                offset: [0, 0],
                container: !1,
                fallbackPlacements: ["top", "right", "bottom", "left"],
                boundary: "clippingParents",
                customClass: "",
                sanitize: !0,
                sanitizeFn: null,
                allowList: {
                    "*": ["class", "dir", "id", "lang", "role", /^aria-[\w-]*$/i],
                    a: ["target", "href", "title", "rel"],
                    area: [],
                    b: [],
                    br: [],
                    col: [],
                    code: [],
                    div: [],
                    em: [],
                    hr: [],
                    h1: [],
                    h2: [],
                    h3: [],
                    h4: [],
                    h5: [],
                    h6: [],
                    i: [],
                    img: ["src", "srcset", "alt", "title", "width", "height"],
                    li: [],
                    ol: [],
                    p: [],
                    pre: [],
                    s: [],
                    small: [],
                    span: [],
                    sub: [],
                    sup: [],
                    strong: [],
                    u: [],
                    ul: []
                },
                popperConfig: null
            },
            ls = {
                HIDE: "hide.bs.tooltip",
                HIDDEN: "hidden.bs.tooltip",
                SHOW: "show.bs.tooltip",
                SHOWN: "shown.bs.tooltip",
                INSERTED: "inserted.bs.tooltip",
                CLICK: "click.bs.tooltip",
                FOCUSIN: "focusin.bs.tooltip",
                FOCUSOUT: "focusout.bs.tooltip",
                MOUSEENTER: "mouseenter.bs.tooltip",
                MOUSELEAVE: "mouseleave.bs.tooltip"
            },
            cs = "fade",
            ds = "show",
            us = "show",
            ps = "out",
            fs = ".tooltip-inner",
            hs = ".modal",
            ms = "hide.bs.modal",
            gs = "hover",
            vs = "focus";
        class bs extends xn {
            constructor(t, n) {
                if (void 0 === e) throw new TypeError("Bootstrap's tooltips require Popper (https://popper.js.org)");
                super(t), this._isEnabled = !0, this._timeout = 0, this._hoverState = "", this._activeTrigger = {}, this._popper = null, this._config = this._getConfig(n), this.tip = null, this._setListeners()
            }
            static get Default() {
                return as
            }
            static get NAME() {
                return is
            }
            static get Event() {
                return ls
            }
            static get DefaultType() {
                return rs
            }
            enable() {
                this._isEnabled = !0
            }
            disable() {
                this._isEnabled = !1
            }
            toggleEnabled() {
                this._isEnabled = !this._isEnabled
            }
            toggle(e) {
                if (this._isEnabled)
                    if (e) {
                        const t = this._initializeOnDelegatedTarget(e);
                        t._activeTrigger.click = !t._activeTrigger.click, t._isWithActiveTrigger() ? t._enter(null, t) : t._leave(null, t)
                    } else {
                        if (this.getTipElement().classList.contains(ds)) return void this._leave(null, this);
                        this._enter(null, this)
                    }
            }
            dispose() {
                clearTimeout(this._timeout), bn.off(this._element.closest(hs), ms, this._hideModalHandler), this.tip && this.tip.remove(), this._disposePopper(), super.dispose()
            }
            show() {
                if ("none" === this._element.style.display) throw new Error("Please use show on visible elements");
                if (!this.isWithContent() || !this._isEnabled) return;
                const e = bn.trigger(this._element, this.constructor.Event.SHOW),
                    t = Gt(this._element),
                    n = null === t ? this._element.ownerDocument.documentElement.contains(this._element) : t.contains(this._element);
                if (e.defaultPrevented || !n) return;
                "tooltip" === this.constructor.NAME && this.tip && this.getTitle() !== this.tip.querySelector(fs).innerHTML && (this._disposePopper(), this.tip.remove(), this.tip = null);
                const i = this.getTipElement(),
                    s = (e => {
                        do {
                            e += Math.floor(1e6 * Math.random())
                        } while (document.getElementById(e));
                        return e
                    })(this.constructor.NAME);
                i.setAttribute("id", s), this._element.setAttribute("aria-describedby", s), this._config.animation && i.classList.add(cs);
                const r = "function" == typeof this._config.placement ? this._config.placement.call(this, i, this._element) : this._config.placement,
                    o = this._getAttachment(r);
                this._addAttachmentClass(o);
                const {
                    container: a
                } = this._config;
                wn.set(i, this.constructor.DATA_KEY, this), this._element.ownerDocument.documentElement.contains(this.tip) || (a.append(i), bn.trigger(this._element, this.constructor.Event.INSERTED)), this._popper ? this._popper.update() : this._popper = Nt(this._element, i, this._getPopperConfig(o)), i.classList.add(ds);
                const l = this._resolvePossibleFunction(this._config.customClass);
                l && i.classList.add(...l.split(" ")), "ontouchstart" in document.documentElement && [].concat(...document.body.children).forEach((e => {
                    bn.on(e, "mouseover", Xt)
                }));
                const c = this.tip.classList.contains(cs);
                this._queueCallback((() => {
                    const e = this._hoverState;
                    this._hoverState = null, bn.trigger(this._element, this.constructor.Event.SHOWN), e === ps && this._leave(null, this)
                }), this.tip, c)
            }
            hide() {
                if (!this._popper) return;
                const e = this.getTipElement();
                if (bn.trigger(this._element, this.constructor.Event.HIDE).defaultPrevented) return;
                e.classList.remove(ds), "ontouchstart" in document.documentElement && [].concat(...document.body.children).forEach((e => bn.off(e, "mouseover", Xt))), this._activeTrigger.click = !1, this._activeTrigger.focus = !1, this._activeTrigger.hover = !1;
                const t = this.tip.classList.contains(cs);
                this._queueCallback((() => {
                    this._isWithActiveTrigger() || (this._hoverState !== us && e.remove(), this._cleanTipClass(), this._element.removeAttribute("aria-describedby"), bn.trigger(this._element, this.constructor.Event.HIDDEN), this._disposePopper())
                }), this.tip, t), this._hoverState = ""
            }
            update() {
                null !== this._popper && this._popper.update()
            }
            isWithContent() {
                return Boolean(this.getTitle())
            }
            getTipElement() {
                if (this.tip) return this.tip;
                const e = document.createElement("div");
                e.innerHTML = this._config.template;
                const t = e.children[0];
                return this.setContent(t), t.classList.remove(cs, ds), this.tip = t, this.tip
            }
            setContent(e) {
                this._sanitizeAndSetContent(e, this.getTitle(), fs)
            }
            _sanitizeAndSetContent(e, t, n) {
                const i = Ln.findOne(n, e);
                t || !i ? this.setElementContent(i, t) : i.remove()
            }
            setElementContent(e, t) {
                if (null !== e) return Bt(t) ? (t = qt(t), void(this._config.html ? t.parentNode !== e && (e.innerHTML = "", e.append(t)) : e.textContent = t.textContent)) : void(this._config.html ? (this._config.sanitize && (t = ns(t, this._config.allowList, this._config.sanitizeFn)), e.innerHTML = t) : e.textContent = t)
            }
            getTitle() {
                const e = this._element.getAttribute("data-bs-original-title") || this._config.title;
                return this._resolvePossibleFunction(e)
            }
            updateAttachment(e) {
                return "right" === e ? "end" : "left" === e ? "start" : e
            }
            _initializeOnDelegatedTarget(e, t) {
                return t || this.constructor.getOrCreateInstance(e.delegateTarget, this._getDelegateConfig())
            }
            _getOffset() {
                const {
                    offset: e
                } = this._config;
                return "string" == typeof e ? e.split(",").map((e => Number.parseInt(e, 10))) : "function" == typeof e ? t => e(t, this._element) : e
            }
            _resolvePossibleFunction(e) {
                return "function" == typeof e ? e.call(this._element) : e
            }
            _getPopperConfig(e) {
                const t = {
                    placement: e,
                    modifiers: [{
                        name: "flip",
                        options: {
                            fallbackPlacements: this._config.fallbackPlacements
                        }
                    }, {
                        name: "offset",
                        options: {
                            offset: this._getOffset()
                        }
                    }, {
                        name: "preventOverflow",
                        options: {
                            boundary: this._config.boundary
                        }
                    }, {
                        name: "arrow",
                        options: {
                            element: `.${this.constructor.NAME}-arrow`
                        }
                    }, {
                        name: "onChange",
                        enabled: !0,
                        phase: "afterWrite",
                        fn: e => this._handlePopperPlacementChange(e)
                    }],
                    onFirstUpdate: e => {
                        e.options.placement !== e.placement && this._handlePopperPlacementChange(e)
                    }
                };
                return {
                    ...t,
                    ..."function" == typeof this._config.popperConfig ? this._config.popperConfig(t) : this._config.popperConfig
                }
            }
            _addAttachmentClass(e) {
                this.getTipElement().classList.add(`${this._getBasicClassPrefix()}-${this.updateAttachment(e)}`)
            }
            _getAttachment(e) {
                return os[e.toUpperCase()]
            }
            _setListeners() {
                this._config.trigger.split(" ").forEach((e => {
                    if ("click" === e) bn.on(this._element, this.constructor.Event.CLICK, this._config.selector, (e => this.toggle(e)));
                    else if ("manual" !== e) {
                        const t = e === gs ? this.constructor.Event.MOUSEENTER : this.constructor.Event.FOCUSIN,
                            n = e === gs ? this.constructor.Event.MOUSELEAVE : this.constructor.Event.FOCUSOUT;
                        bn.on(this._element, t, this._config.selector, (e => this._enter(e))), bn.on(this._element, n, this._config.selector, (e => this._leave(e)))
                    }
                })), this._hideModalHandler = () => {
                    this._element && this.hide()
                }, bn.on(this._element.closest(hs), ms, this._hideModalHandler), this._config.selector ? this._config = {
                    ...this._config,
                    trigger: "manual",
                    selector: ""
                } : this._fixTitle()
            }
            _fixTitle() {
                const e = this._element.getAttribute("title"),
                    t = typeof this._element.getAttribute("data-bs-original-title");
                (e || "string" !== t) && (this._element.setAttribute("data-bs-original-title", e || ""), !e || this._element.getAttribute("aria-label") || this._element.textContent || this._element.setAttribute("aria-label", e), this._element.setAttribute("title", ""))
            }
            _enter(e, t) {
                t = this._initializeOnDelegatedTarget(e, t), e && (t._activeTrigger["focusin" === e.type ? vs : gs] = !0), t.getTipElement().classList.contains(ds) || t._hoverState === us ? t._hoverState = us : (clearTimeout(t._timeout), t._hoverState = us, t._config.delay && t._config.delay.show ? t._timeout = setTimeout((() => {
                    t._hoverState === us && t.show()
                }), t._config.delay.show) : t.show())
            }
            _leave(e, t) {
                t = this._initializeOnDelegatedTarget(e, t), e && (t._activeTrigger["focusout" === e.type ? vs : gs] = t._element.contains(e.relatedTarget)), t._isWithActiveTrigger() || (clearTimeout(t._timeout), t._hoverState = ps, t._config.delay && t._config.delay.hide ? t._timeout = setTimeout((() => {
                    t._hoverState === ps && t.hide()
                }), t._config.delay.hide) : t.hide())
            }
            _isWithActiveTrigger() {
                for (const e in this._activeTrigger)
                    if (this._activeTrigger[e]) return !0;
                return !1
            }
            _getConfig(e) {
                const t = An.getDataAttributes(this._element);
                return Object.keys(t).forEach((e => {
                    ss.has(e) && delete t[e]
                })), (e = {
                    ...this.constructor.Default,
                    ...t,
                    ..."object" == typeof e && e ? e : {}
                }).container = !1 === e.container ? document.body : qt(e.container), "number" == typeof e.delay && (e.delay = {
                    show: e.delay,
                    hide: e.delay
                }), "number" == typeof e.title && (e.title = e.title.toString()), "number" == typeof e.content && (e.content = e.content.toString()), Rt(is, e, this.constructor.DefaultType), e.sanitize && (e.template = ns(e.template, e.allowList, e.sanitizeFn)), e
            }
            _getDelegateConfig() {
                const e = {};
                for (const t in this._config) this.constructor.Default[t] !== this._config[t] && (e[t] = this._config[t]);
                return e
            }
            _cleanTipClass() {
                const e = this.getTipElement(),
                    t = new RegExp(`(^|\\s)${this._getBasicClassPrefix()}\\S+`, "g"),
                    n = e.getAttribute("class").match(t);
                null !== n && n.length > 0 && n.map((e => e.trim())).forEach((t => e.classList.remove(t)))
            }
            _getBasicClassPrefix() {
                return "bs-tooltip"
            }
            _handlePopperPlacementChange(e) {
                const {
                    state: t
                } = e;
                t && (this.tip = t.elements.popper, this._cleanTipClass(), this._addAttachmentClass(this._getAttachment(t.placement)))
            }
            _disposePopper() {
                this._popper && (this._popper.destroy(), this._popper = null)
            }
            static jQueryInterface(e) {
                return this.each((function () {
                    const t = bs.getOrCreateInstance(this, e);
                    if ("string" == typeof e) {
                        if (void 0 === t[e]) throw new TypeError(`No method named "${e}"`);
                        t[e]()
                    }
                }))
            }
        }
        Jt(bs);
        const ys = {
                ...bs.Default,
                placement: "right",
                offset: [0, 8],
                trigger: "click",
                content: "",
                template: '<div class="popover" role="tooltip"><div class="popover-arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>'
            },
            ws = {
                ...bs.DefaultType,
                content: "(string|element|function)"
            },
            xs = {
                HIDE: "hide.bs.popover",
                HIDDEN: "hidden.bs.popover",
                SHOW: "show.bs.popover",
                SHOWN: "shown.bs.popover",
                INSERTED: "inserted.bs.popover",
                CLICK: "click.bs.popover",
                FOCUSIN: "focusin.bs.popover",
                FOCUSOUT: "focusout.bs.popover",
                MOUSEENTER: "mouseenter.bs.popover",
                MOUSELEAVE: "mouseleave.bs.popover"
            };
        class _s extends bs {
            static get Default() {
                return ys
            }
            static get NAME() {
                return "popover"
            }
            static get Event() {
                return xs
            }
            static get DefaultType() {
                return ws
            }
            isWithContent() {
                return this.getTitle() || this._getContent()
            }
            setContent(e) {
                this._sanitizeAndSetContent(e, this.getTitle(), ".popover-header"), this._sanitizeAndSetContent(e, this._getContent(), ".popover-body")
            }
            _getContent() {
                return this._resolvePossibleFunction(this._config.content)
            }
            _getBasicClassPrefix() {
                return "bs-popover"
            }
            static jQueryInterface(e) {
                return this.each((function () {
                    const t = _s.getOrCreateInstance(this, e);
                    if ("string" == typeof e) {
                        if (void 0 === t[e]) throw new TypeError(`No method named "${e}"`);
                        t[e]()
                    }
                }))
            }
        }
        Jt(_s);
        const Cs = "scrollspy",
            Es = {
                offset: 10,
                method: "auto",
                target: ""
            },
            Ts = {
                offset: "number",
                method: "string",
                target: "(string|element)"
            },
            Ss = "active",
            ks = ".nav-link, .list-group-item, .dropdown-item",
            As = "position";
        class Ls extends xn {
            constructor(e, t) {
                super(e), this._scrollElement = "BODY" === this._element.tagName ? window : this._element, this._config = this._getConfig(t), this._offsets = [], this._targets = [], this._activeTarget = null, this._scrollHeight = 0, bn.on(this._scrollElement, "scroll.bs.scrollspy", (() => this._process())), this.refresh(), this._process()
            }
            static get Default() {
                return Es
            }
            static get NAME() {
                return Cs
            }
            refresh() {
                const e = this._scrollElement === this._scrollElement.window ? "offset" : As,
                    t = "auto" === this._config.method ? e : this._config.method,
                    n = t === As ? this._getScrollTop() : 0;
                this._offsets = [], this._targets = [], this._scrollHeight = this._getScrollHeight(), Ln.find(ks, this._config.target).map((e => {
                    const i = zt(e),
                        s = i ? Ln.findOne(i) : null;
                    if (s) {
                        const e = s.getBoundingClientRect();
                        if (e.width || e.height) return [An[t](s).top + n, i]
                    }
                    return null
                })).filter((e => e)).sort(((e, t) => e[0] - t[0])).forEach((e => {
                    this._offsets.push(e[0]), this._targets.push(e[1])
                }))
            }
            dispose() {
                bn.off(this._scrollElement, ".bs.scrollspy"), super.dispose()
            }
            _getConfig(e) {
                return (e = {
                    ...Es,
                    ...An.getDataAttributes(this._element),
                    ..."object" == typeof e && e ? e : {}
                }).target = qt(e.target) || document.documentElement, Rt(Cs, e, Ts), e
            }
            _getScrollTop() {
                return this._scrollElement === window ? this._scrollElement.pageYOffset : this._scrollElement.scrollTop
            }
            _getScrollHeight() {
                return this._scrollElement.scrollHeight || Math.max(document.body.scrollHeight, document.documentElement.scrollHeight)
            }
            _getOffsetHeight() {
                return this._scrollElement === window ? window.innerHeight : this._scrollElement.getBoundingClientRect().height
            }
            _process() {
                const e = this._getScrollTop() + this._config.offset,
                    t = this._getScrollHeight(),
                    n = this._config.offset + t - this._getOffsetHeight();
                if (this._scrollHeight !== t && this.refresh(), e >= n) {
                    const e = this._targets[this._targets.length - 1];
                    this._activeTarget !== e && this._activate(e)
                } else {
                    if (this._activeTarget && e < this._offsets[0] && this._offsets[0] > 0) return this._activeTarget = null, void this._clear();
                    for (let t = this._offsets.length; t--;) this._activeTarget !== this._targets[t] && e >= this._offsets[t] && (void 0 === this._offsets[t + 1] || e < this._offsets[t + 1]) && this._activate(this._targets[t])
                }
            }
            _activate(e) {
                this._activeTarget = e, this._clear();
                const t = ks.split(",").map((t => `${t}[data-bs-target="${e}"],${t}[href="${e}"]`)),
                    n = Ln.findOne(t.join(","), this._config.target);
                n.classList.add(Ss), n.classList.contains("dropdown-item") ? Ln.findOne(".dropdown-toggle", n.closest(".dropdown")).classList.add(Ss) : Ln.parents(n, ".nav, .list-group").forEach((e => {
                    Ln.prev(e, ".nav-link, .list-group-item").forEach((e => e.classList.add(Ss))), Ln.prev(e, ".nav-item").forEach((e => {
                        Ln.children(e, ".nav-link").forEach((e => e.classList.add(Ss)))
                    }))
                })), bn.trigger(this._scrollElement, "activate.bs.scrollspy", {
                    relatedTarget: e
                })
            }
            _clear() {
                Ln.find(ks, this._config.target).filter((e => e.classList.contains(Ss))).forEach((e => e.classList.remove(Ss)))
            }
            static jQueryInterface(e) {
                return this.each((function () {
                    const t = Ls.getOrCreateInstance(this, e);
                    if ("string" == typeof e) {
                        if (void 0 === t[e]) throw new TypeError(`No method named "${e}"`);
                        t[e]()
                    }
                }))
            }
        }
        bn.on(window, "load.bs.scrollspy.data-api", (() => {
            Ln.find('[data-bs-spy="scroll"]').forEach((e => new Ls(e)))
        })), Jt(Ls);
        const Os = "active",
            Ps = "fade",
            Ds = "show",
            Ms = ".active",
            Ns = ":scope > li > .active";
        class Is extends xn {
            static get NAME() {
                return "tab"
            }
            show() {
                if (this._element.parentNode && this._element.parentNode.nodeType === Node.ELEMENT_NODE && this._element.classList.contains(Os)) return;
                let e;
                const t = Ht(this._element),
                    n = this._element.closest(".nav, .list-group");
                if (n) {
                    const t = "UL" === n.nodeName || "OL" === n.nodeName ? Ns : Ms;
                    e = Ln.find(t, n), e = e[e.length - 1]
                }
                const i = e ? bn.trigger(e, "hide.bs.tab", {
                    relatedTarget: this._element
                }) : null;
                if (bn.trigger(this._element, "show.bs.tab", {
                        relatedTarget: e
                    }).defaultPrevented || null !== i && i.defaultPrevented) return;
                this._activate(this._element, n);
                const s = () => {
                    bn.trigger(e, "hidden.bs.tab", {
                        relatedTarget: this._element
                    }), bn.trigger(this._element, "shown.bs.tab", {
                        relatedTarget: e
                    })
                };
                t ? this._activate(t, t.parentNode, s) : s()
            }
            _activate(e, t, n) {
                const i = (!t || "UL" !== t.nodeName && "OL" !== t.nodeName ? Ln.children(t, Ms) : Ln.find(Ns, t))[0],
                    s = n && i && i.classList.contains(Ps),
                    r = () => this._transitionComplete(e, i, n);
                i && s ? (i.classList.remove(Ds), this._queueCallback(r, e, !0)) : r()
            }
            _transitionComplete(e, t, n) {
                if (t) {
                    t.classList.remove(Os);
                    const e = Ln.findOne(":scope > .dropdown-menu .active", t.parentNode);
                    e && e.classList.remove(Os), "tab" === t.getAttribute("role") && t.setAttribute("aria-selected", !1)
                }
                e.classList.add(Os), "tab" === e.getAttribute("role") && e.setAttribute("aria-selected", !0), Ut(e), e.classList.contains(Ps) && e.classList.add(Ds);
                let i = e.parentNode;
                if (i && "LI" === i.nodeName && (i = i.parentNode), i && i.classList.contains("dropdown-menu")) {
                    const t = e.closest(".dropdown");
                    t && Ln.find(".dropdown-toggle", t).forEach((e => e.classList.add(Os))), e.setAttribute("aria-expanded", !0)
                }
                n && n()
            }
            static jQueryInterface(e) {
                return this.each((function () {
                    const t = Is.getOrCreateInstance(this);
                    if ("string" == typeof e) {
                        if (void 0 === t[e]) throw new TypeError(`No method named "${e}"`);
                        t[e]()
                    }
                }))
            }
        }
        bn.on(document, "click.bs.tab.data-api", '[data-bs-toggle="tab"], [data-bs-toggle="pill"], [data-bs-toggle="list"]', (function (e) {
            ["A", "AREA"].includes(this.tagName) && e.preventDefault(), Wt(this) || Is.getOrCreateInstance(this).show()
        })), Jt(Is);
        const js = "toast",
            $s = "hide",
            zs = "show",
            Hs = "showing",
            Fs = {
                animation: "boolean",
                autohide: "boolean",
                delay: "number"
            },
            Bs = {
                animation: !0,
                autohide: !0,
                delay: 5e3
            };
        class qs extends xn {
            constructor(e, t) {
                super(e), this._config = this._getConfig(t), this._timeout = null, this._hasMouseInteraction = !1, this._hasKeyboardInteraction = !1, this._setListeners()
            }
            static get DefaultType() {
                return Fs
            }
            static get Default() {
                return Bs
            }
            static get NAME() {
                return js
            }
            show() {
                bn.trigger(this._element, "show.bs.toast").defaultPrevented || (this._clearTimeout(), this._config.animation && this._element.classList.add("fade"), this._element.classList.remove($s), Ut(this._element), this._element.classList.add(zs), this._element.classList.add(Hs), this._queueCallback((() => {
                    this._element.classList.remove(Hs), bn.trigger(this._element, "shown.bs.toast"), this._maybeScheduleHide()
                }), this._element, this._config.animation))
            }
            hide() {
                this._element.classList.contains(zs) && (bn.trigger(this._element, "hide.bs.toast").defaultPrevented || (this._element.classList.add(Hs), this._queueCallback((() => {
                    this._element.classList.add($s), this._element.classList.remove(Hs), this._element.classList.remove(zs), bn.trigger(this._element, "hidden.bs.toast")
                }), this._element, this._config.animation)))
            }
            dispose() {
                this._clearTimeout(), this._element.classList.contains(zs) && this._element.classList.remove(zs), super.dispose()
            }
            _getConfig(e) {
                return e = {
                    ...Bs,
                    ...An.getDataAttributes(this._element),
                    ..."object" == typeof e && e ? e : {}
                }, Rt(js, e, this.constructor.DefaultType), e
            }
            _maybeScheduleHide() {
                this._config.autohide && (this._hasMouseInteraction || this._hasKeyboardInteraction || (this._timeout = setTimeout((() => {
                    this.hide()
                }), this._config.delay)))
            }
            _onInteraction(e, t) {
                switch (e.type) {
                    case "mouseover":
                    case "mouseout":
                        this._hasMouseInteraction = t;
                        break;
                    case "focusin":
                    case "focusout":
                        this._hasKeyboardInteraction = t
                }
                if (t) return void this._clearTimeout();
                const n = e.relatedTarget;
                this._element === n || this._element.contains(n) || this._maybeScheduleHide()
            }
            _setListeners() {
                bn.on(this._element, "mouseover.bs.toast", (e => this._onInteraction(e, !0))), bn.on(this._element, "mouseout.bs.toast", (e => this._onInteraction(e, !1))), bn.on(this._element, "focusin.bs.toast", (e => this._onInteraction(e, !0))), bn.on(this._element, "focusout.bs.toast", (e => this._onInteraction(e, !1)))
            }
            _clearTimeout() {
                clearTimeout(this._timeout), this._timeout = null
            }
            static jQueryInterface(e) {
                return this.each((function () {
                    const t = qs.getOrCreateInstance(this, e);
                    if ("string" == typeof e) {
                        if (void 0 === t[e]) throw new TypeError(`No method named "${e}"`);
                        t[e](this)
                    }
                }))
            }
        }

        function Rs(e) {
            for (var t = 1; t < arguments.length; t++) {
                var n = arguments[t];
                for (var i in n) e[i] = n[i]
            }
            return e
        }
        _n(qs), Jt(qs);
        const Vs = function e(t, n) {
            function i(e, i, s) {
                if ("undefined" != typeof document) {
                    "number" == typeof (s = Rs({}, n, s)).expires && (s.expires = new Date(Date.now() + 864e5 * s.expires)), s.expires && (s.expires = s.expires.toUTCString()), e = encodeURIComponent(e).replace(/%(2[346B]|5E|60|7C)/g, decodeURIComponent).replace(/[()]/g, escape);
                    var r = "";
                    for (var o in s) s[o] && (r += "; " + o, !0 !== s[o] && (r += "=" + s[o].split(";")[0]));
                    return document.cookie = e + "=" + t.write(i, e) + r
                }
            }
            return Object.create({
                set: i,
                get: function (e) {
                    if ("undefined" != typeof document && (!arguments.length || e)) {
                        for (var n = document.cookie ? document.cookie.split("; ") : [], i = {}, s = 0; s < n.length; s++) {
                            var r = n[s].split("="),
                                o = r.slice(1).join("=");
                            try {
                                var a = decodeURIComponent(r[0]);
                                if (i[a] = t.read(o, a), e === a) break
                            } catch (e) {}
                        }
                        return e ? i[e] : i
                    }
                },
                remove: function (e, t) {
                    i(e, "", Rs({}, t, {
                        expires: -1
                    }))
                },
                withAttributes: function (t) {
                    return e(this.converter, Rs({}, this.attributes, t))
                },
                withConverter: function (t) {
                    return e(Rs({}, this.converter, t), this.attributes)
                }
            }, {
                attributes: {
                    value: Object.freeze(n)
                },
                converter: {
                    value: Object.freeze(t)
                }
            })
        }({
            read: function (e) {
                return '"' === e[0] && (e = e.slice(1, -1)), e.replace(/(%[\dA-F]{2})+/gi, decodeURIComponent)
            },
            write: function (e) {
                return encodeURIComponent(e).replace(/%(2[346BF]|3[AC-F]|40|5[BDE]|60|7[BCD])/g, decodeURIComponent)
            }
        }, {
            path: "/"
        });
        var Ws = function () {
                return (Ws = Object.assign || function (e) {
                    for (var t, n = 1, i = arguments.length; n < i; n++)
                        for (var s in t = arguments[n]) Object.prototype.hasOwnProperty.call(t, s) && (e[s] = t[s]);
                    return e
                }).apply(this, arguments)
            },
            Gs = function () {
                function e(e, t, n) {
                    var i = this;
                    this.endVal = t, this.options = n, this.version = "2.3.2", this.defaults = {
                        startVal: 0,
                        decimalPlaces: 0,
                        duration: 2,
                        useEasing: !0,
                        useGrouping: !0,
                        smartEasingThreshold: 999,
                        smartEasingAmount: 333,
                        separator: ",",
                        decimal: ".",
                        prefix: "",
                        suffix: "",
                        enableScrollSpy: !1,
                        scrollSpyDelay: 200,
                        scrollSpyOnce: !1
                    }, this.finalEndVal = null, this.useEasing = !0, this.countDown = !1, this.error = "", this.startVal = 0, this.paused = !0, this.once = !1, this.count = function (e) {
                        i.startTime || (i.startTime = e);
                        var t = e - i.startTime;
                        i.remaining = i.duration - t, i.useEasing ? i.countDown ? i.frameVal = i.startVal - i.easingFn(t, 0, i.startVal - i.endVal, i.duration) : i.frameVal = i.easingFn(t, i.startVal, i.endVal - i.startVal, i.duration) : i.frameVal = i.startVal + (i.endVal - i.startVal) * (t / i.duration);
                        var n = i.countDown ? i.frameVal < i.endVal : i.frameVal > i.endVal;
                        i.frameVal = n ? i.endVal : i.frameVal, i.frameVal = Number(i.frameVal.toFixed(i.options.decimalPlaces)), i.printValue(i.frameVal), t < i.duration ? i.rAF = requestAnimationFrame(i.count) : null !== i.finalEndVal ? i.update(i.finalEndVal) : i.callback && i.callback()
                    }, this.formatNumber = function (e) {
                        var t, n, s, r, o = e < 0 ? "-" : "";
                        t = Math.abs(e).toFixed(i.options.decimalPlaces);
                        var a = (t += "").split(".");
                        if (n = a[0], s = a.length > 1 ? i.options.decimal + a[1] : "", i.options.useGrouping) {
                            r = "";
                            for (var l = 0, c = n.length; l < c; ++l) 0 !== l && l % 3 == 0 && (r = i.options.separator + r), r = n[c - l - 1] + r;
                            n = r
                        }
                        return i.options.numerals && i.options.numerals.length && (n = n.replace(/[0-9]/g, (function (e) {
                            return i.options.numerals[+e]
                        })), s = s.replace(/[0-9]/g, (function (e) {
                            return i.options.numerals[+e]
                        }))), o + i.options.prefix + n + s + i.options.suffix
                    }, this.easeOutExpo = function (e, t, n, i) {
                        return n * (1 - Math.pow(2, -10 * e / i)) * 1024 / 1023 + t
                    }, this.options = Ws(Ws({}, this.defaults), n), this.formattingFn = this.options.formattingFn ? this.options.formattingFn : this.formatNumber, this.easingFn = this.options.easingFn ? this.options.easingFn : this.easeOutExpo, this.startVal = this.validateValue(this.options.startVal), this.frameVal = this.startVal, this.endVal = this.validateValue(t), this.options.decimalPlaces = Math.max(this.options.decimalPlaces), this.resetDuration(), this.options.separator = String(this.options.separator), this.useEasing = this.options.useEasing, "" === this.options.separator && (this.options.useGrouping = !1), this.el = "string" == typeof e ? document.getElementById(e) : e, this.el ? this.printValue(this.startVal) : this.error = "[CountUp] target is null or undefined", "undefined" != typeof window && this.options.enableScrollSpy && (this.error ? console.error(this.error, e) : (window.onScrollFns = window.onScrollFns || [], window.onScrollFns.push((function () {
                        return i.handleScroll(i)
                    })), window.onscroll = function () {
                        window.onScrollFns.forEach((function (e) {
                            return e()
                        }))
                    }, this.handleScroll(this)))
                }
                return e.prototype.handleScroll = function (e) {
                    if (e && window && !e.once) {
                        var t = window.innerHeight + window.scrollY,
                            n = e.el.getBoundingClientRect(),
                            i = n.top + n.height + window.pageYOffset;
                        i < t && i > window.scrollY && e.paused ? (e.paused = !1, setTimeout((function () {
                            return e.start()
                        }), e.options.scrollSpyDelay), e.options.scrollSpyOnce && (e.once = !0)) : window.scrollY > i && !e.paused && e.reset()
                    }
                }, e.prototype.determineDirectionAndSmartEasing = function () {
                    var e = this.finalEndVal ? this.finalEndVal : this.endVal;
                    this.countDown = this.startVal > e;
                    var t = e - this.startVal;
                    if (Math.abs(t) > this.options.smartEasingThreshold && this.options.useEasing) {
                        this.finalEndVal = e;
                        var n = this.countDown ? 1 : -1;
                        this.endVal = e + n * this.options.smartEasingAmount, this.duration = this.duration / 2
                    } else this.endVal = e, this.finalEndVal = null;
                    null !== this.finalEndVal ? this.useEasing = !1 : this.useEasing = this.options.useEasing
                }, e.prototype.start = function (e) {
                    this.error || (this.callback = e, this.duration > 0 ? (this.determineDirectionAndSmartEasing(), this.paused = !1, this.rAF = requestAnimationFrame(this.count)) : this.printValue(this.endVal))
                }, e.prototype.pauseResume = function () {
                    this.paused ? (this.startTime = null, this.duration = this.remaining, this.startVal = this.frameVal, this.determineDirectionAndSmartEasing(), this.rAF = requestAnimationFrame(this.count)) : cancelAnimationFrame(this.rAF), this.paused = !this.paused
                }, e.prototype.reset = function () {
                    cancelAnimationFrame(this.rAF), this.paused = !0, this.resetDuration(), this.startVal = this.validateValue(this.options.startVal), this.frameVal = this.startVal, this.printValue(this.startVal)
                }, e.prototype.update = function (e) {
                    cancelAnimationFrame(this.rAF), this.startTime = null, this.endVal = this.validateValue(e), this.endVal !== this.frameVal && (this.startVal = this.frameVal, null == this.finalEndVal && this.resetDuration(), this.finalEndVal = null, this.determineDirectionAndSmartEasing(), this.rAF = requestAnimationFrame(this.count))
                }, e.prototype.printValue = function (e) {
                    var t = this.formattingFn(e);
                    "INPUT" === this.el.tagName ? this.el.value = t : "text" === this.el.tagName || "tspan" === this.el.tagName ? this.el.textContent = t : this.el.innerHTML = t
                }, e.prototype.ensureNumber = function (e) {
                    return "number" == typeof e && !isNaN(e)
                }, e.prototype.validateValue = function (e) {
                    var t = Number(e);
                    return this.ensureNumber(t) ? t : (this.error = "[CountUp] invalid start or end value: ".concat(e), null)
                }, e.prototype.resetDuration = function () {
                    this.startTime = null, this.duration = 1e3 * Number(this.options.duration), this.remaining = this.duration
                }, e
            }(),
            Xs = i(755),
            Us = i(755),
            Ys = function () {
                var e;
                Xs.fn.exists = function () {
                    return null != this && this.length > 0
                };
                var t = function (e) {
                    Us(e).removeClass("full"), Us(e).find('input[type="file"]').val(""), Us(e).find(".file-name").html(window.lang.upload_file), Us(e).find("button").html('<svg class="cvzicon"><use xlink:href="/assets/img/icons.svg#upload"></use></svg>')
                };
                return {
                    init: function () {
                        var n;
                        ! function () {
                            var e, t = Us("header"),
                                n = t.find(".logo > img:first"),
                                i = t.find(".logo .logo-dark");

                            function s() {
                                e = Us(document).height()
                            }
                            Us("img").on("load", (function () {
                                s()
                            })), s(), Us(window).scroll((function () {
                                var r = Us(this).scrollTop();
                                s(), e && r >= 110 ? (t.addClass("sticky-header"), setTimeout((function () {
                                    t.css({
                                        transition: "transform 0.3s ease-in-out",
                                        transform: "translateY(0)"
                                    })
                                }), 0), n.addClass("d-none"), i.removeClass("d-none")) : (t.removeClass("sticky-header"), t.css({
                                    transition: "",
                                    transform: ""
                                }), n.removeClass("d-none"), i.addClass("d-none"))
                            }))
                        }(), new(ae())({
                            boxClass: "wow",
                            animateClass: "animate__animated",
                            offset: 0,
                            mobile: !0,
                            live: !0,
                            scrollContainer: null,
                            resetAnimation: !0
                        }).init(), Us("[data-wow]").each((function () {
                                var e = 0,
                                    t = Us(this).data("wow");
                                t.toString().length || (t = "animate__fadeInUp"), Us(this).children().each((function (n, i) {
                                    var s = Us(i),
                                        r = t;
                                    s.data("animation") && (r = s.data("animation")), s.addClass("wow"), s.addClass(r), s.attr("data-wow-duration", ".5s"), s.attr("data-wow-delay", e + "s"), e += .2
                                }))
                            })), Y.use([Q, Z, ee, ne, te, ie]), e = new(re()),
                            function () {
                                Us(document).ready((function () {
                                    Us(".preloader").length && Us(".preloader").delay(800).fadeOut(300), Us(".swiper-pagination-bullet").hover((function () {
                                        Us(this).trigger("click")
                                    })), Us(".changeSlide").hover((function () {
                                        var e = Us(this).data("index") - 1;
                                        Us(".tanitim-slide-area .swiper-pagination-bullet").eq(e).trigger("click")
                                    })), Us(".trust-cards .card .card-body .read-more").length > 0 && Us(".trust-cards .card .card-body .read-more").click((function () {
                                        Us(this).prev().hasClass("text-clamp") ? (Us(this).prev().removeClass("text-clamp"), Us(this).text(window.lang.readLess)) : (Us(this).prev().addClass("text-clamp"), Us(this).text(window.lang.readMore))
                                    }))
                                }));
                                var t = document.querySelectorAll(".swiper-slide video");
                                t.forEach((function (e) {
                                    var t = e,
                                        n = setInterval((function () {
                                            if (t.readyState >= 1) {
                                                var e = 1e3 * t.duration - 1e3;
                                                e > 0 && t.closest(".swiper-slide").setAttribute("data-swiper-autoplay", e), clearInterval(n)
                                            }
                                        }), 100)
                                })), new Y(".home-slider .swiper-container", {
                                    loop: !1,
                                    speed: 300,
                                    lazy: {
                                        loadPrevNext: !0,
                                        loadPrevNextAmount: 1,
                                        elementClass: "swiper-lazy",
                                        loadingClass: "swiper-lazy-loading",
                                        loadedClass: "swiper-lazy-loaded",
                                        preloaderClass: "swiper-lazy-preloader"
                                    },
                                    autoplay: {
                                        delay: 1e4,
                                        disableOnInteraction: !1,
                                        pauseOnMouseEnter: !0
                                    },
                                    watchSlidesProgress: !0,
                                    pagination: {
                                        el: ".pagination",
                                        clickable: !0,
                                        renderBullet: function (e, t) {
                                            return (e += 1) < 10 ? '<span class="swiper-pagination-bullet">0' + e + "</span>" : '<span class="swiper-pagination-bullet">' + e + "</span>"
                                        }
                                    },
                                    on: {
                                        beforeInit: function () {},
                                        init: function () {
                                            e.init(this).animate(), Us("[data-swiper-slide-index=" + this.realIndex + "]").find("video").trigger("play")
                                        },
                                        slideChange: function () {
                                            t.forEach((function (e) {
                                                e.currentTime = 0
                                            })), e.init(this).animate();
                                            var n = Us("[data-swiper-slide-index=" + this.previousIndex + "]").find("video"),
                                                i = Us("[data-swiper-slide-index=" + this.realIndex + "]").find("video");
                                            n.trigger("stop"), i.trigger("play")
                                        }
                                    }
                                });
                                var n = new Y(".welcome .right-side .madde-thumbs-swiper", {
                                        spaceBetween: 0,
                                        slidesPerView: 1,
                                        pagination: {
                                            el: ".swiper-pagination",
                                            clickable: !0
                                        },
                                        on: {
                                            slideChange: function (e) {
                                                var t = n.realIndex;
                                                Us(".tanitim-slide-area .swiper-pagination-bullet").eq(t).trigger("click")
                                            }
                                        }
                                    }),
                                    i = new Y(".welcome .right-side .tanitim-slide-area .swiper", {
                                        modules: [Q, Z, te, ee, ne],
                                        spaceBetween: 0,
                                        slidesPerView: 1,
                                        pagination: {
                                            el: ".swiper-pagination",
                                            clickable: !0
                                        },
                                        on: {
                                            slideChange: function (e) {
                                                var t = i.realIndex;
                                                Us(".welcome .right-side .madde-thumbs-swiper .swiper-pagination-bullet").eq(t).trigger("click")
                                            }
                                        }
                                    });
                                new Y(".home-partners .swiper", {
                                    modules: [te, ee, Q],
                                    spaceBetween: 20,
                                    slidesPerView: 3,
                                    navigation: {
                                        prevEl: ".swiper-button-prev",
                                        nextEl: ".swiper-button-next"
                                    },
                                    breakpoints: {
                                        0: {
                                            slidesPerView: 1
                                        },
                                        768: {
                                            slidesPerView: 2
                                        },
                                        1200: {
                                            slidesPerView: 3
                                        }
                                    }
                                }), new Y(".home-before-after .swiper", {
                                    modules: [te, ee, Q],
                                    spaceBetween: 20,
                                    slidesPerView: 4,
                                    navigation: {
                                        prevEl: ".swiper-button-prev",
                                        nextEl: ".swiper-button-next"
                                    },
                                    breakpoints: {
                                        0: {
                                            slidesPerView: 1
                                        },
                                        480: {
                                            slidesPerView: 2
                                        },
                                        992: {
                                            slidesPerView: 3
                                        },
                                        1400: {
                                            slidesPerView: 4
                                        }
                                    }
                                }), Us(".home-before-after .image-item").on("mouseenter mousemove", (function (e) {
                                    var t = Us(this),
                                        n = (t.find(".before-image"), t.find(".after-image")),
                                        i = (t.width(), e.pageX - t.offset().left + "px");
                                    n.css("left", i)
                                })), new Y(".home-videos .swiper", {
                                    modules: [te, ee, Q],
                                    spaceBetween: 0,
                                    slidesPerView: 3,
                                    navigation: {
                                        prevEl: ".swiper-button-prev",
                                        nextEl: ".swiper-button-next"
                                    },
                                    breakpoints: {
                                        0: {
                                            slidesPerView: 1
                                        },
                                        480: {
                                            slidesPerView: 2
                                        },
                                        992: {
                                            slidesPerView: 3
                                        }
                                    }
                                }), new Y(".home-treatments .swiper", {
                                    modules: [te, ee, Q, Z],
                                    spaceBetween: 20,
                                    slidesPerView: 6,
                                    autoplay: {
                                        delay: 6e3,
                                        disableOnInteraction: !1
                                    },
                                    pagination: {
                                        el: ".swiper-pagination",
                                        clickable: !0
                                    },
                                    navigation: {
                                        prevEl: ".swiper-button-prev",
                                        nextEl: ".swiper-button-next"
                                    },
                                    breakpoints: {
                                        0: {
                                            slidesPerView: 1,
                                            slidesPerGroup: 1
                                        },
                                        420: {
                                            slidesPerView: 2,
                                            slidesPerGroup: 2
                                        },
                                        576: {
                                            slidesPerView: 3,
                                            slidesPerGroup: 3
                                        },
                                        992: {
                                            slidesPerView: 4,
                                            slidesPerGroup: 4
                                        },
                                        1400: {
                                            slidesPerView: 6,
                                            slidesPerGroup: 6
                                        }
                                    }
                                }), new Y(".home-units .swiper", {
                                    modules: [te, ee, Q, Z],
                                    loop: !1,
                                    spaceBetween: 30,
                                    slidesPerView: 3,
                                    pagination: {
                                        el: ".swiper-pagination",
                                        clickable: !0
                                    },
                                    navigation: {
                                        prevEl: ".swiper-button-prev",
                                        nextEl: ".swiper-button-next"
                                    },
                                    breakpoints: {
                                        0: {
                                            slidesPerView: 1
                                        },
                                        576: {
                                            slidesPerView: 2
                                        },
                                        992: {
                                            slidesPerView: 3
                                        },
                                        1400: {
                                            slidesPerView: 3
                                        }
                                    }
                                }), new Y(".home-doctors .swiper", {
                                    modules: [te, ee],
                                    spaceBetween: 20,
                                    slidesPerView: 3,
                                    navigation: {
                                        nextEl: ".home-doctors .actions .next",
                                        prevEl: ".home-doctors .actions .prev"
                                    },
                                    autoplay: {
                                        delay: 3500,
                                        pauseOnMouseEnter: !0
                                    },
                                    pagination: {
                                        el: ".swiper-pagination",
                                        clickable: !0
                                    },
                                    breakpoints: {
                                        0: {
                                            slidesPerView: 1,
                                            spaceBetween: 0
                                        },
                                        480: {
                                            slidesPerView: 2
                                        },
                                        1400: {
                                            slidesPerView: 3
                                        }
                                    }
                                }), new Y(".home-feedbacks .swiper", {
                                    modules: [te, ee],
                                    spaceBetween: 20,
                                    slidesPerView: 1,
                                    navigation: {
                                        nextEl: ".home-feedbacks .actions .next",
                                        prevEl: ".home-feedbacks .actions .prev"
                                    },
                                    pagination: {
                                        el: ".swiper-pagination",
                                        clickable: !0
                                    }
                                })
                            }(), Us(".show_kvkk").on("click", (function (e) {
                                e.preventDefault(), Us.ajax({
                                    url: window.options.siteurl + "ajax/kvkk",
                                    dataType: "json",
                                    type: "POST",
                                    success: function (e) {
                                        var t = function (e) {
                                            var t = document.getElementById("content" + e.id);
                                            return void 0 !== t && null != t ? (Us("#" + e.basliken).find("#ModalLabel").text(e.title), Us("#" + e.basliken).find("#ModalContent").html(e.text)) : (Us("body").append('<div class="modal fade" id="content' + e.id + '" tabindex="-1">\n  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl">\n    <div class="modal-content">\n      <div class="modal-header">\n        <h5 class="modal-title" id="ModalLabel">' + e.title + '</h5>\n        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="' + window.lang.error.button + '"></button>\n      </div>\n      <div class="modal-body" id="ModalContent">\n' + e.text + '      </div>\n      <div class="modal-footer">\n        <button type="button" class="btn btn-secondary text-white" data-bs-dismiss="modal">' + window.lang.error.button + "</button>\n      </div>\n    </div>\n  </div>\n</div>"), t = document.getElementById("content" + e.id)), new Vi(t, {})
                                        }(e);
                                        t.show()
                                    }
                                })
                            })), document.querySelectorAll('form[method="post"].no-ajax').forEach((function (e) {
                                e.addEventListener("submit", (function (e) {
                                    this.querySelector('[type="submit"]').setAttribute("disabled", "disabled")
                                }))
                            })), document.querySelectorAll(".language-list li a").forEach((function (e) {
                                e.addEventListener("click", (function (e) {
                                    e.preventDefault();
                                    var t = new FormData;
                                    t.append("language", this.dataset.language), t.append("referrer", window.location.href), Us.ajax({
                                        url: window.lang.ajax.url + "changeLanguage",
                                        data: t,
                                        dataType: "json",
                                        type: "POST",
                                        processData: !1,
                                        contentType: !1,
                                        success: function (e) {
                                            window.location.href = e.redirect
                                        }
                                    })
                                }))
                            })), Us(".upload-file").on("change", (function () {
                                var e = Us(this),
                                    n = e[0].files[0],
                                    i = n.name,
                                    s = n.size,
                                    r = (n.type, i.split(".").pop());
                                return -1 == Us.inArray(r, ["jpg", "jpeg", "png", "gif", "doc", "docx", "xls", "xlsx", "ppt", "pptx", "pdf", "zip", "rar"]) ? (t(Us(e).closest(".file")), alert(window.lang.error.mimeTypeErr), !1) : s > 10485760 ? (t(Us(e).closest(".file")), alert(window.lang.error.fileSizeErr), !1) : (Us(e).closest(".file").addClass("full"), Us(e).closest(".file").find("button").html('<div class="d-flex align-items-center justify-content-center"><a class="check"></a></div>'), void Us(e).closest(".file").find(".file-name").text("".concat(i)))
                            })), Us(".check").hover((function () {})), Us(".fileselect").on("click", (function () {
                                Us(this).parent().hasClass("full") ? t(Us(this).parent()) : Us(this).parent().find(".upload-file").trigger("click")
                            })), Us("header .mobile, .fixed-mobile-links .mobile").length && Us("header .mobile, .fixed-mobile-links .mobile").initMM({
                                enable_breakpoint: !0,
                                mobile_button: !0,
                                breakpoint: 992
                            }), Us(".whatsapp_bubble").on("click", (function () {
                                Us(".whatsapp_pp").hasClass("active") ? (Us(".whatsapp_pp").removeClass("active"), Us(".whatsapp_bubble").removeClass("active")) : Us(".whatsapp_pp").addClass("active")
                            })), Us(".whatsapp_pp .close_pp").on("click", (function () {
                                Us(".whatsapp_pp").hasClass("active") ? (Us(".whatsapp_pp").removeClass("active"), Us(".whatsapp_bubble").removeClass("active")) : Us(".whatsapp_pp").addClass("active")
                            })), setTimeout((function () {
                                Us(".whatsapp_bubble").addClass("active")
                            }), 1e4),
                            function () {
                                if (Us("span").hasClass("number")) {
                                    var e = !1;
                                    Us(window).on("scroll", (function () {
                                        var t, n, i;
                                        e || (n = (t = document.getElementsByClassName("number")[0]).getBoundingClientRect().top, i = t.getBoundingClientRect().bottom, n >= 0 && i <= window.innerHeight && (Us(".number").each((function (e, t) {
                                            new Gs(t, Us(this).data("end")).start()
                                        })), e = !0))
                                    }))
                                }
                            }(), Us(".cookie-trust button").on("click", (function () {
                                Us(".cookie-trust").fadeOut(), Vs.set("cookie_trust", "true", {
                                    expires: 30
                                })
                            })),
                            function () {
                                if (void 0 !== Vs.get("cookie_consent")) return !1;
                                Us(".cookie_consent_sub .cookie_consent__content__buttons__accept_selected").click((function (e) {
                                    Us(".cookie_consent .cookie_consent__content__buttons__accept_selected").trigger("click"), Us(".cookie_consent_sub").fadeOut(500), Vs.set("cookie_consent", JSON.stringify([]), {
                                        expires: 30
                                    })
                                }))
                            }(), n = new IntersectionObserver((function (e) {
                                e.forEach((function (e) {
                                    if (e.isIntersecting) {
                                        var t = e.target;
                                        t.classList.add("loaded"), t.src = t.dataset.src, n.unobserve(t)
                                    }
                                }))
                            }), {
                                rootMargin: "15px"
                            }), document.querySelectorAll("img[data-src]").forEach((function (e) {
                                n.observe(e)
                            })),
                            function () {
                                var e = new IntersectionObserver((function (t) {
                                    t.forEach((function (t) {
                                        if (t.isIntersecting) {
                                            var n = t.target;
                                            n.classList.add("loaded"), n.classList.remove("lazy-background"), e.unobserve(n)
                                        }
                                    }))
                                }), {
                                    rootMargin: "15px"
                                });
                                document.querySelectorAll(".lazy-background").forEach((function (t) {
                                    e.observe(t)
                                }))
                            }(), setTimeout((function () {
                                var e = Us(".alert");
                                if (e.exists()) {
                                    console.log(e);
                                    var t = e.offset().top;
                                    window.scrollTo({
                                        top: t,
                                        behavior: "smooth"
                                    })
                                }
                            }), 300)
                    }
                }
            }();
        Xs(document).ready((function () {
            "#open_call_form" == window.location.hash && new Vi(document.getElementById("open_call_form")).show(), "#cooperation_form" == window.location.hash && new Vi(document.getElementById("cooperation_form")).show(), "#contact-doctor-now" == window.location.hash && new Vi(document.getElementById("contact-doctor-now")).show(), Ys.init()
        })), Us((function () {
            Us(".step-by-step .nav li .nav-link").hover((function () {
                Us(this).trigger("click")
            }))
        })), document.addEventListener("click", (function (e) {
            var t = e.target;
            if ("INPUT" === t.tagName || "TEXTAREA" === t.tagName || "SELECT" === t.tagName || "checkbox" === t.tagName || "radio" === t.tagName) {
                var n = document.createElement("script");
                n.src = "https://www.google.com/recaptcha/api.js", n.async = !0, n.defer = !0, document.head.appendChild(n)
            }
        }))
    })(), (e = i(755))("body").append('<div class="mm-fullscreen-bg"></div>'), e.fn.initMM = function () {
        var t = {
            $mobilemenu: e(".panel-menu"),
            mm_close_button: "Close",
            mm_back_button: "Back",
            mm_breakpoint: 768,
            mm_enable_breakpoint: !1,
            mm_mobile_button: !1,
            remember_state: !1,
            second_button: !1,
            init: function (e, n) {
                if (!this.$mobilemenu.length) return console.log('You not have <nav class="panel-menu">menu</nav>. See Documentation'), !1;
                null != arguments[1] && this.parse_arguments(n), this.$mobilemenu.parse_mm(t), this.$mobilemenu.init_mm(t), this.mm_enable_breakpoint && this.$mobilemenu.check_resolution_mm(t), e.mm_handler(t)
            },
            parse_arguments: function (t) {
                var n = this;
                Object(t).hasOwnProperty("menu_class") && (n.$mobilemenu = e("." + t.menu_class)), e.each(t, (function (e, t) {
                    switch (e) {
                        case "right":
                            t && n.$mobilemenu.addClass("mm-right");
                            break;
                        case "close_button_name":
                            n.mm_close_button = t;
                            break;
                        case "back_button_name":
                            n.mm_back_button = t;
                            break;
                        case "width":
                            n.$mobilemenu.css("width", t);
                            break;
                        case "breakpoint":
                            n.mm_breakpoint = t;
                            break;
                        case "enable_breakpoint":
                            n.mm_enable_breakpoint = t;
                            break;
                        case "mobile_button":
                            n.mm_mobile_button = t;
                            break;
                        case "remember_state":
                            n.remember_state = t;
                            break;
                        case "second_button":
                            n.second_button = t
                    }
                }))
            },
            show_button_in_mobile: function (t) {
                var n = this;
                n.mm_mobile_button && (window.innerWidth > n.mm_breakpoint ? t.hide() : t.show(), e(window).resize((function () {
                    window.innerWidth > n.mm_breakpoint ? t.hide() : t.show()
                })))
            }
        };
        t.init(e(this), arguments[0]), t.show_button_in_mobile(e(this))
    }, e.fn.check_resolution_mm = function (t) {
        var n = e(this);
        e(window).resize((function () {
            if (!e("body").hasClass("mm-open") || !n.hasClass("mmitemopen")) return !1;
            window.innerWidth > t.mm_breakpoint && n.closemm(t)
        }))
    }, e.fn.mm_handler = function (t) {
        e(this).click((function (n) {
            e(this).removeClass("not-active").addClass("active"), n.preventDefault(), t.$mobilemenu.openmm()
        })), 0 != t.second_button && e(t.second_button).click((function (e) {
            e.preventDefault(), t.$mobilemenu.openmm()
        }))
    }, e.fn.parse_mm = function (t) {
        var n, i = e(this).clone(),
            s = e('<div class="mmpanels"></div>'),
            r = !1,
            o = 0,
            a = !1,
            l = !1;
        e(this).empty(), i.find("a").each((function () {
            a = e(this), (n = a.parent().find("ul").first()).length && (o++, n.prepend("<li></li>").find("li").first().append(a.clone().addClass("mm-original-link")), a.attr("role", "button").attr("data-target", "#mm" + o).addClass("mm-next-level"))
        })), i.find("ul").each((function (n) {
            var o, a;
            l = !1, r = e('<div class="mmpanel mmhidden">').attr("id", "mm" + n).append(e(this)), 0 == n ? (r.addClass("mmopened").addClass("mmcurrent").removeClass("mmhidden"), o = i.find(".mm-closebtn").html(), a = t.mm_close_button, l = '<li class="mm-close-parent"><a role="button" data-target="#close" class="mm-close">' + (o = null == o ? a : o) + "</a></li>", r.find("ul").first().prepend(l)) : (l = function (e, t) {
                return '<li><a href="#" data-target="#" class="mm-prev-level">' + (e = null == e ? t : e) + "</a></li>"
            }(i.find(".mm-backbtn").html(), t.mm_back_button), r.find("ul").first().prepend(l)), s.append(r)
        })), e(this).append(s)
    }, e.fn.init_mm = function (t) {
        var n = e(this);
        n.find("a").each((function () {
            e(this).click((function (i) {
                var s = e(this),
                    r = !1,
                    o = "";
                return s.hasClass("mm-next-level") ? (i.preventDefault(), o = s.attr("data-target"), (r = n.find(".mmcurrent")).addClass("mmsubopened").removeClass("mmcurrent"), n.find(o).removeClass("mmhidden"), setTimeout((function () {
                    n.find(o).scrollTop(0).addClass("mmcurrent").addClass("mmopened")
                }), 0), setTimeout((function () {
                    r.addClass("mmhidden")
                }), 300), !1) : s.hasClass("mm-prev-level") ? (i.preventDefault(), o = s.attr("href"), (r = n.find(".mmcurrent")).removeClass("mmcurrent").removeClass("mmopened"), n.find(".mmsubopened").last().removeClass("mmhidden").scrollTop(0).removeClass("mmsubopened").addClass("mmcurrent"), setTimeout((function () {
                    r.addClass("mmhidden")
                }), 300), !1) : s.hasClass("mm-close") ? (n.closemm(t), !1) : void 0
            }))
        })), e(".mm-fullscreen-bg").click((function (e) {
            e.preventDefault(), n.closemm(t)
        }))
    }, e.fn.openmm = function () {
        var t = e(this);
        t.show(), setTimeout((function () {
            e("body").addClass("mm-open"), t.addClass("mmitemopen"), e(".mm-fullscreen-bg").fadeIn(300)
        }), 0)
    }, e.fn.closemm = function (t) {
        var n = e(this);
        e("header .mobile button").toggleClass("active not-active"), n.addClass("mmhide"), e(".mm-fullscreen-bg").fadeOut(300), setTimeout((function () {
            ! function (t, n) {
                n.remember_state || (t.find(".mmpanel").toggleClass("mmsubopened mmcurrent mmopened", !1).addClass("mmhidden"), t.find("#mm0").addClass("mmopened").addClass("mmcurrent").removeClass("mmhidden")), t.toggleClass("mmhide mmitemopen", !1).hide(), e("body").removeClass("mm-open")
            }(n, t)
        }), 300)
    }
})();