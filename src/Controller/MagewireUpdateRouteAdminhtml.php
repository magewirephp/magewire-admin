<?php
/**
 * Copyright © Willem Poortman 2021-present. All rights reserved.
 *
 * Please read the README and LICENSE files for more
 * details on copyrights and license information.
 */

declare(strict_types=1);

namespace Magewirephp\MagewireAdmin\Controller;

use Magento\Backend\App\Area\FrontNameResolver;
use Magento\Backend\Model\Auth\Session as SessionAuth;
use Magento\Backend\Model\Session\AdminConfig;
use Magento\Framework\HTTP\PhpEnvironment\Request;
use Magewirephp\Magewire\Controller\MagewireUpdateRoute;

class MagewireUpdateRouteAdminhtml extends MagewireUpdateRoute
{
    public function __construct(
        private readonly FrontNameResolver $frontNameResolver,
        private readonly SessionAuth $sessionAuth
    ) {

    }

    public function getMatchConditions(): array
    {
        return array_merge(parent::getMatchConditions(), [
            'auth' => fn (Request $request): bool => $this->sessionAuth->getSessionId() === $request->getCookie(AdminConfig::SESSION_NAME_ADMIN)
        ]);
    }

    public function getUpdateUri(): string
    {
        return DIRECTORY_SEPARATOR . $this->frontNameResolver->getFrontName() . parent::getUpdateUri();
    }
}
