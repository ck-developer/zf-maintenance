<?php
/**
 * JgutZfMaintenance Module (https://github.com/juliangut/zf-maintenance)
 *
 * @link https://github.com/juliangut/zf-maintenance for the canonical source repository
 * @license https://raw.githubusercontent.com/juliangut/zf-maintenance/master/LICENSE
 */

namespace JgutZfMaintenance\Options;

use Zend\Stdlib\AbstractOptions;

class ModuleOptions extends AbstractOptions
{
    /**
     * Turn off strict options mode
     *
     * @var boolean
     */
    protected $__strictMode__ = false;

    /**
     * Maintenance strategy.
     *
     * @var string
     */
    protected $maintenanceStrategy = 'JgutZfMaintenance\View\maintenanceStrategy';

    /**
     * Maintenance page template.
     *
     * @var string
     */
    protected $template = 'zf-maintenance/maintenance';

    /**
     * Set maintenance strategy.
     *
     * @param string $template
     */
    public function setMaintenanceStrategy($maintenanceStrategy)
    {
        $this->maintenanceStrategy = (string) $maintenanceStrategy;
    }

    /**
     * Get maintenance strategy.
     *
     * @return string
     */
    public function getMaintenanceStrategy()
    {
        return $this->maintenanceStrategy;
    }

    /**
     * Set maintenance template.
     *
     * @param string $template
     */
    public function setTemplate($template)
    {
        $this->template = (string) $template;
    }

    /**
     * Get maintenance template.
     *
     * @return string
     */
    public function getTemplate()
    {
        return $this->template;
    }
}
