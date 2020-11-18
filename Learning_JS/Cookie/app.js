function getCookie(name) {
  let matches = document.cookie.match(
    new RegExp(
      "(?:^|; )" +
        name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, "\\$1") +
        "=([^;]*)"
    )
  );
  return matches ? decodeURIComponent(matches[1]) : undefined;
}
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
}

document.querySelector('.arrow_up').addEventListener('click', function () {
  let counter = document.querySelector('.value');
  let curVal = counter.innerHTML;
  let newValue = Number(curVal) + 1;
  counter.innerHTML = newValue;
  setCookie('myCounter', newValue);
})

document.querySelector('.arrow_down').addEventListener('click', function () {
  let counter = document.querySelector('.value');
  let curVal = counter.innerHTML;
  let newValue = Number(curVal) - 1;
  counter.innerHTML = newValue;
  setCookie('myCounter', newValue);
})
document.querySelector('.arrow_up2').addEventListener('click', function () {
  let counter = document.querySelector('.value2');
  let curVal = counter.innerHTML;
  let newValue = Number(curVal) + 1;
  counter.innerHTML = newValue;
  setCookie('myCounter2', newValue);
})

document.querySelector('.arrow_down2').addEventListener('click', function () {
  let counter = document.querySelector('.value2');
  let curVal = counter.innerHTML;
  let newValue = Number(curVal) - 1;
  counter.innerHTML = newValue;
  setCookie('myCounter2', newValue);
})
document.addEventListener('DOMContentLoaded', function () {
  let counter = document.querySelector('.value');
  let counter2 = document.querySelector('.value2');
  let cookieValue = getCookie('myCounter')
  let cookieValue2 = getCookie('myCounter2')
  counter.innerHTML = (cookieValue === undefined) ? 0 : cookieValue;
  counter2.innerHTML = (cookieValue2 === undefined) ? 0 : cookieValue2 ;
})