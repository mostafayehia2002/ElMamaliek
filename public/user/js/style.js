$(document).ready(function () {
    $("#btn-notification").click(function () {
        var myDiv = $("#section-50");
        if (myDiv.css("display") === "none") {
            myDiv.css("display", "block");
        } else {
            myDiv.css("display", "none");
        }
    });
    $("#myfunc").click(function () {
        var myDiv = $("#modal_login");
        if (myDiv.css("display") === "none") {
            myDiv.css("display", "block");
        } else {
            myDiv.css("display", "none");
        }
    });
    $("#showButton").click(function () {
        var myDiv = $("#login-panel-actionss");

        if (myDiv.css("display") === "none") {
            myDiv.css("display", "block");
            $("#login-panel-actions").css("display", "none");
        } else {
            myDiv.css("display", "none");
        }
    });
    $("#email-login-form-submit-btn").click(function () {
        var myDiv = $("#verification");

        if (myDiv.css("display") === "none") {
            myDiv.css("display", "block");
            $(this).css("display", "none");
        } else {
            myDiv.css("display", "none");
        }
    });
    $("#showButtonn").click(function () {
        var myDiv = $("#login-panel-actionsss");

        if (myDiv.css("display") === "none") {
            myDiv.css("display", "block");
            $("#login-panell-actions").css("display", "none");
        } else {
            myDiv.css("display", "none");
        }
    });
    $("#email-login-form-submit-bttn").click(function () {
        var myDiv = $("#verificationn");

        if (myDiv.css("display") === "none") {
            myDiv.css("display", "block");
            $("#email-login-form-submit-bttn").css("display", "none");
        } else {
            myDiv.css("display", "none");
        }
    });
});
$(document).ready(function () {
    $("#owl-services").owlCarousel({
        loop: true,
        margin: 5,
        rtl: true,
        responsiveClass: true,
        dots: false,
        responsive: {
            0: {
                items: 1,
                dots: true,
            },
            600: {
                items: 1,
                dots: true,
            },
            1000: {
                items: 3,
                nav: true,
            },
        },
    });
});
