<div id="list"></div>
<form>
    <input placeholder="Имя" name="name" type="text">
    <input placeholder="Фамилия" name="sname" type="text">
    <input placeholder="Возраст" name="age" type="text">
    <input placeholder="Пароль" name="pass" type="password">
    <input type="submit" value="Отправить" name="submit">
</form>


<style>
form{
    display: flex;
    flex-direction: column;
    justify-content:space-between;
    width:200px;
    position: absolute;
    top:45%;
    left:45%;
    height:200px;

}
input{
    height:25px;
}
input[name='submit']{
    background:aqua;
    border-radius:5px;
}
</style>
<script>
let list = document.getElementById("list")



document.addEventListener('DOMContentLoaded', () => {
    
    
    
    
    
const ajaxSend = async (formData) => {
    const fetchResp = await fetch('задания 3.3.php', {
        method: 'POST',
        body: formData
    });
    if (!fetchResp.ok) {
        throw new Error(`Ошибка по адресу ${url}, статус ошибки ${fetchResp.status}`);
    }
    return await fetchResp.text();
};





const forms = document.querySelectorAll('form');

forms.forEach(form => {
    form.addEventListener('submit', function (e) {
        e.preventDefault();
        const formData = new FormData(this);

        ajaxSend(formData)
            .then((response) => {
                list.innerHTML=response;
                form.reset(); // очищаем поля формы 
            })
            .catch((err) => console.error(err))
    });
});





});








</script>