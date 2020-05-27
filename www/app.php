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

$application = new Application('core','1.0.0');
$application->add( new EchoCommand() );
$application->run();