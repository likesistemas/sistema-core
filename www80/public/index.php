<?php

include "../vendor/autoload.php";

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

$config = parse_ini_file(__DIR__ . "/../config.ini", true);
$expectedConfig = [
     'bd' => [
          'host' => 'mysql',
          'user' => 'root',
          'password' => 'root',
          'bd' => 'php',
          'hostSlave' => 'mysql_slave'
     ],
     'memcache' => [
          'host' => 'memcache',
          'porta' => '11212'
     ],
     'email' => [
          'usuario' => 'core@likesistemas.com.br',
          'senha' => '123456',
          'nome' => 'Ricardo'
     ],
     'aws' => [
          'key' => 'like123456',
          'secret' => '78910'
     ],
     'php' => [
          'version' => '8.0'
     ]
];

$validation = [];

foreach($expectedConfig as $section => $values) {
     foreach($values as $name=>$value) {
          if( isset($config[$section][$name]) ) {
               $validation[] = "Campo {$section} -> {$name} não existe.";
               continue;
          }

          if( $config[$section[$name]] != $value ) {
               $validation[] = "Campo {$section} -> {$name} está errado.";
          }
     }
}

if( count($validation) > 0 ) {
     echo "<pre>";
     echo join("\n", $validation);
     var_dump($config);
     echo "</pre>";
     exit(1);
}

$versaoPhp = explode('.', phpversion());
echo "core" . "|" . 
     $versaoPhp[0] . $versaoPhp[1];