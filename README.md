[![Build Status](https://travis-ci.org/juliangut/zf-maintenance.svg?branch=master)](https://travis-ci.org/juliangut/zf-maintenance)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/juliangut/zf-maintenance/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/juliangut/zf-maintenance/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/juliangut/zf-maintenance/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/juliangut/zf-maintenance/?branch=master)
[![Latest Stable Version](https://poser.pugx.org/juliangut/zf-maintenance/v/stable.svg)](https://packagist.org/packages/juliangut/zf-maintenance)
[![Total Downloads](https://poser.pugx.org/juliangut/zf-maintenance/downloads.svg)](https://packagist.org/packages/juliangut/zf-maintenance)

# Juliangut Zend Framework Maintenance Module

Maintenance module for Zend Framework 2.

## Installation

1. Best way to install is using [Composer](https://getcomposer.org/):

```
php composer.phar require juliangut/zf-maintenance
```

or download it directly from github and place it in your application's `module/` directory.

2. Add `Jgut\Zf\Maintenance` module to the module section of your `config/application.config.php`

3. Copy `config\zf-maintenance.global.php.dist` to your `config` directory and rename it `zf-maintenance.global.php`

4. Install zend-developer-tools (optional)

```
php composer.phar require zendframework/zend-developer-tools
```

## Configuration

Configuration example can be found in `config\zf-maintenance.global.php.dist`

Annotated example:
```php
return [
    'zf-maintenance' => [
        /* Strategy service to be used on maintenance
         * Will return 503 (service unavailable) error code when maintenance mode is on
         */
        'maintenance_strategy' => 'Jgut\Zf\Maintenance\View\MaintenanceStrategy',

        // Template for the maintenance strategy
        'template' => 'zf-maintenance/maintenance',

        /* Maintenance providers
         * Different means to activate maintenance mod.
         * Two manual providers comes bundled with the module:
         *   ConfigProvider, the simplest possible
         *   ConfigScheduledProvider, sets a time span, start - end strings as accepted by \DateTime
         * Any provider implementing Jgut\Zf\Maintenance\Provider\ScheduledProviderInterface will be used to determine
         * future maintenance situations and used on view helper as well as in zend-developer-tools
         */
        'providers' => array(
            'Jgut\Zf\Maintenance\Provider\ConfigProvider' => array(
                'active' => false,
            ),
        ),

        /* Exceptions to maintenance mode
         * Provides a way to bypass maintenance mode by fulfilling any of the conditions provided:
         *   IpExclusion, sets a list of IPs from which access is granted
         *   RouteExclusion, sets routes not affected by maintenance mode
         */
        'exclusions' => array(
            'Jgut\Zf\Maintenance\Exclusion\IpExclusion' => array(
                '127.0.0.1',
            ),
            'Jgut\Zf\Maintenance\Exclusion\RouteExclusion' => array(
                'home',
            ),
        ),
    ],
]
```

## View helper

A view helper `scheduledMaintenance` is bundled with the module that will return an array with the next scheduled
maintenance time period

```php
array(
    'start' => \DateTime,
    'end'   => \DateTime, //null if no end time
);
```

## ZendDeveloperTools integration

A collector `zf-mainenance-collector` is present for
[ZendDeveloperTools](https://github.com/zendframework/ZendDeveloperTools) showing current maintenance status and future scheduled maintenance period times

## License

### Release under BSD-3-Clause License.

See file [LICENSE](https://github.com/juliangut/zf-maintenance/blob/master/LICENSE) included with the source code for a copy of the license terms
