/* ===============================================
#360px未満viewport変更
=============================================== */
!(function () {
    const viewport = document.querySelector('meta[name="viewport"]');
    function switchViewport() {
        const value =
            window.outerWidth > 360
                ? "width=device-width,initial-scale=1"
                : "width=360";
        if (viewport.getAttribute("content") !== value) {
            viewport.setAttribute("content", value);
        }
    }
    addEventListener("resize", switchViewport, false);
    switchViewport();
})();
/* ===============================================
#ハンバーガーメニュー
=============================================== */
jQuery(function ($) {
    var menu = $(".c-drawer__open");

    $(".c-drawer__item a").on("click", function () {
        $("body").removeClass("is-fixed");
    });

    $(".c-drawer__close").on("click", function () {
        $("body").removeClass("is-fixed");
    });

    menu.on("click", function () {
        $("body").toggleClass("is-fixed");
    });
});

jQuery(function ($) {
    $(".c-drawer__lists a").click(function () {
        $("#drawer-check")
            .removeAttr("checked")
            .prop("checked", false)
            .change();
        $("body").removeClass("is-fixed");
    });
});
/* ===============================================
#スムーススクロール
=============================================== */
jQuery(function ($) {
    "use strict";
    $('a[href^="#"]').click(function () {
        var windowWidth = $(window).width();

        if (windowWidth >= 1024) {
            var headerHight = 0; //ヘッダの高さ
        } else if (windowWidth >= 768) {
            headerHight = 0; //ヘッダの高さ
        } else {
            headerHight = 0; //ヘッダの高さ
        }
        // スクロールの速度
        var speed = 400; // ミリ秒
        // アンカーの値取得
        var href = $(this).attr("href");
        // 移動先を取得
        var target = $(href == "#" || href == "" ? "html" : href);
        // 移動先を数値で取得
        var position = target.offset().top - headerHight;
        // スムーススクロール
        $("body,html").animate({ scrollTop: position }, speed, "swing");
        return false;
    });
});
/* ===============================================
#スライダー
=============================================== */
jQuery(function ($) {
    var ani1 = 0;
    var ani2 = 1;
    var ani3 = 2;
    setInterval(function () {
        $(".mv__slide-item")
            .removeClass("animation")
            .eq(ani1)
            .addClass("animation");
        $(".mv__slide-item").eq(ani1).css("z-index", 4);
        $(".mv__slide-item").eq(ani2).css("z-index", 3);
        $(".mv__slide-item").eq(ani3).css("z-index", 2);
        ani1++;
        ani2++;
        ani3++;
        if (ani1 >= $(".mv__slide-item").length) ani1 = 0;
        if (ani2 >= $(".mv__slide-item").length) ani2 = 0;
        if (ani3 >= $(".mv__slide-item").length) ani3 = 0;
    }, 9000);
});
