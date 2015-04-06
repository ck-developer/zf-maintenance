<?php
/**
 * Juliangut Zend Framework Maintenance Module Module (https://github.com/juliangut/zf-maintenance)
 *
 * @link https://github.com/juliangut/zf-maintenance for the canonical source repository
 * @license https://github.com/juliangut/zf-maintenance/blob/master/LICENSE
 */

namespace Jgut\Zf\MaintenanceTests\Service;

use PHPUnit_Framework_TestCase;
use Jgut\Zf\Maintenance\Service\ViewMaintenanceMessageServiceFactory;
use Jgut\Zf\Maintenance\View\Helper\MaintenanceMessage;

/**
 * @covers Jgut\Zf\Maintenance\Service\ViewMaintenanceMessageServiceFactory
 */
class ViewMaintenanceMessageServiceFactoryTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers Jgut\Zf\Maintenance\Service\ViewMaintenanceMessageServiceFactory::createService
     * @covers Jgut\Zf\Maintenance\View\Helper\MaintenanceMessage::__construct
     */
    public function testCreation()
    {
        $options = $this->getMock('Jgut\\Zf\\Maintenance\\Options\\ModuleOptions', array(), array(), '', false);
        $options->expects($this->any())->method('getProviders')->will($this->returnValue(array()));

        $serviceManager = $this->getMock('Zend\\ServiceManager\\ServiceManager', array(), array(), '', false);
        $serviceManager->expects($this->any())->method('get')->will($this->returnValue($options));

        $helperManager = $this->getMock('Zend\\View\\HelperPluginManager', array(), array(), '', false);
        $helperManager->expects($this->once())->method('getServiceLocator')->will($this->returnValue($serviceManager));

        $factory = new ViewMaintenanceMessageServiceFactory();
        $helper = $factory->createService($helperManager);

        $this->assertTrue($helper instanceof MaintenanceMessage);
    }
}
