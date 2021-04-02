!(function (n) {
    "use strict";
    var a = {
        initialize: function () {
            this.event(),
                this.toggler(),
                this.dropdown(),
                this.mobileMenu(),
                this.sideMenu(),
                this.navbarSticky(),
                this.scrollspy();
        },
        event: function () { },
        toggler: function () {
            n(".navbar-toggler").each(function () {
                var a = n(this);
                a.on("click", function () {
                    a.toggleClass("active");
                }),
                    n(window).resize(function () {
                        n(".navbar-toggler").removeClass("active");
                    });
            });
        },
        dropdown: function () {
            n(".bsnav .nav-item.dropdown")
                .on("mouseenter", function () {
                    n(this).find("> .navbar-nav").addClass("in");
                })
                .on("mouseleave", function () {
                    n(this).find("> .navbar-nav").removeClass("in");
                });
        },
        mobileMenu: function () {
            n(".bsnav .navbar-mobile")[0] &&
                n(".bsnav-mobile")[0] &&
                (n(".bsnav .navbar-mobile").closest(".bsnav-dark")[0] &&
                    n(".bsnav-mobile .navbar").addClass("bsnav-dark"),
                    n(".bsnav .navbar-mobile").closest(".bsnav-light")[0] &&
                    n(".bsnav-mobile .navbar").addClass("bsnav-dark"),
                    n(".bsnav .navbar-mobile").each(function () {
                        var a = n(this).clone();
                        a.find(".dropdown").removeClass("dropdown"),
                            a.appendTo(".bsnav-mobile .navbar");
                    }),
                    n(".navbar-toggler").attr("data-target") ||
                    n(".navbar-toggler").on("click", function () {
                        n(".bsnav-mobile").toggleClass("in");
                    }),
                    n(".bsnav-mobile .bsnav-mobile-overlay").on("click", function () {
                        n(".bsnav-mobile").removeClass("in"),
                            n(".navbar-toggler").removeClass("active");
                    }),
                    this.sideMenuNavigation(n(".bsnav-mobile")),
                    n(window).resize(function () {
                        n(".bsnav-mobile").removeClass("in");
                    }));
        },
        sideMenu: function () {
            n(".bsnav-sidebar")[0] &&
                (this.sideMenuNavigation(n(".bsnav-sidebar")),
                    n(".bsnav-sidebar-left")[0] &&
                    n("body").addClass("bsnav-has-left-sidebar"),
                    n(".bsnav-sidebar-right")[0] &&
                    n("body").addClass("bsnav-has-right-sidebar"),
                    n(".bsnav-sidebar-condensed")[0] &&
                    n("body").addClass("bsnav-has-condensed-sidebar"),
                    n(".bsnav-sidebar .nav-item > .navbar-nav")
                        .parent()
                        .addClass("menu-item-has-children"));
        },
        sideMenuNavigation: function (a) {
            a.find(".nav-link").on("click", function (s) {
                var i = n(this);
                i.siblings(".navbar-nav")[0] &&
                    (s.preventDefault(),
                        i.parent().hasClass("in")
                            ? (i.parent().removeClass("in"),
                                i.parent().find(".in").removeClass("in"),
                                i.parent().find(".navbar-nav").stop(!0).slideUp(300))
                            : (i.closest(".in")[0] ||
                                (a.find(".nav-item.in .navbar-nav").stop(!0).slideUp(300),
                                    a.find(".nav-item.in").removeClass("in")),
                                i.parent().addClass("in"),
                                i
                                    .parent()
                                    .siblings(".in")
                                    .find(".navbar-nav")
                                    .stop(!0)
                                    .slideUp(300),
                                i.parent().siblings(".in").removeClass("in"),
                                i.siblings(".navbar-nav").stop(!0).slideDown(300)));
            });
        },
        navbarSticky: function () {
            var a = function (n, a, s) {
                s > a && n.addClass("sticked"),
                    s > a + 30 && n.addClass("in"),
                    0 == s && n.removeClass("sticked").removeClass("in");
            };
            if (n(".bsnav-sticky")[0]) {
                var s = n(".bsnav-sticky").outerHeight(),
                    i = n(window).scrollTop();
                a(n(".bsnav-sticky"), s, i),
                    n(window).on("scroll", function () {
                        (i = n(window).scrollTop()), a(n(".bsnav-sticky"), s, i);
                    });
            }
        },
        scrollspy: function () {
            var a = n(".bsnav-scrollspy"),
                s = a.outerHeight(),
                i = [];
            if (a.length) {
                a.find("[data-scrollspy]").each(function (a) {
                    i.push(n(this).data("scrollspy"));
                }),
                    n(window).scroll(function () {
                        !(function () {
                            if (!a.hasClass("spying")) {
                                var e = n(window).scrollTop();
                                i.map(function (i, o) {
                                    var t = n("#" + i).offset().top - s,
                                        l = t + n("#" + i).outerHeight();
                                    e >= t &&
                                        e <= l &&
                                        (a.find(".nav-item").removeClass("active"),
                                            n("[data-scrollspy=" + i + "]")
                                                .parent()
                                                .addClass("active"));
                                });
                            }
                        })();
                    }),
                    a.find("[data-scrollspy]").click(function (i) {
                        i.preventDefault(), a.addClass("spying");
                        var e = n(this).data("scrollspy");
                        a.find(".nav-item").removeClass("active"),
                            n(this).parent().addClass("active"),
                            n("html,body").animate(
                                { scrollTop: n("#" + e).offset().top - s },
                                800,
                                function () {
                                    a.removeClass("spying");
                                }
                            );
                    });
            }
        },
    };
    n(document).ready(function () {
        a.initialize();
    })
})(jQuery);