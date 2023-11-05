<?php

namespace Atournayre\Bundle\EntitiesEventsBundle\Listener;

use Atournayre\Bundle\EntitiesEventsBundle\Service\PostUpdateService;
use Doctrine\ORM\Event\PostUpdateEventArgs;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

final readonly class PostUpdateListener
{
    public function __construct(
        private PostUpdateService $postUpdate,
        private ParameterBagInterface $parameterBag,
    )
    {
    }

    public function __invoke(PostUpdateEventArgs $postUpdateEventArgs): void
    {
        if (!$this->parameterBag->get('atournayre_entities_events.enable_post_update_listener')) {
            return;
        }
        ($this->postUpdate)($postUpdateEventArgs);
    }
}
