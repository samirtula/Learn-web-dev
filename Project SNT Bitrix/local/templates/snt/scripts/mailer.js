document.addEventListener('DOMContentLoaded', function ()
{
    const form = document.getElementById('form');
    form.addEventListener('submit', formSend);


    async function formSend(e)
    {
        e.preventDefault();
        let error = formValidate(form);
        let data = {
            name: document.querySelector("input[name = 'name']").value,
            email: document.querySelector("input[name = 'userEmail']").value,
            telNum: document.querySelector("input[name = 'telNum']").value,
            theme: document.querySelector("input[name = 'theme']").value,
            message: document.querySelector("textarea[name = 'message']").value,


        };
        console.log(data);
        if (error === 0) {
            form.classList.add('sending');
            let response = await fetch('sendmail.php', {
                method: 'POST',
                headers: {
                    'Content-Type':'application/json',
                },
                body : JSON.stringify(data)
            });
            if (response.ok) {

                let result = await response.json();
                console.log(result);
                alert(result.message);
                form.reset();
                form.classList.remove('sending');

            }
            else
            {
                alert('Ошибка отправки');
                form.classList.remove('sending')
            }
        }
        else
        {
           alert('Корректно заполните выделенные поля')
        }

    }
    function formValidate(form)
    {
        let error = 0;
        let formReq = document.querySelectorAll('.req');

        for (let i = 0; i < formReq.length; i++ ) {
            const input = formReq[i];
            formRemoveError(input);
            if (input.classList.contains('email')) {
                if ( emailTest(input)) {
                    formAddError(input);
                    error++;
                }

            }
            else if(input.classList.contains('tel'))
            {
                if (numTest(input)) {
                    formAddError(input);
                    error++;
                }
            }
            else
            {
                if (input.value === '') {
                    formAddError(input);
                    error++;
                }
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

    function emailTest(input) {
        return !/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,8})+$/.test(input.value);
    }
    function numTest(input) {
        return !/^(\s*)?(\+)?([- _():=+]?\d[- _():=+]?){10,14}(\s*)?$/.test(input.value);
    }


});