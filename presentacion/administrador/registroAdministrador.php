<?php
$password = "3";
$administrador = new Administrador("", "Michael", "Moreno", "3@a.com", password_hash($password, PASSWORD_BCRYPT));

$administrador->registro();

?>

<div class="card" style="width: 18rem;">
    <img class="card-img-top" src="..." alt="Card image cap">
    <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
</div>
