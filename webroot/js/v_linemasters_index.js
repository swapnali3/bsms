$(document).on("click", ".redirect", function () {
    window.location.href = $(this).data("href");
});