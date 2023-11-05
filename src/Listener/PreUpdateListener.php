<?php

namespace Atournayre\Bundle\EntitiesEventsBundle\Listener;

use Atournayre\Bundle\EntitiesEventsBundle\Service\PreUpdateService;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

final readonly class PreUpdateListener
{
    public function __construct(
        private PreUpdateService $preUpdate,
        private ParameterBagInterface $parameterBag,
    )
    {
    }

    public function __invoke(PreUpdateEventArgs $preUpdateEventArgs): void
    {
        if (!$this->parameterBag->get('atournayre_entities_events.enable_pre_update_listener')) {
            return;
        }
        ($this->preUpdate)($preUpdateEventArgs);
    }
}
