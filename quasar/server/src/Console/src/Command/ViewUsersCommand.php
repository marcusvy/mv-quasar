<?php
namespace Console\Command;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Query;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use User\Entity\User;

class ViewUsersCommand extends Command
{
    /** @var EntityManager */
    private $entityManager;

    public function __construct($entityManager, $name = null)
    {
        $this->entityManager = $entityManager;
        parent::__construct($name);
    }

    public function configure()
    {
        $this->setName('user:view')
            ->setDescription('Visualizar usuários do sistema');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input,$output);

        $repo = $this->entityManager->getRepository(User::class);
        $query = $repo->createQueryBuilder('u')->getQuery();
        $list = $query->getResult(Query::HYDRATE_ARRAY);

        $io->title('Usuários::View');
        $io->section('Total de Usuários');
        $io->block(count($list));
        $io->section('Listagem');
        $io->block(print_r($list,true));
    }
}