<?php
/**
 * Copyright © Willem Poortman 2021-present. All rights reserved.
 *
 * Please read the README and LICENSE files for more
 * details on copyrights and license information.
 */

declare(strict_types=1);

namespace Magewirephp\MagewireAdmin\Controller;

use Magento\Backend\Model\Session\AdminConfig;
use Magento\Backend\Model\Auth\Session as SessionAuth;
use Magento\Framework\App\ActionFactory;
use Magento\Framework\HTTP\PhpEnvironment\Request;
use Magento\Framework\Serialize\SerializerInterface;
use Magento\Framework\Webapi\ServiceInputProcessor;
use Magewirephp\Magewire\Controller\MagewireUpdateRouteFrontend;
use Magewirephp\Magewire\MagewireServiceProvider;
use Psr\Log\LoggerInterface;

class MagewireUpdateRouteAdminhtml extends MagewireUpdateRouteFrontend
{
    public function __construct(
        SerializerInterface $serializer,
        ServiceInputProcessor $serviceInputProcessor,
        MagewireServiceProvider $magewireServiceProvider,
        ActionFactory $actionFactory,
        LoggerInterface $logger,
        private readonly SessionAuth $sessionAuth
    ) {
        parent::__construct(
            $serializer,
            $serviceInputProcessor,
            $magewireServiceProvider,
            $actionFactory,
            $logger
        );
    }

    public function getMatchConditions(): array
    {
        return array_merge([
            'auth' => fn (Request $request): bool => $this->sessionAuth->getSessionId() === $request->getCookie(AdminConfig::SESSION_NAME_ADMIN)
        ]);
    }
}
