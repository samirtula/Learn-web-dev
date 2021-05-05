let name = $(".name");
let staff = $(".color_selector")
let age = $(".age")
let passVal = $(".color_input_code")
let passConf = $(".color_input_code_confirm");


$(".save").on("click", function (event) {
    event.preventDefault()
  
    if (passVal.val() === passConf.val()){
        let data = {
            name:name.val(),
            staff:staff.val(),
            age:age.val(),
            pass1:passVal.val(),
            pass2:passVal.val(),
            token:"Samir"};
        $.ajax({
            url: 'http://194.58.122.219/test/jq.php',
            data: data,
            success: function(res){
                console.log(res)
                if (res.success === 'Y') {
                    alert('успех');
                }
            
            },
            error: function(message){ 
                let i = message.responseJSON.length;
                let k = 0;
                console.log(i);
                for(i;i!=0;i--, k++){
                $("form").append($(`<span class = "alert_name_message">${message.responseJSON[k]}</span>`))        

            }
    
                

            }
          });
    } else{
        $("form").append($(`<span class = "alert_name_message"> Пароль не совпадает</span>`)) 
    }
    
})
