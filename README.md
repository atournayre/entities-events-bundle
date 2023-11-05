Atournayre Entities Events Bundle
================

This bundle provides a way to dispatch events when entities are created, updated or deleted using Doctrine ORM events and Symfony EventDispatcher.

## Requirements
Symfony ``^6 || ^7``

PHP ``>=8.2``

## Install
Use [Composer] to install the package:

### Composer
```shell
composer require atournayre/entities-events-bundle
```
### Register bundle

```php
// config/bundles.php

return [
    // ...
    Atournayre\Bundle\EntitiesEventsBundle\AtournayreEntitiesEventsBundle::class => ['all' => true],
    // ...
]
```

### Install listeners

```bash
php bin/console atournayre:entities-events:generate-listeners
```

Usage example
----------

### Update your entity

```php
use Atournayre\Bundle\EntitiesEventsBundle\Collection\EventCollection;
use Atournayre\Bundle\EntitiesEventsBundle\Contracts\HasEventsInterface;

// Implements HasEventsInterface
class YourEntity implements HasEventsInterface
{
  // Use EventsTrait to implement HasEventsInterface
  use EventsTrait;
  
  public function __construct()
  {
    // Initialize the collection of events
    $this->eventCollection = new EventCollection();
  }
  
  public function doSomething(): void
  {
    // Do something here
    // Then dispatch an event
    $this->addEvent(new YourEvent($this));
  }
}
```

### Create an event
```php
use Symfony\Contracts\EventDispatcher\Event;

class YourEvent extends Event
{
  public function __construct(
    public readonly YourEntity $entity
  ) {}
}
```

### Handle an event
```php

use Symfony\Component\EventDispatcher\Attribute\AsEventListener;

#[AsEventListener]
class YourEventListener
{
  public function __invoke(YourEvent $event): void
  {
    // Do something here
  }
}
```

That's all, the bundle will do the rest.

Contribute
----------

Contributions to the package are always welcome!

* Report any bugs or issues you find on the [issue tracker].
* You can grab the source code at the package's [Git repository].

## License
All contents of this package are licensed under the [MIT license].

[Composer]: https://getcomposer.org

[The Community Contributors]: https://github.com/atournayre/entities-events-bundle/graphs/contributors

[issue tracker]: https://github.com/atournayre/entities-events-bundle/issues

[Git repository]: https://github.com/atournayre/entities-events-bundle

[MIT license]: LICENSE
