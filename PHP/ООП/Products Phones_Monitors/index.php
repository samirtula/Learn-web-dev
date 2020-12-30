<?php
include ('classProduct.php');
include ('classPhone.php');
include ('classMonitor.php');
include ('classCart.php');
include ('classSession.php');


$object = new Phone('Iphone','900','Phone','Apple','Snapdragon','500MB',1,'32Gb','IOS');
$object->publish();

echo '<br>';
$object2 = new Monitor('Viewsonic','1200','Monitor','Samsung','21','144hz','HDMI, VGA');
$object2->publish();
$objS = new Session();
?>

<script>
    let addToCart = document.querySelectorAll('input[value = "AddToCart"]');
    let button;
    for (i=0; i<addToCart.length; i++) {
        button=addToCart[i];
        button.addEventListener('click', function (e) {
            e.preventDefault();
            let prod = this.closest("h2");
            let prodInner = String(prod.innerText);
            console.log(prodInner);
            fetch('addtoCart.php', {
                method: 'POST',
                body: prodInner
                }
            )
                .then(response => console.log(response))
        })
    }
    let goToCart = document.querySelectorAll('input[value = "GoToCart"]');
    let goButton;
    for (i=0; i<goToCart.length; i++) {
        goButton=goToCart[i];
        goButton.addEventListener('click', function (e) {
            e.preventDefault();
            location.href='cart.php';
        })
    }
</script>

<?php



