<?php

namespace Atournayre\Bundle\EntitiesEventsBundle\Listener;

use Atournayre\Bundle\EntitiesEventsBundle\Service\PrePersistService;
use Doctrine\ORM\Event\PrePersistEventArgs;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

final readonly class PrePersistListener
{
    public function __construct(
        private PrePersistService $prePersist,
        private ParameterBagInterface $parameterBag,
    )
    {
    }

    public function __invoke(PrePersistEventArgs $prePersistEventArgs): void
    {
        if (!$this->parameterBag->get('atournayre_entities_events.enable_pre_persist_listener')) {
            return;
        }
        ($this->prePersist)($prePersistEventArgs);
    }
}
