$(function () {

    $("#input-search").click(function () {
        if ($("#search-slide-menu:first").is(":hidden")) {
            $("#search-slide-menu").slideDown("slow");
            $("#c-mask").show();
            $("#c-mask").addClass('fadeIn');
            $("#c-mask").addClass('is-active');
            $("#c-mask").removeClass('fadeOut');
        } else {
            $("#c-mask").click(function () {
                $("#search-slide-menu").slideUp("slow");
                $("#c-mask").addClass('fadeOut');
                $("#c-mask").removeClass('is-active');
                $("#c-mask").removeClass('fadeIn');
                $("#c-mask").hide();
            })
            $("#search-slide-menu").slideUp("slow");
            $("#c-mask").addClass('fadeOut');
            $("#c-mask").removeClass('is-active');
            $("#c-mask").removeClass('fadeIn');
            $("#c-mask").hide();
        }
    });

    $("#btn-prestation").click(function () {
        if ($("#search-slide-menu:first").is(":hidden")) {
            $("#search-slide-menu").slideDown("slow");
            $("#c-mask").show();
            $("#c-mask").addClass('fadeIn');
            $("#c-mask").addClass('is-active');
            $("#c-mask").removeClass('fadeOut');
            $("#input-search").focus();
        } else {
            $("#c-mask").click(function () {
                $("#search-slide-menu").slideUp("slow");
                $("#c-mask").addClass('fadeOut');
                $("#c-mask").removeClass('is-active');
                $("#c-mask").removeClass('fadeIn');
                $("#c-mask").hide();
            })
            $("#search-slide-menu").slideUp("slow");
            $("#c-mask").addClass('fadeOut');
            $("#c-mask").removeClass('is-active');
            $("#c-mask").removeClass('fadeIn');
            $("#c-mask").hide();
        }
    });

    $('#collapseExample').collapse({
        toggle: true
    })
    $('#collapseExample2').collapse({
        toggle: true
    })
    $('#collapseExample3').collapse({
        toggle: true
    })
    $('#collapseExample4').collapse({
        toggle: true
    })

    $(window).resize(function () {
        checkWidth();
    });
    checkWidth();

    var slideLeft = new Menu({
        wrapper: '#o-wrapper',
        type: 'slide-left',
        menuOpenerClass: '.c-button',
        maskId: '#c-mask'
    });
    var slideLeftBtn = document.querySelector('#c-button--slide-left');

    slideLeftBtn.addEventListener('click', function (e) {
        e.preventDefault;
        slideLeft.open();
    });


});

function checkWidth() {
    if ($(window).width() > 768) {
        $('#collapseExample').on('hide.bs.collapse', function (e) {
            e.preventDefault();
        })
        $('#collapseExample2').on('hide.bs.collapse', function (e) {
            e.preventDefault();
        })
        $('#collapseExample3').on('hide.bs.collapse', function (e) {
            e.preventDefault();
        })
        $('#collapseExample4').on('hide.bs.collapse', function (e) {
            e.preventDefault();
        })
    } else {
        $('#collapseExample').on('hide.bs.collapse', function (e) {})
        $('#collapseExample2').on('hide.bs.collapse', function (e) {})
        $('#collapseExample3').on('hide.bs.collapse', function (e) {})
        $('#collapseExample4').on('hide.bs.collapse', function (e) {})
    }
}