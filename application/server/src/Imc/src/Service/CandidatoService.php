<?php

namespace Imc\Service;

use Doctrine\ORM\EntityManager;
use Core\Service\AbstractService;
use Imc\Entity\Candidato;
use Imc\Repository\CandidatoRepository;
use Zend\Json\Json;

class CandidatoService extends AbstractService
{
    protected $entity = Candidato::class;


    public function authenticateByCpf(array $data): string
    {
        /** @var CandidatoRepository $repo */
        $repo = $this->entityManager->getRepository($this->entity);
        $cpf = str_replace(['.', '-'], '', $data[0]);
        $senha = $data[1];

        $candidato = $repo->loginCandidatoPorCpf($cpf, $senha);
        if (count($candidato) > 0) {
            /** @var Candidato $result */
            $result = $candidato[0];
            return base64_encode(Json::encode([$result->getId(),$result->getActivationKey()]));
        }
        return '';
    }
}
