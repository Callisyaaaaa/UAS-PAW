let url = window.location.href;
$(".nav-link").each(function () {
    if (this.href === url) {
        $(this).addClass("active");
    }
});
