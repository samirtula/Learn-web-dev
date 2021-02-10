let switcherPublicTrans = $('#public-trans');
switcherPublicTrans.on('click', function () {
    let publicTransInfo = $('.address__public-trans-text');
    publicTransInfo.css('display','block');
    let autoInfo = $('.address__auto-text');
    autoInfo.css('display','none');
    switcherPublicTrans.css('color','#49A010');
    let autoInfoButton = $('#auto');
    autoInfoButton.css('color','#333333')
});
let auto = $('#auto');
auto.on('click', function () {
    let autoInfo = $('.address__auto-text');
    autoInfo.css('display','block');
    let publicTransInfo = $('.address__public-trans-text');
    publicTransInfo.css('display','none');
    auto.css('color','#49A010');
    let publicTransInfoButton = $('#public-trans');
    publicTransInfoButton.css('color','#333333')
});

$