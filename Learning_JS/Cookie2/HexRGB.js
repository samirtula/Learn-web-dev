const RGB = /^[0-9]{1,3}[,]{1}[0-9]{1,3}[,]{1}[0-9]{1,3}$/
const RGBA = /^[0-9]{1,3}[,]{1}[0-9]{1,3}[,]{1}[0-9]{1,3}[,]{1}[0]{1}[.]{1,5}[0-9]$/
const RGBAI = /^[0-9]{1,3}[,]{1}[0-9]{1,3}[,]{1}[0-9]{1,3}[,]{1}[1]{1}$/
const RGBAIO = /^[0-9]{1,3}[,]{1}[0-9]{1,3}[,]{1}[0-9]{1,3}[,]{1}[0]{1}$/
const HEX = /^#[A-Fa-f0-9]{6}$/
const LETTERS = /^[a-zA-Zа-яА-Я]+$/
let z;
let j;
let colors = {
  0: {
    name: "YELLOWGREEN",
    type: "rgb",
    code: "(154,205,50)",
    typeName: "RGB",
  },
  1: {
    name: "DARKCYAN",
    type: "rgba",
    code: "(0,139,139,0.3)",
    typeName: "RGBA",
  },
  2: {
    name: "ORANGERED",
    type: "#",
    code: "dc2c2c",
    typeName: "HEX"
  },
};

function getCookie(name) {
    let matches = document.cookie.match(
      new RegExp(
        "(?:^|; )" +
          name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, "\\$1") +
          "=([^;]*)"
      )
    );
    return matches ? decodeURIComponent(matches[1]) : undefined;
};
  

function setCookie(name, value, options = {}) {
  options = {
    path: "/",

    ...options,
  };

  if (options.expires instanceof Date) {
    options.expires = options.expires.toUTCString();
  }

  let updatedCookie =
    encodeURIComponent(name) + "=" + encodeURIComponent(value);

  for (let optionKey in options) {
    updatedCookie += "; " + optionKey;
    let optionValue = options[optionKey];
    if (optionValue !== true) {
      updatedCookie += "=" + optionValue;
    }
  }
  document.cookie = updatedCookie;
};


function createElements(obj) {
    let n = 1
    for (let key in obj) {
        $(`.color_examples .color_example:nth-child(${n})`).css("background-color",`${colors[key].type}${colors[key].code}`)
        $(`.color_example:nth-child(${n}) .info_block`).append($(`<span>${colors[key].name} <br> ${colors[key].typeName} <br> ${colors[key].code}</span>`))
        n++
  } 
}

createElements(colors)


function lastCookieNum() {
  z = 1;
  let cookieValue;
  cookieValue = getCookie(`name${z}`)
  for (z = 1; cookieValue !== undefined; z++) {
    cookieValue = getCookie(`name${z}`)
    if (cookieValue == undefined) {
      break
    } 
  }   
}
    

lastCookieNum()

 z > 1 ? j = z : j = 1;


$(".save").on("click", function (event) {
    event.preventDefault()
    let selectedType = $(".color_selector")
    let inputInner = $(".color_input_code")
    let colorName = $(".color_input")
    $('.alert_name_message').remove()
    $('.alert_message').remove()

    if (!LETTERS.test(colorName[0].value)) {
        $(".color").append($('<span class = "alert_name_message">Для имени допускаются только буквы</span>'))
    };

    if (selectedType.val() == "RGB") {
        if (!RGB.test(inputInner[0].value)) {
        $(".color_code_text").append($('<span class = "alert_message"> RGB код должен следовать маске [0-255],[0-255],[0-255]</span>'))
        }
    };
   if (selectedType.val() == "RGBA") {
       if (!RGBA.test(inputInner[0].value) && !RGBAI.test(inputInner[0].value) && !RGBAIO.test(inputInner[0].value)) {
        $(".color_code_text").append($('<span class = "alert_message"> RGBA код должен следовать маске [0-255],[0-255],[0-255],[0-1]</span>'))
        }
    };
    if (selectedType.val() == "HEX") {
        if (!HEX.test(inputInner[0].value)) {
        $(".color_code_text").append($('<span class = "alert_message"> HEX код должен следовать маске #1-6[A-F]</span>'))
        }
  };

   
  setCookie(`name${j}`, `${colorName[0].value};${selectedType.val()};${inputInner[0].value}`)
  j++
  
});
    


