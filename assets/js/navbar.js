$(document).ready(function () {
    const body = $("body"),
        sidebar = $(".sidebar"),
        toggle = $(".toggle"),
        searchBtn = $(".search-box");

    toggle.on("click", function () {
        sidebar.toggleClass("close");
        body.toggleClass("sidebar-open");
    });

    searchBtn.on("click", function () {
        sidebar.removeClass("close");
        body.removeClass("sidebar-open");
    });
});
