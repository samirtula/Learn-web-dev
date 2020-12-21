
<form>
   <select name="income_consumption" id="in">
       <option value="income">Доход</option>
       <option value="consumption">Расход</option>
   </select>
    <input placeholder="Источник дохода" name="incomeTarget" type="text">
    <input placeholder="Цель расхода" name="consumptionTarget" type="text">
    <select name="currency" id="curr">
       <option value="dollar">Доллар</option>
       <option value="euro">Евро</option>
   </select>
    <input type="hidden" name="req" value="Y">
    <input type="submit" value="Отправить" name="submit">
</form>
<div id="content"></div>


<script>
document.addEventListener('DOMContentLoaded', ()=> {

const ajaxSend = (formData, callback) => {
fetch('sum2.php', {
    method: 'POST',
    headers: {
        'Content-Type':'application/json',
    },
    body: JSON.stringify(formData)
    })
    .then((response) => {
    return response.json();
    })
    .then(response => {callback(response)})
    .catch(error => console.error(error))
};


const forms = document.getElementsByTagName('form');
for (let i= 0; i < forms.length; i++) {
    forms[i].addEventListener('submit', function(e){
        e.preventDefault();
        let formData = new FormData(this);
        formData = Object.fromEntries(formData);

        ajaxSend(formData, function(resp){
            //
        });
            
        });
    };
});



 
</script>

