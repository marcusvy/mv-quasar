<?php

namespace Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use User\Service\UserServiceInterface;

class InstallCommand extends Command
{
    /** @var UserServiceInterface */
    private $userService = null;

    private $config = [];

    private $enabled = false;

    public function __construct($userService = null, $config = [], $name = null)
    {
        $this->userService = $userService;
        if (is_array($config) && count($config) > 0) {
            $this->config = $config;
            $this->enabled = isset($config['console']['enabled']) ? $config['console']['enabled'] : null;
        }
        parent::__construct($name);
    }

    public function configure()
    {
        $this->setName('install')
            ->setDescription('Instala os valores padrões do sistema');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);

        if ($this->enabled) {
            $io->title('Instalação');

            if (!is_null($this->userService)) {
                $email = $io->ask('Qual o e-mail do administrador?', 'adm@mviniciusconsultoria.com.br');
                $password = $io->askHidden('Qual a senha do administrador?');
                $this->createDefaultUser($email, $password);
                $io->block('Usuário admin criado');
            } else {
                $io->error("Quasar:: User service not connected");
            }
        } else {
            $io->error("Quasar:: Console not enabled");
        }
    }

    public function createDefaultUser($email, $password)
    {
        $user = [
            'perfil' => ['name' => 'admin'],
            'credential' => 'admin',
            'email' => $email,
            'password' => $password,
            'active' => 1
        ];
        $this->userService->create($user);
    }
}
