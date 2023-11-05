<?php

namespace Atournayre\Bundle\EntitiesEventsBundle\Listener;

use Atournayre\Bundle\EntitiesEventsBundle\Service\PreRemoveService;
use Doctrine\ORM\Event\PreRemoveEventArgs;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

final readonly class PreRemoveListener
{
    public function __construct(
        private PreRemoveService $preRemove,
        private ParameterBagInterface $parameterBag,
    )
    {
    }

    public function __invoke(PreRemoveEventArgs $preRemoveEventArgs): void
    {
        if (!$this->parameterBag->get('atournayre_entities_events.enable_pre_remove_listener')) {
            return;
        }
        ($this->preRemove)($preRemoveEventArgs);
    }
}
