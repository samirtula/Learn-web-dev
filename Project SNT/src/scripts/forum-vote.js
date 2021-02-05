const forumYes = $('#yes');
const forumNo = $('#no');
const forumDoubt = $('#doubt');


forumYes.on('click', function () {
    forumNo.prop('checked', false);
    forumDoubt.prop('checked', false);
});

forumNo.on('click', function () {
    forumYes.prop('checked', false);
    forumDoubt.prop('checked', false);
});
forumDoubt.on('click', function () {
    forumYes.prop('checked', false);
    forumNo.prop('checked', false);
});