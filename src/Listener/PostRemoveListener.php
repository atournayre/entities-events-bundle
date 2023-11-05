<?php

namespace Atournayre\Bundle\EntitiesEventsBundle\Listener;

use Atournayre\Bundle\EntitiesEventsBundle\Service\PostRemoveService;
use Doctrine\ORM\Event\PostRemoveEventArgs;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

final readonly class PostRemoveListener
{
    public function __construct(
        private PostRemoveService $postRemove,
        private ParameterBagInterface $parameterBag,
    )
    {
    }

    public function __invoke(PostRemoveEventArgs $postRemoveEventArgs): void
    {
        if (!$this->parameterBag->get('atournayre_entities_events.enable_post_remove_listener')) {
            return;
        }
        ($this->postRemove)($postRemoveEventArgs);
    }
}
