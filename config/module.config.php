<?php
/**
 * JgutZfMaintenance Module (https://github.com/juliangut/zf-maintenance)
 *
 * @link https://github.com/juliangut/zf-maintenance for the canonical source repository
 * @license https://raw.githubusercontent.com/juliangut/zf-maintenance/master/LICENSE
 */

return array(
    'service_manager' => array(
        'invokables' => array(
            'JgutZfMaintenance\Options' => 'JgutZfMaintenance\Service\ModuleOptionsServiceFactory',
        ),
    ),

    'zf-maintenance' => array(
    ),
);
