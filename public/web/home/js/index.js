$('.hideclick').click(function () {
    showContent($(this));
});

function showContent(obj) {
    obj.parent().next().toggle();
}