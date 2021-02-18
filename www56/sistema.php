<?php

include "./vendor/autoload.php";

testWriteFile("temp/");
testWriteFile("temp/css/");
testWriteFile("temp/js/");
testWriteFile("temp/manifest/");
testWriteFile("temp/object/");
testWriteFile("temp/nfe/session/", true);
testWriteFile("logs/");
testWriteFile("logs/dia/", true);
testWriteFile("files/");
testWriteFile("files/produto/", true);

$versaoPhp = explode('.', phpversion());
echo "core" . "|" . 
     $versaoPhp[0] . $versaoPhp[1];