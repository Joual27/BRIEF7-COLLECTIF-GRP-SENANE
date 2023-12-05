<?php

    define("DB_HOST" , 'localhost');
    define("DB_USER" , 'root');
    define("DB_PASS" , '');
    define("DB_NAME" , 'db_bank');



    define('APPROOT' , 'http://localhost/BRIEF7-COLLECTIF-GRP-SENANE/app/');
    define('PUBLICROOT' , 'http://localhost/BRIEF7-COLLECTIF-GRP-SENANE/public/');
  
    
// Redirect Funtion 
function Redirect($url, $permanent = false)
{
    header('Location: ' . $url, true, $permanent ? 301 : 302);
    exit();
}



?>