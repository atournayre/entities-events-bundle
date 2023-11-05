<?php

namespace Atournayre\Bundle\EntitiesEventsBundle\Service;

use Doctrine\ORM\Event\PostRemoveEventArgs;

final readonly class PostRemoveListener
{
    public function __construct(
        private PostRemoveService $postRemove,
    )
    {
    }

    public function __invoke(PostRemoveEventArgs $postRemoveEventArgs): void
    {
        ($this->postRemove)($postRemoveEventArgs);
    }
}
