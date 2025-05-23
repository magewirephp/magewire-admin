<?php
/**
 * Copyright © Willem Poortman 2021-present. All rights reserved.
 *
 * Please read the README and LICENSE files for more
 * details on copyrights and license information.
 */

declare(strict_types=1);

namespace Magewirephp\MagewireAdmin\Model\View\Utils;

use Magento\Backend\Setup\ConfigOptionsList as BackendConfigOptionsList;
use Magento\Framework\App\DeploymentConfig;
use Magewirephp\Magewire\MagewireServiceProvider;
use Magewirephp\Magewire\Model\Magento\System\ConfigMagewire as MagewireSystemConfig;
use Magewirephp\Magewire\Model\View\Utils\Magewire\Features as FeaturesViewUtil;
use Magewirephp\Magewire\Model\View\Utils\Magewire\Mechanisms as MechanismsViewUtil;

class Magewire extends \Magewirephp\Magewire\Model\View\Utils\Magewire
{
    public function __construct(
        FeaturesViewUtil $features,
        MechanismsViewUtil $mechanisms,
        MagewireServiceProvider $magewireServiceProvider,
        MagewireSystemConfig $config,
        private readonly DeploymentConfig $deploymentConfig,
    ) {
        parent::__construct($features, $mechanisms, $magewireServiceProvider, $config);
    }

    public function getUpdateUri(): string
    {
        return '/' .
            $this->deploymentConfig->get(BackendConfigOptionsList::CONFIG_PATH_BACKEND_FRONTNAME) .
            parent::getUpdateUri();
    }
}
