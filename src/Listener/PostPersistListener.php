<?php

namespace Atournayre\Bundle\EntitiesEventsBundle\Service;

use Doctrine\ORM\Event\PostPersistEventArgs;

final readonly class PostPersistListener
{
    public function __construct(
        private PostPersistService $postPersist,
    )
    {
    }

    public function __invoke(PostPersistEventArgs $postPersistEventArgs): void
    {
        ($this->postPersist)($postPersistEventArgs);
    }
}
