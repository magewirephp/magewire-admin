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
use Magento\Framework\Exception\FileSystemException;
use Magento\Framework\Exception\RuntimeException;
use Magewirephp\Magewire\Model\Magento\System\ConfigMagewire as MagewireSystemConfig;
use Magewirephp\Magewire\Model\View\Utils\Magewire\Builder;
use Magewirephp\Magewire\Model\View\Utils\Magewire\Features as FeaturesViewUtil;
use Magewirephp\Magewire\Model\View\Utils\Magewire\Mechanisms as MechanismsViewUtil;
use Psr\Log\LoggerInterface;

class Magewire extends \Magewirephp\Magewire\Model\View\Utils\Magewire
{
    public function __construct(
        private readonly DeploymentConfig $deploymentConfig,
        Builder $builder,
        FeaturesViewUtil $features,
        MechanismsViewUtil $mechanisms,
        MagewireSystemConfig $config,
        LoggerInterface $logger
    ) {
        parent::__construct($builder, $features, $mechanisms, $config, $logger);
    }

    /**
     * @throws FileSystemException
     * @throws RuntimeException
     */
    public function getUpdateUri(): string
    {
        return '/' .
            $this->deploymentConfig->get(BackendConfigOptionsList::CONFIG_PATH_BACKEND_FRONTNAME) .
            parent::getUpdateUri();
    }
}
