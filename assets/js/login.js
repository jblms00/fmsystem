$(document).ready(function () {
    $(document).on("click", ".login-btn2", function () {
        $(".wrapper")
            .addClass("animated-signin")
            .removeClass("animated-signup");
    });

    $(document).on("click", ".signin-link", function () {
        $(".wrapper")
            .addClass("animated-signup")
            .removeClass("animated-signin");
    });
});
