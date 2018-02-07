<?php

namespace Console\Command;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Query;
use Log\Entity\Logger;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class ViewLogsCommand extends Command
{
    /** @var EntityManagerInterface */
    private $entityManager = null;

    private $config = [];

    private $enabled = false;

    public function __construct($entityManager = null, $config = [], $name = null)
    {
        $this->entityManager = $entityManager;
        if (is_array($config) && count($config) > 0) {
            $this->config = $config;
            $this->enabled = isset($config['enabled']) ? $config['enabled'] : null;
        }
        parent::__construct($name);
    }

    public function configure()
    {
        $this->setName('logs')
            ->setDescription('Visualizar logs do sistema');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);

        if ($this->enabled) {
            $io->title('Logs');

            if (!is_null($this->entityManager)) {
                $repo = $this->entityManager->getRepository(Logger::class);
                $query = $repo->createQueryBuilder('l')->getQuery();
                $list = $query->getResult(Query::HYDRATE_ARRAY);

                $io->section('Total de Usuários');
                $io->block(count($list));
                $io->section('Listagem');
                $io->block(print_r($list, true));
            } else {
                $io->error("Quasar:: Doctrine not connected");
            }
        } else {
            $io->error("Quasar:: Console not enabled");
        }
    }
}
