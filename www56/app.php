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
    $versaoPhp = explode('.', phpversion());
    $output->write('core|' . $versaoPhp[0] . $versaoPhp[1]);
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
    testWriteFile('temp/nfe/session/1/',true);
    testWriteFile('logs/dia/hoje/',true);
    return 0;
  }

}

$application = new Application('core','1.0.0');
$application->add( new EchoCommand() );
$application->add( new CreateTempFilesCommand() );
$application->run();