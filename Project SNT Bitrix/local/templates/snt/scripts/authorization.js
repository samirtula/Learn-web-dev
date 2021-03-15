function formValidate() {
    let error = 0;
    let formReq = document.querySelectorAll('.req');

    for (let i = 0; i < formReq.length; i++) {
        const input = formReq[i];
        formRemoveError(input);
        if (input.value === '') {
            formAddError(input);
            error++;
        }
    }
    return error;
}


    function formAddError(input)
    {
        input.classList.add('error');
    }

    function formRemoveError(input)
    {
        input.classList.remove('error');
    }
document.addEventListener('DOMContentLoaded', function ()
{
    formValidate();

});