<?php

$salt = random_bytes ( 20);
echo bin2hex($salt);
$administrador = new Administrador("", "Oscar", "Cely", "1@a.com", bin2hex($salt), hash_pbkdf2("MD5", "1", $salt, 1200, 64));
$administrador->registroAdministrador();
?>

<div class="card" style="width: 18rem;">
    <img class="card-img-top" src="..." alt="Card image cap">
    <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
</div>
