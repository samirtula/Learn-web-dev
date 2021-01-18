let checkIn = $('.checkIn');
let registration = $('.registration');

checkIn.on('click',function () {
    let checkInForm = $('.authorization__checkIn');
    let registrationForm = $('.authorization__registration');
    registrationForm.hide();
    checkIn.hide();
    checkInForm.show();
    registration.show();
});
registration.on('click',function () {
    let checkInForm = $('.authorization__checkIn');
    let registrationForm = $('.authorization__registration');
    checkInForm.hide();
    registration.hide();
    registrationForm.show();
    checkIn.show();

});

let userIn = $('.checkIn');
userIn.on('click',function () {
    let authorizationWindow = $('.authorization');
    authorizationWindow.css({'height':'300px'});
});
let registr = $('.registration');
registr.on('click',function () {
    let authorizationWindow = $('.authorization');
    authorizationWindow.css({'height':'340px'});
});


