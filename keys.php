<?php
// ------------ ABRIR LA CONEXIÓN CON EL CLIENTE
require_once '../vendor/autoload.php';
// ------------ DEFINIR LA CONFIGURACIÓN (ACCESOS)
// ------------ CREDENCIALES TEST (DEVELOPMENT)
$fk_NameServerAPIREST = "https://api.micuentaweb.pe";
$fk_Username = "50545803";
$fk_Password = "testpassword_N7I1rHlgkLrTDs3w0wWgzsCdQc7BoMH6mI8qziCDVl4ox";
$fk_Token = "NTA1NDU4MDM6dGVzdHBhc3N3b3JkX043STFySGxna0xyVERzM3cwd1dnenNDZFFjN0JvTUg2bUk4cXppQ0RWbDRveA==";
$fk_Publickey = "50545803:testpublickey_Vrv1OUpGrXgwttMStMwcDM9yictAcgUVuQBoWDSBsXMIg";
$fk_SHA_256 = "ckhxwXNWludm5HP5ya1Qc41ZI2r7CfNPqOBZljwlQ555j";
// ------------ CREDENCIALES REALES (INICIO)
Lyra\Client::setDefaultUsername($fk_Username); // NOMBRE DE USUARIO
Lyra\Client::setDefaultPassword($fk_Password); // PASSWORD
Lyra\Client::setDefaultEndpoint($fk_NameServerAPIREST); // END POINT
Lyra\Client::setDefaultPublicKey($fk_Publickey); // LLAVE PÚBLICA UTILIZADA POR EL CLIENT JAVASCRIPT
Lyra\Client::setDefaultSHA256Key($fk_SHA_256); // CODIFICACIÓN DE ACCESO SHA256 KEY
// ------------ CREDENCIALES REALES (FIN)
