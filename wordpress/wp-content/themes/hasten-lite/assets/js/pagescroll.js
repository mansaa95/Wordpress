(function(d, h, l, e) {
    var c = "mPageScroll2id",
        i = "mPS2id",
        t = ".m_PageScroll2id,a[rel~='m_PageScroll2id'],.page-scroll-to-id,a[rel~='page-scroll-to-id']",
        j = {
            scrollSpeed: 1300,
            autoScrollSpeed: true,
            scrollEasing: "easeInOutExpo",
            scrollingEasing: "easeInOutCirc",
            pageEndSmoothScroll: true,
            layout: "vertical",
            offset: 0,
            highlightSelector: false,
            clickedClass: i + "-clicked",
            targetClass: i + "-target",
            highlightClass: i + "-highlight",
            forceSingleHighlight: false,
            clickEvents: true,
            onStart: function() {},
            onComplete: function() {},
            defaultSelector: false
        },
        p, b, g, a, q, f, n, o, m, r, s = {
            init: function(u) {
                var u = d.extend(true, {}, j, u);
                d(l).data(i, u);
                b = d(l).data(i);
                p = (!p) ? this.selector : p + "," + this.selector;
                if (b.defaultSelector) {
                    if (typeof d(p) !== "object" || d(p).length === 0) {
                        p = t
                    }
                }
                if (b.clickEvents) {
                    d(l).undelegate("." + i).delegate(p, "click." + i, function(x) {
                        var w = d(this),
                            v = w.attr("href"),
                            y = w.prop("href");
                        if (v && v.indexOf("#/") !== -1) {
                            return
                        }
                        k._reset.call(null);
                        r = w.data("ps2id-offset") || 0;
                        if (k._isValid.call(null, v, y) && k._findTarget.call(null, v)) {
                            x.preventDefault();
                            a = "selector";
                            q = w;
                            k._setClasses.call(null, true);
                            k._scrollTo.call(null)
                        }
                    })
                }
                d(h).unbind("." + i).bind("scroll." + i + " resize." + i, function() {
                    var v = d("._" + i + "-t");
                    v.each(function() {
                        var w = d(this),
                            y = w.attr("id"),
                            x = k._findHighlight.call(null, y);
                        k._setClasses.call(null, false, w, x)
                    })
                });
                g = true;
                k._setup.call(null)
            },
            scrollTo: function(w, u) {
                if (w && typeof w !== "undefined") {
                    k._isInit.call(null);
                    var v = {
                            layout: b.layout,
                            offset: b.offset,
                            clicked: false
                        },
                        u = d.extend(true, {}, v, u);
                    k._reset.call(null);
                    o = u.layout;
                    m = u.offset;
                    w = (w.indexOf("#") !== -1) ? w : "#" + w;
                    if (k._isValid.call(null, w) && k._findTarget.call(null, w)) {
                        a = "scrollTo";
                        q = u.clicked;
                        if (q) {
                            k._setClasses.call(null, true)
                        }
                        k._scrollTo.call(null)
                    }
                }
            },
            destroy: function() {
                d(h).unbind("." + i);
                d(l).undelegate("." + i).removeData(i);
                d("." + b.clickedClass).removeClass(b.clickedClass);
                d("." + b.targetClass).removeClass(b.targetClass);
                d("." + b.highlightClass).removeClass(b.highlightClass);
                d("._" + i + "-t").removeData(i).removeClass("_" + i + "-t");
                d("._" + i + "-h").removeClass("_" + i + "-h")
            }
        },
        k = {
            _isValid: function(u, x) {
                if (!u) {
                    return
                }
                x = (!x) ? u : x;
                var w = (x.indexOf("#/") !== -1) ? x.split("#/")[0] : x.split("#")[0],
                    v = h.location.toString().split("#")[0];
                return u !== "#" && u.indexOf("#") !== -1 && (w === "" || w === v)
            },
            _setup: function() {
                var v = (b.highlightSelector && b.highlightSelector !== "") ? b.highlightSelector : p,
                    u = 1;
                return d(v).each(function() {
                    var z = d(this),
                        w = z.attr("href"),
                        B = z.prop("href");
                    if (k._isValid.call(null, w, B)) {
                        var A = (w.indexOf("#/") !== -1) ? w.split("#/")[1] : w.split("#")[1],
                            x = d("#" + A);
                        if (x.length > 0) {
                            if (!x.hasClass("_" + i + "-t")) {
                                x.addClass("_" + i + "-t").data(i, {
                                    i: u
                                })
                            }
                            if (!z.hasClass("_" + i + "-h")) {
                                z.addClass("_" + i + "-h")
                            }
                            var y = k._findHighlight.call(null, A);
                            k._setClasses.call(null, false, x, y);
                            u++
                        }
                    }
                })
            },
            _findTarget: function(w) {
                var v = (w.indexOf("#/") !== -1) ? w.split("#/")[1] : w.split("#")[1],
                    u = d("#" + v);
                if (u.length < 1 || u.css("position") === "fixed") {
                    if (v === "top") {
                        u = d("body")
                    } else {
                        return
                    }
                }
                f = u;
                if (!o) {
                    o = b.layout
                }
                m = k._setOffset.call(null);
                n = [(u.offset().top - m[0]).toString(), (u.offset().left - m[1]).toString()];
                n[0] = (n[0] < 0) ? 0 : n[0];
                n[1] = (n[1] < 0) ? 0 : n[1];
                return n
            },
            _setOffset: function() {
                if (!m) {
                    m = (b.offset) ? b.offset : 0
                }
                if (r) {
                    m = r
                }
                var w, v, z, u;
                switch (typeof m) {
                    case "object":
                    case "string":
                        w = [(m.y) ? m.y : m, (m.x) ? m.x : m];
                        v = [(w[0] instanceof jQuery) ? w[0] : d(w[0]), (w[1] instanceof jQuery) ? w[1] : d(w[1])];
                        if (v[0].length > 0) {
                            z = v[0].height();
                            if (v[0].css("position") === "fixed") {
                                z += v[0][0].offsetTop
                            }
                        } else {
                            if (!isNaN(parseFloat(w[0])) && isFinite(w[0])) {
                                z = parseInt(w[0])
                            } else {
                                z = 0
                            }
                        }
                        if (v[1].length > 0) {
                            u = v[1].width();
                            if (v[1].css("position") === "fixed") {
                                u += v[1][0].offsetLeft
                            }
                        } else {
                            if (!isNaN(parseFloat(w[1])) && isFinite(w[1])) {
                                u = parseInt(w[1])
                            } else {
                                u = 0
                            }
                        }
                        break;
                    case "function":
                        w = m.call(null);
                        if (w instanceof Array) {
                            z = w[0];
                            u = w[1]
                        } else {
                            z = u = w
                        }
                        break;
                    default:
                        z = u = parseInt(m)
                }
                return [z, u]
            },
            _findHighlight: function(z) {
                var y = h.location.toString().split("#")[0],
                    v = d("._" + i + "-h[href='#" + z + "']"),
                    w = d("._" + i + "-h[href='" + y + "#" + z + "']"),
                    u = d("._" + i + "-h[href='#/" + z + "']"),
                    x = d("._" + i + "-h[href='" + y + "#/" + z + "']");
                v = (v.length > 0) ? v : w;
                u = (u.length > 0) ? u : x;
                return (u.length > 0) ? u : v
            },
            _setClasses: function(z, v, w) {
                var y = b.clickedClass,
                    u = b.targetClass,
                    x = b.highlightClass;
                if (z && y && y !== "") {
                    d("." + y).removeClass(y);
                    q.addClass(y)
                } else {
                    if (v && u && u !== "" && w && x && x !== "") {
                        if (k._currentTarget.call(null, v)) {
                            if (b.forceSingleHighlight) {
                                d("." + x).removeClass(x)
                            }
                            v.addClass(u);
                            w.addClass(x)
                        } else {
                            v.removeClass(u);
                            w.removeClass(x)
                        }
                    }
                }
            },
            _currentTarget: function(H) {
                var K = b["target_" + H.data(i).i],
                    w = H[0].getBoundingClientRect();
                if (typeof K !== "undefined") {
                    var F = H.offset().top,
                        G = H.offset().left,
                        L = (K.from) ? K.from + F : F,
                        z = (K.to) ? K.to + F : F,
                        I = (K.fromX) ? K.fromX + G : G,
                        v = (K.toX) ? K.toX + G : G;
                    return (w.top >= z && w.top <= L && w.left >= v && w.left <= I)
                } else {
                    var D = d(h).height(),
                        O = d(h).width(),
                        C = H.height(),
                        N = H.width(),
                        B = 1 + (C / D),
                        J = B,
                        E = (C < D) ? B * (D / C) : B,
                        u = 1 + (N / O),
                        A = u,
                        M = (N < O) ? u * (O / N) : u;
                    return (w.top <= D / J && w.bottom >= D / E && w.left <= O / A && w.right >= O / M)
                }
            },
            _scrollTo: function() {
                b.scrollSpeed = parseInt(b.scrollSpeed);
                n = (b.pageEndSmoothScroll) ? k._pageEndSmoothScroll.call(null) : n;
                var v = d("html,body"),
                    x = (b.autoScrollSpeed) ? k._autoScrollSpeed.call(null) : b.scrollSpeed,
                    z = (v.is(":animated")) ? b.scrollingEasing : b.scrollEasing,
                    w = d(h).scrollTop(),
                    u = d(h).scrollLeft();
                switch (o) {
                    case "horizontal":
                        if (u != n[1]) {
                            k._callbacks.call(null, "onStart");
                            v.stop().animate({
                                scrollLeft: n[1]
                            }, x, z).promise().then(function() {
                                k._callbacks.call(null, "onComplete")
                            })
                        }
                        break;
                    case "auto":
                        if (w != n[0] || u != n[1]) {
                            k._callbacks.call(null, "onStart");
                            if (navigator.userAgent.match(/(iPod|iPhone|iPad|Android)/)) {
                                var y;
                                v.stop().animate({
                                    pageYOffset: n[0],
                                    pageXOffset: n[1]
                                }, {
                                    duration: x,
                                    easing: z,
                                    step: function(A, B) {
                                        if (B.prop == "pageXOffset") {
                                            y = A
                                        } else {
                                            if (B.prop == "pageYOffset") {
                                                h.scrollTo(y, A)
                                            }
                                        }
                                    }
                                }).promise().then(function() {
                                    k._callbacks.call(null, "onComplete")
                                })
                            } else {
                                v.stop().animate({
                                    scrollTop: n[0],
                                    scrollLeft: n[1]
                                }, x, z).promise().then(function() {
                                    k._callbacks.call(null, "onComplete")
                                })
                            }
                        }
                        break;
                    default:
                        if (w != n[0]) {
                            k._callbacks.call(null, "onStart");
                            v.stop().animate({
                                scrollTop: n[0]
                            }, x, z).promise().then(function() {
                                k._callbacks.call(null, "onComplete")
                            })
                        }
                }
            },
            _pageEndSmoothScroll: function() {
                var u = d(l).height(),
                    x = d(l).width(),
                    w = d(h).height(),
                    v = d(h).width();
                return [((u - n[0]) < w) ? u - w : n[0], ((x - n[1]) < v) ? x - v : n[1]]
            },
            _autoScrollSpeed: function() {
                var w = d(h).scrollTop(),
                    v = d(h).scrollLeft(),
                    x = d(l).height(),
                    u = d(l).width(),
                    y = [b.scrollSpeed + ((b.scrollSpeed * (Math.floor((Math.abs(n[0] - w) / x) * 100))) / 100), b.scrollSpeed + ((b.scrollSpeed * (Math.floor((Math.abs(n[1] - v) / u) * 100))) / 100)];
                return Math.max.apply(Math, y)
            },
            _callbacks: function(u) {
                if (!b) {
                    return
                }
                this[i] = {
                    trigger: a,
                    clicked: q,
                    target: f,
                    scrollTo: {
                        y: n[0],
                        x: n[1]
                    }
                };
                switch (u) {
                    case "onStart":
                        b.onStart.call(null, this[i]);
                        break;
                    case "onComplete":
                        b.onComplete.call(null, this[i]);
                        break
                }
            },
            _reset: function() {
                o = m = r = false
            },
            _isInit: function() {
                if (!g) {
                    s.init.apply(this)
                }
            },
            _easing: function() {
                d.easing.easeInQuad = d.easing.easeInQuad || function(v, w, u, z, y) {
                    return z * (w /= y) * w + u
                };
                d.easing.easeOutQuad = d.easing.easeOutQuad || function(v, w, u, z, y) {
                    return -z * (w /= y) * (w - 2) + u
                };
                d.easing.easeInOutQuad = d.easing.easeInOutQuad || function(v, w, u, z, y) {
                    if ((w /= y / 2) < 1) {
                        return z / 2 * w * w + u
                    }
                    return -z / 2 * ((--w) * (w - 2) - 1) + u
                };
                d.easing.easeInCubic = d.easing.easeInCubic || function(v, w, u, z, y) {
                    return z * (w /= y) * w * w + u
                };
                d.easing.easeOutCubic = d.easing.easeOutCubic || function(v, w, u, z, y) {
                    return z * ((w = w / y - 1) * w * w + 1) + u
                };
                d.easing.easeInOutCubic = d.easing.easeInOutCubic || function(v, w, u, z, y) {
                    if ((w /= y / 2) < 1) {
                        return z / 2 * w * w * w + u
                    }
                    return z / 2 * ((w -= 2) * w * w + 2) + u
                };
                d.easing.easeInQuart = d.easing.easeInQuart || function(v, w, u, z, y) {
                    return z * (w /= y) * w * w * w + u
                };
                d.easing.easeOutQuart = d.easing.easeOutQuart || function(v, w, u, z, y) {
                    return -z * ((w = w / y - 1) * w * w * w - 1) + u
                };
                d.easing.easeInOutQuart = d.easing.easeInOutQuart || function(v, w, u, z, y) {
                    if ((w /= y / 2) < 1) {
                        return z / 2 * w * w * w * w + u
                    }
                    return -z / 2 * ((w -= 2) * w * w * w - 2) + u
                };
                d.easing.easeInQuint = d.easing.easeInQuint || function(v, w, u, z, y) {
                    return z * (w /= y) * w * w * w * w + u
                };
                d.easing.easeOutQuint = d.easing.easeOutQuint || function(v, w, u, z, y) {
                    return z * ((w = w / y - 1) * w * w * w * w + 1) + u
                };
                d.easing.easeInOutQuint = d.easing.easeInOutQuint || function(v, w, u, z, y) {
                    if ((w /= y / 2) < 1) {
                        return z / 2 * w * w * w * w * w + u
                    }
                    return z / 2 * ((w -= 2) * w * w * w * w + 2) + u
                };
                d.easing.easeInExpo = d.easing.easeInExpo || function(v, w, u, z, y) {
                    return (w == 0) ? u : z * Math.pow(2, 10 * (w / y - 1)) + u
                };
                d.easing.easeOutExpo = d.easing.easeOutExpo || function(v, w, u, z, y) {
                    return (w == y) ? u + z : z * (-Math.pow(2, -10 * w / y) + 1) + u
                };
                d.easing.easeInOutExpo = d.easing.easeInOutExpo || function(v, w, u, z, y) {
                    if (w == 0) {
                        return u
                    }
                    if (w == y) {
                        return u + z
                    }
                    if ((w /= y / 2) < 1) {
                        return z / 2 * Math.pow(2, 10 * (w - 1)) + u
                    }
                    return z / 2 * (-Math.pow(2, -10 * --w) + 2) + u
                };
                d.easing.easeInSine = d.easing.easeInSine || function(v, w, u, z, y) {
                    return -z * Math.cos(w / y * (Math.PI / 2)) + z + u
                };
                d.easing.easeOutSine = d.easing.easeOutSine || function(v, w, u, z, y) {
                    return z * Math.sin(w / y * (Math.PI / 2)) + u
                };
                d.easing.easeInOutSine = d.easing.easeInOutSine || function(v, w, u, z, y) {
                    return -z / 2 * (Math.cos(Math.PI * w / y) - 1) + u
                };
                d.easing.easeInCirc = d.easing.easeInCirc || function(v, w, u, z, y) {
                    return -z * (Math.sqrt(1 - (w /= y) * w) - 1) + u
                };
                d.easing.easeOutCirc = d.easing.easeOutCirc || function(v, w, u, z, y) {
                    return z * Math.sqrt(1 - (w = w / y - 1) * w) + u
                };
                d.easing.easeInOutCirc = d.easing.easeInOutCirc || function(v, w, u, z, y) {
                    if ((w /= y / 2) < 1) {
                        return -z / 2 * (Math.sqrt(1 - w * w) - 1) + u
                    }
                    return z / 2 * (Math.sqrt(1 - (w -= 2) * w) + 1) + u
                };
                d.easing.easeInElastic = d.easing.easeInElastic || function(v, y, u, C, B) {
                    var z = 1.70158;
                    var A = 0;
                    var w = C;
                    if (y == 0) {
                        return u
                    }
                    if ((y /= B) == 1) {
                        return u + C
                    }
                    if (!A) {
                        A = B * 0.3
                    }
                    if (w < Math.abs(C)) {
                        w = C;
                        var z = A / 4
                    } else {
                        var z = A / (2 * Math.PI) * Math.asin(C / w)
                    }
                    return -(w * Math.pow(2, 10 * (y -= 1)) * Math.sin((y * B - z) * (2 * Math.PI) / A)) + u
                };
                d.easing.easeOutElastic = d.easing.easeOutElastic || function(v, y, u, C, B) {
                    var z = 1.70158;
                    var A = 0;
                    var w = C;
                    if (y == 0) {
                        return u
                    }
                    if ((y /= B) == 1) {
                        return u + C
                    }
                    if (!A) {
                        A = B * 0.3
                    }
                    if (w < Math.abs(C)) {
                        w = C;
                        var z = A / 4
                    } else {
                        var z = A / (2 * Math.PI) * Math.asin(C / w)
                    }
                    return w * Math.pow(2, -10 * y) * Math.sin((y * B - z) * (2 * Math.PI) / A) + C + u
                };
                d.easing.easeInOutElastic = d.easing.easeInOutElastic || function(v, y, u, C, B) {
                    var z = 1.70158;
                    var A = 0;
                    var w = C;
                    if (y == 0) {
                        return u
                    }
                    if ((y /= B / 2) == 2) {
                        return u + C
                    }
                    if (!A) {
                        A = B * (0.3 * 1.5)
                    }
                    if (w < Math.abs(C)) {
                        w = C;
                        var z = A / 4
                    } else {
                        var z = A / (2 * Math.PI) * Math.asin(C / w)
                    }
                    if (y < 1) {
                        return -0.5 * (w * Math.pow(2, 10 * (y -= 1)) * Math.sin((y * B - z) * (2 * Math.PI) / A)) + u
                    }
                    return w * Math.pow(2, -10 * (y -= 1)) * Math.sin((y * B - z) * (2 * Math.PI) / A) * 0.5 + C + u
                };
                d.easing.easeInBack = d.easing.easeInBack || function(v, w, u, A, z, y) {
                    if (y == e) {
                        y = 1.70158
                    }
                    return A * (w /= z) * w * ((y + 1) * w - y) + u
                };
                d.easing.easeOutBack = d.easing.easeOutBack || function(v, w, u, A, z, y) {
                    if (y == e) {
                        y = 1.70158
                    }
                    return A * ((w = w / z - 1) * w * ((y + 1) * w + y) + 1) + u
                };
                d.easing.easeInOutBack = d.easing.easeInOutBack || function(v, w, u, A, z, y) {
                    if (y == e) {
                        y = 1.70158
                    }
                    if ((w /= z / 2) < 1) {
                        return A / 2 * (w * w * (((y *= (1.525)) + 1) * w - y)) + u
                    }
                    return A / 2 * ((w -= 2) * w * (((y *= (1.525)) + 1) * w + y) + 2) + u
                };
                d.easing.easeInBounce = d.easing.easeInBounce || function(v, w, u, z, y) {
                    return z - d.easing.easeOutBounce(v, y - w, 0, z, y) + u
                };
                d.easing.easeOutBounce = d.easing.easeOutBounce || function(v, w, u, z, y) {
                    if ((w /= y) < (1 / 2.75)) {
                        return z * (7.5625 * w * w) + u
                    } else {
                        if (w < (2 / 2.75)) {
                            return z * (7.5625 * (w -= (1.5 / 2.75)) * w + 0.75) + u
                        } else {
                            if (w < (2.5 / 2.75)) {
                                return z * (7.5625 * (w -= (2.25 / 2.75)) * w + 0.9375) + u
                            } else {
                                return z * (7.5625 * (w -= (2.625 / 2.75)) * w + 0.984375) + u
                            }
                        }
                    }
                };
                d.easing.easeInOutBounce = d.easing.easeInOutBounce || function(v, w, u, z, y) {
                    if (w < y / 2) {
                        return d.easing.easeInBounce(v, w * 2, 0, z, y) * 0.5 + u
                    }
                    return d.easing.easeOutBounce(v, w * 2 - y, 0, z, y) * 0.5 + z * 0.5 + u
                }
            }
        };
    k._easing.call();
    d.fn[c] = function(u) {
        if (s[u]) {
            return s[u].apply(this, Array.prototype.slice.call(arguments, 1))
        } else {
            if (typeof u === "object" || !u) {
                return s.init.apply(this, arguments)
            } else {
                d.error("Method " + u + " does not exist")
            }
        }
    };
    d[c] = function(u) {
        if (s[u]) {
            return s[u].apply(this, Array.prototype.slice.call(arguments, 1))
        } else {
            if (typeof u === "object" || !u) {
                return s.init.apply(this, arguments)
            } else {
                d.error("Method " + u + " does not exist")
            }
        }
    };
    d[c].defaults = j
})(jQuery, window, document);
