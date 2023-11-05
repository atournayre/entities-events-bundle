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
composer require atournayre/entities-events-bundle --dev
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
