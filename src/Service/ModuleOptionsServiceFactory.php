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
use JgutZfMaintenance\Options\ModuleOptions;

class ModuleOptionsServiceFactory implements FactoryInterface
{
    /**
     * Configuration key.
     *
     * @var string
     */
    protected $configKey = 'zf-maintenance';

    /**
     * {@inheritDoc}
     *
     * @return \AcademiqBase\Options\ModuleOptions
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config            = $serviceLocator->get('Config');
        $maintenanceConfig = !empty($config[$this->configKey]) ? $config[$this->configKey] : array();

        return new ModuleOptions($maintenanceConfig);
    }
}