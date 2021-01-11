<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Задание 13</title>
      <style>
          .none {
              display:none;
          }
          form.center {
              display: flex;
              flex-direction: column;
              width:350px;
              position :absolute;
              top:30%;
              left:45%;
          }
          input,select {
              height:30px;
              margin-bottom:15px;
              font-size: 16px;
          }
          table,tr,td {
              border: 1px solid black;
              border-collapse: collapse
          }
          td {
              width:130px;
              height:30px;
              text-align:center;
          }
          .table_footer {
              width: 50%;
              font-size: 18px;
              font-weight: 600;
          }
          li {
              margin-left:280px;
              font-size: 18px;
          }
          a {
              text-decoration: none;
              font-size: 12px;
              font-weight: bold;
              text-transform: uppercase;
              display: flex;
              width: 150px;
              height: 50px;
              background: #993333;
              align-items: center;
              text-align: center;
              border-radius: 5px;
              color: antiquewhite;
          }
          .sumb-link {
              display: none;
          }
      </style>
  </head>
  <body>
    <form class="center">
        <select name="inc_cons" id="in">
           <option value="INCOME">Доход</option>
           <option value="CONSUMPTION">Расход</option>
        </select>
        <input placeholder="Источник дохода" name="incTarget" type="text">
        <input placeholder="Цель расхода" name="consumptionTarget" type="text">
        <input placeholder="Сумма" name="sum" type="text">
        <select name="currency" id="curr">
           <option value="$">$</option>
           <option value="€">€</option>
       </select>
        <input type="submit" value="Отправить" name="submit">
    </form>

    <form  class ="months"><p class="table_footer" >Укажите месяц отчета</p>
        <select name="months" id="in">
           <option value="01">Январь</option>
           <option value="02">Февраль</option>
           <option value="03">Март</option>
           <option value="04">Апрель</option>
           <option value="05">Май</option>
           <option value="06">Июнь</option>
           <option value="07">Июль</option>
           <option value="08">Август</option>
           <option value="09">Сентябрь</option>
           <option value="10">Октябрь</option>
           <option value="11">Ноябрь</option>
           <option value="12">Декабрь</option>
        </select>
        <input type="submit" value="Отправить" name="submit">
    </form>
    <a href="sumbill.php">общие данные по расходам</a>
    <div class = "filteredData"> </div>
    <div class = "main"> </div>

    <script>
        let regex = /[^0-9]/g;
        let sum = document.querySelector('[name = sum]');

        sum.oninput = function(){
            this.value = this.value.replace(regex, '');
        };
        let type = document.querySelector("[name = inc_cons]");
        let optOut = document.querySelector("[name = consumptionTarget]");
        let optIn = document.querySelector("[name = incTarget]");
        if (type.value === "INCOME"){
            optOut.classList.add("none");
            optIn.classList.remove("none");
            optOut.value = "";
        }
        if (type.value === "CONSUMPTION")
        {
            optIn.classList.add("none");
            optOut.classList.remove("none");
            optIn.value = "";
        }
        type.addEventListener("change", function(){

            if (type.value === "INCOME"){
                optOut.classList.add("none");
                optIn.classList.remove("none");
                optOut.value = "";
            }
            if (type.value === "CONSUMPTION")
            {
                optIn.classList.add("none");
                optOut.classList.remove("none");
                optIn.value = "";
            }
        });

        let mainBlock = document.querySelector('.main');
        let filtered = document.querySelector('.filteredData');
        const list = document.getElementById('content');
        const months = document.querySelector('.months');
        let mainRespData = '';
        let respData='';

        const ajaxFilter = (formData) => {
            fetch('filter.php', {
                method: 'POST',
                headers: {
                    'Content-Type':'application/json',
                },
                body: JSON.stringify(formData)
            })
                .then(response => response.text().then(function (data) {
                    respData = data;
                    filtered.innerHTML = respData;
                }))
                .catch(error => console.error(error))
        };


        months.addEventListener('submit', function(e){
                e.preventDefault();
                let formData = new FormData(this);
                formData = Object.fromEntries(formData);

                ajaxFilter(formData)
            }
        );

        const ajaxSend = (formData) => {
            fetch('sumbill.php', {
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

        const forms = document.querySelector('.center');

        forms.addEventListener('submit', function(e){
            e.preventDefault();
            if (optIn.value == "" && optOut.value == "" || sum.value == "") {
                alert('Вы заполнили не все поля');
            }
            else
            {
                let formData = new FormData(this);
                formData = Object.fromEntries(formData);
                ajaxSend(formData)

            }
        });
    </script>
  </body>
</html>







