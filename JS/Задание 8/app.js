/* let table = document.querySelector("#table");
    let selectedButton;
    table.onclik = function (event) {
        let target = event.target;

        if (target.tagName == "TD") {
            changeButtonStyle(target);
            return;
        }
        if (target.tagName == "TH" && target.className == "cell") {
            changeButtonStyle(target);
            return;
        }

    }

    function changeButtonStyle(button) {
        if (selectedButton) {
            selectedButton.classList.remove("selected_button")
        }
        selectedButton = button
        selectedButton.classList.add("selected_button")
        
    } */
    let nums = document.querySelectorAll(".math_button")
    let table = document.querySelector("#table");
    let selectedButton;
    let result = document.querySelector("#result");
    let numArr = [];
    let i = 0;
    let equal;

    table.addEventListener("click", function (event) {
        let target = event.target.closest("td");

   
        if (target.className == "calc_button num_button"){
            result.value = result.value + target.innerHTML
        }   
        
        if (target.className == "calc_button math_button" && result.value != "") {
            numArr[i] = result.value
          /*   for (k = 0; k < numArr.length - 1; k++){
                if (numArr[k] == "*" || numArr[k] == "/") {
                    numArr[k + 2] = (")")

                    
            }
        
            } */
            i++
            numArr[i] = target.innerHTML
            i++
            result.value = ""
            console.log(  numArr)
        }
        
        if (target.className == "calc_button equally" && result.value != "") {

            numArr[i] = result.value
            equal =  numArr.join(' ');
            result.value = eval(equal)
            numArr = [];
            i = 0;
            numArr[i]= result.value
        }
        if (target.className == "cell") {
            result.value = ""
            numArr = [];
            i = 0;
        }
        
        
        if (target.tagName == "TD") {
            changeButtonStyle(target);
            return;
        }
        if (target.tagName == "TH" && target.className == "cell") {
            changeButtonStyle(target);
            return;
        }
        
    })
    document.addEventListener('keydown', function (enter) {
        if (enter.key === "Enter") {
            numArr[i] = result.value
            console.log(numArr);
            equal =  numArr.join(' ');
            result.value = eval(equal)
            numArr = [];
            i = 0;
            numArr[i]= result.value
            console.log(numArr);
        }
        
    })

    function changeButtonStyle(button) {
        if (selectedButton) {
            selectedButton.classList.remove("selected_button")
        }
        selectedButton = button
        selectedButton.classList.add("selected_button")
        setTimeout(changeDel, 50)
    }

    function changeDel() {
        selectedButton.classList.remove("selected_button")
}
