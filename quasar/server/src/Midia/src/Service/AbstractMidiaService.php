<?php

namespace Midia\Service;

use Core\Service\AbstractService;
use Core\Service\ServiceInterface;
use Doctrine\ORM\EntityNotFoundException;
use Midia\Model\Entity\MidiaEntityInterface;

abstract class AbstractMidiaService extends AbstractService implements ServiceInterface
{
    public function delete($id)
    {
        try {

            /** @var MidiaEntityInterface $entity */
            $entity = $this->getEntityManger()->getReference($this->entity, $id);
            if ($entity) {
                $cacheEntity = $entity->toArray();
                $this->getEntityManger()->remove($entity);
                $this->getEntityManger()->flush();
                if ($entity->getFile() !== '') {
                    @unlink($entity->getFile());
                }
                return $cacheEntity;
            }
        } catch (EntityNotFoundException $e) {
        }
        return [];
    }
}