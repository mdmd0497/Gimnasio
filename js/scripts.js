
$(function () {
    $('[data-toggle="tooltip"]').tooltip()
});

$('body').on('show.bs.modal', '.modal', function (e) {
    var link = $(e.relatedTarget);
    $(this).find(".modal-content").load(link.attr("href"));
})


