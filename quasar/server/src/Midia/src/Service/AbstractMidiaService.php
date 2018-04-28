<?php

namespace Midia\Service;

use Core\Service\AbstractService;
use Core\Service\ServiceInterface;
use Core\Service\ServiceResult;
use Core\Service\ServiceResultInterface;
use Doctrine\ORM\EntityNotFoundException;
use Midia\Model\Entity\MidiaEntityInterface;

abstract class AbstractMidiaService extends AbstractService implements ServiceInterface
{

    /**
     * @param $id
     * @return ServiceResultInterface
     * @throws \Doctrine\ORM\ORMException
     */
    public function delete($id): ServiceResultInterface
    {
        try {
            /** @var MidiaEntityInterface $entity */
            $entity = $this->getEntityManger()->getReference($this->entity, $id);
            $cacheEntity = new $this->entity($entity->toArray());
            $this->getEntityManger()->remove($entity);
            $this->getEntityManger()->flush();
            if ($entity->getFile() !== '') {
                @unlink($entity->getFile());
            }
            return new ServiceResult([$cacheEntity]);
        } catch (EntityNotFoundException $e) {
            return new ServiceResult([], $e);
        }
    }
}