let mainRespData = '';
let mainBlock = document.querySelector('.newMessagesBlock');
let textArea = document.querySelector('#textarea');
const ajaxSend = (formData) => {
    fetch('publish.php', {
        method: 'POST',
        headers: {
            'Content-Type':'application/json',
        },
        body: JSON.stringify(formData)
    })
        .then(response => response.text().then(function (data) {
            mainRespData = data;
            mainBlock.innerHTML = mainRespData;
            console.log(mainRespData);
        }))
        .catch(error => console.error(error))
};
const form = document.querySelector('.newMess');

form.addEventListener('submit', function(e){
    e.preventDefault();
    if (textArea.value == '') {
    alert('this f*cking message empty');
    }
    else
    {
        let formData = new FormData(this);
        formData = Object.fromEntries(formData);
        ajaxSend(formData)
    }
});