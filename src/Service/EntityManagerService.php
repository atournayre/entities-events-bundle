<?php

namespace Atournayre\Bundle\EntitiesEventsBundle\Service;

use Doctrine\ORM\EntityManagerInterface;

final readonly class EntityManagerService
{
    public function __construct(
        private EntityManagerInterface $entityManager,
    )
    {
    }

    public function save(object $entity): void
    {
        $repository = $this->entityManager->getRepository(get_class($entity));
        if (!method_exists($repository, 'save')) {
            throw new \LogicException('The repository does not implement the save method');
        }
        $repository->save($entity, true);
    }
}
