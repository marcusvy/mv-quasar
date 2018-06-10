<?php

namespace Console\Command;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Query;
use Log\Model\Entity\Logger;
use Log\Model\Repository\LoggerRepository;
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
                /** @var LoggerRepository $repo */
                $repo = $this->entityManager->getRepository(Logger::class);
                $result = $repo->createQueryBuilder('l')
                    ->select(['l.time', 'l.level', 'l.channel', 'l.message'])
                    ->getQuery()
                    ->getResult(Query::HYDRATE_ARRAY);


                $list = array_map(function ($item) {
                    return array_map(function ($log) {
                        if($log instanceof \DateTime){
                            return $log->format('d/m/Y H:i:s');
                        }
                        return $log;
                    }, $item);
                }, $result);


                $io->section('Total de Usuários');
                $io->block(count($list));
                $io->section('Listagem');
                $io->table(['time', 'level', 'channel', 'message'], $list);

            } else {
                $io->error("Quasar:: Doctrine not connected");
            }
        } else {
            $io->error("Quasar:: Console not enabled");
        }

    }
}
