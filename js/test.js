var headerHeight = $(".navbar-site").height(),
    wrapper = $("#wrapper");

function is_touch_device() {
    return "ontouchstart" in window
}
var isTouchDevice = is_touch_device();
console.log("is touch device : ", isTouchDevice);
//  $(function() {
//     var e = moment().format("MM/DD/YYYY");
//     $('input[name="date"]').daterangepicker({
//         singleDatePicker: !0,
//         startDate: e,
//         showDropdowns: !0,
//         locale: {
//             format: "MM/DD/YYYY"
//         }
//     }, function(e, i, t) {})
// });
$(document).ready(function() {
    var i, t, s = $(".navbar-site"),
        e = !1,
        a = "left";
    "rtl" == $("html").attr("dir") ? (e = !0, console.log(e), a = "right") : console.log(e), console.log(a), console.log(headerHeight), wrapper.css("padding-top", headerHeight + "px"), isTouchDevice || (i = ".layer-bg", t = (i = $("" + i)).outerHeight(), $(document).scroll(function() {
        var e = (t - window.scrollY) / t;
        0 <= e && i.css("background-color", "rgba(0,0,0," + (1.1 - e) + ")")
    }));
    //  $(".bg-slider").bxSlider({
    //     auto: !0,
    //     autoControls: !1,
    //     stopAutoOnClick: !0,
    //     mode: "fade",
    //     speed: 800,
    //     pause: 5e3,
    //     pager: !1
    // });
    // var l = $(".item-carousel");
    // l.owlCarousel({
    //     navigation: !1,
    //     pagination: !0,
    //     items: 5,
    //     itemsDesktopSmall: [979, 3],
    //     itemsTablet: [768, 3],
    //     itemsTabletSmall: [660, 2],
    //     itemsMobile: [400, 1]
    // }), $(".slider-nav").click(function() {
    //     l.trigger("owl.next")
    // }), $("#prevItem").click(function() {
    //     l.trigger("owl.prev")
    // });
    // var o = $(".featured-list-slider");
    // o.owlCarousel({
    //     navigation: !1,
    //     pagination: !1,
    //     items: 5,
    //     itemsDesktopSmall: [979, 3],
    //     itemsTablet: [768, 3],
    //     itemsTabletSmall: [660, 2],
    //     itemsMobile: [400, 1]
    // });
    //  $(".featured-list-row .next").click(function() {
    //     o.trigger("owl.next")
    // });
    //  $(".featured-list-row .prev").click(function() {
    //     o.trigger("owl.prev")
    // });
    //  $(".nav-tabs li > a").click(function() {
    //     $(this).closest("ul").find("li").removeClass("active"), $(this).parent("li").addClass("active")
    // });
    //  $("#ajaxTabs li > a").click(function() {
    //     return $("#allAds").empty().append("<div id='loading text-center'> <br> <img class='center-block' src='images/loading.gif' alt='Loading' /> <br> </div>"), $("#ajaxTabs li").removeClass("active"), $(this).parent("li").addClass("active"), $.ajax({
    //         url: this.href,
    //         success: function(e) {
    //             $("#allAds").empty().append(e), $(".tooltipHere").tooltip("hide")
    //         }
    //     }), !1
    // });
    urls = $("#ajaxTabs li:first-child a").attr("href"), $("#allAds").empty().append("<div id='loading text-center'> <br> <img class='center-block' src='images/loading.gif' alt='Loading' /> <br>  </div>"), $.ajax({
        url: urls,
        success: function(e) {
            $("#allAds").empty().append(e), $(".tooltipHere").tooltip("hide"), $(function() {
                $(".hasGridView").addClass("make-grid")
            })
        }
    }), $(".list-view,#ajaxTabs li a").click(function(e) {
        e.preventDefault(), $(".grid-view,.compact-view").removeClass("active"), $(".list-view").addClass("active"), $(".category-list").addClass("make-list").removeClass("make-grid make-compact"), $(".adds-wrapper").hasClass("property-list") ? $(".item-list .add-desc-box").removeClass("col-md-9").addClass("col-md-6") : $(".item-list .add-desc-box").removeClass("col-md-9").addClass("col-md-7")
    }), $(".grid-view").click(function(e) {
        e.preventDefault(), $(".list-view,.compact-view").removeClass("active"), $(this).addClass("active"), $(".category-list").addClass("make-grid").removeClass("make-list make-compact"), $(".adds-wrapper").hasClass("property-list")
    }), $(".compact-view").click(function(e) {
        e.preventDefault(), $(".list-view,.grid-view").removeClass("active"), $(this).addClass("active"), $(".category-list").addClass("make-compact").removeClass("make-list make-grid"), $(".adds-wrapper").hasClass("property-list") ? $(".item-list .add-desc-box").addClass("col-md-9").removeClass("col-md-6") : $(".item-list .add-desc-box").addClass("col-md-9").removeClass("col-md-7")
    }), $(".e-grid-view").click(function(e) {
        $(this).addClass("active"), $(".event-category-list").removeClass("has-list-view"), $(".e-list-view").removeClass("active")
    }), $(".e-list-view").click(function(e) {
        $(this).addClass("active"), $(".event-category-list").addClass("has-list-view"), $(".e-grid-view").removeClass("active")
    }), $(this).width() < 767 && $(".event-category-list .event-item-col").each(function(e, i) {
        var t = $(this).find(".card-footer"),
            s = $(this).find(".card-event-info");
        $(this).find(".badge.price-tag").clone().insertAfter(s), t.clone().insertAfter(s)
    });
    //  $(".long-list").hideMaxListItems({
    //     max: 8,
    //     speed: 500,
    //     moreText: "View More ([COUNT])"
    // });
    //  $(".long-list-user").hideMaxListItems({
    //     max: 12,
    //     speed: 500,
    //     moreText: "View More ([COUNT])"
    // });
     $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    });
    //  $("select.selecter").niceSelect({}), $(".selectpicker").niceSelect({}), $(".scrollbar").niceScroll(), $(".loginForm").validate(), $(document).on("click", "a.scrollto", function(e) {
    //     e.preventDefault(), $("html, body").animate({
    //         scrollTop: $($.attr(this, "href")).offset().top
    //     }, 500)
    // });
    var c = $(".cat-collapse");
    $(window).bind("resize load", function() {
        $(this).width() < 767 ? (c.collapse("hide"), c.on("show.bs.collapse", function() {
            $(this).prev(".cat-title").find(".icon-down-open-big").addClass("active-panel")
        }), c.on("hide.bs.collapse", function() {
            $(this).prev(".cat-title").find(".icon-down-open-big").removeClass("active-panel")
        })) : ($("#bd-docs-nav").collapse("show"), c.collapse("show"))
    }), $(".tbtn").click(function() {
        $(".themeControll").toggleClass("active")
    }), $("input:radio").click(function() {
        0 < $("input:radio#job-seeker:checked").length ? ($(".forJobSeeker").removeClass("hide"), $(".forJobFinder").addClass("hide")) : ($(".forJobFinder").removeClass("hide"), $(".forJobSeeker").addClass("hide"))
    });
    var n = {},
        r = {};
    e ? (n = {
        right: "-251px"
    }, r = {
        right: "0"
    }) : (n = {
        left: "-251px"
    }, r = {
        left: "0"
    }), $(".filter-toggle").click(function() {
        $(".mobile-filter-sidebar").prepend("<div class='closeFilter'>X</div>")
        .animate(r, 250, "linear", function() {}), $(".menu-overly-mask").addClass("is-visible")
    }), $(".menu-overly-mask").click(function() {
        $(".mobile-filter-sidebar").animate(n, 250, "linear", function() {}), $(".menu-overly-mask").removeClass("is-visible")
    }), $(document).on("click", ".closeFilter", function() {
        $(".mobile-filter-sidebar").animate(n, 250, "linear", function() {}), $(".menu-overly-mask").removeClass("is-visible")
    }), $("#selectRegion").on("shown.bs.modal", function(e) {
        $("ul.list-link li a").click(function() {
            $("ul.list-link li a").removeClass("active"), $(this).addClass("active"), $(".cityName").text($(this).text()), $("#selectRegion").modal("hide")
        })
    }), $("#checkAll").click(function() {
        $(".add-img-selector input:checkbox").not(this).prop("checked", this.checked)
    });
    var d;
    isTouchDevice || (d = 0, $(window).scroll(function(e) {
        var i = $(this).scrollTop();
        d < i ? s.addClass("stuck") : s.removeClass("stuck"), i < 450 && s.removeClass("stuck"), d = i
    })), $(".dropdown-clear-filter").click(function(e) {
        $(this).closest(".dropdown-menu").find('input[type="radio"]').prop("checked", !1), $(this).closest(".dropdown-menu").find('input[type="checkbox"]').prop("checked", !1), e.stopPropagation()
    }), $(".dropdown-menu.stay").click(function(e) {
        console.log("stay"), e.stopPropagation()
    }), $("ul.dropdown-menu-sort li").click(function(e) {
        $("ul.dropdown-menu-sort li").removeClass("active"), $(this).addClass("active");
        var i = $(this).find("a").text();
        $(".dropdown-menu-sort-selected").text(i)
    }), $(".markAsRead").click(function(e) {
        e.stopPropagation();
        var i = $(this).closest(".list-group-item").hasClass("seen") ? "Mark as read" : "Mark as unread";
        $(this).find("i").toggleClass("fa-envelope-open fa-envelope"), $(this).closest(".list-group-item").toggleClass("seen"), $(this).attr("title", i), $(this).attr("data-original-title", i)
    });
    var m = function(s) {
        $(".message-list .list-group-item").each(function() {
            var e = $(this).find(".markAsRead"),
                i = "seen" === s,
                t = i ? "Mark as read" : "Mark as unread";
            i ? (e.closest(".list-group-item").addClass("seen"), e.find("i").addClass("fa-envelope-open").removeClass("fa-envelope")) : (e.closest(".list-group-item").removeClass("seen"), e.find("i").addClass("fa-envelope").removeClass("fa-envelope-open")), e.attr("title", t), e.attr("data-original-title", t)
        })
    };
    $(".markAllAsUnRead").click(function() {
        m("seen")
    }), $(".markAllAsRead").click(function() {
        m("notseen")
    }), $(".markAsStar").click(function(e) {
        e.stopPropagation(), $(this).find("i").toggleClass("fas far")
    }), $("#form-check-all").click(function(e) {
        e.stopPropagation(), $(".message-list input:checkbox").not(this).prop("checked", this.checked)
    })
});