#!/usr/bin/env php
<?php

use Symfony\Component\Console\Application;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

require __DIR__ . '/vendor/autoload.php';

class EchoCommand extends Command {

    public function __construct() {
		parent::__construct('echo');
    }

    protected function configure() {
        $this->setDescription('Faz um echo.');
    }

	protected function execute(InputInterface $input, OutputInterface $output) {
        $output->write('core');
        return 0;
	}

}

class CreateTempFilesCommand extends Command {

  public function __construct() {
    parent::__construct('create');
  }

  protected function configure() {
      $this->setDescription('Cria os arquivos temporários.');
  }

  protected function execute(InputInterface $input, OutputInterface $output) {
    $this->testWriteFile('temp/nfe/session/1/',true);
    $this->testWriteFile('logs/dia/hoje/',true);
    return 0;
  }

  private function testWriteFile($folder, $createFolder=false, $content='123') {
    if( !file_exists($folder) && $createFolder ) {
        mkdir($folder, 0777, true);
    }

    $src = $folder . "file.txt";
    $myfile = fopen($src, "w") or die("Não conseguiu abrir o arquivo: '{$src}'.");
    fwrite($myfile, $content);
    fclose($myfile);

    $writed = file_get_contents($src) or die("Não conseguiu ler o arquivo: '{$src}'.");
    if($writed != $content) {
        throw new Exception("Conteudo não é identico ao gravado. '{$writed}'");
    }
  }

}

$application = new Application('core','1.0.0');
$application->add( new EchoCommand() );
$application->add( new CreateTempFilesCommand() );
$application->run();