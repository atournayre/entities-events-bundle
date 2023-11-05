<?php

namespace Atournayre\Bundle\EntitiesEventsBundle\Listener;

use Atournayre\Bundle\EntitiesEventsBundle\Service\PostPersistService;
use Doctrine\ORM\Event\PostPersistEventArgs;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

final readonly class PostPersistListener
{
    public function __construct(
        private PostPersistService $postPersist,
        private ParameterBagInterface $parameterBag,
    )
    {
    }

    public function __invoke(PostPersistEventArgs $postPersistEventArgs): void
    {
        if (!$this->parameterBag->get('atournayre_entities_events.enable_post_persist_listener')) {
            return;
        }
        ($this->postPersist)($postPersistEventArgs);
    }
}
