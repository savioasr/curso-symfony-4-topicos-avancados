<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class HelloWorldCommand extends Command
{
    protected static $defaultName = 'app:hello-world';

    protected function configure()
    {
        $this
            ->setDescription('Add a short description for your command')
            ->addArgument('nome', InputArgument::REQUIRED, 'O nome da pessoa!')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Mensagem ao usuario');
    }
}
