<?php
// CREDENCIALES IZZIPAY - SUCURSAL "FLORES"
// ABRIR LA CONEXIÓN CON EL CLIENTE
require_once '../vendor/autoload.php';
// CREDENCIALES TEST (DEVELOPMENT)
$fk_NameServerAPIREST = "https://api.micuentaweb.pe";
$fk_Username = "58822376";

// ------ CREDENCIALES DE PRUEBA

$fk_Password = "testpassword_94yzztM4sQQmn6ZcbvqE1y2J2EYstD6RBP32M0iq0xKtb";
$fk_Token = "NTg4MjIzNzY6dGVzdHBhc3N3b3JkXzk0eXp6dE00c1FRbW42WmNidnFFMXkySjJFWXN0RDZSQlAzMk0waXEweEt0Yg==";
$fk_Publickey = "58822376:testpublickey_7wC78NG1rvrnxfk0OdyveMujZYy8L43fLWKE7VUAB21zh";
$fk_SHA_256 = "UCjCI3AM5rlmGBu3tbF1Jg6FDehXzyon6cZ8DB0ZbvD2s";

// ------ CREDENCIALES DE PRODUCCIÓN
/*
$fk_Password = "prodpassword_1gv8XMvH7IzzwpWWzaPzEICbg5i3uPQILVNvM2XYsGU6T";
$fk_Token = "NTg4MjIzNzY6dGVzdHBhc3N3b3JkXzk0eXp6dE00c1FRbW42WmNidnFFMXkySjJFWXN0RDZSQlAzMk0waXEweEt0Yg==";
$fk_Publickey = "58822376:publickey_2zfN8vDx4xshCGb3wvOtCCGajSBbWh2UEAYtWXvs39mzk";
$fk_SHA_256 = "kxYEMaxXXqW702hHW0xywkEb5H6lhm9Iwp32BHPHQYgqB";
*/
// CREDENCIALES REALES (INICIO)
Lyra\Client::setDefaultUsername($fk_Username); // NOMBRE DE USUARIO
Lyra\Client::setDefaultPassword($fk_Password); // PASSWORD
Lyra\Client::setDefaultEndpoint($fk_NameServerAPIREST); // END POINT
Lyra\Client::setDefaultPublicKey($fk_Publickey); // LLAVE PÚBLICA UTILIZADA POR EL CLIENT JAVASCRIPT
Lyra\Client::setDefaultSHA256Key($fk_SHA_256); // CODIFICACIÓN DE ACCESO SHA256 KEY