<?php
/**
 * JgutZfMaintenance Module (https://github.com/juliangut/zf-maintenance)
 *
 * @link https://github.com/juliangut/zf-maintenance for the canonical source repository
 * @license https://raw.githubusercontent.com/juliangut/zf-maintenance/master/LICENSE
 */

namespace JgutZfMaintenance\Service;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use JgutZfMaintenance\Exclusion\RouteExclusion;

class ExclusionRouteServiceFactory implements FactoryInterface
{
    /**
     * {@inheritDoc}
     *
     * @return \JgutZfMaintenance\Exclusion\RouteExclusion
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $routeMatch = $serviceLocator->get('Application')->getMvcEvent()->getRouteMatch();
        $options = $serviceLocator->get('zf-maintenance-options');

        if (!isset($options->getExclusions()['JgutZfMaintenance\Exclusion\RouteExclusion'])) {
            throw new InvalidArgumentException(
                'Config for "JgutZfMaintenance\Exclusion\RouteExclusion" not set'
            );
        }

        $routes = $options->getExclusions()['JgutZfMaintenance\Exclusion\RouteExclusion'];
        return new RouteExclusion($routes, $routeMatch);
    }
}
