<?php
namespace MvBase\Controller;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Query;
use MvBase\Service\ServiceInterface;
use Zend\Mvc\Controller\AbstractRestfulController as RestfulController;
use Zend\View\Model\JsonModel;

abstract class AbstractRestfulController extends RestfulController implements RestfulControllerInterface
{
  /** @var  \Doctrine\ORM\EntityManager */
    protected $entityManager;

  /** @var  \Zend\Form\Form */
    protected $form;

  /** @var  \MvBase\Service\ServiceInterface */
    protected $service;

    public function __construct(EntityManager $entityManager, ServiceInterface $service, $form)
    {
        $this->entityManager = $entityManager;
        $this->service = $service;
        $this->form = $form;
    }

  /**
   * @return \Doctrine\ORM\EntityManager
   */
    public function getEntityManager()
    {
        return $this->entityManager;
    }

  /**
   * {@inheritdoc }
   * @return JsonModel
   */
    public function getList()
    {
        try {
            $list = $this->service->findAll(Query::HYDRATE_ARRAY);
            $list = array_merge([], $list);
            return new JsonModel([
            'success' => true,
            'collection' => $list
            ]);
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
        return new JsonModel([
        'success' => false
        ]);
    }

  /**
   * {@inheritdoc }
   * @param int $id
   * @return JsonModel
   */
    public function get($id)
    {
        try {
            $entity = $this->service->find($id);
            if ($entity) {
                return new JsonModel([
                'success' => true,
                'collection' => $entity->toArray()
                ]);
            }
        } catch (\Exception $e) {
        }
        return new JsonModel(['success' => false, 'messages' => 'Não encontrado']);
    }

  /**
   * {@inheritdoc }
   * @param array $data
   * @return JsonModel
   */
    public function create($data)
    {
        $errorMessages = [];
        $this->form->setData($data);
        if ($this->form->isValid()) {
            try {
                $data = $this->service->insert($this->form->getData());
                if ($data) {
                    return new JsonModel([
                    'success' => true,
                    'entity' => $data->toArray()
                    ]);
                }
            } catch (\Exception $e) {
                $errorMessages[] = $e->getMessage();
            }
        }

        $messages = array_merge(
            $this->form->getMessages(),
            $errorMessages
        );
        return new JsonModel([
        'success' => false,
        'messages' => $messages,
        ]);
    }

  /**
   * {@inheritdoc }
   * @param int $id
   * @param array $data
   * @return JsonModel
   */
    public function update($id, $data)
    {
        $errorMessages = [];
        try {
            $entity = $this->service->update($id, $data);
            if ($entity) {
                return new JsonModel([
                'success' => true,
                'entity' => $entity->toArray()
                ]);
            }
        } catch (\Exception $e) {
            $errorMessages[] = $e->getMessage();
        }
        return new JsonModel([
        'success' => 'false',
        'messages' => $errorMessages
        ]);
    }

  /**
   * {@inheritdoc }
   * @param int $id
   * @return JsonModel
   */
    public function delete($id)
    {
        try {
            $result = $this->service->delete($id);
            if ($result) {
                return new JsonModel(['success' => true]);
            }
        } catch (\Exception $e) {
        }
        return new JsonModel(['success' => true]);
    }
}
