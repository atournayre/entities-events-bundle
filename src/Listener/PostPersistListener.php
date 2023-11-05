<?php

namespace Atournayre\Bundle\EntitiesEventsBundle\Listener;

use Atournayre\Bundle\EntitiesEventsBundle\Service\PostPersistService;
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
