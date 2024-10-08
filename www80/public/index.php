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

$versaoPhp = explode('.', phpversion());
$versaoPhpFormatada = $versaoPhp[0] . $versaoPhp[1];

$config = parse_ini_file(__DIR__ . "/../config.ini", true);

$emptyConfig = [
     'bd' => [
          'host' => '',
          'user' => '',
          'password' => '',
          'bd' => ''
     ],
];

$expectedConfig = [
     'bd' => [
          'host' => 'mysql',
          'user' => 'root',
          'password' => '123456',
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
          'version' => $versaoPhpFormatada
     ]
];

$validation = [];

foreach($expectedConfig as $section => $values) {
     if (!isset($config[$section])) {
          $validation[] = "Section {$section} não existe.";
          continue;
     }     

     foreach($values as $name=>$value) {
          if( !isset($config[$section][$name]) ) {
               $validation[] = "Campo {$section} -> {$name} não existe.";
               continue;
          }

          if( $config[$section][$name] != $value ) {
               $validation[] = "Campo {$section} -> {$name} está errado: '{$value}'.";
          }
     }
}

if( count($validation) > 0 ) {
     if($config === $emptyConfig) {
          echo "core" . "|" . $versaoPhpFormatada . "|empty";
          return;
     }

     echo "<pre>";
     echo join("\n", $validation);
     var_dump($config);
     echo "</pre>";
     exit(1);
}


echo "core" . "|" . $versaoPhpFormatada;